<!DOCTYPE html>
<html>
<head>
	<title>Quản Lý Người Dùng</title>
	<meta charset="utf-8">
	<meta name="description" content="Đăng ký Thành Viên">
	<meta name="keywords" content="">
	<link rel="shortcut icon" href="">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="container">
      	<div class="row"> 
      	<?php require_once "connection.php";  
      	$id="";
      	$username="";
      	$fullname="";
      	$email="";
      	$numberPhone="";
      	$level="";
      		if (isset($_GET['id'])) {
      			$id=$_GET['id'];
      			$sql = "SELECT * FROM signup WHERE id = '$id'";
      			$result = mysqli_query($con, $sql);
      			while ( $data= mysqli_fetch_array($result)) {
      				$id=$data['id'];
      				$username=$data['username'];
			      	$fullname=$data['fullname'];
			      	$email=$data['email'];
			      	$numberPhone=$data['numberPhone'];
      			}

      		} 
      	?>

        	<h3> Thông tin thành viên</h3>
        		<fieldset style="width: 300px;">
        			<legend>Thay Đổi Thông Tin</legend>
        				<form method="POST" action="">
        				<table class="table">
	          				<input type="hidden" name="id" value="<?php echo $id; ?>">
				          	<tr>
				          		<th>Tên Đăng Ký : </th>
				          		<td><input type="text" name="name" value="<?php echo $username; ?>"></td>
				          	</tr>
				          	<tr><th>Địa chỉ email : </th>
				          		<td><input type="email" name="email" value="<?php echo $email; ?>"></td>
				          	</tr>
				          	<tr>
				          		<th>Họ và Tên :</th>
				          		<td><input type="text" name="fullname" value="<?php echo $fullname; ?>"></td>
				          	</tr>
				          	<tr>
				          		<th>Số Điện Thoại :</th>
				          		<td><input type="number" name="phone" value="<?php echo $numberPhone; ?>"></td>
				          	</tr>	         	
        				</table>
        				<?php
        				if ($_SERVER["REQUEST_METHOD"] == "POST") {
				        	if (isset($_POST["save"])) {
				        		$id=$_POST['id'];
								$username = $_POST["name"];
								$fullname = $_POST["fullname"];
								$email = $_POST["email"];
								$numberPhone=$_POST["phone"];
								$sql = "UPDATE signup SET username = '$username', email = '$email', fullname = '$fullname', numberPhone = '$numberPhone' WHERE id = $id";
								mysqli_query($con, $sql);
								echo '<script language="javascript">alert("Lưu thông tin thành công"); window.location="quanlynguoidung.php";</script>';
							}
						}
						?>
        				<input type="submit" name="save" value="Lưu Lại">
        			</form>
        	</fieldset>
      	</div> 
    </div>
</body>
</html>