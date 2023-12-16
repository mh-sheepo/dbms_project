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
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Diet Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .diet-section {
            text-align: center;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px;
        }
        h2 {
            color: #007bff;
            margin-bottom: 20px;
        }
        p {
            color: #6c757d;
        }
        form {
            margin-top: 20px;
        }
        label {
            margin-right: 10px;
            color: #495057;
        }
        input {
            border: 1px solid #ced4da;
            border-radius: 5px;
        }
        button {
            padding: 10px 100px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <section class="diet-section">
        <h2>Daily Dietary Notification</h2>
        <p>Today's Recommendation: Eat more fruits and vegetables.</p>
        <p>Track your intake:</p>
        <form id="diet-form" method="post" action="insert_data.php">
            <div>
                <label for="food-type-input">Food Type:</label>
                <input type="text" id="food-type-input" name="food_type" placeholder="Enter food type" required>
            </div>
            <div>
                <label for="quantity-input">Quantity:</label>
                <input type="number" id="quantity-input" name="quantity" placeholder="Enter quantity" required>
            </div>
            <div>
                <label for="details-input">Additional Details:</label>
                <textarea id="details-input" name="additional_details" placeholder="Enter additional details"></textarea>
            </div>
            <br>
            <button type="submit">Add</button>
        </form>
        <br><br>
        <?php if (!empty($previousIntake)) : ?>
            <h3>Previous Intake:</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Date Consumed</th>
                        <th>Food Type</th>
                        <th>Quantity</th>
                        <th>Additional Details</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($previousIntake as $intake) : ?>
                        <tr>
                            <td><?php echo formatDate($intake['date_consumed']); ?></td>
                            <td><?php echo $intake['food_type']; ?></td>
                            <td><?php echo $intake['quantity']; ?></td>
                            <td><?php echo $intake['additional_details']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </section>
</body>
</html>
