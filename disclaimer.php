<?php

session_start();

if(!isset($_SESSION['login_user'])){
	header("location: index.php");
}

?>

<html>
<head>
	<title>Disclaimer</title>
	<link rel="stylesheet" type="text/css" href="style/main.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>
<div class="container">
	<h1>Disclaimer</h1>
	<h2>Seams</h2>
	<hr />
	<p>The fabricators will take precautions and considerations when determining seam location.
	Consideration include, but are not limited to, customer wants, kitchen layout, site conditions,
	crew safety, material yield & cabinet structure. Although all seam location wants & needs are
	considered, the final placement of all seams that may be required is at the discretion of the 
	fabicator.</p>
	<h2>Field Conditions</h2>
	<hr />
	<p>United Marble & Granite will not move nor help move any appliances including but not limited
	to stoves, refrigerators and dishwashers. At no time will United Marble & Granite make any
	alterations or adjustments to the job site including but not limited to cabinets, trim, flooring,
	windows or securing dishwashers. If adjustments need to be made to the job site or appliances need
	to be moved this is the responsibility of the customer and must be done prior to the installation.
	If there are pre-existing counter tops, the customer must check that the cabinets are level after
	removal and add any required supports.
	<br />
	<br />
<button onclick="window.location.href='signature.php'">Proceed To Signature</button>
</div>
</body>
</html>