<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $paymentMethod = $conn->real_escape_string($_POST['paymentMethod']);
    $userMobileNo = $conn->real_escape_string($_POST['userMobileNo']);
    $ownerPhoneNo = $conn->real_escape_string($_POST['ownerPhoneNo']);
    $amount = $conn->real_escape_string($_POST['amount']);
    $flatID = $conn->real_escape_string($_POST['flatID']);

    $sql = "INSERT INTO payment (paymentMethod, userMobileNo, ownerPhoneNo, amount, Flatid)
    VALUES ('$paymentMethod', '$userMobileNo', '$ownerPhoneNo', '$amount', '$flatID')";

    if ($conn->query($sql) === TRUE) {
        $conn->close();
        header("Location: paymentsuc.html");
        exit;
    } else {
        echo "<p style='color: red; text-align: center;'>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Form</title>
    <style>
        body {
            background-color: #333333;
            font-family: Arial, sans-serif;
            color: white;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        form {
            background-color: #444444;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            width: 300px;
        }
        label {
            margin-top: 10px;
            display: block;
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin-top: 4px;
            border-radius: 4px;
            border: 1px solid #777;
            box-sizing: border-box; 
        }
        button {
            background-color: #0084ff;
            color: white;
            border: none;
            padding: 6px 12px; 
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 12px; 
            margin-top: 10px;
            cursor: pointer;
            border-radius: 4px;
            width: 100%; 
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <form action="" method="POST">
        <label for="paymentMethod">Payment Method:</label>
        <select name="paymentMethod" id="paymentMethod">
            <option value="bkash">Bkash</option>
            <option value="nagad">Nagad</option>
            <option value="rocket">Rocket</option>
            <option value="visa">Visa Card</option>
            <option value="paypal">PayPal</option>
        </select>
        <br><br>


        <label for="userMobileNo">User Mobile No:</label>
        <input type="tel" id="userMobileNo" name="userMobileNo" required>
        <br><br>

        <label for="ownerPhoneNo">Owner Phone No:</label>
        <input type="tel" id="ownerPhoneNo" name="ownerPhoneNo" required>
        <br><br>

        <label for="amount">Amount:</label>
        <input type="number" id="amount" name="amount" required>
        <br><br>

        <label for="flatID">Flat ID:</label>
        <input type="text" id="flatID" name="flatID" required>
        <br><br>

        <button type="submit" name="submit">Submit Payment</button>
    </form>
</body>
</html>