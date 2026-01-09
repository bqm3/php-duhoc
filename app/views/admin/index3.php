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
    <link rel="stylesheet" href="/php-duhoc/public/assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="/php-duhoc/public/assets/css/fontawesome.css">
    <!--Animate CSS-->
    <link rel="stylesheet" href="/php-duhoc/public/assets/css/chartist.min.css">
    <!--Map-->
    <link rel="stylesheet" href="/php-duhoc/public/assets/css/jquery-jvectormap-2.0.2.css">
    <!--Bootstrap Calendar-->
    <link rel="stylesheet" href="/php-duhoc/public/assets/js/calendar/bootstrap_calendar.css">
    
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <title>Sleek Admin</title>
  </head>
  <body>
    <!--Page loader-->
    <div class="loader-wrapper">
        <div class="loader-circle">
            <div class="loader-wave"></div>
        </div>
    </div>
    <!--Page loader-->
    
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
                <h5 class="mb-3" ><strong>Dashboard</strong></h5>
                
                <div class="row mt-1">
                    <div class="col-sm-8 col-md-8">
                        <!--Analytics-->
                        <div class="mt-1 mb-3 p-3 button-container bg-white shadow-sm border">
                            <h6 class="mb-3">Revenue Analytics</h6>
                            
                            <canvas id="revenueChart" height="300px"></canvas>
                            
                        </div>
                        <!--/Analytics-->

                    </div>

                    <div class="col-sm-4 col-md-4">
                        <!--Analytics-->
                        <div class="bg-white border shadow mb-4">
                            <div class="media p-4">
                                <div class="align-self-center mr-3 rounded-circle notify-icon_2 bg-white">
                                    <i class="fa fa-globe text-theme"></i>
                                </div>
                                <div class="media-body pl-2">
                                    <h3 class="mt-0 mb-0"><strong>1,215,509</strong></h3>
                                    <p><small class="bc-description text-theme">TOTAL VISITORS</small></p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white border shadow mb-4">
                            <div class="media p-4">
                                <div class="align-self-center mr-3 rounded-circle notify-icon_2 bg-white">
                                    <i class="fa fa-heart-o text-danger"></i>
                                </div>
                                <div class="media-body pl-2">
                                    <h3 class="mt-0 mb-0"><strong>83,509</strong></h3>
                                    <p><small class="bc-description text-danger">MENTIONS</small></p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white border shadow">
                            <div class="media p-4">
                                <div class="align-self-center mr-3 rounded-circle notify-icon_2 bg-white">
                                    <i class="fa fa-lightbulb text-success"></i>
                                </div>
                                <div class="media-body pl-2">
                                    <h3 class="mt-0 mb-0"><strong>2,500</strong></h3>
                                    <p><small class="text-success bc-description">PROJECTS</small></p>
                                </div>
                            </div>
                        </div>
                        <!--/Analytics-->

                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-sm-6 col-md-4">
                        <!--Browser usage-->
                        <div class="mt-1 mb-3 p-3 button-container bg-white shadow-sm border">
                            <h6 class="mb-3">Browser usage</h6><hr>

                            <div id="radarChartEcharts"  style="height: 300px; width: 100%"></div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <!--Store summary-->
                        <div class="mt-1 mb-3 p-3 button-container bg-white shadow-sm border">
                            <h6 class="mb-3">Store summary</h6><hr>

                            <div id="donutChartEcharts" style="height: 300px; width: 100%"></div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-4">
                        <!--Profile card-->
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="media">
                                    <img class="align-self-center mr-3 rounded-circle" src="/php-duhoc/public/assets/img/home-right-admin-img.png" width="80px" height="80px" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <h6 class="mt-0"><strong>Rasheed Rayhan</strong></h6>
                                        <p class="mb-3 text-info"><strong>Web designer</strong></p>
                                        <button type="button" class="btn btn-primary">
                                            <i class="fa fa-plus"></i> Follow
                                        </button>
                                    </div>
                                </div>

                                <div class="mt-4 mb-4">
                                    <div class="row user-about">
                                        <div class="col-sm-4 col-4 border-right">
                                            <h4>20</h4>
                                            <p>Photos</p>
                                        </div>
                                        <div class="col-sm-4 col-4">
                                            <h4>31</h4>
                                            <p>Videos</p>
                                        </div>
                                        <div class="col-sm-4 col-4 border-left">
                                            <h4>120</h4>
                                            <p>Tasks</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="dropdown-divider"></div>

                                <p class="mb-3 mt-3 text-center p-space">
                                    Lorem ipsum dolor sit ametetur adipisicing elit, sed do eiusmod tempor incididunt adipisicing elit, sed do 
                                </p>

                                <div class="flex-social mt-4 mb-3">
                                    <a href=""><i class="fa fa-facebook-square"></i></a>
                                    <a href=""><i class="fa fa-google-plus-square"></i></a>
                                    <a href=""><i class="fa fa-spotify"></i></a>
                                    <a href=""><i class="fa fa-yahoo-square"></i></a>
                                    <a href=""><i class="fa fa-twitter-square"></i></a>
                                    <a href=""><i class="fa fa-linkedin-square"></i></a>
                                    <a href=""><i class="fa fa-pinterest-square"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Realtime-->
                <div class="mt-3 row">
                    <div class="col-sm-12">
                        <div class="mt-1 mb-3 p-3 button-container bg-white shadow-sm border">
                            <h6 class="mb-3">Realtime Updates</h6><hr>
                            
                            <div class="row mb-3">
                                <div class="col-sm-6 ol-12">
                                    <h5>Current sales</h5>
                                    <h1 class="text-theme">356</h1>
                                </div>
                                <div class="col-sm-6 ol-12 text-right">
                                    <h5>Revenue</h5>
                                    <h1 class="text-danger">$5545</h1>
                                </div>
                            </div>

                            <div id="realtimeDashboard" style="width: 100%; height:150px; overflow-x: auto"></div>
                        </div>
                    </div>
                </div>
                <!--/Realtime-->

                <!--Products summary-->
                <div class="mt-4 mb-4 bg-white border shadow lh-sm">
                    <!--Recent Sales-->
                    <div class="product-list">
                        
                        <div class="row mb-0 px-3 pt-3">
                            <div class="col-sm-8 pt-2"><h6 class="mb-4 bc-header">Recent Sales</h6></div>
                            <div class="col-sm-4 text-right pb-3">
                                <div class="pull-right mr-3 btn-order-bulk">
                                    <button class="btn btn-theme btn-round">View all</button>
                                </div>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                        
                        <div class="table-responsive product-list">
                            
                            <table class="table mt-0" id="productList">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Customer</th>
                                        <th>Categories</th>
                                        <th>Popularity</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="align-middle">IphoneX</td>
                                        <td class="align-middle">
                                            <div class="customers">
                                                <span class="customer-circle" style="background-image: url('assets/img/client-img4.png')"></span>
                                                <span class="customer-circle" style="background-image: url('assets/img/client-img5.png')"></span>
                                                <span class="customer-circle" style="background-image: url('assets/img/client-img3.png')"></span>
                                                <span class="customer-circle end text-light text-center pt-2">+8</span>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <button class="btn-outline-theme btn-round">
                                                mobile
                                            </button>
                                        </td>
                                        <td class="align-middle">
                                            <div class="progress" style="height: 5px;">
                                                <div class="progress-bar bg-theme" role="progressbar" aria-valuenow="85" style="width: 85%"  aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td>$ 4,500</td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">One Plus</td>
                                        <td class="align-middle">
                                            <div class="customers">
                                                <span class="customer-circle" style="background-image: url('assets/img/client-img2.png')"></span>
                                                <span class="customer-circle" style="background-image: url('assets/img/client-img5.png')"></span>
                                                <span class="customer-circle" style="background-image: url('assets/img/jd-150.png')"></span>
                                                <span class="customer-circle end text-light text-center pt-2">+4</span>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <button class="btn-outline-theme btn-round">
                                                mobile
                                            </button>
                                        </td>
                                        <td class="align-middle">
                                            <div class="progress" style="height: 5px;">
                                                <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="55" style="width: 55%"  aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td>$ 650</td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">Samsumg S7</td>
                                        <td class="align-middle">
                                            <div class="customers">
                                                <span class="customer-circle" style="background-image: url('assets/img/client-img2.png')"></span>
                                                <span class="customer-circle" style="background-image: url('assets/img/client-img5.png')"></span>
                                                <span class="customer-circle" style="background-image: url('assets/img/jd-150.png')"></span>
                                                <span class="customer-circle end text-light text-center pt-2">+5</span>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <button class="btn-outline-theme btn-round">
                                                mobile
                                            </button>
                                        </td>
                                        <td class="align-middle">
                                            <div class="progress" style="height: 5px;">
                                                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="40" style="width: 40%"  aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td>$ 1,200</td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">Techno</td>
                                        <td class="align-middle">
                                            <div class="customers">
                                                <span class="customer-circle" style="background-image: url('assets/img/client-img3.png')"></span>
                                                <span class="customer-circle" style="background-image: url('assets/img/client-img4.png')"></span>
                                                <span class="customer-circle" style="background-image: url('assets/img/jd-150.png')"></span>
                                                <span class="customer-circle end text-light text-center pt-2">+4</span>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <button class="btn-outline-theme btn-round">
                                                mobile
                                            </button>
                                        </td>
                                        <td class="align-middle">
                                            <div class="progress" style="height: 5px;">
                                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="40" style="width: 40%"  aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td>$ 1,200</td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">Sony Xperia</td>
                                        <td class="align-middle">
                                            <div class="customers">
                                                <span class="customer-circle" style="background-image: url('assets/img/profile.jpg')"></span>
                                                <span class="customer-circle" style="background-image: url('assets/img/client-img5.png')"></span>
                                                <span class="customer-circle" style="background-image: url('assets/img/jd-150.png')"></span>
                                                <span class="customer-circle end text-light text-center pt-2">+4</span>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <button class="btn-outline-theme btn-round">
                                                mobile
                                            </button>
                                        </td>
                                        <td class="align-middle">
                                            <div class="progress" style="height: 5px;">
                                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="60" style="width: 60%"  aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td>$ 3,500</td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">HTC</td>
                                        <td class="align-middle">
                                            <div class="customers">
                                                <span class="customer-circle" style="background-image: url('assets/img/profile.jpg')"></span>
                                                <span class="customer-circle" style="background-image: url('assets/img/client-img5.png')"></span>
                                                <span class="customer-circle" style="background-image: url('assets/img/jd-150.png')"></span>
                                                <span class="customer-circle end text-light text-center pt-2">+18</span>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <button class="btn-outline-theme btn-round">
                                                mobile
                                            </button>
                                        </td>
                                        <td class="align-middle">
                                            <div class="progress" style="height: 5px;">
                                                <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="40" style="width: 40%"  aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td>$ 1,200</td>
                                    </tr>
                            </table>
                        </div>
                    </div>
                    <!--/Recent sales-->
                </div>
                <!--Product summary-->

                

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
    <!--Flot.JS-->
    <script src="/php-duhoc/public/assets/js/charts/jquery.flot.min.js"></script>
    <script src="/php-duhoc/public/assets/js/charts/jquery.flot.pie.min.js"></script>
    <script src="/php-duhoc/public/assets/js/charts/jquery.flot.categories.min.js"></script>
    <script src="/php-duhoc/public/assets/js/charts/jquery.flot.stack.min.js"></script>
    <!--Echarts-->
    <script src="/php-duhoc/public/assets/js/charts/echarts.min.js"></script>
    <script src="/php-duhoc/public/assets/js/charts/echarts-data.js"></script>
    <!--Charts JS-->
    <script src="/php-duhoc/public/assets/js/charts/chart.min.js"></script>
    <script src="/php-duhoc/public/assets/js/charts/demo.js"></script>
    <!--Maps-->
    <script src="/php-duhoc/public/assets/js/maps/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="/php-duhoc/public/assets/js/maps/jquery-jvectormap-world-mill-en.js"></script>
    <script src="/php-duhoc/public/assets/js/maps/jvector-maps.js"></script>
    <!--Bootstrap Calendar JS-->
    <script src="/php-duhoc/public/assets/js/calendar/bootstrap_calendar.js"></script>
    <script src="/php-duhoc/public/assets/js/calendar/demo.js"></script>
    <!--Nice select-->
    <script src="/php-duhoc/public/assets/js/jquery.nice-select.min.js"></script>

    <!--Custom Js Script-->
    <script src="/php-duhoc/public/assets/js/custom.js"></script>
    <!--Custom Js Script-->
    <script>
        //Nice select
        $('.bulk-actions').niceSelect();
    </script>
  </body>
</html>