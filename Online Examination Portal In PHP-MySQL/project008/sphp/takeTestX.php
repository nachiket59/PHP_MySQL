<?php
session_start();
if(!isset($_SESSION['test_data'])){
	header("Location: errore.php");
}
if( time()-$_SESSION['test_data']['start_time']>strtotime($_SESSION['test_data']['duration']) - strtotime('TODAY')){
  	//unset($_SESSION['test_data']);
  	echo "complete";
  	//header("Location: http://localhost/project008/sphp/testComplete.php");
  }
else{

include 'connection.php';

if(isset($_POST['next_question'])){
	/*$current=$_SESSION['test_data']['current_q'];
	if(isset($_POST['answer'])){
		$qid=$_SESSION['test_data']['questions'][$current];
		$ans=$_POST['answer'];
		$update_qry="update studentans set sanswer=$ans,status=1 where question_id=$qid and attempt_id=".$_SESSION['test_data']['attempt'].";";
		if(!$con->query($update_qry)){
			echo "error";
		}
	}
	*/
	
	$_SESSION['test_data']['current_q']++;
	if($_SESSION['test_data']['current_q']<$_SESSION['test_data']['total_q']){
		$p=$_SESSION['test_data']['current_q'];
		$next=$_SESSION['test_data']['questions'][$p];
		$qry="SELECT q.*,s.attempt_id,s.sanswer FROM questions AS q, studentans AS s WHERE q.qid=$next and s.question_id=$next AND attempt_id=".$_SESSION['test_data']['attempt'].";";
		$result=$con->query($qry);
		$outp = $result->fetch_all(MYSQLI_ASSOC);
		echo json_encode($outp);
	}
	else {
		$_SESSION['test_data']['current_q']--;
		echo "error";
	}
	
}

if(isset($_POST['prev_question'])){
	$current1=$_SESSION['test_data']['current_q'];
	$_SESSION['test_data']['current_q']--;
	if($_SESSION['test_data']['current_q']>=0){
		$p1=$_SESSION['test_data']['current_q'];
		$prev=$_SESSION['test_data']['questions'][$p1];
		$qry1="SELECT q.*,s.attempt_id,s.sanswer FROM questions AS q, studentans AS s WHERE q.qid=$prev and s.question_id=$prev AND s.attempt_id=".$_SESSION['test_data']['attempt'].";";
		$result1=$con->query($qry1);
		$outp1 = $result1->fetch_all(MYSQLI_ASSOC);
		echo json_encode($outp1);
	}
	else {
		$_SESSION['test_data']['current_q']++;
		echo "error";
	}	
}

if (isset($_POST['current_question'])) {
	$p2=$_SESSION['test_data']['current_q'];
	$current2=$_SESSION['test_data']['questions'][$p2];
	$qry2="SELECT x.* FROM ( SELECT questions.*,studentans.attempt_id,studentans.status,studentans.sanswer FROM questions INNER JOIN studentans ON questions.qid=studentans.question_id) as x WHERE x.qid=$current2 AND x.attempt_id=".$_SESSION['test_data']['attempt'].";";
		$result2=$con->query($qry2);
		$outp2 = $result2->fetch_all(MYSQLI_ASSOC);
		echo json_encode($outp2);
}

if (isset($_POST['summery'])) {
	$qry3="SELECT x.* FROM ( SELECT questions.*,studentans.attempt_id,studentans.status,studentans.sanswer FROM questions INNER JOIN studentans ON questions.qid=studentans.question_id) as x WHERE x.attempt_id=".$_SESSION['test_data']['attempt'].";";
	$result3=$con->query($qry3);
	if($result3){
		$outp3=$result3->fetch_all(MYSQLI_ASSOC);
		//shuffle($outp3);
		echo json_encode($outp3);	
	}
	else
		echo "error";
		
}

if (isset($_POST['jump_id'])) {
	/*$current=$_SESSION['test_data']['current_q'];
	if(isset($_POST['answer'])){
		$qid=$_SESSION['test_data']['questions'][$current];
		$ans=$_POST['answer'];
		$update_qry="update studentans set sanswer=$ans,status=1 where question_id=$qid and attempt_id=".$_SESSION['test_data']['attempt'].";";
		if(!$con->query($update_qry)){
			echo "error";
		}
	}*/
	$id=$_POST['jump_id'];
	$array=$_SESSION['test_data']['questions'];
	$index=array_search($id, $array);
	$_SESSION['test_data']['current_q']=$index;
	$qry4="SELECT x.* FROM ( SELECT questions.*,studentans.attempt_id,studentans.status,studentans.sanswer FROM questions INNER JOIN studentans ON questions.qid=studentans.question_id) as x WHERE x.qid=$id AND x.attempt_id=".$_SESSION['test_data']['attempt'].";";
	$result4=$con->query($qry4);
	if ($result4) {
		$outp4 = $result4->fetch_all(MYSQLI_ASSOC);
		echo json_encode($outp4);
	}
	else
		echo "error";
	}

	if(isset($_POST['answer'])){
		$current=$_SESSION['test_data']['current_q'];
		if(isset($_POST['answer'])){
			$qid=$_SESSION['test_data']['questions'][$current];
			$ans=$_POST['answer'];
			$update_qry="update studentans set sanswer=$ans,status=1 where question_id=$qid and attempt_id=".$_SESSION['test_data']['attempt'].";";
			if(!$con->query($update_qry)){
				echo "error";
			}
		}
	}
}
?>