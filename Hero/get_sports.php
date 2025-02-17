<?php
// Include the database connection
include 'db/connection.php'; 

// Fetch sports from the database
$sql = "SELECT name FROM sports";
$result = $conn->query($sql);

// Create an array to store sports
$sports = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sports[] = $row['name'];
    }
}

// Return sports as JSON
echo json_encode($sports);

// Close the database connection
$conn->close();
?>
