<?php
session_start();
 if(!isset($_SESSION['uname']))
 	header("Location: http://localhost/project008/sphp/facultyLogin.php"); 
 	include 'connection.php';
 	if(isset($_GET)){
 		$attempt=$_GET['attempt_id'];
 		$qry="SELECT x.* FROM ( SELECT questions.*,studentans.attempt_id,studentans.status,studentans.sanswer FROM questions INNER JOIN studentans ON questions.qid=studentans.question_id) as x WHERE x.attempt_id=$attempt;";
 		$res=$con->query($qry);	
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
			<h2>Result of attempt <?php echo $attempt; ?></h2>
			<br><br>
			<?php
					$i=0;
					echo"	<div class=\"panel-group\" id=\"accordion\">";
					while ($row=$res->fetch_assoc()) {
					if($row['answer']==$row['sanswer']){
						echo"  <div class=\"panel panel-success\">";	
					}
					else {
						echo"  <div class=\"panel panel-danger\">";
					}
					echo"    <div class=\"panel-heading\">";
					echo"      <h4 class=\"panel-title\">";
					echo"        <a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse0".$i."\">";
					echo        $row['question']."</a>";
					echo"      </h4>";
					echo"    </div>";
					echo"    <div id=\"collapse0".$i."\" class=\"panel-collapse collapse \">";
					echo"			<ul class=\"list-group\" id=\"list\">";
      				//echo"			  <li class=\"list-group-item\" id=\"id\">".$row['qid']."</li>";
      				echo"			  <li class=\"list-group-item\">(1) ".$row['option1']."</li>";
      				echo"			  <li class=\"list-group-item\">(2) ".$row['option2']."</li>";
      				if($row['option3']!=""){
      					echo"			  <li class=\"list-group-item\">(3) ".$row['option3']."</li>";
      					if($row['option4']!=""){
      						echo"			  <li class=\"list-group-item\">(4) ".$row['option4']."</li>";
      					}	
      				}
      				echo"			  <li class=\"list-group-item\" style=\"color:green;\"><b>CORRECT ANSWER:".$row['answer']."</b></li>";
      				echo"			  <li class=\"list-group-item\" style=\"color:blue;\"><b>YOUR ANSWER:".$row['sanswer']."</b></li>";
      				
      				echo"			</ul>";
      				echo"			<div class=\"panel-footer\">";
      				echo"			</div>";
					//echo"      <div class=\"panel-body\"></div>";
					echo"    </div>";
					echo"  </div>";
					
					$i++;
				}
					echo"  </div>";	
				?>
		</div>

</div>	
</div>

<script src="http://localhost/project008/javascript/homepage.js">
</script>
</body>
</html>