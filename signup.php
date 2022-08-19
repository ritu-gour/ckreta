<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="signup-check.php" method="post">
     	<h2>SIGN UP</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

          <label>Name</label>
          <?php if (isset($_GET['admin_usrnm'])) { ?>
               <input type="text" 
                      name="admin_usrnm" 
                      placeholder="Name"
                      value="<?php echo $_GET['admin_usrnm']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="admin_usrnm" 
                      placeholder="Name"><br>
          <?php }?>

          <label>User Name</label>
          <?php if (isset($_GET['admin_mail'])) { ?>
               <input type="text" 
                      name="admin_mail" 
                      placeholder="User admin_mail"
                      value="<?php echo $_GET['admin_mail']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="admin_mail" 
                      placeholder="User admin_mail"><br>
          <?php }?>


     	<label>Password</label>
     	<input type="password" 
                 name="admin_pass" 
                 placeholder="Password"><br>

          <label>Re Password</label>
          <input type="password" 
                 name="re_admin_pass" 
                 placeholder="Re_Password"><br>

     	<button type="submit">Sign Up</button>
          <a href="index.php" class="ca">Already have an account?</a>
     </form>
</body>
</html>