<?php

session_start();
// Check if the first name and last name session variables are set
if (!isset($_SESSION["firstname_session"]) || !isset($_SESSION["middlename_session"]) || !isset($_SESSION["lastname_session"]) || !isset($_SESSION["email_session"]) || !isset($_SESSION["phonenumber_session"])) {
    header("Location: ../user-login.php"); // Redirect to login if the session variables are not set
    exit();

}



?>

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
        max-width: 600px;
        max-height: auto;
        margin: 20px auto ;
        padding: 50px 40px;
        border: solid #36f90f ;
        border-radius: 10px;
        text-align: center;
    }

    /* h1{
        font-family: Arial, sans-serif;
        text-transform: uppercase;
        font-size: 32px;
        font-weight: 2px;
        text-align: center;
        color: #0e4d0e;
        justify-content: center;
    } */

    .container {
        background-color: #f4f4f4;
        margin: 20px auto;
        padding: 20px;
        width: 80%;
    }

    .headcontainer p{
        font-family: Arial, sans-serif;
        font-size: 1.2em;
        font-weight: bold;
        text-align: center;
        color: #0e4d0e;
        justify-content: center;
        margin-bottom: 10%;
}


    .container h2 {
        color: #0e4d0e;
    padding: 14px 25px; 
    text-align: center;
    position: center;
    text-decoration: none; 
    text-transform: uppercase;
    
    }
    .container input[type="text"]{
        text-transform: uppercase;
    }
    .container input[type="text"],
    .container input[type="email"]  {
        border: none;
        display: block;
        margin: 0 auto; /* Center horizontally */
        padding: 10px;
        width: 90%;
        text-align: center; /* Center text horizontally */
        margin-bottom: 10px;
    }

    .typing-text {
    font-family: Arial, sans-serif;
    font-size: 1.2rem;
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
    .container input[type="text"]:read-only,
    .container input[type="email"]:read-only {
        background-color: #E8E8E8;
        border-radius: 10px;
        text-align: center; 
        padding: 0.5em;
        font-size: 1.2em;
    }

    .container label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
        font-size: 1.3em;
    }

    .container input[type="submit"] {
        background-color: #1fc724;
        border: none;
        color: white;
        cursor: pointer;
        margin-top: 20px;
        padding: 12px 20px;
        text-decoration: none;
        display: inline-block; /* Ensure it's inline-block to center horizontally */
    }

    .container input[type="submit"]:hover {
        background: radial-gradient(circle at -1% 57.5%, rgb(19, 170, 82) 0%, rgb(0, 102, 43) 90%);
    }

    .confirm-btn {
        text-align: center;
        margin: 20px;
    }

    .confirm-btn a {
        width: 90%;
        background-color: #1fc724;
        font-family: Arial, sans-serif;
        text-transform: uppercase;
        font-size: 20px;
        font-weight: bold;
        color: white;
        padding: 14px 30px;
        text-decoration: none;
        display: inline-block;
        border-radius: 10px; 
    }

    .confirm-btn a:hover{
        background: radial-gradient(circle at -1% 57.5%, rgb(19, 170, 82) 0%, rgb(0, 102, 43) 90%);
    }

    .icon-button {
    position: relative;
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
        h1{
            font-size: 20px;
        }
    }

    @media (max-width: 600px) {
        .headcontainer {
            padding: 15px;
            max-width: 400px;
            height: auto;
        }
        h1{
            font-size: 20px;
        }
    }

    @media (max-width: 500px) {
        .headcontainer {
            padding: 15px;
            max-width: 300px;
            height: auto;
        }
        h1{
            font-size: 20px;
        }
        .form-container {
            max-width: 200px;
    }
        .confirm-btn{
            width: 70%;
        }
    }
    
    /* Add a media query for small screens (mobile devices) */
@media (max-width: 500px) {
    .typing-text {
        width: 100%; 
        box-sizing: border-box; 
        padding: 0 10px; 
        text-align: center; 
        white-space: normal; 
        display: block; 
    }
}

 
 


</style>

<body>

<header>
<?php include('./header_authenticated.php') ?> 
</header>

    <div class="headcontainer">

    <button class="back-button" onclick="goBack()"><i class="fa-solid fa-arrow-left"></i></button>

    <p class="typing-text" style="width: fit-content; margin:auto;"> <i class="fa-solid fa-comment-dots"></i>&nbsp;Here's a quick summary of your reservation.</p>
    
        <div class="container">
        <h2>Information Details</h2>
            
            <form action="update_informationDetails_step1.php" method="post">
                
                <?php
                    require_once './db_connection.php';
                    $confirmationId = $_SESSION['id_session'];
                    $sql = "SELECT * FROM information_details WHERE client_id=(SELECT MAX(client_id) FROM payment) AND id = '$confirmationId' ORDER BY client_id DESC LIMIT 1";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo '<label for="last_name">Last Name:</label>';
                            echo '<input type="text" name="last_name" value="' . $row["last_name"] . '" readonly />';
                            echo '<label for="first_name">First Name:</label>';
                            echo '<input type="text" name="first_name" value="' . $row["first_name"] . '" readonly />';
                            echo '<label for="middle_name">Middle Name:</label>';
                            echo '<input type="text" name="middle_name" value="' . $row["middle_name"] . '" readonly />';
                            echo '<label for="middle_name">Age:</label>';
                            echo '<input type="text" name="age" value="' . $row["age"] . '" readonly />';
                            echo '<label for="contact_number">Contact Number:</label>';
                            echo '<input type="text" name="contact_number" value="' . $row["contact_number"] . '" readonly />';
                            echo '<label for="address">Address:</label>';
                            echo '<input type="text" name="address" value="' . $row["address"] . '" readonly />';
                            echo '<label for="email_address">Email Address:</label>';
                            echo '<input type="email" name="email_address" value="' . $row["email_address"] . '" readonly />';
                        }
                    } else {
                        echo "0 results";
                    }
                   
                ?>
                
                <span class="icon-button">
                    <input type="submit" value="     UPDATE">
                    <i class="fa-solid fa-pen-to-square"></i>
                </span>

            </form>

        </div>
        
        <div class="container">
            <h2>Details and Packages</h2>
        
            <form action="#">
                <?php
                   require_once './db_connection.php';
                   $confirmationId = $_SESSION['id_session'];
                    $sql = "SELECT * FROM details_and_packages WHERE package_id=(SELECT MAX(package_id) FROM payment) AND id = '$confirmationId' ORDER BY package_id DESC LIMIT 1";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo '<label for="tour_package">Tour Package:</label>';
                            echo '<input type="text" name="tour_package" value="' . $row["tour_package"] . '" readonly />';
                            echo '<label for="total_guests">Total Guests:</label>';
                            echo '<input type="text" name="total_guests" value="' . $row["total_guests"] . '" readonly />';
                            echo '<label for="check_in_date_and_time">Check-in Date and Time:</label>';
                            echo '<input type="text" name="check_in_date_and_time" value="' . $row["check_in_date_and_time"] . '" readonly />';
                            echo '<label for="check_out_date_and_time">Check-out Date and Time:</label>';
                            echo '<input type="text" name="check_out_date_and_time" value="' . $row["check_out_date_and_time"] . '" readonly />';
                            echo '<label for="room_accommodation">Room Accomodation:</label>';
                            echo '<input type="text" name="room_accomodation" value="' . $row["room_accomodation"] . '" readonly />';
                        }
                    } else {
                        echo "0 results";
                    }
                    
                ?>
            </form>
        </div>
    
        <div class="container">
            <h2>Payment</h2>
            
            <form action="#">
                <?php
                   require_once './db_connection.php';

                   $confirmationId = $_SESSION['id_session'];
                    $sql = "SELECT * FROM payment WHERE package_id=(SELECT MAX(package_id) FROM payment) AND id = '$confirmationId' ORDER BY payment_id DESC LIMIT 1";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $pRate = number_format((float) $row["total_package_rate"], '2', '.', ',');
                            $pDown = number_format((float) $row["downpayment"], '2', '.', ',');
                            $pDue = number_format((float) $row["due_balance"], '2', '.', ',');


                            echo '<label for="total_package_rate">Total Package Rate:</label>';
                            echo '<input type="text" name="total_package_rate" value="₱' . $pRate . '" readonly />';
                            echo '<label for="downpayment">Downpayment:</label>';
                            echo '<input type="text" name="downpayment" value="₱' . $pDown . '" readonly />';
                            echo '<label for="due_balance">Due Balance:</label>';
                            echo '<input type="text" name="due_balance" value="₱' . $pDue . '" readonly />';
                        }
                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                ?>
            </form>
        
        </div>

        <div class = "confirm-btn" >
           <a href="overlay_step5.php">Confirm</a>
        </div>

    </div>

    <footer>
        <?php include './footer.php'; ?>  
    </footer>

    <script>
    function goBack() {
      window.history.back();
    }

    </script>

</body>
</html>
