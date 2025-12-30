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
                <h5 class="mb-0" ><strong>Tabs</strong></h5>
                <span class="text-secondary">Dashboard <i class="fa fa-angle-right"></i> tabs</span>
                
                <div class="row mt-3">
                    <div class="col-sm-6">
                        <!--Default tabs-->
                        <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                            <h6 class="mb-2">Default tabs</h6>
                            <p class="mt-1">Use class <span class="text-danger">.nav .nav-tabs</span> on ul and <span class="text-danger">.nav-item</span> on li</p>
                            
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                                </li>
                            </ul>
                            <div class="tab-content tab-content-border p-3" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <p>Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.</p>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <p>Profile tab</p>
                                </div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <p>Contact</p>
                                </div>
                            </div>
                            
                        </div>
                        <!--/Default tabs-->

                        <!--Tab with dropdown-->
                        <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                            <h6 class="mb-4">Tab with dropdown</h6>
                            
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                                </li>
                                <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Settings</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                                </li>
                            </ul>
                            <div class="tab-content tab-content-border p-3" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <p>Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.</p>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <p>Profile tab</p>
                                </div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <p>Contact</p>
                                </div>
                            </div>
                            
                        </div>
                        <!--/Tab with dropdown-->

                        <!--Nav pills-->
                        <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                            <h6 class="mb-4">Nav pills</h6>
                            
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <div class="media">
                                        <img class="mr-3" width="150px" height="130px" src="/php-duhoc/public/assets/img/gallery-img2.jpg" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <p class="media-text">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus. </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="media">
                                        <img class="mr-3" width="150px" height="130px" src="/php-duhoc/public/assets/img/gallery-img1.jpg" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <p class="media-text">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                    <p>Contact</p>
                                </div>
                            </div>
                            
                        </div>
                        <!--/Nav pills-->

                        <!--Tab with icons-->
                        <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                            <h6 class="mb-2">Default tabs</h6>
                            <p class="mt-1">Use class <span class="text-danger">.nav .nav-tabs</span> on ul and <span class="text-danger">.nav-item</span> on li</p>
                            
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home-icon" role="tab" aria-controls="home" aria-selected="true"><i class="fa fa-home"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile-icon" role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa-user"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact-icon" role="tab" aria-controls="contact" aria-selected="false"><i class="fa fa-phone"></i></a>
                                </li>
                            </ul>
                            <div class="tab-content tab-content-border p-3" id="myTabContent">
                                <div class="tab-pane fade show active" id="home-icon" role="tabpanel" aria-labelledby="home-tab">
                                    <p>Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.</p>
                                </div>
                                <div class="tab-pane fade" id="profile-icon" role="tabpanel" aria-labelledby="profile-tab">
                                    <p>Profile tab</p>
                                </div>
                                <div class="tab-pane fade" id="contact-icon" role="tabpanel" aria-labelledby="contact-tab">
                                    <p>Contact</p>
                                </div>
                            </div>
                            
                        </div>
                        <!--/Tabs with icons-->

                    </div>

                    <div class="col-sm-6">
                        <!--Custom tabs one-->
                        <div class="mt-1 mb-3 p-3 button-container border bg-white shadow-sm custom-tabs">
                            <h6 class="mb-2">Custom tabs</h6>
                            <p class="mt-1">Wrap dafault tab in a container with class  <span class="text-danger">.custom-tabs</span></p>
                            <nav>
                                <div class="nav nav-tabs nav-fill" id="nav-customContent" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home" data-toggle="tab" href="#custom-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
                                    <a class="nav-item nav-link" id="nav-profile" data-toggle="tab" href="#custom-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
                                    <a class="nav-item nav-link" id="nav-contact" data-toggle="tab" href="#custom-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
                                </div>
                            </nav>
                            <div class="tab-content py-3 px-3 px-sm-0" id="nav-customContent">
                                <div class="tab-pane fade show active" id="custom-home" role="tabpanel" aria-labelledby="nav-home">
                                    <p>Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. </p>
                                </div>
                                <div class="tab-pane fade" id="custom-profile" role="tabpanel" aria-labelledby="nav-profile">
                                    <p>Profile tab</p>
                                </div>
                                <div class="tab-pane fade" id="custom-contact" role="tabpanel" aria-labelledby="nav-contact">
                                    <p>Contact tab</p>
                                </div>
                            </div>
                        </div>
                        <!--/Custom tabs two-->

                        <!--Custom tabs one-->
                        <div class="mt-1 mb-3 p-3 button-container border bg-white shadow-sm custom-tabs-2">
                            <h6 class="mb-2">Custom tabs 2</h6>
                            <p class="mt-1 mb-3">Wrap dafault tab in a container with class  <span class="text-danger">.custom-tabs-2</span></p>
                            <nav>
                                <div class="nav nav-tabs nav-fill" id="nav-custom-2" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home" data-toggle="tab" href="#custom-home-2" role="tab" aria-controls="nav-home-2" aria-selected="true">Home</a>
                                    <a class="nav-item nav-link" id="nav-profile" data-toggle="tab" href="#custom-profile-2" role="tab" aria-controls="nav-profile-2" aria-selected="false">Profile</a>
                                    <a class="nav-item nav-link" id="nav-contact" data-toggle="tab" href="#custom-contact-2" role="tab" aria-controls="nav-contact-2" aria-selected="false">Contact</a>
                                </div>
                            </nav>
                            <div class="tab-content py-3 px-3 px-sm-0" id="nav-custom-2">
                                <div class="tab-pane fade show active" id="custom-home-2" role="tabpanel" aria-labelledby="nav-home-2">
                                    <p>Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. </p>
                                </div>
                                <div class="tab-pane fade" id="custom-profile-2" role="tabpanel" aria-labelledby="nav-profile-2">
                                    <p>Profile tab</p>
                                </div>
                                <div class="tab-pane fade" id="custom-contact-2" role="tabpanel" aria-labelledby="nav-contact-2">
                                    <p>Contact tab</p>
                                </div>
                            </div>
                        </div>
                        <!--/Custom tabs two-->

                        <!--Vertical nav pills-->
                        <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                            <h6 class="mb-4">Vertical nav pills</h6>
                            
                            <div class="row">
                                <div class="col-3">
                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
                                        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
                                        <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
                                        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                            <div class="media">
                                                <div class="media-body">
                                                    <p class="media-text">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus. </p>
                                                </div>
                                                <img class="mr-3" width="100px" height="100px" src="/php-duhoc/public/assets/img/gallery-img2.jpg" alt="Generic placeholder image">
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                            <p class="media-text">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus. </p>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                            <p>Messages</p>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                            <p>Settings</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <!--/Vertical nav pills-->

                        <!--Vertical tab with icons-->
                        <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                            <h6 class="mb-4">Vertical nav pills</h6>
                            
                            <div class="row">
                                <div class="col-3">
                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home-icon" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="fa fa-home"></i></a>
                                        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile-icon" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="fa fa-user"></i></a>
                                        <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages-icon" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="fa fa-envelope"></i></a>
                                        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings-icon" role="tab" aria-controls="v-pills-settings" aria-selected="false"><i class="fa fa-cogs"></i></a>
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-home-icon" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                            <p class="media-text">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla.</p>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-profile-icon" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                            <p class="media-text">Donec lacinia congue felis in faucibus. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla.</p>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-messages-icon" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                            <p>Messages</p>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-settings-icon" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                            <p>Settings</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <!--/Vertical tab with icons-->
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