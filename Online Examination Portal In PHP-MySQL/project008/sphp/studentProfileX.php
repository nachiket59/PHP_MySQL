<?php
	session_start();
 	if(!isset($_SESSION['student_id']))
 	header("Location: http://localhost/project008/sphp/studentLogin.php"); 
	include 'connection.php';
	include 'student.php';
	if(isset($_POST["submit"]))
		{
			echo "string";
			$id=$_SESSION['student_id'];
			echo $id;
			//$UserId=$_POST['TxtboxEno'];
			//echo $UserId;
			$Username=$_POST['TxtboxName'];
			$password=$_POST['TxtboxPass'];
			$emailId=$_POST['Txtboxemail'];

			$f=new Student();
			$k=$f->update($con,$id,$Username,$password,$emailId);//
			if($k==1)
			{
				echo "successfull";
			}
			else
			{
				echo "unsuccessfull";
			}
		}
		$_SESSION['updated']=true;
		header("Location: http://localhost/project008/sphp/student_profile.php");
?>