<?php
session_start();

$errors = array();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (empty($_POST["email"])) {
        $errors['email'] = "Email is required";
    }

    if (empty($_POST["password"])) {
        $errors['password'] = "Password is required";
    }

    if (empty($errors)) {
        $servername = "localhost"; 
        $username = "root";
        $password = ""; 
        $database = "db"; 

       
        $mysqli = new mysqli($servername, $username, $password, $database);

        
        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }

        
        $sql = "SELECT * FROM user WHERE email = ?";
        $stmt = $mysqli->prepare($sql);

        if (!$stmt) {
            die("SQL error: " . $mysqli->error);
        }

        
        $stmt->bind_param("s", $_POST["email"]);

        
        $stmt->execute();

        
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            if (password_verify($_POST["password"], $row["password_hash"])) {
                
                $_SESSION["user_id"] = $row["id"]; 

               
                $email = $_POST["email"];
                $insertSql = "INSERT INTO userinfo (email) VALUES (?)";
                $insertStmt = $mysqli->prepare($insertSql);
                $insertStmt->bind_param("s", $email);
                $insertStmt->execute();
                $insertStmt->close();

                header("Location: loginhome.html");
                exit;
            } else {
                $errors['login'] = "Invalid email or password";
            }
        } else {
            $errors['login'] = "Invalid email or password";
        }

        
        $stmt->close();
        $mysqli->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            max-width: 400px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            margin-top: 0;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #666;
            font-weight: bold;
        }

        input[type="email"],
        input[type="password"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            margin-bottom: 10px;
        }
        body {
        background-image: url('images/img.jpeg');
        background-size: cover;
        background-repeat: no-repeat;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <?php if (!empty($errors)) : ?>
            <div class="error-message">
                <?php foreach ($errors as $error) : ?>
                    <p><?php echo $error; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email"><br><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password"><br><br>
            <input type="submit" value="Login">
        </form>
        </form>
        <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
    </div>
</body>
</html>
