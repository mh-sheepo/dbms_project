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
            margin: 0;
            padding: 0;
        }

        .dashboard-header {
            background-color: #007bff;
            color: #fff;
            padding: 20px;
            text-align: center;
            margin-bottom: 20px;
        }

        .navbar {
            background-color: #343a40;
        }

        .navbar-dark .navbar-toggler-icon {
            background-color: #fff;
        }

        .navbar-nav {
            text-align: center;
        }

        .nav-item {
            margin-right: 15px;
        }

        .nav-link {
            color: #fff;
        }

        .logout-button {
            padding: 10px;
            background-color: #dc3545;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Custom styles for the two halves */
        .half-page {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            align-items: stretch;
            margin: 20px 0;
        }

        .column {
            flex: 1;
            padding: 15px;
            margin: 10px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }

        .column:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .column img {
            width: 100%;
            border-radius: 5px;
        }

        .column h2 {
            color: #007bff;
            margin-bottom: 10px;
        }

        .column p {
            color: #6c757d;
        }

        hr {
            border: 1px solid #dee2e6;
            margin: 30px 0;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="edit_personal_information.php">Edit Info</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="update_health_record.php">Update Health Records</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="diet_form.php">Dietary Notification</a>
                </li>
            </ul>
            <a href="logout.php" class="nav-link logout-button">Logout</a>
        </div>
    </nav>

    <div class="container-fluid">

    <div class="container-fluid">

<!-- Two halves of the page -->
<div class="half-page">
    <!-- Left half -->
    <div class="column">
        <h2>Medical Nutrition</h2>
        <img src="https://picsum.photos/800/400?random=1" alt="Medical Nutrition Image">
        <p>Medical nutrition is vital for patient health and recovery. It involves providing specialized nutrients through a well-balanced diet tailored to individual medical needs. A diverse range of foods ensures the intake of essential vitamins, minerals, and nutrients that support overall well-being and aid in the healing process.</p>
    </div>

    <!-- Right half -->
    <div class="column">
        <h2>Nutritional Supplements</h2>
        <img src="https://picsum.photos/800/400?random=2" alt="Nutritional Supplements Image">
        <p>Nutritional supplements play a crucial role in supporting patients with specific medical conditions. From vitamins to minerals and protein supplements, these products help address nutritional deficiencies and promote better health outcomes.</p>
    </div>
</div>

<hr> <!-- Add a horizontal line to separate the two halves -->

<!-- Second set of information -->
<div class="half-page">
    <!-- Left half -->
    <div class="column">
        <h2>UV Therapy</h2>
        <img src="https://picsum.photos/800/400?random=3" alt="UV Therapy Image">
        <p>UV therapy is a medical intervention that utilizes controlled exposure to ultraviolet light for therapeutic purposes. It is commonly employed for skin conditions and certain autoimmune disorders. Proper medical supervision ensures the safe and effective implementation of UV therapy.</p>
    </div>

    <!-- Right half -->
    <div class="column">
        <h2>Infectious Diseases</h2>
        <img src="https://picsum.photos/800/400?random=4" alt="Infectious Diseases Image">
        <p>Understanding and managing infectious diseases are crucial aspects of medical practice. From viral infections to bacterial diseases, healthcare professionals play a vital role in diagnosis, treatment, and prevention strategies to safeguard public health.</p>
    </div>

    <!-- Left half -->
    <div class="column">
        <h2>Telemedicine</h2>
        <img src="https://picsum.photos/800/400?random=5" alt="Telemedicine Image">
        <p>Telemedicine has become an integral part of modern healthcare, allowing doctors to provide remote consultations and medical advice. It enhances accessibility to healthcare services and facilitates communication between patients and healthcare providers.</p>
    </div>

    <!-- Right half -->
    <div class="column">
        <h2>Healthcare Recommendations</h2>
        <img src="https://picsum.photos/800/400?random=6" alt="Healthcare Recommendations Image">
        <p>Doctors' recommendations for maintaining good health include regular exercise, balanced nutrition, and preventive measures. Following medical advice helps individuals lead a healthy lifestyle and reduces the risk of various health conditions.</p>
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
