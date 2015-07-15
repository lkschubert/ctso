<?php
session_start();

if(!isset($_SESSION['login_user'])){
	header("location: index.php");
}
require('./php/fpdf.php');
require './php/PHPMailerAutoload.php';
$ini_array = parse_ini_file("./config.ini", true);

$filename = $ini_array['CTSOGenerator']['targetDirectory'] . $_SESSION['umgNumber'] . '.pdf';



$ctso = new FPDF();
$ctso->AddPage();
$ctso->SetFont('Arial', 'B', 20);
$ctso->Cell(40,10,"United Marble & Granite");
$ctso->SetFont('Arial', 'B', 16);
$ctso->Image("./res/logo.png", 180, 6, 20);
$ctso->Ln();
$ctso->Cell(40,10,"Customer Template Sign Off");
$ctso->Ln(30);
$ctso->SetFont('Arial', 'B', 12);
$ctso->Cell(50, 8, "Customer Name", 1);
$ctso->Cell(30, 8, "UMG Number", 1);
$ctso->Cell(50, 8, "Account Name", 1);
$ctso->Cell(60, 8, "CSR", 1);
$ctso->Ln();
$ctso->Cell(50, 8, $_SESSION['customerName'], 1);
$ctso->Cell(30, 8, $_SESSION['umgNumber'], 1);
$ctso->Cell(50, 8, $_SESSION['accountName'], 1);
$ctso->Cell(60, 8, $_SESSION['csr'], 1);
$ctso->Ln(20);
$ctso->Cell(0,8,"Job Details", 1, 2, 'C');
$text = "Stone Color : " . $_SESSION['stoneColor'] . "\n" .
		"Edge : " . $_SESSION['edge'] . "      " . "Thickness : " . $_SESSION['thickness'] . 
		"      " . "Backsplash : " . $_SESSION['backsplash'] . "\n" .
		"Sink Model : " . $_SESSION['sinkModel'] . "\n" .
		"Sink Type : " . $_SESSION['sinkType'] . "\n"
		;

	if(isset($_SESSION['sinkAtShop'])){
		$text = $text . "Sink is at UMG\n";
	} else {
		$text = $text . "Sink is on site\n";
	}
	
	if(isset($_SESSION['sinkSupplied'])){
		$text = $text . "Sink supplied by UMG\n";
	} else {
		$text = $text . "Sink supplied by Customer\n";
	}
	
	if(isset($_SESSION['sinkInLibrary'])){
		$text = $text . "Sink is in UMG CAD Library\n";
	} else {
		$text = $text . "Sink is not in UMG CAD Library\n";
	}
	
	if(isset($_SESSION['seams'])){
		$text = $text . "The templater has determined that the job will require seams.\n";
	} else {
		$text = $text . "The templater has determined that the job does not require seams. This is subject to change based on other job requirements\n";
	}
$ctso->MultiCell(0, 8, $text, 1);
$ctso->Ln();
$ctso->Cell(0,8,"Job Site Details", 1, 2, 'C');

$text = "";
	if(isset($_SESSION['powerOnSite'])){
		$text = $text . "There is power on site\n";
	} else {
		$text = $text . "There is not power on site\n";
	}
	
	if(isset($_SESSION['generatorNeeded'])){
		$text = $text . "A generator is required\n";
	} else {
		$text = $text . "A generator is not required\n";
	}
	
	if(isset($_SESSION['appliances'])){
		$text = $text . "Appliances are on site\n";
	} else {
		$text = $text . "Appliances are not on site\n";
	}
	
	if(isset($_SESSION['level'])){
		$text = $text . "Cabinets are level\n";
	} else {
		$text = $text . "Cabinets are not level\n";
	}
	
	if(isset($_SESSION['driveway'])){
		$text = $text . "There is driveway access\n";
	} else {
		$text = $text . "There is not driveway access\n";
	}
	
	if(isset($_SESSION['lockBox'])){
		$text = $text . "There is a lock box\n";
	} else {
		$text = $text . "There is not a lock box\n";
	}
	
	if(isset($_SESSION['removal'])){
		$text = $text . "Removal is required\n";
	} else {
		$text = $text . "Removal is not required\n";
	}
	
	if(isset($_SESSION['missingCabinets'])){
		$text = $text . "There are missing cabinets\n";
	} else {
		$text = $text . "There are not missing cabinets\n";
	}
	
	if(isset($_SESSION['dishwasherBrackets'])){
		$text = $text . "Dishwasher brackets are needed\n";
	} else {
		$text = $text . "Dishwasher brackets are not needed\n";
	}
$ctso->MultiCell(0, 8, $text, 1);
$ctso->Ln();
$ctso->Cell(0,8,"Comments", 1, 2, 'C');
$ctso->Ln(0);
$ctso->MultiCell(0, 8, $_SESSION['comments'], 1);
$ctso->Ln();
$ctso->Cell(0,8,"Disclaimers", 1, 2, 'C');
$text = "The fabricators will take precautions and considerations when determining seam location. Considerations include, but are not limited to, customer wants, kitchen layout, site conditions, crew safety, material yield & cabinet structure. Although all seam location wants & needs are considered, the final placement of all seams that may be required is at the discretion of the fabicator.\n\n" .
		"United Marble & Granite will not move nor help move any appliances including but not limited to stoves, refrigerators and dishwashers. At no time will United Marble & Granite make any alterations or adjustments to the job site including but not limited to cabinets, trim, flooring, windows or securing dishwashers. If adjustments need to be made to the job site or appliances need to be moved this is the responsibility of the customer and must be done prior to the installation. If there are pre-existing counter tops, the customer must check that the cabinets are level after removal and add any required supports." ;
$ctso->MultiCell(0, 8, $text, 1);
$ctso->AddPage();

$imageFilename = $ini_array['CTSOGenerator']['signatureDirector'] . $_SESSION['umgNumber'] . ".png";
$data_uri = $_POST['signature'];
$data_pieces = explode(",", $data_uri);
$encoded_image = $data_pieces[1];
$decoded_image = base64_decode($encoded_image);
file_put_contents( $imageFilename,$decoded_image);

$ctso->Cell(0,8,"Signature", 1, 2, 'C');
$ctso->Ln(0);
date_default_timezone_set('UTC');
$ctso->Cell(0,20, date('l jS \of F Y h:i:s A'),1, 0, 'R');
$ctso->Image($imageFilename,	10, 15, 0, 30);
$ctso->Output($filename, 'F');

$mail = new PHPMailer();


//Enable SMTP debugging. 
$mail->SMTPDebug = 3;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "smtp.gmail.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = $ini_array['EmailData']['from'];                
$mail->Password = $ini_array['EmailData']['password'];                            
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";                           
//Set TCP port to connect to 
$mail->Port = 587;  

$mail->SetFrom($ini_array['EmailData']['from'], $ini_array['EmailData']['fromName']);

//Add default email address
foreach ($ini_array['EmailData']['defaultEmails'] as &$value){
	$mail->addAddress($value);
}

$mail->addAddress($_SESSION['customerEmail']);
$mail->addAttachment("$filename"); 

$mail->isHTML(true);

$mail->Subject = $ini_array['EmailData']['subject'];  

$mail->Body = file_get_contents($ini_array['EmailData']['htmlBodyFile']);  
$mail->AltBody = file_get_contents($ini_array['EmailData']['altBodyFile']);

if(!$mail->send()) 
{
	echo 'Whoops';
} 
else
{
    echo "Message has been sent successfully";
}

?>