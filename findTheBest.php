<?php
    $connec = mysql_connect("localhost", "root", "");
	$con=mysqli_connect("localhost","root","","shop_here");
	// Check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	mysql_connect("localhost", "root", "") or die (mysql_error ());
	mysql_select_db("shop_here") or die(mysql_error());
	
	$sql = "SELECT * FROM purchase";
	$result = mysql_query($sql)  or die(mysql_error());		
	$employeesId = array_fill(0, 20, 0);
	while ($row = mysql_fetch_assoc($result))
	{
		 $employeesId[$row['EmpID']] = $employeesId[$row['EmpID']] + 1 ;
	}			
	

	$value = max($employeesId);
	
	echo $value;

	$purchaseOrderID = $row['ID'];
	


	mysql_select_db('shop_here');  

	$result = mysql_query($sql, $connec);  
	if(!$result)  
	{	  
		die('Could not update data: ' . mysql_error());  
	} 
	mysqli_close($con);

	//header('Location: admin.php');
?>