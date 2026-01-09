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
    <!--Font Awesome-->
    <link rel="stylesheet" href="/php-duhoc/public/assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="/php-duhoc/public/assets/css/fontawesome.css">
    <!--Custom style.css-->
    <link rel="stylesheet" href="/php-duhoc/public/assets/css/quicksand.css">
    <link rel="stylesheet" href="/php-duhoc/public/assets/css/style.css">
    <!--Chartist CSS-->
    <link rel="stylesheet" href="/php-duhoc/public/assets/css/chartist.min.css">
    <!--Bootstrap Calendar-->
    <link rel="stylesheet" href="/php-duhoc/public/assets/js/calendar/bootstrap_calendar.css">
    <!--Nice select-->
    <link rel="stylesheet" href="/php-duhoc/public/assets/css/nice-select.css">

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
                <h5 class="mb-0" ><strong>Email Inbox</strong></h5>
                <span class="text-secondary">Pages <i class="fa fa-angle-right"></i> Email inbox</span>
                
                <div class="row mt-3">
                    <div class="col-md-3 col-sm-12">
                        <!--Email menu-->
                        <div class="mt-1 mb-3 button-container bg-white border shadow-sm">
                            <div class="p-2 px-3 mb-0 border-bottom">
                                <h6 class="mb-0"><span class="align-bottom" style="line-height: 35px;">Compose</span>
                                    <a href="" class="btn btn-theme btn-round shadow-sm pull-right"><i class="fa fa-pencil"></i></a>

                                    <div class="clearfix"></div>
                                </h6>
                            </div>
                            <div class="email-menu mt-0">
                                <a href="#" class="bg-secondary text-white btn-block px-3 mt-0"><i class="fa fa-inbox mr-4"></i> Inbox <span class="badge badge-danger pull-right mt-3">23</span></a>

                                <a href="#" class="btn-block px-3 border-bottom mt-0"><i class="fa fa-paper-plane pr-4 text-success"></i> Sent</a>

                                <a href="#" class="btn-block px-3 border-bottom mt-0"><i class="fa fa-inbox pr-4 text-warning"></i> Spam <span class="badge badge-warning pull-right mt-3">10</span></a>  

                                <a href="#" class="btn-block px-3 border-bottom mt-0"><i class="fa fa-star-o pr-4"></i> Starred <span class="badge badge-success pull-right mt-3">3</span></a>  
                                <a href="#" class="btn-block px-3 border-bottom mt-0"><i class="fa fa-file-o pr-4 text-info"></i> Drafts</a> 

                                <a href="#" class="btn-block px-3 border-bottom mt-0"><i class="fa fa-trash-o pr-4 text-danger"></i> Trash</a> 
                            </div>
                        </div>
                        <!--/Email menu-->


                        <!--Chats-->
                        <div class="mt-1 mb-3 button-container bg-white border shadow-sm lh-sm">
                            <div class="p-2 px-3 mb-0 border-bottom email-chat">
                                <h6 class="mb-0"><span class="align-bottom" style="line-height: 35px;">Chats</span>
                                    <small class="pull-right"><i class="fa fa-circle text-success"></i> online </small></h6>

                                    <div class="clearfix"></div>
                                </h6>
                            </div>

                            <div class="email-chat-body mt-0">
                                <div class="media p-3 border-bottom">
                                    <img class="align-self-center mr-3 rounded-circle" src="/php-duhoc/public/assets/img/client-img4.png" width="40px" height="40px" alt="Generic placeholder image">
                                    <div class="media-body dd">
                                        <p><strong>John doe</strong></p>
                                        <small>Web developer</small>
                                    </div>
                                </div>

                                <div class="media p-3 border-bottom">
                                    <img class="align-self-center mr-3 rounded-circle" src="/php-duhoc/public/assets/img/client-img3.png" width="40px" height="40px" alt="Generic placeholder image">
                                    <div class="media-body dd">
                                        <p><strong>Jane doe</strong></p>
                                        <small>Web designer</small>
                                    </div>
                                </div>

                                <div class="media p-3">
                                    <img class="align-self-center mr-3 rounded-circle" src="/php-duhoc/public/assets/img/client-img2.png" width="40px" height="40px" alt="Generic placeholder image">
                                    <div class="media-body dd">
                                        <p><strong>Stella Marcus</strong></p>
                                        <small>C++ developer</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/Chats-->

                    </div>

                    <div class="col-md-9 col-sm-12">
                        <!--Email messages-->
                        <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm lh-sm">
                            <div class="email-msg">
                                <div class="email-inbox-menu">
                                    <div class="pull-left border px-1 pt-2 pb-2 rounded shadow mr-3">
                                        <div class="form-check-box cta pull-left mt-0 mr-1">
                                            <span class="color1">
                                                <input type="checkbox" id="mail-all">
                                                <label for="mail-all"></label>
                                            </span>
                                        </div>
                                        <span class="btn dropdown-toggle pull-left p-0 mr-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All</span>
                                        <div class="dropdown-menu p-0 border shadow">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>

                                        <span class="clearfix"></span>
                                    </div>

                                    <button type="button"  class="btn btn-light shadow border pull-left pt-2 pb-2 mr-3"><i class="fa fa-refresh text-success"></i></button>

                                    <button type="button"  class="btn btn-light shadow border pull-left pt-2 pb-2 mr-3"><i class="fa fa-trash text-danger"></i></button>

                                    <div class="pull-right">
                                        <button type="button"  class="btn btn-light shadow border pull-right pt-2 pb-2 ml-2"><i class="fa fa-angle-right"></i></button>

                                        <div class="mt-3 pull-right"><span>1-50 of 234</span></div>

                                        <span class="clearfix"></span>
                                    </div>

                                    
                                    
                                    <span class="clearfix"></span>
                                </div>


                                <div class="email-msg-list table-responsive">
                                    <table class="table mt-4">
                                        <tbody>
                                            <tr>
                                                <td style="width: 10px;" class="p-0 pr-1 align-middle">
                                                    <div class="form-check-box cta">
                                                        <span class="color1">
                                                            <input type="checkbox" id="one">
                                                            <label for="one"></label>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="align-middle border-left-0"><i class="fa fa-star text-info"></i></td>
                                                <td class="align-middle">Fluid triangle</td>
                                                <td class="align-middle">Congratulations on completions</td>
                                                <td class="align-middle"><i class="fa fa-paperclip"></i></td>
                                                <td class="align-middle">March 27</td>
                                            </tr>
                                            <tr>
                                                <td style="width: 10px;" class="p-0 pr-1 align-middle">
                                                    <div class="form-check-box cta">
                                                        <span class="color1">
                                                            <input type="checkbox" id="two">
                                                            <label for="two"></label>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="align-middle border-left-0"><i class="fa fa-star-o"></i></td>
                                                <td class="align-middle">Github</td>
                                                <td class="align-middle">Third party OAuth Login</td>
                                                <td class="align-middle"></td>
                                                <td class="align-middle">09:30pm</td>
                                            </tr>
                                            <tr class="table-secondary">
                                                <td style="width: 10px;" class="p-0 pr-1 align-middle">
                                                    <div class="form-check-box cta">
                                                        <span class="color1">
                                                            <input type="checkbox" id="three">
                                                            <label for="three"></label>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="align-middle border-left-0"><i class="fa fa-star-o"></i></td>
                                                <td class="align-middle">Jeff Rose CFP</td>
                                                <td class="align-middle"><strong>DAY 7: Plug it in</strong></td>
                                                <td class="align-middle"><i class="fa fa-paperclip"></i></td>
                                                <td class="align-middle">March 27</td>
                                            </tr>
                                            <tr>
                                                <td style="width: 10px;" class="p-0 pr-1 align-middle">
                                                    <div class="form-check-box cta">
                                                        <span class="color1">
                                                            <input type="checkbox" id="four">
                                                            <label for="four"></label>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="align-middle border-left-0"><i class="fa fa-star text-info"></i></td>
                                                <td class="align-middle">Fluid triangle</td>
                                                <td class="align-middle">Congratulations on completions</td>
                                                <td class="align-middle"><i class="fa fa-paperclip"></i></td>
                                                <td class="align-middle">March 27</td>
                                            </tr>
                                            <tr>
                                                <td style="width: 10px;" class="p-0 pr-1 align-middle">
                                                    <div class="form-check-box cta">
                                                        <span class="color1">
                                                            <input type="checkbox" id="five">
                                                            <label for="five"></label>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="align-middle border-left-0"><i class="fa fa-star-o"></i></td>
                                                <td class="align-middle">Github</td>
                                                <td class="align-middle">Third party OAuth Login</td>
                                                <td class="align-middle"></td>
                                                <td class="align-middle">09:30pm</td>
                                            </tr>
                                            <tr>
                                                <td style="width: 10px;" class="p-0 pr-1 align-middle">
                                                    <div class="form-check-box cta">
                                                        <span class="color1">
                                                            <input type="checkbox" id="six">
                                                            <label for="six"></label>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="align-middle border-left-0"><i class="fa fa-star-o"></i></td>
                                                <td class="align-middle">Jeff Rose CFP</td>
                                                <td class="align-middle"><strong>DAY 6: Plug it in</strong></td>
                                                <td class="align-middle"><i class="fa fa-paperclip"></i></td>
                                                <td class="align-middle">March 27</td>
                                            </tr>
                                            <tr class="table-secondary">
                                                <td style="width: 10px;" class="p-0 pr-1 align-middle">
                                                    <div class="form-check-box cta">
                                                        <span class="color1">
                                                            <input type="checkbox" id="seven">
                                                            <label for="seven"></label>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="align-middle border-left-0"><i class="fa fa-star text-info"></i></td>
                                                <td class="align-middle">Heroku</td>
                                                <td class="align-middle">Congratulations on signup</td>
                                                <td class="align-middle"><i class="fa fa-paperclip"></i></td>
                                                <td class="align-middle">March 27</td>
                                            </tr>
                                            <tr>
                                                <td style="width: 10px;" class="p-0 pr-1 align-middle">
                                                    <div class="form-check-box cta">
                                                        <span class="color1">
                                                            <input type="checkbox" id="eight">
                                                            <label for="eight"></label>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="align-middle border-left-0"><i class="fa fa-star-o"></i></td>
                                                <td class="align-middle">Github</td>
                                                <td class="align-middle">New commit</td>
                                                <td class="align-middle"></td>
                                                <td class="align-middle">08:30pm</td>
                                            </tr>
                                            <tr>
                                                <td style="width: 10px;" class="p-0 pr-1 align-middle">
                                                    <div class="form-check-box cta">
                                                        <span class="color1">
                                                            <input type="checkbox" id="nine">
                                                            <label for="nine"></label>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="align-middle border-left-0"><i class="fa fa-star-o"></i></td>
                                                <td class="align-middle">Jeff Rose CFP</td>
                                                <td class="align-middle"><strong>DAY 5: Plug it in</strong></td>
                                                <td class="align-middle"><i class="fa fa-paperclip"></i></td>
                                                <td class="align-middle">March 27</td>
                                            </tr>
                                            <tr>
                                                <td style="width: 10px;" class="p-0 pr-1 align-middle">
                                                    <div class="form-check-box cta">
                                                        <span class="color1">
                                                            <input type="checkbox" id="ten">
                                                            <label for="ten"></label>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="align-middle border-left-0"><i class="fa fa-star-o"></i></td>
                                                <td class="align-middle">Linkedin</td>
                                                <td class="align-middle">Jeff wants to connect with you</td>
                                                <td class="align-middle"></td>
                                                <td class="align-middle">08:30pm</td>
                                            </tr>
                                            <tr>
                                                <td style="width: 10px;" class="p-0 pr-1 align-middle">
                                                    <div class="form-check-box cta">
                                                        <span class="color1">
                                                            <input type="checkbox" id="eleven">
                                                            <label for="eleven"></label>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="align-middle border-left-0"><i class="fa fa-star-o"></i></td>
                                                <td class="align-middle">Jeff Rose CFP</td>
                                                <td class="align-middle"><strong>DAY 4: Plug it in</strong></td>
                                                <td class="align-middle"><i class="fa fa-paperclip"></i></td>
                                                <td class="align-middle">March 27</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!--/Email messages-->

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
    <!--Nice select-->
    <script src="/php-duhoc/public/assets/js/jquery.nice-select.min.js"></script>

    <!--Custom Js Script-->
    <script src="/php-duhoc/public/assets/js/custom.js"></script>
    <!--Custom Js Script-->
  </body>
</html>