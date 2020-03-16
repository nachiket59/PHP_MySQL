<?php 
	session_start();
 include 'connection.php';
	if (isset($_POST['gname'])) {
	$groupName=$_POST['gname'];
	$created_by=$_SESSION['uname'];
	$q="insert into groups (groupName,created_by) values('$groupName','$created_by');";
	$result=$con->query($q);

	if ($result) {
		$_SESSION['gadd']="true";
	}
	header("Location: http://localhost/project008/php/createGroup.php");
	}

	if (isset($_POST['group_id'])) {
		$group_id=$_POST['group_id'];
		$test_id=$_POST['test_id'];
		$check_if_exists="select * from assigntest where assigntest.group_id=$group_id and assigntest.test_id=$test_id;";
		$rows=$con->query($check_if_exists);
		if(($rows->num_rows)==0){
			$qry="insert into assigntest(group_id,test_id) values($group_id,$test_id);";
			$res=$con->query($qry);
			if ($res) {
			echo "test assigned successfully";
			}
		}
		else {
			echo "The test is already assigned!!";
		}	
	}

	if(isset($_POST['removeid']))
	{
		
		$gid=$_POST['removeid'];

		 $qry="delete from groups where id = $gid";
		 $result=$con->query($qry);
		 if ($qry) {echo "Removed"; }
		 else {echo "error";}
	}
?>