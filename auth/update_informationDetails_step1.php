<?php

session_start();
// Check if the first name and last name session variables are set
if (!isset($_SESSION["firstname_session"]) || !isset($_SESSION["middlename_session"]) || !isset($_SESSION["lastname_session"]) || !isset($_SESSION["email_session"]) || !isset($_SESSION["phonenumber_session"])) {
    header("Location: ../user-login.php"); // Redirect to login if the session variables are not set
    exit();

}

?>

<html>
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel = "icon" href = "../assets/logo/NaturaVerdeLogo.png" type = "image/x-icon">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
   <title>Natura Verde Farm and Private Resort</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<header>
<?php include('./header_authenticated.php') ?> 
</header>

<style>

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.headcontainer {
    max-width: 100%;
    max-height: auto;
    margin: 20px 10px; /* Adjust margin for smaller screens */
    padding: 20px;
    border: solid #36f90f;
    border-radius: 10px;
    text-align: center;
}

.container {
    background-color: #f4f4f4;
    margin: 20px auto;
    padding: 20px;
    width: 100%; /* Make it full-width on smaller screens */
    text-align: center;
}

.container h2 {
    color: #0e4d0e;
    padding: 14px 0; /* Adjust padding for smaller screens */
    text-align: center;
    text-decoration: none;
    text-transform: uppercase;
}

input[type="text"],
input[type="email"], input[type="number"] {
    width: 100%;
    padding: 8px 10px; /* Adjust padding for smaller screens */
    margin-bottom: 20px;
    font-family: Arial, sans-serif;
    border-color: rgba(153, 153, 153, 0.223);
    border-radius: 10px;
    color: #0e4d0e;
    text-align: center;
    font-size: 1.2rem;
}

.input-container {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.container label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
    font-size: 1.1em;
}

.container input[type="submit"] {
    background-color: #1fc724;
    border: none;
    color: white;
    cursor: pointer;
    margin-top: 20px;
    padding: 12px 20px;
    text-decoration: none;
    font-size: 1.2rem;
}

.container input[type="submit"]:hover {
    background: radial-gradient(circle at -1% 57.5%, rgb(19, 170, 82) 0%, rgb(0, 102, 43) 90%);
}

.icon-button {
    display: flex;
    flex-direction: column;
    align-items: center; /* Center-align content horizontally */
    text-align: center; /* Center-align text within the button */
}

.icon-button input[type="submit"] {
    width: auto;
    border-radius: 10px;
    font-weight: bold;
    font-size: 1rem;
}

.icon-button i {
    margin-top: 5px; /* Adjust margin for icon */
    pointer-events: none;
    color: white;
    font-size: 1rem;
}

.back-button {
    background: none;
    color: black;
    border: none;
    margin-right: 10px; /* Adjust margin for back button */
    padding: 10px;
    cursor: pointer;
}

@media (max-width: 600px) {
    .container {
        width: 100%;
    }
}
    </style>

<body>

    <div class="headcontainer">
    <button class="back-button" onclick="goBack()"><i class="fa-solid fa-arrow-left"></i></button>
        <div class="container">
      
            <h2>Update Information Details</h2>
            <form action="update_information_details.php" method="post">
                <?php


                    require_once './db_connection.php';

                    $user = $_SESSION["id_session"];
                    $sql = "SELECT * FROM information_details WHERE client_id=(SELECT MAX(client_id) FROM payment) AND id='$user' ORDER BY client_id DESC LIMIT 1";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo '<label for="last_name">Last Name:</label>';
                            echo '<input type="text" name="last_name" value="' . $row["last_name"] . '" />';
                            echo '<label for="first_name">First Name:</label>';
                            echo '<input type="text" name="first_name" value="' . $row["first_name"] . '" />';
                            echo '<label for="middle_name">Middle Name:</label>';
                            echo '<input type="text" name="middle_name" value="' . $row["middle_name"] . '" />';
                            echo '<label for="middle_name">Age:</label>';
                            echo '<input type="number" name="age" value="' . $row["age"] . '" />';
                            echo '<label for="contact_number">Contact Number:</label>';
                            echo '<input type="text" name="contact_number" value="' . $row["contact_number"] . '" />';
                            echo '<label for="address">Address:</label>';
                            echo '<input type="text" name="address" value="' . $row["address"] . '" />';
                            echo '<label for="email_address">Email Address:</label>';
                            echo '<input type="email" name="email_address" value="' . $row["email_address"] . '" />';
                        }
                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                ?>

                <span class="icon-button">
                    <input type="submit" name="submit" value="    UPDATE">
                    <i class="fa-solid fa-pen-to-square"></i>
                </span>

            </form>
        
        </div>
    </div>



</body>
<script>
    function goBack() {
      window.history.back();
    }
    </script>
</html>
