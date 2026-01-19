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
    <!--Form validator-->
    <link rel="stylesheet" href="/php-duhoc/public/assets/js/form-validator/theme-default.min.css">
    
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <title>Du học</title>
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
                <h5 class="mb-0" ><strong>Form validation</strong></h5>
                <span class="text-secondary">Dashboard <i class="fa fa-angle-right"></i> form validation</span>
                
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <!--Validation types using Form-validator.js-->
                        <div class="mt-1 mb-4 p-3 button-container bg-white border shadow-sm">
                            <h6 class="mb-2">Validation types with form-validator.js</h6>
                            <p class="mb-2">Enables you to perform complex validation such as <code>required, email, max-length</code> and many others</p>

                            <form action="" id="validation_style" class="mt-3">
                                <div class="form-group row">
                                    <label for="Required1" class="col-sm-3">Required</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="Required1" class="form-control" data-validation="required" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="Email1" class="col-sm-3">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" id="Email1" class="form-control" data-validation="email" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="Number1" class="col-sm-3">Number</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="Number1" class="form-control" data-validation="number" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="URL1" class="col-sm-3">URL</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="URL1" class="form-control" data-validation="url" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="Regxp1" class="col-sm-3">Only lowercase letters a-z (regexp)</label>
                                    <div class="col-sm-9">
                                        <input name="..." class="form-control" id="Regxp1" data-validation="custom" data-validation-regexp="^([a-z]+)$">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="Min1" class="col-sm-3">Minimum 5 chars</label>
                                    <div class="col-sm-9">
                                        <input name="..." class="form-control" id="Min1" data-validation="length" data-validation-length="min5">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="Max1" class="col-sm-3">Maximum 5 chars</label>
                                    <div class="col-sm-9">
                                        <input name="..." class="form-control" id="Max1" data-validation="length" data-validation-length="max5">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="Rlength1" class="col-sm-3 mt-3">Restricted length</label>
                                    <div class="col-sm-9">
                                        <span id="max-length-element">100</span> chars left
                                        <textarea id="Rlength1" class="form-control" name="text"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Verify data</button>
                                </div>
                            </form>

                        </div>
                        <!--/Validation types using Form-validator.js-->
                        
                        <!--Default bootstrap 4 validation-->
                        <div class="mt-1 mb-4 p-3 button-container bg-white border shadow-sm">
                            <h6 class="mb-2">Bootstrap 4 validation</h6>
                            <p>Enables you to perform basic validation such as <code>required</code> fields</p>

                            <form class="needs-validation" novalidate>
                                <div class="form-row">
                                    <div class="col-md-4 mb-2">
                                        <label for="validationCustom01">First name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-2">
                                        <label for="validationCustom02">Last name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="Otto" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-2">
                                        <label for="validationCustomUsername">Username <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                            </div>
                                            <input type="text" class="form-control" id="validationCustomUsername" placeholder="Username" aria-describedby="inputGroupPrepend" required>
                                            <div class="invalid-feedback">
                                                Please choose a username.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6 mb-2">
                                        <label for="validationCustom03">City <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="validationCustom03" placeholder="City" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid city.
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label for="validationCustom04">State <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="validationCustom04" placeholder="State" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid state.
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label for="validationCustom05">Zip <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="validationCustom05" placeholder="Zip" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid zip.
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6 mb-2">
                                        <div class="form-group">
                                            <label for="">Years of experience <span class="text-danger">*</span></label>
                                            <select class="custom-select" required>
                                                <option value="">Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                            <div class="invalid-feedback">Example invalid custom select feedback</div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mb-2 mt-1">
                                        <label for="">Custom file input <span class="text-danger">*</span></label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                                            <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                            <div class="invalid-feedback">Example invalid custom file feedback</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="custom-control custom-radio mb-0">
                                    <input type="radio" class="custom-control-input" id="customControlValidation2" name="radio-stacked" required>
                                    <label class="custom-control-label" for="customControlValidation2">Male</label>
                                </div>

                                <div class="custom-control custom-radio mb-2">
                                    <input type="radio" class="custom-control-input" id="customControlValidation3" name="radio-stacked" required>
                                    <label class="custom-control-label" for="customControlValidation3">Female</label>
                                    <div class="invalid-feedback">More example invalid feedback text</div>
                                </div>

                                <div class="custom-control custom-checkbox mb-2">
                                    <input type="checkbox" class="custom-control-input" id="customControlValidation1" required>
                                    <label class="custom-control-label" for="customControlValidation1">Accept terms and conditions <span class="text-danger">*</span></label>
                                    <div class="invalid-feedback">Example invalid feedback text</div>
                                </div>

                                <button class="btn btn-primary" type="submit">Submit form</button>
                            </form>                            
                        </div>
                        <!--/Default bootstrap validation-->

                        <!--Validation with tooltips-->
                        <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                            <h6 class="mb-3">Bootstrap 4 validation with tooltips</h6>

                            <form class="needs-validation" novalidate>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="validationTooltip01">First name</label>
                                        <input type="text" class="form-control" id="validationTooltip01" placeholder="First name" value="Mark" required>
                                        <div class="valid-tooltip">
                                            Looks good!
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="validationTooltip02">Last name</label>
                                        <input type="text" class="form-control" id="validationTooltip02" placeholder="Last name" value="Otto" required>
                                        <div class="valid-tooltip">
                                            Looks good!
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="validationTooltipUsername">Username</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                                            </div>
                                            <input type="text" class="form-control" id="validationTooltipUsername" placeholder="Username" aria-describedby="validationTooltipUsernamePrepend" required>
                                            <div class="invalid-tooltip">
                                            Please choose a unique and valid username.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationTooltip03">City</label>
                                        <input type="text" class="form-control" id="validationTooltip03" placeholder="City" required>
                                        <div class="invalid-tooltip">
                                            Please provide a valid city.
                                        </div>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="validationTooltip04">State</label>
                                        <input type="text" class="form-control" id="validationTooltip04" placeholder="State" required>
                                        <div class="invalid-tooltip">
                                            Please provide a valid state.
                                        </div>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="validationTooltip05">Zip</label>
                                        <input type="text" class="form-control" id="validationTooltip05" placeholder="Zip" required>
                                        <div class="invalid-tooltip">
                                            Please provide a valid zip.
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-primary" type="submit">Submit form</button>
                            </form>
                        </div>
                        <!--/Validation with tooltips
                        
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
    <!--Form validator-->
    <script src="/php-duhoc/public/assets/js/form-validator/jquery.form-validator.min.js"></script>

    <!--Custom Js Script-->
    <script src="/php-duhoc/public/assets/js/custom.js"></script>
    <!--Custom Js Script-->

    <script>
        $.validate({
            form : '#validation_style',
            modules : 'security'
        });
        $('#Rlength1').restrictLength( $('#max-length-element') );
    </script>
  </body>
</html>