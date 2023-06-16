<?php 
include('action.php');  // 引入連線的.php
$a = $_GET['new'];
$query = "SELECT * FROM `bar` NATURAL JOIN `time` JOIN `week` ON time.day = week.day_id WHERE bar_id = $a";
$query_run = mysqli_query($con, $query);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $BARname_input = $_POST['name_input'];
    $map = $_POST['map'];
    $MENU =$_POST['menu_input'];
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

    if (!empty($BARname_input)) {
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

        $check_BAR_sql = "SELECT * FROM `bar` WHERE `bar_name` = '$BARname_input'";
        $result = $conn->query($check_BAR_sql);

        if ($result->num_rows > 0) {
            echo "已有同名酒吧。";
        } else {
            $name = "UPDATE `bar` SET `bar_name` =  '$BARname_input' WHERE `bar_id` = '$a'";
            if($conn->query($name)=== TRUE) {
                echo '成功';
                $conn->close();
            }
        }

    }

    if(!empty($map)){
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

        $name = "UPDATE `bar` SET `map` =  '$map' WHERE `bar_id` = '$a'";
        if($conn->query($name)=== TRUE) {
            echo '成功';
            $conn->close();
        }
    }

    if(!empty($a)){
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

        $check_id_sql = "SELECT * FROM `time` WHERE `bar_id` = '$a'";
        $result2 = $conn->query($check_id_sql);
        if ($result2->num_rows > 0) {
            if (!empty($o7) && !empty($c7)) {
                $update_query = "UPDATE `time` SET `stime` = '$o7', `ctime` = '$c7' WHERE (`bar_id` = '$a' AND `day` = 'D7')";
                if ($conn->query($update_query) === TRUE) {
                    echo '';
        
                }
            }

            if (!empty($o1) && !empty($c1)) {
                $update_query1 = "UPDATE `time` SET `stime` = '$o1', `ctime` = '$c1' WHERE (`bar_id` = '$a' AND `day` = 'D1')";
                if ($conn->query($update_query1) === TRUE) {
                    echo '';
        
                }
            }

            if (!empty($o2) && !empty($c2)) {
                $update_query2 = "UPDATE `time` SET `stime` = '$o2', `ctime` = '$c2' WHERE (`bar_id` = '$a' AND `day` = 'D2')";
                if ($conn->query($update_query2) === TRUE) {
                    echo '';
        
                }
            }

            if (!empty($o3) && !empty($c3)) {
                $update_query3 = "UPDATE `time` SET `stime` = '$o3', `ctime` = '$c3' WHERE (`bar_id` = '$a' AND `day` = 'D3')";
                if ($conn->query($update_query3) === TRUE) {
                    echo '';
        
                }
            }

            if (!empty($o4) && !empty($c4)) {
                $update_query4 = "UPDATE `time` SET `stime` = '$o4', `ctime` = '$c4' WHERE (`bar_id` = '$a' AND `day` = 'D4')";
                if ($conn->query($update_query4) === TRUE) {
                    echo '';
        
                }
            }

            if (!empty($o5) && !empty($c5)) {
                $update_query5 = "UPDATE `time` SET `stime` = '$o5', `ctime` = '$c5' WHERE (`bar_id` = '$a' AND `day` = 'D5')";
                if ($conn->query($update_query5) === TRUE) {
                    echo '';
        
                }
            }

            if (!empty($o6) && !empty($c6)) {
                $update_query6 = "UPDATE `time` SET `stime` = '$o6', `ctime` = '$c6' WHERE (`bar_id` = '$a' AND `day` = 'D6')";
                if ($conn->query($update_query6) === TRUE) {
                    echo '';
        
                }
            }      

        }else{

            if (isset($_POST['7o']) && isset($_POST['7c'])){
                $time1 = "INSERT INTO `time` (`bar_id`, `day`,`stime`,`ctime`) VALUES('$a','D7','$o7','$c7') ";

                if($conn->query($time1)=== TRUE) {
                    echo '';
                }
            }
            if (isset($_POST['1o']) && isset($_POST['1c'])){
                $time2 = "INSERT INTO `time` (`bar_id`, `day`,`stime`,`ctime`) VALUES('$a','D1','$o1','$c1') ";

                if($conn->query($time2)=== TRUE) {
                    echo '';
                }
            }
            if (isset($_POST['2o']) && isset($_POST['2c'])){
                $time3 = "INSERT INTO `time` (`bar_id`, `day`,`stime`,`ctime`) VALUES('$a','D2','$o2','$c2') ";

                if($conn->query($time3)=== TRUE) {
                    echo '';
                }
            }
            if (isset($_POST['3o']) && isset($_POST['3c'])){
                $time4 = "INSERT INTO `time` (`bar_id`, `day`,`stime`,`ctime`) VALUES('$a','D3','$o3','$c3') ";

                if($conn->query($time4)=== TRUE) {
                    echo '';
                }
            }
            if (isset($_POST['4o']) && isset($_POST['4c'])){
                $time5 = "INSERT INTO `time` (`bar_id`, `day`,`stime`,`ctime`) VALUES('$a','D4','$o4','$c4') ";

                if($conn->query($time5)=== TRUE) {
                    echo '';
                }
            }  
            if (isset($_POST['5o']) && isset($_POST['5c'])){
                $time6 = "INSERT INTO `time` (`bar_id`, `day`,`stime`,`ctime`) VALUES('$a','D5','$o5','$c5') ";

                if($conn->query($time6)=== TRUE) {
                    echo '';
                }
            } 
            if (isset($_POST['6o']) && isset($_POST['6c'])){
                $time7= "INSERT INTO `time` (`bar_id`, `day`,`stime`,`ctime`) VALUES('$a','D6','$o6','$c6') ";

                if($conn->query($time7)=== TRUE) {
                    echo '';
                }
            } 

        }
        $conn->close();
    }

    if(!empty($MENU)){
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

        $menu = "UPDATE `bar` SET `menu_image` =  '$MENU' WHERE `bar_id` = '$a'";
        if($conn->query($menu)=== TRUE) {
            echo '成功';
            $conn->close();
        }

    } 


    }else{

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BAR HOPPER ChangeBar</title>
    <style>
        body {
            background-color: rgb(70, 68, 68);
            color: white;
            margin: 0;
            padding: 0;
        }
        *{
            padding: 0;
            margin: 0;
        }
        header{
            background-color: black;
        }
        .nav-branding{
            font-size: 2rem;
        }
        .container{
            max-width: 1224px;
            width: 90%;
            margin: 0 auto;
        }
        .navbar{
            min-height: 70px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .nav-menu{
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 60px;
        }

        .bar-name {
            position: absolute;
            top: 30%;
            left: calc(52% - 40ch);
            transform: translate(-50%, -50%) scale(2);
        }
        
        .rating {
            position: absolute;
            top: 30%;
            left: calc(50% + 30ch); 
            transform: translate(-50%, -50%) scale(2);
        }
        
        .image-container {
            position: absolute;
            top: calc(35% + 50px);
            left: calc(50% - 65ch);
            background-color: rgb(70, 68, 68);
            overflow: hidden;
        }
        
        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: contain; 
            width: 500px; 
            height: 500px;
        }

        .business-hours {
            position: absolute;
            top: 60%;
            left: calc(50% + 10ch);
            transform: translate(-50%, -50%);
            border: 2px solid white;
            padding: 10px;
            text-align: center;
        }

        .business-hours-title {
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .business-hours-content p {
            margin: 0;
        }
        
        .business-hours-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            background-color: rgb(70, 68, 68);
            padding: 5px;
        }
        .business-hours2 {
            position: absolute;
            top: 60%;
            left: calc(50% + 50ch);
            transform: translate(-50%, -50%);
            border: 2px solid white;
            padding: 10px;
            text-align: center;
            width: 350px; /* 调整宽度 */
        }

        .bar-map {
            position: absolute;
            top: 120%;
            left: calc(50% + 40ch);
            transform: translate(-50%, -50%) scale(1);
        }

        @media screen and (max-width: 768px) {
            .container {
                width: 100%;
                padding: 0 10px;
            }
            .bar-name,
            .rating,
            .image-container,
            .business-hours,
            .business-hours2,
            .bar-map {
                position: static;
                transform: none;
                width: auto;
                text-align: left;
                margin: 10px 0;
            }

            .image-container {
                width: 100%;
                height: auto;
            }

            .business-hours-row {
                flex-direction: column;
                align-items: flex-start;
            }
        }
        
    </style>
</head>
<body>
    <header>
    <form action="#" method="post">
        <div class = "container">
            
            <nav class = "navbar">
                <h3 class = "nav-branding">Bar Hopper</h3>
                <div class = "nav-menu">
                    <a href="insertBar.php">
                        <ion-icon name="close-sharp" size="large"></ion-icon>
                    </a>
                </div>
            </nav>
        </div>
    </header>
    
    <?php
    $query1 = "SELECT * FROM bar WHERE bar_id = $a";
    $result = mysqli_query($con, $query1);
    if ($row = mysqli_fetch_array($result)) {
        $menu = $row['menu_image'];
        $map = $row['map'];
        $score = $row['bar_score'];
    
    ?>
    <div class="bar-info">
        <div class="bar-name">
            <?php echo $row['bar_name'];?><br>
            <div style="display: flex; flex-direction: column; align-items: center;">
                <input id="name" type="text" name="name_input"  placeholder="更改BAR NAME" style="font-size: 15px;">
            </div>
        </div>
        <div class="rating"><?php echo $score;?>☆</div>
        <div class="image-container">
            <img src = "<?php echo $menu;?>" style="max-width: 100%; max-height: 100%;" /><br>
            <div style="display: flex; flex-direction: column; align-items: center;">
                <input id="menu" type="text" name="menu_input"  placeholder="更改Menu" style="font-size: 20px;" >
                <button id='register_button' type='submit' style="font-size: 20px;">確認</button>
            </div>
        </div>
        
        <div class="business-hours">
            <div class="business-hours-title">原營業時間</div>
            <div class="business-hours-content">
            <?php 
                $query = "SELECT * FROM `bar` NATURAL JOIN `time` JOIN `week` ON time.day = week.day_id WHERE bar_id = $a";
                $query_run = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($query_run)) {
                    $day_name = $row['day_name'];
                    $startTime = $row['sTime'];
                    $closingTime = $row['cTime'];

                    $startDateTime = DateTime::createFromFormat('H:i:s', $startTime);
                    $closingDateTime = DateTime::createFromFormat('H:i:s', $closingTime);

                    if ($closingDateTime < $startDateTime) {
                        $closingDateTime->add(new DateInterval('P1D'));
                    }
                    $formattedStartTime = $startTime ? $startDateTime->format('h:i A') : "-";
                    $formattedClosingTime = $closingTime ? $closingDateTime->format('h:i A') : "-";   
            ?>
            <div class="business-hours-row">
                <?php echo $day_name; ?>
                <?php if ($startTime == $closingTime) { ?>
                    休息
                <?php } else { ?>
                    <?php echo $formattedStartTime; ?> - <?php echo $formattedClosingTime; ?>
                <?php } ?>
            </div>
            <?php 
            }
            ?>
        </div>
        </div>
        <div class="business-hours2">
            <div class="business-hours-title">更動營業時間</div>
            <div class="business-hours-content">
            <table>
                <tr>
                    <td></td>
                    <td>開始時間</td>
                    <td>結束時間</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center"><b style="font-size: 20px;">週一</b></td>
                    <td><input id="site" type="time" name="1o" placeholder="開始" style="font-size: 20px;"></td>
                    <td><input id="site" type="time" name="1c" placeholder="結束" style="font-size: 20px;"></td>
                </tr>
                <tr>
                    <td align="center"><b style="font-size: 20px;">週二</b></td>
                    <td><input id="site" type="time" name="2o" placeholder="開始" style="font-size: 20px;"></td>
                    <td><input id="site" type="time" name="2c" placeholder="結束" style="font-size: 20px;"></td>
                </tr>
                <tr>
                    <td align="center"><b style="font-size: 20px;">週三</b></td>
                    <td><input id="site" type="time" name="3o" placeholder="開始" style="font-size: 20px;"></td>
                    <td><input id="site" type="time" name="3c" placeholder="結束" style="font-size: 20px;"></td>
                </tr>
                <tr>
                    <td align="center"><b style="font-size: 20px;">週四</b></td>
                    <td><input id="site" type="time" name="4o" placeholder="開始" style="font-size: 20px;"></td>
                    <td><input id="site" type="time" name="4c" placeholder="結束" style="font-size: 20px;"></td>
                </tr>
                <tr>
                    <td align="center"><b style="font-size: 20px;">週五</b></td>
                    <td><input id="site" type="time" name="5o" placeholder="開始" style="font-size: 20px;"></td>
                    <td><input id="site" type="time" name="5c" placeholder="結束" style="font-size: 20px;"></td>
                </tr>
                <tr>
                    <td align="center"><b style="font-size: 20px;">週六</b></td>
                    <td><input id="site" type="time" name="6o" placeholder="開始" style="font-size: 20px;"></td>
                    <td><input id="site" type="time" name="6c" placeholder="結束" style="font-size: 20px;"></td>
                </tr>
                <tr>
                    <td align="center"><b style="font-size: 20px;">週日</b></td>
                    <td><input id="site" type="time" name="7o" placeholder="開始" style="font-size: 20px;"></td>
                    <td><input id="site" type="time" name="7c" placeholder="結束" style="font-size: 20px;"></td>
                </tr>
            </table>
                
            </div>
        </div>
        <div class="bar-map">
            <div style="display: flex; flex-direction: column; align-items: center;">
                <input id="map" type="text" name="map"  placeholder="更改Map" style="font-size: 15px;">
                <a href="https://www.google.com.tw/maps/@23.546162,120.6402133,8z?hl=zh-TW" style="color: white;">查詢地圖</a><br>
            </div>
            <?php echo $map;?>
        </div>
    </div>
    <?php
        }           
    ?>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</form>  
</body>
</html>
