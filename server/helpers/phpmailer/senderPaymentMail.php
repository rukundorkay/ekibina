<?php
  // Import PHPMailer classes into the global namespace
  // These must be at the top of your script, not inside a function
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  
  //Load composer's autoloader
  require 'vendor/autoload.php';
  function senderPaymentMail($senderFname,$senderLname,$associationName,$senderEmail,$receiverFname,$receiverLname,$paymentIntent,$amount,$currency){
  $developmentMode = FALSE;
  $mail = new PHPMailer($developmentMode);
                              // Passing `true` enables exceptions
  try {
      //Server settings
      $mail->SMTPDebug = 1;                                 // Enable verbose debug output
      $mail->isSMTP();                                      // Set mailer to use SMTP
      $mail->Host = 'smtp.teradig.com';  // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = 'info@justbtweenus.com';                 // SMTP username
      $mail->Password = 'HDrBz!Fb57o';                           // SMTP password
      $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = 587;                                    // TCP port to connect to
  
      //Recipients
      $mail->setFrom('info@justbtweenus.com', 'justbetweenus Team');
      $mail->addAddress($senderEmail);     // Add a recipient
      $body='`
      <table style="padding:0px;border:0px solid #DDD;margin:0 auto;font-family:calibri;font-weight:bold;">
      <tr>
              <td style="background-color:#fff;padding:10px 30px;margin:0;font-size:2.5em;color:#4A7BA5;text-align:center;">
                <img src="https://jausolutions.com/justbetweenus/media/LOGO.png"style="width:250px;">
              </td>
            </tr>
      <tr><td style="padding:10px 30px;margin:0;text-align:left;">
      Bonjour, '.$senderFname.' '.$senderLname.'
Un montant de '.$currency.' '.$amount.' a été déposé dan le compte bancaire de '.$receiverFname.' '.$receiverLname.' avec succès <br><br>

identifiant de transaction: '.$paymentIntent.'<br>
association:'.$associationName.' <br>


                  
                  
                  
        <p>Email:info@justbetweenus.com</p>
        <p>Cordialement,</p>
        <strong>
      
      Equipe Just Between Us</strong>
              </td></tr>
      <tr>  <td style="padding:10px 30px;margin:0;background:#3c83f9;border-top:1px solid #CCC;">
                  <p style="margin: 10px 0;text-align: center;">
                  <a style="color:white;padding-right: 10px;text-decoration:none;" href="https://www.facebook.com"> facebook
                    </a><a style="color:white;padding-right: 10px;text-decoration:none;" href="https://twitter.com">
                  twitter
                 </a>
              
      
                </p>
      
              </td> </tr>
      </table>
      
      
      
      `';
  
      //Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = "confirmation de paiement";
      $mail->Body    = $body;
      $mail->AltBody = strip_tags($body);
  
      $mail->send();
      echo 'Message has been sent';
      
  } catch (Exception $e) {
      echo 'Message could not be sent.';
      echo 'Mailer Error: ' . $mail->ErrorInfo;
  }
  }
  








?>