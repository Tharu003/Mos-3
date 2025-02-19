<?php
include '../db/connection.php';

// Fetch filter options
$games = $conn->query("SELECT DISTINCT event_names FROM events ORDER BY event_names")->fetch_all(MYSQLI_ASSOC);
$years = $conn->query("SELECT DISTINCT year FROM events")->fetch_all(MYSQLI_ASSOC);
$districts = $conn->query("SELECT DISTINCT district FROM students")->fetch_all(MYSQLI_ASSOC);

// Handle filters
$where_conditions = [];
$params = [];
$search = $_GET['search'] ?? '';

if (!empty($search)) {
    $where_conditions[] = "(s.name LIKE ? OR s.full_name LIKE ? OR s.school LIKE ? OR s.district LIKE ? OR s.phone LIKE ? OR s.email LIKE ?)";
    $params = array_fill(0, 6, "%$search%");
}

foreach (['gender', 'district', 'year', 'game'] as $field) {
    if (!empty($_GET[$field])) {
        if ($field == 'game') {
            // Using LIKE to allow partial matches if game is manually entered
            $where_conditions[] = "e.event_names LIKE ?";
            $params[] = "%" . $_GET['game'] . "%";
        } else {
            $where_conditions[] = ($field == 'year') ? "e.year = ?" : "s.$field = ?";
            $params[] = $_GET[$field];
        }
    }
}


$where_sql = $where_conditions ? "WHERE " . implode(" AND ", $where_conditions) : '';

// Main Query
$sql = "
    SELECT 
        s.student_id, s.name, s.full_name, s.gender, s.district, s.birthday, s.phone, s.school, 
        s.email, s.address, s.grama_wasama, s.divisional, s.coach_name, s.student_photo, s.nic,
        a.school_achievement, a.district_achievement, a.provincial_achievement, 
        a.national_achievement, a.international_achievement, a.club_info,
        GROUP_CONCAT(CONCAT(e.event_names, ' (', e.year, ')') SEPARATOR ', ') AS participated_events
    FROM students s
    LEFT JOIN achievements a ON s.student_id = a.student_id
    LEFT JOIN events e ON s.student_id = e.student_id
    $where_sql
    GROUP BY s.student_id
";


$stmt = $conn->prepare($sql);
if ($params) $stmt->bind_param(str_repeat('s', count($params)), ...$params);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Player Table</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
/* Hide the horizontal scrollbar for the table container */
/* Hide horizontal scrollbar */
body{
    padding: 50px;
}

</style>
</head>
<body>
    
        <h2 class="text-center mb-4">All Players</h2>

        <!-- Filter Form -->
        <form method="GET" action="" class="mb-4">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="game">Game:</label>
                    <input type="text" name="game" id="game" class="form-control" placeholder="Enter Game" value="<?= htmlspecialchars($_GET['game'] ?? '') ?>">
                </div>

                <div class="form-group col-md-3">
                    <label for="year">Year Participated:</label>
                    <input type="text" name="year" id="year" class="form-control" placeholder="Enter Year" value="<?= htmlspecialchars($_GET['year'] ?? '') ?>">
                </div>

                <div class="form-group col-md-3">
                    <label for="district">District:</label>
                    <select name="district" id="district" class="form-control">
                        <option value="">Select District</option>
                        <?php foreach ($districts as $district) { ?>
                            <option value="<?= $district['district'] ?>" <?= ($_GET['district'] ?? '') == $district['district'] ? 'selected' : '' ?>>
                                <?= $district['district'] ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label for="gender">Gender:</label>
                    <select name="gender" id="gender" class="form-control">
                        <option value="">Select Gender</option>
                        <option value="Male" <?= ($_GET['gender'] ?? '') == 'Male' ? 'selected' : '' ?>>පුරුෂ</option>
                        <option value="Female" <?= ($_GET['gender'] ?? '') == 'Female' ? 'selected' : '' ?>>ස්ත්‍රී</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="search">Search:</label>
                    <input type="text" name="search" id="search" class="form-control" placeholder="Search by any field" value="<?= htmlspecialchars($search) ?>">
                </div>
                <div class="form-group col-md-6">
                    <button type="submit" class="btn btn-primary w-100 mt-4">Filter</button>
                </div>
            </div>
        </form>


        <!-- Table Buttons -->
        <div class="mb-3">
            <button class="btn btn-primary" onclick="showTable('table1')">Table 1</button>
            <button class="btn btn-secondary" onclick="showTable('table2')">Table 2</button>
        </div>

        <!-- Players Table (Table 1) -->
        <table id="table1" class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                <th>පින්තූරය</th>
                <th>නම</th>
                <th>සම්පූර්ණ නම</th>
                <th>ජාතික හැඳුනුම්පත</th>
                <th>ස්ත්‍රී/පුරුෂ</th>
                <th>දිස්ත්‍රික්කය</th>
                <th>උපන් දිනය</th>
                <th>දුරකථන අංකය</th>
                <th>පාසල</th>
                <th>ලිපිනය</th>
                <th>සිදුවීම්වල සහභාගිවීම්</th>

                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td>
                            <?php if (!empty($row['student_photo'])) { ?>
                                <img src="../uploads/<?= htmlspecialchars($row['student_photo']) ?>" width="50" height="50">
                            <?php } else { echo "No Image"; } ?>
                        </td>
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= htmlspecialchars($row['full_name']) ?></td>
                        <td><?= htmlspecialchars($row['nic']) ?></td> <!-- Display NIC here -->
                        <td><?= htmlspecialchars($row['gender']) ?></td>
                        <td><?= htmlspecialchars($row['district']) ?></td>
                        <td><?= htmlspecialchars($row['birthday']) ?></td>
                        <td><?= htmlspecialchars($row['phone']) ?></td>
                        <td><?= htmlspecialchars($row['school']) ?></td>
                        <td><?= htmlspecialchars($row['address']) ?></td>
                        <td><?= htmlspecialchars($row['participated_events'] ?? 'No Events') ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>



        <!-- Achievements & Events Table (Table 2) -->
        <table id="table2" class="table table-striped table-bordered d-none">
            <thead class="thead-dark">
                <tr>
                <th>ග්‍රාම වසම</th>
                <th>දිස්ත්‍රික්කය</th>
                <th>කේච් නම</th>
                <th>පාසල් කුසලතා</th>
                <th>දිස්ත්‍රික්ක කුසලතා</th>
                <th>පලාත් කුසලතා</th>
                <th>ජාතික කුසලතා</th>
                <th>අන්තර්ජාතික කුසලතා</th>
                <th>ක්‍රීඩා සමාජයේ තොරතුරු</th>

                </tr>
            </thead>
            <tbody>
                <?php $result->data_seek(0); while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?= htmlspecialchars($row['grama_wasama']) ?></td>
                        <td><?= htmlspecialchars($row['divisional']) ?></td>
                        <td><?= htmlspecialchars($row['coach_name']) ?></td>
                        <td><?= htmlspecialchars($row['school_achievement']) ?></td>
                        <td><?= htmlspecialchars($row['district_achievement']) ?></td>
                        <td><?= htmlspecialchars($row['provincial_achievement']) ?></td>
                        <td><?= htmlspecialchars($row['national_achievement']) ?></td>
                        <td><?= htmlspecialchars($row['international_achievement']) ?></td>
                        <td><?= htmlspecialchars($row['club_info']) ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
   

    <script>
        function showTable(id) {
            document.getElementById('table1').classList.toggle('d-none', id !== 'table1');
            document.getElementById('table2').classList.toggle('d-none', id !== 'table2');
        }
    </script>
</body>
</html>
