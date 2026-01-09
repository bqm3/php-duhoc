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
                <h5 class="mb-0" ><strong>Basic elements</strong></h5>
                <span class="text-secondary">Dashboard <i class="fa fa-angle-right"></i> basic elements</span>
                
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <!--Default elements-->
                        <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                            <h6 class="mb-2">Basic input types</h6>
                            <p>use class <span class="text-danger">.form-control</span> with input</p>
                            
                            <form class="form-horizontal mt-4 mb-5">
                                <div class="form-group row">
                                    <label class="control-label col-sm-2" for="input-1">Default Input</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="input-1" placeholder="John Doe" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-2" for="input-2">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="input-2" placeholder="johndoe@gmail.com" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-2" for="input-3">Search</label>
                                    <div class="col-sm-10">
                                        <input type="search" class="form-control" id="input-3" placeholder="Search keywords" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-2" for="input-4">Number</label>
                                    <div class="col-sm-10">
                                        <input type="number" value="34" id="input-4" class="form-control" placeholder="number" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-2" for="input-5">Date</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="input-5" placeholder="11/11/2019" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-2" for="input-6">Max Characters</label>
                                    <div class="col-sm-10">
                                        <input type="text" maxlength="5" class="form-control" id="input-6" placeholder="Maximum characters allowed is 5" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-2" for="input-7">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="input-7" placeholder="*********" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-2" for="input-8">Predefined Value</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="input-8" value="Predefined set value" placeholder="" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleFormControlSelect1" class="control-label col-sm-2">Example select</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="exampleFormControlSelect1">
                                            <option>Choose ...</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-2" for="exampleFormControlFile1">File input</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" id="exampleFormControlFile1">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-2" for="input-9">Read Only Field</label>
                                    <div class="col-sm-10">
                                        <input type="text" readonly class="form-control" id="input-9" placeholder="read only" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-2" for="input-10">Disabled Field</label>
                                    <div class="col-sm-10">
                                        <input type="text" disabled class="form-control" id="input-10" placeholder="Disabled" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-2" for="input-11">Textarea</label>
                                    <div class="col-sm-10">
                                        <textarea rows="5" class="form-control" id="input-11" placeholder="Default Textarea"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-2 mt-3" for="formControlRange">Range</label>
                                    <div class="col-sm-10">
                                        <input type="range" class="custom-range" min="0" max="5" step="0.5" id="customRange3">
                                    </div>        
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 col-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">Check this custom checkbox</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                                            <label class="custom-control-label" for="customCheck2">Check this custom checkbox</label>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-12">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" name="customradio" id="customeradio1">
                                            <label class="custom-control-label" for="customeradio1">Check this custom radio</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="customeradio2">
                                            <label class="custom-control-label" name="customradio" for="customeradio2">Check this custom radio</label>
                                        </div>
                                    </div>
                                </div>

                            </form>      
                            
                            <div class="dropdown-divider"></div>
                            
                            <div class="row mt-4">
                                <div class="col-sm-6 col-12 mb-3">
                                    <h6 class="mb-3">Input sizes</h6>
                                    <form action="">
                                        <div class="form-group">
                                            <input class="form-control form-control-lg" type="text" placeholder=".form-control-lg">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control w-75" type="text" placeholder="Default input">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control form-control-sm w-50" type="text" placeholder=".form-control-sm">
                                        </div>
                                    </form>
                                </div>

                                <div class="col-sm-6 col-12 mb-3">
                                    <h6 class="mb-3">Color inputs</h6>
                                    <form action="">
                                        <div class="form-group">
                                            <input class="form-control form-control-primary" type="text" placeholder=".form-control-primary">
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 col-12">
                                                <input class="form-control form-control-danger" type="text" placeholder=".form-control-danger">
                                            </div>
                                            <div class="col-sm-6 col-12">
                                                <input class="form-control form-control-warning" type="text" placeholder=".form-control-warning">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 col-12">
                                                <input class="form-control form-control-success" type="text" placeholder=".form-control-success">
                                            </div>
                                            <div class="col-sm-6 col-12">
                                                <input class="form-control form-control-info" type="text" placeholder=".form-control-info">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="dropdown-divider"></div>
                            
                            <div class="row mt-4">
                                <div class="col-sm-6 col-12 mb-3">
                                    <h6 class="mb-3">Text color</h6>
                                    <form action="">
                                        <div class="form-group">
                                            <input class="form-control text-primary" type="text" placeholder=".text-primary">
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 col-12">
                                                <input class="form-control text-danger" type="text" placeholder=".text-danger">
                                            </div>
                                            <div class="col-sm-6 col-12">
                                                <input class="form-control text-warning" type="text" placeholder=".text-warning">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 col-12">
                                                <input class="form-control text-success" type="text" placeholder=".text-success">
                                            </div>
                                            <div class="col-sm-6 col-12">
                                                <input class="form-control text-info" type="text" placeholder=".text-info">
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-sm-6 col-12 mb-3">
                                    <h6 class="mb-3">Background color</h6>
                                    <form action="">
                                        <div class="form-group">
                                            <input class="form-control fc-bg-primary" type="text" placeholder=".fc-bg-primary">
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 col-12">
                                                <input class="form-control fc-bg-danger" type="text" placeholder=".fc-bg-danger">
                                            </div>
                                            <div class="col-sm-6 col-12">
                                                <input class="form-control fc-bg-warning" type="text" placeholder=".fc-bg-warning">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 col-12">
                                                <input class="form-control fc-bg-success" type="text" placeholder=".fc-bg-success">
                                            </div>
                                            <div class="col-sm-6 col-12">
                                                <input class="form-control fc-bg-info" type="text" placeholder=".fc-bg-info">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--/Default elements-->

                        <!--Form grid-->
                        <div class="mt-4 mb-3 p-3 button-container bg-white border shadow-sm">
                            <h6 class="mb-2">Form input grid</h6>
                            <p>use class <span class="text-danger">.row with .form-group</span> and wrap input inside <span class="text-danger">.col-*-*</span> div</p>
                            
                            <form action="">
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <input class="form-control" type="text" placeholder="col-sm-2">
                                    </div>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="col-sm-10">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <input class="form-control" type="text" placeholder="col-sm-3">
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" placeholder="col-sm-9">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" placeholder="col-sm-4">
                                    </div>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" placeholder="col-sm-8">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-5">
                                        <input class="form-control" type="text" placeholder="col-sm-5">
                                    </div>
                                    <div class="col-sm-7">
                                        <input class="form-control" type="text" placeholder="col-sm-7">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" placeholder="col-sm-6">
                                    </div>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" placeholder="col-sm-6">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input class="form-control" type="text" placeholder="col-sm-12">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--Form grid-->

                        <!--Validation states-->
                        <div class="mt-4 mb-3 p-3 button-container bg-white border shadow-sm">
                            <h6 class="mb-3">Validation states</h6>
                            
                            <form action="">
                                <div class="form-group row">
                                    <label for="" class="col-sm-3">Input with success</label>
                                    <div class="col-sm-9">
                                        <input class="form-control form-control-success" type="text" placeholder="Valid">
                                        <small class="text-success bc-description">Data valid success!</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-3">Input with danger</label>
                                    <div class="col-sm-9">
                                        <input class="form-control form-control-danger" type="text" placeholder="Invalid">
                                        <small class="text-danger bc-description">Data invalid error!</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-3">Input with warning</label>
                                    <div class="col-sm-9">
                                        <input class="form-control form-control-warning" type="text" placeholder="Warning">
                                        <small class="text-warning bc-description">Data valid but has problem, warning!</small>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--Validation states-->

                        <!--Input group-->
                        <div class="mt-4 mb-3 p-3 button-container bg-white border shadow-sm">
                            <h6 class="mb-2">Input group</h6>
                            <p class="mt-1 mb-2">Bootstrap input group elements</p>

                            <form action="">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">@</span>
                                    </div>
                                    <input type="text" class="form-control mt-0" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                                
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control mt-0" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">@example.com</span>
                                    </div>
                                </div>
                                
                                <label for="basic-url">Your vanity URL</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
                                    </div>
                                    <input type="text" class="form-control mt-0" id="basic-url" aria-describedby="basic-addon3">
                                </div>
                                
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input type="text" class="form-control mt-0" aria-label="Amount (to the nearest dollar)">
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                                
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">With textarea</span>
                                    </div>
                                    <textarea class="form-control mt-0" aria-label="With textarea"></textarea>
                                </div>

                                <label for="">Checkbox and Radio</label>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <label class="custom-control custom-checkbox mb-0">
                                                        <input type="checkbox" class="custom-control-input">
                                                        <span class="custom-control-label ml-2"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="Text input with checkbox">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <label class="custom-control custom-radio mb-0">
                                                        <input type="radio" class="custom-control-input">
                                                        <span class="custom-control-label ml-2"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Text input with radio" placeholder="Text input with radio">
                                        </div>
                                    </div>
                                </div>
                                
                                <label for="">Button addons</label>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-primary" type="button" id="button-addon1">Button</button>
                                            </div>
                                            <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-danger" type="button" id="button-addon2">Button</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <label for="">Button with dropdowns</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</button>
                                        <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                        <div role="separator" class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Text input with dropdown button">
                                </div>

                            </form>
                        </div>
                        <!--/Input group-->

                        <div class="row">
                            <!--Vertical forms-->
                            <div class="col-sm-6">
                                <div class="mt-4 mb-3 p-3 button-container bg-white border shadow-sm">
                                    <h6 class="mb-2">Basic vertical form</h6>

                                    <form action="">
                                        <div class="form-group">
                                            <label for="email-vr" class="mb-0">Email</label>
                                            <input type="text" id="email-vr" class="form-control" placeholder="johndoe@gmail.com" />
                                        </div>
                                        <div class="form-group">
                                            <label for="pass-vr" class="mb-0">Password</label>
                                            <input type="password" id="pass-vr" class="form-control" placeholder="********" />
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" checked class="custom-control-input" id="check1">
                                                <label class="custom-control-label" for="check1">Check this</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!--/Vertical form-->

                            <!--Horizontal form-->
                            <div class="col-sm-6">
                                <div class="mt-4 mb-3 p-3 button-container bg-white border shadow-sm">
                                    <h6 class="mb-4">Horizontal form</h6>

                                    <form action="">
                                        <div class="form-group row">
                                            <label class="control-label col-sm-3" for="email-hr">Email</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="email-hr" placeholder="johndoe@gmail.com" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-sm-3" for="pass-hr">Password</label>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control" id="pass-hr" placeholder="********" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-3 col-sm-9">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" checked class="custom-control-input" id="check2">
                                                    <label class="custom-control-label" for="check2">Check this</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-3 col-sm-9">
                                                <button type="button" class="btn btn-secondary">Login</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!--/Horizontal form-->
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
    <!--Bootstrap Calendar JS-->
    <script src="/php-duhoc/public/assets/js/calendar/bootstrap_calendar.js"></script>
    <script src="/php-duhoc/public/assets/js/calendar/demo.js"></script>
    <!--Bootstrap Calendar-->

    <!--Custom Js Script-->
    <script src="/php-duhoc/public/assets/js/custom.js"></script>
    <!--Custom Js Script-->
  </body>
</html>