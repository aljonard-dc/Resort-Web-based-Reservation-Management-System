<?php
 include 'db_connection.php';

// Get the decade (e.g., 2020s, 2030s) from the AJAX request
$decade = $_GET['decade'];

// Calculate the start and end years of the decade
$startYear = $decade;
$endYear = $startYear + 9;

// Query the database to retrieve yearly guest data for the specified decade
$sql = "SELECT YEAR(check_in_date_and_time) AS year, SUM(total_guests + excess_guests) AS total_guests
        FROM details_and_packages
        WHERE YEAR(check_in_date_and_time) BETWEEN ? AND ?
        GROUP BY YEAR(check_in_date_and_time)
        ORDER BY year";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $startYear, $endYear);
$stmt->execute();
$result = $stmt->get_result();

$guestsData = array(); // Initialize an array to store yearly guest data

while ($row = $result->fetch_assoc()) {
    $year = $row['year'];
    $totalGuests = $row['total_guests'];
    $guestsData[] = array('year' => $year, 'total_guests' => (int)$totalGuests);
}

$stmt->close();
$conn->close();

// Return the guest data as JSON
header('Content-Type: application/json');
echo json_encode($guestsData);
?>
