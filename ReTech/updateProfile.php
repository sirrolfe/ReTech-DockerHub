<?php
session_start();

$host = "db";
$db = "testing_db";
$user = "root";
$pass = "bimo1234";

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_SESSION['ID'])) {
        $id = $_SESSION['ID'];
        $phoneNumber = $_POST['phoneNumber'];
        $city = $_POST['city'];

        // Update the user with the new phone number and city
        $sql = "UPDATE Users SET PhoneNumber = ?, City = ? WHERE ID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$phoneNumber, $city, $id]);

        echo "Profile updated successfully.";
    } 
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
