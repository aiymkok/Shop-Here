<?php
    $connec = mysql_connect("localhost", "root", "");
	$con=mysqli_connect("localhost","root","","shop_here");
	// Check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$suppID = mysqli_real_escape_string($con, $_POST['suppID']);
	$empID = mysqli_real_escape_string($con, $_POST['empID']);
	$dateOrder =  date('Y-m-d');
	$shippingPlace = mysqli_real_escape_string($con, $_POST['shippingPlace']);
	$suppID = mysqli_real_escape_string($con, $_POST['suppID']);
	$radio = mysqli_real_escape_string($con, $_POST['radio']);	
	$ItemID = mysqli_real_escape_string($con, $_POST['ItemID']);
	$QuantityNumber = mysqli_real_escape_string($con, $_POST['QuantityNumber']);	
	$shippingMethod;
	$PriceOfShipping = mysqli_real_escape_string($con, $_POST['priceOfShipping']);	
	
	if($radio==1){
		$shippingMethod = "by truck";
		$PriceOfShipping *= 0.5;  // 1 km cost 0.5$
	}else{
		$shippingMethod = "without delivery";	
		$PriceOfShipping = 0;	
	}	
		
	$sql="INSERT INTO purchase (SuppID,EmpID,ItemID,QuantityNumber,DateOrder,ShippingPlace,ShippingMethodID,ShippingMethod,PriceOfShipping
	)
	VALUES (
		(SELECT id from suppliers WHERE id='$suppID'),
		(SELECT id from employees WHERE id='$empID'),
		(SELECT id from items WHERE id='$ItemID'),
		'$QuantityNumber',
		'$dateOrder',
		'$shippingPlace',
		(SELECT id from shippingmethod WHERE id='$radio'),
		'$shippingMethod',
		'$PriceOfShipping'
		)";

	mysql_select_db('shop_here');  

	$result = mysql_query($sql, $connec);  
	if(!$result)  
	{	  
		die('Could not update data: ' . mysql_error());  
	} 
	mysqli_close($con);

	header('Location: employee.php');
?>