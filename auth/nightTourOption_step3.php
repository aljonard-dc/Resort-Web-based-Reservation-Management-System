<?php
     require_once './db_connection.php';


     session_start();
     // Check if the first name and last name session variables are set
     if (!isset($_SESSION["firstname_session"]) || !isset($_SESSION["middlename_session"]) || !isset($_SESSION["lastname_session"]) || !isset($_SESSION["email_session"]) || !isset($_SESSION["phonenumber_session"])) {
         header("Location: ../user-login.php"); // Redirect to login if the session variables are not set
         exit();
     
     }


     $query = "SELECT * FROM package_prices WHERE price_id = 2";
     $result = $conn->query($query);
     
     if ($result->num_rows > 0) {
         $row = $result->fetch_assoc();
         $packagePrice = $row["package_price"];
         $packageName = $row["package_name"];
     } else {
        
         $packagePrice = "No Price Available";
         $packageName = "No Name Available";
     }
     
     
     $query2 = "SELECT * FROM package_prices WHERE price_id = 14";
     $result2 = $conn->query($query2);
     
     if ($result2->num_rows > 0) {
         $row2 = $result2->fetch_assoc();
         $packageExcessPrice = $row2["package_price"];
         $packageExcessName = $row2["package_name"];
     } else {
        
         $packageExcessPrice = "No Price Available";
         $packageExcessName = "No Name Available";
     }
     $query3 = "SELECT * FROM package_prices WHERE price_id = 13";
     $result3 = $conn->query($query3);
     
     if ($result3->num_rows > 0) {
         $row3 = $result3->fetch_assoc();
         $maxPax = $row3["package_price"];
         $packagePaxName = $row3["package_name"];
     } else {
        
         $maxPax = "No Max Pax Available";
         $packagePaxName = "No Name Available";
     }

     $query9 = "SELECT * FROM package_time WHERE id = 2";
$result9 = $conn->query($query9);

if ($result9->num_rows > 0) {
    $row9 = $result9->fetch_assoc();
    $overnightCheckIn = $row9['check_in_time'];
    $overnightCheckOut = $row9['check_out_time'];
    $overnightTimeName = $row9["package_name"];

// Convert check-in time to 12-hour format with AM/PM
$checkInTime = date("h:i A", strtotime($overnightCheckIn));

// Convert check-out time to 12-hour format with AM/PM
$checkOutTime = date("h:i A", strtotime($overnightCheckOut));
} else {
   
    $overnightCheckIn = "No Time Available";
    $overnightCheckOut = "No Time Available";
    $overnightTimeName = "No Name Available";
}
     
     

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel = "icon" href = "../assets/logo/NaturaVerdeLogo.png" type = "image/x-icon">
    <title>Natura Verde Farm and Private Resort</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, Helvetica, sans-serif;
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

.headcontainer{
    max-width: 60%;
    max-height: auto;
    margin: 20px auto ;
    padding: 50px 40px;
    border: solid #36f90f ;
    border-radius: 10px;

}


.headcontainer h1{
    font-family: Arial, sans-serif;
    text-transform: uppercase;
    font-size: 1.8rem;
    font-weight: 2px;
    text-align: center;
    color: #0e4d0e;
    justify-content: center;

}

.hr-one {
   
    margin: auto;
     width: 500px;
     border: 0;
     height: 2px;
     background-image: linear-gradient(to right, rgba(255, 255, 255, 0), rgba(121, 121, 121, 0.96), rgba(255, 255, 255, 0));
}

.h50 {
    clear: both;
    height: 50px;
   
}

.headcontainer h2{
    font-family: Arial, sans-serif;
    font-size: 1.2em;
    font-weight: 2px;
    text-align: center;
    color: #0e4d0e;
    justify-content: center;
}



.modal-content p,
.form-container p,
#booking-question{
    font-family: Arial, sans-serif;
    font-size: 1.2rem;
    font-weight: bold;
    text-align: center;
    color: #0e4d0e;
    justify-content: center;
    margin-top: 3em;
 

}

.modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.4);
}

.modal-content {
  background-color: #fefefe;
  margin: 15% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 60%;
  text-align: center;
}

.button-container button {
  background-color: #1fc724;
  color: white;
  font-family: Arial, sans-serif;
  text-transform: uppercase;
  font-size: 1em;
  font-weight: bold;
  padding: 10px 15px;
  border: none;
  cursor: pointer;
  border-radius: 10px;
  margin: 5px;
}

.button-container button:hover {
  background: radial-gradient(circle at -1% 57.5%, rgb(19, 170, 82) 0%, rgb(0, 102, 43) 90%);
}

.button-container button {
    background-color: #1fc724;
    color: white;
    font-family: Arial, sans-serif;
    text-transform: uppercase;
    font-size: 1em;
    font-weight: bold;
    padding: 10px 15px;
    border: none;
    cursor: pointer;
    border-radius: 10px;
    margin: 5px;
 
}

.button-container button:hover {
    background: radial-gradient(circle at -1% 57.5%, rgb(19, 170, 82) 0%, rgb(0, 102, 43) 90%);
}

#guestID {
        display: none;
        
    }


    #total-guests-section, #total-package-section {
        margin: 0;  
    }

    label[for="total-guests"], label[for="total-package-rate"] {
        margin: 0;  
    }

    input#total-guests, input#total-package-rate {
        margin: 0;  
    }

    .typing-text {
    font-family: Arial, sans-serif;
    font-size: 15px;
    white-space: nowrap;
    overflow: hidden;
    text-align: center; /* Center-align the text */
    width: 100%;
    animation:
    typing 3.5s steps(40, end),
    blink .75s step-end infinite;
}

@keyframes typing {
    from {
        width: 0;
    }
    to {
        width: 100%;
    }
}



.form-container {
   
    width: 75%;
    flex-direction: column; /* Optional, if you want to center content vertically in a column */
    justify-content: center;
    align-items: center;
    margin: 2em auto; /* Optional, for horizontal centering within a container */
    height: auto;
}

input[type="submit"] {
    margin: 10px;
}

.button-container {
    display: flex;
    justify-content: center;
    align-items: center;
}

input[type="text"],input[type="number"]{
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    border-bottom: 2px solid #4CAF50;
    font-family: Arial, sans-serif;
}

input[id="yes"] {
    width: 10%; 
    background-color:#1fc724; 
    color:white; 
    font-family: Arial, sans-serif;
    text-transform: uppercase;
    font-size: 1em;
    font-weight: bold;
    padding: 10px 15px; 
    border:none;  
    cursor:pointer; 
    border-radius: 10px; 
}

input[id="no"] {
    width: 10%; 
    background-color:red; 
    color:white; 
    font-family: Arial, sans-serif;
    text-transform: uppercase;
    font-size: 1em;
    font-weight: bold;
    padding: 10px 15px; 
    border:none;  
    cursor:pointer; 
    border-radius: 10px; 
}

input[id="yes"]:hover {
    background: radial-gradient(circle at -1% 57.5%, rgb(19, 170, 82) 0%, rgb(0, 102, 43) 90%);
}

input[id="no"]:hover {
    background: linear-gradient(108.4deg, rgb(253, 44, 56) 3.3%, rgb(176, 2, 12) 98.4%);
}


#client-id, #room-accomodation, #package-price, #number-of-nights,
label[for="client-id"], label[for="room-accomodation"], label[for="package-price"],label[for="number-of-nights"] {
display: none;
}

#check-out-date, #check-in-date {
  
    font-size: 1.2rem;
    width:100%;
    padding:12px 20px;
    display:inline-block;
    border-radius: 10px;
    border: solid 1px rgba(128, 128, 128, 0.26);
    font-family: Arial, sans-serif;
}

form input[type=text],form input[type=date],form input[type=number]{
    width:100%;
    padding:12px 20px;
    margin:8px 0;
    display:inline-block;
    border-radius: 10px;
    border: solid 1px rgba(128, 128, 128, 0.26);
    font-family: Arial, sans-serif;
    font-size: 1.2rem;
}

form input[type=text]:focus ,form input[type=date]:focus ,form input[type=number]:focus {
    outline:none; 
    border-bottom-color:#006600; 
}

form label{
    font-family: Arial, sans-serif;
    font-size: 1.3rem;
    margin-top: 50px;
   
}

.two-column-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
   
}

.column {
    flex: 1;

}


.back-button{
    background: none;
      color: black;
      border: none;
      margin-right: 90%;
      padding: 10px;
      cursor: pointer;
  }

  .back-button i {
    margin-right: 5px;
  }

@media only screen and (max-width:1200px){
    .headcontainer{
        max-width: 70%;
        max-height: auto;
        padding: 50px 40px;
        border: solid #36f90f ;
        border-radius: 10px;

    }
    .form-container p{
        font-size: 1rem;
    }
    .h50 {
        clear: both;
        height: 20px;
    
    }
    .form-container {
      
        width: 80%;
        flex-direction: column; /* Optional, if you want to center content vertically in a column */
        justify-content: center;
        align-items: center;

    }   

}
@media only screen and (max-width:1000px){
    .headcontainer{
        max-width: 80%;
        max-height: auto;
        padding: 20px 10px;
        border: solid #36f90f ;
        border-radius: 10px;

    }
    .form-container p{
        font-size: 1rem;
    }
    .h50 {
        clear: both;
        height: 20px;
    
    }
    .form-container {
      
        width: 80%;
        flex-direction: column; /* Optional, if you want to center content vertically in a column */
        justify-content: center;
        align-items: center;

    }   
    .modal-content {
        
        margin: 15em auto;
        width: 90%;
        text-align: center;
    }

}
@media only screen and (max-width:800px){
    .headcontainer{
        max-width: 90%;
        max-height: auto;
        padding: 10px 5px;
        border: solid #36f90f ;
        border-radius: 10px;

    }
    .form-container p{
        font-size: 1rem;
    }
    .hr-one {
     width: 350px;

    }
    .h50 {
        clear: both;
        height: 20px;
    
    }
    .form-container {
      
        width: 90%;
        flex-direction: column; /* Optional, if you want to center content vertically in a column */
        justify-content: center;
        align-items: center;
        
    }   
  
    .modal-content {
        
        margin: 15em auto;
        width: 90%;
        text-align: center;
    }

}
@media only screen and (max-width:700px){
    .headcontainer{
        max-width: 95%;
        margin: 4em auto;
        
        border: solid #36f90f ;
        border-radius: 10px;

    }
    .headcontainer h1{
        font-size: 1.4rem;
    }
    .headcontainer h2{
        font-size: 1rem;

    }
    .form-container p{
        font-size: 1rem;
    }
    #booking-question{
        font-size: 1rem;
    }
    form label{ 
        font-size: 1rem;
    }
    .hr-one {
     width: 300px;

    }
    .h50 {
        clear: both;
        height: 20px;
    
    }
    .form-container {
  
        width: 90%;
        flex-direction: column; /* Optional, if you want to center content vertically in a column */
        justify-content: center;
        align-items: center;
        
    }   
  
    .modal-content {
        
        margin: 15em auto;
        width: 90%;
        text-align: center;
    }

}
@media only screen and (max-width:600px){
    .headcontainer{
        max-width: 95%;
        margin: 4em auto;
        
        border: solid #36f90f ;
        border-radius: 10px;

    }
    .headcontainer h1{
        font-size: 1.4rem;
    }
    .headcontainer h2{
        font-size: 1rem;

    }
    .form-container p{
        font-size: 0.8rem;
    }
    form label{ 
        font-size: 0.9rem;
    }
    .hr-one {
     width: 300px;

    }
    .h50 {
        clear: both;
        height: 20px;
    
    }
    #booking-question{
        font-size: 0.9rem;
    }
    .form-container {
      
        width: 95%;
        flex-direction: column; /* Optional, if you want to center content vertically in a column */
        justify-content: center;
        align-items: center;
        
    }   
  
    .modal-content {
        
        margin: 15em auto;
        width: 90%;
        text-align: center;
    }
    #check-out-date, #check-in-date {
        font-size: 1rem;
    }

}
@media only screen and (max-width:500px){
    .headcontainer{
        max-width: 95%;
        margin: 4em auto;
        
        border: solid #36f90f ;
        border-radius: 10px;

    }
    .headcontainer h1{
        font-size: 1.3rem;
    }
    .headcontainer h2{
        font-size: 0.9rem;

    }
    .form-container p{
        font-size: 0.7rem;
    }
    form label{ 
        font-size: 0.9rem;
    }
    .hr-one {
    width: 300px;

    }
    .h50 {
        clear: both;
        height: 20px;
    
    }
    #booking-question{
        font-size: 0.8rem;
    }
    .form-container {
       
        width: 100%;
        flex-direction: column; /* Optional, if you want to center content vertically in a column */
        justify-content: center;
        align-items: center;
    }   
  
    .modal-content {
        
        margin: 15em auto;
        width: 95%;
        text-align: center;
    }
    #check-out-date, #check-in-date {
        font-size: 0.9rem;
    }
}
@media only screen and (max-width:400px){
    .headcontainer{
        max-width: 90%;
        margin: 4em auto;
        
        border: solid #36f90f ;
        border-radius: 10px;

    }
    .headcontainer h1{
        font-size: 1.2rem;
    }
    .headcontainer h2{
        font-size: 0.8rem;

    }
    .form-container p{
        font-size: 0.55rem;
    }
    form label{ 
        font-size: 0.9rem;
    }
    .hr-one {
    width: 300px;

    }
    .h50 {
        clear: both;
        height: 20px;
    
    }
    #booking-question{
        font-size: 0.7rem;
    }
    .form-container {
     
        width: 100%;
        flex-direction: column; /* Optional, if you want to center content vertically in a column */
        justify-content: center;
        align-items: center;
    }   
  
    .modal-content {
        
        margin: 15em auto;
        width: 90%;
        text-align: center;
    }
    #check-out-date, #check-in-date {
        font-size: 0.8rem;
    }

}

.peso-sign{
        position: absolute;
        margin-top: 10px;
        margin-left: 5px;
    }

</style>
<body>
<header>
<?php include('./header_authenticated.php') ?> 
</header> 
    <div class="headcontainer">

    <button class="back-button" onclick="goBack()"><i class="fa-solid fa-arrow-left"></i></button>

            <h1 class="text-with-icon  animate__animated animate__slideInDown animate__delay-0.8s"><i class="fa-solid fa-moon"></i>&nbsp;Night Tour Package</h1>
            <div class="hr-one animate__animated animate__slideInDown animate__delay-0.8s"></div>							
            <div class="h50 animate__animated animate__slideInDown animate__delay-0.8s"></div>	
            
            <h2 class="animate__animated animate__zoomIn animate__delay-1s">Please share the necessary information so that I can assist you more effectively.</h2>
            
            <div class="form-container">
            <p id="people" style="width: fit-content; margin:auto;" >&nbsp;Extra ₱<?php echo $packageExcessPrice; ?> is charged when the number of guests exceeds <?php echo $maxPax; ?></p><br>

                <p class="typing-text" style="width: fit-content; margin:auto;"><i class="fa-solid fa-comment-dots"></i>&nbsp;Could you please share the specific date you're interested in?</p>
                
                <form id="booking-form" action="nightTourOption_step3_submit.php" method="post">
                <input type="text" id="guestID" name="guestID" value="<?php echo $_SESSION['id_session']; ?>"><br> 

                
                <div class="two-column-container">
    <div class="column">
        <label for="check-in-date">Check-in Date:</label>
        <select id="check-in-date" name="check_in_date" required>
            <option value="">--Select a date--</option>
        </select><br><br>

        <label for="check-out-date">Check-out Date:</label>
                <input id="check-out-date" name="check_out_date" readonly>
                </input>
        
    </div>
    <div class="column">
        <label for="check-in-times">Check-in Time:</label>
        <input type="text" id="check-in-times" name="check_in_times" value="<?php echo $checkInTime ?>" readonly style="border: none;">

        <label for="check-out-times">Check-out Time:</label>
                <input type="text" id="check-out-times" name="check_out_times" value="<?php echo $checkOutTime ?>" readonly style="border: none;">
    </div>
</div>


                <input type="hidden" id="check-in-time" name="check_in_time" value="<?php echo $overnightCheckIn ?>">
                <input type= "hidden" id="check-out-time" name="check_out_time" value="<?php echo $overnightCheckOut ?>">
                
                <p class="typing-text" style="width: fit-content; margin:15px auto;"id="total-guests-section"><i class="fa-solid fa-comment-dots"></i>&nbsp;How many people will be accompanying you?</p>
                <label for="total-guests">Total Guests:</label><br>
                <input type="number" id="total-guests" name="total_guests" required><br>

                
                <div id="children-container" style="display: none; margin:15px 0;">
                <p class="typing-text" style="width: fit-content; margin:auto;"><i class="fa-solid fa-comment-dots"></i>&nbsp;How many are they ?</p>
                <label for="children">Children Ages 3 Years Old Below:</label><br>
                <input type="number" id="children" name="children"><br>
                </div>

                <p class="typing-text" id="total-package-section" style="display: none; width: fit-content; margin:15px auto;">
                    <i class="fa-solid fa-comment-dots"></i>&nbsp;Here's the total rate for the package you've selected.
                </p>

<label for="total-package-rate" style="display: none">Total Package Rate: <h3 class="peso-sign">₱</h3></label>
<input type="text" id="total-package-rate" name="total_package_rate" readonly style="display: none">
                                        
                <label for="room-accomodation">Room Accomodation:</label><br>
                <input type="text" id="room-accomodation" name="room_accomodation" value="None">
            
                <label for="package-price">Package Price:</label><br>
                <input type="text" id="package-price" name="package_price" value="<?php echo $packagePrice; ?>">

                <label for="number-of-nights">How many night/s?:</label>
                <input type="number" id="number-of-nights" name="number_of_nights" value="1"><br><br>

                <input type="number" id="max-pax" name="max_pax" value="<?php echo $maxPax; ?>" style="display: none">

                <h3 class="typing-text" style="width: fit-content; margin:15px auto;" id="booking-question"><i class="fa-solid fa-comment-dots"></i>&nbsp;Are you ready to proceed with the booking now?</h3>

                <div id="confirmationModal" class="modal">
  <div class="modal-content">
    <p>You will be redirected to the reservation, do you want to proceed?</p>
    <div class="button-container">
      <button id="confirm-yes">Yes</button>
      <button id="confirm-no">No</button>
    </div>
  </div>
</div>


                </form>


            </div>
            <div class="button-container" id="button-container">
    <button id="yes-button">Yes</button>
</div>

    </div>



    <div id="myModal" class="modal">
  <div class="modal-content">
    <p>Do you have children ages 3 years old and below?</p>
    <div class="button-container">
      <button id="modal-yes">Yes</button>
      <button id="modal-no">No</button>
    </div>
  </div>
</div>


                 
<script>
     const totalGuests = document.querySelector('#total-guests');
    const children = document.querySelector('#children');
    const totalPackageRate = document.querySelector('#total-package-rate');
    const packagePrice = document.querySelector('#package-price');
    // Function to format a number with commas and 2 decimal places
function numberFormat(value) {
    return parseFloat(value).toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 });
}




    // Function to calculate the total package rate
    function calculateTotalPackageRate() {
        let guests = parseInt(totalGuests.value);
        let childCount = parseInt(children.value);
        let price = parseInt(packagePrice.value);

        // Ensure that childCount is a number, default to 0 if not
        if (isNaN(childCount)) {
            childCount = 0;
        }

        // Subtract the number of children from the total guests
        guests -= childCount;

        if (guests <= <?php echo $maxPax; ?>) {
            totalPackageRate.value = numberFormat(price);
} else {
    let extraGuests = guests - <?php echo $maxPax; ?>;
    let extraCharge = extraGuests * <?php echo $packageExcessPrice; ?>;
    totalPackageRate.value = numberFormat(price + extraCharge);
}
    }

    // Event listener for changes in the "total guests" and "children" fields
    totalGuests.addEventListener('input', calculateTotalPackageRate);
    children.addEventListener('input', calculateTotalPackageRate);

    window.addEventListener('load', () => {
        calculateTotalPackageRate(); // Calculate the total package rate on page load
    });

    // Get the available dates from the server
    fetch('getUnavailableDates_step3.php')
        .then(response => response.json())
        .then(data => {
            // Get the check-in and check-out date select elements
            var checkInDateSelect = document.getElementById('check-in-date');
            var checkOutDateSelect = document.getElementById('check-out-date');

            // Calculate the available check-in and check-out dates
            var minDate = new Date(data.minDate);
            var maxDate = new Date(data.maxDate);
            for (var date = minDate; date <= maxDate; date.setDate(date.getDate() + 1)) {
                var dateString = date.toISOString().split('T')[0];
                if (!data.unavailableDates.includes(dateString)) {
                    // Add an option element for the available check-in date
                    var checkInOption = document.createElement('option');
                    checkInOption.value = dateString;
                    checkInOption.textContent = dateString;
                    checkInDateSelect.appendChild(checkInOption);

                    // Add an option element for the available check-out date
                    var checkOutOption = document.createElement('option');
                    checkOutOption.value = dateString;
                    checkOutOption.textContent = dateString;
                    checkOutDateSelect.appendChild(checkOutOption);
                }
            }
        });

    // Update the check-out date when the number of nights is changed
    document.getElementById('number-of-nights').addEventListener('change', function() {
        var numberOfNights = parseInt(this.value);
        if (numberOfNights > 0) {
            var checkInDateSelect = document.getElementById('check-in-date');
            if (checkInDateSelect.value) {
                var checkInDate = new Date(checkInDateSelect.value);
                var checkOutDate = new Date(checkInDate.getTime() + numberOfNights * 24 * 60 * 60 * 1000);
                var checkOutDateString = checkOutDate.toISOString().split('T')[0];
                var checkOutDateSelect = document.getElementById('check-out-date');
                if (checkOutDateSelect.querySelector(`option[value="${checkOutDateString}"]`)) {
                    var allDatesAvailable = true;
                    for (var date = new Date(checkInDate); date < checkOutDate; date.setDate(date.getDate() + 1)) {
                        var dateString = date.toISOString().split('T')[0];
                        if (!checkOutDateSelect.querySelector(`option[value="${dateString}"]`)) {
                            allDatesAvailable = false;
                            break;
                        }
                    }
                    if (allDatesAvailable) {
                        checkOutDateSelect.value = checkOutDateString;
                    } else {
                        alert("Sorry! but one or more dates between the check-in and check-out dates are not available. Please select a different range of dates.");
                    }
                } else {
                    alert("Sorry! but the check-out date you selected isn't available! You may adjust your number of nights to suit in the available dates or you may select a different check-in date that have an available check-out date respectively according to the number of nights you would like to take.");
                }
            }
        }
    });

    // Update the check-out date when the check-in date is changed
    document.getElementById('check-in-date').addEventListener('change', function() {
        var numberOfNights = parseInt(document.getElementById('number-of-nights').value);
        if (numberOfNights > 0) {
            var checkInDate = new Date(this.value);
            var checkOutDate = new Date(checkInDate.getTime() + numberOfNights * 24 * 60 * 60 * 1000);
            var checkOutDateString = checkOutDate.toISOString().split('T')[0];
            var checkOutDateSelect = document.getElementById('check-out-date');
            if (checkOutDateSelect.querySelector(`option[value="${checkOutDateString}"]`)) {
                var allDatesAvailable = true;
                for (var date = new Date(checkInDate); date < checkOutDate; date.setDate(date.getDate() + 1)) {
                    var dateString = date.toISOString().split('T')[0];
                    if (!checkOutDateSelect.querySelector(`option[value="${dateString}"]`)) {
                        allDatesAvailable = false;
                        break;
                    }
                }
                if (allDatesAvailable) {
                    checkOutDateSelect.value = checkOutDateString;
                } else {
                    alert("Sorry! but one or more dates between the check-in and check-out dates are not available. Please select a different range of dates.");
                }
            } else {
                alert("Sorry! but the check-out date you selected isn't available! You may adjust your number of nights to suit in the available dates or you may select a different check-in date that have an available check-out date respectively according to the number of nights you would like to take.");
            }
        }
    });

    document.addEventListener("DOMContentLoaded", function() {
  const bookingForm = document.getElementById("booking-form");

  bookingForm.addEventListener("keydown", function(event) {
    if (event.key === "Enter") {
      event.preventDefault(); // Prevent the default form submission
    }
  });
});




document.addEventListener("DOMContentLoaded", function() {
  const totalGuests = document.getElementById("total-guests");
  const childrenContainer = document.getElementById("children-container");
  const modal = document.getElementById("myModal");
  const modalYesButton = document.getElementById("modal-yes");
  const modalNoButton = document.getElementById("modal-no");
  const childrenInput = document.getElementById("children");
  let guestsValueChanged = false; 
  const buttonContainer = document.getElementById("button-container");
    const bookingQuestion = document.getElementById("booking-question");
    buttonContainer.style.display = "none";
    bookingQuestion.style.display = "none";

    

  totalGuests.addEventListener("input", function() {
    guestsValueChanged = true; // Set the flag when the total guests value changes
  });

  totalGuests.addEventListener("blur", function() {
    // Show the custom modal dialog when the user moves away from the total guests field
    if (guestsValueChanged) {
      modal.style.display = "block";
    }
  });

  // Event listener to prevent form submission when Enter is pressed
  totalGuests.addEventListener("keydown", function(event) {
    if (event.key === "Enter") {
      event.preventDefault(); // Prevent the default form submission
      totalGuests.blur(); // Trigger the blur event to show the modal dialog
    }
  });

  modalYesButton.addEventListener("click", function() {
    childrenContainer.style.display = "block"; // Show the children input field
    guestsValueChanged = false; // Reset the flag
    modal.style.display = "none"; // Hide the modal dialog
  });

  modalNoButton.addEventListener("click", function() {
    childrenContainer.style.display = "none"; // Hide the children input field
    childrenInput.value = ""; // Clear the children input field
    guestsValueChanged = false; // Reset the flag
    modal.style.display = "none"; // Hide the modal dialog
  });

  // Additional event listener to ensure children count doesn't exceed total guests count
  childrenInput.addEventListener("input", function() {
    const childrenCount = parseInt(childrenInput.value) || 0; // Convert to integer, default to 0
    const totalGuestsCount = parseInt(totalGuests.value) || 0;

    if (childrenCount > totalGuestsCount) {
      childrenInput.value = totalGuestsCount; // Cap children count at total guests count
    }

    const totalPackageSection = document.getElementById('total-package-section');
    const totalPackageRateLabel = document.querySelector('label[for="total-package-rate"]');
    const totalPackageRateInput = document.getElementById('total-package-rate');

    if (this.value !== "") {
        totalPackageSection.style.display = "block";
        totalPackageRateLabel.style.display = "block";
        totalPackageRateInput.style.display = "block";
        showButtonContainerAndQuestion();
    } else {
        totalPackageSection.style.display = "none";
        totalPackageRateLabel.style.display = "none";
        totalPackageRateInput.style.display = "none";
        buttonContainer.style.display = "none";
        bookingQuestion.style.display = "none";
    }
  });
  function showButtonContainerAndQuestion() {
        buttonContainer.style.display = "flex";
        bookingQuestion.style.display = "block";
    }

    document.getElementById("modal-yes").addEventListener("click", function() {

    // Additional code to hide or show the "Total Package Rate" section based on "no" button click
    const totalPackageSection = document.getElementById('total-package-section');
    const totalPackageRateLabel = document.querySelector('label[for="total-package-rate"]');
    const totalPackageRateInput = document.getElementById('total-package-rate');

    totalPackageSection.style.display = "none";
        totalPackageRateLabel.style.display = "none";
        totalPackageRateInput.style.display = "none";
        buttonContainer.style.display = "none";
        bookingQuestion.style.display = "none";



});

    document.getElementById("modal-no").addEventListener("click", function() {
    showButtonContainerAndQuestion();
    // Additional code to hide or show the "Total Package Rate" section based on "no" button click
    const totalPackageSection = document.getElementById('total-package-section');
    const totalPackageRateLabel = document.querySelector('label[for="total-package-rate"]');
    const totalPackageRateInput = document.getElementById('total-package-rate');


        totalPackageSection.style.display = "block";
        totalPackageRateLabel.style.display = "block";
        totalPackageRateInput.style.display = "block";


});
    document.getElementById("confirm-yes").addEventListener("click", showButtonContainerAndQuestion);
});


function submitBookingForm() {
  document.getElementById("booking-form").submit();
}

// Add an event listener to the "Yes" button in the confirmation modal
document.getElementById("confirm-yes").addEventListener("click", function () {
    const modal = document.getElementById("confirmationModal");
    modal.style.display = "none"; // Hide the modal dialog
});

// Add an event listener to the "No" button in the confirmation modal to close the modal
document.getElementById("confirm-no").addEventListener("click", function (event) {
    event.preventDefault(); // Prevent the default form submission
    const modal = document.getElementById("confirmationModal");
    modal.style.display = "none"; // Hide the modal dialog
});
    // Add an event listener to the "check-out-date" input field
    // Add an event listener to the "check-out-date" input field
    document.getElementById('check-in-date').addEventListener('input', function () {
        const totalGuestsSection = document.getElementById('total-guests-section');
        const totalGuestsLabel = document.querySelector('label[for="total-guests"]');
        const totalGuestsInput = document.getElementById('total-guests');

        if (this.value !== "") {
            // Show all related elements when there is a value in the check-out-date
            totalGuestsSection.style.display = "block";
            totalGuestsLabel.style.display = "block";
            totalGuestsInput.style.display = "block";
        } else {
            // Hide all related elements when there is no value in the check-out-date
            totalGuestsSection.style.display = "none";
            totalGuestsLabel.style.display = "none";
            totalGuestsInput.style.display = "none";
        }
    });

    // Initial check to hide or show the related elements on page load
    document.addEventListener('DOMContentLoaded', function () {
        const checkOutDate = document.getElementById('check-in-date').value;
        const totalGuestsSection = document.getElementById('total-guests-section');
        const totalGuestsLabel = document.querySelector('label[for="total-guests"]');
        const totalGuestsInput = document.getElementById('total-guests');

        if (checkOutDate !== "") {
            totalGuestsSection.style.display = "block";
            totalGuestsLabel.style.display = "block";
            totalGuestsInput.style.display = "block";
        } else {
            totalGuestsSection.style.display = "none";
            totalGuestsLabel.style.display = "none";
            totalGuestsInput.style.display = "none";
        }
    });
    
// Function to show the confirmation dialog
function showConfirmationDialog() {
  const modal = document.getElementById("confirmationModal");
  modal.style.display = "block";

}

// Add this code within your existing JavaScript code
document.getElementById("yes-button").addEventListener("click", showConfirmationDialog);


function goBack() {
      window.history.back();
    }

</script>
<footer>
<?php include './footer.php' ?> 
</footer>
</body>
</html>
 
