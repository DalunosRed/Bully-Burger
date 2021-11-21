<?php
require_once 'includes/config.php';

$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
session_start();
$employee_id = $_SESSION['employee_id'];

    $sql = "DELETE FROM users WHERE employee_id= ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$employee_id]);
    echo '<script type="text/javascript">';
    echo '  window.location.replace("/Bully-Burger/reg-users")';
    echo '</script>';
