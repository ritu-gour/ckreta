<?php 
session_start(); 
include "conn/config.php";

if (isset($_POST['admin_mail']) && isset($_POST['admin_pass'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$admin_mail = validate($_POST['admin_mail']);
	$pass = validate($_POST['admin_pass']);

	if (empty($admin_mail)) {
		header("Location: index.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
		// hashing the password
        $pass = md5($pass);

        
		$sql = "SELECT * FROM admin_login WHERE admin_mail='$admin_mail' AND admin_pass='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['admin_mail'] === $admin_mail && $row['admin_pass'] === $pass) {
            	$_SESSION['admin_mail'] = $row['admin_mail'];
            	$_SESSION['admin_usrnm'] = $row['admin_usrnm'];
            	$_SESSION['adm_id'] = $row['adm_id'];
            	header("Location: client/dashboard.php");
		        exit();
            }else{
				header("Location: index.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: index.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}