<?php
require_once "db_config.php";
session_start();

// Fetch health record information from the HEALTHRECORD table (modify as needed)
$sqlRecord = "SELECT * FROM HEALTHRECORD WHERE ID = ?"; // Assuming you want to fetch data based on the user's ID
$stmtRecord = $conn->prepare($sqlRecord);

// Fetch health service usage and related health infrastructure information using JOIN operations
$sqlServiceUsage = "SELECT hs.*, hi.HealthcareID, hi.Street, hi.City, hi.State, hi.Zip, hi.InfrastructureType
                   FROM HEALTHSERVICEUSAGE hs
                   JOIN HEALTHRECORD hr ON hs.RecordID = hr.RecordID
                   JOIN HEALTHINFRASTRUCTURE hi ON hs.HealthcareID = hi.HealthcareID
                   WHERE hr.ID = ?"; // Assuming you want to fetch data based on the user's ID
$stmtServiceUsage = $conn->prepare($sqlServiceUsage);

// Assuming you have the user's ID stored in a session variable, adjust as needed
$loggedInUserID = $_SESSION['user_id']; // Modify this based on how you store the logged-in user's ID

// Check for query execution errors
if (!$stmtRecord) {
    echo "Error preparing health record query: " . $conn->error;
    exit();
}

if (!$stmtServiceUsage) {
    echo "Error preparing health service usage query: " . $conn->error;
    exit();
}

// Fetch health record information
$stmtRecord->bind_param("i", $loggedInUserID);
if (!$stmtRecord->execute()) {
    echo "Error executing health record query: " . $stmtRecord->error;
    exit();
}

$resultRecord = $stmtRecord->get_result();

// Fetch health service usage and health infrastructure information
$stmtServiceUsage->bind_param("i", $loggedInUserID);
if (!$stmtServiceUsage->execute()) {
    echo "Error executing health service usage query: " . $stmtServiceUsage->error;
    exit();
}

$resultServiceUsage = $stmtServiceUsage->get_result();

// Initialize arrays to store health record, health service usage, and health infrastructure information
$healthRecords = [];
$healthServiceUsage = [];

// Fetch health record information
while ($rowRecord = $resultRecord->fetch_assoc()) {
    $healthRecords[] = $rowRecord;
}

// Fetch health service usage and health infrastructure information
while ($rowServiceUsage = $resultServiceUsage->fetch_assoc()) {
    $healthServiceUsage[] = $rowServiceUsage;
}

// Close the prepared statements and result sets
$stmtRecord->close();
$resultRecord->close();
$stmtServiceUsage->close();
$resultServiceUsage->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Health Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Add your custom CSS styles here -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 20px;
        }

        .card {
            margin-bottom: 20px;
            text-align: left;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .card:hover {
            transform: scale(1.02);
        }

        .card-body {
            padding: 20px;
        }

        h2 {
            color: #007bff;
        }

        p {
            color: #6c757d;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2 class="mb-4">View Health Record</h2>

        <?php foreach ($healthRecords as $record) : ?>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Health Record ID: <?php echo $record['RecordID']; ?></h5>
                    <p class="card-text">Treatment Plan: <?php echo $record['TreatmentPlan']; ?></p>
                    <p class="card-text">Record Type: <?php echo $record['RecordType']; ?></p>
                    <!-- Add more fields from the health record table as needed -->
                </div>
            </div>
        <?php endforeach; ?>

        <?php foreach ($healthServiceUsage as $service) : ?>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Health Service Usage ID: <?php echo $service['UsageID']; ?></h5>
                    <p class="card-text">Service Details: <?php echo $service['ServiceDetails']; ?></p>
                    <p class="card-text">Service Provider: <?php echo $service['ServiceProvider']; ?></p>
                    <?php if (isset($service['ServiceDate'])) : ?>
                        <p class="card-text">Service Date: <?php echo $service['ServiceDate']; ?></p>
                    <?php endif; ?>
                    <p class="card-text">Healthcare ID: <?php echo $service['HealthcareID']; ?></p>
                    <p class="card-text">Street: <?php echo $service['Street']; ?></p>
                    <p class="card-text">City: <?php echo $service['City']; ?></p>
                    <p class="card-text">State: <?php echo $service['State']; ?></p>
                    <p class="card-text">Zip: <?php echo $service['Zip']; ?></p>
                    <p class="card-text">Infrastructure Type: <?php echo $service['InfrastructureType']; ?></p>
                    <!-- Add more fields from the health service usage and health infrastructure tables as needed -->
                </div>
            </div>
        <?php endforeach; ?>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Add your custom JavaScript here -->

</body>
</html>
