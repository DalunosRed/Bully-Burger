<?php
require_once 'includes/config.php';

$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
if(isset($_GET['itemid'])){

session_start();
$itemid = $_SESSION['itemid'];

    $sql = "DELETE FROM itemlist WHERE Product_id= ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$itemid]);

    if (isset($_SESSION['inventoryid'])) {
      echo '<script type="text/javascript">';
      echo '  window.location.replace("/Bully-Burger/inventory-item")';
      echo '</script>';
    }else{
      echo '<script type="text/javascript">';
      echo '  window.location.replace("/Bully-Burger/manage-item")';
      echo '</script>';
    }

}else  {
  if (isset($_SESSION['inventoryid'])) {
    header("Location: /Bully-Burger/inventory-item"); /* Redirect browser */

  }else{
    header("Location: /Bully-Burger/manage-item"); /* Redirect browser */
  }

}
