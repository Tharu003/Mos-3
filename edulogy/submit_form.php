<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "player_registration"; // Database name eka hadala mekata update karanna

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form data gannawa
$full_name = $_POST['full_name'];
$district = $_POST['district'];
$address = $_POST['address'];
$registered = $_POST['registered'];
$nic = $_POST['nic'];
$phone = $_POST['phone'];
$active_status = $_POST['active_status'];

// SQL Insert Query
$sql = "INSERT INTO coaches_information (full_name, district, address, registered, nic, phone, active_status) 
        VALUES ('$full_name', '$district', '$address', '$registered', '$nic', '$phone', '$active_status')";

if ($conn->query($sql) === TRUE) {
    echo "Form submitted successfully!";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
