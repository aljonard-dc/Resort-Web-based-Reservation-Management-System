<?php


// After sending the verification email and inserting the user into the database
$_SESSION['signup_complete'] = true;

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

if (isset($_POST["signup"])){
    $firstname = $_POST["firstname"];   
    $middlename = $_POST["middlename"];  
    $lastname = $_POST["lastname"];  
    $age = $_POST["age"];  
    $email = $_POST["email"]; 
    $phonenumber = $_POST["phonenumber"];
    $password = $_POST["password"];
    $gender = $_POST["gender"];

//Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
/*   $mail = new PHPMailer();
    $mail->IsSMTP();*/
    try {
        //Enable verbose debug output
        $mail->SMTPDebug = 0; //SMTP::DEBUG_SERVER;
        //Send using SMTP
        $mail->isSMTP();
       // $mail->SMTPSecure = "tls";
        //Set the SMTP server to send through
        $mail->Host = 'smtp.gmail.com';
        //Enable SMTP authentication
        $mail->SMTPAuth = true;
        //SMTP username
        $mail->Username = 'naturaverdefarm2023@gmail.com';
        //SMTP password
        $mail->Password = '';
        //Enable TLS encryption;
        $mail->SMTPSecure = PHPMailer:: ENCRYPTION_STARTTLS;
        //TCP port to connect to, use 465 for PHPMailer:: ENCRYPTION_SMTPS above
        $mail->Port = 587;
        //Recipients
        $mail->setFrom('naturaverdefarm2023@gmail.com', 'Natura Verde');
        //Set email format to HTML
        $mail->isHTML (true);
        //Add a recipient
        $mail->addAddress($email, $firstname);
  
        // Check if the email already exists in the database
        $conn = mysqli_connect("localhost", "u403614883_root", "Naturaverde2023!", "u403614883_naturaverde_db");
        $emailExistsQuery = "SELECT * FROM `users` WHERE email = '" . mysqli_real_escape_string($conn, $email) . "'";
        $result = mysqli_query($conn, $emailExistsQuery);

        if (mysqli_num_rows($result) > 0) {
            // Email already exists, handle the error
            $emailError = "Email already exists! Try again.";
        } else {
            $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
            $mail->Subject = 'Email Verification';
            $mail->Body = 
            ' <pre style="font-size:1.1rem; font-family: Arial, Helvetica, sans-serif; color:black;">Dear <b style="font-size: 20px;text-transform:uppercase;"> ' . $firstname . ' </b>,
            
            Thank you for signing up with Natura Verde Farm and Private Resort! To complete your registration and verify your email address, 
            please use the following verification code:
                <b style="font-size: 25px;">
            Verification Code: ' . $verification_code . ' 
            </b>
            
            Please enter this code on our website or app to confirm your email address. This step helps us ensure the security of your account.
            If you did not request this code, please disregard this email.
           
            Thank you for choosing Natura Verde Farm and Private Resort. We look forward to having you as a part of our community!
           
            Sincerely,
            <b>The Natura Verde Farm and Private Resort Team</b></pre>';
            

            $mail->send();
            // echo 'Message has been sent';


            $encrypted_password = password_hash ($password, PASSWORD_DEFAULT);
            // connect with database
            $conn = mysqli_connect("localhost", "u403614883_root","Naturaverde2023!", "u403614883_naturaverde_db");
            // insert in users table
           
            $sql = "INSERT INTO `users` (`firstname`,`middlename`,`lastname`,`age`, `email`,`phonenumber`, `password`,`gender`,`verification_code`,`reset_code`,`code_expire`,`email_verified_at`) 
            VALUES ('". $firstname ."','". $middlename ."','". $lastname ."','". $age ."','". $email ."','". $phonenumber ."','". $encrypted_password ."','". $gender ."','". $verification_code ."',0,0,NULL)";
            mysqli_query($conn, $sql);
            header("Location: emailverification.php?email=" . $email);
            exit();
        }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
}     
            
?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel = "icon" href = "./assets/logo/NaturaVerdeLogo.png" type = "image/x-icon"><title>Natura Verde Farm and Private Resort</title>
    <link rel="stylesheet" href="css/signup.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
   </head>


<body>

<header>
<?php include('header_unauthenticated.php') ?> 
</header>

<section class="signupsection">
    <div class="container">
    <button class="back-button" onclick="goBack()"><i class="fa-solid fa-arrow-left"></i></button>
        <?php if (isset ($_GET['error'])) { ?>
        <р class="error">
            <?php echo $_GET(['error']); ?>
        </p>
        <?php } ?>
        <?php if (isset ($_GET['success'])) { ?>
        <р class="error">
            <?php echo $_GET(['success']); ?>
        </p>
        <?php } ?>
            <div class="signup-title">
              <h3> Sign Up Information</h3>
            </div> 
            <div class="signup-desc">
                <p>To get started, kindly fill in this form to create an account. Your provided details will enable us to personalize your experience.</p>
            </div> 

            <div class="progress-tracker">
                <img src="./assets/ProgressTracker/pt1.png" alt="pt1 image">
            </div>
                <form method="POST">
                        <div class="user-details">

                                <div class="input-box">
                                    <span class="details">First Name</span> <br>
                                    <input type="text" placeholder="Enter your first name" name="firstname" id="firstname" required oninput="capitalizeInput(this)">
                                </div>
                                <div class="input-box">
                                    <span class="details">Middle Name                 | Optional</span> <br>
                                    <input type="text" placeholder="Enter your middlename " name="middlename" id="middlename" oninput="capitalizeInput(this)">
                                </div>
                                <div class="input-box">
                                    <span class="details">Last Name</span> <br>
                                    <input type="text" placeholder="Enter your last name" name="lastname" id="lastname"  required oninput="capitalizeInput(this)">
                                </div>
                                 
                            <div class="input-box">
                                <span class="details">Age</span><br>
                                <input type="text" placeholder="Enter your Age " name="age" required pattern="[0-9]{2}" title="Please enter a valid age" maxlength="2" oninput="validateAge()">
                                <span id="age-error" style="color: red;"></span> 
                            </div>
                        
                            <div class="input-box">
                                <span class="details">Email Address</span><br>
                                <?php if (isset($emailError)) { ?>
                                    <div style="text-align: center; color: red;"><?php echo $emailError; ?></div>
                                <?php } ?>
                                <input type="email" placeholder="Enter Your Email Address" name="email" required>
                            </div>
                            
                            <div class="input-box">
                                <span class="details">Phone Number</span><br>
                                <input type="text" placeholder="Enter your number (Ex: 09123456789)" name="phonenumber" required pattern="[0-9]{11}" title="Please enter a valid 11-digit phone number" maxlength="11" oninput="validatePhoneNumber()">
                                <span id="phonenumber-error" style="color: red;"></span> 
                            </div>
                            <div class="input-box">
                                
                                <span class="details">Password</span><br>
                                <div class="password-pos">
                                <input type="password" id="password" placeholder="Enter your password" name="password" required>
                                <img src="assets/icons/eye-close.png" onclick="pass()" class="pass-icon" id="pass-icon">
                                </div>
                            </div>

                            <div class="gender-details">
                                
                                <label>Gender:</label>
                                <input class="rad" type="radio" name="gender" value="Male" required> <label>Male</label>         
                                <input class="rad"type="radio" name="gender" value="Female" required> <label>Female</label>
                           
                            </div>
                            <div class="terms">

                            </div>

                            <div class="button">
                                <input type="submit" name="signup" id="submitbtn" value="Sign Up" onclick="checkPhoneNumber()" onclick="checkAge()">
                            </div>


                            <div class="already">
                                <p>Already have an account? <a href="./user-login.php" style="text-decoration:none; font-weight:bold; color:black;">Log in</a></p>

                            </div>
                </form>
               
    </div>    
</section>

<footer>
    <?php include './footer.php'; ?>
</footer>

</body>
<script src="./javascript/signup.js"> </script>
<script>
    function goBack() {
      window.history.back();
    }
    </script>

</html>
