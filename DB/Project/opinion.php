<?php
session_start();
$restaurantId = $_SESSION['user_id'];
$_SESSION['user_id']= $restaurantId;

$servername = "localhost";
$username = "root";
$password = "";
$database = "bar";
$site = $_GET['site'] ?? '';


// 建立与数据库的连接
$conn = new mysqli($servername, $username, $password, $database);

// 检查连接是否成功
if ($conn->connect_error) {
    die("連接失敗: " . $conn->connect_error);
}

// 检查是否提交了区域选择
if (isset($_POST['site'])) {
    $selectedRegion = $_POST['site'];

    // 查询符合区域的 BAR 名称
    $sql = "SELECT DISTINCT `bar_name` FROM `bar` WHERE `bar_address` LIKE '%" . $selectedRegion . "%'";

    $result = $conn->query($sql);

    $options = '<option value="">bar name</option>'; // 默认选项

    if ($result->num_rows > 0) {
        // 将匹配的 BAR 名称添加到选项中
        while ($row = $result->fetch_assoc()) {
            $barName = $row['bar_name'];
            $options .= "<option value=\"$barName\">$barName</option>";
        }
    } else {
        $options .= "<option value=\"\">未找到匹配的 BAR</option>";
    }

    // 将选项发送回客户端

    if (isset($_POST['submit_rating'])) {
        date_default_timezone_set('Asia/Taipei'); // 设置时区
        $recordTime = date('Y-m-d H:i:s'); // 将日期和时间格式化为指定格式
        $selectedBarName = $_POST['bar_name'];
        $selectedRating = $_POST['star'];
        $restaurantId = $_POST['restaurantId'];
        $opinions = $_POST['opinion'];
        if($selectedRating==0) {
            echo '<script>alert("未選擇評分");window.location.href="opinion.php";</script>';
        } else{

        // 检查 BAR 是否存在
        $query = "SELECT `bar_id` FROM `bar` WHERE `bar_name` = '$selectedBarName'";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $barID = $row['bar_id'];
        } else {
            // 如果 BAR 不存在，则进行相应操作，例如给出错误提示
            echo '<script>alert("BAR不存在");window.location.href="opinion.php";</script>';
            exit();
        }
        
        // 检查用户是否存在
        $query1 = "SELECT `user_id` FROM `user` WHERE `user_id` = '$restaurantId'";
        $result = $conn->query($query1);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $USERID = $row['user_id'];
        } else {
            // 如果用户不存在，则进行相应操作，例如创建新用户或给出错误提示
            echo '<script>alert("用戶不存在");window.location.href="opinion.php";</script>';
            exit();
        }

        // 构建更新数据库的SQL查询语句
        $INSERTSql = "INSERT INTO `record` (`record_time`, `user_id`, `bar_id`, `bar_score`, `opinion`) VALUES ('$recordTime', '$USERID', '$barID', '$selectedRating', '$opinions')";

        // 执行更新操作
        if ($conn->query($INSERTSql) === TRUE) {
            echo '<script>alert("評分插入成功")</script>';
        } else {
            echo "評分插入失敗: " . $conn->error;
        }
        //選擇現在這家店目前的平均分數
        $sql="SELECT avg(record.bar_score) as avgScore from bar,record WHERE record.bar_id=bar.bar_id and bar.bar_name='$selectedBarName'";
        while($row = ($conn->query($sql))->fetch_assoc()) {
            $new_score=$row['avgScore'];
            break;
        }
        $updateSql = "UPDATE `bar` SET `bar_score`=$new_score WHERE bar_name ='$selectedBarName'";

        //更新新的分數
        if($conn->query($updateSql)=== TRUE) {
            echo '<script>alert("店家更新成功")</script>';
        } else {
            echo "更新失敗" .$conn -> error;
        }
        }
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <script>
    const urlParams = new URLSearchParams(window.location.search);
    const restaurantId = urlParams.get('rid');
    const currentId = urlParams.get('cid');
    </script>
    <title>BAR HOPPER Opinion</title>
    <meta http-equiv="Content-Type" content="text/html">
    <meta charset="UTF-8">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <style>
        body {
            background-color: rgb(53, 51, 51);
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
        li{
            list-style: none;
        }
        a{
            color: rgb(255, 255, 255);
            text-decoration: none;
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
        .nav-branding{
            font-size: 2rem;
        }
        .nav-menu{
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 60px;
        }
        .nav-link{
            transition: 0.3s ease-out;
        }
        .nav-link:hover{
            color: dodgerblue;
        }
        .hamburger{
            display: none;
            cursor: pointer;
        }
        .form-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            text-align: center;
        }
        .form-container table {
            width: 100%;
        }
        tr {
            height: 100px;
        }   
    </style>
</head>
<body>
    <header>
        <div class = "container">
            <nav class = "navbar">
                <h3 class = "nav-branding">Bar Hopper</h3>
                <ul class = "nav-menu">
                    <li class = "nav-item">
                        <a href= "login.php" class = "nav-link">登出</a>
                    </li>
                    <li class = "nav-item">
                        <a href= "Bar_search.php" class = "nav-link">找 Bar</a>
                    </li>
                    <li class = "nav-item">
                        <a href= "Alc_search.php" class = "nav-link">找 酒</a>
                    </li>
                    <li class = "nav-item">
                        <a href= "opinion.php" class = "nav-link">評分專區</a>
                    </li>
                    <li class = "nav-item">
                        <a href= "record.php" class = "nav-link">我的紀錄</a>
                    </li>
                </ul>
                <div class = "hamburger">
                    <span class = "bar"></span>
                    <span class = "bar"></span>
                    <span class = "bar"></span>
                </div>
            </nav>
        </div>    
    </header>
    <?php
        //搜尋等級列表(add_role) 中的所有會員等級
		$query = "SELECT * FROM site";
		$result = mysqli_query($conn, $query);
	?>
    <div class="form-container">
        <form action="#" method="post">
            <input type="hidden" name="restaurantId" value="<?php echo $restaurantId; ?>" id="restaurantId">
            <input type="hidden" name="currentId" value="<?php echo $currentId; ?>">
            <table border="0px" width="600px" height="400px" align="center" cellpadding="25px" cellspacing="0px">
                <!-- 表格内容 -->
                <tr>
                    <td colspan="5">
                        <font size="8"><b>評分專區</b></font>
                    </td>
                </tr>
                <tr>
                    <td align="center"><b style="font-size: 30px; ">區域</b></td>
                    <td>
                    <form id="siteForm" method="POST" action="opinion.php">
                        <select name="site" style="font-size: 20px;" onchange="submitForm(this)">
                            <option value="">全部</option>
                            <?php while($row = mysqli_fetch_array($result)): ?>
                                <option value="<?php echo $row['site_name'] ?>"  
                                    <?php if($site == $row['site_name']){echo "selected";} ?> 
                                >
                                    <?php echo $row['site_name'] ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </form>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size: 30px;"><b>BAR NAME</b></td>
                    <td>
                        <select name="bar_name"  style="font-size: 20px;">
                        <?php echo $options; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size: 30px;"><b>星等評分</b></td>
                    <td style="font-size: 25px;">
                        <input type="radio" name="star" value="1" />☆
                        <input type="radio" name="star" value="2" />☆☆
                        <input type="radio" name="star" value="3" />☆☆☆
                        <input type="radio" name="star" value="4" />☆☆☆☆
                        <input type="radio" name="star" value="5" />☆☆☆☆☆
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size: 30px;"><b>寶貴意見</b></td>
                    <td align="left">
                        <textarea rows="5" cols="50" id="opinion" name="opinion"></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center" >
                      <input type="submit" value="送出評分" name="submit_rating" style="font-size: 20px;"/>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <script>
        function submitForm(selectElement) {
            sessionStorage.setItem("selectedSite", selectElement.value);
            selectElement.form.submit();
        }

        // 頁面載入後，檢查是否有選擇的區域值，並將其設定為選中
        window.onload = function() {
            var selectedSite = sessionStorage.getItem("selectedSite");
            if (selectedSite) {
                var selectElement = document.querySelector("select[name='site']");
                selectElement.value = selectedSite;
            }
        };
    </script>
      
    
</body>
</html>


