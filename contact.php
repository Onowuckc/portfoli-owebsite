<?php
require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->SMTPDebug = 0;                                   // Disable verbose debug output
        $mail->isSMTP();                                        // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com';                   // Specify main SMTP server
        $mail->SMTPAuth   = true;                               // Enable SMTP authentication
        $mail->Username   = 'ijomahchinazaaugustine@gmail.com'; // SMTP username
        $mail->Password   = 'syij hkll amks ddsc';              // SMTP password or App password if 2FA enabled
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;      // Enable TLS encryption
        $mail->Port       = 587;                                // TCP port to connect to

        // Recipients
        $mail->setFrom('ijomahchinazaaugustine@gmail.com', 'Contact Form');
        $mail->addAddress('ijomahchinazaaugustine@gmail.com');  // Add a recipient

        // Content
        $mail->isHTML(false);                                   // Set email format to plain text
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body    = "Name: $name\nEmail: $email\nMessage: $message";

        $mail->send();
        echo "Thank you, $name. Your message has been received.";
    } catch (Exception $e) {
        echo "There was a problem sending your message. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Invalid request.";
}
?>
