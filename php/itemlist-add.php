<?php
require_once 'includes/config.php';
$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

  $prod =$_POST['prod'];
  $price =$_POST['price'];
  $qty =$_POST['qty'];
  $expdate =$_POST['expdate'];
  $categ =$_POST['category_id'];

  $sql = "SELECT id FROM category WHERE categ=?";
  $stmt = $dbh->prepare($sql);
  $stmt->execute([$categ]);
  $row = $stmt->fetch();
  $category_id= $row['id'];

      $query = "INSERT INTO itemlist(category_id,ProductName, Price, Qty, ExpDate) VALUES (?,?,?,?,?)";
      $stmt = $dbh->prepare($query);

      $stmt->execute([$category_id,$prod,$price,$qty,$expdate]);

      $error = ['success' => $expdate];
      echo json_encode($error);
      exit();


 ?>
