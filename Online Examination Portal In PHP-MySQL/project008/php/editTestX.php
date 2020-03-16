<?php
session_start();
include 'connection.php';
if(isset($_POST['submit'])){
	$title = $_POST['title'];
	$timePerTest = $_POST['timePerTest'];
	$id=$_POST['id'];
	$allowedAttempts=$_POST['allowedAttempts'];
	if (isset($_POST['allowPractice'])&&isset($_POST['allowResult'])) {
		
		$q="update test set title='$title',allowPractice=1,timePerTest='$timePerTest',allowedAttempts='$allowedAttempts',allowResult=1 where id=$id";
	}

	else if (!isset($_POST['allowPractice'])&&!isset($_POST['allowResult'])) {
		
		$q="update test set title='$title',allowPractice=0,timePerTest='$timePerTest',allowedAttempts='$allowedAttempts',allowResult=0 where id=$id";
	}
	else if (isset($_POST['allowPractice'])) {
		//$allowPractice = $_POST['allowPractice'];
		
		$q="update test set title='$title',allowPractice=1,allowResult=0,timePerTest='$timePerTest',allowedAttempts=$allowedAttempts where id=$id";	
	}
	else if (isset($_POST['allowResult'])) {
		//$allowPractice = $_POST['allowPractice'];
		
		$q="update test set title='$title',timePerTest='$timePerTest',allowResult=1,allowPractice=0,allowedAttempts=$allowedAttempts where id=$id";	
	}
	else
	{
		
		$q="update test set title='$title',timePerTest='$timePerTest',allowedAttempts=$allowedAttempts where id=$id";	
	}
	$res = $con->query($q);
	header("Location: http://localhost/project008/php/editTest.php?id=".$id);
}
?>