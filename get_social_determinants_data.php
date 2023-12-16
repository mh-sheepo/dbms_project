<?php
require_once "db_config.php";
session_start();

// Fetch data from the database
$query = "SELECT * FROM SocialDeterminants";
$result = $conn->query($query);

// Prepare data for the chart
$labels = [];
$incomeLevels = [];

while ($row = $result->fetch_assoc()) {
    $labels[] = "User " . $row['UserID'];
    $incomeLevels[] = $row['IncomeLevel'];
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Income Levels Chart</title>
    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div style="width: 80%; margin: auto;">
        <canvas id="incomeChart"></canvas>
    </div>

    <script>
        // Chart.js code
        var ctx = document.getElementById('incomeChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($labels); ?>,
                datasets: [{
                    label: 'Income Levels',
                    data: <?php echo json_encode($incomeLevels); ?>,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
