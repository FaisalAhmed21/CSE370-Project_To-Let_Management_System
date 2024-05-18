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

        ?>
        
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Add Review</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: gray;
                    margin: 0;
                    padding: 0;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                }

                .container {
                    width: 400px;
                    padding: 20px;
                    background-color: rgba(255, 255, 255, 0.7); 
                    border-radius: 10px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
                }

                h1 {
                    text-align: center;
                    color: #333;
                }

                form {
                    display: flex;
                    flex-direction: column;
                }

                label {
                    font-weight: bold;
                    margin-bottom: 5px;
                }

                input[type="text"],
                input[type="number"],
                textarea {
                    width: 100%;
                    padding: 10px;
                    margin-bottom: 15px;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                    box-sizing: border-box;
                    background-color: rgba(255, 255, 255, 0.7); 
                }

                textarea {
                    resize: vertical;
                }

                input[type="submit"] {
                    background-color: #4caf50;
                    color: #fff;
                    border: none;
                    padding: 8px 16px; 
                    border-radius: 5px;
                    cursor: pointer;
                    transition: background-color 0.3s;
                    width: auto; 
                    max-width: 150px; 
                    align-self: center; 
                }

                input[type="submit"]:hover {
                    background-color: #45a049;
                }

                .error-message {
                    color: #f00;
                    margin-top: 10px;
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
                <h1>Add Review</h1>

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <label for="username">Your Name:</label>
                    <input type="text" id="username" name="username" value="<?php echo $name; ?>" required><br><br>

                    <label for="Flatid">Flat ID:</label>
                    <input type="text" id="Flatid" name="Flatid" value="<?php echo isset($_GET['Flatid']) ? $_GET['Flatid'] : ''; ?>" required><br><br>

                    <label for="review">Review:</label><br>
                    <textarea id="review" name="review" rows="4" cols="50" required></textarea><br><br>

                    <label for="rating">Rating (out of 5):</label>
                    <input type="number" id="rating" name="rating" min="1" max="5" required><br><br>

                    <input type="submit" value="Submit Review">
                </form>
            </div>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
               
                $conn = new mysqli("localhost", "root", "", "db");
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                
                $username = $_POST['username'];
                $Flatid = $_POST['Flatid'];
                $review = $_POST['review'];
                $rating = $_POST['rating'];

                
                $sql = "INSERT INTO reviews_ratings (username, Flatid, review, rating) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("siss", $username, $Flatid, $review, $rating);

                if ($stmt->execute()) {
                  
                    header("Location: view.php");
                    exit; 
                } else {
                    echo "Error: " . $stmt->error;
                }

                
                $stmt->close();
                $conn->close();
            }
            ?>
        </body>
        </html>
        
        <?php

    }
}
?>
