<?php
// Starting session
session_start();

// Destroy session
session_destroy();

// Redirecting to the login page:
header("Location: landingpage.php");
?>
