<?php
// reservationstatus.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $reservation_id = $_POST['reservation_id'];
    $action = $_POST['action'];

    
    $update_sql = "UPDATE reservation SET status='$action' WHERE rvid='$reservation_id'";
    if ($conn->query($update_sql) === TRUE) {
        
        header("Location: reservationrequest.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>
