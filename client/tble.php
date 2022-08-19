
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
     Basic table
    </div>
    <div>
    <div class="table-responsive  cla shadow bg-light">
            <h1 class="text-center my-3"><b>View All Clients</b></h1>
            <table class="table table-striped my-2 ">
                <thead>
                    <tr style="text-align: center;">

                        <th>S.No</th>
                        <th>Trip ID</th>
                        <th>Name</th>
                        <th>Link</th>
                        <th>View</th>


                    </tr>
                </thead>
                <tbody style="background-color: white;">

                    <?php

        include('../conn/config.php');

            $query = "SELECT * FROM add_clients";
            $fire = mysqli_query($conn, $query);
           if (mysqli_num_rows($fire) > 0) {
            $a=0;
            while ($row = mysqli_fetch_assoc($fire)) {
               
                ?>

                    <tr>
                        <td>

                            <?php echo ++$a ?>
                        </td>

                        <td>
                            <?php echo $row['trip_id'] ?>
                        </td>
                        <td>
                            <?php echo $row['client_name'] ?>
                        </td>
                        <td>
                            <h4><?php echo $row['UI']?></h4>
                        </td>
                        <!-- <td>
               
               <a href="quote.php?trip_id=<?php echo $row['trip_id']?>"><?php echo $row['UI']?></a>
                </td> -->

                        <!-- <td>
               
               <a href="<?php $_SERVER['PHP_SELF'] ?>?tripid=<?php echo $row['tripid']?>"><?php echo $row['UI']?></a>
                </td>
                -->

                        <!-- <td>
               
                 <a href="<?php echo $row['trip_id']?>"><?php echo $row['UI']?></a>
                </td> -->

                        <td>
                            <a href="view-all_client.php?trip_id=<?php echo $row['trip_id']?>" class="btn btn"
                                style="background-color: green; color:white;">View</a>
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