<?php
session_start();
include 'connection.php';
	$s=$_SESSION['student_id'];
	$q="SELECT * from attempt where student_id=$s and status=0";
	$res=$con->query($q);
if($res->num_rows!=0){

	$row=$res->fetch_assoc();
	$attempt=$row['id'];
	$test=$row['test_id'];
	$start_date=$row['date'];
	$start_time=$row['start_time'];

	$qry5="select * from test where id=$test";
    $res5=$con->query($qry5);
    $r=$res5->fetch_assoc();
    $duration=$r['timePerTest'];
	
	/*if( time()-strtotime($start_date)>strtotime($duration) - strtotime('TODAY')){
		header("Location: studentHoee.php");
	}*/
	if (time()-strtotime($start_time)>strtotime($duration) - strtotime('TODAY')) {
		header("Location: studentHoe.php");	
	}
	$_SESSION['test_data']=array();
	$_SESSION['test_data']['attempt']=$attempt;

	$_SESSION['test_data']['questions']=array();
	$res1=$con->query("select * from studentans where attempt_id=$attempt");
	$i=0;
	while($row1=$res1->fetch_assoc()){
		$_SESSION['test_data']['questions'][$i]=$row1['question_id'];
		$i++;
	}

	
    $_SESSION['test_data']['test_ongoing']=$r['id'];
    $_SESSION['test_data']['start_time']=strtotime($start_time);
    $_SESSION['test_data']['duration']=$r['timePerTest'];
    $_SESSION['test_data']['current_q']=0;
    $_SESSION['test_data']['total_q']=$i;

    header("Location: studentHome.php");
}
else
	header("Location: studentHome.php");	
    
?>