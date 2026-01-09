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
    <!--Font Awesome-->
    <link rel="stylesheet" href="/php-duhoc/public/assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="/php-duhoc/public/assets/css/fontawesome.css">
    <!--Custom style.css-->
    <link rel="stylesheet" href="/php-duhoc/public/assets/css/quicksand.css">
    <link rel="stylesheet" href="/php-duhoc/public/assets/css/style.css">
    <!--Fullcalendar CSS-->
    <link rel="stylesheet" href="/php-duhoc/public/assets/css/fullcalendar-3.9.0/fullcalendar.min.css">
    <link rel="stylesheet" href="/php-duhoc/public/assets/css/fullcalendar-3.9.0/fullcalendar.print.min.css"  media='print'>
    <!--Bootstrap Calendar-->
    <link rel="stylesheet" href="/php-duhoc/public/assets/js/calendar/bootstrap_calendar.css">
    <!--Nice select-->
    <link rel="stylesheet" href="/php-duhoc/public/assets/css/nice-select.css">

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
                <h5 class="mb-0" ><strong>Fullcalendar</strong></h5>
                <span class="text-secondary">Pages <i class="fa fa-angle-right"></i> fullcalendar</span>
                
                <div class="row mt-3">
                    <div class="col-md-12 col-sm-12">
                        <!--Full Calendar-->
                        <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm lh-sm">
                            <div class="email-msg">
                                
                                <div class="table-responsive" id="calendarFull"></div>

                            </div>
                        </div>
                        <!--/Email messages-->

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
    <!--Full calendar-->
    <script src="/php-duhoc/public/assets/css/fullcalendar-3.9.0/lib/moment.min.js"></script>
    <script src="/php-duhoc/public/assets/css/fullcalendar-3.9.0/fullcalendar.min.js"></script>
    <script src="/php-duhoc/public/assets/js/full-calendar.js"></script>
    <!--Nice select-->
    <script src="/php-duhoc/public/assets/js/jquery.nice-select.min.js"></script>
    <!--Custom Js Script-->
    <script src="/php-duhoc/public/assets/js/custom.js"></script>
  </body>
</html>