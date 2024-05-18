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
        $email=$user['email'];

       
    } else {
        
        echo "No user found with the latest email.";
        exit; 
    }
} else {

    echo "Error executing query: " . $mysqli->error;
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #333;
        }

        .user-info {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            margin-bottom: 20px;
        }

        p {
            margin: 5px 0;
            color: #666;
            text-align: left;
        }

        .button {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 8px;
        }

        .button:hover {
            background-color: #45a049;
        }

        .logout-btn {
            background-color: #f44336; /* Red */
        }
        body {
        background-image: url('images/img.jpeg');
        background-size: cover;
        background-repeat: no-repeat;
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>User Profile</h1>
        <div class="user-info">
            <p><strong>Name:</strong> <?php echo $name; ?></p>
            <p><strong>Email:</strong> <?php echo $email; ?></p>
        </div>

        <button class="button" onclick="location.href='loginhome.html';">Exit</button>

        
        <form method="post" action="logout.php" style="display: inline;">
            <button class="button logout-btn" type="submit">Logout</button>
        </form>
    </div>
</body>
</html>