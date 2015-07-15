<?php
session_start();

$error = '';
if(isset($_POST['submit'])) {
	$ini_array = parse_ini_file("./config.ini", true);
	
	$username = $_POST['username'];
	$password = $_POST['password'];

	$username = stripslashes($username);
	$password = stripslashes($password);

	if(sha1($password) == $ini_array['Login']['password'] && $username == $ini_array['Login']['username']){
		$_SESSION['login_user'] = $username;
		header("location: ctso.php");
	} else {
		$error = "Username or Password invalid";
	}
}
?>