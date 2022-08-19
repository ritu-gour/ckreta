

<?php
session_start();
if (isset($_SESSION['adm_id'])) {
} else {
 
    header("location:../index.php");
}

$USER= $_SESSION['adm_id'];
$admin_usrnm= $_SESSION['admin_usrnm'];
require("../conn/config.php");

?>
<?php include '../include/header.php' ?>
<?php include '../include/side.php' ?>
<section id="container">
<!--header start-->

<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
            <!-- //market-->
			<div class="market-updates">
                <div class="col-md-3 market-update-gd">
                    <div class="market-update-block clr-block-2">
                        <div class="col-md-4 market-update-right">
                            <i class="fa fa-eye"> </i>
                        </div>

                        <?php
      $user_data=mysqli_fetch_array(mysqli_query($conn,"SELECT count(user_id) 
	  total_user FROM `add_clients`"));
      ?>

                        <h4>Total Clients</h4>
                        <h3><?php echo $user_data['total_user'] ?></h3>

                        <div class="clearfix"> </div>
                    </div>
                </div>
            </div>
			<div class="col-md-3 market-update-gd">
                <div class="market-update-block clr-block-1">
                    <div class="col-md-4 market-update-right">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="col-md-8 market-update-left">
                        <?php
      $user=mysqli_fetch_array(mysqli_query($conn,"SELECT sum(adult) 
	  total_people FROM `add_clients`"));
      ?>

                        <h4>Adult</h4>
                        <h3><?php echo $user['total_people'] ?></h3>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
			<div class="col-md-3 market-update-gd">
                <div class="market-update-block clr-block-3">
                    <div class="col-md-4 market-update-right">
					<i class="fa fa-users"></i>
                    </div>
					<div class="col-md-8 market-update-left">
                        <?php
      				$user=mysqli_fetch_array(mysqli_query($conn,"SELECT sum(child) 
	  			total_people FROM `add_clients`"));
      ?>

                        <h4>Child</h4>
                        <h3><?php echo $user['total_people'] ?></h3>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
			<div class="col-md-3 market-update-gd">
                <div class="market-update-block clr-block-4">
                    <div class="col-md-4 market-update-right">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    </div>
                    <div class="col-md-8 market-update-left">
                        <h4>Orders</h4>
                        <h3>1,500</h3>
                        
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            
         
         </section>
		 <div class="agil-info-calendar">
		<!-- calendar -->
		<div class="col-md-12 agile-calendar">
			<div class="calendar-widget">
                <div class="panel-heading ui-sortable-handle">
					<span class="panel-icon">
                      <i class="fa fa-calendar-o"></i>
                    </span>
                    <span class="panel-title"> Calendar Widget</span>
                </div>
				<!-- grids -->
					<div class="agile-calendar-grid">
						<div class="page">
							
							<div class="w3l-calendar-left">
								<div class="calendar-heading">
									
								</div>
								<div class="monthly" id="mycalendar"></div>
							</div>
							
							<div class="clearfix"> </div>
						</div>
					</div>
			</div>
		</div>
		</div>
        </section>
	<style>
		
	</style>	
<?php include '../include/footer.php' ?>