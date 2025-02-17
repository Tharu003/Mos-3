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

<!-- Display Success Message -->
<?php if (isset($_SESSION['success_message'])): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $_SESSION['success_message']; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php unset($_SESSION['success_message']); // Clear the success message ?>
<?php endif; ?>

<!-- Student and Achievement Edit Form -->
<form action="edit.php?nic=<?php echo $nic; ?>" method="POST" enctype="multipart/form-data" class="container mt-4">
    <!-- Student Details -->
    <div class="form-group">
        <label for="coach_name">Coach Name</label>
        <input type="text" id="coach_name" name="coach_name" class="form-control" value="<?php echo $student['coach_name'] ?? ''; ?>" required>
    </div>
    <div class="form-group">
        <label for="student_photo">Student Photo</label>
        <input type="file" id="student_photo" name="student_photo" class="form-control">
        <?php if ($student['student_photo']): ?>
            <img src="uploads/<?php echo $student['student_photo']; ?>" alt="Student Photo" width="100" class="mt-2">
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" class="form-control" value="<?php echo $student['name'] ?? ''; ?>" required>
    </div>
    <div class="form-group">
        <label for="full_name">Full Name</label>
        <input type="text" id="full_name" name="full_name" class="form-control" value="<?php echo $student['full_name'] ?? ''; ?>" required>
    </div>
    <div class="form-group">
        <label>Gender</label>
        <div>
            <input type="radio" id="male" name="gender" value="male" <?php echo ($student['gender'] == 'male') ? 'checked' : ''; ?>>
            <label for="male">Male</label>
            <input type="radio" id="female" name="gender" value="female" <?php echo ($student['gender'] == 'female') ? 'checked' : ''; ?>>
            <label for="female">Female</label>
        </div>
    </div>
    <div class="form-group">
        <label for="district">District</label>
        <select id="district" name="district" class="form-control">
            <option value="galle" <?php echo ($student['district'] == 'galle') ? 'selected' : ''; ?>>Galle</option>
            <option value="matara" <?php echo ($student['district'] == 'matara') ? 'selected' : ''; ?>>Matara</option>
            <option value="hambanthota" <?php echo ($student['district'] == 'hambanthota') ? 'selected' : ''; ?>>Hambanthota</option>
        </select>
    </div>
    <div class="form-group">
        <label for="birthday">Birthday</label>
        <input type="date" id="birthday" name="birthday" class="form-control" value="<?php echo $student['birthday'] ?? ''; ?>" required>
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="tel" id="phone" name="phone" class="form-control" value="<?php echo $student['phone'] ?? ''; ?>" required>
    </div>
    <div class="form-group">
        <label for="school">School</label>
        <input type="text" id="school" name="school" class="form-control" value="<?php echo $student['school'] ?? ''; ?>" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" class="form-control" value="<?php echo $student['email'] ?? ''; ?>" required>
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <textarea id="address" name="address" class="form-control" required><?php echo $student['address'] ?? ''; ?></textarea>
    </div>
    <div class="form-group">
        <label for="grama_wasama">Grama Niladhari Wasama</label>
        <input type="text" id="grama_wasama" name="grama_wasama" class="form-control" value="<?php echo $student['grama_wasama'] ?? ''; ?>" required>
    </div>
    <div class="form-group">
        <label for="divisional">Divisional Secretary</label>
        <input type="text" id="divisional" name="divisional" class="form-control" value="<?php echo $student['divisional'] ?? ''; ?>" required>
    </div>

    <!-- Achievement Details -->
    <h3>Achievements</h3>
    <div class="form-group">
        <label for="school_achievement">School Achievement</label>
        <input type="text" id="school_achievement" name="school_achievement" class="form-control" value="<?php echo $achievement['school_achievement'] ?? ''; ?>" required>
    </div>
    <div class="form-group">
        <label for="district_achievement">District Achievement</label>
        <input type="text" id="district_achievement" name="district_achievement" class="form-control" value="<?php echo $achievement['district_achievement'] ?? ''; ?>" required>
    </div>
    <div class="form-group">
        <label for="provincial_achievement">Provincial Achievement</label>
        <input type="text" id="provincial_achievement" name="provincial_achievement" class="form-control" value="<?php echo $achievement['provincial_achievement'] ?? ''; ?>" required>
    </div>
    <div class="form-group">
        <label for="national_achievement">National Achievement</label>
        <input type="text" id="national_achievement" name="national_achievement" class="form-control" value="<?php echo $achievement['national_achievement'] ?? ''; ?>" required>
    </div>
    <div class="form-group">
        <label for="international_achievement">International Achievement</label>
        <input type="text" id="international_achievement" name="international_achievement" class="form-control" value="<?php echo $achievement['international_achievement'] ?? ''; ?>" required>
    </div>
    <div class="form-group">
        <label for="club_info">Club Information</label>
        <textarea id="club_info" name="club_info" class="form-control" required><?php echo $achievement['club_info'] ?? ''; ?></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
</form>
