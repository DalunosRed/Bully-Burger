<?php
session_start();
include('php/includes/config.php');
if (!isset($_SESSION['adminid'])) {
	header("Location: /Bully-Burger");
  }
else{


 ?>

<!doctype html>
<html lang="en" class="no-js">

<?php  include_once 'php/includes/meta-tags.include.php' ?>

<body>

<!-- SIDEBAR -->
<?php  include_once 'php/includes/sidebar.include.php' ?>

    <div class="main-content">
    <!-- HEADER -->
    <?php  include_once 'php/includes/header1.include.php' ?>
    REGISTERED EMPLOYEE
    <?php  include_once 'php/includes/header2.include.php' ?>


        <main>
		<table class="table">
			<br>
        <button class="btn btn-primary"><a href = "crud-users" class="text-light">Click Here To Add User</a></button>
        <br>
        <br>
        <thead>
										<tr>
                                            <!--inalis ko yung <td>#</td>-->
                                            <!--naglagay ako ng Employee ID-->
                                            <th>Employee Id</th>
											<th>First Name</th>
											<th>Last Name </th>
											<th>Username</th>
											<th>Email</th>

                                        <th>Action</th>
										</tr>
										</tr>
									</thead>
									<tfoot>
										<tr>
                                            <!--inalis ko yung <td>#</td>-->
                                            <!--naglagay ako ng Employee ID-->
                                            <th>Employee Id</th>
											<th>First Name</th>
											<th>Last Name </th>
											<th>Username</th>
											<th>Email</th>

                                        <th>Action</th>
										</tr>
										</tr>
									</tfoot>
									<tbody>

<?php $sql = "SELECT * from  users ";
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
											<!--removed <td><php echo htmlentities($cnt);?></td>-->
                                            <td><?php echo htmlentities($result->employee_id);?></td>   <!--display employee id--->
											<td><?php echo htmlentities($result->first_name);?></td>
											<td><?php echo htmlentities($result->last_name);?></td>
											<td><?php echo htmlentities($result->username);?></td>
											<td><?php echo htmlentities($result->email);?></td>

                                            <td>

          <button class="btn btn-success"><a href = "usr-update?id=<?php echo htmlentities($result->employee_id); ?>" class="text-light">Update</a></button>
          <button class="btn btn-danger"><a href = "php/usr-delete?id=<?php echo htmlentities($result->employee_id); ?>" class="text-light">Delete</a></button>
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
<?php } ?>
