<?php 

// Include the database connection script
require_once './db_connection.php';

session_start();
// Check if the first name and last name session variables are set
if (!isset($_SESSION["id_session"]) || !isset($_SESSION["firstname_session"]) || !isset($_SESSION["middlename_session"]) || !isset($_SESSION["lastname_session"]) || !isset($_SESSION["age_session"]) || !isset($_SESSION["email_session"]) || !isset($_SESSION["phonenumber_session"])) {
    header("Location: ../../../user-login.php "); // Redirect to login if the session variables are not set
    exit();

}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Reservation History</title>
    <style>
       
     
::-webkit-scrollbar {
    width: 8px; 
    
}

::-webkit-scrollbar-thumb {
background: #A9A9A9; 
border-radius: 10px;
}

::-webkit-scrollbar-track {
background: #f1f1f1; 
}
.reservationhistory-sec{
    padding: 5em 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: auto;
}

.container {
    width: 50%;
    height: auto;
    padding: 2em ;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
   
}
.container h1 {
    padding: 1em;
    font-size: 1.5rem;
   
}
.reservation {
    padding: 1em;
    border: 1px solid #ccc;
    margin-bottom: 10px;
    border-radius: 5px;
    font-weight: bold;
    background: #f1f1f1;

}
.reservation h3{
    padding: 0.5em;
    font-size: 1.4rem;

}


.reservation .actions {
    display: flex;
    justify-content: space-between;
}
.more-details-text{
    padding-left: 1em;
    text-decoration: none;
    text-transform: uppercase;
    font-size: 1.2rem;
}
.more-details-text:hover{
    text-decoration: underline;
}
.cancel-button{
    width:15vw;
    height:5vh;
    background-color: #ff5733;
    color: white;
    border: none;
    padding: 5px 10px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1.2rem;
}
.cancel-button:hover {
    background-color: #ff0000;
    color: white;
}
@media only screen and (max-width:1200px){
    .reservationhistory-sec{
        padding: 5em 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: auto;
    }

    .container{
        width: 60%;
        height: auto;
        padding: 2em ;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    
    }
}
@media only screen and (max-width:1000px){
    .reservationhistory-sec{
        padding: 5em 0;
        height: auto;
    }

    .container{
        width: 60%;
        height: auto;
        padding: 2em ;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    
    }

    .reservation pre {
    font-size: 1.2rem;
    padding: 1em;
    line-height: 1.5;
    max-height: 300px; 
    overflow-y: auto;
    white-space: pre-wrap;
}

.reservation pre {
    max-height: 300px; 
    overflow-y: auto;
    white-space: pre-wrap;
}
}
@media only screen and (max-width:800px){
    .reservationhistory-sec{
        padding: 5em 0;
        height: auto;
    }

    .container{
        width: 70%;
        height: auto;
        padding: 2em ;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    
    }

    .reservation pre {
    font-size: 1.2rem;
    padding: 1em;
    line-height: 1.5;
    max-height: 300px; 
    overflow-y: auto;
    white-space: pre-wrap;
}

.reservation pre {
    max-height: 300px; 
    overflow-y: auto;
    white-space: pre-wrap;
}
}
@media only screen and (max-width:800px){
    .reservationhistory-sec{
        padding: 5em 0;
        height: auto;
    }

    .container{
        width: 75%;
        height: auto;
        padding: 2em ;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    
    }

    .reservation pre {
    font-size: 1.2rem;
    padding: 1em;
    line-height: 1.5;
    max-height: 300px; 
    overflow-y: auto;
    white-space: pre-wrap;
}

.reservation pre {
    max-height: 300px; 
    overflow-y: auto;
    white-space: pre-wrap;
}
}
@media only screen and (max-width:600px){
    .reservationhistory-sec{
        padding: 5em 0;
        height: auto;
    }

    .container{
        width: 80%;
        height: auto;
        padding: 2em ;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    
    }

    .reservation pre {
    font-size: 1.2rem;
    padding: 1em;
    line-height: 1.5;
    max-height: 300px; 
    overflow-y: auto;
    white-space: pre-wrap;
}

.reservation pre {
    max-height: 300px; 
    overflow-y: auto;
    white-space: pre-wrap;
}
}
@media only screen and (max-width:500px){
    .reservationhistory-sec{
        padding: 5em 0;
        height: auto;
    }

    .container{
        width: 90%;
        height: auto;
        padding: 2em 1em;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    
    }

    .reservation pre {
    font-size: 1.2rem;
    padding: 1em;
    line-height: 1.5;
    max-height: 300px; 
    overflow-y: auto;
    white-space: pre-wrap;
}

.reservation pre {
    max-height: 300px; 
    overflow-y: auto;
    white-space: pre-wrap;
}
.cancel-button, .cancel-link {
        width: 100%; 
        margin-top: 5px; 
    }
}
@media only screen and (max-width:400px){
    .reservationhistory-sec{
        padding: 5em 0;
        height: auto;
    }

    .container{
        width: 95%;
        height: auto;
        padding: 2em 1em;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    
    }

    .reservation pre {
    font-size: 1.2rem;
    padding: 1em;
    line-height: 1.5;
    max-height: 300px; 
    overflow-y: auto;
    white-space: pre-wrap;
}

.reservation pre {
    max-height: 300px; 
    overflow-y: auto;
    white-space: pre-wrap;
}
}
    </style>
     <link rel = "icon" href = "../assets/logo/NaturaVerdeLogo.png" type = "image/x-icon">
</head>
<body>
<header>
<?php include('./header_authenticated.php') ?> 
</header>
<section class="reservationhistory-sec">
    <div class="container">
        <h1>Reservation History</h1>

        <?php
        require_once './db_connection.php';


        $confirmationId = $_SESSION['id_session'];

        // Retrieve client information
        $sql = "SELECT * FROM information_details AS id
            JOIN confirmation AS c ON id.package_id = c.package_id
            WHERE id.package_id IN (SELECT package_id FROM payment WHERE id = '$confirmationId')
            AND c.status = 'Confirmed'
            ORDER BY id.client_id DESC";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $packageId = $row["package_id"];

                // Retrieve details and packages information for the current reservation
                $sql2 = "SELECT * FROM details_and_packages AS dp
                    JOIN confirmation AS c ON dp.package_id = c.package_id
                    WHERE dp.package_id = '$packageId'
                    AND dp.id = '$confirmationId'
                    AND c.status = 'Confirmed'
                    ORDER BY dp.package_id DESC LIMIT 1";

                $result2 = $conn->query($sql2);

                if ($result2->num_rows > 0) {
                    $row2 = $result2->fetch_assoc();

                    // Calculate the date difference between the check-in date and the current date
                    $checkInDate = new DateTime($row2["check_in_date_and_time"]);
                    $currentDate = new DateTime();
                    $dateDifference = $currentDate->diff($checkInDate);

                    // Generate a QR code for the client's name and other details
                    $outputText = "Client Name: " . strtoupper($row["first_name"]) . ' ' . strtoupper($row["middle_name"]) . ' ' . strtoupper($row["last_name"]) .
                        "\nTour Package: " . strtoupper($row2["tour_package"]) .
                        "\nTotal Guests: " . $row2["total_guests"] .
                        "\nCheck-in Date and Time: " . $row2["check_in_date_and_time"] .
                        "\nCheck-out Date and Time: " . $row2["check_out_date_and_time"] .
                        "\nRoom Accommodation: " . strtoupper($row2["room_accomodation"]) .
                        "\nTotal Package Rate: " . $row2["total_package_rate"];

                    // Display or process the $outputText as needed for each reservation
                    echo "<div class='reservation'>";
                    echo "<h3>Day/s remaining before arrival: " . $dateDifference->format('%a days') . "</h3>";
                    echo '<pre style="font-size: 1.2rem; padding:1em;line-height:1.5;">' . $outputText . '</pre>';
                    echo '<div class="actions">';
                    echo '<a href="after_new.php?package_id=' . $row['package_id'] . '" class="more-details-text">More Details</a>';
                    if ($dateDifference->days >= 3) {
                        echo '<a href="cancelForm_new.php?package_id=' . $row['package_id'] . '"><button class="cancel-button">Cancel</button></a>';
                    } else {
                        echo '<a class="cancel-link" href="cancelForm_new.php?package_id=' . $row['package_id'] . '">
                        <button class="cancel-button" style="background-color: gray; cursor: not-allowed;" disabled>Cancel</button></a>';
                    }
                    
                    echo '</div>';
                    echo "</div>";
                    

                    
                }
            }
        } else {
            echo '<div style="font-size:1rem;margin: 30px 0;">No reservations found in the history.</div>';

        }
        ?>
    </div>
    </section>
    <footer>
        <?php include './footer.php'; ?>  
    </footer>
</body>
</html>
