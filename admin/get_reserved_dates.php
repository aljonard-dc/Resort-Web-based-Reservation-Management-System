<?php
include '../db_connection.php';

// Retrieve data from the database
$blueDates = [];
$redDates = [];
$query = "SELECT DATE(dp.check_in_date_and_time) AS check_in_date, DATE(dp.check_out_date_and_time) AS check_out_date, dp.tour_package, dp.total_guests, dp.room_accomodation, p.total_package_rate, c.status, c.checkout_status, CONCAT(id.first_name, ' ', id.middle_name, ' ', id.last_name) AS full_name
          FROM details_and_packages dp
          JOIN confirmation c ON dp.package_id = c.package_id
          JOIN information_details id ON dp.package_id = id.package_id 
          JOIN payment p ON dp.package_id = p.package_id WHERE c.status = 'Confirmed'";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $status = $row['status'];
    $fullName = $row['full_name'];
    $tourPackage = $row['tour_package'];
    $totalGuests = $row['total_guests'];
    $checkIn = $row['check_in_date'];
    $checkOut = $row['check_out_date'];
    $room = $row['room_accomodation'];
    $rate = $row['total_package_rate'];
    $checkout = $row['checkout_status'];

    $dateRange = [
        'full_name' => $fullName,
        'tour_package' => $tourPackage,
        'total_guests' => $totalGuests,
        'check_in' => $checkIn,
        'check_out' => $checkOut,
        'room_accomodation' => $room,
        'total_package_rate' => $rate,
        'status' => $status
        
    ];

    if ($checkout === "Checked-out and Paid") {
        $blueDates[] = $dateRange;
    } else {
        $redDates[] = $dateRange;
    }
}

// Close the database connection
mysqli_close($conn);

// Return the data as JSON response
$response = [
  'blueDates' => $blueDates,
  'redDates' => $redDates
];

// Set JSON response header
header('Content-Type: application/json');

// Output the JSON response
echo json_encode($response);
?>
