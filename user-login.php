<?php
session_start();
include './db_connection.php';
if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $conn = mysqli_connect("localhost", "u403614883_root", "Naturaverde2023!", "u403614883_naturaverde_db");

    $sql = "SELECT * FROM users WHERE email='" . $email . "'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 0) {
        $emailError = "<span style='color: red;'>Email not found!</span>";
    } else {
        $users = mysqli_fetch_object($result);

        if (!password_verify($password, $users->password)) {
            $passwordError = "<span style='color: red;'>Password is incorrect!</span>";
        } elseif ($users->email_verified_at == null) {
            $emailVerificationError = "Please verify your Email <a href='emailverification.php?email=" . $_SESSION["email_session"] = $users->email . "'>from here</a>"; 
         
        } else {
            $_SESSION["id_session"] = $users->id;    
            $_SESSION["firstname_session"] = $users->firstname;
            $_SESSION["middlename_session"] = $users->middlename;
            $_SESSION["lastname_session"] = $users->lastname;
            $_SESSION["age_session"] = $users->age;
            $_SESSION["email_session"] = $users->email;
            $_SESSION["phonenumber_session"] = $users->phonenumber;
            $_SESSION["password_session"] = $users->password;
           
         
           
            //in $users-> - change it to whichever one you want to display
            header("Location: ./auth/packages.php");
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel = "icon" href = "./assets/logo/NaturaVerdeLogo.png" type = "image/x-icon"><title>Natura Verde Farm and Private Resort</title>
    <link rel="stylesheet" href="css/user-login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
</head>

<body>
<header>
<?php include('header_unauthenticated.php') ?> 
</header>
<section class="login-sec">
    <div class="container">
    <button class="back-button" onclick="goBack()"><i class="fa-solid fa-arrow-left"></i></button>
        <div class="title">
            <h3> Log In your Account</h3>
        </div> <br>
        <div class="details">
            <form method="post">
                <span class="details">Email</span><br>
                <input type="email" name="email" placeholder="Enter your Email" required><br>
                    <?php if (isset($emailError)) { ?>
                        <div class="error"><?php echo $emailError; ?></div>
                    <?php } ?><br>
                <span class="details">Password</span><br>
                <div class="password-pos">
                    <input type="password" id="password" name="password" placeholder="Enter your Password" required>
                    <img src="assets/icons/eye-close.png" onclick="pass()" class="pass-icon" id="pass-icon">
                </div>
                <?php if (isset($passwordError)) { ?>
                    <div class="error"><?php echo $passwordError; ?></div>
                <?php } ?>

                <div class="forgot-txt">
                    <p><a href="./forgot.php">Forgot Password?</a></p>
                </div>
                <div class="btn-pos">
                    <input type="submit" class="login-btn" name="login" value="Log In">
                </div>
                    <?php if (isset($emailVerificationError)) { ?>
                        <div class="error" style="margin-top:15px;"><?php echo $emailVerificationError; ?></div>
                    <?php } ?>
                <div class="already">
                    <p>Don't have an account? <a href="./signup.php">Sign Up</a></p>
                </div>
            </form>
        </div><br>
    </div>
</section>
<footer>
    <?php include './footer.php'; ?>
</footer>
</body>
<script src="./javascript/showandhidepassword.js"> </script>

<script>
    function goBack() {
      window.history.back();
    }
</script>
</html>