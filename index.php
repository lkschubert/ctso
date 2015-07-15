<?php
include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
	header("location: ctso.php");
}
?>
<html>
<head>
	<title>Customer Template Signoff Sheet</title>
	<link rel="stylesheet" type="text/css" href="style/main.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>
	<div class="container">
		<h1>United Marble & Granite</h1>
		<form name="logIn" action="" method="post">
			<fieldset>
				<legend>Log In</legend>
				<label for="username">Name</label>
				<input type="text" id="username" name="username" required/>
				<br />
				<br />
				<label for="password">Password</label>
				<input type="password" id="password" name="password" required/>
				<br />
				<br />
				<button type="submit" name="submit" id="submit">Submit</button>
				<span><?php echo $error; ?></span>
			</fieldset>
		</form>
	</div>
</body>
</html>