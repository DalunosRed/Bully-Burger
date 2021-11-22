<?php
require_once 'php/includes/config.php';

session_start();
if (!isset($_SESSION['adminid'])) {
  header("Location: /Bully-Burger");
} else if(!isset($_GET['categoryid'])){
  header("Location: /Bully-Burger/manage-category");
}
$categoryid = $_GET['categoryid'];
$_SESSION['categoryid'] = $categoryid;
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
  EDIT CATEGORY
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
<?php
$sql  = 'SELECT categ FROM category WHERE id=?';
$query = $dbh -> prepare($sql);
$query->execute([$categoryid]);
$row = $query->fetch(PDO::FETCH_ASSOC);

 ?>
              <div class="form">
                <form id="categoryUpdate">
                  <div class="formFlex">
                    <div class="form-group">
                    <label>Category Name</label>
                    <input type="text" id="categU" value="<?php echo htmlspecialchars($row['categ']); ?>" class="form-control" placeholder="Category Name" required >
                    </div>

                  </div>
                  <div class="v-pos">
                    <h4 id="error"></h4>
                    <input type="submit" class="btn btn-success btn-noA" value="Update"></input>
                    <button class="btn btn-danger"><a href = "php/category-delete?categoryid=<?php echo $categoryid; ?>" class="text-light">Delete</a></button>
                  </div>

                </form>
              </div>

            </div>
          </main>


</body>
</html>
