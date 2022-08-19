<?php 
session_start();

if (isset($_SESSION['adm_id']) && isset($_SESSION['admin_mail'])) {

 ?>

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="add.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
<script src="script.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="icon" href="image/micro-technologies-logo-120x120.png" type="image/icon type" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../css/setting.css">
<link rel="stylesheet" href="../css/main.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&family=Raleway:wght@300;500&family=Red+Hat+Display:wght@300&family=Red+Hat+Text:ital,wght@0,400;1,300&display=swap" rel="stylesheet">
<body>

    <?php include '../include/side.php' ?>
    <section id="container">
        <section id="main-content">
            <section class="wrapper">
                <div class="panel-body ">

                    <h1 class="set1">RESET LOGIN</h1>
                    <p class="set my-2">Change Login Credentials</p>
                    <form id="regForm1"  action="change-p.php" method="post">
                        <h2></h2>
                        <?php if (isset($_GET['error'])) { ?>
                        <p class="error"><?php echo $_GET['error']; ?></p>
                        <?php } ?>

                        <?php if (isset($_GET['success'])) { ?>
                        <p class="success" style="color: green;"><?php echo $_GET['success']; ?></p>
                        <?php } ?>

                        <label>Old Password</label>
                        <input type="password" name="op" placeholder="Old Password">
                        <br>
                        <br>

                        <label>New Password</label>
                        <input type="password" name="np" placeholder="New Password">
                        <br>
                        <br>

                        <label>Confirm New Password</label>
                        <input type="password" name="c_np" placeholder="Confirm New Password">
                        <br>
                        <br>


                        <button type="submit" style="color: white;">CHANGE</button>
                        <!-- <a href="dashboard.php" class="ca">HOME</a> -->
                    </form>


                </div>
                </div>


            </section>

        </section>

        <!--main content end-->
    </section>
    <?php include '../include/footer.php' ?>
    <?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>