<?php
	if (isset($_POST['name']) && isset($_POST['id']) && isset($_POST['email']) &&	isset($_POST['psw'])) 
	{
		
		include 'faculty.php';
		include 'connection.php';
		
		$name = $_POST['name'];
		echo $name;
		$Id = $_POST['id'];
		$mail = $_POST['email'];
		$pass = $_POST['psw'];

		$f=new Faculty();

		$k=$f->addFaculty($con,$name,$Id,$pass,$mail);
		if($k)
		{
			//echo "successfully";
			echo "<script type='text/javascript'>alert('User creted successfully');
			window.location='http://localhost/project008/php/facultyLogin.php';
			</script>";
			
		}
		else
		{
			//echo "unsuccessfully";
			echo "<script type='text/javascript'>alert('Registeration fail');
			window.location='http://localhost/project008/php/sign in.php';
			</script>";
			
		}


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
		<link rel="stylesheet" type="text/css" href="http://localhost/project008/css/facultyLogin.css">
		<link rel="stylesheet" type="text/css" href="http://localhost/project008/css/sign in.css">

		
</head>
<body>
	<div id="wrapper"  >

	<div id="mySidenav" class="sidenav">
	  <a href="#">About</a>
	  <a href="#">Services</a>
	  <a href="#">Clients</a>
	  <a href="#">Contact</a>
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
									<li role="presentation"><a role="menuitem" href="#">HTML</a></li>
									<li role="presentation"><a role="menuitem" href="#">CSS</a></li>
									<li role="presentation"><a role="menuitem" href="#">JavaScript</a></li>
									<li role="presentation" class="divider"></li>
									<li role="presentation"><a role="menuitem" href="#">About Us</a></li>
								</ul>
										
							</li>
					</ul>

				</div>
			</nav>
		
				
				<form class="form" action="sign in.php" method="post">
				  <div class="container">
				    <h1>Sign Up</h1>
				    <p>Please fill in this form to create an account.</p>
				    <hr>

				    <label for="name"><b>Name</b></label>
				    <input id="name" type="text" placeholder="Enter Name" name="name" required>

				     <label for="id"><b>Login Id</b></label>
				    <input id="id" type="text" placeholder="Enter Login Id" name="id" required>

				     <label for="email"><b>Email</b></label>
				    <input id="email" type="text" placeholder="Enter Email" name="email" required>

				    <label for="psw"><b>Password</b></label>
				    <input id="psw" type="password" placeholder="Enter Password" name="psw" required>

				    
				    
				    

				    <div class="clearfix">
				      
				      <button type="submit" class="signupbtn button">Sign Up</button>
				    </div>
				  </div>
				</form>
								
		

</div>	
</div>

<script src="http://localhost/project008/javascript/homepage.js">
</script>
</body>
</html>