<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel = "icon" href = "./assets/logo/NaturaVerdeLogo.png" type = "image/x-icon"><title>Natura Verde Farm and Private Resort</title>
    <link rel="stylesheet" href="css/common/index.css">
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v18.0" nonce="SpRtth27"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<header>
<?php include('header_unauthenticated.php') ?> 

</header>
<section class="home-section">
     <div class="video-container">
              <video src="./assets/Videos/Natura Verde Farm and Private Resort.mp4" muted loop controls></video>
        <div class="show-booknow">

          <div class="description-container">
            <p class="animate__animated animate__bounceInLeft animate__delay-0.8s">
            Have this paradise all to yourself when you book us!<br>
            Book your next weekend getaway with us for the ultimate staycation experience.
            </p>
          </div>

          <div class="button-container animate__animated animate__bounceInLeft">
          <a href="./user-login.php">Book Now</a>
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

<script src="Javascript/faqs.js"></script>
<script>
 const video = document.querySelector('video');
  const showBookNow = document.querySelector('.show-booknow');

  video.addEventListener('play', () => {
    showBookNow.style.display = 'none';
  });

  video.addEventListener('pause', () => {
    showBookNow.style.display = 'block';
  });
</script>

</html>