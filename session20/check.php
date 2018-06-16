<?php
$name = "";
$password = "";
$email = "";
$fullname = "";
$gender = "";
$phone = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST['name']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['fullname']) && isset($_POST['gender']) && isset($_POST['phone'])) {
		$name = $_POST['name'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$fullname = $_POST['fullname'];
		$gender = $_POST['gender'];
		$phone =$_POST['phone'];
	}
	if (!$name || !$password || !$email || !$fullname || !$gender || !$phone) {
		echo '<script language="javascript">alert("Bạn chưa điền đầy đủ thông tin"); window.location="login.php";</script>';
		exit();
	}
	$sql = "SELECT * FROM signup WHERE email = '$email'";
	$result = mysqli_query($con, $sql);
	if (mysqli_num_rows($result) > 1) {
		echo '<script language="javascript">alert("Email đã được sử dụng"); window.location="login.php";</script>';
		die();
	}
	$sql ="SELECT * FROM signup WHERE username = '$name'";
	$result = mysqli_query($con, $sql);
	if (mysqli_num_rows($result) > 1) {
		echo '<script language="javascript">alert("Tên Đăng Ký đã được sử dụng"); window.location="login.php";</script>';
		die();
	}
	$sql = "INSERT INTO signup (username, password, email, fullname, sex, numberPhone) VALUES ('$name', '$password', '$email', '$fullname', '$gender', '$phone')";
	
	if ($con->query($sql) === TRUE) {
		echo '<script language="javascript">alert("Bạn Đã Đăng Ký Thành Công"); window.location="login.php";</script>';
	} else {
		echo "Error: " . $sql . "<br/>" . $con->connect_error;
	}
}
$con->close();
?>