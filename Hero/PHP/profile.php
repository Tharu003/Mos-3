<?php 
session_start();
include '../db/connection.php';

// Fetch student_id from query string
$student_id = $_GET['student_id'] ?? '';

// Fetch student details
$sql = "SELECT * FROM students WHERE student_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $student_id);
$stmt->execute();
$studentResult = $stmt->get_result();

if ($studentResult->num_rows > 0) {
    $student = $studentResult->fetch_assoc();
    
    // Fetch achievement details for the student
    $sql = "SELECT * FROM achievements WHERE student_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $student['student_id']);
    $stmt->execute();
    $achievementResult = $stmt->get_result();
    
    if ($achievementResult->num_rows > 0) {
        $achievement = $achievementResult->fetch_assoc();
    } else {
        $achievement = []; // No achievement data found
    }

    // Fetch events participated by the player
    $sqlEvents = "SELECT * FROM events WHERE student_id = ?";
    $stmtEvents = $conn->prepare($sqlEvents);
    $stmtEvents->bind_param("i", $student['student_id']);
    $stmtEvents->execute();
    $eventsResult = $stmtEvents->get_result();
    $events = [];
    while ($event = $eventsResult->fetch_assoc()) {
        $events[] = $event;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Player Profile</title>
    <link rel="stylesheet" href="../assets/style.css">
<style>
    img {
        height: 150px;
    }
</style>
</head>
<body>
    <h2>Player Profile</h2>
    <img src="../uploads/<?php echo htmlspecialchars($student['student_photo']); ?>" alt="Profile Picture" width="150">
    <p><strong>Name:</strong> <?php echo htmlspecialchars($student['name']); ?></p>
    <p><strong>Full Name:</strong> <?php echo htmlspecialchars($student['full_name']); ?></p>
    <p><strong>Gender:</strong> <?php echo htmlspecialchars($student['gender']); ?></p>
    <p><strong>District:</strong> <?php echo htmlspecialchars($student['district']); ?></p>
    <p><strong>Birthday:</strong> <?php echo htmlspecialchars($student['birthday']); ?></p>
    <p><strong>Phone:</strong> <?php echo htmlspecialchars($student['phone']); ?></p>
    <p><strong>School:</strong> <?php echo htmlspecialchars($student['school']); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($student['email']); ?></p>
    <p><strong>Address:</strong> <?php echo htmlspecialchars($student['address']); ?></p>
    <p><strong>Coach Name:</strong> <?php echo htmlspecialchars($student['coach_name']); ?></p>

    <h3>Achievements</h3>
    <p><strong>School Level:</strong> <?php echo htmlspecialchars($achievement['school_achievement'] ?? 'N/A'); ?></p>
    <p><strong>District Level:</strong> <?php echo htmlspecialchars($achievement['district_achievement'] ?? 'N/A'); ?></p>
    <p><strong>Provincial Level:</strong> <?php echo htmlspecialchars($achievement['provincial_achievement'] ?? 'N/A'); ?></p>
    <p><strong>National Level:</strong> <?php echo htmlspecialchars($achievement['national_achievement'] ?? 'N/A'); ?></p>
    <p><strong>International Level:</strong> <?php echo htmlspecialchars($achievement['international_achievement'] ?? 'N/A'); ?></p>
    <p><strong>Club Information:</strong> <?php echo htmlspecialchars($achievement['club_info'] ?? 'N/A'); ?></p>

    <h3>Events Participated</h3>
    <?php if (!empty($events)): ?>
        <ul>
            <?php foreach ($events as $event): ?>
                <li><?php echo htmlspecialchars($event['event_names']) . " (" . htmlspecialchars($event['year']) . ")"; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No events participated.</p>
    <?php endif; ?>
</body>
</html>
