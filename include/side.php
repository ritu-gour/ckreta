
<!DOCTYPE html>
<head>
<title>Ckreta</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Holidays" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<link rel="stylesheet" href="../css/bootstrap.min.css" >

<link href="../css/style.css" rel='stylesheet' type='text/css' />
<link href="../css/style-responsive.css" rel="stylesheet"/>

<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

 <link href="../css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="https://fonts.google.com/share?selection.family=Poppins:ital,wght@1,300;1,500">
<link rel="stylesheet" href="../css/morris.css" type="text/css"/>

  
<link rel="stylesheet" href="../css/monthly.css">

<script src="../js/jquery2.0.3.min.js"></script>
<script src="../js/raphael-min.js"></script>
<script src="../js/morris.js"></script>
<style>
    span{
        font-size: 19px;
    }
    ul.top-menu {
    margin-right: 30px !important;
    margin-top: 0;
}
.sidebar-toggle-box .fa-bars:hover {
    color: rgb(255 255 255);
}   
</style>
</head>
<body>
<section id="container">

<header class="header fixed-top clearfix">

<!--logo start-->
<div class="brand">
    <a href="http://ckreta.orphicwebsitetesting.site/" class="logo">
      <h1><b>CKRETA</b></h1>
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->    

<div class="top-nav clearfix">
   
    <ul class="nav pull-right top-menu">
        <li>
        <a href="../client/setting.php"><i class="fa fa-cog" style="font-size: 36px;"></i></a>
        </li>
        <li>
        <a href="../logout.php"><i class="fa fa-power-off" style="font-size: 36px;"></i></a>
        </li>
 
    </ul>
   
</div>
</header>

<aside>
    <div id="sidebar" class="nav-collapse">
        
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a href="../client/dashboard.php">
                        <i class="fa fa-dashboard"></i>
                        <span>DASHBOARD</span>
                       
                    </a>
                </li>
                <li>
                    <a href="../client/addclient.php">
                        <i class="fa fa-user"></i>
                        <span>ADD CLIENT</span>
                    </a>
                </li>
                <li>
                    <a href="../client/view_client.php">
                        <i class="fa fa-eye"></i>
                        <span>VIEW CLIENTS</span>
                    </a>
                </li>
                <li>
                    <a href="../client/edit_from.php">
                        <i class="fa fa-edit"></i>
                        <span>EDIT CLIENT</span>
                    </a>
                </li>
                <li>
                    <a href="../client/remove_client.php">
                        <i class="fa fa-trash"></i>
                        <span>DELETE CLIENT</span>
                    </a>
                </li>
                <li>
                    <a href="../client/setting.php">
                        <i class="fa fa-cog"></i>
                        <span>SETTINGS</span>
                    </a>
                </li>
                <li>
                    <a href="../logout.php">
                        <i class="fa fa-power-off"></i>
                        <span>LOGOUT</span>
                    </a>
                </li>
                
            
            </ul>          
        
        </div>
        
    </div>
</aside>


</section>
 
</section>

</section>
<script src="../js/bootstrap.js"></script>
<script src="../js/jquery.dcjqaccordion.2.7.js"></script>
<script src="../js/scripts.js"></script>
<script src="../js/jquery.slimscroll.js"></script>
<script src="../js/jquery.nicescroll.js"></script>

<script src="../js/jquery.scrollTo.js"></script>
	
<script>
    $(document).ready(function() {
       
        jQuery('.small-graph-box').hover(function() {
            jQuery(this).find('.box-button').fadeIn('fast');
        }, function() {
            jQuery(this).find('.box-button').fadeOut('fast');
        });
        jQuery('.small-graph-box .box-close').click(function() {
            jQuery(this).closest('.small-graph-box').fadeOut(200);
            return false;
        });

       
        function gd(year, day, month) {
            return new Date(year, month - 1, day).getTime();
        }

        graphArea2 = Morris.Area({
            element: 'hero-area',
            padding: 10,
            behaveLikeLine: true,
            gridEnabled: false,
            gridLineColor: '#dddddd',
            axes: true,
            resize: true,
            smooth: true,
            pointSize: 0,
            lineWidth: 0,
            fillOpacity: 0.85,
            data: [{
                    period: '2015 Q1',
                    iphone: 2668,
                    ipad: null,
                    itouch: 2649
                },
                {
                    period: '2015 Q2',
                    iphone: 15780,
                    ipad: 13799,
                    itouch: 12051
                },
                {
                    period: '2015 Q3',
                    iphone: 12920,
                    ipad: 10975,
                    itouch: 9910
                },
                {
                    period: '2015 Q4',
                    iphone: 8770,
                    ipad: 6600,
                    itouch: 6695
                },
                {
                    period: '2016 Q1',
                    iphone: 10820,
                    ipad: 10924,
                    itouch: 12300
                },
                {
                    period: '2016 Q2',
                    iphone: 9680,
                    ipad: 9010,
                    itouch: 7891
                },
                {
                    period: '2016 Q3',
                    iphone: 4830,
                    ipad: 3805,
                    itouch: 1598
                },
                {
                    period: '2016 Q4',
                    iphone: 15083,
                    ipad: 8977,
                    itouch: 5185
                },
                {
                    period: '2017 Q1',
                    iphone: 10697,
                    ipad: 4470,
                    itouch: 2038
                },

            ],
            lineColors: ['#eb6f6f', '#926383', '#eb6f6f'],
            xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
            pointSize: 2,
            hideHover: 'auto',
            resize: true
        });


    });
    </script>
    
</body>

</html>