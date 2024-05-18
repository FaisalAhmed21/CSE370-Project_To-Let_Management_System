<?php

$conn = new mysqli("localhost", "root", "", "db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_GET['Flatid'])) {
    $Flatid = $_GET['Flatid'];

    
    $sql = "SELECT a.Flatid, a.flat_type, r.review, r.rating, r.username FROM addproperty a LEFT JOIN reviews_ratings r ON a.Flatid = r.Flatid WHERE a.Flatid = $Flatid";
    $result = $conn->query($sql);

    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div style='margin-top: 30px; background-color: rgba(0, 0, 0, 0.6); padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);'>";
            echo "<h2 style='border-bottom: 2px solid white; padding-bottom: 5px;'>Reviews and Ratings for Flat ID: " . $row['Flatid'] . "</h2>";
            echo "<p><strong>Flat Type:</strong> " . $row['flat_type'] . "</p>";

    
            if (!empty($row['username'])) {
                echo "<p><strong>User Name:</strong> " . $row['username'] . "</p>";
            } else {
                echo "<p>No username available.</p>";
            }
            
            if (!empty($row['review'])) {
                echo "<p><strong>Review:</strong> " . $row['review'] . "</p>";
            } else {
                echo "<p>No reviews available.</p>";
            }

            if (!empty($row['rating'])) {
                echo "<p><strong>Rating:</strong> " . $row['rating'] . "</p>";
            } else {
                echo "<p>No ratings available.</p>";
            }

            echo "</div>"; 
        }
    } else {
        echo "<p>No reviews and ratings found for this property.</p>";
    }
} else {
    echo "<p>No Flatid provided in the URL.</p>";
}


$conn->close();
?>
