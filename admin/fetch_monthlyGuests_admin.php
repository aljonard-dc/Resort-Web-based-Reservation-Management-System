<?php
// Establish a connection to your MySQL database
include 'db_connection.php';

// Get the year from the AJAX request
$year = $_GET['year'];

// Query the database to retrieve monthly guests data for the selected year
$sql = "SELECT MONTH(check_in_date_and_time) AS month, SUM(total_guests + excess_guests) AS total_guests
        FROM details_and_packages
        WHERE YEAR(check_in_date_and_time) = ?
        GROUP BY MONTH(check_in_date_and_time)
        ORDER BY MONTH(check_in_date_and_time)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $year);
$stmt->execute();
$result = $stmt->get_result();

$guestsData = array_fill(0, 12, 0); // Initialize an array for 12 months with zeros

while ($row = $result->fetch_assoc()) {
    $month = $row['month'];
    $totalGuests = $row['total_guests'];
    $guestsData[$month - 1] = (int)$totalGuests; // Subtract 1 to match JavaScript array index
}

$stmt->close();
$conn->close();

// Return the guests data as JSON
header('Content-Type: application/json');
echo json_encode($guestsData);
?>
