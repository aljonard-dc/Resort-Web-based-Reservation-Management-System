<?php
// Include your database connection logic here
require_once 'db_connection.php';

// Check if it's a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the packageId from the POST data
    $packageId = $_POST['packageId'];

    // Delete the inclusion from the database
    $query = "DELETE FROM package_inclusions WHERE inclusion_id = $packageId";

    if ($conn->query($query) === TRUE) {
        // Successfully deleted
        echo json_encode(['status' => 'success']);
    } else {
        // Error deleting
        echo json_encode(['status' => 'error', 'message' => $conn->error]);
    }

    // Close the database connection
    $conn->close();
} else {
    // Not a valid request method
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>
