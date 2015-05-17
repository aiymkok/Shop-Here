<?php
	$con=mysqli_connect("localhost","root","","shop_here");

	// Check connection
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$supplier = mysqli_real_escape_string($con, $_POST['delete']);
	mysqli_query($con,"DELETE FROM suppliers
						where ID=$supplier" );

	mysqli_close($con);
	header('Location: employee.php');
?>