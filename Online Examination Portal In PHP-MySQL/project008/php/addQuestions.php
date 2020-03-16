<?php
session_start();
 if(!isset($_SESSION['uname']))
 	header("Location: http://localhost/project007/facultyLogin.php");
 if (isset($_GET['id'])) {
 	$_SESSION['q_bank']=$_GET['id'];
 }
	$q_bank_id=$_SESSION['q_bank'];
 include 'connection.php';
 	

 	$qry1="select * from question_bank where created_by='".$_SESSION['uname']."';";
 	$res1=$con->query($qry1);
 	  
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
		<link rel="stylesheet" type="text/css" href="http://localhost/project008/css/addQuestions.css">
		<?php
						if (isset($_SESSION['qadd'])) {
						echo "<script >";
						echo	"var notify=".$_SESSION['qadd'].";";
							unset($_SESSION['qadd']);
							echo " $(document).ready(function() {";	
									echo	" if (notify==true)";
									echo 	"{";
									echo		"alert("."\"question Added\"".");";
											
									echo	"}";
									echo	" else if(notify==false)";
									echo	"{";
									echo		" alert("."\"Error adding question\"".");";
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
			<div id="selectlist">
				<h2>Select Question Bank</h2>
				<div class="form-group ">
			  <select class="form-control" id="sel1" style="text-align: center;" form="form1" name="qb">
			    <?php
			    while ($row=$res1->fetch_assoc()) {
			    	if($row['id']==$q_bank_id){
			    		echo "<option value=\"".$row['id']."\" selected>".$row['name']."</option>";	
			    	}
			    	else{
			    		echo "<option value=\"".$row['id']."\">".$row['name']."</option>";	
			    	}
			    	
			    }
			    ?>
			  </select>
			</div>
			</div>
			
			
			<div class="row">
				
				
				<div class="col-sm-8">
					<h2>Questions in QB</h2>
					<input class="form-control" type="text" id="question_search" name="" placeholder="Search...">
					<?php
					/*
					$i=0;
					echo"	<div class=\"panel-group\" id=\"accordion\">";
					while ($row=$qdata->fetch_assoc()) {
					
					echo"  <div class=\"panel panel-default\">";
					echo"    <div class=\"panel-heading\">";
					echo"      <h4 class=\"panel-title\">";
					echo"        <a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse".$i."\">";
					echo        $row['question']."</a>";
					echo"      </h4>";
					echo"    </div>";
					echo"    <div id=\"collapse".$i."\" class=\"panel-collapse collapse \">";
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
					echo"  </div>";	*/
				?>
			<div class="panel-group" id="accordion">
					
			</div>
			</div>

			<div class="col-sm-4">
				<div class="row">
					<h2>Import</h2>
					<form action="addQuestionsX.php" method="POST" enctype="multipart/form-data">
						 <div class="form-group">
    						<label for="exampleFormControlFile1">Example file input</label>
    						<input type="file" class="form-control-file" id="exampleFormControlFile1" name="csvfile">
  						</div>
						<div class="form-group col-sm-4">
						    <input type="submit" class="form-control btn-primary" name='fileupload' value="upload">
						</div>
					</form>
				</div>
				<div class="row">
					<h2>Add Question</h2>
					<form action="addQuestionsX.php" method="POST" id="form1">
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
				</div>
		    </div>

</div>	
</div>
<script >
	<?php echo "var q_id=".$q_bank_id.";"; ?>
</script>
<script src="http://localhost/project008/javascript/homepage.js">
</script>
<script src="http://localhost/project008/javascript/addQuestions.js">
</script>
</body>
</html>