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
        <a class="navbar-brand" href="individual_dashboard.php">Dashboard</a>
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
                    <a class="nav-link" href="health_record.php">Health Records</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="entryform_social_determinant.php">Social Determinants</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="socialDeterminantsChart.php">SD Chart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="weather_analytics.php">Weather Analytics</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="diet_form.php">Dietary Notification</a>
                </li>
            </ul>
            <a href="logout.php" class="nav-link logout-button">Logout</a>
        </div>
    </nav>

    <div class="container-fluid">

        <!-- Two halves of the page -->
        <div class="half-page">
            <!-- Left half -->
            <div class="column">
                <h2>Nutrition</h2>
                <img src="https://s30386.pcdn.co/wp-content/uploads/2020/02/p1bm5844cb6oacnd1std183s12gt6.jpg.optimal.jpg"
                    alt="Nutrition Image">
                <p>Nutrition is the cornerstone of a healthy lifestyle. It involves providing the body with essential nutrients
                    through a well-balanced diet. A diverse range of fruits, vegetables, whole grains, and lean proteins ensures
                    the intake of vitamins, minerals, and other vital elements that support overall well-being and sustain
                    bodily functions.</p>
            </div>

            <!-- Right half -->
            <div class="column">
                <h2>Vitamins Benefits</h2>
                <img
                    src="https://www.usatoday.com/gcdn/-mm-/d8d0774057d19139d16e6ede624d76e89947662d/c=1-0-1365-767/local/-/media/2022/01/19/USATODAY/usatsports/imageforentry8-etz.jpg?width=1364&height=767&fit=crop&format=pjpg&auto=webp"
                    alt="Vitamins Benefits Image">
                <p>
                    Vitamins are organic compounds that the human body requires in small amounts for proper functioning and maintenance of good health. They play crucial roles in various physiological processes, supporting growth, development, and overall well-being. Vitamins are classified into two main categories: water-soluble and fat-soluble.
                </p>
                <p>
                    <b>Water-Soluble Vitamins:</b>

                    Examples of water-soluble vitamins include vitamin C and the B-complex vitamins (B1, B2, B3, B5, B6, B7, B9, B12).
                    Water-soluble vitamins are not stored in the body for long periods, so they need to be consumed regularly through the diet or supplements.
                    Vitamin C, also known as ascorbic acid, is well-known for its antioxidant properties and its role in collagen synthesis, which is essential for skin, blood vessels, and connective tissues.
                </p>
                <p>
                    <b>Fat-Soluble Vitamins:</b>

                    Fat-soluble vitamins include vitamins A, D, E, and K.
                    These vitamins are absorbed along with fats in the diet and can be stored in the body's fatty tissues.
                    Vitamin D, often referred to as the "sunshine vitamin," is crucial for calcium absorption and plays a vital role in maintaining bone health. It is synthesized in the skin when exposed to sunlight.
                </p>
            </div>
        </div>

        <hr> <!-- Add a horizontal line to separate the two halves -->

        <!-- Second set of information -->
        <div class="half-page">
            <!-- Left half -->
            <div class="column">
                <h2>Sunlight Exposure</h2>
                <img
                    src="https://bpb-us-e2.wpmucdn.com/sites.uci.edu/dist/1/4014/files/2021/08/Sunny-science.jpg"
                    alt="Sunlight Exposure Image">
                <p>Sunlight exposure is fundamental for synthesizing vitamin D, a crucial nutrient for bone health and immune
                    function. Spending time outdoors and allowing the skin to absorb sunlight helps the body produce this
                    vitamin naturally. Striking a balance between sun safety and enjoying outdoor activities contributes to
                    overall health and well-being.</p>
            </div>

            <!-- Right half -->
            <div class="column">
                <h2>Dengue</h2>
                <img src="https://img.freepik.com/premium-vector/hand-drawn-dengue-mosquito-insecta_710141-381.jpg?w=740"
                    alt="Dengue Image">
                <p>Dengue (break-bone fever) is a viral infection that spreads from mosquitoes to people. It is more common in
                    tropical and subtropical climates. Most people who get dengue won't have symptoms. But for those that do,
                    the most common symptoms are high fever, headache, body aches, nausea and rash.</p>
            </div>

            <!-- Left half -->
            <div class="column">
                <h2>Corona Virus</h2>
                <img src="https://phil.cdc.gov//PHIL_Images/23312/23312_lores.jpg" alt="Corona Virus Image">
                <p>COVID-19 (coronavirus disease 2019) is a disease caused by a virus named SARS-CoV-2. It can be very
                    contagious and spreads quickly. Over one million people have died from COVID-19 in the United States.
                    COVID-19 most often causes respiratory symptoms that can feel much like a cold, the flu, or pneumonia.</p>
            </div>

            <!-- Right half -->
            <div class="column">
                <h2>Doctors Advice</h2>
                <img src="https://static.vecteezy.com/system/resources/previews/002/972/128/original/doctor-advice-and-consultation-vector.jpg"
                    alt="Doctors Advice Image">
                <p>If you get dengue or covid, it's important to: rest. drink plenty of liquids. use acetaminophen (paracetamol)
                    for pain. Call your doctor's office first to share your symptoms and ask if you should come in. Cough or
                    sneeze into your elbow or use a tissue and throw it in the trash.</p>
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
