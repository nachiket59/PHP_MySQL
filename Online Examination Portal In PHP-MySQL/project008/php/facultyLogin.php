<?php 
if ($_SERVER['REQUEST_METHOD']=='POST') {
session_start();
include 'faculty.php';
include 'connection.php';
$login=$_POST['uname'];
$pass=$_POST['password'];

		$f=new Faculty();

		$k=$f->login($con,$login,$pass);
		if ($k) {
			header("Location: http://localhost/project008/php/teacherHome.php");
			
		}
		else
		{
			header("Location: http://localhost/project008/php/facultyLogin.php");
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
</head>
<body>
	<div id="wrapper"  >

	
	



	<div class="main" >
			
		<div id="content" class="container-fluid content">
				
					<div  id="div1" class="form-group col-xs-4" align="center">
						<h3 align="center">Faculty Login</h3>
						<form action=<?php echo '"'.$_SERVER['PHP_SELF'].'"'; ?> method="POST">
							<label>username</label>	<input type="text" class="form-control" name="uname" required="true">
							<label>password</label> <input type="password" class="form-control" name="password" required="true">
							<br>
							<input type="submit" name="submit" id="submit" class="form-control btn-primary col-xs-3" value="login">
						</form>
						<br><br>
						<a href="createAccount.php">Create new account.</a>
					</div>

				
		</div>

</div>	
</div>

<script src="http://localhost/project008/javascript/homepage.js">
</script>
</body>
</html>