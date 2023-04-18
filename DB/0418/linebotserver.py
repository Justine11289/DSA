from flask import Flask, request, abort
from linebot import LineBotApi, WebhookHandler
from linebot.exceptions import InvalidSignatureError
from flask.logging import create_logger
from linebot.models import MessageEvent, TextSendMessage, PostbackEvent, URIAction, TemplateSendMessage, ButtonsTemplate, MessageAction
import pymysql
import re

def sql_connect(host,port,user,passwd,database):
    global db,cursor
    try:
        db = pymysql.connect(host=host, user=user, passwd=passwd, database=database, port=int(port))
        print("連線成功")
        cursor = db.cursor() #創建一資料庫連線的游標對象
        return True
    except pymysql.Error as e:
        print("連線失敗"+str(e))
        return False

def select(sql):
    cursor.execute(sql) #執行sql語句
    result = cursor.fetchall() #取得查詢結果
    result = list(result)
    for i in range(len(result)):
        result[i] = str(result[i])
        result[i] = re.sub(r'[.,"\'()]','',result[i]) #移除結果中的特殊字符
    return result

def insert(sql):
    cursor.execute(sql) #執行sql語句
    db.commit() #提交事務,確認寫入資料庫


app = Flask(__name__) #初始化Flask應用程式
LOG = create_logger(app) #建立日誌紀錄器
line_bot_api = LineBotApi('Channel Access Token') #初始化LINE Bot API物件並設定Channel Access Token
handler = WebhookHandler('Channel Secret') #初始化Webhok處理器並設定Channel Secret
sql_connect('localhost',3306,'root','','City')

@app.route("/",methods=['POST'])
def callback():
    signature = request.headers['X-Line-Signature'] #取得Line Signature用於驗證請求的合法性
    body = request.get_data(as_text=True) #取得請求的內容
    LOG.info("Request body: "+ body) #將請求內容記錄到LOG中
    try:
        handler.handle(body,signature) #使用handler處理接收到的事件
    except InvalidSignatureError:
        abort(400) #若Line Signature驗證失敗則回傳400錯誤
    return 'OK' #回傳"OK"表示處理完成且正常結束

@app.route("/web_page",methods=['POST'])
def web_page():
    input_text = request.form.get('input_text') #取得網頁回傳的內容
    id = request.form.get('id') #取得網頁回傳的user_id

    #建立按鈕樣板訊息
    template_message = TemplateSendMessage(
        alt_text = '確認地址', #在無法顯示按鈕樣板訊息時的替代文字
        template = ButtonsTemplate(
            title = '請確認地址是否正確', #標題
            text = input_text, #文字內容
            actions = [
                MessageAction(
                    label = '正確', #按鈕標籤
                    text = input_text #點擊按鈕後回覆的文字訊息
                )
            ]
        )
    )

    #使用Line Bot API發送按鈕樣板訊息
    line_bot_api.push_message(id,template_message)
    return 'OK'




#處理PostbackEvent事件的處理函式
@handler.add(PostbackEvent)
def handle_postback(event):
    #檢查是否為特定Rich Menu action的觸發事件
    if event.postback.data == 'action=input':
        #取得使用者的user id
        user_id = event.source.user_id
        #將user id傳送至網頁
        url = 'https://8deb-220-128-241-246.ngrok-free.app/select.html?user_id' + user_id

        message = TemplateSendMessage(
            alt_text = '前往網頁', #在無法顯示按鈕樣板訊息時的替代文字
            template = ButtonsTemplate(
                title = '地址輸入', #標題
                text = '請點選下方按鈕進入輸入地址', #文字內容
                actions=[
                    URIAction(
                        label = '前往網頁', #按鈕標籤
                        uri = url #跳轉至網頁
                    )
                ]
            )
        )
        #使用Line Bot API的reply_message方法回覆訊息給使用者
        line_bot_api.reply_message(event.reply_token,message) #回覆訊息給使用者,讓其點選按鈕進行繼續

@handler.add(MessageEvent)
def echo(event):
    user_id = event.source.user_id #取得使用者的user id
    print("user_id = ",user_id)

    if event.message.type == 'text':
        stt = event.source.text #取得使用者輸入的訊息內容
        sql = '''SELECT city FROM city WHERE 1;''' #查詢城市資料的SQL語句
        addr = select(sql) #執行SQL查詢並取得城市資料
        if stt[0:3] in addr : #如果使用者輸入的前三個字在城市資料中,表示輸入完成
            line_bot_api.reply_message(
                event.reply_token,
                TextSendMessage('輸入完成')
            )
            sql = f'''UPDATE `userinformation` SET `addr`='{stt}' WHERE `lineid` = '{user_id}';''' #更新使用者的地址至資料庫
            insert(sql)
        elif stt == '查詢個人資料':
            text = ''
            sql = f'''SELECT `name`,`addr` FROM `userinformation` WHERE `lineid` = '{user_id}';''' #查詢使用者姓名與地址
            print(select(sql))
            text = text + '姓名 : ' + select(sql)[0].split(' ')[0] + '\n' + '地址 : ' + select(sql)[0].split(' ')[1]
            line_bot_api.reply_message( #回復使用者的個人資料
                event.reply_token,
                TextSendMessage(text)
            )
        else: #其他情況視為輸入名字
            line_bot_api.reply_message( #回復使用者輸入地址
                event.reply_token,
                TextSendMessage('輸入地址')
            )
            #將使用者輸入的名字與userid新增至資料庫
            sql = f'''INSERT INTO `userinformation`(`lineid`, `name`, `addr`) VALUES ('{user_id}','{stt}','' );'''
            insert(sql)
if __name__ == "__main__":
    app.run(port = 8000)
