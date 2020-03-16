<?php

class Student
{
	
	
public function login ($con,$loginId,$pass)
	{
		$query="select * from student where enrollment='$loginId' and password='$pass'";
		$result=mysqli_query($con,$query);
		
		if (($result->num_rows)!=0) {
			$row= $result->fetch_assoc();
			
			$_SESSION['student_id']=$row['id'];
			$_SESSION['student_name']=$row['studentName'];
			//$q="update student set logged_in=1 where id=".$row['id'].";";
			//$con->query($q);
			//echo $_SESSION['id'];
			return true;
			
				
		}
		else 
		{
			return false;
		}

	}	

public function logout($con)
	{
		$q="update student set logged_in=0 where id=".$_SESSION['student_id'].";";
		$con->query($q);
		session_destroy();
		header('Location: http://localhost/project008/sphp/studentLogin.php');

	}

public function getName($con,$id)
	{
		$query="select * from student where id=$id";
		$result=$con->query($query);
		$row=$result->fetch_assoc();
		return $row['studentName'];
	}

	public function getLoginId($con,$id)
	{
		$query="select * from student where id=$id";
		$result=$con->query($query);
		$row=$result->fetch_assoc();
		return $row['enrollment'];
	}

		public function getPassword($con,$id)
	{
		$query="select * from student where id=$id";
		$result=$con->query($query);
		$row=$result->fetch_assoc();
		return $row['password'];

	}

	public function getEmail($con,$id)
	{
		$query="select * from student where id=$id";
		$result=$con->query($query);
		$row=$result->fetch_assoc();
		return $row['email'];
	}
	
	public function setName($con,$id,$name)
	{
		$q="update student set studentName=$name where id=$id";
		$result=$con->query($q);
		if ($result) {
			return true;
		}
		else 
		{
			return false;
		}
	}	
 public function setPassword($con,$id,$password)
		{
			$q="update student set password=$password where id=$id";
			$result=$con->query($q);
				if ($result) {
					return true;
				}
				else 
				{
					return false;
				}
		}

		public function setLoginId($con,$id,$loginId)
		{
			$q="update student set loginId=$loginId where id=$id";
			$result=$con->query($q);
				if ($result) {
					return true;
				}
				else 
				{
					return false;
				}
		}
		 public function addRecord($con,$name,$enroll,$loginId,$password,$email,$added_by)
		 {
		 	$q="insert into student(studentName,enrollment,loginId,password,email,added_by) values('$name','$enroll','$loginId','$password','$email','$added_by')";
		 	$result=$con->query($q);
		 	if ($result) {
					return true;
				}
				else 
				{
					return false;
				}

		 }
		  public function update($con,$id,$name,$pass,$mail)
		{
			$q="update student set studentName = '$name',password = '$pass',email = '$mail' where id=$id";
			$result=$con->query($q);
				if ($result) 
				{
					return true;
				}
				else 
				{
					return false;
				}

		}
		}
?>