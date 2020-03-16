<?php
session_start();
 if(!isset($_SESSION['student_id']))
 	header("Location: http://localhost/project008/sphp/studentLogin.php");
 if(!isset($_SESSION['test_data'])){
 	header("Location: studentHome.php");
 }
$sec=strtotime($_SESSION['test_data']['duration']) - strtotime('TODAY')-(time()-$_SESSION['test_data']['start_time']);
		//$parsed=date_parse($t);
		//$sec=$parsed['hour'] * 3600 + $parsed['minute'] * 60 + $parsed['second'];
  if( time()-$_SESSION['test_data']['start_time']>strtotime($_SESSION['test_data']['duration']) - strtotime('TODAY')){

  	//unset($_SESSION['test_data']);
  	header("Location: http://localhost/project008/sphp/testComplete.php");
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
  		<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.6/dist/loadingoverlay.min.js"></script>
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
			</nav>
		<div id="content" class="container-fluid content">
			<div class="row col-sm-8" id="question">
				<h2 id="msg">Remaining Time:</h2><h2 id="sec"></h2>
				<h3>
					<?php
					/*for ($i=0; $i <3 ; $i++) { 
						echo $_SESSION['test_data']['questions'][$i];
					}
					echo "<br>".$_SESSION['test_data']['test_ongoing']."<br>";
    				echo $_SESSION['test_data']['start_time']."<br>";
    				echo $_SESSION['test_data']['duration']."<br>";
    				echo $_SESSION['test_data']['attempt']."<br>";*/
					?>
				</h3>
				<h1 id="chut"></h1>

				<form id="form1" action="takeTestX.php" method="POST">
				
				</form>
				<button class="btn btn-default" id="next">next</button>
				<button class="btn btn-default" id="previous">previous</button>
				<button class="btn btn-default" id="finish">Finish</button>

			</div>
			<div class="row col-sm-4" id="summary">
				<h1>Summary</h1>
				<button class="btn btn-primary" id="refresh">Refresh</button>
				<div class="panel-group" id="accordion">
					
				</div>
			</div>
			
		</div>

</div>	
</div>
<script>
var sr_no=<?php echo $_SESSION['test_data']['current_q']; ?>;	
var testTime=<?php echo $sec; ?>;						 
</script>
<script src="http://localhost/project008/sjavascript/home.js"></script>
<script src="http://localhost/project008/sjavascript/takeTest.js"></script>
</body>
</html>