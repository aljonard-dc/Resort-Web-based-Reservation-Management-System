<?php
session_start();
// Check if the session variables are set
if (!isset($_SESSION["id_session"]) || !isset($_SESSION["firstname_session"]) || !isset($_SESSION["middlename_session"]) || !isset($_SESSION["lastname_session"]) || !isset($_SESSION["email_session"]) || !isset($_SESSION["phonenumber_session"]) || !isset($_SESSION["password_session"])) {
    header("Location: ../user-login.php"); // Redirect to login if the session variables are not set
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "icon" href = "../assets/logo/NaturaVerdeLogo.png" type = "image/x-icon"><title>Natura Verde Farm and Private Resort</title>
    <link rel="stylesheet" href="css/takeatour.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>

<body>

<header>
<?php include 'header_authenticated.php' ?> 
</header>
<section class="takeatour-sec">
    <div class="takeatour-container">
        <div class="matterport-container"> 
            <iframe class="naturaverde-virtualtour" 
            src='https://my.matterport.com/show/?m=d8Z5nkTrXXM' 
            frameborder='0' allowfullscreen allow='xr-spatial-tracking'>
            </iframe>
        </div>
    </div>

</section>

<footer>
<?php include 'footer.php'; ?>  
</footer>
</body>

</html>