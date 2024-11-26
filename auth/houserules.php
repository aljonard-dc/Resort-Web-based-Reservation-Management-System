<?php
// Start a PHP session
session_start();
// Check if the first name and last name session variables are set
if (!isset($_SESSION["firstname_session"]) || !isset($_SESSION["middlename_session"]) || !isset($_SESSION["lastname_session"]) || !isset($_SESSION["email_session"]) || !isset($_SESSION["phonenumber_session"])) {
    header("Location: ../user-login.php"); // Redirect to login if the session variables are not set
    exit();

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "icon" href = "../assets/logo/NaturaVerdeLogo.png" type = "image/x-icon"><title>Natura Verde Farm and Private Resort</title>
    <link rel="stylesheet" href="css/houserules.css">
</head>

<body>
<header>
<?php include('./header_authenticated.php') ?> 
</header>
<section class="houserules-sec">
    <div class="img-container">
        <img src=".//images/houserules.png" alt="pic">
    </div>
</section>
<footer>
<?php include './footer.php' ?> 
</footer>
</body>

</html>