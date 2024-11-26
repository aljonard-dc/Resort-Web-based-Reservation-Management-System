<?php

// if (isset($_GET['package_id'])) {
//     $packageId = $_GET['package_id'];
// }
?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <link rel = "icon" href = "../assets/logo/NaturaVerdeLogo.png" type = "image/x-icon"><title>Natura Verde Farm and Private Resort</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<style>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, Helvetica, sans-serif;
    overflow-x: hidden;
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
table {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    color: black;
    overflow-y: scroll;
}

th, td {
    text-align: center;
    padding: 15px;
}

tr:nth-child(even) {
    background-color: #E8E8E8;
}

th {
    background: #1fc724;
    color: white;
    text-transform: uppercase;
    font-size: .9em;
}

tr:hover{
    background-color: #ACE1AF;
}

.box-container{
    border: 2px solid #4CAF50;
    border-radius: 5px;
    padding: 20px;
    width : 100%;
    height : 100%;
    overflow-x: scroll;
    overflow-y: scroll;
}

#searchInput {
    width: 25%;
    padding: 12px 20px;
    margin: 5px 110vh;
    box-sizing: border-box;
    border-color:  rgba(153, 153, 153, 0.223); 
    border-radius: 4px;
}

#searchInput:focus{
    outline:none; 
    border-bottom-color:#006600; 
}

input[type=text] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 2px solid #4CAF50;
    border-radius: 4px;
}

button[id="checkoutButton"] {
    background-color: #1fc724;
    color: white;
    font-family: Arial, sans-serif;
    text-transform: uppercase;
    font-size: 1em;
    font-weight: bold;
    padding: 14px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    width: 25%;
    margin-left: 40px;
}

button[id="editExcessButton"] {
    background-color: #1fc724;
    color: white;
    font-family: Arial, sans-serif;
    text-transform: uppercase;
    font-size: 1em;
    font-weight: bold;
    padding: 14px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    width: 30%;
    margin-left: 40px;
}


button[id="checkoutButton"]:hover, button[id="editExcessButton"]:hover  {
    background: radial-gradient(circle at -1% 57.5%, rgb(19, 170, 82) 0%, rgb(0, 102, 43) 90%);
}

.btn {
    margin-top: 30px;
    justify-content: center;
    display: flex;
}

tr.selected {
background-color: #ACE1AF; /* Change the background color for selected rows */
}

.hide-column {
    display: none;
}

.date{
    display: flex;
    justify-content: center;
    align-items: center;
}

#currentMonth{
    font-size: 1.3em;
}

#prevMonthBtn, #nextMonthBtn{
    margin: 20px 5px;
    background-color: #1fc724;
    color: white;
    font-family: Arial, sans-serif;
    text-transform: uppercase;
    font-size: 1em;
    font-weight: bold;
    border: none;
    border-radius: 5px;
    padding: 4px 8px;
}

#prevMonthBtn:hover, #nextMonthBtn:hover{
    background: radial-gradient(circle at -1% 57.5%, rgb(19, 170, 82) 0%, rgb(0, 102, 43) 90%);
}

.deleteButton{
    background-color: red;
    color: white;
    font-family: Arial, sans-serif;
    text-transform: uppercase;
    font-size: .8em;
    font-weight: bold;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    width: auto;
}

.headcontainer {
   max-width: 800px;
   padding: 0px 0px;
   border: solid #36f90f;
   border-radius: 10px;
   text-align: center;
}

.headcontainer img {
   width: 60px;
   height: 50px;
   display: block;
   margin: 0 auto;
}

.headcontainer h1,
.tour-package-inclusion h1  {
   font-family: Arial, sans-serif;
   text-transform: uppercase;
   font-size: 1em;
   text-align: center;
   justify-content: center;
}

h2 {
   font-family: Arial, sans-serif;
   font-size: 1.1em;
   text-align: left;
   justify-content: center;
}

.br-text {
   display: block;
   margin-top: 2px;
   font-size: .8em;
   font-weight: normal;
   text-transform: capitalize;
}

.paragraph1 {
   margin-top: 30px;
   text-align: left;
   text-indent: 5%;
   font-size: 1em;
}

.container {
   margin: 0;
   padding: 5px;
   width: 95%;
   text-align: left;
}

.container input[type="text"] {
   display: inline;
   border: none;
   margin: 0 auto;
   padding: 5px;
   width: 20%;
   margin-bottom: 10px;
}

.container input[type="text"]:read-only {
   padding: 5px;
   text-transform: uppercase;
   font-size: 1em;
   font-weight: bold;
   margin-left: 2px;
   background: none;
}

.container label {
   margin-bottom: 5px;
   font-size: 1em;
}

hr {
   border-top: 1px dashed;
}

.container2 {
   margin: 0;
   padding: 5px;
   width: 95%;
   text-align: left;
}

.container2 input[type="text"] {
   display: inline;
   border: none;
   margin: 0 auto;
   padding: 5px;
   width: 20%;
   margin-bottom: 10px;
}

.container2 input[name="total_guests"],
.container2 input[name="tour_package"] {
   width: 30%;
}

.container2 input[name="check_out_date_and_time"],
.container2 input[name="room_accomodation"] {
   width: 35%;
}

.container2 input[type="text"]:read-only {
   padding: 5px;
   text-transform: uppercase;
   font-size: 1em;
   font-weight: bold;
   margin-left: 2px;
   background: none;
}

.container2 label {
   margin-bottom: 5px;
   font-size: 1em;
}

.container input[type="submit"] {
   background-color: #1fc724;
   border: none;
   color: white;
   cursor: pointer;
   margin-top: 20px;
   padding: 12px 20px;
   text-decoration: none;
   display: inline-block;
}

.container input[type="submit"]:hover {
   background: radial-gradient(circle at -1% 57.5%, rgb(19, 170, 82) 0%, rgb(0, 102, 43) 90%);
}

.container3 {
   margin: 0;
   padding: 5px;
   width: 95%;
   text-align: left;
}

.container3 input[type="text"] {
   display: inline;
   border: none;
   margin: 0 auto;
   padding: 5px;
   width: 20%;
   margin-bottom: 10px;
}

.container3 input[type="text"]:read-only {
   padding: 5px;
   text-transform: uppercase;
   font-size: 1em;
   font-weight: bold;
   margin-left: 2px;
   background: none;
}

.container3 label {
   margin-bottom: 5px;
   font-size: 1em;
}

.confirm-btn {
    width:auto; 
    background-color:#1fc724; 
    color:white; 
    font-family: Arial, sans-serif;
    text-transform: uppercase;
    font-size: 20px;
    font-weight: bold;
    padding:14px 20px; 
    margin-bottom:20px; 
    border:none; 
    cursor:pointer; 
    border-radius: 10px; 
}

.btn{
align-items: center;
    display: flex;
    justify-content: center;
}

.confirm-btn:hover {
background: radial-gradient(circle at -1% 57.5%, rgb(19, 170, 82) 0%, rgb(0, 102, 43) 90%);
}


.icon-button {
position: center;
display: inline-flex;
align-items: center;
}

.icon-button input[type="submit"] {
padding-right: 24px; /* Adjust this value as needed to create space for the icon */
width: 150px;
border-radius: 10px;
font-weight: bold;
}

.icon-button i {
position: absolute;
left: 25px; /* Adjust this value to control the icon's position */
bottom: 13px;
pointer-events: none; /* Ensure the icon doesn't interfere with clicking the button */
color: white;
}


.paragraph2 {
text-align: left;
font-size: 1em;
margin-top: 10px; /* Maintain the existing margin-top */
}

.special-requests {
margin-bottom: 10px; /* Add margin-bottom to the first div */
}

.tour-package-title {
margin-top: 10px; /* Add margin-top to the second div */
}

ul.inclusions {
   list-style-type: circle;
   text-align: left;
}

.paragraph3 li {
   text-align: left;
   list-style: none;
   text-indent: 5%;
   margin-bottom: 10px;
   text-align: justify;
}

.paragraph3 p {
   text-align: left;
   list-style: none;
   margin-bottom: 15px;
   text-align: justify;
   font-style: italic;
   margin-top: 10px;
}

.tour-package-inclusion h1 {
   text-align: left;
   margin-top: 10px;
}

.tour-package-inclusion p {
   text-align: left;
}

#fullname {
   padding: 5px;
   text-transform: uppercase;
   font-size: 1em;
   font-weight: bold;
   margin-left: 2px;
   background: none;
   width: 45%;
   border: none;
   border-bottom: 1px solid black;
}

.fname {
   margin: 0;
   padding: 5px;
   width: 95%;
   text-align: center;
   margin-bottom: 30px;
}

#frontdesk {
   padding: 5px;
   text-transform: uppercase;
   font-size: 1em;
   font-weight: bold;
   margin-left: 2px;
   background: none;
   width: 40%;
   border: none;
   border-bottom: 1px solid black;
}

.fdesk {
   margin: 0;
   padding: 5px;
   width: 95%;
   text-align: center;
}


@media (max-width: 1280px) {
   .headcontainer {
      
       max-width: 800px;
       height: auto;
   }
}

@media (max-width: 1024px) {
   .headcontainer {
  
       max-width: 700px;
       height: auto;
   }
   form {
       padding: 20px;
   }
}

@media (max-width: 768px) {
   .headcontainer {
    
       max-width: 500px;
       height: auto;
   }
   h1 {
       font-size: 20px;
   }
}

@media (max-width: 600px) {
   .headcontainer {
     
       max-width: 400px;
       height: auto;
   }
   h1 {
       font-size: 20px;
   }
}

@media (max-width: 500px) {
   .headcontainer {
  
       max-width: 300px;
       height: auto;
   }
   h1 {
       font-size: 20px;
   }
   .form-container {
       max-width: 200px;
   }
   .confirm-btn {
       width: 70%;
   }
}

@media print {
body {
    margin: 0; /* Remove default body margin */
    padding: 0; /* Remove default body padding */
}

.headcontainer {
    max-width: 100%; /* Make sure the content fits within the A4 page width */
    margin: 0 auto; /* Center the content horizontally */
     /* Add padding to the content */
    border: none; /* Remove the border for printing */
}

/* Define A4 page size and margins */
@page {
    size: A4;
    margin: 0; /* Set minimum margins to zero */
}
}

.headcontainer {
max-width: 800px;
margin: auto;
padding: 0px 0px;
border: solid #36f90f;
border-radius: 10px;
text-align: center;
font-family: Arial, sans-serif; /* Set the font family to Arial */
}

/* Set the font size to 11px for all text inside .headcontainer */
.headcontainer * {
font-size: 11px;
}

.row-container {
display: flex;
justify-content: space-between;
}
.narrow-margin {
margin: 10px;
}
@media print {
.special-requests {
    margin-bottom: 10px; /* Add margin-bottom to the first div in print */
}
.tour-package-title {
    margin-top: 10px; /* Add margin-top to the second div in print */
}
}

</style>
<body>

<div class="headcontainer">

   <img src="../assets/logo/Natura Verde Logo.png" alt="">
   <h1>Natura Verde <span class="br-text">Farm and Private Resort</span></h1>

   <div class="date">
            <button id="prevMonthBtn" onclick="showPreviousMonth()"> &lt; </button>
            <span id="currentMonth"></span>
            <button id="nextMonthBtn" onclick="showNextMonth()"> &gt; </button>
        </div>


            <table id="guestTable">
                <tr>
                    <th class='hide-column'>Package ID</th>
                    <th>Full Name</th>
                    <th>Contact Number</th>
                    <th>Tour Package</th>
                    <th>Total Guests</th>
                    <th>Check-in Date and Time</th>
                    <th>Check-out Date and Time</th>
                    <th>Total Package Rate</th>
                </tr>
                <?php
                include '../db_connection.php';

                $sql = "SELECT id.package_id, id.last_name, id.first_name, id.middle_name, id.contact_number, id.address, id.email_address, dp.tour_package, dp.total_guests, dp.check_in_date_and_time, dp.check_out_date_and_time, dp.room_accomodation, dp.excess_guests,dp.amount_due_for_excess_guests, dp.max_pax, p.downpayment, p.total_package_rate, p.due_balance, c.status, c.checkout_status, c.date
                FROM information_details id
                JOIN (
                    SELECT package_id, MAX(package_id) AS max_package_id
                    FROM information_details
                    WHERE package_id IN (SELECT package_id FROM payment)
                    GROUP BY package_id
                ) subq1
                ON id.package_id = subq1.package_id AND id.package_id = subq1.max_package_id
                JOIN details_and_packages dp
                ON id.package_id = dp.package_id
                JOIN (
                    SELECT package_id, MAX(package_id) AS max_package_id
                    FROM details_and_packages
                    WHERE package_id IN (SELECT package_id FROM payment)
                    GROUP BY package_id
                ) subq2
                ON dp.package_id = subq2.package_id AND dp.package_id = subq2.max_package_id
                JOIN payment p
                ON dp.package_id = p.package_id
                JOIN (
                    SELECT package_id, MAX(payment_id) AS max_payment_id
                    FROM payment
                    WHERE package_id IN (SELECT package_id FROM payment)
                    GROUP BY package_id
                ) subq3
                ON p.package_id = subq3.package_id AND p.payment_id = subq3.max_payment_id
                JOIN confirmation c
                ON p.package_id = c.package_id
                JOIN (
                    SELECT package_id, MAX(confirm_id) AS max_confirm_id
                    FROM confirmation
                    WHERE package_id IN (SELECT package_id FROM payment)
                    GROUP BY package_id
                ) subq4
                ON c.package_id = subq4.package_id AND c.confirm_id = subq4.max_confirm_id
            WHERE c.status = 'Confirmed'   
            ORDER BY id.package_id DESC, dp.package_id DESC, p.payment_id DESC, c.confirm_id DESC;
            ";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $totalrate = number_format((float) $row["total_package_rate"], '2', '.', ',');
                        $ftotal = "Php$totalrate";
                        echo "<tr><td class='hide-column'>" . $row["package_id"] . "</td><td>" . $row["first_name"] . ' ' . $row["middle_name"] . ' ' . $row["last_name"] . "</td><td>" . $row["contact_number"] . "</td><td>" . $row["tour_package"] . "</td><td>" . $row["total_guests"] . "</td><td>" . $row["check_in_date_and_time"] . "</td><td>" . $row["check_out_date_and_time"] . "</td><td>" . $ftotal . "</td> ";
                    }
                } else {
                    echo "0 result";
                }

                $conn->close();
                ?>
            </table>
            
  


<div class="btn">
<button id="download-button" class="confirm-btn"><i class="fa-solid fa-file-arrow-down"></i>&nbsp;Download PDF</button>
</div>

<style>
  
   .hide-border {
       border: none !important;
   }
</style>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const downloadButton = document.getElementById("download-button");
    const headContainer = document.querySelector(".headcontainer");
    const guestTable = document.getElementById("guestTable");
    const rows = guestTable.querySelectorAll("tr");

    let currentMonth = new Date();

    downloadButton.addEventListener("click", function () {
        headContainer.classList.add("narrow-margin");
        headContainer.classList.add("hide-border");
        downloadButton.style.display = "none";
        window.print();
        headContainer.classList.remove("hide-border");
        downloadButton.style.display = "block";
        headContainer.classList.remove("narrow-margin");
    });

    function autoAdjustTextFields() {
        const textInputs = document.querySelectorAll('input[type="text"]');
        textInputs.forEach((input) => {
            if (!input.closest('.fname') && !input.closest('.fdesk')) {
                const valueWidth = (input.value.length + 1) * 10;
                input.style.width = valueWidth + 'px';
            }
        });
    }

    window.addEventListener('load', autoAdjustTextFields);
    window.addEventListener('resize', autoAdjustTextFields);

    function showMonth() {
        const currentMonthElement = document.getElementById("currentMonth");
        currentMonthElement.textContent = `${monthNames[currentMonth.getMonth()]} ${currentMonth.getFullYear()}`;

        rows.forEach(row => {
            const dateCell = row.querySelector("td:nth-child(6)");
            if (dateCell) {
                const rowDate = new Date(dateCell.textContent);
                const rowMonth = rowDate.getMonth();
                const rowYear = rowDate.getFullYear();

                if (rowYear === currentMonth.getFullYear() && rowMonth === currentMonth.getMonth()) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            }
        });
    }

    function showPreviousMonth() {
        currentMonth.setMonth(currentMonth.getMonth() - 1);
        showMonth();
    }

    function showNextMonth() {
        currentMonth.setMonth(currentMonth.getMonth() + 1);
        showMonth();
    }

    const monthNames = [
        "January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ];

    document.getElementById("prevMonthBtn").addEventListener("click", showPreviousMonth);
    document.getElementById("nextMonthBtn").addEventListener("click", showNextMonth);

    window.addEventListener('load', function () {
        showMonth();
    });
});




</script>

</body>
</html>
