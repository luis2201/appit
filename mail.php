<?php 

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    $mail = new PHPMailer(true);

    $email = 'edu-approvals-support@google.com';
    $investigador = 'EDU-Approvals-Support';

    try {
        //Server settings
        //$mail->SMTPDebug = 2; 
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                    //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'mail.itsup.edu.ec';                    //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'itsup@itsup.edu.ec';                   //SMTP username
        $mail->Password   = 'itsup2023';                            //SMTP password
        $mail->SMTPSecure = 'tls';                                  //Enable implicit TLS encryption
        $mail->Port       = 25;                                     //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('itsup@itsup.edu.ec', 'ITSUP');
        $mail->addAddress($email, $investigador);                   //Add a recipient
        
        //Content
        $mail->isHTML(true);                                        //Set email format to HTML
        $mail->Subject = '[#44713449] Google Workspace for Education Approval Request';
        $mail->Body    = '';
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        //echo $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

?>