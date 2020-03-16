<?php 
 session_start();
 if(!isset($_SESSION['uname']))
 	header("Location: http://localhost/project008/php/facultyLogin.php");

 include 'connection.php';

 $sid=$_POST['removeid'];

 $q="delete from student where id = $sid";
 if ($q) {
 	
 }
 ?>