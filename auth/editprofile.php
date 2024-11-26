<?php
session_start();

// Check if the session variables are set
if (!isset($_SESSION["id_session"]) || !isset($_SESSION["firstname_session"]) || !isset($_SESSION["middlename_session"]) || !isset($_SESSION["lastname_session"]) || !isset($_SESSION["email_session"]) || !isset($_SESSION["phonenumber_session"]) || !isset($_SESSION["password_session"])) {
    header("Location: ../user-login.php"); // Redirect to login if the session variables are not set
    exit();
}

if (isset($_POST["save"])) {
    $firstname = $_POST["firstname"];
    $middlename = $_POST["middlename"];
    $lastname = $_POST["lastname"];
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
       
        $sql = "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname' WHERE id='{$_SESSION["id_session"]}'";

        if ($conn->query($sql) === TRUE) {
            // Update successful, update the session variables as well
            $_SESSION["firstname_session"] = $firstname;
            $_SESSION["middlename_session"] = $middlename;
            $_SESSION["lastname_session"] = $lastname;
           $profileUpdated =   "Profile updated successfully!";
        //    header("Location: ./home.php");
        } else {
            $errorUpdate = "Error updating profile: " . $conn->error;
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
    <link rel = "icon" href = "../assets/logo/NaturaVerdeLogo.png" type = "image/x-icon"><title>Natura Verde Farm and Private Resort</title>
    <link rel="stylesheet" href="css/editprofile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
    <script src="./javascript/showandhidepassword.js"></script>
    <script src="./javascript/editprofile.js"></script>
</head>

<body>

<header>
    <?php include('./header_authenticated.php') ?>  
</header>


<section class="editprofile-sec">
    <div class="profile-container">
    <button class="back-button" onclick="goBack()"><i class="fa-solid fa-arrow-left"></i></button>

        <div class="title-container">
            <h2>
              Profile Settings  
            </h2>
        </div>
      
            <form method="POST">

                <input type="hidden" name="id" value="<?php echo $_SESSION['id_session']; ?>">
                <span>First Name</span><br>
                <input type="text" name="firstname" id="firstname"  value="<?php echo $_SESSION['firstname_session']; ?>" oninput="capitalizeInput(this)" required>
                <span>Middle Name</span><br>
                <input type="text" name="middlename"id="middlename"  value="<?php echo $_SESSION['middlename_session'];?>" oninput="capitalizeInput(this)">
                <span>Last Name</span><br>
                <input type="text" name="lastname" id="lastname" value="<?php echo $_SESSION['lastname_session'];?>" oninput="capitalizeInput(this)" required>
                <div class="password-pos">
                    <span>Confirm Password</span><br>
                    <input type="password" id="password" name="password" placeholder="Password" required><br>
                    
                    <img src="../assets/icons/eye-close.png" onclick="pass()" class="pass-icon" id="pass-icon">
                    <?php if (isset($profileUpdated)) { ?>
                        <div style="text-align: center; color: green;"><?php echo $profileUpdated; ?></div>
                    <?php } ?>
                    <?php if (isset($errorUpdate)) { ?>
                        <div style="text-align: center; color: red;"><?php echo $errorUpdate; ?></div>
                    <?php } ?>
                    <?php if (isset($wrongpassword)) { ?>
                        <div style="text-align: center; color: red;"><?php echo $wrongpassword; ?></div>
                    <?php } ?>
                </div>
                <br>
                <div class="btn-pos">
                    <input type="submit" class="save-btn" name="save" value="Save Changes">
                </div>
           

            </form>
    </div>
</section>

<footer>
<?php include './footer.php'; ?>  
</footer>

<script>
    function goBack() {
      window.history.back();
    }
    </script>

</body>

</html>