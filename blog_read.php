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
    <title>Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>

        body {
            background-image: url('images/img.jpeg');
            background-size:cover;
            background-repeat: no-repeat;
            filter: opacity(93%);
            margin: 0px;
            padding: 0px;
        }

    </style>
</head>
<body>
<div class="container-fluid  m-3">
    
    <a href="blog.php#blogs"><button type="button" class="btn btn-warning">Return</button></a>

    <div class="container bg-light m-5 p-5">
        <?php
            $sql = "SELECT * FROM blog";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)){
                echo '  <div class="container" id= "' . $row['id'] . '">
                            <img src="images/' . $row['img'] . ' " style="width: 40vw">
                            <h2 class="h2 my-5 pt-5 pb-2">' . $row['title'] . '</h2>
                            <div class="container">
                                <p>' . $row['content'] . '</p><br><br><br><br><br><br>
                            </div>
                        </div>

                        
                        
                        
                        
                        ';
 }
?>
       
    </div>
</div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>