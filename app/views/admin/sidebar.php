 <div class="col-sm-3 col-xs-6 sidebar pl-0">
                <div class="inner-sidebar mr-3">
                    <!--Image Avatar-->
                    <div class="avatar text-center">
                        <img src="<?= $base ?>/assets/img/client-img4.png" alt="" class="rounded-circle" />
                        <p><strong>Jonathan Clarke</strong></p>
                        <span class="text-primary small"><strong>UI/UX Designer</strong></span>
                    </div>
                    <!--Image Avatar-->

                    <!--Sidebar Navigation Menu-->
                    <div class="sidebar-menu-container">
                        <ul class="sidebar-menu mt-4 mb-4">
                            <li class="parent">
                                <a href="#" onclick="toggle_menu('dashboard'); return false" class=""><i class="fa fa-dashboard mr-3"> </i>
                                    <span class="none">Dashboard <i class="fa fa-angle-down pull-right align-bottom"></i></span>
                                </a>
                                <ul class="children" id="dashboard">
                                    <li class="child"><a href="<?= $base ?>/admin/index.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Default</a></li>
                                    <li class="child"><a href="<?= $base ?>/admin/index2.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Analytics</a></li>
                                    <li class="child"><a href="<?= $base ?>/admin/index3.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Ecommerce</a></li>
                                    <li class="child"><a href="<?= $base ?>/admin/index4.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Cryptocurrency</a></li>
                                </ul>
                            </li>
                            </li>
                            <li class="parent">
                                <a href="<?= $base ?>/admin/widgets.html" class=""><i class="fa fa-puzzle-piece mr-3"></i>
                                    <span class="none">Widget </span>
                                </a>
                            </li>
                            <li class="parent">
                                <a href="#" onclick="toggle_menu('ul_element'); return false" class=""><i class="fa fa-puzzle-piece mr-3"></i>
                                    <span class="none">UI Elements <i class="fa fa-angle-down pull-right align-bottom"></i></span>
                                </a>
                                <ul class="children" id="ul_element">
                                    <li class="child"><a href="<?= $base ?>/admin/accordion.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Accordions</a></li>
                                    <li class="child"><a href="<?= $base ?>/admin/buttons.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Buttons</a></li>
                                    <li class="child"><a href="<?= $base ?>/admin/badges.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Badges</a></li>
                                    <li class="child"><a href="<?= $base ?>/admin/breadcrumb.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Breadcrumbs</a></li>
                                    <li class="child"><a href="<?= $base ?>/admin/cards.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Cards</a></li>
                                    <li class="child"><a href="<?= $base ?>/admin/icons.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Icons</a></li>
                                    <li class="child"><a href="<?= $base ?>/admin/modal.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Modals</a></li>
                                    <li class="child"><a href="<?= $base ?>/admin/notification.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Notification</a></li>
                                    <li class="child"><a href="<?= $base ?>/admin/progressbar.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Progressbar</a></li>
                                    <li class="child"><a href="<?= $base ?>/admin/sweetalert.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Sweet alert</a></li>
                                    <li class="child"><a href="<?= $base ?>/admin/tabs.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Tabs</a></li>
                                    <li class="child"><a href="<?= $base ?>/admin/tooltip-popover.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Tooltip and Popovers</a></li>
                                    <li class="child"><a href="<?= $base ?>/admin/typography.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Typography</a></li>
                                </ul>
                            </li>
                            <li class="parent">
                                <a href="#" onclick="toggle_menu('form_element'); return false" class=""><i class="fa fa-pencil-square mr-3"></i>
                                    <span class="none">Form Elements <i class="fa fa-angle-down pull-right align-bottom"></i></span>
                                </a>
                                <ul class="children" id="form_element">
                                    <li class="child"><a href="<?= $base ?>/admin/form-general.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Basic Elements</a></li>
                                    <li class="child"><a href="<?= $base ?>/admin/form-advanced.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Advanced Elements</a></li>
                                    <li class="child"><a href="<?= $base ?>/admin/form-validation.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Validation</a></li>
                                    <li class="child"><a href="<?= $base ?>/admin/form-wizard.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Form Wizard</a></li>
                                </ul>
                            </li>
                            <li class="parent">
                                <a href="#" onclick="toggle_menu('editors'); return false" class=""><i class="fa fa-pencil-square-o mr-3"></i>
                                    <span class="none">Text Editors <i class="fa fa-angle-down pull-right align-bottom"></i></span>
                                </a>
                                <ul class="children" id="editors">
                                    <li class="child"><a href="<?= $base ?>/admin/ckeditor-classic.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Ckeditor classic</a></li>
                                    <li class="child"><a href="<?= $base ?>/admin/ckeditor-inline.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Ckeditor inline</a></li>
                                    <li class="child"><a href="<?= $base ?>/admin/ckeditor-document.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Ckeditor document</a></li>
                                    <li class="child"><a href="<?= $base ?>/admin/summernote.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Summernote editor</a></li>
                                    <!-- <li class="child"><a href="<?= $base ?>/admin/posts" class="ml-4"> <i class="fa fa-file-text"></i> Posts </a> </li> -->
                                    <li class="child"><a href="<?= $base ?>/admin/posts" class="ml-4"> <i class="fa fa-file-text"></i> Posts </a> </li>
                                </ul>
                            </li>
                            <li class="parent">
                                <a href="#" onclick="toggle_menu('tables'); return false" class=""><i class="fa fa-pencil-square mr-3"></i>
                                    <span class="none">Tables <i class="fa fa-angle-down pull-right align-bottom"></i></span>
                                </a>
                                <ul class="children" id="tables">
                                    <li class="child"><a href="<?= $base ?>/admin/basic-tables.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Basic Tables</a></li>
                                    <li class="child"><a href="<?= $base ?>/admin/datatable.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Datatables</a></li>
                                    <li class="child"><a href="<?= $base ?>/admin/jsgrid-table.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> JSGrid Tables</a></li>
                                </ul>
                            </li>
                            <li class="parent">
                                <a href="#" onclick="toggle_menu('charts'); return false" class=""><i class="fa fa-pie-chart mr-3"></i>
                                    <span class="none">Charts <i class="fa fa-angle-down pull-right align-bottom"></i></span>
                                </a>
                                <ul class="children" id="charts">
                                    <li class="child"><a href="<?= $base ?>/admin/chart.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Chart JS</a></li>
                                    <li class="child"><a href="<?= $base ?>/admin/chartist.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Chartist JS</a></li>
                                    <li class="child"><a href="<?= $base ?>/admin/echarts.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Echarts JS</a></li>
                                    <li class="child"><a href="<?= $base ?>/admin/flot.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Flot JS</a></li>
                                    <li class="child"><a href="<?= $base ?>/admin/morris.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Morris JS</a></li>
                                    <li class="child"><a href="<?= $base ?>/admin/nvd3.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> NVD3 JS</a></li>
                                    <li class="child"><a href="<?= $base ?>/admin/sparkline.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Sparkline JS</a></li>
                                </ul>
                            </li>
                            <li class="parent">
                                <a href="<?= $base ?>/admin/icons.html" class=""><i class="fa fa-toggle-on mr-3"></i>
                                    <span class="none">Icons</span>
                                </a>
                            </li>
                            <li class="parent">
                                <a href="#" onclick="toggle_menu('ecommerce'); return false" class=""><i class="fa fa-shopping-cart mr-3"></i>
                                    <span class="none">Ecommerce <i class="fa fa-angle-down pull-right align-bottom"></i></span>
                                </a>
                                <ul class="children" id="ecommerce">
                                    <li class="child"><a href="<?= $base ?>/admin/products.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> ProductList</a></li>
                                    <li class="child"><a href="<?= $base ?>/admin/product-detail.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> ProductDetail</a></li>
                                    <li class="child"><a href="<?= $base ?>/admin/orders.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> OrderList</a></li>
                                    <li class="child"><a href="<?= $base ?>/admin/invoice.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Invoice</a></li>
                                </ul>
                            </li>
                            <li class="parent">
                                <a href="#" onclick="toggle_menu('maps'); return false" class=""><i class="fa fa-map mr-3"></i>
                                    <span class="none">Maps <i class="fa fa-angle-down pull-right align-bottom"></i></span>
                                </a>
                                <ul class="children" id="maps">
                                    <li class="child"><a href="<?= $base ?>/admin/jvector-maps.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Jvector Maps</a></li>
                                    <li class="child"><a href="<?= $base ?>/admin/google-maps.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Google Maps</a></li>
                                </ul>
                            </li>
                            <li class="parent">
                                <a href="#" onclick="toggle_menu('pages'); return false" class=""><i class="fa fa-file mr-3"></i>
                                    <span class="none">Pages <i class="fa fa-angle-down pull-right align-bottom"></i></span>
                                </a>
                                <ul class="children" id="pages">
                                    <li class="child"><a href="<?= $base ?>/admin/email-inbox.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Email-Inbox</a></li>
                                    <li class="child"><a href="<?= $base ?>/admin/email.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Email-Compose</a></li>
                                    <li class="child"><a href="<?= $base ?>/admin/login.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Login</a></li>
                                    <li class="child"><a href="<?= $base ?>/admin/register.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Signup</a></li>
                                    <li class="child"><a href="<?= $base ?>/admin/lockscreen.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Lock Screen</a></li>
                                    <li class="child"><a href="<?= $base ?>/admin/forgot-password.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Forgot Password</a></li>
                                    <li class="child"><a href="<?= $base ?>/admin/profile.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Profile</a></li>
                                    <li class="child"><a href="<?= $base ?>/admin/gallery.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Gallery</a></li>
                                    <li class="child"><a href="<?= $base ?>/admin/invoice.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Invoice</a></li>
                                    <li class="child"><a href="<?= $base ?>/admin/search-result.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Search</a></li>
                                    <li class="child"><a href="<?= $base ?>/admin/pricing.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Pricing</a></li>
                                    <li class="child"><a href="<?= $base ?>/admin/blank.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Blank Page</a></li>
                                    <li class="child"><a href="<?= $base ?>/admin/error-404.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Error 404</a></li>
                                    <li class="child"><a href="<?= $base ?>/admin/error-500.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Error 500</a></li>
                                    <li class="child"><a href="<?= $base ?>/admin/error-504.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Error 504</a></li>
                                </ul>
                            </li>
                            <li class="parent">
                                <a href="<?= $base ?>/admin/fullcalendar.html" class=""><i class="fa fa-calendar-o mr-3"> </i>
                                    <span class="none">Full Calendar </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!--Sidebar Naigation Menu-->
                </div>
            </div>
