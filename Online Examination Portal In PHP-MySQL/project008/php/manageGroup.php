<?php
session_start();
 if(!isset($_SESSION['uname']))
 	header("Location: http://localhost/project008/php/facultyLogin.php");

 include 'connection.php';

 	$gid=$_GET['id'];
 	
 	$qry="SELECT groupName FROM groups WHERE id = $gid ";
 	$result3=$con->query($qry);
 	$arr=$result3->fetch_assoc();
 	$gname=$arr['groupName'];
	$q="SELECT * FROM student WHERE id IN (select studentId from studentgroup where groupId = $gid)";
	$result=$con->query($q);
	$q2="SELECT * FROM student WHERE id NOT IN (select studentId from studentgroup where groupId = $gid)";
	$result2=$con->query($q2); 

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
			<h1><?php echo $gname; ?></h1>
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-6">
						<h3>Students in the Group</h3>
						<div class="form-group form-inline ">
						    <label >Search</label>
						    <input type="email" class="form-control" id="search1" placeholder="Search Students" name="search">
						</div>
						<table class="table table-striped" >
							<thead>
								<tr>
									<th>studentId</th>
									<th>studentName</th>
									<th>enrollment</th>
								</tr>
							</thead>
							<tbody id="table1">
								<?php
									while($row=$result->fetch_assoc())
										{
											echo "<tr >";

											echo "<td class=\"rid\">";
											echo $row['id'];
											echo "</td>";

											echo "<td >";
											echo $row['studentName'];
											echo "</td>";

											echo "<td >";
											echo $row['enrollment'];
											echo "</td>";
											
											echo "<td >";
											echo "<button class=\"btn btn-danger removebtn\">remove</button>";
											echo "</td>";

											echo "</tr>";
										}
								?>
							</tbody>
						</table>
					</div>
					<div class="col-sm-6">
						<h3>Students Not in the Group</h3>
						<div class="form-group form-inline ">
						    <label >Search</label>
						    <input type="email" class="form-control" id="search2" placeholder="Search Students" name="search">
						</div>
						<table class="table table-striped" >
							<thead>
								<tr>
									<th>studentId</th>
									<th>studentName</th>
									<th>enrollment</th>
								</tr>
							</thead >
							<tbody id="table2">
								<?php
									while($row2=$result2->fetch_assoc())
										{
											echo "<tr >";

											echo "<td class=\"sid\">";
											echo $row2['id'];
											echo "</td>";

											echo "<td >";
											echo $row2['studentName'];
											echo "</td>";

											echo "<td >";
											echo $row2['enrollment'];
											echo "</td>";

											echo "<td >";
											echo "<button class=\"btn btn-success addbtn \">add</button>";
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
</div>

<script src="http://localhost/project008/javascript/homepage.js"></script>
<script>
			var gid=<?php echo $gid; ?>;
		</script>
<script src="http://localhost/project008/javascript/manageGroup.js"></script>
</body>
</html>