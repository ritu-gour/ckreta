
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
if ((isset($_GET['upd']))) {
    $user_id   = $_GET['upd'];
    $query = "SELECT * FROM itinerary_tab where user_id=$user_id ";
    $fire = mysqli_query($conn, $query) or die("can not database." . mysqli_error($conn));
    $row = mysqli_fetch_assoc($fire);
}
//---update----
if ((isset($_POST['itiupdate']))) {
    
    $country_itin = $_POST['country_itin'];
    $state_itin = $_POST['state_itin'];
    $city_nn = $_POST['city_nn'];
    $days = $_POST['days'];

    

    $query = "UPDATE `itinerary_tab` SET country_itin='$country_itin',state_itin='$state_itin',
    city_nn='$city_nn',days='$days' where user_id =$user_id";
    $fire = mysqli_query($conn, $query) or die("can not." . mysqli_error($conn));

    if ($fire){

        echo '<script type="text/javascript">';
        echo 'alert(" Successful Updated");';
        echo 'window.location = "itinerary.php";';
        echo '</script>';
      } else {
        echo '<script type="text/javascript">';
        echo 'alert(" please try again!");';
      
         echo 'window.location ="itinerary.php";';
      
        echo '</script>';
       
      } 
    
    // header("location:userlist.php");
    
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
<style>
    @media screen and (max-width: 600px){
    h1.set1 {
    margin-left: -130px !important;
    font-size: 40px;
    font-weight: bold;
    letter-spacing: 3px;
}
    }
</style>
<body>

    <?php include '../include/side.php' ?>
    <section id="container">
        <section id="main-content">
            <section class="wrapper">
                <div class="panel-body ">

                    <h1 class="set1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ITINERARY DATA</h1>
                    <p class="set my-2">Set itinerary Data</p>
                    <form id="regForm1"  action="" method="post">
                        <h2></h2>
                       <div class="row">
                           <div class="col-sm-4">
                           <label>Country</label><br>
                                     <input value="<?php echo $row['country_itin'] ?>" type="text" name="country_itin"	 placeholder="Flight Name">


                           </div>
                           <div class="col-sm-4">
                           <label>State</label><br>
                                     <input value="<?php echo $row['state_itin'] ?>" type="text" name="state_itin" placeholder="Flight Name">

                           </div>
                           <div class="col-sm-4">
                           <label>City</label><br>
                                     <input value="<?php echo $row['city_nn'] ?>" type="text" name="city_nn" placeholder="Flight Name">

                           </div>
                       </div>
                                <br>
                              
                              
                                
                        <div class="row my-3">
                                    <div class="col-md-12">
                                    <label id="dynamic_field" class="b">Day: <span style="color:red">*</span></label>
                           <textarea value="<?php echo $row['days'] ?>" placeholder="day" class="form-control" 
                           name="days" rows="10"
                                required><?php echo $row['days'] ?></textarea>

                                    </div>
                                   
                                </div>
                           
                         <br>
                      
                        <button type="submit" name="itiupdate" class="btn btn-primary btn-lg btn-block" style="color: white;">Update</button>
                      
                    </form>
                  
                </div>
            </div>

        </section>

    </section>

    <!--main content end-->
</section>
<?php include '../include/footer.php' ?>



