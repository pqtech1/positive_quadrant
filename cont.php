<?php
  if(isset($_POST))
                {

                include_once 'Mail/class.phpmailer.php';
                        $name = $_POST['name'];
                        $email = $_POST["email"];

                       /*if(!empty($_FILES['file1']['name']))
                        {
                                      $data = explode(".", $_FILES['file1']['name']);
                                            $fileName = $data[0].time().'.'.$data[1];

                                 move_uploaded_file($_FILES["file1"]["tmp_name"],
                                        "upload/" . $fileName);
                        }*/

                $attach_file_path= "upload/".$fileName;
                try {
                        $mail = new PHPMailer(true);
                        $mail->IsSMTP();                           // tell the class to use SMTP
                        $mail->SMTPAuth   = true;                  // enable SMTP authentication
                        $mail->Port       = 587;		//stripslashes($row_smtp->port);                    // set the SMTP server port
                        $mail->Host       =  'mail.togglebits.com';//'mail.togglebytes.co.in'; //stripslashes($row_smtp->host); // SMTP server
                        $mail->Username   = 'togglebits'; //stripslashes($row_smtp->username);     // SMTP server username
                        $mail->Password   = 'CrackTheCode@1234'; //stripslashes($row_smtp->password);            // SMTP server password			
                        $mail->SMTPSecure =  '';
                        $mail->FromName = 'togglebits';



                        $mail->AddAddress('harsh@togglebytes.com',""); // change your email with email_address variable
                    
                        $mail->AddCC('harsh@togglebits.com',""); // change your email with email_address variable

                        /*$mail->AddBCC('.com','');*/

                       /* if(!empty($attach_file_path)) {
                            if(file_exists($attach_file_path)) {
                                $mail->AddAttachment($attach_file_path);
                            } else {
                                echo "File or path not found";
                                exit;
                            }
                        }	*/




                        $mail->Subject = 'Enquiry By '.$name;
                        $message = 'Hi <br> The Cats Pajamas Team <br><br>';
                        $message .= 'Name : '.$name."\r\n";
                        $message .= 'Email : '.$email."\r\n";
                        $message .= '<br><br> Regard <br> The cats Pajamas Team';
                    
                        $mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
                        $mail->WordWrap = 80; // set word wrap
                        $mail->MsgHTML(nl2br($message));
                        $mail->IsHTML(true); // send as HTML

                        //print_r($mail);

                        if($mail->Send())
                        {	
                            echo json_encode(array('success' => true));
                            return true;
                        }

                    } catch (phpmailerException $e) {

                        print_r($e);
                        return false;
                    }
                }
?>