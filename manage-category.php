<?php
session_start();
error_reporting(0);
include('php/includes/config.php');
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
    CATEGORY
    <?php  include_once 'php/includes/header2.include.php' ?>
        <main>

        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Category</th>
      <th scope="col">Creation Date</th>
      <th scope="col">Updation Date</th>
      <th>Action</th>
    </tr>
  </thead>
  <tfoot>
										<tr>
										<th>#</th>
											<th>Category</th>
											<th>Creation Date</th>
											<th>Updation date</th>

											<th>Action</th>
										</tr>
										</tr>
									</tfoot>
  <tbody>

<?php $sql = "SELECT * from  category";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{
		?>
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($result->categ);?></td>
											<td><?php echo htmlentities($result->crtdate);?></td>
											<td><?php echo htmlentities($result->upddate);?></td>
 <td>
      <button class="btn btn-danger"><a href = "category-delete?categoryid=<?php echo htmlentities($result->id); ?>" class="text-light">Delete</a></button>
                                            </td>
										</tr>
										<?php $cnt=$cnt+1; }} ?>

									</tbody>
</table>


        </main>

    </div>
    <?php  include_once 'php/includes/admin-modal.include.php' ?>


</body>
</html>
