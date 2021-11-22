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

                <div class="card-single" id="v-inventory">
                    <div>
                        <h1>MAIN INVENTORY</h1>
                        <span>LINK TO MAIN INVENTORY</span>
                    </div>
                    <div>
                        <span class="bx bx-list-ol"></span>
                    </div>
                </div>


            </div>
            <!--Tabla-->

        </main>

    </div>
    <?php  include_once 'php/includes/admin-modal.include.php' ?>


</body>

</html>
