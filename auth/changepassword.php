<?php
session_start();

// Check if the session variables are set
if (!isset($_SESSION["id_session"]) || !isset($_SESSION["firstname_session"]) || !isset($_SESSION["middlename_session"]) || !isset($_SESSION["lastname_session"]) || !isset($_SESSION["email_session"]) || !isset($_SESSION["phonenumber_session"]) || !isset($_SESSION["password_session"])) {
    header("Location: ../user-login.php"); // Redirect to login if the session variables are not set
    exit();
}

// Define error variables
$passwordUpdated = "";
$errorUpdate = "";
$wrongpassword = "";

if (isset($_POST["save"])) {
    $newpassword = $_POST["newpassword"];
    $retypepassword = $_POST["retypepassword"];
    $confirmationpassword = $_POST["password"];
    
    // Establish a database connection
    $conn = mysqli_connect("localhost", "u403614883_root", "Naturaverde2023!", "u403614883_naturaverde_db");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the hashed password from the session
    $hashedPasswordFromSession = $_SESSION["password_session"];

    // Check if the confirmation password matches the hashed session password
    if (password_verify($confirmationpassword, $hashedPasswordFromSession)) {
        // Check if the new password and retype password match
        if ($newpassword === $retypepassword) {
            // Hash the new password
            $hashedNewPassword = password_hash($newpassword, PASSWORD_DEFAULT);

            // Update the password in the database
            $sql = "UPDATE users SET password='$hashedNewPassword' WHERE id='{$_SESSION["id_session"]}'";

            if ($conn->query($sql) === TRUE) {
                $_SESSION["password_session"] = $hashedNewPassword;
                $passwordUpdated = "Password updated successfully!";
            } else {
                $errorUpdate = "Error updating password: " . $conn->error;
            }
        } else {
            $wrongpassword = "New password and retype password do not match.";
        }
    } else {
        $wrongpassword = "Confirmation password does not match.";
    }

    // Close the database connection
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "icon" href = "../assets/logo/NaturaVerdeLogo.png" type = "image/x-icon">
    <title>Natura Verde Farm and Private Resort</title>
    <link rel="stylesheet" href="css/changepass.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
</head>

<body>

<header>
    <?php include('./header_authenticated.php') ?>  
</header>

<section class="changepass-sec">

<div class="changepass-container">
<button class="back-button" onclick="goBack()"><i class="fa-solid fa-arrow-left"></i></button>
    <div class="title-container">
        <h2>Change Password</h2>
    </div>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $_SESSION['id_session']; ?>">
        <div class="password-pos">
            <span>Current Password</span><br>
            <input type="password" id="currentpassword" name="password" placeholder="Enter your current password" required><br>
            <img src="../assets/icons/eye-close.png" onclick="togglePassword('currentpassword')" class="pass-icon">
        </div>
        <div class="password-pos">
            <span>New Password</span><br>
            <input type="password" id="newpassword" name="newpassword" placeholder="Enter your new password" required><br>
            <img src="../assets/icons/eye-close.png" onclick="togglePassword('newpassword')" class="pass-icon">
        </div>
        <div class="password-pos">
            <span>Re-type New Password</span><br>
            <input type="password" id="retypepassword" name="retypepassword" placeholder="Re-type your new password" required><br>
            <img src="../assets/icons/eye-close.png" onclick="togglePassword('retypepassword')" class="pass-icon">
        </div>
     
        <div class="error-message" >
                     <?php if (isset($passwordUpdated)) { ?>
                        <div style="text-align: center; color: green;"><?php echo $passwordUpdated; ?></div>
                    <?php } ?>
                    <?php if (isset($errorUpdate)) { ?>
                        <div style="text-align: center; color: red;"><?php echo $errorUpdate; ?></div>
                    <?php } ?>
                    <?php if (isset($wrongpassword)) { ?>
                        <div style="text-align: center; color: red;"><?php echo $wrongpassword; ?></div>
                    <?php } ?>
        </div><br>

        <div class="btn-pos">
            <input type="submit" class="update-btn" name="save" value="Update Password">
        </div>
    </form>
</div>
</section>

<footer>
<?php include './footer.php'; ?>  
</footer>

</body>

</html>
<script>
function togglePassword(inputId) {
    var passwordInput = document.getElementById(inputId);
    var passIcon = document.querySelector('[onclick="togglePassword(\'' + inputId + '\')"]');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        passIcon.src = '../assets/icons/eye-open.png';
    } else {
        passwordInput.type = 'password';
        passIcon.src = '../assets/icons/eye-close.png';
    }
}

    function goBack() {
      window.history.back();
    }
 
</script>
