<?php
require_once 'includes/config.php';
$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

  $prod = $_POST['prod'];
  $price =$_POST['price'];
  $qty =$_POST['qty'];
  $expdate =$_POST['expdate'];
  $categ =$_POST['category_id'];

  session_start();
  if (isset($prod)) {
    # code...
  $itemid = $_SESSION['itemid'];

    $sql = "SELECT id FROM category WHERE categ=?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$categ]);
    $row = $stmt->fetch();
    $category_id= $row['id'];

    // the main product
    $sql = "SELECT ProductName FROM itemlist WHERE Product_id=?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$itemid]);
    $row = $stmt->fetch();

    // test all product names
    $sql = "SELECT ProductName FROM itemlist WHERE ProductName=?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$prod]);
    $rowCount= $stmt->rowCount();

      if (strtolower($prod) == strtolower($row['ProductName'])) {
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
      } else{
         if ($rowCount > 0) {
           $error = ['prodnametaken' => 'This product is already existing'];
           echo json_encode($error);
           exit();
         } else{
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
         }

      }

}else{
  if (isset($_SESSION['inventoryid'])) {
    header("Location: /Bully-Burger/inventory-item"); /* Redirect browser */

  }else{
    header("Location: /Bully-Burger/manage-item"); /* Redirect browser */
  }
}
 ?>
