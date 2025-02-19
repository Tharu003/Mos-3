<?php
include '../db/connection.php'; // Include your database connection

// Fetch all districts for the dropdown
$districtsQuery = "SELECT DISTINCT coach_district FROM coaches ORDER BY coach_district ASC";
$districtsResult = $conn->query($districtsQuery);

// Fetch all coaches
$sql = "SELECT * FROM coaches";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coaches List</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }

        .container {
            max-width: 95%;
        }

        h2 {
            background: #007bff;
            color: white;
            padding: 10px;
            text-align: center;
            border-radius: 5px;
        }

        .filter-section {
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .filter-section input, .filter-section select {
            width: 200px;
        }

        .table-container {
            background: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .table thead {
            background: #007bff;
            color: white;
        }

        .table th, .table td {
            padding: 12px;
            text-align: left;
        }

        .table tbody tr:nth-child(even) {
            background: #f2f2f2;
        }

        .table tbody tr:hover {
            background: #ddd;
        }

        .form-control {
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Coaches List</h2>

    <!-- Filter and Search Section -->
    <div class="filter-section">
        <input type="text" id="searchInput" class="form-control" placeholder="Search by Name">
        
        <select id="districtFilter" class="form-control">
            <option value="">Filter by District</option>
            <?php while ($row = $districtsResult->fetch_assoc()) { ?>
                <option value="<?php echo $row['coach_district']; ?>"><?php echo $row['coach_district']; ?></option>
            <?php } ?>
        </select>
    </div>

    <!-- Table Container -->
    <div class="table-container">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Coach ID</th>
                        <th>Name</th>
                        <th>District</th>
                        <th>Address</th>
                        <th>Registered</th>
                        <th>NIC</th>
                        <th>Phone</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row['coach_id']; ?></td>
                            <td><?php echo $row['coach_name']; ?></td>
                            <td><?php echo $row['coach_district']; ?></td>
                            <td><?php echo $row['coach_address']; ?></td>
                            <td><?php echo $row['registered']; ?></td>
                            <td><?php echo $row['coach_nic']; ?></td>
                            <td><?php echo $row['coach_phone']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- JavaScript for Filtering and Searching -->
<script>
    document.getElementById("searchInput").addEventListener("keyup", function () {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll("#tableBody tr");

        rows.forEach(row => {
            let name = row.cells[1].textContent.toLowerCase();
            row.style.display = name.includes(filter) ? "" : "none";
        });
    });

    document.getElementById("districtFilter").addEventListener("change", function () {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll("#tableBody tr");

        rows.forEach(row => {
            let district = row.cells[2].textContent.toLowerCase();
            row.style.display = filter === "" || district === filter ? "" : "none";
        });
    });
</script>

</body>
</html>
