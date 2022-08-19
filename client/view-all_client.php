
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
error_reporting(0);
include '../conn/config.php';

if ((isset($_GET['del']))) {
  $user_id = $_GET['del'];
  $query = "DELETE FROM add_clients where user_id=$user_id";
  $fire = mysqli_query($conn, $query) or die("can not data." . mysqli_error($conn));
  if ($fire) {

    echo '<script type="text/javascript">';
    echo 'alert(" Successful Deleted");';
    echo 'window.location = "view_client.php";';
    echo '</script>';
  } else {
    echo '<script type="text/javascript">';
    echo 'alert(" please try again!");';
  
     echo 'window.location ="addclient.php";';
  
    echo '</script>';
   
  } 
}

?>
<link rel="stylesheet" href="../css/view-all_client.css">
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


                        <?php
                    
                    include('../conn/config.php');
                    $user_id=$_GET['user_id'];        
                    $query = "SELECT * FROM add_clients WHERE user_id='$user_id'";
                    $fire = mysqli_query($conn, $query);
                    if (mysqli_num_rows($fire) > 0) {
                        
                    while ($row = mysqli_fetch_array($fire)) {
                      ?>
                        <div class="row">
                            <div class="col-md-8 my-4">
                                <h3 class="my-2 cll"><b class="a1 "><?php echo $row['client_name'] ?>,&nbsp;&nbsp; #<?php echo $row['trip_id'] ?></b>
                                </h3>
                            </div>
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-3 my-4">

                           
                            
                                <div class="d-flex flex-row ">
                                <div class="p-2 ">
                                <p id="<?php echo $row['trip_id']?>" hidden><?php echo $row['UI']?></p>
                                <button type="button" class="btn btn" style="background-color: #0e79a5; color:white;padding:10px 10px 10px 10px; "
                                                onclick="copyToClipboard('#<?php echo $row['trip_id']?>')"><i class="fa fa-copy" aria-hidden="true" style="font-size: 25px;"></i></button>
                                </div>
                                    <div class="p-2 "> <a
                                            href="<?php $_SERVER['PHP_SELF'] ?>?del=<?php echo $row['user_id']?>"
                                            class="btn btn" style="background-color: #0e79a5; color:white;padding:10px 15px 10px 15px;"><i class="fa fa-trash" aria-hidden="true" style="font-size: 25px;"></i></a></div>
                                    <div class="p-2"> <a href="update_client.php?upd=<?php echo $row['user_id']?>"
                                            class="btn btn" style="background-color:#0e79a5; color:white; padding:10px 10px 10px 13px;"><i class="fa fa-edit" aria-hidden="true" style="font-size: 25px;"></i></a>
                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="scroll">
                        <div class="table-responsive  cla shadow bg-light ">
                            <!-- <h1 class="text-center my-3"><b>View All Clients</b></h1> -->
                            <table class="table table-bordered table-striped ">
                                <h3><b>TOUR DETAILS</b></h3>
                                <tbody>
                                    <tr>


                                        <td><b>Name&nbsp; -</b>&nbsp; <?php echo $row['client_name'] ?></td>
                                        <td><b>Phone&nbsp; -</b>&nbsp; <?php echo $row['client_phone'] ?></td>

                                    </tr>


                                    <tr>


                                        <td><b style="color: black;">Email&nbsp; -</b>&nbsp;
                                            <?php echo $row['client_email'] ?></td>
                                        <td><b style="color: black;">Place&nbsp; -</b>&nbsp;
                                            <?php echo $row['place_from'] ?></td>

                                    </tr>
                                    <tr>
                                        <!-- <th scope="row"></th> -->

                                        <td><b>From &nbsp; -</b>&nbsp; <?php echo $row['date_from'] ?></td>
                                        <td><b>Upto &nbsp; -</b>&nbsp; <?php echo $row['date_to'] ?></td>

                                    </tr>
                                    <tr>


                                        <td><b style="color: black;">Adult &nbsp; -</b>&nbsp;
                                            <?php echo $row['adult'] ?></td>
                                        <td><b style="color: black;">Chile&nbsp; -</b>&nbsp;
                                            <?php echo $row['child'] ?></td>

                                    </tr>
                                    <tr>
                                        <!-- <th scope="row"></th> -->

                                        <td><b>Price &nbsp; -</b>&nbsp; <?php echo $row['price'] ?></td>
                                        <td><b>Country &nbsp; -</b>&nbsp; <?php echo $row['country'] ?></td>

                                    </tr>
                                    <tr>


                                        <td><b style="color: black;">State &nbsp; -</b>&nbsp;
                                            <?php echo $row['state'] ?></td>
                                        <td><b style="color: black;">City&nbsp; -</b>&nbsp;
                                            <?php echo $row['city_n'] ?></td>

                                    </tr>
                                    <tr>
                                        <!-- <th scope="row"></th> -->

                                        <td><b>Visa &nbsp; -</b>&nbsp; <?php echo $row['visa'] ?></td>
                                        <td><b>Client Date &nbsp; -</b>&nbsp; <?php echo $row['client_date'] ?></td>

                                    </tr>
                                    
                                    
                                  </tbody>
                            </table>
                            <table class="table table-bordered table-striped">
                                
                                <tbody>
                                   
                                    <tr>
                                    <td><b>Flight Details  &nbsp; -</b>&nbsp; <?php echo $row['flight_detail'] ?></td>
                                       
                                    </tr>
                                    <tr>
                                    <td><b>Hotels Details  &nbsp; -</b>&nbsp; <?php echo $row['hotel_detail'] ?></td>
                                       
                                    </tr>
                                    <tr>
                                        <td><b>Travel Insurance  &nbsp; -</b>&nbsp; <?php echo $row['travel_insur'] ?></td>
                                       
                                    </tr>
                                    <tr>
                                    <td><b>Transfer  &nbsp; -</b>&nbsp; <?php echo $row['transfer'] ?></td>
                                       
                                    </tr>
                                    


                                </tbody>
                            </table>
                            
                            <?php
        }
    }
        ?>
                            <table class="table table-bordered table-striped">
                            <?php
                    
                    include('../conn/config.php');
                    // $user_id=$_GET['user_id'];        
                    $query = "SELECT * FROM exclusion_tab";
                    $fire = mysqli_query($conn, $query);
                    if (mysqli_num_rows($fire) > 0) {
                        
                    while ($row = mysqli_fetch_array($fire)) {
                      ?>
                                <h3 class="my-5"><b>EXCLUSION</b></h3>
                                <tbody>
                                    <tr>
                                    <td><b>Exclusion &nbsp; -</b>&nbsp; <?php echo $row['exclusion'] ?></td>
                                       
                                       </tr>
                                       
                                    </tr>
                                    
                                    


                                </tbody>
                            </table>


                          
                            <?php
        }
    }
        ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </section>

    <!--main content end-->
</section>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php include '../include/footer.php' ?> 


<script>
function copyToClipboard(element) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(element).text()).select();
    document.execCommand("copy");
    $temp.remove();
}
</script>