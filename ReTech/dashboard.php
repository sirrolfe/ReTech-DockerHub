<?php
    session_start(); 
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="dashboardstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="video-container">
        <video autoplay muted loop id="backgroundVideo">
            <source src="img\recycle-video.mp4" type="video/mp4">
            Your browser does not support HTML5 video.
        </video>
    </div>

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
    </div>

    <!-- Welcome user -->
    <div class="user-welcome">
        Welcome, <?php echo isset($_SESSION['FullName']) ? $_SESSION['FullName'] : 'User'; ?>
    </div>
    </div>


    <div id="myOverlay" class="overlay"></div>

    <div class="main">
      <div class="overlay-content">
          <img class="screenshot__72_-removebg-1" src="img/screenshot--72--removebg-1.png"
            alt="Screenshot__72_-removebg 1"/>
          <h1>Welcome to ReTech!
          <br>
          <br>Your e-waste, our concern!</h1>
      </div>
    </div>

    <script src="dashboard.js"></script>
</body>
</html>