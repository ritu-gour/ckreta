
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
 $num_per_page=02;
    if(isset($_GET["page"]))
    {
            $page=$_GET["page"];
    }
    else
    {
        $page=1;
    }

    $start_from=($page-1) * 02;
    
    $sql="Select * from itinerary_tab ORDER BY user_id DESC limit $start_from,$num_per_page";
  
if (isset($_POST['btnsubmit'])) {

    $valuesearch = $_POST['valuesearch'];
   
    $sql = "SELECT * FROM `itinerary_tab` WHERE CONCAT(`user_id`,`country_itin`)LIKE '%" . $valuesearch . "%'";
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
// error_reporting(0);
include_once "Common.php";
include('../conn/config.php');
// $message ='';
if (isset($_POST['submitbtne'])) {
    $trp_country =$_POST['country_itin'];
    $trp_state =$_POST['state_itin'];
    $trp_city =$_POST['city_nn'];
  $country= "SELECT * FROM `countries` WHERE id=$trp_country";
  $countryquery = mysqli_query($conn,$country);
  $countryresult = mysqli_fetch_assoc($countryquery);
  $outcomecountry =  $countryresult['name'];
//   echo $outcomecountry;

  $state= "SELECT * FROM `states` WHERE id=$trp_state";
  $statequery = mysqli_query($conn,$state);
  $stateresult = mysqli_fetch_assoc($statequery);
  $outcomestate =  $stateresult['statename'];

//   echo $outcomestate;

  $cities= "SELECT * FROM `tb_cities` WHERE id=$trp_city";
  $citiesquery = mysqli_query($conn,$cities);
  $citiesresult = mysqli_fetch_assoc($citiesquery);
  $outcomecities =  $citiesresult['city_name'];      
  $days =$_POST['days'];
    $sql = "INSERT INTO `itinerary_tab`(`country_itin`, `state_itin`, `city_nn`, `days`) 
     VALUES ('$outcomecountry','$outcomestate','$outcomecities','$days')";
      $run = mysqli_query($conn, $sql) or die("con not insert the data.".mysqli_error($conn));
      if($run)
      {

        echo '<script type="text/javascript">';
        echo 'alert("Successful");';
        echo 'window.location = "itinerary.php";';
        echo '</script>';
      } else {
        echo '<script type="text/javascript">';
        echo 'alert(" Please try Again!");';
      
         echo 'window.location ="itinerary.php";';
      
        echo '</script>';
       
      }
      
        // header("location: userlist.php") ;
   
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
    margin-left: -26px !important;
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
h1.set1 {
    margin-left: -30px !important;
    font-size: 40px;
    font-weight: bold;
    letter-spacing: 3px;
}
p.set {
    margin-left: 30px !important;
    font-size: 20px;
}
.pagination {
    display: inline-block;
    padding-left: 10px !important;
    margin: 20px 0;
    border-radius: 4px;
}
  }
 
  p.set {
    margin-left: 50px;
    font-size: 20px;
}

</style>
<body>

    <?php include '../include/side.php' ?>
    <section id="container">
        <section id="main-content">
            <section class="wrapper">
                <div class="panel-body ">

                    <h1 class="set1">ITINERARY</h1>
                    <p class="set my-2">Set Itinerary Data</p>
                    <form id="regForm1"  action="" method="post">
                        <h2></h2>
                       
                                <br>
                              
                              
                                <div class="row">
                                    <div class="col-4">
                        <?php
       include('../conn/config.php');
      
        include_once "Common.php";
        $common = new Common();
        $countries = $common->getCountry($conn);
        ?>
                        <label>Country<span style="color:red">*</span></label>
                        <select name="country_itin" id="countryId" aria-label=".form-select-lg example"
                        class="form-control form-select form-select-lg" onchange="getStateByCountry();">
                            <option value="">Select Country</option>
                            <?php
            if ($countries->num_rows > 0 ){
                while ($country = $countries->fetch_object()) {
                    $countryName = $country->name; ?>
                            <option value="<?php echo $country->id; ?>"><?php echo $countryName;?></option>
                            <?php 
                }
            }
            ?>
                        </select>
                        </div>
                        <div class="col-4">

                       
                     
                        <label class="b">State: <span style="color:red">*</span></label>
                        <select class="form-control form-select form-select-lg mb-"
                         aria-label=".form-select-lg example" name="state_itin" id="stateId" onchange="getCityByState();">
                            <option value=""> Select State</option>
                        </select>
                        </div>
                        <br>
                        <div class="col-4">

                      
                        <label id="dynamic_field" class="b">City: <span style="color:red">*</span></label>

                        <select class="form-control city_name" name="city_nn" id="cityDiv">
                            <option value="">Select City</option>
                        </select>
                        </div>
                        </div>
                        <br>
                        
                        <div class="row my-3">
                                    <div class="col-md-12">
                                    <label id="dynamic_field" class="b">Days: <span style="color:red">*</span></label>
                           <textarea placeholder="Days..." class="form-control" name="days" rows="7"
                                required></textarea>

                                    </div>
                                   
                                </div>


                       



                                                    
                         <br>
                      
                        <button type="submit" name="submitbtne" class="btn btn-primary btn-lg btn-block style="color: white;">Add</button>
                      
                    </form>
                   
                    <div class="table-responsive  cla shadow bg-light" >
                   
                   <table class="table table-striped my-2 " >
                       <thead>
                           <tr style="text-align: center;"  class="cs">
                               <!-- <th  style="color: black; font-weight:bold;font-size:20px;">S_No.</th> -->
                               <th style="color: black; font-weight:bold;font-size:20px;">Country</th>
                               <th style="color: black; font-weight:bold;font-size:20px;">State</th>
                               <th style="color: black; font-weight:bold;font-size:20px;">City</th>
                               <th style="color: black; font-weight:bold;font-size:20px;">Day</th>
                               <th style="color: black; font-weight:bold;font-size:20px;">Update</th>
                            </tr>
                       </thead>
                       <tbody style="background-color: white;">
                        <?php

include('../conn/config.php');

//    $query = "SELECT * FROM itinerary_tab ";
//    $rs_result = mysqli_query($conn, $query);
//    if (mysqli_num_rows($rs_result) > 0) {
//    $a=0;
   while ($row = mysqli_fetch_assoc($rs_result)){
      
       ?>

                           <tr >
                               <!-- <td style="font-size:20px;">

                                   <?php echo ++$a ?>
                               </td> -->

                               <td style="font-size:16px;">
                                   <?php echo $row['country_itin'] ?>
                               </td>
                               <td style="font-size:16px;">
                                   <?php echo $row['state_itin'] ?>
                               </td>
                               <td style="font-size:16px;">
                                   <?php echo $row['city_nn'] ?>
                               </td>
                               <td style="font-size:16px;">
                                   <?php echo $row['days'] ?>
                               </td>

                              
                               <td>
                                   <a href="update_itinerary.php?upd=<?php echo $row['user_id']?>"
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
                                   $sql="select * from  itinerary_tab";
                                   $rs_result=mysqli_query($conn,$sql);
                                   $total_records=mysqli_num_rows($rs_result);
                                   $total_page=ceil($total_records/$num_per_page);
                                   for($i=1;$i<=$total_page;$i++)
                                   {
                                       ?>

                           <li class="page-item">
                               <?php  echo "<a  class='page-link' aria-label='Previous' href='itinerary.php?page=".$i."' >".$i."</a>";?>
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
<script>
                function getStateByCountry() {
                    var countryId = $("#countryId").val();
                    $.post("ajax.php", {
                        getStateByCountry: 'getStateByCountry',
                        countryId: countryId
                    }, function(response) {
                        var data = response.split('^');
                        $("#stateId").html(data[1]);
                    });
                }

                function getCityByState() {
                    var stateId = $("#stateId").val();
                    $.post("ajax.php", {
                        getCityByState: 'getCityByState',
                        stateId: stateId
                    }, function(response) {
                        var data = response.split('^');
                        $("#cityDiv").html(data[1]);
                    });
                }
                </script>
<?php include '../include/footer.php' ?>



