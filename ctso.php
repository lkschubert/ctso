<?php

session_start();

if(!isset($_SESSION['login_user'])){
	header("location: index.php");
}

if(isset($_POST['submit'])){
	
	$accepted = array('customerName', 'customerEmail', 'umgNumber', 'accountName', 'csr', 'stoneColor', 'edge', 'thickness', 'backsplash',
					'sinkModel', 'sinkType', 'sinkAtShop', 'sinkSupplied', 'sinkInLibrary', 'seams', 'powerOnSite',
					'generatorNeeded', 'appliances', 'level', 'driveway', 'lockBox', 'removal', 'missingCabinets',
					'dishwasherBrackets', 'comments');
	foreach ( $accepted as $name ) {
		if ( isset( $_POST[$name] ) ) {
			$_SESSION[$name] = $_POST[$name];
		}
	}
	header("location: disclaimer.php");
}
?>

<html>
<head>
	<title>Customer Template Sign Off</title>
	<link rel="stylesheet" type="text/css" href="style/main.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>
	<div class="container NoTopMargin">
		<h1>Customer Template Sign Off</h1>
		<form name="ctso" action="" method="post">
			<fieldset>
				<legend>Customer Information</legend>
				<label for="customerName">Customer Name</label><br />
				<input type="text" id="customerName" name="customerName" required/>
				<br /><br />
				<label for="customerEmail">Customer Email</label><br />
				<input type="email" id="customerEmail" name="customerEmail" required/>
				<br /><br />
				<label for="umgNumber">UMG Number</label><br />
				<input type="text" id="umgNumber" name="umgNumber" required/>
				<br /><br />
				<label for="accountName">Account Name</label><br />
				<input type="text" id="accountName" name="accountName" required/>
				<br /><br />
				<label for="csr">CSR</label><br />
				<select id="csr" name="csr">
					<?php
						$ini_array = parse_ini_file("./config.ini", true);
						foreach ($ini_array['FormData']['csr'] as &$value){
							$name = $value;
							echo "<option value=\"" . $name . "\">" . $name . "</option>";
						}
					?>
				</select>
			</fieldset>
			<br />
			<fieldset>
				<legend>Job Details</legend>
				<label for="stoneColor">Stone Color</label><br />
				<input type="text" id="stoneColor" name="stoneColor" required/>
				<br /><br />
				<label for="edge">Edge</label><br />
				<select id="edge" name="edge">
					<?php
						$ini_array = parse_ini_file("./config.ini", true);
						foreach ($ini_array['FormData']['edge'] as &$value){
							$name = $value;
							echo "<option value=\"" . $name . "\">" . $name . "</option>";
						}
					?>
				</select>
				<br /><br />
				<label for="thickness">Thickness</label><br />
				<select id="thickness" name="thickness">
					<?php
						$ini_array = parse_ini_file("./config.ini", true);
						foreach ($ini_array['FormData']['thickness'] as &$value){
							$name = $value;
							echo "<option value=\"" . $name . "\">" . $name . "</option>";
						}
					?>
				</select>
				<br /><br />
				<label for="backsplash">Backsplash</label><br />
				<input type="text" id="backsplash" name="backsplash" required/>
				<br /><br />
				<label for="sinkModel">Sink Model</label><br />
				<input type="text" id="sinkModel" name="sinkModel" required/>
				<br /><br />
				<label for="sinkType">Sink Type</label><br />
				<select id="sinkType" name="sinkType">
					<?php
						$ini_array = parse_ini_file("./config.ini", true);
						foreach ($ini_array['FormData']['sinkType'] as &$value){
							$name = $value;
							echo "<option value=\"" . $name . "\">" . $name . "</option>";
						}
					?>
				</select>
				<br /><br />
				<label for="sinkAtShop">Sink At Shop</label><br />
				<input type="checkbox" id="sinkAtShop" name="sinkAtShop" />
				<br /><br />
				<label for="sinkSupplied">Sink Supplied By UMG</label><br />
				<input type="checkbox" id="sinkSupplied" name="sinkSupplied" />
				<br /><br />
				<label for="sinkInLibrary">Sink In CAD Library</label><br />
				<input type="checkbox" id="sinkInLibrary" name="sinkInLibrary" />
				<br /><br />
				<label for="seams">Seams</label><br />
				<input type="checkbox" id="seams" name="seams" />
				<br /><br />
			</fieldset>
			<br />
			<fieldset>
				<legend>Job Site Information</legend>
				<label for="powerOnSite">Power On site</label><br />
				<input type="checkbox" id="powerOnSite" name="powerOnSite" />
				<br /><br />
				<label for="generatorNeeded">Generator Needed</label><br />
				<input type="checkbox" id="generatorNeeded" name="generatorNeeded" />
				<br /><br />
				<label for="appliances">Appliances On Site</label><br />
				<input type="checkbox" id="appliances" name="appliances" />
				<br /><br />
				<label for="level">Cabinets Level</label><br />
				<input type="checkbox" id="level" name="level" />
				<br /><br />
				<label for="driveway">Driveway Access</label><br />
				<input type="checkbox" id="driveway" name="driveway" />
				<br /><br />
				<label for="lockBox">Lock Box Code (If yes write it in comments)</label><br />
				<input type="checkbox" id="lockBox" name="lockBox" />
				<br /><br />
				<label for="removal">Counter Removal</label><br />
				<input type="checkbox" id="removal" name="removal" />
				<br /><br />
				<label for="missingCabinets">Missing Cabinets</label><br />
				<input type="checkbox" id="missingCabinets" name="missingCabinets" />
				<br /><br />
				<label for="dishwasherBrackets">Dishwasher Brackets Needed</label><br />
				<input type="checkbox" id="dishwasherBrackets" name="dishwasherBrackets" />
				<br /><br />
				<label for="comments">Comments</label><br />
				<textarea id="comments" name="comments"></textarea>
			</fieldset>
			<br />
			<br />
			<button type="submit" name="submit" id="submit">Submit</button>
		</form>
	</div>
</body>
</html>