<?php
require_once "db_config.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have the user ID stored in a session variable, adjust as needed
    $loggedInUserID = $_SESSION['user_id']; // Modify this based on how you store the logged-in user

    // Retrieve data from the form
    $incomeLevel = (float)$_POST['incomeLevel'];
    $educationLevel = $_POST['educationLevel'];
    $occupationStatus = $_POST['occupationStatus'];
    $housingStability = $_POST['housingStability'];
    $qualityOfHousing = $_POST['qualityOfHousing'];
    $neighborhoodSafety = $_POST['neighborhoodSafety'];
    $healthInsuranceCoverage = $_POST['healthInsuranceCoverage'];
    $healthcareFacilitiesAvailability = $_POST['healthcareFacilitiesAvailability'];
    $familySupport = $_POST['familySupport'];
    $socialRelationships = $_POST['socialRelationships'];
    $airAndWaterQuality = $_POST['airAndWaterQuality'];
    $accessToNutritiousFood = $_POST['accessToNutritiousFood'];
    $childhoodTrauma = $_POST['childhoodTrauma'];
    $earlyChildhoodEducationAccess = $_POST['earlyChildhoodEducationAccess'];
    $transportationAccess = $_POST['transportationAccess'];
    $publicTransportationAvailability = $_POST['publicTransportationAvailability'];
    $genderIdentity = $_POST['genderIdentity'];
    $genderBasedDiscrimination = $_POST['genderBasedDiscrimination'];

    // Insert data into the SocialDeterminants table
    $sql = "INSERT INTO SocialDeterminants (UserID, IncomeLevel, EducationLevel, OccupationStatus, HousingStability, QualityOfHousing, NeighborhoodSafety, HealthInsuranceCoverage, HealthcareFacilitiesAvailability, FamilySupport, SocialRelationships, AirAndWaterQuality, AccessToNutritiousFood, ChildhoodTrauma, EarlyChildhoodEducationAccess, TransportationAccess, PublicTransportationAvailability, GenderIdentity, GenderBasedDiscrimination) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iisssssssssssssssss", $loggedInUserID, $incomeLevel, $educationLevel, $occupationStatus, $housingStability, $qualityOfHousing, $neighborhoodSafety, $healthInsuranceCoverage, $healthcareFacilitiesAvailability, $familySupport, $socialRelationships, $airAndWaterQuality, $accessToNutritiousFood, $childhoodTrauma, $earlyChildhoodEducationAccess, $transportationAccess, $publicTransportationAvailability, $genderIdentity, $genderBasedDiscrimination);

    if ($stmt->execute()) {
        $message = "Data inserted successfully!";
        header("Location: dashboard.php");
        exit();
    } else {
        $message = "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Determinants Input Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Add your custom CSS styles here -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-save {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-save:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2 class="mb-4">Social Determinants Input Form</h2>
        <form action="entryform_social_determinant.php" method="post">
            <!-- UserID is assumed to be received from the session or another source -->
            <input type="hidden" name="userID" value="<?php echo $loggedInUserID; ?>">

            <div class="form-group">
                <label for="incomeLevel">Income:</label>
                <input type="number" class="form-control" id="incomeLevel" name="incomeLevel" required>
            </div>

            <div class="form-group">
                <label for="educationLevel">Education:</label>
                <input type="text" class="form-control" id="educationLevel" name="educationLevel" required>
            </div>

            <div class="form-group">
                <label for="occupationStatus">Occupation Status:</label>
                <input type="text" class="form-control" id="occupationStatus" name="occupationStatus" required>
            </div>

            <div class="form-group">
                <label for="housingStability">Housing Stability:</label>
                <input type="text" class="form-control" id="housingStability" name="housingStability" required>
            </div>

            <div class="form-group">
                <label for="qualityOfHousing">Quality of Housing:</label>
                <input type="text" class="form-control" id="qualityOfHousing" name="qualityOfHousing" required>
            </div>

            <div class="form-group">
                <label for="neighborhoodSafety">Neighborhood Safety:</label>
                <input type="text" class="form-control" id="neighborhoodSafety" name="neighborhoodSafety" required>
            </div>

            <div class="form-group">
                <label for="healthInsuranceCoverage">Health Insurance Coverage:</label>
                <input type="text" class="form-control" id="healthInsuranceCoverage" name="healthInsuranceCoverage" required>
            </div>

            <div class="form-group">
                <label for="healthcareFacilitiesAvailability">Healthcare Facilities Availability:</label>
                <input type="text" class="form-control" id="healthcareFacilitiesAvailability" name="healthcareFacilitiesAvailability" required>
            </div>

            <div class="form-group">
                <label for="familySupport">Family Support:</label>
                <input type="text" class="form-control" id="familySupport" name="familySupport" required>
            </div>

            <div class="form-group">
                <label for="socialRelationships">Social Relationships:</label>
                <input type="text" class="form-control" id="socialRelationships" name="socialRelationships" required>
            </div>

            <div class="form-group">
                <label for="airAndWaterQuality">Air and Water Quality:</label>
                <input type="text" class="form-control" id="airAndWaterQuality" name="airAndWaterQuality" required>
            </div>

            <div class="form-group">
                <label for="accessToNutritiousFood">Access to Nutritious Food:</label>
                <input type="text" class="form-control" id="accessToNutritiousFood" name="accessToNutritiousFood" required>
            </div>

            <div class="form-group">
                <label for="childhoodTrauma">Childhood Trauma:</label>
                <input type="text" class="form-control" id="childhoodTrauma" name="childhoodTrauma" required>
            </div>

            <div class="form-group">
                <label for="earlyChildhoodEducationAccess">Early Childhood Education Access:</label>
                <input type="text" class="form-control" id="earlyChildhoodEducationAccess" name="earlyChildhoodEducationAccess" required>
            </div>

            <div class="form-group">
                <label for="transportationAccess">Transportation Access:</label>
                <input type="text" class="form-control" id="transportationAccess" name="transportationAccess" required>
            </div>

            <div class="form-group">
                <label for="publicTransportationAvailability">Public Transportation Availability:</label>
                <input type="text" class="form-control" id="publicTransportationAvailability" name="publicTransportationAvailability" required>
            </div>

            <div class="form-group">
                <label for="genderIdentity">Gender Identity:</label>
                <input type="text" class="form-control" id="genderIdentity" name="genderIdentity" required>
            </div>

            <div class="form-group">
                <label for="genderBasedDiscrimination">Gender-Based Discrimination:</label>
                <input type="text" class="form-control" id="genderBasedDiscrimination" name="genderBasedDiscrimination" required>
            </div>

            <button type="submit" class="btn btn-save">Save Data</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Add your custom JavaScript here -->

</body>
</html>
