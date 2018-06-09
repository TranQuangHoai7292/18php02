<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "sanpham";
//kết nối với database
$con = new mysqli($servername, $username, $password, $database);
if ($con->connect_error) {
	die("connection faile" . $con->connect_error);
	exit();
}
$mobile = "";
if ($_SERVER["REQUEST_METHOD"]== "POST") {
	if ( isset($_POST['mobile'])) {
		$mobile = 'mobile';
	}
	$sql = "SELECT * FROM products WHERE mobile = '$mobile'";
	mysqli_select_db($con, 'sanpham');
	$retval = mysqli_query($con, $sql);
	if (!$retval) {
		die('Không thể lấy dữ liệu' . mysqli_connect_error());
		exit();
	}
	while($row = mysqli_fetch_array($retval, MYSQLI_NUM))
	{
		print "ID : {$row[0]} <br/>". "Mobile : {$row[1]} <br/>" . "ProductsName : {$row[2]} <br/>" . "Model : {$row[3]} <br/>" . "Price : {$row[4]} <br/>" . "Quanity : {$row[5]} <br/>" . "Action : {$row[6]} <br/>";
	}
	mysqli_free_result($retval);
}
mysqli_close($con);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Danh Sách Sản Phẩm</title>
	<meta charset="utf-8">
	<meta name="description" content="Danh Mục Sản Phẩm">
	<meta name="keywords" content="Iphone,Ipad,Samsung,LG,Oppo,Xiaomi,Sony,Nokia,Lenovo....">
	<script defer src="js/fontawesome-all.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Trần Quang Hoài">
</head>
<body>
	<legend>Danh Sách Sản Phẩm</legend>
	<form action="" method="POST">
		<select name="mobile">
			<option>Apple</option>
			<option>SamSung</option>
			<option>Sony</option>
			<option>Oppo</option>
		</select>
		<button type="submit">Tìm</button>
	</form>

</body>
</html>