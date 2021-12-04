<?php
require_once 'php/includes/config.php';

session_start();
if (!isset($_SESSION['inventoryid'])) {
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
  ADDING ITEM
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
          <form id="itemAdd">
            <div class="formFlex">
              <div class="form-group">
              <label>Product Name</label>
              <input type="text" id="prdnameA"  class="form-control" placeholder="Product Name" name="first_name" required >
              </div>
              <div class="form-group">
              <label>Price</label>
              <input type="number" id="priceA"  class="form-control" placeholder="Price" required >
              </div>
              <div class="form-group">
              <label>Quantity</label>
              <input type="number" id="qtyA" class="form-control" placeholder="Quantity" required >
              </div>

              <div class="form-group">
                <label>Expiration Date</label>
                  <input type="date"  class="form-control" id="expdateA" required>
              </div>

              <div class="form-group">
                <label>Category</label>
                  <input type="text" placeholder="Category" list="categoryList" class="form-control" id="categA" required>
                  <datalist id="categoryList">
                    <?php
                    $sql = "SELECT * from  category";
                    $query = $dbh -> prepare($sql);
                    $query->execute();
                      $row=$query->fetchAll(PDO::FETCH_ASSOC);
                      foreach($row as $result){
                       ?>
                    <option value="<?php echo htmlspecialchars($result['categ']); ?>">
                          <?php } ?>
                  </datalist>
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
