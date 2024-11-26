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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel = "icon" href = "../assets/logo/NaturaVerdeLogo.png" type = "image/x-icon"><title>Natura Verde Farm and Private Resort</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="css/gallery.css">
    <title>GALLERY</title>
</head>
<header>
<?php include('header_authenticated.php') ?> 
</header>
<body>
<section class="gallery-sec"> 
<div class="gallery-container">
        <div class="image-slider-pos animate__animated animate__bounceInDown">
        <div class="swiper card-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="img-box">
                            <img src="../resources/image-slider/Pic1.jpg">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="img-box">
                            <img src="../resources/image-slider/Pic2.jpg">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="img-box">
                            <img src="../resources/image-slider/Pic3.jpg">
                    </div>
                </div>
              
                <div class="swiper-slide">
                    <div class="img-box">
                            <img src="../resources/image-slider/Pic4.jpg">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="img-box">
                            <img src="../resources/image-slider/Pic5.jpg">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="img-box">
                            <img src="../resources/image-slider/Pic6.jpg">
                    </div>
                </div>
              
                <div class="swiper-slide">
                    <div class="img-box">
                            <img src="../resources/image-slider/Pic7.jpg">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="img-box">
                            <img src="../resources/image-slider/Pic8.jpg">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="img-box">
                            <img src="../resources/image-slider/Pic9.jpg">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="img-box">
                            <img src="../resources/image-slider/Pic10.jpg">
                    </div>
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <br> <br> 
            <div class="swiper-pagination"></div>
        </div>
       
        </div>
        <div class="gallery-desc">
            <h1 class="animate__animated animate__bounceInDown">
                      A vacation home rental surrounded by lush greened that's perfect <br>
                      for reunions, birthdays,wedding and other occasions.
             </h1>
        </div>
        <div class="resort-details-container">
            
            <div class="category-container">
            <?php
            // Include the database connection
            include './db_connection.php';

            // Select category titles and descriptions from the database
            $sql = "SELECT categorytitle, categorydescription FROM `resortcategory_tbl` ORDER BY id ASC";
            $res = mysqli_query($conn, $sql);

            // Check if there are rows in the result
            if (mysqli_num_rows($res) > 0) {
                // Loop through the result and display category titles and descriptions
                while ($category = mysqli_fetch_assoc($res)) {
                    echo '<div class="title-description-container animate__animated animate__bounceInLeft">';
                    echo '<div class="cat-title"><h1>';
                    echo $category['categorytitle'];
                    echo '</h1></div>';
                    echo '<div class="hr-one"></div>';
                    echo '<div class="h50"></div>';
                    echo '<div class="cat-description animate__animated animate__bounceInLeft">';
                    echo '<p>';
                    echo $category['categorydescription'];
                    echo '</p></div>';
                    echo '<div class="space">';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                // Display a message if there are no categories
                echo '<p>No categories found</p>';
            }

            // Close the database connection
            mysqli_close($conn);
            ?>
        </div>


        <div class="cards-images animate__animated animate__bounceInRight">
        <?php
        include './db_connection.php';

        $sql = "SELECT * FROM categoryimages_tbl ORDER BY id ASC";
        $res = mysqli_query($conn, $sql);

        if (mysqli_num_rows($res) > 0) {
            while ($image = mysqli_fetch_assoc($res)) {
                echo '<div class="cat-images">';
                echo '<img src="../uploads/' . $image['img_url'] . '" alt="Image">';
                echo '</div>';
            }
        } else {
            echo '<p>No images found</p>';
        }

        mysqli_close($conn);
        ?>
        </div>

</div>

</div>
</section>
</body>
<footer>
<?php include 'footer.php'; ?>  
</footer>
<script>
    var swiper = new Swiper(".card-slider", {
      slidesPerView: 4,
      spaceBetween: 5,
     // loop:true,
    //  speed: 1000,
     autoplay:{
       delay:2000,
     },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      breakpoints: {
        320: {
          slidesPerView: 1,
   
        },
        480: {
          slidesPerView: 2,
    
        },
        500: {
          slidesPerView: 2,
    
        },
        768: {
          slidesPerView: 4,
        
        },
        1200: {
          slidesPerView: 5,
        
        },
      },
    });
  </script>
</html>
