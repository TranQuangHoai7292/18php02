<?php
$servername="localhost";
$username="root";
$password="";
$database="session20";
//kết nối database
$con = new mysqli($servername, $username, $password, $database);
mysqli_set_charset($con, "utf-8");
if ($con->connect_error) {
	die("connection failes" . $con->connect_error);
	exit();
}
?>