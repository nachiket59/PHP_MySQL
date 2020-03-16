<?php
session_start();
if(!isset($_SESSION['test_data'])){
	header("Location: studentHome.php");
}
include 'connection.php';
$attempt=$_SESSION['test_data']['attempt'];
$q="select * from studentans where attempt_id=$attempt and status=1";
$res=$con->query($q);
$total_attempted=0;
$total_correct=0;
$count=0;
if ($res->num_rows>0 ){
	$total_attempted=$res->num_rows;
	while ($row=$res->fetch_assoc()) {
		$qid=$row['question_id'];
		$sanswer=$row['sanswer'];
		$qres=$con->query("select answer from questions where qid=$qid");
		$answer=$qres->fetch_assoc()['answer'];
		if($sanswer==$answer){
			$count++;
		}
	}
	$total_correct=$count;
}
$end_time=date('H:i:s');
$con->query("begin;");
$qry="update attempt set end_time='$end_time',status=1,total_attempted=$total_attempted,total_correct=$total_correct where id=$attempt";
if(!$con->query($qry)){
	$con->query("rollback;");
	echo "error saving test";
}
else {
	$con->query("commit;");
	unset($_SESSION['test_data']);
	//echo "test saved";
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">
  <div class="jumbotron">
    <h2 align="center">Test is complete and saved.</h2>
    <h4 align="center">Results will be displayed only if faculty allows it to display!</h4>
   	<div class="row">
   	<div class="col-sm-6" align="center">	 
    <button class="btn btn-warning" onclick="window.location='studentHome.php';">go to home</button>
    </div>
    <div class="col-sm-6" align="center">
    <button class="btn btn-success" onclick="window.location='results.php';">go to results</button>
    </div>
    </div> 
  </div>
</div>
</body>
</html>