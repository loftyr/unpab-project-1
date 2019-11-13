<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard | Admin LPPM</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('include/nalika/img/favicon.ico') ?>">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('include/nalika/css/bootstrap.min.css') ?>">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('include/nalika/css/font-awesome.min.css') ?>">
    <!-- nalika Icon CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('include/nalika/css/nalika-icon.css') ?>">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('include/nalika/css/owl.carousel.css') ?>">
    <link rel="stylesheet" href="<?= base_url('include/nalika/css/owl.theme.css') ?>">
    <link rel="stylesheet" href="<?= base_url('include/nalika/css/owl.transitions.css') ?>">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('include/animate.css') ?>">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('include/nalika/css/normalize.css') ?>">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('include/nalika/css/meanmenu.min.css') ?>">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('include/nalika/css/main.css') ?>">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('include/nalika/css/morrisjs/morris.css') ?>">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('include/nalika/css/scrollbar/jquery.mCustomScrollbar.min.css') ?>">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('include/nalika/css/metisMenu/metisMenu.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('include/nalika/css/metisMenu/metisMenu-vertical.css') ?>">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('include/nalika/css/calendar/fullcalendar.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('include/nalika/css/calendar/fullcalendar.print.min.css') ?>">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('include/nalika/css/style.css') ?>">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="<?= base_url('include/nalika/css/responsive.css') ?>">
    <!-- modernizr JS
		============================================ -->
    <script src="<?= base_url('include/nalika/js/vendor/modernizr-2.8.3.min.js') ?>"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <!-- <div class="sidebar-header">
                <a href="index.html"><img class="main-logo" src="<?= base_url('include/nalika/img/logo/logo.png') ?>" alt="" /></a>
                <strong><img src="<?= base_url('include/nalika/img/logo/logosn.png') ?>" alt="" /></strong>
            </div> -->
            <div class="nalika-profile">
                <div class="profile-dtl">
                    <a href="#"><img src="<?= base_url('include/nalika/img/notification/4.jpg') ?>" alt="" /></a>
                    <h2>LPPM <span class="min-dtn">Dashboard</span></h2>
                </div>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <li class="active">
                            <a class="has-arrow" href="index.html">
                                <i class="icon nalika-home icon-wrap"></i>
                                <span class="mini-click-non">Data Dosen</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="Dashboard v.1" href="index.html"><span class="mini-sub-pro">Tambah Dosen</span></a></li>
                                <li><a title="Dashboard v.2" href="index-1.html"><span class="mini-sub-pro">Dashboard v.2</span></a></li>
                                <li><a title="Dashboard v.3" href="index-2.html"><span class="mini-sub-pro">Dashboard v.3</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i class="icon nalika-mail icon-wrap"></i> <span class="mini-click-non">Mailbox</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Inbox" href="mailbox.html"><span class="mini-sub-pro">Inbox</span></a></li>
                                <li><a title="View Mail" href="mailbox-view.html"><span class="mini-sub-pro">View Mail</span></a></li>
                                <li><a title="Compose Mail" href="mailbox-compose.html"><span class="mini-sub-pro">Compose Mail</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i class="icon nalika-diamond icon-wrap"></i> <span class="mini-click-non">Interface</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Google Map" href="google-map.html"><span class="mini-sub-pro">Google Map</span></a></li>
                                <li><a title="Data Maps" href="data-maps.html"><span class="mini-sub-pro">Data Maps</span></a></li>
                                <li><a title="Pdf Viewer" href="pdf-viewer.html"><span class="mini-sub-pro">Pdf Viewer</span></a></li>
                                <li><a title="X-Editable" href="x-editable.html"><span class="mini-sub-pro">X-Editable</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i class="icon nalika-pie-chart icon-wrap"></i> <span class="mini-click-non">Miscellaneous</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="File Manager" href="file-manager.html"><span class="mini-sub-pro">File Manager</span></a></li>
                                <li><a title="Blog" href="blog.html"><span class="mini-sub-pro">Blog</span></a></li>
                                <li><a title="Blog Details" href="blog-details.html"><span class="mini-sub-pro">Blog Details</span></a></li>
                                <li><a title="404 Page" href="404.html"><span class="mini-sub-pro">404 Page</span></a></li>
                                <li><a title="500 Page" href="500.html"><span class="mini-sub-pro">500 Page</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="index.html"><img class="main-logo" src="<?= base_url('include/nalika/img/logo/logo.png') ?>" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                                <i class="icon nalika-menu-task"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n">
                                            <div class="breadcome-heading">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">

                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                        <i class="icon nalika-user nalika-user-rounded header-riht-inf" aria-hidden="true"></i>
                                                        <span class="admin-name">Admin</span>
                                                        <i class="icon nalika-down-arrow nalika-angle-dw nalika-icon"></i>
                                                    </a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        <li><a href="register.html"><span class="icon nalika-home author-log-ic"></span> Register</a>
                                                        </li>
                                                        <li><a href="#"><span class="icon nalika-user author-log-ic"></span> My Profile</a>
                                                        </li>
                                                        <li><a href="lock.html"><span class="icon nalika-diamond author-log-ic"></span> Lock</a>
                                                        </li>
                                                        <li><a href="#"><span class="icon nalika-settings author-log-ic"></span> Settings</a>
                                                        </li>
                                                        <li><a href="login.html"><span class="icon nalika-unlocked author-log-ic"></span> Log Out</a>
                                                        </li>
                                                    </ul>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
                                        <li><a data-toggle="collapse" data-target="#Charts" href="#">Home <span class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                            <ul class="collapse dropdown-header-top">
                                                <li><a href="index.html">Dashboard v.1</a></li>
                                                <li><a href="index-1.html">Dashboard v.2</a></li>
                                                <li><a href="index-3.html">Dashboard v.3</a></li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#demo" href="#">Mailbox <span class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                            <ul id="demo" class="collapse dropdown-header-top">
                                                <li><a href="mailbox.html">Inbox</a>
                                                </li>
                                                <li><a href="mailbox-view.html">View Mail</a>
                                                </li>
                                                <li><a href="mailbox-compose.html">Compose Mail</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#others" href="#">Miscellaneous <span class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                            <ul id="others" class="collapse dropdown-header-top">
                                                <li><a href="file-manager.html">File Manager</a></li>
                                                <li><a href="contacts.html">Contacts Client</a></li>
                                                <li><a href="projects.html">Project</a></li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Miscellaneousmob" href="#">Interface <span class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                            <ul id="Miscellaneousmob" class="collapse dropdown-header-top">
                                                <li><a href="google-map.html">Google Map</a>
                                                </li>
                                                <li><a href="data-maps.html">Data Maps</a>
                                                </li>
                                                <li><a href="pdf-viewer.html">Pdf Viewer</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Chartsmob" href="#">Charts <span class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                            <ul id="Chartsmob" class="collapse dropdown-header-top">
                                                <li><a href="bar-charts.html">Bar Charts</a>
                                                </li>
                                                <li><a href="line-charts.html">Line Charts</a>
                                                </li>
                                                <li><a href="area-charts.html">Area Charts</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Tablesmob" href="#">Tables <span class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                            <ul id="Tablesmob" class="collapse dropdown-header-top">
                                                <li><a href="static-table.html">Static Table</a>
                                                </li>
                                                <li><a href="data-table.html">Data Table</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#formsmob" href="#">Forms <span class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                            <ul id="formsmob" class="collapse dropdown-header-top">
                                                <li><a href="basic-form-element.html">Basic Form Elements</a>
                                                </li>
                                                <li><a href="advance-form-element.html">Advanced Form Elements</a>
                                                </li>
                                                <li><a href="password-meter.html">Password Meter</a>
                                                </li>
                                            </ul>
                                        </li>

                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu end -->
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcomb-wp">
                                            <div class="breadcomb-icon">
                                                <i class="icon nalika-home"></i>
                                            </div>
                                            <div class="breadcomb-ctn">
                                                <h2>Dashboard</h2>
                                                <p>Welcome LPPM <span class="bread-ntd">Admin</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-admin container-fluid">
            <div class="row admin text-center">

            </div>
        </div>

        <!--  -->
        <!-- <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copy-right">
                            <p>Copyright © 2018 <a href="https://colorlib.com/wp/templates/">Colorlib</a> All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!--  -->
    </div>

    <!-- jquery
		============================================ -->
    <script src="<?= base_url('include/nalika/js/vendor/jquery-1.12.4.min.js') ?>"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="<?= base_url('include/nalika/js/bootstrap.min.js') ?>"></script>
    <!-- wow JS
		============================================ -->
    <script src="<?= base_url('include/nalika/js/wow.min.js') ?>"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="<?= base_url('include/nalika/js/jquery-price-slider.js') ?>"></script>
    <script src="<?= base_url('include/nalika/js/jquery.meanmenu.js') ?>"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="<?= base_url('include/nalika/js/owl.carousel.min.js') ?>"></script>
    <!-- sticky JS
		============================================ -->
    <script src="<?= base_url('include/nalika/js/jquery.sticky.js') ?>"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="<?= base_url('include/nalika/js/jquery.scrollUp.min.js') ?>"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="<?= base_url('include/nalika/js/scrollbar/jquery.mCustomScrollbar.concat.min.js') ?>"></script>
    <script src="<?= base_url('include/nalika/js/scrollbar/mCustomScrollbar-active.js') ?>"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="<?= base_url('include/nalika/js/metisMenu/metisMenu.min.js') ?>"></script>
    <script src="<?= base_url('include/nalika/js/metisMenu/metisMenu-active.js') ?>"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="<?= base_url('include/nalika/js/sparkline/jquery.sparkline.min.js') ?>"></script>
    <script src="<?= base_url('include/nalika/js/sparkline/jquery.charts-sparkline.js') ?>"></script>
    <!-- calendar JS
		============================================ -->
    <script src="<?= base_url('include/nalika/js/calendar/moment.min.js') ?>"></script>
    <script src="<?= base_url('include/nalika/js/calendar/fullcalendar.min.js') ?>"></script>
    <script src="<?= base_url('include/nalika/js/calendar/fullcalendar-active.js') ?>"></script>
    <!-- float JS
		============================================ -->
    <script src="<?= base_url('include/nalika/js/flot/jquery.flot.js') ?>"></script>
    <script src="<?= base_url('include/nalika/js/flot/jquery.flot.resize.js') ?>"></script>
    <script src="<?= base_url('include/nalika/js/flot/jquery.flot.pie.js') ?>"></script>
    <script src="<?= base_url('include/nalika/js/flot/jquery.flot.tooltip.min.js') ?>"></script>
    <script src="<?= base_url('include/nalika/js/flot/jquery.flot.orderBars.js') ?>"></script>
    <script src="<?= base_url('include/nalika/js/flot/curvedLines.js') ?>"></script>
    <script src="<?= base_url('include/nalika/js/flot/flot-active.js') ?>"></script>
    <!-- plugins JS
		============================================ -->
    <script src="<?= base_url('include/nalika/js/plugins.js') ?>"></script>
    <!-- main JS
		============================================ -->
    <script src="<?= base_url('include/nalika/js/main.js') ?>"></script>
</body>

</html>