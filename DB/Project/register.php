<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 獲取註冊表單提交的資料
    $username_input = $_POST['username_input'];
    $account_input = $_POST['account_input'];
    $password_input = $_POST['password_input'];

    // 驗證資料是否完整（可根據需要進一步驗證資料的格式）
    if (!empty($username_input) && !empty($account_input) && !empty($password_input)) {
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

        // 檢查是否已存在具有相同電話的記錄
        $check_account_sql = "SELECT * FROM `user` WHERE `account` = '$account_input'";
        $result = $conn->query($check_account_sql);

        if ($result->num_rows > 0) {
            echo "該帳號已被註冊。";
        } else {
            // 執行註冊的SQL語句
            $sql = "INSERT INTO `user` (`user_name`, `account`, `password`) VALUES ('$username_input', '$account_input', '$password_input')";

            if ($conn->query($sql) === TRUE) {
                echo '<script>alert("註冊成功！")</script>';
            } else {
                echo "註冊失敗：" . $conn->error;
            }
        }

        // 關閉資料庫連接
        $conn->close();
    } else {
        echo "請填寫完整的註冊資料。";
    }
}
?>

<!DOCTYPE html>
<html>
  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BAR HOPPER Register</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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

        .form-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
        }

        .form-container table {
            width: 100%;
        }

        .navbar-brand {
            padding: 0 10px;
            font-size: 63px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <div class="letter" style="font-size: 75px; margin-bottom: 50px;"><b>BAR HOPPER</b></div>
            <form action="#" method="post">
                <table border="0px" width="500px" height="400px" align="center" cellpadding="25px" cellspacing="0px">
                    <!-- 表格內容 -->
                    <tr height="40px">
                        <td colspan="5">
                            <font size="8"><b>用戶註冊</b></font>
                        </td>
                    </tr>
                    <tr>
                        <td align="center"><b style="font-size: 30px;">用戶名</b></td>
                        <td><input id="user_name1" type="text" name="username_input" required placeholder="輸入用戶名" style="font-size: 20px;"></td>
                    </tr>                    
                    <tr>
                        <td align="center"><b style="font-size: 30px;">帳號</b></td>
                        <td><input id="user_name" type="text" name="account_input" required placeholder="輸入帳號" style="font-size: 20px;"></td>
                    </tr>
                    <tr>
                        <td align="center"><b style="font-size: 30px;">密碼</b></td>
                        <td><input id="password" type="password" name="password_input" required placeholder="輸入密碼" style="font-size: 20px;"></td>
                    </tr>
                    <tr>
                        <td align="center"><b style="font-size: 30px;">確認密碼</b></td>
                        <td><input id="rpassword" type="password" required placeholder="再次輸入密碼" style="font-size: 20px;"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center" style="font-size: 20px;">
                            <button id='register_button' type='submit'>確認</button>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center" style="font-size: 20px;">
                            <p>已經有帳號？<a href="login.php">立即登入</a></p>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

    <script>
        // 確認密碼是否一致
        document.getElementById("register_button").addEventListener("click", function() {
            var password = document.getElementById("password").value;
            var rpassword = document.getElementById("rpassword").value;

            if (password !== rpassword) {
                alert("密碼不一致！");
                event.preventDefault();
            }
        });
    </script>

</body>
</html>
