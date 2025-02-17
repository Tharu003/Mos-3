<?php
include 'db/connection.php'; // Include the database connection

if (isset($_GET['coach_name'])) {
    $coach_name = $_GET['coach_name'];
    $sql = "SELECT * FROM coaches WHERE coach_name = '$coach_name'";
    $result = $conn->query($sql);
    $coach = [];

    if ($result->num_rows > 0) {
        $coach = $result->fetch_assoc();
        echo json_encode($coach);
    } else {
        echo json_encode(null); // No matching coach found
    }

    $conn->close();
}
?>
