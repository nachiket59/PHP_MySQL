<?php
session_start();
 if(!isset($_SESSION['student_id']))
 	header("Location: http://localhost/project008/sphp/studentLogin.php"); 
 	include 'connection.php';
 	$q='select * from student';
 	$res=$con->query($q);
 	$arrya=mysqli_fetch_all($res,MYSQLI_NUM);

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
								<ul class="dropdown-menu" role="menu" aria-labelledby="menu1" id="dropdown">
									<li role="presentation" ><a role="menuitem" href="" id="profile">Profile</a></li>
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
			<h1>Welcome <?php echo $_SESSION['student_name']; ?></h1>
			<?php
			 if (isset($_SESSION['test_data'])) {
			 	//echo $_SESSION['test_data']['test_ongoing']."<br>";
    			//echo $_SESSION['test_data']['start_time']."<br>";
    			//echo $_SESSION['test_data']['duration']."<br>";
    			//echo $_SESSION['test_data']['attempt']."<br>";

    			echo "<h2>You have a test going on!<br></h2>";
			 	echo "<div class=\"panel panel-danger\"><div class=\"panel-heading\"><b>Please continue the test!</b></div><div class=\"panel-body\">Your time will keep counting down and eventually test will automatically end</div><div class=\"panel-footer\"><button class=\"btn btn-primary\" onclick=\"location.href = 'takeTest.php';\">continue</button></div></div>";
			 }
			 else{
			 	echo "<h2>You have no test going on!</h2><br>";
			 	echo "<div class=\"panel panel-warning\"><div class=\"panel-heading\"><b>Go and see if any faculty has assigned and activated a test!</b></div><div class=\"panel-body\">1.Once you atart a test you coundown will not stop.<br>2.Attempt questions before time and submit test.</div><div class=\"panel-footer\"><button class=\"btn btn-primary\" onclick=\"location.href = 'showTests.php';\">Go to tests</button></div></div>";
			 }
			  ?>
			  <div class="panel panel-success">
  				<div class="panel-heading"><b>Results</b></div>
  				<div class="panel-body">Only results allowed by repective faculty will be displayed .</div>
  				<div class="panel-footer"><button class="btn btn-success" onclick="location.href = 'results.php';">Go to results</button></div>
			</div>
		</div>

</div>	
</div>

<script src="http://localhost/project008/sjavascript/home.js">
</script>
</body>
</html>