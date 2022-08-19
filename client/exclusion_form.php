
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

include('../conn/config.php');
// $message ='';
if (isset($_POST['submitbte'])) {
   $exclusin =$_POST['exclusin'];


    $sql = "INSERT INTO `tblexclusion`(`exclusin`) 
    VALUES ('$exclusin')";
     $run = mysqli_query($conn, $sql) or die("con not insert the data.".mysqli_error($conn));
     if($run)
     {

       echo '<script type="text/javascript">';
       echo 'alert("Successful ");';
       echo 'window.location = "itinerary_show.php";';
       echo '</script>';
     } else {
       echo '<script type="text/javascript">';
       echo 'alert(" please try again!");';
     
        echo 'window.location ="exclusion_form.php.php";';
     
       echo '</script>';
      
     }
     
       // header("location: userlist.php") ;
  
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
                              
                              
                                
                        <div class="row my-3">
                                    <div class="col-md-12">
                                    <label id="dynamic_field" class="b">EXCLUSION: <span style="color:red">*</span></label>
                                    <?php

                                    include('../conn/config.php');

                                        $query = "SELECT * FROM exclusion_tab ";
                                        $rs_result = mysqli_query($conn, $query);
                                    if (mysqli_num_rows($rs_result) > 0) {
                                    
                                        while ($row = mysqli_fetch_assoc($rs_result)){
                                        
                                            ?>
                                    <textarea placeholder="Exclusion..." class="form-control" name="exclusin" rows="7"
                             required><?php echo $row['exclusion']?></textarea>
                                <?php 
                                          }
                                         }
                                      ?>
                                    </div>
                                   
                                </div>                            
                         <br>
                      
                        <button type="submit" name="submitbte" class="btn btn-primary btn-lg btn-block" style="color: white;">Add</button>
                      
                    </form>
                   





                  
             </div>
            </div>

        </section>

    </section>

    <!--main content end-->
</section>
<?php include '../include/footer.php' ?>



