<?php
require_once "db_config.php";
session_start();

function formatDate($date) {
    return date('F j, Y', strtotime($date));
}

$userId = $_SESSION['user_id'];

// Retrieve previous intake data
$sql = "SELECT * FROM DietaryIntake WHERE user_id = '$userId' ORDER BY date_consumed DESC";
$result = $conn->query($sql);

$previousIntake = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $previousIntake[] = $row;
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $foodType = $_POST['food_type'];
    $quantity = $_POST['quantity'];
    $additionalDetails = $_POST['additional_details'];

    $userId = $_SESSION['user_id']; // Store user_id in a variable

    $sql = "INSERT INTO DietaryIntake (date_consumed, food_type, quantity, additional_details, user_id)
            VALUES (NOW(), '$foodType', $quantity, '$additionalDetails', '$userId')"; 

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully";
        header("Location: diet_form.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
