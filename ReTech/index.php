<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="singupstyle.css">
</head>
<body>
    <div class="form-container">
        <div class="logo-container">
            <img src="img\screenshot--72--removebg-1@2x.png" alt="Company Logo">
        </div>
        <form action="signup.php" method="post">
            <h2 class="login-heading">Sign Up</h2>
            <input type="text" id="fullname" name="fullname" placeholder="Full Name"><br>
            <input type="email" id="email" name="email" placeholder="Email"><br>
            <input type="tel" id="phonenumber" name="phonenumber" placeholder="Phone Number"><br>
            <input type="text" id="city" name="city" placeholder="City"><br>
            <input type="password" id="password" name="password" placeholder="Password"><br>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password"><br>
            <input type="submit" name="submit" value="CREATE ACCOUNT">
            <p class="signup-link">Already have an account? <a href="loginpage.php">Log in here</a>.</p>
        </form> 
    </div>
</body>
</html>


