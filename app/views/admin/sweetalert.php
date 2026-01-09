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
                <h5 class="mb-0" ><strong>Sweet alert</strong></h5>
                <span class="text-secondary">Dashboard <i class="fa fa-angle-right"></i> sweet alert</span>
                
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <!--Basic alerts-->
                        <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                            <h6 class="mb-2">Showing an alert</h6>
                            
                            <button type="button" id="show_alert" class="btn btn-theme">
                               <i class="fa fa-play"></i> preview alert
                            </button>

                            <button type="button" id="show_with_title" class="btn btn-theme">
                                <i class="fa fa-play"></i> preview alert with title
                             </button>
                        </div>
                        <!--/Basic alerts-->

                        <!--Alert types-->
                        <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                            <h6 class="mb-2 bc-header">Alert types</h6>
                            <p class="mt-1 bc-description">There are 4 predefined types: <span class="text-danger">"warning", "error", "success" and "info"</span> .</p>
                            
                            <button type="button" id="show_alert_info" class="btn btn-theme">
                               <i class="fa fa-info"></i> alert-info
                            </button>

                            <button type="button" id="show_alert_success" class="btn btn-success">
                                <i class="fa fa-check"></i> alert-success
                             </button>

                             <button type="button" id="show_alert_error" class="btn btn-danger">
                                <i class="fa fa-times"></i> alert-error
                             </button>

                             <button type="button" id="show_alert_warning" class="btn btn-warning">
                                <i class="fa fa-warning"></i> alert-warning
                             </button>
                        </div>
                        <!--/Alert types-->

                        <!--Using promises-->
                        <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                            <h6 class="mb-2 bc-header">Using promises</h6>
                            <p class="mt-1 bc-description">Sweetalert uses <span class="text-danger">promises</span> to keep track of how the user interacts with the alert..</p>
                            
                            <button type="button" id="show_alert_promise_one" class="btn btn-theme">
                               <i class="fa fa-play"></i> Preview demo one
                            </button>

                            <button type="button" id="show_alert_promise_two" class="btn btn-theme">
                                <i class="fa fa-play"></i> Preview demo two
                             </button>
                        </div>
                        <!--/Using promises-->

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