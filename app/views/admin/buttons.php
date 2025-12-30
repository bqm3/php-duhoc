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
                <h5 class="mb-0" ><strong>Buttons</strong></h5>
                <span class="text-secondary">Dashboard <i class="fa fa-angle-right"></i> buttons</span>
                
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <!--Buttons default-->
                        <div class="mt-1 mb-4 p-3 button-container border bg-white shadow-sm">
                            <h6 class="mb-2">Buttons Default</h6>
                            <p class="mt-1">use class <span class="text-danger">.btn</span> with either of <span class="text-danger">.btn-info, .btn-primary, .btn-secondary, .btn-danger, .btn-success, .btn-dark, .btn-light, .btn-default, .btn-link</span></p>
                            <button type="button" class="btn btn-primary">Primary</button>
                            <button type="button" class="btn btn-theme">Custom</button>
                            <button type="button" class="btn btn-secondary">Secondary</button>
                            <button type="button" class="btn btn-success">Success</button>
                            <button type="button" class="btn btn-danger">Danger</button>
                            <button type="button" class="btn btn-warning">Warning</button>
                            <button type="button" class="btn btn-info">Info</button>
                            <button type="button" class="btn btn-light">Light</button>
                            <button type="button" class="btn btn-dark">Dark</button>
                            <button type="button" class="btn btn-link">Link</button>
                            <button type="button" class="btn btn-default btn-disabled">Disabled</button>
                        </div>
                        <!--Buttons default-->

                        <!--Button tags-->
                        <div class="mt-1 mb-4 p-3 button-container border bg-white shadow-sm">
                            <h6 class="mb-2">Button tags</h6>
                            <p class="mt-1"><span class="text-danger">.btn</span> class can also be used with a, input, and button elements</p>
                            <a class="btn btn-primary text-white" href="#" role="button">Link</a>
                            <button class="btn btn-theme" type="submit">Button</button>
                            <input class="btn btn-primary" type="button" value="Input">
                            <input class="btn btn-theme" type="submit" value="Submit">
                            <input class="btn btn-primary" type="reset" value="Reset">
                        </div>
                        <!--/Button tags-->

                        <!--Outline Buttons-->
                        <div class="mt-1 mb-4 p-3 button-container border bg-white shadow-sm">
                            <h6 class="mb-2">Outline buttons</h6>
                            <p class="mt-1">use classes <span class="text-danger">.btn .btn-outline-color*</span> on button</p>
                            <button type="button" class="btn btn-outline-theme">Custom</button>
                            <button type="button" class="btn btn-outline-primary">Primary</button>
                            <button type="button" class="btn btn-outline-secondary">Secondary</button>
                            <button type="button" class="btn btn-outline-success">Success</button>
                            <button type="button" class="btn btn-outline-danger">Danger</button>
                            <button type="button" class="btn btn-outline-warning">Warning</button>
                            <button type="button" class="btn btn-outline-info">Info</button>
                            <button type="button" class="btn btn-outline-light">Light</button>
                            <button type="button" class="btn btn-outline-dark">Dark</button>
                        </div>
                        <!--/Outline Buttons-->
                        
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-sm-12">
                        <!--Round Buttons-->
                        <div class="mt-1 mb-4 p-3 button-container border bg-white shadow-sm">
                            <h6 class="mb-2">Round buttons</h6>
                            <p class="mt-1">use classes <span class="text-danger">.btn .btn-color* .btn-round</span> on button</p>
                            <button type="button" class="btn btn-theme btn-round">Custom</button>
                            <button type="button" class="btn btn-primary btn-round">Primary</button>
                            <button type="button" class="btn btn-secondary btn-round">Secondary</button>
                            <button type="button" class="btn btn-success btn-round">Success</button>
                            <button type="button" class="btn btn-danger btn-round">Danger</button>
                            <button type="button" class="btn btn-warning btn-round">Warning</button>
                            <button type="button" class="btn btn-info btn-round">Info </button>
                            <button type="button" class="btn btn-light btn-round">Light</button>
                            <button type="button" class="btn btn-dark btn-round">Dark</button>
                            <button type="button" class="btn btn-link btn-round">Link</button>
                            <button type="button" class="btn btn-default btn-disabled btn-round">Disabled</button>
                        </div>
                        <!--/Round Buttons-->

                        <!--Round outline buttons-->
                        <div class="mt-1 mb-4 p-3 button-container border bg-white shadow-sm">
                            <h6 class="mb-2">Round outline buttons</h6>
                            <p class="mt-1">use classes <span class="text-danger">.btn .btn-outline-color* .btn-round</span> on button</p>
                            <button type="button" class="btn btn-outline-theme btn-round">Custom</button>
                            <button type="button" class="btn btn-outline-primary btn-round">Primary</button>
                            <button type="button" class="btn btn-outline-secondary btn-round">Secondary</button>
                            <button type="button" class="btn btn-outline-success btn-round">Success</button>
                            <button type="button" class="btn btn-outline-danger btn-round">Danger</button>
                            <button type="button" class="btn btn-outline-warning btn-round">Warning</button>
                            <button type="button" class="btn btn-outline-info btn-round">Info</button>
                            <button type="button" class="btn btn-outline-light btn-round">Light</button>
                            <button type="button" class="btn btn-outline-dark btn-round">Dark</button>
                        </div>
                        <!--/Round outline buttons-->

                        <!--Dropdown buttons-->
                        <div class="mt-1 mb-4 p-3 button-container border bg-white shadow-sm">
                            <h6 class="mb-2">Dropdown buttons</h6>
                            <div class="btn-group">
                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </div>

                            <div class="btn-group">
                                <button type="button" class="btn btn-theme dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </div>

                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </div>

                            <div class="btn-group">
                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </div>

                            <div class="btn-group">
                                <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </div>
                        </div>
                        <!--/Dropdown buttons-->

                        <!--Pagination section-->
                        <div class="mt-1 mb-4 p-3 button-container border bg-white shadow-sm">
                            <h6 class="mb-2">Pagination</h6>
                            <p class="mt-1">use class <span class="text-danger">.pagination</span> on ul and <span class="text-danger">.page-item</span> on li</p>
                            <nav aria-label="...">
                                <ul class="pagination">
                                    <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item active">
                                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!--/Pagination-->

                        <!--Button with icons-->
                        <div class="mt-1 mb-4 p-3 button-container border bg-white shadow-sm">
                            <h6 class="mb-2">Button with icons</h6>
                            <button type="button" class="btn btn-info"><i class="fa fa-info"></i>  Info</button>
                            <button type="button" class="btn btn-success"><i class="fa fa-check"></i>  Success</button>
                            <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i>  Danger</button>
                            <button type="button" class="btn btn-warning"><i class="fa fa-warning"></i>  Warning</button>
                            <button type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i>  Primary</button>
                            <button type="button" class="btn btn-theme"><i class="fa fa-check-circle"></i>  Custom</button>
                        </div>
                        <!--/Button with icons-->

                        <!--Button icons-->
                        <div class="mt-1 mb-4 p-3 button-container border bg-white shadow-sm">
                            <h6 class="mb-2">Button with icons</h6>
                            <p class="mt-1">Use classes <span class="text-danger">.fa .fa-*</span> on i element wrapped within a button element</p>
                            <button type="button" class="btn btn-theme"><i class="fa fa-heart-o"></i></button>
                            <button type="button" class="btn btn-info"><i class="fa fa-power-off"></i></button>
                            <button type="button" class="btn btn-success"><i class="fa fa-check"></i></button>
                            <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            <button type="button" class="btn btn-warning"><i class="fa fa-warning"></i></button>
                            <button type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> </button>
                            <button type="button" class="btn btn-secondary"><i class="fa fa-cogs"></i> </button>
                            <button type="button" class="btn btn-default"><i class="fa fa-book"></i> </button>
                        </div>
                        <!--/Button icons-->

                        <!--Button icons rounded-->
                        <div class="mt-1 mb-4 p-3 button-container border bg-white shadow-sm">
                            <h6 class="mb-2">Button with icons</h6>
                            <p class="mt-1">Use class <span class="text-danger">.icon-round</span> on button with icons only</p>
                            <button type="button" class="btn btn-theme icon-round shadow">
                                <i class="fa fa-eye"></i>
                            </button>
                            <button type="button" class="btn btn-info icon-round shadow">
                                <i class="fa fa-power-off"></i>
                            </button>
                            <button type="button" class="btn btn-success icon-round shadow">
                                <i class="fa fa-check"></i>
                            </button>
                            <button type="button" class="btn btn-danger icon-round shadow">
                                <i class="fa fa-trash"></i>
                            </button>
                            <button type="button" class="btn btn-warning icon-round shadow">
                                <i class="fa fa-warning"></i>
                            </button>
                            <button type="button" class="btn btn-primary icon-round shadow">
                                <i class="fa fa-pencil-square-o"></i> 
                            </button>
                            <button type="button" class="btn btn-secondary icon-round shadow">
                                <i class="fa fa-cogs"></i> 
                            </button>
                            <button type="button" class="btn btn-default icon-round shadow">
                                <i class="fa fa-book"></i> 
                            </button>
                        </div>
                        <!--/Button icons rounded-->

                        <!--Button Sizes-->
                        <div class="mt-1 mb-4 p-3 button-container border bg-white shadow-sm">
                            <h6 class="mb-2">Button sizes</h6>
                            <p class="mt-1">Add <span class="text-danger">.btn-lg</span> or <span class="text-danger">.btn-sm</span> for additional sizes.</p>
                            <button type="button" class="btn btn-theme btn-lg">Large button</button>
                            <button type="button" class="btn btn-secondary btn-lg">Large button</button>
                            <button type="button" class="btn btn-theme btn-sm">Small button</button>
                            <button type="button" class="btn btn-secondary btn-sm">Small button</button>

                            <p class="mt-3">Create block level buttons—those that span the full width of a parent by adding <span class="text-danger">.btn-block</span></p>
                            <button type="button" class="btn btn-theme btn-lg btn-block">Block level button</button>
                            <button type="button" class="btn btn-secondary btn-lg btn-block">Block level button</button>
                        </div>
                        <!--/Button Sizes-->
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
    <!--Chart JS-->
    <script src="/php-duhoc/public/assets/js/charts/chart.min.js"></script>
    <!--Chartist JS-->
    <script src="/php-duhoc/public/assets/js/charts/chartist.min.js"></script>
    <script src="/php-duhoc/public/assets/js/charts/demo.js"></script>
    <!--Charts-->
    <!--Bootstrap Calendar JS-->
    <script src="/php-duhoc/public/assets/js/calendar/bootstrap_calendar.js"></script>
    <script src="/php-duhoc/public/assets/js/calendar/demo.js"></script>
    <!--Bootstrap Calendar-->

    <!--Custom Js Script-->
    <script src="/php-duhoc/public/assets/js/custom.js"></script>
    <!--Custom Js Script-->
  </body>
</html>