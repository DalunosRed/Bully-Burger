<?php
require_once '../includes/config.php';
$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$categ = $_POST['categ'];

if (isset($categ)) {
  // code...
  $sql = 'SELECT id from category WHERE categ=? ';
  $stmt = $dbh->prepare($sql);
  $stmt->execute([$categ]);
  $row = $stmt->fetch();

  $categid = $row['id'];

  $sql = 'SELECT * from itemlist WHERE category_id=? ';
  $stmt = $dbh->prepare($sql);
  $stmt->execute([$categid]);
  $row = $stmt->fetchAll();

  $error = ['success' => 'success'];
  echo json_encode($row);
  exit();
}else{
  header("Location: /Bully-Burger"); /* Redirect browser */
}
