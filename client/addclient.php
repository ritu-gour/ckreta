
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
// error_reporting(0);
include_once "Common.php";
include('../conn/config.php');
// $message ='';
if (isset($_POST['submit1'])) {
    
    $trip_id =$_POST['trip_id'];
   

    $client_name =$_POST['client_name'];
    $client_phone =$_POST['client_phone'];
    $client_email =$_POST['client_email'];
    
    $date_from =$_POST['date_from'];
    $date_to =$_POST['date_to'];

    $date1=date_create($date_from);
    $date2=date_create($date_to);
    $diff=date_diff($date1,$date2);
    $trp_days = $diff->format("%a days");
    $place_from =$_POST['place_from'];  
    $adult =$_POST['adult'];
    $child =$_POST['child'];
    $price =$_POST['price'];

    $trp_country =$_POST['country'];
   
    $trp_state =$_POST['state'];
    $trp_city =$_POST['city_n'];
    
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

    $flight_detail =$_POST['flight_detail'];
    $hotel_detail =$_POST['hotel_detail'];
    $travel_insur =$_POST['travel_insur'];
    $visa =$_POST['visa'];
    $transfer =$_POST['transfer'];
   
    $url = "http://localhost/ckreta/quote/";
    $UI=$url.$trip_id;
    // echo $UI;
    $myDate = date("Y-m-d");
    // echo $myDate; 
  
    $query = mysqli_query($conn,"SELECT * FROM add_clients WHERE trip_id='$trip_id'");
    if(mysqli_num_rows($query)>0){
        echo '<script type="text/javascript">';
        
        echo 'alert("Trip Id Already Use");';
       
        echo '</script>';
        
    }
    else{
    $sql = "INSERT INTO `add_clients`(`trip_id`, `client_name`, `client_phone`, `client_email`, 
    `date_from`, `date_to`, `trp_days`, `place_from`, `adult`, `child`, `price`, `country`,
      `state`, `city_n`, `flight_detail`,
      `hotel_detail`, `UI`, `travel_insur`, `visa`,
      `transfer`, `client_date`) 
     VALUES ('$trip_id','$client_name','$client_phone','$client_email',' $date_from','$date_to','$trp_days',
     '$place_from','$adult','$child','$price','$outcomecountry','$outcomestate','$outcomecities',
     '$flight_detail','$hotel_detail','$UI','$travel_insur','$visa','$transfer','$myDate')";
     
      $run = mysqli_query($conn, $sql) or die("con not insert the data.".mysqli_error($conn));
      if($run)
      {

        echo '<script type="text/javascript">';
        echo 'alert("Successful Registration");';
        echo 'window.location = "exclusion_form.php";';
        echo '</script>';
      } else {
        echo '<script type="text/javascript">';
        echo 'alert(" please try again!");';
      
         echo 'window.location ="addclient.php";';
      
        echo '</script>';
       
      }
      
        // header("location: userlist.php") ;
    }
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
<link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&family=Raleway:wght@300;500&family=Red+Hat+Display:wght@300&family=Red+Hat+Text:ital,wght@0,400;1,300&display=swap"
    rel="stylesheet">
<link rel="stylesheet" href="../css/main.css">
<style>
  @media (max-width: 640px){
h1.v {
    font-size: 30px !important;
    margin-top: 20px ;
}
}
</style>
<body>

    <?php include '../include/side.php' ?>
    <section id="container">
        <section id="main-content">
            <section class="wrapper">
                <br><br><br>

                <form id="regForm" class="my-5" action="#" method="POST" name="add_name">
                    <!-- <?php echo $message; ?> -->
                    <h1 style="font-size: 40px;" class="v"><b>NEW CLIENT</b></h1>
                    <br><br>

                   
                    <div class="tab">
                     
                       
                        <div class="row">

                            <div class="col-md-6">

                                Trip ID:
                                <p><input type="text" placeholder="Trip ID..." oninput="this.className = ''"
                                        name="trip_id" required>
                                </p>
                            </div>
                            <div class="col-md-6">
                                Name:
                                <p><input type="text" placeholder="Name..." oninput="this.className = ''"
                                        name="client_name" required></p>

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                Mobile:
                                <p><input
                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        type="number" maxlength="10" placeholder="Mobile..."
                                        oninput="this.className = ''" name="client_phone" required>
                                </p>
                            </div>
                            <div class="col-md-6">
                                Email:
                                <p><input type="email" placeholder="Email..." oninput="this.className = ''"
                                        name="client_email" required></p>
                            </div>
                        </div>
                        <br>

                        <div style="overflow:auto;">
                            <div style="float:right;">
                                <!-- <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button> -->
                                <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                            </div>
                        </div>
                       
                    </div>
                    <div class="tab">
                        <div class="row">
                            <div class="col-md-6">
                                From Date:
                                <p><input type="date" placeholder="From Date..." oninput="this.className = ''"
                                        name="date_from" required>
                                </p>
                            </div>
                            <div class="col-md-6">
                              To:
                                <p><input type="date" placeholder="From To..." oninput="this.className = ''"
                                        name="date_to" required></p>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                           
                            <div class="col-md-12">
                               Adult:
                                <p><input type="text" placeholder="Adult To..." oninput="this.className = ''"
                                        name="adult" required></p>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                               Child:
                                <p><input type="text" placeholder="Child..." oninput="this.className = ''"
                                        name="child" required></p><br>
                            </div>
                            <div class="col-md-6">
                                Price:
                                <p><input type="text" placeholder="Price..." oninput="this.className = ''" name="price"
                                        required></p><br>
                            </div>
                        </div>
                        <div style="overflow:auto;">
                            <div style="float:right;">
                                <!-- <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button> -->
                                <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                            </div>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="row">
                    <div class="col-md-12">
                   
                                Place From:
                                <p><input type="text" placeholder="Place From..." oninput="this.className = ''"
                                        name="place_from" required>
                                </p>
                            </div>
                            
                           
                        </div> <br>
                                        
                        <span style="background-color:white;padding:3px; margin:20px;"  >Distination</span>
                    <div style=" border: 1px solid #aaaaaa;padding: 30px;margin: -12px 3px 0 3px; "  class="mb-5 ">
                        <?php
                        include('../conn/config.php');
                        
                            include_once "Common.php";
                            $common = new Common();
                            $countries = $common->getCountry($conn);
                            ?>
                            <div class="my-3">Country: <span style="color:red">*</span></div> 
                        <select name="country" id="countryId" class="form-control" onchange="getStateByCountry();">
                            <option value="">Country</option>
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
                        <br>
                        <div class="b">State: <span style="color:red">*</span></div>
                        <select class="form-control " name="state" id="stateId" onchange="getCityByState();">
                            <option value="">State</option>
                        </select>
                        <br>
                        <div id="dynamic_field" class="b">City: <span style="color:red">*</span>
                            </div>

                        <select class="form-control city_name" name="city_n" id="cityDiv">
                            <option value="">City</option>
                        </select>
                        </div>  
                        


                        <div style="overflow:auto;">
                            <div style="float:right;">
                                <!-- <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button> -->
                                <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                            </div>
                        </div>

                    </div>

                 

                    <div class="tab">
                    
                    <div class="row">
                       <div class="col-md-12">
                       Flight:
                              <p>
                                  <select style="font-size: 18px;" class="form-select form-select-lg mb-3 " name="flight_detail"
                                      aria-label=".form-select-lg example">
                                      <option selected style="font-size: 16;">Flight Name</option>
                                      <?php

                                      include('../conn/config.php');
                                      
                                          $query = "SELECT * FROM flights ";
                                          $rs_result = mysqli_query($conn, $query);
                                         if (mysqli_num_rows($rs_result) > 0) {
                                       
                                          while ($row = mysqli_fetch_assoc($rs_result)){
                                          
                                              ?>

                                      <option style="font-size:18px;" value="<?php echo $row['flight_name']?>|<?php echo $row['flight_from']?>|<?php echo $row['flight_to']?>|<?php echo $row['departure']?>|<?php echo $row['arrival']?>|<?php echo $row['flight_duration']?>|<?php echo $row['layover']?>"><?php echo $row['flight_name']?>|<?php echo $row['flight_from']?>|<?php echo $row['flight_to']?>|<?php echo $row['departure']?>|<?php echo $row['arrival']?>|<?php echo $row['flight_duration']?>|<?php echo $row['layover']?></option>
                                      <?php 
                                          }
                                         }
                                      ?>
                                  </select>
                              </p>
                             
                          </div>
                          </div>
                          <div class="row">
                          <div class="col-md-12">
                   Hotels Details :
                              <p>
                                  <select style="font-size: 18px;" class="form-select form-select-lg mb-3" name="hotel_detail"
                                      aria-label=".form-select-lg example">
                                      <option selected style="font-size: 16;">Hotels Details</option>
                                      <?php

                                      include('../conn/config.php');

                                          $query = "SELECT * FROM hotels ";
                                          $rs_result = mysqli_query($conn, $query);
                                         if (mysqli_num_rows($rs_result) > 0) {
                                       
                                          while ($row = mysqli_fetch_assoc($rs_result)){
                                          
                                              ?>
                                    <option style="font-size:18px;" value="<?php echo $row['hotel_name']?>|<?php echo $row['hotel_country']?>|<?php echo $row['hotel_state']?>|<?php echo $row['hotel_city']?>"><?php echo $row['hotel_name']?>|<?php echo $row['hotel_country']?>|<?php echo $row['hotel_state']?>|<?php echo $row['hotel_city']?></option>
                                      <?php 
                                          }
                                         }
                                      ?>
                                  </select>
                              </p>
                             
                          </div>
                        </div>
                        <div style="overflow:auto;">
                            <div style="float:right;">
                                <!-- <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button> -->
                                <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                            </div>
                        </div>
                    </div>
                    <div class="tab">
                    
                    
                            <div class="row">
                            <div class="col-md-6">
                            Travel Insurance :
                                <p><input type="text" placeholder="Travel Insurance ..." oninput="this.className = ''"
                                        name="travel_insur" required></p>

                            </div>
                            <div class="col-md-6">
                              Visa:
                                <p><input type="text" placeholder="Visa ..." oninput="this.className = ''"
                                        name="visa" required></p>

                            </div>
                        </div>
                        <br>
                        <div class="row">

                            <div class="col-md-12">

                             Transfers:
                             <p> <textarea placeholder=" Transfers..." class="form-control" name="transfer" rows="5"
                                required></textarea></p><br>
                            </div>
                            </div>
                             
                        
                       
                            <input type="submit" name="submit1" value="Next"
                            style="background-color: #0498D4; color:white;">
                    </div>

                    <!-- Circles which indicates the steps of the form: -->
                    <div style="text-align:center;margin-top:40px;">
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <!-- <span class="step"></span> -->
                        
                    </div>
                </form>
                </div>
                </div>
                <script>
                var currentTab = 0; // Current tab is set to be the first tab (0)
                showTab(currentTab); // Display the current tab

                function showTab(n) {
                    // This function will display the specified tab of the form...
                    var x = document.getElementsByClassName("tab");
                    x[n].style.display = "block";
                    //... and fix the Previous/Next buttons:
                    if (n == 0) {
                        document.getElementById("prevBtn").style.display = "none";
                    } else {
                        document.getElementById("prevBtn").style.display = "inline";
                    }
                    // if (n == (x.length - 1)) {
                    //   document.getElementById("nextBtn").innerHTML = "Submit";
                    // } else {
                    //   document.getElementById("nextBtn").innerHTML = "Next";
                    // }
                    //... and run a function that will display the correct step indicator:
                    fixStepIndicator(n)
                }

                function nextPrev(n) {
                    // This function will figure out which tab to display
                    var x = document.getElementsByClassName("tab");
                    // Exit the function if any field in the current tab is invalid:
                    if (n == 1 && !validateForm()) return false;
                    // Hide the current tab:
                    x[currentTab].style.display = "none";
                    // Increase or decrease the current tab by 1:
                    currentTab = currentTab + n;
                    // if you have reached the end of the form...
                    if (currentTab >= x.length) {
                        // ... the form gets submitted:
                        document.getElementById("regForm").submit();
                        return false;
                    }
                    // Otherwise, display the correct tab:
                    showTab(currentTab);
                }

                function validateForm() {
                    // This function deals with validation of the form fields
                    var x, y, i, valid = true;
                    x = document.getElementsByClassName("tab");
                    y = x[currentTab].getElementsByTagName("input");
                    // A loop that checks every input field in the current tab:
                    for (i = 0; i < y.length; i++) {
                        // If a field is empty...
                        if (y[i].value == "") {
                            // add an "invalid" class to the field:
                            y[i].className += " invalid";
                            // and set the current valid status to false
                            valid = false;
                        }
                    }
                    // If the valid status is true, mark the step as finished and valid:
                    if (valid) {
                        document.getElementsByClassName("step")[currentTab].className += " finish";
                    }
                    return valid; // return the valid status
                }

                function fixStepIndicator(n) {
                    // This function removes the "active" class of all steps...
                    var i, x = document.getElementsByClassName("step");
                    for (i = 0; i < x.length; i++) {
                        x[i].className = x[i].className.replace(" active", "");
                    }
                    //... and adds the "active" class on the current step:
                    x[n].className += " active";
                }
                </script>
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


</body>

</html>