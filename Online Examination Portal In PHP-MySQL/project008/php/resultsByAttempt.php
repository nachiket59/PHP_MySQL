<?php
session_start();
 if(!isset($_SESSION['uname']))
 	header("Location: http://localhost/project007/facultyLogin.php");  
 include 'connection.php';
 if (isset($_GET)) {
 	$s_id=$_GET['sid'];
 	$test_id=$_GET['test_id'];
 	$q="select * from attempt where student_id=$s_id and test_id=$test_id and status=1";
	$data=$con->query($q);
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
			<h2>Attempts</h2>
			<table class="table table-bordered" id="stable">
					<thead>
						<tr>
						<th>id</th>
						<th>Date</th>
						<th>Start Time</th>
						<th>End Time</th>
						<th>Total Questions</th>
						<th>Total Attempted</th>
						<th>Total Correct</th>
						</tr>
					</thead>
					<tbody id="sdata">
						<?php
							while($row=$data->fetch_assoc())
							{
								echo "<tr>";
								echo "<td id=\"rid\">";
								echo $row['id'];
								echo "</td>";

								echo "<td>";
								echo $row['date'];
								echo "</td>";

								echo "<td>";
								echo $row['start_time'];
								echo "</td>";
								
								echo "<td>";
								echo $row['end_time'];
								echo "</td>";

								echo "<td>";
								echo $row['total_questions_loaded'];
								echo "</td>";

								echo "<td>";
								echo $row['total_attempted'];
								echo "</td>";

								echo "<td>";
								echo "<b>".$row['total_correct']."</b>";
								echo "</td>";

								echo "<td>";
								echo "<button class=\"btn btn-primary show\" >Show</button>";
								echo "</td>";
								echo "</tr>";
							}  
						?>
					</tbody>
				</table>
		</div>
</div>	
</div>

<script src="http://localhost/project008/javascript/homepage.js">
</script>
<script src="http://localhost/project008/javascript/resultsByAttempt.js">
</script>
</body>
</html>