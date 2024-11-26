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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "icon" href = "../assets/logo/NaturaVerdeLogo.png" type = "image/x-icon">
    <title>Natura Verde Farm and Private Resort</title>
    <link rel="stylesheet" href="css/feedback.css">
</head>

<body>
<header>
<?php include('./header_authenticated.php') ?> 
</header>
<section class="feedback-sec"> <br><br><br><br><br>

                    <h2>FEEDBACK</h2>
                    <div class="hr-one"></div>							
                    <div class="h50"></div>		

    <div class="feedback-container">
        <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
        <div class="elfsight-app-27a3ac28-b560-4c5b-8c86-0701e299d5e3"></div>

    </div>
</section>

</body>
<footer>
<?php include './footer.php'; ?>  
</footer>
</html>