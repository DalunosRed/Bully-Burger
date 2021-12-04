<?php
require_once 'includes/config.php';
$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

session_start();
$query = "SELECT change_status FROM inventory WHERE id = ?";
$stmt = $dbh->prepare($query);
$stmt->execute([$_SESSION['inventoryid']]);

$result = $stmt->fetch();

$error = ['status' => $result];
echo json_encode($result);
