<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['admin_mail']) && isset($_POST['admin_pass'])
    && isset($_POST['admin_usrnm']) && isset($_POST['re_admin_pass'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$admin_mail = validate($_POST['admin_mail']);
	$pass = validate($_POST['admin_pass']);

	$re_pass = validate($_POST['re_admin_pass']);
	$admin_usrnm = validate($_POST['admin_usrnm']);

	$user_data = 'admin_mail='. $admin_mail. '&admin_usrnm='. $admin_usrnm;


	if (empty($admin_mail)) {
		header("Location: signup.php?error=User Name is required&$user_data");
	    exit();
	}else if(empty($pass)){
        header("Location: signup.php?error=admin_pass is required&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: signup.php?error=Re admin_pass is required&$user_data");
	    exit();
	}

	else if(empty($admin_usrnm)){
        header("Location: signup.php?error=Name is required&$user_data");
	    exit();
	}

	else if($pass !== $re_pass){
        header("Location: signup.php?error=The confirmation password  does not match&$user_data");
	    exit();
	}

	else{

		// hashing the password
        $pass = md5($pass);

	    $sql = "SELECT * FROM  admin_login WHERE admin_mail='$admin_mail' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: signup.php?error=The username is taken try another&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO  admin_login(admin_mail, admin_pass, admin_usrnm) 
		   VALUES('$admin_mail', '$pass', '$admin_usrnm')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: signup.php?success=Your account has been created successfully");
	         exit();
           }else {
	           	header("Location: signup.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: signup.php");
	exit();
}