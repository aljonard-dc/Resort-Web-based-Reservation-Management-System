<?php
            require_once '../db_connection.php';
            $query = "SELECT * FROM package_prices WHERE price_id = 10";
             $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            $day_excess = $row['package_price'];
            

            $query2 = "SELECT * FROM package_prices WHERE price_id = 11";
             $result2 = mysqli_query($conn, $query2);
            $row2 = mysqli_fetch_assoc($result2);
            $overnight_excess = $row2['package_price'];

            $query3 = "SELECT * FROM package_prices WHERE price_id = 14";
            $result3 = mysqli_query($conn, $query3);
           $row3 = mysqli_fetch_assoc($result3);
           $night_excess = $row3['package_price'];

                     
?>

<html>
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel = "icon" href = "..\images\logo.png" type = "image/x-icon"><title>Natura Verde Farm and Private Resort</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
</head>

<style>

 
    body {
        font-family: Arial, Helvetica, sans-serif;
        margin: 0;
        padding: 0;
        overflow-y: hidden;
    }

    ::-webkit-scrollbar {
    width: 5px; 
    height: 5px;
    
    }

    ::-webkit-scrollbar-thumb {
    background: #A9A9A9; 
    border-radius: 5px;
    }

    ::-webkit-scrollbar-track {
    background: #f1f1f1; 
    }

    .container {
        max-width: 1100px;
        margin: 0 auto;
        padding: 40px 0;
        overflow-x: hidden;
    }

    h1 {
       color: #0e4d0e;
        text-align: center;
        text-transform: uppercase;
        margin-bottom: 40px;
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
        max-height: 300px;
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
     .gueslist{
            text-decoration: none;
            text-align: center;
            background-color: #1fc724;
            color: white;
            font-family: Arial, sans-serif;
            text-transform: uppercase;
            font-size: 1rem;
            font-weight: bold;
            padding: 14px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 25%;
            margin-left: 40px;
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


    button[id="checkoutButton"]:hover, button[id="editExcessButton"]:hover, .gueslist:hover{
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
        margin-right: 5px;
        margin-left: 5px;
        background-color: #1fc724;
        color: white;
        font-family: Arial, sans-serif;
        text-transform: uppercase;
        font-size: 1em;
        font-weight: bold;
        border: none;
        border-radius: 5px;
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

    @media only screen and (max-width: 400px) {

    .container {
        margin: 20px;
        overflow-y: scroll;
        overflow-x: scroll;
    }

    button[id="checkoutButton"] {
        font-size: .5em;
        width: 40%;
        margin: 0px 20px;
    }

    button[id="editExcessButton"] {
        font-size: .5em;
        width: 40%;
        margin: 0px 20px;
    }

    #searchInput {
        margin: 25px auto; /* Updated to center vertically and horizontally */
        display: flex;
        width: 65%;
        font-size: .7em;
        align-items: center;
        justify-content: center; /* Center horizontally */
    }

    .box-container{
        margin: 20px;
        overflow-y: scroll;
        overflow-x: scroll;
    }

    th, td{
        font-size: .7em;
    }
    }

    @media only screen and (max-width: 480px) {

.container {
    margin: 20px;
    overflow-y: scroll;
    overflow-x: scroll;
}

button[id="checkoutButton"] {
    font-size: .7em;
    width: 40%;
    margin: 0px 20px;
}

button[id="editExcessButton"] {
    font-size: .7em;
    width: 40%;
    margin: 0px 20px;
}

#searchInput {
    margin: 25px auto; /* Updated to center vertically and horizontally */
    display: flex;
    width: 65%;
    font-size: .9em;
    align-items: center;
    justify-content: center; /* Center horizontally */
}

.box-container{
    margin: 20px;
    overflow-y: scroll;
    overflow-x: scroll;
}

th, td{
    font-size: .7em;
}
}

@media only screen and (min-width: 481px) and (max-width: 768px) {

.container {
    margin: 20px;
    overflow-y: scroll;
    overflow-x: scroll;
}

button[id="checkoutButton"] {
    font-size: .9em;
    width: 40%;
    margin: 0px 20px;
}

button[id="editExcessButton"] {
    font-size: .9em;
    width: 40%;
    margin: 0px 20px;
}

#searchInput {
    margin: 25px auto; /* Updated to center vertically and horizontally */
    display: flex;
    width: 65%;
    font-size: 1.1em;
    align-items: center;
    justify-content: center; /* Center horizontally */
}

.box-container{
    margin: 20px;
    overflow-y: scroll;
    overflow-x: scroll;
}

th, td{
    font-size: .7em;
}
}

@media only screen and (min-width: 768px) and (max-width: 1024px) {

.container {
    margin: 20px;
    overflow-y: scroll;
    overflow-x: scroll;
}

button[id="checkoutButton"] {
    font-size: .9em;
    width: 40%;
    margin: 0px 20px;
}

button[id="editExcessButton"] {
    font-size: .9em;
    width: 40%;
    margin: 0px 20px;
}

#searchInput {
    width: 38%;
    padding: 12px 20px;
    margin: 5px 67vh;
    margin-top: 20px;
    }

.box-container{
    margin: 20px;
    overflow-y: scroll;
    overflow-x: scroll;
}

th, td{
    font-size: 1em;
}
}


</style>

<body>

    <div class="container">
        
        <h1><i class="fa-solid fa-list"></i>&nbsp;Client List</h1>
        
        <div class="date">
            <button id="prevMonthBtn" onclick="showPreviousMonth()"> &lt; </button>
            <span id="currentMonth"></span>
            <button id="nextMonthBtn" onclick="showNextMonth()"> &gt; </button>
        </div>
               

        <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search by Last, First or Middle Name">
        <div class="btn">
             <a href="../guestlistreport.php" class="gueslist"> <i class="fa-solid fa-file"></i>&nbsp;Guest List Report</a>
            <button type="button" id="checkoutButton"><i class="fa-solid fa-door-open"></i>&nbsp;Check-out/Paid</button>
            <button type="button" id="editExcessButton"><i class="fa-solid fa-file-pen"></i>&nbsp;Edit Excess Guests/Amount</button>
        </div>  
        <br><br>

        <div class="box-container">

            <table id="guestTable">
                <tr>
                    <th class='hide-column'>Package ID</th>
                    <th>Status</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Contact Number</th>
                    <th>Address</th>
                    <th>Email Address</th>
                    <th>Tour Package</th>
                    <th>Total Guests</th>
                    <th>Check-in Date and Time</th>
                    <th>Check-out Date and Time</th>
                    <th>Room Accommodation</th> 
                    <th>Downpayment</th>
                    <th>Total Package Rate</th>
                    <th>Maximum Pax</th>
                    <th>Excess Guests</th>
                    <th>Amount for Excess Guests</th>
                    <th> Due Balance</th>
                    <th class="event-date">Date</th>
                    <th>Cancel Reservation</th>
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
                        echo "<tr><td class='hide-column'>" . $row["package_id"] . "</td><td>" . $row["checkout_status"] . "</td><td>" . $row["last_name"] . "</td><td>" . $row["first_name"] . "</td><td>" . $row["middle_name"] . "</td><td>" . $row["contact_number"] . "</td><td>" . $row["address"] . "</td><td>" . $row["email_address"] . "</td><td>" . $row["tour_package"] . "</td><td>" . $row["total_guests"] . "</td><td>" . $row["check_in_date_and_time"] . "</td><td>" . $row["check_out_date_and_time"] . "</td><td>" . $row["room_accomodation"] . "</td><td>" . $row["downpayment"] . "</td><td>" . $row["total_package_rate"] . "</td><td>" . $row["max_pax"] . "</td><td>" . $row["excess_guests"] . "</td><td>" . $row["amount_due_for_excess_guests"] .  "</td><td>" . $row["due_balance"] .  "</td><td>" . $row["date"] . "</td><td><button class='deleteButton' onclick='deleteRow(this)'>Delete</button></td></td>";
                    }
                } else {
                    echo "0 result";
                }

                $conn->close();
                ?>
            </table>
            
        </div>

        

</div>



    <script>
 // Get all the rows in the table
let rows = document.querySelectorAll("#guestTable tr");

// Add an event listener to each row
rows.forEach(row => {
    row.addEventListener("click", () => {
        // Remove the "selected" class from any other selected rows
        let selectedRows = document.querySelectorAll("#guestTable tr.selected");
        selectedRows.forEach(selectedRow => {
            selectedRow.classList.remove("selected");
        });
        
        // Toggle the "selected" class on the clicked row
        row.classList.toggle("selected");
    });
});

// Get the check-out button
let checkoutButton = document.querySelector("#checkoutButton");

// Add an event listener to the check-out button
checkoutButton.addEventListener("click", () => {
    // Get all the selected rows
    let selectedRows = document.querySelectorAll("#guestTable tr.selected");
    
    // Update the status of each selected row
    selectedRows.forEach(row => {
        // Get the reservation ID of the current row
        let package_id = row.querySelector("td:first-child").textContent;
        
        // Create a new FormData object to send the reservation ID to the server
        let formData = new FormData();
        formData.append("package_id", package_id);
        
        // Send an AJAX request to update.php to update the status of the selected row in the database
        fetch("checkoutGuest.php", {
            method: "POST",
            body: formData
        }).then(response => {
            if (response.ok) {
                // Update was successful, update the status cell in the current row
                let statusCell = row.querySelector("td:nth-child(2)");
                statusCell.textContent = "Checked-out and Paid";
                
                // Remove the "selected" class from the current row
                row.classList.remove("selected");
            } else {
                // Update failed, handle error here
            }
        });
    });
});

function searchTable() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("guestTable");
    tr = table.getElementsByTagName("tr");

    // Get the currently displayed month and year
    const currentMonthElement = document.getElementById("currentMonth");
    const currentMonth = new Date(currentMonthElement.textContent);
    const currentMonthIndex = currentMonth.getMonth() + 1;
    const currentYear = currentMonth.getFullYear();

    for (i = 0; i < tr.length; i++) {
        td = tr[i].querySelectorAll("td:nth-child(3), td:nth-child(4), td:nth-child(5)"); // Assuming last name is in the 2nd column, first name in the 3rd column, middle name in the 4th column
        dateCell = tr[i].querySelector("td:nth-child(20)"); // Assuming date is in the 20th column

        if (td && dateCell) {
            // Concatenate the values of last name, first name, and middle name in different orders
            const fullName1 = td[0].textContent + ' ' + td[1].textContent + ' ' + td[2].textContent;
            const fullName2 = td[0].textContent + ' ' + td[2].textContent + ' ' + td[1].textContent;
            const fullName3 = td[1].textContent + ' ' + td[0].textContent + ' ' + td[2].textContent;
            const fullName4 = td[1].textContent + ' ' + td[2].textContent + ' ' + td[0].textContent;
            const fullName5 = td[2].textContent + ' ' + td[0].textContent + ' ' + td[1].textContent;
            const fullName6 = td[2].textContent + ' ' + td[1].textContent + ' ' + td[0].textContent;

            txtValue = [fullName1, fullName2, fullName3, fullName4, fullName5, fullName6]
                .map(name => name.toUpperCase())
                .join(' ');

            // Parse the date and get its month and year
            const rowDate = new Date(dateCell.textContent);
            const rowMonth = rowDate.getMonth() + 1;
            const rowYear = rowDate.getFullYear();

            if (txtValue.includes(filter) && rowMonth === currentMonthIndex && rowYear === currentYear) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}


// Add an event listener to the search input to call the searchTable function whenever the user types a character
document.getElementById("searchInput").addEventListener("keyup", searchTable);

 // Add an event listener to the "Delete" buttons in each row
 let deleteButtons = document.querySelectorAll(".deleteButton");
    deleteButtons.forEach(button => {
        button.addEventListener("click", (event) => {
            event.stopPropagation();
            let row = button.parentNode.parentNode;
            let package_id = row.querySelector("td:first-child").textContent;
            if (confirm("Are you sure you want to delete this row?")) {
                deleteRow(package_id, row);
            }
        });
    });

    function deleteRow(package_id, row) {
        fetch("deleteGuest.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: `package_id=${encodeURIComponent(package_id)}`
        }).then(response => {
            if (response.ok) {
                row.remove();
            } else {
                // Handle deletion error
            }
        });
    }
// Add an event listener to the "Edit Excess Guests/Amount" button
let editExcessButton = document.querySelector("#editExcessButton");

// Add an event listener to the button
editExcessButton.addEventListener("click", () => {
    // Get the selected row
    let selectedRow = document.querySelector("#guestTable tr.selected");

    // If no row is selected, show an alert
    if (!selectedRow) {
        alert("Please select a row first.");
        return;
    }

    // Get the "Tour Package" column value
    let tourPackageCell = selectedRow.querySelector("td:nth-child(9)");
    
    // Check if the "Tour Package" column includes "night/s"
    if (tourPackageCell.textContent.includes("night/s")) {
        // Get the excess guests and amount from the selected row
        let excessGuestsCell = selectedRow.querySelector("td:nth-child(17)");
        let amountForExcessGuestsCell = selectedRow.querySelector("td:nth-child(18)");

        // Prompt the user for new excess guests
        let newExcessGuests = prompt("Enter new excess guests:", excessGuestsCell.textContent);

        // If the user cancels, do nothing
        if (newExcessGuests === null) {
            return;
        }

        // Calculate the combined total of "Excess Guests" and "Total Guests"
        let totalGuests = parseInt(selectedRow.querySelector("td:nth-child(10)").textContent);
        let maxPax = parseInt(selectedRow.querySelector("td:nth-child(16)").textContent);
        let newTotalGuests = parseInt(newExcessGuests) + totalGuests;

        if (totalGuests >= maxPax) {
    // Set newTotalGuests to maxPax
   let newTotalGuests = maxPax + parseInt(newExcessGuests);
}

        guestsPax = newTotalGuests - maxPax;
            // Calculate the amount based on the difference with "Maximum Pax"
            let amountForExcessGuests = <?php echo $overnight_excess; ?> * (newTotalGuests - maxPax);


            //amountForExcessGuestsCell.textContent = amountForExcessGuests;
        // Send an AJAX request to update the values in the database
        updateExcessInDatabase(selectedRow, newExcessGuests, amountForExcessGuests, guestsPax);
    } else if (tourPackageCell.textContent.includes("day")) {
        // If the "Tour Package" includes "tour"
        // Get the excess guests and amount from the selected row
        let excessGuestsCell = selectedRow.querySelector("td:nth-child(17)");
        let amountForExcessGuestsCell = selectedRow.querySelector("td:nth-child(18)");

        // Prompt the user for new excess guests
        let newExcessGuests = prompt("Enter new excess guests:", excessGuestsCell.textContent);

        // If the user cancels, do nothing
        if (newExcessGuests === null) {
            return;
        }

        // Calculate the combined total of "Excess Guests" and "Total Guests"
        let totalGuests = parseInt(selectedRow.querySelector("td:nth-child(10)").textContent);
        let maxPax = parseInt(selectedRow.querySelector("td:nth-child(16)").textContent);
        let newTotalGuests = parseInt(newExcessGuests) + totalGuests;

        if (totalGuests >= maxPax) {
    // Set newTotalGuests to maxPax
    let newTotalGuests = maxPax + parseInt(newExcessGuests);
}

        guestsPax = newTotalGuests - maxPax;
        // Calculate the amount based on the difference with "Maximum Pax"
        let amountForExcessGuests = <?php echo $day_excess; ?> * (newTotalGuests - maxPax);
        //amountForExcessGuestsCell.textContent = amountForExcessGuests;

        // Send an AJAX request to update the values in the database
        updateExcessInDatabase(selectedRow, newExcessGuests, amountForExcessGuests, guestsPax);

    }else if (tourPackageCell.textContent.includes("night")) { 
        // If the "Tour Package" includes "tour"
        // Get the excess guests and amount from the selected row
        let excessGuestsCell = selectedRow.querySelector("td:nth-child(17)");
        let amountForExcessGuestsCell = selectedRow.querySelector("td:nth-child(18)");

        // Prompt the user for new excess guests
        let newExcessGuests = prompt("Enter new excess guests:", excessGuestsCell.textContent);

        // If the user cancels, do nothing
        if (newExcessGuests === null) {
            return;
        }

        // Calculate the combined total of "Excess Guests" and "Total Guests"
        let totalGuests = parseInt(selectedRow.querySelector("td:nth-child(10)").textContent);
        let maxPax = parseInt(selectedRow.querySelector("td:nth-child(16)").textContent);
        let newTotalGuests = parseInt(newExcessGuests) + totalGuests;

        if (totalGuests >= maxPax) {
    // Set newTotalGuests to maxPax
    let newTotalGuests = maxPax + parseInt(newExcessGuests);

}

        guestsPax = newTotalGuests - maxPax;
        // Calculate the amount based on the difference with "Maximum Pax"
        let amountForExcessGuests = <?php echo $night_excess; ?> * (newTotalGuests - maxPax);

        //amountForExcessGuestsCell.textContent = amountForExcessGuests;

        // Send an AJAX request to update the values in the database
        updateExcessInDatabase(selectedRow, newExcessGuests, amountForExcessGuests, guestsPax);

    }
});



// Function to send an AJAX request to update the values in the database
function updateExcessInDatabase(selectedRow, newExcessGuests, AmountForExcessGuests, guestsPax) {
    let package_id = selectedRow.querySelector("td:first-child").textContent;
    
    // Create a new FormData object to send data to the server
    let formData = new FormData();
    formData.append("package_id", package_id);
    formData.append("new_excess_guests", newExcessGuests);
    formData.append("new_amount_for_excess_guests", AmountForExcessGuests);
    formData.append("guests_pax", guestsPax);
    
    // Send an AJAX request to a server-side script (e.g., "updateExcess.php")
    fetch("updateExcess.php", {
        method: "POST",
        body: formData
    })
    .then(response => {
        if (response.ok) {
            alert("Excess guests/amount updated successfully.");
            location.reload();
            
        } else {
            alert("Failed to update excess guests/amount.");
        }
    })
    .catch(error => {
        console.error("Error:", error);
    });
}
// Define an array of month names for display
const monthNames = [
    "January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December"
];


// Function to show the table for the specified month
function showMonth(month, year) {
    const currentMonthElement = document.getElementById("currentMonth");
    currentMonthElement.textContent = `${monthNames[month - 1]} ${year}`;
    
    // Loop through all rows and hide those that do not match the selected month and year
    rows.forEach(row => {
        const dateCell = row.querySelector("td:nth-child(20)"); // Assuming date is in the 12th column
        if (dateCell) {
            const rowDate = new Date(dateCell.textContent);
            if (
                rowDate.getMonth() + 1 === month && // JavaScript months are 0-indexed (January is 0)
                rowDate.getFullYear() === year
            ) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        }
    });
}

// Function to show the previous month
function showPreviousMonth() {
    const currentMonthElement = document.getElementById("currentMonth");
    const currentMonth = new Date(currentMonthElement.textContent);
    currentMonth.setMonth(currentMonth.getMonth() - 1);
    showMonth(currentMonth.getMonth() + 1, currentMonth.getFullYear());
}

// Function to show the next month
function showNextMonth() {
    const currentMonthElement = document.getElementById("currentMonth");
    const currentMonth = new Date(currentMonthElement.textContent);
    currentMonth.setMonth(currentMonth.getMonth() + 1);
    showMonth(currentMonth.getMonth() + 1, currentMonth.getFullYear());
}

// Initialize the table to show the current month
const currentDate = new Date();
showMonth(currentDate.getMonth() + 1, currentDate.getFullYear());


</script>



</body>
</html>