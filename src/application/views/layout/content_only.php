<?php defined('BASEPATH') or die('no direct script access allowed') ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=320; initial-scale=1; maximum-scale=1; minimum-scale=1 user-scalable=no" />
        <title><?php echo $language[$view->view]->title; ?></title>
        <link rel="stylesheet" type="text/css" href="/bootstrap-3.1.1-dist/css/bootstrap.min.css" media="all">
        <link rel="stylesheet" type="text/css" href="/bootstrap-3.1.1-dist/css/bootstrap-theme.min.css" media="all">
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" media="all">
        <link rel="stylesheet" type="text/css" href="/style/ng-grid.min.css" media="all">
        <link rel="stylesheet" type="text/css" href="/style/main.css" media="all">

        <script>
            window.Config = function() {

            }
        </script>
        <script type='text/javascript' src="/js/jquery-1.11.0.min.js"></script>	
        <script type='text/javascript' src="/js/angular.min.js"></script>
        <script type='text/javascript' src="/js/angular-route.min.js"></script>
        <script type='text/javascript' src="/js/ui-bootstrap-tpls-0.10.0.min.js"></script>
        <script type='text/javascript' src="/bootstrap-3.1.1-dist/js/bootstrap.min.js"></script>
        <script type='text/javascript' src="/js/app.js"></script>
        <script type='text/javascript' src="/js/filters.js"></script>
        <script type='text/javascript' src="/js/directives.js"></script>
        <script type='text/javascript' src="/js/ng-grid.min.js"></script>
        <script src="/js/main.js"></script>
        <script src="/js/controller/PortalHeadController.js"></script>
        <script src="/js/services/PortalCommonServiceClient.js"></script>
        <?php
        foreach ($view->javascript as $jsItem)
        {
            echo '<script src="' . $jsItem . '"></script>';
        }
        ?>

        <!-- Thêm các css riêng biệt -->
        <?php
        foreach ($view->css as $item)
        {
            echo '<link rel="stylesheet" type="text/css" href="' . $item . '" media="all">';
        }
        ?>
    </head>
    <body>
        <?php require_once APPPATH . 'views/' . $view->view . '.php'; ?>
    </body>
</html>