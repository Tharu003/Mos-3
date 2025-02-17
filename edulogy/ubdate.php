<?php
include 'db/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];

    // Student Info
    $name = $_POST['name'];
    $full_name = $_POST['full_name'];
    $gender = $_POST['gender'];
    $district = $_POST['district'];
    $birthday = $_POST['birthday'];
    $nic = $_POST['nic'];
    $phone = $_POST['phone'];
    $school = $_POST['school'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    // Achievement Info
    $school_achievement = $_POST['school_achievement'];
    $district_achievement = $_POST['district_achievement'];
    $provincial_achievement = $_POST['provincial_achievement'];
    $national_achievement = $_POST['national_achievement'];
    $international_achievement = $_POST['international_achievement'];

    // Event Info
    $selected_sports = $_POST['selected_sports'];
    $year = $_POST['year'];

    // Update student record
    $sql_student = "UPDATE students SET 
        name='$name', full_name='$full_name', gender='$gender', district='$district', 
        birthday='$birthday', phone='$phone', school='$school', email='$email', address='$address' 
        WHERE student_id='$student_id'";

    if ($conn->query($sql_student) === TRUE) {
        // Update achievements
        $sql_achievement = "UPDATE achievements SET 
            school_achievement='$school_achievement', district_achievement='$district_achievement', 
            provincial_achievement='$provincial_achievement', national_achievement='$national_achievement', 
            international_achievement='$international_achievement'
            WHERE student_id='$student_id'";
        $conn->query($sql_achievement);

        // Update events
        $sql_event = "UPDATE events SET 
            event_names='$selected_sports', year='$year' 
            WHERE student_id='$student_id'";
        $conn->query($sql_event);

        header("Location: toast.php?message=Student details updated successfully!");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
