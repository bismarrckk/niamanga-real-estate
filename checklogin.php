<?php
session_start();
require_once "database/connection.php";

if(isset($_POST["submit"])){
	
	$email = addslashes($_POST["email"]);
	$password = addslashes($_POST["password"]);

	$sql = "SELECT * FROM users WHERE email = '$email'  AND status='active'  LIMIT 1 ";

	$results = $conn->query($sql);
	
	if($results->num_rows > 0){
		$values= $results->fetch_assoc();
		if(password_verify($password, $values['password'])){
		$_SESSION["data"] = $values;
		$userid = $_SESSION["data"]["user_id"];		
		$time=time();
		$update_userlog = "UPDATE users SET  user_log = '$time' WHERE user_id = '$userid' LIMIT 1";
		$conn->query($update_userlog);
			
	header("Location:admin");
	exit();
		
	}	
	else{				
		header("Location:signin.php?incorrect");
	exit();
		
	}
  }
  else{				
		header("Location:signin.php?incorrect");
	exit();
		
	}
}
?>