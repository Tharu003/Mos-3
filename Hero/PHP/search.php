<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php?msg=Login please");
    exit();
}
?>
<?php
include '../db/connection.php'; // Include your database connection

if (isset($_POST['nic'])) {
    $nic = $_POST['nic'];
    
    // Query to check if NIC exists in the database
    $sql = "SELECT * FROM students WHERE nic = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nic);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // NIC found, fetch data to display in form
        $student = $result->fetch_assoc();
        $message = "NIC found! You can edit the student details.";
        $isEditMode = true; // Set a flag to indicate that we are in edit mode
    } else {
        // NIC not found, show a message and provide a button to go to the add new student form
        $message = "NIC not found! You can add a new student.";
        $redirectPage = "form1.html";
        $isEditMode = false;
    }
}
?>

<?php if (isset($message)): ?>
    <div>
        <p><?php echo $message; ?></p>
        <?php if ($isEditMode): ?>
            <!-- Edit Button that redirects to edit.php with student_id as query parameter -->
            <a href="edit.php?student_id=<?php echo $student['student_id']; ?>" class="btn">Edit</a>

            <!-- Manage Events Button that redirects to manage_events.php with student_id as query parameter -->
            <a href="manage_events.php?student_id=<?php echo $student['student_id']; ?>" class="btn">Manage Events</a>
        <?php else: ?>
            <a href="<?php echo $redirectPage; ?>" class="btn">Go to Form</a>
        <?php endif; ?>
    </div>
<?php endif; ?>


<!-- Search Form -->
<form method="POST" action="">
    <input type="text" name="nic" placeholder="Enter NIC to Search" required>
    <button type="submit">Search</button>
</form>
