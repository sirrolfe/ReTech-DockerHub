<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="landingstyle.css">
</head>
<body>
    <div class="background-image" id="bg1"></div>
    <div class="background-image" id="bg2"></div>
    <div class="main-container">
        <div class="content-container">
            <div class="logo-container">
                <img src="img\screenshot--72--removebg-1@2x.png" alt="Company Logo">
            </div>
            <div class="motto-container">
                <h1>Your e-waste, our concern!</h1>
                <p>Donate or sell your used electronic items to nearby recycling centers or stores</p>
            </div>
            <div class="buttons-container">
                <a href="loginpage.php" class="button login">Log In</a>
                <a href="index.php" class="button signup">Sign Up</a>
            </div>
        </div>
    </div>
</body>
<script>
  var images = ['img/assortment-dirty-dumped-objects.jpg', 'img/Screenshot (203).png', 'img/Screenshot (202).png']; // include the paths to your images here
  var index = 0;
  var currentBG = 1; // Toggle between 1 and 2

  setInterval(function() {
    index = (index + 1) % images.length;
    currentBG = 3 - currentBG; // Toggle between 1 and 2
    document.getElementById('bg' + currentBG).style.backgroundImage = "url('" + images[index] + "')";
    document.getElementById('bg' + currentBG).style.opacity = 1;
    document.getElementById('bg' + (3 - currentBG)).style.opacity = 0;
  }, 3000); // Change image every 3 seconds
</script>
</html>