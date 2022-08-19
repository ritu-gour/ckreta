
<?php
session_start();
if (isset($_SESSION['adm_id'])) {
} else {
 
    header("location:../index.php");
}

$USER= $_SESSION['adm_id'];
$admin_usrnm= $_SESSION['admin_usrnm'];

?>
<style>
  ::-webkit-input-placeholder { 
  color: red !important;
}

:-ms-input-placeholder { 
  color: red !important;
}

::placeholder {
  color: red !important;
}
</style>
<!-- <link rel="stylesheet" href="../css/view_all.css"> -->
<?php include '../include/header.php' ?>
<?php include '../include/side.php' ?>
<section id="container">



    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="table-agile-info">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 style="font-size: 30px;font-weight:900px; " class="text-center "><b>View&nbsp;
                                All&nbsp;&nbsp;Clients Days</b></h4>
                    </div>
                    <div>

                        <div class="table-responsive  cla shadow bg-light">
                          
                            <table class="table table-striped my-2 ">
                                <thead>
                                    <tr style="text-align: center;">

                                      
                                        <!-- <th style="color: black; font-weight:bold;">S_No.</th> -->
                                       
                                        <th style="color: black; font-weight:bold;">City</th>
                                        <th style="color: black; font-weight:bold;">Days</th>
                                        <th style="color: black; font-weight:bold;">ADD</th>


                                    </tr>
                                </thead>
                                <tbody style="background-color: white;">

                                    <?php

        include('../conn/config.php');
       
            $query = "SELECT add_clients.city_n, itinerary_tab.days,itinerary_tab.user_id
            FROM add_clients
            INNER JOIN itinerary_tab
            ON add_clients.user_id=itinerary_tab.user_id;
             ";
            //  $query = "SELECT * FROM itinerary_tab ";
            $rs_result = mysqli_query($conn, $query);
           if (mysqli_num_rows($rs_result) > 0) {
            // $a=0;
           
            while ($row = mysqli_fetch_array($rs_result)){
               
                ?>

                                    <tr>
                                        <td>

                                            <?php echo $row['city_n'] ?>
                                        </td>
                                        <td>

                                            <?php echo $row['days'] ?>
                                        </td>
                               <td>
                                   <a href="itinerary_day.php?upd=<?php echo $row['user_id']?>"
                                       class="btn btn" style="background-color: #0e79a5; color:white;">ADD</a>
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



