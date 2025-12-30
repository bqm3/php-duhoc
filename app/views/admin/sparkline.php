<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content="" >
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!--Meta Responsive tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="/php-duhoc/public/assets/css/bootstrap.min.css">
    <!--Custom style.css-->
    <link rel="stylesheet" href="/php-duhoc/public/assets/css/quicksand.css">
    <link rel="stylesheet" href="/php-duhoc/public/assets/css/style.css">
    <!--Font Awesome-->
    <link rel="stylesheet" href="/php-duhoc/public/assets/css/fontawesome.css">
    <!--Chartist CSS-->
    <link rel="stylesheet" href="/php-duhoc/public/assets/css/chartist.min.css">
    <!--Bootstrap Calendar-->
    <link rel="stylesheet" href="/php-duhoc/public/assets/js/calendar/bootstrap_calendar.css">

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <title>Sleek Admin</title>
  </head>
  <body>
    
    <!--Page Wrapper-->

    <div class="container-fluid">

        <!--Header-->
       <?php include 'header.php'; ?>
        <!--Header-->

        <!--Main Content-->

        <div class="row main-content">
            <!--Sidebar left-->
<?php include 'sidebar.php'; ?>
            <!--Sidebar left-->

            <!--Content right-->
            <div class="col-sm-9 col-xs-12 content pt-3 pl-0">
                <h5 class="mb-0" ><strong>Sparkline Charts</strong></h5>
                <span class="text-secondary">Charts <i class="fa fa-angle-right"></i> Sparkline js</span>
                
                <div class="row mt-3">
                    <div class="col-sm-6">
                        <!--Bar Chart-->
                        <div class="mt-1 mb-3 p-3 button-container bg-white shadow-sm border">
                            <h6 class="mb-3">Bar chart</h6>
                            
                            <div style="height: 270px;">
                                <span id="barChartSparkline" style="width: 100%; height: 100%;"></span>
                            </div>
                        </div>
                        <!--/Bar Chart-->

                    </div>
                    
                    
                    <div class="col-sm-6">
                        <!--Pie Chart-->
                        <div class="mt-1 mb-3 p-3 button-container  bg-white shadow-sm border">
                            <h6 class="mb-3">Pie Chart</h6>
                            
                            <div style="height: 270px;">
                                <span id="pieChartSparkline" style="width: 100%; height: 100%;"></span>
                            </div>
                        </div>
                        <!--/Pie Table-->
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-sm-6">
                        <!--Line Chart-->
                        <div class="mt-1 mb-3 p-3 button-container bg-white shadow-sm border">
                            <h6 class="mb-3">Line chart</h6>
                            
                            <div style="height: 270px;">
                                <span id="lineChartSparkline" style="width: 100%; height: 100%;"></span>
                            </div>
                        </div>
                        <!--/Line Chart-->

                    </div>
                    
                    
                    <div class="col-sm-6">
                        <!--Tristate Chart-->
                        <div class="mt-1 mb-3 p-3 button-container  bg-white shadow-sm border">
                            <h6 class="mb-3">Tristate Chart</h6>

                            <div style="height: 270px;">
                                <span id="tristateChartSparkline" style="width: 100%; height: 100%;"></span>
                            </div>
                        </div>
                        <!--/Tristate Chart-->
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-sm-6">
                        <!--Bullet Chart-->
                        <div class="mt-1 mb-3 p-3 button-container bg-white shadow-sm border">
                            <h6 class="mb-3">Bullet chart</h6>
                            
                            <div style="height: 270px;">
                                <span id="bulletChartSparkline" style="width: 100%; height: 100%;"></span>
                            </div>
                        </div>
                        <!--/Bullet Chart-->

                    </div>
                    
                    
                    <div class="col-sm-6">
                        <!--Box Chart-->
                        <div class="mt-1 mb-3 p-3 button-container  bg-white shadow-sm border">
                            <h6 class="mb-3">Box Chart</h6>
                            
                            <div style="height: 270px;">
                                <span id="boxChartSparkline" style="width: 100%; height: 100%;"></span>
                            </div>
                        </div>
                        <!--/Box Table-->
                    </div>
                </div>

                <!--Footer-->
                <div class="row mt-5 mb-4 footer">
                    <div class="col-sm-8">
                        <span>&copy; All rights reserved 2019 designed by <a class="text-info" href="#">A-Fusion</a></span>
                    </div>
                    <div class="col-sm-4 text-right">
                        <a href="#" class="ml-2">Contact Us</a>
                        <a href="#" class="ml-2">Support</a>
                    </div>
                </div>
                <!--Footer-->

            </div>
        </div>

        <!--Main Content-->

    </div>

    <!--Page Wrapper-->

    <!-- Page JavaScript Files-->
    <script src="/php-duhoc/public/assets/js/jquery.min.js"></script>
    <script src="/php-duhoc/public/assets/js/jquery-1.12.4.min.js"></script>
    <!--Popper JS-->
    <script src="/php-duhoc/public/assets/js/popper.min.js"></script>
    <!--Bootstrap-->
    <script src="/php-duhoc/public/assets/js/bootstrap.min.js"></script>
    <!--Sweet alert JS-->
    <script src="/php-duhoc/public/assets/js/sweetalert.js"></script>
    <!--Progressbar JS-->
    <script src="/php-duhoc/public/assets/js/progressbar.min.js"></script>
    <!--Charts-->
    <!--Chart.JS-->
    <script src="/php-duhoc/public/assets/js/charts/sparkline.min.js"></script>
    <script src="/php-duhoc/public/assets/js/charts/demo.js"></script>
    <!--Bootstrap Calendar JS-->
    <script src="/php-duhoc/public/assets/js/calendar/bootstrap_calendar.js"></script>
    <script src="/php-duhoc/public/assets/js/calendar/demo.js"></script>
    <!--Bootstrap Calendar-->

    <!--Custom Js Script-->
    <script src="/php-duhoc/public/assets/js/custom.js"></script>
    <!--Custom Js Script-->
  </body>
</html>