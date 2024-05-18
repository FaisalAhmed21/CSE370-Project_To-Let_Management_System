<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM reservation WHERE status NOT IN ('approve', 'deny')";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    echo "<style>
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
          </style>";

    
    echo "<a href='admin.php' style='position: absolute; top: 10px; left: 10px; padding: 10px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 4px;'>Home</a>";

    echo "<table>";
    echo "<tr><th>Name</th><th>Flat ID</th><th>Resarvetion Status</th><th>Action</th></tr>";

    
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["Flatid"] . "</td>";
        echo "<td>" . $row["status"] . "</td>";
        echo "<td>";
        
        echo "<form action='updatestatus.php' method='post'>";
        echo "<input type='hidden' name='reservation_id' value='" . $row["rvid"] . "'>";
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
    echo "<a href='admin.php' style='position: absolute; top: 10px; left: 10px; padding: 10px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 4px;'>Home</a><br><br><br>";

    echo "0 results";
}

$conn->close();
?>
