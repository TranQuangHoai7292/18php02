<?php
include 'connection.php';
include 'check.php';
?>
<!DOCTYPE html>
<html lang= "en">
<head>
	<title>Đăng ký Thành Viên</title>
	<meta charset="utf-8">
	<meta name="description" content="Đăng ký Thành Viên">
	<meta name="keywords" content="">
	<link rel="shortcut icon" href="">
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
		<fieldset style="width: 500px;">
			<legend>Đăng ký Thành Viên</legend>
				<form action="" method="post">
					<table>
						<tr>
							<th>Tên Đăng Ký :</th>
							<td><input type="text" name="name"></td>
						</tr>
						<tr>
							<th>Mật Khẩu :</th>
							<td><input type="password" name="password"></td>
						</tr>
						<tr>
							<th>Email :</th>
							<td><input type="email" name="email"></td>
						</tr>
						<tr>
							<th>Họ Và Tên :</th>
							<td><input type="text" name="fullname"></td>
						</tr>
						<tr>
							<th>Giới tính :</th>
							<td><input type="radio" name="gender" value="Nam" checked="checked">Nam <input type="radio" name="gender" value="Nữ">Nữ</td>
						</tr>
						<tr>
							<th>Số Điện Thoại :</th>
							<td><input type="number" name="phone"></td>
						</tr>
					</table>
					<button type="sunbmit" name="submit">Đăng Ký</button>					
				</form>
		</fieldset>
</body>
</html>