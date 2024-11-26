<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if (isset($_POST['btn-send'])) {
    $UserName = $_POST['name'];
    $Email = $_POST['email'];
    $Msg = $_POST['message'];

    $Subject ='Contact Us';

    if (empty($UserName) || empty($Email) || empty($Subject) || empty($Msg)) {
        header('Location: contactus.php?error=empty');
        exit();
    } else {
        $to = "naturaverdefarm2023@gmail.com";

        $mail = new PHPMailer(true); // Enable exceptions
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->SMTPSecure = 'tls'; // Use 'tls' for Gmail
            $mail->SMTPAuth = true;
            $mail->Username = 'naturaverdefarm2023@gmail.com';
            $mail->Password = '';

            $mail->setFrom($Email, $UserName);
            $mail->addAddress($to);
            $mail->Subject = $Subject;
            
            // Construct the email body
            $emailBody = "Username: $UserName\n";
            $emailBody .= "Email: $Email\n\n";
            $emailBody .= "Message:\n$Msg";
            
            $mail->Body = $emailBody;

            $mail->send();
            header("Location: contactus.php?success=true");
            exit();
        } catch (Exception $e) {
            header("Location: contactus.php?error=send&message=" . urlencode($e->getMessage()));
            exit();
        }
    }
} else {
    header("Location: contactus.php");
    exit();
}
?>
