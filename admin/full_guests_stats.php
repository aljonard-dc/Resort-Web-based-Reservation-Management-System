<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chart.js">
    <link rel="icon" href="..\images\logo.png" type="image/x-icon">
    <title>Natura Verde Farm and Private Resort</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

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

        .headcontainer{
            flex-direction: column;
            justify-content: center;
        }

        .container1 {
            max-width: 1200px;
            margin: 0 auto;
            padding: 50px 0;
        }

        #chart-container {
            max-height: 480px;
            display: flex; /* Use flexbox for centering */
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
        }

        h1 {
            color: #0e4d0e;
            text-align: center;
            text-transform: uppercase;
            margin-bottom: 30px;
        }

        #year-navigation,
        #decade-navigation {
            text-align: center;
            margin-bottom: 30px;
        }

        #year-navigation button,
        #year-navigation span,
        #decade-navigation button,
        #decade-navigation span {
            margin: 5px;
        }

        #prev-year,
        #prev-decade {
            background-color: #1fc724;
            color: white;
            font-family: Arial, sans-serif;
            text-transform: uppercase;
            font-size: .7em;
            font-weight: bold;
            padding: 10px 10px;
            margin-top: 30px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            border-radius: 10px;
            width: 10%;
        }

        #current-year,
        #current-decade {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 1em;
        }

        #next-year,
        #next-decade {
            background-color: #1fc724;
            color: white;
            font-family: Arial, sans-serif;
            text-transform: uppercase;
            font-size: .7em;
            font-weight: bold;
            padding: 10px 10px;
            margin-top: 30px;
            border: none;
            cursor: pointer;
            border-radius: 10px;
            width: 10%;
        }

        #prev-year:hover,
        #next-year:hover,
        #prev-decade:hover,
        #next-decade:hover {
            background: radial-gradient(circle at -1% 57.5%, rgb(19, 170, 82) 0%, rgb(0, 102, 43) 90%);
        }

        #monthly-guests-button,
        #yearly-guests-button {
            background-color: #1fc724;
            color: white;
            font-family: Arial, sans-serif;
            text-transform: uppercase;
            font-size: .7em;
            font-weight: bold;
            padding: 10px 10px;
            border: none;
            cursor: pointer;
            border-radius: 10px;
            width: 15%;
        }

        #container {
            display: flex;
            justify-content: flex-end;
        }

        #monthly-guests-button:hover,
        #yearly-guests-button:hover {
            background: radial-gradient(circle at -1% 57.5%, rgb(19, 170, 82) 0%, rgb(0, 102, 43) 90%);
        }
    </style>
</head>

<body>
    <div class="headcontainer">
    <div class="container1">
        <!-- Monthly Guests Section -->
        <h1><i class="fa-solid fa-calendar-day"></i>&nbsp;Monthly Guests</h1>
        <div id="year-navigation">
            <button id="prev-year">Previous Year</button>
            <span id="current-year">Year YYYY</span>
            <button id="next-year">Next Year</button>
        </div>
        <div id="chart-container" style="position: relative;">
            <canvas id="monthly-guests-chart"></canvas>
        </div>
    </div>

    <!-- Yearly Guests Section -->
    <div class="container1">
        <h1><i class="fa-solid fa-calendar"></i>&nbsp;Yearly Guests</h1>
        <div id="decade-navigation">
            <button id="prev-decade">Previous Decade</button>
            <span id="current-decade">YYYYs</span>
            <button id="next-decade">Next Decade</button>
        </div>

        <div id="chart-container" style="position: relative;">
            <canvas id="yearly-guests-chart"></canvas>
        </div>
    </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        let chart; // Store the Chart.js instance

        // Function to fetch guests data from the server
        function fetchGuestsData(year) {
            return new Promise(function (resolve, reject) {
                const xhr = new XMLHttpRequest();
                const url = 'fetch_monthlyGuests_admin.php'; // Replace with your PHP script URL

                xhr.open('GET', `${url}?year=${year}`, true); // Include the 'year' parameter
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4) {
                        if (xhr.status === 200) {
                            resolve(JSON.parse(xhr.responseText));
                        } else {
                            reject('Error fetching data');
                        }
                    }
                };
                xhr.send();
            });
        }

        // Function to update the chart with new data
        function updateChart(data) {
            // Destroy the existing chart to prevent duplicates
            if (chart) {
                chart.destroy();
            }

            // Create an array to store line border colors
            const lineBorderColors = data.map((value, index) => {
                // Check if the current month (index) matches the current month in the real world (0-based index)
                const currentDate = new Date();
                const isCurrentYear = currentDate.getFullYear() === parseInt(document.getElementById('current-year').textContent.split(' ')[1]);
                const isCurrentMonth = isCurrentYear && (index === currentDate.getMonth());

                // Set the line color based on whether it's the current month in the current year or not
                return isCurrentMonth ? 'rgba(0, 128, 0, 1)' : 'rgba(75, 192, 192, 1)';
            });

            // Create a new chart with the updated data and customized line colors
            chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Monthly Guests',
                        borderColor: lineBorderColors, // Use the customized colors
                        borderWidth: 1,
                        data: data,
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                        }
                    }
                }
            });
        }

        // Initialize chart variables
        const chartCanvas = document.getElementById('monthly-guests-chart');
        const ctx = chartCanvas.getContext('2d');

        // Handle navigation buttons
        document.getElementById('prev-year').addEventListener('click', function () {
            const year = parseInt(document.getElementById('current-year').textContent.split(' ')[1]) - 1;
            document.getElementById('current-year').textContent = `Year ${year}`;
            fetchGuestsData(year).then(data => {
                // Update the chart with the fetched data
                updateChart(data);
            }).catch(error => {
                console.error(error);
            });
        });

        document.getElementById('next-year').addEventListener('click', function () {
            const year = parseInt(document.getElementById('current-year').textContent.split(' ')[1]) + 1;
            document.getElementById('current-year').textContent = `Year ${year}`;
            fetchGuestsData(year).then(data => {
                // Update the chart with the fetched data
                updateChart(data);
            }).catch(error => {
                console.error(error);
            });
        });

        // Initial chart setup with current year's data
        const currentYear = new Date().getFullYear();
        document.getElementById('current-year').textContent = `Year ${currentYear}`;
        fetchGuestsData(currentYear).then(data => {
            // Create the initial chart with the fetched data
            updateChart(data);
        }).catch(error => {
            console.error(error);
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let chart; // Store the Chart.js instance

        // Function to fetch yearly guest data from the server
        function fetchGuestsData(decade) {
            return new Promise(function (resolve, reject) {
                const xhr = new XMLHttpRequest();
                const url = `fetch_yearlyGuests_admin.php?decade=${decade}`;

                xhr.open('GET', url, true);
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4) {
                        if (xhr.status === 200) {
                            resolve(JSON.parse(xhr.responseText));
                        } else {
                            reject('Error fetching data');
                        }
                    }
                };
                xhr.send();
            });
        }

        // Function to generate an array of years for a given decade
        function generateYearsArray(decade) {
            const startYear = decade;
            const endYear = startYear + 9;
            const years = [];

            for (let year = startYear; year <= endYear; year++) {
                years.push(year);
            }

            return years;
        }

        // Function to update the chart with new data and a different color for the current year
        function updateChart(data, decade) {
            // Generate a complete array of years for the decade
            const years = generateYearsArray(decade);

            // Initialize an array to store total guests values, initially filled with zeros
            const totalGuests = Array(years.length).fill(0);

            // Update the total guests array with actual data where available
            data.forEach(item => {
                const yearIndex = years.indexOf(item.year);
                if (yearIndex !== -1) {
                    totalGuests[yearIndex] = item.total_guests;
                }
            });

            // Create an array to specify the background color for each point on the line chart
            const backgroundColors = years.map(year => {
                // Change the color for the current year
                return year === new Date().getFullYear() ? "rgba(0, 128, 0, 0.6)" : "rgba(75, 192, 192, 0.2)";
            });

            // Create a new chart with the updated data and colors
            const chartCanvas = document.getElementById('yearly-guests-chart');
            const ctx = chartCanvas.getContext('2d');

            // Destroy the existing chart to prevent duplicates
            if (chart) {
                chart.destroy();
            }

            chart = new Chart(ctx, {
                type: 'line', // Use a line chart
                data: {
                    labels: years.map(String),
                    datasets: [{
                        label: 'Yearly Guests',
                        borderColor: backgroundColors, // Set the border color for the line chart
                        borderWidth: 2,
                        pointBackgroundColor: backgroundColors, // Set point background color
                        pointBorderColor: backgroundColors, // Set point border color
                        pointRadius: 6, // Set point radius
                        data: totalGuests,
                    }]
                },
                options: {
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Years',
                            },
                        },
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Guests',
                            },
                        }
                    },
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function (context) {
                                    var label = context.dataset.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    if (context.parsed.y !== null) {
                                        label += context.parsed.y.toLocaleString(); // Update tooltip label
                                    }
                                    return label;
                                },
                            },
                        },
                    },
                }
            });
        }

        // Handle decade navigation buttons
        document.getElementById('prev-decade').addEventListener('click', function () {
            const currentDecade = parseInt(document.getElementById('current-decade').textContent.split('s')[0]);
            const prevDecade = currentDecade - 10;
            document.getElementById('current-decade').textContent = `${prevDecade}s`;
            fetchGuestsData(prevDecade).then(data => {
                // Update the chart with the fetched data
                updateChart(data, prevDecade);
            }).catch(error => {
                console.error(error);
            });
        });

        document.getElementById('next-decade').addEventListener('click', function () {
            const currentDecade = parseInt(document.getElementById('current-decade').textContent.split('s')[0]);
            const nextDecade = currentDecade + 10;
            document.getElementById('current-decade').textContent = `${nextDecade}s`;
            fetchGuestsData(nextDecade).then(data => {
                // Update the chart with the fetched data
                updateChart(data, nextDecade);
            }).catch(error => {
                console.error(error);
            });
        });


        // Initial chart setup with data for the current decade
        const currentDecade = new Date().getFullYear() - (new Date().getFullYear() % 10);
        document.getElementById('current-decade').textContent = `${currentDecade}s`;
        fetchGuestsData(currentDecade).then(data => {
            // Create the initial chart with the fetched data
            updateChart(data, currentDecade);
        }).catch(error => {
            console.error(error);
        });
    });
</script>

</body>

</html>
