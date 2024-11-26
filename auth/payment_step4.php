<?php
    // Connect to the natura_reservation database
     require_once './db_connection.php';

     session_start();
     // Check if the first name and last name session variables are set
     if (!isset($_SESSION["firstname_session"]) || !isset($_SESSION["middlename_session"]) || !isset($_SESSION["lastname_session"]) || !isset($_SESSION["email_session"]) || !isset($_SESSION["phonenumber_session"])) {
         header("Location: ../user-login.php"); // Redirect to login if the session variables are not set
         exit();
     
     }

     $id = $_SESSION['id_session'];
    // Query the database for the last input in the total_package_rate attribute of details_and_packages entity
     $result = $conn->query("SELECT package_id, tour_package, total_package_rate FROM details_and_packages WHERE id='$id' ORDER BY package_id DESC LIMIT 1");

     // Check if a result was returned
     if ($result->num_rows > 0) {
         // Fetch the result as an associative array
         $row = $result->fetch_assoc();

         // Get the value of the total_package_rate attribute
        $totalPackageRate = $row["total_package_rate"];
        $clientId = $row["package_id"];
        $packageTour = $row["tour_package"];
     } else {
         // No result was returned, set a default value for totalPackageRate
         $totalPackageRate = 0;
         $clientId = "";
         $packageTour = "";
     }


     $result2 = $conn->query("SELECT CONCAT(first_name, ' ', middle_name, ' ', last_name) AS full_name, email_address FROM information_details WHERE id='$id' ORDER BY package_id DESC LIMIT 1");

     // Check if a result was returned
     if ($result2->num_rows > 0) {
         // Fetch the result as an associative array
         $row2 = $result2->fetch_assoc();

         // Get the value of the total_package_rate attribute

         $fullName = $row2["full_name"];
        $email_address = $row2["email_address"];

     } else {

        $email_address = "";

     }
    // Close the database connection
    $conn->close();
?>


<html>
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel = "icon" href = "../assets/logo/NaturaVerdeLogo.png" type = "image/x-icon">
   <title>Natura Verde Farm and Private Resort</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
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
        padding: 50px 40px;
        border: solid #36f90f ;
        border-radius: 10px;
    }

    .container p{
        font-family: Arial, sans-serif;
        font-size: 1.2em;
        font-weight: bold;
        text-align: center;
        color: #0e4d0e;
        justify-content: center;
        margin-top: 5%;
}
  

    .text-with-icon {
        display: flex;
        align-items: center;
        padding: 5px 35px;
    }
    
    .icon {
        font-size: 32px;
    } 

    .form-group {
        display: flex;
        flex-direction: column;
        margin-bottom: 20px;
    margin-top: 30px;
    }

    .h1 {
        font-family: Arial, sans-serif;
        text-transform: uppercase;
        font-size: 32px;
        font-weight: 2px;
        color: #0e4d0e;
        justify-content: center;  
    }

    input[type="submit"] {
        width:100%; 
        background-color:#1fc724; 
        color:white; 
        font-family: Arial, sans-serif;
        text-transform: uppercase;
        font-size: 20px;
        font-weight: bold;
        padding:14px 20px; 
        margin-top:20px; 
        border:none; 
        border-radius:4px; 
        cursor:pointer; 
        border-radius: 10px; 
    }

    input[type="submit"]:hover {
        background: radial-gradient(circle at -1% 57.5%, rgb(19, 170, 82) 0%, rgb(0, 102, 43) 90%);
    }

    .form-group input[type="text"]{
        width: 100%;
        padding: 12px 20px;
        margin-bottom: 10px;
        text-transform: uppercase;
        font-family: Arial, sans-serif;
        border-color:  rgba(153, 153, 153, 0.223); 
        border-radius: 10px; 
        color: #0e4d0e;
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
    #downpayment, #total-package-rate {
        width: 100%;
        padding: 12px 20px;
        margin-bottom: 10px;
        text-transform: uppercase;
        font-family: Arial, sans-serif;
        border-color:  rgba(153, 153, 153, 0.223); 
        border-radius: 10px; 
        color: #0e4d0e;
        font-size: 1.2rem;
    }

    .form-group input[type="text"]:focus, input[type="number"]:focus, #downpayment:focus {
        outline:none; 
        border-bottom-color:#006600; 
    }

    .fa-arrow-left{
        color:black;
    }

    @media (min-width: 600px) {
        .form-left, .form-right {
            width: calc(50% - 10px);
        }
    }
    .form-group {
        display: flex;
        flex-direction: column;
        margin-bottom: 20px;
    }

    label {
        font-size: 18px;
        margin-bottom: 10px;
        font-family: Arial, sans-serif;
    }

    input[type="text"], input[type="file"], input[type="number"] {
        height: 40px;
        font-size: 18px;
        padding-left: 10px;
    }

    input[type="file"] {
        cursor:pointer
    }
    input[type="submit"] {
        height: 50px;
        font-size: 18px;
        background-color:#4CAF50;color:white;border-radius:5px;cursor:pointer
    }
    input[type="submit"]:hover {background-color:#3e8e41}
    #client-id, label[for="client-id"]{
        display:none
    }

    /* Redesign the radio buttons */
    input[type="radio"] {display:none}
    input[type="radio"] + label:before {content:"";display:inline-block;width:20px;height:20px;margin-right:5px;vertical-align:text-bottom;border-radius:50%;border:solid #000000;cursor:pointer}
    input[type="radio"]:checked + label:before {background:#000000}
    /* End of added code */

    .radio{
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 20px;
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
            padding: 15px 0;
            max-width: 400px;
            height: auto;
        }
        h1{
            font-size: 20px;
        }
    }

    @media (max-width: 500px) {
        .container {
            padding: 15px 0;
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

    input[type="submit"]{
        display: none;
    }
    
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

.peso-sign1,
    .peso-sign2,
    .peso-sign3{
        position: absolute;
    }
    .peso-sign1,
    .peso-sign2{
        margin-top: 20px;
        margin-left: 5px;
    }
    .peso-sign3{
        margin-top: 10px;
        margin-left: 5px;
    }

</style>

<body>

<header>
<?php include('./header_authenticated.php') ?> 
</header>

    <div class="container">
    <button class="back-button" onclick="goBack()"><i class="fa-solid fa-arrow-left"></i></button>

        <p class="typing-text" style="width: fit-content; margin:auto;"><i class="fa-solid fa-comment-dots"></i>&nbsp;How you intend to pay the amount?</p>
            <p class="typing-text">The downpayment is 50% of the total package rate.</p>
        <form id="paymentForm" enctype="multipart/form-data">
        <input type="text" id="guestID" name="guestID" value="<?php echo $_SESSION['id_session']; ?>"><br> 
                   
            <div class="radio">
                <input type="radio" id="pay-downpayment" name="pay-option">
                <label for="pay-downpayment" style="display: inline-block; margin-right: 10px;">Pay Downpayment</label>
                <input type="radio" id="pay-full-price" name="pay-option">
                <label for="pay-full-price" style="display: inline-block;">Pay Full Price</label>
            </div>

            <div class = "form-group">
                <label for = "total-package-rate">Total Package Rate: <h2 class="peso-sign1">₱</h2></label>
                <input type of "text" id = "total-package-rate" name = "total-package-rate" value = "<?php echo number_format((float) $totalPackageRate, '2', '.', ','); ?>">
            </div>
                
            <div class = "form-group">
                <label for = "downpayment">Payment: <h2 class="peso-sign1">₱</h2></label>
                <input type of "text" id = "downpayment" name = "downpayment" min = "0">
            </div>

            <div class = "form-group">
                <label for = "due-balance">Due Balance upon Check-In: <h2 class="peso-sign1">₱</h2></label>
                <input type = "text" id = "due-balance" name = "due-balance">
                <label for = "client-id">Client Id:</label>
                <input type = "text" id = "client-id" name = "client-id" value = "<?php echo $clientId; ?>">
            </div>
                
            <p id = "warning-message" style = "color:red; display:none;">The input must be a positive number</p>
            
            
                
            <input type="submit" value="Submit" onclick="submitForm()">
        </form>
        <button id="gcash-button">
    <img src="images/gcashlogo.png" alt="GCash Logo" width="30%" height="30%">
</button><br><br>
<div id="paypal-button-container"></div>
       
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script src="https://www.paypal.com/sdk/js?client-id=AX04MJFILt4d93T_Dx8FjAIbbPisefTF1qfeyv3BswYMgy47SAlNzU4_S4A2KkZeNp1f_I8QLhKusvhb&currency=PHP"></script>
    <script>

function convertToMagpieInteger(amount){
            return amount * 100;
        }

        function numberFormat(value) {
    return parseFloat(value).toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 });
}
function remove(value) {
    // Remove thousand separators (commas) and return a float
    return parseFloat(value.replace(/,/g, ''));
}



        let payDownpayment = document.querySelector("#pay-downpayment");
        let payFullPrice = document.querySelector("#pay-full-price");
        let downpayment = document.querySelector("#downpayment");
        let totalPackageRate = document.querySelector("#total-package-rate");
        let dueBalance = document.querySelector("#due-balance");


    // Set the value of the "Pay Downpayment" radio button to half the value of the total package rate
    payDownpayment.value = Math.ceil(remove(totalPackageRate.value) / 2);

    // Add event listeners to the radio buttons
    payDownpayment.addEventListener("change", function() {
        if (this.checked) {
            downpayment.value = this.value;
            downpayment.value = numberFormat(downpayment.value);
            dueBalance.value = remove(totalPackageRate.value) - remove(downpayment.value);
            dueBalance.value = numberFormat(dueBalance.value);
        }
    });
    payFullPrice.addEventListener("change", function() {
        if (this.checked) {
            downpayment.value = remove(totalPackageRate.value);
            downpayment.value = numberFormat(downpayment.value);
            dueBalance.value = remove(totalPackageRate.value) - remove(downpayment.value);
            dueBalance.value = numberFormat(dueBalance.value);
        }
    });


    

    // Disable the "Next" button by default
    let nextButton = document.querySelector('input[type="submit"]');
    nextButton.disabled = true;







    paypal.Buttons({
        // Order is created on the server and the order id is returned
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: remove(downpayment.value)
                    }
                }]
            });
        },
        // Finalize the transaction on the server after payer approval
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(orderData) {
                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                const transaction = orderData.purchase_units[0].payments.captures[0];
                alert('Transaction ' + transaction.status + ': ' + transaction.id);

                submitForm()

                window.location.href = "summary_step5.php";
            });
        }
    }).render('#paypal-button-container');





    

    document.getElementById('gcash-button').addEventListener('click', function() {
    // Create a new XMLHttpRequest object
    let xhr = new XMLHttpRequest();

    // Configure the request
    xhr.open('POST', 'https://pay.magpie.im/api/v2/sessions');

    // Set the request headers
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.setRequestHeader('Authorization', ''); // Replace 'YOUR_ACTUAL_TOKEN' with your token


    let line_item = {
        "name" : "<?php echo $packageTour; ?>",
            "description" : "",
            "quantity" : 1,
            "amount" : convertToMagpieInteger(remove(downpayment.value)), //amount here
            "currency" : "php",
            "image" : "" // product logo here, required
    }



    // Define the request body
    let body = {
            "amount" : convertToMagpieInteger(remove(downpayment.value)), //total ammount here
            "billing_address_collection" : "auto",
            "cancel_url" : "https://naturaverde.website/auth/payment_step4.php",
            "client_reference_id" : "<?php echo $_SESSION['id_session']; ?>", //random reference id
            "currency" : "php",
            "customer_email" : "<?php echo $email_address; ?>",
            "customer_name" : "<?php echo $fullName; ?>", //random email if not set
            "line_items" : [ line_item ],
            "locale" : "en",
            "payment_method_types" : ["gcash"], //can set bpi, paymaya, gcash, 
            "submit_type" : "pay",
            "success_url" : "https://naturaverde.website/auth/summary_step5.php", //set url if payment is successfull
            "mode" : "payment"

    };

    // Send the request
    xhr.send(JSON.stringify(body));

    // Handle the response
    xhr.onload = function() {
        if (xhr.status == 201 || xhr.status == 200) {
            // Parse the response
            let response = JSON.parse(xhr.responseText);


            let url = response.payment_url;
            console.log(url);
            window.location.href = url;

            submitForm()

        } else {
            console.log('Error: ' + xhr.status);
        }
    };

});


    function submitForm() {
    // Get values from the form
    var guestID = $('#guestID').val();
    var downpayment = $('#downpayment').val();
    var totalPackageRate = $('#total-package-rate').val();
    var dueBalance = $('#due-balance').val();
    var clientID = $('#client-id').val();

    // Make an AJAX request
    $.ajax({
        type: 'POST',
        url: 'payment_step4_submit.php', 
        data: {
            guestID: guestID,
            downpayment: downpayment,
            totalPackageRate: totalPackageRate,
            dueBalance: dueBalance,
            clientID: clientID
        },
        success: function(response) {
            // Handle the response if needed
            console.log(response);
        },
        error: function(error) {
            // Handle errors if any
            console.log(error);
        }
    });
}

function goBack() {
      window.location.href = "http://naturaverde.website/auth/clientInfo_step1_update.php"
    }

    </script>
</body>
</html>