<?php 

// Include the database connection script
require_once './db_connection.php';

session_start();
// Check if the first name and last name session variables are set
if (!isset($_SESSION["id_session"]) || !isset($_SESSION["firstname_session"]) || !isset($_SESSION["middlename_session"]) || !isset($_SESSION["lastname_session"]) || !isset($_SESSION["age_session"]) || !isset($_SESSION["email_session"]) || !isset($_SESSION["phonenumber_session"])) {
    header("Location: ../../../user-login.php "); // Redirect to login if the session variables are not set
    exit();

}


// Get the last input from the information_details entity
$sql = "SELECT * FROM details_and_packages ORDER BY package_id DESC LIMIT 1";
$result = $conn->query($sql);

if (!$result) {
    die("Error: " . $conn->error); // Handle database query error gracefully
}

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $package_id = $row["package_id"];
} else {
    echo "No results found";
}

$conn->close();
?>

<!-- Rest of your HTML and form -->



<html>
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel = "icon" href = "../images/logo.png" type = "image/x-icon"><title>Natura Verde Farm and Private Resort</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
</head>

<style>
    
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, Helvetica, sans-serif;
}


    ::-webkit-scrollbar {
    width: 8px; 
    
    }

    ::-webkit-scrollbar-thumb {
    background: #A9A9A9; 
    border-radius: 10px;
    }

    ::-webkit-scrollbar-track {
    background: #f1f1f1; 
    }

    .container {
        max-width: 600px;
        max-height: auto;
        margin: 20px auto ;
        padding: 40px 30px 20px;
        border: solid #36f90f ;
        border-radius: 10px;
    }
    
    .container p{
        font-family: Arial, sans-serif;
        font-size: 1.2rem;
        font-weight: bold;
        text-align: center;
        color: #0e4d0e;
        justify-content: center;
        margin-top: 3%;
    }


    .text-with-icon {
        display: flex;
        align-items: center;
        padding: 5px 35px;
    }

    .icon {
        font-size: 32px;
        margin-right: 10px;
    } 

    h1 {
        font-family: Arial, sans-serif;
        text-transform: uppercase;
        font-size: 32px;
        font-weight: 2px;
        text-align: center;
        color: #0e4d0e;
        justify-content: center;
    }


    form {
        padding: 20px 30px;
        border-radius: 10px;
    }

    label {
        display: block;
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
        color: #0e4d0e;
        font-family: Arial, sans-serif;
    }
    input[type="text"]{
        text-transform: uppercase;
    }
    input[type="text"], 
    input[type="number"] {
        width: 100%;
        padding: 12px 20px;
        margin-bottom: 20px;
        
        font-family: Arial, sans-serif;
        border-color:  rgba(153, 153, 153, 0.223); 
        border-radius: 10px; 
        color: #0e4d0e;
        font-size: 1.2rem;
    }

    input[type="email"] {
        width: 100%;
        padding: 12px 20px;
        margin-bottom: 20px;
        font-family: Arial, sans-serif;
        border-color:  rgba(153, 153, 153, 0.223); 
        border-radius: 10px; 
        color: black;
        font-size: 1.2rem;
    }

    input[type="text"]:focus, input[type="email"]:focus, input[type="number"]:focus {
        outline:none; 
        border-bottom-color:#006600; 
    }
    
    .button-container {
        display: flex;
        margin-top: 20px;
        justify-content: center;
    }
    .typing-text {
    font-family: Arial, sans-serif;
    font-size: 18px;
    white-space: nowrap;
    overflow: hidden;
    text-align: center; /* Center-align the text */
    width: 100%;
    animation:
    typing 3.5s steps(40, end),
    blink .75s step-end infinite;
}


.back-button{
    background: none;
      color: black;
      border: none;
      margin-right: 90%;
      padding: 10px;
      cursor: pointer;
  }

  .back-button i {
    margin-right: 5px;
  }

@keyframes typing {
    from {
        width: 0;
    }
    to {
        width: 100%;
    }
}
    #clear-button{
        width: 40%; 
        background-color:#1fc724; 
        color:white; 
        font-family: Arial, sans-serif;
        text-transform: uppercase;
        font-size: 1.2em;
        font-weight: bold;
        padding:15px 20px; 
        border:none; 
        cursor:pointer; 
        border-radius: 10px; 
        margin-right: 20px;
    }


    #clear-button:hover{
        background: radial-gradient(circle at -1% 57.5%, rgb(19, 170, 82) 0%, rgb(0, 102, 43) 90%);
    }

    #submit-button{
        width: 40%;
        background-color:#1fc724; 
        color:white; 
        font-family: Arial, sans-serif;
        text-transform: uppercase;
        font-size: 1.2em;
        font-weight: bold;
        padding: 15px 15px; 
        border:none; 
        cursor:pointer; 
        border-radius: 10px; 
        margin-right: 20px;
    }

    input[type="submit"]:hover {
        background: radial-gradient(circle at -1% 57.5%, rgb(19, 170, 82) 0%, rgb(0, 102, 43) 90%);
    }

    @media (max-width: 1280px) {
        .container {
            padding: 30px;
            max-width: 800px;
            height: auto;
        }
    }

    @media (max-width: 1024px) {
        .container {
            padding: 30px;
            max-width: 700px;
            height: auto;
        }
        form {
            padding: 20px;
        }
    }


    @media (max-width: 768px) {
        .container {
            padding: 25px;
            max-width: 500px;
            height: auto;
        }
        h1{
            font-size: 20px;
        }
    }

    @media (max-width: 600px) {
        .container {
            padding: 15px;
            max-width: 400px;
            height: auto;
        }
        h1{
            font-size: 20px;
        }
    }

    @media (max-width: 500px) {
        .container {
            padding: 15px;
            max-width: 300px;
            height: auto;
        }
        h1{
            font-size: 20px;
        }
        .form-container {
            max-width: 200px;
    }
    }

    #guestID {
        display: none;
    }
    
    
    /* Add a media query for small screens (mobile devices) */
@media (max-width: 500px) {
    .container {
        padding: 15px;
        max-width: 300px;
        height: auto;
    }

    h1 {
        font-size: 20px;
    }

    form {
        padding: 10px; 
    }

    input[type="text"],
    input[type="number"],
    input[type="email"] {
        font-size: 1rem; 
    }

    .button-container {
        flex-direction: column; 
        align-items: center; 
        margin-top: 10px; 
    }

    #submit-button,
    #clear-button {
        width: 100%; 
        margin-bottom: 10px; 
    }

    .back-button {
        margin-right: 0; 
    }

    .text-with-icon {
        padding: 5px 15px; 
    }

    .icon {
        font-size: 24px; 
        margin-right: 8px;
    }

}

/* Add a media query for small screens (mobile devices) */
@media (max-width: 500px) {
    .typing-text {
        width: 100%;
        box-sizing: border-box; 
        padding: 0 10px; 
        text-align: center; 
        white-space: normal; 
        display: block; 
    }
}

</style>
<header>
<?php include('./header_authenticated.php') ?> 
</header>
<body>

    <div class="container">
    
    <button class="back-button" onclick="goBack()"><i class="fa-solid fa-arrow-left"></i></button>

        <p class="typing-text" style="width: fit-content; margin:auto;"><i class="fa-solid fa-comment-dots"></i>&nbsp;Could you provide the following personal information?</p>

        <form action="clientInfo_step1_submit.php" method="post">

        <input type="text" id="guestID" name="guestID" value="<?php echo $_SESSION['id_session']; ?>"> 
 
        <input type="number" id="package-id" name="package_id" value="<?php echo htmlspecialchars($package_id); ?>" hidden>

    <label for="lname">Last Name:</label>
    <input type="text" id="lname" name="lastname"  value="<?php echo $_SESSION['lastname_session']; ?>" required>

    <label for="fname">First Name:</label>
    <input type="text" id="fname" name="firstname" value="<?php echo $_SESSION['firstname_session']; ?>" required >

    <label for="mname">Middle Name:</label>
    <input type="text" id="mname" name="middlename" value="<?php echo $_SESSION['middlename_session']; ?>">

    <label for="age">Age:</label>
    <input type="text" id="ageInput" name="age" value="<?php echo $_SESSION['age_session']; ?>" required pattern="[0-9]{2}"  maxlength="2" oninput="validateAge()">
    <span id="age-error" style="color: red;"></span> 

    <label for="contact">Contact Number:</label>
    <input type="text" id="contact" name="contactnumber" value="<?php echo $_SESSION['phonenumber_session']; ?>" required pattern="[0-9]{11}" title="Please enter a valid 11-digit phone number" maxlength="11" oninput="validateContactNumber()" required >
    <span id="contactnumber-error" style="color: red;margin-bottom:10px;"></span>
    <label for="address">Address:</label>
    <input type="text" id="address" name="address" required>

    <label for="email">Email Address:</label>
    <input type="email" id="email" name="emailaddress" value="<?php echo $_SESSION['email_session']; ?>" required>

    <div class="button-container">

        <input type="button" value="Clear All" id="clear-button">

           <input type="submit" value="Next" id="submit-button" onclick="checkContactNumber(); checkAge();">
        
    </div>
</form>
              
    </div>
 
    <footer>
        <?php include './footer.php'; ?>  
    </footer>
</body>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    var lnameInput = document.getElementById("lname");
    var fnameInput = document.getElementById("fname");
    var mnameInput = document.getElementById("mname");
    var ageInput = document.getElementById("ageInput");
    var emailInput = document.getElementById("email");
    var contactInput = document.getElementById("contact");

    lnameInput.addEventListener("input", function () {
        this.value = this.value.replace(/[^a-zA-Z]/g, "");
    });

    fnameInput.addEventListener("input", function () {
        this.value = this.value.replace(/[^a-zA-Z]/g, "");
    });

    mnameInput.addEventListener("input", function () {
        this.value = this.value.replace(/[^a-zA-Z]/g, "");
    });

    ageInput.addEventListener("input", function () {
        // Remove any non-numeric characters from the input
        this.value = this.value.replace(/\D/g, "");
    });

    emailInput.addEventListener("input", function () {
        var inputValue = this.value.trim();
        if (inputValue.endsWith("@gmail.com")) {
            // The input is a valid Gmail address.
            this.setCustomValidity("");
        } else {
            // The input is not a valid Gmail address.
            this.setCustomValidity("Please enter a valid Gmail address ending with '@gmail.com'");
        }
    });

    contactInput.addEventListener("input", function () {
        var inputValue = this.value.trim();
        var numericValue = parseFloat(inputValue);

        if (isNaN(numericValue) || numericValue < 0) {
            // The input is not a valid non-negative number.
            this.setCustomValidity("Please enter a non-negative number.");
        } else {
            // The input is a valid non-negative number.
            this.setCustomValidity("");
        }
    });

    var form = document.querySelector("form");
    form.addEventListener("submit", function (event) {
        if (!emailInput.checkValidity() || !contactInput.checkValidity()) {
            event.preventDefault(); // Prevent form submission if the email or contact number is invalid.
        }
    });

    var clearButton = document.getElementById("clear-button");
    clearButton.addEventListener("click", function () {
        var lastNameInput = document.getElementById("lname");
        var firstNameInput = document.getElementById("fname");
        var middleNameInput = document.getElementById("mname");
        var ageInput = document.getElementById("ageInput");
        var contactNumberInput = document.getElementById("contact");
        var addressInput = document.getElementById("address");
        var emailAddressInput = document.getElementById("email");

        lastNameInput.value = "";
        firstNameInput.value = "";
        middleNameInput.value = "";
        ageInput.value = "";
        contactNumberInput.value = "";
        addressInput.value = "";
        emailAddressInput.value = "";
    });
});


function validateContactNumber() {
    var phoneNumberInput = document.getElementsByName("contactnumber")[0];
    var phoneNumber = phoneNumberInput.value;

    phoneNumber = phoneNumber.replace(/\D/g, '');

    phoneNumberInput.value = phoneNumber;
}

function checkContactNumber() {
    var phoneNumberInput = document.getElementsByName("contactnumber")[0];
    var phoneNumberError = document.getElementById("contactnumber-error");
    var phoneNumber = phoneNumberInput.value;

    if (phoneNumber.length === 11) {
        phoneNumberError.textContent = '';
    } else {
        phoneNumberError.textContent = 'Phone number must be 11 digits.';
    }
}

function validateAge() {
    var ageInput = document.getElementById("ageInput");
    var age = ageInput.value;

    age = age.replace(/\D/g, '');

    ageInput.value = age;
}

function checkAge() {
    var ageInput = document.getElementById("ageInput");
    var ageError = document.getElementById("age-error");
    var age = ageInput.value;

    if (age.length === 2) {
        ageError.textContent = '';
    } else {
        ageError.textContent = 'Age must be 2 digits.';
    }
}


function goBack() {
      window.history.back();
    }
    </script>
</html>
