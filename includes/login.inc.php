<?php
	ob_start();
	include_once "autoloader.inc.php";
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	$userObj = new UserContr();

	if(isset($_POST['loginUser'])){
		$userID = $_POST['userid'];
		$password = $_POST['password'];
		$user = new UserContr();
		$result = $user->login($userID, $password);
		if($result == true){
			header("location: ../index.php");
			exit();
		}else{
			echo "There was a login error";
			exit();
		}
		
	}
		

#ob_end_flush();