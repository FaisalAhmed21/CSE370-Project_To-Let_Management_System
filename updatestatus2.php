<?php
// poststatus.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $Flatid = $_POST['Flatid'];
    $action = $_POST['action'];

    $update_sql = "UPDATE addproperty SET status='$action' WHERE Flatid='$Flatid'";
    if ($conn->query($update_sql) === TRUE) {
        
        header("Location: postrequest.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>
