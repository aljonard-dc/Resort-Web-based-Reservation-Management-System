
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="..\images\logo.png" type="image/x-icon">
    <title>Natura Verde Farm and Private Resort</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
</head>

<style>
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        overflow-y: hidden;
        overflow-x: hidden;
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
        padding: 8px;
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

    tr:hover {
        background-color: #ACE1AF;
    }

    #searchInput {
        width: 25%;
        padding: 12px 20px;
        margin: 5px 110vh;
        box-sizing: border-box;
        border-color:  rgba(153, 153, 153, 0.223); 
        border-radius: 4px;
        margin-bottom: 30px;
    }

    #searchInput:focus{
        outline:none; 
        border-bottom-color:#006600; 
    }

    .box {
        border: 2px solid #4CAF50;
        border-radius: 5px;
        padding: 20px;
        max-height: 400px;
        overflow-x: scroll;
        overflow-y: scroll;
    }

    tr.selected {
        background-color: #ACE1AF;
    }

    tr {
        text-transform: capitalize;
    }

    .center-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 70px;
        /* 100% of viewport height */
    }

    #delete-button, #update-button {
        background-color: red;
        /* Background color for delete-button */
        color: white;
        font-family: Arial, sans-serif;
        text-transform: uppercase;
        font-size: 1em;
        font-weight: bold;
        padding: 14px 20px;
        margin-top: 30px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        border-radius: 10px;
        width: 20%;
    }

    #update-button {
        background-color: #1fc724;
        margin-left: 10px;
        /* Add margin between the buttons */
    }

    #update-button:hover {
        background: radial-gradient(circle at -1% 57.5%, rgb(19, 170, 82) 0%, rgb(0, 102, 43) 90%);
    }

    #delete-button:hover {
        background: linear-gradient(108.4deg, rgb(253, 44, 56) 3.3%, rgb(176, 2, 12) 98.4%);
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

    @media only screen and (max-width: 400px) {

.container {
    margin: 20px;
    overflow-y: scroll;
    overflow-x: scroll;
}

h1{
    font-size: 1.5em;
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

@media only screen and (min-width: 769px) and (max-width: 1024px) {

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



</style>

<body>
    <div class="container">
        <h1><i class="fa-solid fa-calendar-xmark"></i>&nbsp;Cancelled Reservations</h1>
        
        <div class="date">
            <button id="prevMonthBtn" onclick="showPreviousMonth()"> &lt; </button>
            <span id="currentMonth"></span>
            <button id="nextMonthBtn" onclick="showNextMonth()"> &gt; </button>
        </div>

        <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search by Last, First or Middle name">

        <div class="box">
            <table>
                <tr>
                    <th style="display: none;">Client ID</th>
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
                    <th>Room Accomodation</th>
                    <th>Downpayment</th>
                    <th>Total Package Rate</th>
                    <th>Due Balance</th>
                    <th>Cancellation Date</th>
                    <th>Reason For Cancellation</th>
                    <th>Other Reason</th>
                    
                </tr>

                <?php
                // Connect to the database
                include 'db_connection.php';
                // Define the SQL query
                $query = "SELECT id.package_id, id.last_name, id.first_name, id.middle_name, id.contact_number, id.address, id.email_address, dp.tour_package, dp.total_guests, dp.check_in_date_and_time, dp.check_out_date_and_time, dp.room_accomodation, p.downpayment, p.total_package_rate, p.due_balance, c.status, ca.cdate, ca.reason, ca.other_reason
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
                JOIN cancellation ca
                ON c.package_id = ca.package_id
                JOIN (
                    SELECT package_id, MAX(cancel_id) AS max_cancel_id
                    FROM cancellation
                    WHERE package_id IN (SELECT package_id FROM payment)
                    GROUP BY package_id
                ) subq5
                ON ca.package_id = subq5.package_id AND ca.cancel_id = subq5.max_cancel_id
                WHERE c.status = 'Canceled'
                ORDER BY id.package_id DESC, dp.package_id DESC, p.payment_id DESC, c.confirm_id DESC, ca.cancel_id DESC;";

                // Execute the SQL query and store the result set in a variable called $result.
                $result = mysqli_query($conn, $query);

                // Check if there are any rows returned by the query.
                if (mysqli_num_rows($result) > 0) {

                    // Loop through each row returned by the query.
                    while ($row = mysqli_fetch_assoc($result)) {

                        // Extract data from each row.
                        $clientID = $row["package_id"];
                        $lastName = $row["last_name"];
                        $firstName = $row["first_name"];
                        $middleName = $row["middle_name"];
                        $contactNumber = $row["contact_number"];
                        $address = $row["address"];
                        $emailAddress = $row["email_address"];
                        $tourPackage = $row["tour_package"];
                        $totalGuests = $row["total_guests"];
                        $checkInDateTime = $row["check_in_date_and_time"];
                        $checkOutDateTime = $row["check_out_date_and_time"];
                        $roomAccomodation = $row["room_accomodation"];
                        $downpayment = $row["downpayment"];
                        $totalPackageRate = $row["total_package_rate"];
                        $dueBalance = $row["due_balance"];
                        $status = $row["status"];
                        $cdate = $row["cdate"];
                        $reason = $row["reason"];
                        $otherReason = $row["other_reason"];

                        // Display the data in a table row.
                        echo "<tr>";
                        echo '<td style="display: none;">' . $clientID . '</td>';
                        echo "<td>$status</td>";
                        echo "<td>$lastName</td>";
                        echo "<td>$firstName</td>";
                        echo "<td>$middleName</td>";
                        echo "<td>$contactNumber</td>";
                        echo "<td>$address</td>";
                        echo "<td>$emailAddress</td>";
                        echo "<td>$tourPackage</td>";
                        echo "<td>$totalGuests</td>";
                        echo "<td>$checkInDateTime</td>";
                        echo "<td>$checkOutDateTime</td>";
                        echo "<td>$roomAccomodation</td>";
                        echo "<td>$downpayment</td>";
                        echo "<td>$totalPackageRate</td>";
                        echo "<td>$dueBalance</td>";
                        echo "<td>$cdate</td>";
                        echo "<td>$reason</td>";
                        echo "<td>$otherReason</td>";
                        echo "</tr>";
                    }

                } else {
                    // If there are no rows returned by the query, display a message.
                    echo "No results found.";
                }
                ?>
            </table>
        </div>
    </div>

    <script>
        // Define an array of month names for display
        const monthNames = [
            "January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];

        // Function to show the table for the specified month
        function showMonth(month, year) {
            const currentMonthElement = document.getElementById("currentMonth");
            currentMonthElement.textContent = `${monthNames[month - 1]} ${year}`;
            const table = document.querySelector("table");
            const rows = table.getElementsByTagName("tr");

            // Loop through all rows and hide those that do not match the selected month and year
            for (let i = 1; i < rows.length; i++) {
                const dateCell = rows[i].getElementsByTagName("td")[16]; // Assuming date is in the 10th column
                if (dateCell) {
                    const rowDate = new Date(dateCell.textContent);
                    if (
                        rowDate.getMonth() + 1 === month && // JavaScript months are 0-indexed (January is 0)
                        rowDate.getFullYear() === year
                    ) {
                        rows[i].style.display = "";
                    } else {
                        rows[i].style.display = "none";
                    }
                }
            }
        }

        // Function to show the previous month
        function showPreviousMonth() {
            const currentMonthElement = document.getElementById("currentMonth");
            const currentMonthText = currentMonthElement.textContent;
            const currentMonth = new Date(currentMonthText + " 1"); // Construct a date object from the string
            currentMonth.setMonth(currentMonth.getMonth() - 1);
            showMonth(currentMonth.getMonth() + 1, currentMonth.getFullYear());
        }

        // Function to show the next month
        function showNextMonth() {
            const currentMonthElement = document.getElementById("currentMonth");
            const currentMonthText = currentMonthElement.textContent;
            const currentMonth = new Date(currentMonthText + " 1"); // Construct a date object from the string
            currentMonth.setMonth(currentMonth.getMonth() + 1);
            showMonth(currentMonth.getMonth() + 1, currentMonth.getFullYear());
        }

        // Initialize the table to show the current month
        const currentDate = new Date();
        showMonth(currentDate.getMonth() + 1, currentDate.getFullYear());

// Search function
function searchTable() {
        var input, filter, table, tr, td, dateCell, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.querySelector("table");
        tr = table.getElementsByTagName("tr");

        // Get the currently displayed month and year
        const currentMonthElement = document.getElementById("currentMonth");
        const currentMonth = new Date(currentMonthElement.textContent);
        const currentMonthIndex = currentMonth.getMonth() + 1;
        const currentYear = currentMonth.getFullYear();

        for (i = 1; i < tr.length; i++) { // Start from 1 to skip the header row
            td = tr[i].querySelectorAll("td:nth-child(3), td:nth-child(4), td:nth-child(5)"); // Assuming last name is in the 3rd column, first name in the 4th column, middle name in the 5th column
            dateCell = tr[i].querySelector("td:nth-child(17)"); // Assuming date is in the 16th column

            if (td.length === 3 && dateCell) {
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

    </script>
</body>

</html>
