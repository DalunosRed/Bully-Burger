<?php
session_start();

//checks if already logged in
if (isset($_SESSION['id'])) {
  header("Location: /Bully-Burger/pos");
}

//checks if admin is  logged in
if (isset($_SESSION['adminid'])) {
  header("Location: /Bully-Burger/admin-panel");
}

//checks if admin is  logged in
if (isset($_SESSION['inventoryid'])) {
  header("Location: /Bully-Burger/inventory-category");
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bully Burger</title>
    <!--
    <link rel = "icon" href = "https://media.geeksforgeeks.org/wp-content/cdn-uploads/gfg_200X200.png" type = "image/x-icon">
-->
    <link rel="stylesheet" href="css/index.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="js/index.js" charset="utf-8"></script>
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
  </head>
  <body>

  <div id="tran" class="tran">
    <div class="container">
      <div class="container-green"></div>

      <div class="float">
        <div class="float-left-green">
          <img src="images/Logo.png" alt="Logo" height="350px">
          <div class="float-text">
            <p>THE MEATIEAST AND CHEESIEST BURGER FOR YOUR CRAVINGS!</p>
          </div>
        </div>

        <div class="float-right-white">

          <div class="box-choice">
            <h3 id="login">LOGIN</h3>
          </div>

          <!-- Form -->
          <div class="form">
            <form id="loginAjax">
              <div class="input-container">
                <input id="usnL" type="text"  required/>
                <label>Username</label>
              </div>
              <div class="input-container">
                <input id="pwdL" type="password" required />
                <label>Password</label>
              </div>
              <h4 id="error"></h4>
                <input type="submit" class="btn"></input>
            </form>
          </div>

          <div class="button_cont">
            <a class="example_a" href="#modal" >
            <span>Admin</a>
            <a class="example_f " href="#modal1" >
            <span>Inventory</a>
          </div>

        </div>
      </div> <!--end float-->

    </div> <!--end container-->
  </div> <!-- end tran -->

<!-- ADMIN -->
  <!-- MODAL  should be treated as a separate section-->
  <div id="modal" class="modal">
      <div class="modal__content">
          <h1>Admin Login</h1>
          <br>
          <div class="form">
            <form id="adminAjax">
              <div class="input-container">
                <input id="usnA" type="text"  required/>
                <label>Username</label>
              </div>
              <div class="input-container">
                <input id="pwdA" type="password" required />
                <label>Password</label>
              </div>
              <h4 class="modal-error"></h4>
                <input type="submit" class="btn"></input>
            </form>
          </div>
          <a href="#" class="modal__close">&times;</a>
      </div>
  </div>
  <!-- INVENTORY -->
  <!-- MODAL  should be treated as a separate section-->
  <div id="modal1" class="modal">
      <div class="modal__content">
          <h1>Inventory Login</h1>
          <br>
          <div class="form">
            <form id="inventoryAjax">
              <div class="input-container">
                <input id="usnIn" type="text"  required/>
                <label>Username</label>
              </div>
              <div class="input-container">
                <input id="pwdIn" type="password" required />
                <label>Password</label>
              </div>
              <h4 class="modal-error"></h4>
                <input type="submit" class="btn"></input>
            </form>
          </div>
          <a href="#" class="modal__close">&times;</a>
      </div>
  </div>


  </body>
  </html>
