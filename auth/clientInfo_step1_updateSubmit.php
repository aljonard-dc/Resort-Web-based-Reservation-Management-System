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

// Check if a record with the given package_id and user_id already exists
$checkSql = "SELECT * FROM information_details WHERE package_id = '$package_id' AND id = '$user_id'";
$checkResult = $conn->query($checkSql);

if (!$checkResult) {
    echo "Error: " . $conn->error;
} else {
    if ($checkResult->num_rows > 0) {
        // If a record exists, update the existing record
        $updateSql = "UPDATE information_details SET last_name = '$lastname', first_name = '$firstname', middle_name = '$middlename', age = '$age', contact_number = '$contactnumber', address = '$address', email_address = '$emailaddress' WHERE package_id = '$package_id' AND id = '$user_id'";

        if ($conn->query($updateSql) === TRUE) {
            header('Location: payment_step4.php');
            exit;
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        // If no record exists, insert a new record
        $insertSql = "INSERT INTO information_details (package_id, id, last_name, first_name, middle_name, age, contact_number, address, email_address)
        VALUES ('$package_id', '$user_id', '$lastname', '$firstname', '$middlename', '$age', '$contactnumber', '$address', '$emailaddress')";

        if ($conn->query($insertSql) === TRUE) {
            header('Location: payment_step4.php');
            exit;
        } else {
            echo "Error inserting record: " . $conn->error;
        }
    }
}

$conn->close();
?>
