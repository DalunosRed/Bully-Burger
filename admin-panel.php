<?php
session_start();
include('php/includes/config.php');
if (!isset($_SESSION['adminid'])) {
  header("Location: /Bully-Burger");
}

?>
<!DOCTYPE html>
<html lang="en">

<?php  include_once 'php/includes/meta-tags.include.php' ?>

<body>
<script src="js/admin-status.js"></script>
    <!-- SIDEBAR -->
<?php  include_once 'php/includes/sidebar.include.php' ?>


    <div class="main-content">
        <!-- HEADER -->
    <?php  include_once 'php/includes/header1.include.php' ?>
    DASHBOARD
    <?php  include_once 'php/includes/header2.include.php' ?>

        <main>
<?php
date_default_timezone_set('Asia/Manila');
$dateToday = date("F j, Y");
$dateQuery = date('Y-m-d');
$sql ="SELECT * from sales WHERE date = ?";
$query = $dbh -> prepare($sql);
$query->execute([$dateQuery]);
$results=$query->fetchAll(PDO::FETCH_OBJ);

$totalSales = 0;
$totalSold = 0;
foreach ($results as $res) {
  $totalSales+= $res->sales;
  $totalSold += $res->totalSoldItems;
}

?>

          <div class="card border-success mb-3" style="max-width: 100%;">
            <div class="card-header bg-transparent border-success"> <h4>Total Sales as of <?php echo $dateToday;?></h4> </div>
            <div class="card-body text-success ">
              <div class="text-flex">
                <h5 class="card-title">Total Sales: </h5>
                <p class="card-text">&#8369;<?php echo number_format($totalSales, 2); ?></p>
              </div>
              <div class="text-flex">
                <h5 class="card-title">Total Number of Sold Items: </h5>
                <p class="card-text"><?php echo $totalSold; ?></p>
              </div>
            </div>
          </div>

            <div class="cards">

<?php
$sql ="SELECT employee_id from users ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$regusers=$query->rowCount();
?>
                <div class="card-single" id="v-employees">
                    <div>
                        <h1><?php echo htmlentities($regusers);?></h1>
                        <span>TOTAL EMPLOYEE</span>
                    </div>
                    <div>
                        <span class="bx bx-user-pin"></span>
                    </div>
                </div>
                <div class="card-single" id="v-category">
                    <div>
                        <h1>CATEGORY</h1>
                        <span>LIST OF CATEGORIES</span>
                    </div>
                    <div>
                        <span class="bx bx-category"></span>
                    </div>
                </div>

                <div class="card-single" id="v-items">
                    <div>
                        <h1>ITEMS</h1>
                        <span>LIST OF ITEMS</span>
                    </div>
                    <div>
                        <span class="bx bx-food-menu"></span>
                    </div>
                </div>
            </div>
            <!--Table-->

        </main>

    </div>
    <?php  include_once 'php/includes/admin-modal.include.php' ?>

</body>

</html>
