<?php
require_once '../includes/config.php';
$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

  $arr = json_decode( html_entity_decode( stripslashes ($_POST['arr'] )));

// echo '<script>console.log(' .$arr[0]->Name .')</script>';
// echo '<script>console.log(' .sizeof($arr) .')</script>';
// echo '<script>console.log(' .var_dump($arr) .')</script>';


if (isset($arr)) {
  for ($i=0; $i < sizeof($arr); $i++) {
    $query = "SELECT Qty, Product_id FROM itemlist WHERE ProductName = ?";
    $stmt = $dbh->prepare($query);
    $stmt->execute([$arr[$i]->Name]);
    $row = $stmt->fetch();

    // echo '<script>console.log(' .var_dump($row) .')</script>';
    $qty = (int)$row['Qty'] - (int)$arr[$i]->Quantity;
    if ($qty < 0) {
        $error = ['shortstock' => 'Cannot Proceed, Short of stock'];
        echo json_encode($error);
        exit();
      }else{
        $query = "UPDATE itemlist SET Qty = ? WHERE Product_id = ?";
        $stmt = $dbh->prepare($query);
        $stmt->execute([(int)$qty, $row['Product_id']]);

      }
      // echo '<script>console.log(' .$qty .')</script>';
      }
      $error = ['success' => 'success'];
      echo json_encode($error);
  }
else{
  header("Location: /Bully-Burger/"); /* Redirect browser */
}

 ?>
