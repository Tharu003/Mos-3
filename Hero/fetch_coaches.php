<?php
include 'db/connection.php'; // Include the database connection

$sql = "SELECT coach_name FROM coaches";
$result = $conn->query($sql);
$coaches = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $coaches[] = $row;
    }
    echo json_encode($coaches);
} else {
    echo json_encode([]);
}

$conn->close();
?>
