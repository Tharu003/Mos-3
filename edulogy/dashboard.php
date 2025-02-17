<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Get role from session
$role = $_SESSION['role']; // 'admin' or 'user'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Admin Navbar -->
    <?php if ($role == 'admin') { ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Admin Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Manage Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">View Reports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <?php } ?>

    <!-- User Navbar -->
    <?php if ($role == 'user') { ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">User Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavUser" aria-controls="navbarNavUser" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavUser">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">My Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">View Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <?php } ?>

    <!-- Main Content Area -->
    <div class="container mt-4">
        <h1>Welcome to the Dashboard</h1>

        <!-- Common Content for Both Admin and User -->
        <div class="common-content">
            <h3>Important Updates</h3>
            <p>Here you can find the latest updates on the system and general announcements.</p>
            <p>Stay tuned for new features and improvements!</p>
        </div>

        <!-- Content based on role -->
        <?php if ($role == 'admin') { ?>
            <div class="admin-section">
                <h3>Admin Features</h3>
                <p>Here you can manage users, view analytics, and more!</p>
            </div>
        <?php } ?>

        <?php if ($role == 'user') { ?>
            <div class="user-section">
                <h3>User Features</h3>
                <p>Here you can view your profile and orders.</p>
            </div>
        <?php } ?>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
