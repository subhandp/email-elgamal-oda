<?php 
require_once 'vendor/autoload.php';
require 'elgamal.php';
require 'DocxConversion.php';
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ODA Kripto </title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Custom styling plus plugins -->
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
                      <li><a href="inbox.php"><i class="fa fa-commenting-o"></i>Pesan Masuk</span></a></li>
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
              <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
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
                    <li><a href="login.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
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

            <div class="page-title">
              <div class="title_left">
                <h3>Kotak Masuk <small>Email Security</small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa fa-inbox"></i> Utama</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row">
                      <div class="col-sm-12 mail_list_column">
                        

                        <?php 

                            $hostname = '{imap.gmail.com:993/imap/ssl/novalidate-cert}INBOX';
                            $username = 'subhan.dinda.putra@gmail.com'; # e.g somebody@gmail.com
                            $password = 'thehammer13865';

                            Eden::DECORATOR;

                            $imap = eden('mail')->imap(
                                    'imap.gmail.com', 
                                    $username, 
                                    $password, 
                                    993, 
                                    true);
                            $imap->setActiveMailbox('INBOX');
                            

                            if (isset($_GET['msgId']) && isset($_GET['p']) && isset($_GET['k'])) {
                                
                            }
                            else{
                                $emails = $imap->getEmails(0, $imap->getEmailTotal());
                                $emails = $imap->search(array('SUBJECT "[CHIPHER]"'), 0, 5); 
                                $emails = array_reverse($emails);
                                
                                //print_r($emails);

                                foreach ($emails as $email) {
                                    echo "<a href='#' uid=\"{$email['uid']}\" class=\"list-inbox\">
                                      <div class=\"mail_list\">
                                        <div style=\"cursor:pointer\">
                                          <h3>{$email['from']['name']} <small>{$email['date']}</small></h3>
                                          <p>{$email['subject']}</p>
                                        </div>
                                      </div>
                                    </a>";
                                }
                            }
                            

                            // $imap->setActiveMailbox('INBOX');
                            // $email = $imap->getUniqueEmails(877, true);
                            // $name = [];
                            // $bin = [];
                            // //print_r($email);
                          
                            // foreach ($email['attachment'] as $filename => $formatname) {

                            //   foreach ($email['attachment'][$filename] as $formatname => $bin) {

                                

                            //         if(file_exists($filename)){
                            //           unlink($filename);
                            //         }
                                                                            

                            //           $fp = fopen($filename,"w+");
                            //           fwrite($fp,$bin);
                            //           fclose($fp);
                            //           readfile($filename);
                                    
                            //   }
                            // }




                            // // The PDF source is in original.pdf
                            // readfile('original.pdf');

                            // foreach ($email['text/plain'] as $key => $value) {
                            //   echo $value;
                            // }

                            // print_r($email['attachment']['text/plain']);
                            // $name = 'Kata Pengantar.docx';
                            // $d = $email['attachment'][$name]['application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
                            // //print_r($email); 

                            //         if(file_exists($name)){
                            //           unlink($name);
                            //         }
                                    

                            //           $fp = fopen($name,"w+");
                            //           fwrite($fp,$d);
                            //           fclose($fp);

              
                            // $emails = $imap->getEmails(0,135);
                            // $count = $imap->getEmailTotal(); 
                            // $emails = $imap->search(array('SUBJECT "[CHIPHER]"'), 0, 5); 
                            // $emails = array_reverse($emails);
                            // print_r(count($emails)); 
                            // print_r($emails);
                         ?>
                        
                        
                      </div>

                      <?php 


                                
                            function parsepart($p,$i){
                                  //echo "ini p";
                                  //print_r($p);
                                    global $link,$msgid,$partsarray;
                                    //where to write file attachments to:
                                    $filestore = '';

                                    //fetch part
                                    $part=imap_fetchbody($link,$msgid,$i);
                                    //if type is not text
                                    if ($p->type!=0){
                                        //DECODE PART        
                                        //decode if base64
                                        if ($p->encoding==3)$part=base64_decode($part);
                                        //decode if quoted printable
                                        if ($p->encoding==4)$part=quoted_printable_decode($part);
                                        //no need to decode binary or 8bit!
                                        
                                        //get filename of attachment if present
                                        $filename='';
                                        // if there are any dparameters present in this part
                                        if ($p->ifdparameters){
                                            foreach ($p->dparameters as $dparam){
                                                if ((strtoupper($dparam->attribute)=='NAME') ||(strtoupper($dparam->attribute)=='FILENAME')) $filename=$dparam->value;
                                                }
                                            }
                                        //if no filename found
                                        if ($filename==''){
                                            // if there are any parameters present in this part
                                            if (count($p->parameters)>0){
                                                foreach ($p->parameters as $param){
                                                    if ((strtoupper($param->attribute)=='NAME') ||(strtoupper($param->attribute)=='FILENAME')) $filename=$param->value;
                                                    }
                                                }
                                            }
                                        //write to disk and set partsarray variable
                                        if ($filename!=''){
                                            $partsarray[$i]['attachment'] = array('filename'=>$filename,'binary'=>$part);
                                            }
                                    //end if type!=0        
                                    }
                                    
                                    //if part is text
                                    else if($p->type==0){
                                        //decode text
                                        //if QUOTED-PRINTABLE
                                        if ($p->encoding==4) $part=quoted_printable_decode($part);
                                        //if base 64
                                        if ($p->encoding==3) $part=base64_decode($part);
                                        
                                        //OPTIONAL PROCESSING e.g. nl2br for plain text
                                        //if plain text

                                        if (strtoupper($p->subtype)=='PLAIN')1;
                                        //if HTML
                                        else if (strtoupper($p->subtype)=='HTML')1;
                                        $partsarray[$i]['text'] = array('type'=>$p->subtype,'string'=>$part);
                                    }
                                    
                                    //if subparts... recurse into function and parse them too!
                                    if (isset($p->parts)){
                                        foreach ($p->parts as $pno=>$parr){
                                            parsepart($parr,($i.'.'.($pno+1)));            
                                            }
                                        }
                                return;
                                }


                        // if (isset($_GET['msgId']) && isset($_GET['p']) && isset($_GET['k'])) {
                        //     $key = new elgamal(0,0,0,0,0);
                        //     $p = (int)$_GET['p'];
                        //     $k = (int)$_GET['k'];
                        //     $msgId = (int)$_GET['msgId'];
                            
                        //     $link=imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());

                        //     $msgid = imap_msgno($link, $msgId);

                        //         //fetch structure of message
                        //     $s=imap_fetchstructure($link,$msgid);

                        //         //see if there are any parts
                        //         if (count($s->parts)>0){
                        //         foreach ($s->parts as $partno=>$partarr){
                        //             //parse parts of email
                        //             parsepart($partarr,$partno+1);
                        //             }
                        //         }
                        //         //for not multipart messages
                        //         else{
                        //             //get body of message
                        //             $text=imap_body($link,$msgid);
                        //             //decode if quoted-printable
                        //             if ($s->encoding==4) $text=quoted_printable_decode($text);
                        //             //OPTIONAL PROCESSING
                        //             if (strtoupper($s->subtype)=='PLAIN') $text=$text;
                        //             if (strtoupper($s->subtype)=='HTML') $text=$text;
                                    
                        //             $partsarray['not multipart']['text']=array('type'=>$s->subtype,'string'=>$text);
                        //         }
                                
                        //         $body = $key->_dekripsi($partsarray['1.2']['text']['string'],$p, $k);

                        //         $overview = imap_fetch_overview($link,$msgid,0);
                                    
                        //         $subject = $overview[0]->subject;

                        //         echo "<a uid=\"{$overview[0]->uid}\" data-toggle=\"modal\" data-target=\"#modalForm\">
                        //                       <div class=\"mail_list\">
                        //                         <div style=\"cursor:pointer\">
                        //                           <h4>{$overview[0]->from} - {$subject} <small>{$overview[0]->date}</small></h4>
                        //                           <p>{$body}</p>
                        //                         </div>
                        //                       </div>
                        //                     </a>";

                        //         // print_r($partsarray);
                        //         //print_r(isset(var));

                                

                        //         if ($partsarray[2]['attachment']['binary']){
                        //             $path = $partsarray[2]['attachment']['filename'];
                        //             $binary = $partsarray[2]['attachment']['binary'];
                        //             echo "<form id=\"form-get-attach\">
                        //                     <input name='attach-bin' type=\"hidden\" value_bin=\"\">
                        //                     <input name='attach-path' type=\"hidden\" value_path=\"x\">
                        //                     <button><i class=\"fa fa-download\"></i> {$path}</button>
                        //                 </form>";
                        //             // if(file_exists($path)){
                        //             //   unlink($path);
                        //             // }
                                    

                        //               // $filename = $partsarray[2]['attachment']['filename'];
                        //               // $fp = fopen($filename,"w+");
                        //               // fwrite($fp,$partsarray[2]['attachment']['binary']);
                        //               // fclose($fp);

                                      
                        //               // $docObj = new DocxConversion($path);
                        //               // $myText = $docObj->convertToText();
                        //               // unlink($path);
                        //               // $myText = $key->_dekripsi($myText,$p, $k);

                        //               // //$myText = html_entity_decode($myText);
                        //               // $fp=fopen('temp.html',"w+");
                        //               // fwrite($fp, $myText);
                        //               // fclose($fp);

                        //               // $reader = \PhpOffice\PhpWord\IOFactory::createReader('HTML');
                        //               // $phpWord = $reader->load('temp.html');
                        //               // $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
                        //               // $objWriter->save($path);

                        //               // echo  "<a href=\"{$path}\" download=\"{$filename}\">{$filename}</a>";
                        //               // $phpWord = new \PhpOffice\PhpWord\PhpWord();
                        //               // $section = $phpWord->createSection();
                        //               // $section->addText($myText);
                        //               // unlink($path);
                                      
                        //               // $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
                        //               // $objWriter->save($path);
                                    
                        //         }
                          

                        //     imap_close($link);
                        // }
                        // else{

                            $conn = imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());

                            $emails = imap_search($conn,'ALL');
                             
                            $max_emails = 5;

                            if($emails) {
                             
                                $count = 1;
                             
                                rsort($emails);
                             
                                foreach($emails as $email_number) 
                                {
                             
                                    $overview = imap_fetch_overview($conn,$email_number,0);
                                    
                                    $subject = $overview[0]->subject;

                                    if (explode(' ', $subject)[0] == '[CHIPHER]') {
                                        
                                        echo "<a href='#' uid=\"{$overview[0]->uid}\" class=\"list-inbox\">
                                              <div class=\"mail_list\">
                                                <div style=\"cursor:pointer\">
                                                  <h3>{$overview[0]->from} <small>{$overview[0]->date}</small></h3>
                                                  <p>{$subject}</p>
                                                </div>
                                              </div>
                                            </a>";
                                        
                                        if($count++ >= $max_emails) break;
                                    }
                                    
                                }
                             
                            } 
                             
                            /* close the connection */
                            imap_close($conn);
                        // }


                       ?>

                    </div>
                  </div>
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
  
    
    <!-- compose -->
    <div class="compose col-md-6 col-xs-12">
      <div class="compose-header">
        New Message
        <button type="button" class="close compose-close">
          <span>×</span>
        </button>
      </div>
     
      <div class="compose-body">
        <div id="alerts"></div>

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
            <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="fa fa-link"></i></a>
            <div class="dropdown-menu input-append">
              <input class="span2" placeholder="URL" type="text" data-edit="createLink" />
              <button class="btn" type="button">Add</button>
            </div>
            <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a>
          </div>

          <div class="btn-group">
            <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
            <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
          </div>

          <div class="btn-group">
            <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
            <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
          </div>
        </div>

        <div id="editor" class="editor-wrapper"></div>
      </div>

      <div class="compose-footer">
        <button id="send" class="btn btn-sm btn-success" type="button">Send</button>
      </div>
    </div>
    <!-- /compose -->

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="vendors/google-code-prettify/src/prettify.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>

    <!-- bootstrap-wysiwyg -->
    <script>
      $(document).ready(function() {

        $('#btn-dekripsi').click(function(e) {
            var uid = $("input[name='uid-hidden']").val();
            var p = $("input[name='nilai_p']").val();
            var k = $("input[name='nilai_k']").val();
            var url = "http://localhost/production/inbox.php?msgId="+uid+"&p="+p+"&k="+k;
            window.location.href = url;
        });

        $('.list-inbox').click(function(e) {
            e.preventDefault();
            var uid = $(this).attr('uid');
            $("#uid-hidden").val(uid);
            $("#modalForm").modal('show');
            //console.log($("#uid-hidden").val());
        });

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

        prettyPrint();
      });
    </script>
    <!-- /bootstrap-wysiwyg -->

    <!-- compose -->
    <script>
      $('#compose, .compose-close').click(function(){
        $('.compose').slideToggle();
      });
    </script>>
    <!-- /compose -->



<div class="modal fade" id="modalForm" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Tutup</span>
                </button>
                <h4 class="modal-title" id="labelModalKu">Kunci Buka Enkripsi</h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p> 
                <form role="form" method="post" id="form-kunci">
                    <div class="form-group">
                        <label for="masukkankunci">Masukan Kunci</label>
                        <input type="hidden" name="uid-hidden" id="uid-hidden">
                        <input type="text" class="form-control" name="nilai_p" placeholder="Nilai P"/></br>
                        <input type="text" class="form-control" name="nilai_k" placeholder="Nilai K"/>                        
                    </div>
                   
                </form>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button id="btn-dekripsi" type="button" class="btn btn-success submitBtn" >Dekripsi</button>
            </div>
        </div>
    </div>
</div>

  </body>




</html>