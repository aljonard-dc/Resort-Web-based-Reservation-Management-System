<?php

// Check if the first name and last name session variables are set
if (!isset($_SESSION["firstname_session"]) || !isset($_SESSION["middlename_session"]) || !isset($_SESSION["lastname_session"]) || !isset($_SESSION["email_session"]) || !isset($_SESSION["phonenumber_session"])) {
    header("Location: ../user-login.php"); // Redirect to login if the session variables are not set
    exit();

}
?>
<!DOCTYPE html>
<head>
   <meta charset="utf-8">
   <link rel = "icon" href = "../assets/logo/NaturaVerdeLogo.png" type = "image/x-icon"><title>Natura Verde Farm and Private Resort</title>
   <link rel="stylesheet" href="css/header_authenticated.css">
   <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <header>
   <div id="navbar">
      <ul>
       <a href="./home.php"><img src="../assets/logo/logo.png" alt="" class="natura-logo"></a>
        <li class="natura-title">&ensp;&ensp;&ensp;&ensp;&ensp;Natura Verde <br>Farm and Private Resort</li>
        <li class="items"><a href="./home.php">Home</a></li>
        <li class="items"><a href="./gallery.php">Gallery</a></li>
        <li class="items"><a href="./packages.php">Packages</a></li>
        <li class="items"><a href="./takeatour.php">Take a Tour</a></li>
        <li class="items"><a href="./about-us.php">About Us</a></li>
        <img src="./images/profile-circle-icon.png" class="user-pic" alt="profile" onclick="toggleMenu()">
        <li class="btn-menu"><a href="#"><i class="fas fa-bars"></i></a></li>
      </ul>
      <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                            <img src="./images/profile-circle-icon.png" alt="">
                            <h3> <?php echo $_SESSION['firstname_session']; ?>  <?php echo $_SESSION['lastname_session']; ?></h3>
                    </div>
                    <hr>

                    <a href="./editprofile.php" class="sub-menu-link">
                        <img src="images/settings.png" alt="">
                        <p>Edit Profile</p>  
                        <!-- <span>></span>                      -->
                    </a>
                    <a href="./changepassword.php" class="sub-menu-link">
                        <img src="images/reset-password.png" alt="">
                        <p>Change Password</p>
                        <!-- <span>></span> -->
                    </a>
                    <a href="./reservationHistory.php" class="sub-menu-link">
                        <img src="icons/reservation-icon.jpg" alt="">
                        <p>My Reservation</p>
                        <!-- <span>></span> -->
                    </a>
                    <a href="../logout.php" class="sub-menu-link">
                        <img src="images/logout.png" alt="">
                        <p>Log Out</p>
                        <!-- <span>></span> -->
                    </a>

                </div>

            </div>
   </div>



   </header>
  
</body>
<script>
      let subMenu = document.getElementById("subMenu");

    function toggleMenu(){
    subMenu.classList.toggle("open-menu")
}
      $(document).ready(function(){
        $('.btn-menu').click(function(){
          $('.items').toggleClass("show");
          $('ul li').toggleClass("hide");
        });
      });

      window.onscroll = function() {myFunction()};

      window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
   </script>
</html>