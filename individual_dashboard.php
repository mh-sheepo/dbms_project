<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Individual Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Add your custom CSS styles here -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .dashboard-header {
            background-color: #007bff;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .container-fluid {
            margin-top: 20px;
        }

        .card {
            margin-bottom: 20px;
            height: 250px; /* Set a fixed height for square shape */
        }

        .chart-image {
            height: 100%;
            width: auto;
        }
        
        .card-title {
            text-align: center;
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

    <div class="dashboard-header">
        <h1>Welcome to Your Individual Dashboard</h1>
        <a href="logout.php" class="logout-button">
            Logout
        </a>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <a href="edit_personal_information.php" class="card-link">
                    <div class="card">
                        <img src="personal_ifo.png" class="card-img-top chart-image" alt="Personal Information">
                        <div class="card-body">
                            <h5 class="card-title">Edit Personal Information</h5>
                            <!-- Add content related to personal information here -->
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="health_record.php" class="card-link">
                    <div class="card">
                        <img src="health_records.jpg" class="card-img-top chart-image" alt="Health Records">
                        <div class="card-body">
                            <h5 class="card-title">Health Records</h5>
                            <!-- Add content related to health records here -->
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="entryform_social_determinant.php" class="card-link">
                    <div class="card">
                        <img src="social_determinants.jpg" class="card-img-top chart-image" alt="Health Records">
                        <div class="card-body">
                            <h5 class="card-title">Provide the Social Determinants of Health Data</h5>
                            <!-- Add content related to health records here -->
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-md-4">
                <a href="socialDeterminantsChart.php" class="card-link">
                    <div class="card">
                        <img src="chart.png" class="card-img-top chart-image" alt="Personal Information">
                        <div class="card-body">
                            <h5 class="card-title">Social Determinants Chart</h5>
                            <!-- Add content related to personal information here -->
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="weather_analytics.php" class="card-link">
                    <div class="card">
                        <img src="weather.png" class="card-img-top chart-image" alt="Personal Information">
                        <div class="card-body">
                            <h5 class="card-title">Weather Analytics</h5>
                            <!-- Add content related to personal information here -->
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="diet_form.php" class="card-link">
                    <div class="card">
                        <img src="diet.png" class="card-img-top chart-image" alt="Personal Information">
                        <div class="card-body">
                            <h5 class="card-title">Daily Dietary Notification</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Add more cards or sections as needed -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Add your custom JavaScript here -->

</body>
</html>
