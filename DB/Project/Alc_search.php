<?php 
session_start();
$curr_permission=$_SESSION['permission'];
if ($curr_permission!='B') {
    echo '<script>alert("'.$curr_permission.'請先登入");window.location.href="login.php";</script>';
}

include('action.php');  // 引入連線的.php
$restaurantId = $_SESSION['user_id'];
$_SESSION['user_id']= $restaurantId;
// 獲取用戶输入的區域、評分和搜尋關鍵字
$type = $_GET['type'] ?? '';
$keyword = $_GET['search'] ?? '';

// SQL 查詢資料庫
$query = "SELECT * FROM `bar` NATURAL JOIN `menu` NATURAL JOIN `alc_ele` NATURAL JOIN `alcohol` NATURAL JOIN `element` NATURAL JOIN `type` Where 1";

if (!empty($type)) {
    $query .= " AND (`type_id`='$type')";
}

if (!empty($keyword)) {
    $query0 = $query. " AND ((`alc_name` LIKE '%$keyword%') OR (`ele_name` LIKE '%$keyword%'))";
    $run = mysqli_query($con, $query0);
    $new_query = "SELECT * FROM `bar` NATURAL JOIN `menu` NATURAL JOIN `alc_ele` NATURAL JOIN `alcohol` NATURAL JOIN `element` NATURAL JOIN `type` Where ";

    while ($row = mysqli_fetch_assoc($run)) {
        $alc_name = $row['alc_name'];
        $query0 .= " OR ( `alc_name` like '$alc_name')";
    }
    $query =$query0;
}

$query_run = mysqli_query($con, $query);

?>

<!DOCTYPE html>
<head>
    <title>BAR HOPPER Alc</title>
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
            grid-template-columns: 27% 34% 5%;
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
        table thead td {
            background-color: #54585d;
            color: black;
            font-weight: bold;
            font-size: 20px;
            border: 1px solid #54585d;
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
                    <a onclick="logout();" class = "nav-link" href="login.php">登出</a>
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

    <!--篩選-->
    <form method="GET" action="Alc_search.php">
        <div class = "wrap"> 
            <!--type下拉式選單-->   
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
            <!--關鍵字查詢-->
            <input class = "search-bar" type="text" 
                id = "search" name = "search" style="font-size: 20px;" placeholder="請輸入關鍵字">
            <button class = "search-btn" type = "submit"><ion-icon name="search-outline"></ion-icon></button>
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
            $bar_id   = $row['bar_id'];

            if (!isset($mergedData[$alc_name])) {
                $mergedData[$alc_name] = array(
                    'ele_names' => array($ele_name),
                    'bar_names' => array($bar_name),
                    'bar_ids' => array($bar_id)
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
                    <td>推薦Bar</td>
                </tr>
            </thead>
            <tbody>';

        // 显示合并后的数据
        foreach ($mergedData as $alc_name => $data) {
            $uniqueEleNames = array_unique($data['ele_names']);
            $eleNamesString = implode(', ', $uniqueEleNames);

            echo '<tr>
                <td rowspan="' . count($data['bar_names']) . '">' . $alc_name . '</td>
                <td rowspan="' . count($data['bar_names']) . '">' . $eleNamesString . '</td>';

            $firstBarName = true;
            $i=0;
            foreach ($data['bar_names'] as $bar_name) {
                $sql ="SELECT bar_id FROM bar WHERE bar_name = '$bar_name'";
                $result = $con->query($sql);
                $row = $result->fetch_assoc();
                $bar_id = $row['bar_id'];
        
                if (!$firstBarName) {
                    echo '<tr>';
                }
                echo '<td><a href="Bar_info.php?new='.$bar_id.'">' .$bar_name . '<a></td>';
                echo '</tr>';
                $firstBarName = false;
                $i++;
            }
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
                var url = 'Alc_search.php?type=' + selectedtype;
                
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
        function logout() {
            $_SESSION['permission'] = 'C';
        };
    </script>

</body>
</html>


