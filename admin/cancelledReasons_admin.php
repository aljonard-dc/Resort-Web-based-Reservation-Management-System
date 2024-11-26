<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chart.js">
    <link rel="icon" href="..\images\logo.png" type="image/x-icon">
    <title>Cancellations - Natura Verde Farm and Private Resort</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
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

    .container {
        max-width: 1000px;
        max-height: 480px;
        margin: 0 auto;
        padding: 40px 0;
        justify-content: center;
    }

    h1 {
        color: #0e4d0e;
        text-align: center;
        text-transform: uppercase;
        margin-bottom: 30px;
    }

    #year-navigation {
        text-align: center;
    }

    #year-navigation button,
    #year-navigation span {
        margin: 5px;
    }

    #prev-year {
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

    #current-year {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 1em;
    }

    #next-year {
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
    #next-year:hover {
        background: radial-gradient(circle at -1% 57.5%, rgb(19, 170, 82) 0%, rgb(0, 102, 43) 90%);
    }

    #cancellations-button {
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

    #cancellations-button:hover {
        background: radial-gradient(circle at -1% 57.5%, rgb(19, 170, 82) 0%, rgb(0, 102, 43) 90%);
    }

    #chart-container {
            max-height: 650px;
            display: flex; /* Use flexbox for centering */
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
            margin-bottom: 50px;
        }
</style>

<body>
    <div class="container">
        <h1><i class="fa-solid fa-calendar-day"></i>&nbsp;Cancellations</h1>
        <div id="year-navigation">
            <button id="prev-year">Previous Year</button>
            <span id="current-year">Year YYYY</span>
            <button id="next-year">Next Year</button>
        </div>
        <div id="chart-container">
            <canvas id="monthly-cancellations-chart"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            function fetchCancellationsData(year) {
                return new Promise(function (resolve, reject) {
                    const xhr = new XMLHttpRequest();
                    const url = 'fetch_cancelledReasons_admin.php?year=' + year; // Include the 'year' parameter in the URL

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

            function updateChart(data) {
                if (chart) {
                    chart.destroy();
                }

                const customLabels = ["Change of Travel Plans", "Change of Mind", "Work Commitments", "Double Booking", "Unforeseen Circumstances", "Personal Reasons", "Other Reason"];

                // Generate unique background colors for a pie chart
                const backgroundColors = customLabels.map((_, index) => {
                    return `rgba(${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)}, 0.6)`;
                });

                // Convert data into an array suitable for a pie chart
                const pieData = {
                    labels: customLabels,
                    datasets: [{
                        data: data,
                        backgroundColor: backgroundColors,
                    }]
                };

                chart = new Chart(ctx, {
                    type: 'pie', // Change chart type to 'pie'
                    data: pieData, // Use pie chart data structure
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'right',
                            }
                        }
                    }
                });
            }

            const chartCanvas = document.getElementById('monthly-cancellations-chart');
            const ctx = chartCanvas.getContext('2d');
            let chart;

            document.getElementById('prev-year').addEventListener('click', function () {
                const year = parseInt(document.getElementById('current-year').textContent.split(' ')[1]) - 1;
                document.getElementById('current-year').textContent = `Year ${year}`;
                fetchCancellationsData(year).then(data => {
                    updateChart(data);
                }).catch(error => {
                    console.error(error);
                });
            });

            document.getElementById('next-year').addEventListener('click', function () {
                const year = parseInt(document.getElementById('current-year').textContent.split(' ')[1]) + 1;
                document.getElementById('current-year').textContent = `Year ${year}`;
                fetchCancellationsData(year).then(data => {
                    updateChart(data);
                }).catch(error => {
                    console.error(error);
                });
            });

            const currentYear = new Date().getFullYear();
            document.getElementById('current-year').textContent = `Year ${currentYear}`;
            fetchCancellationsData(currentYear).then(data => {
                updateChart(data);
            }).catch(error => {
                console.error(error);
            });
        });
    </script>
</body>

</html>
