<?php
// Include your database connection logic here
require_once 'db_connection.php';

// Check if it's a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $roomName = $_POST['roomName'];
    $inclusionFor = isset($_POST['inclusionFor']) ? $_POST['inclusionFor'] : '';

    // Insert the new room into the database
    $query = "INSERT INTO package_inclusions (inclusion_name, inclusion_for) VALUES ('$roomName', '$inclusionFor')";

    if ($conn->query($query) === TRUE) {
        // Successfully inserted
        echo json_encode(['status' => 'success']);
    } else {
        // Error inserting
        echo json_encode(['status' => 'error', 'message' => $conn->error]);
    }

    // Close the database connection
    $conn->close();
} else {
    // Not a valid request method
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>
