<?php



require_once 'db_connection.php';
// Start a PHP session
session_start();
// Check if the first name and last name session variables are set
if (!isset($_SESSION["firstname_session"]) || !isset($_SESSION["middlename_session"]) || !isset($_SESSION["lastname_session"]) || !isset($_SESSION["email_session"]) || !isset($_SESSION["phonenumber_session"])) {
    header("Location: ../user-login.php"); // Redirect to login if the session variables are not set
    exit();
}


              $query = "SELECT * FROM package_prices WHERE price_id = 1";
              $result = $conn->query($query);
              $row = $result->fetch_assoc();
              $dayTour = $row["package_price"];
              $formattedDayTour = number_format($dayTour);

              $query2 = "SELECT * FROM package_time WHERE id = 1";
              $result2 = $conn->query($query2);
              $row2 = $result2->fetch_assoc();
              $dcheck_in = $row2["check_in_time"];
              $checkInTime = date("h:i A", strtotime($dcheck_in));
              $dcheck_out = $row2["check_out_time"];
              $checkOutTime = date("h:i A", strtotime($dcheck_out));

              $query3 = "SELECT * FROM package_prices WHERE price_id = 12";
              $result3 = $conn->query($query3);
              $row3 = $result3->fetch_assoc();
              $dayMaxPax = $row3["package_price"];
              $formattedDayMaxPax = number_format($dayMaxPax);

              $query4 = "SELECT * FROM package_prices WHERE price_id = 2";
              $result4 = $conn->query($query4);
              $row4 = $result4->fetch_assoc();
              $nightTour = $row4["package_price"];
              $formattedNightTour = number_format($nightTour);

              $query5 = "SELECT * FROM package_time WHERE id = 2";
              $result5 = $conn->query($query5);
              $row5 = $result5->fetch_assoc();
              $ncheck_in = $row5["check_in_time"];
              $ncheckInTime = date("h:i A", strtotime($ncheck_in));
              $ncheck_out = $row5["check_out_time"];
              $ncheckOutTime = date("h:i A", strtotime($ncheck_out));

              $query6 = "SELECT * FROM package_prices WHERE price_id = 13";
              $result6 = $conn->query($query6);
              $row6 = $result6->fetch_assoc();
              $nMaxPax = $row6["package_price"];
              $formattedNMaxPax = number_format($nMaxPax);

              $query7 = "SELECT * FROM package_time WHERE id = 3";
              $result7 = $conn->query($query7);
              $row7 = $result7->fetch_assoc();
              $ocheck_in = $row7["check_in_time"];
              $ocheckInTime = date("h:i A", strtotime($ocheck_in));
              $ocheck_out = $row7["check_out_time"];
              $ocheckOutTime = date("h:i A", strtotime($ocheck_out));



              //bago kong lagay
              $query8 = "SELECT * FROM package_prices WHERE price_id = 10";
              $result8 = $conn->query($query8);
              $row8 = $result8->fetch_assoc();
              $dayExcess = $row8["package_price"];
              $formattedDayExcess = number_format($dayExcess);

              $query9 = "SELECT * FROM package_prices WHERE price_id = 14";
              $result9 = $conn->query($query9);
              $row9 = $result9->fetch_assoc();
              $nightExcess = $row9["package_price"];
              $formattedNightExcess = number_format($nightExcess);

              $query10 = "SELECT * FROM package_prices WHERE price_id = 11";
              $result10 = $conn->query($query10);
              $row10 = $result10->fetch_assoc();
              $overnightExcess = $row10["package_price"];
              $formattedOvernightExcess = number_format($overnightExcess);
              
              
              $confirmationId = $_SESSION["id_session"];

$sql = "SELECT * FROM information_details AS id
JOIN confirmation AS c ON id.package_id = c.package_id
WHERE id.package_id = (SELECT MAX(package_id) FROM payment) 
AND id.id = '$confirmationId' 
AND c.status = 'Confirmed' 
ORDER BY id.client_id DESC 
LIMIT 1";
$result = $conn->query($sql);

// Retrieve details and packages information
$sql2 = "SELECT * FROM details_and_packages AS dp
JOIN confirmation AS c ON dp.package_id = c.package_id
WHERE dp.package_id=(SELECT MAX(package_id) FROM payment)
AND dp.id='$confirmationId'
AND c.status = 'Confirmed'
ORDER BY dp.package_id DESC LIMIT 1";
$result2 = $conn->query($sql2);

if ($result->num_rows > 0 && $result2->num_rows > 0) {
    $row = $result->fetch_assoc();
    $row2 = $result2->fetch_assoc();

    // Get the user ID from the session
$user_id = $_SESSION['id_session'];
$checkInDate = new DateTime($row2["check_in_date_and_time"]);
$currentDate = new DateTime();
$dateDifference = $currentDate->diff($checkInDate);

// Get the current real-time date
$currentDates = date('Y-m-d');
$threeDaysAgo = date('Y-m-d', strtotime($currentDates . ' - 3 days'));
 // Format as 'YYYY-MM-DD'

$query = "SELECT COUNT(*) as count FROM confirmation c
          JOIN details_and_packages dp ON c.id = dp.id
          WHERE c.id = $user_id 
          AND DATE(dp.check_in_date_and_time) > '$currentDates' 
          AND c.status = 'Confirmed'";


$result = mysqli_query($conn, $query);

if ($dateDifference->days >= $currentDate) {

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];

    if ($count > 0) {
        // Redirect to after.php if conditions are met
        header('Location: after.php');
        exit();
    }
}

} else {
    header('Location: amenities_new.php'); // Replace with the URL of your after.php page

}
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel = "icon" href = "../assets/logo/NaturaVerdeLogo.png" type = "image/x-icon"><title>Natura Verde Farm and Private Resort</title>
    <link rel="stylesheet" href="css/packages.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lucide@1.4.2/icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
<header>
    <?php include('./header_authenticated.php') ?>  
</header>

<div class="package-sec">

    <div class="packages-con">
            
            <div class="heading">
                <h1 class="animate__animated animate__bounceInLeft">Feel free to pick the package that suits your preferences!</h1>
                <h4 class="animate__animated animate__bounceInLeft"><i class="fa-solid fa-comment-dots"></i>&nbsp;Which one are you interested in selecting?</h4>
            </div>
            <div class="image-packages animate__animated animate__bounceInLeft">
                <div class="daytour" data-popup="daytour"><img src="../resources/Packages/daytour.jpg" alt="">DAY TOUR</div>
                <div class="nighttour" data-popup="nightour"><img src="../resources/Packages/nighttour.jpg" alt="">NIGHT TOUR</div>
                <div class="overnight" data-popup="overnight"><img src="../resources/Packages/overnight.jpg" alt="">OVERNIGHT PACKAGES</div> 
            </div>
            
            <div class="overlay"></div>        
                <div class="daytour-popup-container" id="daytour">
                    
                <a class="close-btn" id="closeDaytourBtn" data-popup="daytour">&times;</a><br>

                    <div class="title-box">
                            <!-- <i data-lucide-name="sun-moon"></i> -->
                        <h2><i class="fa-solid fa-sun"></i>&nbsp;DAY TOUR&nbsp;|&nbsp; &nbsp; &nbsp; &nbsp; <?php echo "₱$formattedDayTour"; ?></php></h2>
                    </div> <br><br>

                    <div class="time-box">
                        <h2> Check In <?php echo "$checkInTime"; ?> | Check Out <?php echo "$checkOutTime"; ?> <br>
                        <?php echo "$formattedDayMaxPax"; ?> PERSONS AND BELOW
                        </h2>
                    </div>

                    <div class="list-container">
<div class="inclusions-list"> <pre>
<p> Rate Inclusions:</p>
      <!-- bago kong lagay -->
<?php
                     require_once './db_connection.php';

                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // SQL query to retrieve room data
                        $sql = "SELECT * FROM package_inclusions WHERE inclusion_for LIKE '%day%' ORDER BY inclusion_id";
                        
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();

                        // Initialize a counter to ensure unique IDs
                        $counter = 0;

                        // Fetch and display the room options
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            
                            $inclusionName = $row['inclusion_name'];
                            $inclusionFor = $row['inclusion_for'];


                            echo "✅ $inclusionName <br>";
                            
                            // Increment the counter to ensure unique IDs
                            $counter++;
                        }
                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }

                    $conn = null;
                    ?>
            
Note:
✨ Exceeding guests are allowed for P<?php echo "$formattedDayExcess"; ?>/head. 
✨ No corkage for outside food/drinks. 
✨ Rates are subject to change without prior notice </pre> 
</div>



                    </div>
                    <a href="dayTourOption_step3.php" class="booknow">Book Now</a>
                </div> 
    
            <div class="overlay"></div>        
                <div class="nighttour-popup-container" id="nighttour">
                    
                <a class="close-btn" id="closeNighttourBtn" data-popup="nighttour">&times;</a><br>

                <div class="title-box">
                            <!-- <i data-lucide-name="sun-moon"></i> -->
                        <h2><i class="fa-solid fa-moon"></i>&nbsp;NIGHT TOUR&nbsp;| &nbsp; &nbsp; <?php echo "₱$formattedNightTour"; ?></h2>
                        
                    </div> <br><br>

                    <div class="time-box">
                        <h2> Check In <?php echo "$ncheckInTime"; ?> | Check Out <?php echo "$ncheckOutTime"; ?><br>
                        <?php echo "$formattedNMaxPax"; ?> PERSONS AND BELOW
                        </h2>
                    </div>


                    <div class="list-container">
<div class="inclusions-list"> <pre>
<p> Rate Inclusions:</p>
    <!-- bago kong lagay -->
<?php
                     require_once './db_connection.php';

                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // SQL query to retrieve room data
                        $sql = "SELECT * FROM package_inclusions WHERE inclusion_for LIKE '%night%' ORDER BY inclusion_id";
                        
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();

                        // Initialize a counter to ensure unique IDs
                        $counter = 0;

                        // Fetch and display the room options
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            
                            $inclusionName = $row['inclusion_name'];
                            $inclusionFor = $row['inclusion_for'];


                            echo "✅ $inclusionName <br>";
                            
                            // Increment the counter to ensure unique IDs
                            $counter++;
                        }
                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }

                    $conn = null;
                    ?>
            
Note:
✨ Exceeding guests are allowed for P<?php echo "$formattedNightExcess"; ?>/head. 
✨ No corkage for outside food/drinks. 
✨ Rates are subject to change without prior notice </pre> 
</div>



                    </div>
                    <a href="nightTourOption_step3.php" class="booknow">Book Now</a>
                </div>

                <div class="overlay"></div>        
                    <div class="overnightinclusions-container" id="overnight">
                        
                        <a class="close-btn" id="closeOvernightBtn" data-popup="overnight">&times;</a><br>

                        <div class="title">
                            <p><i class="fa-solid fa-star-and-crescent"></i>&nbsp;OVERNIGHT PACKAGES</p>
                        </div> 
    
                        <div class="time">
                            <p> Check In <?php echo "$ocheckInTime"; ?> | Check Out <?php echo "$ocheckOutTime"; ?> <br> 25 PERSONS AND BELOW</p>
                        </div>

                        <div class="rooms">
                        <?php
                     require_once './db_connection.php';

                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // SQL query to retrieve room data
                        $sql = "SELECT * FROM package_prices WHERE package_type = 'overnight' AND attribute = 'main room' ORDER BY package_price";
                        
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();

                        // Initialize a counter to ensure unique IDs
                        $counter = 0;

                        // Fetch and display the room options
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $roomID = $row['price_id'];
                            $roomName = $row['package_name'];
                            $roomPrice = $row['package_price'];
                            $maxCapacity = $row['max_pax'];
                            $formattedRoomPrice = number_format($roomPrice);


                            echo '<p><label for="room-' . $roomID . '-' . $counter . '">' . $roomName . ' (up to ' . $maxCapacity . ' pax) - ₱' . $formattedRoomPrice . '</label></p>';
                            
                            // Increment the counter to ensure unique IDs
                            $counter++;
                        }
                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }

                    $conn = null;
                    ?>
                        </div> 

                        <div class="list-container">
<div class="inclusions-list"> <pre>
<p> Rate Inclusions:</p>
                     <!-- bago kong lagay -->
<?php
                     require_once './db_connection.php';

                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // SQL query to retrieve room data
                        $sql = "SELECT * FROM package_inclusions WHERE inclusion_for LIKE '%overnight%' ORDER BY inclusion_id";
                        
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();

                        // Initialize a counter to ensure unique IDs
                        $counter = 0;

                        // Fetch and display the room options
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            
                            $inclusionName = $row['inclusion_name'];
                            $inclusionFor = $row['inclusion_for'];


                            echo "✅ $inclusionName <br>";
                            
                            // Increment the counter to ensure unique IDs
                            $counter++;
                        }
                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }

                    $conn = null;
                    ?>
                
    Note:
    ✨ Exceeding guests are allowed for P<?php echo "$formattedOvernightExcess"; ?>/head.
    ✨ No corkage for outside food/drinks. 
    ✨ Rates are subject to change without prior notice </pre> 
</div>




                        </div>
                        <a href="overnightOption_step3.php" class="booknow">Book Now</a>
                    </div> 
                
    </div>





</div>



<footer>
<?php include './footer.php'; ?>  
</footer>


<script>
document.addEventListener("DOMContentLoaded", function() {
  var items = document.querySelectorAll('.overnight');
  var overlay = document.querySelector(".overlay");
  var overnight = document.getElementById("overnight");
  var closeOvernightBtn = document.getElementById("closeOvernightBtn");

  items.forEach(function(item) {
    item.addEventListener("click", function() {
      // Display the "OVERNIGHT PACKAGES" popup when an item is clicked
      overnight.style.display = "block";
      overlay.style.display = "block";
    });
  });

  closeOvernightBtn.addEventListener("click", function() {
    overnight.style.display = "none";
    overlay.style.display = "none";
  });
});

document.addEventListener("DOMContentLoaded", function() {
  var items = document.querySelectorAll('.daytour');
  var overlay = document.querySelector(".overlay");
  var daytour = document.getElementById("daytour");
  var closeDaytourBtn = document.getElementById("closeDaytourBtn");

  items.forEach(function(item) {
    item.addEventListener("click", function() {
      // Display the "OVERNIGHT PACKAGES" popup when an item is clicked
      daytour.style.display = "block";
      overlay.style.display = "block";
    });
  });

  closeDaytourBtn.addEventListener("click", function() {
    daytour.style.display = "none";
    overlay.style.display = "none";
  });
});

document.addEventListener("DOMContentLoaded", function() {
  var items = document.querySelectorAll('.nighttour');
  var overlay = document.querySelector(".overlay");
  var nighttour = document.getElementById("nighttour");
  var closeNighttourBtn = document.getElementById("closeNighttourBtn");

  items.forEach(function(item) {
    item.addEventListener("click", function() {
      // Display the "OVERNIGHT PACKAGES" popup when an item is clicked
      nighttour.style.display = "block";
      overlay.style.display = "block";
    });
  });

  closeNighttourBtn.addEventListener("click", function() {
    nighttour.style.display = "none";
    overlay.style.display = "none";
  });
});





    </script>
</body>

</html>