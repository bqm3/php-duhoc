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
                <h5 class="mb-0" ><strong>Cards</strong></h5>
                <span class="text-secondary">Dashboard <i class="fa fa-angle-right"></i> cards</span>
                
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <!--Cards with image-->
                        <div class="mt-1 mb-3 button-container">
                            <h6 class="mb-2">Cards with image</h6>
                            
                            <div class="row">
                                <div class="col-md-3 col-sm-6 mb-3">
                                    <div class="card">
                                        <img class="card-img-top" src="/php-duhoc/public/assets/img/gallery-img3.jpg" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">Some quick example text to build on the card title.</p>
                                            <a href="#" class="btn btn-theme text-white">Foward</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-6 mb-3">
                                    <div class="card">
                                        <img class="card-img-top" src="/php-duhoc/public/assets/img/gallery-img2.jpg" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">Some quick example text to build on the card title.</p>
                                            <a href="#" class="btn btn-theme text-white">Foward</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-6 mb-3">
                                    <div class="card">
                                        <img class="card-img-top" src="/php-duhoc/public/assets/img/gallery-img1.jpg" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">Some quick example text to build on the card title.</p>
                                            <a href="#" class="btn btn-theme text-white">Foward</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-6 mb-3">
                                    <div class="card">
                                        <img class="card-img-top" src="/php-duhoc/public/assets/img/7.jpg" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">Some quick example text to build on the card title.</p>
                                            <a href="#" class="btn btn-theme text-white">Foward</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/Cards with image-->

                        <!--Content types-->
                        <h6 class="bc-header mb-2">Content types</h6>
                        <p class="bc-description">The building block of a card is the <span class="text-danger">.card-body</span> Use it whenever you need a padded section within a card.</p>
                        <div class="mt-1 mb-5 button-container">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <h6>Content title</h6>
                                    <p class="p-typo">This is some text within a card body.</p>
                                </div>
                            </div>
                        </div>
                        <!--/Content types-->

                        <!--Text, Title and Links-->
                        <h6 class="bc-header mb-2">Text, title and links</h6>
                        
                        <div class="mt-1 mb-5 button-container">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                                    <p class="card-text p-typo">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="card-link text-primary">Card link</a>
                                    <a href="#" class="card-link text-primary">Another link</a>
                                </div>
                            </div>
                        </div>
                        <!--/Text, Title and Links-->

                        <!--Header and Footer-->
                        <h6 class="bc-header mb-2">Header and footer</h6>
                        <p class="bc-description">Add an optional header and/or footer within a card.</p>
                        
                        <div class="mt-1 mb-5 button-container">
                            <div class="card shadow-sm">
                                <div class="card-header">
                                    <h6>Featured</h6>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Special title treatment</h5>
                                    <p class="card-text p-typo">With supporting text below as a natural lead-in to additional content.</p>
                                    <a href="#" class="btn btn-theme text-white">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <!--/Header and Footer-->

                        <!--Header and Footer-->
                        <h6 class="bc-header mb-2">Header and footer</h6>
                        <p class="bc-description">Add an optional header and/or footer within a card.</p>
                        
                        <div class="mt-1 mb-5 button-container">
                            <div class="card text-center shadow-sm">
                                <div class="card-header">
                                    <h6>Featured</h6>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Special title treatment</h5>
                                    <p class="card-text p-typo">With supporting text below as a natural lead-in to additional content.</p>
                                    <a href="#" class="btn btn-theme text-white">Go somewhere</a>
                                </div>
                                <div class="card-footer text-muted">
                                    2 days ago
                                </div>
                            </div>
                        </div>
                        <!--/Header and Footer-->

                        <!--Sizing with grid markups-->
                        <h6 class="bc-header mb-2">Sizing with grid markups</h6>
                        <p class="bc-description">Using the grid wrap card in <span class="text-danger">columns</span> and <span class="text-danger">rows</span>.</p>
                        
                        <div class="mt-1 mb-5 button-container">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="card shadow-sm">
                                        <div class="card-body">
                                            <h5 class="card-title">Special title treatment</h5>
                                            <p class="card-text p-typo">With supporting text below as a natural lead-in to additional content.</p>
                                            <a href="#" class="btn btn-theme text-white">Go somewhere</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card shadow-sm">
                                        <div class="card-body">
                                            <h5 class="card-title">Special title treatment</h5>
                                            <p class="card-text p-typo">With supporting text below as a natural lead-in to additional content.</p>
                                            <a href="#" class="btn btn-theme text-white">Go somewhere</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/Sizing with grid markups-->

                        <!--Text alignment-->
                        <h6 class="bc-header mb-2">Text alignment</h6>
                        <p class="bc-description">Using classes <span class="text-danger">.text-left, text-center, text-right</span> inside <span class="text-danger">.card</span>.</p>
                        
                        <div class="mt-1 mb-5 button-container">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="card shadow-sm">
                                        <div class="card-body">
                                            <h5 class="card-title">Special title treatment</h5>
                                            <p class="card-text p-typo">With supporting text below as a natural lead-in to additional content.</p>
                                            <a href="#" class="btn btn-theme text-white">Go somewhere</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="card text-center shadow-sm">
                                        <div class="card-body">
                                            <h5 class="card-title">Special title treatment</h5>
                                            <p class="card-text p-typo">With supporting text below as a natural lead-in to additional content.</p>
                                            <a href="#" class="btn btn-theme text-white">Go somewhere</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="card text-right shadow-sm">
                                        <div class="card-body">
                                            <h5 class="card-title">Special title treatment</h5>
                                            <p class="card-text p-typo">With supporting text below as a natural lead-in to additional content.</p>
                                            <a href="#" class="btn btn-theme text-white">Go somewhere</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/Text alignment-->

                        <!--Sizing using utilities-->
                        <h6 class="bc-header mb-2">Sizing using utilities</h6>
                        <p class="bc-description">Add <span class="text-danger">.w-25 or .w-50 or .w-75 or .w-100</span> to <span class="text-danger">.card</span>.</p>
                        
                        <div class="mt-1 mb-5 button-container">
                             <div class="card shadow-sm w-75">
                                <div class="card-body">
                                    <h5 class="card-title">Card with width 75%</h5>
                                    <p class="card-text p-typo">With supporting text below as a natural lead-in to additional content.</p>
                                    <a href="#" class="btn btn-theme text-white">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <!--/Sizing using utilities-->

                        <!--Card styles-->
                        <h6 class="bc-header mb-2">Card styles</h6>
                        <p class="bc-description">Add <span class="text-danger">.w-25 or .w-50 or .w-75 or .w-100</span> to <span class="text-danger">.card</span>.</p>
                        
                        <div class="mt-1 mb-5 button-container">
                             <div class="row">
                                <div class="col-sm-6">
                                    <div class="card text-white bg-primary mb-3">
                                        <div class="card-header">Header</div>
                                        <div class="card-body">
                                            <h5 class="card-title">Primary card title</h5>
                                            <p class="card-text p-typo text-white">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card text-white bg-secondary mb-3">
                                        <div class="card-header">Header</div>
                                        <div class="card-body">
                                            <h5 class="card-title">Secondary card title</h5>
                                            <p class="card-text p-typo text-white">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card text-white bg-success mb-3">
                                        <div class="card-header">Header</div>
                                        <div class="card-body">
                                            <h5 class="card-title">Success card title</h5>
                                            <p class="card-text p-typo text-white">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card text-white bg-danger mb-3">
                                        <div class="card-header">Header</div>
                                        <div class="card-body">
                                            <h5 class="card-title">Danger card title</h5>
                                            <p class="card-text p-typo text-white">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card text-white bg-warning mb-3">
                                        <div class="card-header">Header</div>
                                        <div class="card-body">
                                            <h5 class="card-title">Warning card title</h5>
                                            <p class="card-text p-typo text-white">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card text-white bg-info mb-3">
                                        <div class="card-header">Header</div>
                                        <div class="card-body">
                                            <h5 class="card-title">Info card title</h5>
                                            <p class="card-text p-typo text-white">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        </div>
                                    </div>
                                </div>
                             </div>
                        </div>
                        <!--/Card styles-->

                        <!--Card groups-->
                        <h6 class="bc-header mb-2">Card groups</h6>
                        <p class="bc-description">Use card groups to render cards as a single, attached element with equal width and height columns</span>.</p>
                        
                        <div class="mt-1 mb-5 button-container">
                            <div class="card-group">
                                <div class="card">
                                    <img class="card-img-top" src="/php-duhoc/public/assets/img/7.jpg" alt="Card image cap">
                                    <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                    </div>
                                </div>
                                <div class="card">
                                    <img class="card-img-top" src="/php-duhoc/public/assets/img/gallery-img2.jpg" alt="Card image cap">
                                    <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                    </div>
                                </div>
                                <div class="card">
                                    <img class="card-img-top" src="/php-duhoc/public/assets/img/gallery-img3.jpg" alt="Card image cap">
                                    <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/Card groups-->

                        <!--Card deck-->
                        <h6 class="bc-header mb-2">Card deck</h6>
                        <p class="bc-description">Use card decks for single card with equal width and height.</p>
                        
                        <div class="mt-1 mb-5 button-container">
                            <div class="card-deck">
                                <div class="card">
                                    <img class="card-img-top" src="/php-duhoc/public/assets/img/gallery-img1.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                    </div>
                                </div>
                                <div class="card">
                                    <img class="card-img-top" src="/php-duhoc/public/assets/img/7.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                    </div>
                                </div>
                                <div class="card">
                                    <img class="card-img-top" src="/php-duhoc/public/assets/img/gallery-img3.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/Card deck-->

                        <!--Card columns-->
                        <h6 class="bc-header mb-2">Card columns</h6>
                        <p class="bc-description">Cards can be organized into Masonry-like columns with just CSS by wrapping them in <span class="text-danger">.card-columns</span>.</p>
                        
                        <div class="mt-1 mb-5 button-container">
                            <div class="card-columns">
                                <div class="card">
                                    <img class="card-img-top" src="/php-duhoc/public/assets/img/gallery-img3.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title that wraps to a new line</h5>
                                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    </div>
                                </div>
                                <div class="card p-3">
                                    <blockquote class="blockquote mb-0 card-body">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                    <footer class="blockquote-footer">
                                        <small class="text-muted">
                                        Someone famous in <cite title="Source Title">Source Title</cite>
                                        </small>
                                    </footer>
                                    </blockquote>
                                </div>
                                <div class="card">
                                    <img class="card-img-top" src="/php-duhoc/public/assets/img/gallery-img2.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                    </div>
                                </div>
                                <div class="card bg-theme text-white text-center p-3">
                                    <blockquote class="blockquote mb-0">
                                    <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat.</p>
                                    <footer class="blockquote-footer">
                                        <small class="text-white">
                                        Someone famous in <cite title="Source Title">Source Title</cite>
                                        </small>
                                    </footer>
                                    </blockquote>
                                </div>
                                <div class="card text-center">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This card has a regular title and short paragraphy of text below it.</p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                    </div>
                                </div>
                                <div class="card">
                                    <img class="card-img" src="/php-duhoc/public/assets/img/7.jpg" alt="Card image">
                                </div>
                                <div class="card p-3 text-right">
                                    <blockquote class="blockquote mb-0">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                    <footer class="blockquote-footer">
                                        <small class="text-muted">
                                        Someone famous in <cite title="Source Title">Source Title</cite>
                                        </small>
                                    </footer>
                                    </blockquote>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This is another card with title and supporting text below. This card has some additional content to make it slightly taller overall.</p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/Card columns-->

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