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
   <link rel = "icon" href = "../assets/logo/NaturaVerdeLogo.png" type = "image/x-icon">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
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

    .view-btn {
        text-align: center;
        margin: 20px;
    }

    .view-btn a {
        max-width: auto;
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

    .view-btn a:hover {
        background: radial-gradient(circle at -1% 57.5%, rgb(19, 170, 82) 0%, rgb(0, 102, 43) 90%);
    }

    .btns {
        display: flex;
        align-items: center; /* Vertically align items */
        justify-content: center;
}

    .view-btn{
        margin-right: 10px; /* Add some spacing between the two divs */
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
<header>
<?php include('./header_authenticated.php') ?> 
</header>
    <div class="container">
        <a href="home.php" class="icon-button">
            <i class="fas fa-times"></i>
        </a>
        <div class="upper-section">
            <div class="checkmark-circle">
                <div class="checkmark">&#10003;</div>
            </div>
        </div>
        <div class="content">
            <p>Your reservation has been successfully cancelled. Thank you for choosing to stay with us!</p>
        </div>

        <div class="btns">
            <div class="view-btn">
                <a href="amenities_new.php"><i class="fa-solid fa-calendar-plus"></i>&nbsp;New Reservation</a>
            </div>

            <div class="view-btn">
                <a href="home.php" id="newReserve"><i class="fa-solid fa-rotate-left"></i>&nbsp;Back to Home</a>
            </div>
        </div>

    </div>
    <footer>
<?php include './footer.php' ?> 
</footer>
</body>
</html>
