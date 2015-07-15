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
	<link rel="stylesheet" type="text/css" href="style/test.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>
	<div id="signature-pad" class="m-signature-pad">
    <div class="m-signature-pad--body">
      <canvas></canvas>
    </div>
    <div class="m-signature-pad--footer">
      <div class="description">Sign above</div>
      <button class="button clear" data-action="clear">Clear</button>
      <button class="button save" data-action="save">Save</button>
    </div>
  </div>

  <script src="js/signature_pad.js"></script>
  <script src="js/app.js"></script>
</body>
</html>