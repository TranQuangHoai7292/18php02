<?php session_start();
require_once "config/database.php";
require_once "model/user_model.php";
if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	if ($username = "" || $password = "") {
		echo "Vui long khong de trong";
	} else {
		$sql      = new UserModel;
		$query 	  = $sql->loginUser($username, $password);
		$num_rows = mysqli_num_rows($query);
		if ($num_rows == 0) {
			echo "ban da nhap sai ten hoac mat khau";
		} else {
			while ($check = mysqli_fetch_array($query)) {
			$role  = $check['role'];	
			if ($role == 1) {
				echo "XIn chao ban Quan Tri";
				header('Location:admin.php');
			} elseif ($role == 0) {
					echo "Xin Chao ". $username;
					header('Location:index.php');
				}
			}
			
		}

	}
}
?> 
<form method="POST" action="login.php">
	<fieldset style="width: 300px;">
	    <legend>Đăng nhập</legend>
	    	<table>
	    		<tr>
	    			<td>Username :</td>
	    			<td><input type="text" name="username"></td>
	    		</tr>
	    		<tr>
	    			<td>Password :</td>
	    			<td><input type="password" name="password"></td>
	    		</tr>
	    		<tr>
	    			<td colspan="2"> <input type="submit" name="login" value="Đăng nhập"></td>
	    		</tr>
	    	</table>
  </fieldset>
 </form>
