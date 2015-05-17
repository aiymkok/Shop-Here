<?php

	$con=mysqli_connect("localhost","root","","shop_here");

	// Check connection
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$fireEmployee = mysqli_real_escape_string($con, $_POST['fireEmployee']);
	

	mysqli_query($con,"DELETE FROM employees
						where ID=$fireEmployee" );

	mysqli_close($con);

	header('Location: admin.php');
?>