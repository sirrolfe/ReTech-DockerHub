<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "db";
$db = "testing_db";
$user = "root";
$pass = "bimo1234";

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Find the user with the given email
        $sql = "SELECT * FROM Users WHERE Email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$email]);
        $errors = $stmt->errorInfo();
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['PasswordHash'])) {
            // Here you would typically set some session variables
            // Save user's email, full name, and ID to session
            $_SESSION['email'] = $email;
            $_SESSION['FullName'] = $user['FullName'];
            $_SESSION['ID'] = $user['ID'];

            // Redirect to dashboard.php
            header("Location: dashboard.php");
            exit();
        } else {
            $_SESSION['message'] = "Invalid email or password";
            header('Location: loginpage.php');
            exit();
        }
    }
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>