<?php
session_start();


include 'connection.php';
include 'student.php';
$s=new Student();
$s->logout($con);
?>