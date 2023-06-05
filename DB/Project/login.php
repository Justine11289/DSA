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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BAR HOPPER Login</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            background-image: url("bar.png");
            background-size: 100% auto; 
            color: white;
            margin: 0;
            padding: 0;
        }

        .container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        .form input {
            padding: 5px;
            width: 220px;
            margin-bottom: 10px;
            color: black;
            background-color: white;
            border: none;
            border-radius: 3px;
        }
        
        .form .login-button,
        .form .register-button {
            margin-top: 10px;
            background-color: white;
            color: black;
            border: none;
            cursor: pointer;
        }

        .form input[type="text"]:focus, .form input[type="password"]:focus{
        border-color: #2ecc71;
        width: 280px;
        transition: 0.5s;
        }
                
    </style>
</head>

<body>
    <div class="container">
        <div class="letter" style="font-size: 75px; margin-bottom: 50px;" ><b>BAR HOPPER</b></div>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form">
            <label for="text">帳號：</label>
            <input type="text" name="phone" required placeholder="輸入帳號" style="font-size: 20px;">
            <br>
            <label for="password">密碼：</label>
            <input type="password" name="password1" required placeholder="輸入密碼" style="font-size: 20px;">
            <br>
            <input type="submit" name="login" value="登錄" /></br>
            <br>
            <a href="register.php">註冊</a>

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

        </div>
    </div>
</body>

</html>