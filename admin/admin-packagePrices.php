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
        padding: 30px 0;
    }


    h1 {
        color: #0e4d0e;
        text-align: center;
        text-transform: uppercase;
        margin-bottom: 40px;
    }

    caption{
        font-size: 1.2em;
        text-transform: uppercase;
        margin-bottom: 10px;
        font-weight: bold;
        color: #265426;
    }

    table {
        border-collapse: collapse;
        background-color: #fff;
        border: 2px solid #4CAF50;
        border-radius: 5px;
        margin: 20px 70px;
        width: 395px;
        float: left; /* Float tables left to make them appear in a row */
    }

    th, td {
        padding: 7px;
        border-bottom: 1px solid #1fc724;
        text-align: center;
        }
        
    th {
        background: #1fc724;
        color: white;
        text-transform: uppercase;
        font-size: 1em;
        text-align: center;
        height: 50px;
    }

    td{
        height: 40px;
    }

    tr:nth-child(even) {
        background-color: #E8E8E8;
    }

    .edit-button {
        background-color: #1fc724;
        color: white;
        font-family: Arial, sans-serif;
        text-transform: uppercase;
        border-radius: 5px;
        font-weight: bold;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
    }

    .edit-button:hover{
        background: radial-gradient(circle at -1% 57.5%, rgb(19, 170, 82) 0%, rgb(0, 102, 43) 90%);
    }
    
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.7); 
        transition: opacity 0.5s; 
    }
    .modal-content {
        background-color: #f9f9f9; 
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #ccc;
        width: 50%;
        text-align: center;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); 
    }
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
        transition: color 0.3s;
    }
    .close:hover {
        color: black;
    }

    
    .modal-entering {
        opacity: 0;
    }
    .modal-entered {
        opacity: 1; 
    }
    .modal-exiting {
        opacity: 0; 
    }

    h2 {
        color: #0e4d0e; 
        font-size: 1.2em; 
    }
    #firstColumnDisplay {
        color: #1fc724; 
        font-size: 1.1em; 
    }
    #newPrice {
        padding: 10px;
        font-size: 16px;
        border: 2px solid rgba(153, 153, 153, 0.223);
        border-radius: 5px;
        width: 90%; 
        margin: 10px auto;
        display: block; 
    }
    #newPrice::placeholder {
        color: #999; 
    }

    #newPrice:focus{
        outline:none; 
        border-bottom-color:#006600; 
    }

    button {
        background-color: #1fc724;
        color: #fff; 
        font-family: Arial, sans-serif;
        text-transform: uppercase;
        border-radius: 5px;
        font-weight: bold;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        transition: background-color 0.3s; 
    }
    button:hover {
        background: radial-gradient(circle at -1% 57.5%, rgb(19, 170, 82) 0%, rgb(0, 102, 43) 90%);
    }


</style>

<body>

    <div class="container">

        <h1><i class="fa-solid fa-person-swimming"></i>&nbsp;Manage Packages</h1>


        <!-- First Table: Day and Night Tour Prices -->
        <table id="dayNightTable" class="table-small">
            <caption>Tour Prices</caption>
            <tr>
                <th>Tour Name</th>
                <th>Tour Price</th>
            </tr>
            <tr>
                <td>Day Tour</td>
                <td>
                    <?php
                    // PHP code to fetch 'daytour' price from the database
                    require_once 'db_connection.php';

                    $query = "SELECT * FROM package_prices WHERE price_id = 1";
                    $result = $conn->query($query);
                    $row = $result->fetch_assoc();
                    echo "₱" . $row["package_price"];

                
                    ?> &nbsp; &nbsp; &nbsp; 
                    <button class="edit-button" onclick="openModal('daytour', <?php echo $row["package_price"]; ?>, 'Day Tour Price')"><i class="fa-solid fa-pen"></i></button>
                </td>
            </tr>
            <tr>
                <td>Night Tour</td>
                <td>
                    <?php
                    // PHP code to fetch 'nighttour' price from the database
                    require_once 'db_connection.php';

                    $query = "SELECT * FROM package_prices WHERE price_id = 2";
                    $result = $conn->query($query);
                    $row = $result->fetch_assoc();
                    echo "₱" . $row["package_price"];


                    ?> &nbsp; &nbsp; &nbsp; 
                    <button class="edit-button" onclick="openModal('nighttour', <?php echo $row["package_price"]; ?>, 'Night Tour Price')"><i class="fa-solid fa-pen"></i></button>
                </td>
            </tr>
        </table>


            <table id="paxTable" class="table-small">
            <caption>Maximum Pax</caption>
            <tr>
                <th>Tour Name</th>
                <th>Maximum Pax</th>

                <tr>
                <td>Day Tour</td>
                <td>
                    <?php
                    require_once 'db_connection.php';

                    $query = "SELECT * FROM package_prices WHERE price_id = 12";
                    $result = $conn->query($query);
                    $row = $result->fetch_assoc();
                    echo "&nbsp;&nbsp;&nbsp;" . $row["package_price"];

                    ?> &nbsp; &nbsp; &nbsp; 
                    <button class="edit-button" onclick="openModal('dmax_pax', <?php echo $row["package_price"]; ?>, 'Maximum Pax for Day Tour')"><i class="fa-solid fa-pen"></i></button>
                </td>
            </tr>
            <tr>
                <td>Night Tour</td>
                <td>
                    <?php
                    require_once 'db_connection.php';

                    $query = "SELECT * FROM package_prices WHERE price_id = 13";
                    $result = $conn->query($query);
                    $row = $result->fetch_assoc();
                    echo "&nbsp;&nbsp;&nbsp;" . $row["package_price"];

                    
                    ?> &nbsp; &nbsp; &nbsp; 
                    <button class="edit-button" onclick="openModal('nmax_pax', <?php echo $row["package_price"]; ?>, 'Maximum Pax for Night Tour')"><i class="fa-solid fa-pen"></i></button>
                </td>
            </tr>
        </table>


          <!-- Third Table: Excess Guests -->
          <table id="excessTable" class="table-small">
            <caption>Excess Guests</caption>
            <tr>
                <th>Excess for</th>
                <th>Excess Price</th>
            </tr>
            <tr>
                <td>Day Tour</td>
                <td>
                    <?php
                    // PHP code to fetch 'daynight_excess' price from the database
                    require_once 'db_connection.php';

                    $query = "SELECT * FROM package_prices WHERE price_id = 10";
                    $result = $conn->query($query);
                    $row = $result->fetch_assoc();
                    echo "₱" . $row["package_price"];

                    
                    ?> &nbsp; &nbsp; &nbsp; 
                    <button class="edit-button" onclick="openModal('day_excess', <?php echo $row["package_price"]; ?>, 'Day Tour Excess')"><i class="fa-solid fa-pen"></i></button>
                </td>
            </tr>
            <tr>
                <td>Night Tour</td>
                <td>
                    <?php
                    // PHP code to fetch 'daynight_excess' price from the database
                    require_once 'db_connection.php';

                    $query = "SELECT * FROM package_prices WHERE price_id = 14";
                    $result = $conn->query($query);
                    $row = $result->fetch_assoc();
                    echo "₱" . $row["package_price"];

                    
                    ?> &nbsp; &nbsp; &nbsp; 
                    <button class="edit-button" onclick="openModal('night_excess', <?php echo $row["package_price"]; ?>, 'Night Tour Excess')"><i class="fa-solid fa-pen"></i></button>
                </td>
            </tr>
            <tr>
                <td>Overnight Package</td>
                <td>
                    <?php
                    // PHP code to fetch 'overnight_excess' price from the database
                    require_once 'db_connection.php';

                    $query = "SELECT * FROM package_prices WHERE price_id = 11";
                    $result = $conn->query($query);
                    $row = $result->fetch_assoc();
                    echo "₱" . $row["package_price"];
                    ?>&nbsp; &nbsp; &nbsp;
                    <button class="edit-button" onclick="openModal('overnight_excess', <?php echo $row["package_price"]; ?>, 'Overnight Package Excess')"><i class="fa-solid fa-pen"></i></button>
                </td>
            </tr>
            
            </table>



        <table id="timeTable">
            <caption>Check-in and Check-Out Time</caption>
            <tr>
                <th>Tour Name</th>
                <th>Check In Time</th>
                <th>Check Out Time</th>

            </tr>
            <tr>
                <td>Day Tour</td>
                <td>
                    <?php
                   
                    require_once 'db_connection.php';

                    $query = "SELECT * FROM package_time WHERE id = 1";
                    $result = $conn->query($query);
                    $row = $result->fetch_assoc();
                    $dcheck_in = $row["check_in_time"];
                    $checkInTime = date("h:i A", strtotime($dcheck_in));
                    echo $checkInTime;

                    
                    ?>
                    <button class="edit-button" onclick="openModal('day_check_in', '<?php echo $row["check_in_time"]; ?>', 'Day Tour Check-in Time')"><i class="fa-solid fa-pen"></i></button>

                </td>
                <td>
                    <?php
                   
                    require_once 'db_connection.php';

                    $query = "SELECT * FROM package_time WHERE id = 1";
                    $result = $conn->query($query);
                    $row = $result->fetch_assoc();
                    $dcheck_in = $row["check_out_time"];
                    $checkInTime = date("h:i A", strtotime($dcheck_in));
                    echo $checkInTime;

                    
                    ?>
                    <button class="edit-button" onclick="openModal('day_check_out', '<?php echo $row["check_out_time"]; ?>', 'Day Tour Check-out Time')"><i class="fa-solid fa-pen"></i></button>

                </td>
            </tr>
            <tr>
                <td>Night Tour</td>
                <td>
                    <?php
                   
                    require_once 'db_connection.php';

                    $query = "SELECT * FROM package_time WHERE id = 2";
                    $result = $conn->query($query);
                    $row = $result->fetch_assoc();
                    $dcheck_in = $row["check_in_time"];
                    $checkInTime = date("h:i A", strtotime($dcheck_in));
                    echo $checkInTime;

                    
                    ?>
                    <button class="edit-button" onclick="openModal('night_check_in', '<?php echo $row["check_in_time"]; ?>', 'Night Tour Check-in Time')"><i class="fa-solid fa-pen"></i></button>

                </td>

                <td>
                    <?php
                   
                    require_once 'db_connection.php';

                    $query = "SELECT * FROM package_time WHERE id = 2";
                    $result = $conn->query($query);
                    $row = $result->fetch_assoc();
                    $dcheck_in = $row["check_out_time"];
                    $checkInTime = date("h:i A", strtotime($dcheck_in));
                    echo $checkInTime;

                    
                    ?>
                    <button class="edit-button" onclick="openModal('night_check_out', '<?php echo $row["check_out_time"]; ?>', 'Night Tour Check-out Time')"><i class="fa-solid fa-pen"></i></button>

                </td>
            </tr>
            <tr>
                <td>Overnight Package</td>
                <td>
                    <?php
                   
                    require_once 'db_connection.php';

                    $query = "SELECT * FROM package_time WHERE id = 3";
                    $result = $conn->query($query);
                    $row = $result->fetch_assoc();
                    $dcheck_in = $row["check_in_time"];
                    $checkInTime = date("h:i A", strtotime($dcheck_in));
                    echo $checkInTime;

                    
                    ?>
                    <button class="edit-button" onclick="openModal('overnight_check_in', '<?php echo $row["check_in_time"]; ?>', 'Overnight Check-in Time')"><i class="fa-solid fa-pen"></i></button>

                </td>
                <td>
                    <?php
                   
                    require_once 'db_connection.php';

                    $query = "SELECT * FROM package_time WHERE id = 3";
                    $result = $conn->query($query);
                    $row = $result->fetch_assoc();
                    $dcheck_in = $row["check_out_time"];
                    $checkInTime = date("h:i A", strtotime($dcheck_in));
                    echo $checkInTime;

                    mysqli_close($conn);
                    ?>
                    <button class="edit-button" onclick="openModal('overnight_check_out', '<?php echo $row["check_out_time"]; ?>', 'Overnight Check-out Time')"><i class="fa-solid fa-pen"></i></button>

                </td>
            </tr>
            
            </table>

        <div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2>Update for <span id="firstColumnDisplay"></span></h2>
        <input type="number" id="newPrice" placeholder="New Price">
        <button onclick="savePrice()">Save</button>
    </div>
</div>



    </  div>



    <script>
  var currentColumnName = "";
    var firstColumnValue = "";

    function openModal(columnName, currentPrice, columnNameValue) {
        currentColumnName = columnName;
        firstColumnValue = columnNameValue;
        var modal = document.getElementById("myModal");
        modal.style.display = "block";

        // Display the first column value at the top of the input field in the modal
        var inputField = document.getElementById("newPrice");
        var firstColumnDisplay = document.getElementById("firstColumnDisplay");
        firstColumnDisplay.textContent = columnNameValue;
            // Determine if the input type should be changed to "time"
    if (columnName === 'day_check_in' || columnName === 'night_check_in' || columnName === 'overnight_check_in' || columnName === 'day_check_out' || columnName === 'night_check_out' || columnName === 'overnight_check_out') {
        inputField.type = 'time';

        inputField.value = currentPrice;

    } else {
        // Set it back to the default type (text)
        inputField.type = 'number';
        inputField.value = currentPrice;
    }


        // Add animation classes to the modal for smooth transitions
        modal.classList.remove("modal-exiting");
        modal.classList.add("modal-entering");

        // You can also add a setTimeout to remove the entering class after the animation duration (0.5s in this example).
        setTimeout(function () {
            modal.classList.remove("modal-entering");
            modal.classList.add("modal-entered");
        }, 500);
    }

    function closeModal() {
        var modal = document.getElementById("myModal");
        
        // Add the exiting class to trigger the fade-out animation
        modal.classList.remove("modal-entered");
        modal.classList.add("modal-exiting");

        // You can also add a delay before actually hiding the modal, matching the animation duration (0.5s in this example).
        setTimeout(function () {
            modal.style.display = "none";
            modal.classList.remove("modal-exiting");
        }, 500);
    }

    function savePrice() {
        var newValue = document.getElementById("newPrice").value;
        if (newValue !== "") {
            // Update the price in the database using AJAX
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "update_price.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4) {
                    // Handle success or error response from the server
                    if (xhr.status == 200) {
                        // The update was successful
                        closeModal();
                        // Reload the current page
                        location.reload();
                    } else {
                        // Handle errors here (e.g., display an error message)
                        alert("Error: Unable to update price.");
                    }
                }
            };
            xhr.send("column=" + currentColumnName + "&value=" + newValue);
        }
    }

    $(document).ready(function() {
    $('#myModal').modal('hide'); // Hide modal by default

    $('.edit-button').click(function() {
      var packageId = $(this).attr('data-package-id');
      var packageName = $(this).attr('data-package-name');
      var packagePrice = $(this).attr('data-package-price');
      var maxPax = $(this).attr('data-max-pax');

      $('#updatePackageName').val(packageName);
      $('#updatePackagePrice').val(packagePrice);
      $('#updatePackageMaxPax').val(maxPax);
      $('#myModal').modal('show'); // Show modal when edit button is clicked
    });

    function updatePackage() {
      var packageId = $('#updatePackageForm').attr('data-package-id');
      var packageName = $('#updatePackageName').val();
      var packagePrice = $('#updatePackagePrice').val();
      var maxPax = $('#updatePackageMaxPax').val();

      // AJAX request to update package in the database
      $.ajax({
        url: 'update_package.php',
        method: 'POST',
        data: {
          packageId: packageId,
          packageName: packageName,
          packagePrice: packagePrice,
          maxPax: maxPax
        },
        success: function(response) {
          if (response.success) {
            $('#myModal').modal('hide'); // Hide modal after successful update
            location.reload(); // Reload the page to reflect the updated package
          } else {
            alert('Error updating package: ' + response.error);
          }
        }
      });
    }
  });


</script>


</body>
</html>
