<?php
session_start(); 
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "db"; 

$mysqli = new mysqli($servername, $username, $password, $database);

if ($mysqli->connect_errno) {
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

        $reservationQuery = "SELECT * FROM reservation WHERE name = '$name'";

        $reservationResult = $mysqli->query($reservationQuery);

        ?>
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>User Reservations</title>
            <style>
                body {
                    background-color: Gray ; 
                    background-size: cover;
                    background-repeat: no-repeat;
                    font-family: Arial, sans-serif;
                    margin: 0;
                    padding: 0;
                    position: relative; 
                }
                table {
                    width: 100%;
                    border-collapse: collapse;
                }
                th, td {
                    border: 1px solid #dddddd;
                    text-align: left;
                    padding: 8px;
                }
                .home-button {
                    position: absolute;
                    top: 10px;
                    right: 10px;
                    color: black; 
                    text-decoration: none; 
                }
            </style>
        </head>
        <body>
            <a class='home-button' href='loginhome.html'>Home</a>
            <h1>User Reservations</h1>
            <p>User: <?php echo $name; ?></p>
        <?php

        if ($reservationResult && $reservationResult->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>Status</th>
                        <th>Flat ID</th>
                        <th>Time Slot</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>";
            while ($reservation = $reservationResult->fetch_assoc()) {
                $status = isset($reservation['status']) ? $reservation['status'] : 'N/A';
                $flatid = isset($reservation['Flatid']) ? $reservation['Flatid'] : 'N/A';
                $timeSlot = isset($reservation['timeslot']) ? $reservation['timeslot'] : 'N/A';
                $date = isset($reservation['date']) ? $reservation['date'] : 'N/A';
                $reservationID = isset($reservation['rvid']) ? $reservation['rvid'] : ''; 

                echo "<tr>
                        <td>$status</td>
                        <td>$flatid</td>
                        <td>$timeSlot</td>
                        <td>$date</td>
                        <td>
                            <form method='post'>
                                <input type='hidden' name='user_name' value='$name'>
                                <input type='hidden' name='reservation_id' value='$reservationID'>
                                <button type='submit' name='cancel_reservation'>Cancel</button>
                            </form>
                        </td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No reservations found for user: $name</p>";
        }

        ?>
        </body>
        </html>
        <?php

        if(isset($_POST['cancel_reservation'])) {
            $userName = $_POST['user_name'];
            $reservationID = $_POST['reservation_id'];

            $deleteQuery = "DELETE FROM reservation WHERE rvid = $reservationID AND name = '$userName'";
            if ($mysqli->query($deleteQuery)) {
                header("Location: reservationstatus.php");
                exit; 
            } else {
                echo "Error canceling reservation: " . $mysqli->error;
            }
        }
    } else {
        echo "No user found with the latest email.";
    }
} else {
    echo "Error executing query: " . $mysqli->error;
}

$mysqli->close();
?>
