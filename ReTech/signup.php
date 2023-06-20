<?php
$host = "db";
$db = "testing_db";
$user = "root";
$pass = "bimo1234";

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST['submit'])) {
        $fullName = $_POST['fullname'];
        $email = $_POST['email'];
        $phoneNumber = $_POST['phonenumber'];
        $city = $_POST['city'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm_password'];

        // Check if all fields are filled
        if (empty($fullName) || empty($email) || empty($phoneNumber) || empty($city) || empty($password) || empty($confirmPassword)) {
            echo '<script language="javascript">';
            echo 'alert("Please fill in all fields.");';
            echo 'window.location.href = "index.html";';
            echo '</script>';
        } else {
            // Check if user already exists
            $sql = "SELECT * FROM Users WHERE Email = ?";
            $stmt= $conn->prepare($sql);
            $stmt->execute([$email]);
            $user = $stmt->fetch();

            if ($user) {
                echo '<script language="javascript">';
                echo 'alert("User already registered with this email!");';
                echo 'window.location.href = "index.html";';
                echo '</script>';
            } else {
                if($password != $confirmPassword) {
                    echo "Passwords do not match.";
                } else {
                    // Hash the password
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                    $sql = "INSERT INTO Users (FullName, Email, PhoneNumber, City, PasswordHash) VALUES (?, ?, ?, ?, ?)";
                    $stmt= $conn->prepare($sql);
                    $stmt->execute([$fullName, $email, $phoneNumber, $city, $hashedPassword]);

                    // Redirect to the login page after successful registration
                    header("Location: loginpage.php");
                    exit;
                }
            }
        }
    }
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>