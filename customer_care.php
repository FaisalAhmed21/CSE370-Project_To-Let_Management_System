<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "db";

  $conn = new mysqli($servername, $username, $password, $dbname);


  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Care</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <style>

        body {
            background-image: url('images/img.jpeg');
            background-size:cover;
            background-repeat: no-repeat;
            filter: opacity(95%);
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
</head>
<button class="home-button" onclick="window.location.href='loginhome.html'">Home</button>
<body>

        <br>
        <br>
        <br>
        <br>
        
        <div class="w-75 py-3 px-md-5 my-3 rounded text-body-emphasis bg-body-secondary mx-auto ">
            <div class="row flex-lg-row-reverse align-items-center g-5 p-3">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="images/customer-care.jpg" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Contact Us About our To-Let-Website</h1>
                    <p class="lead my-4">We'd love to show you how you can get more easily flat and yout tenants, save your time & hassle, provide better customer service, or all of the above! Here are a few ways to reach out to our sales team.</p>
                    
                </div>
            </div>
        </div>

        <br><br><br>
       
        <div class="container mx-auto">
            <div class="row gap-5 m-5 d-flex justify-content-center">
                <div class="card mb-3 mx-5 text-center" style="width: 18rem;">
                    <div class="card-body">
                        <i class="fa-solid fa-phone"></i>
                        <h5 class="card-title mt-4">Talk to Sales</h5>
                        <p class="card-text mt-4">Our self-serve help center is open 24/7 to help you always with our staff.</p>
                        <p sty>
                            <button class="btn btn-primary mt-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample">
                                Call Now
                            </button>
                        </p>
                        <div style="min-height: 20px;">
                            <div class="collapse collapse-horizontal" id="collapseWidthExample">
                                <div class="card card-body" style="width: 200px;">
                                        +999023232322323
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card text-center mb-3 mx-5" style="width: 18rem;">
                    <div class="card-body">
                        <i class="fa-regular fa-envelope-open"></i>
                        <h5 class="card-title mt-4">Email Support</h5>
                        <p class="card-text mt-4">Prefer to email? Send us an email and we’ll get back to you soon.</p>
                        <a href="https://www.google.com/gmail/about/" target="_blank" class="btn btn-primary mt-4">Sent Mail</a>
                    </div>
                </div>
            </div>     
        </div><br><br><br><hr class="text-light"><br><br>

        

        <div class="container my-5 w-75 bg-light p-5 rounded-3">
            <h1 class="h1 my-3 text-center">Get in touch with us!</h1>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" class="was-validated" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nameinput" class="form-label">Name</label>
                    <input type="text" class="form-control" name="nameinput" placeholder="name example" required>
                    <div class="invalid-feedback">
                        Please enter your name.
                    </div>
                </div>
                <br>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" placeholder="name@example.com" required>
                    <div class="invalid-feedback">
                        Please enter your email address.
                    </div>
                </div>
                <br>
                <p>Select your Subject:</p>
                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" name="validationFormCheck1">
                    <label class="form-check-label" for="validationFormCheck1">Suggestion</label>
                </div>
                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" name="validationFormCheck1">
                    <label class="form-check-label" for="validationFormCheck1">Complain</label>
                </div>
                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" name="validationFormCheck1">
                    <label class="form-check-label" for="validationFormCheck1">Help</label>
                </div>
                <br>
                <div class="mb-3">
                    <label for="validationTextarea" class="form-label">Your Query</label>
                    <textarea class="form-control" name="validationTextarea" placeholder="Write down your Message here...." required></textarea>
                    <div class="invalid-feedback">
                        Please enter a message in the textarea.
                    </div>
                </div>
                <br>
                <p>Select customer type:</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="validationFormCheck2" name="radio-stacked" required>
                    <label class="form-check-label" for="validationFormCheck2">Saler</label>
                </div>
                <div class="form-check mb-3">
                    <input type="radio" class="form-check-input" id="validationFormCheck3" name="radio-stacked" required>
                    <label class="form-check-label" for="validationFormCheck3">Renter</label>
                    <div class="invalid-feedback">Please Choose any one</div>
                </div>
                <br>
                <div class="mb-3">
                    <select class="form-select" required="" name="selectexample">
                    <option value="">Select your City</option>
                    <option value="1">Dhaka</option>
                    <option value="2">Sylhet</option>
                    <option value="3">Chittagang</option>
                    <option value="3">Cox's Bazar</option>
                    <option value="3">Rajshahi</option>
                    <option value="3">Khulna</option>
                    </select>
                    <div class="invalid-feedback">Please Choose any one</div>
                </div>
                <br>
                <p>Select your attachment:</p>
                <div class="mb-3">
                    <input type="file" class="form-control" name="file">
                    
                </div>
                <br>
                <div class="mb-3">
                    <button class="btn btn-primary" type="submit" name="submit" value="submit">Submit form</button>
                </div>
            </form><br><br>

        </div><br><br><hr class="text-light">

        
        <div class="d-flex flex-column flex-md-row p-4 gap-4 py-md-5 align-items-center justify-content-center">
            
            <div class="my-5 list-group list-group-checkable d-grid gap-3 border-0">
                <h2 class="text-center h2 my-4 bg-light w-50 mx-auto p-2 rounded-3">Our Office Address</h2>
                <?php
                 $sql = "SELECT * FROM office";
                 $result = mysqli_query($conn, $sql);
                 while ($row = mysqli_fetch_assoc($result)){
                         echo '<label class="list-group-item rounded-3 py-3" for="listGroupCheckableRadios1">' . 
                         $row["name"] . 
                         '<span class="d-block small opacity-50 mb-2">' . $row["address"] . '</span>
                         Phone Number
                         <span class="d-block small opacity-50 mb-2">' . $row["number"] . '</span>
                         <a class="text-decoration-none" href="' . $row["link"] . '" title="View on Map" target="_blank">View on Map</a>
                         </label>';
                 }
                ?>
            </div>
        </div><br><br>
        <hr class="text-light"><br><br>

        
        <div class="container w-50 my-5">
            <h3 class="h3 bg-light text-center rounded-3 p-3 w-75 my-5 mx-auto">For specific questions, get in touch here</h3>
            <div class="accordion" id="accordionExample">
                <?php
                 $sql = "SELECT * FROM faq";
                 $result = mysqli_query($conn, $sql);
                 while ($row = mysqli_fetch_assoc($result)){
                         echo '<div class="accordion-item">
                                     <h2 class="accordion-header">
                                     <button class="accordion-button mb-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">' . $row['question'] . '</button>
                                         
                                     
                                     </h2>
                                     <div id="collapseOne" class="accordion-collapse collapse mb-2" data-bs-parent="#accordionExample">
                                         <div class="accordion-body">
                                             ' . $row['answer'] . '
                                         </div>
                                     </div>
                                 </div>';

                 }
                 ?>
            </div>
                
        </div>
        
        
    </div>



    <?php 

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = filter_input(INPUT_POST, 'nameinput', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $subject = filter_input(INPUT_POST, 'validationFormCheck1', FILTER_SANITIZE_SPECIAL_CHARS);
        $query = filter_input(INPUT_POST, 'validationTextarea', FILTER_SANITIZE_SPECIAL_CHARS);
        $who = filter_input(INPUT_POST, 'radio-stacked', FILTER_SANITIZE_SPECIAL_CHARS);
        $city = filter_input(INPUT_POST, 'selectexample', FILTER_SANITIZE_SPECIAL_CHARS);
        $fname = rand(1000,10000)."-".$_FILES["file"]["name"];
        $tname = $_FILES["file"]["tmp_name"];
        $folder = 'downloads/';
        
        move_uploaded_file($tname, $folder. '/' . $fname);

        if (empty($name) || empty($email) || empty($query) || empty($who) || empty($city)) {
            echo "Please fill in all the fields.";
        }
        else {
            try {

                $sql = "INSERT INTO contact_form (names, email,	subjects, query, who, city, file) VALUES ('$name', '$email', '$subject', '$query', '$who', '$city', '$fname')";
                mysqli_query($conn, $sql);
                echo ' <h3 " . class="text-light text-center fixed-top m-5 p-4" . ">Your Response is Recieved!<h3>';
            } catch(mysqli_sql_exception){
                echo ' <h3 " . class="text-light text-center fixed-top m-5 p-4" . ">User has already submitted!<h3>';
            }    
        }
    }




require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';


$mail = new PHPMailer(true);

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
    $mail->Subject = 'Confirmation Mail';
    $mail->Body    = 'Thanks for filling out the form. Your response has been recieved <b>successfully!</b>';
   
    
    $mail->send();
    echo '<h3 " . class="text-light text-center m-5 p-4" . ">Message has been sent</h3>';
} catch (Exception $e) {

} 
   
    ?><br><br><br><br>
    <footer class="py-3 my-4">
        <p class="text-center text-light">Copyright © To-Let.com. All Rights Reserved.</p>
    </footer>


    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>