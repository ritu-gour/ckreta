
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
   include_once('../conn/config.php');
 $num_per_page=04;
    if(isset($_GET["page"]))
    {
            $page=$_GET["page"];
    }
    else
    {
        $page=1;
    }

    $start_from=($page-1) * 04;
    
    $sql="Select * from add_clients ORDER BY trip_id DESC limit $start_from,$num_per_page";
  
if (isset($_POST['btnsubmit'])) {

    $valuesearch = $_POST['valuesearch'];
   
    $sql = "SELECT * FROM `add_clients` WHERE CONCAT(`trip_id`, `client_name`,`client_date`)LIKE '%" . $valuesearch . "%'";
    $rs_result = filterTable($sql);

} else {
   
    $rs_result = filterTable($sql);
}

function filterTable($sql)
{

    include('../conn/config.php');
    $filter_result = mysqli_query($conn, $sql);
    return $filter_result;
}

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
<link rel="stylesheet" href="../css/view_all.css">
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
                        <h4 style="font-size: 30px;font-weight:900px; " class="text-center "><b>Remove&nbsp;
                                &nbsp;Clients</b></h4>
                    </div>
                    <div>

                        <div class="table-responsive  cla shadow bg-light">
                            <form class="form-inline" method="post" action="#">
                                
                                <input type="text" class="form-control"  id="search_text"
                                    name="valuesearch" placeholder="Search : Enter Trip ID , Name , Date">
                                <button class="btn btn-success" type="submit" value="Filter"
                                    name="btnsubmit">Search</button>
                            </form>
                            <table class="table table-striped my-2 ">
                                <thead>
                                    <tr style="text-align: center;">

                                      
                                        <th style="color: black; font-weight:bold;">Remove</th>
                                        <th style="color: black; font-weight:bold;">Name</th>
                                        <th style="color: black; font-weight:bold;">Phone</th>
                                        <th style="color: black; font-weight:bold;">Email</th>
                                        <th style="color: black; font-weight:bold;">F_Date</th>
                                        <th style="color: black; font-weight:bold;">To</th>
                                        <th style="color: black; font-weight:bold;">Place</th>
                                        <th style="color: black; font-weight:bold;">Adult</th>
                                        <th style="color: black; font-weight:bold;">Child</th>
                                        <th style="color: black; font-weight:bold;">price</th>
                                        <th style="color: black; font-weight:bold;">Country</th>
                                        <th style="color: black; font-weight:bold;">State</th>
                                        <th style="color: black; font-weight:bold;">City</th>
                                       


                                    </tr>
                                </thead>
                                <tbody style="background-color: white;">

                                    <?php

        include('../conn/config.php');
       
            $query = "SELECT * FROM add_clients ";
            // $rs_result = mysqli_query($conn, $query);
        //    if (mysqli_num_rows($rs_result) > 0) {
            // $a=0;
            while ($row = mysqli_fetch_assoc($rs_result)){
               
                ?>

                                    <tr>
                                    
                                    <td>
                                            <a href="<?php $_SERVER['PHP_SELF'] ?>?del=<?php echo $row['user_id']?>"
                                                class="btn btn" style="background-color: #0e79a5; color:white;">Remove</a>
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
                                            <?php echo $row['adult'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['child'] ?>
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
                                        
                                        
                                      
                                      
                                       
                                       
                                     




                                    </tr>
                                    <?php
                                   
                                        }
                                    // }
                                        ?>
                                </tbody>
                            </table>
                            </div>

</div>  
                            <nav aria-label="Page navigation example ">
                                <ul class="pagination  ">

                                    <li class="page-item active">
                                        <a class="page-link" aria-label="Previous" href="<?php
                                        if($page <=1)
                                        {
                                            echo '#';
                                            
                                        }
                                        else
                                        {
                                            echo"?page=".$page -1;
                                        }
                                        ?>"> <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span></a>
                                    </li>

                                    <?php
                                            $sql="select * from add_clients";
                                            $rs_result=mysqli_query($conn,$sql);
                                            $total_records=mysqli_num_rows($rs_result);
                                            $total_page=ceil($total_records/$num_per_page);
                                            for($i=1;$i<=$total_page;$i++)
                                            {
                                                ?>

                                    <li class="page-item">
                                        <?php  echo "<a  class='page-link' aria-label='Previous' href='remove_client.php?page=".$i."' >".$i."</a>";?>
                                    </li>
                                    <?php
                                                    
                                            }
                                            ?>
                                    <li class="page-item">
                                        <a class="page-link" aria-label="Next" href="<?php
                                        if($page ==$total_page)
                                        {
                                            echo '#';
                                            
                                        }
                                        else
                                        {
                                            echo"?page=".$page +1;
                                        }
                                        ?>"> <span aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Next</span></a>

                                    </li>
                                </ul>
                            </nav>
                      
                </div>
            </div>

        </section>

    </section>

    <!--main content end-->
</section>
<?php include '../include/footer.php' ?>

<?php
// error_reporting(0);
include '../conn/config.php';

if ((isset($_GET['del']))) {
  $user_id = $_GET['del'];
  $query = "DELETE FROM add_clients WHERE user_id=$user_id";
  $fire = mysqli_query($conn, $query) or die("can not data." . mysqli_error($conn));
  if ($fire) {

    echo '<script type="text/javascript">';
    echo 'alert(" Successful Deleted");';
    echo 'window.location = "remove_client.php";';
    echo '</script>';
  } else {
    echo '<script type="text/javascript">';
    echo 'alert(" please try again!");';
  
     echo 'window.location ="fremove_client.php";';
  
    echo '</script>';
   
  } 
}

?>





