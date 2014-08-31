<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html ng-app="lynx">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <title><?php echo isset($language[$view->view]) ? $language[$view->view]->title: '';?></title>
        
        <!-- bootstrap 3.0.2 -->
        <link href="/AdminLTE-master/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="/AdminLTE-master/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="/AdminLTE-master/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="/AdminLTE-master/css/AdminLTE.css" rel="stylesheet" type="text/css" />

        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        
        <link rel="stylesheet" type="text/css" href="/style/mainAdminGift.css" media="all">
        <script type='text/javascript' src="/js/jquery-1.11.0.min.js"></script>	
        <?php 
        //Thêm các js riêng biệt
            foreach ($view->css as $item)
            {
                echo '<link rel="stylesheet" type="text/css" href="'.$item.'" media="all">';
            }
        ?>
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="/__admin" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                SFRIENDLY
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        
                       
                        
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span>Jane Doe <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                
                                <!-- Menu Body -->
                                <li class="user-body">

                                    <div class="col-xs-12 text-right">
                                        <a href="#">Bảo mật</a>
                                    </div>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Tài khoản </a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="#" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="../img/avatar3.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello, Jane</p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="/__admin">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="/__admin/product">
                                <i class="fa fa-th"></i> <span>Sản phẩm</span>
                            </a>
                        </li>
                        <li>
                            <a href="/__admin/seller">
                                <i class="fa fa-bar-chart-o"></i><span>Gian hàng</span>
                            </a>
                        </li>
                        <li>
                            <a href="/__admin/advertisement">
                                <i class="fa fa-th"></i> <span>Quảng cáo</span>
                            </a>
                        </li>
                        <li>
                            <a href="/__admin/hot">
                                <i class="fa fa-th"></i> <span>Sản phẩm HOT</span>
                            </a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <?php require_once APPPATH . 'views/' . $view->view . '.php'; ?>
            </aside><!-- /.right-side -->
            
            
        </div><!-- ./wrapper -->
        
       
                
        <script type='text/javascript' src="/js/angular.min.js"></script>
        <script type='text/javascript' src="/js/angular-route.min.js"></script>
        <script type='text/javascript' src="/js/ui-bootstrap-tpls-0.10.0.min.js"></script>
        <script src="/plugins/DataTables-1.10.0/media/js/jquery.dataTables.min.js"></script>
        <script src="/plugins/DataTables-1.10.0/media/js/custom.dataTables.js"></script>
        <script src="/plugins/gritter/js/jquery.gritter.min.js"></script>
        <script src="/plugins/validation/jquery.validate.min.js"></script>
        <script src="/plugins/validation/additional-methods.min.js"></script>
        
        <!-- AdminLTE App -->
        <script src="/AdminLTE-master/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="/AdminLTE-master/js/AdminLTE/app.js" type="text/javascript"></script>
        
        
        <script type='text/javascript' src="/js/app.js"></script>
        <script type='text/javascript' src="/js/main.js"></script>
        <script type='text/javascript' src="/js/filters.js"></script>
        <script type='text/javascript' src="/js/directives.js"></script>
        
        <script type='text/javascript' src="/js/services/CommonServiceClient.js"></script>
        <script type='text/javascript' src="/js/common.js"></script>
        
        <script type="text/javascript">
            function Config() {
                this.facebookApplicationKey = '<?php echo get_instance()->config->item('facebook_app_id'); ?>';
                this.categoryService = '<?php echo base_url('category/categories_service') ?>';
                this.cartService = '<?php echo base_url('cart/cartProductsService') ?>';
            }
        </script>
        
        <?php
        //Thêm các js riêng biệt
        foreach ($view->javascript as $jsItem)
        {
            echo '<script src="'. $jsItem .'"></script>';
        }
        ?>
    </body>
</html>
