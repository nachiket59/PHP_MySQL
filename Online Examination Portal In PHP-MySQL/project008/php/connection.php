<?php 
$con=mysqli_connect('localhost','root');
if (!$con)
	echo "connection failed  ";
else
	//echo "connection successful  ";
	mysqli_select_db($con,'projectdb');
?>