<?php
require_once './db_connection.php';

session_start();

if (isset($_POST['accept'])) {
    // Retrieve the last inserted client_id from the payment table
    $getLastClientIdQuery = "SELECT MAX(package_id) AS package_id FROM payment";
    $result = $conn->query($getLastClientIdQuery);
    $checkout = "";
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $lastClientId = $row["package_id"]; 

        $user_id = $_SESSION['id_session'];
        
        
        // Insert data into the confirmation table
        $status = "Confirmed";
        $currentDate = date('Y-m-d');
        $insertConfirmationQuery = "INSERT INTO confirmation (package_id, id, status, checkout_status, date) VALUES ('$lastClientId', '$user_id', '$status', '$checkout', '$currentDate')";
        
        if ($conn->query($insertConfirmationQuery) === TRUE) {
            echo "Success";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Error: Unable to retrieve client ID.";
    }
} else {
    echo "Invalid request";
}

$conn->close();
?>
