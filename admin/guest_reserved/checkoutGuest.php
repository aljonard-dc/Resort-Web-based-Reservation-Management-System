<?php
// Check if a reservation ID was sent in the request
if (isset($_POST["package_id"])) {
    // Get the reservation ID from the request
    $reservation_id = $_POST["package_id"];
    
    include '../db_connection.php';
    
    // Update the status of the selected row in the database
    $stmt = $conn->prepare("UPDATE confirmation SET checkout_status = 'Checked-out and Paid' WHERE package_id = ?");
    $stmt->bind_param("i", $reservation_id);
    $stmt->execute();
    
    // Close the database connection
    $conn->close();
}
?>
