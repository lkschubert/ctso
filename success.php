<?php
include('login.php'); // Includes Login Script

if(!isset($_SESSION['login_user'])){
	header("location: index.php");
}
?>
<html>
<head>
	<title>Customer Template Signoff Sheet</title>
	<link rel="stylesheet" type="text/css" href="style/main.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv='refresh' content='5; url=./logout.php' />
</head>
<body>
	<div class="container">
		<h1>Success</h1>
		<p>The Customer Template Sign Off has been successfully generated and
		has been sent to all intended recipients. You will now be logged out in 5
		seconds.</p>
	</div>
</body>
</html>