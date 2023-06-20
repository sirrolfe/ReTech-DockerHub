<?php
    session_start(); 

    $servername = "db";
    $username = "root";
    $password = "bimo1234";
    $dbname = "testing_db";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $userid = $_SESSION['ID'];

    // SQL to get the sum of points for the logged in user
    $sql = "SELECT COALESCE(SUM(Points), 0) as TotalPoints FROM UserEWaste WHERE UserID=$userid";

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $totalPoints = $row['TotalPoints'];

    $conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="donatestyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Donate E-Waste</title>
</head>
<body>
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="dashboard.php">Home</a>
    <a href="services.php">Services</a>
    <a href="profile.php">Profile</a>
    <a href="aboutus.php">About Us</a>
    <a href="logout.php" class="logout">Logout</a> 
</div>

<div class="topnav">
    <div class="left">
        <a href="javascript:void(0);" class="icon" onclick="openNav()">
            <i class="fa fa-bars"></i>
        </a>
        <img src="img\screenshot--72--removebg-2-1@2x.png" class="logo" alt="Company Logo"> 
        <div class="company-name">ReTech</div>
        <div class="user-points">
        Points: <?php echo $totalPoints; ?>
        </div>
    </div>
</div>

<div id="myOverlay" class="overlay"></div>

<div class="donate-form">
    <h1>Donate Your E-Waste</h1>
    <form action="donate.php" method="POST">
        <div class="form-group">
            <label for="ewaste">Type of E-Waste:</label>
            <select id="ewaste" name="ewaste" onchange="showOtherField()">
                <option value="Laptop">Laptop</option>
                <option value="Phone">Phone</option>
                <option value="Cables">Cables</option>
                <option value="Battery">Battery</option>
                <option value="TV">TV</option>
                <option value="Other">Other</option>
            </select>
        </div>
        <div class="form-group">
            <input type="text" id="otherField" name="other" placeholder="Please specify">
        </div>
        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" min="1">
        </div>
        <div class="form-group">
            <label for="photos">E-Waste Pictures:</label>
            <input type="file" id="photos" name="photos[]" multiple>
        </div>
        <div class="form-group">
            <input type="submit" value="Submit">
        </div>
    </form>
</div>

<script src="dashboard.js"></script>
<script>
    function showOtherField() {
        var dropdown = document.getElementById('ewaste');
        var otherField = document.getElementById('otherField');
        if (dropdown.value === 'Other') {
            otherField.style.display = 'block';
        } else {
            otherField.style.display = 'none';
        }
    }
</script>
</body>
</html>
