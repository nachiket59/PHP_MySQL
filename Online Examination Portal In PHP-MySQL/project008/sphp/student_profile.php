<?php
  session_start();
  if(!isset($_SESSION['student_id']))
  header("Location: http://localhost/project008/sphp/studentLogin.php");
  include 'connection.php';
  include 'Student.php';
  $id=$_SESSION['student_id'];
  //$l="hii"; 

      
      $s=new Student();
      $Sname=$s->getName($con,$id);
      $enroll=$s->getLoginId($con,$id);
      $pass=$s->getPassword($con,$id);
      $email=$s->getEmail($con,$id);
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
    <?php
            if (isset($_SESSION['updated'])) {
            echo "<script >";
            echo  "var notify=".$_SESSION['updated'].";";
              unset($_SESSION['updated']);
              echo " $(document).ready(function() {";
                
                  echo  " if (notify==true)";
                  echo  "{";
                  echo    "alert("."\"Record updated\"".");";
                      
                  echo  "}";
                  echo  " else if(notify==false)";
                  echo  "{";
                  echo    " alert("."\"no record updated\"".");";
                  echo "}";     
                echo " });";
              
            echo "</script>";
            }
            ?>
</head>
<body>
  <div id="wrapper"  >
  <div class="main" >
      <nav class="navbar navbar-default navbar-fixed-top " id="navbar" >
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="studentHome.php">Online Test</a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span> 
            </button>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
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
    <div class="container">
  <h2>Your Account</h2>
  <form class="form-horizontal" action="/action_page.php">
    <div class="form-group">
      <label class="control-label col-sm-2" for="TxtID">Student name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="TxtID"  name="TxtID" value="<?php echo $Sname ?>" readonly="true"  >
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="TxtName">Enrollment number:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="TxtName"  name="TxtName" value="<?php echo $enroll ?>" readonly="true"  >
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="TxtPass">Password:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="TxtPass" value="<?php echo $pass ?>"  readonly="true">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="Txtmail">Email:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="Txtmail" value="<?php echo $email ?>"  name="Txtmail" readonly="true" >
      </div>
    </div>
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal" ><!-- data-toggle="modal" data-target="#myModal"-->
    Edit
  </button>
      </div>
    </div>
  </form>
</div>

</div>  
</div>

<script src="http://localhost/project008/sjavascript/home.js">
</script>
</body>
</html>
<div id="loginModal" class="modal fade " role="dialog">
<div class="modal-dialog  modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Enter your details</h4>
    </div>
    <div class="modal-body">
      <form id="form" action="studentProfileX.php" method="POST">
        <div class="form-group">
            <label for="TxtboxName" class="form-control-label">Enrollment number:</label>
            <input type="text" class="form-control" name="TxtboxID" id="TxtboxID" placeholder="Enter User name" value="<?php echo $enroll ?>" readonly="true">
          </div>
        <div class="form-group">
            <label for="TxtboxID" class="form-control-label">Student Name:</label>
            <input type="text" class="form-control" name="TxtboxName" id="TxtboxName" placeholder="Enter User ID" value="<?php echo $Sname ?>" >
          </div>
          
          <div class="form-group">
            <label for="TxtboxPass" class="form-control-label">Password:</label>
            <input type="text" class="form-control" name="TxtboxPass" id="TxtboxPass" placeholder="Enter Password" value="<?php echo $pass ?>">
          </div>
          <div class="form-group">
            <label for="Txtboxemail" class="form-control-label">Email:</label>
            <input type="email" class="form-control" name="Txtboxemail" id="Txtboxemail" placeholder="Enter Email ID" value="<?php echo $email ?>">
          </div>
       <input type="submit" class="form-control btn-primary" id="submit" name="submit" value="submit">
      </form>
    </div> 
  </div>
  
</div>  
</div>