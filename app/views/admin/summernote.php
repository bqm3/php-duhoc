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
    <!--Summernote editor-->
    <link rel="stylesheet" href="/php-duhoc/public/assets/js/summernote/summernote-bs4.css">

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
                <h5 class="mb-0" ><strong>Summernote</strong></h5>
                <span class="text-secondary">Dashboard <i class="fa fa-angle-right"></i> Summernote editor</span>
                
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <!--Summernote editor with div element-->
                        <div class="mt-1 mb-5 button-container">
                            <h6 class="mb-2">Summernote editor with div element</h6>
                            
                            <div id="summernote_div" class="editor p-3 border bg-white shadow-sm">
                                <p>To use without a form, we suggest using a div in the body; this element will then be used where you want the Summernote editor to be rendered within your page.</p>
                            </div>
                        <!--/Summernote with div element-->
                        </div>

                        <!--Summernote editor with textarea element-->
                        <div class="mt-1 mb-3 button-container">
                            <h6 class="mb-2">Summernote editor with textarea</h6>
                            
                            <div id="summernote_textarea" class="editor p-3 border bg-white shadow-sm">
                                <p>To use within a form, is pretty much the same as above, but rather than a div, we recommend using a textarea element inside a form, which should include a name attribute so when the form is submitted you can use that name to process the editors data on your backend. Also, if using Summernote inside a form to set the attribute method="post" to allow larger sized editor content to parse to the backend, if you don’t your data either may not parse, or will be truncated.</p>
                            </div>
                        <!--/Summernote with textarea element-->
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
    <!--Summernote Editor-->
    <script src="/php-duhoc/public/assets/js/summernote/summernote-bs4.js"></script>

    <!--Custom Js Script-->
    <script src="/php-duhoc/public/assets/js/custom.js"></script>
    <!--Custom Js Script-->
    <script>
        //Summernote for div
        $('#summernote_div').summernote();
        //Summernote for textarea
        $('#summernote_textarea').summernote();
    </script>
  </body>
</html>