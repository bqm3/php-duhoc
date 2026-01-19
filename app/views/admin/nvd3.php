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
    <link rel="stylesheet" href="/php-duhoc/public/assets/css/nv.d3.css">
    <!--Bootstrap Calendar-->
    <link rel="stylesheet" href="/php-duhoc/public/assets/js/calendar/bootstrap_calendar.css">

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <title>Du học</title>
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
                <h5 class="mb-0" ><strong>NVD3 Charts</strong></h5>
                <span class="text-secondary">Charts <i class="fa fa-angle-right"></i> NVD3</span>
                
                <div class="row mt-3">
                    <div class="col-sm-6">
                        <!--Line Chart-->
                        <div class="mt-1 mb-3 p-3 button-container bg-white shadow-sm border">
                            <h6 class="mb-3">Line chart</h6>
                            
                            <div id="lineChartNvd3" style="height: 300px;">
                                <svg style="height: 100%;"></svg>
                            </div>
                        </div>
                        <!--/Line Chart-->

                    </div>
                    
                    
                    <div class="col-sm-6">
                        <!--Scatter / Bubble Chart-->
                        <div class="mt-1 mb-3 p-3 button-container  bg-white shadow-sm border">
                            <h6 class="mb-3">Scatter / Bubble Chart</h6>

                            <div id="scatterChartNvd3" style="height: 300px;">
                                <svg style="height: 100%;"></svg>
                            </div>
                        </div>
                        <!--/Scatter / Bubble Chart-->
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-sm-6">
                        <!--Discrete bar Chart-->
                        <div class="mt-1 mb-3 p-3 button-container bg-white shadow-sm border">
                            <h6 class="mb-3">Discrete bar chart</h6>
                            
                            <div id="barChartNvd3" style="height: 300px;">
                                <svg style="height: 100%;"></svg>
                            </div>
                        </div>
                        <!--/Discrete bar Chart-->

                    </div>
                    
                    
                    <div class="col-sm-6">
                        <!--Pie Chart-->
                        <div class="mt-1 mb-3 p-3 button-container  bg-white shadow-sm border">
                            <h6 class="mb-3">Pie Chart</h6>
                            
                            <div id="pieChartNvd3" style="height: 300px;">
                                <svg style="height: 100%;"></svg>
                            </div>
                        </div>
                        <!--/Pie Table-->
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-sm-12">
                        <!--Grouped / Stacked bar Chart-->
                        <div class="mt-1 mb-3 p-3 button-container bg-white shadow-sm border">
                            <h6 class="mb-3">Grouped / Stacked bar chart</h6>
                            
                            <div id="stackedChartNvd3" style="height: 300px;">
                                <svg style="height: 100%;"></svg>
                            </div>
                        </div>
                        <!--/Grouped / Stacked bar Chart-->

                    </div>
                </div>

                

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
    <!--NVD3.JS-->
    <script src="/php-duhoc/public/assets/js/charts/d3.min.js"></script>
    <script src="/php-duhoc/public/assets/js/charts/nv.d3.js"></script>
    <script src="/php-duhoc/public/assets/js/charts/nvd3-chart-data.js"></script>
    <!--Bootstrap Calendar JS-->
    <script src="/php-duhoc/public/assets/js/calendar/bootstrap_calendar.js"></script>
    <script src="/php-duhoc/public/assets/js/calendar/demo.js"></script>
    <!--Bootstrap Calendar-->

    <!--Custom Js Script-->
    <script src="/php-duhoc/public/assets/js/custom.js"></script>
    <!--Custom Js Script-->
  </body>
</html>