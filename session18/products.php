<?php
$servername="localhost";
$username="root";
$password="";
$database="sanpham";
//kết nối database
$con = new mysqli($servername, $username, $password, $database);
//check connection
if ($con->connect_error) {
	die("connection faile" . $con->connect_error);
	exit();
}
$mobile= "";
$productsName = "";
$model = "";
$price = "";
$quanity = "";
$value= "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST['mobile']) && isset($_POST['productsName']) && isset($_POST['model']) && isset($_POST['price']) && isset($_POST['quanity']) && isset($_POST['value'])) {
		$mobile = $_POST['mobile'];
		$productsName = $_POST['productsName'];
		$model = $_POST['model'];
		$price = $_POST['price'];
		$quanity = $_POST['quanity'];
		$value=$_POST['value'];
	}
	if (!$mobile || !$productsName || !$model || !$price || !$quanity ) {
		echo "Thông Tin Sản Phẩm Còn Thiếu";
		exit();
	}
	$sql = "INSERT INTO products (mobile, productsName, model, price, quanity, value) VALUES ('$mobile', '$productsName', '$model', '$price', '$quanity', '$value')";
	if ($con->query($sql) === TRUE) {
		echo "Thông Tin Sản Phẩm thêm thành công";
	} else {
		echo "Error: " . $sql . "<br/>" . $con->connect_error;
	}
}
$con->close();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Thêm Danh Mục Sản Phẩm</title>
	<meta charset="utf-8">
	<meta name="description" content="Danh Mục Sản Phẩm">
	<meta name="keywords" content="Iphone,Ipad,Samsung,LG,Oppo,Xiaomi,Sony,Nokia,Lenovo....">
	<script defer src="js/fontawesome-all.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Trần Quang Hoài">
</head>
<body>
	<fieldset>
		<legend>Thông Tin Danh Mục Sản Phẩm</legend>
		<form action="" method="POST">
			<table>
				<tr>
					<th>Product:</th>
					<td><input type="text" name="mobile"></td>
				</tr>
				<tr>
					<th>Name :</th>
					<td><input type="text" name="productsName"></td>
				</tr>
				<tr>
					<th>Model:</th>
					<td><input type="text" name="model"></td>
				</tr>
				<tr>
					<th>Price:</th>
					<td><input type="text" name="price"></td>
				</tr>
				<tr>
					<th>Quanity:</th>
					<td><input type="text" name="quanity"></td>
				</tr>
				<tr>
					<th>Station</th>
					<td><select name="value">
						<option>Enable</option>
						<option>Able</option>
						</select>
					</td>
				</tr>
			</table>
			<button type="submit" name="submit">Gửi</button>			
		</form>
	</fieldset>

</body>
</html>