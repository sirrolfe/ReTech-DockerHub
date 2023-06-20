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
    <link rel="stylesheet" href="maps2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Nearest Locations</title>
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

<div id="location-container"></div>
<div id="map"></div>

<script>
    var userID = <?php echo $userid; ?>;
</script>

<script src="dashboard.js"></script>
<script src="maps.js"></script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdkYRty6_7dLuKxa6dCH1j14DtGvBJCUY&libraries=places&callback=initMap">
</script>
</body>
</html>
