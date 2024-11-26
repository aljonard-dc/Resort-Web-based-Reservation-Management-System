<?php
require_once './db_connection.php';
session_start();
// Check if the first name and last name session variables are set
if (!isset($_SESSION["firstname_session"]) || !isset($_SESSION["middlename_session"]) || !isset($_SESSION["lastname_session"]) || !isset($_SESSION["email_session"]) || !isset($_SESSION["phonenumber_session"])) {
    header("Location: ../user-login.php"); // Redirect to login if the session variables are not set
    exit();

}

if (isset($_GET['package_id'])) {
    $packageId = $_GET['package_id'];


$confirmationId = $_SESSION['id_session'];
$sql = "SELECT email_address FROM information_details WHERE client_id=(SELECT MAX(client_id) FROM payment) AND id = '$confirmationId' ORDER BY client_id DESC LIMIT 1";
$result = mysqli_query($conn, $sql);

// Check if the query was successful and if a row was retrieved
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $retrievedEmail = $row['email_address'];

    // Close the database connection
    mysqli_close($conn);
} else {

    $retrievedEmail = ''; 
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "icon" href = "../assets/logo/NaturaVerdeLogo.png" type = "image/x-icon"><title>Natura Verde Farm and Private Resort</title>
    <style>

*{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
    }

    section {  
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 60vh;
        }

        .cancel-form {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            padding: 20px;
            text-align: center;
        }

        .cancel-form h2 {
            color: #333;
        }

        .cancel-form p {
            color: #666;
            margin: 10px 0;
        }

        .cancel-form label {
            display: block;
            margin-top: 10px;
            color: #333;
        }

        .cancel-form input[type="text"],
        .cancel-form textarea,
        .cancel-form select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
        }

        .reason-options {
            text-align: left;
        }

        .other-reason-field {
            display: none;
        }

        .cancel-button {
            width:auto; 
        background-color:#1fc724; 
        color:white; 
        font-family: Arial, sans-serif;
        text-transform: uppercase;
        font-size: 20px;
        font-weight: bold;
        padding:14px 20px; 
        margin-top:20px; 
        border:none; 
        cursor:pointer; 
        border-radius: 10px; 
        }

        .cancel-button:hover {
            background: radial-gradient(circle at -1% 57.5%, rgb(19, 170, 82) 0%, rgb(0, 102, 43) 90%);
        }

        @media screen and (max-width: 480px) {
            .cancel-form {
                max-width: 100%;
            }
        }

        .loading-popup {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 9999;
  }

  .loading-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: #fff;
    padding: 20px;
    border-radius: 5px;
    text-align: center;
  }

  .loading-spinner {
    border: 4px solid rgba(0, 0, 0, 0.3);
    border-top: 4px solid #3498db;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    animation: spin 2s linear infinite;
    margin: 0 auto 10px;
  }

  @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }

  .loading-text {
    color: #333;
  }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<body>
<header>
<?php include('./header_authenticated.php') ?> 
</header>
<section>
    <div class="cancel-form">
        <h2>CANCEL RESERVATION</h2>
        <form method="POST" action="cancel_submit.php" id="cancelForm">
        <input type="text" id="packageID" name="packageID" value="<?php echo $packageId; ?>" hidden>
            <input type="text" id="userID" name="userID" value="<?php echo $_SESSION['id_session']; ?>" hidden>
            <input type="text" id="clientName" name="clientName" value="<?php echo $_SESSION['firstname_session'] . ' ' . $_SESSION['middlename_session'] . ' ' . $_SESSION['lastname_session']; ?>" hidden>
<input type="email" id="emailAddress" name="emailAddress" required value="<?php echo htmlspecialchars($retrievedEmail); ?>" hidden>

            <label for="reason">Reason for Cancellation:</label>
            <select id="reason" name="reason" required>
                <option value="" disabled selected>Select a reason</option>
                <option value="Change of Travel Plans">Change of Travel Plans</option>
                <option value="Change of Mind">Change of Mind</option>
                <option value="Work Commitments">Work Commitments</option>
                <option value="Double Booking">Double Booking</option>
                <option value="Unforeseen Circumstances">Unforeseen Circumstances</option>
                <option value="Personal Reasons">Personal Reasons</option>
                <option value="Other">Other</option>
            </select> 

            <div class="other-reason-field">
                <label for="other_reason">Please state your reason:</label>
                <textarea id="other_reason" name="other_reason" rows="4"></textarea><br><br>
            </div>

            <button type="submit" class="cancel-button">Cancel Reservation</button>
        </form>
    </div>

    <div class="loading-popup" id="loadingPopup">
  <div class="loading-content">
    <div class="loading-spinner"></div>
    <div class="loading-text">Loading...</div>
  </div>
</div>
</section>
    <script>
    // Add this JavaScript code in your <script> section
function setupForm() {
    const reasonSelect = document.getElementById("reason");
    const otherReasonField = document.querySelector(".other-reason-field");
    const loadingPopup = document.getElementById("loadingPopup"); // Added this line

    reasonSelect.addEventListener("change", function() {
        if (reasonSelect.value === "Other") {
            otherReasonField.style.display = "block";
        } else {
            otherReasonField.style.display = "none";
        }
    });

    const form = document.getElementById("cancelForm");
    const cancelButton = document.querySelector(".cancel-button");
    const emailAddressInput = document.getElementById("emailAddress");

    form.addEventListener("submit", function(event) {
        event.preventDefault();
        loadingPopup.style.display = "block"; // Show loading popup

        var emailAddress = emailAddressInput.value;

        var emailXHR = new XMLHttpRequest();
        emailXHR.open("POST", "sendEmail_reject.php");
        emailXHR.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        emailXHR.onreadystatechange = function() {
            if (emailXHR.readyState === XMLHttpRequest.DONE) {
                if (emailXHR.status === 200) {
                    // Hide the loading popup and submit the form
                    loadingPopup.style.display = "none";
                    form.submit();
                } else {
                    alert("Error sending the rejection email.");
                    loadingPopup.style.display = "none"; // Hide the loading popup on error
                }
            }
        };
        emailXHR.send("email=" + encodeURIComponent(emailAddress));
    });
}

document.addEventListener("DOMContentLoaded", setupForm);

</script>
<footer>
<?php include './footer.php'; ?>  
</footer>

</body>
</html>
