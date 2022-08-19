
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
 $num_per_page=05;
    if(isset($_GET["page"]))
    {
            $page=$_GET["page"];
    }
    else
    {
        $page=1;
    }

    $start_from=($page-1) * 05;
    
    $sql="Select * from  flights ORDER BY user_id DESC limit $start_from,$num_per_page";
  
if (isset($_POST['btnsubmit'])) {

    $valuesearch = $_POST['valuesearch'];
   
    $sql = "SELECT * FROM `flights` WHERE CONCAT(`user_id`, `flight_name`)LIKE '%" . $valuesearch . "%'";
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
<?php

include('../conn/config.php');
// $message ='';
if (isset($_POST['submitbtn'])) {
   $flight_name =$_POST['flight_name'];
   $flight_from =$_POST['flight_from'];
   $flight_to =$_POST['flight_to'];
   $layover =$_POST['layover'];
   $departure =$_POST['departure'];
   $arrival =$_POST['arrival'];
   $flight_duration =$_POST['flight_duration'];


    $sql = "INSERT INTO `flights`(`flight_name`, `flight_from`, `flight_to`, `layover`, `departure`, `arrival`, `flight_duration`) 
    VALUES ('$flight_name','$flight_from','$flight_to','$layover','$departure','$arrival','$flight_duration')";
     $run = mysqli_query($conn, $sql) or die("con not insert the data.".mysqli_error($conn));
     if($run)
     {

       echo '<script type="text/javascript">';
       echo 'alert("successful ");';
       echo 'window.location = "flight.php";';
       echo '</script>';
     } else {
       echo '<script type="text/javascript">';
       echo 'alert(" please try again!");';
     
        echo 'window.location ="flight.php";';
     
       echo '</script>';
      
     }
     
       // header("location: userlist.php") ;
  
}
?>


<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="add1.css">
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
    margin-left: -12px !important;
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
            
                <!-- <div class="panel-body "> -->

                    <h1 class="set1">FLIGHT DATA</h1>
                    <p class="set my-2">Set Flight Data</p>
                    <form id="regForm1"  action="" method="post" >
                        <h2></h2>
                        
                                <div class="row">
                                    <div class="col-6">
                                    <label>Flight Name</label><br>
                                     <input type="text" name="flight_name" placeholder="Flight Name">

                                    </div>
                                    <div class="col-6">
                                    <label>Layover</label><br>
                                      <input type="text" name="layover" placeholder="Layover">
                                    </div>
                                   
                                </div>
                                <br>
                              
                                <div class="row">
                                    <div class="col-6">
                                    <label>Flight From</label><br>
                                     <input type="text" name="flight_from" placeholder="Flight From">
                                    </div>
                                    <div class="col-6">
                                    <label>Flight To</label><br>
                                     <input type="text" name="flight_to" placeholder="Flight To">

                                        </div>
                                </div>
                                <br>
                            
                                <div class="row">
                                    <div class="col-6">
                                    <label>Departure</label><br>
                                <input type="time" name="departure" placeholder="Departure">
                                    </div>
                                    <div class="col-6">
                                    <label>Arrival</label><br>
                                     <input type="time" name="arrival" placeholder="Arrival">

                                        </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-12">
                                    <label>Flight Duration</label><br>
                                <input type="text" name="flight_duration" placeholder="Duration">
                                    </div>
                                  
                                </div>
                                                    
                         <br>
                      
                        <button type="submit" name="submitbtn" class="btn btn-primary btn-lg btn-block" style="color: white;">Add</button>
                      
                    </form>
                   






                    <div class="table-responsive  cla shadow bg-light" >
                    <h4 style="font-size: 30px;font-weight:900px; " class="text-center my-5"><b>View&nbsp;
                                All&nbsp;&nbsp;Flight&nbsp;&nbsp;Name</b></h4>
                            <form class="form-inline my-5" method="post" action="#">
                                
                                <input type="text" class="form-control"  id="search_text"
                                    name="valuesearch" placeholder="Search : Enter Trip ID , Name , Date">
                                <button class="btn btn-success" type="submit" value="Filter"
                                    name="btnsubmit">Search</button>
                            </form>
                            <table class="table table-striped my-2 " >
                                <thead>
                                    <tr style="text-align: center;"  class="cs">
                                        <th  style="color: black; font-weight:bold;font-size:20px;">S_No.</th>
                                        <th style="color: black; font-weight:bold;font-size:20px;">Name</th>
                                        <th style="color: black; font-weight:bold;font-size:20px;">Layover</th>
                                        <th style="color: black; font-weight:bold;font-size:20px;">From</th>
                                        <th style="color: black; font-weight:bold;font-size:20px;">To</th>
                                        <th style="color: black; font-weight:bold;font-size:20px;">Departure</th>
                                        <th style="color: black; font-weight:bold;font-size:20px;">Arrival</th>
                                        <th style="color: black; font-weight:bold;font-size:20px;">Duration</th>
                                        <th style="color: black; font-weight:bold;font-size:20px;">Delete</th>
                                        <th style="color: black; font-weight:bold;font-size:20px;">Update</th>
                                     </tr>
                                </thead>
                                <tbody style="background-color: white;">
                                 <?php

                                include('../conn/config.php');
                            
                                    // $query = "SELECT * FROM flights ";
                                    // $rs_result = mysqli_query($conn, $query);
                                //    if (mysqli_num_rows($rs_result) > 0) {
                                    $a=0;
                                    while ($row = mysqli_fetch_assoc($rs_result)){
               
                            ?>

                                    <tr >
                                        <td style="font-size:20px;">

                                            <?php echo ++$a ?>
                                        </td>

                                        <td style="font-size:20px;">
                                            <?php echo $row['flight_name'] ?>
                                        </td>
                                        <td style="font-size:20px;">
                                            <?php echo $row['flight_from'] ?>
                                        </td>
                                        <td style="font-size:20px;">
                                            <?php echo $row['flight_to'] ?>
                                        </td>
                                        <td style="font-size:20px;">
                                            <?php echo $row['layover'] ?>
                                        </td>
                                        <td style="font-size:20px;">
                                            <?php echo $row['departure'] ?>
                                        </td>
                                        <td style="font-size:20px;">
                                            <?php echo $row['arrival'] ?>
                                        </td>
                                        <td style="font-size:20px;">
                                            <?php echo $row['flight_duration'] ?>
                                        </td>
                                        
                                        

                                        <td>
                                            <a href="<?php $_SERVER['PHP_SELF'] ?>?del=<?php echo $row['user_id']?>"
                                                class="btn btn" style="background-color: #0e79a5; color:white;">Delete</a>
                                        </td>
                                        <td>
                                            <a href="update_flight.php?upd=<?php echo $row['user_id']?>"
                                                class="btn btn" style="background-color: #0e79a5; color:white;">Update</a>
                                        </td>
                                      </tr>
                                    <?php
                                   
                                        }
                                    // }
                                        ?>
                                </tbody>
                            </table>
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
                                            $sql="select * from flights";
                                            $rs_result=mysqli_query($conn,$sql);
                                            $total_records=mysqli_num_rows($rs_result);
                                            $total_page=ceil($total_records/$num_per_page);
                                            for($i=1;$i<=$total_page;$i++)
                                            {
                                                ?>

                                    <li class="page-item">
                                        <?php  echo "<a  class='page-link' aria-label='Previous' href='flight.php?page=".$i."' >".$i."</a>";?>
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
                            <br>
                        </div>

                    </div>
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
  $query = "DELETE FROM flights WHERE user_id=$user_id";
  $fire = mysqli_query($conn, $query) or die("can not data." . mysqli_error($conn));
  if ($fire) {

    echo '<script type="text/javascript">';
    echo 'alert(" Successful Deleted");';
    echo 'window.location = "flight.php";';
    echo '</script>';
  } else {
    echo '<script type="text/javascript">';
    echo 'alert(" please try again!");';
  
     echo 'window.location ="flight.php";';
  
    echo '</script>';
   
  } 
}

?>


