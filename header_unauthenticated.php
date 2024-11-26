<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <link rel = "icon" href = "./assets/logo/NaturaVerdeLogo.png" type = "image/x-icon"><title>Natura Verde Farm and Private Resort</title>
   <link rel="stylesheet" href="css/common/header_unauthenticated.css">
   <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <header>
   <div id="navbar">
      <ul>
       <a href="index.php"><img src="./assets/logo/logo.png" alt="" class="natura-logo"></a>
        <li class="natura-title">&ensp;&ensp;&ensp;&ensp;&ensp;Natura Verde <br>Farm and Private Resort</li>
        <li class="items"><a href="index.php">Home</a></li>
        <li class="items"><a href="gallery.php">Gallery</a></li>
        <li class="items"><a href="packages.php">Packages</a></li>
        <li class="items"><a href="takeatour.php">Take a Tour</a></li>
        <li class="items"><a href="about-us.php">About Us</a></li>
        <li class="items"><a href="user-login.php">Book Now</a></li>
        <li class="btn-menu"><a href="#"><i class="fas fa-bars"></i></a></li>
      </ul>
   </div>

   </header>
  
</body>
<script>
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