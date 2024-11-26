<?php
// Include your database connection script (db_connection.php) here.
require_once 'db_connection.php';

// Check if the request is a POST request.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the room data from the FormData object.
    $roomName = $_POST['roomName'];
    $roomPrice = $_POST['roomPrice'];
    $maxPax = $_POST['maxPax'];
    $packageType = "overnight";
    $attribute = "main room";

    // Insert the room data into the database.
    $query = "INSERT INTO package_prices (package_name, package_price, package_type, attribute, max_pax) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    
    // Bind the parameters and execute the query.
    $stmt->bind_param("sssss", $roomName, $roomPrice, $packageType, $attribute, $maxPax); // Adjust the "s" placeholders to match your column types.
    
    if ($stmt->execute()) {
        // Insertion was successful.
        echo "Room added successfully.";
    } else {
        // Insertion failed.
        echo "Error adding room.";
    }

    // Close the database connection.
    $stmt->close();
    $conn->close();
} else {
    // Handle cases where the request method is not POST.
    echo "Invalid request method.";
}
?>
