<?php
// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../../phpmailer/Exception.php';
require '../../phpmailer/PHPMailer.php';
require '../../phpmailer/SMTP.php';

class EmailRegistro {
    private $msg;
    private $correoDestino;
    private $nombreDestino;
    private $mail;

    public function __construct($correoDestino, $nombreDestino, $codigoVerificacion) {
        $this->correoDestino = $correoDestino;
        $this->nombreDestino = $nombreDestino;
        $this->msg = $this->crearMensaje($codigoVerificacion);
        $this->mail = new PHPMailer(true);
        $this->configurarSMTP();
    }

    private function crearMensaje($codigo) {
        return '
        <!DOCTYPE html>
        <html lang="en">
        <body style="background-color: #e3b23f; margin: 0; padding: 50px;">
            <div style="padding: 5px; border: 2px solid rgb(187, 165, 39); width: 80%; height: 40vh; position: relative; margin: auto; border-radius: 10px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.4);">
                <h2 style="text-align: center; margin-top: 30px; margin-bottom: 20px;">Hola, '.$this -> nombreDestino .'!</h2>
                <p style="margin: 7px 0;">Gracias por registrarte en LTA Kopulso</p>
                <p style="margin: 7px 0;">Para completar tu proceso de verificación, por favor ingresa el siguiente código.</p>
                <p style="margin: 7px 0; font-size: 18px; font-weight: bold; color: blue;">
                    Código de verificación: <span style="color: blue; font-weight: bold;">' . htmlspecialchars($codigo) . '</span>
                </p>
                <p style="margin: 7px 0;">Este código es válido por 10 minutos. Si no solicitaste este código, ignora este mensaje.</p>
                <footer style="text-align: center; position: absolute; bottom: 1rem; width: 100%;">
                    <p>Si tienes alguna pregunta, no dudes en <a href="https://example.com/contacto.php">contactarnos</a>.</p>
                </footer>
            </div>
        </body>
        </html>';
    }

    private function configurarSMTP() {
        try {
            // Server settings
            $this->mail->SMTPDebug = 0;                      // Disable verbose debug output
            $this->mail->isSMTP();                            // Send using SMTP
            $this->mail->Host = 'smtp.gmail.com';            // Set the SMTP server to send through
            $this->mail->SMTPAuth = true;                     // Enable SMTP authentication
            $this->mail->Username = 'oscaralejandrosoto9@gmail.com'; // SMTP username
            $this->mail->Password = 'your_secure_password';   // SMTP password (consider using environment variables)
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Enable implicit TLS encryption
            $this->mail->Port = 465;                          // TCP port to connect to

            // Recipients
            $this->mail->setFrom('oscaralejandrosoto9@gmail.com', 'noreply');
            $this->mail->addAddress($this->correoDestino, 'Oscar Soto'); // Add a recipient

            // Content
            $this->mail->isHTML(true);                        // Set email format to HTML
            $this->mail->Subject = 'Correo desde la app de LTA Kopulso';
            $this->mail->Body = $this->msg;
            $this->mail->AltBody = 'Este es el cuerpo en texto plano para clientes de correo no HTML';

        } catch (Exception $e) {
            echo "Error de configuración: {$this->mail->ErrorInfo}";
        }
    }

    public function enviarCorreo() {
        try {
            $this->mail->send();
            echo 'El mensaje ha sido enviado';
        } catch (Exception $e) {
            echo "El mensaje no pudo ser enviado. Error del Mailer: {$this->mail->ErrorInfo}";
        }
    }
}

// Ejemplo de uso
// $emailRegistro = new EmailRegistro('destinatario@example.com', '123456');
// $emailRegistro->enviarCorreo();
?>