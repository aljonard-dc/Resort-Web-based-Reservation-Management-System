<?php
// submit.php
require_once './db_connection.php';


$package_id = $_POST['package_id'];
$user_id = $_POST['guestID'];
$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$age = $_POST['age'];
$contactnumber = $_POST['contactnumber'];
$address = $_POST['address'];
$emailaddress = $_POST['emailaddress'];

$sql = "INSERT INTO information_details (package_id, id, last_name, first_name, middle_name, age, contact_number, address, email_address)
VALUES ('$package_id', '$user_id', '$lastname', '$firstname', '$middlename', '$age', '$contactnumber', '$address', '$emailaddress')";

if ($conn->query($sql) === TRUE) {
    header('Location: payment_step4.php');
exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>
