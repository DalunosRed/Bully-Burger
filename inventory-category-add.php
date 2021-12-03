<?php
require_once 'php/includes/config.php';

session_start();
if (!isset($_SESSION['adminid'])) {
  header("Location: /Bully-Burger");
}
?>

<!DOCTYPE html>
<html lang="en">
<?php  include_once 'php/includes/meta-tags2.include.php' ?>

<body>

  <!-- SIDEBAR -->
<?php  include_once 'php/includes/sidebar2.include.php' ?>

    <div class="main-content">
      <!-- HEADER -->
      <?php  include_once 'php/includes/header-int.include.php' ?>
  ADDING CATEGORY
  <?php  include_once 'php/includes/header2.include.php' ?>

    <main>
<!-- ====== -->
        <div class="containter-fluid col-md-12">
        <button type="button" class="btn btn-info btn-noA" onclick="goBack()">Go Back</button>
        <br>
        <br>
        <script>
            function goBack() {
            window.history.back();
        }
        </script>
        <!-- ====== -->

        <div class="form">
          <form id="categAdd">
            <div class="formFlex">
              <div class="form-group">
              <label>Category Name</label>
              <input type="text" id="categA"  class="form-control" placeholder="Category Name" required >
              </div>

            </div>
            <div class="v-pos">
              <h4 id="error"></h4>
              <input type="submit" class="btn btn-success btn-noA" value="Add"></input>
            </div>

          </form>
        </div>

      </div>
    </main>

</body>
</html>
