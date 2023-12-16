<?php
require_once "db_config.php";
session_start();

// Fetch data from the database
$query = "SELECT * FROM SocialDeterminants";
$result = $conn->query($query);

// Prepare data for the chart
$labels = [];
$chartData = [];

$accessToNutritiousFoodCounts = [];

while ($row = $result->fetch_assoc()) {
    $labels[] = "User " . $row['UserID'];
    $chartData[] = [
        'IncomeLevel' => $row['IncomeLevel'],
        'EducationLevel' => $row['EducationLevel'],
        'QualityOfHousing' => $row['QualityOfHousing'],
        'OccupationStatus' => $row['OccupationStatus'],
        // Add more attributes as needed
    ];
     // Count occurrences for access to nutritious food
     $accessToNutritiousFoodCounts[$row['AccessToNutritiousFood']][$row['OccupationStatus']] = ($accessToNutritiousFoodCounts[$row['AccessToNutritiousFood']][$row['OccupationStatus']] ?? 0) + 1;
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Social Determinants Chart</title>
    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            padding: 10px;
            text-align: center;
            color: white;
        }

        nav {
            display: flex;
            justify-content: center;
            background-color: #f2f2f2;
            padding: 10px;
        }

        nav a {
            margin: 0 10px;
            text-decoration: none;
            color: #333;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header>
        <h1>Social Determinants Chart</h1>
    </header>

    <nav>
        <a onclick="updateChart('income')">Income</a>
        <a onclick="updateChart('education')">Education Levels</a>
        <a onclick="updateChart('qualityOfHousing')">Quality of Housing</a>
        <a onclick="updateRadarChart()">Radar Chart</a>
        <!-- Add more options for other attributes -->
    </nav>

    <div style="width: 60%; margin: auto;">
        <canvas id="socialDeterminantsChart"></canvas>
    </div>

    <script>
        // Initial chart data
        var currentChartType = 'income';
        var currentChartData = <?php echo json_encode(array_column($chartData, 'IncomeLevel')); ?>;

        // Function to update the chart based on selected option
        function updateChart(selectedChartType) {
            currentChartType = selectedChartType;

            // Update chart data based on the selected option
            switch (selectedChartType) {
                case 'income':
                    currentChartData = <?php echo json_encode(array_column($chartData, 'IncomeLevel')); ?>;
                    updateBarChart();
                    break;
                
                case 'education':
                    // Count the occurrences of each education level
                    var educationCounts = <?php echo json_encode(array_count_values(array_column($chartData, 'EducationLevel'))); ?>;
                    
                    // Prepare data for pie chart
                    currentChartData = {
                        labels: Object.keys(educationCounts),
                        datasets: [{
                            data: Object.values(educationCounts),
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                                // Add more colors if needed
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                                // Add more colors if needed
                            ],
                            borderWidth: 1
                        }]
                    };
                    updatePieChart();
                    break;

                case 'qualityOfHousing':
                    // Count the occurrences of each quality of housing level
                    var qualityCounts = <?php echo json_encode(array_count_values(array_column($chartData, 'QualityOfHousing'))); ?>;
                    
                    // Prepare data for pie chart
                    currentChartData = {
                        labels: Object.keys(qualityCounts),
                        datasets: [{
                            data: Object.values(qualityCounts),
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                                // Add more colors if needed
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                                // Add more colors if needed
                            ],
                            borderWidth: 1
                        }]
                    };
                    updatePieChart();
                    break;

                case 'radar':
                    // Update the radar chart
                    updateRadarChart();
                    break;
                // Add more cases for other attributes
            }
        }

        function updateRadarChart() {
        // Destroy the existing chart if it exists
        var existingChart = Chart.getChart("socialDeterminantsChart");

        if (existingChart) {
            existingChart.destroy();
        }

        var ctx = document.getElementById('socialDeterminantsChart').getContext('2d');

        var radarData = {
            labels: ['Category 1', 'Category 2', 'Category 3', 'Category 4', 'Category 5'],
            datasets: [{
                label: 'Dataset 1',
                data: [
                    Math.floor(Math.random() * 10) + 1,
                    Math.floor(Math.random() * 10) + 1,
                    Math.floor(Math.random() * 10) + 1,
                    Math.floor(Math.random() * 10) + 1,
                    Math.floor(Math.random() * 10) + 1
                ],
                backgroundColor: 'rgba(<?php echo rand(0, 255); ?>, <?php echo rand(0, 255); ?>, <?php echo rand(0, 255); ?>, 0.2)',
                borderColor: 'rgba(<?php echo rand(0, 255); ?>, <?php echo rand(0, 255); ?>, <?php echo rand(0, 255); ?>, 1)',
                borderWidth: 1
            },
            {
                label: 'Dataset 2',
                data: [
                    Math.floor(Math.random() * 10) + 1,
                    Math.floor(Math.random() * 10) + 1,
                    Math.floor(Math.random() * 10) + 1,
                    Math.floor(Math.random() * 10) + 1,
                    Math.floor(Math.random() * 10) + 1
                ],
                backgroundColor: 'rgba(<?php echo rand(0, 255); ?>, <?php echo rand(0, 255); ?>, <?php echo rand(0, 255); ?>, 0.2)',
                borderColor: 'rgba(<?php echo rand(0, 255); ?>, <?php echo rand(0, 255); ?>, <?php echo rand(0, 255); ?>, 1)',
                borderWidth: 1
            },
            {
                label: 'Dataset 3',
                data: [
                    Math.floor(Math.random() * 10) + 1,
                    Math.floor(Math.random() * 10) + 1,
                    Math.floor(Math.random() * 10) + 1,
                    Math.floor(Math.random() * 10) + 1,
                    Math.floor(Math.random() * 10) + 1
                ],
                backgroundColor: 'rgba(<?php echo rand(0, 255); ?>, <?php echo rand(0, 255); ?>, <?php echo rand(0, 255); ?>, 0.2)',
                borderColor: 'rgba(<?php echo rand(0, 255); ?>, <?php echo rand(0, 255); ?>, <?php echo rand(0, 255); ?>, 1)',
                borderWidth: 1
            },]
        };

        var myChart = new Chart(ctx, {
            type: 'radar',
            data: radarData,
            options: {
                scales: {
                    r: {
                        beginAtZero: true
                    }
                }
            }
        });
    }



        // Function to update the Chart.js bar chart
        function updateBarChart() {
            // Destroy the existing chart if it exists
            var existingChart = Chart.getChart("socialDeterminantsChart");
            if (existingChart) {
                existingChart.destroy();
            }

            var ctx = document.getElementById('socialDeterminantsChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($labels); ?>,
                    datasets: [{
                        label: 'Income',
                        data: Object.values(currentChartData),
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
        }

        // Function to update the Chart.js pie chart
        function updatePieChart() {
            // Destroy the existing chart if it exists
            var existingChart = Chart.getChart("socialDeterminantsChart");
            if (existingChart) {
                existingChart.destroy();
            }

            var ctx = document.getElementById('socialDeterminantsChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: currentChartData,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }

        // Initial chart setup
        updateChart('income');
    </script>
</body>
</html>
