
<?php
session_start();
$curr_permission=$_SESSION['permission'];
if ($curr_permission!='A') {
    echo '<script>alert("'.$curr_permission.'你沒有權限");window.location.href="login.php";</script>';
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 獲取註冊表單提交的資料
    $username_input = $_POST['bar_name'];
    $o7 = $_POST['7o'];
    $o1 = $_POST['1o'];
    $o2 = $_POST['2o'];
    $o3 = $_POST['3o'];
    $o4 = $_POST['4o'];
    $o5 = $_POST['5o'];
    $o6 = $_POST['6o'];
    $c7 = $_POST['7c'];
    $c1 = $_POST['1c'];
    $c2 = $_POST['2c'];
    $c3 = $_POST['3c'];
    $c4 = $_POST['4c'];
    $c5 = $_POST['5c'];
    $c6 = $_POST['6c'];

    // if($o7 > $c7){
    //     $c7 = $c7+2400;
    // }
    // if($o1 > $c1){
    //     $c1 = $c1+240000;
    // }
    // if($o2 > $c2){
    //     $c2 = $c2+240000;
    // }
    // if($o3 > $c3){
    //     $c3 = $c3+240000;
    // }
    // if($o4 > $c4){
    //     $c4 = $c4+240000;
    // }
    // if($o5 > $c5){
    //     $c5 = $c5+240000;
    // }
    // if($o6 > $c6){
    //     $c6 = $c6+240000;
    // }


    $map = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3616.048123782825!2d121.56791657510752!3d24.998480677839325!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442aa68b2adc2ef%3A0x994c821502530140!2z5rij55S3IFRhaXdhbiBCaXN0cm8g5pyo5p-15LqM5rij!5e0!3m2!1szh-TW!2stw!4v1684827016302!5m2!1szh-TW!2stw" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
        // 验证数据是否完整（可以根据需要进一步验证数据的格式）
    // 驗證資料是否完整（可根據需要進一步驗證資料的格式）
    if (!empty($username_input)) {
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
        $check_account_sql = "SELECT * FROM `bar` WHERE `bar_name` = '$username_input'";
        $result = $conn->query($check_account_sql);

        if ($result->num_rows > 0) {
            
            $query = "SELECT `bar_id` FROM `bar` WHERE `bar_name` = '$username_input'";
            $result1 = $conn->query($query);
            if ($result1->num_rows > 0) {
                $row = $result1->fetch_assoc();
                $barID = $row['bar_id'];
            } else {
                // 如果 BAR 不存在，则进行相应操作，例如给出错误提示
                echo '<script>alert("BAR不存在");window.location.href="changetime.php";</script>';
                exit();
            }
            $check_id_sql = "SELECT * FROM `time` WHERE `bar_id` = $barID";
            $result2 = $conn->query($check_id_sql);
            
            if ($result2->num_rows > 0) {

                if (isset($_POST['7o'])){
                    $time1 = "UPDATE `time` SET `stime`= '$o7' WHERE ((`day` = 'D7') && (`bar_id`= $barID)) ";

                    if($conn->query($time1)=== TRUE) {
                        echo '';
                    }
                }
                if (isset($_POST['7c'])){
                    $time2 = "UPDATE `time` SET `ctime`= '$c7' WHERE ((`day` = 'D7') && (`bar_id`= $barID)) ";

                    if($conn->query($time2)=== TRUE) {
                        echo '';
                    }
                }

                if (isset($_POST['1o'])){
                    $time3 = "UPDATE `time` SET `stime`= '$o1' WHERE ((`day` = 'D1') && (`bar_id`= $barID)) ";

                    if($conn->query($time3)=== TRUE) {
                        echo '';
                    }
                }
                if (isset($_POST['1c'])){
                    $time4 = "UPDATE `time` SET `ctime`= '$c1' WHERE ((`day` = 'D1') && (`bar_id`= $barID)) ";

                    if($conn->query($time4)=== TRUE) {
                        echo '';
                    }
                }

                if (isset($_POST['2o'])){
                    $time5 = "UPDATE `time` SET `stime`= '$o2' WHERE ((`day` = 'D2') && (`bar_id`= $barID)) ";

                    if($conn->query($time5)=== TRUE) {
                        echo '';
                    }
                }
                if (isset($_POST['2c'])){
                    $time6 = "UPDATE `time` SET `ctime`= '$c2' WHERE ((`day` = 'D2') && (`bar_id`= $barID)) ";

                    if($conn->query($time6)=== TRUE) {
                        echo '';
                    }
                }
                if (isset($_POST['3o'])){
                    $time7 = "UPDATE `time` SET `stime`= '$o3' WHERE ((`day` = 'D3') && (`bar_id`= $barID)) ";
    
                    if($conn->query($time7)=== TRUE) {
                        echo '';
                    }
                }
                if (isset($_POST['3c'])){
                    $time8 = "UPDATE `time` SET `ctime`= '$c3' WHERE ((`day` = 'D3') && (`bar_id`= $barID)) ";

                    if($conn->query($time8)=== TRUE) {
                        echo '';
                    }
                }
                
                if (isset($_POST['4o'])){
                    $time9 = "UPDATE `time` SET `stime`= '$o4' WHERE ((`day` = 'D4') && (`bar_id`= $barID)) ";

                    if($conn->query($time9)=== TRUE) {
                        echo '';
                    }
                }
                if (isset($_POST['4c'])){
                    $time10 = "UPDATE `time` SET `ctime`= '$c4' WHERE ((`day` = 'D4') && (`bar_id`= $barID)) ";

                    if($conn->query($time10)=== TRUE) {
                        echo '';
                    }
                }

                if (isset($_POST['5o'])){
                    $time11 = "UPDATE `time` SET `stime`= '$o5' WHERE ((`day` = 'D5') && (`bar_id`= $barID)) ";

                    if($conn->query($time11)=== TRUE) {
                        echo '';
                    }
                }
                if (isset($_POST['5c'])){
                    $time12 = "UPDATE `time` SET `ctime`= '$c5' WHERE ((`day` = 'D5') && (`bar_id`= $barID)) ";

                    if($conn->query($time12)=== TRUE) {
                        echo '';
                    }
                }

                if (isset($_POST['6o'])){
                    $time13 = "UPDATE `time` SET `stime`= '$o6' WHERE ((`day` = 'D6') && (`bar_id`= $barID)) ";

                    if($conn->query($time13)=== TRUE) {
                        echo '';
                    }
                }
                if (isset($_POST['6c'])){
                    $time14 = "UPDATE `time` SET `ctime`= '$c6' WHERE ((`day` = 'D6') && (`bar_id`= $barID)) ";

                    if($conn->query($time14)=== TRUE) {
                        echo '<script>alert("店家更新成功")</script>';
                    }
                }

                }else{

                    if (isset($_POST['7o']) && isset($_POST['7c'])){
                        $time1 = "INSERT INTO `time` (`bar_id`, `day`,`stime`,`ctime`) VALUES($barID,'D7','$o7','$c7') ";
    
                        if($conn->query($time1)=== TRUE) {
                            echo '';
                        }
                    }
                    if (isset($_POST['1o']) && isset($_POST['1c'])){
                        $time2 = "INSERT INTO `time` (`bar_id`, `day`,`stime`,`ctime`) VALUES($barID,'D1','$o1','$c1') ";
    
                        if($conn->query($time2)=== TRUE) {
                            echo '';
                        }
                    }
                    if (isset($_POST['2o']) && isset($_POST['2c'])){
                        $time3 = "INSERT INTO `time` (`bar_id`, `day`,`stime`,`ctime`) VALUES($barID,'D2','$o2','$c2') ";
    
                        if($conn->query($time3)=== TRUE) {
                            echo '';
                        }
                    }
                    if (isset($_POST['3o']) && isset($_POST['3c'])){
                        $time4 = "INSERT INTO `time` (`bar_id`, `day`,`stime`,`ctime`) VALUES($barID,'D3','$o3','$c3') ";
    
                        if($conn->query($time4)=== TRUE) {
                            echo '';
                        }
                    }
                    if (isset($_POST['4o']) && isset($_POST['4c'])){
                        $time5 = "INSERT INTO `time` (`bar_id`, `day`,`stime`,`ctime`) VALUES($barID,'D4','$o4','$c4') ";
    
                        if($conn->query($time5)=== TRUE) {
                            echo '';
                        }
                    }  
                    if (isset($_POST['5o']) && isset($_POST['5c'])){
                        $time6 = "INSERT INTO `time` (`bar_id`, `day`,`stime`,`ctime`) VALUES($barID,'D5','$o5','$c5') ";
    
                        if($conn->query($time6)=== TRUE) {
                            echo '';
                        }
                    } 
                    if (isset($_POST['6o']) && isset($_POST['6c'])){
                        $time7= "INSERT INTO `time` (`bar_id`, `day`,`stime`,`ctime`) VALUES($barID,'D6','$o6','$c6') ";
    
                        if($conn->query($time7)=== TRUE) {
                            echo '';
                        }
                    } 
    
                    
                }

        }else{

        }
        } else {
            echo "請輸入正確名稱";
        }

        // 關閉資料庫連接
        $conn->close();
    } else {
        echo "";
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
            top: 90%;
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
                            <font size="8"><b>更改資訊</b></font>
                        </td>
                    </tr>
                    <tr>
                        <td align="center"><b style="font-size: 20px;">酒吧名</b></td>
                        <td style="font-size: 20px;">
                        <select name="bar_name">
                        <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $database = "bar";

                        // 建立与数据库的连接
                        $conn = new mysqli($servername, $username, $password, $database);

                        // 检查连接是否成功
                        if ($conn->connect_error) {
                            die("連接失敗: " . $conn->connect_error);
                        }

                        $sql = "SELECT `bar_name` FROM `bar`";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . $row["bar_name"] . '">' . $row["bar_name"] . '</option>';
                            }
                        } else {
                            echo "沒有找到酒吧資料";
                        }

                        // 关闭数据库连接
                        $conn->close();
                        ?>
    
                        </select>
                    </td>
                    </tr>
                    <tr>
                        <td></td><td>開始時間</td><td>結束時間</td>
                    </tr>                    
                    <tr>
                        <td align="center"><b style="font-size: 20px;">星期日:</b></td>
                        <td><input id="site" type="time" name="7o"  placeholder="開始 " style="font-size: 20px;"></td>
                        <td><input id="site" type="time" name="7c"  placeholder="結束 " style="font-size: 20px;"></td>
                    </tr>
                    <tr>
                        <td align="center"><b style="font-size: 20px;">星期一:</b></td>
                        <td><input id="site" type="time" name="1o"  placeholder="開始 " style="font-size: 20px;"></td>
                        <td><input id="site" type="time" name="1c"  placeholder="結束 " style="font-size: 20px;"></td>
                    </tr>
                    <tr>
                        <td align="center"><b style="font-size: 20px;">星期二:</b></td>
                        <td><input id="site" type="time" name="2o"  placeholder="開始 " style="font-size: 20px;"></td>
                        <td><input id="site" type="time" name="2c"  placeholder="結束 " style="font-size: 20px;"></td>
                    </tr>
                    <tr>
                        <td align="center"><b style="font-size: 20px;">星期三:</b></td>
                        <td><input id="site" type="time" name="3o"  placeholder="開始 " style="font-size: 20px;"></td>
                        <td><input id="site" type="time" name="3c"  placeholder="結束 " style="font-size: 20px;"></td>
                    </tr>
                    <tr>
                        <td align="center"><b style="font-size: 20px;">星期四:</b></td>
                        <td><input id="site" type="time" name="4o"  placeholder="開始 " style="font-size: 20px;"></td>
                        <td><input id="site" type="time" name="4c"  placeholder="結束 " style="font-size: 20px;"></td>
                    </tr>
                    <tr>
                        <td align="center"><b style="font-size: 20px;">星期五:</b></td>
                        <td><input id="site" type="time" name="5o"  placeholder="開始 " style="font-size: 20px;"></td>
                        <td><input id="site" type="time" name="5c"  placeholder="結束 " style="font-size: 20px;"></td>
                    </tr>
                    <tr>
                        <td align="center"><b style="font-size: 20px;">星期六:</b></td>
                        <td><input id="site" type="time" name="6o"  placeholder="開始 " style="font-size: 20px;"></td>
                        <td><input id="site" type="time" name="6c"  placeholder="結束 " style="font-size: 20px;"></td>
                    </tr>
                    

          
                    <tr>
                        <td colspan="2" align="center" style="font-size: 20px;">
                            <button id='register_button' type='submit'>確認</button>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center" style="font-size: 20px;">
                            <p><a href="insertBar.php">回BAR頁面</a></p>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>


    </script>
    <script type="text/javascript">
        function logout() {
            sessionStorage.clear();
            $_SESSION['permission'] = 'C';
        };
    </script>
</body>
</html>
