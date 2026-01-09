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
    <!--Weather Icons-->
    <link rel="stylesheet" href="/php-duhoc/public/assets/css/weather-icons.min.css">
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
                <h5 class="mb-0" ><strong>Widgets</strong></h5>
                <span class="text-secondary">Dashboard <i class="fa fa-angle-right"></i> widgets</span>
                
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <!--Dashboard widget-->
                        <div class="mt-1 mb-3 button-container">
                            <div class="row pl-0">
                                <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-3">
                                    <div class="bg-white border shadow">
                                        <div class="media p-4">
                                            <div class="align-self-center mr-3 rounded-circle notify-icon bg-primary">
                                                <i class="fa fa-user"></i>
                                            </div>
                                            <div class="media-body pl-2">
                                                <h3 class="mt-0 mb-0"><strong>$300k</strong></h3>
                                                <p><small class="text-muted bc-description">Total Revenue</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-3">
                                    <div class="bg-white border shadow">
                                        <div class="media p-4">
                                            <div class="align-self-center mr-3 rounded-circle notify-icon bg-warning">
                                                <i class="fas fa-envelope-open"></i>
                                            </div>
                                            <div class="media-body pl-2">
                                                <h3 class="mt-0 mb-0"><strong>3.1M</strong></h3>
                                                <p><small class="text-muted bc-description">Customers</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-3">
                                    <div class="bg-white border shadow">
                                        <div class="media p-4">
                                            <div class="align-self-center mr-3 rounded-circle notify-icon bg-success">
                                                <i class="fa fa-tags"></i>
                                            </div>
                                            <div class="media-body pl-2">
                                                <h3 class="mt-0 mb-0"><strong>1022</strong></h3>
                                                <p><small class="text-muted bc-description">Total Products</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/Dashboard widget-->

                        <!--Dashboard widget 2-->
                        <div class="mt-1 mb-3 button-container">
                            <div class="row pl-0">
                                <div class="col-lg-3 col-md-3 col-sm-6 col-12 mb-3">
                                    <div class="border shadow p-3 bg-success">
                                        <p class="pw-2 text-center text-white">
                                            <i class="fa fa-weixin"></i>
                                            <small class="bc-description text-white">225</small>
                                        </p>
                                        <p class="mt-2 text-white">Comments</p>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-6 col-12 mb-3">
                                    <div class="border shadow p-3 bg-danger">
                                        <p class="pw-2 text-center text-white">
                                            <i class="fa fa-users"></i>
                                            <small class="bc-description text-white">557</small>
                                        </p>
                                        <p class="mt-2 text-white">Customers</p>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-6 col-12 mb-3">
                                    <div class="border shadow p-3 bg-primary">
                                        <p class="pw-2 text-center text-white">
                                            <i class="fa fa-shopping-cart"></i>
                                            <small class="bc-description text-white">1225</small>
                                        </p>
                                        <p class="mt-2 text-white">Orders</p>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-6 col-12 mb-3">
                                    <div class="border shadow p-3 bg-warning">
                                        <p class="pw-2 text-center text-white">
                                            <i class="fa fa-envelope-o"></i>
                                            <small class="bc-description text-white">95</small>
                                        </p>
                                        <p class="mt-2 text-white">Messages</p>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <!--/Dashboard widget-->

                        <div class="mt-1 mb-3 button-container">
                            <div class="row pl-0">
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
                                    <div class="calendar-wrapper panel-head-info shadow">
                                        <div id="calendar" class="calendar-box"></div>
                                        <div class="dropdown-divider"></div>
                                        <div class="time pl-3 pr-3 pb-1">
                                            <h6 class="p-typo"><strong>Meet a friend</strong> <span class="badge badge-success pull-right">10:00am</span></h6>
                                        </div>
                                    </div>
                                    <!--Calendar-->
                                </div>
                                
                            </div>
                        </div>

                        <div class="mt-1 mb-3 button-container">
                            <div class="row pl-0">
                                <!--Dashboard widget weather-->
                                <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-3">
                                    <div class="border shadow p-3 bg-dark-blue">
                                        <h6 class="mb-4 text-white">Sydney <span class="pull-right p-typo">Updated now</span></h6>
                                        <p class="pw-3 text-center text-white">
                                            <small class="bc-description text-white">19<sup>o</sup></small>
                                            <i class="wi wi-day-cloudy-high"></i>
                                        </p>
                                        <h6 class="mt-4 text-white">Cloudy - 5km/h <span class="pull-right p-typo">16<sup>o</sup> to 19<sup>o</sup></span></h6>
                                    </div>
                                </div>
                                <!--Dashboard widget weather-->
                                
                                <!--Dashboard widget weather-->
                                <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-3">
                                    <div class="border shadow p-3 bg-red">
                                        <h6 class="mb-4 text-white">Chicago <span class="pull-right p-typo">Updated now</span></h6>
                                        <p class="pw-3 text-center text-white">
                                            <small class="bc-description text-white">30<sup>o</sup></small>
                                            <i class="wi wi-night-sleet"></i>
                                        </p>
                                        <h6 class="mt-4 text-white">Sleet - 5km/h <span class="pull-right p-typo">16<sup>o</sup> to 30<sup>o</sup></span></h6>
                                    </div>
                                </div>
                                <!--Dashboard widget weather-->

                                <!--Dashboard widget bandwidth-->
                                <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-3">
                                    <div class="border shadow p-3 bg-primary text-center text-white">
                                        <h6 class="mb-4 text-left text-white">Bandwidth</h6>
                                        <div class="cw-1" data-percent="86">
                                            <span class="percent"></span>
                                        </div>
                                    </div>
                                </div>
                                <!--Dashboard widget bandwidth-->
                                
                            </div>
                        </div>
                        <!--/Dashboard widget weather-->

                        <div class="mt-1 mb-3 button-container">
                            <div class="row pl-0">
                                <!--Dashboard widget sales analytics-->
                                <div class="col-lg-8 col-md-8 col-sm-12 col-12 mb-3">
                                    <div class="border shadow p-3">
                                        <div id="main" style="height: 300px; width:100%;"></div>
                                    </div>
                                </div>
                                <!--/Dashboard widget sales analytics-->

                                <!--Dashboard widget guage-->
                                <div class="col-lg-4 col-md-8 col-sm-12 col-12 mb-3">
                                    <div class="border shadow p-3">
                                        <div id="main2" style="height: 300px; width:100%;"></div>
                                    </div>
                                </div>
                                <!--/Dashboard widget guage-->
                            </div>
                        </div>

                        
                        <div class="card-deck">
                            <!--Dashboard widget updates-->
                            <div class="card pr-0 mr-0">
                                <div class="card-body">
                                    <h5 class="card-title bc-header">Updates</h5>
                                    <div class="updates-wrapper border-left">
                                        <div class="updates-content p-3 up-primary">
                                            <h6 class="bc-header-small">User confirmation</h6>
                                            <p class="bc-description">Lorem Ipsum is simply dummy text of the printing</p>
                                            <span class="small"><i class="fas fa-clock text-success"></i> 7 months ago</span>
                                        </div>
                                        <div class="updates-content p-3 up-warning">
                                            <h6 class="bc-header-small">User confirmation</h6>
                                            <p class="bc-description">Lorem Ipsum is simply dummy text of the printing</p>
                                            <span class="small"><i class="fas fa-clock text-success"></i> 7 months ago</span>
                                        </div>
                                        <div class="updates-content p-3 up-danger">
                                            <h6 class="bc-header-small">User confirmation</h6>
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
                            <!--Dashboard widget updates-->

                            <!--Dashboard widget chats-->
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title bc-header mb-4">Chats</h5>
                                    <div class="chats-container">
                                        <div class="chat-left chat-first mb-2">
                                            <p class="bc-description mr-5"><span>Hi there</span></p>
                                            <small class="text-muted">3mins ago</small>
                                        </div>
                                        <div class="chat-left chat-others  mb-2">
                                            <p class="bc-description mr-5"><span>How have you been?</span></p>
                                            <small class="text-muted">3mins ago</small>
                                        </div>
                                        <div class="chat-right chat-first mb-2 text-right">
                                            <p class="bc-description ml-5"><span>Hiyaa!</span></p>
                                            <small class="text-muted">3mins ago</small>
                                        </div>
                                        <div class="chat-right chat-others mb-2 text-right">
                                            <p class="bc-description ml-5"><span>I have been great!</span></p>
                                            <small class="text-muted">3mins ago</small>
                                        </div>
                                        <div class="chat-right chat-others mb-2 text-right">
                                            <p class="bc-description ml-5"><span>How about you though?</span></p>
                                            <small class="text-muted">3mins ago</small>
                                        </div>
                                        <div class="chat-left chat-first mb-2">
                                            <p class="bc-description mr-5"><span>Could be better!</span></p>
                                            <small class="text-muted">3mins ago</small>
                                        </div>
                                        <div class="chat-left chat-others mb-2">
                                            <p class="bc-description mr-5"><span>That lightening bold hurt a lot</span></p>
                                            <small class="text-muted">3mins ago</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Dashboard widget chats-->
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
    <!--Charts-->
    <!--Canvas JS-->
    <script src="/php-duhoc/public/assets/js/charts/canvas.min.js"></script>
    <!--easy pie chart-->
    <script src="/php-duhoc/public/assets/js/jquery.easypiechart.min.js"></script>
    <!--echarts chart-->
    <script src="/php-duhoc/public/assets/js/charts/echarts.min.js"></script>
    <!--Bootstrap Calendar JS-->
    <script src="/php-duhoc/public/assets/js/calendar/bootstrap_calendar.js"></script>
    <script src="/php-duhoc/public/assets/js/calendar/demo.js"></script>
    <!--Bootstrap Calendar-->

    <!--Custom Js Script-->
    <script src="/php-duhoc/public/assets/js/custom.js"></script>
    <!--Custom Js Script-->
  </body>
</html>