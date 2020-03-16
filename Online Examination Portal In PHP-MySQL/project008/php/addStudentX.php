<?php 
session_start();
include 'connection.php';
include 'student.php';
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$enroll=$_POST['enroll'];
	$loginId=$_POST['loginId'];
	$password=$_POST['password'];
	$email=$_POST['email'];
	$added_by=$_SESSION['uname'];

	$student= new Student();
	$r=$student->addRecord($con,$name,$enroll,$password,$email,$added_by);
	if ($r) {
		echo"1 RECORD ADDED";
		$_SESSION['sadd']="true";
	}
	header("Location: http://localhost/project008/php/addStudent.php");
}
	
	if(isset($_POST['removeid']))
	{
		$sid=$_POST['removeid'];

		 $qry="delete from student where id = $sid";
		 $result=$con->query($qry);
		 if ($qry) {echo "Removed"; }
		 else {echo "error";}
	}	


	if (isset($_POST['fileupload'])) {
		$file=$_FILES['studentcsvfile']['tmp_name'];
		$handle=fopen($file,"r");
		$i=0;
		$x=0;
		$con->query("begin;");
		while (($cont=fgetcsv($handle,1000,","))!==false) {
			if($i==0){
				$i++;
				continue;
			}
			$name=$cont[0];
			$enroll=$cont[1];
			$password=$cont[2];
			$email=$cont[3];
			$added_by=$_SESSION['uname'];
			$q="insert into student(studentName,enrollment,password,email,added_by) values('$name','$enroll','$password','$email','$added_by')";
		 	$result=$con->query($q);
			if(!$result){
				$con->query("rollback;");
				$x=1;
				break;
			}
		$i++;
		}
		$con->query("commit;");
		if($x==1){
		echo "erroe";
		}
		header("Location: addStudent.php");
	}


 ?>
 