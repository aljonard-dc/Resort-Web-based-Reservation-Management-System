<?php 

require_once './db_connection.php';

session_start();

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user inputs
    $packageID = $_POST["packageID"];
    $userID = $_POST["userID"];
    $clientName = $_POST["clientName"];
    $reason = $_POST["reason"];
    $otherReason = $_POST["other_reason"];

    // Get the current date
    $currentDate = date("Y-m-d");

    // SQL statement to insert data into the "cancellation" table with the current date
    $sqlInsert = "INSERT INTO cancellation (id, package_id, username, reason, other_reason, cdate) VALUES (?, ?, ?, ?, ?, ?)";

    // Prepare and execute the SQL statement for insertion
    $stmtInsert = $conn->prepare($sqlInsert);
    $stmtInsert->bind_param("ssssss", $userID, $packageID, $clientName, $reason, $otherReason, $currentDate);

    if ($stmtInsert->execute()) {
        // Data saved successfully, now update the status in the confirmation table
        $confirmationId = $_SESSION['id_session'];

        // SQL statement to update the status in the "confirmation" table
        $sqlUpdate = "UPDATE confirmation SET status = 'Canceled' WHERE id = ? AND package_id = '" . $packageID . "'";

        // Prepare and execute the SQL statement for updating
        $stmtUpdate = $conn->prepare($sqlUpdate);
        $stmtUpdate->bind_param("i", $confirmationId);

        if ($stmtUpdate->execute()) {
            header('Location: cancelpop-up.php');
            exit();
        } else {
            echo "Error updating confirmation status: " . $stmtUpdate->error;
        }

        // Close the statement for updating
        $stmtUpdate->close();
    } else {
        echo "Error inserting data: " . $stmtInsert->error;
    }

    // Close the statement and database connection for insertion
    $stmtInsert->close();
    $conn->close();
}
?>