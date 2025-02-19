<?php
session_start();
include '../db/connection.php'; // Include database connection

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password']; // Plain text password (Not recommended)

    // Prepare SQL query to fetch the user with the given username and admin role
    $query = "SELECT * FROM users WHERE username=? AND role='admin'";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($row = $result->fetch_assoc()) {
        // Check if the password matches (plain text comparison)
        if ($password == $row['password']) {
            // If credentials are correct, start the session and redirect to admin dashboard
            $_SESSION['admin_logged_in'] = true;
            header("Location: ../index.php");
            exit();
        } else {
            // Invalid password message
            echo "<script>alert('Invalid Password');</script>";
        }
    } else {
        // Admin not found message
        echo "<script>alert('Admin not found');</script>";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    <!-- Bootstrap 4 CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS for Styling -->
    <style>
        body {
            background-color: #e0e5ec;
            font-family: 'Arial', sans-serif;
        }

        .login-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 30px;
            background-color: #e0e5ec;
            border-radius: 15px;
            box-shadow: 15px 15px 30px #a1a8b8, -15px -15px 30px #ffffff;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            font-size: 14px;
            font-weight: bold;
            color: #555;
            position: absolute;
            top: 12px;
            left: 16px;
            transition: 0.3s;
        }

        .form-group {
            position: relative;
            margin-bottom: 20px;
        }

        input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 20px;
            box-sizing: border-box;
            background-color: #e0e5ec;
            color: #555;
            box-shadow: inset 4px 4px 8px #a1a8b8, inset -4px -4px 8px #ffffff;
            transition: all 0.3s ease;
        }

        input:focus {
            outline: none;
            box-shadow: inset 4px 4px 8px #a1a8b8, inset -4px -4px 8px #ffffff, 0 0 10px rgba(0, 123, 255, 0.6);
            border: 1px solid #007bff;
        }

        input:focus + label, input:not(:placeholder-shown) + label {
            top: -12px;
            left: 16px;
            font-size: 12px;
            color: #007bff;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            box-shadow: 4px 4px 8px #a1a8b8, -4px -4px 8px #ffffff;
        }

        button:hover {
            background-color: #0056b3;
        }

        .alert {
            margin-bottom: 15px;
            border-radius: 8px;
            padding: 15px;
        }

        .footer-text {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #555;
        }

        .footer-text a {
            text-decoration: none;
            color: #007bff;
        }

        .form-control {
            background-color: transparent !important;
            box-shadow: none !important;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>Admin Login</h2>

        <?php
        // Display a message if redirected with a login alert
        if (isset($_GET['msg'])) {
            echo "<div class='alert alert-danger'>" . htmlspecialchars($_GET['msg']) . "</div>";
        }
        ?>

        <form action="login.php" method="POST">
            <div class="form-group">
                <input type="text" id="username" name="username" required placeholder=" ">
                <label for="username">Username:</label>
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password" required placeholder=" ">
                <label for="password">Password:</label>
            </div>
            <button type="submit">Login</button>
        </form>

        <div class="footer-text">
            <p>Don't have an account? <a href="#">Sign up</a></p>
        </div>
    </div>

    <!-- Bootstrap and JQuery JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

