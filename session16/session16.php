<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
</head>
<body>
	<fieldset style="width: 300px;">
		<legend>Thông tin cá nhân</legend>
		<form action="" method="post">
	    	<table>
	        	<tr>
	            	<th>Họ và Tên :</th>
	            	<td><input type="text" name="name"></td>
	        	</tr>

	        	<tr>
	            	<th>Email:</th>
	            	<td><input type="email" name="email"></td>
	        	</tr>

	        	<tr>
	            	<th>Số Điện Thoại :</th>
	            	<td><input type="number" name="phone"></td>
	        	</tr>
	    	</table>
	    	<button type="submit">Gửi</button>
	    </form>
    	
	</fieldset>
</body>
</html>
<?php
$servername= "localhost"; //$servername = "127.0.0.1";
$username = "root";
$password = ""; //password = "";
$database = "18php03";

$connect = new mysqli($servername, $username, $password, $database);
if ($connect->connect_error){
	die("connection failed" . $connect->connect_error);
	exit();
}
$name = "";
$email = "";
$phone = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["phone"])) {
		$name = $_POST["name"];
		$email = $_POST["email"];
		$phone = $_POST["phone"];
	}
	if (!$name || !$email || !$phone) {
		echo "Bạn chưa nhập đầy đủ thông tin";
		exit();
	} 
	
	
	$sql = "INSERT INTO users (name, email, phone) VALUES ('$name', '$email', '$phone')";
	if ($connect->query($sql) === TRUE) {
		echo "Thêm thông tin thành công";
	} else {
		echo "Error: " . $sql . "<br>" . $connect->error;
	}
}
$connect->close();
?>