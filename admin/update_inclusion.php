<?php
// Include your database connection logic here
require_once 'db_connection.php';

// Check if it's a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the JSON data from the request body
    $data = json_decode(file_get_contents('php://input'), true);

    // Extract data
    $packageId = $data['packageId'];
    $packageName = $data['packageName'];
    $inclusionFor = implode(",", $data['inclusionFor']); // Convert array to comma-separated string

    // Update the database
    $query = "UPDATE package_inclusions SET inclusion_name = '$packageName', inclusion_for = '$inclusionFor' WHERE inclusion_id = $packageId";

    if ($conn->query($query) === TRUE) {
        // Successfully updated
        echo json_encode(['status' => 'success']);
    } else {
        // Error updating
        echo json_encode(['status' => 'error', 'message' => $conn->error]);
    }

    // Close the database connection
    $conn->close();
} else {
    // Not a valid request method
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>
