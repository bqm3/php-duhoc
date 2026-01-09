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
                <h5 class="mb-0" ><strong>Tables</strong></h5>
                <span class="text-secondary">Dashboard <i class="fa fa-angle-right"></i> Basic tables</span>
                
                <div class="row mt-3">
                    <div class="col-sm-6">
                        <!--Basic Table-->
                        <div class="mt-1 mb-3 p-3 button-container bg-white shadow-sm border">
                            <h6>Basic table</h6>
                            <p class="mb-2">Add class <code>table</code></p>
                            
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Profile</th>
                                            <th>VatNo.</th>
                                            <th>Created</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Clarke</td>
                                            <td>44475531</td>
                                            <td>12 May 2017</td>
                                            <td><label class="badge badge-danger badge-pill">Pending</label></td>
                                        </tr>
                                        <tr>
                                            <td>Salah</td>
                                            <td>40975532</td>
                                            <td>15 May 2017</td>
                                            <td><label class="badge badge-warning badge-pill">In progress</label></td>
                                        </tr>
                                        <tr>
                                            <td>Mane</td>
                                            <td>40075533</td>
                                            <td>14 May 2017</td>
                                            <td><label class="badge badge-info badge-pill">Fixed</label></td>
                                        </tr>
                                        <tr>
                                            <td>Peter</td>
                                            <td>34475534</td>
                                            <td>16 May 2017</td>
                                            <td><label class="badge badge-success badge-pill">Completed</label></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--/Basic Table-->

                    </div>
                    
                    
                    <div class="col-sm-6">
                        <!--Hoverable Table-->
                        <div class="mt-1 mb-3 p-3 button-container  bg-white shadow-sm border">
                            <h6>Hoverable table</h6>
                            <p class="mb-2">Add class <code>table-hover</code></p>

                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Profile</th>
                                            <th>VatNo.</th>
                                            <th>Created</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Clarke</td>
                                            <td>44475531</td>
                                            <td>12 May 2017</td>
                                            <td><label class="badge badge-danger badge-pill">Pending</label></td>
                                        </tr>
                                        <tr>
                                            <td>Salah</td>
                                            <td>40975532</td>
                                            <td>15 May 2017</td>
                                            <td><label class="badge badge-warning badge-pill">In progress</label></td>
                                        </tr>
                                        <tr>
                                            <td>Mane</td>
                                            <td>40075533</td>
                                            <td>14 May 2017</td>
                                            <td><label class="badge badge-info badge-pill">Fixed</label></td>
                                        </tr>
                                        <tr>
                                            <td>Peter</td>
                                            <td>34475534</td>
                                            <td>16 May 2017</td>
                                            <td><label class="badge badge-success badge-pill">Completed</label></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--/Hoverable Table-->
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-sm-12">
                        <!--Striped table-->
                        <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                            <h6 class="mb-2">Striped tables</h6>
                            <p class="mb-2">Add class <code>table-striped</code></p>
                            
                            <table class="table table-striped" id="project_table">
                                <thead>
                                    <tr>
                                        <th>Project id</th>
                                        <th>Project name</th>
                                        <th>Progress</th>
                                        <th>Start date</th>
                                        <th>Due date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>00</td>
                                        <td>Design and Wireframes</td>
                                        <td>
                                            <div class="progress mt-3" style="height: 7px;">
                                                <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="40" style="width: 40%"  aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td>12 May 2017</td>
                                        <td>13 Feb, 2018</td>
                                        <td><label class="badge badge-danger badge-pill">Pending</label></td>
                                    </tr>
                                    <tr>
                                        <td>01</td>
                                        <td>Web design</td>
                                        <td>
                                            <div class="progress mt-3" style="height: 7px;">
                                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" style="width: 100%"  aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td>13 Feb, 2018</td>
                                        <td>10 June, 2018</td>
                                        <td><span class="badge badge-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>02</td>
                                        <td>App development</td>
                                        <td>
                                            <div class="progress mt-3" style="height: 7px;">
                                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="55" style="width: 55%"  aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td>03 July, 2018</td>
                                        <td>09 November, 2018</td>
                                        <td><span class="badge badge-warning">Pending</span></td>
                                    </tr>
                                    <tr>
                                        <td>03</td>
                                        <td>App prototyping</td>
                                        <td>
                                            <div class="progress mt-3" style="height: 7px;">
                                                <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="80" style="width: 80%"  aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td>31 January, 2018</td>
                                        <td>02 September, 2018</td>
                                        <td><span class="badge badge-danger">Suspended</span></td>
                                    </tr>
                                    <tr>
                                        <td>04</td>
                                        <td>Web development</td>
                                        <td>
                                            <div class="progress mt-3" style="height: 7px;">
                                                <div class="progress-bar bg-info" role="progressbar" aria-valuenow="50" style="width: 50%"  aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td>23 October, 2018</td>
                                        <td>15 December, 2018</td>
                                        <td><span class="badge badge-info">Negotiations</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!--/Striped table-->

                        <!--Bordered table-->
                        <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                            <h6 class="mb-2">Striped tables</h6>
                            <p class="mb-2">Add class <code>table-bordered</code></p>
                            
                            <table class="table table-bordered" id="project_table">
                                <thead>
                                    <tr>
                                        <th>Project id</th>
                                        <th>Project name</th>
                                        <th>Progress</th>
                                        <th>Start date</th>
                                        <th>Due date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>00</td>
                                        <td>Design and Wireframes</td>
                                        <td>
                                            <div class="progress mt-3" style="height: 7px;">
                                                <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="40" style="width: 40%"  aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td>12 May 2017</td>
                                        <td>13 Feb, 2018</td>
                                        <td><label class="badge badge-danger badge-pill">Pending</label></td>
                                    </tr>
                                    <tr>
                                        <td>01</td>
                                        <td>Web design</td>
                                        <td>
                                            <div class="progress mt-3" style="height: 7px;">
                                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" style="width: 100%"  aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td>13 Feb, 2018</td>
                                        <td>10 June, 2018</td>
                                        <td><span class="badge badge-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>02</td>
                                        <td>App development</td>
                                        <td>
                                            <div class="progress mt-3" style="height: 7px;">
                                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="55" style="width: 55%"  aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td>03 July, 2018</td>
                                        <td>09 November, 2018</td>
                                        <td><span class="badge badge-warning">Pending</span></td>
                                    </tr>
                                    <tr>
                                        <td>03</td>
                                        <td>App prototyping</td>
                                        <td>
                                            <div class="progress mt-3" style="height: 7px;">
                                                <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="80" style="width: 80%"  aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td>31 January, 2018</td>
                                        <td>02 September, 2018</td>
                                        <td><span class="badge badge-danger">Suspended</span></td>
                                    </tr>
                                    <tr>
                                        <td>04</td>
                                        <td>Web development</td>
                                        <td>
                                            <div class="progress mt-3" style="height: 7px;">
                                                <div class="progress-bar bg-info" role="progressbar" aria-valuenow="50" style="width: 50%"  aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td>23 October, 2018</td>
                                        <td>15 December, 2018</td>
                                        <td><span class="badge badge-info">Negotiations</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!--/Bordered table-->

                        <!--Inverse table-->
                        <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                            <h6 class="mb-2">Striped tables</h6>
                            <p class="mb-2">Add class <code>table-dark</code></p>
                            
                            <table class="table table-dark" id="project_table">
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Project name</th>
                                        <th>Progress</th>
                                        <th>Start date</th>
                                        <th>Due date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <img src="/php-duhoc/public/assets/img/client-img5.png" class="rounded" alt="">
                                        </td>
                                        <td>Design and Wireframes</td>
                                        <td>
                                            <div class="progress mt-3" style="height: 7px;">
                                                <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="40" style="width: 40%"  aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td>12 May 2017</td>
                                        <td>13 Feb, 2018</td>
                                        <td><label class="badge badge-danger badge-pill">Pending</label></td>
                                    </tr>
                                    <tr>
                                        <td><img src="/php-duhoc/public/assets/img/client-img4.png" class="rounded" alt=""></td>
                                        <td>Web design</td>
                                        <td>
                                            <div class="progress mt-3" style="height: 7px;">
                                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" style="width: 100%"  aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td>13 Feb, 2018</td>
                                        <td>10 June, 2018</td>
                                        <td><span class="badge badge-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="/php-duhoc/public/assets/img/client-img2.png" class="rounded" alt="">
                                        </td>
                                        <td>App development</td>
                                        <td>
                                            <div class="progress mt-3" style="height: 7px;">
                                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="55" style="width: 55%"  aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td>03 July, 2018</td>
                                        <td>09 November, 2018</td>
                                        <td><span class="badge badge-warning">Pending</span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="/php-duhoc/public/assets/img/client-img3.png" class="rounded" alt="">
                                        </td>
                                        <td>App prototyping</td>
                                        <td>
                                            <div class="progress mt-3" style="height: 7px;">
                                                <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="80" style="width: 80%"  aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td>31 January, 2018</td>
                                        <td>02 September, 2018</td>
                                        <td><span class="badge badge-danger">Suspended</span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="/php-duhoc/public/assets/img/client-img2.png" class="rounded" alt="">
                                        </td>
                                        <td>Web development</td>
                                        <td>
                                            <div class="progress mt-3" style="height: 7px;">
                                                <div class="progress-bar bg-info" role="progressbar" aria-valuenow="50" style="width: 50%"  aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td>23 October, 2018</td>
                                        <td>15 December, 2018</td>
                                        <td><span class="badge badge-info">Negotiations</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!--/Inverse table-->

                        <!--Contextual classes table-->
                        <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                            <h6 class="mb-2">Table with contextual classes</h6>
                            <p class="mb-2">Add class <code>table-*color*</code></p>
                            
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>First name</th>
                                            <th>Product</th>
                                            <th>Amount</th>
                                            <th>Deadline</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="table-info">
                                            <td>1</td>
                                            <td>Herman Beck</td>
                                            <td>Photoshop</td>
                                            <td>$ 77.99</td>
                                            <td>May 15, 2015</td>
                                        </tr>
                                        <tr class="table-warning">
                                            <td>2</td>
                                            <td>Messsy Adam</td>
                                            <td>Flash</td>
                                            <td>$245.30</td>
                                            <td>July 1, 2015</td>
                                        </tr>
                                        <tr class="table-danger">
                                            <td>3</td>
                                            <td>John Richards</td>
                                            <td>Premeire</td>
                                            <td>$138.00</td>
                                            <td>Apr 12, 2015</td>
                                        </tr>
                                        <tr class="table-success">
                                            <td>4</td>
                                            <td>Peter Meggik</td>
                                            <td>After effects</td>
                                            <td>$ 77.99</td>
                                            <td>May 15, 2015</td>
                                        </tr>
                                        <tr class="table-primary">
                                            <td>5</td>
                                            <td>Edward</td>
                                            <td>Illustrator</td>
                                            <td>$ 160.25</td>
                                            <td>May 03, 2015</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--/Contextual classes  table-->

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