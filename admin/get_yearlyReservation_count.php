<?php
include '../db_connection.php';

// Get the current month as an integer (1 for January, 2 for February, etc.)
$currentMonth = date('Y');

// Query to count rows in the "confirmation" entity where "status" is 'Confirmed' and the date is in the current month
$sql = "SELECT COUNT(DISTINCT CONCAT(package_id, status)) AS reserved_count
        FROM confirmation
        WHERE status = 'Confirmed'
        AND YEAR(date) = $currentMonth";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $reservedCount = $row["reserved_count"];
    echo $reservedCount;
} else {
    $reservedCount = 0; // Default value if no matching rows are found
}

$conn->close();
?>
