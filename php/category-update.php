<?php
require_once 'includes/config.php';
$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

  $categ =$_POST['categ'];


  if (isset($categ)) {

    session_start();
    $categoryid = $_SESSION['categoryid'];

      $sql = "SELECT categ FROM category WHERE categ=?";
      $stmt = $dbh->prepare($sql);
      $stmt->execute([$categ]);
      $rowCount= $stmt->rowCount();
      if ($rowCount > 0) {
          $error = ['categnametaken' => 'This category is already existing'];
          echo json_encode($error);
          exit();
      } else {
        $query = "UPDATE category SET categ = ? WHERE id = ?";
        $stmt = $dbh->prepare($query);

        $stmt->execute([$categ,$categoryid]);

        $error = ['success' => 'success'];
        echo json_encode($error);
        exit();
    }  # code...
}
else{
  header("Location: /Bully-Burger/manage-category"); /* Redirect browser */

}

 ?>
