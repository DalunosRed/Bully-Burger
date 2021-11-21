<?php
require_once 'php/includes/config.php';

session_start();
if (!isset($_SESSION['adminid'])) {
  header("Location: /Bully-Burger");
}
$employee_id = $_GET['categoryid'];
$_SESSION['categoryid'] = $employee_id;
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
  UPDATE CREDENTIALS
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
<?php
$sql = "SELECT * from  users WHERE employee_id=? ";
$query = $dbh -> prepare($sql);
$query->execute([$employee_id]);
$row=$query->fetch(PDO::FETCH_ASSOC);
 ?>
              <div class="form">
                <form id="updateAJAX">
                  <div class="formFlex">
                    <div class="form-group">
                    <label>First Name</label>
                    <input type="text" id="fnameUp" value="<?php echo htmlspecialchars($row['first_name']); ?>" class="form-control" placeholder="Enter your First Name" name="first_name" required autocomplete="new-first_name">
                    </div>
                    <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" id="lnameUp" value="<?php echo htmlspecialchars($row['last_name']); ?>" class="form-control" placeholder="Enter your Last Name" name="last_name" required autocomplete="new-last_name">
                    </div>
                    <div class="form-group">
                    <label>Username</label>
                    <input type="text" id="usnUp" value="<?php echo htmlspecialchars($row['username']); ?>" class="form-control" placeholder="Username" name="username" required autocomplete="new-username">
                    </div>
                    <div class="form-group">
                    <label>Password</label>
                    <input type="password"  id="pwdUp" class="form-control" placeholder="Password" name="password" required autocomplete="new-password">
                    </div>
                    <div class="form-group">
                    <label>Re-type Password</label>
                    <input type="password" id="repwdUp"  class="form-control" placeholder="Re-type Password" name="repwd" required autocomplete="new-first_name">
                    </div>
                  </div>
                  <div class="v-pos">
                    <h4 id="error"></h4>
                    <input type="submit" class="btn btn-success" value="Update"></input>
                  </div>

                </form>

              </div>

            </div>
          </main>


</body>
</html>
