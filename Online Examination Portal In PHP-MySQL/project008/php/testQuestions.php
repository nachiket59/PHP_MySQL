<?php
session_start();
 if(!isset($_SESSION['uname']))
 	header("Location: http://localhost/project007/facultyLogin.php"); 

 	include 'connection.php';
		$q1="select * from question_bank where created_by='".$_SESSION['uname']."';";
		$question_banks=$con->query($q1); 

		if(isset($_GET['id'])){
			$test_id=$_GET['id'];
			$q2="select * from questions where qid in (select question_id from question_in_test where test_id=$test_id);";
			$questions_in_test=$con->query($q2);
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
			<div class="row">
				<div class="col-sm-6">
					<h2>Select QB</h2>
					<div class="form-group ">
					 <select class="form-control" id="qbselect" style="text-align: center;" form="form1" name="qb">
					   <?php
					   $c=0;
					   	while ($row=$question_banks->fetch_assoc()) {
					   		if ($c==0) {
					   			echo "<option value=\"".$row['id']."\" selected>".$row['name']."</option>";
					   		}
					   		else
					   			echo "<option value=\"".$row['id']."\">".$row['name']."</option>";
					   		 
					   	}
					   ?>
					 </select>
					</div>
					
					<div class="row" style="height: 250px;overflow-y: scroll;">
						<h2>Add Question</h2>
					<form action="testQuestionsX.php" method="POST" id="form1">
						<input type="hidden" name="test_id" value=<?php echo "\"".$test_id."\""; ?>>
						<div class="form-group">
						    <label for="">Question</label>
						    <textarea class="form-control" id="question" name="question"></textarea>
						    
						 </div>
						 <div class="form-group">
						    <label for="option1">Option1</label>
						    <textarea class="form-control" id="o1" name="o1"></textarea>
						    
						 </div>
						 <div class="form-group">
						    <label for="option2">Option2</label>
						    <textarea class="form-control" id="o2" name="o2"></textarea>
						    
						 </div>
						 <div class="form-group">
						    <label for="option3">Option3</label>
						    <textarea class="form-control" id="o3" name="o3"></textarea>
						 </div>
						 <div class="form-group">
						    <label for="option4">Option4</label>
						    <textarea class="form-control" id="o4" name="o4" ></textarea>
						 </div>
						 <div class="form-group">
						    <label for="">Right answer</label>
						    <div class="radio">
							  <label><input type="radio" name="ropt" value="1" checked>Option 1</label>
							</div>
							<div class="radio">
							  <label><input type="radio" name="ropt" value="2">Option 2</label>
							</div>
							<div class="radio">
							  <label><input type="radio" name="ropt" value="3">Option 3</label>
							</div>
							<div class="radio">
							  <label><input type="radio" name="ropt" value="4">Option 4</label>
							</div>
						 </div>
						 <div class="form-group col-sm-4">
						    <input type="submit" class="form-control btn-primary" id="submit" name="submit" value="submit">
						</div>
					</form>
					</div>
					<br>
					
					<h2>Questions in QB</h2>
					<input class="form-control" type="text" id="question_search" name="" placeholder="Search...">
					<div class="row" style="height: 250px;overflow-y: scroll;">
					<div class="panel-group" id="accordion">
					</div>
					</div>
				</div>

				<div class="col-sm-6" style="height: 850px;overflow-y: scroll;">
					<h2>Test Questions of testId  <?php echo $test_id; ?></h2>
					<?php
					$i=0;
					echo"	<div class=\"panel-group\" id=\"accordion\">";
					while ($row=$questions_in_test->fetch_assoc()) {
					
					echo"  <div class=\"panel panel-default\">";
					echo"    <div class=\"panel-heading\">";
					echo"      <h4 class=\"panel-title\">";
					echo"        <a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse0".$i."\">";
					echo        $row['question']."</a>";
					echo"      </h4>";
					echo"    </div>";
					echo"    <div id=\"collapse0".$i."\" class=\"panel-collapse collapse \">";
					echo"			<ul class=\"list-group\" id=\"list\">";
      				echo"			  <li class=\"list-group-item\" id=\"id\">".$row['qid']."</li>";
      				echo"			  <li class=\"list-group-item\">(A) ".$row['option1']."</li>";
      				echo"			  <li class=\"list-group-item\">(B) ".$row['option2']."</li>";
      				echo"			  <li class=\"list-group-item\">(C) ".$row['option3']."</li>";
      				echo"			  <li class=\"list-group-item\">(D) ".$row['option4']."</li>";
      				echo"			  <li class=\"list-group-item\"> ANSWER:".$row['answer']."</li>";
      				echo"			</ul>";
      				echo"			<div class=\"panel-footer\">";
      				echo "				<button class=\"btn btn-danger remove\"><span class=\"fa  fa-trash\"></span> Delete</button>";
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

</div>	
</div>
<script type="text/javascript">
	var test_id=<?php echo $test_id; ?>
</script>
<script src="http://localhost/project008/javascript/homepage.js">
</script>
<script src="http://localhost/project008/javascript/testQuestions.js">
</script>
</body>
</html>