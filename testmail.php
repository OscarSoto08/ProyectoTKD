<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

$msg = '
<!DOCTYPE html>
<html lang="en">
<body style="background-color: #e3b23f; margin: 0; padding: 50px;">
    <div style="padding: 5px; border: 2px solid rgb(187, 165, 39); width: 80%; height: 40vh; position: relative; margin: auto; border-radius: 10px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.4);">
        <h2 style="text-align: center; margin-top: 30px; margin-bottom: 20px;">Hola, Oscar!</h2>
        <p style="margin: 7px 0;">Gracias por registrarte en LTA Kopulso</p>
        <p style="margin: 7px 0;">Para completar tu proceso de verificación, por favor ingresa el siguiente código.</p>
        <p style="margin: 7px 0; font-size: 18px; font-weight: bold; color: blue;">
            Código de verificación: <span style="color: blue; font-weight: bold;">123456</span>
        </p>
        <p style="margin: 7px 0;">Este código es válido por 10 minutos. Si no solicitaste este código, ignora este mensaje.</p>
        <footer style="text-align: center; position: absolute; bottom: 1rem; width: 100%;">
            <p>Si tienes alguna pregunta, no dudes en <a href="https://example.com/contacto.php">contactarnos</a>.</p>
        </footer>
    </div>
</body>
</html>';


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'oscaralejandrosoto9@gmail.com';                     //SMTP username
    $mail->Password   = 'qbxz xdqj szts pyue';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('oscaralejandrosoto9@gmail.com', 'noreply');
    $mail->addAddress('oscaralejandrosoto99@gmail.com', 'Oscar Soto');     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Correo desde la app de ltakopulso';
    $mail->Body    = $msg;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
