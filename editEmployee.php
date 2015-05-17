<?php
    $connec = mysql_connect("localhost", "root", "");
	$con=mysqli_connect("localhost","root","","shop_here");
	// Check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$id = mysqli_real_escape_string($con, $_POST['id']);
	$col = mysqli_real_escape_string($con, $_POST['col']);	
	$val = mysqli_real_escape_string($con, $_POST['val']);
		
	$sql = "UPDATE employees SET $col = '$val'  
			WHERE id='$id'";  
	mysql_select_db('shop_here');  
	$result = mysql_query($sql, $connec);  
	if(!$result)  
	{	  
		die('Could not update data: ' . mysql_error());  
	}  
	mysqli_close($con);
	header('Location: admin.php');
?>