<?php
require_once 'php/includes/config.php';

session_start();
if (!isset($_SESSION['adminid'])) {
  header("Location: /Bully-Burger");
}else if(!isset($_GET['itemid'])){
  header("Location: /Bully-Burger/manage-item");
}
$itemid = $_GET['itemid'];
$_SESSION['itemid'] = $itemid;
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
  EDIT ITEM
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
$sql  = 'SELECT
					p.categ as category_name,
					i.Product_id,
					i.category_id,
					i.ProductName,
					i.Price,
					i.Qty,
					i.ExpDate
					FROM itemlist i
					LEFT JOIN
					 category p ON i.category_id = p.id
					 WHERE i.Product_id=?';
$query = $dbh -> prepare($sql);
$query->execute([$itemid]);
$row=$query->fetch(PDO::FETCH_ASSOC);
 ?>
              <div class="form">
                <form id="itemUpdate">
                  <div class="formFlex">
                    <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" id="prdnameI" value="<?php echo htmlspecialchars($row['ProductName']); ?>" class="form-control" placeholder="Product Name" name="first_name" required >
                    </div>
                    <div class="form-group">
                    <label>Price</label>
                    <input type="number" id="priceI" value="<?php echo htmlspecialchars($row['Price']); ?>" class="form-control" placeholder="Price" required >
                    </div>
                    <div class="form-group">
                    <label>Quantity</label>
                    <input type="number" id="qtyI" value="<?php echo htmlspecialchars($row['Qty']); ?>" class="form-control" placeholder="Quantity" required >
                    </div>
                    <div class="form-group">
                      <label>Expiration Date</label>
                        <input type="date" value="<?php echo htmlspecialchars($row['ExpDate']); ?>" class="form-control" id="expdateI" required>
                    </div>
                    <div class="form-group">

                      <label>Category</label>
                        <input type="text"value="<?php echo htmlspecialchars($row['category_name']); ?>"placeholder="Category" list="categoryList" class="form-control" id="categI" required>
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
                    <input type="submit" class="btn btn-success btn-noA" value="Update"></input>
                    <button class="btn btn-danger"><a href = "php/itemlist-delete?itemid=<?php echo $itemid; ?>" class="text-light">Delete</a></button>
                  </div>

                </form>
              </div>

            </div>
          </main>


</body>
</html>
