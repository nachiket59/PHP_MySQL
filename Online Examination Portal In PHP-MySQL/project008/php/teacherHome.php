<?php
session_start();
 if(!isset($_SESSION['uname']))
 	header("Location: http://localhost/project007/facultyLogin.php");  
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
		<link rel="stylesheet" type="text/css" href="http://localhost/project008/css/homepage.css">

</head>
<body>
	<div id="wrapper"  >

	<div id="mySidenav" class="sidenav">
	  <a href="teacherHome.php">Home</a>
	  <a href="addStudent.php">Students</a>
	  <a href="createGroup.php">Manage Groups</a>
	  
		</div>
	



	<div class="main" >
			<nav class="navbar navbar-default navbar-fixed-top " id="navbar" >
				<div class="container-fluid">
					 <ul class="nav navbar-nav">
					      <li >
								<button class="btn navbar-btn" id="tgbtn"><span class="fa fa-bars" aria-hidden="true"></span>  MENU</button>
						  </li>
			    	 </ul>
					<div class="navbar-header">
						<a class="navbar-brand" href="">Online Test</a>
					</div>
					<ul class="nav navbar-nav navbar-right">
								<li class="dropdown">
									<button class="btn btn-default dropdown-toggle navbar-btn" type="button" id="menu1" data-toggle="dropdown"><span class="fa fa-user" ></span>
									<span class="caret"></span></button>
								<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
									<li role="presentation"><a role="menuitem" href="#">Profile</a></li>
									<li role="presentation"><a role="menuitem" href="#">Settings</a></li>
									<li role="presentation"><a role="menuitem" href="logout.php">Logout</a></li>
									<li role="presentation" class="divider"></li>
									<li role="presentation"><a role="menuitem" href="#">About Us</a></li>
								</ul>
										
							</li>
					</ul>

				</div>
			</nav>
		<div id="content" class="container-fluid content">
			<h1 align="center">Making and Taking test is just a matter of minutes!</h1>
			<div class="panel panel-warning">
  				<div class="panel-heading"><b>Step1</b></div>
  				<div class="panel-body">Add Students</div>
  				<div class="panel-footer"><button class="btn btn-primary" onclick="location.href = 'addStudent.php';">Add</button></div>
			</div>
			<div class="panel panel-danger">
  				<div class="panel-heading"><b>Step2</b></div>
  				<div class="panel-body">Create group of Students</div>
  				<div class="panel-footer"><button class="btn btn-danger" onclick="location.href = 'createGroup.php';">Create</button></div>
			</div>
			<div class="panel panel-success">
  				<div class="panel-heading"><b>Step3</b></div>
  				<div class="panel-body">Create Test And Assign to group</div>
  				<div class="panel-footer"><button class="btn btn-success" onclick="location.href = 'createTest.php';">Create</button> <button class="btn btn-warning" onclick="location.href = 'createTest.php';">Assign</button></div>
			</div>

		</div>

</div>	
</div>

<script src="http://localhost/project008/javascript/homepage.js">
</script>
</body>
</html>