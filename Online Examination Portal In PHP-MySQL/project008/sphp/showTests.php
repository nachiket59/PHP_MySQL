<?php
session_start();
 if(!isset($_SESSION['student_id']))
 	header("Location: http://localhost/project008/sphp/studentLogin.php");
 	include 'connection.php';
 	$student_id=$_SESSION['student_id'];
	$q="select * from test where id in (select test_id from assigntest where group_id in(select groupId from studentgroup where studentId=$student_id));";
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
  		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="http://localhost/project008/scss/home.css">
</head>
<body>
	<div id="wrapper"  >
	<div class="main" >
			<nav class="navbar navbar-default navbar-fixed-top " id="navbar" >
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        						<span class="sr-only">Toggle navigation</span>
        						<span class="icon-bar"></span>
        						<span class="icon-bar"></span>
        						<span class="icon-bar"></span>
     					 </button>
						<a class="navbar-brand" href="studentHome.php">Online Test</a>
					</div>
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav" id="myNav">
						<li><a href="showGroups.php">Groups</a></li>
						
					</ul>	
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
				</div>
			</nav>
		<div id="content" class="container-fluid content">
			<h2>Tests</h2>
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
								if($row['active']==0)
								{
									echo "<button class=\"btn takeTest\" disabled=\"true\">Take test</button>";
								}
								else
									echo "<button class=\"btn takeTest\">Take test</button>";
								echo "</td>";

								echo "<tr >";
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
        <h4 class="modal-title">You have to enter faculty password to continue because you exceeded limit of allowed attempts!!</h4>
      </div>
      <div class="modal-body">
      	<label>Faculty Password</label>
        <input class="form-control" type="password" name="" id="password">
      </div>
      <div class="modal-footer">
        <button id="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>

  </div>
</div>

<script>
	var test_ongoing=null;
	<?php
		if(isset($_SESSION['test_data'])){
			echo "test_ongoing=".$_SESSION['test_data']['test_ongoing'];
		}
	?>
</script>
<script src="http://localhost/project008/sjavascript/home.js">
</script>
<script src="http://localhost/project008/sjavascript/showTests.js">
</script>
</body>
</html>

