<?php
session_start();
 if(!isset($_SESSION['uname']))
 	header("Location: http://localhost/project008/php/facultyLogin.php");

 	include 'connection.php';

 	$uname=$_SESSION['uname'];
	$q2= "select * from groups where created_by='$uname' ";
	$gdata=$con->query($q2);

	 $q1="select * from test where createdBy='".$_SESSION['uname']."';";
		$tests=$con->query($q1);
		
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
		<link rel="stylesheet" type="text/css" href="http://localhost/project008/css/createGroup.css">

		<?php
			if (isset($_SESSION['gadd'])) {
				echo "<script >";

				echo	"var notify=".$_SESSION['gadd'].";";
					
					unset($_SESSION['gadd']);

					echo " $(document).ready(function() {";
						
							echo	" if (notify==true)";
							echo 	"{";
							echo		"alert("."\"Group Added\"".");";
									
							echo	"}";
							echo	" else if(notify==false)";
							echo	"{";
							echo		" alert("."\"no group addes\"".");";
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
		<div id="content" class="container-fluid content">
			<div id="loader" style="display: none;"></div>
			<div col-sm-12>
				<h1>Create Groups</h1>
				<form action="createGroupX.php" method="POST" >
					<div class="form-group">
						      <label > Group Name</label>
						      <div class="form-inline">
						      <input type="text" class="form-control" id="name" placeholder="Name" name="gname">
						      <input class="form-control btn btn-primary" type="submit" name="" value="create">
						      </div>      
					</div>
				</form>
			
			<div id="gtable">
				<h1>Edit Group</h1>
				<table class="table table-hover">
					<thead>
						<tr>
						<th>Groups</th>
						</tr>
					</thead>
					<tbody>
						<?php
							while($row=$gdata->fetch_assoc())
							{
								echo "<tr >";

								echo "<td class=\"gid\">";
								echo $row['id'];
								echo "</td>";

								echo "<td class=\"glink\">";								
								echo $row['groupName'];
								echo "</td>";

								echo "<td>";
								echo "<button class=\"btn mbtn\">Manage</button>";
								echo "</td>";

								echo "<td>";
								echo "<button class=\"btn editbtn\">Edit</button>";
								echo "</td>";

								echo "<td>";
								echo "<button class=\"btn assign_test\" data-toggle=\"modal\" data-target=\"#myModal\">Assign Test</button>";
								echo "</td>";

								echo "<td>";
								echo "<button class=\"btn btn-danger deletebtn\">Delete</button>";
								echo "</td>";

								echo "</tr>";
							}  
						?>
					</tbody>
				</table>
			</div>
		</div>

</div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Assign Test</h4>
      </div>
      <div class="modal-body">
        <div class="form-group ">
					 <select class="form-control" id="tests" style="text-align: center;">
					   <?php
					   	while ($row=$tests->fetch_assoc()) {
					   		 echo "<option value=\"".$row['id']."\">".$row['title']."</option>";
					   	}
					   	?>
					 </select>
					 <br>
					  <button class="btn btn-primary" id="assign">Assign</button>
		</div>
		<h5>Already assigned tests</h5>
		<ul>
			
		</ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
  </div>	
</div>

<script src="http://localhost/project008/javascript/homepage.js"></script>
<script src="http://localhost/project008/javascript/createGroup.js"></script>
</body>
</html>