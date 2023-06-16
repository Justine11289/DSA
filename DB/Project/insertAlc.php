<?php 
session_start();

include('action.php');  // 引入連線的.php
$curr_permission=$_SESSION['permission'];
if ($curr_permission!='A') {
    echo '<script>alert("'.$curr_permission.'你沒有權限");window.location.href="admin.php";</script>';
}

// 獲取用戶输入的區域、評分和搜尋關鍵字
$type = $_GET['type'] ?? '';
$keyword = $_GET['search'] ?? '';

// SQL 查詢資料庫
$query = "SELECT * FROM `bar` NATURAL JOIN `menu` NATURAL JOIN `alc_ele` NATURAL JOIN `alcohol` NATURAL JOIN `element` NATURAL JOIN `type` Where 1";

if (isset($_POST['delete_bar'])) {
    $delbar =$_POST['bar_id'];
    $delAlc =$_POST['alc_id'];

    $delSql="DELETE FROM `menu` WHERE bar_id =$delbar AND alc_id =$delAlc";
    if($con->query($delSql)=== TRUE) {
        echo '<script>alert("刪除成功")</script>';
    } else {
        echo "更新失敗" .$conn -> error;
    }


}
if (isset($_POST['delete_alc'])) {
    $delAlc =$_POST['alc_id'];

    $delSql="DELETE FROM `alcohol` WHERE alc_id =$delAlc";
    if($con->query($delSql)=== TRUE) {
        echo '<script>alert("刪除成功")</script>';
    } else {
        echo "更新失敗" .$conn -> error;
    }


}

$query_run = mysqli_query($con, $query);

?>

<!DOCTYPE html>
<head>
    <title>BAR HOPPER EditAlc</title>
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
        .bar{
            display: block;
            width: 25px;
            height: 3px;
            margin: 5px auto;
            -webkit-transition: all 0.3s ease;
            transition: all 0.3s ease;
            background-color: white;
        }
        @media(max-width:1024px){
            .hamburger{
            display: block;
            }
        .hamburger.active .bar:nth-child(2){
            opacity: 0;
            }
        .hamburger.active .bar:nth-child(1){
            transform: translateY(8px) rotate(45deg);
            }
        .hamburger.active .bar:nth-child(3){
            transform: translateY(-8px) rotate(-45deg);
            }
        .nav-menu{
            position: fixed;
            left: -100%;
            top: 70px;
            gap: 0;
            flex-direction: column;
            background-color: #262626;
            width: 100%;
            text-align: center;
            transition: 0.3s;
            z-index: 2; 
        }
        .nav-item{
            margin: 16px 0;
            }
        .nav-menu.active{
            left: 0;
            }
        }
        select, input, button{
            border: none;
            padding: 3px  25px;
            border-radius: 5px;    
        }
        
        select:focus{
            outline:none;
        }

        button:hover{
            outline:none;
            background-color:#b1abab;
        }

        .wrap{
            max-width: 1224px;
            width: 70%;
            margin: 10px auto;
            display: grid;
            grid-template-columns: 15% 15% 20%;
            text-align: center;
            gap: 2%;
        }

        table {
            border-collapse: collapse;
            font-family: Tahoma, Geneva, sans-serif;
            margin: 15px auto;
            
        }
        table td {
            padding: 15px;
            
        }
        thead {
            position: sticky;
            top: 0;
        }
        table thead td {
            background-color: #54585d;
            color: black;
            font-weight: bold;
            font-size: 20px;
            border: 1px solid #54585d;
            z-index: 1;
        }
        table tbody td {
            color: #eeedf8;
            border-radius: 10px; 
            border: 2px solid #3c3f42;
        }
        table tbody tr {
            background-color: #1a1c1e;
            
        }
        table tbody tr:nth-child(odd) {
            background-color: #161a1e;
        }
        tr:hover .hovor{
            background-color:#b3afaf;
            transition: all 0.3s ease-in-out;
        }
    </style>
</head>

<body>
    <!--burger菜單-->
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
    <!--篩選-->
    <form method="GET" action="insertAlc.php">
        <div class = "wrap"> 
            <a href="insert9.php">新增酒品</a>
            <a href="change9.php">編輯酒品</a>
            <a href="change98.php">編輯推薦bar</a>
        </div>
    </form>
    
    <?php
    if (mysqli_num_rows($query_run) > 0) {
        // 用于存储合并后的数据
        $mergedData = array();

        // 用于存储已经出现过的 bar_name
        $uniqueBarNames = array();

        // 将相同 alc_name 的 ele_name 和 bar_name 合并成一行数据
        while ($row = mysqli_fetch_assoc($query_run)) {
            $alc_name = $row['alc_name'];
            $ele_name = $row['ele_name'];
            $bar_name = $row['bar_name'];

            if (!isset($mergedData[$alc_name])) {
                $mergedData[$alc_name] = array(
                    'ele_names' => array($ele_name),
                    'bar_names' => array($bar_name)
                );

                // 将第一次出现的 bar_name 加入已经出现过的数组
                $uniqueBarNames[] = $bar_name;
            } else {
                $mergedData[$alc_name]['ele_names'][] = $ele_name;

                // 如果 bar_name 没有出现过，则加入合并数据中，并将其加入已经出现过的数组
                if (!in_array($bar_name, $uniqueBarNames)) {
                    $mergedData[$alc_name]['bar_names'][] = $bar_name;
                    $uniqueBarNames[] = $bar_name;
                }
            }
        }

        echo '<div style="display: flex; justify-content: center;">
            <table style="width: 80%;">
            <thead>
                <tr>
                    <td>酒品名稱</td>
                    <td>成分</td>
                    <td>刪除酒品</td>
                    <td>刪除推薦Bar</td>
                </tr>
            </thead>
            <tbody>';

        // 显示合并后的数据
        foreach ($mergedData as $alc_name => $data) {
            $uniqueEleNames = array_unique($data['ele_names']);
            $eleNamesString = implode(', ', $uniqueEleNames);
            $rowspan = count($data['bar_names']);
            $sql ="SELECT * FROM menu NATURAL JOIN alcohol WHERE alc_name = '$alc_name'";
            $result = $con->query($sql);
            $row = $result->fetch_assoc();
            $alc_id = $row['alc_id'];

            echo '<tr>
                <td rowspan="' . $rowspan . '">' . $alc_name . '</td>
                <td rowspan="' . $rowspan . '">' . $eleNamesString . '</td>';
                
            echo '<td rowspan="' . $rowspan . '">
                <form method="post" action="">
                <input type="hidden"
                       name="alc_id" 
                       value="'.$alc_id.'">
                    <button name="delete_alc" class="badge badge-danger" onclick="javascript:return del();">
                        刪除
                    </button>
                </form>
            </td>';
            $firstBarName = true;
            foreach ($data['bar_names'] as $bar_name) {
                $sql ="SELECT bar_id FROM bar WHERE bar_name = '$bar_name'";
                $result = $con->query($sql);
                $row = $result->fetch_assoc();
                $bar_id = $row['bar_id'];
                // $sql ="SELECT * FROM menu NATURAL JOIN alcohol WHERE alc_name = '$alc_name'";
                // $result = $con->query($sql);
                // $row = $result->fetch_assoc();
                // $alc_id = $row['alc_id'];
                if (!$firstBarName) {
                    echo '<tr>';
                }
                echo "<form method='post' action=''>
                <input type='hidden'
                       name='alc_id' 
                       value=".$alc_id.">  
                <input type='hidden' 
                       name='bar_id' 
                       value=".$bar_id.">";
                echo '<td>' . $bar_name . '<br><button name="delete_bar" class="badge badge-danger" onclick="javascript:return del();">
                刪除
            </button></td></form>';
                $firstBarName = false;
            }
            
            echo '</tr>';
        }


        echo '</tbody>
            </table>
            </div>';
    } else {
        echo "No results found";
    }
    ?>


    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // 獲取區域和評分的下拉框元素
            var typeSelect = document.getElementById('type');

            // 監聽選擇值的變化
            typeSelect.addEventListener('change', filterBars);
            
            function filterBars() {
                var selectedtype = typeSelect.value;
                
                // 構建重定向URL，將選擇的值作為參數傳遞给search.php
                var url = 'insertAlc.php?type=' + selectedtype;
                
                // 重定向到篩選結果頁面
                window.location.href = url;
            }
        });
    </script>
    

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        const hamburger = document.querySelector(".hamburger");
        const navMenu = document.querySelector(".nav-menu");
        hamburger.addEventListener("click", () => {
            hamburger.classList.toggle("active");
            navMenu.classList.toggle("active");
        })
    </script>
    <script type="text/javascript">
        function del() {
	        var msg = "您真的確定要刪除嗎？\n\n請確認！";
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


