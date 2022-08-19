
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
  $trip_id = $_GET['del'];
  $query = "DELETE FROM add_clients where trip_id=$trip_id";
  $fire = mysqli_query($conn, $query) or die("can not data." . mysqli_error($conn));
  if ($fire) { ?> <script>
alert(" Delete Successful");
</script>
<?php
    
        } else {
    
    
        ?>

<script>
alert('Not Delete Successful');
</script>

<?php
        }
}

?>
<style>
    
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

                        <?php
                    
                    include('../conn/config.php');
                    $trip_id=$_GET['trip_id'];        
                    $query = "SELECT * FROM add_clients WHERE trip_id='$trip_id'";
                    $fire = mysqli_query($conn, $query);
                    if (mysqli_num_rows($fire) > 0) {
                        
                    while ($row = mysqli_fetch_array($fire)) {
                      ?>
                        <div class="row">
                            <div class="col-md-8 my-4">
                                <h3 style="margin-left: 10px;" class="my-2"><b><?php echo $row['client_name'] ?></b></h3>
                            </div>
                            <div class="col-md-1">
                               
                            </div>
                            <div class="col-md-3 my-4">
                               

                                <div class="d-flex flex-row ">
                                    <div class="p-2 "> <a href="<?php $_SERVER['PHP_SELF'] ?>?del=<?php echo $row['trip_id']?>" class="btn btn"
                                    style="background-color: red; color:white;">Delete</a></div>
                                    <div class="p-2"> <a href="client_update.php?upd=<?php echo $row['trip_id']?>" class="btn btn"
                                    style="background-color:orange; color:white;">Update</a></div>
                                   
                                </div>
                            </div>
                        </div>


                    </div>
                    <div>
                        <div class="table-responsive  cla shadow bg-light">
                            <!-- <h1 class="text-center my-3"><b>View All Clients</b></h1> -->
                            <table class="table table-striped my-2 ">
                                <thead>
                                    <tr style="text-align: center;" class="cc">

                                        <!-- <th style="color: black;">Delete</th>
                                        <th style="color: black;">Update</th> -->
                                        <th style="color: black;">Trip ID</th>
                                        <th style="color: black;">Name</th>
                                        <th style="color: black;">Mobile</th>
                                        <th style="color: black;">Email</th>
                                        <th style="color: black;">From Date</th>
                                        <th style="color: black;">To Date</th>
                                        <th style="color: black;">Place From</th>
                                        <th style="color: black;">place To</th>
                                        <th style="color: black;">people</th>
                                        <th style="color: black;">Price</th>
                                        <th style="color: black;">Country</th>
                                        <th style="color: black;">State</th>
                                        <th style="color: black;">City</th>
                                        <th style="color: black;">Flight</th>
                                        <th style="color: black;">Hotel</th>
                                        <th style="color: black;">Sghtsng</th>
                                        <th style="color: black;">Other</th>
                                        <th style="color: black;">Exclusion</th>
                                        <th style="color: black;">Day</th>


                                    </tr>
                                </thead>
                                <tbody style="background-color: white;">

                                    <tr>
                                        <!-- <td>
                                            <a href="<?php $_SERVER['PHP_SELF'] ?>?del=<?php echo $row['trip_id']?>"
                                                class="btn btn" style="background-color: red; color:white;">Delete</a>
                                        </td>
                                        <td>
                                            <a href="client_update.php?upd=<?php echo $row['trip_id']?>" class="btn btn"
                                                style="background-color:orange; color:white;">Update</a>
                                        </td> -->
                                        <td>
                                            <?php echo $row['trip_id'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['client_name'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['client_phone'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['client_email'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['date_from'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['date_to'] ?>
                                        </td>

                                        <td>
                                            <?php echo $row['place_from'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['place_to'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['people'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['price'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['country'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['state'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['city_n'] ?>
                                        </td>


                                        <td>
                                            <?php echo $row['flight_detail'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['hotel_detail'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['s_detail'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['other_detail'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['exclusion_detail'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['it_day'] ?>
                                        </td>







                                    </tr>
                                    <?php
        }
    }
        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </section>

    <!--main content end-->
</section>
<?php include '../include/footer.php' ?>