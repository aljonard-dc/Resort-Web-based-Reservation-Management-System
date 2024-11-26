<?php
 
if (isset($_POST["verify_email"])) {
    $email = $_POST["email"];
    $verification_code = $_POST["verification_code"];
    $conn = mysqli_connect("localhost", "u403614883_root", "Naturaverde2023!", "u403614883_naturaverde_db");

    // Check if a record with the provided verification code exists
    $codeExistsQuery = "SELECT * FROM users WHERE verification_code = '" . mysqli_real_escape_string($conn, $verification_code) . "'";
    $resultCode = mysqli_query($conn, $codeExistsQuery);

    if (mysqli_num_rows($resultCode) > 0) {
        // Update the email verification status only if the verification code exists
        $sql = "UPDATE users SET email_verified_at = NOW() WHERE email = '" . $email . "' AND verification_code = '" . $verification_code . "'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_affected_rows($conn) > 0) {
            header("Location: login.php?success=Your email has been verified successfully");
            exit();
        } else {
            $error = "Failed to verify email. Please try again.";
        }
    } else {
        $error = "Wrong verification code. Please try again.";
    }
}
?>

<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8">
    <link rel = "icon" href = "./assets/logo/NaturaVerdeLogo.png" type = "image/x-icon"><title>Natura Verde Farm and Private Resort</title>
    <link rel="stylesheet" href="css/emailver.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
   </head>

  
<body>

<header>
<?php include('header_unauthenticated.php') ?> 
</header>

    <section class="emailver-sec">
        <div class="container">
        <button class="back-button" onclick="goBack()"><i class="fa-solid fa-arrow-left"></i></button>
            <div class="title">
                <h3> Email Verification</h3>
            </div> <br>
            <div class="progress-tracker">
                <img src="./assets/ProgressTracker/pt2.png" alt="pt1 image">
            </div>
            <div class="details">
                <p> We sent you an email with a code. Enter the email verification code here.</p> 
                      
                    <form method="POST">
                        <div class="textbox-pos"></div>
                       <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>" id="email" required>
                                 <?php if (isset($error)) { ?>
                                    <div style="text-align: center; color: red; margin-bottom:10px;"><?php echo $error; ?></div>
                                <?php } ?>
                                <input type="text" class="codetxtbox" name="verification_code" id="verification-code" placeholder="Enter Verification Code Ex:123456" 
                                required pattern="[0-9]{6}" title="Please enter a valid 6-digit Verification Code" maxlength="6" oninput="validateVerificationCode()">
                                <span id="verificationcode-error" style="color: red;"></span> <!-- Error message indicator -->

                        </div>
                        <div class="btn-pos">
                            <input type="submit" name="verify_email" class="submitbtn" value="Submit Code"  onclick="checkVerificationCode()">
                        </div>
                    </form>
            </div><br>
       
        </div>
    </section>

    <footer>
    <?php include './footer.php'; ?>
</footer>

</body>
<script>
    function validateVerificationCode() {
        var verificationCodeInput = document.getElementById("verification-code");
        var verificationCode = verificationCodeInput.value;

        // Remove any non-numeric characters from the input
        verificationCode = verificationCode.replace(/\D/g, '');

        // Update the input field value with the cleaned verification code
        verificationCodeInput.value = verificationCode;

        checkVerificationCode(); // Call the function to check verification code after cleaning
    }

    function checkVerificationCode() {
        var verificationCodeInput = document.getElementById("verification-code");
        var verificationCodeError = document.getElementById("verificationcode-error");
        var verificationCode = verificationCodeInput.value;

        // Check if the verification code is exactly 6 digits long and contains only numbers
        if (/^\d{6}$/.test(verificationCode)) {
            verificationCodeError.textContent = ''; // Clear any existing error message
        } else {
            verificationCodeError.textContent = 'Verification Code must be 6 digits and contain only numbers'; // Display error message
        }
    }
    
</script>

<script>
    function goBack() {
      window.history.back();
    }
    </script>


</html>