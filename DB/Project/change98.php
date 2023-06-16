<?php
session_start();
$curr_permission=$_SESSION['permission'];
if ($curr_permission!='A') {
    echo '<script>alert("'.$curr_permission.'你沒有權限");window.location.href="admin.php";</script>';
}
include("action.php");

$conn = new mysqli($host, $user, $password, $database);
$type = $_GET['type'] ?? '';

if(isset($_POST['check_button'])) {
    $bar_id=$_POST['bar_name'];
    $alc_id=$_POST['alc_id'];
    $insertSql = "INSERT INTO `menu`(`bar_id`, `alc_id`) VALUES ($bar_id,$alc_id)";
    if ($con->query($insertSql) === TRUE) {
        echo '<script>alert("新增成功！")</script>';
    } else {
        echo "新增失敗：" . $con->$error;
    }   
}

if (isset($_POST['type'])) {
        $selectedRegion1 = $_POST['type'];
    
        // 查询符合区域的 BAR 名称
        $sql1 = "SELECT * FROM `alcohol` WHERE `type_id` ='$selectedRegion1'";
    
        $result = $con->query($sql1);
    
        $options1 = '<option value="">alc name</option>'; // 默认选项
    
        if ($result->num_rows > 0) {
            // 将匹配的 BAR 名称添加到选项中
            while ($row = $result->fetch_assoc()) {
                $alcName=$row['alc_name'];
                $alc_id = $row['alc_id'];
                $options1 .= "<option value=\"$alc_id\">$alcName</option>";
            }
        } else {
            $options1 .= "<option value=\"\">未找到匹配的 BAR</option>";
        }
    
    // 查询符合区域的 BAR 名称
    $sql = "SELECT * FROM `bar`";

    $result1 = $con->query($sql);

    $options = '<option value="">bar name</option>'; // 默认选项

    if ($result1->num_rows > 0) {
        // 将匹配的 BAR 名称添加到选项中
        while ($row = $result1->fetch_assoc()) {
            $bar_id=$row['bar_id'];
            $barName = $row['bar_name'];
            $options .= "<option value=\"$bar_id\">$barName</option>";
        }
    } else {
        $options .= "<option value=\"\">未找到匹配的 BAR</option>";
    }



}










?>

<!DOCTYPE html>
<html>
  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BAR HOPPER AlcBar</title>
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
                        <a onclick="javascript:logout()" class = "nav-link" href="admin.php">登出</a>
                    </li>
                    <li class = "nav-item">
                        <a href= "insertBar.php" class = "nav-link">管理Bar</a>
                    </li>
                    <li class = "nav-item">
                        <a href= "insertAlc.php" class = "nav-link">管理酒</a>
                    </li>
                    <li class = "nav-item">
                        <a href= "delRecord.php" class = "nav-link">管理評論</a>
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
		$query = "SELECT * FROM type";
		$result = mysqli_query($conn, $query);

	?>
    <div class="form-container">
        <form action="#" method="post">
            <table border="0px" width="500px" height="400px" align="center" cellpadding="25px" cellspacing="0px">
                <!-- 表格內容 -->
                <tr height="40px">
                    <td colspan="5">
                        <font size="8"><b>新增推薦Bar
                        </b></font>
                    </td>
                </tr>
                <tr>
                    <td align="center"><b style="font-size: 30px; ">種類</b></td>
                    <td>
                        <select name="type" style="font-size: 20px;" onchange="submitForm(this)">
                            <option value="">全部</option>
                            <?php while($row = mysqli_fetch_array($result)): ?>
                                <option value="<?php echo $row['type_id'] ?>"  
                                    <?php if($type == $row['type']){echo "selected";} ?> 
                                >
                                    <?php echo $row['type'] ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    
                    </td>
                </tr>
                
                <tr>
                    <td align="center" style="font-size: 30px;"><b>酒品名</b></td>
                    <td>
                        <select name="alc_id"  style="font-size: 20px;">
                        <?php echo $options1; ?>
                        
                        </select>
                    </td>
                </tr>

                <?php
                    //搜尋等級列表(add_role) 中的所有會員等級
                    $query1 = "SELECT * FROM bar";
                    $result1 = mysqli_query($conn, $query1);
                ?>

                <tr>
                    <td align="center" style="font-size: 30px;"><b>BAR NAME</b></td>
                    <td>
                    <select name="bar_name" style="font-size: 20px;">
                    <?php echo $options; ?>
                        </select>
                    </td>
                </tr>                 
                <tr>
                    <td colspan="2" align="center" style="font-size: 20px;">
                        <button name='check_button' type='submit' style="font-size: 20px;" onclick="javascript:return add()">確認</button>
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
                var selectElement = document.querySelector("select[name='type']");
                selectElement.value = selectedSite;
            }
        };
        function submitForm1(selectElement) {
            sessionStorage.setItem("selectedSite1", selectElement.value);
            selectElement.form.submit();
        }

        // 頁面載入後，檢查是否有選擇的區域值，並將其設定為選中
        window.onload = function() {
            var selectedSite = sessionStorage.getItem("selectedSite1");
            if (selectedSite) {
                var selectElement = document.querySelector("select[name='site']");
                selectElement.value = selectedSite;
            }
        };

    </script>
        <script type="text/javascript">
        function add() {
	        var msg = "確定新增嗎？";
	        if (confirm(msg)==true)
	        {
                return true;
	        }
	        else
	        {
		        return false;
	        }
        }
        function logout() {
            $_SESSION['permission'] = 'C';
        }
    </script>

</body>
</html>
