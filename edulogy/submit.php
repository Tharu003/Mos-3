<?php
include 'db/connection.php';  // Include the database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Student Info
    $student_photo = $_FILES['student_photo']['name'];
    $name = $_POST['name'];
    $full_name = $_POST['full_name'];
    $gender = $_POST['gender'] ?? '';
    $district = $_POST['district'] ?? '';
    $birthday = $_POST['birthday'];
    $nic = $_POST['nic'];
    $phone = $_POST['phone'];
    $school = $_POST['school'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $grama_wasama = $_POST['Grama_wasama'];
    $divisional = $_POST['Divisional'];

    // Achievement Info
    $school_achievement = $_POST['school_achievement'];
    $district_achievement = $_POST['district_achievement'];
    $provincial_achievement = $_POST['provincial_achievement'];
    $national_achievement = $_POST['national_achievement'];
    $international_achievement = $_POST['international_achievement'];
    $club_info = $_POST['club_info'];
    $is_active = $_POST['is_active'] ?? '';

    // Coach Info
    $coach_name = $_POST['coach_name'];
    $coach_district = $_POST['coach_district'] ?? '';
    $coach_address = $_POST['coach_address'];
    $registered = $_POST['registered'] ?? '';
    $coach_nic = $_POST['coach_nic'];
    $coach_phone = $_POST['coach_phone'];

    // Event Info (selected sports from modal)
    $selected_sports = $_POST['selected_sports'] ?? '';
    
    // Upload student photo
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($student_photo);
    move_uploaded_file($_FILES['student_photo']['tmp_name'], $target_file);

    // Get the next available student_id
    $student_id = $conn->query("SELECT COALESCE(MAX(student_id), 0) + 1 AS next_id FROM students")->fetch_assoc()['next_id'];

    // Check if coach already exists in the system
    $coach_check = $conn->query("SELECT coach_name FROM coaches WHERE coach_name = '$coach_name'");
    
    if ($coach_check->num_rows == 0) {
        // Coach does not exist, add new coach
        $coach_id = $conn->query("SELECT COALESCE(MAX(coach_id), 0) + 1 AS next_id FROM coaches")->fetch_assoc()['next_id'];
        $sql_coach = "INSERT INTO coaches (coach_id, coach_name, coach_district, coach_address, registered, coach_nic, coach_phone)
                      VALUES ('$coach_id', '$coach_name', '$coach_district', '$coach_address', '$registered', '$coach_nic', '$coach_phone')";
        $conn->query($sql_coach);
    }

    // Insert into students table with coach_name
    $sql_student = "INSERT INTO students (student_id, student_photo, name, full_name, gender, district, birthday, nic, phone, school, email, address, grama_wasama, divisional, coach_name) 
                    VALUES ('$student_id', '$student_photo', '$name', '$full_name', '$gender', '$district', '$birthday', '$nic', '$phone', '$school', '$email', '$address', '$grama_wasama', '$divisional', '$coach_name')";
    
    if ($conn->query($sql_student) === TRUE) {
        // Insert into achievements table
        $achievement_id = $conn->query("SELECT COALESCE(MAX(achievement_id), 0) + 1 AS next_id FROM achievements")->fetch_assoc()['next_id'];
        $sql_achievement = "INSERT INTO achievements (achievement_id, student_id, school_achievement, district_achievement, provincial_achievement, national_achievement, international_achievement, club_info, is_active)
                            VALUES ('$achievement_id', '$student_id', '$school_achievement', '$district_achievement', '$provincial_achievement', '$national_achievement', '$international_achievement', '$club_info', '$is_active')";
        $conn->query($sql_achievement);

        // Insert into events table for selected sports
        if (!empty($selected_sports)) {
            $year = $_POST['year'];
            $event_id = $conn->query("SELECT COALESCE(MAX(id), 0) + 1 AS next_id FROM events")->fetch_assoc()['next_id'];
            $sql_event = "INSERT INTO events (id, student_id, event_names, year) VALUES ('$event_id', '$student_id', '$selected_sports', '$year')";
            $conn->query($sql_event);
        }

        // Redirect to the toast notification page
        header("Location: toast.php?message=Data successfully submitted!");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
