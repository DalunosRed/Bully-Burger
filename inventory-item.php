<?php
session_start();
include('php/includes/config.php');
if (!isset($_SESSION['adminid'])) {
  header("Location: /Bully-Burger");
}

?>
<!DOCTYPE html>
<html lang="en">

<?php  include_once 'php/includes/meta-tags2.include.php' ?>

<body>
<script src="js/admin-status.js"></script>
    <!-- SIDEBAR -->
<?php  include_once 'php/includes/sidebar2.include.php' ?>


    <div class="main-content">
        <!-- HEADER -->
		<?php  include_once 'php/includes/header-int.include.php' ?>
    Items
    <?php  include_once 'php/includes/header2.include.php' ?>

        <main>

<table class="table">
			
		<thead>
										<tr>
										<th>#</th>
											<th>Product Name</th> 		<!--Product Name-->
											<th>Price</th>		<!--Price-->
											<th>Quantity</th>
											<th>Exp.Date</th>
											<th>Category</th>
											<th>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
										<th>#</th>
											<th>Product Name</th> 		<!--Product Name-->
											<th>Price</th>		<!--Price-->
											<th>Quantity</th>
											<th>Exp.Date</th>
											<th>Category</th>
											<th>Action</th>
										</tr>
									</tfoot>
									<tbody>

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
					';
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
											<td><?php echo htmlentities($result->ProductName);?></td>
											<td>₱<?php echo htmlentities($result->Price);?></td>
											<td><?php echo htmlentities($result->Qty);?></td>
											<td><?php echo htmlentities($result->ExpDate);?></td>
											<td><?php echo htmlentities($result->category_name);?></td>
                                            <td>
      <button class="btn btn-primary">
				<a href = "inventory-item-edit?itemid=<?php echo htmlentities($result->Product_id); ?>" class="text-light">
					EDIT</a></button>
                                            </td>

										</tr>
										<?php $cnt=$cnt+1; }} ?>

									</tbody>
								</table>
	<button class="btn btn-primary"><a href = "inventory-item-add" class="text-light">Add Item</a></button>
         
        </main>
    </div>
    <?php  include_once 'php/includes/admin-modal.include.php' ?>


</body>

</html>
