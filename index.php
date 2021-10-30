<?php
session_start();

//checks if already logged in
if (isset($_SESSION['id'])) {
  header("Location: /Bully-Burger/pos");
}
//checks if admin is  logged in
// include('includes/config.php');
// if(isset($_POST['login']))
// {
// $email=$_POST['username'];
// $password=md5($_POST['password']);
// $sql ="SELECT username,password FROM admin WHERE username=:email and password=:password";
// $query= $dbh -> prepare($sql);
// $query-> bindParam(':email', $email, PDO::PARAM_STR);
// $query-> bindParam(':password', $password, PDO::PARAM_STR);
// $query-> execute();
// $results=$query->fetchAll(PDO::FETCH_OBJ);
// if($query->rowCount() > 0)
// {
// $_SESSION['alogin']=$_POST['username'];
// echo "<script type='text/javascript'> document.location = 'admin-panel.php'; </script>";
// } else{
//
//   echo "<script>alert('Invalid Details');</script>";
//
// }
// }
//checks if admin is  logged in
if (isset($_SESSION['adminid'])) {
  header("Location: /Bully-Burger/admin-panel");
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
            <h3 id="register">REGISTER</h3>
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

          <div class="button_cont"><a class="example_f" href="#modal" >
            <span>Admin</a></div>

        </div>
      </div> <!--end float-->



<!-- MODAL -->
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
            <h4 id="modal-error"></h4>
              <input type="submit" class="btn"></input>
          </form>
        </div>
        <a href="#" class="modal__close">&times;</a>
    </div>
</div>


    </div> 
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  
    <script>
        var coll = document.getElementsByClassName("tran");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}
        ScrollReveal({
            container: document.getElementById("tran"),
        });

        // Section 1

        ScrollReveal().reveal(".form", {
            delay: 0,
            duration: 1000,
            distance: '20%',
            origin: 'bottom',
            opacity: 0,
            viewOffset: {
                top: 0,
                right: 0,
                bottom: 0,
                left: 0,
            },
        });

        ScrollReveal().reveal(".button_cont", {
            delay: 220,
            duration: 1000,
            distance: '20%',
            origin: 'bottom',
            opacity: 0,
            viewOffset: {
                top: 0,
                right: 0,
                bottom: 0,
                left: 0,
            },
        });


        ScrollReveal().reveal(".float-left-green", {
            delay: 220,
            duration: 1000,
            distance: '20%',
            origin: 'bottom',
            opacity: 0,
            viewOffset: {
                top: 0,
                right: 0,
                bottom: 0,
                left: 0,
            },
        });
        
        ScrollReveal().reveal(".box-choice", {
            delay: 220,
            duration: 1000,
            distance: '20%',
            origin: 'bottom',
            opacity: 0,
            viewOffset: {
                top: 0,
                right: 0,
                bottom: 0,
                left: 0,
            },
        });
    </script>

  </body>
</html>
