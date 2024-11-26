<?php
require_once './db_connection.php';
// Get the values from the form
$max_pax = $_POST['total_size'];
$user_id = $_POST['guestID'];
$tour_package = $_POST['number_of_nights'] . " night/s";
$total_guests = $_POST['total_guests'];
$children = $_POST['children'];
$check_in_date_and_time = $_POST['check_in_date'] . " " . $_POST['check_in_time'];
$check_out_date_and_time = $_POST['check_out_date'] . " " . $_POST['check_out_time'];
$room_accomodation = $_POST['room_accommodation'];
$total_package_rates = $_POST['total_package_rate'];
$total_package_rate = (float) str_replace(',', '', $total_package_rates);
$excess = 0;
$excess_amount = 0;




// Prepare and bind the SQL statement
$stmt = $conn->prepare("INSERT INTO details_and_packages (id, tour_package, total_guests, children, check_in_date_and_time, check_out_date_and_time, room_accomodation, total_package_rate, max_pax, excess_guests, amount_due_for_excess_guests) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}


$stmt->bind_param("sssssssssss", $user_id, $tour_package, $total_guests, $children, $check_in_date_and_time, $check_out_date_and_time, $room_accomodation, $total_package_rate, $max_pax, $excess, $excess_amount);

// Execute the statement
if ($stmt->execute()) {
    header('Location: clientInfo_step1.php');
} else {
    echo "Error: " . $stmt->error;
}



// Close the statement and connection
$stmt->close();
$conn->close();

?>
