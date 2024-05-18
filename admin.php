<!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>
    <style>
        body {
            background-color: gray;
            font-family: Arial, sans-serif;
            color: white;
        }
        table {
            margin-top: 20px;
            border-collapse: collapse;
            width: 80%;
            margin-left: auto;
            margin-right: auto;
        }
        th, td {
            border: 1px solid white;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #333;
        }
        tr:nth-child() {
            background-color: #555;
        }
        tr:hover {
            background-color: #777;
        }
        button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
        }
        .user-details-box {
            background-color: #000000;
            border: 1px solid #cccccc;
            border-radius: 5px;
            padding: 10px;
            margin-top: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        }

        button:hover {
            background-color: #45a049;
        }
        h2 {
            margin-top: 20px;
        }
        .close-btn {
            background-color: #f44336;
        }

    </style>
</head>
<body>

<h1>Admin Panel</h1>

<button onclick="window.location.href = 'reservationrequest.php'">View Reservation Requests</button>
<button onclick="window.location.href = 'postrequest.php'">View Post Requests</button>
<button onclick="window.location.href = 'adminpropertyview.php'">Property List</button>
<button onclick="window.location.href = 'adminreview.php'">Reviews</button>
<button onclick="window.location.href = 'mafiaamount.php'">Payments</button>
<button onclick="window.location.href = 'adminblog.php'">Blog Request</button>
<button onclick="window.location.href = 'logout.php'">Log Out</button>


<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "db";

$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if(isset($_POST['delete_user'])){
    $user_id = $_POST['user_id'];
    $sql = "DELETE FROM user WHERE id=$user_id";
    if ($conn->query($sql) === TRUE) {
        echo "User deleted successfully";
    } else {
        echo "Error deleting user: " . $conn->error;
    }
}


$sql = "SELECT id, name FROM user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    echo "<table border='1'>
            <tr>
                <th>User ID</th>
                <th>Username</th>
                <th>Action</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["id"]."</td>
                <td>".$row["name"]."</td>
                <td>
                    <form method='post' action=''>
                        <input type='hidden' name='user_id' value='".$row["id"]."'>
                        <button type='submit' name='view_details'>Details</button>
                        <button type='submit' name='delete_user'>Delete</button>
                    </form>
                </td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

if(isset($_POST['view_details'])){
    $user_id = $_POST['user_id'];
    $sql = "SELECT * FROM user WHERE id=$user_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<div class='user-details-box'>";
        echo "<h2>User Details:</h2>";
        echo "<p>User ID: ".$row["id"]."</p>";
        echo "<p>Username: ".$row["name"]."</p>";
        echo "<p>Email: ".$row["email"]."</p>";

      
        echo "<button class='close-btn' onclick='closeDetails()'>Close</button>";
        echo "</div>"; 
    } else {
        echo "No details found for this user";
    }
}


$conn->close();
?>

<script>
    function closeDetails() {
        var detailsBox = document.querySelector('.user-details-box');
        detailsBox.style.display = 'none';
    }
</script>

</body>
</html>
