<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel = "icon" href = "./assets/logo/NaturaVerdeLogo.png" type = "image/x-icon"><title>Natura Verde Farm and Private Resort</title>
    <link rel="stylesheet" href="css/common/amenities.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lucide@1.4.2/icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
<header>
    <?php include('./header_unauthenticated.php') ?>  
</header>

<section>

    <div class="packages-con">
            
            <div class="heading">
                <h1 class="animate__animated animate__bounceInLeft">Feel free to pick the package that suits your preferences!</h1>
                <h4 class="animate__animated animate__bounceInLeft"><i class="fa-solid fa-comment-dots"></i>&nbsp;Which one are you interested in selecting?</h4>
            </div>
            <div class="image-packages animate__animated animate__bounceInLeft">
                <div class="item" onclick="location.href='user-login.php'"><img src="resources/Packages/daytour.jpg" alt="">DAY TOUR</div>
                <div class="item" onclick="location.href='user-login.php'"><img src="resources/Packages/nighttour.jpg" alt="">NIGHT TOUR</div>
                <div class="item" onclick="location.href='user-login.php'"><img src="resources/Packages/overnight.jpg" alt="">OVERNIGHT PACKAGES</div>
            </div>
    </div>

    
    <div class="amenities-con animate__animated animate__bounceInRight">
        
        <div class="title-box-one">
                <h3>Let's take a leisurely stroll through some of the fantastic amenities we've got waiting for you. When it comes to making your stay extra special, we've got you covered!</h3>
        </div>

        <div class="category-box">
                  
                    <div class="text-container">
                        <h2>INFINITY POOL</h2>
                        <p>Our infinity pool is designed for pure relaxation and Instagram-worthy moments. Picture yourself lounging on a comfy poolside chair, sipping on a refreshing drink, and soaking in the warm sunshine. It's the perfect spot to unwind, destress, and let your worries float away. </p>
                    </div>
  
                    <div class="text-container">
                        <h2>KIDDIE POOL</h2>
                        <p>Our kiddie pool is a haven of laughter and playfulness. It's a safe and shallow area where kids can splash around, make new friends, and have a blast under the watchful eye of our trained lifeguards.</p>
                    </div>   
             
                    <div class="text-container">
                        <h2>
                            FUNCTION HALL
                        </h2>
                        <p>Imagine stepping into a spacious, beautifully decorated hall with elegant lighting and a warm, welcoming ambiance. This is the perfect setting for any event you have in mind, whether it's a wedding, a milestone birthday celebration, a corporate conference, or a family reunion.</p>
                    </div>
           
                    <div class="text-container">
                        <h2>
                            KARAOKE <br>
                        Let's talk karaoke, shall we?
                            </h2>
                        <p>Our kiddie pool is a haven of laughter and playfulness. It's a safe and shallow area where kids can splash around, make new friends, and have a blast under the watchful eye of our trained lifeguards.</p>
                    </div>
                
                    <div class="text-container">
                        <h2>BOARD AND CARD GAMES</h2>
                        <p>So, grab your favorite game, gather your companions, and let the good times roll. The best memories are often made around a table filled with laughter and a few well-played cards.</p>
                    </div>
            
                    <div class="text-container">
                        <h2>HALF BASKETBALL COURT</h2>
                        <p>Grab your sneakers, warm up that shooting hand, and head over to the court. Let's make some slam-dunk memories together! </p>
                    </div>                  
           
                    <div class="text-container">
                        <h2>JOGGING PATH/BIKE TRAIL</h2>
                        <p>Our jogging path and bike trail wind their way through lush greenery, providing a scenic route for your daily run or leisurely bike ride.</p>
                    </div>
           
                    <div class="text-container">
                        <h2>OUTDOOR SHOWER AREA</h2>
                        <p>After a refreshing jog or bike ride, there's nothing quite like an outdoor shower to wash off the day's adventure. Our outdoor shower area offers a convenient and invigorating way to freshen up. </p>
                    </div>

                    <div class="text-container">
                        <h2>OUTDOOR KITCHEN WITH GAS STOVE, REFRIGERATOR, FREEZER, GRILL, AND WATER DISPENSER
                    </h2>
                        <p>Now, let's talk about the heart of outdoor gatherings – our fantastic outdoor kitchen! Equipped with a gas stove, refrigerator, freezer, grill, and water dispenser, it's a culinary playground for those who love to grill up a storm or prepare delicious al fresco meals. Fire up the grill for some BBQ action, chill your beverages, and savor the joy of cooking in the open air. </p>
                    </div>

        </div>   

    </div>


</section>

<footer>
<?php include './footer.php'; ?>  
</footer>

</body>
</html>