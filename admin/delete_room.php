<?php
// Include your database connection script (db_connection.php) here.
require_once 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $packageId = $_POST['packageId'];

    // Perform the deletion operation in the database.
    $query = "DELETE FROM package_prices WHERE price_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $packageId);

    if ($stmt->execute()) {
        // Deletion was successful.
        echo "Package deleted successfully.";
    } else {
        // Deletion failed.
        echo "Error deleting package.";
    }

    // Close the database connection.
    $stmt->close();
    $conn->close();
} else {
    // Handle cases where the request method is not POST.
    echo "Invalid request method.";
}
?>
