<?php
include ('db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Manufacturer</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
.msg
{
color:red;
font-family: cursive;
font-weight: bold;
}
.center_div{
margin: 0 auto;
width: 40%;
margin-top: 5%;
}
.frontheadline
{
text-align: center;
font-family: cursive;
font-size: 25px;
font-weight: bold;
}
.formbackground
{
background: #f7dc4f;
padding: 40px;
border-radius: 2%;
}
</style>
</head>
<body>
	<div class="container center_div">
		<div class="col-md-9">
			<h2 class="frontheadline">Manufacturer</h2>
				<div class="formbackground">
					<form method="post" onsubmit="return m_validation();">
						<div class="form-group">
							<label>Manufacturer Name:</label>
									<input type="text" class="form-control" id="m_name" placeholder="Manufacturer Name" name="m_name"/>
									<span class="msg" id="name_error_msg"></span>
						</div>
						<button type="submit" name="save" class="btn btn-primary">Submit</button>
					</form>
				</div>
				<?php
				if(isset($_POST['save']))
				{
					$m_name = $_POST['m_name'];
					$query	= "insert into manufacturer set manufacturer_name='$m_name'";
					$row	= mysqli_query($dbh,$query);
					if($row>0)
					{
						echo "<script>alert('Manufacturer Details Insert Sucessfully')</script>";
						echo ("<script>location.href = 'model.php'</script>");
					}
					else
					{
						echo "<script>alert('Manufacturer Details Not Insert Sucessfully Please Try Again..')</script>";
					}
				}
				?>
		</div>
	</div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
function m_validation()
{
	document.getElementById('name_error_msg').innerHTML = "";
	var m_name        = document.getElementById('m_name').value;
	if(m_name == '' || m_name == null)
	{ 
		document.getElementById('name_error_msg').innerHTML = "Manufacturer Name can't be blank";
		document.getElementById('m_name').focus();
		return false;
	}
}
</script>