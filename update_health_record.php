<?php
require_once "db_config.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have the username stored in a session variable, adjust as needed
    $loggedInUsername = $_SESSION['username']; // Modify this based on how you store the logged-in user

    // Retrieve form data
    $userID = $_POST['user_id'];
    $treatmentPlan = $_POST['plan'];
    $recordType = $_POST['record'];

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("INSERT INTO HEALTHRECORD (ID, TreatmentPlan, RecordType) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $userID, $treatmentPlan, $recordType);
    $stmt->execute();
    // Close the prepared statement
    $stmt->close();
    header("Location: healthcare_dashboard.php");
    exit();
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Health Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Add your custom CSS styles here -->
    <style>
        /* Your existing styles remain unchanged */
        .btn-save {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100px;
        }

        .btn-save:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2 class="mb-4">Save a Health Record Information</h2>
        <div class="card">
            <div class="card-body">
                <form method="post" action="update_health_record.php" class="edit-form">
                    <div class="form-group">
                        <label for="user_id">Enter User ID:</label>
                        <input type="text" class="form-control" id="user_id" name="user_id" required>
                    </div>
                    <div class="form-group">
                        <label for="plan">Treatment Plan:</label>
                        <select class="form-control" id="plan" name="plan" required>
                            <option value="">Select Option</option>
                            <option value="Dietary Changes">Dietary Changes</option>
                            <option value="Medication">Medication</option>
                            <option value="Physical Therapy">Physical Therapy</option>
                            <option value="Surgery">Surgery</option>
                            <!-- Add more treatment plan options as needed -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="record">Record Type:</label>
                        <select class="form-control" id="record" name="record" required>
                        <option value="">Select Option</option>
                            <option value="Regular Checkup">Regular Checkup</option>
                            <option value="Diagnostic Test">Diagnostic Test</option>
                            <option value="Treatment Session">Treatment Session</option>
                            <option value="Regular Checkup">Normal Checkup</option>
                            <option value="Surgery Record">Surgery Record</option>
                            <option value="Emergency Record">Emergency Record</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    <!-- Add more fields as needed -->

                    <button type="submit" class="btn btn-save">Save</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Add your custom JavaScript here -->

</body>
</html>
