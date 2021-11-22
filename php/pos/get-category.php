<?php
require_once '../includes/config.php';
$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$sql = 'SELECT * from category ORDER BY id DESC';
$stmt = $dbh->prepare($sql);
$stmt->execute();
$row = $stmt->fetchAll();

$error = ['success' => 'success'];
echo json_encode($row);
exit()?>