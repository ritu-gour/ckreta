
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
   $itinray_day =$_POST['itinray_day'];
   $trip_id=$_POST['trip_id'];

   $query = mysqli_query($conn,"SELECT * FROM itinry_day WHERE trip_id='$trip_id'");
   if(mysqli_num_rows($query)>0){
       echo '<script type="text/javascript">';
       
       echo 'alert("Trip Id Already Use");';
      
       echo '</script>';
       
   }
   else{
    $sql = "INSERT INTO `itinry_day`(`itinray_day`,`trip_id`) 
    VALUES ('$itinray_day','$trip_id')";
     $run = mysqli_query($conn, $sql) or die("con not insert the data.".mysqli_error($conn));
     if($run)
     {

       echo '<script type="text/javascript">';
       echo 'alert("Successful ");';
       echo 'window.location = "view_client.php";';
       echo '</script>';
     } else {
       echo '<script type="text/javascript">';
       echo 'alert(" Please Try Again!");';
     
        echo 'window.location ="itinerary_day.php";';
     
       echo '</script>';
      
     }
     
       // header("location: userlist.php") ;
  
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

                    <!-- <h1 class="set1">DAYS DATA</h1>
                    <p class="set my-2">&nbsp;&nbsp; Set Days Data</p> -->
                    <form id="regForm1"  action="" method="post">
                        <h2>NEW CLIENT</h2>
                       
                                <br>
                                <div class="row">
                                <div class="col-md-12">
                                    ID
                                <select style="font-size: 18px;" class="form-select form-select-lg mb-3 " name="trip_id"
                                      aria-label=".form-select-lg example">
                                      <option selected>Select Id</option>
                                      <?php

                                      include('../conn/config.php');
                                      
                                          $query = "SELECT * FROM add_clients ";
                                          $rs_result = mysqli_query($conn, $query);
                                         if (mysqli_num_rows($rs_result) > 0) {
                                       
                                          while ($row = mysqli_fetch_assoc($rs_result)){
                                          
                                              ?>

                                      <option style="font-size:18px;" value="<?php echo $row['trip_id']?> 
                                      "><?php echo $row['trip_id']?></option>
                                      <?php 
                                          }
                                         }
                                      ?>
                                  </select>
                            </div>
                                </div>
                                 <div class="row my-3">
                                     
                                    <div class="col-md-12">
                                  
                                    <?php
                                    
                                    include('../conn/config.php');
                                      
                                        $user_id=$_GET['upd'];                                            
                                        $query = "SELECT * FROM itinerary_tab where user_id='$user_id'";
                                        $rs_result = mysqli_query($conn, $query);
                                    if (mysqli_num_rows($rs_result) > 0) {
                                    
                                        while ($row = mysqli_fetch_array($rs_result)){
                                        
                                            ?>
                                            <!-- <h5><?php echo $row['city_n'] ?></h5> -->
                                            <label id="dynamic_field" class="b">Days: <span style="color:red">*</span></label>
                                            <textarea placeholder="day..." class="form-control" name="itinray_day" rows="7"
                                            required> <?php 
                                            echo $row['days']; 
                                            
                                   
                            
                                   ?></textarea>
                                <?php 
                                          }
                                         }
                                      ?>
                                    </div>
                                   
                                </div>


                       



                                                    
                         <br>
                      
                        <button type="submit" name="submitbte" class="btn btn-primary btn-lg btn-block style="color: white;">Add</button>
                      
                    </form>
                   





                  
             </div>
            </div>

        </section>

    </section>

    <!--main content end-->
</section>
<?php include '../include/footer.php' ?>



