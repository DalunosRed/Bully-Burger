<?php
require_once '../includes/config.php';
$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

  $sales =$_POST['sales'];
  $totalSold =$_POST['totalSold'];
  $date =$_POST['date'];


  if (isset($sales)) {

    $sql = "INSERT INTO sales(totalSoldItems, sales, date) VALUES(?,?,?)";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$totalSold, $sales, $date]);

    $error = ['success' => 'success'];
      echo json_encode($error);
      exit();

  }else{
  header("Location: /Bully-Burger/pos"); /* Redirect browser */

  }


 ?>
