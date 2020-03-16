<?php 

class Faculty
{
	private  $password;
	private  $name;
	private  $id;
	

	 public function login ($con,$loginId,$pass)
	{
		$query="select * from faculty where loginId='$loginId' and password='$pass'";
		$result=mysqli_query($con,$query);
		if (($result->num_rows)!=0) {
			$row= $result->fetch_assoc();
			$_SESSION['id']=$row['id'];
			$_SESSION['uname']=$row['loginId'];
			
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
		header("Location: facultylogin.php");

	}

	public function getName($con,$id)
	{
		$query="select * from faculty where id=$id";
		$result=$con->query($query);
		$row=$result->fetch_assoc();
		return $row['name'];
	}

	public function getLoginId($con,$id)
	{
		$query="select * from faculty where id=$id";
		$result=$con->query($query);
		$row=$result->fetch_assoc();
		return $row['loginId'];
	}

		public function getPassword($con,$id)
	{
		$query="select * from faculty where id=$id";
		$result=$con->query($query);
		$row=$result->fetch_assoc();
		return $row['password'];

	}

	public function setName($con,$id,$name)
	{
		$q="update faculty set name=$name where id=$id";
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
			$q="update faculty set password=$password where id=$id";
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
			$q="update faculty set loginId=$loginId where id=$id";
			$result=$con->query($q);
				if ($result) {
					return true;
				}
				else 
				{
					return false;
				}
		}
}
?>