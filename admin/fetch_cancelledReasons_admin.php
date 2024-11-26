<?php
 include 'db_connection.php';

// Define an array of reasons for cancellation (excluding "Other Reason")
$reasons = ["Change of Travel Plans", "Change of Mind", "Work Commitments", "Double Booking", "Unforeseen Circumstances", "Personal Reasons"];

// Initialize an array to store monthly counts for each reason
$monthlyCounts = array_fill(0, count($reasons), 0);

// SQL query to retrieve data and count cancellations for each reason
$sql = "SELECT reason, other_reason, DATE_FORMAT(cdate, '%m') AS month
        FROM cancellation
        WHERE YEAR(cdate) = ? AND (reason IS NOT NULL OR other_reason IS NOT NULL)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $year);
$year = isset($_GET['year']) ? intval($_GET['year']) : date("Y");

$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $reason = $row['reason'];
        $otherReason = $row['other_reason'];
        $month = intval($row['month']) - 1; // Adjust for 0-based array

        // Increment the count for the corresponding reason and month
        // Increment the count for the corresponding reason and month
$reasonIndex = array_search($reason, $reasons);
if ($reasonIndex !== false) {
    $monthlyCounts[$reasonIndex] += 1;
} elseif (!empty($otherReason)) {
    // If "Other Reason" is not empty, increment its count
    $otherReasonIndex = count($reasons); // Index for "Other Reason"
    if (!isset($monthlyCounts[$otherReasonIndex])) {
        $monthlyCounts[$otherReasonIndex] = 0; // Initialize count if it doesn't exist
    }
    $monthlyCounts[$otherReasonIndex] += 1;
}
    }
}

// Convert the monthly counts to JSON format
$response = json_encode($monthlyCounts);

// Set response headers to indicate JSON content
header('Content-Type: application/json');

// Output the JSON response
echo $response;

// Close the database connection
$stmt->close();
$conn->close();
?>