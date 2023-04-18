from linebot import LineBotApi
from linebot.exceptions import LineBotApiError
from linebot.models import RichMenu,RichMenuArea,RichMenuSize,RichMenuBounds,MessageAction,PostbackAction

line_bot_api = LineBotApi('Channel Acces Token')

button1 = RichMenuArea( # 設定RichMenu的第一個按鈕區域的標籤為"Button1",並設定PostbackAction動作
    bounds = RichMenuBounds(x=0, y=0,width=1250,height=1686),
    action = PostbackAction(label='Button 1',data='action=input')
)

button2 = RichMenuArea( # 設定RichMenu的第二個按鈕區域的標籤為"查詢個人資料",並設定MessageAction動作
    bounds = RichMenuBounds(x=1250, y=0,width=1250,height=1686),
    action = MessageAction(label='查詢個人資料',text='查詢個人資料')
)

rich_menu = RichMenu(
    size = RichMenuSize(width=2500,height=1686), #設定RichMenu大小
    selected = True,
    name = 'CGU', #設定RichMenu的名稱
    chat_bar_text = 'CGU', #設定RichMenu在聊天視窗中的標籤
    areas = [button1,button2] #設定RichMenu的按鈕區域
)

try:#建立Rich Menu
    rich_menu_id = line_bot_api.create_rich_menu(rich_menu = rich_menu)
    print(f'Rich Menu created.rich_menu_id:{rich_menu_id}')
    #上傳Rich Menu圖片
    with open('C:/xampp/htdocs/richmenu.png') as f:
        line_bot_api.set_rich_menu_image(rich_menu_id,'image/png',f)
        print('Rich Menu image uploaded.')
    #設定Rich Menu至Channel
    line_bot_api.set_default_rich_menu(rich_menu_id)
    print('Rich Menu set as default.')
except LineBotApiError as e:
    print(f'Error creating Rich Menu : {e}')


