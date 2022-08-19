<?php 
session_start();

if (isset($_SESSION['adm_id']) && isset($_SESSION['admin_mail'])) {

    include "../conn/config.php";

if (isset($_POST['op']) && isset($_POST['np'])
    && isset($_POST['c_np'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$op = validate($_POST['op']);
	$np = validate($_POST['np']);
	$c_np = validate($_POST['c_np']);
    
    if(empty($op)){
      header("Location: change-password1.php?error=Old Password is required");
	  exit();
    }else if(empty($np)){
      header("Location: change-password1.php?error=New Password is required");
	  exit();
    }else if($np !== $c_np){
      header("Location: change-password1.php?error=The confirmation password  does not match");
	  exit();
    }else {
    	$op = md5($op);
    	$np = md5($np);
        $adm_id = $_SESSION['adm_id'];
        $sql = "SELECT admin_pass
                FROM admin_login WHERE 
                adm_id='$adm_id' AND admin_pass='$op'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) === 1){        	
        	$sql_2 = "UPDATE admin_login
        	          SET admin_pass='$np'
        	          WHERE adm_id='$adm_id'";
        	mysqli_query($conn, $sql_2);
        	header("Location: change-password1.php?success=Your password has been changed successfully");
	        exit();
        }else {
        	header("Location: change-password1.php?error=Incorrect password");
	        exit();
        }
    }   
}else{
	header("Location: change-password1.php");
	exit();
}
}else{
     header("Location: index.php");
     exit();
}