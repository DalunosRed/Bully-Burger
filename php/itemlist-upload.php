<?php
require_once 'includes/config.php';
$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$sql = "SELECT Product_id FROM itemlist ORDER BY Product_id DESC LIMIT 1";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$lastId = $stmt->fetch();

echo $lastId['Product_id'];

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
     $stmt->execute([$file ,$lastId['Product_id']]);
     exit();
  } else {
    header("Location: /Bully-Burger/manage-item"); /* Redirect browser */

  }
?>
