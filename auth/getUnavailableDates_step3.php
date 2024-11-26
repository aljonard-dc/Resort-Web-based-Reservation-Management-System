<?php
// get-available-dates.php
require_once './db_connection.php'; 

// Get the unavailable check-in and check-out dates from the database
$sql = "SELECT check_in_date_and_time, check_out_date_and_time FROM details_and_packages
WHERE package_id NOT IN (
    SELECT package_id FROM confirmation WHERE status = 'Canceled'
)";

$result = $conn->query($sql);

$unavailableDates = [];
while ($row = $result->fetch_assoc()) {
    $checkInDateTime = new DateTime($row['check_in_date_and_time']);
    $checkOutDateTime = new DateTime($row['check_out_date_and_time']);
    $interval = new DateInterval('P1D');
    $period = new DatePeriod($checkInDateTime, $interval, $checkOutDateTime);
    foreach ($period as $date) {
        $unavailableDates[] = $date->format('Y-m-d');
    }
    // Add the check-out date to the unavailable dates array
    $unavailableDates[] = $checkOutDateTime->format('Y-m-d');
}

// Calculate the min and max dates
$minDate = date('Y-m-d');
$maxDate = date('Y-m-d', strtotime('+1 year'));

// Return the data as JSON
$data = [
    'minDate' => $minDate,
    'maxDate' => $maxDate,
    'unavailableDates' => array_values(array_unique($unavailableDates)),
];
header('Content-Type: application/json');
echo json_encode($data);

// Close the database connection
$conn->close();
?>
