<?php
// Logic kiểm tra URL để mở/đóng menu con và highlight
$uri = $_SERVER['REQUEST_URI'];
$base = $GLOBALS['base'] ?? '';

// Helper để kiểm tra trang hiện tại và trả về class màu sắc
function activeClass($targetPath)
{
    global $uri, $base;

    $currentPath = parse_url($uri, PHP_URL_PATH);
    $fullPath = $base . $targetPath;

    // 1. So sánh chính xác tuyệt đối
    if ($currentPath == $fullPath)
        return 'text-primary font-weight-bold';

    // 2. So sánh bắt đầu (cho các trang con như /edit, /create)
    // Đảm bảo không match nhầm (ví dụ /userABC so với /user) bằng cách thêm dấu / hoặc kiểm tra kỹ
    if ($fullPath !== $base && strpos($currentPath, $fullPath) === 0)
        return 'text-primary font-weight-bold';

    // 3. Fallback: Kiểm tra từ khóa cụ thể cho các module chính (khắc phục lỗi path prefix)
    if (strpos($targetPath, '/admin/users') !== false && strpos($currentPath, '/users') !== false)
        return 'text-primary font-weight-bold';
    if (strpos($targetPath, '/admin/files') !== false && strpos($currentPath, '/files') !== false)
        return 'text-primary font-weight-bold';
    if (strpos($targetPath, '/admin/posts') !== false && strpos($currentPath, '/posts') !== false)
        return 'text-primary font-weight-bold';
    if (strpos($targetPath, '/admin/categories') !== false && strpos($currentPath, '/categories') !== false)
        return 'text-primary font-weight-bold';
    if (strpos($targetPath, '/admin/tags') !== false && strpos($currentPath, '/tags') !== false)
        return 'text-primary font-weight-bold';
    if (strpos($targetPath, '/admin/consultations') !== false && strpos($currentPath, '/consultations') !== false)
        return 'text-primary font-weight-bold';
    if (strpos($targetPath, '/admin/continents') !== false && strpos($currentPath, '/continents') !== false)
        return 'text-primary font-weight-bold';
    if (strpos($targetPath, '/admin/countries') !== false && strpos($currentPath, '/countries') !== false)
        return 'text-primary font-weight-bold';
    if (strpos($targetPath, '/admin/cities') !== false && strpos($currentPath, '/cities') !== false)
        return 'text-primary font-weight-bold';
    if (strpos($targetPath, '/admin/education-levels') !== false && strpos($currentPath, '/education-levels') !== false)
        return 'text-primary font-weight-bold';
    if (strpos($targetPath, '/admin/schools') !== false && strpos($currentPath, '/schools') !== false)
        return 'text-primary font-weight-bold';
    if (strpos($targetPath, '/admin/slides') !== false && strpos($currentPath, '/slides') !== false)
        return 'text-primary font-weight-bold';
    if (strpos($targetPath, '/admin/partners') !== false && strpos($currentPath, '/partners') !== false)
        return 'text-primary font-weight-bold';


    return '';
}

// Helper để check mở menu con (giữ nguyên logic cũ)
function isGroupActive($keywords)
{
    global $uri;
    if (!is_array($keywords))
        $keywords = [$keywords];
    foreach ($keywords as $k) {
        if (strpos($uri, $k) !== false)
            return true;
    }
    return false;
}

// Định nghĩa trạng thái mở cho từng nhóm menu
$open_dashboard = isGroupActive(['/admin/index', '/admin/dashboard']) || $uri == $base . '/admin' || $uri == $base . '/admin/';
$open_ui = isGroupActive(['accordion', 'buttons', 'badges', 'breadcrumb', 'cards', 'icons', 'modal', 'notification', 'progressbar', 'sweetalert', 'tabs', 'tooltip', 'typography']);
$open_forms = isGroupActive(['form-']);
$open_editors = isGroupActive(['ckeditor', 'summernote']);
$open_tables = isGroupActive(['table', 'datatable', 'jsgrid']);
$open_charts = isGroupActive(['chart', 'flot', 'morris', 'nvd3', 'sparkline']);
$open_ecommerce = isGroupActive(['product', 'order', 'invoice']);
$open_maps = isGroupActive(['map']);
$open_pages = isGroupActive(['email', 'login', 'register', 'lockscreen', 'forgot', 'profile', 'gallery', 'search', 'pricing', 'blank', 'error']);
?>

<div class="col-sm-3 col-xs-6 sidebar pl-0">
    <div class="inner-sidebar mr-3">
        <!--Image Avatar-->
        <div class="avatar text-center">
            <?php $currentUser = Auth::user(); ?>
            <img src="<?= $base ?>/assets/img/client-img4.png" alt="" class="rounded-circle" />
            <p><strong><?= htmlspecialchars($currentUser['full_name'] ?? 'Admin') ?></strong></p>
            <span
                class="text-primary small"><strong><?= ucfirst($currentUser['email'] ?? 'Administrator') ?></strong></span>
        </div>
        <!--Image Avatar-->

        <!--Sidebar Navigation Menu-->
        <div class="sidebar-menu-container">
            <ul class="sidebar-menu mt-4 mb-4">
                <!-- STAFF / USERS -->
                <li class="parent">
                    <a href="<?= $base ?>/admin/users" class="<?= activeClass('/admin/users') ?>">
                        <i class="fa fa-users mr-3"></i>
                        <span class="none"> Quản lý người dùng </span>
                    </a>
                </li>

                <!-- POSTS -->
                <?php
                // Fetch categories for sidebar menu
                $sidebarCategories = [];
                try {
                    $sidebarDb = Db::getInstance()->pdo();
                    $sidebarStmt = $sidebarDb->query("SELECT id, name FROM categories ORDER BY name ASC");
                    $sidebarCategories = $sidebarStmt->fetchAll(PDO::FETCH_ASSOC);
                } catch (Exception $e) {
                    // Ignore error if DB fails
                }

                // Check if Posts menu should be open
                $open_posts = isGroupActive(['/admin/posts']);
                ?>
                <li class="parent">
                    <a href="#" onclick="toggle_menu('posts_menu'); return false" class="">
                        <i class="fa fa-file-text mr-3"></i>
                        <span class="none"> Quản lý bài viết <i
                                class="fa fa-angle-down pull-right align-bottom"></i></span>
                    </a>
                    <ul class="children" id="posts_menu" style="display: <?= $open_posts ? 'block' : 'none' ?>;">
                        <li class="child">
                            <a href="<?= $base ?>/admin/posts"
                                class="ml-4 <?= ($uri == $base . '/admin/posts' && empty($_GET['category_id'])) ? 'text-primary font-weight-bold' : '' ?>">
                                <i class="fa fa-angle-right mr-2"></i> Tất cả bài viết
                            </a>
                        </li>
                        <?php foreach ($sidebarCategories as $cat): ?>
                            <li class="child">
                                <a href="<?= $base ?>/admin/posts?category_id=<?= $cat['id'] ?>"
                                    class="ml-4 <?= (isset($_GET['category_id']) && $_GET['category_id'] == $cat['id']) ? 'text-primary font-weight-bold' : '' ?>">
                                    <i class="fa fa-angle-right mr-2"></i> <?= htmlspecialchars($cat['name']) ?>
                                </a>
                            </li>
                        <?php endforeach; ?>

                        <li class="child" style="border-top: 1px dashed #eee; margin-top: 5px; padding-top: 5px;">
                            <a href="<?= $base ?>/admin/posts/create<?= isset($_GET['category_id']) ? '?category_id=' . $_GET['category_id'] : '' ?>"
                                class="ml-4 text-success">
                                <i class="fa fa-plus mr-2"></i> Viết bài mới
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- CATEGORIES -->
                <li class="parent">
                    <a href="<?= $base ?>/admin/categories" class="<?= activeClass('/admin/categories') ?>">
                        <i class="fa fa-tags mr-3"></i>
                        <span class="none"> Quản lý danh mục </span>
                    </a>
                </li>

                <!-- SLIDES -->
                <li class="parent">
                    <a href="<?= $base ?>/admin/slides" class="<?= activeClass('/admin/slides') ?>">
                        <i class="fa fa-sliders mr-3"></i>
                        <span class="none"> Quản lý Slide </span>
                    </a>
                </li>

                <!-- TAGS -->
                <li class="parent">
                    <a href="<?= $base ?>/admin/tags" class="<?= activeClass('/admin/tags') ?>">
                        <i class="fa fa-bookmark mr-3"></i>
                        <span class="none"> Quản lý Cập nhật (Tags) </span>
                    </a>
                </li>

                <!-- LOCATIONS -->
                <li class="parent">
                    <a href="#" onclick="toggle_menu('locations'); return false" class="">
                        <i class="fa fa-globe mr-3"></i>
                        <span class="none"> Quản lý Địa điểm <i
                                class="fa fa-angle-down pull-right align-bottom"></i></span>
                    </a>
                    <ul class="children" id="locations" style="display: none;">
                        <li class="child"><a href="<?= $base ?>/admin/continents"
                                class="ml-4 <?= activeClass('/admin/continents') ?>"><i
                                    class="fa fa-angle-right mr-2"></i> Châu Lục</a></li>
                        <li class="child"><a href="<?= $base ?>/admin/countries"
                                class="ml-4 <?= activeClass('/admin/countries') ?>"><i
                                    class="fa fa-angle-right mr-2"></i> Quốc Gia</a></li>
                        <li class="child"><a href="<?= $base ?>/admin/cities"
                                class="ml-4 <?= activeClass('/admin/cities') ?>"><i class="fa fa-angle-right mr-2"></i>
                                Thành Phố</a></li>
                    </ul>
                </li>

                <!-- EDUCATION -->
                <li class="parent">
                    <a href="#" onclick="toggle_menu('education'); return false" class="">
                        <i class="fa fa-graduation-cap mr-3"></i>
                        <span class="none"> Quản lý Đào tạo <i
                                class="fa fa-angle-down pull-right align-bottom"></i></span>
                    </a>
                    <ul class="children" id="education" style="display: none;">
                        <li class="child"><a href="<?= $base ?>/admin/education-levels"
                                class="ml-4 <?= activeClass('/admin/education-levels') ?>"><i
                                    class="fa fa-angle-right mr-2"></i> Bậc Học</a></li>
                        <li class="child"><a href="<?= $base ?>/admin/schools"
                                class="ml-4 <?= activeClass('/admin/schools') ?>"><i class="fa fa-angle-right mr-2"></i>
                                Trường Học</a></li>
                    </ul>
                </li>

                <!-- CONSULTATIONS -->
                <li class="parent">
                    <a href="<?= $base ?>/admin/consultations" class="<?= activeClass('/admin/consultations') ?>">
                        <i class="fa fa-commenting mr-3"></i>
                        <span class="none"> Danh sách tư vấn </span>
                    </a>
                </li>

                <!-- PARTNERS -->
                <li class="parent">
                    <a href="<?= $base ?>/admin/partners" class="<?= activeClass('/admin/partners') ?>">
                        <i class="fa fa-briefcase mr-3"></i>
                        <span class="none"> Danh sách đối tác </span>
                    </a>
                </li>


                <!-- FILES -->
                <li class="parent">
                    <a href="<?= $base ?>/admin/files" class="<?= activeClass('/admin/files') ?>">
                        <i class="fa fa-file mr-3"></i>
                        <span class="none"> Danh sách files </span>
                    </a>
                </li>

                <!-- DASHBOARD -->
                <!-- <li class="parent">
                    <a href="#" onclick="toggle_menu('dashboard'); return false" class="">
                        <i class="fa fa-dashboard mr-3"> </i>
                        <span class="none">Dashboard <i class="fa fa-angle-down pull-right align-bottom"></i></span>
                    </a>
                    <ul class="children" id="dashboard" style="display: <?= $open_dashboard ? 'block' : 'none' ?>;">
                        <li class="child"><a href="<?= $base ?>/admin/index.html" class="ml-4 <?= activeClass('/admin/index.html') ?>"><i class="fa fa-angle-right mr-2"></i> Default</a></li>
                        <li class="child"><a href="<?= $base ?>/admin/index2.html" class="ml-4 <?= activeClass('/admin/index2.html') ?>"><i class="fa fa-angle-right mr-2"></i> Analytics</a></li>
                        <li class="child"><a href="<?= $base ?>/admin/index3.html" class="ml-4 <?= activeClass('/admin/index3.html') ?>"><i class="fa fa-angle-right mr-2"></i> Ecommerce</a></li>
                        <li class="child"><a href="<?= $base ?>/admin/index4.html" class="ml-4 <?= activeClass('/admin/index4.html') ?>"><i class="fa fa-angle-right mr-2"></i> Cryptocurrency</a></li>
                    </ul>
                </li>

                <li class="parent">
                    <a href="<?= $base ?>/admin/widgets.html" class="<?= activeClass('/admin/widgets.html') ?>"><i class="fa fa-puzzle-piece mr-3"></i>
                        <span class="none">Widget </span>
                    </a>
                </li> -->

                <!-- UI ELEMENTS -->
                <!-- <li class="parent">
                    <a href="#" onclick="toggle_menu('ul_element'); return false" class="">
                        <i class="fa fa-puzzle-piece mr-3"></i>
                        <span class="none">UI Elements <i class="fa fa-angle-down pull-right align-bottom"></i></span>
                    </a>
                    <ul class="children" id="ul_element" style="display: <?= $open_ui ? 'block' : 'none' ?>;">
                        <li class="child"><a href="<?= $base ?>/admin/accordion.html" class="ml-4 <?= activeClass('/admin/accordion.html') ?>"><i class="fa fa-angle-right mr-2"></i> Accordions</a></li>
                        <li class="child"><a href="<?= $base ?>/admin/buttons.html" class="ml-4 <?= activeClass('/admin/buttons.html') ?>"><i class="fa fa-angle-right mr-2"></i> Buttons</a></li>
                        <li class="child"><a href="<?= $base ?>/admin/badges.html" class="ml-4 <?= activeClass('/admin/badges.html') ?>"><i class="fa fa-angle-right mr-2"></i> Badges</a></li>
                        <li class="child"><a href="<?= $base ?>/admin/breadcrumb.html" class="ml-4 <?= activeClass('/admin/breadcrumb.html') ?>"><i class="fa fa-angle-right mr-2"></i> Breadcrumbs</a></li>
                        <li class="child"><a href="<?= $base ?>/admin/cards.html" class="ml-4 <?= activeClass('/admin/cards.html') ?>"><i class="fa fa-angle-right mr-2"></i> Cards</a></li>
                        <li class="child"><a href="<?= $base ?>/admin/icons.html" class="ml-4 <?= activeClass('/admin/icons.html') ?>"><i class="fa fa-angle-right mr-2"></i> Icons</a></li>
                        <li class="child"><a href="<?= $base ?>/admin/modal.html" class="ml-4 <?= activeClass('/admin/modal.html') ?>"><i class="fa fa-angle-right mr-2"></i> Modals</a></li>
                        <li class="child"><a href="<?= $base ?>/admin/notification.html" class="ml-4 <?= activeClass('/admin/notification.html') ?>"><i class="fa fa-angle-right mr-2"></i> Notification</a></li>
                        <li class="child"><a href="<?= $base ?>/admin/progressbar.html" class="ml-4 <?= activeClass('/admin/progressbar.html') ?>"><i class="fa fa-angle-right mr-2"></i> Progressbar</a></li>
                        <li class="child"><a href="<?= $base ?>/admin/sweetalert.html" class="ml-4 <?= activeClass('/admin/sweetalert.html') ?>"><i class="fa fa-angle-right mr-2"></i> Sweet alert</a></li>
                        <li class="child"><a href="<?= $base ?>/admin/tabs.html" class="ml-4 <?= activeClass('/admin/tabs.html') ?>"><i class="fa fa-angle-right mr-2"></i> Tabs</a></li>
                        <li class="child"><a href="<?= $base ?>/admin/tooltip-popover.html" class="ml-4 <?= activeClass('/admin/tooltip-popover.html') ?>"><i class="fa fa-angle-right mr-2"></i> Tooltip and Popovers</a></li>
                        <li class="child"><a href="<?= $base ?>/admin/typography.html" class="ml-4 <?= activeClass('/admin/typography.html') ?>"><i class="fa fa-angle-right mr-2"></i> Typography</a></li>
                    </ul>
                </li> -->

                <!-- FORM ELEMENTS -->
                <!-- <li class="parent">
                    <a href="#" onclick="toggle_menu('form_element'); return false" class="">
                        <i class="fa fa-pencil-square mr-3"></i>
                        <span class="none">Form Elements <i class="fa fa-angle-down pull-right align-bottom"></i></span>
                    </a>
                    <ul class="children" id="form_element" style="display: <?= $open_forms ? 'block' : 'none' ?>;">
                        <li class="child"><a href="<?= $base ?>/admin/form-general.html" class="ml-4 <?= activeClass('/admin/form-general.html') ?>"><i class="fa fa-angle-right mr-2"></i> Basic Elements</a></li>
                        <li class="child"><a href="<?= $base ?>/admin/form-advanced.html" class="ml-4 <?= activeClass('/admin/form-advanced.html') ?>"><i class="fa fa-angle-right mr-2"></i> Advanced Elements</a></li>
                        <li class="child"><a href="<?= $base ?>/admin/form-validation.html" class="ml-4 <?= activeClass('/admin/form-validation.html') ?>"><i class="fa fa-angle-right mr-2"></i> Validation</a></li>
                        <li class="child"><a href="<?= $base ?>/admin/form-wizard.html" class="ml-4 <?= activeClass('/admin/form-wizard.html') ?>"><i class="fa fa-angle-right mr-2"></i> Form Wizard</a></li>
                    </ul>
                </li> -->

                <!-- TEXT EDITORS -->
                <!-- <li class="parent">
                    <a href="#" onclick="toggle_menu('editors'); return false" class="">
                        <i class="fa fa-pencil-square-o mr-3"></i>
                        <span class="none">Text Editors <i class="fa fa-angle-down pull-right align-bottom"></i></span>
                    </a>
                    <ul class="children" id="editors" style="display: <?= $open_editors ? 'block' : 'none' ?>;">
                        <li class="child"><a href="<?= $base ?>/admin/ckeditor-classic.html" class="ml-4 <?= activeClass('/admin/ckeditor-classic.html') ?>"><i class="fa fa-angle-right mr-2"></i> Ckeditor classic</a></li>
                        <li class="child"><a href="<?= $base ?>/admin/ckeditor-inline.html" class="ml-4 <?= activeClass('/admin/ckeditor-inline.html') ?>"><i class="fa fa-angle-right mr-2"></i> Ckeditor inline</a></li>
                        <li class="child"><a href="<?= $base ?>/admin/ckeditor-document.html" class="ml-4 <?= activeClass('/admin/ckeditor-document.html') ?>"><i class="fa fa-angle-right mr-2"></i> Ckeditor document</a></li>
                        <li class="child"><a href="<?= $base ?>/admin/summernote.html" class="ml-4 <?= activeClass('/admin/summernote.html') ?>"><i class="fa fa-angle-right mr-2"></i> Summernote editor</a></li>
                    </ul>
                </li> -->

                <!-- TABLES -->
                <!-- <li class="parent">
                    <a href="#" onclick="toggle_menu('tables'); return false" class="">
                        <i class="fa fa-pencil-square mr-3"></i>
                        <span class="none">Tables <i class="fa fa-angle-down pull-right align-bottom"></i></span>
                    </a>
                    <ul class="children" id="tables" style="display: <?= $open_tables ? 'block' : 'none' ?>;">
                        <li class="child"><a href="<?= $base ?>/admin/basic-tables.html" class="ml-4 <?= activeClass('/admin/basic-tables.html') ?>"><i class="fa fa-angle-right mr-2"></i> Basic Tables</a></li>
                        <li class="child"><a href="<?= $base ?>/admin/datatable.html" class="ml-4 <?= activeClass('/admin/datatable.html') ?>"><i class="fa fa-angle-right mr-2"></i> Datatables</a></li>
                        <li class="child"><a href="<?= $base ?>/admin/jsgrid-table.html" class="ml-4 <?= activeClass('/admin/jsgrid-table.html') ?>"><i class="fa fa-angle-right mr-2"></i> JSGrid Tables</a></li>
                    </ul>
                </li> -->

                <!-- CHARTS -->
                <!-- <li class="parent">
                    <a href="#" onclick="toggle_menu('charts'); return false" class="">
                        <i class="fa fa-pie-chart mr-3"></i>
                        <span class="none">Charts <i class="fa fa-angle-down pull-right align-bottom"></i></span>
                    </a>
                    <ul class="children" id="charts" style="display: <?= $open_charts ? 'block' : 'none' ?>;">
                        <li class="child"><a href="<?= $base ?>/admin/chart.html" class="ml-4 <?= activeClass('/admin/chart.html') ?>"><i class="fa fa-angle-right mr-2"></i> Chart JS</a></li>
                        <li class="child"><a href="<?= $base ?>/admin/chartist.html" class="ml-4 <?= activeClass('/admin/chartist.html') ?>"><i class="fa fa-angle-right mr-2"></i> Chartist JS</a></li>
                        <li class="child"><a href="<?= $base ?>/admin/echarts.html" class="ml-4 <?= activeClass('/admin/echarts.html') ?>"><i class="fa fa-angle-right mr-2"></i> Echarts JS</a></li>
                        <li class="child"><a href="<?= $base ?>/admin/flot.html" class="ml-4 <?= activeClass('/admin/flot.html') ?>"><i class="fa fa-angle-right mr-2"></i> Flot JS</a></li>
                        <li class="child"><a href="<?= $base ?>/admin/morris.html" class="ml-4 <?= activeClass('/admin/morris.html') ?>"><i class="fa fa-angle-right mr-2"></i> Morris JS</a></li>
                        <li class="child"><a href="<?= $base ?>/admin/nvd3.html" class="ml-4 <?= activeClass('/admin/nvd3.html') ?>"><i class="fa fa-angle-right mr-2"></i> NVD3 JS</a></li>
                        <li class="child"><a href="<?= $base ?>/admin/sparkline.html" class="ml-4 <?= activeClass('/admin/sparkline.html') ?>"><i class="fa fa-angle-right mr-2"></i> Sparkline JS</a></li>
                    </ul>
                </li>

                <li class="parent">
                    <a href="<?= $base ?>/admin/icons.html" class="<?= activeClass('/admin/icons.html') ?>">
                        <i class="fa fa-toggle-on mr-3"></i>
                        <span class="none">Icons</span>
                    </a>
                </li> -->

                <!-- ECOMMERCE -->
                <!-- <li class="parent">
                    <a href="#" onclick="toggle_menu('ecommerce'); return false" class="">
                        <i class="fa fa-shopping-cart mr-3"></i>
                        <span class="none">Ecommerce <i class="fa fa-angle-down pull-right align-bottom"></i></span>
                    </a>
                    <ul class="children" id="ecommerce" style="display: <?= $open_ecommerce ? 'block' : 'none' ?>;">
                        <li class="child"><a href="<?= $base ?>/admin/products.html" class="ml-4 <?= activeClass('/admin/products.html') ?>"><i class="fa fa-angle-right mr-2"></i> ProductList</a></li>
                        <li class="child"><a href="<?= $base ?>/admin/product-detail.html" class="ml-4 <?= activeClass('/admin/product-detail.html') ?>"><i class="fa fa-angle-right mr-2"></i> ProductDetail</a></li>
                        <li class="child"><a href="<?= $base ?>/admin/orders.html" class="ml-4 <?= activeClass('/admin/orders.html') ?>"><i class="fa fa-angle-right mr-2"></i> OrderList</a></li>
                        <li class="child"><a href="<?= $base ?>/admin/invoice.html" class="ml-4 <?= activeClass('/admin/invoice.html') ?>"><i class="fa fa-angle-right mr-2"></i> Invoice</a></li>
                    </ul>
                </li> -->

                <!-- MAPS -->
                <!-- <li class="parent">
                    <a href="#" onclick="toggle_menu('maps'); return false" class="">
                        <i class="fa fa-map mr-3"></i>
                        <span class="none">Maps <i class="fa fa-angle-down pull-right align-bottom"></i></span>
                    </a>
                    <ul class="children" id="maps" style="display: <?= $open_maps ? 'block' : 'none' ?>;">
                        <li class="child"><a href="<?= $base ?>/admin/jvector-maps.html" class="ml-4 <?= activeClass('/admin/jvector-maps.html') ?>"><i class="fa fa-angle-right mr-2"></i> Jvector Maps</a></li>
                        <li class="child"><a href="<?= $base ?>/admin/google-maps.html" class="ml-4 <?= activeClass('/admin/google-maps.html') ?>"><i class="fa fa-angle-right mr-2"></i> Google Maps</a></li>
                    </ul>
                </li> -->

                <!-- PAGES -->
                <!-- <li class="parent">
                    <a href="#" onclick="toggle_menu('pages'); return false" class="">
                        <i class="fa fa-file mr-3"></i>
                        <span class="none">Pages <i class="fa fa-angle-down pull-right align-bottom"></i></span>
                    </a>
                    <ul class="children" id="pages" style="display: <?= $open_pages ? 'block' : 'none' ?>;">
                        <li class="child"><a href="<?= $base ?>/admin/email-inbox.html" class="ml-4 <?= activeClass('/admin/email-inbox.html') ?>"><i class="fa fa-angle-right mr-2"></i> Email-Inbox</a></li>
                        <li class="child"><a href="<?= $base ?>/admin/email.html" class="ml-4 <?= activeClass('/admin/email.html') ?>"><i class="fa fa-angle-right mr-2"></i> Email-Compose</a></li>
                        <li class="child"><a href="<?= $base ?>/admin/login.html" class="ml-4 <?= activeClass('/admin/login.html') ?>"><i class="fa fa-angle-right mr-2"></i> Login</a></li>
                        <li class="child"><a href="<?= $base ?>/admin/register.html" class="ml-4 <?= activeClass('/admin/register.html') ?>"><i class="fa fa-angle-right mr-2"></i> Signup</a></li>
                        <li class="child"><a href="<?= $base ?>/admin/lockscreen.html" class="ml-4 <?= activeClass('/admin/lockscreen.html') ?>"><i class="fa fa-angle-right mr-2"></i> Lock Screen</a></li>
                        <li class="child"><a href="<?= $base ?>/admin/forgot-password.html" class="ml-4 <?= activeClass('/admin/forgot-password.html') ?>"><i class="fa fa-angle-right mr-2"></i> Forgot Password</a></li>
                        <li class="child"><a href="<?= $base ?>/admin/profile.html" class="ml-4 <?= activeClass('/admin/profile.html') ?>"><i class="fa fa-angle-right mr-2"></i> Profile</a></li>
                        <li class="child"><a href="<?= $base ?>/admin/gallery.html" class="ml-4 <?= activeClass('/admin/gallery.html') ?>"><i class="fa fa-angle-right mr-2"></i> Gallery</a></li>
                        <li class="child"><a href="<?= $base ?>/admin/invoice.html" class="ml-4 <?= activeClass('/admin/invoice.html') ?>"><i class="fa fa-angle-right mr-2"></i> Invoice</a></li>
                        <li class="child"><a href="<?= $base ?>/admin/search-result.html" class="ml-4 <?= activeClass('/admin/search-result.html') ?>"><i class="fa fa-angle-right mr-2"></i> Search</a></li>
                        <li class="child"><a href="<?= $base ?>/admin/pricing.html" class="ml-4 <?= activeClass('/admin/pricing.html') ?>"><i class="fa fa-angle-right mr-2"></i> Pricing</a></li>
                        <li class="child"><a href="<?= $base ?>/admin/blank.html" class="ml-4 <?= activeClass('/admin/blank.html') ?>"><i class="fa fa-angle-right mr-2"></i> Blank Page</a></li>
                        <li class="child"><a href="<?= $base ?>/admin/error-404.html" class="ml-4 <?= activeClass('/admin/error-404.html') ?>"><i class="fa fa-angle-right mr-2"></i> Error 404</a></li>
                        <li class="child"><a href="<?= $base ?>/admin/error-500.html" class="ml-4 <?= activeClass('/admin/error-500.html') ?>"><i class="fa fa-angle-right mr-2"></i> Error 500</a></li>
                        <li class="child"><a href="<?= $base ?>/admin/error-504.html" class="ml-4 <?= activeClass('/admin/error-504.html') ?>"><i class="fa fa-angle-right mr-2"></i> Error 504</a></li>
                    </ul>
                </li> -->

                <!-- <li class="parent">
                    <a href="<?= $base ?>/admin/fullcalendar.html" class="<?= activeClass('/admin/fullcalendar.html') ?>">
                        <i class="fa fa-calendar-o mr-3"> </i>
                        <span class="none">Full Calendar </span>
                    </a>
                </li> -->
            </ul>
        </div>
        <!--Sidebar Naigation Menu-->
    </div>
</div>

<script>
    // Script để đồng bộ trạng thái menu với custom.js của theme
    (function () {
        var currentUrl = window.location.href;

        // Nhóm các trang thuộc Dashboard
        if (currentUrl.indexOf('/admin/index') > -1 || currentUrl.endsWith('/admin') || currentUrl.endsWith('/admin/')) {
            localStorage.setItem('lastTab', 'dashboard');
        }
        // Nhóm các trang thuộc UI Elements
        else if (currentUrl.indexOf('accordion') > -1 || currentUrl.indexOf('buttons') > -1 || currentUrl.indexOf('badges') > -1 || currentUrl.indexOf('modal') > -1 || currentUrl.indexOf('notification') > -1) {
            localStorage.setItem('lastTab', 'ul_element');
        }
        // Form Elements
        else if (currentUrl.indexOf('form-') > -1) {
            localStorage.setItem('lastTab', 'form_element');
        }
        // Text Editors
        else if (currentUrl.indexOf('ckeditor') > -1 || currentUrl.indexOf('summernote') > -1) {
            localStorage.setItem('lastTab', 'editors');
        }
        // Tables
        else if (currentUrl.indexOf('table') > -1 || currentUrl.indexOf('datatable') > -1 || currentUrl.indexOf('jsgrid') > -1) {
            localStorage.setItem('lastTab', 'tables');
        }
        // Charts
        else if (currentUrl.indexOf('chart') > -1 || currentUrl.indexOf('morris') > -1 || currentUrl.indexOf('flot') > -1) {
            localStorage.setItem('lastTab', 'charts');
        }
        // Ecommerce
        else if (currentUrl.indexOf('product') > -1 || currentUrl.indexOf('order') > -1 || currentUrl.indexOf('invoice') > -1) {
            localStorage.setItem('lastTab', 'ecommerce');
        }
        // Maps
        else if (currentUrl.indexOf('map') > -1) {
            localStorage.setItem('lastTab', 'maps');
        }
        // Pages
        else if (currentUrl.indexOf('email') > -1 || currentUrl.indexOf('profile') > -1 || currentUrl.indexOf('gallery') > -1 || currentUrl.indexOf('pricing') > -1) {
            localStorage.setItem('lastTab', 'pages');
        }
        // Posts (New logic to keep menu open)
        else if (currentUrl.indexOf('/admin/posts') > -1) {
            localStorage.setItem('lastTab', 'posts_menu');
        }
        // Nhóm các trang độc lập (Users, Categories) -> Xóa trạng thái để đóng hết
        else if (currentUrl.indexOf('/admin/users') > -1 ||
            currentUrl.indexOf('/admin/categories') > -1 ||
            currentUrl.indexOf('/admin/tags') > -1 ||
            currentUrl.indexOf('/admin/partners') > -1) {

            localStorage.removeItem('lastTab');

            // Cưỡng chế đóng menu con sau khi trang load
            document.addEventListener('DOMContentLoaded', function () {
                setTimeout(function () {
                    var children = document.querySelectorAll('.children');
                    children.forEach(function (ul) {
                        ul.style.display = 'none';
                    });
                }, 100);
            });
        }
    })();
</script>