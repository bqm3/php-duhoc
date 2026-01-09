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
    <!--Slick Carousel CSS-->
    <link rel="stylesheet" href="/php-duhoc/public/assets/css/slick/slick.css">
    <link rel="stylesheet" href="/php-duhoc/public/assets/css/slick/slick-theme.css">
    <!--Rating Bars-->
    <link rel="stylesheet" href="/php-duhoc/public/assets/css/fontawesome-stars.css">
    <!--Datatable-->
    <link rel="stylesheet" href="/php-duhoc/public/assets/css/dataTables.bootstrap4.min.css">
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
                <h5 class="mb-0" ><strong>Product detail</strong></h5>
                <span class="text-secondary">Ecommerce <i class="fa fa-angle-right"></i> product detail</span>
                
                <div class="mt-4 mb-4 p-3 bg-white border shadow-sm lh-sm">
                    <!--Product detail-->
                    <div class="product-list">
                        <div class="row">
                            <div class="col-sm-5 col-12">
                                <div class="slider-for border">
                                    <img src="/php-duhoc/public/assets/img/slick1.jpg" alt="">
                                    <img src="/php-duhoc/public/assets/img/slick1.jpg" alt="">
                                    <img src="/php-duhoc/public/assets/img/slick2.jpg" alt="">
                                    <img src="/php-duhoc/public/assets/img/slick3.jpg" alt="">
                                    <img src="/php-duhoc/public/assets/img/slick4.jpg" alt="">
                                    <img src="/php-duhoc/public/assets/img/slick7.jpg" alt="">
                                    <img src="/php-duhoc/public/assets/img/slick6.jpg" alt="">
                                </div>
                                <div class="slider-nav pl-4 pr-4 bg-secondary shadow">
                                    <img src="/php-duhoc/public/assets/img/slick1.jpg" alt="">
                                    <img src="/php-duhoc/public/assets/img/slick2.jpg" alt="">
                                    <img src="/php-duhoc/public/assets/img/slick3.jpg" alt="">
                                    <img src="/php-duhoc/public/assets/img/slick4.jpg" alt="">
                                    <img src="/php-duhoc/public/assets/img/slick7.jpg" alt="">
                                    <img src="/php-duhoc/public/assets/img/slick6.jpg" alt="">
                                </div>
                            </div>
                            
                            <div class="col-sm-7 col-12">
                                <div class="p-2">
                                    <div class="text-right">
                                        <p class="small"><strong>Availability</strong>: <span class="text-primary">In Stock</span></p>
                                    </div>
                                    <h3 class="mb-3">Danami Black And Proud Hoodie</h3>
                                    <p class="small"><strong>Brand:</strong> Versacce</p>

                                    <div class="mt-3 mb-4">
                                        <select id="example">
                                            <option value="1">1</option>
                                            <option value="2" selected>2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>

                                    <h4>$50.00</h4>
                                    <hr>

                                    <p class="product-slug">Mauris pretium dignissim pulvinar. Vivamus lectus ante, ullamcorper in turpis eu, tristique gravida dui. Nullam mattis lacus et nisl consequat, id sodales metus luctus. In placerat sed urna at tempor. Duis commodo ut mauris eget scelerisque. Nunc laoreet purus a lacus sagittis, vitae tempor lorem lobortis. Sed vitae diam arcu. Ut sit amet tellus quam.</p>
                                    <hr>

                                    <div class="col-sm-3 col-6 pl-0 pr-4 mb-4 mt-4">
                                        <div class="input-group mt-2">
                                            <div class="input-group-append">
                                                <button class="btn btn-secondary" type="button"><i class="fa fa-minus"></i></button>
                                            </div>
                                            <input type="text" size="3" class="form-control bg-light text-center" readonly value="1" maxlength="3">
                                            <div class="input-group-append">
                                                <button class="btn btn-secondary rounded-0" type="button"><i class="fa fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <button type="button" class="btn btn-theme rounded-0 mr-3 px-3">
                                            <i class="fa fa-shopping-cart mr-3"></i> ADD TO CART
                                        </button>

                                        <button type="button" class="btn btn-outline-theme rounded-0 mr-3 px-3">
                                            <i class="fa fa-heart-o"></i>
                                        </button>

                                        <button type="button" class="btn btn-outline-theme rounded-0 mr-3 px-3">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                    <!--Product Detail-->
                </div>

                <div class="mt-4 mb-4 p-3 bg-white button-container border shadow-sm">
                    <div class="product-list custom-tabs">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-customContent" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home" data-toggle="tab" href="#custom-home" role="tab" aria-controls="nav-home" aria-selected="true"> Reviews</a>

                                <a class="nav-item nav-link" id="nav-profile" data-toggle="tab" href="#custom-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Description</a>

                                <a class="nav-item nav-link" id="nav-contact" data-toggle="tab" href="#custom-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Size Guide</a>
                            </div>
                        </nav>

                        <div class="tab-content py-3 px-3 px-sm-0" id="nav-customContent">
                            <div class="tab-pane fade show active p-3" id="custom-home" role="tabpanel" aria-labelledby="nav-home">
                                
                                <!--Single feed-->
                                <div class="feed-single mb-3">
                                    <div class="media">
                                        <img class="mr-3 rounded-circle" height="40px" width="40px" src="/php-duhoc/public/assets/img/John-doe.png" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <h6 class="mt-1">Jay Shetty 
                                                <small class="text-muted pl-3"><i class="fa fa-clock"></i> 2 weeks</small>
                                                
                                                <p class="clearfix"></p>
                                            </h6>

                                            <div class="user-rating">
                                                <select class="reviewRating">
                                                    <option value="1">1</option>
                                                    <option value="2" selected>2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>

                                            <p>Good quality material, insulates well. There is room for improvement.</p>

                                            <div class="feed-footer">
                                                <span class="pr-3 text-success"><i class="fa fa-check-circle"></i>
                                                Verified Purchase </span>
                                                
                                                <p class="clearfix"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/Single feed-->

                                <!--Single feed-->
                                <hr>
                                <div class="feed-single mb-3">
                                    <div class="media">
                                        <img class="mr-3 rounded-circle" height="40px" width="40px" src="/php-duhoc/public/assets/img/client-img2.png" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <h6 class="mt-1">Maria Riverra 
                                                <small class="text-muted pl-3"><i class="fa fa-clock"></i> November 7, 2018</small>
                                                
                                                <p class="clearfix"></p>
                                            </h6>

                                            <div class="user-rating">
                                                <select class="reviewRating">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4" selected>4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>

                                            <p>i like it, very nice</p>

                                            <div class="feed-footer">
                                                <span class="pr-3 text-success"><i class="fa fa-check-circle"></i>
                                                Verified Purchase </span>
                                                
                                                <p class="clearfix"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/Single feed-->

                                <!--Single feed-->
                                <hr>
                                <div class="feed-single mb-3">
                                    <div class="media">
                                        <img class="mr-3 rounded-circle" height="40px" width="40px" src="/php-duhoc/public/assets/img/client-img4.png" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <h6 class="mt-1">John Doe 
                                                <small class="text-muted pl-3"><i class="fa fa-clock"></i> October 5, 2018</small>
                                                
                                                <p class="clearfix"></p>
                                            </h6>

                                            <div class="user-rating">
                                                <select class="reviewRating">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4" selected>4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>

                                            <p>Dope</p>

                                            <div class="feed-footer">
                                                <span class="pr-3 text-success"><i class="fa fa-check-circle"></i>
                                                Verified Purchase </span>
                                                
                                                <p class="clearfix"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/Single feed-->

                            </div>
                            <!--/Feed tab-->

                            <!--Personal info tab-->
                            <div class="tab-pane fade p-3" id="custom-profile" role="tabpanel" aria-labelledby="nav-profile">
                                
                                <h6 class="mb-3">Product Details</h6>
                                <table class="table table-striped table-bordered">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Model:</th>
                                            <td>Model 2.3</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">color:</th>
                                            <td>red</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">features</th>
                                            <td>New Model ,High heals</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Advanced</th>
                                            <td>Feel Comfortability </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                            <!--/Personal info tab-->

                            <!--Resume tab-->
                            <div class="tab-pane fade p-3" id="custom-contact" role="tabpanel" aria-labelledby="nav-contact">
                                
                                <p class="p-typo">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                                </p>

                                <p class="p-typo">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                </p>

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
    <!--Slick Courasel-->
    <script src="/php-duhoc/public/assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="/php-duhoc/public/assets/css/slick/slick.min.js"></script>
    <script src="/php-duhoc/public/assets/js/product-carousel.js"></script>
    <!--Bootstrap Calendar JS-->
    <script src="/php-duhoc/public/assets/js/calendar/bootstrap_calendar.js"></script>
    <script src="/php-duhoc/public/assets/js/calendar/demo.js"></script>
    <!--Bar rating-->
    <script src="/php-duhoc/public/assets/js/jquery.barrating.min.js"></script>

    <!--Custom Js Script-->
    <script src="/php-duhoc/public/assets/js/custom.js"></script>
    
  </body>
</html>