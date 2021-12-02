<?php
require_once 'includes/config.php';
$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

  $prod =$_POST['prod'];
  $price =$_POST['price'];
  $qty =$_POST['qty'];
  $expdate =$_POST['expdate'];
  $categ =$_POST['category_id'];

  if (isset($prod)) {
    # code...

  session_start();
  $itemid = $_SESSION['itemid'];

    $sql = "SELECT id FROM category WHERE categ=?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$categ]);
    $row = $stmt->fetch();
    $category_id= $row['id'];


    $sql = "SELECT ProductName FROM itemlist WHERE Product_id=?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$itemid]);
    $rowCount= $stmt->rowCount();
    $row = $stmt->fetch();

    if ($rowCount > 0) {
      if ($prod == $row['ProductName']) {
        $query = "UPDATE itemlist
         SET
          ProductName = ?,
          Price = ?,
          Qty = ?,
          ExpDate = ?,
          category_id = ?
          WHERE Product_id = ?";
        $stmt = $dbh->prepare($query);

        $stmt->execute([$prod,$price,$qty,$expdate,$category_id,$_SESSION['itemid']]);

        $error = ['success' => $expdate];
        echo json_encode($error);
        exit();
      } else {
        $error = ['prodnametaken' => 'This product is already existing'];
        echo json_encode($error);
        exit();
      }

    }
}else{
  header("Location: /Bully-Burger/manage-item"); /* Redirect browser */

}
 ?>
