<?php

class Student
{
	
	
public function login ($con,$loginId,$pass)
	{
		$query="select * from student where enrollment='$loginId' and password='$pass'";
		$result=mysqli_query($con,$query);
		if (($result->num_rows)!=0) {
			$row= $result->fetch_assoc();
			$_SESSION['id']=$row['id'];
			echo $_SESSION['id'];
			return true;
		}
		else 
		{
			return false;
		}

	}	

public function logout()
	{
		session_destroy();
		header('login.php');

	}

public function getName($con,$id)
	{
		$query="select * from student where id=$id";
		$result=$con->query($query);
		$row=$result->fetch_assoc();
		return $row['studentName'];
	}

	public function getenrollment($con,$id)
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

		public function setEnrollment($con,$id,$loginId)
		{
			$q="update student set enrollment=$loginId where id=$id";
			$result=$con->query($q);
				if ($result) {
					return true;
				}
				else 
				{
					return false;
				}
		}
		 public function addRecord($con,$name,$enroll,$password,$email,$added_by)
		 {
		 	$q="insert into student(studentName,enrollment,password,email,added_by) values('$name','$enroll','$password','$email','$added_by')";
		 	$result=$con->query($q);
		 	if ($result) {
					return true;
				}
				else 
				{
					return false;
				}

		 }

		  public function update($con,$id,$name,$enrollment,$pass,$mail)
		{
			$q="update student set studentName = '$name',enrollment='$enrollment',password = '$pass',email = '$mail' where id=$id";
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