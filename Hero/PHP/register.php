<?php
session_start();
include '../db/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password']; // Plain text password (Not recommended)

    // Insert admin into the users table with role = 'admin'
    $query = "INSERT INTO users (username, password, role) VALUES (?, ?, 'admin')";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $username, $password);
    
    if ($stmt->execute()) {
        echo "Admin registered successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register Admin</title>
</head>
<body>
    <h2>Admin Registration</h2>
    <form action="register.php" method="POST">
        <label>Username:</label>
        <input type="text" name="username" required>
        <br>
        <label>Password:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Register</button>
    </form>
</body>
</html>
