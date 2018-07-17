<?php
include('db.php');
if(is_array($_FILES))
{
	if(is_uploaded_file($_FILES['userImage']['tmp_name']))
	{
		$sourcePathone = $_FILES['userImage']['tmp_name'];
		$targetPath = "images/".$_FILES['userImage']['name'];
		$sourcePathtwo = $_FILES['userImagesecnd']['tmp_name'];
		$targetPathtwo = "images/".$_FILES['userImagesecnd']['name'];
		$manuname	= $_POST['mname'];
		$color		= $_POST['color'];
		$year		= $_POST['year'];
		$reg_no		= $_POST['reg_no'];
		$modelname	= $_POST['modelname'];
		$note		= $_POST['note'];
		if(move_uploaded_file($sourcePathone,$targetPath,$sourcePathtwo,$targetPathtwo))
		{
		$sql = "INSERT INTO car_details (m_id,model_name,color,reg_no,note,year,img_one,img_two)
        VALUES ('".$_POST["mname"]."','".$_POST["modelname"]."','".$_POST["color"]."','".$_POST["reg_no"]."','".$_POST["note"]."','".$_POST["year"]."',$sourcePathone,$sourcePathtwo)";
        $result = mysql_query($sql);
        if ($result>0)
		{
            echo "<script>alert('Manufacturer Details Insert Sucessfully')</script>";
			echo ("<script>location.href = 'model.php'</script>");
		}
		else
		{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
		}
		else
		{
			
		}
	}
}
?>