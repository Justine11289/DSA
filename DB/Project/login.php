<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 獲取登入表單提交的資料
    $phone = $_POST['phone'];
    $password1 = $_POST['password1'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "webtest";

    // 建立與資料庫的連接
    $conn = new mysqli($servername, $username, $password, $database);

    // 檢查連接是否成功
    if ($conn->connect_error) {
        die("連接失敗: " . $conn->connect_error);
    }

    // 執行登入的SQL語句
    $sql = "SELECT * FROM `user` WHERE `phone`   = '$phone' AND `password` = '$password1'";
    $result = $conn->query($sql);

}
?>

<!DOCTYPE html>
<html>
    <head>
      <style>
        body{
  font-family: Roboto;
  background-color: #e76f51;
  display: flex;
  align-item: center;
  justify-content: center;
}

.login{
  background-color: #0b132b;
  width: 400px;
  color: #f8f9fa;
  padding: 40px;
  box-shadow: 10px 10px 25px #000000;
  text-align: center;
}

.login input{
  display: block;
  margin: 0px auto;
  padding:10px;
  font-size: 15px;
  border-radius: 22px;
  outline: none;
  
}

.login input[type="text"], .login input[type="password"]{
  border:3px solid #3498db;
  width: 220px;
}

.login input[type="submit"]{
  width: 150px;
  border: 3px solid #2ecc71;
}

.login input[type="text"]:focus, .login input[type="password"]:focus{
  border-color: #2ecc71;
  width: 280px;
  transition: 0.5s;
}

.login input[type="submit"]:hover {
  background-color: #2ecc71;
  trasition: 0.5s;
}
      </style>
    </head>
    <body>
        <form action="login.php" class="login" method="POST">
            <h1>Barhopper</h1>
            <h2>Login 管理者登錄</h2>
            <label for="text">帳號：</label>
            <input type="text" name="phone" required placeholder="帳號" /><br>
            <label for="password">密碼：</label>
            <input type="password" name="password1" required placeholder="密碼" /><br>
            <input type="submit" value="登錄" /></br>
            <input type="submit" value="註冊" />
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            if ($result->num_rows > 0) {
            // 登入成功，儲存使用者ID至Session
            $row = $result->fetch_assoc();
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['user_name'] = $row['user_name'];
            
            header("Location: index.php"); // 登入後導向首頁
            exit();
          } else {
            echo '<p>登入失敗，請檢查帳號和密碼。</p>';
          }
          }
          ?>
        </form>
    </body>
</html>