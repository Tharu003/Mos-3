<?php
include 'db/connection.php'; // Include your database connection

$student_id = isset($_GET['student_id']) ? $_GET['student_id'] : null;

if ($student_id) {
    // Fetch the student's name from the students table
    $sql = "SELECT name FROM students WHERE student_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();
        $student_name = $student['name']; // Get the student's name
    } else {
        echo "Student not found!";
        exit();
    }

    // Fetch all events for the student
    $sql = "SELECT * FROM events WHERE student_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $events = [];
    while ($row = $result->fetch_assoc()) {
        $events[] = $row;
    }
}

// Add event logic
if (isset($_POST['add_event'])) {
    $event_names = $_POST['event_names'];
    $year = $_POST['year'];

    $sql = "INSERT INTO events (student_id, event_names, year) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iss", $student_id, $event_names, $year);
    $stmt->execute();

    header("Location: manage_events.php?student_id=" . $student_id); // Refresh the page
    exit();
}

// Update event logic
if (isset($_POST['update_event'])) {
    $event_id = $_POST['event_id'];
    $event_names = $_POST['event_names'];
    $year = $_POST['year'];

    $sql = "UPDATE events SET event_names = ?, year = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $event_names, $year, $event_id);
    $stmt->execute();

    header("Location: manage_events.php?student_id=" . $student_id); // Refresh the page
    exit();
}
?>

<h3>Manage Events for Student: <?php echo $student_name; ?></h3>

<!-- Add Event Form -->
<h4>Add New Event</h4>
<form method="POST" action="manage_events.php?student_id=<?php echo $student_id; ?>">
    <div>
        <label for="event_names">Event Name:</label>
        <input type="text" name="event_names" required>
    </div>
    <div>
        <label for="year">Year:</label>
        <input type="number" name="year" required>
    </div>
    <button type="submit" name="add_event">Add Event</button>
</form>

<hr>

<!-- Display Existing Events -->
<h4>Existing Events</h4>
<?php if (count($events) > 0): ?>
    <?php foreach ($events as $event): ?>
        <div>
            <p><strong>Event Name:</strong> <?php echo $event['event_names']; ?></p>
            <p><strong>Year:</strong> <?php echo $event['year']; ?></p>

            <!-- Edit Event Form -->
            <form method="POST" action="manage_events.php?student_id=<?php echo $student_id; ?>">
                <input type="hidden" name="event_id" value="<?php echo $event['id']; ?>">
                <div>
                    <label for="event_names">Event Name:</label>
                    <input type="text" name="event_names" value="<?php echo $event['event_names']; ?>" required>
                </div>
                <div>
                    <label for="year">Year:</label>
                    <input type="number" name="year" value="<?php echo $event['year']; ?>" required>
                </div>
                <button type="submit" name="update_event">Update Event</button>
            </form>

            <hr>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>No events found for this student.</p>
<?php endif; ?>
