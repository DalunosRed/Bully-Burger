<?php
  session_start();
  session_unset();
  session_destroy();

require_once 'config/config.php';

  header("Location: /Bully-Burger");
  exit();
 ?>
