<?php
session_start();
 if(!isset($_SESSION['uname']))
 	header("Location: http://localhost/project008/php/facultyLogin.php");

 include 'connection.php';
 	$added_by=$_SESSION['uname'];
	$q="select * from student ";
	$sdata=$con->query($q);  
 ?>
<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  		<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.6/dist/loadingoverlay.min.js"></script>
  		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="http://localhost/project008/css/homepage.css">
		<link rel="stylesheet" type="text/css" href="http://localhost/project008/css/addStudent.css">
							<?php
						if (isset($_SESSION['sadd'])) {
						echo "<script >";
						echo	"var notify=".$_SESSION['sadd'].";";
							unset($_SESSION['sadd']);
							echo " $(document).ready(function() {";
								
									echo	" if (notify==true)";
									echo 	"{";
									echo		"alert("."\"Record Added\"".");";
											
									echo	"}";
									echo	" else if(notify==false)";
									echo	"{";
									echo		" alert("."\"no record addes\"".");";
									echo "}";			
								echo " });";
							
						echo "</script>";
						}
						?>
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
		<div id="content" class="container-fluid content" >
			<div class="row">
					<h1>Add Students</h1>
				<div id="form1" class="col-sm-4">
					<div class="row">
						<div class="row">
					
					<form id="form" action="addStudentX.php" method="POST">
						<div class="form-row">
							<div class="form-group col-sm-6">
						      <label >Name</label>
						      <input type="text" class="form-control" id="name" placeholder="Name" name="name">
						    </div>
						    <div class="form-group col-sm-6">
						      <label >Enrollment No.</label>
						      <input type="text" class="form-control" id="enroll" placeholder="Enrollment No" name="enroll">
						    </div>
						</div>
						<div class="form-row">
						    <div class="form-group col-sm-6">
						      <label >Password</label>
						      <input type="password" class="form-control" id="password" placeholder="Password" name="password">
						    </div>
						</div>
						<div class="form-group col-sm-12">
						    <label >Email</label>
						    <input type="email" class="form-control" id="email" placeholder="something@anything.com" name="email">
						</div>
						<div class="form-group col-sm-4">
						    <input type="submit" class="form-control btn-primary" id="submit" name="submit" value="submit">
						</div>
					</form>
					</div>
				</div>
					<div class="row">
						<h1>Import</h1>
						<form action="addStudentX.php" method="POST" enctype="multipart/form-data">
						 <div class="form-group">
    						<label for="exampleFormControlFile1">Upload CSV file in proper format</label>
    						<input type="file" class="form-control-file" id="exampleFormControlFile1" name="studentcsvfile">
  						</div>
						<div class="form-group col-sm-4">
						    <input type="submit" class="form-control btn-primary" name='fileupload' value="upload">
						</div>
					</form>
					</div>
				</div>
			
			<div class="col-sm-8">
				<div class="form-group form-inline ">
						    <label >Search</label>
						    <input type="email" class="form-control" id="search" placeholder="Search Students" name="search">
				</div>
				<table class="table table-bordered" id="stable">
					<thead>
						<tr>
						<th>Name</th>
						<th>Enrollment</th>
						<th>Password</th>
						<th>email</th>
						</tr>
					</thead>
					<tbody id="sdata">
						<?php
							while($row=$sdata->fetch_assoc())
							{
								echo "<tr>";
								echo "<td id=\"rid\">";
								echo $row['id'];
								echo "</td>";

								echo "<td>";
								echo $row['studentName'];
								echo "</td>";

								echo "<td>";
								echo $row['enrollment'];
								echo "</td>";
								
								echo "<td>";
								echo $row['password'];
								echo "</td>";
								
								echo "<td>";
								echo $row['email'];
								echo "</td>";

								echo "<td>";
								echo "<button class=\"btn btn-danger remove\" ><span class=\"fa  fa-trash\"></span> Delete</button>";
								echo "</td>";

								echo "<td>";
								echo "<button class=\"btn btn-warning edit\" > Edit</button>";
								echo "</td>";

								echo "</tr>";
							}  
						?>
					</tbody>
				</table>
			</div>
			</div>
		</div>
</div>	


</div>
<script src="http://localhost/project008/javascript/homepage.js"></script>
<script src="http://localhost/project008/javascript/addStudent.js"></script>
</body>
</html>