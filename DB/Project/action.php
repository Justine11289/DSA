<?php
header("Content-Type:text/html; charset=UTF-8");

$host = "localhost";
$user = "root";
$password = "";
$database = "bar";
$con = mysqli_connect("$host", "$user", "$password", "$database");

if (!$con) {
	die("連線失敗!!!!!");
}

$ssql = "SET NAMES `UTF8`";
mysqli_query($con,$ssql);

?>


