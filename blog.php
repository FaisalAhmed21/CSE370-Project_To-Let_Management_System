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
    $name = filter_input(INPUT_POST, 'nameinput', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $title = filter_input(INPUT_POST, 'titleinput', FILTER_SANITIZE_SPECIAL_CHARS);
    $content = filter_input(INPUT_POST, 'validationTextarea', FILTER_SANITIZE_SPECIAL_CHARS);
    $fname = rand(1000, 10000) . "-" . $_FILES["file"]["name"];
    $tname = $_FILES["file"]["tmp_name"];
    $folder = 'images/';

    move_uploaded_file($tname, $folder . '/' . $fname);

    if (empty($name) || empty($email) || empty($content)) {
        echo "Please fill in all the fields.";
    } else {
        try {
            $sql = "INSERT INTO blog (title, writer, content, email, img) VALUES ('$title', '$name', '$content', '$email', '$fname')";
            mysqli_query($conn, $sql);

            
            header("Location: blog.php");
            exit(); 
        } catch (mysqli_sql_exception $e) {
            echo '<h3 class="text-light text-center fixed-top m-5 p-4">User has already submitted!</h3>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <style>
        body {
            background-image: url('images/img.jpeg');
            background-size: cover;
            background-repeat: no-repeat;
            filter: opacity(93%);
            margin: 0px;
            padding: 0px;
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
</head>
<button class="home-button" onclick="window.location.href='loginhome.html'">Home</button>
<body>

        <br>
        <br>

        
        <div class="container">
            <div class="p-5 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
                <div class="col-lg-6 px-0">
                    <h1 class="display-4 fst-italic">Create a blog</h1>
                    <p class="lead my-3">Share your story with the world. Stand out with a professionally-designed
                        blog website that can be customized to fit your brand. Build, manage, and promote your blog
                        with Squarespace’s built-in suite of design and marketing tools.</p>
                    <p class="lead mb-0"><a href="#write" class="text-body-emphasis fw-bold">Start
                            writing...</a></p>
                </div>
            </div><br>

        </div>

        

        <div class="album m-5 p-5 bg-body-tertiary">
            <div class="container" id="blogs">
                <div class="row row-cols-1  row-cols-sm-2 row-cols-md-3 g-4">
                    <?php
                    $sql = "SELECT * FROM blog where status ='approve'";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '
                                            <div class="col">
                                                <div class="card shadow-sm">
                                                    <img src="images/' . $row['img'] . '" alt="tolet" height="250px">
                                                    <div class="card-body">
                                                        <h3>' . $row['title'] . '</h3>
                                                        <p class="card-text">' . substr($row['content'], 0, 250) . '</p>
                                                        <a href="blog_read.php#' . $row['id'] . '"><button type="button" class="btn btn-md btn-warning">Read more</button></a>
                                                    </div>
                                                </div>
                                            </div>';
                    }
                    ?>
                </div>
            </div>
        </div> <br><br><br><hr class="text-light"><br><br><br>

        

        <div class="container w-75 bg-light p-5 rounded-3" id="write">
            <h2 class="text-center h2 my-4 bg-light text-dark w-50 mx-auto p-2 rounded-3">CREATE YOUR BLOG</h2><br>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST"
                enctype="multipart/form-data">
                <div class="mt-3">
                    <label for="nameinput" class="form-label">Name</label>
                    <input type="text" class="form-control" name="nameinput" placeholder="name example" required>
                    <div class="invalid-feedback">
                        Please enter your name.
                    </div>
                </div>
                <br><br>
                <div class="">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" placeholder="name@example.com" required>
                    <div class="invalid-feedback">
                        Please enter your email address.
                    </div>
                </div>
                <br><br>
                <div class="mt-3">
                    <label for="titleinput" class="form-label">Title</label>
                    <input type="text" class="form-control" name="titleinput" placeholder="Title example" required>
                    <div class="invalid-feedback">
                        Please enter the Title.
                    </div>
                </div>
                <br><br>
                <div class="mb-3">
                    <label for="validationTextarea" class="form-label">Create Blog</label>
                    <textarea class="form-control" name="validationTextarea"
                        placeholder="Write your Blog here...." required></textarea>
                    <div class="invalid-feedback">
                        Please write your blog here.
                    </div>
                </div>
                <br><br>

                <p>Select your attachment:</p>
                <div class="mb-3">
                    <input type="file" class="form-control" name="file">

                </div>
                <br><br>
                <div class="">
                    <button class="btn btn-primary btn-lg" type="submit" name="submit" value="submit">Submit form</button>
                </div>
            </form><br><br>

        </div>

    </div>

  

    <?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = filter_input(INPUT_POST, 'nameinput', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $title = filter_input(INPUT_POST, 'titleinput', FILTER_SANITIZE_SPECIAL_CHARS);
        $content = filter_input(INPUT_POST, 'validationTextarea', FILTER_SANITIZE_SPECIAL_CHARS);
        $fname = rand(1000, 10000) . "-" . $_FILES["file"]["name"];
        $tname = $_FILES["file"]["tmp_name"];
        $folder = 'images/';

        move_uploaded_file($tname, $folder . '/' . $fname);

        if (empty($name) || empty($email) || empty($content)) {
            echo "Please fill in all the fields.";
        } else {
            try {

                $sql = "INSERT INTO blog (title, writer, content, email, img) VALUES ('$title', '$name', '$content', '$email', '$fname')";
                mysqli_query($conn, $sql);
                echo ' <h3 " . class="text-light text-center fixed-top m-5 p-4" . ">Your Response is Recieved!<h3>';
            } catch (mysqli_sql_exception) {
                echo ' <h3 " . class="text-light text-center fixed-top m-5 p-4" . ">User has already submitted!<h3>';
            }
        }
    }
  

    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';


    $mail = new PHPMailer(true);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    try {


        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'tasnimul.hassan.khan@g.bracu.ac.bd';
        $mail->Password   = 'ongb vnsw ltxh qyzm';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;
        $mail->setFrom('tasnimulhassan02@gmail.com', 'To-Let.com');
        $mail->addAddress($email, 'User');
        $mail->isHTML(true);
        $mail->Subject = 'Blog Submission Mail';
        $mail->Body    = ' Your response has been recieved <b>successfully!</b> Thanks for writing such an amazaing blog! We are happy to post your blog in our main section.';


        $mail->send();
        echo '<h3 " . class="text-light text-center m-5 p-4" . ">Message has been sent</h3>';
    } catch (Exception $e) {
        
    }

    ?>

    <br><br><br><br>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
