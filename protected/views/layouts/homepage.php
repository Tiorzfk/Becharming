<!DOCTYPE html>
<html>
    
<!-- Mirrored from lambdathemes.in/modern/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Apr 2015 05:15:24 GMT -->
<head>
        
        <!-- Title -->
        <title>BeCharming | Halaman Administration</title>
        
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
        <meta name="description" content="Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcode" />
        
        <!-- Styles -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
        <link href="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet"/>
        <link href="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/plugins/uniform/css/uniform.default.min.css" rel="stylesheet"/>
        <link href="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/plugins/line-icons/simple-line-icons.css" rel="stylesheet" type="text/css"/>	
        <link href="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/plugins/offcanvasmenueffects/css/menu_cornerbox.css" rel="stylesheet" type="text/css"/>	
        <link href="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/plugins/waves/waves.min.css" rel="stylesheet" type="text/css"/>	
        <link href="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css"/>	
        <link href="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/plugins/weather-icons-master/css/weather-icons.min.css" rel="stylesheet" type="text/css"/>	
        <link href="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/plugins/metrojs/MetroJs.min.css" rel="stylesheet" type="text/css"/>	
        <link href="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/plugins/toastr/toastr.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/plugins/datatables/css/jquery.datatables.min.css" rel="stylesheet" type="text/css"/> 
        <link href="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/plugins/datatables/css/jquery.datatables_themeroller.css" rel="stylesheet" type="text/css"/> 	
        <!-- Theme Styles -->
        <link href="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/css/modern.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/css/themes/white.css" class="theme-color" rel="stylesheet" type="text/css"/>
        <link href="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/css/custom.css" rel="stylesheet" type="text/css"/>
        
        <script src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/plugins/3d-bold-navigation/js/modernizr.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>
        <link href="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/plugins/select2/css/select2.min.css" rel="stylesheet" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
        <link href="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/plugins/summernote-master/summernote.css" rel="stylesheet" type="text/css"/>
       <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
    </head>
    <body class="page-header-fixed">
        <div class="overlay"></div>
        <div class="menu-wrap">
            <nav class="profile-menu">
                <div class="profile"><img src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/images/avatar1.png" width="52px" alt="Tioreza"/><span><?php echo Yii::app()->user->username;?></span></div>
                <div class="profile-menu-list">
                    <a href="#"><i class="fa fa-star"></i><span>Favorites</span></a>
                    <a href="#"><i class="fa fa-bell"></i><span>Alerts</span></a>
                    <a href="#"><i class="fa fa-envelope"></i><span>Messages</span></a>
                    <a href="#"><i class="fa fa-comment"></i><span>Comments</span></a>
                </div>
            </nav>
            <button class="close-button" id="close-button">Close Menu</button>
        </div>
        <form class="search-form" action="#" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control search-input" placeholder="Search...">
                <span class="input-group-btn">
                    <button class="btn btn-default close-search waves-effect waves-button waves-classic" type="button"><i class="fa fa-times"></i></button>
                </span>
            </div><!-- Input Group -->
        </form><!-- Search Form -->
        <main class="page-content content-wrap">
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="sidebar-pusher">
                        <a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                    <div class="logo-box">
                        <a href="index.html" class="logo-text"><span>Be Charming</span></a>
                    </div><!-- Logo Box -->
                    <div class="search-button">
                        <a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i class="fa fa-search"></i></a>
                    </div>
                    <div class="topmenu-outer">
                        <div class="top-menu">
                            <ul class="nav navbar-nav navbar-left">
                                <li>		
                                    <a href="javascript:void(0);" class="waves-effect waves-button waves-classic sidebar-toggle"><i class="fa fa-bars"></i></a>
                                </li>
                                <li>
                                    <a href="#cd-nav" class="waves-effect waves-button waves-classic cd-nav-trigger"><i class="fa fa-diamond"></i></a>
                                </li>
                                <li>		
                                    <a href="javascript:void(0);" class="waves-effect waves-button waves-classic toggle-fullscreen"><i class="fa fa-expand"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown">
                                        <i class="fa fa-cogs"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-md dropdown-list theme-settings" role="menu">
                                        <li class="li-group">
                                            <ul class="list-unstyled">
                                                <li class="no-link" role="presentation">
                                                    Fixed Header 
                                                    <div class="ios-switch pull-right switch-md">
                                                        <input type="checkbox" class="js-switch pull-right fixed-header-check" checked>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="li-group">
                                            <ul class="list-unstyled">
                                                <li class="no-link" role="presentation">
                                                    Fixed Sidebar 
                                                    <div class="ios-switch pull-right switch-md">
                                                        <input type="checkbox" class="js-switch pull-right fixed-sidebar-check">
                                                    </div>
                                                </li>
                                                <li class="no-link" role="presentation">
                                                    Horizontal bar 
                                                    <div class="ios-switch pull-right switch-md">
                                                        <input type="checkbox" class="js-switch pull-right horizontal-bar-check">
                                                    </div>
                                                </li>
                                                <li class="no-link" role="presentation">
                                                    Toggle Sidebar 
                                                    <div class="ios-switch pull-right switch-md">
                                                        <input type="checkbox" class="js-switch pull-right toggle-sidebar-check">
                                                    </div>
                                                </li>
                                                <li class="no-link" role="presentation">
                                                    Compact Menu 
                                                    <div class="ios-switch pull-right switch-md">
                                                        <input type="checkbox" class="js-switch pull-right compact-menu-check">
                                                    </div>
                                                </li>
                                                <li class="no-link" role="presentation">
                                                    Hover Menu 
                                                    <div class="ios-switch pull-right switch-md">
                                                        <input type="checkbox" class="js-switch pull-right hover-menu-check">
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="li-group">
                                            <ul class="list-unstyled">
                                                <li class="no-link" role="presentation">
                                                    Boxed Layout 
                                                    <div class="ios-switch pull-right switch-md">
                                                        <input type="checkbox" class="js-switch pull-right boxed-layout-check">
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="li-group">
                                            <ul class="list-unstyled">
                                                <li class="no-link" role="presentation">
                                                    Choose Theme Color
                                                    <div class="color-switcher">
                                                        <a class="colorbox color-blue" href="indexca00.html?theme=blue" title="Blue Theme" data-css="blue"></a>
                                                        <a class="colorbox color-green" href="indexaf91.html?theme=green" title="Green Theme" data-css="green"></a>
                                                        <a class="colorbox color-red" href="index0e99.html?theme=red" title="Red Theme" data-css="red"></a>
                                                        <a class="colorbox color-white" href="index13d4.html?theme=white" title="White Theme" data-css="white"></a>
                                                        <a class="colorbox color-purple" href="index938c.html?theme=purple" title="purple Theme" data-css="purple"></a>
                                                        <a class="colorbox color-dark" href="index4965.html?theme=dark" title="Dark Theme" data-css="dark"></a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="no-link"><button class="btn btn-default reset-options">Reset Options</button></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                             
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown">
                                        <span class="user-name"><?php echo Yii::app()->user->username;?></span>
                                        <img class="img-circle avatar" src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/images/user_female.jpg" width="30" height="30" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->createUrl("admin/logout");?>" class="log-out waves-effect waves-button waves-classic">
                                        <span><i class="fa fa-sign-out m-r-xs"></i>Log out</span>
                                    </a>
                                </li>
                            </ul><!-- Nav -->
                        </div><!-- Top Menu -->
                    </div>
                </div>
            </div><!-- Navbar -->
            <div class="page-sidebar sidebar">
                <div class="page-sidebar-inner slimscroll">
                    <div class="sidebar-header">
                        <div class="sidebar-profile">
                            <a href="javascript:void(0);" id="profile-menu-link">
                                <div class="sidebar-profile-image">
                                    <img src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/frontend/images/user_female.jpg" class="img-circle img-responsive" alt="">
                                </div>
                                <div class="sidebar-profile-details">
                                    <span><?php echo Yii::app()->user->username;?><br><small><?php echo Yii::app()->user->rule;?></small></span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <ul class="menu accordion-menu">
                        <li class="active"><a href="<?php echo $this->createUrl('/');?>" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-home"></span><p>Home</p></a></li>
                        <li><a href="<?php echo $this->createUrl('category/admin');?>" class="waves-effect waves-button"><span class="menu-icon fa fa-newspaper-o"></span><p>Category</p></a></li>
                        <li><a href="<?php echo $this->createUrl('product/admin');?>" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-list-alt"></span><p>Product</p></a></li>
                        <li><a href="<?php echo $this->createUrl('banner/admin');?>" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-list-alt"></span><p>Banner</p></a></li>
                        <li><a href="<?php echo $this->createUrl('orders/admin');?>" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-shopping-cart"></span><p>Orders</p></a></li>
                        <li><a href="<?php echo $this->createUrl('member/admin');?>" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon glyphicon-user"></span><p>Member</p></a></li>
                        <li><a href="<?php echo $this->createUrl('contact/admin');?>" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-list-alt"></span><p>Message</p></a></li>
                    </ul>
                </div><!-- Page Sidebar Inner -->
            </div><!-- Page Sidebar -->
            <div class="page-inner">
                <div class="page-title">
                    <h3>Halaman Admin</h3>
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb"><!--jika $breadcrumbs tersedia maka-->
                        <?php if(isset($this->breadcrumbs)):?>
                        <!--tampilkan breadcrumbs-->
                        <?php $this -> widget('zii.widgets.CBreadcrumbs', array('links' => $this -> breadcrumbs, )); ?>
                        <!--end if-->
                        <?php endif ?>
                        </ol>
                    </div>
                </div>
                <div id="main-wrapper">
                <?php echo $content; ?>
                </div><!-- Main Wrapper -->
                <div class="page-footer">
                    <p class="no-s">2015 &copy; Modern by Steelcode.</p>
                </div>
            </div><!-- Page Inner -->
        </main><!-- Page Content -->
        <nav class="cd-nav-container" id="cd-nav">
            <header>
                <h3>Navigation</h3>
                <a href="#0" class="cd-close-nav">Close</a>
            </header>
            <ul class="cd-nav list-unstyled">
                <li class="cd-selected" data-menu="index">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-home"></i>
                        </span>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li data-menu="profile">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                        <p>Profile</p>
                    </a>
                </li>
                <li data-menu="inbox">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-envelope"></i>
                        </span>
                        <p>Mailbox</p>
                    </a>
                </li>
                <li data-menu="#">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-tasks"></i>
                        </span>
                        <p>Tasks</p>
                    </a>
                </li>
                <li data-menu="#">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-cog"></i>
                        </span>
                        <p>Settings</p>
                    </a>
                </li>
                <li data-menu="calendar">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-calendar"></i>
                        </span>
                        <p>Calendar</p>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="cd-overlay"></div>
	

        <!-- Javascripts -->

        <script src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/plugins/pace-master/pace.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/plugins/switchery/switchery.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/plugins/uniform/jquery.uniform.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/plugins/offcanvasmenueffects/js/classie.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/plugins/offcanvasmenueffects/js/main.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/plugins/waves/waves.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/plugins/3d-bold-navigation/js/main.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/plugins/jquery-counterup/jquery.counterup.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/plugins/toastr/toastr.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/plugins/flot/jquery.flot.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/plugins/flot/jquery.flot.time.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/plugins/flot/jquery.flot.symbol.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/plugins/flot/jquery.flot.resize.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/plugins/flot/jquery.flot.tooltip.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/plugins/curvedlines/curvedLines.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/plugins/metrojs/MetroJs.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/js/modern.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/plugins/select2/js/select2.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/js/pages/form-select2.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/plugins/summernote-master/summernote.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/js/pages/form-elements.js"></script>

        
    </body>

<!-- Mirrored from lambdathemes.in/modern/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Apr 2015 05:17:22 GMT -->
</html>