
<!DOCTYPE html>
<html>
<head>
	<title>Form Đăng Nhập</title>
	<meta charset="utf-8">
	<meta name="description" content="Form Đăng Nhập">
	<meta name="keywords" content="Form,form đăng nhập">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<fieldset style= "width: 400px;">
		<legend>Thông Tin Cá Nhân</legend>
		<?php
			if (isset($_POST['username']) && isset($_POST['Password']) && isset($_POST['email']) && isset($_POST['phone'])) {

			} else {
				echo  "Bạn chưa nhập đầy đủ thông tin" ;
			}
		?>
		<form method="POST">
				<table border="0">
					<tr>
						<td>Họ và tên:</td>
						<td><input type="text" name="username" size="30" placeholder="Họ và Tên của Bạn"/></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><input type="Password" name="Password" size="30" placeholder="Mật khẩu của bạn" /></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><input type="email" name="email" size="30" placeholder="example@gmail.com"/></td>
					</tr>
					<tr>
						<td>Số điện thoại:</td>
						<td><input type="number" name ="phone" style="width: 240px;" placeholder="Số điện thoại của bạn"/></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="checkbox" name="Remember" value="1"/>Remember Password or Email?</td>
					</tr>
					<tr>
						<td><input type="submit" name="Submit" value="Đăng Nhập"/></td>
						<td>
						</td>
					</tr>
				
		</form>
	</fieldset>
</body>
</html>
<?php
	$path = "filetxt/login.txt";
	$fopen = file_get_contents($path);
	var_dump(explode("-", $fopen));


?>