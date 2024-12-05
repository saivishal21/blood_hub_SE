<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emergency Registration</title>
    <!-- Bootstrap files -->
    <link rel="stylesheet" href="../bootstrap/css//bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- External CSS file -->
    <link rel="stylesheet" href="../css/styles.css">
    <!-- jQuery file -->
    <script src="../includes/juqery_latest.js"></script>
    <style>
        body {
            background-color: #EFF5F5;
        }
        </style>
</head>
<body>
    <div class="container">
        <h2>Emergency Availability Registration</h2>
        <form method="post" action="emergency_registration_process.php">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" style="width: 60%;" name="name" required>
            </div>
            <div class="form-group">
                <label for="blood_group">Blood Group:</label>
                <select class="form-control" style="width: 60%;" name="blood_group" required>
                    <!-- Add options for blood groups here -->
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select>
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number:</label>
                <input type="number" class="form-control" style="width: 60%;" name="phone_number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" pattern="[0-9]{10}" maxlength="10" placeholder="Enter 10-digit phone number" required>
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <textarea class="form-control" style="width: 60%;" name="address" rows="3" required></textarea>
            </div>
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>
<!-- ... Your existing HTML code ... -->

<!-- ... Your existing HTML code ... -->
