<?php
session_start();
if (!isset($_SESSION['email']) && !isset($_SESSION['pass'])) {
  echo "<script> location.href='login.php'; </script>";
  exit;
}
require_once 'vendor/autoload.php';
require 'PHPMailer/PHPMailerAutoload.php';
require 'PHPMailer/class.phpmailer.php';
require 'elgamal.php';
require 'DocxConversion.php';


function send_email($msg, $sendto){

	$mail = new PHPMailer();

	// set mailer to use SMTP
	$mail->IsSMTP();

	$mail->Host = 'smtp.gmail.com';  // specify main and backup server

	$mail->SMTPAuth = true;     // turn on SMTP authentication

	$mail->SMTPSecure = 'ssl';                         // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 465;  
	
	$mail->Username = 'kurniawanekosaputro6@gmail.com';  // SMTP username
	$mail->Password = 'kurniaone'; // SMTP password

	$mail->setFrom('kurniawanekosaputro6@gmail.com', 'kurniawan eko saputro');
	$mail->addReplyTo('kurniawanekosaputro6@gmail.com', 'kurniawan eko saputro');
	// below we want to set the email address we will be sending our email to.
	$mail->AddAddress($sendto);

	if(isset($msg['attachment']))
		$mail->AddAttachment($msg['attachment']);

	$mail->IsHTML(true);

	$mail->Subject = $msg['subject'];

	$mail->Body    = $msg['body'];
	$mail->AltBody = 'undefined';

	if(!$mail->Send())
	{
	   echo "Message could not be sent. 

	";
	   echo "Mailer Error: " . $mail->ErrorInfo;
	   exit;
	}

}

$username = $_SESSION['email'];
$password = $_SESSION['pass'];

// $email and $message are the data that is being
// posted to this page from our html contact form
$email = $_REQUEST['email'] ;
$subject = $_REQUEST['subject'] ;
$message = $_REQUEST['message'] ;

$file_name = $_FILES ['file-upload']['name'];
$file_tmp =$_FILES['file-upload']['tmp_name'];


if ( 0 < $_FILES['file-upload']['error'] ) {
        echo 'Error: ' . $_FILES['file-upload']['error'] . '<br>';
    }
else {
	$path = 'uploaded_file/' . $file_name;
    move_uploaded_file($file_tmp, $path);
}


$key = new elgamal(0,0,0,0,0);
$key->_key(10000);
$p = $key->p;
$g = $key->g;
$x = $key->x;
$y = $key->y;


$ext = explode('.', $file_name);
$ext = array_slice($ext, -1)[0];

switch ($ext) {
	case 'txt':
		$myText = file_get_contents($path);
		$myText = $key->_enkripsi($myText);
		$message = $key->_enkripsi($message);
		$fp=fopen($path,"w+");
      	fwrite($fp, $myText);
      	fclose($fp);
		break;
	
	default:
		$reader = \PhpOffice\PhpWord\IOFactory::createReader('Word2007');
		$phpWord = $reader->load($path);
		// Saving the document as HTML file...
		$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
		$objWriter->save('temp.html');


		$myText = file_get_contents('temp.html');

		unlink('temp.html');


		$myText = $key->_enkripsi($myText);
		$message = $key->_enkripsi($message);

		$phpWord = new \PhpOffice\PhpWord\PhpWord();
		$section = $phpWord->createSection();
		$section->addText($myText);

		$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
		$objWriter->save($path);
		break;
}


$mailSubject = '[CHIPHER] '.$subject;
send_email(array('subject' => $mailSubject, 'body' => $message, 'attachment' => $path), $email);

$mailSubject = '[KEY] '.$subject;
$message = 'P:'.$key->p.' K:'.$key->x;
send_email(array('subject' => $mailSubject, 'body' => $message), $email);

echo "<script> location.href='createmsg.php'; </script>";
exit;

?>



