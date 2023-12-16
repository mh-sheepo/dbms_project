<!-- create_account.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card mx-auto" style="max-width: 400px;">
            <div class="card-header bg-success text-white">
                <h2 class="text-center">Create Account</h2>
            </div>
            <div class="card-body">
                <form action="register.php" method="post">
                    <div class="form-group">
                        <label for="fName">First Name:</label>
                        <input type="text" class="form-control" id="fName" name="fName" required>
                    </div>
                    <div class="form-group">
                        <label for="lName">Last Name:</label>
                        <input type="text" class="form-control" id="lName" name="lName" required>
                    </div>
                    <div class="form-group">
                        <label for="user_type">User Type:</label>
                        <select class="form-control" id="user_type" name="user_type" required>
                            <option value="admin">Administrator</option>
                            <option value="healthcare">Healthcare Professional</option>
                            <option value="individual">Individual User</option>
                            <option value="analyst">Data Analyst/Researcher</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="age">Age:</label>
                        <input type="number" class="form-control" id="age" name="age" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="economicStatus">Economic Status:</label>
                        <input type="text" class="form-control" id="economicStatus" name="economicStatus" required>
                    </div>
                    <div class="form-group">
                        <label for="educationalStatus">Educational Status:</label>
                        <input type="text" class="form-control" id="educationalStatus" name="educationalStatus" required>
                    </div>
                    <div class="form-group">
                        <label for="new_username">Username:</label>
                        <input type="text" class="form-control" id="new_username" name="new_username" required>
                    </div>
                    <div class="form-group">
                        <label for="new_password">Password:</label>
                        <input type="password" class="form-control" id="new_password" name="new_password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password:</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Create Account</button>
                </form>
                <p class="mt-3 text-center">Already have an account? <a href="index.php">Login</a></p>
            </div>
        </div>
    </div>
    <!-- Add Bootstrap JS and Popper.js script links -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
