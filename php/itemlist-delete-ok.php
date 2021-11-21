<?php
require_once 'includes/config.php';

$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
session_start();
$itemid = $_SESSION['itemid'];

    $sql = "DELETE FROM itemlist WHERE Product_id= ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$itemid]);
    echo '<script type="text/javascript">';
    echo '  window.location.replace("/Bully-Burger/manage-item")';
    echo '</script>';
