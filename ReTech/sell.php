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

    function getPoints($ewaste) {
        switch ($ewaste) {
            case 'Laptop':
                return 5;
            case 'Phone':
                return 3;
            case 'Cables':
                return 1;
            case 'Battery':
                return 1;
            case 'TV':
                return 8;
            default:
                return 1;
        }
    }

    $ewaste = $_POST['ewaste'];
if ($ewaste === 'Other') {
    $ewaste = $_POST['other'];
}
$quantity = (int)$_POST['quantity'];  // make sure quantity is an integer
$userid = $_SESSION['ID'];

// Calculate the points
$points = getPoints($ewaste) * $quantity;

    $sql = "INSERT INTO UserEWaste (UserID, EWasteType, Quantity, Points) VALUES ($userid, '$ewaste', $quantity, $points)";

    if ($conn->query($sql) === TRUE) {
        // Redirect to maps.php
        header("Location: maps2.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>
