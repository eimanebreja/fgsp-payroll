<?php 
	$conn=mysqli_connect('localhost', 'root', '', 'payroll_db');
	
	if(!$conn){
		die("Error: Can't connect to database!");
	}
?>