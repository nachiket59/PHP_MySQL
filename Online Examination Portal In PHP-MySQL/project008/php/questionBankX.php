<?php
session_start();
 include 'connection.php';
 if (isset($_POST['qbname'])) {
 	$qbname=$_POST['qbname'];
	$created_by=$_SESSION['uname'];
	$q="insert into question_bank (name,created_by) values('$qbname','$created_by');";
	$result=$con->query($q);

	if ($result) {
		$_SESSION['qbadd']="true";
	}
	header("Location: http://localhost/project008/php/questionBank.php");
 }
 if (isset($_POST['qbid'])) {
 	$id=$_POST['qbid'];
 	$qry="delete from question_bank where id=$id";
 	if($con->query($qry))
 		echo "deleted";
 	else
 		echo "error deleting";	
 	
 }
	
?>