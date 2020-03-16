<?php
session_start();
if(isset($_SESSION['student_id']))
 	header("Location: http://localhost/project008/sphp/studentHome.php");
if ($_SERVER['REQUEST_METHOD']=='POST') {

 include 'connection.php';
 include 'student.php';
 $login=$_POST['uname'];
 $pass=$_POST['password'];

		$s=new Student();

		$k=$s->login($con,$login,$pass);
		if ($k) {
			
			header("Location: http://localhost/project008/sphp/resumeOngoingTest.php");
		}
		else
		{
			header("Location: http://localhost/project008/sphp/studentLogin.php");
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
		<link rel="stylesheet" type="text/css" href="http://localhost/project008/scss/home.css">
		<link rel="stylesheet" type="text/css" href="http://localhost/project008/scss/studentLogin.css">
</head>
<body>
	<div id="wrapper"  >
	<div class="main" >
			
		<div id="content" class="container-fluid content">

				<div  id="div1" class="form-group col-xs-4" align="center">
					<h3 align="center">Student Login</h3>
						<form action=<?php echo '"'.$_SERVER['PHP_SELF'].'"'; ?> method="POST">
							<label>username</label>	<input type="text" class="form-control" name="uname" required="true">
							<label>password</label> <input type="password" class="form-control" name="password" required="true" >
							<br>
							<input type="submit" name="submit" id="submit" class="form-control btn-primary col-xs-3" value="login">
						</form>
					</div>
		</div>

</div>	
</div>

<script src="http://localhost/project008/sjavascript/home.js">
</script>
</body>
</html>