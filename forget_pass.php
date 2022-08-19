<?php 
include('./forgetpassfile/connection.php');

$message = $link = '';
if(isset($_POST['submit'])) {
	$adm_id = $_POST['admin_mail'];
	$query = "SELECT * FROM `admin_login` WHERE admin_mail = '".$adm_id."'";
	$result = $conn->query($query);
if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		$adm_id = $row['adm_id'];
		$id_encode = base64_encode($adm_id);
		$link = "<a href='Reset_pass.php?forg=$id_encode' class='btn btn-info btn-sm'>Recieve password</a>";
	}
	}else{
		$message = "<div class='alert alert-danger'>Invalid pass..!!</div>";
	}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Forget Password</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<style>
	.cl{
	margin-top: 200px;
	}
</style>
</head>
<body  class="bg-secondary">
		<div class="container w-50 cl">
			<form class="bg-light p-5 shadow-lg" method="post">
				<?php echo $message; ?>
				<h1 class="text-success">Email Check</h1>
				<label for="admin_mail">Email</label>
				<input type="email" name="admin_mail" placeholder="Enter Email" class="form-control form-control-sm" required><br>
				<button type="submit" name="submit" class="btn btn-success btn-sm">Reset Password</button>
				<?php echo $link; ?>
			</form>
		</div>
</body>
</html>
