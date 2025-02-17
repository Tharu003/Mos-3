<?php
session_start();
include 'db/connection.php';

// Fetch NIC from query string
$nic = $_GET['nic'] ?? '';

// Fetch student details
$sql = "SELECT * FROM students WHERE nic = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $nic);
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

    // Fetch events data
    $sqlEvents = "SELECT * FROM events WHERE student_id = ?";
    $stmtEvents = $conn->prepare($sqlEvents);
    $stmtEvents->bind_param("i", $student['student_id']);
    $stmtEvents->execute();
    $eventsResult = $stmtEvents->get_result();
}

// Handle form submission for updating student and achievement data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get student data from the form
    $name = $_POST['name'];
    $full_name = $_POST['full_name'];
    $gender = $_POST['gender'];
    $district = $_POST['district'];
    $birthday = $_POST['birthday'];
    $phone = $_POST['phone'];
    $school = $_POST['school'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $grama_wasama = $_POST['grama_wasama'];
    $divisional = $_POST['divisional'];
    $coach_name = $_POST['coach_name']; // Added coach name

    // Check if the image is uploaded and handle it
    if (isset($_FILES['student_photo']) && $_FILES['student_photo']['error'] == 0) {
        $image_name = $_FILES['student_photo']['name'];
        $image_tmp = $_FILES['student_photo']['tmp_name'];
        $image_path = "uploads/" . $image_name;
        move_uploaded_file($image_tmp, $image_path);
    } else {
        $image_name = $student['student_photo']; // Retain old image if not updated
    }

    // Get achievement data from the form
    $school_achievement = $_POST['school_achievement'];
    $district_achievement = $_POST['district_achievement'];
    $provincial_achievement = $_POST['provincial_achievement'];
    $national_achievement = $_POST['national_achievement'];
    $international_achievement = $_POST['international_achievement'];
    $club_info = $_POST['club_info'];

    // Update student details
    $sql = "UPDATE students SET name = ?, full_name = ?, gender = ?, district = ?, birthday = ?, phone = ?, school = ?, email = ?, address = ?, grama_wasama = ?, divisional = ?, coach_name = ?, student_photo = ? WHERE nic = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssssssss", $name, $full_name, $gender, $district, $birthday, $phone, $school, $email, $address, $grama_wasama, $divisional, $coach_name, $image_name, $nic);
    $stmt->execute();

    // Update achievement details
    if (empty($achievement)) {
        // Insert new achievement data if not present
        $sql = "INSERT INTO achievements (student_id, school_achievement, district_achievement, provincial_achievement, national_achievement, international_achievement, club_info) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("issssss", $student['student_id'], $school_achievement, $district_achievement, $provincial_achievement, $national_achievement, $international_achievement, $club_info);
        $stmt->execute();
    } else {
        // Update existing achievement data
        $sql = "UPDATE achievements SET school_achievement = ?, district_achievement = ?, provincial_achievement = ?, national_achievement = ?, international_achievement = ?, club_info = ? WHERE student_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssi", $school_achievement, $district_achievement, $provincial_achievement, $national_achievement, $international_achievement, $club_info, $student['student_id']);
        $stmt->execute();
    }

    // Set success message in session
    $_SESSION['success_message'] = "Student details and achievements updated successfully.";

    // Redirect to the same page to avoid form resubmission and to clear the form data
    header("Location: edit.php?nic=" . $nic);
    exit();
}
?>
