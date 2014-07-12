<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html ng-app="lynx">
    <head >
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo isset($language[$view->view]) ? $language[$view->view]->title : ''; ?></title>
        <link rel="stylesheet" type="text/css" href="/bootstrap-3.1.1-dist/css/bootstrap.min.css" media="all">
        <link rel="stylesheet" type="text/css" href="/bootstrap-3.1.1-dist/css/bootstrap-theme.min.css" media="all">
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" media="all">
        <link rel="stylesheet" type="text/css" href="/style/ng-grid.min.css" media="all">
        <link rel="stylesheet" type="text/css" href="/style/main.css" media="all">
        <?php
        //Thêm các js riêng biệt
        foreach ($view->css as $item)
        {
            echo '<link rel="stylesheet" type="text/css" href="' . $item . '" media="all">';
        }
        ?>
        <script type='text/javascript' src="/js/jquery-1.11.0.min.js"></script>	

    </head>
    <body>
        <div class="lynx_head" ng-controller="PortalHeadController">
            <div class="lynx_headWarp lynx_staticWidth">
                    <a class="lynx_logo" href="/" title="SFriendly"></a>
                    <div class="lynx_headLeft">
                        <div class="lynx_language">
                            <span class="lynx_label"><?php echo $language['layout']->lblLanguage; ?> : 
                                <select id="sel-language" ng-model="language" ng-change="changeLanguage(language)" ng-init="language = '<?php echo User::getCurrentUser()->languageKey; ?>'">
                                   <option value="EN-US"  >English</option>
                                    <option value="VN-VI"  >Tiếng Việt</option>
                                    <option value="KO-KR"  >한국의</option>
                                </select>
                            </span>
                        </div>
                    </div>
            </div>
            <div class="lynx_headMenu">
                <div class="lynx_menuWarp lynx_staticWidth">
                </div>
            </div>
        </div>
        <?php require_once APPPATH . 'views/' . $view->view . '.php'; ?>
        
        <script type="text/javascript">
            function Config() {
                this.facebookApplicationKey = '<?php echo get_instance()->config->item('facebook_app_id'); ?>';
                this.categoryService = '<?php echo base_url('category/categories_service') ?>';
                this.cartService = '<?php echo base_url('cart/cartProductsService') ?>';
            }
        </script>
        
        <script type='text/javascript' src="/js/angular.min.js"></script>
        <script type='text/javascript' src="/js/angular-route.min.js"></script>
        <script type='text/javascript' src="/js/ui-bootstrap-tpls-0.10.0.min.js"></script>
        <script type='text/javascript' src="/bootstrap-3.1.1-dist/js/bootstrap.min.js"></script>
        <script type='text/javascript' src="/js/ng-grid.min.js"></script>
        
        <script src="/plugins/DataTables-1.10.0/media/js/jquery.dataTables.min.js"></script>
        <script src="/plugins/DataTables-1.10.0/media/js/custom.dataTables.js"></script>
        <script src="/plugins/gritter/js/jquery.gritter.min.js"></script>
        <script src="/plugins/validation/jquery.validate.min.js"></script>
        <script src="/plugins/validation/additional-methods.min.js"></script>
        
        <script type='text/javascript' src="/js/main.js"></script>
        <script type='text/javascript' src="/js/app.js"></script>
        <script type='text/javascript' src="/js/filters.js"></script>
        <script type='text/javascript' src="/js/directives.js"></script>
        
        <script type='text/javascript' src="/js/controller/HeadCtrl.js"></script>
        <script type='text/javascript' src="/js/services/CommonServiceClient.js"></script>
        <script type='text/javascript' src="/js/common.js"></script>
        
        <?php
        //Thêm các js riêng biệt
        foreach ($view->javascript as $jsItem)
        {
            echo '<script src="'. $jsItem .'"></script>';
        }
        ?>
    </body>
</html>
