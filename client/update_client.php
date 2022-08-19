
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
    $place_from  = $_POST['place_from'];
    $adult = $_POST['adult'];   
    $child = $_POST['child'];
    $price = $_POST['price'];
    $country=$_POST['country'];
    $state=$_POST['state'];
    $city_n=$_POST['city_n'];
    $flight_detail=$_POST['flight_detail'];
    $hotel_detail=$_POST['hotel_detail'];
    $travel_insur=$_POST['travel_insur'];
    $visa=$_POST['visa'];
    $transfer=$_POST['transfer'];
    $client_date=$_POST['client_date'];

    $query = "UPDATE `add_clients` SET client_name='$client_name',client_phone='$client_phone',client_email='$client_email',date_from='$date_from',
    date_to='$date_to',place_from='$place_from',adult='$adult',child='$child',price='$price',
    country='$country',state='$state',city_n='$city_n',flight_detail='$flight_detail'
    ,hotel_detail='$hotel_detail',travel_insur='$travel_insur',visa='$visa',transfer='$transfer',client_date='$client_date' where user_id=$user_id";
    $fire = mysqli_query($conn, $query) or die("can not." . mysqli_error($conn));

    if ($fire){

        echo '<script type="text/javascript">';
        echo 'alert(" Successful Updated");';
        echo 'window.location = "view_client.php";';
        echo '</script>';
      } else {
        echo '<script type="text/javascript">';
        echo 'alert(" please try again!");';
      
         echo 'window.location ="addclient.php";';
      
        echo '</script>';
       
      } 
    
    // header("location:userlist.php");
    
}

?>
<style>
h3,
.h3 {
    margin-top: 0px;
    margin-bottom: 20px !important;
}

.table-responsive {
    min-height: .01%;
    overflow-x: auto;
    padding: 30px !important;
}

@media screen and (max-width: 767px) {
    .table-responsive {
        width: 100%;
        margin-bottom: 15px !important;
        overflow-y: hidden;
        -ms-overflow-style: -ms-autohiding-scrollbar;
        border: 1px solid #ddd;
        padding: 10px;
    }
}

.scroll {
    max-height: 300px;
    overflow-y: auto;
}

b.a1 {
    /* text-transform: uppercase; */
    text-transform: capitalize;
}

@media (max-width: 640px) {
    h3.cll {
        margin-left: 10px !important;
        color: #0e79a5;
    }
}

h3.cll {
    margin-left: 40px;
    color: #0e79a5;
    padding: 15px 0px 0px 0px;
}

input {
    border: none;
    /* background-color: #ececec; */
    color: black !important;
}
</style>
<?php include '../include/header.php' ?>
<?php include '../include/side.php' ?>
<section id="container">

    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="table-agile-info">
                <div class="panel panel-default">
                    <div class="" style="background-color: #ddede0;">

                        <div class="row">
                            <div class="col-md-8 my-4">
                                <h3 class="my-2 cll"><b>Updating</b> &nbsp;<b
                                        class="a1 "><?php echo $row['client_name'] ?>,&nbsp;
                                        #<?php echo $row['trip_id'] ?></b>
                            </div>
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-3 my-4">

                            </div>
                        </div>


                    </div>
                    <form name="signup" id="signup" action="#" method="POST">


                        <div class="scroll">
                            <div class="table-responsive  cla shadow bg-light ">
                                <!-- <h1 class="text-center my-3"><b>View All Clients</b></h1> -->
                                <table class="table table-bordered table-striped ">
                                    <h3><b>TOUR DETAILS</b></h3>
                                    <tbody>
                                        <tr>


                                            <td><b>Name&nbsp; -</b>&nbsp;<input
                                                    value="<?php echo $row['client_name'] ?>" name="client_name"
                                                    type="text"></td>
                                            <td><b>Phone&nbsp; -</b>&nbsp; <input
                                                    value="<?php echo $row['client_phone'] ?>" name="client_phone"
                                                    type="text"></td>

                                        </tr>


                                        <tr>


                                            <td><b style="color: black;">Email&nbsp; -</b>&nbsp;
                                                <input value="<?php echo $row['client_email'] ?>" name="client_email"
                                                    type="email">
                                            </td>
                                            <td><b style="color: black;">Place&nbsp; -</b>&nbsp;
                                                <input value="<?php echo $row['place_from'] ?>" name="place_from"
                                                    type="text">
                                            </td>

                                        </tr>
                                        <tr>
                                            <!-- <th scope="row"></th> -->

                                            <td><b>From &nbsp; -</b>&nbsp; <input
                                                    value="<?php echo $row['date_from'] ?>" name="date_from"
                                                    type="text"></td>
                                            <td><b>Upto &nbsp; -</b>&nbsp; <input value="<?php echo $row['date_to'] ?>"
                                                    name="date_to" type="text"></td>

                                        </tr>
                                        <tr>


                                            <td><b style="color: black;">Adult&nbsp; -</b>&nbsp;
                                                <input value="<?php echo $row['adult'] ?>" name="adult" type="text">
                                            </td>
                                            <td><b style="color: black;">Child&nbsp; -</b>&nbsp;
                                                <input value="<?php echo $row['child'] ?>" name="child" type="text">
                                            </td>

                                        </tr>



                                        <tr>
                                            <!-- <th scope="row"></th> -->

                                            <td><b>Price &nbsp; -</b>&nbsp; <input
                                                    value="<?php echo $row['price'] ?>" name="price"
                                                    type="text"></td>
                                            <td><b>Country &nbsp; -</b>&nbsp; <input value="<?php echo $row['country'] ?>"
                                                    name="country" type="text"></td>

                                        </tr>
                                        <tr>


                                            <td><b style="color: black;">State&nbsp; -</b>&nbsp;
                                                <input value="<?php echo $row['state'] ?>" name="state" type="text">
                                            </td>
                                            <td><b style="color: black;">City&nbsp; -</b>&nbsp;
                                                <input value="<?php echo $row['city_n'] ?>" name="city_n" type="text">
                                            </td>

                                        </tr>
                                        <tr>
                                            <!-- <th scope="row"></th> -->

                                            <td><b>Visa &nbsp; -</b>&nbsp; <input
                                                    value="<?php echo $row['visa'] ?>" name="visa"
                                                    type="text"></td>
                                            <td><b>Client Date &nbsp; -</b>&nbsp; <input value="<?php echo $row['client_date'] ?>"
                                                    name="client_date" type="text"></td>

                                        </tr>
                                              

                                    </tbody>
                                </table>    
                                <table class="table table-bordered table-striped">
                                    
                                    <tbody>
                                        <tr>
                                            <td><b>Flight Details &nbsp; -</b>&nbsp; <input
                                                    value="<?php echo $row['flight_detail'] ?>" name="flight_detail"
                                                    type="text"></td>

                                        </tr>
                                        <tr>
                                            <td><b>Hotels Details &nbsp; -</b>&nbsp; <input
                                                    value="<?php echo $row['hotel_detail'] ?>" name="hotel_detail"
                                                    type="text"></td>

                                        </tr>
                                        <tr>
                                            <td><b>Travel Insurance &nbsp; -</b>&nbsp; <input
                                                    value="<?php echo $row['travel_insur'] ?>" name="travel_insur"
                                                    type="text"></td>

                                        </tr>
                                        <tr>
                                            <td><b>Transfer &nbsp; -</b>&nbsp; <input
                                                    value="<?php echo $row['transfer'] ?>" name="transfer"
                                                    type="text"></td>

                                        </tr>
                                       </tbody>
                                </table>
                              


                            </div>
                                            </div>
                        </div>
                        <div class="d-flex justify-content-evenly">
                        <div class="d-grid gap-2 my-">

                            <button type="submit" name="update1" class="btn  btn-md " style="background-color: #0e79a5; color:white;width:300px;">UPDATE</button>
        
                       </div>
                </div>
            </div>
            </form>

            </div>
            </div>

        </section>

    </section>

    <!--main content end-->
</section>
<?php include '../include/footer.php' ?>