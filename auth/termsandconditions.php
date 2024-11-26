<?php
include 'db_connection.php';

// Start a PHP session
session_start();
// Check if the first name and last name session variables are set
if (!isset($_SESSION["firstname_session"]) || !isset($_SESSION["middlename_session"]) || !isset($_SESSION["lastname_session"]) || !isset($_SESSION["email_session"]) || !isset($_SESSION["phonenumber_session"])) {
    header("Location: ../user-login.php"); // Redirect to login if the session variables are not set
    exit();

}
// Fetch the data from the database
$sql = "SELECT `description` FROM termsandconditions_tbl WHERE id = 1"; // Adjust the WHERE clause based on your table structure
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $termsandconditionText = $row['description'];
} else {
    // Handle the error if necessary
    $termsandconditionText = "Error fetching data";
}

mysqli_close($conn); // Close the database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel = "icon" href = "../assets/logo/NaturaVerdeLogo.png" type = "image/x-icon"><title>Natura Verde Farm and Private Resort</title>
   
    <link rel="stylesheet" href="css/termsandconditions.css">
</head>
<body>
<header>
<?php include('./header_authenticated.php') ?> 
</header>
    <section class="termsandconditions-sec">
    <div class="termsandconditions-container">

        <div class="termsandconditions-text">
            <h3>NATURA VERDE FARM AND RESORT PRIVATE RESORT TERMS AND CONDITIONS: </h3>
        </div>
        <div class="list-container">
               <pre> <?php echo $termsandconditionText; ?></pre>           
        </div>
    </div>

</section>
<header>
<?php include './footer.php' ?> 
</header>
</body>
</html>
