<?php
session_start(); 

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "db";

$mysqli = new mysqli($servername, $username, $password, $database);

if (!$mysqli) {
    echo "Error connecting to the database. Please try again later.";
    exit;
}

$emailQuery = "SELECT email FROM userinfo ORDER BY id DESC LIMIT 1";

$result = $mysqli->query($emailQuery);

if ($result) {
    $row = $result->fetch_assoc();
    $latestEmail = $row['email'];

    $userDataQuery = "SELECT * FROM user WHERE email = '$latestEmail'";

    $userDataResult = $mysqli->query($userDataQuery);

    if ($userDataResult && $userDataResult->num_rows > 0) {
        $user = $userDataResult->fetch_assoc();
        $name = $user['name'];
    }
}


$flatId = $_GET['Flatid'] ?? '';


$amountQuery = "SELECT rent FROM addproperty WHERE Flatid = ?";
$stmt = $mysqli->prepare($amountQuery);
$stmt->bind_param("s", $flatId);
$stmt->execute();
$stmt->bind_result($amount);
$stmt->fetch();
$stmt->close();


$mafiaAmount = isset($amount) ? $amount * 0.05 : 0;


$totalAmount = isset($amount) ? $amount + $mafiaAmount : 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $flatId = $_POST['Flatid'];
    $checkin_date = $_POST['checkin_date'] ?? '';
    $checkout_date = $_POST['checkout_date'] ?? '';
    $amount = $_POST['amount'];
    $mafiaAmount = $_POST['mafia_amount'];
    $totalAmount = $_POST['total_amount'];

  
    if(empty($checkin_date) || empty($checkout_date)) {
        
        echo "Check-in and check-out dates are required.";
        exit;
    }

   
    $insertQuery = "INSERT INTO booking (name, email, phone, Flatid, checkin_date, checkout_date, amount, mafia_amount, total_amount) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($insertQuery);
    $stmt->bind_param("ssssssddd", $name, $email, $phone, $flatId,$checkin_date, $checkout_date, $amount, $mafiaAmount, $totalAmount);
    $stmt->execute();
    $stmt->close();
    
    $updateQuery = "UPDATE addproperty SET available_status = 'Booked' WHERE Flatid = ?";
    $stmt = $mysqli->prepare($updateQuery);
    $stmt->bind_param("s", $flatId);
    $stmt->execute();
    $stmt->close();
    
    
    header("Location: payment.php");
    exit; 
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Property Booking</title>
    <style>
        body {
            background-image: url('images/img.jpeg');
            background-size: cover;
            background-repeat: no-repeat;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.7);
            padding: 30px;
            border-radius: 10px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        h2 {
            text-align: center;
        }

        form {
            text-align: center;
        }
        .home-button {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: Black;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<button class="home-button" onclick="window.location.href='loginhome.html'">Home</button>
<div class="container">
    <h2>Property Booking Form</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="<?php echo isset($name) ? $name : ''; ?>" required><br><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?php echo isset($latestEmail) ? $latestEmail : ''; ?>" required><br><br>
        
        <label for="phone">Phone:</label><br>
        <input type="text" id="phone" name="phone" required pattern="[0-9]{11}" title="Phone number must be exactly 11 digits"><br><br>
        
        <label for="Flatid">Flat ID:</label><br>
        <input type="text" id="Flatid" name="Flatid" value="<?php echo isset($_GET['Flatid']) ? $_GET['Flatid'] : ''; ?>" required><br><br>
        
        <label for="checkin">Check In:</label><br>
        <input type="date" id="checkin_date" name="checkin_date" required><br><br>
        
        <label for="checkout">Check Out:</label><br>
        <input type="date" id="checkout_date" name="checkout_date" required><br><br>
        
        <label for="amount">Payable Amount:</label><br>
        <input type="text" id="amount" name="amount" value="<?php echo isset($amount) ? $amount : ''; ?>" required><br><br>
        
        <label for="mafia_amount">Mafia Amount:</label><br>
        <input type="text" id="mafia_amount" name="mafia_amount" value="<?php echo isset($mafiaAmount) ? $mafiaAmount : ''; ?>" readonly><br><br>

        <label for="total_amount">Total Amount:</label><br>
        <input type="text" id="total_amount" name="total_amount" value="<?php echo isset($totalAmount) ? $totalAmount : ''; ?>" readonly><br><br>

        <input type="submit" value="Proceed to Payment">
    </form>
</div>

</body>
</html>
