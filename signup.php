<?php
$errors = array();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if user type is selected
    if (empty($_POST["name"])) {
        $errors['name'] = "Name is required";
    }

    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Valid email is required";
    }

    if (strlen($_POST["password"]) < 8) {
        $errors['password'] = "Password must be at least 8 characters";
    } elseif (!preg_match("/[a-z]/i", $_POST["password"])) {
        $errors['password'] = "Password must contain at least one letter";
    } elseif (!preg_match("/[0-9]/", $_POST["password"])) {
        $errors['password'] = "Password must contain at least one number";
    }

    if ($_POST["password"] !== $_POST["password_confirmation"]) {
        $errors['password_confirmation'] = "Passwords must match";
    }

    if (empty($errors)) {
        $servername = "localhost"; // Replace with your MySQL server address
        $username = "root"; // Replace with your MySQL username
        $password = ""; // Replace with your MySQL password
        $database = "db"; // Replace with your MySQL database name

        // Create connection
        $mysqli = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }

        // Check if email already exists
        $check_sql = "SELECT * FROM user WHERE email = ?";
        $check_stmt = $mysqli->prepare($check_sql);
        $check_stmt->bind_param("s", $_POST["email"]);
        $check_stmt->execute();
        $result = $check_stmt->get_result();

        if ($result->num_rows > 0) {
            $errors['email'] = "Email already taken";
            $check_stmt->close();
            $mysqli->close();
        } else {
            $check_stmt->close();

            // Insert user data into the database
            $sql = "INSERT INTO user (name, email, password_hash) VALUES (?, ?, ?)";
            $stmt = $mysqli->prepare($sql);

            if (!$stmt) {
                die("SQL error: " . $mysqli->error);
            }

            $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
            $stmt->bind_param("sss", $_POST["name"], $_POST["email"], $password_hash);
            $stmt->execute();
            $stmt->close();
            $mysqli->close();

            header("Location: login.php");
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 6px;
            color: #555;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: -10px;
            margin-bottom: 10px;
        }

        button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }
        body {
        background-image: url('images/img.jpeg');
        background-size: cover;
        background-repeat: no-repeat;
        }
    </style>
</head>
<body>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="signup" novalidate>
    <h1>Signup</h1>

    <div>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>" required>
        <?php if(isset($errors['name'])) echo '<div class="error">' . $errors['name'] . '</div>'; ?>
    </div>

    <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required>
        <?php if(isset($errors['email'])) echo '<div class="error">' . $errors['email'] . '</div>'; ?>
    </div>

    <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        <?php if(isset($errors['password'])) echo '<div class="error">' . $errors['password'] . '</div>'; ?>
    </div>

    <div>
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>
        <?php if(isset($errors['password_confirmation'])) echo '<div class="error">' . $errors['password_confirmation'] . '</div>'; ?>
    </div>


    <button type="submit">Sign up</button>
</form>

</body>
</html>
