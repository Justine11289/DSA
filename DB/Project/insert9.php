<?php
session_start();
$curr_permission=$_SESSION['permission'];
if ($curr_permission!='A') {
    echo '<script>alert("'.$curr_permission.'你沒有權限");window.location.href="admin.php";</script>';
}
include("action.php");
$alcId = $_GET['alc_id'] ?? '';



if(isset($_POST['add_button'])) {
    $new_ele = $_POST['ele'];
    //檢查新ele是否存在
    $check_account_sql = "SELECT * FROM `element` WHERE `ele_name` = '$new_ele'";
    $result = $con->query($check_account_sql);
    if ($result->num_rows > 0) {
        echo '<script>alert("'.$new_ele.'已存在。")</script>';
    } else if(($new_ele==NULL)){      // 沒新增就不做事

    } else {
        //先插入新元素到資料庫
        $sql ="INSERT INTO `element`(`ele_id`, `ele_name`) VALUES ('','$new_ele')";
        if ($con->query($sql) === TRUE) {
            echo '<script>alert("新增成功！");</script>';
        } else {
            echo "新增失敗：" . $con->$error;
        }

    }
}
if(isset($_POST['check_button'])) {
    $type = $_POST['type'];
    $new_name = $_POST['new_name'];

    if(($type == 'NULL')||($new_name == '')) {
        echo '<script>alert("請完整填寫各欄位！")</script>';
    } else {


    //check有沒有選
    if(isset($_POST['selected_options'])) {
        if($_POST) {
            $eles=$_POST['selected_options'];
            // for($i=0;$i<count($eles);$i++){
            //     echo $eles[$i]."  ";
            // }
            $allele = implode (",", $eles);
        }        
    } else {
        echo '<script>alert("請選擇至少一個成分！")</script>';
    }
    

    $sql ="SELECT * FROM `alcohol` ORDER BY alc_id DESC LIMIT 1";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    $alcId = $row['alc_id']+1;

        
    //檢查新name是否存在
    $check_account_sql = "SELECT * FROM `alcohol` WHERE `alc_name` = '$new_name'";
    $result = $con->query($check_account_sql);
    if ($result->num_rows > 0) {
        echo '<script>alert("'.$new_name.'已存在。")</script>';
    } else {
        $insertSql = "INSERT INTO `alcohol`(`alc_id`, `alc_name`, `type_id`) VALUES ($alcId,'$new_name','$type')";
        if ($con->query($insertSql) === TRUE) {
            foreach($eles as $checkele) {
                //以checkbox回傳陣列插入
                $sql = "INSERT INTO `alc_ele`(`alc_id`, `ele_id`) VALUES ($alcId,$checkele)";
                if ($con->query($sql) === TRUE) {
                    echo '';
                } else {
                    echo "新增失敗：" . $con->$error;
                }        
            }
        } else {
            echo "新增失敗：" . $con->$error;
        }

    }
    echo '<script>alert("新增成功！");</script>';


}

}

    


?>

<!DOCTYPE html>
<html>
  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BAR HOPPER InsertAlc</title>
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
            max-width: 1100px;
            margin: 0 auto;
            text-align: center;
        }
        .form-container table {
            width: 100%;
        }
        tr {
            height: 50px;
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
		$result = mysqli_query($con, $query);
	?>
    <div class="form-container">
        <form action="#" method="post">
            <table border="0px" width="500px" height="400px" align="center" cellpadding="25px" cellspacing="0px">
                <!-- 表格內容 -->
                <tr height="40px">
                    <td colspan="5">
                        <font size="8"><b>新增酒品</b></font>
                    </td>
                </tr>
                <tr>
                    <td align="center"><b style="font-size: 30px;">酒品名</b></td>
                    <td><input id="new_name" type="text" name="new_name" placeholder="輸入酒品名" style="font-size: 20px;"></td>
                </tr>
                <tr>
                    <td align="center"><b style="font-size: 30px; ">種類</b></td>
                    <td>
                        <select id = "type" name = "type" style="font-size: 20px;"> 
                            <option value=NULL>Type</option>
                            <?php
                            $typeQuery = "SELECT * FROM `type`";
                            $typeQuery_run = mysqli_query($con, $typeQuery);
                            if ($typeQuery_run) {
                                while ($typeRow = mysqli_fetch_assoc($typeQuery_run)) {
                                    $type_id = $typeRow['type_id'];
                                    $type_name = $typeRow['type'];
                                    echo "<option value='$type_id' ".($type_id==$type ? 'selected' : '').">$type_name</option>";
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="center"><b style="font-size: 30px;">成分</b></td>
                    <td align="center" style="width: 900px; text-align:center; border: 1px solid white; padding: 5px;">
                    <table id="elementTable">
                        <?php
                            $eleQuery = "SELECT * FROM `element`";
                            $eleQuery_run = mysqli_query($con, $eleQuery);
                            $alceleQuery = "SELECT * FROM `element` NATURAL JOIN `alc_ele`";
                            $alceleQuery_run = mysqli_query($con, $alceleQuery);
                            if ($eleQuery_run) {
                                $options = array();
                                while ($eleRow = mysqli_fetch_assoc($eleQuery_run)) {
                                $options[] = [
                                    'value' => $eleRow['ele_id'],
                                    'label' => $eleRow['ele_name']
                                ];
                                }
                                
                                $counter = 0; // 計數器，用於限制每列顯示的選項數量

                                foreach ($options as $option) {
                                    if ($counter % 8 === 0) {
                                        echo '<tr>'; // 開始新的表格行
                                    }

                                    ?>
                                    <!-- 顯示酒品目前元素 -->
                                    <td><input type="checkbox" name="selected_options[]" value="<?=$option['value']?>"></td>
                                    <?php 
                                    echo '<td>' . $option['label'] . '</td>';

                                    $counter++;

                                    if ($counter % 8 === 0) {
                                        echo '</tr>'; // 結束當前表格行
                                    }
                                }
                                if ($counter % 8 !== 0) {
                                $remainingCells = 8 - ($counter % 8); // 計算剩餘的空單元格
                                for ($i = 0; $i < $remainingCells; $i++) {
                                    echo '<td></td><td></td>'; // 添加空單元格，保持表格布局整齊
                                }
                                echo '</tr>'; // 結束最後一行
                                }
                            }
                            ?>
                        </table>
                    </td>
                </tr>                    
                <tr>
                    <td align="center"><b style="font-size: 30px;">其他成分</b><br></td>
                    <td><input id="ele" type="text" name="ele" placeholder="其他成分" style="font-size: 20px;"><button name='add_button' type='submit' style="font-size: 20px;" onclick="javascript:return add()">新增</button></td>
                </tr>
                <tr>
                    <td colspan="2" align="center" style="font-size: 20px;">
                        <button name='check_button' type='submit' style="font-size: 20px;"  onclick="javascript:return add()">確認</button>
                    </td>
                </tr>
            </table>
         </form>
    </div>


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
