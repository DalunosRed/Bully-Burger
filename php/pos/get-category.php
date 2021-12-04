<?php
require_once '../includes/config.php';
$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

session_start();
if (isset($_SESSION['id'])) {

  $sql = 'SELECT * from category ORDER BY id DESC';
  $stmt = $dbh->prepare($sql);
  $stmt->execute();
  $row = $stmt->fetchAll();
  $error = ['success' => 'success'];
  echo json_encode($row);
  exit();
}else{
  header("Location: /Bully-Burger"); /* Redirect browser */
}
?>
