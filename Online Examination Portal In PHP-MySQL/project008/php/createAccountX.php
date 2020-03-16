<?php
session_start();
include 'connection.php';
include 'student.php';

if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$loginId=$_POST['loginId'];
	$password=$_POST['password'];
	$email=$_POST['email'];

	$res=$con->query("insert into faculty(name,loginId,password,email) values('$name','$loginId','$password','$email')");
	if($res){
		$_SESSION['created']=true;
		header("Location: createAccount.php");
	}
	else{
		$_SESSION['created']=false;
		header("Location: createAccount.php");
	}
}	
?>