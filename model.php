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
  <title>Manufacturer</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"/>
  <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script>
function model_validation()
{
	document.getElementById('mname_error_msg').innerHTML = "";
	document.getElementById('modelname_error_msg').innerHTML = "";
	document.getElementById('color_error_msg').innerHTML = "";
	document.getElementById('quantity_error_msg').innerHTML = "";
	document.getElementById('year_error_msg').innerHTML = "";
	document.getElementById('regno_error_msg').innerHTML = "";
	document.getElementById('note_error_msg').innerHTML = "";
	document.getElementById('file_error_msg').innerHTML = "";
	var mname         = document.getElementById('mname').value;
	var modelname     = document.getElementById('modelname').value;
	var color         = document.getElementById('color').value;
	var modelquantity = document.getElementById('modelquantity').value;
	var year          = document.getElementById('year').value;
	var regno         = document.getElementById('regno').value;
	var note          = document.getElementById('note').value;
	var file          = document.getElementById('file').value;
	if(mname == '' || mname == null)
	{ 
	document.getElementById('mname_error_msg').innerHTML = "Manufacturer Name can't be blank";
	document.getElementById('mname').focus();
	return false;
	}
	if(modelname == '' || modelname == null)
	{ 
	document.getElementById('modelname_error_msg').innerHTML = "Manufacturer Model can't be blank";
	document.getElementById('modelname').focus();
	return false;
	} 
	if(color == '' || color == null)
	{ 
	document.getElementById('color_error_msg').innerHTML = "Color can't be blank";
	document.getElementById('color').focus();
	return false;
	}
	if(modelquantity == '' || modelquantity == null)
	{ 
	document.getElementById('quantity_error_msg').innerHTML = "Quantity can't be blank";
	document.getElementById('modelquantity').focus();
	return false;
	}
	if(year == '' || year == null)
	{ 
	document.getElementById('year_error_msg').innerHTML = "Manufacturer year can't be blank";
	document.getElementById('year').focus();
	return false;
	}
	if(regno == '' || regno == null)
	{ 
	document.getElementById('regno_error_msg').innerHTML = "regno can't be blank";
	document.getElementById('regno').focus();
	return false;
	}
	if(note == '' || note == null)
	{ 
	document.getElementById('note_error_msg').innerHTML = "Note can't be blank";
	document.getElementById('note').focus();
	return false;
	}
	if(file == '' || file == null)
	{ 
	document.getElementById('file_error_msg').innerHTML = "File can't be blank";
	document.getElementById('file').focus();
	return false;
	}
}
</script>
  <script src="js/script.js"></script>
  <style type="text/css">
    .msg{
      color:red;
      font-family: cursive;
      font-weight: bold;
    }
    .carname{
      text-align: center;
    margin-bottom: 5%;
    font-family: cursive;
    color: #004080;
    font-weight: bold;
    }
    .buttonsclass{
		float: left;
		margin-left: 3%;
		margin-bottom: 20px;
    }
	#loading
	{
    display: none;
    position: absolute;
    top: 50px;
    left: 850px;
    font-size: 25px;
	}
	#error
	{
		color: red;
	}
	#error_message
	{
		color: blue;
	}
	#success
	{
		float: right;
		margin-right: 15%;
		background: aliceblue;
		padding: 10px;
		color: black;
		font-family: cursive;
	}
  </style>
</head>
<body>
<div class="container">
	<div class="page-header">
    <h3>Add Model Details</h3>
	<a href ='inventory.php' style='float:right;margin-top: -35px;'class='btn btn-success'>Inventry List</a>
	</div>
	<div class="row" style="background:#e8e3e3;padding:15px;">
	<div class="col-lg-12">
	<form id="uploadimage" method="post" enctype="multipart/form-data" onsubmit="return model_validation();">
	<div class="col-md-6">
    <div class="form-group">
    <label>Select Manufacturer </label>
    <select class="form-control" name="mid" id="mname">
	<option value="">Select Manufacturer</option>
    <?php
	$query	= "select * from manufacturer";
	$row	= mysqli_query($dbh,$query);
	while($row1 = mysqli_fetch_array($row))
	{
	?>
	<option value="<?php echo$row1["id"];?>"><?php echo $row1["manufacturer_name"];?></option>
	<?php 
	}
	?>
    </select>
    <span class="msg" id="mname_error_msg"></span>
  </div>
  <div class="form-group">
    <label>Color</label>
     <input type="text" class="form-control" name="color" id="color" placeholder="Color">
     <span class="msg" id="color_error_msg"></span>
  </div>
  <div class="form-group">
    <label>Model Quantity</label>
     <input type="text" class="form-control" name="modelquantity" id="modelquantity" placeholder="Quantity">
     <span class="msg" id="quantity_error_msg"></span>
  </div>
  <div class="form-group">
    <label>Manufacturer Year</label>
     <input type="date" class="form-control" name="year" id="year" placeholder="Manufacturer Year">
     <span class="msg" id="year_error_msg"></span>
  </div>
  <div class="form-group">
    <label>Registration Number</label>
     <input type="text" class="form-control" name="reg_no" id="regno" placeholder="Registration Number">
     <span class="msg" id="regno_error_msg"></span>
  </div>
  <div class="form-group">
    <label>Note</label>
    <textarea class="form-control" name="note" id="note"></textarea>
    <span class="msg" id="note_error_msg"></span>
  </div>
  </div>
  <div class="col-md-6">
  <div class="form-group">
    <label>Model Name</label>
    <input type="text" class="form-control" name="modelname" id="modelname" placeholder="Model Name"/>
    <span class="msg" id="modelname_error_msg"></span>
  </div>
  <div class="form-group">
  <div id="image_preview" style="top: 140px;">
  <img id="previewing" src="images/noimage.png" />
  </div>
  </div>
  <div class="form-group" id="selectImage">
	<label>First Image Upload:</label>
    <input type="file" name="file" id="file"/>
	<span class="msg" id="file_error_msg"></span>
  </div>
  </div>
<div class="buttonsclass">
<button type="submit" name="save" class="btn btn-success ">Submit</button>
<button type="reset" name="reset" class="btn btn-danger">Reset</button>
</div>
<h4 id='loading'><img src="images/loading_circle.gif"/>&nbsp;&nbsp;Loading...</h4>
<div id="message"></div>
</form>
</div>
</div>
</div>
</body>
</html>