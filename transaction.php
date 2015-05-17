<?php
    $connec = mysql_connect("localhost", "root", "");
	$con=mysqli_connect("localhost","root","","shop_here");
	// Check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$PurchaseOrderID = mysqli_real_escape_string($con, $_POST['PurchaseOrderID']);
	mysql_connect("localhost", "root", "") or die (mysql_error ());
	mysql_select_db("shop_here") or die(mysql_error());
	$sql = "SELECT * FROM purchase  where id=$PurchaseOrderID" ;
	$result = mysql_query($sql)  or die(mysql_error());					
	$row = mysql_fetch_assoc($result);

	$purchaseOrderID = $row['ID'];
	$itemID = $row['ItemID'];
	$transactionDescription = "transaction Description";
	$transactionDate = date('Y-m-d');
	$QuantityOrdered = $row['QuantityNumber'];
	$QuantityReceived = $row['QuantityNumber'];

	$sql = "SELECT Amount FROM items  where id=$itemID";
	$result = mysql_query($sql)  or die(mysql_error());					
	$row = mysql_fetch_assoc($result);
	$Amount = $row['Amount'] - $QuantityReceived;

	$sql = "UPDATE items  set Amount = '$Amount' where id=$itemID" ;
	mysql_select_db('shop_here');  
	$result = mysql_query($sql, $connec);  
	if(!$result)  
	{	  
		die('Could not update data: ' . mysql_error());  
	} 
	
	  

	$sql="INSERT INTO transaction (PurchaseOrderID,ItemID,TransactionDescription,
									TranscationDate,QuantityOrdered,QuantityReceived,Amount)
	VALUES (
		'$purchaseOrderID',
		'$itemID',
		'$transactionDescription',
		'$transactionDate',
		'$QuantityOrdered',
		'$QuantityReceived',
		'$Amount'
	)";
	


	mysql_select_db('shop_here');  

	$result = mysql_query($sql, $connec);  
	if(!$result)  
	{	  
		die('Could not update data: ' . mysql_error());  
	} 
	mysqli_close($con);

	header('Location: admin.php');
?>