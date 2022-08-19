
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
   .p-4.n2 {
    font-size: 35px;
    margin-left: -265px;
}
@media (max-width: 600px){


h1.set {
    margin-left: 0px !important;
    font-size: 35px !important;
    font-weight: bold;
    letter-spacing: 3px;
}
p.set {
    margin-left: 0px !important;
    font-size: 20px;
}
.s1 {
    margin-left: -20px !important;
    font-size: 35px;
    margin-top: -45px !important;
}
}
</style>
<link rel="stylesheet" href="../css/setting.css">
<?php include '../include/header.php' ?>
<?php include '../include/side.php' ?>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="">
            <!-- page start-->

            <div class="">
                <div class="">


                    <div class="panel-body ">

                        <h1 class="set">SETTINGS</h1>
                        <p class="set my-2">Add Data Or Change Settings</p>
                    <div class="my-4">
                        <div class="row text-center ">

                            <div class="col-md-6 ">

                                <div class="d-flex p-3">
                                    <a href="fontawesome.html">
                                        <div class="p-2">
                                            <i class="fa fa-cog i1 i2"></i><span
                                               class="log">
                                                Reset Login Credentials
                                            </span>
                                        </div>
                                    </a>
                                    <div class="p-4 log1" ><b><a
                                                href="change-password1.php">Login</a></b></div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex p-3">
                                    <a href="fontawesome.html">
                                        <div class="p-2">
                                            <i class="fa fa-cog i1 i2" ></i><span
                                              class="f"  >
                                                Set Flight Data
                                            </span>
                                        </div>
                                    </a>
                                    <div class="p-4 f1" ><b><a
                                                href="flight.php">Flights</a></b></div>

                                </div>
                            </div>
                        </div>
                        <div class="row text-center">
                        <div class="col-md-6 ">

<div class="d-flex p-3">
    <a href="fontawesome.html">
        <div class="p-2">
            <i class="fa fa-cog i1 i2" ></i><span
             class="n" >
              Set Itinerary Data
            </span>
        </div>
    </a>
    <div class="p-4 n1" ><b><a
                href="itinerary.php">&nbsp;Itinerary</a></b></div>

</div>
</div>
                         


                            <div class="col-md-6">
                                <div class="d-flex p-3">
                                    <a href="fontawesome.html">
                                        <div class="p-2">
                                            <i class="fa fa-cog i1 i2" ></i><span
                                              class="f"  >
                                                Set Hotel Data
                                            </span>
                                        </div>
                                    </a>
                                    <div class="p-4 f1" ><b><a
                                                href="hotel.php">Hotels</a></b></div>

                                </div>
                            </div>
                        </div>
                        <div class="row text-center">

                            <div class="col-md-6 ">

                                <div class="d-flex p-3">
                                    <a href="fontawesome.html">
                                        <div class="p-2">
                                            <i class="fa fa-cog i1 i2" ></i><span
                                             class="n" >
                                              Set Exclusion Data
                                            </span>
                                        </div>
                                    </a>
                                    <div class="p-4 n1" ><b><a
                                                href="exclusion.php">Exclusion</a></b></div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex p-3">
                                    <a href="fontawesome.html">
                                        <div class="p-2">
                                            <i class="fa fa-cog i1 i2" ></i><span
                                              class="t"  >
                                                Edit Terms & Conditions
                                            </span>
                                        </div>
                                    </a>
                                    <div class="p-4 t1" ><b><a
                                                href="terms_conditions.php">T & C</a></b></div>

                                </div>
                            </div>
                        </div>
                        <div class="row text-center">

                            <div class="col-md-6 ">

                                <div class="d-flex p-3">
                                    <a href="fontawesome.html">
                                        <div class="p-2">
                                            <i class="fa fa-cog i1 i2" ></i><span
                                             class="n" >
                                               Add Or Edit Notice
                                            </span>
                                        </div>
                                    </a>
                                    <div class="p-4 n1" ><b><a
                                                href="notice.php">Notice</a></b></div>

                                </div>
                            </div>
                            <div class="col-md-6">
                            <!-- <div class="d-flex p-3">
                                    <a href="fontawesome.html">
                                        <div class="p-2">
                                            <i class="fa fa-cog i1 i2" ></i><span
                                             class="n" >
                                               Add Or Edit Upload Image 
                                            </span>
                                        </div>
                                    </a>
                                    <div class="p-4 n2" ><b><a
                                                href="upload_image.php">Upload Image</a></b></div>

                                </div> -->
                            </div>
                        </div>
                    </div>
    </section>

    </div>
    </div>

















    <!-- page end-->
    </div>


</section>
<!-- footer -->

<!-- / footer -->
</section>

<!--main content end-->
</section>