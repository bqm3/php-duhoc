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
    <link rel="stylesheet" href="/php-duhoc/public/assets/css/animate.min.css">
    <!--Chartist CSS-->
    <link rel="stylesheet" href="/php-duhoc/public/assets/css/chartist.min.css">
    <!--Morris Css-->
    <link rel="stylesheet" href="/php-duhoc/public/assets/css/morris.css">
    <!--Map-->
    <link rel="stylesheet" href="/php-duhoc/public/assets/css/jquery-jvectormap-2.0.2.css">
    <!--Bootstrap Calendar-->
    <link rel="stylesheet" href="/php-duhoc/public/assets/js/calendar/bootstrap_calendar.css">
    <!--Nice select -->
    <link rel="stylesheet" href="/php-duhoc/public/assets/css/nice-select.css">

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <title>Du học</title>
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
                
                <!--Dashboard widget-->
                <div class="mt-1 mb-3 button-container">
                    <div class="row pl-0">
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
                            <div class="bg-white border shadow">
                                <div class="p-2 text-center">
                                    <h5 class="mb-0 mt-2 text-theme"><small><strong>INCOME</strong></small></h5>
                                    <h1>$36,500</h1>
                                </div>
                                <div class="align-bottom">
                                    <span id="incomeBar"></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
                            <div class="bg-white border shadow">
                                <div class="p-2 text-center">
                                    <h5 class="mb-0 mt-2 text-danger"><small><strong>EXPENSES</strong></small></h5>
                                    <h1>$10,850</h1>
                                </div>
                                <div class="align-bottom">
                                    <span id="expensesBar"></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
                            <div class="bg-white border shadow">
                                <div class="p-2 text-center">
                                    <h5 class="mb-0 mt-2 text-green"><small><strong>GROSS PROFIT</strong></small></h5>
                                    <h1>$25,650</h1>
                                </div>
                                <div class="align-bottom">
                                    <span id="profitBar"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/Dashboard widget-->

                <div class="row mt-3">
                    <div class="col-sm-12 col-md-8">
                        <!--Analytics-->
                        <div class="mt-1 mb-3 p-3 button-container bg-white shadow-sm border">
                            <h6 class="mb-3">Analytics</h6><hr>
                            
                            <canvas id="orderRevenue" class="orderRevenue" height="120px"></canvas>
                            
                        </div>
                        <!--/Analytics-->

                    </div>
                    
                    
                    <div class="col-sm-12 col-md-4">
                        <!--Custom Sales small chart-->
                        <div class="mt-1 mb-3 button-container bg-white border shadow-sm lh-sm">
                            <div class="fb-follow-widget">
                                <div class="fb-widget-top bg-theme text-white">
                                    <div class="row p-3 fb-widget-top-desc">
                                        <div class="col-sm-6 col-6">
                                            <h5>Sales</h5>
                                            <small>2016.9.12</small>
                                        </div>
                                        <div class="col-sm-6 col-6 text-right">
                                            <h5><i class="fa fa-caret-up"></i> 260</h5>
                                            <small>2016.9.12</small>
                                        </div>
                                    </div>
                                    <div class="ct-chart" id="areaChartFb" style="width: 100%; height:100px"></div>
                                </div>
                                <div class="fb-widget-bottom">
                                    <div class="row p-3 fb-widget-bottom">
                                        <div class="col-sm-6 col-6 fb-wb-inner">
                                           <p> <small><i class="fa fa-circle text-danger"></i> 32% dietary intake</small></p>
                                            <p><small><i class="fa fa-circle text-theme"></i> 68% motion capture</small></p>
                                            <h5>Total : <span class="text-theme">3000</span></h5>
                                        </div>
                                        <div class="col-sm-6 col-6 text-right">
                                            <div id="fbFollowChart" style="height: 130px"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--/Custom Sales small chart-->
                    </div>
                </div>

                <!--Custom cards section-->
                <div class="row">
                    <!--Visitors statistics card-->
                    <div class="col-sm-4 custom-card">
                        <div class="mt-1 mb-3 button-container p-3 bg-white border shadow lh-sm">
                            <div class="text-center mb-3">
                                <h5 class="mb-0 mt-2"><small>Visitors</small></h5>
                                <h2>2,367</h2>
                            </div>

                            <svg viewBox="0 0 36 25" class="circular-chart blue">
                                <path class="circle-bg"
                                d="M18 2.0845
                                    a 7.9567 7.9567 0 0 1 0 15.9134
                                    a 7.9567 7.9567 0 0 1 0 -15.9134"
                                />
                                <path class="circle"
                                stroke-dasharray="40, 60"
                                d="M18 2.0845
                                    a 7.9567 7.9567 0 0 1 0 15.9134
                                    a 7.9567 7.9567 0 0 1 0 -15.9134"
                                />
                                <text x="18" y="12.00" class="percentage">&#xf0c0;</text>
                            </svg>
                            <div class="row mx-2">
                                <div class="col-sm-6 col-12">
                                    <h5>1,507</h5>
                                    <span class="text-muted small"><strong>Male visitors</strong></span>
                                </div>
                                <div class="col-sm-6 col-12 text-right">
                                    <h5>854</h5>
                                    <span class="text-muted small"><strong>Female visitors</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/Visitors statistics card-->

                    <!--Transaction statistics card-->
                    <div class="col-sm-4 custom-card">
                        <div class="mt-1 mb-3 button-container p-3 bg-white border shadow lh-sm">
                            <div class="text-center mb-3">
                                <h5 class="mb-0 mt-2"><small>Transactions</small></h5>
                                <h2>15,367</h2>
                            </div>
                            
                            <svg viewBox="0 0 36 25" class="circular-chart red">
                                <path class="circle-bg"
                                d="M18 2.0845
                                    a 7.9567 7.9567 0 0 1 0 15.9134
                                    a 7.9567 7.9567 0 0 1 0 -15.9134"
                                />
                                <path class="circle"
                                stroke-dasharray="40, 60"
                                d="M18 2.0845
                                    a 7.9567 7.9567 0 0 1 0 15.9134
                                    a 7.9567 7.9567 0 0 1 0 -15.9134"
                                />
                                <text x="18" y="12.00" class="percentage">&#xf1ed;</text>
                            </svg>

                            <div class="row mx-2">
                                <div class="col-sm-6 col-12">
                                    <h5>15,300</h5>
                                    <span class="text-muted small"><strong>Payments done</strong></span>
                                </div>
                                <div class="col-sm-6 col-12 text-right">
                                    <h5>67</h5>
                                    <span class="text-muted small"><strong>Payments due</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/Transaction statistics card-->

                    <!--Tasks statistics card-->
                    <div class="col-sm-4 custom-card">
                        <div class="mt-1 mb-3 button-container p-3 bg-white border shadow lh-sm">
                            <div class="text-center mb-3">
                                <h5 class="mb-0 mt-2"><small>Tasks</small></h5>
                                <h2>585</h2>
                            </div>

                            <svg viewBox="0 0 36 25" class="circular-chart green">
                                <path class="circle-bg"
                                d="M18 2.0845
                                    a 7.9567 7.9567 0 0 1 0 15.9134
                                    a 7.9567 7.9567 0 0 1 0 -15.9134"
                                />
                                <path class="circle"
                                stroke-dasharray="40, 60"
                                d="M18 2.0845
                                    a 7.9567 7.9567 0 0 1 0 15.9134
                                    a 7.9567 7.9567 0 0 1 0 -15.9134"
                                />
                                <text x="18" y="12.00" class="percentage">&#xf0ae;</text>
                            </svg>

                            <div class="row mx-2">
                                <div class="col-sm-6 col-12">
                                    <h5>490</h5>
                                    <span class="text-muted small"><strong>Completed</strong></span>
                                </div>
                                <div class="col-sm-6 col-12 text-right">
                                    <h5>95</h5>
                                    <span class="text-muted small"><strong>Pending</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Transaction statistics card-->
                </div>
                <!--Custom cards Section-->

                <div class="row pl-0 mt-3">
                    <!--Dashboard widget Contacts-->
                    <div class="col-lg-4 col-md-4 col-sm-4 card-pro mb-3">
                        <div class="card shadow">
                            <div class="card-body">
                                <h5 class="card-title bc-header">Contacts</h5>
                                
                                <div class="media border-top border-bottom pt-1">
                                    <img class="align-self-center mr-2 rounded-circle mb-1" src="/php-duhoc/public/assets/img/client-img2.png" width="40px" height="40px" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <p class="bc-description mt-2">Sarah Reeves <span class="pull-right"><i class="fa fa-pencil"></i></span></p>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>

                                <div class="media border-bottom pt-1">
                                    <img class="align-self-center mr-2 rounded-circle mb-1" src="/php-duhoc/public/assets/img/client-img3.png" width="40px" height="40px" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <p class="bc-description mt-2">Hermoine Potter <span class="pull-right"><i class="fa fa-pencil"></i></span></p>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>

                                <div class="media border-bottom pt-1">
                                    <img class="align-self-center mr-2 rounded-circle mb-1" src="/php-duhoc/public/assets/img/client-img4.png" width="40px" height="40px" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <p class="bc-description mt-2">Max Longbottom <span class="pull-right"><i class="fa fa-pencil"></i></span></p>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>

                                <div class="media border-bottom pt-1">
                                    <img class="align-self-center mr-2 rounded-circle mb-1" src="/php-duhoc/public/assets/img/client-img5.png" width="40px" height="40px" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <p class="bc-description mt-2">Slyvester Jake <span class="pull-right"><i class="fa fa-pencil"></i></span></p>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>

                                <div class="media border-bottom pt-1">
                                    <img class="align-self-center mr-2 rounded-circle mb-1" src="/php-duhoc/public/assets/img/profile.jpg" width="40px" height="40px" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <p class="bc-description mt-2">Adam Hussein <span class="pull-right"><i class="fa fa-pencil"></i></span></p>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>

                                <div class="media border-bottom pt-1">
                                    <img class="align-self-center mr-2 rounded-circle mb-1" src="/php-duhoc/public/assets/img/client-img2.png" width="40px" height="40px" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <p class="bc-description mt-2">Stephenie Mark <span class="pull-right"><i class="fa fa-pencil"></i></span></p>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>

                                <div class="media pt-1">
                                    <img class="align-self-center mr-2 rounded-circle mb-1" src="/php-duhoc/public/assets/img/client-img3.png" width="40px" height="40px" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <p class="bc-description mt-2">Mariya John <span class="pull-right"><i class="fa fa-pencil"></i></span></p>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--Dashboard widget Contacts-->

                    <!--Dashboard Profile card-->
                    <div class="col-lg-4 col-md-4 col-sm-4 card-pro mb-3">
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
                    <!--Dashboard Profile card-->

                    <div class="col-lg-4 col-md-4 col-sm-4 card-calendar mb-3">
                        <!--Calendar-->
                        <div class="calendar-wrapper panel-head-primary shadow">
                            <div id="calendar" class="calendar-box"></div>
                            <div class="dropdown-divider"></div>
                            <div class="time pl-3 pr-3 pb-1">
                                <h6 class="p-typo"><strong>Meet a friend</strong> <span class="badge badge-success pull-right">10:00am</span></h6>
                            </div>
                        </div>
                        <!--Calendar-->

                        <div class="card text-white bg-success mb-3 mt-2 shadow">
                            <div class="card-body">
                                <h6 class="card-title mb-1">Notification</h6>
                                <p class="card-text small text-white">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    
                </div>

                <!--Latest projects-->
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <div class="shadow panel-head-primary">
                            <h5 class="text-center mt-3 mb-3"><strong>Latest Projects</strong></h5>
                            <div class="table-responsive">
                                <table class="table table-striped" id="project_table">
                                    <thead>
                                        <tr>
                                            <th>Project id</th>
                                            <th>Project name</th>
                                            <th>Start date</th>
                                            <th>Due date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>01</td>
                                            <td>Web design</td>
                                            <td>13 Feb, 2018</td>
                                            <td>10 June, 2018</td>
                                            <td><span class="badge badge-success">Completed</span></td>
                                        </tr>
                                        <tr>
                                            <td>02</td>
                                            <td>App development</td>
                                            <td>03 July, 2018</td>
                                            <td>09 November, 2018</td>
                                            <td><span class="badge badge-warning">Pending</span></td>
                                        </tr>
                                        <tr>
                                            <td>03</td>
                                            <td>App prototyping</td>
                                            <td>31 January, 2018</td>
                                            <td>02 September, 2018</td>
                                            <td><span class="badge badge-danger">Suspended</span></td>
                                        </tr>
                                        <tr>
                                            <td>04</td>
                                            <td>Web development</td>
                                            <td>23 October, 2018</td>
                                            <td>15 December, 2018</td>
                                            <td><span class="badge badge-info">Negotiations</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
    <!--Flot.JS-->
    <script src="/php-duhoc/public/assets/js/charts/jquery.flot.min.js"></script>
    <script src="/php-duhoc/public/assets/js/charts/jquery.flot.pie.min.js"></script>
    <script src="/php-duhoc/public/assets/js/charts/jquery.flot.categories.min.js"></script>
    <script src="/php-duhoc/public/assets/js/charts/jquery.flot.stack.min.js"></script>
    <!--Sparkline-->
    <script src="/php-duhoc/public/assets/js/charts/sparkline.min.js"></script>
    <!--Morris.JS-->
    <script src="/php-duhoc/public/assets/js/charts/raphael.min.js"></script>
    <script src="/php-duhoc/public/assets/js/charts/morris.js"></script>
    <!--Chart JS-->
    <script src="/php-duhoc/public/assets/js/charts/chart.min.js"></script>
    <!--Chartist JS-->
    <script src="/php-duhoc/public/assets/js/charts/chartist.min.js"></script>
    <script src="/php-duhoc/public/assets/js/charts/chartist-data.js"></script>
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
  </body>
</html>