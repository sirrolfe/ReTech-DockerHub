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
        
        // Find the user with the given id
        $sql = "SELECT * FROM Users WHERE ID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        echo json_encode($user);
    } 
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
