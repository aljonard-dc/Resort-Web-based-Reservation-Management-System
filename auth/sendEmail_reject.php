<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer's autoloader
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

// Get the recipient's email address from the POST data
$recipientEmail = $_POST['email'];

// Create a new PHPMailer instance
$mail = new PHPMailer(true); // 'true' enables exceptions

try {
    // Set up SMTP for Gmail (or your SMTP server)
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server host
    $mail->SMTPAuth = true;
    $mail->Username = 'naturaverdefarm2023@gmail.com'; // Replace with your email address
    $mail->Password = ''; // Replace with your email password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587; // Replace with your SMTP server port

    // Set email content
    $mail->setFrom('naturaverdefarm2023@gmail.com', 'Natura Verde'); // Replace with your name and email
    $mail->addAddress($recipientEmail); // Recipient's email address
    $mail->Subject = 'Natura Verde Farm and Private Resort Reservation';
    $mail->Body = 
    '
    Dear Esteemed Customer,

    We trust this message finds you in good health. It is with regret that we must inform you of the cancellation of your reservation at Natura Verde Farm and Private Resort. We understand that circumstances change, and we are here to assist you with any inquiries or concerns you may have regarding this cancellation.
    If you ever decide to reschedule your stay or plan a visit to Natura Verde Farm and Private Resort in the future, we welcome you to make another reservation through our website, selecting the available dates that best suit your needs.
    We understand that such changes can be disappointing, and we genuinely look forward to the opportunity to welcome you to our resort in the days ahead. If you have any questions or require further information, please do not hesitate to reach out to us.
    We extend our gratitude for considering Natura Verde Farm and Private Resort for your travel plans. Your interest in our resort is greatly valued, and we eagerly anticipate the possibility of hosting you in the future.

    With warm regards,
    The Natura Family';


    // Send the email
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
?>

