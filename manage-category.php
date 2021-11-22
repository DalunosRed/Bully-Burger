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
<!-- SIDEBAR -->
<?php  include_once 'php/includes/sidebar.include.php' ?>


    <div class="main-content">
       <!-- HEADER -->
    <?php  include_once 'php/includes/header1.include.php' ?>
    CATEGORY
    <?php  include_once 'php/includes/header2.include.php' ?>
        <main>

        <table class="table">
          <br>
          <button class="btn btn-primary"><a href = "category-add"
            class="text-light">Add Category</a></button>

  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Category</th>
      <th scope="col">Updation Date</th>
      <th>Number of Items</th>
      <th>Action</th>
    </tr>
  </thead>
  <tfoot>
										<tr>
										<th>#</th>
											<th>Category</th>
											<th>Updation date</th>
                      <th>Number of Items</th>
											<th>Action</th>
										</tr>
										</tr>
									</tfoot>
  <tbody>

<?php 
//category table
$sql = "SELECT * from  category";
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
                      <?php 
                        //number of items
                        $sql2 = "SELECT * from itemlist WHERE category_id=?";
                        $query2 = $dbh -> prepare($sql2);
                        $query2->execute([$result->id]);
                        $rowCount = $query2->rowCount();
                      ?>
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($result->categ);?></td>
											<td><?php echo htmlentities($result->upddate);?></td>
											<td><?php echo htmlentities($rowCount);?></td>
 <td>
      <button class="btn btn-primary">
        <a href = "category-edit?categoryid=<?php echo htmlentities($result->id); ?>"
          class="text-light">EDIT</a></button>
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
