<?php 
session_start();
include 'faculty.php';
$f=	new Faculty();
$f->logout();
?>