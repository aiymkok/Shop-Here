<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Administrator zone</title>
	<link rel="stylesheet/less" type="text/css" href="less/template.less" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="js/less.min.js"></script>
    <script type="text/javascript" src="js/template.js"></script>

</head>
<body>
	<table id="adminTable">
		<tr class="row"> 
			<td class="col-1">
				<div class="adminList">
			   		<ul>
				      	<li id="registerNewEmployee">Hire new employee</li>
				      	<li id="ListEmployee"> List employee</li>
				      	<li>
				      		<form action="fireEmployee.php" method="post">
								<input  name="fireEmployee" placeholder="Employee ID" type="text" >
								<p><button  id="fireEmployee" type="submit">FIRE</button>employee</p>
							</form>
						</li>
				      	<li>
							<button id="editEmployee"type="submit">EDIT</button>
							employee's data
						</li>
						
						<li>
							
							<button id="find" type="submit">FIND</button>
							the best employee
							
						</li>


			   		</ul>
				</div>
			</td>
			
			<td class="col-2">
				<div id="registerForm" class="column2content">
						  <h1>Register new employee</h1>
						  <form class="form" method="post" action="employeeRegister.php">
						    
						    <input type="text" id="firstName" name="firstName" placeholder="First name">
						    <div>
						      <div id="firstNameHelp">Enter first name.</div>
						    </div>

						    <input type="text" id="lastName" name="lastName" placeholder="Last name">
						    <div>
						      <div id="lastNameHelp">Enter Last name.</div>
						    </div>

						    <input type="text" id="title" name="title"placeholder="Title">
						    <div>
						      <div id="titleHelp">Enter title of employee</div>
						    </div>
						    
						     <input type="text" id="phone" name="phone" placeholder="Phone">

						    <div>
						      <div id="phoneHelp">Enter phone no.</div>
						    </div>
						   
						    
						    <input type="submit" id="submit" value="Register">
						  
						  </form>
				</div>
				<p class="optimize"></p>
				
				<div id="employeeList" class="column2content">
					<?php
						mysql_connect("localhost", "root", "") or die (mysql_error ());
						mysql_select_db("shop_here") or die(mysql_error());

						$sql = "SELECT * FROM employees";
					    $result = mysql_query($sql)  or die(mysql_error());					
						$table = "<table>";
						$table .= "<tr>";
					 	$table .= "<th>ID</th><th>First name</th><th>Last name</th><th>Title</th><th>Phone</th>";
					    while ($row = mysql_fetch_assoc($result))
					    {
							$table .= "<tr>";
					        $table .= "<td>".$row['ID']."</td>";
					        $table .= "<td>".$row['FirstName']."</td>";
					        $table .= "<td>".$row['LastName']."</td>";
						    $table .= "<td>".$row['Title']."</td>";
						    $table .= "<td>".$row['Phone']."</td>";
						    $table .= "</tr>";
					    }
						    
						$table .= "</tr>";
					    $table .= "</table> ";

					    echo $table;
						mysql_close();
					?>
				
				</div>

				<div id="editEmployeeData"  class="column2content">
					<form action="editEmployee.php" method="post">
						<table>
							<th>ID</th>
							<th>Column</th>
							<th>new value</th>
							<tr>
								<td><input id="id" name="id" type="text" style="width:100px;"></td>
								<td><input id="col" name="col"  type="text" style="width:100px;"></td>
								<td><input id="val" name="val" type="text" style="width:100px;"></td>
							</tr>
						</table>						
						<button type="submit" id="applyEdit">APPLY EDIT</button>
					</form>
				</div>
				<div id="theBestEmployee" class="column2content">
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
							$ItemID = $row['ItemID'];
							$a = ("SELECT Price FROM items where id='$ItemID'");
							$res = mysql_query($a);
							$ItemPrice = mysql_fetch_assoc($res);
						    $employeesId[$row['EmpID']] += ($ItemPrice['Price']*$row['QuantityNumber']+$row['PriceOfShipping']);
						}	

						$max = array_keys($employeesId, max($employeesId));
						$theBestEmployeeID = $max[0];
						$sql = "SELECT * FROM employees where id = '$theBestEmployeeID'" ;
					    $result = mysql_query($sql)  or die(mysql_error());					
						
						$table = "<table>";
					 	$table .= "<th>ID</th><th>First name</th><th>Last name</th><th>Title</th><th>Phone</th><th>Income</th>";
					   	$row = mysql_fetch_assoc($result);
						$table .= "<tr>";
					       $table .= "<td>".$row['ID']."</td>";
					       $table .= "<td>".$row['FirstName']."</td>";
					       $table .= "<td>".$row['LastName']."</td>";
						   $table .= "<td>".$row['Title']."</td>";
						   $table .= "<td>".$row['Phone']."</td>";
						   $table .= "<td>".max($employeesId)."</td>";
						$table .= "</tr>";
					    $table .= "</table> ";
					    echo $table;
						mysql_close();
						mysql_select_db('shop_here');  
						$result = mysql_query($sql, $connec);  
						if(!$result)  
						{	  
							die('Could not update data: ' . mysql_error());  
						} 
						mysqli_close($con);
					?>
				</div>
			</td>
		</tr>



		<tr class="row"> 
			<td class="col-1">
				<div class="adminList">
			   		<ul>
				      	<li id="transactionButton">Transaction</li>
				      	<li id="allTransaction">List all transactions</li>
			   		</ul>
				</div>
			</td>

			<td class="col-2">
				<div id="transaction" class="column2content">
						  <h1>Transaction</h1>
						  <form class="form" method="post" action="transaction.php">
						    <input type="text" id="PurchaseOrderID" name="PurchaseOrderID" placeholder="Purchase Order ID">
						    <input type="submit" id="submit" value="Submit">
						  </form>
				</div>
				<p class="optimize"></p>

				<div id="transactionList" class="column2content">
					<?php
					
						mysql_connect("localhost", "root", "") or die (mysql_error ());
						mysql_select_db("shop_here") or die(mysql_error());

						$sql = "SELECT * FROM transaction";
					    $result = mysql_query($sql)  or die(mysql_error());					
						$table = "<table>";
						$table .= "<tr>";
					 	$table .= "<th>ID</th><th>PurchaseOrderID</th><th>ItemID</th><th>Transaction description</th>
					 	<th>Transcation date</th><th>Quantity ordered</th><th>Quantity received</th><th>Amount</th>";
					    while ($row = mysql_fetch_assoc($result))
					    {
							$table .= "<tr>";
					        $table .= "<td>".$row['ID']."</td>";
					        $table .= "<td>".$row['PurchaseOrderID']."</td>";
					        $table .= "<td>".$row['ItemID']."</td>";
						    $table .= "<td>".$row['TransactionDescription']."</td>";
						    $table .= "<td>".$row['TranscationDate']."</td>";
						    $table .= "<td>".$row['QuantityOrdered']."</td>";
						    $table .= "<td>".$row['QuantityReceived']."</td>";
						    $table .= "<td>".$row['Amount']."</td>";
						  
						    $table .= "</tr>";
					    }
						    
						$table .= "</tr>";
					    $table .= "</table> ";

					    echo $table;
						mysql_close();
					?>
				
				</div>

				
				

			</td>
		</tr>

	</table>





</body>
</html>
