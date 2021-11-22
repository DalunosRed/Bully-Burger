<?php
require_once 'includes/config.php';

$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
if(isset($_GET['categoryid'])){
session_start();
$categoryid = $_SESSION['categoryid'];

    $sql = "DELETE FROM itemlist WHERE category_id= ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$categoryid]);

    $sql2 = "DELETE FROM category WHERE id= ?";
    $stmt2 = $dbh->prepare($sql2);
    $stmt2->execute([$categoryid]);
    echo '<script type="text/javascript">';
    echo '  window.location.replace("/Bully-Burger/manage-category")';
    echo '</script>';
}else  {
    header("Location: /Bully-Burger/manage-category"); /* Redirect browser */

}