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
    <!--Switchery CSS-->
    <link rel="stylesheet" href="/php-duhoc/public/assets/css/switchery.min.css">
    <!--Bootstrap tagsinput css-->
    <link rel="stylesheet" href="/php-duhoc/public/assets/css/bootstrap-tagsinput.css">

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
                <h5 class="mb-0" ><strong>Advanced elements</strong></h5>
                <span class="text-secondary">Dashboard <i class="fa fa-angle-right"></i> advanced elements</span>
                
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <!--Switches-->
                        <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                            <h6 class="mb-2">Switches</h6>
                            <p>Enables you to use checkboxes as sleek switches</p>

                            <div class="row mb-3">
                                <div class="col-sm-12 col-xl-4 m-b-30">
                                    <p class="">Single switch</p>
                                    <input type="checkbox" class="js-single" checked />
                                </div>

                                <div class="col-sm-12 col-xl-4 m-b-30">
                                    <p>Multiple Switches</p>
                                    <input type="checkbox" class="js-switch" checked />
                                    <input type="checkbox" class="js-switch" checked />
                                    <input type="checkbox" class="js-switch" checked />
                                </div>

                                <div class="col-sm-12 col-xl-4 m-b-30">
                                    <p>Enable Disable Switches</p>
                                    <input type="checkbox" class="js-dynamic-state" checked />
                                    <button class="btn btn-default js-dynamic-disable btn-sm">Disable Button</button>
                                    <button class="btn btn-primary js-dynamic-enable btn-sm">Enable Button</button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-8">
                                    <p>Color Switches</p>
                                    <input type="checkbox" class="js-secondary" checked />
                                    <input type="checkbox" class="js-primary" checked />
                                    <input type="checkbox" class="js-success" checked />
                                    <input type="checkbox" class="js-info" checked />
                                    <input type="checkbox" class="js-warning" checked />
                                    <input type="checkbox" class="js-danger" checked />
                                    <input type="checkbox" class="js-dark" checked />
                                </div>

                                <div class="col-sm-4">
                                    <p>Switch Sizes</p>
                                    <input type="checkbox" class="js-large" checked />
                                    <input type="checkbox" class="js-medium" checked />
                                    <input type="checkbox" class="js-small" checked />
                                </div>
                            </div>
                        </div>
                        <!--/Switches-->

                        <!--Tags-->
                        <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                            <h6 class="mb-2">Tag inputs</h6>
                            <p>Gives you a possibility to get many values separated by coma</p>

                            <input type="text" class="" value="Amsterdam,Washington,Sydney,Beijing,Cairo" data-role="tagsinput" placeholder="Add tags" >
                        </div>
                        <!--/Tags-->

                        <!--Floating label-->
                        <div class="mt-4 mb-3 p-3 button-container bg-white border shadow-sm">
                            <h6 class="mb-3">Floating labels</h6>
                            
                            <form action="">
                                <div class="form-group floating-label">
                                    <input class="form-control" type="text" required>
                                    <label for="">Username</label>
                                </div>
                                <div class="form-group floating-label">
                                    <input class="form-control" type="email" required>
                                    <label for="">Email</label>
                                </div>
                                <div class="form-group floating-label">
                                    <select name="country" id="" class="custom-select" required>
                                        <option value=""></option>
                                        <option value="USA">USA</option>
                                        <option value="Califonia">Califonia</option>
                                    </select>
                                    <label for="" class="mt-1">Choose</label>
                                </div>

                                <div class="form-group floating-label">
                                    <input class="form-control" type="password" required>
                                    <label for="">Password</label>
                                </div>

                                <div class="form-group">
                                    <button type="button" class="btn btn-primary">Create account</button>
                                </div>
                            </form>
                        </div>
                        <!--Floating label-->
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
    <!--Switchery JS-->
    <script src="/php-duhoc/public/assets/js/switchery.min.js"></script>
    <!--Bootstrap tagsinput-->
    <script src="/php-duhoc/public/assets/js/bootstrap-tagsinput.min.js"></script>

    <!--Custom Js Script-->
    <script src="/php-duhoc/public/assets/js/custom.js"></script>
    <!--Custom Js Script-->
  </body>
</html>