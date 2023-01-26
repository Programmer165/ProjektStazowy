<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require "../vendor/autoload.php";

function send_mail_to_admin($imie, $email)
{
    $mail = new PHPMailer(true);
    try {
        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host = 'smtp.example.com';
        $mail->Username = 'ty@example.com';
        $mail->Password = 'password';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 22; // lub 22

        $mail->setFrom('mail@example.com', 'Imie');
        $mail->addAddress('mail@example.com');

        $mail->isHTML(true);
        $mail->Subject = 'Rejestracja nowego użytkownika';
        $mail->Body = 'Dane: ';
        $mail->send();
    } catch (Exception $e) {
        echo "Wiadomość nie została wysłana {$e}. Mailer Error: {$mail->ErrorInfo}";
    }
    
}
?>