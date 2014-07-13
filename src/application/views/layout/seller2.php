<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo $view->title ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
        //Thêm các js riêng biệt
        foreach ($view->css as $item)
        {
            echo '<link rel="stylesheet" type="text/css" href="' . $item . '" media="all">';
        }
        ?>
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="/cerulean/bower_components/html5shiv/dist/html5shiv.js"></script>
          <script src="/cerulean/bower_components/respond/dest/respond.min.js"></script>
        <![endif]-->
        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="/cerulean/js/angular.min.js"></script>
    </head>
    <?php $body_class = $view->sidebar ? '' : 'no-sidebar' ?>
    <body class="<?php echo $body_class ?>">
        <div class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a href="javascript:;" class="navbar-brand">Sfriendly</a>
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse" id="navbar-main">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="javascript:;"><i class="fa fa-reorder"></i></a>
                        </li>
                        <?php
                        foreach ($view->mainNavs as $nav)
                        {
                            echo $nav;
                        }
                        ?>
                    </ul>

                    <!--                    <ul class="nav navbar-nav navbar-right">
                                            <li><a href="http://builtwithbootstrap.com/" target="_blank">Built With Bootstrap</a></li>
                                            <li><a href="https://wrapbootstrap.com/?ref=bsw" target="_blank">WrapBootstrap</a></li>
                                        </ul>-->
                </div>
            </div>
        </div>
        <?php if ($view->sidebar): ?>
            <div id="left">
                <?php require dirname(__DIR__) . '/seller/' . $view->sidebar . '.php' ?>
            </div>
        <?php endif; ?>
        <div class="container" style="margin-top:10px;">
            <?php if ($view->heading): ?>
                <h4 class="page-header"><?php echo $view->heading ?></h4>
            <?php endif; ?>
            <?php require_once APPPATH . 'views/' . $view->view . '.php'; ?>
        </div>
        <script type="text/javascript">
            function Config() {
                this.facebookApplicationKey = '<?php echo get_instance()->config->item('facebook_app_id'); ?>';
            }
        </script>
        <?php
        //Thêm các js riêng biệt
        foreach ($view->javascript as $jsItem)
        {
            echo '<script src="' . $jsItem . '"></script>';
        }
        ?>
        <?php $notify = Common::get_notification(); ?>
        <?php if ($notify): ?>
            <script>
                $(function() {
                    var notify_data = <?php echo json_encode($notify) ?>;
                    $.gritter.add({
                        title: notify_data.title,
                        text: notify_data.msg,
                        sticky: notify_data.success ? false : true
                    });
                });

            </script>
        <?php endif; ?>
    </body>
</html>
