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
                <h5 class="mb-0" ><strong>Invoice</strong></h5>
                <span class="text-secondary">Pages <i class="fa fa-angle-right"></i> Invoice</span>
                
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <!--Invoice-->
                        <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm lh-sm">
                            <h3 class="m-3">Invoice #INVC-557</h3>

                            <div class="dropdown-divider"></div>

                            <div class="row mt-3 mb-4">
                                <!--Address-->
                                <div class="col-md-6 col-sm-6 col-6">
                                    <div class="invoice-from">
                                        <address>
                                            <p><small>Sent to</small></p>                                           <strong>Sleekadmin Enterprise</strong>
                                            <p class="mt-1 mb-0"> 455 Alen Ave, Apartment 4B</p>
                                            <p> Los Santos, CA 94107</p>
                                        </address>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6 col-6">
                                    <div class="invoice-to text-right">
                                        <address>
                                            <p><small>Recieved from</small></p>
                                            <strong>Fluid Angle Ltd</strong>
                                            <p class="mt-1 mb-0"> 205 Mainland, Apartment 1A</p>
                                            <p> Los Santos, CA 94107</p>
                                        </address>
                                    </div>
                                </div>
                            </div>
                            <!--/Address-->

                            <!--Invoice Order-->

                            <div class="table-responsive mt-5">
                                <table class="table">
                                    <thead>
                                        <tr class="bg-secondary text-white">
                                            <th>#</th>
                                            <th>Item</th>
                                            <th>Quantity</th>
                                            <th>Unit cost</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>iPhone 5 32GB White & Silver (GSM) Unlocked</td>
                                            <td>1</td>
                                            <td>$742.00</td>
                                            <td>$742.00</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>iPad mini with Wi-Fi 32GB - White & Silver</td>
                                            <td>2</td>
                                            <td>$429.00</td>
                                            <td>$858.00</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Samsung Galaxy Grand</td>
                                            <td>1</td>
                                            <td>$300.00</td>
                                            <td>$300.00</td>
                                        </tr>
                                        <tr class="border-bottom">
                                            <td>4</td>
                                            <td>Nexus 5</td>
                                            <td>3</td>
                                            <td>$250.00</td>
                                            <td>$750.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="text-right mt-4 p-4">
                                    <p><strong>Sub - Total amount: $14,768.00</strong></p>
                                    <p><strong>Shipping: $1000.00</strong></p>
                                    <p><span>vat(10%): $150.00</span></p>
                                    <h4 class="mt-2"><strong>Total: $16,050.00</strong></h4>
                                </div>

                                <div class="dropdown-divider"></div>

                                <div class="form-group text-right p-3">
                                    <button type="button" class="btn btn-success"><i class="fa fa-send"></i> Send invoice</button>
                                    <button type="button" class="btn btn-theme ml-1"><i class="fa fa-print"></i> Print</button>
                                </div>

                            </div>

                            <!--/Invoice Order-->
                        </div>
                        <!--/Invoice-->

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