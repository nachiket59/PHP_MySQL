<?php
session_start();
 if(!isset($_SESSION['uname']))
 	header("Location: http://localhost/project007/facultyLogin.php"); 

 	include 'connection.php';
if(isset($_GET)){
	$id=$_GET['id'];
	$qry="select * from student where id=$id";
	$result=$con->query($qry);
	$r=$result->fetch_assoc();
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
			<h1>Edit Student</h1>
				<div id="form1" class="col-sm-4">
					<div class="row">
						<div class="row">
					
					<form id="form" action="editStudentX.php" method="POST">
						<div class="form-row">
							<div class="form-group col-sm-6">
						      <label >Name</label>
						      <input type="text" class="form-control" id="name" placeholder="Name" name="name" value=<?php echo "\"".$r['studentName']."\"" ?>>
						    </div>
						    <div class="form-group col-sm-6">
						      <label >Enrollment No.</label>
						      <input type="text" class="form-control" id="enroll" placeholder="Enrollment No" name="enroll" value=<?php echo "\"".$r['enrollment']."\"" ?>>
						    </div>
						</div>
						<div class="form-row">
						    <div class="form-group col-sm-6">
						      <label >Password</label>
						      <input type="password" class="form-control" id="password" placeholder="Password" name="password" value=<?php echo "\"".$r['password']."\"" ?>>
						    </div>
						</div>
						<div class="form-group col-sm-12">
						    <label >Email</label>
						    <input type="email" class="form-control" id="email" placeholder="something@anything.com" name="email" value=<?php echo "\"".$r['email']."\"" ?>>
						</div>
						<input type="hidden" class="form-control"  name="id" value=<?php echo "\"".$id."\"" ?>>
						<div class="form-group col-sm-4">
						    <input type="submit" class="form-control btn-primary" id="submit" name="submit" value="submit">
						</div>
					</form>
					</div>

		</div>

</div>	
</div>

<script src="http://localhost/project008/javascript/homepage.js">
</script>
</body>
</html>