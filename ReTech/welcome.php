<?php
// Starting session
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

$host = "db";
$db = "testing_db";
$user = "root";
$pass = "bimo1234";

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        
        // Find the user with the given email
        $sql = "SELECT * FROM Users WHERE Email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user) {
            $_SESSION['FullName'] = $user['FullName'];
            $_SESSION['ID'] = $user['ID'];
            echo "<h2>Welcome to ReTech, " . htmlspecialchars($_SESSION['FullName'], ENT_QUOTES, 'UTF-8') . "</h2>";
        } else {
            header("Location: loginpage.php"); 
        }
    } else {
        header("Location: loginpage.php"); 
    }
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>