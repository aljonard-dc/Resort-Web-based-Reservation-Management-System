<?php
require_once 'db_connection.php';

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the updated package data from the JSON request
    $data = json_decode(file_get_contents("php://input"));

    // Extract the data
    $packageId = $data->packageId;
    $packageName = $data->packageName;
    $packagePrice = $data->packagePrice;
    $maxPax = $data->maxPax;

    // Perform the database update
    try {
        // Prepare and execute an SQL UPDATE statement
        $sql = "UPDATE package_prices SET package_name = ?, package_price = ?, max_pax = ? WHERE price_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssii", $packageName, $packagePrice, $maxPax, $packageId); // Assuming $packageId is accessible here

        if ($stmt->execute()) {
            // Update successful
            echo json_encode(array("message" => "Package updated successfully."));
        } else {
            // Update failed
            echo json_encode(array("message" => "Error updating package."));
        }

        $stmt->close();
    } catch (Exception $e) {
        // Handle database connection or query errors
        echo json_encode(array("message" => "Database error: " . $e->getMessage()));
    }
} else {
    // Handle non-POST requests
    echo json_encode(array("message" => "Invalid request."));
}
?>
