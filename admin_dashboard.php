<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Add your custom CSS styles here -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .dashboard-header {
            background-color: #28a745;
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
        <h1>Welcome to the Admin Dashboard</h1>
        <a href="logout.php" class="logout-button">
            Logout
        </a>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <a href="admin_users.php" class="card-link">
                    <div class="card">
                        <img src="user_m.jpg" class="card-img-top chart-image" alt="User Management">
                        <div class="card-body">
                            <h5 class="card-title">User Management</h5>
                            <!-- Add content related to user management here -->
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="admin_view_report.php" class="card-link">
                    <div class="card">
                        <img src="report.png" class="card-img-top chart-image" alt="View Reports">
                        <div class="card-body">
                            <h5 class="card-title">View Reports</h5>
                            <!-- Add content related to reports here -->
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
