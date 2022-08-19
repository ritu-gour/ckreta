
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
    $user_id = $_GET['upd'];
    $query = "SELECT * FROM flights where user_id=$user_id";
    $fire = mysqli_query($conn, $query) or die("can not database." . mysqli_error($conn));
    $row = mysqli_fetch_assoc($fire);
}
//---update----
if ((isset($_POST['flitupdate']))) {
    
    $flight_name = $_POST['flight_name'];
    $flight_from = $_POST['flight_from'];
    $flight_to = $_POST['flight_to'];
    $layover = $_POST['layover'];
    $departure = $_POST['departure'];
    $arrival = $_POST['arrival'];
    $flight_duration = $_POST['flight_duration'];

    $query = "UPDATE `flights` SET flight_name='$flight_name',flight_from='$flight_from',
    flight_to='$flight_to',layover='$layover',departure='$departure',arrival='$arrival',flight_duration='$flight_duration' where user_id=$user_id";
    $fire = mysqli_query($conn, $query) or die("can not." . mysqli_error($conn));

    if ($fire){

        echo '<script type="text/javascript">';
        echo 'alert(" Successful Updated");';
        echo 'window.location = "flight.php";';
        echo '</script>';
      } else {
        echo '<script type="text/javascript">';
        echo 'alert(" please try again!");';
      
         echo 'window.location ="flight.php";';
      
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
#regForm1 {
    box-shadow: 0px 0px 26px 0px rgb(0 0 0 / 18%) !important;
    padding: 40px !important;
    /* text-align: center; */
    background-color: #ffffff !important;
    border-radius: 10px;
    width: 23rem;
    margin-left: -27px !important;
}
.btn-block {
    display: block;
    width: 93% !important;
    margin-left: 20px;
    margin-top: 2px;
}

.btn-success {
    color: #fff;
    background-color: #5cb85c;
    border-color: #4cae4c;
    width: 90px;
}
.form-inline {
    margin-left: 10px !important;
    width: 200px;
}
.pagination {
    display: inline-block;
    padding-left: 10px;
    margin: 20px 0;
    border-radius: 4px;
}

  }
</style>
<body>

    <?php include '../include/side.php' ?>
    <section id="container">
        <section id="main-content">
            <section class="wrapper">
                <div class="panel-body ">

                    <h1 class="set1">FLIGHT DATA</h1>
                    <p class="set my-2">Set Flight Data</p>
                    <form id="regForm1"  action="" method="post">
                        <h2></h2>
                       
                                <div class="row">
                                    <div class="col-6">
                                    <label>Flight Name</label><br>
                                     <input value="<?php echo $row['flight_name'] ?>" type="text" name="flight_name" placeholder="Flight Name">

                                    </div>
                                    <div class="col-6">
                                    <label>Layover</label><br>
                                      <input value="<?php echo $row['layover'] ?>" type="text" name="layover" placeholder="Layover">
                                    </div>
                                   
                                </div>
                                <br>
                              
                                <div class="row">
                                    <div class="col-6">
                                    <label>Flight From</label><br>
                                     <input value="<?php echo $row['flight_from'] ?>" type="text" name="flight_from" placeholder="Flight From">
                                    </div>
                                    <div class="col-6">
                                    <label>Flight To</label><br>
                                     <input value="<?php echo $row['flight_to'] ?>" type="text" name="flight_to" placeholder="Flight To">

                                        </div>
                                </div>
                                <br>
                            
                                <div class="row">
                                    <div class="col-6">
                                    <label>Departure</label><br>
                                <input value="<?php echo $row['departure'] ?>" type="text" name="departure" placeholder="Departure">
                                    </div>
                                    <div class="col-6">
                                    <label>Arrival</label><br>
                                     <input value="<?php echo $row['arrival'] ?>" type="text" name="arrival" placeholder="Arrival">

                                        </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-12">
                                    <label>Flight Duration</label><br>
                                <input value="<?php echo $row['flight_duration'] ?>" type="text" name="flight_duration" placeholder="Duration">
                                    </div>
                                  
                                </div>
                                                    
                         <br>
                      
                        <button type="submit" name="flitupdate" class="btn btn-primary btn-lg btn-block" style="color: white;">Update</button>
                      
                    </form>
                   







                   
                </div>
            </div>

        </section>

    </section>

    <!--main content end-->
</section>
<?php include '../include/footer.php' ?>

