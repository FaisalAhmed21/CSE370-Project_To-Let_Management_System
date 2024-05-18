<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['blog_id']) && isset($_POST['action'])) {
        $blog_id = $_POST['blog_id'];
        $action = $_POST['action'];

        $update_sql = "UPDATE blog SET status = '$action' WHERE id = $blog_id";
        if ($conn->query($update_sql) === TRUE) {

        } else {
            echo "Error updating blog status: " . $conn->error;
        }
    }
}

$sql = "SELECT * FROM blog WHERE status NOT IN ('approve', 'deny')";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Admin Panel</title>
        <style>
            /* Your CSS styles here */
            table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
            }
            th, td {
                padding: 12px 15px;
                text-align: left;
                border-bottom: 1px solid #ddd;
            }
            th {
                background-color: #f2f2f2;
            }
            td select {
                padding: 8px 10px;
                border: 1px solid #ccc;
                border-radius: 4px;
                background-color: #f8f8f8;
            }
            td input[type='submit'] {
                padding: 8px 15px;
                border: none;
                border-radius: 4px;
                background-color: #4CAF50;
                color: white;
                cursor: pointer;
            }
            td input[type='submit']:hover {
                background-color: #45a049;
            }
            .home-button {
                position: absolute;
                top: 20px;
                left: 20px;
                background-color: green;
                color: white;
                border: none;
                padding: 10px 20px;
                border-radius: 5px;
                cursor: pointer;
            }
        </style>
    </head>
    
    <body>
    <br>
        <a href='admin.php' class='home-button'>Home</a>
        <br>
        <br>
        <h1>Pending Blog Posts</h1>
        <table>
            <tr><th>Flat ID</th><th>Title</th><th>Content</th><th>Image</th><th>Blog Status</th><th>Action</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["title"] . "</td>";
        echo "<td>" . $row["content"] . "</td>";
        echo "<td><img src='images/" . $row["img"] . "' alt='Blog Image' height='100'></td>";
        echo "<td>" . $row["status"] . "</td>";
        echo "<td>";
        echo "<form action='" . $_SERVER['PHP_SELF'] . "' method='post'>";
        echo "<input type='hidden' name='blog_id' value='" . $row["id"] . "'>";
        echo "<select name='action'>";
        echo "<option value='approve'>Approve</option>";
        echo "<option value='deny'>Deny</option>";
        echo "</select>";
        echo "<input type='submit' value='Submit'>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<a href='admin.php' class='home-button'>Home</a>";
    echo "<br>";
    echo "0 results";
}


$conn->close();
?>
