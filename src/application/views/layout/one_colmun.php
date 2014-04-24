<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html ng-app="lynx">
    <head >
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Project E Mockup UI</title>
        <link rel="stylesheet" type="text/css" href="/bootstrap-3.1.1-dist/css/bootstrap.min.css" media="all">
        <link rel="stylesheet" type="text/css" href="/bootstrap-3.1.1-dist/css/bootstrap-theme.min.css" media="all">
        <link rel="stylesheet" type="text/css" href="/style/main.css" media="all">
        <link rel="stylesheet" type="text/css" href="/style/home.css" media="all">
        <!-- Thêm các css riêng biệt -->
        <?php
        foreach ($view->css as $item)
        {
            echo '<link rel="stylesheet" type="text/css" href="' . $item . '" media="all">';
        }
        ?>
    </head>
    <body>
        <div class="lynx_container">
            <div class="lynx_head">
                <div class="lynx_headWarp lynx_staticWidth">
                    <div class="lynx_logo"></div>
                    <div class="lynx_headLeft">
                        <span class="lynx_sell"> SELL</span>
                        <span class="lynx_liveChat"> LIVE CHAT</span>
                        <div class="lynx_language">
                            <span class="lynx_label">LANGUAGE : [HERE]</span> 
                        </div>
                    </div>
                </div>
                <div class="lynx_headMenu">
                    <div class="lynx_menuWarp lynx_staticWidth">

                        <div class="lynx_category dropdown" ng-controller="SortController">
                            <span class="dropdown-toggle"> 
                                <span ng-click="click()">MENU</span>  
                            </span>
                            <ul class="dropdown-menu">
                                <li>aaa</li>
                                <li>aaa</li>
                                <li>aaa</li>
                                <li>aaa</li>
                            </ul>
                        </div>

                        <div class="lynx_searchForm">
                            <input type="text" />
                            <span class="lynx_search">SEARCH</span>
                        </div>
                        <div class="lynx_loginLabel">
                            <a href="#">Hello, Sign in your account</a>
                        </div>
                        <div class="lynx_miniCart">
                            (0 Item)
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <?php require_once APPPATH . 'views/' . $view->view . '.php'; ?>
            </div>

        </div>
        <script type='text/javascript' src="/js/jquery-1.11.0.min.js"></script>	
        <script type='text/javascript' src="/js/angular.min.js"></script>
        <script type='text/javascript' src="/js/angular-route.min.js"></script>
        <script type='text/javascript' src="/js/ui-bootstrap-tpls-0.10.0.min.js"></script>
        <script type='text/javascript' src="/bootstrap-3.1.1-dist/js/bootstrap.min.js"></script>
        <script type='text/javascript' src="/js/filters.js"></script>
        <script type='text/javascript' src="/js/directives.js"></script>
        <script type='text/javascript' src="/js/app.js"></script>

        <script type='text/javascript' src="/js/controller/SortController.js"></script>

        <script type="text/javascript">
                                    function Config() {
                                        this.facebookApplicationKey = '<?php echo get_instance()->config->item('facebook_app_id'); ?>';
                                    }
        </script>
        <!-- Thêm các js riêng biệt -->
        <?php
        foreach ($view->javascript as $jsItem)
        {
            echo '<script src="' . $jsItem . '"></script>';
        }
        ?>
    </body>
</html>