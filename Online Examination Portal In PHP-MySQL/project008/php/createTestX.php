<?php
session_start();
include 'connection.php';
if(isset($_POST['submit'])){
	$title = $_POST['title'];
	$createdBy=$_SESSION['uname'];
	$timePerTest = $_POST['timePerTest'];
	$allowedAttempts=$_POST['allowedAttempts'];
	if (isset($_POST['allowPractice'])&&isset($_POST['allowResult'])) {
		$allowedAttempts=$_POST['allowedAttempts'];
		$q="insert into test (title , allowPractice , timePerTest , createdBy,allowResult,allowedAttempts) values( '$title' , 1  , '$timePerTest' ,'$createdBy',1,$allowedAttempts  )";
	}
	else if (isset($_POST['allowPractice'])) {
		//$allowPractice = $_POST['allowPractice'];
		$q="insert into test (title , allowPractice ,  timePerTest ,allowedAttempts, createdBy) values( '$title' , 1 , '$timePerTest',$allowedAttempts ,'$createdBy'  )";	
	}
	else if(isset($_POST['allowResult'])){
		
		$q="insert into test (title , timePerTest , createdBy,allowResult,allowedAttempts) values( '$title' , '$timePerTest' ,'$createdBy',1 ,$allowedAttempts )";
	}
	else
	{
		$q="insert into test (title  , timePerTest , createdBy,allowedAttempts) values( '$title' , '$timePerTest' , '$createdBy',$allowedAttempts )";	
	}
	$res = $con->query($q);
		if($res){
			echo "inserted succesfully";
			header("Location: createTest.php");
		}
		else
		{
			echo "Insertion Error";
		}
}
else
echo "no submit action";

if(isset($_POST['activateid'])){
	echo "<b>".$_POST['activateid']."</b>";
	$activateid=$_POST['activateid'];
	$qry="update test set active=1 where id=$activateid;";
	$r=$con->query($qry);
	if($r){
		echo "<br>successfull";
	}
	else
		echo "<br>unsuccessful";
}

if(isset($_POST['deactivateid'])){
	echo "<b>".$_POST['deactivateid']."</b>";
	$deactivateid=$_POST['deactivateid'];
	$qry="update test set active=0 where id=$deactivateid;";
	$r=$con->query($qry);
	if($r){
		echo "<br>successfull";
	}
	else
		echo "<br>unsuccessful";
}

if (isset($_POST['deleteid'])) {
	
	$id=$_POST['deleteid'];
	$qry="delete  from test where id=$id;";
	$r=$con->query($qry);
	if($r){
		echo "scful";
	}
	else{
		echo "unscful";
	}
}
?>