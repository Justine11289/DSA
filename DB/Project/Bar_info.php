<?php 
include('action.php');  // 引入連線的.php
$a = $_GET['new'];
$query = "SELECT * FROM `bar` NATURAL JOIN `time` JOIN `week` ON time.day = week.day_id WHERE bar_id = $a";
$query_run = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BAR HOPPER BarInfo</title>
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
            top: 35%;
            left: calc(50% - 40ch);
            transform: translate(-50%, -50%) scale(2);
        }
        
        .rating {
            position: absolute;
            top: 35%;
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
            left: calc(50% + 30ch);
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

        .bar-address {
            position: absolute;
            top: 85%;
            left: calc(50% + 30ch);
            transform: translate(-50%, -50%) scale(1);
        }
        
        .business-hours-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            background-color: rgb(70, 68, 68);
            padding: 5px;
        }

        .bar-map {
            position: absolute;
            top: 105%;
            left: calc(50% + 30ch);
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
            .bar-address,
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
        <div class = "container">
            <nav class = "navbar">
                <h3 class = "nav-branding">Bar Hopper</h3>
                <div class = "nav-menu">
                    <a href="Bar_search.php">
                        <ion-icon name="close-sharp" size="large"></ion-icon>
                    </a>
                </div>
            </nav>
        </div>
    </header>
    
    <?php
        if (mysqli_num_rows($query_run) > 0) {
            $row = mysqli_fetch_assoc($query_run);
            $menu = $row['menu_image'];
            $map = $row['map'];
            $address = $row['bar_address'];
            $score = $row['bar_score']
    ?>
    <div class="bar-info">
        <div class="bar-name"><?php echo $row['bar_name'];?></div>
        <div class="rating"><?php echo $score;?>☆</div>
        <div class="image-container"><img src = "<?php echo $menu;?>"style="max-width: 100%; max-height: 100%;" /></div>
        <div class="business-hours">
            <div class="business-hours-title">營業時間</div>
            <div class="business-hours-content">
                <?php
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
                    <div class="business-hours-row"><?php echo $row['day_name']; ?> <?php echo $formattedStartTime; ?> - <?php echo $formattedClosingTime; ?></div>
                <?php 
                    while ($row = mysqli_fetch_assoc($query_run)) {
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
                <div class="business-hours-row"><?php echo $day_name;?> <?php echo $formattedStartTime; ?> - <?php echo $formattedClosingTime; ?></div>
                <?php 
                }
                ?>
            </div>
        </div>
        <div class="bar-address"><?php echo $address;?></div>
        <div class="bar-map"><?php echo $map;?></div>
    </div>
    <?php
        }           
    ?>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>
