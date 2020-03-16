<?php
session_start();
include 'connection.php';
if(isset($_POST['submit'])){
	$qbid=$_POST['qb'];
	$question=$_POST['question'];
	$opt1=$_POST['o1'];
	$opt2=$_POST['o2'];
	$opt3=$_POST['o3'];
	$opt4=$_POST['o4'];
	$answer=$_POST['ropt'];
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
	if($res){
		$_SESSION['qadd']="true";
		header("Location: http://localhost/project008/php/addQuestions.php");
	}
	
}
if(isset($_POST['removeid'])){
		 
		 $qid=$_POST['removeid'];
		 $qry="delete from questions where qid = $qid";
		 $result=$con->query($qry);
		 if ($qry) {echo "Removed"; }
		 else {echo "error";}
	}

if (isset($_POST['qbid'])) {
	
	$q_bank_id=$_POST['qbid'];
	$qry="select * from questions where q_bank_id=$q_bank_id";
 	$qdata=$con->query($qry);
 	$outp = $qdata->fetch_all(MYSQLI_ASSOC);
	echo json_encode($outp);
}
if (isset($_POST['fileupload'])) {
	$file=$_FILES['csvfile']['tmp_name'];
	$handle=fopen($file,"r");
	$i=0;
	$x=0;
	$con->query("begin;");
	while (($cont=fgetcsv($handle,1000,","))!==false) {
		if($i==0){
			$i++;
			continue;
		}
		$question=$cont[0];
		$opt1=$cont[1];
		$opt2=$cont[2];
		$opt3=$cont[3];
		$opt4=$cont[4];
		$answer=$cont[5];
		$qbid=$cont[6];
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
		if(!$res){
			$con->query("rollback;");
			$x=1;
			break;
		}
	$i++;
	echo $question." ".$opt1." ".$opt2." ".$opt3." ".$opt4." ".$answer." ".$qbid;
	}
	$con->query("commit;");
	if($x==1){
		echo "erroe";
	}
	header("Location: addQuestions.php");
}
?>