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
                
                <!--Dashboard widget-->
                <div class="mt-1 mb-3 button-container">
                    <div class="row pl-0">
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
                            <div class="bg-theme border shadow rounded">
                                <div class="p-2 text-center">
                                    <h5 class="mb-0 mt-2 text-light"><small><strong>INCOME</strong></small></h5>
                                    <h1>$36,500</h1>
                                </div>
                                <!--<div class="align-bottom">
                                    <span id="incomeBarCol"></span>
                                </div>-->
                                <div class="text-center text-light">
                                    75% in 2 years
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
                            <div class="bg-success border shadow rounded">
                                <div class="p-2 mb-1 text-center">
                                    <h5 class="mb-0 mt-2 text-light"><small><strong>GROSS PROFIT</strong></small></h5>
                                    <h1 class="text-white">$25,650</h1>
                                </div>
                                <!--<div class="align-bottom">
                                    <span id="profitBarCol"></span>
                                </div>-->
                                <div class="text-center text-light">
                                    65% in 2 years
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
                            <div class="bg-danger border shadow rounded">
                                <div class="p-2 text-center">
                                    <h5 class="mb-0 mt-2 text-light"><small><strong>EXPENSES</strong></small></h5>
                                    <h1 class="text-white">$10,850</h1>
                                </div>
                                <!--<div class="align-bottom">
                                    <span id="expensesBarCol"></span>
                                </div>-->
                                <div class="text-center text-light">
                                    15% in 2 years
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/Dashboard widget-->

                <div class="row mt-3">
                    <div class="col-sm-12 col-md-12">
                        <!--Analytics-->
                        <div class="mt-1 mb-3 p-3 button-container bg-white shadow-sm border">
                            <h6 class="mb-3">Site Analytics</h6>
                            
                            <div id="salesEcharts" style="width: 100%; height: 400px; overflow: hidden;"></div>
                            
                        </div>
                        <!--/Analytics-->

                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-sm-12 col-md-6">
                        <!--Recent followers-->
                        <div class="mt-1 mb-3 p-3 button-container bg-white shadow-sm border">
                            <h6 class="mb-3">Recent Followers</h6>
                            
                            <div class="table-responsive">
                                <table class="table table-striped" id="project_table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Project</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>01</td>
                                            <td><i class="fa fa-facebook text-theme"></i> Facebook</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="50" style="width: 50%"  aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>02</td>
                                            <td><i class="fa fa-twitter text-primary"></i> Twitter</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="30" style="width: 30%"  aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>03</td>
                                            <td><i class="fa fa-google-plus text-danger"></i> Google</td>
                                            <td>
                                                <div class="progress">    
                                                    <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="70" style="width: 70%"  aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>04</td>
                                            <td><i class="fa fa-linkedin text-info"></i> Linkedin</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="55" style="width: 55%"  aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>05</td>
                                            <td><i class="fab fa-telegram text-primary"></i> Telegram</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="45" style="width: 45%"  aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                        <!--/Recent followers-->

                    </div>

                    <div class="col-sm-12 col-md-6">
                        <!--World Market-->
                        <div class="mt-1 mb-3 p-3 button-container bg-white shadow-sm border">
                            <h6 class="mb-3">World Market</h6>
                            
                            <div id="worldMarket2" style="width: 100%; height: 303px"></div>
                            
                        </div>
                        <!--/World Market-->

                    </div>
                </div>

                <!--Custom cards section-->
                <div class="row mt-3">
                    <div class="col-sm-3">
                        <div class="mt-1 mb-3 p-3 button-container bg-white shadow-sm border">
                            <h6 class="mb-3">Emails</h6>
                            
                            <p class="mb-2 mt-3">Open rate <span class="pull-right">70%</span></p>
                            <div class="progress mb-4" style="height: 7px;">
                                <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="70" style="width: 70%"  aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                            <p class="mb-2">Sent <span class="pull-right">310/500</span></p>
                            <div class="progress mb-4" style="height: 7px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 45%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                            <p class="mb-2">Recieved <span class="pull-right">210/500</span></p>
                            <div class="progress mb-4" style="height: 7px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="mt-1 mb-3 p-3 button-container bg-white shadow-sm border">
                            <h6 class="mb-3">Top Products</h6>
                            
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <td>IphoneX</td>
                                        <td>225</td>
                                    </tr>
                                    <tr>
                                        <td>Onesplus</td>
                                        <td>1850</td>
                                    </tr>
                                    <tr>
                                        <td>Samsung S7</td>
                                        <td>1550</td>
                                    </tr>
                                </table>
                            </div>
                            
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="mt-1 mb-3 p-3 button-container bg-theme shadow border">
                            <h6 class="mb-4 text-center text-light">Average Deal Size</h6>
                            
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="text-center pb-3">
                                        <h5 class="mb-3 mt-2 text-light"><small><strong>30%</strong></small></h5>
                                        <h1 class="text-light">$25,650</h1>
                                        <h5 class="mb-0 mt-3 text-light"><small><strong>per rep</strong></small></h5>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="text-center pb-3">
                                        <h5 class="mb-3 mt-2 text-light"><small><strong>12%</strong></small></h5>
                                        <h1 class="text-light">$15,650</h1>
                                        <h5 class="mb-0 mt-3 text-light"><small><strong>per team</strong></small></h5>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <!--Messages-->
                    <div class="col-sm-6">
                        <div class="mt-1 mb-3 p-3 button-container bg-white shadow-sm border">
                            <h6 class="mb-3">Messages</h6><hr>

                            <div class="feed-single mb-3">
                                <div class="media">
                                    <img class="mr-3 rounded-circle" height="40px" width="40px" src="/php-duhoc/public/assets/img/John-doe.png" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <h6 class="mt-1">Mario Mendez 
                                            <small class="text-muted pl-2 border-radius"><span class="badge badge-danger">Unread</span></small>
                                            <small class="text-muted small pull-right"><i class="fa fa-clock"></i> 10 hours</small>

                                            <p class="clearfix"></p>
                                        </h6>
                                        <p>Hello, New update on my existing projects #portfolio #architecture <a href="#" class="text-theme">www.github.io/architect-mendez</a></p>

                                        <div class="feed-footer">
                                            <span class="pr-3"><i class="fa fa-star"></i> 3</span>
                                            <span class="pr-3"><i class="fa fa-comment"></i> 2</span>
                                            <span class="pr-3"><i class="fa fa-share"></i></span>
                                            <span class="pl-3 pull-right"><i class="fa fa-ellipsis-h"></i></span>

                                            <p class="clearfix"></p>
                                        </div>
                                    </div>
                                </div> <hr>

                                <div class="media">
                                    <img class="mr-3 rounded-circle" height="40px" width="40px" src="/php-duhoc/public/assets/img/client-img3.png" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <h6 class="mt-1">Helena Mendez 
                                            <small class="text-muted pl-2 border-radius"><span class="badge badge-danger">Unread</span></small>
                                            <small class="text-muted small pull-right"><i class="fa fa-clock"></i> August 8</small>

                                            <p class="clearfix"></p>
                                        </h6>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

                                        <div class="feed-footer">
                                            <span class="pr-3"><i class="fa fa-star"></i> 3</span>
                                            <span class="pr-3"><i class="fa fa-comment"></i> 2</span>
                                            <span class="pr-3"><i class="fa fa-share"></i></span>
                                            <span class="pl-3 pull-right"><i class="fa fa-ellipsis-h"></i></span>

                                            <p class="clearfix"></p>
                                        </div>
                                    </div>
                                </div> <hr>

                                <div class="media">
                                    <img class="mr-3 rounded-circle" height="40px" width="40px" src="/php-duhoc/public/assets/img/client-img2.png" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <h6 class="mt-1">Aliya Mario 
                                            <small class="text-muted pl-2 border-radius"><span class="badge badge-danger">Unread</span></small>
                                            <small class="text-muted small pull-right"><i class="fa fa-clock"></i> 1 month</small>

                                            <p class="clearfix"></p>
                                        </h6>
                                        <p>Hi Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

                                        <div class="feed-footer">
                                            <span class="pr-3"><i class="fa fa-star"></i> 3</span>
                                            <span class="pr-3"><i class="fa fa-comment"></i> 2</span>
                                            <span class="pr-3"><i class="fa fa-share"></i></span>
                                            <span class="pl-3 pull-right"><i class="fa fa-ellipsis-h"></i></span>

                                            <p class="clearfix"></p>
                                        </div>
                                    </div>
                                </div> <hr>
                                <div class="text-center">
                                    <p><a href="#" class="text-theme">View all messages <i class="fa fa-angle-double-down"></i></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/Messages-->

                    <!--Comments-->
                    <div class="col-sm-6">
                        <div class="mt-1 mb-3 p-3 button-container bg-white shadow-sm border">
                            <h6 class="mb-3">Updates</h6><hr>
                            
                            <div class="updates-wrapper border-left">
                                <div class="updates-content p-3 up-primary">
                                    <h6 class="bc-header-small">Ground breaking sales</h6>
                                    <p class="bc-description">Lorem Ipsum is simply dummy text of the printing</p>
                                    <span class="small"><i class="fas fa-clock text-success"></i> 7 months ago</span>
                                </div>
                                <div class="updates-content p-3 up-warning">
                                    <h6 class="bc-header-small">User confirmation</h6>
                                    <p class="bc-description">Lorem Ipsum is simply dummy text of the printing</p>
                                    <span class="small"><i class="fas fa-clock text-success"></i> 7 months ago</span>
                                </div>
                                <div class="updates-content p-3 up-danger">
                                    <h6 class="bc-header-small">New Registration</h6>
                                    <p class="bc-description">Lorem Ipsum is simply dummy text of the printing</p>
                                    <span class="small"><i class="fas fa-clock text-success"></i> 7 months ago</span>
                                </div>
                                <div class="updates-content p-3 up-success">
                                    <h6 class="bc-header-small">User confirmation</h6>
                                    <p class="bc-description">Lorem Ipsum is simply dummy text of the printing</p>
                                    <span class="small"><i class="fas fa-clock text-success"></i> 7 months ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/Comments-->
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
    <!--Echarts-->
    <script src="/php-duhoc/public/assets/js/charts/echarts.min.js"></script>
    <script src="/php-duhoc/public/assets/js/charts/echarts-data.js"></script>
    <!--Maps-->
    <script src="/php-duhoc/public/assets/js/maps/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="/php-duhoc/public/assets/js/maps/jquery-jvectormap-world-mill-en.js"></script>
    <script src="/php-duhoc/public/assets/js/maps/jvector-maps.js"></script>
    <!--Bootstrap Calendar JS-->
    <script src="/php-duhoc/public/assets/js/calendar/bootstrap_calendar.js"></script>
    <script src="/php-duhoc/public/assets/js/calendar/demo.js"></script>
    
    <!--Custom Js Script-->
    <script src="/php-duhoc/public/assets/js/custom.js"></script>
  </body>
</html>