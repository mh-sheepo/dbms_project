<!-- register.php -->
<?php
require_once "db_config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fName = $_POST["fName"];
    $lName = $_POST["lName"];
    $user_type = $_POST["user_type"];
    $age = (int)$_POST["age"];
    $gender = $_POST["gender"];
    $economicStatus = $_POST["economicStatus"];
    $educationalStatus = $_POST["educationalStatus"];
    $newUsername = $_POST["new_username"];
    $newPassword = $_POST["new_password"];
    $confirmPassword = $_POST["confirm_password"];

    // Check if passwords match
    if ($newPassword === $confirmPassword) {
        // Perform your registration logic here
        $stmt = $conn->prepare("INSERT INTO indivisual ( FName, LName, Age, Gender, EconomicStatus, EducationalStatus, password, user_name,user_type) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        if ($stmt === false) {
            // Handle the error
            die('Error preparing the statement: ' . $conn->error);
        }

        $stmt->bind_param("ssissssss", $fName, $lName, $age, $gender, $economicStatus, $educationalStatus, $newPassword, $newUsername,$user_type);

        if ($stmt->execute()) {
            // Redirect to the login page after registration
            header("Location: index.php");
            exit();
        } else {
            // Handle the error
            die('Error executing the statement: ' . $stmt->error);
        }
    } else {
        // Passwords do not match, handle accordingly
        echo "Passwords do not match.";
    }
}
?>
