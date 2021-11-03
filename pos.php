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
  <!-- bootstrap 5 icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
  <!-- Updated Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- POS Stye -->
  <link rel="stylesheet" href="./css/pos.css">
</head>

<body>
<!-- navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="images/icon-Logo.png" alt="Brand" width="100px">
      </a>
      <h3 class="navbar-text"><span style="color:#ed7d31">Bully</span>-Burger</h3>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex">
            <img src="images/ts-avatar.png" alt="Avatar" width="40px">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Account
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Change Passsword</a></li>
                <li><a class="dropdown-item" href="logout">Logout</a></li>
              </ul>
            </li>
          </ul>
      </div>
    </div>
  </nav>
<!-- body content -->
  <div class="container-fluid margin-20">
    <div class="row ">
      <div class="col-8">col-8</div>
      <div class="col-4">col-4</div>
     </div>
  </div>


  <?php include('php/includes/jsLinks.php') ?>
</body>

</html>
