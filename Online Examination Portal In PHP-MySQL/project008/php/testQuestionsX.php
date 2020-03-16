<?php
include 'connection.php';
//send response if the questions bank value is changed
if (isset($_POST['qbid'])) {
	$qbid=$_POST['qbid'];
	$test_id=$_POST['tid'];
	$query="select * from questions where q_bank_id=$qbid and qid not in (select question_id from question_in_test where test_id=$test_id); ";
	$result=$con->query($query);
	$outp = $result->fetch_all(MYSQLI_ASSOC);
	echo json_encode($outp);
}
if (isset($_POST['qid'])) {
	$qid=$_POST['qid'];
	$t=$_POST['testid'];
	$query=" insert into question_in_test (test_id,question_id) values($t,$qid);";
	$result=$con->query($query);
	if ($result) {
		echo "question added successfully";
	}
	else
	{
		echo "Error adding question";
	}
}
if(isset($_POST['submit'])){
	$qbid=$_POST['qb'];
	$question=$_POST['question'];
	$opt1=$_POST['o1'];
	$opt2=$_POST['o2'];
	$opt3=$_POST['o3'];
	$opt4=$_POST['o4'];
	$answer=$_POST['ropt'];
	$test_id=$_POST['test_id'];
//check whether the last two options are empty make them null 
	if ($opt3=="") {
	$query=	"insert into questions (question,option1,option2,answer,q_bank_id) values('$question','$opt1','$opt2',$answer,$qbid);";
	}
	else if($opt4==""){
		$query=	"insert into questions (question,option1,option2,option3,answer,q_bank_id) values('$question','$opt1','$opt2','$opt3',$answer,$qbid);";	
	}
	else{
		$query=	"insert into questions (question,option1,option2,option3,option4,answer,q_bank_id) values('$question','$opt1','$opt2','$opt3','$opt4',$answer,$qbid);";
	}

	$res=$con->query($query);
	$qid=$con->insert_id;
	$qry="insert into question_in_test (test_id,question_id) values($test_id,$qid);";
	$con->query($qry);
	if($res){
		$_SESSION['qadd']="true";
		header("Location: http://localhost/project008/php/testQuestions.php?id=".$test_id);
	}
	
}
?>