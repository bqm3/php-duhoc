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
    <!--paper bootstrap wizard-->
    <link rel="stylesheet" href="/php-duhoc/public/assets/css/themify-icons.css">
    <link rel="stylesheet" href="/php-duhoc/public/assets/css/paper-bootstrap-wizard.css">
    <!--Font Awesome-->
    <link rel="stylesheet" href="/php-duhoc/public/assets/css/fontawesome.css">
    <!--Chartist CSS-->
    <link rel="stylesheet" href="/php-duhoc/public/assets/css/chartist.min.css">
    <!--Bootstrap Calendar-->
    <link rel="stylesheet" href="/php-duhoc/public/assets/js/calendar/bootstrap_calendar.css">
    <!--Switchery CSS-->
    <!--Custom style.css-->
    <link rel="stylesheet" href="/php-duhoc/public/assets/css/quicksand.css">
    <link rel="stylesheet" href="/php-duhoc/public/assets/css/style.css">
    
    
    
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
                <h5 class="mb-0" ><strong>Form wizard</strong></h5>
                <span class="text-secondary">Dashboard <i class="fa fa-angle-right"></i> form wizard</span>
                
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <!--Form wizard-->
                        <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                            <h6>Wizard with validation</h6>
                            <p>Wizard gives you a possibility to use separate form into steps</p>
                            
                            <div class="wizard-container">
                                <div class="card wizard-card" data-color="theme" id="wizardProfile">
                                    <form action="" method="">
                                    <!--        You can switch " data-color="orange" "  with one of the next bright colors: "blue", "green", "orange", "red", "azure"          -->
            
                                        <div class="wizard-header text-center">
                                            <h3 class="wizard-title">Create your profile</h3>
                                            <p class="category">This information will let us know more about you.</p>
                                        </div>
            
                                        <div class="wizard-navigation">
                                            <div class="progress-with-circle">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="3" style="width: 21%;"></div>
                                            </div>
                                            <ul>
                                                <li>
                                                    <a href="#about" data-toggle="tab">
                                                        <div class="icon-circle">
                                                            <i class="ti-user"></i>
                                                        </div>
                                                        About
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#account" data-toggle="tab">
                                                        <div class="icon-circle">
                                                            <i class="ti-settings"></i>
                                                        </div>
                                                        Work
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#address" data-toggle="tab">
                                                        <div class="icon-circle">
                                                            <i class="ti-map"></i>
                                                        </div>
                                                        Address
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-content">
                                            <div class="tab-pane" id="about">
                                                <div class="row">
                                                    <div class="col-sm-10 offset-sm-1">
                                                        <h6 class="info-text text-center"> Please tell us more about yourself.</h6>
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <div class="picture-container">
                                                                    <div class="picture">
                                                                        <img src="/php-duhoc/public/assets/img/default-avatar.jpg" class="picture-src" id="wizardPicturePreview" title="" />
                                                                        <input type="file" id="wizard-picture">
                                                                    </div>
                                                                    <h6>Choose Picture</h6>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-8">
                                                                <div class="form-group">
                                                                    <label>First Name <small>(required)</small></label>
                                                                    <input name="firstname" type="text" class="form-control" placeholder="Andrew...">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Last Name <small>(required)</small></label>
                                                                    <input name="lastname" type="text" class="form-control" placeholder="Smith...">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-10 offset-sm-1">
                                                        <div class="form-group">
                                                            <label>Email <small>(required)</small></label>
                                                            <input name="email" type="email" class="form-control" placeholder="andrew@creative-tim.com">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="account">
                                                <h5 class="info-text"> What are you doing? (checkboxes) </h5>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div class="choice" data-toggle="wizard-checkbox">
                                                                <input type="checkbox" name="jobb" value="Design">
                                                                <div class="card card-checkboxes card-hover-effect">
                                                                    <i class="ti-paint-roller"></i>
                                                                    <p>Design</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="choice" data-toggle="wizard-checkbox">
                                                                <input type="checkbox" name="jobb" value="Code">
                                                                <div class="card card-checkboxes card-hover-effect">
                                                                    <i class="ti-pencil-alt"></i>
                                                                    <p>Code</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="choice" data-toggle="wizard-checkbox">
                                                                <input type="checkbox" name="jobb" value="Develop">
                                                                <div class="card card-checkboxes card-hover-effect">
                                                                    <i class="ti-star"></i>
                                                                    <p>Develop</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="address">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <h5 class="info-text"> Are you living in a nice area? </h5>
                                                        </div>
                                                        <div class="col-sm-7 col-sm-offset-1">
                                                            <div class="form-group">
                                                                <label>Street Name</label>
                                                                <input type="text" class="form-control" placeholder="5h Avenue">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <label>Street Number</label>
                                                                <input type="text" class="form-control" placeholder="242">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5 col-sm-offset-1">
                                                            <div class="form-group">
                                                                <label>City</label>
                                                                <input type="text" class="form-control" placeholder="New York...">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <div class="form-group">
                                                                <label>Country</label><br>
                                                                <select name="country" class="form-control">
                                                                    <option value="Afghanistan"> Afghanistan </option>
                                                                    <option value="Albania"> Albania </option>
                                                                    <option value="Algeria"> Algeria </option>
                                                                    <option value="American Samoa"> American Samoa </option>
                                                                    <option value="Andorra"> Andorra </option>
                                                                    <option value="Angola"> Angola </option>
                                                                    <option value="Anguilla"> Anguilla </option>
                                                                    <option value="Antarctica"> Antarctica </option>
                                                                    <option value="...">...</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wizard-footer">
                                                <div class="pull-right">
                                                    <input type='button' class='btn btn-next btn-fill btn-theme btn-wd' name='next' value='Next' />
                                                    <input type='button' class='btn btn-finish btn-fill btn-theme btn-wd' name='finish' value='Finish' />
                                                </div>
            
                                                <div class="pull-left">
                                                    <input type='button' class='btn btn-previous btn-default btn-wd' name='previous' value='Previous' />
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </form>
                                    </div>
                                </div> <!-- wizard container -->
                            
                        </div>
                        <!--/Form wizard-->
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

    <!--Paper bootstrap wizard-->
    <script src="/php-duhoc/public/assets/js/jquery.bootstrap.wizard.js"></script>
    <script src="/php-duhoc/public/assets/js/paper-bootstrap-wizard.js"></script>
    <script src="/php-duhoc/public/assets/js/jquery.validate.min.js"></script>

    <!--Custom Js Script-->
    <script src="/php-duhoc/public/assets/js/custom.js"></script>
    <!--Custom Js Script-->
  </body>
</html>