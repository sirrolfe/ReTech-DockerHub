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
    $sql = "SELECT COALESCE(SUM(Points), 0) as TotalPoints FROM UserEWaste WHERE UserID=?";
    
    // Create a prepared statement
    $stmt = $conn->prepare($sql);
    
    // Bind the parameters
    $stmt->bind_param("i", $userid);
    
    // Execute the statement
    $stmt->execute();
    
    // Get the result
    $result = $stmt->get_result();

    // Check if the query was successful
    if ($result !== false) {
        // Fetch the result as an associative array
        $row = $result->fetch_assoc();
        $totalPoints = $row['TotalPoints'];
    } else {
        // Handle error - inform the user that the query failed
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="services.css">
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
            <div class="user-points">
            Points: <?php echo $totalPoints; ?>
            </div>
        </div>
    </div>

    <div id="myOverlay" class="overlay"></div>

    <div class="container">
    <h1>Our Services</h1>
    <div class="options">
        <a href="donateform.php" class="option donate">
            <img src="img\recycle.png" alt="Recycle Logo">
            <span>Donate E-Wastes</span>
        </a>
        <a href="sellform.php" class="option sell">
            <img src="img\shopping-cart.png" alt="Shopping Cart Logo">
            <span>Sell E-Wastes</span>
        </a>
      </div>
    </div>

    <script src="services.js"></script>
    <script src="dashboard.js"></script>
</body>
</html>

