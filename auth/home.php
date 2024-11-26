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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <meta charset="UTF-8">
    <link rel = "icon" href = "../assets/logo/NaturaVerdeLogo.png" type = "image/x-icon"><title>Natura Verde Farm and Private Resort</title>
    <link rel="stylesheet" href="css/home.css">
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v18.0" nonce="SpRtth27"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body>
<header>
<?php include('header_authenticated.php') ?> 

</header>
<section class="home-section">
   <div class="video-container">
              <video src="../assets/Videos/Natura Verde Farm and Private Resort.mp4" muted loop controls></video>
                <div class="show-booknow">
                    <div class="welcome-heading">
                        <h1 id="text"></h1>
                        <br>
                            <p>
                            Have this paradise all to yourself when you book us!
                            </p>
                    </div>
                        
                    <div class="button-container animate__animated animate__bounceInLeft">
                        <a href="./packages.php">Book Now</a>
                    </div>
                </div>
    </div>
    
    <div class="fb-container">
    <div class="fb-page" data-href="https://www.facebook.com/naturaverdeph" data-tabs="timeline,messages" data-width="450" data-height="600" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="false">
          <blockquote cite="https://www.facebook.com/naturaverdeph" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/naturaverdeph">Natura Verde Farm and Private Resort</a></blockquote>
      </div>
    </div>
</section>

</body>
<script>

    const video = document.querySelector('video');
    const showBookNow = document.querySelector('.show-booknow');

    video.addEventListener('play', () => {
        showBookNow.style.display = 'none';
    });

    video.addEventListener('pause', () => {
        showBookNow.style.display = 'block';
    });

    const textElement = document.getElementById('text');
    const newText = 'WELCOME <?php echo $_SESSION['firstname_session']; ?>! ';
    let index = 0;

    function typeText() {
        if (index < newText.length) {
            textElement.textContent += newText.charAt(index);
            index++;
            setTimeout(typeText, 50); // Adjust the typing speed here
        }
    }

    setTimeout(typeText, 5000); // Start typing after 1 second
    </script>

</html>