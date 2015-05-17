
<?php
	$con=mysqli_connect("localhost","root","","shop_here");

	// Check connection
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	// escape variables for security
	$name = mysqli_real_escape_string($con, $_POST['name']);
	$address = mysqli_real_escape_string($con, $_POST['address']);
	$country = mysqli_real_escape_string($con, $_POST['country']);
	$phone = mysqli_real_escape_string($con, $_POST['phone']);


	$sql="INSERT INTO  suppliers (Name,Address,Country,Phone)
	VALUES ('$name','$address','$country','$phone')";

	if (!mysqli_query($con,$sql)) {
	  die('Error: ' . mysqli_error($con));
	}

	mysqli_close($con);

	header('Location: employee.php');
?>

