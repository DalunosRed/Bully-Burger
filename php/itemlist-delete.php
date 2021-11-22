<?php
require_once 'includes/config.php';

$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

if(isset($_GET['itemid'])){
  session_start();
  $itemid = $_GET['itemid'];
  $_SESSION['itemid'] = $itemid;
  echo '<script type="text/javascript">';
  echo 'let res = confirm("Are you sure you want to delete all of these products?");';
  echo 'if ( res == true) { ';
    echo '  window.location.replace("itemlist-delete-ok?itemid='.$itemid.'")';
    echo ' } else { ';
    echo '  window.location.replace("/Bully-Burger/item-edit?itemid='.$itemid.'") }';
    echo '</script>';
}else{
  header("Location: /Bully-Burger/manage-item"); /* Redirect browser */

    }





?>
