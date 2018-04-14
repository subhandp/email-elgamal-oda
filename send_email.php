<?php
require_once 'vendor/autoload.php';
require 'PHPMailer/PHPMailerAutoload.php';
require 'PHPMailer/class.phpmailer.php';
require 'elgamal.php';
require 'DocxConversion.php';

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

// $phpWord = new \PhpOffice\PhpWord\PhpWord();

// $objReader = \PhpOffice\PhpWord\IOFactory::createReader('Word2007');


// $phpWord = $objReader->load($path);

// $myText = '';
// foreach($phpWord->getSections() as $section) {
//             foreach($section->getElements() as $element) {
//                 if(method_exists($element,'getText')) {
//                     $myText.= ($element->getText() . "\n");
//                 }
//             }
//         }


// echo $myText;

// echo "<br> ====================BATAS======================== <br>";

// $docObj = new DocxConversion($path);
// //$docObj = new DocxConversion("test.docx");
// //$docObj = new DocxConversion("test.xlsx");
// //$docObj = new DocxConversion("test.pptx");
// $myText = $docObj->convertToText();


$reader = \PhpOffice\PhpWord\IOFactory::createReader('Word2007');
$phpWord = $reader->load($path);
// Saving the document as HTML file...
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
$objWriter->save('temp.html');


$myText = file_get_contents('temp.html');
//$myText = html_entity_decode($myText);
// $fp=fopen('baru.html',"w+");
// fwrite($fp, $myText);
// fclose($fp);
unlink('temp.html');

$key = new elgamal(0,0,0,0,0);
$key->_key(10000);
$p = $key->p;
$g = $key->g;
$x = $key->x;
$y = $key->y;

// // $key->p = 2143;
// // $key->g = 30;
// // $key->x = 300;
// // $key->y = 1364;

// echo $myText;

$myText = $key->_enkripsi($myText);
$message = $key->_enkripsi($message);
$dek1 = $key->_dekripsi($message,$key->p, $key->x);
$dek2 = $key->_dekripsi($myText,$key->p, $key->x);
// echo $message.$dek1.$p.'/'.$x;
echo $myText;
echo $dek2;
// $dek2 = $key->_dekripsi($myText,$key->x);

$phpWord = new \PhpOffice\PhpWord\PhpWord();
$section = $phpWord->createSection();
$section->addText($myText);

$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save($path);

// $section = $phpWord->createSection();
// $section->addText($dek2);

// $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
// $path2 = 'uploaded_file/hasildek2.docx';
// $objWriter->save($path2);



function send_email($msg, $sendto){

	$mail = new PHPMailer();

	// set mailer to use SMTP
	$mail->IsSMTP();

	// As this email.php script lives on the same server as our email server
	// we are setting the HOST to localhost
	$mail->Host = 'smtp.gmail.com';  // specify main and backup server

	$mail->SMTPAuth = true;     // turn on SMTP authentication

	$mail->SMTPSecure = 'ssl';                         // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 465;  
	// When sending email using PHPMailer, you need to send from a valid email address
	// In this case, we setup a test email account with the following credentials:
	// email: send_from_PHPMailer@bradm.inmotiontesting.com
	// pass: password
	$mail->Username = 'kurniawanekosaputro6@gmail.com';  // SMTP username
	$mail->Password = 'kurniaone'; // SMTP password

	// $email is the user's email address the specified
	// on our contact us page. We set this variable at
	// the top of this page with:
	// $email = $_REQUEST['email'] ;
	// $mail->From = $email;
	$mail->setFrom('kurniawanekosaputro6@gmail.com', 'kurniawan eko saputro');
	$mail->addReplyTo('kurniawanekosaputro6@gmail.com', 'kurniawan eko saputro');
	// below we want to set the email address we will be sending our email to.
	$mail->AddAddress($sendto);

	if(isset($msg['attachment']))
		$mail->AddAttachment($msg['attachment']);

	// set word wrap to 50 characters
	// $mail->WordWrap = 50;
	// set email format to HTML
	$mail->IsHTML(true);

	$mail->Subject = $msg['subject'];
	echo $mail->Subject;
	// $message is the user's message they typed in
	// on our contact us page. We set this variable at
	// the top of this page with:
	// $message = $_REQUEST['message'] ;
	$mail->Body    = $msg['body'];
	$mail->AltBody = 'undefined';

	if(!$mail->Send())
	{
	   echo "Message could not be sent. 

	";
	   echo "Mailer Error: " . $mail->ErrorInfo;
	   exit;
	}

	echo "Message has been sent";

}

$mailSubject = '[CHIPHER] '.$subject;
send_email(array('subject' => $mailSubject, 'body' => $message, 'attachment' => $path), $email);

$mailSubject = '[KEY] '.$subject;
$message = 'P:'.$key->p.' K:'.$key->x;
send_email(array('subject' => $mailSubject, 'body' => $message), $email);
?>



