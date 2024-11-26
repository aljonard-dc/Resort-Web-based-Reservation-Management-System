<?php
include './db_connection.php';

$termsandconditionText = ""; // Initialize the variable
$messageUpdate = ""; // Initialize the update message

// Fetch the data from the database
$sql = "SELECT `description` FROM termsandconditions_tbl WHERE id = 1";
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $termsandconditionText = $row['description'];
} else {
    // Redirect to the same page in case of an error
    header("Location: ./edittermsandconditions.php");
    exit(); // Make sure to exit to avoid further execution
}


if(isset($_POST['update-btn'])){
    $termsandconditionUpdate = mysqli_real_escape_string($conn, $_POST['termsandconditionText']);

    // Use UPDATE statement to modify existing record
    $sql ="UPDATE termsandconditions_tbl SET `description`='$termsandconditionUpdate' WHERE id=1";
    mysqli_query($conn, $sql);

    // Check if the query was successful
    if(mysqli_affected_rows($conn) > 0) {
        $messageUpdate = "Terms and Conditions updated successfully!";
    } else {
        // Redirect to the same page in case of an error
    header("Location: ./edittermsandconditions.php");
    exit(); // Make sure to exit to avoid further execution
    }
}

mysqli_close($conn); // Close the database connection after all operations
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/edittermandconditions.css">
    <title>Edit Terms And Conditions</title>
</head>
<body>
<section class="terCon">
    <div class="form-container">
        <h1>NATURA VERDE FARM AND RESORT PRIVATE RESORT TERMS AND CONDITIONS:</h1>
        <form action="" method="POST">
            <textarea name="termsandconditionText" class="message-inputbox" required oninput="autoExpand(this)" placeholder="Write The Message" required><?php echo htmlspecialchars($termsandconditionText); ?></textarea>
            <input type="submit" name="update-btn" class="update-btn" value="UPDATE">
        </form>
        
        <!-- Display the update message if set -->
        <?php if (!empty($messageUpdate)) : ?>
            <div class="update-message"><?php echo $messageUpdate; ?></div>
        <?php endif; ?>
    </div>
</section>
</body>
<script>
    function autoExpand(element) {
        element.style.height = "500px"; // Set a default height
        element.style.height = (element.scrollHeight) + "px";
    }
</script>
</html>
