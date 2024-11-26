<?php
// sendEmail_accept.php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer's autoloader
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

// Get the recipient's email address from the POST data
$recipientEmail = $_POST['email'];
$packageId = $_POST['packageId'];
$confirmationId = $_POST['confirmationId'];


require_once './db_connection.php';

// Retrieve client information
$sql = "SELECT * FROM information_details
WHERE id = '$confirmationId' 
AND package_id = '$packageId'
ORDER BY package_id DESC 
LIMIT 1";
$result = $conn->query($sql);

// Retrieve details and packages information
$sql2 = "SELECT * FROM details_and_packages
WHERE id='$confirmationId'
AND package_id = '$packageId'
ORDER BY package_id DESC LIMIT 1";
$result2 = $conn->query($sql2);

if ($result->num_rows > 0 && $result2->num_rows > 0) {
    $row = $result->fetch_assoc();
    $row2 = $result2->fetch_assoc();

    // Generate a QR code for the client's name
    $clientName = $row["first_name"] . ' ' . $row["middle_name"] . ' ' . $row["last_name"];
    $tourPackage = $row2["tour_package"];
    $totalGuests = $row2["total_guests"];
    $checkIn = $row2["check_in_date_and_time"];
    $checkOut = $row2["check_out_date_and_time"];
    $room = $row2["room_accomodation"];
    $totalRate = $row2["total_package_rate"];
} else {
    $error = 'Error: Walang Laman';
    
}

// Create a new PHPMailer instance
$mail = new PHPMailer(true); // 'true' enables exceptions

try {
    // Set up SMTP for Gmail (or your SMTP server)
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; 
    $mail->SMTPAuth = true;
    $mail->Username = 'naturaverdefarm2023@gmail.com'; 
    $mail->Password = ''; 
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587; 

    // Set email content
    $mail->setFrom('naturaverdefarm2023@gmail.com', 'Natura Verde'); // Replace with your name and email
    $mail->addAddress($recipientEmail); // Recipient's email address
    $mail->Subject = 'Natura Verde Farm and Private Resort Reservation';
    $mail->Body =
        '
    Dear Valued Customer,

    We are delighted to inform you that your reservation at Natura Verde Farm and Private Resort has been successfully confirmed! Your upcoming stay with us is now secured, and we eagerly anticipate your arrival at our exquisite resort.
    Our dedicated team is committed to ensuring that your time with us is nothing short of exceptional. Should you have any questions or special requests related to your reservation, please do not hesitate to reach out to our resort through our official website. We are here to cater to your needs and make your stay extraordinary.
    While you have the flexibility to cancel your reservation, kindly note that cancellations are only accepted up to one week before your scheduled arrival at our resort.
    We eagerly look forward to hosting you at Natura Verde Farm and Private Resort, and we are committed to providing you with an unforgettable and outstanding experience. If you require any assistance or have inquiries, please feel free to contact us at your convenience.
    We extend our sincerest gratitude for choosing Natura Verde Farm and Private Resort for your upcoming getaway. We are eager to ensure that your stay with us is nothing short of exceptional.

    Here is the summary of your reservation:
    Name: ' . $clientName . '
    Tour Package: ' . $tourPackage . '
    Total Guest/s: ' . $totalGuests . '
    Check In Date & Time: ' . $checkIn . '
    Check Out Date & Time: ' . $checkOut . '
    Room Accommodation: ' . $room . '
    Total Package Rate: Php ' . number_format((float)$totalRate, 2, '.', ',') . '


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
