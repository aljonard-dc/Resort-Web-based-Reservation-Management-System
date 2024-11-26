<?php
// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the column name and new value from the request
    $column = $_POST['column'];
    $newValue = $_POST['value'];

    // Perform database update
    require_once 'db_connection.php'; // Include your database connection code

    // Check if it's a time update or price update
    if (strpos($column, '_check_in') !== false) {
        // Handle time updates
        $query = "UPDATE package_time SET check_in_time = ? WHERE id = ?";

        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare($query);
        $stmt->bind_param('si', $newValue, getIdByTimeColumnName($column));
    }
    else if (strpos($column, '_check_out') !== false) {
        // Handle time updates
        $query = "UPDATE package_time SET check_out_time = ? WHERE id = ?";

        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare($query);
        $stmt->bind_param('si', $newValue, getIdByTimeColumnName($column));
    } else {
        // Handle price updates
        $query = "UPDATE package_prices SET package_price = ? WHERE price_id = ?";

        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare($query);
        $stmt->bind_param('di', $newValue, getPriceIdByColumnName($column));
    }

    if ($stmt->execute()) {
        // Update successful
        echo "Update successful.";
    } else {
        // Update failed
        echo "Error: Unable to update value.";
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}

function getPriceIdByColumnName($columnName) {
    // Define a mapping of column names to price IDs for price updates
    $columnToPriceId = [
        'daytour' => 1,
        'nighttour' => 2,
        'villa' => 3,
        'twovillas' => 4,
        'twovillas_onesmalldorm' => 5,
        'twovillas_onebigdorm' => 6,
        'twovillas_twodorms' => 7,
        'smalldorm' => 8,
        'bigdorm' => 9,
        'day_excess' => 10,
        'overnight_excess' => 11,
        'dmax_pax' => 12,
        'nmax_pax' => 13,
        'night_excess' => 14,
    ];

    // Check if the column name exists in the mapping
    if (array_key_exists($columnName, $columnToPriceId)) {
        return $columnToPriceId[$columnName];
    }

    return 0; // Return a default value or handle the case when the column is not found
}

function getIdByTimeColumnName($columnName) {
    // Define a mapping of column names to package IDs for time updates
    $columnToId = [
        'day_check_in' => 1,
        'day_check_out' => 1,
        'night_check_in' => 2,
        'night_check_out' => 2,
        'overnight_check_in' => 3,
        'overnight_check_out' => 3,
        // Add more mappings as needed
    ];

    // Check if the column name exists in the mapping
    if (array_key_exists($columnName, $columnToId)) {
        return $columnToId[$columnName];
    }

    return 0; // Return a default value or handle the case when the column is not found
}
?>
