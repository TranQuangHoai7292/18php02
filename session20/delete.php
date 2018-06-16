<!DOCTYPE html>
<html lang="en">
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
	<?php require_once "connection.php"; ?>
	<div class="container">
      	<div class="row">
	        <h3> Quản lý thành viên</h3>
	        <form action="" method="post">
	        <table class="table">
         		<caption>Danh sách thành viên đã đăng ký</caption>
          		<thead>
	           		<tr>
			            <th>STT</th>
			            <th>Tên đăng nhập</th>
			            <th>Họ tên</th>
			            <th>Địa chỉ email</th>
			            <th>Giới Tính</th>
			            <th>Số Điện Thoại</th>
			            <th>Chức vụ</th>
			            <th>Công Cụ</th>
	            	</tr>
          		</thead>
          		<tbody>
	          	<?php
	            $stt = 1 ;
	            $sql = "SELECT * FROM signup";
	            $query = mysqli_query($con, $sql);
	            while ($data = mysqli_fetch_array($query)) {
	          	?>
		            <tr>
		              <th scope="row"><?php echo $stt++ ?></th>
		              <td><?php echo $data["username"]; ?></td>
		              <td><?php echo $data["fullname"]; ?></td>
		              <td><?php echo $data["email"]; ?></td>
		              <td><?php echo $data["sex"]; ?></td>
		              <td><?php echo $data["numberPhone"]; ?></td>
		              <td>
		                <?php
		                    if ($data["level"] == 1) {
		                      echo "Administrator";
		                    } else {
		                      echo "Member";
		                    }
		                ?>
		              </td>
		              <td><a href="edit.php?id=<?php echo $data['id']; ?>">Sửa</a></td> 
		              <td><a href="delete.php?id=<?php echo $data['id']; ?>">Xóa</a></td>
		            </tr>
          		</tbody>
        	</table>
    		</form>
      	</div> 
    </div>
</body>
</html>