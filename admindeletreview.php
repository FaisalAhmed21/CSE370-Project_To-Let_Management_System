<?php

if (isset($_POST['id']) && !empty($_POST['id'])) {
    $review_id = $_POST['review_id'];

   
    $conn = new mysqli("localhost", "root", "", "db");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

   
    $sql = "DELETE FROM reviews_ratings WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $review_id);
    $stmt->execute();

   
    $stmt->close();
    $conn->close();

    
    header("Location: adminreview.php");
    exit;
} else {
    header("Location: adminreview.php");
    exit;
}
?>
