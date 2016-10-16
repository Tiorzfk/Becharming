<!DOCTYPE html>
<html>
    
<!-- Mirrored from lambdathemes.in/modern/404.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Apr 2015 05:26:25 GMT -->
<head>
        
        <!-- Title -->
        <title>Becharming | Error</title>
        
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
        
        <!-- Theme Styles -->
        <link href="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/css/modern.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/css/themes/white.css" class="theme-color" rel="stylesheet" type="text/css"/>
        <link href="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/css/custom.css" rel="stylesheet" type="text/css"/>
        
        <script src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/plugins/3d-bold-navigation/js/modernizr.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
    </head>
    <body class="page-error">
        <div class="page-content">
            <div class="page-inner">
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-4 center">
                            <h1 class="text-xxl text-primary text-center"><?php echo $code; ?></h1>
                            <div class="details">
                                <h3>Oops ! Something went wrong</h3>
                                <p><?php echo CHtml::encode($message); ?> <a href="../../">Home</a> or search.</p>
                            </div>
                             <form action="<?php echo $this->createUrl('product/search');?>" method="post" class="input-group">
                             <div style="display:none">
                                <select class="select_color" name="Search[category]">
                                    <option value="all-categories">All Categories</option>
                                </select>
                            </div>
                                <input type="text" class="form-control" name="Search[keyword]" placeholder="Search">
                                <input type="hidden" name="all">
                                <span class="input-group-btn">
                                    <input type="submit" class="btn btn-default"><i class="fa fa-search"></i>
                                </span>
                            </form>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->
            </div><!-- Page Inner -->
        </main><!-- Page Content -->
        
        <!-- Javascripts -->
        <script src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/plugins/jquery/jquery-2.1.3.min.js"></script>
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
        <script src="<?php echo Yii::app()->request->baseUrl;?>/assets/theme/backend/js/modern.min.js"></script>
        
    </body>

<!-- Mirrored from lambdathemes.in/modern/404.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Apr 2015 05:26:25 GMT -->
</html>