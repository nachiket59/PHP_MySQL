<?php
session_start();
include 'connection.php';
include 'student.php';
if(isset($_POST['submit']))
{
	$id=$_POST['id'];
	$name=$_POST['name'];
	$con->query("update groups set groupName='$name' where id=$id");
	header("Location: http://localhost/project008/php/editGroup.php?id=".$id);
}
?>