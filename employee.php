<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Employee zone</title>
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
				      	<li id="registerNewEmployee">Register new supplier</li>
				      	<li id="ListEmployee"> All suppliyers</li>
				      	<li>
				      		<form action="supplierDelete.php" method="post">
								<input  name="delete" placeholder="Supplier ID" type="text" >
								<p><button  id="delete" type="submit">Delete</button> supplier</p>
							</form>
						</li>
			   		</ul>
				</div>
			</td>
			
			<td class="col-2">
				<div id="registerForm" class="column2content">
						  <h1>Register new Supplier</h1>
						  <form class="form" method="post" action="supplierRegister.php">
						    <input type="text" id="name" name="name" placeholder="Name">
						    <input type="text" id="address" name="address" placeholder="address">
						    <input type="text" id="country" name="country" placeholder="country">
						    <input type="text" id="phone" name="phone" placeholder="Phone">			    
						    <input type="submit" id="submit" value="Register">
						  </form>
				</div>
				<p class="optimize"></p>
				
				<div id="employeeList" class="column2content">
					<?php
					
						mysql_connect("localhost", "root", "") or die (mysql_error ());
						mysql_select_db("shop_here") or die(mysql_error());

						$sql = "SELECT * FROM suppliers";
					    $result = mysql_query($sql)  or die(mysql_error());					
						$table = "<table>";
						$table .= "<tr>";
					 	$table .= "<th>ID</th><th>Phone</th><th>Address</th><th>Country</th><th>Phone</th>";
					    while ($row = mysql_fetch_assoc($result))
					    {
							$table .= "<tr>";
					        $table .= "<td>".$row['ID']."</td>";
					        $table .= "<td>".$row['Name']."</td>";
					        $table .= "<td>".$row['Address']."</td>";
						    $table .= "<td>".$row['Country']."</td>";
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
					<form action="next.php" method="post">
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
			</td>
		</tr>



		<tr class="row"> 
			<td class="col-1">
				<div class="adminList">
			   		<ul>
				      	<li id="issueOrder">Issue order<li>
			   		</ul>
				</div>
			</td>

			<td class="col-2">
				<div id="issueOrderTable" class="column2content">
						  <h1>Blank</h1>
						  <form class="form" method="post" action="purchase.php">
						    <input type="text" id="suppID" name="suppID" placeholder="Supplier ID">
						    <input type="text" id="empID" name="empID" placeholder="Employee ID">
						    <input type="number" id="ItemID" name="ItemID" placeholder="Item ID">
						    <input type="number" id="QuantityNumber" name="QuantityNumber" placeholder="Quantity Number">
						    <input type="text" id="shippingPlace" name="shippingPlace" placeholder="Shipping place">
						    <div class="con">
						    <div>
								<input type="radio" name="radio" id="radio1" class="radio" value="1" checked/>
								<label for="radio1">  Truck</label>
							</div>

							<div>
								<input type="radio" name="radio" id="radio2" class="radio" value="2" />
								<label for="radio2"> Without deliver</label>
							</div>
							</div>

							<input type="number" id="priceOfShipping" name="priceOfShipping" placeholder="destination in km">
							<button type="submit" id="orderButton">Order</button>
						  </form>
				</div>
				<p class="optimize"></p>
				

			</td>
		</tr>

	</table>





</body>
</html>
