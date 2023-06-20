<?php
    session_start();

    $servername = "db";
    $username = "root";
    $password = "bimo1234";
    $dbname = "testing_db";

    $data = json_decode(file_get_contents('php://input'), true);

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Clean the data before use to prevent SQL injection
    $userID = $conn->real_escape_string($data['userID']);
    $storeName = $conn->real_escape_string($data['storeName']);
    $storeAddress = $conn->real_escape_string($data['storeAddress']);

    $sql = "INSERT INTO ChosenLocations (UserID, StoreName, StoreAddress) VALUES ($userID, '$storeName', '$storeAddress')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>
