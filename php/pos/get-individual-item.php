<?php
require_once '../includes/config.php';
$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$prod = $_POST['prod'];

$sql = 'SELECT * from itemlist WHERE ProductName=?';
$stmt = $dbh->prepare($sql);
$stmt->execute([$prod]);
$row = $stmt->fetchAll();

$error = ['success' => 'success'];
echo json_encode($row);
exit();