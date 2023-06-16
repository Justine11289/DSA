<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 獲取登入表單提交的資料
    $phone = $_POST['phone'];
    $password1 = $_POST['password1'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "bar";

    // 建立與資料庫的連接
    $conn = new mysqli($servername, $username, $password, $database);

    // 檢查連接是否成功
    if ($conn->connect_error) {
        die("連接失敗: " . $conn->connect_error);
    }

    // 執行登入的SQL語句
    $sql = "SELECT * FROM `admin` WHERE `admin_name`   = '$phone' AND `admin_password` = '$password1'";

    $result = $conn->query($sql);

    $query = "SELECT `admin_id` FROM `admin` WHERE `admin_name`   = '$phone' AND `admin_password` = '$password1'";
    $result = $conn->query($query);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $userID = $row['admin_id'];
    } else {
        $userID = ""; // 如果未找到匹配的结果，可以设置一个默认值或采取其他适当的操作
    }

}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BAR HOPPER Admin</title>
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
            <a href="login.php">使用者登入</a>
            <br>

            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            if ($result->num_rows > 0) {
                // 登入成功，儲存使用者ID至Session
                $row = $result->fetch_assoc();
                $_SESSION['admin_id'] = $row['admin_id'];
                $_SESSION['admin_name'] = $row['admin_name'];
                $_SESSION['permission'] = 'A';
                $p=$_SESSION['permission'];
                
                header("Location:insertBar.php?cid=$userID&rid=$userID&p=$p"); // 登入後導向首頁
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