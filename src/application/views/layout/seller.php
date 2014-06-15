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
        <link rel="stylesheet" type="text/css" href="/style/seller.css" media="all">
        <?php
        //Thêm các js riêng biệt
        foreach ($view->css as $item)
        {
            echo '<link rel="stylesheet" type="text/css" href="' . $item . '" media="all">';
        }
        ?>
        <script type='text/javascript' src="/js/jquery-1.11.0.min.js"></script>	
        <script src="/plugins/DataTables-1.10.0/media/js/jquery.dataTables.min.js"></script>
        <script src="/plugins/DataTables-1.10.0/media/js/custom.dataTables.js"></script>

        <script type="text/javascript">
            function Config() {
                this.facebookApplicationKey = '<?php echo get_instance()->config->item('facebook_app_id'); ?>';

            }
        </script>


        <script type='text/javascript' src="/js/angular.min.js"></script>
        <script type='text/javascript' src="/js/angular-route.min.js"></script> 
        <script type='text/javascript' src="/js/ui-bootstrap-tpls-0.10.0.min.js"></script>
        <script type='text/javascript' src="/bootstrap-3.1.1-dist/js/bootstrap.min.js"></script>
        <script type='text/javascript' src="/js/ng-grid.min.js"></script>
        <script type='text/javascript' src="/plugins/ckeditor/ckeditor.js"></script>
        <script type='text/javascript' src="/js/main.js"></script>
        <script type='text/javascript' src="/js/app.js"></script>
        <script type='text/javascript' src="/js/filters.js"></script>
        <script type='text/javascript' src="/js/directives.js"></script>
    </head>
    <body>
        <div class="lynx_container">
            <div class="lynx_head">
                <div class="lynx_headWarp lynx_staticWidth">
                    <a class="lynx_logo" href="/" title="SFriendly"></a>
                    <div class="lynx_headLeft">
                        <a href="javascript:;" onclick='window.chatWindow = window.open("portal/help/contact_by_chat", "", "width=400,height=400");' class="lynx_liveChat"> <?php echo $language['layout']->lblLiveChat; ?></a>
                        <div class="lynx_language">
                        </div>
                    </div>
                </div>
                <div class="lynx_headMenu" >
                    <div class="lynx_menuWarp lynx_staticWidth">
                        <div class="lynx_category dropdown dropdown-hover">
                            <span class="dropdown-toggle " ng-mouseover="loadCategories()"> 
                                <span>ABC<span class="caret"></span> </span> 
                            </span>
                            <ul class="dropdown-menu" class="preload">
                                <li class="left">
                                    <a href="javascript:;" title="abc">abc</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div><!--head ctrl-->
            </div>
            <div class="content">
                <div class="row-wrapper">

                    <?php if ($view->breadcrums): ?>
                        <div class="lynx_navigationBar lynx_staticWidth">
                            <?php foreach ($view->breadcrums as $label => $url): ?>
                                <?php
                                $i = isset($i) ? $i + 1 : 0;
                                ?>
                                <span class="lynx_navigationItem">
                                    <?php if ($url != NULL): ?>
                                        <a href="<?php echo $url ?>" title="<?php echo $label ?>"><?php echo $label ?></a>
                                    <?php else: ?>
                                        <?php echo $label ?>
                                    <?php endif; ?>
                                    <?php if ($i < count($view->breadcrums) - 1): ?>
                                        <?php echo htmlentities('>>') ?>
                                    <?php endif; ?>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?><!--breadcrums-->
                    <?php require_once APPPATH . 'views/' . $view->view . '.php'; ?>
                    <div id="modal_general" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title"></h4>
                                </div>
                                <div class="modal-body">
                                    <center><img class="loading" src="/images/loading.gif"></center>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                </div>
                <div class="lynx_footer">
                    <div class="lynx_content">
                        <div class="lynx_col1">
                            <img class="lynx_logo" src="/images/logo-footer.png"/>
                            <span class="lynx_contact">
                                Sfriendly.com /  Sfriendly.vn <br/>
                                Phone: 098 999 999 <br/>
                                Email: sale@sf
                            </span>
                            <a href="#" class="lynx_share"><img src="/images/share-face.png" /></a>
                            <a href="#" class="lynx_share"><img src="/images/share-tiwwer.png" /></a>
                            <a href="#" class="lynx_share"><img src="/images/share-google.png" /></a>
                            <a href="#" class="lynx_share"><img src="/images/share-plumber.png" /></a>
                        </div>
                        <div class="lynx_col2">
                            <div class="lynx_cell">
                                <ul>
                                    <span><?php echo $language['layout']->lblMakeMoneyWithUs; ?></span>
                                    <li> <?php echo $language['layout']->lblSell; ?> </li>
                                    <li> <?php echo $language['layout']->lblAdve; ?> </li>
                                </ul>
                                <ul>
                                    <span><?php echo $language['layout']->lblCustomerService; ?></span>
                                    <li> <?php echo $language['layout']->lblFAQs; ?> </li>
                                    <li> <?php echo $language['layout']->lblContact; ?> </li>
                                    <li> <?php echo $language['layout']->lblShippingvsReturn; ?> </li>
                                    <li> <?php echo $language['layout']->lblSafeShopping; ?>  </li>
                                    <li> <?php echo $language['layout']->lblGuaranteeSecureShopping; ?>    </li>
                                </ul>
                            </div>
                            <div class="lynx_cell">
                                <ul>
                                    <span><?php echo $language['layout']->lblAboutSfriendly; ?></span>
                                    <li><?php echo $language['layout']->lblAbout; ?></li>
                                    <li><?php echo $language['layout']->lblJobs; ?></li>
                                    <li><?php echo $language['layout']->lblCustomerTestimonials; ?></li>
                                    <li><?php echo $language['layout']->lblAssociatesProgram; ?></li>
                                    <li><?php echo $language['layout']->lblGlossaryofTerms; ?></li>
                                    <li><?php echo $language['layout']->lblDailyShowDigest; ?></li>
                                </ul>
                                <ul>
                                    <span><?php echo $language['layout']->lblFeedback; ?></span>
                                    <li><?php echo $language['layout']->lblHowLikeOurWebsite; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="lynx_col3">
                            <img src="/images/Payment-follow.fw.png"/>
                        </div>
                    </div>
                    <div class="lynx_copyright">
                        <div class="lynx_copycontent">
                            Copyright © 2014 Sfriendly.com. All rights Reserved
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <script type='text/javascript' src="/js/controller/HeadCtrl.js"></script>
        <script type='text/javascript' src="/js/services/CommonServiceClient.js"></script>

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
    </body>
</html>
