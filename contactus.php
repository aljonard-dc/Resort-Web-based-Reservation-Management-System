<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "icon" href = "./assets/logo/NaturaVerdeLogo.png" type = "image/x-icon"><title>Natura Verde Farm and Private Resort</title>
    <link rel="stylesheet" href="css/common/contactus.css">
</head>

<body>
<header>
<?php include 'header_unauthenticated.php' ?> 
</header>
<section class="contactus-sec">
<div class="contactus-container">
    <div class="gmap-pos">
    <iframe class="gmap-con" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3870.219698071241!2d122.9007771749881!3d14.064200086361037!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3398a95eff739bcb%3A0xda8ff91ab2bbcef0!2sNatura%20Verde%20Farm%20and%20Private%20Resort!5e0!3m2!1sen!2sph!4v1693062533986!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="contact-form">
        <div class="contact-title">
            <h1>Contact Us</h1>
            
        </div>

            <?php 
                $Msg = "";
                if(isset($_GET['error'])){
                    $Msg = " Please fill in the Blanks! ";
                    echo '<div style="text-align:center;color:red;">'.$Msg.'</div>';
                }

                if(isset($_GET['success'])){
                    $Msg = " Your Message Has Been Sent! ";
                    echo '<div style="text-align:center;">'.$Msg.'</div>';
                }
            
            ?>
         
        <div class="form-container">
            <form action="process.php" method="POST">
                <input type="text" name="name" placeholder="User Name" class="username-inputbox" required>
                <input type="email" name="email" placeholder="Email Address" class="email-inputbox" required>
                <textarea name="message" class="message-inputbox" placeholder="Write The Message" required></textarea>
              
                <button class="send-btn" name="btn-send"> Send A Message </button>
            </form>
            
        </div>
    
    </div>

</div>

</section>
<footer>
<?php include 'footer.php' ?> 
</footer>
</body>

</html>