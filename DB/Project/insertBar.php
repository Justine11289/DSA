<?php 
session_start();
$curr_permission=$_SESSION['permission'];
if ($curr_permission!='A') {
    echo '<script>alert("'.$curr_permission.'你沒有權限");window.location.href="admin.php";</script>';
}

include('action.php');  // 引入連線的.php

// 獲取用戶输入的區域、評分和搜尋關鍵字
$site = $_GET['site'] ?? '';
$score = $_GET['bar_score'] ?? '';
$keyword = $_GET['search'] ?? '';
$cid = $_GET['cid'] ?? ''; // 取得原本的cid值
$rid = $_GET['rid'] ?? ''; // 取得原本的rid值

// SQL 查詢資料庫
$query = "SELECT * FROM `bar` WHERE 1";

if (!empty($site)) {
    $query .= " AND (`site_id`='$site')";
}

if (!empty($score)) {
    $query .= " AND (`bar_score` >= '$score' AND `bar_score` < '$score'+ 1)";
}

if (!empty($keyword)) {
    $query .= " AND (`bar_name` LIKE '%$keyword%')";
}

$query_run = mysqli_query($con, $query);

?>

<!DOCTYPE html>
<head>
    <title>BAR HOPPER EditBar</title>
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
            padding: 3px 25px;
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
            width: 90%;
            margin: 10px auto;
            display: grid;
            grid-template-columns: 22% 22% 35% 5%;
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
            font-size: 13px;
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
    <form method="GET" action="insertBar.php">
        <div class = "wrap"> 
            <a href="insert98.php">新增</a>
        </div>
    </form>

    <?php
        if (mysqli_num_rows($query_run) > 0) {
            while ($row = mysqli_fetch_assoc($query_run)) { 
                $var = $row['bar_id'];
    ?>
               
    <div style="display: flex; justify-content: center;">
    <table style="width: 60%;">
        <tbody >
            <tr>
                <td colspan = "2" class = "hovor">
                    <a href= "<?php echo "changebar.php?new=".$var ?>">
                        <img src="<?php echo $row['menu_image'];?>" style="display:block; margin:auto;" width="350" height="395" alt="Menu Image " />
                    </a>
                </td>
            </tr>
            <tr >
                <td ><?php echo $row['bar_name']; ?></td>
                <td ><?php echo $row['bar_score']; ?></td>
            </tr>
        </tbody>
    </table>
    </div>
    
    
    <?php
		    }
	    } else {
            echo "No results found";
        }
	?>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // 獲取區域和評分的下拉框元素
            var siteSelect = document.getElementById('site');
            var scoreSelect = document.getElementById('bar_score');

            // 監聽選擇值的變化
            siteSelect.addEventListener('change', filterBars);
            scoreSelect.addEventListener('change', filterBars);

            function filterBars() {
                var selectedSite = siteSelect.value;
                var selectedScore = scoreSelect.value;
                var url = 'insertBar.php?site=' + selectedSite + '&bar_score=' + selectedScore;
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
            sessionStorage.clear();
            $_SESSION['permission'] = 'C';
        };
    </script>


</body>
</html>


