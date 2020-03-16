<?php
session_start();
if(isset($_SESSION['test_data'])){

	if(time()-$_SESSION['test_data']['test_start_time']>=strtotime($_SESSION['test_data']['test_time']) - strtotime('TODAY')){
		//echo strtotime($_SESSION['test_time']) - strtotime('TODAY')-(time()-$_SESSION['test_start_time']);
		  	//header("Location: http://localhost/project008/sphp/TestComplete.php");
		echo "true";
	}
}
else {
	echo "false";
}
?>