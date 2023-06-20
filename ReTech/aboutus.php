<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="aboutusstyle.css">
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
        <div class="about-us">
            <h2>About Us</h2>
            <p>ReTech is a leader in the field of electronic waste recycling, focusing on environmentally responsible practices. We understand the growing concern over the impact of e-waste on our planet, and we are dedicated to providing sustainable solutions. Through our collection and recycling programs, we ensure that electronic devices are properly disposed of, minimizing their negative effects on the environment.</p>
            
            <p>At our company, we prioritize the safe handling and disposal of hazardous materials found in electronic devices. We adhere to strict regulations and industry best practices to mitigate any potential environmental and health risks. Our rigorous processes and advanced equipment guarantee that harmful substances are safely contained and disposed of, preventing them from polluting the environment or posing risks to human health.</p>
            
            <p>By partnering with us for your electronic waste recycling needs, you contribute to the circular economy and support sustainable practices. We strive to create a greener future by minimizing waste, conserving resources, and promoting the reuse of electronic components. Together, we can make a significant impact in reducing the environmental footprint of electronic devices and pave the way for a more sustainable world.</p>
        </div>
    </div>
    <script src="dashboard.js"></script>
</body>
</html>
