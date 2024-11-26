<?php
require_once './db_connection.php';

// Get values from the AJAX request
$user_id = $_POST['guestID'];
$total_package_rates = $_POST['totalPackageRate'];
$totalPackageRate = (float) str_replace(',', '', $total_package_rates);
$due = $_POST['dueBalance'];
$dueBalance = (float) str_replace(',', '', $due);
$down = $_POST['downpayment'];
$downpayment = (float) str_replace(',', '', $down);
$clientId = $_POST['clientID'];

// Check if the record already exists
$check_sql = "SELECT * FROM payment WHERE package_id='$clientId' AND id='$user_id' AND total_package_rate='$totalPackageRate'";
$check_result = $conn->query($check_sql);

if ($check_result->num_rows > 0) {
    // Update the existing record
    $update_sql = "UPDATE payment SET downpayment='$downpayment', due_balance='$dueBalance' WHERE package_id='$clientId' AND id='$user_id' AND total_package_rate='$totalPackageRate'";
    $update_result = $conn->query($update_sql);

    if ($update_result === TRUE) {
        header('Location: summary_step5.php');
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    // Insert a new record
    $insert_sql = "INSERT INTO payment (package_id, id, downpayment, total_package_rate, due_balance)
                   VALUES ('$clientId', '$user_id', '$downpayment', '$totalPackageRate', '$dueBalance')";
    $insert_result = $conn->query($insert_sql);

    if ($insert_result === TRUE) {
        header('Location: summary_step5.php');
    } else {
        echo "Error inserting record: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
