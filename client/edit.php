
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
    $query = "SELECT * FROM add_clients where user_id=$user_id";
    $fire = mysqli_query($conn, $query) or die("can not database." . mysqli_error($conn));
    $row = mysqli_fetch_assoc($fire);
}
//---update----
if ((isset($_POST['update1']))) {
    $client_name = $_POST['client_name'];
    $client_phone = $_POST['client_phone'];    
    $client_email = $_POST['client_email'];     
    $date_from = $_POST['date_from'];
    $date_to = $_POST['date_to']; 
    $place_from =$_POST['place_from'];
    $adult = $_POST['adult'];
    $child = $_POST['child'];
    $price = $_POST['price'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $city_n = $_POST['city_n'];
    $query = "UPDATE `add_clients` SET client_name='$client_name', client_phone='$client_phone',client_email='$client_email',date_from='$date_from',
    date_to='$date_to',place_from ='$place_from ',adult='$adult',child='$child',price='$price',price='$price',country='$country',state='$state',city_n='$city_n' where user_id=$user_id";
    $fire = mysqli_query($conn, $query) or die("can not." . mysqli_error($conn));

    if ($fire){

        echo '<script type="text/javascript">';
        echo 'alert(" Successful Updated");';
        echo 'window.location = "edit_from.php";';
        echo '</script>';
      } else {
        echo '<script type="text/javascript">';
        echo 'alert(" please try again!");';
      
         echo 'window.location ="edit.php";';
      
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
<body>

    <?php include '../include/side.php' ?>
    <section id="container">
        <section id="main-content">
            <section class="wrapper">
                <div class="panel-body ">

                    
                    <form id="regForm1"  action="" method="post">
                    <h2 class="text-center"><b>Edit Client</b></h2>
                       <br>
                                <div class="row my-2 ">
                                    <div class="col-6">
                                    <label>Name</label><br>
                                     <input value="<?php echo $row['client_name'] ?>" type="text" 
                                     name="client_name" placeholder="Name">

                                    </div>
                                    <div class="col-6">
                                    <label>Phone</label><br>
                                      <input value="<?php echo $row['client_phone'] ?>" type="text" 
                                      name="client_phone" placeholder="Phone">
                                    </div>
                                   
                                   
                                </div>
                                <br>
                                <div class="row">
                                <div class="col-6">
                                    <label>Email</label><br>
                                      <input value="<?php echo $row['client_email'] ?>" type="text" 
                                      name="client_email" placeholder="Email">
                                    </div>
                                    <div class="col-6">
                                    <label>Place</label><br>
                                     <input value="<?php echo $row['place_from'] ?>" type="text"
                                      name="place_from" placeholder="Place">

                                        </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-6">
                                    <label>From Date</label><br>
                                     <input value="<?php echo $row['date_from'] ?>"
                                      type="text" name="date_from" placeholder="Date">
                                    </div>
                                    <div class="col-6">
                                    <label>To Date</label><br>
                                     <input value="<?php echo $row['date_to'] ?>" type="text"
                                      name="date_to" placeholder="Date">

                                        </div>
                                </div>
                                <br>
                            
                                <div class="row">
                                    <div class="col-6">
                                    <label>Adult</label><br>
                                <input value="<?php echo $row['adult'] ?>" type="text"
                                 name="adult" placeholder="Adult">
                                    </div>
                                    <div class="col-6">
                                    <label>Child</label><br>
                                     <input value="<?php echo $row['child'] ?>" type="text" 
                                     name="child" placeholder="Child">

                                        </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-6">
                                    <label>Price</label><br>
                                <input value="<?php echo $row['price'] ?>" type="text"
                                 name="price" placeholder="Price">
                                    </div>
                                    <div class="col-6">
                                    <label>Country</label><br>
                                <input value="<?php echo $row['country'] ?>" type="text"
                                 name="country" placeholder="Country">
                                    </div>
                                  
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-6">
                                    <label>State</label><br>
                                <input value="<?php echo $row['state'] ?>" type="text" 
                                name="state" placeholder="State">
                                    </div>
                                    <div class="col-6">
                                    <label>City</label><br>
                                <input value="<?php echo $row['city_n'] ?>" type="text"
                                 name="city_n" placeholder="City">
                                    </div>
                                  
                                </div>
                                                    
                         <br>
                      
                        <button type="submit" name="update1" class="btn btn-primary btn-lg btn-block" style="color: white;">Update</button>
                      
                    </form>
                   







                   
                </div>
            </div>

        </section>

    </section>

    <!--main content end-->
</section>
<?php include '../include/footer.php' ?>

