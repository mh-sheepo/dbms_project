<?php
require_once "db_config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Perform your login logic here
    $stmt = $conn->prepare("SELECT password, user_type, ID FROM indivisual WHERE user_name = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($hashedPassword, $userType, $user_id);
    $stmt->fetch();

    // Check if the user exists and the password is correct
    if ($password === $hashedPassword) {
        // Start a session
        session_start();
        $_SESSION['username'] = $username;
        // Store user information in the session
        $_SESSION['user_type'] = $userType;
        $_SESSION['user_id'] = $user_id;

        // Redirect to a dashboard based on user type
        switch ($userType) {
            case 'admin':
                header("Location: admin_dashboard.php");
                break;
            case 'healthcare':
                header("Location: healthcare_dashboard.php");
                break;
            case 'individual':
                header("Location: dashboard.php");
                break;
            case 'analyst':
                header("Location: analyst_dashboard.php");
                break;
            default:
                // Handle unexpected user types
                echo "Invalid user type.";
                break;
        }

        exit();
    } else {
        // Invalid credentials, handle accordingly
        echo "Invalid username or password.";
    }
}
?>
