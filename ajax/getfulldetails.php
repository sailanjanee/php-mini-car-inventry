<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "inventry";
$dbh = mysqli_connect($host,$username,$password,$dbname);
if(isset($_POST['carid']))
{
	$query = "SELECT car_details.*, manufacturer.* FROM car_details, 
            manufacturer WHERE car_details.manu_id = manufacturer.id and car_details.car_id='".$_POST['carid']."'";
	$exc = mysqli_query($dbh,$query)or die("Error: " . mysqli_error($dbh));
	while ($row = mysqli_fetch_array($exc))
    {
	?>
		<div class="table-responsive">
		<table class="table table-striped table-bordered">
		<tr>
		<th>Manufacturer Name</th>
		<td><?php echo $row['manufacturer_name']; ?></td>
		</tr>
		<tr>
		<th>Model Name</th>
		<td><?php echo $row['model_name']; ?></td>
		</tr>
		<tr>
		<th>Model Quantity</th>
		<td><?php echo $row['quantity']; ?></td>
		</tr>
		<tr>
		<th>Model color</th>
		<td><?php echo $row['color']; ?></td>
		</tr>
		<tr>
		<th>Model Reg No.</th>
		<td><?php echo $row['reg_no']; ?></td>
		</tr>
		<tr>
		<th>Model Year</th>
		<td><?php echo date('d-F-Y',strtotime($row['year'])); ?></td>
		</tr>
		<tr>
		<th>Model Details</th>
		<td><?php echo $row['note']; ?></td>
		</tr>
		<tr>
		<th>Car Image</th>
		<td><img src="<?php echo 'upload/'.$row['img_one'];?>" class="img-responsive"/></td>
		</tr>
		<tr>
		<th>Created Date</th>
		<td><?php echo date('d-F-Y',strtotime($row['created_at']));?></td>
		</tr>
		</table>
		</div>
		<?php
	}
	?>
<?php
}
?>
