<?php
if (isset($_FILES["file"]["type"]))
{
	$mname = $_POST['mid'];
	$color = $_POST['color'];
	$year = $_POST['year'];
	$modelquantity = $_POST['modelquantity'];
	$reg_no = $_POST['reg_no'];
	$modelname = $_POST['modelname'];
	$note = $_POST['note'];
	$validextensions = array("jpeg", "jpg", "png");
	$temporary = explode(".", $_FILES["file"]["name"]);
	$file_extension = end($temporary);
	if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
	) && ($_FILES["file"]["size"] < 500000)
		 && in_array($file_extension, $validextensions))
		 {
			if ($_FILES["file"]["error"] > 0)
			{
				echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
			}
			else
			{
				if (file_exists("../upload/" . $_FILES["file"]["name"]))
				{
					echo $_FILES["file"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
				}
				else
				{
					$sourcePath = $_FILES['file']['tmp_name'];
					$targetPath = "../upload/" . $_FILES['file']['name'];
					move_uploaded_file($sourcePath, $targetPath);
					$host = "localhost";
					$username = "root";
					$password = "";
					$dbname = "inventry";
					$dbh = mysqli_connect($host,$username,$password,$dbname);
					mysqli_query($dbh,"
					INSERT INTO `car_details` 
					(
					manu_id,color,year,quantity,reg_no,model_name,note,img_one
					)
					VALUES(
						'".$mname."',
						'".$color."',
						'".$year."',
						'".$modelquantity."',
						'".$reg_no."',
						'".$modelname."',
						'".$note."',
						'".$_FILES["file"]["name"]."'
					)")or die(mysqli_error($dbh));
					echo "<span id='success'>Model Details Store in Database Successfully...!!</span>";
				}
			}
		}
}
?>
