<?php
include '../db_connection.php';

// Get the reservation ID from the POST request
$reservation_id = $_POST["package_id"];

// Prepare and execute a multi-table DELETE statement
$sql = "DELETE confirmation, payment, information_details, details_and_packages
        FROM confirmation
        JOIN payment ON confirmation.package_id = payment.package_id
        JOIN information_details ON payment.package_id = information_details.package_id
        JOIN details_and_packages ON information_details.package_id = details_and_packages.package_id
        WHERE confirmation.package_id = '$reservation_id'";

if ($conn->query($sql) === TRUE) {
    // Deletion successful
    echo "Success";
} else {
    // Deletion failed
    echo "Error: " . $conn->error;
}

$conn->close();
?>
