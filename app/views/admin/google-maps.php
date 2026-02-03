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
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <!--Custom style.css-->
    <link rel="stylesheet" href="/assets/css/quicksand.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <!--Font Awesome-->
    <link rel="stylesheet" href="/assets/css/fontawesome.css">
    <!--Chartist CSS-->
    <link rel="stylesheet" href="/assets/css/chartist.min.css">
    <!--Bootstrap Calendar-->
    <link rel="stylesheet" href="/assets/js/calendar/bootstrap_calendar.css">

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
                <h5 class="mb-0" ><strong>Google Maps</strong></h5>
                <span class="text-secondary">Maps <i class="fa fa-angle-right"></i> Google maps</span>
                
                <div class="row mt-3">
                    <div class="col-sm-6">
                        <!--Google world-->
                        <div class="mt-1 mb-3 p-3 button-container bg-white shadow-sm border">
                            <h6 class="mb-2">Google world map</h6>
                            <p class="mb-3">Default sample of google world map</p>
                            
                            <div id="google_world_map" style="width: 100%; height: 300px"></div>
                        </div>
                        <!--/Line Chart-->

                    </div>
                    
                    
                    <div class="col-sm-6">
                        <!--Area Chart-->
                        <div class="mt-1 mb-3 p-3 button-container  bg-white shadow-sm border">
                            <h6>Google Europe Map</h6>
                            <p class="mb-3">Europe map sample</p>
                            
                            <div id="google_eu_map" style="width: 100%; height: 300px;"></div>
                        </div>
                        <!--/Area Table-->
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-sm-6">
                        <!--Google world-->
                        <div class="mt-1 mb-3 p-3 button-container bg-white shadow-sm border">
                            <h6 class="mb-2">Google map with marker</h6>
                            <p class="mb-3">Place markers on map locations</p>
                            
                            <div id="google_ptm_map" style="width: 100%; height: 300px"></div>
                        </div>
                        <!--/Line Chart-->

                    </div>
                    
                    
                    <div class="col-sm-6">
                        <!--Area Chart-->
                        <div class="mt-1 mb-3 p-3 button-container  bg-white shadow-sm border">
                                <h6 class="mb-2">Google map with marker</h6>
                                <p class="mb-3">Place markers on map locations</p>
                            
                            <div id="google_search_map" style="width: 100%; height: 300px;"></div>
                        </div>
                        <!--/Area Table-->
                    </div>
                </div>

                

            </div>
        </div>

        <!--Main Content-->

    </div>

    <!--Page Wrapper-->

    <!-- Page JavaScript Files-->
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/jquery-1.12.4.min.js"></script>
    <!--Popper JS-->
    <script src="/assets/js/popper.min.js"></script>
    <!--Bootstrap-->
    <script src="/assets/js/bootstrap.min.js"></script>
    <!--Sweet alert JS-->
    <script src="/assets/js/sweetalert.js"></script>
    <!--Progressbar JS-->
    <script src="/assets/js/progressbar.min.js"></script>
    <!--Maps-->
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
    <script src="/assets/js/maps/google-map-data.js"></script>
    <!--Bootstrap Calendar JS-->
    <script src="/assets/js/calendar/bootstrap_calendar.js"></script>
    <script src="/assets/js/calendar/demo.js"></script>
    <!--Bootstrap Calendar-->

    <!--Custom Js Script-->
    <script src="/assets/js/custom.js"></script>
    <!--Custom Js Script-->
  </body>
</html>