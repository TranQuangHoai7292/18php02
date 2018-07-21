<?php 
require_once './config/database.php';
class UserModel extends ConnectDB{
	function addUser($username, $password, $role){
		$sql = "INSERT INTO users(role, username, password) VALUES ('$role', 
		'$username', '$password')";
		return mysqli_query($this->conn,$sql);
	}
	function getUser () {
		$get = "SELECT * FROM users";
		return mysqli_query($this->conn,$get);
	}
	function loginUser($username, $password){
		$login = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
		return mysqli_query($this->conn, $login);
	}
}
?>