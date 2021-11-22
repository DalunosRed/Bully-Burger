<?php
require_once 'includes/config.php';

$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

if(isset($_GET['categoryid'])){
  session_start();
  $categoryid = $_GET['categoryid'];
  $_SESSION['categoryid'] = $categoryid;
  echo '<script type="text/javascript">';
  echo 'let res = confirm("This will delete this category and !ALL OF THE ITEMS! in this category, Proceed?");';
  echo 'if ( res == true) { ';
    echo '  window.location.replace("category-delete-ok?categoryid='.$categoryid.'")';
    echo ' } else { ';
    echo '  window.location.replace("/Bully-Burger/category-edit?categoryid='.$categoryid.'") }';
    echo '</script>';
}else{
  header("Location: /Bully-Burger/manage-category"); /* Redirect browser */

    }





?>
