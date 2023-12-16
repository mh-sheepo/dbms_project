<!DOCTYPE html>
<html lang="en">
<head>
    <title>Weather Analytics</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        header {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 1em;
        }
        main {
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px;
        }
        h1, h2 {
            color: #333;
            margin-bottom: 10px;
        }
        .card {
            margin-bottom: 20px;
        }
        .card-img-top {
            max-height: 200px;
            max-width: 200px;
            object-fit: cover;
        }
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 1em;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header class="text-center">
        <h1 style="color: white;">Weather Analytics</h1>
    </header>
    <main class="text-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">Enter City Name</h2>
                            <form method="post" action="weather_analytics.php">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="city" placeholder="City" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Get Weather</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                $apiKey = '358ae091de470e7b07965ad69011671f';
                $city = isset($_POST['city']) ? $_POST['city'] : 'Dhaka';

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // If the form is submitted, update the city variable with the user input
                    $city = $_POST['city'];
                }

                $apiUrl = "https://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey";
                $weatherData = @file_get_contents($apiUrl);

                if ($weatherData !== false) {
                    $weatherData = json_decode($weatherData, true);

                    if (isset($weatherData['main'])) {
                        $temperature = round($weatherData['main']['temp'] - 273.15, 2); // Convert to Celsius
                        $humidity = $weatherData['main']['humidity'];
                        $description = $weatherData['weather'][0]['description'];
                        $icon = $weatherData['weather'][0]['icon'];

                        echo "
                            <img src='http://openweathermap.org/img/w/$icon.png' class='card-img-top' alt='Weather Icon'>
                            <div class='card-body'>
                                <h5 class='card-title'>Weather in $city</h5>
                                <p>Temperature: $temperature °C</p>
                                <p>Humidity: $humidity%</p>
                                <p>Description: $description</p>
                            </div>
                        ";
                    } else {
                        echo "<div class='card-body'><p>Error parsing weather data</p></div>";
                    }
                } else {
                    echo "<div class='card-body'><p>Error fetching weather data</p>";
                    print_r(error_get_last());
                    echo "</div>";
                }
            ?>
        </div>
    </main>
    <footer class="text-center">
        <p style="margin: 0;">&copy; <?php echo date("Y"); ?> Weather Analytics. All rights reserved.</p>
    </footer>
</body>
</html>