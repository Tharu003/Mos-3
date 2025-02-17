<?php
include 'db/connection.php';  // Include the database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Student Info
    $student_photo = $_FILES['student_photo']['name'];
    $name = $_POST['name'];
    $full_name = $_POST['full_name'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $district = isset($_POST['district']) ? $_POST['district'] : '';
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
    $is_active = isset($_POST['is_active']) ? $_POST['is_active'] : '';  // Default to empty string if not set

    // Coach Info
    $coach_name = $_POST['coach_name'];
    $coach_district = isset($_POST['coach_district']) ? $_POST['coach_district'] : '';  // Default to empty string if not set
    $coach_address = $_POST['coach_address'];
    $registered = isset($_POST['registered']) ? $_POST['registered'] : '';  // Default to empty string if not set
    $coach_nic = $_POST['coach_nic'];
    $coach_phone = $_POST['coach_phone'];

    // Event Info (selected sports from modal)
    $selected_sports = isset($_POST['selected_sports']) ? $_POST['selected_sports'] : '';  // Get selected sports from hidden input

    // Upload the student photo to the uploads folder
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($student_photo);
    move_uploaded_file($_FILES['student_photo']['tmp_name'], $target_file);

    // Insert into students table
    $sql_student = "INSERT INTO students (student_photo, name, full_name, gender, district, birthday, nic, phone, school, email, address, grama_wasama, divisional) 
                    VALUES ('$student_photo', '$name', '$full_name', '$gender', '$district', '$birthday', '$nic', '$phone', '$school', '$email', '$address', '$grama_wasama', '$divisional')";
    if ($conn->query($sql_student) === TRUE) {
        $student_id = $conn->insert_id;  // Get the last inserted student ID

        // Insert into achievements table
        $sql_achievement = "INSERT INTO achievements (student_id, school_achievement, district_achievement, provincial_achievement, national_achievement, international_achievement, club_info, is_active)
                            VALUES ('$student_id', '$school_achievement', '$district_achievement', '$provincial_achievement', '$national_achievement', '$international_achievement', '$club_info', '$is_active')";
        $conn->query($sql_achievement);

        // Insert into coaches table
        $sql_coach = "INSERT INTO coaches (coach_name, coach_district, coach_address, registered, coach_nic, coach_phone)
                      VALUES ('$coach_name', '$coach_district', '$coach_address', '$registered', '$coach_nic', '$coach_phone')";
        $conn->query($sql_coach);

        // Insert into events table for selected sports as a single row
        if (!empty($selected_sports)) {
            $year = date("Y");  // Set the current year as the event year
            $sql_event = "INSERT INTO events (student_id, event_names, year) VALUES ('$student_id', '$selected_sports', '$year')";
            $conn->query($sql_event);
        }

        // Redirect to the toast notification page
        header("Location: toast.php?message=Data successfully submitted!");
        exit(); // Ensure that no further code is executed after redirection
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
