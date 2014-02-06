<?php
defined('DS') or die;
/* @var $this \View */
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
        <link rel="stylesheet" type="text/css" href="<?php echo $this->get_theme_url() ?>css/flags.css"/>
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
        <!--validadtion-->
        <script src="<?php echo $this->get_theme_url() ?>js/jqBootstrapValidation.js"></script>
        <!--custom-->
        <script src="<?php echo $this->get_theme_url() ?>js/custom.js"></script>
    </head>
    <body>
        <div class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a href="<?php echo App::get_site_url() ?>" class="navbar-brand">
                        <?php echo Config::BRAND ?>
                    </a>
                </div>
                <div class="navbar-collapse collapse " id="navbar-main">
                    <ul class="nav navbar-nav">
                        <li class="divider">
                            <a href="javascript:;" class="bs-tooltip" title="<?php echo ucfirst(__('show_hide_sidebar')) ?>">
                                <i class="fa fa-bars"></i>
                            </a>
                        </li>
                        <?php foreach ($this->_arr_main_nav as $nav): ?>
                            <?php
                            if ($nav->is_show() == false)
                            {
                                continue;
                            }
                            $v_drop_down = count($nav->get_children()) ? true : false;
                            $v_class = $v_drop_down ? 'dropdown' : '';
                            $v_class .= $this->_active_main_nav == $nav->get_id() ? ' active' : '';
                            ?>
                            <li class="<?php echo $v_class ?>">
                                <?php if ($v_drop_down): ?>
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:;" id="<?php echo $nav->get_id() ?>">
                                        <?php echo $nav->get_label() ?> <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="<?php echo $nav->get_id() ?>">
                                        <?php foreach ($nav->get_children() as $sub_nav): ?>
                                            <?php $v_class = $this->_active_sub_nav == $sub_nav->get_id() ? 'active' : '' ?>
                                            <li class="<?php echo $v_class ?>">
                                                <a tabindex="-1" href="<?php echo $sub_nav->get_url() ?>">
                                                    <?php echo $sub_nav->get_label() ?>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php else: ?>
                                    <li class="<?php echo $v_class ?>">
                                        <a href="<?php echo $nav->get_url() ?>" id="<?php echo $nav->get_id() ?>">
                                            <?php echo $nav->get_label() ?>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <!--lang-->
                        <?php $v_current_lang = Cookie::get('lang', 'en_us') ?>
                        <?php foreach ($this->_arr_langs as $arr_single_lang): ?>
                            <?php
                            $v_active = $v_current_lang == $arr_single_lang['id'] ? 'active' : '';
                            $v_url = $this->get_controller_url('dashboard/change_language') . $arr_single_lang['id'];
                            ?>
                            <li class="<?php echo $v_active ?>">
                                <a href="<?php echo $v_url ?>" title="<?php echo $arr_single_lang['title'] ?>" class="bs-tooltip">
                                    <img class="flag flag-<?php echo $arr_single_lang['flag'] ?>"/>
                                </a>
                            </li>
                        <?php endforeach; ?>
                        <?php if (Session::get_current_user()): ?>
                            <li><!--account-->
                                <a href="javascript:;" class="dropdown-toggle bs-tooltip" data-toggle="dropdown" 
                                   id="account-nav" title="<?php echo ucfirst(__('account')) ?>" >
                                    <i class="fa fa-user"></i>&nbsp;<?php echo Session::get_current_user()->account ?>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="account-nav">
                                    <li>
                                        <a href="<?php echo $this->get_controller_url('account/dsp_change_password') ?>">
                                            <?php echo ucfirst(__('change_password')) ?>
                                        </a>
                                        <a href="javascript:;"><?php echo ucfirst(__('logout')) ?></a>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                        <?php if (Session::get_current_user() && Session::get_current_user()->is_admin): ?>
                            <li><!--admin-->
                                <a href="javascript:;" class="dropdown-toggle bs-tooltip" data-toggle="dropdown" 
                                   id="admin-nav" title="<?php echo ucfirst(__('manage')) ?>" >
                                    <i class="fa fa-cog"></i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="admin-nav">
                                    <?php foreach ($this->_arr_admin_nav as $nav): ?>
                                        <?php if ($nav == null): ?>
                                            <li class="divider"></li>
                                        <?php else: ?>
                                            <?php $v_active = $this->_active_admin_nav == $nav->get_id() ? 'active' : ''; ?>
                                            <li class="<?php echo $v_active ?>">
                                                <a href="<?php echo $nav->get_url() ?>" target="_blank">
                                                    <?php echo $nav->get_label() ?>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach ?>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container" style="padding-top:10px;">
            <?php $content_class = 'no-sidebar'; ?>
            <?php if ($this->_sidebar): ?>
                <?php $content_class = 'have-sidebar'; ?>
                <div id="left">
                    <?php require __DIR__ . DS . $this->_sidebar . '.php' ?>
                </div>
            <?php endif; ?>
            <div id="content" class="<?php echo $content_class ?>">
                <?php if (!empty($this->_heading)): ?>
                    <h3 class="page-header"><?php echo $this->_heading ?></h3>
                <?php endif; ?>
                <?php if (!empty($this->_breadcrums)): ?>
                    <ul class="breadcrumb">
                        <?php
                        $n = count($this->_breadcrums);
                        $i = 0;
                        ?>
                        <?php foreach ($this->_breadcrums as $label => $url): ?>
                            <?php $i++ ?>
                            <?php if ($i < $n - 1): ?>
                                <li><a href="<?php echo $url ?>"><?php echo $label ?></a></li>
                            <?php else: ?>
                                <li class="active"><a href="javascript:;"><?php echo $label ?></a></li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <?php echo $this->_content ?>
            </div>
        </div>
        <?php if ($notify = Session::get_notification()): ?>
            <script>
                $.notify('<?php echo $notify['text'] ?>', '<?php echo $notify['status'] ?>');
            </script>
        <?php endif; ?>
    </body>
</html>