<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html ng-app="lynx" ng-controller="LayoutCtrl">
    <head >
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content='width=960, initial-scale=1, maximum-scale=1,user-scalabel=no' name='viewport'>

        <title><?php echo!empty($language[$view->view]->title) ? $language[$view->view]->title : isset($view->title) ? $view->title : 'Sfriendly.com'; ?></title>
        <link rel="stylesheet" type="text/css" href="/bootstrap-3.1.1-dist/css/bootstrap.min.css" media="all">
        <link rel="stylesheet" type="text/css" href="/bootstrap-3.1.1-dist/css/bootstrap-theme.min.css" media="all">
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" media="all">
        <!--<link rel="stylesheet" type="text/css" href="/style/ng-grid.min.css" media="all">-->
        <link rel="stylesheet" type="text/css" href="/style/main.css" media="all">
        <link rel="stylesheet" type="text/css" href="/style/headMenu.css" media="all">
        <?php
        //Thêm các js riêng biệt
        foreach ($view->css as $item)
        {
            echo '<link rel="stylesheet" type="text/css" href="' . $item . '" media="all">';
        }
        ?>
        <script type='text/javascript' src="/js/jquery-1.11.0.min.js"></script>	
        <script type='text/javascript' src="/js/belazy.js"></script>	
    </head>
    <body>
        <div class="head-tool-box text-center">
            <div class="conatiner width-960 text-right">
                <a href="/seller/product"><?php echo $language['layout']->lblSellerOffice ?></a>|
                <a href="/portal/account/order_history"><?php echo $language['layout']->lblMyOrder ?></a>|
                <?php if (User::getCurrentUser()->is_authorized): ?>
                    <a href="/portal/account/user_information"><?php echo User::getCurrentUser()->getFullname() ?></a>|
                    <a href="/logout"><?php echo $language['layout']->lblUserLogout ?></a>
                <?php else: ?>
                    <a href="<?php echo User::getCurrentUser()->getLoginAuthenUrl() ?>"><?php echo $language['layout']->lblUserStatusNotSign ?></a>|
                    <a href="/portal/login" class="last"><?php echo $language['layout']->lblRegister ?></a>
                <?php endif; ?>
            </div>
        </div>
        <div class="head-box width-960">
            <a class="logo" href="/" title="sfriendly mall"><img src="/images/Logo-head.fw.png" alt="sfriendly mall"/></a>
            <form class="search-container" action="/search/showPage" id="frm-search">
                <div class="search text-left">
                    <input type="text" name="kw" placeholder="Ex. Gift..." />
                    <div class="search-btn cursor-pointer color-white" id="btn-search"><?php echo $language['layout']->lblSearch ?></div>
                </div>
                <div class="tag text-left">
                    <a href="#">Sản phẩm mới</a>
                    <a href="#">Hàng việt nam</a>
                    <a href="#">Quà tặng </a>
                    <a href="#">Sản phẩm mới</a>
                </div>
            </form>
            <div class="user-pannel text-left">
                <img class="cursor-pointer" src="/images/Live-chat-icon.fw.png"/>
                <ul class="flag cursor-pointer">
                    <?php $active = User::getCurrentUser()->languageKey == 'EN-US' ? 'active' : '' ?>
                    <li class="us <?php echo $active ?>"><a href="javascript:;" title="English" ng-click="changeLanguage('EN-US')"></a></li>

                    <?php $active = User::getCurrentUser()->languageKey == 'KO-KR' ? 'active' : '' ?>
                    <li class="kr <?php echo $active ?>"><a href="javascript:;" title="Korean" ng-click="changeLanguage('KO-KR')"></a></li>

                    <?php $active = User::getCurrentUser()->languageKey == 'VN-VI' ? 'active' : '' ?>
                    <li class="vn <?php echo $active ?>"><a href="javascript:;" title="Tiếng Việt" ng-click="changeLanguage('VN-VI')"></a></li>
                </ul>
                <a href="/cart/showCart" title="<?php echo $language['layout']->lblYourCart ?>">
                    <div class="cart cursor-pointer">
                        <span class="cart-num text-center">{{countCartProducts()}}</span>
                    </div>
                </a>
            </div>
        </div>
        <div class="head-menu width-960 cursor-pointer">
            <ul>
                <?php
                $categogies = CategoryMapper::make()
                        ->filterParent(0)
                        ->setLanguage(User::getCurrentUser()->languageKey)
                        ->setAutoloadChildren()
                        ->findAll();
                /* @var $categories CategoryDomain */
                ?>
                <?php foreach ($categogies as $parentCate): ?>
                    <?php
                    $class = User::getCurrentUser()->languageKey;
                    $class .= isset($view->activeCates[0]) && $view->activeCates[0] == $parentCate->id ? ' active' : '';
                    ?>
                    <li id="menu-<?php echo $parentCate->codename ?>" class="<?php echo $class ?>">
                        <?php if (count($parentCate->children)): ?>
                            <div class="menu-deco"></div>
                            <div class="child text-left">
                                <ul>
                                    <?php $lastRow = ceil(count($parentCate->children) / 2) ?>
                                    <?php
                                    for ($i = 0; $i < count($parentCate->children); $i++):
                                        ?>
                                        <?php
                                        $childCate = $parentCate->children[$i];
                                        $currentRow = ceil(($i + 1) / 2);
                                        $class = $currentRow == $lastRow ? 'last-row' : '';
                                        ?>
                                        <li id="menu-<?php echo $childCate->codename ?>">
                                            <a href="/category/show/<?php echo $childCate->id ?>"  class="<?php echo $class ?>">
                                                <span><?php echo $childCate->name ?></span>
                                            </a>
                                        </li>
                                    <?php endfor; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <a href="/category/show/<?php echo $parentCate->id ?>">
                            <?php echo $parentCate->name ?>
                        </a>
                    </li>

                <?php endforeach; ?>
                <li class=" <?php echo User::getCurrentUser()->languageKey ?>" id="menu-vietnam"><a href="#"><?php echo $language['layout']->lblMadeinVietnam ?></a></li>
                <li class="last <?php echo User::getCurrentUser()->languageKey ?>" id="menu-hot"><a href="#"><?php echo $language['layout']->lblHot ?></a></li>
            </ul>
            <div>
                <div id="widget-right" ng-cloak>
                    <div class="product-group">
                        <a href="javascript:;" title="View" ng-click="setWidgetRightActive('cart')">
                            <?php echo $language['layout']->wdCart ?> <i class="fa fa-caret-down" ng-if="widgetRightActive == 'cart'"></i>
                            <div class="pull-right">{{countCartProducts()}}</div>
                        </a>
                        <ul ng-if="widgetRightActive === 'cart'">
                            <li ng-repeat="product in getCurrentProducts()">
                                <!--<a class="remove" href="javascript:;" title="Remove">x</a>-->
                                <a href="{{product.url}}" title="{{product.name}}">
                                    <div class="info">
                                        <span class="name">{{product.name}}</span>
                                        <span class="price">{{product.priceString}}</span>
                                    </div>
                                    <div class="image">
                                        <img ng-src="/thumbnail.php/{{product.thumbnail}}/w=170" alt="{{product.name}}"/>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="product-group">
                        <a href="javascript:;" title="View" ng-click="setWidgetRightActive('viewed')">
                            <?php echo $language['layout']->wdView ?> <i class="fa fa-caret-down" ng-if="widgetRightActive == 'viewed'"></i>
                            <div class="pull-right">{{countWidgetProducts('viewed')}}</div>
                        </a>
                        <ul ng-if="widgetRightActive === 'viewed'">
                            <li ng-repeat="product in getCurrentProducts()">
                                <!--<a class="remove" href="javascript:;" title="Remove">x</a>-->
                                <a href="{{product.url}}" title="{{product.name}}">
                                    <div class="info">
                                        <span class="name">{{product.name}}</span>
                                        <span class="price">{{product.priceString}}</span>
                                    </div>
                                    <div class="image">
                                        <img ng-src="/thumbnail.php/{{product.thumbnail}}/w=170" alt="{{product.name}}"/>
                                    </div>
                                </a>
                            </li>
                            <div class="page">
                                <small>
                                    <a href="javascript:;" title="Left" class="btn-page" ng-click="changeWidgetPage(-1)"><i class="fa fa-angle-left"></i></a>
                                    <strong>{{widgetRightPage}}/{{widgetRightProducts[widgetRightActive].length}}</strong>
                                    <a href="javascript:;" title="Right" class="btn-page" ng-click="changeWidgetPage(+1)"><i class="fa fa-angle-right"></i></a>
                                </small>
                            </div>
                        </ul>
                    </div>
                    <a href="javascript:;" class="btn-scroll" title="scroll to top" id="scroll-to-top"><?php echo $language['layout']->wdTop ?><div class="pull-right"><i class="fa fa-caret-up"></i></div></a>
                    <a href="javascript:;" class="btn-scroll" title="scroll to bottom" id="scroll-to-bottom"><?php echo $language['layout']->wdBottom ?><div class="pull-right"><i class="fa fa-caret-down"></i></div></a>
                </div><!--wiggget-->
            </div>
        </div>
        <?php require_once APPPATH . 'views/' . $view->view . '.php'; ?>
        <div class="clearfix"></div>
        <div class="lynx_footer ">
            <div class="lynx_content width-960">
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
                            <li><a href="/portal/page/about_us"><?php echo $language['layout']->lblAbout; ?></a></li>
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

        <script type="text/javascript">
                    function Config() {
                        this.facebookApplicationKey = '<?php echo get_instance()->config->item('facebook_app_id'); ?>';
                        this.categoryService = '<?php echo base_url('category/categories_service') ?>';
                        this.cartService = '<?php echo base_url('cart/cartProductsService') ?>';
                        this.language = '<?php echo User::getCurrentUser()->languageKey ?>';
                    }
        </script>


        <script type='text/javascript' src="/js/angular.min.js"></script>
        <script type='text/javascript' src="/js/angular-route.min.js"></script>
        <!--<script type='text/javascript' src="/js/ui-bootstrap-tpls-0.10.0.min.js"></script>-->
        <script type='text/javascript' src="/bootstrap-3.1.1-dist/js/bootstrap.min.js"></script>
        <script type='text/javascript' src="/js/ng-grid.min.js"></script>
        <script type='text/javascript' src="/js/main.js"></script>
        <script type='text/javascript' src="/js/app.js"></script>
        <script type='text/javascript' src="/js/filters.js"></script>
        <script type='text/javascript' src="/js/directives.js"></script>


        <script type='text/javascript' src="/js/controller/LayoutCtrl.js"></script>
        <script type='text/javascript' src="/js/services/CommonServiceClient.js"></script>

        <script type="text/javascript">
                    function Config() {
                        this.facebookApplicationKey = '<?php echo get_instance()->config->item('facebook_app_id'); ?>';
                    }
                    $.browser = {};
                    window.fnMoneyToString = <?php echo getJavascriptMoneyFunction(User::getCurrentUser()->getCurrency()) ?>;
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
