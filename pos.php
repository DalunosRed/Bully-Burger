<?php
session_start();
if (!isset($_SESSION['id'])) {
  header("Location: /Bully-Burger");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="theme-color" content="#3e454c">

  <title>Bully Burger Panel | Admin Dashboard</title>

  <?php include('php/includes/cssLinks.php') ?>
</head>

<body>
  <nav class="navbar navbar-default navbar-fixed-top">
    <span class="glyphicon glyphicon-menu-hamburger navbar-brand" aria-hidden="true"></span>
      <div class="container">
          <div class="navbar-header">
            <a class="navbar-brand" href="pos">
              <img src="images/icon-Logo.png" alt="Brand" width="100px">
            </a>
          </div>

          <p class="navbar-text">Bully-Burger</p>
            <ul class="nav navbar-nav navbar-right">

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Change Password</a></li>
                  <li><a href="logout">Logout</a></li>
                </ul>
              </li>

            </ul>
        </div>
  </nav>

  <?php include('php/includes/jsLinks.php') ?>
</body>

</html>
