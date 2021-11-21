<?php
session_start();
if (!isset($_SESSION['adminid'])) {
  header("Location: /Bully-Burger");
}
?>

<!DOCTYPE html>
<html lang="en">
<?php  include_once 'php/includes/meta-tags.include.php' ?>

<body>

  <!-- SIDEBAR -->
<?php  include_once 'php/includes/sidebar.include.php' ?>

    <div class="main-content">
      <!-- HEADER -->
  <?php  include_once 'php/includes/header1.include.php' ?>
  ADDING EMPLOYEE
  <?php  include_once 'php/includes/header2.include.php' ?>

    <main>
<!-- ====== -->
        <div class="containter-fluid col-md-12">
        <button type="button" class="btn btn-info" onclick="goBack()">Go Back</button>
        <br>
        <br>
        <script>
            function goBack() {
            window.history.back();
        }
        </script>
        <!-- ====== -->

        <div class="form">
          <form id="registerAjax">
            <div class="formFlex">
              <div class="form-group">
              <label>First Name</label>
              <input type="text" id="fnameR" class="form-control" placeholder="Enter your First Name" name="first_name" required autocomplete="new-first_name">
              </div>
              <div class="form-group">
              <label>Last Name</label>
              <input type="text" id="lnameR" class="form-control" placeholder="Enter your Last Name" name="last_name" required autocomplete="new-last_name">
              </div>
              <div class="form-group">
              <label>Username</label>
              <input type="text" id="usnR" class="form-control" placeholder="Username" name="username" required autocomplete="new-username">
              </div>
              <div class="form-group">
              <label>Password</label>
              <input type="password"  id="pwdR" class="form-control" placeholder="Password" name="password" required autocomplete="new-password">
              </div>
              <div class="form-group">
              <label>Re-type Password</label>
              <input type="password" id="repwdR" class="form-control" placeholder="Re-type Password" name="repwd" required autocomplete="new-first_name">
              </div>
            </div>
            <div class="v-pos">
              <h4 id="error"></h4>
              <input type="submit" class="btn btn-success" name="submit"></input>
            </div>

          </form>

        </div>

      </div>
    </main>

</body>
</html>
