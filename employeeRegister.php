
<?php
	$con=mysqli_connect("localhost","root","","shop_here");

	// Check connection
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	// escape variables for security
	$firstName = mysqli_real_escape_string($con, $_POST['firstName']);
	$lastName = mysqli_real_escape_string($con, $_POST['lastName']);
	$title = mysqli_real_escape_string($con, $_POST['title']);
	$phone = mysqli_real_escape_string($con, $_POST['phone']);


	$sql="INSERT INTO employees (FirstName,LastName,Title,Phone)
	VALUES ('$firstName','$lastName','$title','$phone')";

	if (!mysqli_query($con,$sql)) {
	  die('Error: ' . mysqli_error($con));
	}

	mysqli_close($con);

	header('Location: admin.php');
?>

