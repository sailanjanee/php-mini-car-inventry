<?php 
$host = "localhost";
$username = "root";
$password = "";
$dbname = "inventry";
$dbh = mysqli_connect($host,$username,$password,$dbname);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Manufacturer List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="page-header">
    <h3>Manufacturer Details</h3>
	<a href ='model.php' style='float:right;margin-top: -35px;'class='btn btn-success'>Add Model</a>
	</div>
	<div class="row">
	<div class="col-lg-12">
	<table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>Manufacturer Name</th>
        <th>Model Name</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
	$result = mysqli_query($dbh,'SELECT a.*,b.* FROM car_details as a left join manufacturer b on a.manu_id = b.id')or die("Error: " . mysqli_error($conn));
	while($final = mysqli_fetch_assoc($result))
    {
	?>
	<tr>
	<td><?php echo $final['manufacturer_name'];?></td>
	<td><?php echo $final['model_name']?></td>
	<td>
	<button data-toggle="modal" id="<?php echo $final['car_id'];?>" class="btn btn-sm btn-info view_data" data-target="#myModal"><i class="glyphicon glyphicon-eye-open"></i> &nbsp; Click</button>
	</td>
	</a>
	</tr>
	<?php  
    }
	?>
    </tbody>
  </table>
</div>
</div>
</div>
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
<div class="modal-dialog"> 
<div class="modal-content"> 
<div class="modal-header"> 
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
<h4 class="modal-title">
<i class="glyphicon glyphicon-user"></i> Manufacturer full Details
</h4> 
</div> 
<div class="modal-body"> 
<div id="dynamic-content"></div>                             
</div> 
<div class="modal-footer"> 
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div> 
</div> 
</div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
$(document).ready(function()
{
    $(".view_data").click(function()
	{
		var carid = $(this).attr("id");
		$.ajax({
        	url:"ajax/getfulldetails.php",
			type:"POST",
			data:{'carid':carid},
			dataType: 'html',
			success: function(data)
		    {
				console.log(data);	
				$('#dynamic-content').html(data);
				$("#myModal").modal();
			}	        
	   });
	});
});
</script>
</body>
</html>
