<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="dashboardstyle.css">
    <link rel="stylesheet" href="profilestyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    </div>
    </div>

    <div id="myOverlay" class="overlay"></div>

    <div class="main">
    <div class="profile-container">
        <h2 class="login-heading">User Profile</h2>
        <form id="profileForm" method="post" action="updateProfile.php" enctype="multipart form-data">
            <div class="logo-container">
            <img id="profilePic" src="profilePic.jpg" alt="Profile Picture">
            <input type="file" id="profilePicInput" name="profilePicInput" accept="image/*" style="display: none;">
            </div>
            <label for="fullName" class="form-label">Full Name:</label>
            <input type="text" id="fullName" name="fullName" required readonly>
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" name="email" required readonly>
            <label for="phoneNumber" class="form-label">Phone Number:</label>
            <input type="tel" id="phoneNumber" name="phoneNumber" required>
            <label for="city" class="form-label">City:</label>
            <input type="text" id="city" name="city" required>
            <input type="submit" value="Update Profile">
        </form>
    </div>
    </div> 

    <script src="dashboard.js"></script>
    <script src="profile.js"></script>
</body>
</html>
