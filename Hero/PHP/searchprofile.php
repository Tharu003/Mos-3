<?php
include '../db/connection.php';

if (isset($_POST['search'])) {
    $search = $_POST['search'];

    // Search by NIC or Full Name
    $sql = "SELECT * FROM students WHERE nic = ? OR full_name LIKE ?";
    $stmt = $conn->prepare($sql);
    $searchWildcard = "%$search%";
    $stmt->bind_param("ss", $search, $searchWildcard);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();
        header("Location: profile.php?student_id=" . $student['student_id']);
        exit();
    } else {
        $message = "Player not found!";
    }
}

// Autocomplete suggestions
if (isset($_GET['query'])) {
    $query = $_GET['query'];

    $sql = "SELECT full_name FROM students WHERE full_name LIKE ? LIMIT 5";
    $stmt = $conn->prepare($sql);
    $searchWildcard = "%$query%";
    $stmt->bind_param("s", $searchWildcard);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        echo "<p onclick='selectSuggestion(\"" . addslashes($row['full_name']) . "\")'>" . htmlspecialchars($row['full_name']) . "</p>";
    }
    exit(); // Prevents further execution when handling AJAX request
}
?>

<!-- Display message if search fails -->
<?php if (isset($message)): ?>
    <div>
        <p><?php echo $message; ?></p>
    </div>
<?php endif; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html><!-- Search Form with Autocomplete & Animation -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<link href="style.css" rel="stylesheet">


<div class="search-container">
    <input type="text" id="search" class="search-input" name="search" placeholder="Enter NIC or Name" required onkeyup="fetchSuggestions(this.value)">
    <div id="suggestions" class="suggestions"></div>
    <button type="submit" class="search-btn">Search</button>
</div>

<script>
function fetchSuggestions(query) {
    let suggestionsBox = document.getElementById("suggestions");
    
    if (query.length < 2) {
        suggestionsBox.style.display = "none";
        return;
    }

    let xhr = new XMLHttpRequest();
    xhr.open("GET", "?query=" + query, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            suggestionsBox.innerHTML = xhr.responseText;
            suggestionsBox.style.display = "block";
        }
    };
    xhr.send();
}

function selectSuggestion(value) {
    document.getElementById("search").value = value;
    document.getElementById("suggestions").style.display = "none";
}
</script>
