<?php
session_start();
// Check if the first name and last name session variables are set
if (!isset($_SESSION["firstname_session"]) || !isset($_SESSION["middlename_session"]) || !isset($_SESSION["lastname_session"]) || !isset($_SESSION["email_session"]) || !isset($_SESSION["phonenumber_session"])) {
    header("Location: ../user-login.php"); // Redirect to login if the session variables are not set
    exit();

}
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" href="images\logo.png" type="image/x-icon">
   <link rel = "icon" href = "../assets/logo/NaturaVerdeLogo.png" type = "image/x-icon">
   <title>Natura Verde Farm and Private Resort</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
    }

    .container {
        max-width: 800px;
        margin: 80px auto; 
        padding: 40px;
        border: solid #36f90f;
        border-radius: 10px;
        position: relative;
    }

    .upper-section {
        position: relative;
        text-align: center;
    }

    .checkmark-circle {
        width: 80px;
        height: 80px;
        background-color: #4CAF50;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        position: absolute;
        top: -80px;
        left: 0;
        right: 0;
    }

    .checkmark {
        font-size: 46px;
        color: white;
    }

    .content {
        padding: 40px 0;
        text-align: center;
    }

    .content p {
        font-size: 20px;
        line-height: 1.5;
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;
    }

    .icon-button {
        position: absolute;
        top: 20px;
        right: 20px;
        background: none;
        border: none;
        font-size: 24px;
        color: #ff5733;
        cursor: pointer;
        transition: color 0.3s ease;
    }

    .icon-button:hover {
        color: #ff3c1e;
    }

    .fa-house{
        color:black;
    }
    .button-container {
    display: flex; /* Use flexbox to align buttons side by side */
    justify-content: center; /* Space them apart horizontally */
    align-items: center; /* Vertically center the content */
}

    #downloadQR, #viewpdf{
        width: 250px; /* Set a fixed width for all buttons (adjust as needed) */
        padding: 10px 20px;
        background-color:#1fc724; 
        color: #fff;
        border-radius: 5px;
        text-decoration: none;
        display: inline-block;
        margin: 10px;
        text-decoration: none;
        text-align: center;
        text-transform: uppercase;
        font-weight: bold;
        cursor: pointer;
    }

    #newReserve{
        width: 320px; /* Set a fixed width for all buttons (adjust as needed) */
        padding: 10px 20px;
        background-color:#1fc724; 
        color: #fff;
        border-radius: 5px;
        text-decoration: none;
        display: inline-block;
        margin: 10px;
        text-decoration: none;
        text-align: center;
        text-transform: uppercase;
        font-weight: bold;
    }

    #cancelButton {
        width: 320px; /* Set a fixed width for all buttons (adjust as needed) */
        padding: 10px 20px;
        background-color: red;
        color: #fff;
        border-radius: 5px;
        text-decoration: none;
        display: inline-block;
        margin: 10px;
        text-decoration: none;
        text-align: center;
        text-transform: uppercase;
        font-weight: bold;
    }

    #downloadQR:hover,
    #viewpdf:hover,
    #newReserve:hover {
        background: radial-gradient(circle at -1% 57.5%, rgb(19, 170, 82) 0%, rgb(0, 102, 43) 90%);
    }

    #cancelButton:hover {
        background: radial-gradient(circle at 10.6% 22.1%, rgb(206, 18, 18) 0%, rgb(122, 21, 21) 100.7%);
    }

    
   .back-button{
    background: none;
      color: black;
      border: none;
      margin-left: 120%;
      padding: 10px;
      cursor: pointer;
  }

  .back-button i {
    margin-right: 5px;
  }

    @media (max-width: 768px) {
        .container {
            margin: 20px auto;
            padding: 20px;
        }

        .checkmark-circle {
            top: -40px;
        }

        .content {
            padding: 20px 0;
        }

        .content p {
            font-size: 16px;
        }

        .view-btn a {
            max-width: 150px;
        }
    }


    .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        /* Styles for the modal content */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 400px;
            text-align: center;
            border-radius: 10px;
        }

        /* Style for the close button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        /* Style for the buttons inside the modal */
        button {
            background-color: #1fc724;
            color: white;
            padding: 10px 20px;
            margin: 5px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #16a61e;
        }

        

</style>

<body>

<div class="container">
<button class="back-button" onclick="goBack()"><i class="fa-solid fa-arrow-left"></i></button>
        <a href="home.php" class="icon-button">
            <i class="fa-solid fa-house"></i>
        </a>
        <div class="upper-section">
            <div class="checkmark-circle">
                <div class="checkmark">&#10003;</div>
            </div>
        </div>
        <div class="content">
            <p>Thank you for making Natura Verde Farm and Private Resort your choice of staycation. Our resort offers the comforts of home with the luxury of space!</p>
            <p>If you ever have concerns regarding your reservation, feel free to get in touch with us at 0917-312-9681 or 0999-884-2977.</p>
        </div>
        <?php
        // Include the QR Code library
        include 'phpqrcode/qrlib.php';

        // Your PHP code goes here
        require_once './db_connection.php';

        if (isset($_GET['package_id'])) {
            $packageId = $_GET['package_id'];
 
        $confirmationId = $_SESSION['id_session'];

        // Retrieve client information
        $sql = "SELECT * FROM information_details AS id
        JOIN confirmation AS c ON id.package_id = c.package_id
        WHERE id.package_id = '$packageId' 
        AND id.id = '$confirmationId' 
        AND c.status = 'Confirmed' 
        ORDER BY id.client_id DESC 
        LIMIT 1";
        $result = $conn->query($sql);

        // Retrieve details and packages information
        $sql2 = "SELECT * FROM details_and_packages AS dp
        JOIN confirmation AS c ON dp.package_id = c.package_id
        WHERE dp.package_id= '$packageId'
        AND dp.id='$confirmationId'
        AND c.status = 'Confirmed'
        ORDER BY dp.package_id DESC LIMIT 1";
        $result2 = $conn->query($sql2);

        if ($result->num_rows > 0 && $result2->num_rows > 0) {
            $row = $result->fetch_assoc();
            $row2 = $result2->fetch_assoc();

            // Calculate the date difference between the check-in date and the current date
            $checkInDate = new DateTime($row2["check_in_date_and_time"]);
            $currentDate = new DateTime();
            $dateDifference = $currentDate->diff($checkInDate);

            // Generate a QR code for the client's name
            $outputText = "Client Name: " . $row["first_name"] . ' ' . $row["middle_name"] . ' ' . $row["last_name"] .
                "\nTour Package: " . $row2["tour_package"] .
                "\nTotal Guests: " . $row2["total_guests"] .
                "\nCheck-in Date and Time: " . $row2["check_in_date_and_time"] .
                "\nCheck-out Date and Time: " . $row2["check_out_date_and_time"] .
                "\nRoom Accommodation: " . $row2["room_accomodation"] .
                "\nTotal Package Rate: " . $row2["total_package_rate"];

            // Generate the QR code as a data URI
            ob_start(); // Start output buffering
            QRcode::png($outputText, null, QR_ECLEVEL_L, 3, 4); // Output the QR code to the buffer
            $qrImageData = ob_get_contents(); // Get the output buffer content
            ob_end_clean(); // End and clean the buffer

            // Display the QR code inside a centered <div>
            echo '<div style="text-align: center; margin-bottom:10px;">';
            echo '<img src="data:image/png;base64,' . base64_encode($qrImageData) . '" alt="QR Code">';
            echo '</div>';

            // download button para sa qr code image
            echo '<div class="button-container">'; // Start the div with the class "button-container"
            echo '<a id="downloadQR" download="QRCode.png">';
            echo '<i class="fas fa-download"></i>&nbsp;Download QR Code';
            echo '</a>';
            echo '<a class="view-btn" id="viewpdf" href="pdf.php?package_id=' . $row['package_id'] . '">';
            echo '<i class="fa-solid fa-eye"></i>&nbsp;View PDF';
            echo '</a>';
            echo '</div>'; // Close the div with the class "button-container"


            echo '<div class="button-container">';

            // "New Reservation" button
            echo '<div class="view-btn" id="newreservation">';
            echo '<a href="amenities_new.php" id="newReserve"><i class="fa-solid fa-calendar-plus"></i>&nbsp;New Reservation</a>';
            echo '</div>';

            // Check if the check-in date is 3 or more days from now, and conditionally enable or disable the "Cancel" button
            if ($dateDifference->days >= 3) {
                // If the check-in date is 3 or more days from now, show the "Cancel Reservation" button
                echo '<div class="view-btn"><a href="#" id="cancelButton"><i class="fa-solid fa-times"></i>&nbsp;Cancel Reservation</a></div>';
            } else {
                // If the check-in date is less than 3 days from now, disable the "Cancel Reservation" button
                echo '<div class="view-btn"><a id="cancelButton" style="pointer-events: none; background-color: gray; color: white; cursor: not-allowed;"><i class="fa-solid fa-times"></i>&nbsp;Cancel Reservation</a></div>';
            }
        } else {
            echo "0 results";
        }

        echo '</div>';
            }

        $conn->close();
        ?>

    </div>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Are you sure you want to cancel your reservation?</p>
            <button id="confirmCancel">Yes</button>
            <button id="cancelCancel">No</button>
        </div>
    </div>
<script>
            // Get the modal
            var modal = document.getElementById("myModal");

// Get the button that opens the modal
var cancelButton = document.getElementById("cancelButton");

// Get the <span> element that closes the modal
var closeSpan = document.getElementsByClassName("close")[0];

// Get the Yes and No buttons
var confirmCancel = document.getElementById("confirmCancel");
var cancelCancel = document.getElementById("cancelCancel");

// When the Cancel button is clicked, open the modal
cancelButton.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
closeSpan.onclick = function() {
    modal.style.display = "none";
}

confirmCancel.onclick = function() {
    window.location.href = "cancelForm_new.php?package_id=<?php echo $row['package_id']; ?>";
    modal.style.display = "none"; // Close the modal
}

// When the user clicks No, close the modal
cancelCancel.onclick = function() {
    modal.style.display = "none";
}

// Close the modal if the user clicks outside of it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


// Function to trigger the download of the QR code image
function downloadQRCode() {
        // Get the QR code image
        var qrCodeImage = document.querySelector('img');

        // Create a temporary anchor element
        var downloadLink = document.createElement('a');
        downloadLink.href = qrCodeImage.src;
        downloadLink.download = 'QRCode.png';
        downloadLink.style.display = 'none';

        // Append the anchor to the body and trigger a click event to initiate the download
        document.body.appendChild(downloadLink);
        downloadLink.click();

        // Remove the temporary anchor
        document.body.removeChild(downloadLink);
    }

    // Attach a click event listener to the download button
    document.getElementById('downloadQR').addEventListener('click', downloadQRCode);

    function goBack() {
      window.history.back();
    }

</script>


</body>
</html>
