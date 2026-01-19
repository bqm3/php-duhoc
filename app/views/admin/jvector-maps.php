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
    <!--Map-->
    <link rel="stylesheet" href="/php-duhoc/public/assets/css/jquery-jvectormap-2.0.2.css">

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
                <h5 class="mb-0" ><strong>Vector Maps</strong></h5>
                <span class="text-secondary">Maps <i class="fa fa-angle-right"></i> Vector maps</span>
                
                <div class="row mt-3">
                    <div class="col-sm-6">
                        <!--Jvector world map-->
                        <div class="mt-1 mb-3 p-3 button-container bg-white shadow-sm border">
                            <h6 class="mb-3">World map</h6>
                            
                            <div id="worldMap" style="width: 100%; height: 350px"></div>
                        </div>
                        <!--/Jvector world map-->

                    </div>
                    
                    
                    <div class="col-sm-6">
                        <!--Jvector world map with marker-->
                        <div class="mt-1 mb-3 p-3 button-container bg-white shadow-sm border">
                            <h6 class="mb-3">World map with marker</h6>
                            
                            <div id="worldMapMarker" style="width: 100%; height: 350px"></div>
                        </div>
                        <!--/Jvector world map with marker-->
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-sm-6">
                        <!--Jvector USA map-->
                        <div class="mt-1 mb-3 p-3 button-container bg-white shadow-sm border">
                            <h6 class="mb-3">USA map</h6>
                            
                            <div id="usaMap" style="width: 100%; height: 350px"></div>
                        </div>
                        <!--/Jvector USA map-->

                    </div>
                    
                    
                    <div class="col-sm-6">
                        <!--Jvector UK map-->
                        <div class="mt-1 mb-3 p-3 button-container bg-white shadow-sm border">
                            <h6 class="mb-3">UK map</h6>
                            
                            <div id="ukMap" style="width: 100%; height: 350px"></div>
                        </div>
                        <!--/Jvector UK map-->
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-sm-6">
                        <!--Jvector India map-->
                        <div class="mt-1 mb-3 p-3 button-container bg-white shadow-sm border">
                            <h6 class="mb-3">India map</h6>
                            
                            <div id="indiaMap" style="width: 100%; height: 350px"></div>
                        </div>
                        <!--/Jvector India map-->

                    </div>
                    
                    
                    <div class="col-sm-6">
                        <!--Jvector Canada map-->
                        <div class="mt-1 mb-3 p-3 button-container bg-white shadow-sm border">
                            <h6 class="mb-3">Canada map</h6>
                            
                            <div id="canadaMap" style="width: 100%; height: 350px"></div>
                        </div>
                        <!--/Jvector Canada map-->
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
    <!--Maps-->
    <script src="/php-duhoc/public/assets/js/maps/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="/php-duhoc/public/assets/js/maps/jquery-jvectormap-world-mill-en.js"></script>
    <script src="/php-duhoc/public/assets/js/maps/jquery-jvectormap-us-aea-en.js"></script>
    <script src="/php-duhoc/public/assets/js/maps/jquery-jvectormap-uk-mill-en.js"></script>
    <script src="/php-duhoc/public/assets/js/maps/jquery-jvectormap-in-mill.js"></script>
    <script src="/php-duhoc/public/assets/js/maps/jquery-jvectormap-ca-lcc.js"></script>
    <script src="/php-duhoc/public/assets/js/maps/jvector-maps.js"></script>
    <!--Bootstrap Calendar JS-->
    <script src="/php-duhoc/public/assets/js/calendar/bootstrap_calendar.js"></script>
    <script src="/php-duhoc/public/assets/js/calendar/demo.js"></script>
    <!--Bootstrap Calendar-->

    <!--Custom Js Script-->
    <script src="/php-duhoc/public/assets/js/custom.js"></script>
    <!--Custom Js Script-->
  </body>
</html>