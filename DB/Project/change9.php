<?php
session_start();
$curr_permission=$_SESSION['permission'];
if ($curr_permission!='A') {
    echo '<script>alert("'.$curr_permission.'你沒有權限");window.location.href="admin.php";</script>';
}
include("action.php");
$alcId = $_GET['alc_id'] ?? '';
$query = "SELECT * FROM alc_ele";
$query_run = mysqli_query($con, $query);
$alcId = 1; // 進入預設為1
if(isset($_POST['alcId'])) {
    $alcId=$_POST['alcId'];
    $sql = "SELECT * FROM alc_ele WHERE alc_id = $alcId";
    $result = $con->query($sql);
    $cur_eles=array();
foreach($result as $cur_ele) {
    array_push($cur_eles, $cur_ele["ele_id"]);
}

// echo '<pre>'; print_r($cur_eles); echo '</pre>';

}

if($_POST) {
    $eles=$_POST['selected_options'];
    // for($i=0;$i<count($eles);$i++){
    //     echo $eles[$i]."  ";
    // }
    $allele = implode (",", $eles);
}
if(isset($_POST['check_button'])) {
    if($_POST['alcId']!=NULL) {
        $new_ele = $_POST['ele'];

        $alcId = $_POST['alcId'];
        if(isset($_POST['new_name'])) 
        $new_name = $_POST['new_name'];
        $type = $_POST['type'];
        //修改type
        if($type) {
            $updateSql = "UPDATE `alcohol` SET `type_id`='$type' WHERE alc_id=$alcId";
            if ($con->query($updateSql) === TRUE) {
                echo '';
            } else {
                echo "更新失敗：" . $con->$error;
            }
        }
        //檢查新name是否存在
        $check_account_sql = "SELECT * FROM `alcohol` WHERE `alc_name` = '$new_name'";
        $result = $con->query($check_account_sql);
        if ($result->num_rows > 0) {
            echo '<script>alert("'.$new_name.'已存在。")</script>';
        } else if($new_name==NULL) {
            //不更改
        } else {
            //更新酒品名稱
            $sql ="UPDATE `alcohol` SET `alc_name`='$new_name' WHERE alc_id=$alcId";
            if ($con->query($sql) === TRUE) {
                echo '<script>alert("更新成功！");</script>';
            } else {
                echo "更新失敗：" . $con->$error;
            }
        }
        //先刪光原有ele
        $delSql = "DELETE FROM alc_ele WHERE alc_id = $alcId";
        $query_run = mysqli_query($con, $delSql);
        foreach($eles as $checkele) {
            //以checkbox回傳陣列插入
            $sql = "INSERT INTO `alc_ele`(`alc_id`, `ele_id`) VALUES ($alcId,$checkele)";
            if ($con->query($sql) === TRUE) {
                echo '';
            } else {
                echo "新增失敗：" . $con->$error;
            }        }

        

        //檢查新ele是否存在
        $check_account_sql = "SELECT * FROM `element` WHERE `ele_name` = '$new_ele'";
        $result = $con->query($check_account_sql);
        if ($result->num_rows > 0) {
            echo '<script>alert("'.$new_ele.'已存在。")</script>';
        } else if($new_ele==NULL){      // 沒新增就不做事

        } else {
            //先插入新元素到資料庫
            $sql ="INSERT INTO `element`(`ele_id`, `ele_name`) VALUES ('','$new_ele')";
            if ($con->query($sql) === TRUE) {
                echo '<script>alert("新增成功！");</script>';
            } else {
                echo "新增失敗：" . $con->$error;
            }

        }

    } else {
        echo '<script>alert("未選擇欲更改之酒品！")</script>';
    }
}
?>

<!DOCTYPE html>
<html>
  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BAR HOPPER ChangeAlc</title>
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
    
    <div class="form-container">
        <form action="#" method="post">
            <table border="0px" width="500px" height="400px" align="center" cellpadding="25px" cellspacing="0px">
                <!-- 表格內容 -->
                <tr height="40px">
                    <td colspan="5">
                        <font size="8"><b>編輯酒品</b></font>
                    </td>
                </tr>
                <tr>
                    <td align="center"><b style="font-size: 30px;">欲更改之酒品</b></td>
                    <td>
                        <select id="alcIdSelect" name="alcId" style="font-size: 20px;" onchange="submitForm(this)"> 
                            <option value="" required>酒品</option>
                            <?php
                            $alcQuery = "SELECT * FROM `alcohol`";
                            $alcQuery_run = mysqli_query($con, $alcQuery);
                            
                            if ($alcQuery_run) {
                                while ($alcRow = mysqli_fetch_assoc($alcQuery_run)) {
                                    $alc_id = $alcRow['alc_id'];
                                    $alc_name = $alcRow['alc_name'];
                                    $selected = ($alc_id == $alc) ? 'selected' : '';
                                    
                                    echo "<option value='$alc_id' $selected>$alc_name</option>";
                                    
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="center"><b style="font-size: 30px;">更改酒品名</b></td>
                    <td><input id="bar_name" type="text" name="new_name" placeholder="輸入酒品名" style="font-size: 20px;" ></td>
                </tr>
                <tr>
                    <td align="center"><b style="font-size: 30px; ">更改種類</b></td>
                    <td>
                        <select id = "type" name = "type" style="font-size: 20px;"> 
                            <option value="">Type</option>
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
                <tr>
                    <td align="center"><b style="font-size: 30px;">成分</b></td>
                    <td align="center" style="width: 900px; text-align:center; border: 1px solid white; padding: 5px;">
                    <table id="elementTable">
                        <?php
                            $eleQuery = "SELECT * FROM `element`";
                            $eleQuery_run = mysqli_query($con, $eleQuery);
                            $alceleQuery = "SELECT * FROM `element` NATURAL JOIN `alc_ele` WHERE alc_ele.alc_id = '$alc_id'";
                            $alceleQuery_run = mysqli_query($con, $alceleQuery);
                            if ($eleQuery_run) {
                                $options = array();
                                while ($eleRow = mysqli_fetch_assoc($eleQuery_run)) {
                                $options[] = [
                                    'value' => $eleRow['ele_id'],
                                    'label' => $eleRow['ele_name']
                                ];
                                }
                                //echo "酒".$alc_id;

                                //$alcId=$_POST['alcId'];
                                $sql = "SELECT * FROM alc_ele WHERE alc_id = $alcId";
                                $result = $con->query($sql);
                                $cur_eles=array();
                                foreach($result as $cur_ele) {
                                    array_push($cur_eles, $cur_ele["ele_id"]);
                                }

                                $counter = 0; // 計數器，用於限制每列顯示的選項數量

                                foreach ($options as $option) {
                                    if ($counter % 8 === 0) {
                                        echo '<tr>'; // 開始新的表格行
                                    }

                                    ?>
                                    <!-- 顯示酒品目前元素 -->
                                    <td><input type="checkbox" name="selected_options[]" <?php if(in_array($option['value'], $cur_eles)) {echo "checked";} ?> value="<?=$option['value']?>"></td>
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
                    <td align="center"><b style="font-size: 30px;">新增成分</b><br></td>
                    <td><input id="ele" type="text" name="ele" placeholder="其他成分" style="font-size: 20px;"></td>

                </tr>
                <tr>
                    <td colspan="2" align="center" style="font-size: 20px;">
                        <button name="check_button"style="font-size: 20px;" onclick="javascript:return add()">確認</button>
                    </td>
                </tr>
            </table>
         </form>
    </div>


    </script>
    <script>
        function submitForm(selectElement) {
            sessionStorage.setItem("selectedSite", selectElement.value);
            selectElement.form.submit();
        }

        // 頁面載入後，檢查是否有選擇的區域值，並將其設定為選中
        window.onload = function() {
            var selectedSite = sessionStorage.getItem("selectedSite");
            if (selectedSite) {
                var selectElement = document.querySelector("select[name='alcId']");
                selectElement.value = selectedSite;
            }
        };
    </script>
    <script type="text/javascript">
        function add() {
	        var msg = "確定編輯嗎？";
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
