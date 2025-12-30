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
    <!--Alertify CSS-->
    <link rel="stylesheet" href="/php-duhoc/public/assets/css/alertify.min.css">
    <link rel="stylesheet" href="/php-duhoc/public/assets/css/themes/default.rtl.min.css">

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
                <h5 class="mb-0" ><strong>Notification</strong></h5>
                <span class="text-secondary">Dashboard <i class="fa fa-angle-right"></i> notification</span>
                
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <!--Default alert js notifier-->
                        <div class="mt-1 mb-4 p-3 button-container bg-white border shadow-sm">
                            <h6 class="mb-2">Alertify JS notifier</h6>
                            <p>You can use four different notifier: <span class="text-danger">notify, warning, success, and error message</span></p>
                            
                            <button type="button" id="alertify_nofify" class="btn btn-theme mr-2">
                               <i class="fa fa-info"></i> custom notifier
                            </button>

                            <button type="button" id="alertify_success" class="btn btn-success mr-2">
                                <i class="fa fa-check"></i> success-notifier
                             </button>

                             <button type="button" id="alertify_error" class="btn btn-danger mr-2">
                                <i class="fa fa-times"></i> error-notifier
                             </button>

                             <button type="button" id="alertify_warning" class="btn btn-warning">
                                <i class="fa fa-warning"></i> warning-notifier
                             </button>
                        </div>
                        <!--/Default alert js notifier-->

                        <!--Default alert js notifier-->
                        <div class="mt-1 mb-4 p-3 button-container bg-white border shadow-sm">
                            <h6 class="mb-2">Alertify JS notifier top-positioned</h6>
                            <p>You can use four different notifier: <span class="text-danger">notify, warning, success, and error message</span></p>
                            
                            <button type="button" id="alertify_nofify_top" class="btn btn-theme mr-2">
                               <i class="fa fa-info"></i> custom notifier
                            </button>

                            <button type="button" id="alertify_success_top" class="btn btn-success mr-2">
                                <i class="fa fa-check"></i> success-notifier
                             </button>

                             <button type="button" id="alertify_error_top" class="btn btn-danger mr-2">
                                <i class="fa fa-times"></i> error-notifier
                             </button>

                             <button type="button" id="alertify_warning_top" class="btn btn-warning">
                                <i class="fa fa-warning"></i> warning-notifier
                             </button>
                        </div>
                        <!--/Default alert js notifier-->

                        <!--Bootstrap alert-->
                        <div class="mt-1 mb-4 button-container bg-white border shadow-sm">
                            <div class="row">
                                <div class="col-sm-6">
                                    <!--/Default alerts bootstrap-->
                                    <div class="container">
                                            <h6 class="mt-3 bc-header small">Bootstrap default alerts</h6>
                                        <p class="bc-description mt-2 mb-2">Add class <code>.alert .alert-*colors*</code></p>

                                        <div class="alert alert-primary" role="alert">
                                            <p>A simple primary alert!</p>
                                        </div>
                                        <div class="alert alert-secondary" role="alert">
                                            <p>A simple secondary alert!</p>
                                        </div>
                                        <div class="alert alert-success" role="alert">
                                            <p>A simple success alert!</p>
                                        </div>
                                        <div class="alert alert-danger" role="alert">
                                            <p>A simple danger alert!</p>
                                        </div>
                                        <div class="alert alert-warning" role="alert">
                                            <p>A simple warning alert!</p>
                                        </div>
                                        <div class="alert alert-info" role="alert">
                                            <p>A simple info alert!</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/Default alerts bootstrap-->
                                
                                <!--Dismissable alerts-->
                                <div class="col-sm-6">
                                    <div class="container">
                                        <h6 class="mt-3 bc-header small">Dismissable alerts</h6>
                                        <p class="bc-description mt-2 mb-2">Add class <code>.alert .alert-*colors*</code></p>

                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <p><strong><i class="fa fa-warning"></i> Holy guacamole!</strong>check in.</p>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                                            <p><strong><i class="fa fa-power-off"></i> Holy guacamole!</strong>check in.</p>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                            <p><strong><i class="fa fa-pencil-square"></i> Holy guacamole!</strong>check in.</p>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <p><strong><i class="fa fa-check"></i> Holy guacamole!</strong>check in.</p>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <p><strong><i class="fa fa-times"></i> Holy guacamole!</strong>check in.</p>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                                            <p><strong><i class="fa fa-info"></i> Holy guacamole!</strong>check in.</p>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!--/Dismissable alerts-->

                            </div>
                        </div>
                        <!--Bootstrap alert-->
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
    <!--Alertify JS-->
    <script src="/php-duhoc/public/assets/js/alertify.min.js"></script>
    <!--/Alertify JS-->

    <!--Custom Js Script-->
    <script src="/php-duhoc/public/assets/js/custom.js"></script>
    <!--Custom Js Script-->
  </body>
</html>