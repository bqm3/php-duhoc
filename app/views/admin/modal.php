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
                <h5 class="mb-0" ><strong>Modal</strong></h5>
                <span class="text-secondary">Dashboard <i class="fa fa-angle-right"></i> modal</span>
                
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                            <h6 class="mb-2">Basic modals</h6>
                            <p class="mt-1">bootstrap <span class="text-danger">.modal</span> class</p>
                            <!--Default modal-->
                            <button type="button" class="btn btn-theme" data-toggle="modal" data-target=".bd-example-modal">Default modal</button>

                            <div class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <h5 class="modal-title text-secondary"><strong> Default modal</strong></h5>
                                            <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body text-justify">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus laoreet laoreet libero, et porttitor arcu. Aliquam lacus urna, mattis et lectus sit amet, tempus mollis lacus. Donec non magna lorem.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Default modal-->

                            <!--Large modal-->
                            <button type="button" class="btn btn-theme" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>

                            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <h5 class="modal-title text-secondary"><strong>Large modal</strong></h5>
                                            <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body text-justify">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus laoreet laoreet libero, et porttitor arcu. Aliquam lacus urna, mattis et lectus sit amet, tempus mollis lacus. Donec non magna lorem.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/Large modal-->

                            <!-- small modal -->
                            <button type="button" class="btn btn-theme" data-toggle="modal" data-target=".bd-example-modal-sm">Small modal</button>

                            <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <h5 class="modal-title text-secondary"><strong>Small modal</strong></h5>
                                            <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body text-justify">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus laoreet laoreet libero, et porttitor arcu. Aliquam lacus urna, mattis et lectus sit amet, tempus mollis lacus. Donec non magna lorem.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/Default modal-->

                        <!--Modals position-->
                        <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                            <h6 class="mb-2">Modals positioning</h6>
                            <p>Add <span class="text-danger">.modal-dialog-centered</span> to <span class="text-danger">.modal-dialog</span> vertically center a modal</p>

                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalCenter">
                                Vertically centered
                            </button>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-secondary" id="exampleModalCenterTitle"><strong>Modal title</strong></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>This modal is centered vertically on this page just by adding the <span class="text-danger">.modal-dialog-centered</span> to <span class="text-danger">.modal-dialog</span></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <!--/Modal position-->

                        <!--Varying modal content-->
                        <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                            <h6 class="mb-2">Varying modal content</h6>
                            <p>Use <span class="text-danger">.event.relatedTarget</span> and HTML <span class="text-info">data-* attributes</span></p>

                            <button type="button" class="btn btn-theme" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button>
                            <button type="button" class="btn btn-theme" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Open modal for @fat</button>
                            <button type="button" class="btn btn-theme" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Open modal for @getbootstrap</button>

                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Recipient:</label>
                                                <input type="text" class="form-control" id="recipient-name">
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="col-form-label">Message:</label>
                                                <textarea class="form-control" id="message-text"></textarea>
                                            </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Send message</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/Varying modal content-->

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