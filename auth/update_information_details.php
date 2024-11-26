<?php
    if (isset($_POST['submit'])) {
        $last_name = $_POST['last_name'];
        $first_name = $_POST['first_name'];
        $middle_name = $_POST['middle_name'];
        $age = $_POST['age'];
        $contact_number = $_POST['contact_number'];
        $address = $_POST['address'];
        $email_address = $_POST['email_address'];

        require_once './db_connection.php';
        $sql = "UPDATE information_details SET last_name='$last_name', first_name='$first_name', middle_name='$middle_name', age='$age', contact_number='$contact_number', address='$address', email_address='$email_address' WHERE client_id=(SELECT MAX(client_id) FROM payment)";
        if ($conn->query($sql) === TRUE) {
            header('Location: summary_step5.php');
        } else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    }
?>
