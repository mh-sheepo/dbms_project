<?php
require_once "db_config.php";
session_start();

// Fetch personal information from the INDIVISUAL table (modify as needed)
$sql = "SELECT * FROM INDIVISUAL WHERE user_name = ?"; // Assuming you want to fetch data based on the username
$stmt = $conn->prepare($sql);

// Assuming you have the username stored in a session variable, adjust as needed
$loggedInUsername = $_SESSION['username']; // Modify this based on how you store the logged-in user

$stmt->bind_param("s", $loggedInUsername);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Store personal information in variables (modify as needed)
    $fName = $row['FName'];
    $lName = $row['LName'];
    $age = $row['Age'];
    $gender = $row['Gender'];
    $economicStatus = $row['EconomicStatus'];
    $educationalStatus = $row['EducationalStatus'];
    // Add more fields as needed

} else {
    echo "No personal information found.";
    exit(); // or redirect to another page
}

$result->close();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have the username stored in a session variable, adjust as needed
    $loggedInUsername = $_SESSION['username']; // Modify this based on how you store the logged-in user

    // Retrieve updated information from the form
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $economicStatus = $_POST['economicStatus'];
    $educationalStatus = $_POST['educationalStatus'];
    // Add more fields as needed

    // Update the personal information in the database
    $sql = "UPDATE INDIVISUAL 
            SET FName = ?, LName = ?, Age = ?, Gender = ?, EconomicStatus = ?, EducationalStatus = ?
            WHERE user_name = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssissss", $fName, $lName, $age, $gender, $economicStatus, $educationalStatus, $loggedInUsername);

    if ($stmt->execute()) {
        // Redirect to the view page after successful update
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Error updating personal information: " . $stmt->error;
    }
}

// Close the prepared statement and result set
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Personal Information</title>
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

        .edit-form {
            max-width: 500px;
            margin: auto;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-save {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-save:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2 class="mb-4">Edit Personal Information</h2>
        <div class="card">
            <div class="card-body">
                <form method="post"  action="edit_personal_information.php"  class="edit-form">
                    <div class="form-group">
                        <label for="fName">First Name:</label>
                        <input type="text" class="form-control" id="fName" name="fName" value="<?php echo $fName; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="lName">Last Name:</label>
                        <input type="text" class="form-control" id="lName" name="lName" value="<?php echo $lName; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="age">Age:</label>
                        <input type="number" class="form-control" id="age" name="age" value="<?php echo $age; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="Male" <?php echo ($gender === 'Male') ? 'selected' : ''; ?>>Male</option>
                            <option value="Female" <?php echo ($gender === 'Female') ? 'selected' : ''; ?>>Female</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="economicStatus">Economic Status:</label>
                        <input type="text" class="form-control" id="economicStatus" name="economicStatus" value="<?php echo $economicStatus; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="educationalStatus">Educational Status:</label>
                        <input type="text" class="form-control" id="educationalStatus" name="educationalStatus" value="<?php echo $educationalStatus; ?>" required>
                    </div>
                    <!-- Add more fields as needed -->

                    <button type="submit" class="btn btn-save">Save Changes</button>
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
