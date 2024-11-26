<?php
 require_once './db_connection.php';

    $max_pax = $_POST['max_pax'];
    $user_id = $_POST['guestID'];
    $tour_package = "night tour";
    $total_guests = $_POST['total_guests'];
    $children = $_POST['children'];
    $check_in_date_and_time = $_POST['check_in_date'] . " " . $_POST['check_in_time'];
    $check_out_date_and_time = $_POST['check_out_date'] . " " . $_POST['check_out_time'];
    $room_accomodation = $_POST['room_accomodation'];
    $total_package_rates = $_POST['total_package_rate'];
    $total_package_rate = (float) str_replace(',', '', $total_package_rates);
    $excess = 0;
    $excess_amount = 0;

    // Insert the data into the database
    $stmt = $conn->prepare("INSERT INTO details_and_packages (id, tour_package, total_guests, children, check_in_date_and_time, check_out_date_and_time, room_accomodation, total_package_rate, max_pax, excess_guests, amount_due_for_excess_guests) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssss", $user_id, $tour_package, $total_guests, $children, $check_in_date_and_time, $check_out_date_and_time, $room_accomodation, $total_package_rate, $max_pax, $excess, $excess_amount);
    if ($stmt->execute()) {
        header('Location: clientInfo_step1.php');
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the database connection
    $conn->close();
?>