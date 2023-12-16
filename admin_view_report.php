<?php
// Include your database connection and session start code here
require_once "db_config.php";
session_start();

// Check if the user is logged in and is an admin
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php"); // Redirect to admin login page if not logged in
    exit();
}

// Initialize variables to hold query results
$individualResult = $healthRecordResult = $environmentResult = $socialDeterminantsResult = null;

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming the admin enters the user ID for the report
    $userID = $_POST['userID'];

    // Fetch individual's data
    $individualSQL = "SELECT * FROM INDIVISUAL WHERE ID = $userID";
    $individualResult = $conn->query($individualSQL);

    // Fetch health records
    $healthRecordSQL = "SELECT * FROM HEALTHRECORD WHERE ID = $userID";
    $healthRecordResult = $conn->query($healthRecordSQL);

    // Fetch social determinants data
    $socialDeterminantsSQL = "SELECT * FROM SocialDeterminants WHERE UserID = $userID";
    $socialDeterminantsResult = $conn->query($socialDeterminantsSQL);

    // You can add similar error checking for other queries

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Report</title>
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
        .logout-button {
            display: block;
            width: 10%;
            text-align: center;
            padding: 10px;
            background-color: #dc3545;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: -50px;
            margin-left: 85%;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>User Report</h2>

        <form action="admin_view_report.php" method="post">
            <div class="form-group">
                <label for="userID">Enter User ID:</label>
                <input type="text" class="form-control" id="userID" name="userID" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <?php if (isset($individualResult) && $individualResult->num_rows > 0): ?>
            <h3>Individual Information</h3>
            <div class="table-container">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <!-- Add more fields as needed -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $individualResult->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['ID']; ?></td>
                                <td><?php echo $row['FName']; ?></td>
                                <td><?php echo $row['LName']; ?></td>
                                <td><?php echo $row['Age']; ?></td>
                                <td><?php echo $row['Gender']; ?></td>
                                <!-- Add more fields as needed -->
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
                <p>No data found for the specified user ID.</p>
            <?php endif; ?>
        <?php endif; ?>

        <?php if (isset($healthRecordResult) && $healthRecordResult->num_rows > 0): ?>
            <h3>Health Records</h3>
            <div class="table-container">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>RecordID</th>
                            <th>Treatment Plan</th>
                            <th>RecordType</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $healthRecordResult->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['RecordID']; ?></td>
                                <td><?php echo $row['TreatmentPlan']; ?></td>
                                <td><?php echo $row['RecordType']; ?></td>
                                <!-- Add more fields as needed -->
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>

        <?php if (isset($socialDeterminantsResult) && $socialDeterminantsResult->num_rows > 0): ?>
            <h3>Social Determinants</h3>
            <div class="table-container">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Education Level</th>
                            <th>Occupation Status</th>
                            <th>Housing Stability</th>
                            <th>Neighborhood Safety</th>
                            <th>HealthInsurance Coverage</th>
                            <th>Childhood Trauma</th>
                            <th>Transportation Access</th>
                            <th>GenderBased Discrimination</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $socialDeterminantsResult->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['EducationLevel']; ?></td>
                                <td><?php echo $row['OccupationStatus']; ?></td>
                                <td><?php echo $row['HousingStability']; ?></td>
                                <td><?php echo $row['NeighborhoodSafety']; ?></td>
                                <td><?php echo $row['HealthInsuranceCoverage']; ?></td>
                                <td><?php echo $row['ChildhoodTrauma']; ?></td>
                                <td><?php echo $row['TransportationAccess']; ?></td>
                                <td><?php echo $row['GenderBasedDiscrimination']; ?></td>
                                <!-- Add more fields as needed -->
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
            <br><br><br>
            <a href="admin_dashboard.php" class="logout-button">
                Back Button
            </a>
        <?php endif; ?>

        <!-- You can add similar sections for other tables -->

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Add your custom JavaScript here -->

</body>
</html>
