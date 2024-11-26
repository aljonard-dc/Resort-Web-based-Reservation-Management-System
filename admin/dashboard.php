<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../assets/logo/NaturaVerdeLogo.png" type="image/x-icon">
    <title>Natura Verde Farm and Private Resort</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
</head>

<style>
   body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    ::-webkit-scrollbar {
        width: 5px;
        height: 10px;
    }

    ::-webkit-scrollbar-thumb {
        background: #A9A9A9;
        border-radius: 10px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }
    .legend {
            font-family: Arial, sans-serif;
            font-size: 16px;
            position: absolute;
            bottom: 40px;
            left: 160px;
            width: 40vw;
            height: auto;
          
        }

        .legend-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .legend-item {
            display: inline-flex;
            align-items: center;
      
            margin-right: 20px;
            margin-bottom: 10px;
        }

        .legend-color {
            width: 20px;
            height: 20px;
            margin-right: 8px;
            border-radius: 4px; 
        }

        .blue { background-color: blue; }
        .red { background-color: red; }
        .green { background-color: green; }
  
    .container {
        display: flex;
        justify-content: space-evenly;
        align-items: center;
        height: 50vh;
    }

    p{
        font-size: 2em;
        text-align: center;
        text-transform: uppercase;
        font-weight: bold;
        color: #0e4d0e;
    }

    .container .dashboard-box{
        margin: 5px;
    }

    .dashboard-box {
        border: 1px solid #ccc;
        border-radius: 10px;
        padding: 5px;
        width: 250px;
        display: flex;
        flex-direction: column;
        height: 200px;
        position: relative;
    }

    .reserve-count, .monthly-count, .yearly-count {
        font-size: 5em;
        color: #0e4d0e;
        font-family: Arial, Helvetica, sans-serif;
        margin-left: 20px;
        margin-top: 20px;
        font-weight: bold;
        margin-bottom: 5px;
        border: none;
        background: none;
        text-align: center;
        width: 100px; /* Adjust the width as needed */
        outline: none;
    }

    .fa-calendar-check, .fa-calendar-xmark {
        font-size: 6em;
        position: absolute;
        top: 20px;
        right: 30px;
        color: #C8C8C8;
    }

    h1 {
        color: #0e4d0e;
        margin-bottom: 20px;
        font-size: 1.5em;
       text-align: center;
    }

    .container{
        height: auto;
        padding: 5px;
    }

    .headcontainer{
        display: flex;
        flex-direction: row;
        margin-top: 30px;
        align-items: center;
        justify-content: center;
    }

    .calendar {
        max-width: 620px;
        background-color: #f0f0f0;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }

  .header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
    text-transform: uppercase;
    color: #0e4d0e;
  }

  .button {
    background-color: #28a745;
    color: white;
    border: none;
    border-radius: 4px;
    padding: 5px 20px;
    cursor: pointer;
  }

  .days {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 20px;
  }

  .day {
    background-color: white; /* Change the background color to white */
    color: #0e4d0e;
    text-align: center;
    padding: 5px;
    border-radius: 10px;
    width: 50px;
    height: 40px;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .current-day {
    background-color: #1fc724;
    color: white;
  }

  /* Styles for reserved dates */
  .reserved-day {
    background-color: red;
    color: white;
  }

  /* Styles for checked-out dates */
  .checked-out-day {
    background-color: blue;
    color: white;
  }
  .reservation-name {
    font-size: 12px;
    text-align: center;
    margin-top: 2px;
  }

  .day:hover {
    position: relative;
  }

  /* Tooltip styles */
  .day[data-fullname]:hover:after {
    content: attr(data-fullname);
    position: absolute;
    bottom: -24px; /* Adjust this value to control tooltip placement */
    left: 50%;
    transform: translateX(-50%);
    background-color: rgba(0, 0, 0, 0.8);
    color: white;
    padding: 4px 8px;
    border-radius: 4px;
    white-space: nowrap;
    font-size: 14px;
  }

  /* Tooltip styles */
.reservation-tooltip {
    display: none;
    position: absolute;
    background-color: #1fc724;
    color: white;
    padding: 8px;
    border-radius: 4px;
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
    font-size: 14px;
    white-space: nowrap;
    text-align: left;
    z-index: 999; 
}


.day[data-fullname]:hover .reservation-tooltip {
    display: block;
    top: -35px; 
    left: -20px;
}

#prevBtn, #nextBtn{
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

    #prevBtn:hover, #nextBtn:hover{
        background: radial-gradient(circle at -1% 57.5%, rgb(19, 170, 82) 0%, rgb(0, 102, 43) 90%);
    }


@media only screen and (max-width: 400px) {

    .headcontainer {
        flex-direction: column;
    }

    .calendar{
        width: 250px;
        margin: 10px;
    }

    .header button {
        font-size: 12px; /* Adjust the font size of the buttons */
    }

    .header h2 {
        font-size: 1rem; /* Adjust the font size of the heading */
    }

    .calendar-part .days {
        font-size: .7rem; /* Adjust the font size of the days */
        gap: 15px;
    }

    .day{
        width: 50%;
        height: 35%;
    }

    .reservation-tooltip {
        padding: 8px;
        font-size: 5px;
    }

    .dashboard p{
        font-size: 1rem;
    }

    .dashboard-box {
        width: 120px;
        height: 130px;
    }

    .dashboard-box h1{
        font-size: .8rem;
    }

    .reserve-count, .monthly-count, .yearly-count {
        font-size: 3em;
        text-align: left;
    }

    .fa-calendar-check, .fa-calendar-xmark {
        font-size: 3em;
        margin-top: 8px;
    }
}

@media only screen and (max-width: 480px) {

.headcontainer {
    flex-direction: column;
}

.calendar{
    width: 300px;
    margin: 10px;
}

.header button {
    font-size: 12px; /* Adjust the font size of the buttons */
}

.header h2 {
    font-size: 1rem; /* Adjust the font size of the heading */
}

.calendar-part .days {
    font-size: .7rem; /* Adjust the font size of the days */
    gap: 15px;
}

.day{
    width: 50%;
    height: 35%;
}

.reservation-tooltip {
    padding: 8px;
    font-size: 5px;
}

.dashboard p{
    font-size: 1rem;
}

.dashboard-box {
    width: 130px;
    height: 130px;
}

.dashboard-box h1{
    font-size: .8rem;
}

.reserve-count, .monthly-count, .yearly-count {
    font-size: 3em;
    text-align: left;

}

.fa-calendar-check, .fa-calendar-xmark {
    font-size: 3em;
    margin-top: 8px;
}
}

@media only screen and (min-width: 481px) and (max-width: 768px){

.headcontainer {
    flex-direction: column;
}

.calendar{
    width: 500px;
    margin: 10px;
}

.header button {
    font-size: 12px; /* Adjust the font size of the buttons */
}

.header h2 {
    font-size: 1.5rem; /* Adjust the font size of the heading */
}

.calendar-part .days {
    font-size: .7rem; /* Adjust the font size of the days */
    gap: 25px;
}

.day{
    width: 60%;
    height: 90%;
}

.reservation-tooltip {
    padding: 20px;
    font-size: 10px;
}

.dashboard p{
    font-size: 1.5rem;
}

.dashboard-box {
    width: 220px;
    height: 230px;
}

.dashboard-box h1{
    font-size: 1.5rem;
}

.reserve-count, .monthly-count, .yearly-count {
    font-size: 5em;
    text-align: left;

}

.fa-calendar-check, .fa-calendar-xmark {
    font-size: 5em;
    margin-top: 8px;
}
}

@media only screen and (min-width: 768px) and (max-width: 1024px){

.headcontainer {
    flex-direction: column;
}

.calendar{
    width: 1000px;
    margin: 10px;
}

.header button {
    font-size: 12px; /* Adjust the font size of the buttons */
}

.header h2 {
    font-size: 2rem; /* Adjust the font size of the heading */
}

.calendar-part .days {
    font-size: 1.2rem; /* Adjust the font size of the days */
    gap: 30px;
}

.day{
    width: 65%;
    height: 95%;
}

.reservation-tooltip {
    padding: 20px;
    font-size: 15px;
}

.dashboard p{
    font-size: 2rem;
}

.dashboard-box {
    width: 250px;
    height: 250px;
}

.dashboard-box h1{
    font-size: 1.8rem;
}

.reserve-count, .monthly-count, .yearly-count {
    font-size: 7em;
    text-align: left;

}

.fa-calendar-check, .fa-calendar-xmark {
    font-size: 7em;
    margin-top: 10px;
}
}

</style>

    <?php
        include '../db_connection.php';
        // Retrieve reserved dates from the database
        $reservedDates = [];
        $query = "SELECT check_in_date_and_time, check_out_date_and_time FROM details_and_packages";
        $result = mysqli_query($conn, $query);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
            $reservedDates[] = [
                'check_in' => $row['check_in_date_and_time'],
                'check_out' => $row['check_out_date_and_time']
            ];
            }
        }

        // Close the database connection
        mysqli_close($conn);
    ?>

<body>
<div class="legend">
        <div class="legend-list">
                <h3>Legend:</h3>
            <div class="legend-item">
                <div class="legend-color green"></div>
                Current Date
            </div>
            <div class="legend-item">
                <div class="legend-color blue"></div>
                Check Out
            </div>
            <div class="legend-item">
                <div class="legend-color red"></div>
                Reserved
            </div>
        </div>
    </div>
    <div class="headcontainer">

        <div class="calendar-part">
            
            <div class="container">

                <div class="calendar">

                    <div class="header">
                        <button id="prevBtn">&lt;</button>
                        <h2 id="monthYear"></h2>
                        <button id="nextBtn">&gt;</button>
                    </div>
                
                <div class="days"></div>

                </div>

            </div>

        </div>

        <div class="dashboard">
            <p>Reservations</p>
            <div class="container">

                <div class="dashboard-box">
                    <input type="text" class="monthly-count" id="rmonthly-count" value="0" readonly>
                    <h1>This Month Reservations</h1>
                    <i class="fa-solid fa-calendar-check"></i>
                </div>

                <div class="dashboard-box">
                    <input type="text" class="yearly-count" id="ryearly-count" value="0" readonly>
                    <h1>This Year Reservations</h1>
                    <i class="fa-solid fa-calendar-check"></i>
                </div>

            </div>

            <p>Cancellations</p>
            <div class="container">

                <div class="dashboard-box">
                    <input type="text" class="monthly-count" id="monthly-counts" value="0" readonly>
                    <h1>This Month Cancellations</h1>
                    <i class="fa-solid fa-calendar-xmark"></i>
                </div>

                <div class="dashboard-box">
                    <input type="text" class="yearly-count" id="yearly-counts" value="0" readonly>
                    <h1>This Year Cancellations</h1>
                    <i class="fa-solid fa-calendar-xmark"></i>
                </div>
            </div>

        </div>

    </div>

    <script>

        // Function to update the "Pending Count" text field with data from the server
        function updatePendingCount() {
            var pendingCountField = document.getElementById("rmonthly-count");

            // Make an AJAX request to the server-side script
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "get_monthlyReservation_count.php", true);

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Update the "Pending Count" text field with the retrieved count
                    pendingCountField.value = xhr.responseText;
                }
            };

            xhr.send();
        }


        // Function to update the "Reserved Count" text field with data from the server
        function updateCanceledCount() {
            var reservedCountField = document.getElementById("ryearly-count");

            // Make an AJAX request to the server-side script
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "get_yearlyReservation_count.php", true);

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Update the "Reserved Count" text field with the retrieved count
                    reservedCountField.value = xhr.responseText;
                }
            };

            xhr.send();
        }

        // Function to update the "Pending Count" text field with data from the server
        function updatePendingCounts() {
            var pendingCountField = document.getElementById("monthly-counts");

            // Make an AJAX request to the server-side script
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "get_monthlyCancellation_count.php", true);

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Update the "Pending Count" text field with the retrieved count
                    pendingCountField.value = xhr.responseText;
                }
            };

            xhr.send();
        }


        // Function to update the "Reserved Count" text field with data from the server
        function updateCanceledCounts() {
            var reservedCountField = document.getElementById("yearly-counts");

            // Make an AJAX request to the server-side script
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "get_yearlyCancellation_count.php", true);

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Update the "Reserved Count" text field with the retrieved count
                    reservedCountField.value = xhr.responseText;
                }
            };

            xhr.send();
        }

        // Load the initial counts on page load
        window.onload = function () {
          updatePendingCount(); // Update "Pending Count"
            updateCanceledCount()
            updatePendingCounts(); // Update "Pending Count"
            updateCanceledCounts()
        };


        document.addEventListener("DOMContentLoaded", function () {
    const prevBtn = document.getElementById("prevBtn");
    const nextBtn = document.getElementById("nextBtn");
    const monthYear = document.getElementById("monthYear");
    const daysContainer = document.querySelector(".days");

    const today = new Date();
    let currentMonth = today.getMonth();
    let currentYear = today.getFullYear();
    let reservedDates = [];

    // Fetch reserved dates from the PHP file
    fetch('get_reserved_dates.php')
      .then(response => response.json())
      .then(data => {
        reservedDates = data;
        // Call updateCalendar and markReservedDates functions
        updateCalendar();
        markReservedDates();
      })
      .catch(error => console.error('Error fetching reserved dates:', error));

    function updateCalendar() {
      const firstDay = new Date(currentYear, currentMonth, 1);
      const lastDay = new Date(currentYear, currentMonth + 1, 0);
      const daysInMonth = lastDay.getDate();

      monthYear.textContent = `${new Intl.DateTimeFormat('en-US', { month: 'long', year: 'numeric' }).format(firstDay)}`;

      daysContainer.innerHTML = '';

      for (let i = 1; i <= daysInMonth; i++) {
        const dayElement = document.createElement('div');
        dayElement.classList.add('day');
        dayElement.textContent = i;

        if (currentMonth === today.getMonth() && currentYear === today.getFullYear() && i === today.getDate()) {
          dayElement.classList.add('current-day');
        }

        daysContainer.appendChild(dayElement);
      }
    }
    
    function markReservedDates() {
      const dateElements = document.querySelectorAll('.day');

      markDates(dateElements, reservedDates.blueDates, 'checked-out-day');
      markDates(dateElements, reservedDates.redDates, 'reserved-day');
    }

    function markDates(dateElements, datesArray, className) {
    datesArray.forEach(dateRange => {
        const checkIn = new Date(dateRange.check_in);
        const checkOut = new Date(dateRange.check_out);
        const fullName = dateRange.full_name;
        const tourPackage = dateRange.tour_package;
        const totalGuests = dateRange.total_guests;
        const roomAccommodation = dateRange.room_accomodation;
        const totalPackageRate = dateRange.total_package_rate;
        const status = dateRange.status;

        for (let dateElement of dateElements) {
            const date = new Date(currentYear, currentMonth, parseInt(dateElement.textContent));
            const formattedCheckIn = new Date(checkIn.getFullYear(), checkIn.getMonth(), checkIn.getDate());
            const formattedCheckOut = new Date(checkOut.getFullYear(), checkOut.getMonth(), checkOut.getDate());
            const formattedDate = new Date(date.getFullYear(), date.getMonth(), date.getDate());

            if (formattedDate >= formattedCheckIn && formattedDate <= formattedCheckOut) {
                dateElement.classList.remove('checked-out-day');
                dateElement.classList.remove('reserved-day');
                dateElement.classList.add(className);
                // Create and display a tooltip with reservation details
                const tooltip = document.createElement('div');
                tooltip.classList.add('reservation-tooltip');
                tooltip.innerHTML = `<strong>${fullName}</strong><br>Package: ${tourPackage}<br>Guests: ${totalGuests}<br>Room: ${roomAccommodation}<br>Rate: ${totalPackageRate}<br>Status: ${status}`;
                dateElement.appendChild(tooltip);

                dateElement.addEventListener('mouseenter', () => {
                    tooltip.style.display = 'block';
                });

                dateElement.addEventListener('mouseleave', () => {
                    tooltip.style.display = 'none';
                });
            }
        }
    });
}


    prevBtn.addEventListener('click', () => {
      if (currentMonth === 0) {
        currentMonth = 11;
        currentYear--;
      } else {
        currentMonth--;
      }
      updateCalendar();
      markReservedDates(); // Mark reserved dates when changing months
    });

    nextBtn.addEventListener('click', () => {
      if (currentMonth === 11) {
        currentMonth = 0;
        currentYear++;
      } else {
        currentMonth++;
      }
      updateCalendar();
      markReservedDates(); // Mark reserved dates when changing months
    });

    // Call updateCalendar to initialize calendar
    updateCalendar();
  });

 
    </script>
    
</body>
</html>
