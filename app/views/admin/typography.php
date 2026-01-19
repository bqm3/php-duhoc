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
                <h5 class="mb-0" ><strong>Typography</strong></h5>
                <span class="text-secondary">Dashboard <i class="fa fa-angle-right"></i> typography</span>
                
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <div class="mt-1 mb-3 p-3 button-container bg-white border">
                            
                            <div class="row mb-5">
                                <!--Typography-->
                                <div class="col-sm-6">
                                    <h6 class="mb-2">Typography</h6>
                                    <p>use tags <span class="text-danger">h1 to h6</span></p>
                                    <h1>h1. Bootstrap heading</h1>
                                    <h2>h2. Bootstrap heading</h2>
                                    <h3>h3. Bootstrap heading</h3>
                                    <h4>h4. Bootstrap heading</h4>
                                    <h5>h5. Bootstrap heading</h5>
                                    <h6>h6. Bootstrap heading</h6>
                                </div>
                                <!--/Typography-->

                                <!--Typography with muted span text-->
                                <div class="col-sm-6">
                                    <h6 class="mb-2">Typography</h6>
                                    <p>Secondary text in any heading with<span class="text-danger">.text-muted</span> on small tag</p>
                                    <h1>h1. Heading <small class="text-muted">plast amet</small></h1>
                                    <h2>h2. Heading <small class="text-muted">plast amet</small></h2>
                                    <h3>h3. BHeading <small class="text-muted">plast amet</small></h3>
                                    <h4>h4. Heading <small class="text-muted">plast amet</small></h4>
                                    <h5>h5. Heading <small class="text-muted">plast amet</small></h5>
                                    <h6>h6. Heading <small class="text-muted">plast amet</small></h6>
                                </div>
                                <!--/Typography with muted span text-->
                            </div>

                            <div class="dropdown-divider"></div>

                            <div class="row mb-5 mt-5">
                                <!--Paragraph justified-->
                                <div class="col-sm-6">
                                    <h6 class="mb-2">Paragraph justified</h6>
                                    <p>use <span class="text-danger">.text-justify</span> to justify a paragraht text</p>
                                    <p class="text-justify p-typo">Ambitioni dedisse scripsisse iudicaretur. Cras mattis iudicium purus sit amet fermentum. Donec sed odio operae, eu vulputate felis rhoncus. Praeterea iter est quasdam res quas ex communi. At nos hinc posthac, sitientis piros Afros. Petierunt uti sibi concilium totius Galliae in diem certam indicere. Cras mattis iudicium purus sit amet fermentum.</p>
                                </div>
                                <!--/Paragraph justified-->

                                <!--Paragraph alignment-->
                                <div class="col-sm-6">
                                    <h6 class="mb-2">Paragraph alignment</h6>
                                    <p>Use either<span class="text-danger">.text-left, .text-center or .text-right</span> to align text</p>
                                    <p class="text-left p-typo">Left aligned paragrapht text</p>
                                    <p class="text-center p-typo">Center aligned paragrapht text</p>
                                    <p class="text-right p-typo">Right aligned paragrapht text</p>
                                </div>
                                <!--/Paragraph alignment-->
                            </div>

                            <div class="dropdown-divider"></div>

                            <div class="row mb-5 mt-5">
                                <!--Text transform-->
                                <div class="col-sm-6">
                                    <h6 class="mb-2">Text-transform</h6>
                                    <p>use <span class="text-danger">.text-lowercase, .text-uppercase, .text-capitalize</span></p>
                                    <p class="text-lowercase p-typo">Lowercased text.</p>
                                    <p class="text-uppercase p-typo">Uppercased text.</p>
                                    <p class="text-capitalize p-typo">CapiTaliZed text.</p>
                                </div>
                                <!--/Text transform-->

                                <!--Font weight and Italics-->
                                <div class="col-sm-6">
                                    <h6 class="mb-2">Font weight and Italics</h6>
                                    <p>Use classes <span class="text-danger">.font-weight-bold, .font-weight-normal, .font-weight-light, .font-italic</span></p>
                                    <p class="font-weight-bold p-typo">Bold text.</p>
                                    <p class="font-weight-normal p-typo">Normal weight text.</p>
                                    <p class="font-weight-light p-typo">Light weight text.</p>
                                    <p class="font-italic p-typo">Italic text.</p>
                                </div>
                                <!--/Font weight and Italics-->
                            </div>

                            <div class="dropdown-divider"></div>

                            <div class="row mb-5 mt-5">
                                <!--Text-color-->
                                <div class="col-sm-6">
                                    <h6 class="mb-2">Text-colors</h6>
                                    <p>use <span class="text-danger">text-color utilities</span></p>
                                    <p class="text-primary p-typo">This is a primary text. Use class <span class="text-danger">.text-primary</span></p>
                                    <p class="text-success p-typo">This is a success text. Use class <span class="text-danger">.text-success</span></p>
                                    <p class="text-muted p-typo">This is a muted text. Use class <span class="text-danger">.text-muted</span></p>
                                    <p class="text-danger p-typo">This is a danger text. Use class <span class="text-info">.text-danger</span></p>
                                    <p class="text-info p-typo">This is a info text. Use class <span class="text-danger">.text-info</span></p>
                                    <p class="text-secondary p-typo">This is a secondary text. Use class <span class="text-danger">.text-secondary</span></p>
                                    <p class="text-dark p-typo">This is a dark text. Use class <span class="text-danger">.text-dark</span></p>
                                    <p class="text-warning p-typo">This is a warning text. Use class <span class="text-danger">.text-warning</span></p>
                                </div>
                                <!--Text color-->
                                
                                <!--Blockquotes-->
                                <div class="col-sm-6">
                                    <h6 class="mb-2">Blockquotes</h6>
                                    <p>Add class <span class="text-danger">.blockquote</span> to blockquote element</p>
                                    <blockquote class="blockquote p-4 border-left-primary-4">
                                        <p class="mb-0 p-typo">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                    </blockquote>

                                    <blockquote class="blockquote mt-3 p-4 border-left-primary-4">
                                        <p class="mb-0 p-typo">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                        <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                                    </blockquote>
                                </div>
                                <!--Blockquotes-->
                            </div>

                            <div class="dropdown-divider"></div>

                            <div class="row mb-5 mt-5">
                                <!--Ul-listing-->
                                <div class="col-sm-4">
                                    <h6 class="mb-2">Ul Listing</h6>
                                    <p>use <span class="text-danger">ul > li</span> for lists</p>
                                    <div class="pl-3">
                                        <ul class="list-typo">
                                            <li>Lorem ipsum dolor sit amet</li>
                                            <li>Consectetur adipiscing elit</li>
                                            <li>Integer molestie lorem at massa</li>
                                        </ul>
                                    </div>
                                </div>
                                <!--Ul listing-->
                                
                                <!--Ol-listing-->
                                <div class="col-sm-4">
                                    <h6 class="mb-2">Ol Listing</h6>
                                    <p>use <span class="text-danger">ol > li</span> for lists</p>
                                    <div class="pl-0">
                                        <ol class="list-typo">
                                            <li>Lorem ipsum dolor sit amet</li>
                                            <li>Consectetur adipiscing elit</li>
                                            <li>Integer molestie lorem at massa</li>
                                        </ol>
                                    </div>
                                </div>
                                <!--Ol listing-->

                                <!--dl-listing-->
                                <div class="col-sm-4">
                                    <h6 class="mb-2">Description Text</h6>
                                    <p>use <span class="text-danger">ul > li</span> for lists</p>
                                    <dl class="row">
                                        <dt class="col-sm-12">Description lists</dt>
                                        <dd class="col-sm-12"><p class="p-typo">This is a description list text</p></dd>
                                    </dl>
                                </div>
                                <!--dl listing-->
                            </div>

                            <div class="dropdown-divider"></div>

                            <div class="row mb-5 mt-5">
                                <!--Address-->
                                <div class="col-sm-4">
                                    <h6 class="bc-header">Address</h4>
                                    <p class="bc-description">Use <span class="text-danger">address</span>as required</p>
                                    <address>
                                        <strong>Twitter, Inc.</strong>
                                        <p class="p-typo"> 455 Alen Ave, Apartment 4B</p>
                                        <p class="p-typo"> Lagos, CA 94107</p>
                                        <p class="p-typo"><abbr title="Phone">P:</abbr>(123) 456-7890</p>
                                    </address>
                                    <address>
                                        <p class="p-typo text-dark"><strong>Rayhan Rasheed</strong></p>
                                        <p class="p-typo"><a href="mailto:#">rashrayhan@mailtrap.io</a></p>
                                    </address>
                                </div>
                                <!--/Address-->

                                <!--Inline text elements-->
                                <div class="col-sm-8">
                                    <h6 class="bc-header">Inline Text elements</h4>
                                    <p class="bc-description"><span class="text-danger">Styling for common inline HTML5 elements.</span></p>
                                    
                                    <p class="p-typo">You can use the mark tag to <mark>highlight</mark> text.</p>
                                    <p class="p-typo"><del>This line of text is meant to be treated as deleted text.</del></p>
                                    <p class="p-typo"><s>This line of text is meant to be treated as no longer accurate.</s></p>
                                    <p class="p-typo"><ins>This line of text is meant to be treated as an addition to the document.</ins></p>
                                    <p class="p-typo"><u>This line of text will render as underlined</u></p>
                                    <p class="p-typo"><small>This line of text is meant to be treated as fine print.</small></p>
                                    <p class="p-typo"><strong>This line rendered as bold text.</strong></p>
                                    <p class="p-typo"><em>This line rendered as italicized text.</em></p>
                                </div>
                                <!--/Inline text elements-->
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