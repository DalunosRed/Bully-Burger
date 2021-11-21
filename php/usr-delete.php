<?php
require_once 'includes/config.php';

$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

if(isset($_GET['id'])){
  session_start();
  $employee_id = $_GET['id'];
  $_SESSION['employee_id'] = $employee_id;
  echo '<script type="text/javascript">';
  echo 'let res = confirm("Are you sure you want to delete?");';
  echo 'if ( res == true) { ';
    echo '  window.location.replace("usr-delete-ok") ';
    echo ' } else { ';
    echo '  window.location.replace("/Bully-Burger/reg-users") }';
    echo '</script>';
}else{
        die($stmt);
    }





?>
