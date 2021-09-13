<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'vendor/autoload.php';
function myemail($userEmail, $token)
{
    $developmentMode = false;
    $mail = new PHPMailer($developmentMode);
    $mail->CharSet = "utf-8";
    // Passing `true` enables exceptions
  try {
    //Server settings
    $mail->SMTPDebug = 1;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'mdesignpro10@gmail.com';                 // SMTP username
    $mail->Password = '0781990310';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('mdesignpro10@gmail.com', 'E-Kibina');
    $mail->addAddress($userEmail);     // Add a recipient
$body = 
        '<p>'."Here is your verification code to confirm your E-Kibina account: <strong>  $token </strong>  <br><br>

        Enter it here to complete your account address verification.
        
        If you haven't requested this code or need help, please click here.
        
        
        
        Please do not reply to this email.
         Regards,
         E-Kibina
        ".'</p>';
        //Content
    $subject="An email verification token (code) is sent to the customer";
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject =$subject;
        $mail->Body = $body;
        $mail->AltBody = strip_tags($body);

        $mail->send();
        echo 'Message has been sent';

    }
    catch(Exception $e)
    {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
}

