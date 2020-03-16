<?php
session_start(); 
$con=mysqli_connect('localhost','root');
/*if (!$con)
	echo "connection failed  ";
else
	echo "connection successful  ";
*/
	mysqli_select_db($con,'projectdb');
	$gid=$_GET['id'];

	/*$q="select studentName, enrollment,groupName from groups g inner join (select * from studentgroup where groupId = $gid) sg on g.id=sg.groupId inner join student st on st.id=sg.StudentId;";
	$result=$con->query($q);

	$rows=array();

	while($r=mysqli_fetch_assoc($result))
	{
		$rows[]=$r;
	}

	$json=json_encode($rows);

	echo $json;*/
	if(isset($_POST['addid'])){
	$addId=$_POST['addid'];
	echo $addId;
	$q=" insert into studentgroup(studentId,groupId) values($addId,$gid)";
	$result=$con->query($q);

	if($result){
		echo "added successfully";
	}
	else{
		echo "error";
	}
	}


	if(isset($_POST['removeid'])){
	$removeId=$_POST['removeid'];
	echo $removeId;
	$q=" delete from studentgroup where studentId=$removeId and groupId=$gid";
	$result=$con->query($q);

	if($result){
		echo " removed successfully";
	}
	else{
		echo "error";
	}
	}


?>
