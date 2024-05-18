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
        $email = $user['email'];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Apartment</title>
    <style>
        body {
            background-color: Gray;
            background-size: cover;
            background-repeat: no-repeat;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
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
    <h2>Add Apartment</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="<?php echo $name; ?>" readonly><br>

        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email" value="<?php echo $email; ?>" readonly><br>

        <label for="phone_number">Phone Number:</label><br>
        <input type="text" id="phone_number" name="phone_number" required><br>
        
        <label for="flat_location">Flat Location:</label><br>
        <input type="text" id="flat_location" name="flat_location" required><br>
        
        <label for="floor_number">Floor Number:</label><br>
        <input type="text" id="floor_number" name="floor_number" required><br>
        
        <label for="flat_size">Flat Size (sq ft):</label><br>
        <input type="text" id="flat_size" name="flat_size" required><br>
        
        <label for="bedrooms">Number of Bedrooms:</label><br>
        <input type="text" id="bedrooms" name="bedrooms" required><br>
        
        <label for="washrooms">Number of Washrooms:</label><br>
        <input type="text" id="washrooms" name="washrooms" required><br>
        
        <label for="balcony">Number of Balconies:</label><br>
        <input type="text" id="balcony" name="balcony" required><br>
        
        <label for="kitchen">Number of Kitchens:</label><br>
        <input type="text" id="kitchen" name="kitchen" required><br>
        
        <label for="living_room">Number of Living Rooms:</label><br>
        <input type="text" id="living_room" name="living_room" required><br>
        
        <label for="dinning_room">Number of Dining Rooms:</label><br>
        <input type="text" id="dinning_room" name="dinning_room" required><br>
        
        <label for="flat_type">Flat Type:</label><br>
        <select id="flat_type" name="flat_type">
            <option value="Family">Family</option>
            <option value="Bachelor">Bachelor</option>
            <option value="Sublet">Sublet</option>
        </select><br>
        
        <label for="photos">Upload Photos:</label><br>
        <input type="file" id="photos" name="photos[]" multiple><br>
        
        <label for="rent">Rent (Taka):</label><br>
        <input type="text" id="rent" name="rent" required><br>
        
        <input type="submit" value="Submit">
    </form>
</div>
</body>
</html>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['flat_location']) || empty($_POST['flat_size']) || empty($_POST['bedrooms']) || empty($_POST['washrooms']) || empty($_POST['balcony']) || empty($_POST['kitchen']) || empty($_POST['living_room']) || empty($_POST['dinning_room']) || empty($_POST['rent']) || empty($_FILES['photos']['name'][0]) || empty($_POST['phone_number'])) {
        echo "Please fill in all the fields.";
    } else {
        $uploads_dir = __DIR__ . '/uploads/';
        if (!file_exists($uploads_dir)) {
            mkdir($uploads_dir, 0777, true);
        }

        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];

        $flat_location = $_POST['flat_location'];
        $floor_number = $_POST['floor_number'];
        $flat_size = $_POST['flat_size'];
        $bedrooms = $_POST['bedrooms'];
        $washrooms = $_POST['washrooms'];
        $balcony = $_POST['balcony'];
        $kitchen = $_POST['kitchen'];
        $living_room = $_POST['living_room'];
        $dinning_room = $_POST['dinning_room'];
        $rent = $_POST['rent'];
        $flat_type = $_POST['flat_type']; 

        $target_dir = "uploads/";
        $target_files = [];
        foreach ($_FILES['photos']['tmp_name'] as $key => $tmp_name) {
            $target_file = $target_dir . basename($_FILES['photos']['name'][$key]);
            if (move_uploaded_file($_FILES['photos']['tmp_name'][$key], $target_file)) {
                $target_files[] = $target_file;
            } else {
                echo "Failed to move uploaded file: " . $_FILES['photos']['name'][$key];
            }
        }

        $conn = new mysqli("localhost", "root", "", "db");
        if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
        }

        $photos_string = implode(",", $target_files);

        $sql = "INSERT INTO addproperty (name, email, phone_number, flat_location, floor_number, flat_size, bedrooms, washrooms, balcony, kitchen, living_room, dinning_room, photos, rent, flat_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssiiiiiiiisis", $name, $email, $phone_number, $flat_location, $floor_number, $flat_size, $bedrooms, $washrooms, $balcony, $kitchen, $living_room, $dinning_room, $photos_string, $rent, $flat_type);

        if ($stmt->execute()) {
            echo "New record created successfully";
            header("Location: success.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $stmt->close();
        $conn->close();
    }
}
?>