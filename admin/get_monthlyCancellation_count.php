<?php
include '../db_connection.php';

// Get the current year
$currentYear = date('Y');

// Get the current month
$currentMonth = date('n');

// Query to count unique combinations of "package_id" and "status" in the "cancellation" entity for the current month and year
$sql = "SELECT COUNT(DISTINCT CONCAT(package_id)) AS canceled_count
        FROM cancellation
        WHERE YEAR(cdate) = $currentYear
        AND MONTH(cdate) = $currentMonth";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $canceledCount = $row["canceled_count"];
    echo $canceledCount;
} else {
    echo "0";
}

$conn->close();
?>
