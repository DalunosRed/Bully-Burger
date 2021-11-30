<?php
require_once '../includes/config.php';
$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

  $arr = json_decode( html_entity_decode( stripslashes ($_POST['arr'] )));

// echo '<script>console.log(' .$arr[0]->Name .')</script>';
// echo '<script>console.log(' .sizeof($arr) .')</script>';


if (isset($arr)) {
  for ($i=0; $i < sizeof($arr); $i++) {
    $query = "SELECT *  FROM itemlist WHERE ProductName = ?";
    $stmt = $dbh->prepare($query);
    $stmt->execute([$arr[$i]->Name]);
    $row = $stmt->fetch();


      $query = "UPDATE itemlist SET Qty = ? WHERE ProductName = ?";
      $stmt = $dbh->prepare($query);

      $stmt->execute([$row['Qty']-$arr[$i]->Quantity,$row['ProductName']]);

      $error = ['success' => 'success'];
      echo json_encode($error);
  }
        exit();
}
else{
  header("Location: /Bully-Burger/"); /* Redirect browser */
}

 ?>
