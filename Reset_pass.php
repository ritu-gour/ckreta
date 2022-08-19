<?php include('forgetpassfile/connection.php');
session_start();
$adm_id = $_GET['forg'];
$message = $Home = '';
$_SESSION['user'] = $adm_id;
if ($_SESSION['user'] == '') {
		header("location:forget_pass.php");
}
else
{
if(isset($_POST['submit'])) {
	$admin_pass = $_POST['admin_pass'];
	$Repassword = $_POST['Repassword'];

	if ($admin_pass !== $Repassword) {
		$message = "<div class='alert alert-danger'>Password Not Match..!!</div>";
	}
	else{
	$id_decode = base64_decode($adm_id);
	$query = "UPDATE admin_login SET admin_pass ='$admin_pass' WHERE adm_id = '$id_decode' ";
	$result = $conn->query($query);
		if($result){
			$message = "<div class='alert alert-success'>Reset Your Password Successfully..</div>";
			$Home = "<a href='index.php' class='btn btn-success btn-sm'>Login</a>";
	}else{
		$message = "<div class='alert alert-danger'>Failed to Reset Password..!!</div>";
	}
	}
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>forget Password</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<style>
	.cls{
	margin-top: 170px;
	}
</style>
</head>
<body class="bg-secondary">
		<div class="container w-50 mt-5 ">
			<form class="bg-light p-5 shadow-lg cls" method="post">
				<?php echo $message; ?>
				<h1 class="text-success">Forget Password</h1>
				<label for="password">Password</label>
				<input type="text" name="admin_pass" placeholder="Password" class="form-control form-control-sm" required><br>
				<label for="password">Retype Password</label>
				<input type="text" name="Repassword" placeholder="Retype Password" class="form-control form-control-sm" required><br>
				<button type="submit" name="submit" class="btn btn-success btn-sm">Reset Password</button> <?php echo $Home; ?>
			</form>
		</div>
</body>
</html>
