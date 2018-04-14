<?php
require_once 'vendor/autoload.php';
include 'elgamal.php';

// $info = pathinfo($_FILES['file']['name']);
// $ext = $info['extension']; // get the extension of the file
// $newname = "MYFILE.".$ext; 

// $target = 'js/'.$newname;
// move_uploaded_file( $_FILES['file']['tmp_name'], $target);

if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
else {
	$path = 'uploaded_file/' . $_FILES['file']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'], $path);
}


$phpWord = new \PhpOffice\PhpWord\PhpWord();

$objReader = \PhpOffice\PhpWord\IOFactory::createReader('Word2007');


$phpWord = $objReader->load($path);

$myText = '';
foreach($phpWord->getSections() as $section) {
            foreach($section->getElements() as $element) {
                if(method_exists($element,'getText')) {
                    $myText.= ($element->getText() . "\n");
                }
            }
        }



// $key = new elgamal(0,0,0,0,0);
// $key->_key(10000);
// $p = $key->p;
// $g = $key->g;
// $x = $key->x;
// $y = $key->y;

// // $key->p = 2143;
// // $key->g = 30;
// // $key->x = 300;
// // $key->y = 1364;

// echo $myText;

// $myText = $key->_enkripsi("MASRIANTO");

// $dek = $key->_dekripsi($myText,$key->x);

// echo $myText."\n".$dek;

// $key = new elgamal(0,0,0,0,0);
// $key->_key(258);
// $p = $key->p;
// $g = $key->g;
// $x = $key->x;
// $y = $key->y;
// $k = $key->k;


// function ordutf8($string, &$offset) {
//     $code = ord(substr($string, $offset,1));
//     if ($code >= 128) {        //otherwise 0xxxxxxx
//         if ($code < 224) $bytesnumber = 2;                //110xxxxx
//         else if ($code < 240) $bytesnumber = 3;        //1110xxxx
//         else if ($code < 248) $bytesnumber = 4;    //11110xxx
//         $codetemp = $code - 192 - ($bytesnumber > 2 ? 32 : 0) - ($bytesnumber > 3 ? 16 : 0);
//         for ($i = 2; $i <= $bytesnumber; $i++) {
//             $offset ++;
//             $code2 = ord(substr($string, $offset, 1)) - 128;        //10xxxxxx
//             $codetemp = $codetemp*64 + $code2;
//         }
//         $code = $codetemp;
//     }
//     $offset += 1;
//     if ($offset >= strlen($string)) $offset = -1;
//     return $code;
// }

// $ascii = array();
// $offset = 0;
// while($offset >= 0){
//     $c = ordutf8($myText, $offset);
//     array_push($ascii, $c);
// }


// $textd = implode($ascii, " ");
// echo $textd;

// $myAscii = $key->_toAscii($myText)
// echo $myAscii