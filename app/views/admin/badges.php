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
                <h5 class="mb-0" ><strong>Badges</strong></h5>
                <span class="text-secondary">Dashboard <i class="fa fa-angle-right"></i> Badges</span>
                
                <div class="row mt-3">
                    
                    <div class="col-sm-12">
                        <!--Basic badges-->
                        <div class="mt-1 mb-4 p-3 button-container border bg-white shadow-sm">
                            <h6 class="mb-2">Basic examples</h6>
                            <p class="mt-1">Badges can be used as part of links or buttons to provide a counter. e.g <span class="text-danger">.badge .badge-primary</span> to span element</p>
                            <button type="button" class="btn btn-primary">
                                Notifications <span class="badge badge-light">4</span>
                            </button>
                            <button type="button" class="btn btn-primary">
                                Profile <span class="badge badge-light">9</span>
                                <span class="sr-only">unread messages</span>
                            </button>
                        </div>
                        <!--/Basic badge-->

                        <!--Badge variations-->
                        <div class="mt-1 mb-4 p-3 button-container border bg-white shadow-sm">
                            <h6 class="mb-2">Badge variations</h6>
                            <p class="mt-1">use classes <span class="text-danger">.badge .badge-color*</span> on span</p>
                            <span class="badge badge-primary">Primary</span>
                            <span class="badge badge-secondary">Secondary</span>
                            <span class="badge badge-success">Success</span>
                            <span class="badge badge-danger">Danger</span>
                            <span class="badge badge-warning">Warning</span>
                            <span class="badge badge-info">Info</span>
                            <span class="badge badge-light">Light</span>
                            <span class="badge badge-dark">Dark</span>
                        </div>
                        <!--/Badge variations-->

                        <!--Badge variations-->
                        <div class="mt-1 mb-4 p-3 button-container border bg-white shadow-sm">
                            <h6 class="mb-2">Badge variations with padding</h6>
                            <p>use bootstrap <span class="text-danger">padding p-*</span> classes along with <span class="text-danger">.badge</span> class</p>
                            <span class="badge badge-primary p-2">Primary</span>
                            <span class="badge badge-secondary p-2">Secondary</span>
                            <span class="badge badge-success p-2">Success</span>
                            <span class="badge badge-danger p-2">Danger</span>
                            <span class="badge badge-warning p-2">Warning</span>
                            <span class="badge badge-info p-2">Info</span>
                            <span class="badge badge-light p-2">Light</span>
                            <span class="badge badge-dark p-2">Dark</span>
                        </div>
                        <!--/Badge variations-->

                        <!--Pill badges-->
                        <div class="mt-1 mb-4 p-3 button-container border bg-white shadow-sm">
                            <h6 class="mb-2">Pill badges</h6>
                            <p class="mt-1">Use the <span class="text-danger">.badge-pill</span> modifier class to make badges more rounded.</p>
                            <span class="badge badge-pill badge-primary">Primary</span>
                            <span class="badge badge-pill badge-secondary">Secondary</span>
                            <span class="badge badge-pill badge-success">Success</span>
                            <span class="badge badge-pill badge-danger">Danger</span>
                            <span class="badge badge-pill badge-warning">Warning</span>
                            <span class="badge badge-pill badge-info">Info</span>
                            <span class="badge badge-pill badge-light">Light</span>
                            <span class="badge badge-pill badge-dark">Dark</span>
                        </div>
                        <!--/Pill badges-->

                    </div>

                </div>

                <div class="row mt-3">
                    <div class="col-sm-12">
                        <!--Pill badges with padding-->
                        <div class="mt-1 mb-4 p-3 button-container border bg-white shadow-sm">
                            <h6 class="mb-2">Pill badger with padding</h6>
                            <p>use bootstrap <span class="text-danger">padding p-*</span> classes along with <span class="text-danger">.badge .badge-pill</span> classes</p>
                            <span class="badge badge-pill badge-primary p-2">Primary</span>
                            <span class="badge badge-pill badge-secondary p-2">Secondary</span>
                            <span class="badge badge-pill badge-success p-2">Success</span>
                            <span class="badge badge-pill badge-danger p-2">Danger</span>
                            <span class="badge badge-pill badge-warning p-2">Warning</span>
                            <span class="badge badge-pill badge-info p-2">Info</span>
                            <span class="badge badge-pill badge-light p-2">Light</span>
                            <span class="badge badge-pill badge-dark p-2">Dark</span>
                        </div>
                        <!--/Pill with padding-->

                        <!--Links-->
                        <div class="mt-1 mb-4 p-3 button-container border bg-white shadow-sm">
                            <h6 class="mb-2">Links</h6>
                            <p class="mt-1">Using the contextual <span class="text-danger">.badge-*</span> classes on an element quickly provide actionable badges with hover and focus states.</p>
                            <a href="#" class="badge badge-primary">Primary</a>
                            <a href="#" class="badge badge-secondary">Secondary</a>
                            <a href="#" class="badge badge-success">Success</a>
                            <a href="#" class="badge badge-danger">Danger</a>
                            <a href="#" class="badge badge-warning">Warning</a>
                            <a href="#" class="badge badge-info">Info</a>
                            <a href="#" class="badge badge-light">Light</a>
                            <a href="#" class="badge badge-dark text-white">Dark</a>
                        </div>
                        <!--/Links-->
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