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
                <h5 class="mb-0" ><strong>Progressbar</strong></h5>
                <span class="text-secondary">Dashboard <i class="fa fa-angle-right"></i> progressbar</span>
                
                <div class="row mt-3">
                    <div class="col-sm-6">
                        <!--Default progress-->
                        <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                            <h6 class="mb-2">Default progressbar</h6>
                            <p>use class <span class="text-danger">.progress-bar</span> inside <span class="text-danger">.progress</span></p>
                            
                            <div class="progress mb-4">
                                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="progress mb-4">
                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="progress mb-4">
                                <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="progress mb-4">
                                <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <!--/Default progressbar-->

                        <!--Color progressbar-->
                        <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                            <h6 class="mb-2">Color progressbar</h6>
                            <p>use classes <span class="text-danger">.bg-secondary, .bg-dark, .bg-info, .bg-warning, .bg-danger</span></p>
                            
                            <div class="progress mb-4">
                                <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="10" style="width: 10%"  aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-dark" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <!--/Color progressbar-->

                        <!--Stripped progressbar-->
                        <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                            <h6 class="mb-2">Stripped progressbar</h6>
                            <p>Add <span class="text-danger">.progress-bar-striped</span> to any <span class="text-danger">.progress-bar</span></p>
                            
                            <div class="progress mb-4">
                                <div class="progress-bar bg-secondary progress-bar-striped" role="progressbar" aria-valuenow="10" style="width: 10%"  aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-dark progress-bar-striped" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-danger progress-bar-striped" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-success progress-bar-striped" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-warning progress-bar-striped" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-info progress-bar-striped" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <!--/Stripped progressbar-->

                        <!--Animated progressbar-->
                        <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                            <h6 class="mb-2">Animated progressbar</h6>
                            <p>Add <span class="text-danger">.progress-bar-animated</span> to any <span class="text-danger">.progress-bar</span></p>
                            
                            <div class="progress mb-4">
                                <div class="progress-bar bg-secondary progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="10" style="width: 10%"  aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-dark progress-bar-striped progress-bar-animated" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <!--/Animated progressbar-->

                    </div>

                    <div class="col-sm-6">
                        <!--progressbar labels-->
                        <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                            <h6 class="mb-2">Labels</h6>
                            <p>Add labels by placing text within the <span class="text-danger">.progress-bar</span></p>
                            
                            <div class="progress mb-4">
                                <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="10" style="width: 10%"  aria-valuemin="0" aria-valuemax="100">10%</div>
                            </div>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-dark" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                            </div>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">35%</div>
                            </div>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                            </div>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">65%</div>
                            </div>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90%</div>
                            </div>
                        </div>
                        <!--/Progressbar Labels-->

                        <!--Height progressbar-->
                        <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                            <h6 class="mb-2">Height</h6>
                            <p>Add <span class="text-danger">height</span> to the <span class="text-danger">.progress</span></p>
                            
                            <div class="progress mb-4" style="height: 5px;">
                                <div class="progress-bar bg-secondary progress-bar-striped" role="progressbar" aria-valuenow="10" style="width: 10%"  aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="progress mb-4" style="height: 8px;">
                                <div class="progress-bar bg-dark progress-bar-striped" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="progress mb-4" style="height: 10px;">
                                <div class="progress-bar bg-danger progress-bar-striped" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="progress mb-4" style="height: 12px;">
                                <div class="progress-bar bg-success progress-bar-striped" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="progress mb-4" style="height: 13px;">
                                <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="progress mb-4" style="height: 14px;">
                                <div class="progress-bar bg-warning progress-bar-striped" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="progress" style="height: 15px;">
                                <div class="progress-bar bg-info progress-bar-striped" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <!--/Height progressbar-->

                        <!--Skill bars-->
                        <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                            <h6 class="mb-2">Skill bars</h6>
                            
                            <p class="mb-2 mt-3">Photoshop <span class="pull-right">70%</span></p>
                            <div class="progress mb-4" style="height: 7px;">
                                <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="70" style="width: 70%"  aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                            <p class="mb-2">Illustrator <span class="pull-right">65%</span></p>
                            <div class="progress mb-4" style="height: 7px;">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                            <p class="mb-2">Code Editor <span class="pull-right">85%</span></p>
                            <div class="progress mb-4" style="height: 7px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                            <p class="mb-2">Corel draw <span class="pull-right">55%</span></p>
                            <div class="progress mb-4" style="height: 7px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                            <p class="mb-2">Dreamweaver <span class="pull-right">75%</span></p>
                            <div class="progress mb-4" style="height: 7px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                            <p class="mb-2">Sketch <span class="pull-right">90%</span></p>
                            <div class="progress" style="height: 7px;">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <!--/Skill bars-->

                        <!--Multiple bars-->
                        <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                            <h6 class="mb-2">Multiple bars</h6>
                            <p class="mb-2">Include multiple progress bars in a progress component</p>
                            <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar bg-secondary" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar bg-dark" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <!--/Multiple bars-->

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
    <!--Canvas JS-->
    <script src="/php-duhoc/public/assets/js/charts/canvas.min.js"></script>
    <!--Bootstrap Calendar JS-->
    <script src="/php-duhoc/public/assets/js/calendar/bootstrap_calendar.js"></script>
    <script src="/php-duhoc/public/assets/js/calendar/demo.js"></script>
    <!--Bootstrap Calendar-->

    <!--Custom Js Script-->
    <script src="/php-duhoc/public/assets/js/custom.js"></script>
    <!--Custom Js Script-->
  </body>
</html>