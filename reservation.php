<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flat Reservation</title>
    <style>
        .form-container {
            background-color: rgba(255, 255, 255, 0.7);
            padding: 30px;
            border-radius: 10px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        body {
            background-image: url('images/img.jpeg');
            background-size: cover;
            background-repeat: no-repeat;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .error-message {
            background-color: red;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .success-message {
            background-color: green;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    session_start(); 

    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $database = "db"; 

    $mysqli = new mysqli($servername, $username, $password, $database);

    if (!$mysqli) {
        echo "<div class='error-message'>Error connecting to the database. Please try again later.</div>";
        exit;
    }

    $error_message = '';
    $success_message = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name']; 
        $flatId = $_POST['Flatid'];
        $date = $_POST['date'];
        $timeslot = $_POST['timeslot'];

        $checkStmt = $mysqli->prepare("SELECT * FROM reservation WHERE Flatid = ? AND date = ? AND timeslot = ?");
        $checkStmt->bind_param("sss", $flatId, $date, $timeslot);
        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();

        if ($checkResult->num_rows > 0) {
            $error_message = "The time slot is already taken or pending approval.";
        } else {
            $insertStmt = $mysqli->prepare("INSERT INTO reservation (Flatid, name, date, timeslot) VALUES (?, ?, ?, ?)");
            $insertStmt->bind_param("ssss", $flatId, $name, $date, $timeslot); 
            $insertStmt->execute();
            $success_message = "Reservation successfully made, wait for Admin's approval.";
            $insertStmt->close();
        }

        $checkStmt->close();
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
    <?php if (!empty($error_message)) : ?>
        <div class="error-message"><?php echo $error_message; ?></div>
    <?php endif; ?>
    <?php if (!empty($success_message)) : ?>
        <div class="success-message"><?php echo $success_message; ?></div>
    <?php endif; ?>
    <div class="form-container">
        <h2>Flat Reservation Form</h2>
        <form action="" method="post" style="text-align: left;">
            <label for="name">Your Name:</label><br>
            <input type="text" id="name" name="name" value="<?php echo $name; ?>" required><br><br>

            <label for="Flatid">Flat ID:</label><br>
            <input type="text" id="Flatid" name="Flatid" value="<?php echo isset($_GET['Flatid']) ? $_GET['Flatid'] : ''; ?>" required><br><br>
            
            <label for="date">Date:</label><br>
            <input type="date" id="date" name="date" min="<?php echo date('Y-m-d'); ?>" required><br><br>

            <label for="timeslot">Time Slot:</label><br>
            <select id="timeslot" name="timeslot" required>
                <option value="" disabled selected>Select Time Slot</option>
                <?php
                    
                    for ($hour = 10; $hour <= 16; $hour++) {
                        echo '<option value="'.sprintf("%02d", $hour).':00">'.sprintf("%02d", $hour).':00-'.sprintf("%02d", $hour).':59</option>';
                    }
                ?>
            </select><br><br>

            <input type="submit" value="Reserve">
            <br>
        </form>
        <br>
        <a href="view.php"><button>See More Flats</button></a>
    </div>
    <?php
        }
    }

    $mysqli->close();
    ?>
</body>
</html>
