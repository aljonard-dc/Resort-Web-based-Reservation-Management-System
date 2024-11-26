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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel = "icon" href = "../assets/logo/NaturaVerdeLogo.png" type = "image/x-icon">
    <title>Natura Verde Farm and Private Resort</title>
    <link rel="stylesheet" href="css/about-us.css">
</head>

<body>
<header>
<?php include('./header_authenticated.php') ?> 
</header>
<section class="aboutus-sec">
    <div class="aboutus-container">
            <div class="space"></div>
            <div class="about-pos">
                <div class="about-title">
                    <h2>About Us</h2>
                    <div class="hr-one"></div>							
                    <div class="h50"></div>	
                </div>				
            </div>
            <div class="col-1">
                    <div class="img-pos">
                            <img class="pic" src="../resources/AboutUs/AboutUsPic.jpg">
                    </div>
            </div>
            <div class="col-2">
                <div class="aboutus-pos">
                    <br><br>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;Natura Verde Farm and Private Resort is a vacation home rental nestled in the heart of unspoilt nature in San Lorenzo Ruiz, Camarines Norte. 
                    The property was opened to the public in late 2020 and is now a favorite among guests looking for a place to celebrate intimate gatherings, 
                    such as weddings, birthdays, and family reunions with their nearest and dearest.</p>
                    <br><br>
                    <p> &nbsp;&nbsp;&nbsp;&nbsp;Private, exclusive, and pet-friendly, Natura Verde has two beautiful villas and three dormitories and can sleep up to 50 people. 
                    This property has lush greenery, cozy interiors, and big open spaces where guests can enjoy and have their much-needed rest.</p>
                </div>
            </div>
            
    </div>

    

</section>

<footer>
<?php include './footer.php'; ?>  
</footer>
</body>

</html>