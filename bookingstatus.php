<?php
session_start(); 


$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "db"; 


$mysqli = new mysqli($servername, $username, $password, $database);

if ($mysqli->connect_errno) {
   
    echo "Error connecting to the database. Please try again later.";
    exit;
}


$emailQuery = "SELECT email FROM userinfo ORDER BY id DESC LIMIT 1";


$result = $mysqli->query($emailQuery);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $latestEmail = $row['email'];

    
    $userDataQuery = "SELECT * FROM user WHERE email = '$latestEmail'";

    
    $userDataResult = $mysqli->query($userDataQuery);

    if ($userDataResult && $userDataResult->num_rows > 0) {
        $user = $userDataResult->fetch_assoc();

        

        
        $name = $user['name'];
        $email=$user['email'];

       
        $bookingQuery = "SELECT * FROM booking WHERE name = '$name' AND email = '$email'";

        
        $bookingResult = $mysqli->query($bookingQuery);

        
        $userDataResult->close();

        if ($bookingResult && $bookingResult->num_rows > 0) {
            
            while ($booking = $bookingResult->fetch_assoc()) {
                echo "<div class='booking-box'>";
                echo "<p><strong>Name:</strong> " . htmlspecialchars($user['name']) . "</p>";
                echo "<p><strong>Email:</strong> " . htmlspecialchars($user['email']) . "</p>";
                echo "<p><strong>Phone:</strong> " . htmlspecialchars($booking['phone']) . "</p>";
                echo "<p><strong>Flat ID:</strong> " . htmlspecialchars($booking['Flatid']) . "</p>";
                echo "<p><strong>Check-in Date:</strong> " . htmlspecialchars($booking['checkin_date']) . "</p>";
                echo "<p><strong>Check-out Date:</strong> " . htmlspecialchars($booking['checkout_date']) . "</p>";
                echo "<p><strong>Amount:</strong> " . htmlspecialchars($booking['amount']) . "</p>";
                echo "<p><strong>Mafia Amount:</strong> " . htmlspecialchars($booking['mafia_amount']) . "</p>";
                echo "<p><strong>Total Amount:</strong> " . htmlspecialchars($booking['total_amount']) . "</p>";
                echo "<p><strong>Payment Status:</strong> " . htmlspecialchars($booking['pay_status']) . "</p>";
                echo "</div>"; 
            }
        } else {
            echo "<p>No bookings found for this user.</p>";
        }
    } else {
        echo "User data not found for the latest email.";
    }
} else {
    echo "No email found in the userinfo table.";
}


$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Booking Information</title>
    <style>
       
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .booking-info {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
        }
        .booking-info h2 {
            margin-top: 0;
        }
        .booking-box {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    
    <?php
    if ($bookingResult && $bookingResult->num_rows > 0) {
        while ($booking = $bookingResult->fetch_assoc()) {
            echo "<div class='booking-box'>";
            echo "<p><strong>Name:</strong> " . htmlspecialchars($user['name']) . "</p>";
            echo "<p><strong>Email:</strong> " . htmlspecialchars($user['email']) . "</p>";
            echo "<p><strong>Phone:</strong> " . htmlspecialchars($booking['phone']) . "</p>";
            echo "<p><strong>Flat ID:</strong> " . htmlspecialchars($booking['Flatid']) . "</p>";
            echo "<p><strong>Check-in Date:</strong> " . htmlspecialchars($booking['checkin_date']) . "</p>";
            echo "<p><strong>Check-out Date:</strong> " . htmlspecialchars($booking['checkout_date']) . "</p>";
            echo "<p><strong>Amount:</strong> " . htmlspecialchars($booking['amount']) . "</p>";
            echo "<p><strong>Mafia Amount:</strong> " . htmlspecialchars($booking['mafia_amount']) . "</p>";
            echo "<p><strong>Total Amount:</strong> " . htmlspecialchars($booking['total_amount']) . "</p>";
            echo "<p><strong>Payment Status:</strong> " . htmlspecialchars($booking['pay_status']) . "</p>";
            echo "</div>"; 
        }
    } else {
        echo "<p>No bookings found for this user.</p>";
    }
    ?>
</body>
</html>
