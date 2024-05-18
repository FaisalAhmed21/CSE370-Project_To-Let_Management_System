<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Reviews</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .review {
            margin-top: 20px;
            background-color: rgba(0, 0, 0, 0.1);
            padding: 15px;
            border-radius: 8px;
        }

        h2 {
            margin-top: 0;
            color: #333;
            border-bottom: 2px solid #333;
            padding-bottom: 5px;
        }

        p {
            margin: 10px 0;
        }

        strong {
            font-weight: bold;
        }

        .delete-btn {
            background-color: #ff6666;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
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
<button class="home-button" onclick="window.location.href='admin.php'">Home</button>
    <div class="container">
        <h2>All Reviews</h2>
        <?php

        $conn = new mysqli("localhost", "root", "", "db");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['review_id'])) {
            $review_id = $_POST['review_id'];
            
           
            $sql_delete = "DELETE FROM reviews_ratings WHERE id = ?";
            
           
            $stmt = $conn->prepare($sql_delete);
            $stmt->bind_param("i", $review_id);
            
            
            if ($stmt->execute()) {
                echo "Review deleted successfully.";
            } else {
                echo "Error deleting review: " . $conn->error;
            }
            
            
            $stmt->close();
        }

        $sql = "SELECT a.Flatid, a.flat_type, r.id, r.review, r.rating, r.username FROM addproperty a LEFT JOIN reviews_ratings r ON a.Flatid = r.Flatid";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                
                if (!empty($row['review'])) {
                    echo "<div class='review'>";
                    echo "<h3>Review ID: " . $row['id'] . "</h3>"; 
                    echo "<h4>Flat ID: " . $row['Flatid'] . "</h4>";
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

                   
                    echo "<form action='' method='post'>";
                    echo "<input type='hidden' name='review_id' value='" . $row['id'] . "'>"; 
                    echo "<input type='submit' class='delete-btn' value='Delete Review'>";
                    echo "</form>";

                    echo "</div>"; 
                }
            }
        } else {
            echo "<p>No reviews and ratings found for any property.</p>";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>