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
        padding: 40px 0;
    }

    h1 {
        color: #0e4d0e;
        text-align: center;
        text-transform: uppercase;
        margin-bottom: 40px;
    }

    caption {
        font-size: 1.2em;
        text-transform: uppercase;
        margin-bottom: 10px;
    }

    table {
        border-collapse: collapse;
        width: 80%;
        margin: 20px auto;
        background-color: #fff;
        border: 2px solid #1fc724;
    }

    th, td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #1fc724;
        text-align: center;
    }

    th {
        background: #1fc724;
        color: white;
        text-transform: uppercase;
        font-size: 1em;
        width: 40px;
        text-align: center;
        height: 30px;
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

    .edit-button:hover {
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
    }

    .modal-content {
        background-color: #f9f9f9;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #ccc;
        width: 35%;
        text-align: center;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    .modal-header {
        position: relative;
    }

    .close {
        position: absolute;
        bottom: 30px;
        right: 10px;
        color: #aaa;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
        transition: color 0.3s;
    }

    .close:hover {
        color: black;
    }

    .modal-title {
        font-size: 24px;
        color: #0e4d0e;
    }

    .modal-body {
        text-align: center;
    }

    label {
        display: block;
        margin: 10px;
        font-weight: bold;
        color: #1fc724;
    }

    input[type="text"],
    input[type="number"] {
        width: auto;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    .modal-footer {
        text-align: center;
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
        margin-top: 20px;
        margin-bottom: 20px;
    }

    button:hover {
        background: radial-gradient(circle at -1% 57.5%, rgb(19, 170, 82) 0%, rgb(0, 102, 43) 90%);
    }

    .button-container {
    display: flex;
    align-items: center;
    justify-content: center;
}

.edit-button, .delete-button {
    padding: 5px 10px;
    margin: 5px;
}

.custom-delete-button {
    background-color: #FF0000; 
    color: #FFFFFF;
    padding: 5px 10px;
    margin: 5px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.custom-delete-button:hover {
    background: linear-gradient(108.4deg, rgb(253, 44, 56) 3.3%, rgb(176, 2, 12) 98.4%);
}


.checkbox-group, .checkboxs-group {
    display: inline-block;
    margin-right: 10px; /* Adjust the margin as needed for spacing between radio buttons */
}

.add-button{
    background-color: #1fc724;
    color: white;
    font-family: Arial, sans-serif;
    text-transform: uppercase;
    font-size: 1em;
    font-weight: bold;
    padding: 14px 20px;
    margin: 5px 98vh;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    border-radius: 10px;
    width: 25%;
}

.add-button:hover{
    background: radial-gradient(circle at -1% 57.5%, rgb(19, 170, 82) 0%, rgb(0, 102, 43) 90%);
}

</style>

<body>
    <div class="container">
        <h1><i class="fa-solid fa-pen-to-square"></i>&nbsp;Package Inclusions List</h1>
        

        <div class="column">

        <button class="add-button" onclick="openAddRoomModal()"><i class="fa-solid fa-plus"></i>&nbsp;&nbsp;Add New Inclusion</button>
            <!-- Second Table: Rooms in Overnight Package -->
            <table id="overnightTable">
                
                <?php
                require_once 'db_connection.php';

                $query = "SELECT * FROM package_inclusions ORDER BY inclusion_id";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    echo "<table id='overnightTable'>";
                    echo "<tr>";
                    echo "<th>Inclusion Name</th>";
                    echo "<th>Inclusion For</th>";
                    echo "<th>Actions</th>";
                    echo "</tr>";

                    while ($row = $result->fetch_assoc()) {
                        $inclusionName = $row["inclusion_name"];
                        $inclusionFor = $row["inclusion_for"];
                        $inclusionId = $row["inclusion_id"];

                        echo "<tr>";
                        echo "<td>$inclusionName</td>";
                        echo "<td>$inclusionFor</td>";
                        echo '<td class="button-container">
    <button class="edit-button" data-package-id="' . $inclusionId . '" onclick="openModalPackage(\'' . $inclusionId . '\', \'' . $inclusionName . '\', \'' . $inclusionFor . '\')"><i class="fa-solid fa-pen"></i></button>
    <button class="delete-button custom-delete-button" data-package-id="' . $inclusionId . '" onclick="confirmDeletePackage(\'' . $inclusionId . '\')"><i class="fa-solid fa-trash"></i></button>
</td>';

                        echo "</tr>";
                    }

                    echo "</table>";
                } else {
                    echo "No overnight packages found.";
                }

                ?>
            </table>

            <div id="myModalPackage" class="modal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Inclusion</h4>
                        <span class="close" onclick="closeModalPackage()">&times;</span>
                    </div>
                    <div class="modal-body">
                        <form id="updatePackageForm">
                        <input type="hidden" id="updatePackageId" name="packageId" value="">
                            <label for="updatePackageName">Inclusion Name:</label>
                            <input type="text" class="form-control" id="updatePackageName" name="packageName" required>
                            <label for="updatePackagePrice">Inclusion For:</label>
                            <div class="checkbox-group">
    <input type="checkbox" id="updatePackageDay" name="packagePrice[]" value="day">
    <label for="updatePackageDay">Day</label>
</div>
<div class="checkbox-group">
    <input type="checkbox" id="updatePackageNight" name="packagePrice[]" value="night">
    <label for="updatePackageNight">Night</label>
</div>
<div class="checkbox-group">
    <input type="checkbox" id="updatePackageOvernight" name="packagePrice[]" value="overnight">
    <label for="updatePackageOvernight">Overnight</label>
</div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="updatePackage()">Update</button>
                    </div>
                </div>
            </div>


                        <!-- New modal for adding a new room -->
            <div id="addRoomModal" class="modal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add New Package</h4>
                        <span class="close" onclick="closeAddRoomModal()">&times;</span>
                    </div>
                    <div class="modal-body">
                        <form id="addRoomForm">
                            <!-- Input fields for new room details -->
                            <label for="addRoomName">Inclusion Name:</label>
                            <input type="text" class="form-control" id="addRoomName" name="roomName" required>
                            <label for="addRoomPrice">Inclusion For:</label>
<div class="checkboxs-group">
    <input type="checkbox" id="addRoomDay" name="packagePrices[]" value="day">
    <label for="addRoomDay">Day</label></div>
    <div class="checkboxs-group">
    
    <input type="checkbox" id="addRoomNight" name="packagePrices[]" value="night">
    <label for="addRoomNight">Night</label></div>
    <div class="checkboxs-group">
    
    <input type="checkbox" id="addRoomOvernight" name="packagePrices[]" value="overnight">
    <label for="addRoomOvernight">Overnight</label>
</div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="addRoom()">Add Package</button>
                        <button type="button" class="btn btn-danger" onclick="closeAddRoomModal()">Close</button>
                    </div>
                </div>
            </div>

            <!-- Delete Confirmation Modal -->
            <div id="deleteConfirmationModal" class="modal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Package</h4>
                        <span class="close" onclick="closeDeleteConfirmationModal()">&times;</span>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this package?</p>
                    </div>
                    <div class="modal-footer">
                    <input type="hidden" id="deletePackageId" value="">
                        <button class="btn btn-danger" onclick="deletePackage()">Yes</button>
                        <button class="btn btn-primary" onclick="closeDeleteConfirmationModal()">No</button>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <script>
        function openModalPackage(packageId, roomName, inclusionFor) {
    var modal = document.getElementById("myModalPackage");
    modal.style.display = "block";

    // Set the packageId in the hidden input field
    document.getElementById("updatePackageId").value = packageId;

    // Populate modal input fields with the data from the selected row
    document.getElementById("updatePackageName").value = roomName;

    // Check the checkboxes based on the inclusionFor value
    var checkboxes = document.getElementsByName("packagePrice[]");
    
    checkboxes.forEach(function(checkbox) {
        checkbox.checked = inclusionFor.includes(checkbox.value);
    });

    // Add animation classes to the modal for smooth transitions
    modal.classList.remove("modal-exiting");
    modal.classList.add("modal-entering");

    // You can also add a setTimeout to remove the entering class after the animation duration (0.5s in this example).
    setTimeout(function() {
        modal.classList.remove("modal-entering");
        modal.classList.add("modal-entered");
    }, 500);
}


        function closeModalPackage() {
            var modal = document.getElementById("myModalPackage");
            modal.style.display = "none";

            // Optionally, you can add animation classes for a smooth transition when closing the modal.
            modal.classList.remove("modal-entered");
            modal.classList.add("modal-exiting");
        }

        function updatePackage() {
    // Get the values from the input fields
    var packageId = document.getElementById("updatePackageId").value;
    var packageName = document.getElementById("updatePackageName").value;

    // Get the selected checkboxes
    var checkboxes = document.getElementsByName("packagePrice[]");
    var selectedCheckboxes = Array.from(checkboxes).filter(checkbox => checkbox.checked).map(checkbox => checkbox.value);

    // Create an object to hold the updated data
    var updatedData = {
        packageId: packageId,
        packageName: packageName,
        inclusionFor: selectedCheckboxes, // Add the selected checkboxes to the updated data
    };

    // Send an AJAX request to update the package
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "update_inclusion.php", true);
    xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

    xhr.onload = function() {
        if (xhr.status === 200) {
            // Handle a successful update here, e.g., display a success message.
            console.log("Inclusion updated successfully.");
            location.reload();
        } else {
            // Handle an error in updating the package.
            console.error("Error updating Inclusion.");
        }
        closeModalPackage();
    };

    xhr.send(JSON.stringify(updatedData));
}


        function openAddRoomModal() {
    var modal = document.getElementById("addRoomModal");
    modal.style.display = "block";


    // Add animation classes for smooth transitions (similar to the existing modal).
    modal.classList.remove("modal-exiting");
    modal.classList.add("modal-entering");
}
function closeAddRoomModal() {
            var modal = document.getElementById("addRoomModal");
            modal.style.display = "none";

            // Optionally, you can add animation classes for a smooth transition when closing the modal.
            modal.classList.remove("modal-entered");
            modal.classList.add("modal-exiting");
        }


        function addRoom() {
    // Get the values from the input fields
    var roomName = document.getElementById("addRoomName").value;

    // Get the selected checkboxes
    var checkboxes = document.getElementsByName("packagePrices[]");
    var selectedCheckboxes = Array.from(checkboxes).filter(checkbox => checkbox.checked).map(checkbox => checkbox.value);

    // Create a FormData object to send as a form
    var formData = new FormData();
    formData.append("roomName", roomName);
    formData.append("inclusionFor", selectedCheckboxes.join(',')); // Convert array to comma-separated string

    // Send an AJAX request to insert the new room into the database
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "add_inclusion.php", true);

    xhr.onload = function() {
        if (xhr.status === 200) {
            // Handle a successful room insertion here, e.g., display a success message.
            console.log("Inclusion added successfully.");
            // You can also update the UI to show the newly added room in the table.
            location.reload(); // Refresh the page to display the updated data.
        } else {
            // Handle an error in adding the room.
            console.error("Error adding inclusion.");
        }
        closeAddRoomModal();
    };

    xhr.send(formData);
}

function confirmDeletePackage(packageId) {
    var modal = document.getElementById("deleteConfirmationModal");
    modal.style.display = "block";

    // Set the packageId in a hidden input field
    document.getElementById("deletePackageId").value = packageId;
}


function closeDeleteConfirmationModal() {
    var modal = document.getElementById("deleteConfirmationModal");
    modal.style.display = "none";
}

function deletePackage() {
    var packageId = document.getElementById("deletePackageId").value;

    // Send an AJAX request to delete the selected package
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "delete_inclusion.php", true);

    // Set the Content-Type header to application/x-www-form-urlencoded
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function() {
        if (xhr.status === 200) {
            // Handle a successful package deletion here, e.g., display a success message.
            console.log("Inclusion deleted successfully.");
            location.reload(); // Refresh the page to remove the deleted package.
        } else {
            // Handle an error in deleting the package.
            console.error("Error deleting Inclusion.");
        }
        closeDeleteConfirmationModal();
    };

    // Encode the packageId and send it as POST data
    var formData = "packageId=" + encodeURIComponent(packageId);
    xhr.send(formData);
}




    </script>
</body>

</html>
