<?php
include '../db_connection.php';


$reservation_id = $_POST["package_id"]; 
$new_excess_guests = $_POST["new_excess_guests"];
$new_amount_for_excess_guests = $_POST["new_amount_for_excess_guests"];
$guests_pax = $_POST["guests_pax"];





$sql_payment = "SELECT total_package_rate, downpayment, due_balance FROM payment WHERE package_id = '$reservation_id' ORDER BY package_id DESC LIMIT 1";
$result_payment = $conn->query($sql_payment);

if ($result_payment->num_rows > 0) {
    $row_payment = $result_payment->fetch_assoc();

    $current_total_package_rate = $row_payment["total_package_rate"];
    $current_due_balance = $row_payment["due_balance"];
    $current_downpayment = $row_payment["downpayment"];
    



    $sql_details = "SELECT total_package_rate, excess_guests, max_pax, total_guests FROM details_and_packages WHERE package_id = '$reservation_id' ORDER BY package_id DESC LIMIT 1";
    $result_details = $conn->query($sql_details);

    if ($result_details->num_rows > 0) {
        $row_details = $result_details->fetch_assoc();
        $details_total_package_rate = $row_details["total_package_rate"];
        $details_excess_guests = $row_details["excess_guests"];
        $details_max_pax = $row_details["max_pax"];
        $details_total_guests = $row_details["total_guests"];
        $details_together = $details_total_guests + $new_excess_guests;
        $new_due_balance = $details_total_package_rate - $current_downpayment; 

        
        

        // if ($details_together < $details_max_pax) {
        //     $new_amount_for_excess_guests = 0;


        if ($new_amount_for_excess_guests == 0 || $new_excess_guests == 0 ) {

            $sql_update_payment = "UPDATE payment SET total_package_rate = '$details_total_package_rate', due_balance = '$new_due_balance' WHERE package_id = '$reservation_id'";
            if ($conn->query($sql_update_payment) === TRUE) {

                $sql_update_details = "UPDATE details_and_packages SET excess_guests = '$new_excess_guests', amount_due_for_excess_guests = '0' WHERE package_id = '$reservation_id'";
                if ($conn->query($sql_update_details) === TRUE) {
                    echo "Excess guests/amount updated successfully";
                } else {
                    echo "Error updating details_and_packages: " . $conn->error;
                }
            } else {
                echo "Error updating payment: " . $conn->error;
            }
        } 

    // }
        
         
        elseif ($guests_pax <= 0) {

            $new_total_package_rate = $details_total_package_rate + $new_amount_for_excess_guests;
            $new_due_balancess = $current_total_package_rate - $current_downpayment;
        

            $sql_update_payment = "UPDATE payment SET total_package_rate = '$details_total_package_rate', due_balance = '$new_due_balancess' WHERE package_id = '$reservation_id'";
            if ($conn->query($sql_update_payment) === TRUE) {

                $sql_update_details = "UPDATE details_and_packages SET excess_guests = '$new_excess_guests', amount_due_for_excess_guests = '0' WHERE package_id = '$reservation_id'";
                if ($conn->query($sql_update_details) === TRUE) {
                    echo "Excess guests/amount updated successfully";
                } else {
                    echo "Error updating details_and_packages: " . $conn->error;
                }
            } else {
                echo "Error updating payment: " . $conn->error;
            }
        }



         else {

            $new_total_package_rate = $details_total_package_rate + $new_amount_for_excess_guests;
            $new_due_balances = $new_total_package_rate - $current_downpayment;


            $sql_update_payment = "UPDATE payment SET total_package_rate = '$new_total_package_rate', due_balance = '$new_due_balances' WHERE package_id = '$reservation_id'";
            if ($conn->query($sql_update_payment) === TRUE) {

                $sql_update_details = "UPDATE details_and_packages SET excess_guests = '$new_excess_guests', amount_due_for_excess_guests = '$new_amount_for_excess_guests' WHERE package_id = '$reservation_id'";
                if ($conn->query($sql_update_details) === TRUE) {
                    echo "Excess guests/amount updated successfully";
                } else {
                    echo "Error updating details_and_packages: " . $conn->error;
                }
            } else {
                echo "Error updating payment: " . $conn->error;
            }
        }
    } else {
        echo "Error: Details and Packages record not found.";
    }
} else {
    echo "Error: Payment record not found.";
}

$conn->close();

?>
