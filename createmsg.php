<?php 

bcpowmod(2, 2, 2);
// class elgamal{
 
//   public static $p,$g,$x,$y,$k;
//   /*
//   $p : Bilangan prima Acak (Public)
//   $g : Bilangan acak  ( g < p)  (Public)
//   $x : Bilangan acak  (x < p)(Privat)
//   $y : y = gx mod p(public)
//   */
//   public function __construct($p,$g,$x,$y,$k){
   
//   $this->p = $p;$this->g = $g;
//   $this->x = $x;$this->y = $y;
//   $this->k = $k;
   
//   }
   
//   public function _key($batas){
   
//   $this->p = $this->_p($batas);
//   $this->g = $this->_g();
//   $this->x = $this->_x();
//   $this->y = $this->_y($batas);
//   $this->k = $this->_k();
   
//   }
   
//   //Membangkitkan Bilangan p (Privat and Public Key)
//   private function _p($batas){
   
//     $tmpP = rand($batas,$batas*10);
//     $cek = '0';
//     for ($i=2;$i<$tmpP;$i++){
     
//       if (($tmpP % $i) == 0){
       
//         $cek = '1';
//         break;
       
//       }
       
//     }
//     if ($cek == '0'){
     
//       return $tmpP;
     
//     }
//     else{
      
//       return $this->_p($batas); 
     
//     }
   
//   }
   
//   //Membangkitkan Bilangan g (Public key)
//   private function _g(){
   
//     return rand(1, $this->p - 1);
   
//   }
   
//   //membangkitkan bilangan x (Privat Key)
//   private function _x(){
   
//     return rand(1, $this->p - 2);
   
//   }
   
//   //membangkitkan bilangan y (Public Key)
//   private function _y($batas){
   
//     return  $this->_rekursifMod($this->g,$this->x,$this->p);
//   }
   

   
//   //Membangkitkan Bilangan K
//   private function _k(){
   
//     return rand(1,$this->p - 2);
   
//   }
   
//   //Pencarian Modulus
//   public function _rekursifMod($basis,$pangkat,$mod){
   
//     if ($pangkat <= 2)
//       return ((pow($basis,$pangkat)) % $mod);
//     else{
     
//       $s = $pangkat % 2;
//       if ($s == 0){
         
//         $b = $pangkat / 2;
//         $b1 = $b; $b2 = $b;
       
//       }
//       else{
         
//         $b = floor($pangkat/2);
//         $b1 = $b; $b2 = $b + 1;
       
//       }

//       return ((($this->_rekursifMod($basis,$b1,$mod)) * ($this->_rekursifMod($basis,$b2,$mod))) % $mod);
     
//     }
   
//   }
   
//   //Enkripsi Plaintext
//   public function _enkripsi($plainText){
   
//     $ascii = $this->_toAscii($plainText);
//     $chipperText = "";
//     for ($i=0;$i<(strlen($ascii));$i+=3){
       
//       $tmp = substr($ascii,$i,3);

//       if (strlen($tmp)==1) $tmp = "00".$tmp;
      
//       if (strlen($tmp)==2) $tmp = "0".$tmp;
      
//       $r = $this->_rekursifMod($this->g,$this->k,$this->p);
      
//       $s = ((($this->_rekursifMod($this->y,$this->k,$this->p))*($this->_rekursifMod($tmp,1,$this->p))) % $this->p);
      
//       $chipperText .= $r." ".$s." ";
     
//     }
    
//     return $chipperText;
   
//   }
   
//   //Dekripsi Chippertext
//   public function _dekripsi($chipperText){
   
//     $t = explode(" ",$chipperText);
//     $ascii = "";
//     for ($i=0;$i<(count($t));$i+=2){
//       if($i+1 < count($t)){
//         $pkt = $this->p - 1 - $this->x;
//         $a = $this->_rekursifMod($t[$i],$pkt,$this->p);
//         $b = (($t[$i+1]*$a) % $this->p);
//         if (strlen($b)==1) $b = "00".$b;
//         if (strlen($b)==2) $b = "0".$b;
//         $ascii .= $b;
//       }
   
       
//     }

//     return $this->_toText($ascii);
   
//   }
   
//   // //Ubah Text ke Ascii
//   // public function _toAscii($text){
   
//   //   $ascii = "";
//   //   for ($i=0;$i<(strlen($text));$i++){
     
//   //     $char = substr($text,$i,1);
//   //     $a = ord($char); 
//   //     if (strlen($a)==1) $a = "00".$a;
//   //     if (strlen($a)==2) $a = "0".$a;
//   //     if (strlen($a)==3) $a = "".$a;
//   //     $ascii .= $a;
     
//   //   }

//   //   return $ascii;
   
//   // }
   

//   //Ubah Text ke Ascii
//   public function _toAscii($text){
   
//     $ascii = [];
//     for ($i=0;$i<(strlen($text));$i++){
     
//       $char = substr($text,$i,1);
//       $a = ord($char);
//       array_push($ascii, $a);
     
//     }

//     $ascii = implode(" ", $ascii);

//     return $ascii;
   
//   }

//   //Ubah Ascii ke Text
//   // private function _toText($ascii){
    
//   //   $text = "";
//   //   for ($i=0;$i<(strlen($ascii));$i+=3){
       
//   //     $bil = substr($ascii,$i,3);
//   //     $text .= chr($bil);
       
//   //   }

//   //   return $text;
   
//   // }


//   //Ubah Ascii ke Text
//   public function _toText($ascii){
    
//     $ascii = explode(" ", $ascii);
//     $text = "";
//     for ($i=0; $i < count($ascii); $i++) { 
//       $text .= chr($ascii[$i]);
//     }

//     return $text;
   
//   }

   
// }

// $key = new elgamal(0,0,0,0,0);
// $key->_key(10000);
// $p = $key->p;
// $g = $key->g;
// $x = $key->x;
// $y = $key->y;
// $k = $key->k;

//print_r($key->p);
// $as = $key->_toAscii("subhan dinda putra");
// $tx = $key->_toText($as);
// print_r($as);
// print_r($tx);
// phpinfo();

// $a = $key->_enkripsi("subhan dinda putra");
// $b = $key->_dekripsi($a);

// print_r($a);
// 1227 1606 MOD 2143
// $largenum = '95635000009453274121700';
// // echo bcmod(bcmul(bcpow(1185, 1520), 2035), 2537);

// // a = g ^ k mod p
// echo bcpowmod(2, 1520, 2357);
// echo "<br>";
// // b = (y ^ k)m mod p
// echo bcmod(bcmul(bcpow(1185, 1520), 2035), 2357);
// //(1430, 697)


// // x = 1751
// // 2357-1-1751 = 605
// // p1 ^ p-1-x mod p
// $ab = bcpowmod(1430, 605, 2357)
// //b . a ^ x MOD p
// $m = bcmod(bcmul(697, $ab), 2357)

// phpinfo();

require_once 'vendor/autoload.php';
// $phpWord = \PhpOffice\PhpWord\IOFactory::load('DAFTAR ISI.docx');
// $htmlWriter = new \PhpOffice\PhpWord\Writer\HTML($phpWord);
// $htmlWriter->save('test1doc.html');

//$file = htmlentities(file_get_contents("DAFTAR ISI (1).html"));


// $phpWord = new \PhpOffice\PhpWord\PhpWord();
// $section = $phpWord->addSection();
// \PhpOffice\PhpWord\Shared\Html::addHtml($section, $html);
// header('Content-Type: application/octet-stream');
// header('Content-Disposition: attachment;filename="test3.docx"');
// $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
// $objWriter->save('php://output');

// $reader = \PhpOffice\PhpWord\IOFactory::createReader('HTML');
// $phpWord = $reader->load('DAFTAR ISI (1).html');
// // $writer = IOFactory::createWriter($phpWord);
// $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
// $writer->save('DAFTAR ISI (1).docx');




// $reader = \PhpOffice\PhpWord\IOFactory::createReader('Word2007');
// $phpWord = $reader->load('DAFTAR ISI.docx');
// // Saving the document as HTML file...
// $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
// $objWriter->save('helloWorld.html');

// $reader = \PhpOffice\PhpWord\IOFactory::createReader('Word2007');
// $phpWord = $reader->load('DAFTAR ISI.docx');
// // Saving the document as HTML file...
// $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
// $objWriter->save('helloWorld.rtf');





// $myText = htmlentities(file_get_contents('helloWorld.html'));
// //$myText = html_entity_decode($myText);
// $fp=fopen('baru.html',"w+");
// fwrite($fp, $myText);
// fclose($fp);

// function fixTextForPhpWord($string)
// {
//         $text = htmlspecialchars($string);
//         $text = str_replace('&', '&amp;', $text);
//         return $text;
// }

// $myText = fixTextForPhpWord(htmlentities(file_get_contents('helloWorld.html')));
// $phpWord = new \PhpOffice\PhpWord\PhpWord();
// $section = $phpWord->addSection();
// \PhpOffice\PhpWord\Shared\Html::addHtml($section, $myText);
// // $reader = \PhpOffice\PhpWord\IOFactory::createReader('HTML');
// // $phpWord = $reader->load('helloWorld.html');
// // $writer = IOFactory::createWriter($phpWord);
// $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
// $objWriter->save('barunya.docx');


// $myText = htmlentities(file_get_contents('helloWorld.html'));
// $phpWord = new \PhpOffice\PhpWord\PhpWord();
// $section = $phpWord->createSection();
// $section->addText($myText);                                    
// $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
// $objWriter->save('ini-baru.docx');


//echo $myText;
// $phpWord = new \PhpOffice\PhpWord\PhpWord();
// $section = $phpWord->addSection();
// \PhpOffice\PhpWord\Shared\Html::addHtml($section, $myText);
// // $reader = \PhpOffice\PhpWord\IOFactory::createReader('HTML');
// // $phpWord = $reader->load('helloWorld.html');
// // $writer = IOFactory::createWriter($phpWord);
// $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
// $objWriter->save('helloWorld.docx');
// Eden::DECORATOR;

// $imap = eden('mail')->imap(
//     'imap.gmail.com', 
//     'kurniawanekosaputro6@gmail.com', 
//     'kurniaone',  
//     993, 
//     true);

// $imap = eden('mail')->imap(
//     'imap.gmail.com',
//     'subhan.dinda.putra@gmail.com', 
//     'thehammer13865',   
//     993, 
//     true);

// // // // $imap = eden('mail')->smtp(
// // // //     'smtp.gmail.com', 
// // // //     'subhan.dinda.putra@gmail.com', 
// // // //     'thehammer13865', 
// // // //     465, 
// // // //     true);

// // $mailboxes = $imap->getMailboxes(); 
// $imap->setActiveMailbox('INBOX');
// // // echo $imap->setActiveMailbox('INBOX')->getActiveInbox(); //--> INBOX 
// // print_r($mailboxes);
// // // // $emails = $imap->search(array('TO "subhan.dinda.putra@gmail.com"'), 0, 1); 
// // $emails = $imap->getEmails(0, 20); 
// // print_r($emails);
// // // $count = $imap->getEmailTotal(); 
// $email = $imap->getUniqueEmails(827, true); 
// print_r($email);
// // print_r($email['attachment']['presentasi hasil.pptx']);

// $file = $email['attachment']['perbaikan jurnal.docx']['application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
// $fp = fopen('perbaikan jurnal.docx', "w+");
// fwrite($fp, $attachment['attachment']);
// fclose($fp);
?>


<?php
    // /**
    //  * Return array of IMAP messages for pagination
    //  *
    //  * @param   int     $page       page number to get
    //  * @param   int     $per_page   number of results per page
    //  * @param   array   $sort       array('subject', 'asc') etc
    //  * 
    //  * @return  mixed   array containing imap_fetch_overview, pages, and total rows if successful, false if an error occurred
    //  * @author  Raja K
    //  */
    // public function listMessages($page = 1, $per_page = 25, $sort = null) {
    //     $limit = ($per_page * $page);
    //     $start = ($limit - $per_page) + 1;
    //     $start = ($start < 1) ? 1 : $start;
    //     $limit = (($limit - $start) != ($per_page-1)) ? ($start + ($per_page-1)) : $limit;
    //     $info = imap_check($this->_imap_stream);
    //     $limit = ($info->Nmsgs < $limit) ? $info->Nmsgs : $limit;

    //     if(true === is_array($sort)) {
    //         $sorting = array(
    //                     'direction' => array(   'asc' => 0, 
    //                                             'desc' => 1),

    //                     'by'        => array(   'date' => SORTDATE,
    //                                             'arrival' => SORTARRIVAL,
    //                                             'from' => SORTFROM,
    //                                             'subject' => SORTSUBJECT,
    //                                             'size' => SORTSIZE));
    //         $by = (true === is_int($by = $sorting['by'][$sort[0]])) 
    //                         ? $by 
    //                         : $sorting['by']['date'];
    //         $direction = (true === is_int($direction = $sorting['direction'][$sort[1]])) 
    //                         ? $direction 
    //                         : $sorting['direction']['desc'];

    //         $sorted = imap_sort($this->_imap_stream, $by, $direction);

    //         $msgs = array_chunk($sorted, $per_page);
    //         $msgs = $msgs[$page-1];
    //     }
    //     else 
    //         $msgs = range($start, $limit); //just to keep it consistent

    //     $result = imap_fetch_overview($this->_imap_stream, implode($msgs, ','), 0);
    //     if(false === is_array($result)) return false;

    //     //sorting!
    //     if(true === is_array($sorted)) {
    //         $tmp_result = array();
    //         foreach($result as $r)
    //             $tmp_result[$r->msgno] = $r;

    //         $result = array();
    //         foreach($msgs as $msgno) {
    //             $result[] = $tmp_result[$msgno];
    //         }
    //     }

    //     $return = array('res' => $result,
    //                     'start' => $start,
    //                     'limit' => $limit,
    //                     'sorting' => array('by' => $sort[0], 'direction' => $sort[1]),
    //                     'total' => imap_num_msg($this->_imap_stream));
    //     $return['pages'] = ceil($return['total'] / $per_page);
    //     return $return;
    // }
?>

<?php
   
   
  /**
   * 
   *  Gmail attachment extractor.
   *
   *  Downloads attachments from Gmail and saves it to a file.
   *  Uses PHP IMAP extension, so make sure it is enabled in your php.ini,
   *  extension=php_imap.dll
   *
   *  Credits:  Sameer Borate email: metapix[at]gmail.com
   */
   
   
  // set_time_limit(3000); 
   
   
  // /* connect to gmail with your credentials */
  // $hostname = '{imap.gmail.com:993/imap/ssl/novalidate-cert}INBOX';
  // $username = 'subhan.dinda.putra@gmail.com'; # e.g somebody@gmail.com
  // $password = 'thehammer13865';
  
  // /* try to connect */
  // $inbox = imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());
    
   // function listMessages($_imap_stream, $page = 1, $per_page = 25, $sort = null) {
   //      $limit = ($per_page * $page);
   //      $start = ($limit - $per_page) + 1;
   //      $start = ($start < 1) ? 1 : $start;
   //      $limit = (($limit - $start) != ($per_page-1)) ? ($start + ($per_page-1)) : $limit;
   //      $info = imap_check($_imap_stream);
   //      $limit = ($info->Nmsgs < $limit) ? $info->Nmsgs : $limit;

   //      if(true === is_array($sort)) {
   //          $sorting = array(
   //                      'direction' => array(   'asc' => 0, 
   //                                              'desc' => 1),

   //                      'by'        => array(   'date' => SORTDATE,
   //                                              'arrival' => SORTARRIVAL,
   //                                              'from' => SORTFROM,
   //                                              'subject' => SORTSUBJECT,
   //                                              'size' => SORTSIZE));
   //          $by = (true === is_int($by = $sorting['by'][$sort[0]])) 
   //                          ? $by 
   //                          : $sorting['by']['date'];
   //          $direction = (true === is_int($direction = $sorting['direction'][$sort[1]])) 
   //                          ? $direction 
   //                          : $sorting['direction']['desc'];

   //          $sorted = imap_sort($_imap_stream, $by, $direction);

   //          $msgs = array_chunk($sorted, $per_page);
   //          $msgs = $msgs[$page-1];
   //      }
   //      else{
   //        $sorted = null;
   //        $msgs = range($start, $limit); //just to keep it consistent
   //      } 
            

   //      $result = imap_fetch_overview($_imap_stream, implode($msgs, ','), 0);
   //      if(false === is_array($result)) return false;

   //      //sorting!
   //      if(true === is_array($sorted)) {
   //          $tmp_result = array();
   //          foreach($result as $r)
   //              $tmp_result[$r->msgno] = $r;

   //          $result = array();
   //          foreach($msgs as $msgno) {
   //              $result[] = $tmp_result[$msgno];
   //          }
   //      }

   //      $return = array('res' => $result,
   //                      'start' => $start,
   //                      'limit' => $limit,
   //                      'sorting' => array('by' => $sort[0], 'direction' => $sort[1]),
   //                      'total' => imap_num_msg($_imap_stream));
   //      $return['pages'] = ceil($return['total'] / $per_page);
   //      return $return;
   //  }

   //  print_r(listMessages($inbox, 1, 5, array('date', 'desc')));
   
  /* get all new emails. If set to 'ALL' instead 
   * of 'NEW' retrieves all the emails, but can be 
   * resource intensive, so the following variable, 
   * $max_emails, puts the limit on the number of emails downloaded.
   * 
   */
  // $hostname = '{imap.gmail.com:993/imap/ssl/novalidate-cert}INBOX';
  // $username = 'subhan.dinda.putra@gmail.com'; # e.g somebody@gmail.com
  // $password = 'thehammer13865';
  
  // /* try to connect */
  // $conn = imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());

  // $emails = imap_search($conn,'ALL');
   
  //         // $overview = imap_fetch_overview($inbox,$email_number,0);
   
  //         // $message = imap_fetchbody($inbox,$email_number,2);
   
  //         // $structure = imap_fetchstructure($inbox, $email_number);
   
  //         // $attachments = array();

  //         // print_r($overview);
  // // rsort($emails);
  // // print_r($emails);
  // //$overview = imap_fetch_overview($inbox,102,0);
  // //print_r($overview);
  // /* useful only if the above search is set to 'ALL' */
  // $max_emails = 20;
   
   
  // /* if any emails found, iterate through each email */
  // if($emails) {
   
  //     $count = 1;
   
  //     /* put the newest emails on top */
  //     rsort($emails);
   
  //     /* for every email... */
  //     foreach($emails as $email_number) 
  //     {
   
  //         /* get information specific to this email */
  //         $overview = imap_fetch_overview($inbox,$email_number,0);
   
  //         /* get mail message */
  //         $message = imap_fetchbody($inbox,$email_number,2);
   
  //         /* get mail structure */
  //         $structure = imap_fetchstructure($inbox, $email_number);
   
  //         $attachments = array();
          
  //         // echo $overview[0]->subject . "<BR>";

  //         print_r($overview);

  //         /* if any attachments found... */
  //         if(isset($structure->parts) && count($structure->parts)) 
  //         {
  //             for($i = 0; $i < count($structure->parts); $i++) 
  //             {
  //                 $attachments[$i] = array(
  //                     'is_attachment' => false,
  //                     'filename' => '',
  //                     'name' => '',
  //                     'attachment' => ''
  //                 );
   
  //                 if($structure->parts[$i]->ifdparameters) 
  //                 {
  //                     foreach($structure->parts[$i]->dparameters as $object) 
  //                     {
  //                         if(strtolower($object->attribute) == 'filename') 
  //                         {
  //                             $attachments[$i]['is_attachment'] = true;
  //                             $attachments[$i]['filename'] = $object->value;
  //                         }
  //                     }
  //                 }
   
  //                 if($structure->parts[$i]->ifparameters) 
  //                 {
  //                     foreach($structure->parts[$i]->parameters as $object) 
  //                     {
  //                         if(strtolower($object->attribute) == 'name') 
  //                         {
  //                             $attachments[$i]['is_attachment'] = true;
  //                             $attachments[$i]['name'] = $object->value;
  //                         }
  //                     }
  //                 }
   
  //                 if($attachments[$i]['is_attachment']) 
  //                 {
  //                     $attachments[$i]['attachment'] = imap_fetchbody($inbox, $email_number, $i+1);
   
  //                     /* 4 = QUOTED-PRINTABLE encoding */
  //                     if($structure->parts[$i]->encoding == 3) 
  //                     { 
  //                         $attachments[$i]['attachment'] = base64_decode($attachments[$i]['attachment']);
  //                     }
  //                     /* 3 = BASE64 encoding */
  //                     elseif($structure->parts[$i]->encoding == 4) 
  //                     { 
  //                         $attachments[$i]['attachment'] = quoted_printable_decode($attachments[$i]['attachment']);
  //                     }
  //                 }
  //             }
  //         }
   
  //         /* iterate through each attachment and save it */
  //         foreach($attachments as $attachment)
  //         {
  //             if($attachment['is_attachment'] == 1)
  //             {
  //                 $filename = $attachment['name'];
  //                 if(empty($filename)) $filename = $attachment['filename'];
   
  //                 if(empty($filename)) $filename = time() . ".dat";
   
  //                 /* prefix the email number to the filename in case two emails
  //                  * have the attachment with the same file name.
  //                  */
  //                 print_r($email_number);
  //                 print_r($filename);
  //                 $fp = fopen($email_number . "-" . $filename, "w+");
  //                 fwrite($fp, $attachment['attachment']);
  //                 fclose($fp);
  //             }
   
  //         }
   
  //         if($count++ >= $max_emails) break;
  //     }
   
  // } 
   
  // /* close the connection */
  // imap_close($inbox);
   
  // echo "Done";
   
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ODA KRIPTO| </title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    
    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="dashboard.php" class="site_title"><i class="fa fa-key"></i> <span>E-Security</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>Oda</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                  <li><a href="createmsg.php"><i class="fa fa-edit"></i> Enkripsi </a></li>
                  <li><a><i class="fa fa fa-inbox"></i> Dekripsi <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="inbox.php"><i class="fa fa-commenting-o"></i>Pesan Masuk</a></li>
                    </ul>
                  </li>
                  <li><a href="about.php"><i class="fa fa-heart"></i> About </a></li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a href="login.html" data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"> </span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt="">Oda
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>Oda</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>Oda</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>Oda</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>Oda</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
          <div class="clearfix"></div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Buat Pesan<small>Email Security</small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <ul class="dropdown-menu" role="menu">
                       
                      </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div id="alerts"></div>

                  <form method="post" action="send_email.php" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                    
          

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input name="email" id="email" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Subject <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="subject" name="subject" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>


                    <div class="ln_solid"></div>

                  <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor">
                    <div class="btn-group">
                      <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="fa fa-font"></i><b class="caret"></b></a>
                      <ul class="dropdown-menu">
                      </ul>
                    </div>

                    <div class="btn-group">
                      <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
                      <ul class="dropdown-menu">
                        <li>
                          <a data-edit="fontSize 5">
                            <p style="font-size:17px">Huge</p>
                          </a>
                        </li>
                        <li>
                          <a data-edit="fontSize 3">
                            <p style="font-size:14px">Normal</p>
                          </a>
                        </li>
                        <li>
                          <a data-edit="fontSize 1">
                            <p style="font-size:11px">Small</p>
                          </a>
                        </li>
                      </ul>
                    </div>

                    <div class="btn-group">
                      <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
                      <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
                      <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
                      <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
                    </div>

                    <div class="btn-group">
                      <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
                      <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
                      <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
                      <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
                    </div>

                    <div class="btn-group">
                      <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
                      <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
                      <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
                      <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
                    </div>

                    <div class="btn-group">
                        <div class="dropdown-menu input-append">
                        <input class="span2" placeholder="URL" type="text" data-edit="createLink" />
                        <button class="btn" type="button">Add</button>
                      </div>
                     
                    </div>
      
                    <div class="btn-group">
                      <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
                      <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
                    </div>

                    <div class="btn-group">
                    
                    <input type="file" data-clear-btn="false" name="file-upload" id="btnUploadFile" value="">
                    </div>
                  </div>

                  <textarea id="editor" class="my-editor editor-wrapper" name="message" id="message" style="display:block; width: 100%"></textarea>

                  <br>
                  <input class="btn btn-sm btn-success btn-block"  type="submit" value="Kirim" />
                 
                  <br />

                  <div class="ln_solid"></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="vendors/starrr/dist/starrr.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>

    <!-- bootstrap-daterangepicker -->
    <script>
    // function bacaUrl(input) {
    //   console.log(input.files);
    //   try {
    //     if (input.files && input.files[0]) {
    //       var reader = new FileReader();
    //       reader.onload = function (e) {
    //         //$('#gambar').attr('src', e.target.result);
    //         console.log(e);
    //       }
          
    //       reader.readAsDataURL(input.files[0]);
    //       // document.getElementById("pathGambar").value = "";
    //     }
    //   } catch (e) {
    //     alert(e);
    //     }
    // }

    // // fungsi untuk melakukan pembacaan gambar pada saat file dipilih
    // $("#btnUploadFile").change(function(event){
    //      var tmppath = URL.createObjectURL(event.target.files[0]);
    //      console.log(tmppath);

    // });

  $(document).ready(function() {

        //  $('#btnUploadFile').on('change', function() {
        //     var file_data = $('#btnUploadFile').prop('files')[0];   
        //     var form_data = new FormData();                  
        //     form_data.append('file', file_data);
        //     //alert(form_data);                             
        //     $.ajax({
        //         url: 'parser.php', // point to server-side PHP script 
        //         dataType: 'text',  // what to expect back from the PHP script, if anything
        //         cache: false,
        //         contentType: false,
        //         processData: false,
        //         data: form_data,                         
        //         type: 'post',
        //         success: function(php_script_response){
        //             // alert(php_script_response); // display response from the PHP script, if any
        //             $(".my-editor").text(php_script_response);
        //         }
        //      });
        // });


        $('#birthday').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_4"
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
      });
  
    </script>
    <!-- /bootstrap-daterangepicker -->

    <!-- bootstrap-wysiwyg -->
    <script>
      $(document).ready(function() {
        function initToolbarBootstrapBindings() {
          var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
              'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
              'Times New Roman', 'Verdana'
            ],
            fontTarget = $('[title=Font]').siblings('.dropdown-menu');
          $.each(fonts, function(idx, fontName) {
            fontTarget.append($('<li><a data-edit="fontName ' + fontName + '" style="font-family:\'' + fontName + '\'">' + fontName + '</a></li>'));
          });
          $('a[title]').tooltip({
            container: 'body'
          });
          $('.dropdown-menu input').click(function() {
              return false;
            })
            .change(function() {
              $(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');
            })
            .keydown('esc', function() {
              this.value = '';
              $(this).change();
            });

          $('[data-role=magic-overlay]').each(function() {
            var overlay = $(this),
              target = $(overlay.data('target'));
            overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
          });

          if ("onwebkitspeechchange" in document.createElement("input")) {
            var editorOffset = $('#editor').offset();

            $('.voiceBtn').css('position', 'absolute').offset({
              top: editorOffset.top,
              left: editorOffset.left + $('#editor').innerWidth() - 35
            });
          } else {
            $('.voiceBtn').hide();
          }
        }

        function showErrorAlert(reason, detail) {
          var msg = '';
          if (reason === 'unsupported-file-type') {
            msg = "Unsupported format " + detail;
          } else {
            console.log("error uploading file", reason, detail);
          }
          $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
            '<strong>File upload error</strong> ' + msg + ' </div>').prependTo('#alerts');
        }

        initToolbarBootstrapBindings();

        $('#editor').wysiwyg({
          fileUploadError: showErrorAlert
        });

        window.prettyPrint;
        prettyPrint();
      });
    </script>
    <!-- /bootstrap-wysiwyg -->

    <!-- Select2 -->
    <script>
      $(document).ready(function() {
        $(".select2_single").select2({
          placeholder: "Select a state",
          allowClear: true
        });
        $(".select2_group").select2({});
        $(".select2_multiple").select2({
          maximumSelectionLength: 4,
          placeholder: "With Max Selection limit 4",
          allowClear: true
        });
      });
    </script>
    <!-- /Select2 -->

    <!-- jQuery Tags Input -->
    <script>
      function onAddTag(tag) {
        alert("Added a tag: " + tag);
      }

      function onRemoveTag(tag) {
        alert("Removed a tag: " + tag);
      }

      function onChangeTag(input, tag) {
        alert("Changed a tag: " + tag);
      }

      $(document).ready(function() {
        $('#tags_1').tagsInput({
          width: 'auto'
        });
      });
    </script>
    <!-- /jQuery Tags Input -->

    <!-- Parsley -->
    <script>
      $(document).ready(function() {
        $.listen('parsley:field:validate', function() {
          validateFront();
        });
        $('#demo-form .btn').on('click', function() {
          $('#demo-form').parsley().validate();
          validateFront();
        });
        var validateFront = function() {
          if (true === $('#demo-form').parsley().isValid()) {
            $('.bs-callout-info').removeClass('hidden');
            $('.bs-callout-warning').addClass('hidden');
          } else {
            $('.bs-callout-info').addClass('hidden');
            $('.bs-callout-warning').removeClass('hidden');
          }
        };
      });

      $(document).ready(function() {
        $.listen('parsley:field:validate', function() {
          validateFront();
        });
        $('#demo-form2 .btn').on('click', function() {
          $('#demo-form2').parsley().validate();
          validateFront();
        });
        var validateFront = function() {
          if (true === $('#demo-form2').parsley().isValid()) {
            $('.bs-callout-info').removeClass('hidden');
            $('.bs-callout-warning').addClass('hidden');
          } else {
            $('.bs-callout-info').addClass('hidden');
            $('.bs-callout-warning').removeClass('hidden');
          }
        };
      });
      try {
        hljs.initHighlightingOnLoad();
      } catch (err) {}
    </script>
    <!-- /Parsley -->

    <!-- Autosize -->
    <script>
      $(document).ready(function() {
        autosize($('.resizable_textarea'));
      });
    </script>
    <!-- /Autosize -->

    <!-- jQuery autocomplete -->
    <script>
      $(document).ready(function() {
        var countries = { AD:"Andorra",A2:"Andorra Test",AE:"United Arab Emirates",AF:"Afghanistan",AG:"Antigua and Barbuda",AI:"Anguilla",AL:"Albania",AM:"Armenia",AN:"Netherlands Antilles",AO:"Angola",AQ:"Antarctica",AR:"Argentina",AS:"American Samoa",AT:"Austria",AU:"Australia",AW:"Aruba",AX:"Åland Islands",AZ:"Azerbaijan",BA:"Bosnia and Herzegovina",BB:"Barbados",BD:"Bangladesh",BE:"Belgium",BF:"Burkina Faso",BG:"Bulgaria",BH:"Bahrain",BI:"Burundi",BJ:"Benin",BL:"Saint Barthélemy",BM:"Bermuda",BN:"Brunei",BO:"Bolivia",BQ:"British Antarctic Territory",BR:"Brazil",BS:"Bahamas",BT:"Bhutan",BV:"Bouvet Island",BW:"Botswana",BY:"Belarus",BZ:"Belize",CA:"Canada",CC:"Cocos [Keeling] Islands",CD:"Congo - Kinshasa",CF:"Central African Republic",CG:"Congo - Brazzaville",CH:"Switzerland",CI:"Côte d’Ivoire",CK:"Cook Islands",CL:"Chile",CM:"Cameroon",CN:"China",CO:"Colombia",CR:"Costa Rica",CS:"Serbia and Montenegro",CT:"Canton and Enderbury Islands",CU:"Cuba",CV:"Cape Verde",CX:"Christmas Island",CY:"Cyprus",CZ:"Czech Republic",DD:"East Germany",DE:"Germany",DJ:"Djibouti",DK:"Denmark",DM:"Dominica",DO:"Dominican Republic",DZ:"Algeria",EC:"Ecuador",EE:"Estonia",EG:"Egypt",EH:"Western Sahara",ER:"Eritrea",ES:"Spain",ET:"Ethiopia",FI:"Finland",FJ:"Fiji",FK:"Falkland Islands",FM:"Micronesia",FO:"Faroe Islands",FQ:"French Southern and Antarctic Territories",FR:"France",FX:"Metropolitan France",GA:"Gabon",GB:"United Kingdom",GD:"Grenada",GE:"Georgia",GF:"French Guiana",GG:"Guernsey",GH:"Ghana",GI:"Gibraltar",GL:"Greenland",GM:"Gambia",GN:"Guinea",GP:"Guadeloupe",GQ:"Equatorial Guinea",GR:"Greece",GS:"South Georgia and the South Sandwich Islands",GT:"Guatemala",GU:"Guam",GW:"Guinea-Bissau",GY:"Guyana",HK:"Hong Kong SAR China",HM:"Heard Island and McDonald Islands",HN:"Honduras",HR:"Croatia",HT:"Haiti",HU:"Hungary",ID:"Indonesia",IE:"Ireland",IL:"Israel",IM:"Isle of Man",IN:"India",IO:"British Indian Ocean Territory",IQ:"Iraq",IR:"Iran",IS:"Iceland",IT:"Italy",JE:"Jersey",JM:"Jamaica",JO:"Jordan",JP:"Japan",JT:"Johnston Island",KE:"Kenya",KG:"Kyrgyzstan",KH:"Cambodia",KI:"Kiribati",KM:"Comoros",KN:"Saint Kitts and Nevis",KP:"North Korea",KR:"South Korea",KW:"Kuwait",KY:"Cayman Islands",KZ:"Kazakhstan",LA:"Laos",LB:"Lebanon",LC:"Saint Lucia",LI:"Liechtenstein",LK:"Sri Lanka",LR:"Liberia",LS:"Lesotho",LT:"Lithuania",LU:"Luxembourg",LV:"Latvia",LY:"Libya",MA:"Morocco",MC:"Monaco",MD:"Moldova",ME:"Montenegro",MF:"Saint Martin",MG:"Madagascar",MH:"Marshall Islands",MI:"Midway Islands",MK:"Macedonia",ML:"Mali",MM:"Myanmar [Burma]",MN:"Mongolia",MO:"Macau SAR China",MP:"Northern Mariana Islands",MQ:"Martinique",MR:"Mauritania",MS:"Montserrat",MT:"Malta",MU:"Mauritius",MV:"Maldives",MW:"Malawi",MX:"Mexico",MY:"Malaysia",MZ:"Mozambique",NA:"Namibia",NC:"New Caledonia",NE:"Niger",NF:"Norfolk Island",NG:"Nigeria",NI:"Nicaragua",NL:"Netherlands",NO:"Norway",NP:"Nepal",NQ:"Dronning Maud Land",NR:"Nauru",NT:"Neutral Zone",NU:"Niue",NZ:"New Zealand",OM:"Oman",PA:"Panama",PC:"Pacific Islands Trust Territory",PE:"Peru",PF:"French Polynesia",PG:"Papua New Guinea",PH:"Philippines",PK:"Pakistan",PL:"Poland",PM:"Saint Pierre and Miquelon",PN:"Pitcairn Islands",PR:"Puerto Rico",PS:"Palestinian Territories",PT:"Portugal",PU:"U.S. Miscellaneous Pacific Islands",PW:"Palau",PY:"Paraguay",PZ:"Panama Canal Zone",QA:"Qatar",RE:"Réunion",RO:"Romania",RS:"Serbia",RU:"Russia",RW:"Rwanda",SA:"Saudi Arabia",SB:"Solomon Islands",SC:"Seychelles",SD:"Sudan",SE:"Sweden",SG:"Singapore",SH:"Saint Helena",SI:"Slovenia",SJ:"Svalbard and Jan Mayen",SK:"Slovakia",SL:"Sierra Leone",SM:"San Marino",SN:"Senegal",SO:"Somalia",SR:"Suriname",ST:"São Tomé and Príncipe",SU:"Union of Soviet Socialist Republics",SV:"El Salvador",SY:"Syria",SZ:"Swaziland",TC:"Turks and Caicos Islands",TD:"Chad",TF:"French Southern Territories",TG:"Togo",TH:"Thailand",TJ:"Tajikistan",TK:"Tokelau",TL:"Timor-Leste",TM:"Turkmenistan",TN:"Tunisia",TO:"Tonga",TR:"Turkey",TT:"Trinidad and Tobago",TV:"Tuvalu",TW:"Taiwan",TZ:"Tanzania",UA:"Ukraine",UG:"Uganda",UM:"U.S. Minor Outlying Islands",US:"United States",UY:"Uruguay",UZ:"Uzbekistan",VA:"Vatican City",VC:"Saint Vincent and the Grenadines",VD:"North Vietnam",VE:"Venezuela",VG:"British Virgin Islands",VI:"U.S. Virgin Islands",VN:"Vietnam",VU:"Vanuatu",WF:"Wallis and Futuna",WK:"Wake Island",WS:"Samoa",YD:"People's Democratic Republic of Yemen",YE:"Yemen",YT:"Mayotte",ZA:"South Africa",ZM:"Zambia",ZW:"Zimbabwe",ZZ:"Unknown or Invalid Region" };

        var countriesArray = $.map(countries, function(value, key) {
          return {
            value: value,
            data: key
          };
        });

        // initialize autocomplete with custom appendTo
        $('#autocomplete-custom-append').autocomplete({
          lookup: countriesArray
        });
      });
    </script>
    <!-- /jQuery autocomplete -->

    <!-- Starrr -->
    <script>
      $(document).ready(function() {
        $(".stars").starrr();

        $('.stars-existing').starrr({
          rating: 4
        });

        $('.stars').on('starrr:change', function (e, value) {
          $('.stars-count').html(value);
        });

        $('.stars-existing').on('starrr:change', function (e, value) {
          $('.stars-count-existing').html(value);
        });
      });
    </script>
    <!-- /Starrr -->
  </body>
</html>
