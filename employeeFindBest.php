<?php

	// Соединиться с сервером БД
	mysql_connect("localhost", "root", "") or die (mysql_error ());
	
	// Выбрать БД
	mysql_select_db("sdu") or die(mysql_error());

	$con=mysqli_connect("localhost","root","","sdu");
	$edit = mysqli_real_escape_string($con, $_POST['edit']);
	
	$sql = "SELECT * FROM list WHERE id=$edit";
    $result = mysql_query($sql)  or die(mysql_error());	
	 
	// Закрыть соединение с БД
	mysql_close();
	mysqli_close($con);
	echo "<a href=main.html>Home Page</a>"
	
?>
