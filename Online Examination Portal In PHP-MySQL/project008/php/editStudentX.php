<?php
session_start();
include 'connection.php';
include 'student.php';
if(isset($_POST['submit']))
{
	$id=$_POST['id'];
	$name=$_POST['name'];
	$enroll=$_POST['enroll'];
	$loginId=$_POST['loginId'];
	$password=$_POST['password'];
	$email=$_POST['email'];
	$added_by=$_SESSION['uname'];

	$student= new Student();
	$r=$student->update($con,$id,$name,$enroll,$password,$email);
	header("Location: http://localhost/project008/php/editStudent.php?id=".$id);
}
?>