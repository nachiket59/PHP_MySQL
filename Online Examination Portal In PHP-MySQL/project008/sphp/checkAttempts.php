<?php
session_start();
 if(!isset($_SESSION['student_id']))
 	header("Location: http://localhost/project008/sphp/studentLogin.php");
 	include 'connection.php';
 	if(isset($_POST['test_id'])){
 		$test_id=$_POST['test_id'];

 		$q="select id from attempt where test_id=$test_id and student_id=".$_SESSION['student_id'].";";
 		$q1="SELECT allowedAttempts from test where id=$test_id";
 		$res1=$con->query($q1);
 		$allowed=$res1->fetch_assoc()['allowedAttempts'];
 		$res=$con->query($q);
 		if($res->num_rows>=$allowed){
 			echo "notallowed";
 		}
 		else
 			echo "allowed";
 	}
 	if (isset($_POST['password'])) {
 		$test=$_POST['test'];
 		$password=$_POST['password'];
 		$qry="select createdBy from test where id=$test";
 		$res=$con->query($qry);
 		$faculty=$res->fetch_assoc()['createdBy'];
 		$qry2="select * from faculty where loginId='$faculty' and password='$password'";
 		$res2=$con->query($qry2);
 		if($res2->num_rows>0){
 			echo "succeed";
 		}
 		else
 			echo "fail";
 	}
?>