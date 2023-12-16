<?php
// Include your database connection and session start code here
require_once "db_config.php";
session_start();

// Check if the user is logged in and is an admin
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php"); // Redirect to admin login page if not logged in
    exit();
}

// Fetch individuals' data from the database
$sql = "SELECT * FROM INDIVISUAL";
$result = $conn->query($sql);

// Check if the query was successful
if ($result === false) {
    die("Error: " . $conn->error);
}

// Check if there are individuals
if ($result->num_rows > 0) {
    $individuals = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $individuals = [];
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Add your custom CSS styles here -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 20px;
        }

        .table-container {
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>User Management</h2>

        <div class="table-container">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Economic Status</th>
                        <th>Educational Status</th>
                        <th>Username</th>
                        <!-- Add more attributes as needed -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($individuals as $individual): ?>
                        <tr>
                            <td><?php echo $individual['ID']; ?></td>
                            <td><?php echo $individual['FName']; ?></td>
                            <td><?php echo $individual['LName']; ?></td>
                            <td><?php echo $individual['Age']; ?></td>
                            <td><?php echo $individual['Gender']; ?></td>
                            <td><?php echo $individual['EconomicStatus']; ?></td>
                            <td><?php echo $individual['EducationalStatus']; ?></td>
                            <td><?php echo $individual['user_name']; ?></td>
                            <!-- Add more attributes as needed -->
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Add your custom JavaScript here -->

</body>
</html>
