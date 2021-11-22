<?php
require_once 'includes/config.php';
$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

session_start();
$query = "SELECT change_status FROM admin WHERE id = ?";
$stmt = $dbh->prepare($query);
$stmt->execute([$_SESSION['adminid']]);

$result = $stmt->fetch();

$error = ['status' => $result];
echo json_encode($result);


