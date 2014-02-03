<?php
defined('DS') or die;
/* @var $this \cores_View */
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#">
    <head>
        <title><?php echo $this->_title ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="<?php echo $this->get_theme_url() ?>css/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo $this->get_theme_url() ?>css/bootswatch.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo $this->get_theme_url() ?>css/font-awesome.min.css"/>
        <!--data table-->
        <link rel="stylesheet" type="text/css" href="<?php echo $this->get_theme_url() ?>css/custom.css"/>

        <script src="<?php echo $this->get_theme_url() ?>js/jquery-1.10.2.min.js"></script>
        <script src="<?php echo $this->get_theme_url() ?>js/bootstrap.min.js"></script>
        <script src="<?php echo $this->get_theme_url() ?>js/bootswatch.js"></script>
        <script src="<?php echo $this->get_theme_url() ?>js/bsa.js"></script>
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="<?php echo $this->get_theme_url() ?>bower_components/html5shiv/dist/html5shiv.js"></script>
          <script src="<?php echo $this->get_theme_url() ?>bower_components/respond/dest/respond.min.js"></script>
        <![endif]-->
        <!--data table-->
        <script src="<?php echo $this->get_theme_url() ?>js/jquery.datatable/js/jquery.dataTables.js"></script>
        <script src="<?php echo $this->get_theme_url() ?>js/jquery.datatable/js/dataTables.custom.js"></script>
        <!--notify-->
        <script src="<?php echo $this->get_theme_url() ?>js/notify.min.js"></script>
        <!--custom-->
        <script src="<?php echo $this->get_theme_url() ?>js/custom.js"></script>
    </head>
    <body>
        <div class="container" style="padding-top:10px;">
            <div id="content" class="no-sidebar">
                <form class="form-horizontal well col-xs-4 col-xs-offset-4" method="post" action="<?php echo $this->get_controller_url() ?>do_login">
                    <fieldset>
                        <legend><i class="fa fa-key"></i> Đăng nhập hệ thống</legend>
                        <div class="form-group">
                            <label for="txt_account" class="col-lg-3 control-label">Tài khoản</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="txt_account" id="txt_account"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="txt_password" class="col-lg-3 control-label">Mật khẩu</label>
                            <div class="col-lg-9">
                                <input type="password" class="form-control" name="txt_password" id="txt_password"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-9 col-lg-offset-3">
                                <button type="submit" class="btn btn-primary btn-sm">Đăng nhập</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </body>
</html>