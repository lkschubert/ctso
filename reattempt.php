<?php
include('login.php'); // Includes Login Script

if(!isset($_SESSION['login_user'])){
	header("location: index.php");
}

if(isset($_POST['submit'])){
	
	$_SESSION['customerEmail'] = $_POST
	header("location: generateCTSO.php");
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
		<h1>Reattempt Submission</h1>
		<form name="reattempt" action="" method="post">
			<fieldset>
				<p>There was an error in creating the Customer Template Sign Off and emailing it. This
				is most likely due to a mistake in the Customer's email address. Please type it again
				and resubmit.</p>
				<label for="customerEmail">Customer Email</label>
				<input type="text" id="customerEmail" name="customerEmail" required/>
				<button type="submit" name="submit" id="submit">Submit</button>
			</fieldset>
		</form>
	</div>
</body>