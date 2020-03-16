<?php
session_start();
 if(!isset($_SESSION['uname']))
 	header("Location: http://localhost/project007/facultyLogin.php");

 include 'connection.php';
 $uname=$_SESSION['uname'];
	$q2= "select * from question_bank where created_by='$uname' ";
	$qbdata=$con->query($q2);  
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
		<link rel="stylesheet" type="text/css" href="http://localhost/project008/css/questionBank.css">
		<?php
			if (isset($_SESSION['qbadd'])) {
				echo "<script >";

				echo	"var notify=".$_SESSION['qbadd'].";";
					
					unset($_SESSION['qbadd']);

					echo " $(document).ready(function() {";
						
							echo	" if (notify==true)";
							echo 	"{";
							echo		"alert("."\"Question Bank Added\"".");";
									
							echo	"}";
							echo	" else if(notify==false)";
							echo	"{";
							echo		" alert("."\"Error adding question bank\"".");";
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
			<div col-sm-12>
				<h1>Create new Question Bank</h1>
				<form action="questionBankX.php" method="POST" >
					<div class="form-group">
						      
						      <div class="form-inline">
						      	<label >QB name</label>
						      <input type="text" class="form-control" id="name" placeholder="Name" name="qbname">
						      <input class="form-control btn btn-primary" type="submit" name="" value="create">
						      </div>      
					</div>
				</form>
				<div id="qbtable">
				<h1>Select QB</h1>
				<table class="table table-hover">
					<thead>
						<tr>
						<th>Question Banks</th>
						</tr>
					</thead>
					<tbody>
						<?php
							while($row=$qbdata->fetch_assoc())
							{
								echo "<tr >";

								echo "<td class=qbid>";
								echo $row['id'];
								echo "</td>";

								echo "<td class=\"qblink\">";
								echo $row['name'];
								echo "</td>";

								echo "<td>";
								echo "<button class=\"btn btn-danger delete\" > Delete</button>";
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

<script src="http://localhost/project008/javascript/homepage.js">
</script>
<script src="http://localhost/project008/javascript/questionBank.js">
</script>
</body>
</html>