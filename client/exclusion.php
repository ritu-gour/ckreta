
<?php
session_start();
if (isset($_SESSION['adm_id'])) {
} else {
 
    header("location:../index.php");
}

$USER= $_SESSION['adm_id'];
$admin_usrnm= $_SESSION['admin_usrnm'];

?>


<?php
require("../conn/config.php");

//---update----
if ((isset($_POST['update']))) {
    $exclusion =$_POST['exclusion'];
   
   $query = "UPDATE exclusion_tab SET exclusion='$exclusion' where user_id='$USER'";
   $fire = mysqli_query($conn, $query) or die("can not." . mysqli_error($conn));

   if ($fire) {
    //    header("location:Terms_&_Conditions.php");
       //echo"succe";
?>

<?php
   } else {
      
        //header("location:view_user.php");
   }
}

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

                    <h1 class="set1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; EXCLUSION DATA</h1>
                    <p class="set my-2">Set Exclusion Data</p>
                    <form id="regForm1"  action="" method="post">
                        <h2></h2>
                       
                                <br>
                              
                              


                            
   
                 

                    <?php
                  include '../conn/config.php';
                    $query = "SELECT * FROM exclusion_tab where user_id='$USER'";

                    $fire = mysqli_query($conn, $query);

                    while ($user = mysqli_fetch_assoc($fire)) {
                    ?>

                    <form name="signup" id="signup" action="#" method="POST">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                <label id="dynamic_field" class="b">EXCLUSION: <span style="color:red">*</span></label>
                                    

                                        <!-- <input value=""type="text"  id="exampleFormControlTextarea1" class="form-control" name="Know_Book" id="" style="height: 100px;" >  -->
                                        <textarea name="exclusion" rows="10"  class="form-control">
                                         <?php echo $user['exclusion'] ?>
                                        </textarea>

                                  
                              
                       

                            



                        <div class="d-grid gap-2 my-4">

                            <button type="submit" name="update" class="btn btn-primary btn-lg btn-block" style="color: white;">UPDATE</button>
                        </div>

                </div>
                </form>

                <?php
                    } //end while loop
                    ?>

            </div>



















                                
                   



                                                    
                       
                
                   





                  
                        </div>

                    </div>







                   
                </div>
            </div>

        </section>

    </section>

    <!--main content end-->
</section>
<?php include '../include/footer.php' ?>



