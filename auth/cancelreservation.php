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
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
   <link rel = "icon" href = "../assets/logo/NaturaVerdeLogo.png" type = "image/x-icon"><title>Natura Verde Farm and Private Resort</title>
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

    #cancelButton {
        max-width: 50%;
        background-color: red;
        font-family: Arial, sans-serif;
        text-transform: uppercase;
        font-size: 20px;
        font-weight: bold;
        color: white;
        padding: 14px 30px;
        text-decoration: none;
        display: inline-block;
        border-radius: 10px;
        margin-left: 30%;

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

    .fa-house{
        color:black;
    }

    a#downloadQR {
            display: flex;
            background-color: #3498db;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px;
            justify-content: center;
            align-items: center;
            width: 30%;
        }

        a#downloadQR:hover {
            background-color: #2980b9;
        }

        /* Style the icon */
        i.fas.fa-download {
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
        <a href="index.html" class="icon-button">
            <i class="fa-solid fa-house"></i>
        </a>
        <div class="upper-section">
            <div class="checkmark-circle">
                <div class="checkmark">&#10003;</div>
            </div>
        </div>
        <div class="content">
            <p>If you ever need to cancel your reservation, feel free to get in touch with us at ############.</p>
        </div>

        <div class="cancel-btn">
        <a href="" id="cancelButton">
            <i class="fa-solid fa-times"></i>&nbsp;Cancel Reservation</a>
        </div>

</body>
</html>
