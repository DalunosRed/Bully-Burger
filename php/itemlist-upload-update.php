<?php
require_once 'includes/config.php';
$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  session_start();
    $itemid = $_SESSION['itemid'];


  if($_FILES["file"]["name"] != '')
  {
    $file = $_FILES["file"]["name"];
     $location = '../images/food-images/' . $file;
     move_uploaded_file($_FILES["file"]["tmp_name"], $location);

     $query = "UPDATE itemlist
      SET
       image =?
       WHERE Product_id = ?";
     $stmt = $dbh->prepare($query);
     $stmt->execute([$file ,$itemid]);

     

     exit();
  } else {
    header("Location: /Bully-Burger/manage-item"); /* Redirect browser */

  }
?>
