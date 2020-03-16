<?php
session_start();
 if(!isset($_SESSION['uname']))
 	header("Location: http://localhost/project007/facultyLogin.php");

 	include 'connection.php';
 	$createdBy=$_SESSION['uname'];
	$q="select * from test where createdBy ='$createdBy'";
	$tdata=$con->query($q);  
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
			<div class="row">
				<div class="col-sm-6">
					<h1>Add Test</h1>
					<form method="post" action="createTestX.php">
						<div class="form-group col-sm-6" >
						    <label >Test Title</label>
						    <input type="text" class="form-control" id="title" placeholder="" name="title">
						</div>
						<div class="form-group col-sm-6 ">
						    <label >Allow Practice</label>
						    <input type="checkbox" class="form-control" id="allowPractice" placeholder="" name="allowPractice">
						</div>
						<div class="form-group col-sm-6 ">
						    <label >Dispaly Result</label>
						    <input type="checkbox" class="form-control" id="allowResult" placeholder="" name="allowResult">
						</div>
						<div class="form-group col-sm-6">
						    <label >Time Per Test</label>
						    <input type="time" class="form-control" id="timePerTest" placeholder="" name="timePerTest" step="1">
						</div>
						<div class="form-group col-sm-6" >
						    <label >Allowed attempts</label>
						    <input type="text" class="form-control" id="allowedAttempts" placeholder="" name="allowedAttempts">
						</div>
						<br>
						<div class="form-group col-sm-4">
						    <input name="submit" type="submit" class="form-control btn btn-primary" value="ADD">
						</div>

					</form>
				</div>
				<div class="col-sm-6">
					<h1> Manage Tests </h1>
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Id</th>
								<th>Tlite</th>
							</tr>
						</thead>
						<tbody>
							<?php
							while($row=$tdata->fetch_assoc()){
								echo "<tr >";

								echo "<td id=\"testid\">";
								echo $row['id'];
								echo "</td>";

								echo "<td>";
								echo $row['title'];
								echo "</td>";

								echo "<td>";
								echo "<button class=\"btn editbtn\">edit</button>";
								echo "</td>";

								echo "<td>";
								if($row['active']==0)
								{
									echo "<button class=\"btn activate\">Activate</button>";
								}
								else
									echo "<button class=\"btn deactivate\">Deactivate</button>";
								echo "</td>";

								echo "<td>";
								echo "<button class=\"btn addQuestions\">Add Questions</button>";
								echo "</td>";

								echo "<td>";
								echo "<button class=\"btn btn-danger delete\">delete</button>";
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
<script src="http://localhost/project008/javascript/createTest.js"></script>
</body>
</html>