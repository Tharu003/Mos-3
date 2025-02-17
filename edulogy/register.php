<?php
session_start();
include 'db/connection.php'; // Your database connection file

// Check for error or success messages in session
$error_msg = isset($_SESSION['error']) ? $_SESSION['error'] : '';
$success_msg = isset($_SESSION['success']) ? $_SESSION['success'] : '';

// Clear messages after displaying
unset($_SESSION['error'], $_SESSION['success']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Check if username already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $_SESSION['error'] = "Username already taken.";
        header("Location: register.php");
        exit();
    }

    // Insert new user into database (no password hashing)
    $stmt = $conn->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $password, $role);
    
    if ($stmt->execute()) {
        $_SESSION['success'] = "Registration successful. You can now log in.";
        header("Location: login.php");
        exit();
    } else {
        $_SESSION['error'] = "There was an error during registration.";
        header("Location: register.php");
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="path_to_your_css.css"> <!-- Add your CSS path -->
</head>
<body>
    <div class="register-container">
        <h2>Register</h2>
        
        <!-- Display success or error message -->
        <?php if ($error_msg): ?>
            <div class="error-message"><?= htmlspecialchars($error_msg) ?></div>
        <?php endif; ?>

        <?php if ($success_msg): ?>
            <div class="success-message"><?= htmlspecialchars($success_msg) ?></div>
        <?php endif; ?>

        <form method="POST" action="register.php">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="form-group">
                <label for="role">Role</label>
                <select id="role" name="role" required>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>

            <button type="submit">Register</button>
        </form>

        <div class="login-link">
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </div>
    </div>
</body>
</html>
