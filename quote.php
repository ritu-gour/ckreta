<!-- <?php
include 'comm/config.php';

?> -->

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">



    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!-- Bootstrap CSS -->
<link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&family=Raleway:wght@300;500&family=Red+Hat+Display:wght@300&family=Red+Hat+Text:ital,wght@0,400;1,300&display=swap"
    rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="css/admin_reg.css"> -->
    <link rel="stylesheet" href="path/to/line-awesome/css/line-awesome-font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>ORPHIC</title>
    <link rel="stylesheet" href="css/user_dashboard.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <style>
      .navbar-light .navbar-toggler {
    color: rgb(255 255 255);
    border-color: rgb(255 255 255);
}
@media screen and (max-width: 600px) {
.shadow {
    box-shadow: 0 .5rem 1remrgba(0,0,0,.15)!important;
    margin-top: 13px !important;
}
.col-md-3 {
    margin-top: 10px !important;
    margin-bottom: 10px !important;
}
h1.c {
    font-size: 4rem !important;
    margin-bottom: 0px !important;
    font-weight: bold;
    text-transform: uppercase;
}
img {
    opacity: 1;
    height: 250px;
}
}
       .co {
    margin-top: -130px;
}
.h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
    margin-top: 0;
    margin-bottom: 0.2rem;
    font-weight: 500;
    line-height: 1.2;
}
h5.c8 {
    margin-top: 3px;
    margin-bottom: 0.2rem !important;
    font-weight: 500;
    line-height: 1.2;
}
h1.c {
    font-size: 5rem;
    margin-bottom: 170px;
    font-weight: bold;
    text-transform: uppercase;
    
    
}

.darken-grey-text {
    color: #2E2E2E;
}
img {
  opacity: 1;
}

img:hover {
  opacity: 1.6;
}
.navbar-collapse {
    flex-basis: 100%;
    flex-grow: 1;
    align-items: center;
    background: #10adf5;
}

.fa {
    display: inline-block;
    font: normal normal normal 14px/1 FontAwesome;
    font-size: inherit;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    margin-top: 4px;
}
    </style>

    
</head>

<body>

  
  <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-lg" style="background-color: 
  #10adf5; color:white;">
        <div class="container-fluid ">
            <a class="navbar-brand text-white " href="#" style="margin:0 30px; font-size:30px;"><b>CKRETA</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="color: white;"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"></a>
                    </li>
                    <li class="nav-item dropdown">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled"></a>
                    </li>
                </ul>

 <form class="d-flex ">
 </form>
 <div class="cla2">
  <a href="http://ckreta.orphicwebsitetesting.site/contact-us/" style="margin-right: 20px;"><button type="submit" class="btn btn-warning"
                            style="color: white;"><b style="font-size: 20px;">Contact Us</b></button></a>
   </div>
 

 
 <?php


include 'conn/config.php';
$trip_id=$_GET['trip_id'];        
// $query = "SELECT * FROM add_clients ON  WHERE trip_id='$trip_id'";
$query = "SELECT add_clients.trip_id 
            FROM add_clients
            INNER JOIN itinry_day
            ON add_clients.user_id=itinry_day.user_id WHERE add_clients.trip_id=$trip_id";
$fire = mysqli_query($conn, $query) or die( mysqli_error($conn));;
if (mysqli_num_rows($fire) > 0) {
while ($row = mysqli_fetch_array($fire)) {
  ?>
<div class="cc">
    <a class="btn btn shadow"  
   style="border-radius:38px; height:43px; background-color:white ;color:#4ebbf0;" target="_blank"
  href="http://localhost/ckreta/pdf.php/?trip_id=<?php echo $row['trip_id']?>"><i class="fa fa-download" 
style="font-size:23px;" aria-hidden="true"></i></a></div>
<?php
}
}

?>
  </div>
        </div>
    </nav>
    
    <div class="hm-gradient">
        
        <!--MDB Carousels-->
        <div class="">

          
            
            <!--/.Carousel Wrapper-->
            <!--Carousel Wrapper-->
            <div id="carousel-example-2" class="carousel slide carousel-fade mb-5" data-ride="carousel">
            <?php


include 'conn/config.php';
$trip_id=$_GET['trip_id'];        
// $query = "SELECT * FROM add_clients ON  WHERE trip_id='$trip_id'";
$query = "SELECT add_clients.visa,itinry_day.itinray_day
            FROM add_clients
            INNER JOIN itinry_day
            ON add_clients.user_id=itinry_day.user_id 
      
            
WHERE add_clients.trip_id=$trip_id";
$fire = mysqli_query($conn, $query) or die( mysqli_error($conn));;
if (mysqli_num_rows($fire) > 0) {
while ($row = mysqli_fetch_array($fire)) {
  ?>   
          
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <div class="view hm-white-slight">
                            <img class="d-block w-100" src="http://localhost/ckreta/images/Ckreta02.jpg" 
                            alt="First slide" height="600px" width="400px">
                            <div class="mask"></div>
                        </div>
                        <div class="carousel-caption mt-5 mb-5">
                            <h1 class="h3-responsive c"><?php echo $row['visa'] ?></h1>
                            
                        </div>
                    </div>
                    <div class="carousel-item">
                        <!--Mask color-->
                        <div class="view hm-white-slight">
                            <img class="d-block w-100" src="http://localhost/ckreta/images/Ckreta01.jpg"
                             alt="Second slide" height="600px" width="400px">
                            <div class="mask"></div>
                        </div>
                        <div class="carousel-caption mt-5 mb-5">
                            <h1 class="h3-responsive c"><?php echo $row['visa'] ?></h1>
                           
                        </div>
                    </div>
                    <div class="carousel-item">
                        <!--Mask color-->
                        <div class="view hm-white-slight">
                            <img class="d-block w-100" src="http://localhost/ckreta/images/Ckreta04.jpg"
                             alt="Third slide" height="600px" width="400px">
                            <div class="mask"></div>
                        </div>
                        <div class="carousel-caption mt-5 mb-5">
                            <h1 class="h3-responsive c"><?php echo $row['visa'] ?></h1>
                           
                        </div>
                    </div>
                    <div class="carousel-item">
                        <!--Mask color-->
                        <div class="view hm-white-slight">
                            <img class="d-block w-100" src="http://localhost/ckreta/images/Ckreta03.jpg" 
                            alt="Third slide" height="600px" width="400px">
                            <div class="mask"></div>
                        </div>
                        <div class="carousel-caption mt-5 mb-5">
                            <h1 class="h3-responsive c"><?php echo $row['visa'] ?></h1>
                           
                        </div>
                    </div>
                </div>
                <!--/.Slides-->
                <!--Controls-->
                <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                <!--/.Controls-->
            </div>
            <!--/.Carousel Wrapper-->
          
            <?php

}
}
  
  ?> 
           

        </div>
        <!--MDB Carousels-->
      
</div>



  


 
<div class="">

  <?php


include 'conn/config.php';
$trip_id=$_GET['trip_id'];        
// $query = "SELECT * FROM add_clients ON  WHERE trip_id='$trip_id'";
$query = "SELECT add_clients.client_name,add_clients.trip_id,add_clients.client_phone,add_clients.client_email,add_clients.date_from,
add_clients.date_to,add_clients.place_from,add_clients.adult,
add_clients.child,add_clients.price,add_clients.visa,add_clients.flight_detail,add_clients.hotel_detail,itinry_day.itinray_day
            FROM add_clients
            INNER JOIN itinry_day
            ON add_clients.user_id=itinry_day.user_id WHERE add_clients.trip_id=$trip_id";
$fire = mysqli_query($conn, $query) or die( mysqli_error($conn));;
if (mysqli_num_rows($fire) > 0) {
while ($row = mysqli_fetch_array($fire)) {
  ?>
<div class="container my-5 py-5">
    <h2 style="color:#10adf5;">TOUR OVERVIEW</h2>
    <hr>
   
<div class="card my">
  <h5 class="card-header p-3 " style="background-color: #10adf5; color:white;">

  <div class="row ">
       <div class="col-md-2 ">

       </div>
        <div class="col-md-5 my-1 ">
           <h4 ><i class="fa fa-calendar"></i>  <?php echo $row['date_from'] ?> ,  <?php echo $row['date_to'] ?></h4>

        </div>
        
        <div class="col-md-5 my-1">
       <h4><i class="fa fa-rupee"></i> <?php echo $row['price'] ?></h4>
        </div>
       
    </div>

  </h5>
  <div class="card-body">
    <div class="row ">
        <div class="col-md-2 ">
          

        </div>
        <div class="col-md-5 ">
            <h4 style="color:#10adf5; text-transform: uppercase;"><?php echo $row['client_name'] ?></h4>

        </div>
        <div class="col-md-5">
        <h4 style="color:#10adf5;">Trip ID :<sapn style="color:black;"> #<?php echo $row['trip_id'] ?></span></h4>
        </div>
       
    </div>
    <hr>
    <div class="row ">
    <div class="col-md-2 ">
          

          </div>
        <div class="col-md-5">
            <h5  class="my-3" style="color:#10adf5;">Phone : <span style="font-size:17px ;color:black;"> <?php echo $row['client_phone'] ?></span></span></h5>
            <h5 class="my-3" style="color:#10adf5;">Email :  <span style="font-size:17px ;color:black;"><?php echo $row['client_email'] ?></span></h5>
            <h5 class="my-3"style="color:#10adf5;">Starting From :  <span style="font-size:17px ;color:black;"><?php echo $row['date_from'] ?></span></h5>
            <h5 class="my-3" style="color:#10adf5;">Up To :  <span style="font-size:17px ;color:black;"><?php echo $row['date_to'] ?></span></h5>
            
        </div>
        <div class="col-md-5">
       <h5 class="my-3" style="color:#10adf5;">Adult :  <span style="font-size:20px ;color:black;"><?php echo $row['adult'] ?></span> , 
       Chile :<span style="font-size:20px ;color:black;"> <?php echo $row['child'] ?></h5>
      
       <h5 class="my-3" style="color:#10adf5;">Price Rs : <span style="font-size:17px ;color:black;"> <?php echo $row['price'] ?></span></h5>
       <h5 class="my-3" style="color:#10adf5;">Place From:  <span style="font-size:17px ;color:black;"><?php echo $row['place_from'] ?></span></h5>
       <h5 class="my-3" style="color:#10adf5;">Visiting :  <span style="font-size:17px ;color:black;"><?php echo $row['visa'] ?></span></h5>
        </div>
       
    </div>
  </div>
</div>
</div>
<div class="container my-5">
<h2 style="color:#10adf5;">INCLUSIONS</h2>
    <hr>
  <div id="accordion">
    <div class="card">
    <div class="card-header mb-0" id="headingOne" style="background-color: #10adf5; color:white;">
      <div class="d-flex ">
  <div class="p- mr-auto "> <h5> <i class="fa fa-plane" aria-hidden="true"></i>
  <a class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" 
          aria-controls="collapseOne">
            <h5 class="c8">FLIGHTS</h5>
        </a></h5></div>
  <div class="p- "><a class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" 
          aria-controls="collapseOne"><h3> <i class="fa fa-angle-down" aria-hidden="false"></i></h3>
          
        </a></div>

</div>
          
       
      </div>

      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body ">
        <?php echo $row['flight_detail'] ?>
        </div>
      </div>
    </div>
    <div class="card">
    <div class="card-header mb-0" id="headingTwo" style="background-color: #10adf5; color:white;">
      <div class="d-flex ">
  <div class="p- mr-auto "> <h5><i class="fa fa-hotel"></i> <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            
  <h5 class="c8"> HOTELS</h5>
        </a></h5></div>
  <div class="p- "> <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
           <h3> <i class="fa fa-angle-down" aria-hidden="true"></i></h3>
         
        </a></div>
  
</div>
        
      </div>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
        <div class="card-body">
        <?php echo $row['hotel_detail'] ?>
         </div>
      </div>
    </div>
    <div class="card">
    <div class="card-header mb-0" id="headingThree" style="background-color: #10adf5; color:white;">
      <div class="d-flex ">
  <div class="p mr-auto "><h5><i class="fa fa-minus-circle" aria-hidden="true"></i><a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
  <?php

include('conn/config.php');
  $query = "SELECT * FROM exclusion_tab ";
 $rs_result = mysqli_query($conn, $query);
 if (mysqli_num_rows($rs_result) > 0) {
  // $a=0;
 
  while ($row = mysqli_fetch_array($rs_result)){
     
      ?>
          <h5 class="c8"> EXCLUSIONS</h5>
</a></h5></div>
  <div class="p-"><a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            <h3><i class="fa fa-angle-down" aria-hidden="true"></i></h3>
           
</a></div>
  
</div>
        
      </div>
      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
        <div class="card-body">
          <?php echo $row['exclusion'] ?>
         </div>
      </div>
      <?php
                                   
                                        }
                                       }
                                        ?>
    </div>
  </div>
</div>

 
<?php

}
}
  
  ?> 
 <div class="container">
<div class="row ">

    <div class="col-md-2">
    </div>
    <div class="col-md-8 ">
        <div class=" ">
        <div class="">
                        <div id="accordionn">
            <?php
                      include('conn/config.php');
                        $trip_id=$_GET['trip_id'];        
                       
                        $query = "SELECT itinry_day.itinray_day
                                    FROM add_clients
                                    INNER JOIN itinry_day
                                    ON add_clients.user_id=itinry_day.user_id WHERE add_clients.trip_id=$trip_id";
                            $fire = mysqli_query($conn, $query);
                            if (mysqli_num_rows($fire) > 0) {
                             while ($user = mysqli_fetch_array($fire)){
                            
                            $string = $user['itinray_day']; 
                            $str_arr = explode (".", $string); 
                          
                            $number=1; 

                           foreach ($str_arr as $key => $value) {                                          
                           
                               echo '
                              
                               <div class="" id="headingFive">
                               <h5 class="mb-0 c8">
                               <a href="" class=" collapsed " style="text-decoration: none;"
                                   data-toggle="collapse" data-target="#collapse'.$number.'" aria-expanded="false"
                                   aria-controls="collapse'.$number.'">
                                  
                               </a>
                           </h5>
                              
                           </div>
   
                              ' ;
                               echo '<div class="">';
                               echo '<div class="collapse " id="collapse'.$number.'">
                                   
                                </div> ';
                                echo "<br>";
                                echo '</div>';
                               $number++;
                           }
                        }
                        }
                             ?>
                            </p>
                        </div>
                    </div>
                </div>
               
        </div>
    </div>
</div>

<div class="col-md-2">
</div>
</div>
<div>




<div class="container mt-5 ">
 <div class="co">
            <?php
                        include 'conn/config.php';
                                                                             
                        $i=0;
                        for($i;$i<=0;$i++)
                      
                        {
                            $divide=pow(1,$i);
                            ?>
            <div class="row  p-">
                
                <?php
                                for($d=0; $d < $divide; $d++){
                                        ?>
                <div class="col-<?php echo 12/$divide ?> ">
                    <br>
                    <div class="">
                        <div id="accordion">
                        <h2 class="" style="color:#10adf5;">ITINERARY</h2>
<hr>
                            <p class="">
                                

                                <?php 
                        
                       $trip_id=$_GET['trip_id'];        

                         $query = "SELECT add_clients.hotel_detail,itinry_day.itinray_day
                        FROM add_clients
                          INNER JOIN itinry_day
                         ON add_clients.user_id=itinry_day.user_id WHERE add_clients.trip_id=$trip_id";
                            $fire = mysqli_query($conn, $query);
                            if (mysqli_num_rows($fire) > 0) {
                             while ($user = mysqli_fetch_array($fire)){
                            //    echo $user['itinerary']; 
                            $string = $user['itinray_day']; 
                            $str_arr = explode (".", $string); 
                          
                            $number=1; 

                           foreach ($str_arr as $key => $value) {                                          
                           
                               echo '
                              
                               <div class="card-header mb-0" id="headingSix" style="background-color: #10adf5; color:white;">
                               
                               <div class="d-flex ">
                                <div class="p-2 mr-auto ">
                                <a href="" class=" collapsed" style="text-decoration: none;"
                                   data-toggle="collapse" data-target="#collapse'.$number.'" aria-expanded="false"
                                   aria-controls="collapse'.$number.'">
                                   <div class="d-flex  ">
                                       
                                       <h5 class=" c8 " style="background-color: #10adf5; color:white;"> Days '.$number.'
                                       </h5>
                                   </div>
                               </a>
                                </div>
                                <div class="p-2">
                                <a href="" class=" collapsed" style="text-decoration: none;"
                                   data-toggle="collapse" data-target="#collapse'.$number.'" aria-expanded="false"
                                   aria-controls="collapse'.$number.'">
                                   <div class="d-flex  ">
                                       <h3 style="color:white;"><i class="fa fa-angle-down" aria-hidden="true"></i>
                                       </h3>
                                      
                                   </div>
                               </a>
                                </div>
                                
                                </div>
                               
                              
                           </div>
   
                              ' ;
                               echo '<div class="">';
                               echo '<div class="collapse my-2" id="collapse'.$number.'">
                                    <div class="card card-body">
                                    '.$value.'
                                    </div>
                                </div> ';
                                echo "<br>";
                                echo '</div>';
                               $number++;
                           }
                        }
                        }
                             ?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php
                                }
                               ?>
            </div>
            <?php
                            
                        }

                      ?>
     
</div>

<div class="col-md-2">
</div>
</div>
<div>
<div>
<div class="container my-4">
<?php

include('conn/config.php');
  $query = "SELECT * FROM notice_tble ";
 $rs_result = mysqli_query($conn, $query);
 if (mysqli_num_rows($rs_result) > 0) {
  // $a=0;
 
  while ($row = mysqli_fetch_array($rs_result)){
     
      ?>
<h2 class="" style="color:#10adf5;">KNOW BEFORE YOU BOOK</h2>
<hr>
<div class="card my-4">
<div class="card-header p-3 " style="background-color: #10adf5; color:white;">
  <h5 >NOTICE</h5>
  </div>
  <div class="card-body">
   
    <p class="card-text" style="font-size: 18px; text-align: justify;padding:20px;"><?php echo $row['notice_tb'] ?> 
    
    </p>
    
  </div>
</div>
<?php
                                   
                                        }
                                       }
                                        ?>
</div>

<div class="container my-5">
<?php

include('conn/config.php');
  $query = "SELECT * FROM t_and_conditions ";
 $rs_result = mysqli_query($conn, $query);
 if (mysqli_num_rows($rs_result) > 0) {
  // $a=0;
 
  while ($row = mysqli_fetch_array($rs_result)){
     
      ?>
<h2 class="" style="color:#10adf5;">TERMS AND CONDITION</h2>
<hr>
<div class="card my-4">
  <div class="card-header p-3 " style="background-color: #10adf5; color:white;"> 
  <h5 class=" ">TERMS AND CONDITION</h5></div>
 
  <div class="card-body">
   
    <p class="card-text" style="font-size: 18px; text-align: justify;padding:20px;"><?php echo $row['terms_n_data'] ?> </p>
    
  </div>
</div>
<?php
                                   
                                        }
                                       }
                                        ?>
</div>




<br>







<div class="footer">

<!-- Footer  -->
<div class="container-fluid text-dark" style="background-color: #10adf5; color:white;">
<div class="d-flex justify-content-between mb-4">
    <div class="p-2"></div>
    <div class="p-2 mt-5 " style="color: white; font-size:50px;"><b>CKRETA</b></div>
    <div class="p-2 "></div>
  </div>
  
<div class="row row1 text-center text-white">
   
    <div class="col-md-3 ">   
   </div>
    <div class="col-md-2">
    <i class="fa fa-phone" aria-hidden="true" style="font-size: 25px;"></i>  <span style="font-size: 18px;"> &nbsp;&nbsp;(+91) 88-39-89-2345</span>
    </div>
    <div class="col-md-3">
    <i class="fa fa-envelope" aria-hidden="true" 
      style="font-size: 25px;"></i>  
      <span style="font-size: 18px;"> &nbsp;&nbsp;Demoorphic23@gmail.com</span>
    </div>
    <div class="col-md-2">
    <a href="http://ckreta.orphicwebsitetesting.site/" style="text-decoration: none; color:white;"><i class="fa fa-globe" aria-hidden="true" 
      style="font-size: 25px;"></i>  
      <span style="font-size: 18px;"> &nbsp;&nbsp;ckretaholiday.com</span></a>
    </div>
    <div class="col-md-2">
    </div>
    

</div>









<div class="d-flex justify-content-center text-white mb-3 my-3 mb1" style="font-size: 18px;">
    <div class="p-3"><a href="http://ckreta.orphicwebsitetesting.site/"  style="text-decoration: none; color:white;">Home</a></div>
    <div class="p-3"><a href="http://ckreta.orphicwebsitetesting.site/blog/"  style="text-decoration: none; color:white;">Blog</a></div>
    <div class="p-3"><a href="http://ckreta.orphicwebsitetesting.site/destinations/"  style="text-decoration: none; color:white;">Destinations</a></div>
    <div class="p-3"><a href="http://ckreta.orphicwebsitetesting.site/contact-us/"  style="text-decoration: none; color:white;">Contact Us</a></div>
  </div>

  <div class="d-flex justify-content-center  mb-3 mt-1 mb1" >
    <div class="p-3"><i class="fa fa-facebook-square"style="font-size:35px;color:white;" aria-hidden="true"></i></div>
    <div class="p-3"><i class="fa fa-instagram"style="font-size:35px;color:white;" aria-hidden="true"></i></div>
    <div class="p-3"><i class="fa fa-twitter" style="font-size:35px;color:white;"></i></div>
   
  </div>

  

    <div class="row">
       
        <div class="col-sm-12  mt- mb-">
            <div>
            <div class="d-flex justify-content-center  mb- mt- mb2" >
    <div class="p-3">
     </div>
    <div class="p-3"><p class="text-center" style="color: white;">Copyright &#169; 2022 
                    | Developer&nbsp;&nbsp;By&nbsp;&nbsp; | <a href="#"
                        style="color: white;text-decoration: none;">Orphic
                        Solution</a> </p></div>
    <div class="p-3"></div>
            </div>
        </div>
    </div>
</div>

</div>

























  









 
  


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"crossorigin="anonymous"></script> 
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
