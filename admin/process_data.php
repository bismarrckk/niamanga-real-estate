<?php
session_start();
require "../database/connection.php";
$user_id = $_SESSION["data"]["user_id"];



if(isset($_POST["user_details"])){
	$fullname = addslashes($_POST["name"]);
	$phone = addslashes($_POST["phone"]);
	$role = addslashes($_POST["role"]);
	$email = addslashes($_POST["email"]);
	$password = addslashes($_POST["password"]);
	$password2 = addslashes($_POST["password2"]);
	if($password!==$password2){
	header("location:reg-users.php?mismatch");
	}
	else{
	$hashpassword=password_hash($password, PASSWORD_DEFAULT);
	$_SESSION["fullname"] = ucwords(strtolower($fullname));
	$_SESSION["phone"] = $phone;
	$_SESSION["role"] = $role;
	
	
	$fullname = $_SESSION["fullname"];
	$phone = $_SESSION["phone"];
	$role = $_SESSION["role"];
	$time=time();

	$checkuser = "SELECT * FROM users WHERE email = '$email' ";

	$chckresults = $conn->query($checkuser);
	
	if($chckresults->num_rows > 0){
		header("location:reg-users.php?exists");
	}
	else{

	$add_user = "INSERT INTO users(fullname,phone_number,password,user_role,email) VALUES ('$fullname','$phone','$hashpassword','$role','$email')";
	if($conn->query($add_user)){

	
		unset($_SESSION["fullname"]);
		unset($_SESSION["phone"]); 
		unset($_SESSION["role"]); 
		unset($_SESSION["password"]); 
		unset($_SESSION["password2"]);

		header("Location:users.php?successful");
		exit();
	}
	
	else{
		header("Location:reg-users.php?err");
	
	}

	}

  }

}

if(isset($_POST["property_details"])){
	$location = addslashes($_POST["location"]);
	$dimensions = addslashes($_POST["dimensions"]);
	$listing = addslashes($_POST["listing"]);
	$description = addslashes($_POST["description"]);
	$price = addslashes($_POST["price"]);
    $map = addslashes($_POST["map"]);
    $video = addslashes($_POST["video"]);
    $rooms = addslashes($_POST["rooms"]);
    $county =ucwords(addslashes($_POST["county"]));
    $category = addslashes($_POST["category"]);
	
	

	$_SESSION["location"] = ucwords(strtolower($location));
	
	$location = $_SESSION["location"];


	$time=time();

	$add_property = "INSERT INTO property(location,dimensions,listing,description,price,reg_date,map,video,rooms,county,category) VALUES ('$location','$dimensions','$listing','$description','$price','$time','$map','$video','$rooms','$county','$category')";
	if($conn->query($add_property)){

	header("location:index.php?successful");
	}
	else{
		header("Location: reg-property.php?err");
	}
}

if(isset($_POST["add_property_photos"])){

	$property_id=$_SESSION['property'];
	$countfiles = count($_FILES['files']['name']);
 
  for($i=0;$i<$countfiles;$i++){

    // File name
    $filename = $_FILES['files']['name'][$i];

    // Location
    $target_file = 'photos/'.$filename;

    // file extension
    $file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
    $file_extension = strtolower($file_extension);

    // Valid image extension
    $valid_extension = array("png","jpeg","jpg");

    if(in_array($file_extension, $valid_extension)){

       // Upload file
       if(move_uploaded_file($_FILES['files']['tmp_name'][$i],$target_file)){

          // Execute query
	
	  $photos="INSERT INTO photos(property_id,link) values ('$property_id','$target_file')";
	  if($conn->query($photos)){
	  	header("location:view-images.php?successful");
	  }
       }
       else{
       			header("location:reg-photos.php?id=$property_id&err-upload");
       }
    }
     else{
       			header("location:reg-photos.php?id=$property_id&invalid");
       }
 
  }

}



if(isset($_POST["update_property_details"])){
	$location = addslashes($_POST["location"]);
	$dimensions = addslashes($_POST["dimensions"]);
	$listing = addslashes($_POST["listing"]);
	$description = addslashes($_POST["description"]);
	$price = addslashes($_POST["price"]);
	$status = addslashes($_POST["status"]);
	 $map = addslashes($_POST["map"]);
    $video = addslashes($_POST["video"]);
    $rooms = addslashes($_POST["rooms"]);
    $county =ucwords(addslashes($_POST["county"]));
    $category = addslashes($_POST["category"]);
	
	

	$_SESSION["location"] = ucwords(strtolower($location));
	
	$location = $_SESSION["location"];


	$time=time();
	$property_id=$_SESSION["property_id"];
	$update_property = "UPDATE property SET location='$location',dimensions='$dimensions',listing='$listing',description='$description',status='$status',map='$map',video='$video',rooms='$rooms',county='$county',category='$category' WHERE property_id='$property_id'";
	if($conn->query($update_property)){
	
		header("location:index.php?successful");
		
	}
	
	else{
		header("Location: update-property-details.php?id=$property_id&err");
	}
}
	

if(isset($_POST["update_user_details"])){

	$status = addslashes($_POST["status"]);
	$role = addslashes($_POST["role"]);
	$email = addslashes($_POST["email"]);
	$fullname = addslashes($_POST["fullname"]);
	

	$time=time();

	$user_id=$_SESSION["user_id"];

	$update_user = "UPDATE users set user_role='$role',status='$status',email='$email',fullname='$fullname' WHERE user_id='$user_id'";
	if($conn->query($update_user)){
		
		header("Location: users.php");
		exit();
	}
	
	else{
		
		header("Location: update-user-status.php?id=$user_id&err");
		exit();
	}

	

}

if(isset($_POST["password_change"])){
$oldpassword = addslashes($_POST["oldpassword"]);
	$password = addslashes($_POST["password"]);
	$password2 = addslashes($_POST["password2"]);

	if(password_verify($oldpassword,$_SESSION['data']['password'])){
	if($password!==$password2){
	header("location:change_password.php?mismatch");
	}
	else{
	$hashpassword=password_hash($password, PASSWORD_DEFAULT);
	$userid=$_SESSION["data"]["user_id"];
	$time=time();
	$stmt =$conn->prepare("UPDATE users SET password=? WHERE user_id=?");
	$stmt->bind_param("si",$hashpassword,$userid);
	$exec=$stmt->execute();
	if($exec){
		session_unset();
		unset($_SESSION['data']);
		session_destroy();
		header('Location:../signin.php?successful');
		exit();
	}
	
	else{
		header("Location: achange_password.php?err");
	}
  }
}
else{
	header("Location: change_password.php?err-old");
  }
}

if(isset($_POST['reset_pass'])){

$email=addslashes($_POST['email']);
$sql="SELECT * from users where email='$email'";
$res=$conn->query($sql);
if($res->num_rows==0){
header("location:../forgot-password.php?unavailable");
}
else{
$randnum=rand(14000,7800000);
$token=md5($randnum);
$query="UPDATE users SET verification_token='$token' where email='$email'";
if($conn->query($query)){
$subject = "Password Reset ";

$message =  "
        <html>
        <head>
        
        </head>
        <body>      
          
          <p>Hi,Click the link below to reset your password.</p>
          
          <p>Click<a href='https://niamanga.com/new-password.php?token=$token'> here </a></p>
          <p>Regards,<br>Niamnaga Limited</p>
        </body>
        </html>
        ";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: '.$from. "\r\n";


$mail_res=mail($email,$subject,$message,$headers);
if($mail_res){
header("location:../forgot-password.php?successful");

}
else{

header("location:../forgot-password.php?err-mail");


}

}
else{
header("location:../forgot-password.php?err-db");
}


}
}

if(isset($_POST["submit_new_pass"])){
	$password = addslashes($_POST["password"]);
	$password2 = addslashes($_POST["password2"]);

	
	if($password!==$password2){
	header("location:../new-password.php?mismatch");
	}
	else{
	$hashpassword=password_hash($password, PASSWORD_DEFAULT);
	$token=$_GET['token'];
	$stmt =$conn->prepare("UPDATE users SET password=? WHERE verification_token=?");
	$stmt->bind_param("ss",$hashpassword,$token);
	$exec=$stmt->execute();
	if($exec){
		header("Location: ../new-password.php?successful");
		exit();
	}
	
	else{
		header("Location: ../new-password.php?err");
	}
  }
}

?>

