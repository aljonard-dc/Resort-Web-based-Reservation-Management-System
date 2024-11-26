<?php 

require_once './db_connection.php';

session_start();
// Check if the first name and last name session variables are set
if (!isset($_SESSION["firstname_session"]) || !isset($_SESSION["middlename_session"]) || !isset($_SESSION["lastname_session"]) || !isset($_SESSION["email_session"]) || !isset($_SESSION["phonenumber_session"])) {
    header("Location: ../user-login.php"); // Redirect to login if the session variables are not set
    exit();

}

    
$confirmationId = $_SESSION['id_session'];
$sql = "SELECT * FROM information_details WHERE client_id=(SELECT MAX(client_id) FROM payment) AND id = '$confirmationId' ORDER BY client_id DESC LIMIT 1";
$result = mysqli_query($conn, $sql);

// Check if the query was successful and if a row was retrieved
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $retrievedEmail = $row['email_address'];
    $packageId = $row['package_id'];

    // Close the database connection
} else {

    $retrievedEmail = ''; 
}

$query2 = "SELECT * FROM package_prices WHERE price_id = 10";
$result2 = $conn->query($query2);
 
if ($result2->num_rows > 0) {
    $row2 = $result2->fetch_assoc();
    $packageExcessPrice = $row2["package_price"];
    $packageExcessName = $row2["package_name"];
} else {
   
    $packageExcessPrice = "No Price Available";
    $packageExcessName = "No Name Available";
}

$query8 = "SELECT * FROM package_prices WHERE price_id = 11";
$result8 = $conn->query($query8);

if ($result8->num_rows > 0) {
    $row8 = $result8->fetch_assoc();
    $overnightexcess = $row8['package_price'];
    $overnightexcessName = $row8["package_name"];
} else {
   
    $overnightexcess = "No Price Available";
    $overnightexcessName = "No Name Available";
}


?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel = "icon" href = "../assets/logo/NaturaVerdeLogo.png" type = "image/x-icon"><title>Natura Verde Farm and Private Resort</title>
   <link rel="stylesheet" href="css/overlay_step5.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>

    <style>
        /* Style the overlay */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.2);
            z-index: 10;
            overflow-y: auto;
        }

        /* Style the overlay content */
        .overlay-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80%;
            max-width: 600px;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            max-height: 80vh; /* Adjust the maximum height as needed */
    overflow-y: auto;

        }

        /* Style the title */
        .overlay-title {
            font-size: 24px;
            font-weight: bold;
            color: green;
            margin-bottom: 10px;
            text-align: center;
        }

        /* Style the rules */
        .overlay-rules, h3 {
            font-size: 16px;
            color: black;
            margin-bottom: 10px;
            font-family: Arial, Helvetica, sans-serif;
            max-height: 50vh; /* Adjust the maximum height as needed */
    overflow-y: auto;
        }

        /* Style the checkboxes */
        .overlay-checkboxes {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        /* Style the checkbox labels */
        .overlay-checkbox-label {
            font-size: 12px;
            color: black;
            margin-left: 5px;
            font-family: Arial, Helvetica, sans-serif;
        }

        /* Style the proceed button */
        .overlay-button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #1fc724;
            color: white;
            font-size: 18px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Disable the proceed button if not checked */
        .overlay-button[disabled] {
            background-color: gray;
            cursor: not-allowed;
        }

        .overlay-button:hover:enabled{
            background: radial-gradient(circle at -1% 57.5%, rgb(19, 170, 82) 0%, rgb(0, 102, 43) 90%);
        }

        .loading-popup {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.2);
    z-index: 10;
  }

  .loading-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 80%;
    max-width: 300px; /* Adjust the width as needed */
    padding: 20px;
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    text-align: center;
  }

  .loading-spinner {
    border: 4px solid rgba(0, 0, 0, 0.3);
    border-top: 4px solid #3498db;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    animation: spin 2s linear infinite;
    margin: 0 auto 10px;
  }

  @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }

  .loading-text {
    color: #333;
  }
    </style>


<body>


    <!-- The overlay -->
    <div class="overlay">
        
        <!-- The overlay content -->
        <div class="overlay-content">
      

<input type="email" id="emailAddress" name="emailAddress" required value="<?php echo htmlspecialchars($retrievedEmail); ?>" hidden>
<input type="text" id="packageId" name="packageId" required value="<?php echo htmlspecialchars($packageId); ?>" hidden>
<input type="text" id="ID" name="ID" required value="<?php echo htmlspecialchars($confirmationId); ?>" hidden>

            <!-- The title -->
            <div class="overlay-title">Welcome to Natura Verde Farm and Private Resort!</div>
            
             <!-- The rules -->
             <div class="overlay-rules"></div>
             <ul class="overlay-rules">
            <h3>Once you've clicked the proceed button, you won't be able make changes to your information.</h3>
             <h3>Other important information to take note of:</h3>
             <li>Once booking is confirmed, the whole resort is exclusive to your group only. No other guests will be accommodated during your stay.</li>
             <li>Guests are allowed to bring outside food and drinks/caterers with no corkage fee.</li>
             <li>Additional Day Guests or Visitors are allowed for a fee of P<?php echo $packageExcessPrice; ?>/head and they are allowed to use all the amenities except from staying overnight.</li>
             <li>Excess overnight guests are allowed for a fee of P<?php echo $overnightexcess; ?>/head.</li>
             <li>Early check-in or late check-out is allowed for P3,000/hour and is strictly subject to availability.</li>
             <li>A P5,000.00 deposit will be asked from guests in case of incidental damages. If no damages were incurred throughout the stay, the full deposit will be refunded to guests.</li>

             </ul>


             <div class="overlay-checkboxes">
                 <input type="checkbox" id="accept" name="accept" value="accept">
                 <label for="accept" class="overlay-checkbox-label">I have fully read and understood this document. I hereby acknowledge and agree to abide to the <a href="./termsandconditions.php" target="blank">terms and conditions</a> of Natura Verde Farm and Private Resort.</label>
             </div>

             <button id="proceed" class="overlay-button" disabled>Proceed</button>
         </div>
     </div>

     <!-- The php script -->
     <?php
     // Check if the proceed button is clicked
     if (isset($_POST['proceed'])) {
         // Check if the accept checkbox is checked
         if (isset($_POST['accept'])) {
             // Redirect to the reservation page
             header("Location: process_reservation.php"); 
         } else {
             // Display an error message
             echo "<script>alert('You must accept the terms and conditions to proceed.');</script>";
         } 
     }
     ?>

<div class="loading-popup" id="loadingPopup">
    <div class="loading-content">
        <div class="loading-spinner"></div>
        <div class="loading-text">Loading...</div>
    </div>
</div>


<script>
    // Get the elements
    var accept = document.getElementById("accept");
    var proceed = document.getElementById("proceed");
    var loadingPopup = document.getElementById("loadingPopup");
    var emailAddressInput = document.getElementById("emailAddress");
    var packageIdInput = document.getElementById("packageId"); 
    var confirmationIdInput = document.getElementById("ID"); 
    // Add an event listener to the accept checkbox
    accept.addEventListener("change", function() {
        // Check if the accept checkbox is checked
        if (accept.checked) {
            // Enable the proceed button
            proceed.disabled = false;
        } else {
            // Disable the proceed button
            proceed.disabled = true;
        }
    });

    proceed.addEventListener("click", function() {
    if (accept.checked) {
        // Get the email address value from the input field
        var emailAddress = emailAddressInput.value;
        var packageId = packageIdInput.value;
        var confirmationId = confirmationIdInput.value;


         // Show the loading popup
         loadingPopup.style.display = "block";

        // Make an AJAX call to send the email
        var emailXHR = new XMLHttpRequest();
        emailXHR.open("POST", "sendEmail_accept.php", true);
        emailXHR.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        emailXHR.onreadystatechange = function() {
            if (emailXHR.readyState === XMLHttpRequest.DONE) {
                // Hide the loading popup
                loadingPopup.style.display = "none";

                if (emailXHR.status === 200) {
                    // Email sent successfully, you can handle the response if needed

                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "process_reservation.php", true);
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === XMLHttpRequest.DONE) {
                            if (xhr.status === 200) {
                                var response = xhr.responseText;
                                if (response === "Success") {
                                    // Redirect to a thank-you page or do something else
                                    window.location.href = "after.php";
                                } else {
                                    alert("Error processing reservation. Please try again.");
                                }
                            } else {
                                alert("Error communicating with the server.");
                            }
                        } 
                    };
                    xhr.send("accept=1");
                } else {
                    alert("Error sending the acceptance email.");
                }
            }
        };
        var data = "email=" + encodeURIComponent(emailAddress) +
                "&packageId=" + encodeURIComponent(packageId) +
                "&confirmationId=" + encodeURIComponent(confirmationId);

                emailXHR.send(data);
    }
});


</script>



 </body>
 </html>
