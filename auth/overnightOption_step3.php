<?php
 require_once './db_connection.php';
 
 session_start();
// Check if the first name and last name session variables are set
if (!isset($_SESSION["firstname_session"]) || !isset($_SESSION["middlename_session"]) || !isset($_SESSION["lastname_session"]) || !isset($_SESSION["email_session"]) || !isset($_SESSION["phonenumber_session"])) {
    header("Location: ../user-login.php"); // Redirect to login if the session variables are not set
    exit();

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

$query9 = "SELECT * FROM package_time WHERE id = 3";
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

// Close the database connection
$conn->close();
?>


<html>
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel = "icon" href = "../assets/logo/NaturaVerdeLogo.png" type = "image/x-icon"><title>Natura Verde Farm and Private Resort</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<style>

*{
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
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

.headcontainer{
    max-width: 60%;
    max-height: auto;
    margin: 5em auto;
    border: solid #36f90f;
    border-radius: 10px;
}

.container{
    justify-content: center;
  
    align-items: center;
    padding: 10px; 
    width: 100%;
    height: auto;

}

.last{

    text-align: center;
    padding: 10px; 
    max-width: auto;
    max-height: auto;
    margin: 0px 30px;
}

.last p{
    font-family: Arial, sans-serif;
    font-size: 1.2em;
    font-weight: bold;
    text-align: center;
    color: #0e4d0e;
    justify-content: center;
}

.title {
    border: blue yellow;
    text-align: center;
    margin: 30px 30px 0px ;
    max-width: auto;
    max-height: auto;
    font-size: 20px; 
}

.box1{
 
    max-width: 650px; 
    max-height: auto; 
    color: #fff; 
    text-align: center; 
    margin: 10px;
}

.box2{
   
    width: 100%;
    color: #fff; 
    text-align: center;

}


.title h1{
    font-family: Arial, sans-serif;
    text-transform: uppercase;
    font-size: 1.5em;
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
    height: 30px;
}

.title h2{
    font-family: Arial, sans-serif;
    font-size: 1em;
    font-weight: 2px;
    text-align: center;
    color: #0e4d0e;
    justify-content: center;
}

.package h4{
    font-family: Arial, sans-serif;
    font-size: 1.2em;
    font-weight: 2px;
    text-align: center;
    color: #0e4d0e;
    justify-content: center;
    text-transform: uppercase;
    margin-bottom: 20px;
}

#booking-question{
    font-family: Arial, sans-serif;
    font-size: 1em;
    font-weight: bold;
    text-align: center;
    color: #0e4d0e;
    justify-content: center;
}
.box1 p,
.box2 p,
.modal-content p{
    font-family: Arial, sans-serif;
    font-size: 1em;
    font-weight: bold;
    text-align: center;
    color: #0e4d0e;
    justify-content: center;
}

.form-container {

    width: 80%;
    flex-direction: column; 
    justify-content: center;
    align-items: center;
    margin: 0 auto; 
    margin-top: 50px;
}
#booking-form{
    display: flex;
    flex-direction: column;
    align-items: center;
}


ul.a {
    list-style-type: disc; 
    padding-left: 20px; 
}

ul.a li {
    margin-bottom: 10px; 
    line-height: 1.2; 
    text-align: justify;
    font-family: Arial, sans-serif;
    font-size: 20px;
}

ul.a ul {
    list-style-type: circle; 
    padding-left: 20px; 
    margin-top: 5px; 
}

.package {
    margin: 15px;
    border: 1px solid #adadada6;
    padding: 10px;
    box-shadow: 0 2px 4px rgba(126, 122, 122, 0.1);
    
}

.package p:last-child {
    margin-bottom: 0;
}
.package input[type=radio] {
    display: none;
}

.package label {
    display: block;
    border-radius: 5px;
    cursor:pointer;
    font-family: Arial, sans-serif;
    font-size: 1rem;
    padding: 10px;
    margin-top: 5px;
    color: black;
}

.package input[type=radio]:checked + label {
    background: radial-gradient(circle at -1% 57.5%, rgb(19, 170, 82) 0%, rgb(0, 102, 43) 90%);
    color:white;
}


form input[type=text],form input[type=date],form input[type=number]{
    width: 60%;
    padding: 8px 20px; 
    border-radius: 10px;
    border: solid 1px rgba(128, 128, 128, 0.26);
    font-family: Arial, sans-serif;
    font-size: 1.2rem;
    
}
#number-of-nights{
    width: 15%;
}
form input[type=text]:focus ,form input[type=date]:focus ,form input[type=number]:focus {
    outline:none; 
    border-bottom-color:#006600; 
}

form label{
    font-family: Arial, sans-serif;
    font-size: 1rem;
    margin: 20px;
    color: black;
    
}

.last input[type=text]{
    width: 50%;
    padding: 10px 20px;
    display:inline-block;
    border-radius: 10px;
    border: solid 1px rgba(128, 128, 128, 0.26);
    font-family: Arial, sans-serif;
    font-size: 20px;
    margin: 15px 20px;
}

.last input[type=text]:focus ,form input[type=date]:focus ,form input[type=number]:focus {
    outline:none; 
    border-bottom-color:#006600; 
}

.last label{
    font-family: Arial, sans-serif;
    font-size: 1em;
    margin: 20px;
    color: black;
}

.button-container {
    display: flex;
    justify-content: center;
    align-items: center;
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
    margin: 20px;
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

#check-in-date, #check-out-date, #check-in-times, #check-out-times {
    width: 80%;
    padding: 10px 20px;
    display:inline-block;
    border-radius: 10px;
    border: solid 1px rgba(128, 128, 128, 0.26);
    font-family: Arial, sans-serif;

    font-size: 1.2rem;
}



#client-id, #total-price, label[for="client-id"], label[for="total-price"]{
display: none;
}

.input-container {
  display: inline-block;
  vertical-align: middle;
}

.borderless-input {
  border: none;
  outline: none;
  background: none;
  font-family: inherit;
  font-size: inherit;
  color: inherit;
  padding: 0;
  margin: 0;
  width: auto;
  min-width: 2px;
}

#text-container{
    font-family: Arial, sans-serif;
    font-size: 1rem;
    font-weight: bold;
    text-align: center;
    color: #0e4d0e;
    justify-content: center;
}


input.borderless-input {
    font-size: 1.5em; 
    color:rgb(253, 44, 56);
    font-family: Arial;
    font-weight: bold;
    text-align: center;
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
  justify-content: center; /* Center horizontally */
        align-items: center; /* Center vertically */
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

    .box1, .box2 {
        text-align: center; 
        margin: 0 auto;
        padding: 10px;
    }

    .typing-text {
    font-family: Arial, sans-serif;
    font-size: 20px;
    white-space: nowrap;
    overflow: hidden;
    text-align: center; 
    width: 100%;
    animation:
    typing 2s steps(40, end),
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

.two-column-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
 
}


.backbutton{
    background: none;
      color: black;
      border: none;
      margin-left: 30px;
      margin-top: 30px;
      padding: 10px;
      cursor: pointer;
  }

  .back-button i {
    margin-right: 115px;
  }
@media only screen and (max-width:1200px){
    
    .headcontainer{
        max-width: 70%;
        max-height: auto;
        margin: 5em auto;
        border-radius: 10px;
    }

    .container{
        padding: 10px; 
        width: 100%;
        height: auto;

    }

    .modal-content p{
        font-size: 1rem;
    }
    .modal-content {
        margin: 16em auto;
        background-color: #fefefe;
        width: 80%;

    }

}
@media only screen and (max-width:1000px){
    
    .headcontainer{
        max-width: 80%;
        max-height: auto;
        margin: 5em auto;
   
        border-radius: 10px;
    }

    .container{
   
        padding: 10px; 
        width: 100%;
        height: auto;

    }

    .modal-content p{
        font-size: 1rem;
    }
    .modal-content {
        background-color: #fefefe;
        width: 80%;

    }



}
@media only screen and (max-width:800px){
    
    .headcontainer{
        max-width: 90%;
        max-height: auto;
        margin: 5em auto;
   
        border-radius: 10px;
    }

    .container{
   
        padding: 10px; 
        width: 100%;
        height: auto;

    }

    .modal-content p{
        font-size: 1rem;
    }
    .modal-content {
        margin: 16em auto;
        background-color: #fefefe;
        width: 90%;

    }



}
@media only screen and (max-width:600px){
    
    .headcontainer{
        max-width: 90%;
        max-height: auto;
        margin: 5em auto;
   
        border-radius: 10px;
    }

    .container{
   
        padding: 10px; 
        width: 100%;
        height: auto;

    }

    .modal-content p{
        font-size: 1rem;
    }
    .modal-content {
        margin: 16em auto;
        background-color: #fefefe;
        width: 90%;

    }
    #check-in-date, #check-out-date, #check-in-times, #check-out-times {
        width: 100%;
        font-size: 0.9rem;
        padding:0.5em;
    }
    .two-column-container {
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
       
}
    .box1, .box2 {
        text-align: center;
        margin: 0 auto;
        padding: 0;
    }

    .typing-text {
        width: 100%;
        box-sizing: border-box; 
        padding: 0 10px; 
        text-align: center; 
        white-space: normal; 
        display: block; 
    }

}
@media only screen and (max-width:500px){
    
    .headcontainer{
        max-width: 90%;
        max-height: auto;
        margin: 5em auto;
   
        border-radius: 10px;
    }

    .container{
   
        width: 100%;
        height: auto;

    }
    .modal-content p{
        font-size: 1rem;
    }
    .modal-content {
        margin: 16em auto;
        background-color: #fefefe;
        width: 90%;

    }
    #check-in-date, #check-out-date, #check-in-times, #check-out-times {
        width: 100%;
        font-size: 0.9rem;
        padding:0.5em;
    }
    .two-column-container {
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
       
}
    .box1, .box2 {
        text-align: center;
        margin: 0 auto;
        padding: 0;
    }
    #number-of-nights{
        width: 30%;
    }

    .typing-text {
        width: 100%;
        box-sizing: border-box; 
        padding: 0 10px; 
        text-align: center; 
        white-space: normal; 
        display: block; 
    }

}
@media only screen and (max-width:400px){
    
    .headcontainer{
        max-width: 95%;
        max-height: auto;
        margin: 5em auto;
   
        border-radius: 10px;
    }

    .container{
   
        width: 100%;
        height: auto;

    }

    .modal-content p{
        font-size: 1rem;
    }
    .modal-content {
        margin: 16em auto;
        background-color: #fefefe;
        width: 95%;

    }
    #check-in-date, #check-out-date, #check-in-times, #check-out-times {
        width: 100%;
        font-size: 0.9rem;
        padding:0.5em;
    }
    .two-column-container {
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
       
}
    .box1, .box2 {
        text-align: center;
        margin: 0 auto;
        padding: 0;
    }
       #number-of-nights{
        width: 30%;
    }

    .typing-text {
        width: 100%;
        box-sizing: border-box; 
        padding: 0 10px; 
        text-align: center; 
        white-space: normal; 
        display: block; 
    }

}

    .peso-sign{
        position: absolute;
        margin-top: 30px;
        margin-left: 5px;
    }

</style>


<body>
<header>
<?php include('./header_authenticated.php') ?> 
</header> 
    <div class="headcontainer">

    <button class="backbutton" onclick="goBack()"><i class="fa-solid fa-arrow-left"></i></button>

        <div class="title">
        
            <h1 class="text-with-icon animate__animated animate__slideInDown animate__delay-0.8s"><i class="fa-solid fa-star-and-crescent"></i>&nbsp;Overnight Packages</h1>

            <div class="hr-one animate__animated animate__slideInDown animate__delay-0.8s"></div>							
            <div class="h50 animate__animated animate__slideInDown animate__delay-0.8s"></div>	
            
            <h2 class="animate__animated animate__zoomIn animate__delay-1s">Please share the necessary information so that I can assist you more effectively.</h2>
                     
        </div>
    
        <div class="container">

            <div class="box1">

                <p id="text"></p>

                <div class="packages animate__animated animate__zoomIn animate__delay-0.8s">

                <div class="package">
                        <h4>Types of Rooms</h4>
                        <?php
                     require_once './db_connection.php';

                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // SQL query to retrieve room data
                        $sql = "SELECT * FROM package_prices WHERE package_type = 'overnight' AND attribute = 'main room' ORDER BY package_price";
                        
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();

                        // Initialize a counter to ensure unique IDs
                        $counter = 0;

                        // Fetch and display the room options
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $roomID = $row['price_id'];
                            $roomName = $row['package_name'];
                            $roomPrice = $row['package_price'];
                            $maxCapacity = $row['max_pax'];

                            echo '<input type="radio" name="main-package" id="room-' . $roomID . '-' . $counter . '" value="' . $roomPrice . '">';
                            echo '<label for="room-' . $roomID . '-' . $counter . '">' . $roomName . ' (up to ' . $maxCapacity . ' pax) - ₱' . $roomPrice . '</label><br>';
                            echo '<input type="hidden" name="room-' . $roomID . '-label" value="' . $roomName . '">';
                            echo '<input type="hidden" id="room-' . $roomID . '-' . $counter . '-size" value="' . $maxCapacity . '">';
                            
                            // Increment the counter to ensure unique IDs
                            $counter++;
                        }
                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }

                    $conn = null;
                    ?>
                  
                    </div>
                </div>
            </div>

            <div class="box2">

                <form id="booking-form" action="overnightOption_step3_submit.php" method="POST"> 

                <p class="typing-text" id="people" style="display: none; width: fit-content; margin:auto;" ><i class="fa-solid fa-comment-dots"></i>&nbsp;The rooms you selected can accommodate people up to:</p>
                <span class="input-container">
                <input type="number" id="total-size" name="total_size" class="borderless-input" oninput="adjustInputSize(this)" style="display: none; margin:auto; border: none;" readonly required>
                </span>

                <input type="text" id="guestID" name="guestID" value="<?php echo $_SESSION['id_session']; ?>"><br> 

                <p class="typing-text"id="numNights" style="display: none; width: fit-content; margin:auto;"><i class="fa-solid fa-comment-dots"></i>&nbsp;Could you please tell me how many night/s you would like to spend?</p>

                <label for="number-of-nights" style="display: none">Number of night/s:</label>
                <input type="number" id="number-of-nights" name="number_of_nights" style="display: none; text-align: center;" required><br>


                <p class="typing-text" id="dates" style="display: none; width: fit-content; margin:auto;"><i class="fa-solid fa-comment-dots"></i>&nbsp;Could you please share the specific date you're interested in?</p>

                <div class="two-column-container">
    <div class="column">
                    <label for= "check-in-date" style="display: none">Check-in Date:</label>
                    <select id= "check-in-date"name= "check_in_date" style="display: none; text-align: center;" required>
                    <option value="">--Select a date--</option>
                    </select>

                    <label for= "check-out-date" style="display: none">Check-out Date:</label>
                    <input id= "check-out-date"name= "check_out_date" style="display: none; text-align: center;" readonly required>
                    </input>
            </div>

            <div class="column">
        <label for="check-in-times" style="display: none">Check-in Time:</label>
        <input type="text" id="check-in-times" name="check_in_times" value="<?php echo $checkInTime ?>" readonly style="border: none; text-align: center; display:none;">

        <label for="check-out-times" style="display: none">Check-out Time:</label>
                <input type="text" id="check-out-times" name="check_out_times" value="<?php echo $checkOutTime ?>" readonly style="border: none; text-align: center; display:none;">
    </div>
</div>






                    <div id="total-guests-container" style="display: none;">
<p class="typing-text" id="total-guests-section" style="width: fit-content; margin:auto;"><i class="fa-solid fa-comment-dots"></i>&nbsp;How many people will be accompanying you?</p><br>
<label for="total-guests">Total Guests:</label>
<input type="text" id="total-guests" name="total_guests" style="text-align: center;" required><br>
</div>

<div id="children-container" style="display: none;">
<br><p class="typing-text" style="width: fit-content; margin:auto;"><i class="fa-solid fa-comment-dots"></i>&nbsp;Please provide the number of children who are 3 years old or younger and will be accompanying you.</p><br>
<label for="children">How many ?:</label>
<input type="number" id="children" name="children" value="" style="text-align: center;"><br>
</div>


                    <input type= "hidden"id= "check-in-time"name= "check_in_time"value= "<?php echo $overnightCheckIn ?>">
                    <input type = "hidden"id = "check-out-time"name = "check_out_time"value = "<?php echo $overnightCheckOut ?>">

   
   
                    <br><p class="typing-text" id="summary" style="display: none; width: fit-content; margin:auto;"><i class="fa-solid fa-comment-dots"></i>&nbsp;Here's the summary for the package you've selected.</p>

<label for="total-package-rate" style="display: none">Total Package Rate: <h3 class="peso-sign">₱</h3></label>
        <input type="text" id="total-package-rate" name="total_package_rate" style="display: none; text-align: center;" readonly>

        <label for="room-accommodation" style="display: none">Room Accomodation:</label>
        <input type="text" id="room-accommodation" name="room_accommodation" style="display: none; text-align: center;" readonly required><br>





        <label for = "total-price">Total Price:</label>
        <input type = "text"id = "total-price"name = ""disabled>

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
            
        </div>

        <div class="last">
        
        <h3 id="booking-question">
            <i class="fa-solid fa-comment-dots"></i>&nbsp;Are you ready to proceed with the booking now?</h3>

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


    
    </div>



    <script>
    function numberFormat(value) {
    return parseFloat(value).toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 });
}

    // Get all the input elements
    const mainPackageInputs = document.querySelectorAll('input[name="main-package"]');
    // const additionalOptionInputs = document.querySelectorAll('input[name="additional-option"]');
    const clientIdInput = document.querySelector('#client-id');
    const totalGuestsInput = document.querySelector('#total-guests');
    const totalPriceInput = document.querySelector('#total-price');
    const numberOfNightsInput = document.querySelector('#number-of-nights');
    const totalPackageRateInput = document.querySelector('#total-package-rate');
    const totalSizeInput = document.getElementById('total-size');
    const checkOutDateInput = document.getElementById('check-in-date');

    // Get the total-guests-container and children-container div elements
    const totalGuestsContainer = document.getElementById('total-guests-container');
    const childrenContainer = document.getElementById('children-container');

    // Get references to the input fields
const childrenInput = document.getElementById("children");
const nightsInput = document.getElementById("number-of-nights");


const bookingForm = document.getElementById("booking-form");

// Add a form submission event listener
bookingForm.addEventListener("submit", function (event) {
    // Get the room accommodation input element
    const roomAccommodationInput = document.getElementById("room-accommodation");

    // Check if the room accommodation input is empty
    if (roomAccommodationInput.value.trim() === "") {
        // Prevent the form from being submitted
        event.preventDefault();
        alert("Room Accommodation is required.");
    }
});


// Add event listeners for input validation
childrenInput.addEventListener("input", () => {
    // Ensure the value is a non-negative integer
    const value = parseInt(childrenInput.value) || 0;
    childrenInput.value = Math.max(value, 0); // Set to zero if negative
});

totalGuestsInput.addEventListener("input", () => {
    // Ensure the value is a non-negative integer
    const value = parseInt(totalGuestsInput.value) || 0;
    totalGuestsInput.value = Math.max(value, 0); // Set to zero if negative
});

nightsInput.addEventListener("input", () => {
    // Ensure the value is a non-negative integer
    const value = parseInt(nightsInput.value) || 0;
    nightsInput.value = Math.max(value, 0); // Set to zero if negative
});



    // Add an event listener to check_out_date input
    checkOutDateInput.addEventListener('input', () => {
        if (checkOutDateInput.value) {
            // If check_out_date has a value, show the total guests section and hide the children section
            totalGuestsContainer.style.display = 'block';
            childrenContainer.style.display = 'none';
        } else {
            // If check_out_date is empty, hide the total guests section and show the children section
            totalGuestsContainer.style.display = 'none';
            childrenContainer.style.display = 'block';
        }
    });


    

    function calculateTotalSize() {
        let totalSize = 0;

        // Add the size of the selected main package
        mainPackageInputs.forEach(input => {
            if (input.checked) {
                const sizeInput = document.getElementById(`${input.id}-size`);
                totalSize += parseInt(sizeInput.value);
            }
        });


        // Update the total size input field
        totalSizeInput.value = totalSize;
    }

    // Event listeners for the main package and additional option inputs
    mainPackageInputs.forEach(input => {
    input.addEventListener('change', () => {
        calculateTotalSize();

        const people = document.getElementById('people');
        const totalSize = document.querySelector('input[name="total_size"]');
        const numNights = document.getElementById('numNights');
        const numNightsLabel = document.querySelector('label[for="number-of-nights"]');
        const numbers = document.querySelector('input[name="number_of_nights"]');

        if (input.value !== "") {
            people.style.display = "block";
            totalSize.style.display = "block";
            numNights.style.display = "block";
            numNightsLabel.style.display = "block";
            numbers.style.display = "block";
        } else {
            people.style.display = "none";
            totalSize.style.display = "none";
            numNights.style.display = "none";
            numNightsLabel.style.display = "none";
            numbers.style.display = "none";
        }
    });
});


    // Calculate the total price based on the user's selections
function calculateTotalPrice() {
    let totalPrice = 0;

    // Add the price of the selected main package
    mainPackageInputs.forEach(input => {
        if (input.checked) {
            totalPrice += parseInt(input.value);
        }
    });


    // Update the total price input field
    totalPriceInput.value = `${totalPrice}`;

    // Calculate and update the total package rate
    const numberOfNights = parseInt(numberOfNightsInput.value) || 1; // Default to 1 night if no value is entered
    const totalPackageRate = totalPrice * numberOfNights;
    totalPackageRateInput.value = numberFormat(`${totalPackageRate}`);
}

// Event listener for the number of nights input
numberOfNightsInput.addEventListener('change', () => {
    calculateTotalPrice();


       
});

numberOfNightsInput.addEventListener('input', () => {
        calculateTotalPrice();
        calculateTotalPackageRate();
        
        
        const dates = document.getElementById('dates');
const checkinLabel = document.querySelector('label[for="check-in-date"]');
const checkin = document.querySelector('select[name="check_in_date"]');
const checkoutLabel = document.querySelector('label[for="check-out-date"]');
const checkout = document.querySelector('input[name="check_out_date"]');
const checkinLabelTime = document.querySelector('label[for="check-in-times"]');
const checkinTime = document.querySelector('input[name="check_in_times"]');
const checkoutLabelTime = document.querySelector('label[for="check-out-times"]');
const checkoutTime = document.querySelector('input[name="check_out_times"]');


if (this.value !== "" && this.value !== "0") {
    dates.style.display = "block";
    checkinLabel.style.display = "block";
    checkin.style.display = "block";
    checkoutLabel.style.display = "block";
    checkout.style.display = "block";
    checkinLabelTime.style.display = "block";
    checkinTime.style.display = "block";
    checkoutLabelTime.style.display = "block";
    checkoutTime.style.display = "block";
} else {
    dates.style.display = "none";
    checkinLabel.style.display = "none";
    checkin.style.display = "none";
    checkoutLabel.style.display = "none";
    checkout.style.display = "none";
    checkinLabelTime.style.display = "none";
    checkinTime.style.display = "none";
    checkoutLabelTime.style.display = "none";
    checkoutTime.style.display = "none";
} 
       // Call this function to update the total_package_rate field
    });


// Initially calculate the total price and total package rate
calculateTotalPrice();


// Function to calculate the total package rate
function calculateTotalPackageRate() {
    const selectedMainPackageInputs = Array.from(document.querySelectorAll('input[name="main-package"]:checked'));
    // const selectedAdditionalOptionInputs = Array.from(document.querySelectorAll('input[name="additional-option"]:checked'));

    const totalPrice = selectedMainPackageInputs.reduce((total, input) => total + parseInt(input.value), 0) ;

    // +
    //     selectedAdditionalOptionInputs.reduce((total, input) => total + parseInt(input.value), 0)

    const totalSize = parseInt(totalSizeInput.value) || 0;

    // Get the number of guests and children
    const totalGuests = parseInt(totalGuestsInput.value) || 0;
    const childrenCount = parseInt(children.value) || 0;

    let extraCharge = 0;
    

    // Calculate the extra charge for each guest exceeding the total size
     // Calculate the adjusted total guests count (excluding children)
     const adjustedTotalGuests = totalGuests - childrenCount;
    if (adjustedTotalGuests > totalSize) {
        extraCharge = <?php echo $overnightexcess; ?> * (adjustedTotalGuests - totalSize);
    }

    // Update the total_package_rate input field by adding the extra charge
    totalPackageRateInput.value = numberFormat((totalPrice + extraCharge) * (parseInt(numberOfNightsInput.value) || 1));
}

// Event listener for changes in the "total guests" field only
totalGuestsInput.addEventListener('input', calculateTotalPackageRate);
children.addEventListener('input', calculateTotalPackageRate);

// Event listener for the number of nights input
numberOfNightsInput.addEventListener('change', () => {
    calculateTotalPrice();
    calculateTotalPackageRate();
});

// Add an event listener to update the total package rate when a room type or additional room is selected
const roomInputs = Array.from(document.querySelectorAll('input[name="main-package"]'));


// , input[name="additional-option"]
roomInputs.forEach(input => {
    input.addEventListener('change', () => {
        calculateTotalPackageRate();
    });
});

// Initial calculations
calculateTotalPrice();
calculateTotalPackageRate();


    // Event listeners for the main package and additional option inputs
    mainPackageInputs.forEach(input => {
        input.addEventListener('change', () => {
            calculateTotalPrice();
        });
    });

    
    // Event listener for the number of nights input
    numberOfNightsInput.addEventListener('change', () => {
    calculateTotalPrice();
    });
    
// Get references to the radio buttons and the Room Accommodation text box
const radioButtons = document.querySelectorAll('input[type=radio][name="main-package"]');
const roomAccommodationInput = document.querySelector('#room-accommodation');

// Update the value of the Room Accommodation text box
function updateRoomAccommodation() {
    let roomAccommodation = '';

    // Get the label of the selected radio button
    radioButtons.forEach(radioButton => {
        if (radioButton.checked) {
            const selectedLabel = document.querySelector(`label[for="${radioButton.id}"]`);
            if (selectedLabel) {
                // Extract roomName from the label text
                const roomName = selectedLabel.textContent.split(' (')[0];
                roomAccommodation += roomName;
            }
        }
    });

    // Update the value of the Room Accommodation text box
    roomAccommodationInput.value = roomAccommodation;
}

// Add an event listener to each radio button
radioButtons.forEach(radioButton => {
    radioButton.addEventListener('change', updateRoomAccommodation);
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

// Function to calculate and update the check-out date based on the check-in date and number of nights
function calculateCheckOutDate() {
    var checkInDateSelect = document.getElementById('check-in-date');
    var checkOutDateSelect = document.getElementById('check-out-date');
    var numberOfNightsInput = document.getElementById('number-of-nights');

    var checkInDate = new Date(checkInDateSelect.value);
    var numberOfNights = parseInt(numberOfNightsInput.value);

    if (!isNaN(numberOfNights) && numberOfNights > 0) {
        var checkOutDate = new Date(checkInDate.getTime() + numberOfNights * 24 * 60 * 60 * 1000);
        var checkOutDateString = checkOutDate.toISOString().split('T')[0];

        if (checkOutDateSelect.querySelector(`option[value="${checkOutDateString}"]`)) {
            checkOutDateSelect.value = checkOutDateString;
        } else {
            alert("Sorry! but the check-out date you selected isn't available! You may adjust your number of nights to fit the available dates.");
        }
    }
}

// Event listener for the number of nights input
document.getElementById('number-of-nights').addEventListener('input', calculateCheckOutDate);

// Event listener for the check-in date input
document.getElementById('check-in-date').addEventListener('change', calculateCheckOutDate);

// Event listener for the number of nights input (change event)
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

// Initial calculation of check-out date
calculateCheckOutDate();




document.addEventListener("DOMContentLoaded", function () {
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


  totalGuests.addEventListener("input", function () {
    guestsValueChanged = true; // Set the flag when the total guests value changes
  });

  totalGuests.addEventListener("blur", function () {
    // Show the custom modal dialog when the user moves away from the total guests field
    if (guestsValueChanged) {
      modal.style.display = "flex";
    }
  });

  // Event listener to prevent form submission when Enter is pressed
  totalGuests.addEventListener("keydown", function (event) {
    if (event.key === "Enter") {
      event.preventDefault(); // Prevent the default form submission
      totalGuests.blur(); // Trigger the blur event to show the modal dialog
    }
  });

  modalYesButton.addEventListener("click", function () {
    childrenContainer.style.display = "block"; // Show the children input field
    guestsValueChanged = false; // Reset the flag
    modal.style.display = "none"; // Hide the modal dialog
  });

  modalNoButton.addEventListener("click", function () {
    childrenContainer.style.display = "none"; // Hide the children input field
    childrenInput.value = ""; // Clear the children input field
    guestsValueChanged = false; // Reset the flag
    modal.style.display = "none"; // Hide the modal dialog
  });

  // Additional event listener to ensure children count doesn't exceed total guests count
  childrenInput.addEventListener("input", function () {
    const childrenCount = parseInt(childrenInput.value) || 0; // Convert to integer, default to 0
    const totalGuestsCount = parseInt(totalGuests.value) || 0;

    if (childrenCount > totalGuestsCount) {
      childrenInput.value = totalGuestsCount; // Cap children count at total guests count
    }

    const summary = document.getElementById('summary');
const packageRate = document.querySelector('label[for="total-package-rate"]');
const package = document.querySelector('input[name="total_package_rate"]');
const roomAccommodation = document.querySelector('label[for="room-accommodation"]');
const room = document.querySelector('input[name="room_accommodation"]');


    summary.style.display = "block";
    packageRate.style.display = "block";
    package.style.display = "block";
    roomAccommodation.style.display = "block";
    room.style.display = "block";
    showButtonContainerAndQuestion()
  });
  function showButtonContainerAndQuestion() {
        buttonContainer.style.display = "flex";
        bookingQuestion.style.display = "block";
    }

    // Add this code within your existing JavaScript code to show both elements
    document.getElementById("modal-yes").addEventListener("click", function() {
        showButtonContainerAndQuestion();
        const summary = document.getElementById('summary');
const packageRate = document.querySelector('label[for="total-package-rate"]');
const package = document.querySelector('input[name="total_package_rate"]');
const roomAccommodation = document.querySelector('label[for="room-accommodation"]');
const room = document.querySelector('input[name="room_accommodation"]');


    summary.style.display = "none";
    packageRate.style.display = "none";
    package.style.display = "none";
    roomAccommodation.style.display = "none";
    room.style.display = "none";
    buttonContainer.style.display = "none";
        bookingQuestion.style.display = "none";

    });
    document.getElementById("modal-no").addEventListener("click", function() {
    showButtonContainerAndQuestion();
    // Additional code to hide or show the "Total Package Rate" section based on "no" button click

const summary = document.getElementById('summary');
const packageRate = document.querySelector('label[for="total-package-rate"]');
const package = document.querySelector('input[name="total_package_rate"]');
const roomAccommodation = document.querySelector('label[for="room-accommodation"]');
const room = document.querySelector('input[name="room_accommodation"]');


    summary.style.display = "block";
    packageRate.style.display = "block";
    package.style.display = "block";
    roomAccommodation.style.display = "block";
    room.style.display = "block";



});
    document.getElementById("confirm-yes").addEventListener("click", showButtonContainerAndQuestion);
});



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

// Function to show the confirmation dialog
function showConfirmationDialog() {
  const modal = document.getElementById("confirmationModal");
  modal.style.display = "flex";
}

// Add this code within your existing JavaScript code
document.getElementById("yes-button").addEventListener("click", showConfirmationDialog);

// Add an event listener to the main package radio buttons
mainPackageInputs.forEach(input => {
    input.addEventListener('change', () => {
        // Set the "total-guests" field to zero when a radio button is selected
        totalGuestsInput.value = totalGuestsInput.value;
        // Calculate and update other fields based on the new selection
        calculateTotalSize();
        calculateTotalPrice();
        calculateTotalPackageRate();
        updateRoomAccommodation();
    });
});



const textElement = document.getElementById('text');
        const newText = "I'd be happy to help you choose a room! Could you select the type of rooms or any specific preferences you have in mind?";
        let index = 0;

        function typeText() {
            if (index < newText.length) {
                textElement.textContent += newText.charAt(index);
                index++;
                setTimeout(typeText, 50); 
            }
        }

        setTimeout(typeText, 1000); 

        function goBack() {
      window.history.back();
    }

</script>


<footer>
<?php include './footer.php' ?> 
</footer>
</body>
</html>
