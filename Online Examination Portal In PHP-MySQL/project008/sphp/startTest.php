<?php
session_start();
include 'connection.php';

if(isset($_SESSION['test_data'])){
  header("Location: takeTest.php");
}

else if(isset($_GET)){

  $test=$_GET['test_id'];

  $active=$con->query("select active from test where id=$test");
  if($active->fetch_assoc()['active']!=1){
    header("Location: showTests.php");
  }
  $begin="begin;";
  $rollback="rollback;";
  $commit="commit;";
  //take questions added in test
  $qry="select question_id from question_in_test where test_id=$test";
  $res=$con->query($qry);

  //if there are any questions
  $ttl_q=$res->num_rows;
  if($ttl_q>0){
    //create attempt amd get attempt
    $date=date('Y-m-d');
    $start_time=date('H:i:s');
    $qry1="insert into attempt (date,start_time,test_id,student_id) values('$date','$start_time',$test,".$_SESSION['student_id']."); ";
    $qry2="select id from attempt where date='$date' and start_time='$start_time' and student_id=".$_SESSION['student_id'].";";

    $con->query($begin);
    $res1=$con->query($qry1);
    if(!$res1){
      $con->query($rollback);
      header("Location testcreateerror.php");
    }
    else{
      $con->query($commit);
    }
    $_SESSION['test_data']=array();
    $res2=$con->query($qry2);
    $attempt=$res2->fetch_assoc()['id'];
    $_SESSION['test_data']['attempt']=$attempt;
    //insert all the questions in studentans,also save ids in session array and update attempt table
    
    $_SESSION['test_data']['questions']=array();
    $i=0;
    $con->query($begin);
    while($row=$res->fetch_assoc()){
      $qry3="insert into studentans (attempt_id,student_id,question_id) values($attempt,".$_SESSION['student_id'].",".$row['question_id'].")";
      if($con->query($qry3)){
          $_SESSION['test_data']['questions'][$i]=$row['question_id'];
      }
      else{
        $con->query($rollback);
        unset($_SESSION['test_data']);
        header("Location: testcreateerror.php");
      }
      $i++;
    }
    $con->query($commit);
    shuffle($_SESSION['test_data']['questions']);

    $con->query($begin);
    $qry4="update attempt set total_questions_loaded=".($i)." where id=$attempt;";
    if(!$con->query($qry4)){
      $con->query($rollback);
      unset($_SESSION['test_data']);
      header("Location: testcreateerror.php");
    }
    $con->query($commit);
    //set all the session variables
    $qry5="select * from test where id=$test";
    $res5=$con->query($qry5);
    $r=$res5->fetch_assoc();
    $_SESSION['test_data']['test_ongoing']=$r['id'];
    $_SESSION['test_data']['start_time']=time();
    $_SESSION['test_data']['duration']=$r['timePerTest'];
    $_SESSION['test_data']['current_q']=0;
    $_SESSION['test_data']['total_q']=$ttl_q;

    //try block
    echo $_SESSION['test_data']['test_ongoing']."<br>";
    echo $_SESSION['test_data']['start_time']."<br>";
    echo $_SESSION['test_data']['duration']."<br>";
    echo $_SESSION['test_data']['attempt']."<br>";
  }
  header("Location: takeTest.php");
}
?>