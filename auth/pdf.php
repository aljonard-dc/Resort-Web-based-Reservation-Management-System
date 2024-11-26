<?php
session_start();
// Check if the first name and last name session variables are set
if (!isset($_SESSION["firstname_session"]) || !isset($_SESSION["middlename_session"]) || !isset($_SESSION["lastname_session"]) || !isset($_SESSION["email_session"]) || !isset($_SESSION["phonenumber_session"])) {
    header("Location: ../user-login.php"); // Redirect to login if the session variables are not set
    exit();

}

if (isset($_GET['package_id'])) {
    $packageId = $_GET['package_id'];
}
?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel = "icon" href = "../assets/logo/NaturaVerdeLogo.png" type = "image/x-icon"><title>Natura Verde Farm and Private Resort</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>

<style>
  *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
        overflow-x: hidden;
    }

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

   .headcontainer {
       max-width: 800px;
       margin: 20px auto;
       padding: 30px 40px;
       border: solid #36f90f;
       border-radius: 10px;
       text-align: center;
   }

   .headcontainer img {
       width: 60px;
       height: 50px;
       display: block;
       margin: 0 auto;
   }

   .headcontainer h1,
   .tour-package-inclusion h1  {
       font-family: Arial, sans-serif;
       text-transform: uppercase;
       font-size: 1em;
       text-align: center;
       justify-content: center;
   }

   h2 {
       font-family: Arial, sans-serif;
       font-size: 1.1em;
       text-align: left;
       justify-content: center;
   }

   .br-text {
       display: block;
       margin-top: 2px;
       font-size: .8em;
       font-weight: normal;
       text-transform: capitalize;
   }

   .paragraph1 {
       margin-top: 30px;
       text-align: left;
       text-indent: 5%;
       font-size: 1em;
   }

   .container {
       margin: 0;
       padding: 5px;
       width: 95%;
       text-align: left;
   }

   .container input[type="text"] {
       display: inline;
       border: none;
       margin: 0 auto;
       padding: 5px;
       width: 20%;
       margin-bottom: 10px;
   }

   .container input[type="text"]:read-only {
       padding: 5px;
       text-transform: uppercase;
       font-size: 1em;
       font-weight: bold;
       margin-left: 2px;
       background: none;
   }

   .container label {
       margin-bottom: 5px;
       font-size: 1em;
   }

   hr {
       border-top: 1px dashed;
   }

   .container2 {
       margin: 0;
       padding: 5px;
       width: 95%;
       text-align: left;
   }

   .container2 input[type="text"] {
       display: inline;
       border: none;
       margin: 0 auto;
       padding: 5px;
       width: 20%;
       margin-bottom: 10px;
   }

   .container2 input[name="total_guests"],
   .container2 input[name="tour_package"] {
       width: 30%;
   }

   .container2 input[name="check_out_date_and_time"],
   .container2 input[name="room_accomodation"] {
       width: 35%;
   }

   .container2 input[type="text"]:read-only {
       padding: 5px;
       text-transform: uppercase;
       font-size: 1em;
       font-weight: bold;
       margin-left: 2px;
       background: none;
   }

   .container2 label {
       margin-bottom: 5px;
       font-size: 1em;
   }

   .container input[type="submit"] {
       background-color: #1fc724;
       border: none;
       color: white;
       cursor: pointer;
       margin-top: 20px;
       padding: 12px 20px;
       text-decoration: none;
       display: inline-block;
   }

   .container input[type="submit"]:hover {
       background: radial-gradient(circle at -1% 57.5%, rgb(19, 170, 82) 0%, rgb(0, 102, 43) 90%);
   }

   .container3 {
       margin: 0;
       padding: 5px;
       width: 95%;
       text-align: left;
   }

   .container3 input[type="text"] {
       display: inline;
       border: none;
       margin: 0 auto;
       padding: 5px;
       width: 20%;
       margin-bottom: 10px;
   }

   .container3 input[type="text"]:read-only {
       padding: 5px;
       text-transform: uppercase;
       font-size: 1em;
       font-weight: bold;
       margin-left: 2px;
       background: none;
   }

   .container3 label {
       margin-bottom: 5px;
       font-size: 1em;
   }

   .confirm-btn {
        width:auto; 
        background-color:#1fc724; 
        color:white; 
        font-family: Arial, sans-serif;
        text-transform: uppercase;
        font-size: 20px;
        font-weight: bold;
        padding:14px 20px; 
        margin-bottom:20px; 
        border:none; 
        cursor:pointer; 
        border-radius: 10px; 
}

.btn{
    align-items: center;
        display: flex;
        justify-content: center;
}

.confirm-btn:hover {
    background: radial-gradient(circle at -1% 57.5%, rgb(19, 170, 82) 0%, rgb(0, 102, 43) 90%);
}


.icon-button {
    position: center;
    display: inline-flex;
    align-items: center;
}

.icon-button input[type="submit"] {
    padding-right: 24px; /* Adjust this value as needed to create space for the icon */
    width: 150px;
    border-radius: 10px;
    font-weight: bold;
}

.icon-button i {
    position: absolute;
    left: 25px; /* Adjust this value to control the icon's position */
    bottom: 13px;
    pointer-events: none; /* Ensure the icon doesn't interfere with clicking the button */
    color: white;
}


   .paragraph2 {
    text-align: left;
    font-size: 1em;
    margin-top: 10px; /* Maintain the existing margin-top */
}

.special-requests {
    margin-bottom: 10px; /* Add margin-bottom to the first div */
}

.tour-package-title {
    margin-top: 10px; /* Add margin-top to the second div */
}

   ul.inclusions {
       list-style-type: circle;
       text-align: left;
   }

   .paragraph3 li {
       text-align: left;
       list-style: none;
       text-indent: 5%;
       margin-bottom: 10px;
       text-align: justify;
   }

   .paragraph3 p {
       text-align: left;
       list-style: none;
       margin-bottom: 15px;
       text-align: justify;
       font-style: italic;
       margin-top: 10px;
   }

   .tour-package-inclusion h1 {
       text-align: left;
       margin-top: 10px;
   }

   .tour-package-inclusion p {
       text-align: left;
   }

   #fullname {
       padding: 5px;
       text-transform: uppercase;
       font-size: 1em;
       font-weight: bold;
       margin-left: 2px;
       background: none;
       width: 45%;
       border: none;
       border-bottom: 1px solid black;
   }

   .fname {
       margin: 0;
       padding: 5px;
       width: 95%;
       text-align: center;
       margin-bottom: 30px;
   }

   #frontdesk {
       padding: 5px;
       text-transform: uppercase;
       font-size: 1em;
       font-weight: bold;
       margin-left: 2px;
       background: none;
       width: 40%;
       border: none;
       border-bottom: 1px solid black;
   }

   .fdesk {
       margin: 0;
       padding: 5px;
       width: 95%;
       text-align: center;
   }


   @media (max-width: 1280px) {
       .headcontainer {
           padding: 30px;
           max-width: 800px;
           height: auto;
       }
   }

   @media (max-width: 1024px) {
       .headcontainer {
           padding: 30px;
           max-width: 700px;
           height: auto;
       }
       form {
           padding: 20px;
       }
   }

   @media (max-width: 768px) {
       .headcontainer {
           padding: 25px;
           max-width: 500px;
           height: auto;
       }
       h1 {
           font-size: 20px;
       }
   }

   @media (max-width: 600px) {
       .headcontainer {
           padding: 15px;
           max-width: 400px;
           height: auto;
       }
       h1 {
           font-size: 20px;
       }
   }

   @media (max-width: 500px) {
       .headcontainer {
           padding: 15px;
           max-width: 300px;
           height: auto;
       }
       h1 {
           font-size: 20px;
       }
       .form-container {
           max-width: 200px;
       }
       .confirm-btn {
           width: 70%;
       }
   }

   @media print {
    body {
        margin: 0; /* Remove default body margin */
        padding: 0; /* Remove default body padding */
    }

    .headcontainer {
        max-width: 100%; /* Make sure the content fits within the A4 page width */
        margin: 0 auto; /* Center the content horizontally */
        padding: 10px; /* Add padding to the content */
        border: none; /* Remove the border for printing */
    }

    /* Define A4 page size and margins */
    @page {
        size: A4;
        margin: 0; /* Set minimum margins to zero */
    }
}

.headcontainer {
    max-width: 800px;
    margin: 20px auto;
    padding: 30px 40px;
    border: solid #36f90f;
    border-radius: 10px;
    text-align: center;
    font-family: Arial, sans-serif; /* Set the font family to Arial */
}

/* Set the font size to 11px for all text inside .headcontainer */
.headcontainer * {
    font-size: 11px;
}

.row-container {
   display: flex;
   justify-content: space-between;
}
.narrow-margin {
    margin: 10px;
}
@media print {
    .special-requests {
        margin-bottom: 10px; /* Add margin-bottom to the first div in print */
    }
    .tour-package-title {
        margin-top: 10px; /* Add margin-top to the second div in print */
    }
}

</style>

<body>

<div class="headcontainer">

   <img src="../assets/logo/Natura Verde Logo.png" alt="">
   <h1>Natura Verde <span class="br-text">Farm and Private Resort</span></h1>

   <div class="paragraph1">
       <p>Thank you for choosing Natura Verde Farm and Private Resort for your staycation. Our resort offers the comforts of home and the luxury of space.</p>
       <p>We are pleased to confirm the following reservation:</p>
   </div>

   <div class="container">
       <form action="#" method="post">

           <?php
           require_once './db_connection.php';
           if (isset($_GET['package_id'])) {
            $packageId = $_GET['package_id'];

           $confirmationId = $_SESSION['id_session'];
           $sql = "SELECT * FROM information_details WHERE package_id='$packageId' AND id='$confirmationId' AND package_id='$packageId' ORDER BY client_id AND id DESC LIMIT 1";
           $result = $conn->query($sql);
           if ($result->num_rows > 0) {
               while ($row = $result->fetch_assoc()) {
                $guestName = $row["first_name"] . " " . $row["middle_name"] . " " . $row["last_name"];
                echo '<label for="guest_name">Guest Name:</label>
                <input type="text" name="guest_name" value="' . $guestName . '" readonly />      
                <label for="contact_number">Contact Number:</label>
                <input type="text" name="contact_number" value="' . $row["contact_number"] . '" readonly /><br>
                <label for="address">Address:</label>
            <input type="text" name="address" value="' . $row["address"] . '" readonly />
                   <label for="email_address">Email Address:</label>
                   <input type="text" name="email_address" value="' . $row["email_address"] . '" readonly />';
               }
           } else {
               echo "0 results";
           }
        }
           ?>
     
       <hr>
           <?php
           require_once './db_connection.php';
           if (isset($_GET['package_id'])) {
            $packageId = $_GET['package_id'];
           $confirmationId = $_SESSION['id_session'];
           $sql = "SELECT * FROM details_and_packages WHERE package_id='$packageId' AND id='$confirmationId' AND package_id='$packageId' ORDER BY package_id and id DESC LIMIT 1";
           $result = $conn->query($sql);
           if ($result->num_rows > 0) {
               while ($row = $result->fetch_assoc()) {
                   
                   
                   echo '<label for="tour_package">Tour Package:</label>
                   <input type="text" name="tour_package" value="' . $row["tour_package"] . '" readonly />
                   <label for="total_guests">Total Guests:</label>
                   <input type="text" name="total_guests" value="' . $row["total_guests"] . '" readonly /><br>
                   
                   <label for="check_in_date_and_time">Check-in Date and Time:</label>
                   <input type="text" name="check_in_date_and_time" value="' . $row["check_in_date_and_time"] . '" readonly />
                   <label for="check_out_date_and_time">Check-out Date and Time:</label>
                   <input type="text" name="check_out_date_and_time" value="' . $row["check_out_date_and_time"] . '" readonly /><br>
                   <label for="room_accommodation">Room Accommodation:</label>
                   <input type="text" name="room_accommodation" value="' . $row["room_accomodation"] . '" readonly /><br>';
               }
           } else {
               echo "0 results";
           }
        }
           ?>
       
           <?php
           require_once './db_connection.php';
           if (isset($_GET['package_id'])) {
            $packageId = $_GET['package_id'];
           $confirmationId = $_SESSION['id_session'];
           $sql = "SELECT * FROM payment WHERE package_id='$packageId' AND id='$confirmationId' ORDER BY payment_id AND id DESC LIMIT 1";
           $result = $conn->query($sql);
           if ($result->num_rows > 0) {
               while ($row = $result->fetch_assoc()) {
                   $fdown = number_format((float) $row["downpayment"], '2', '.', ',');
                   $ftotal = number_format((float) $row["total_package_rate"], '2', '.', ',');
                   $fbal = number_format((float) $row["due_balance"], '2', '.', ',');
                   
                   
                   echo '<label for="downpayment">Downpayment:</label>
                   <input type="text" name="downpayment" value="₱' . $fdown . '" readonly />
                   <label for="total_package_rate">Total Package Rate:</label>
                   <input type="text" name="total_package_rate" value="₱' . $ftotal . '" readonly />
                   <label for="due_balance">Due Balance:</label>
                   <input type="text" name="due_balance" value="₱' . $fbal . '" readonly />';
               }
           } else {
               echo "0 results";
           }
        }
           $conn->close();
           ?>
      

   <div class="paragraph2">
       <p> Special Requests (If Any:) _________________________ <p>
   </div>
 </form>
   </div>
   <div class="tour-package-inclusion">
       <h1>Tour Package Inclusions:</h1>
       <p>Free use of all the following amenities:</p>
       <ul class="inclusions">
           <li>Function Hall with Round Tables and Wooden Chairs for 40 Persons (No table cloths included)</li>
           <li>Karaoke with 1 Wireless Mic</li>
           <li>Infinity Pool and Kiddie Pool</li>
           <li>Half Basketball Court</li>
           <li>Board Games and Card Games</li>
           <li>Jogging Path</li>
           <li>Outdoor Kitchen with Hot and Cold Water Dispenser, Gas Stove, Refrigerator and Freezer, and Grill</li>
           <li>2 Gallons of Water and unlimited refill of Alkaline Water</li>
           <li>Shower and Changing Areas</li>
           <li>Gazebos</li>
       </ul>
   </div>

   <div class="paragraph3">
       <p>Other important information to take note of:</p>
       <ul>
           <li>Once booking is confirmed, the whole resort is exclusive to your group only. No other guests will be accommodated during your stay.</li>
           <li>Guests are allowed to bring outside food and drinks/caterers with no corkage fee.</li>
           <li>Additional Day Guests or Visitors are allowed for a fee of P500/head, and they are allowed to use all the amenities except for staying overnight.</li>
           <li>Excess overnight guests are allowed for a fee of P1000/head.</li>
           <li>Early check-in or late check-out is allowed for P3,000/hour and is strictly subject to availability.</li>
           <li>A P5,000.00 deposit will be asked from guests in case of incidental damages. If no damages were incurred throughout the stay, the full deposit will be refunded to guests.</li>
       </ul>
       <p><i class="fa-regular fa-square-check"></i>&nbsp;I hereby acknowledge and agree that the information stated above is correct:</p>
   </div>
   

</div>

<div class="btn">
<button id="download-button" class="confirm-btn"><i class="fa-solid fa-file-arrow-down"></i>&nbsp;Download PDF</button>
</div>

<style>
  
   .hide-border {
       border: none !important;
   }
</style>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const downloadButton = document.getElementById("download-button");
    const headContainer = document.querySelector(".headcontainer");

    downloadButton.addEventListener("click", function () {
        // Add the 'narrow-margin' class to adjust the margin
        headContainer.classList.add("narrow-margin");

        // Hide the border of the headcontainer
        headContainer.classList.add("hide-border");

        // Hide the download button before printing
        downloadButton.style.display = "none";

        // Trigger the print dialog
        window.print();

        // Restore the border of the headcontainer after printing
        headContainer.classList.remove("hide-border");

        // Restore the download button after printing
        downloadButton.style.display = "block";

        // Remove the 'narrow-margin' class to reset the margin
        headContainer.classList.remove("narrow-margin");
    });
});

function autoAdjustTextFields() {
    const textInputs = document.querySelectorAll('input[type="text"]');
    textInputs.forEach((input) => {
        // Check if the input is not part of the "fname" or "fdesk" elements
        if (!input.closest('.fname') && !input.closest('.fdesk')) {
            // Calculate the width based on the value length and some padding
            const valueWidth = (input.value.length + 1) * 10; // Adjust the multiplier as needed
            input.style.width = valueWidth + 'px';
        }
    });
}

// Call the function when the page loads and when the window is resized
window.addEventListener('load', autoAdjustTextFields);
window.addEventListener('resize', autoAdjustTextFields);


    function goBack() {
      window.history.back();
    }


</script>

</body>
</html>
