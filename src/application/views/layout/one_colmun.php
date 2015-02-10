<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
$title = !empty($language[$view->view]->title) ? $language[$view->view]->title : isset($view->title) ? $view->title : 'Sfriendly.com';
$arr_meta_lang = array(
    'VN-VI' => 'vi',
    'EN-US' => 'en',
    'KO-KR' => 'ko'
);
$meta_lang_code = $arr_meta_lang[User::getCurrentUser()->languageKey];
?>
<html ng-app="lynx" ng-controller="LayoutCtrl" lang='<?php echo $meta_lang_code ?>' xml:lang='<?php echo $meta_lang_code ?>' xmlns="http://www.w3.org/1999/xhtml">
    <head >
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content='width=960, initial-scale=1, maximum-scale=1,user-scalabel=no' name='viewport'>
        <meta name="title" content="<?php echo $title ?>">
        <meta http-equiv="Content-Language" content="<?php echo $meta_lang_code ?>">
        <?php
        foreach ($view->metaData as $tag)
        {
            echo $tag;
        }
        ?>

        <title><?php echo $title ?></title>
        <link rel="stylesheet" type="text/css" href="/bootstrap-3.1.1-dist/css/bootstrap.min.css" media="all">
        <link rel="stylesheet" type="text/css" href="/bootstrap-3.1.1-dist/css/bootstrap-theme.min.css" media="all">
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" media="all">
        <!--<link rel="stylesheet" type="text/css" href="/style/ng-grid.min.css" media="all">-->
        <link rel="stylesheet" type="text/css" href="/style/main.css" media="all">
        <link rel="stylesheet" type="text/css" href="/style/headMenu.css" media="all">
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" >
        <link href='http://fonts.googleapis.com/css?family=Roboto:900&subset=latin,vietnamese' rel='stylesheet' type='text/css'>
        <link href='/style/fix_chrome.css' rel='stylesheet' type='text/css'>

        <!--lang-->
        <link title="English" type="text/html" rel="alternate" hreflang="en" href="http://www.sfriendly.com/en" lang="en" xml:lang="en" />
        <link title="Tiếng Việt" type="text/html" rel="alternate" hreflang="vi" href="http://www.sfriendly.com/vi" lang="vi" xml:lang="vi" />
        <link title="Korean" type="text/html" rel="alternate" hreflang="ko" href="http://www.sfriendly.com/kr" lang="ko" xml:lang="ko" />

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
                <a href="<?php echo Common::language_url("/seller/product") ?>"><?php echo $language['layout']->lblSellerOffice ?></a>|
                
                <?php if (User::getCurrentUser()->is_authorized): ?>
                    <a href="<?php echo Common::language_url("/portal/account/order_history") ?>"><?php echo $language['layout']->lblMyOrder ?></a>|
                    <a href="<?php echo Common::language_url("/portal/account/user_information") ?>"><?php echo User::getCurrentUser()->getFullname() ?></a>|
                    <a href="/logout"><?php echo $language['layout']->lblUserLogout ?></a>
                <?php else: ?>
                    <a href="<?php echo Common::language_url("/portal/order/checking") ?>"><?php echo $language['layout']->lblMyOrder ?></a>|
                    <a href="<?php echo User::getCurrentUser()->getLoginAuthenUrl() ?>"><?php echo $language['layout']->lblUserStatusNotSign ?></a>|
                    <a href="<?php echo Common::language_url("/portal/login") ?>" class="last"><?php echo $language['layout']->lblRegister ?></a>
                <?php endif; ?>
            </div>
        </div>
        <div class="head-box width-960">
            <a class="logo" href="<?php echo Common::language_url("/") ?>" title="sfriendly mall"><img src="/images/Logo-head.fw.png" alt="sfriendly mall"/></a>
            <form class="search-container" action="/search/showPage" id="frm-search">
                <div class="search text-left">
                    <input type="text" name="kw" placeholder="Ex. Gift..." />
                    <div class="search-btn cursor-pointer color-white" id="btn-search"><?php echo $language['layout']->lblSearch ?></div>
                </div>
                <div class="tag text-left">
                    &nbsp;
                    <!--                    <a href="#">Sản phẩm mới</a>
                                        <a href="#">Hàng việt nam</a>
                                        <a href="#">Quà tặng </a>
                                        <a href="#">Sản phẩm mới</a>-->
                </div>
            </form>
            <div class="user-pannel text-left">
                <img class="cursor-pointer" src="/images/Live-chat-icon.fw.png" onclick="$zopim.livechat.window.toggle();" alt="Sfriendly live support"/>
                <ul class="flag cursor-pointer">
                    <?php $active = User::getCurrentUser()->languageKey == 'EN-US' ? 'active' : '' ?>
                    <li class="us <?php echo $active ?>">
                        <a href="<?php echo Common::current_url_language('EN-US') ?>" title="English" lang="en" rel="alternate"></a>
                    </li>

                    <?php $active = User::getCurrentUser()->languageKey == 'KO-KR' ? 'active' : '' ?>
                    <li class="kr <?php echo $active ?>">
                        <a href="<?php echo Common::current_url_language('KO-KR') ?>" title="Korean" lang="ko" rel="alternate"></a>
                    </li>

                    <?php $active = User::getCurrentUser()->languageKey == 'VN-VI' ? 'active' : '' ?>
                    <li class="vn <?php echo $active ?>">
                        <a href="<?php echo Common::current_url_language('VN-VI') ?>" title="Tiếng Việt" lang="vi" rel="alternate"></a>
                    </li>

                </ul>
                <a href="<?php echo Common::language_url("/cart/showCart") ?>" title="<?php echo $language['layout']->lblYourCart ?>">
                    <div class="cart cursor-pointer">
                        <span class="cart-num text-center" ng-cloak>{{countCartProducts()}}</span>
                    </div>
                </a>
            </div>
        </div>
        <div class="head-menu width-960 cursor-pointer">
            <div id="widget-left">
                <a href="javascript:;" title="Happy new year">
                    <img src="/images/banner/banner_tet_2.jpg" alt="Sfriendly.com: Happy new year"/>
                </a>
            </div><!--widget-->
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
                                            <a href="<?php echo $childCate->getURL() ?>"  class="<?php echo $class ?>">
                                                <span><?php echo $childCate->name ?></span>
                                            </a>
                                        </li>
                                    <?php endfor; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <a href="<?php echo $parentCate->getURL() ?>">
                            <?php echo $parentCate->name ?>
                        </a>
                    </li>

                <?php endforeach; ?>
                <li class=" <?php echo User::getCurrentUser()->languageKey ?>" id="menu-vietnam">
                    <a href="<?php echo Common::language_url("/search/showPage?tag=madeinvietnam") ?>"><?php echo $language['layout']->lblMadeinVietnam ?></a>
                </li>
                <li class="last <?php echo User::getCurrentUser()->languageKey ?>" id="menu-hot">
                    <a href="<?php echo Common::language_url("/search/showPage?tag=hot") ?>"><?php echo $language['layout']->lblHot ?></a>
                </li>
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
                                <a class="remove" href="javascript:;" title="Remove" ng-click="removeFromCart(product.id)">x</a>
                                <a ng-href="{{product.url}}" title="{{product.name}}">
                                    <div class="info">
                                        <span class="name">{{product.name}}</span>
                                        <span class="price">{{product.priceString}}</span>
                                    </div>
                                    <div class="image">
                                        <img ng-src="/thumbnail.php/{{product.thumbnail}}/w=168" alt="{{product.name}}"/>
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
                                <a class="remove" href="javascript:;" title="Remove" ng-click="removeFromHistory(product.id)">x</a>
                                <a ng-href="{{product.url}}" title="{{product.name}}">
                                    <div class="info">
                                        <span class="name">{{product.name}}</span>
                                        <span class="price">{{product.priceString}}</span>
                                    </div>
                                    <div class="image">
                                        <img ng-src="/thumbnail.php/{{product.thumbnail}}/w=168" alt="{{product.name}}"/>
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
            <div class="footer-top">
                <div class="width-960">
                    <div class="footer-col-1"><?php echo $language['layout']->lblCustomerCare ?></div>
                    <div class="footer-col-2"><?php echo $language['layout']->lblShoppingAtSfriendly ?></div>
                    <div class="footer-col-3"><?php echo $language['layout']->lblSellingAtSfriendly ?></div>
                    <div class="footer-col-4"><?php echo $language['layout']->lblSupportedPayment ?></div>
                </div>
            </div>
            <div class="footer-middle">
                <div class="width-960 clearfix">
                    <div class="footer-col-1">
                        <div class="footer-group-header"><h4><?php echo $language['layout']->lblSupport ?></h4></div>
                        <a href="javascript:;" title="Hotline" class="footer-icon icon-phone">Hotline: (04) 3865 2455</a>
                        <div class="seperator"></div>
                        <a href="mailto:info@sfriendly.com" title="Email" class="footer-icon icon-email">Email: <script>document.write('info@sfriendly.com');</script></a>
                        <h4 class="clearfix"></h4>
                        <h4 class="clearfix"></h4>
                        <div class="footer-group-header"><h4><?php echo $language['layout']->lblWorkingTime ?></h4></div>
                        <ul>
                            <li>M - F: 9:00 to 19:00<br>Weekends: 9:00 to 15:00</li>
                            <li>
                                <?php echo $language['layout']->lblHanoiShip ?>
                                <br>
                                <?php echo $language['layout']->lblDistrictShip ?>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col-2">
                        <a class="footer-icon icon-cart" href="javascript:;" title="How to buy"><?php echo $language['layout']->lblHowToBuy ?></a>
                        <div class="seperator"></div>
                        <a class="footer-icon icon-truck" href="javascript:;" title="Shipping policy"><?php echo $language['layout']->lblShippingPolicy ?></a>
                    </div>
                    <div class="footer-col-3">
                        <a class="footer-icon icon-dollar" href="javascript:;" title="Selling with Sfriendly"><?php echo $language['layout']->lblSellingGuide ?></a>
                        <div class="seperator"></div>
                        <a class="footer-icon icon-best" href="/portal/login/registerSellerAccount" title="Register Seller Account"><?php echo $language['layout']->lblRegisterSeller ?></a>
                        <div class="seperator"></div>
                        <a class="footer-icon icon-product" href="javascript:;" title="Publish Product"><?php echo $language['layout']->lblPublishProduct ?></a>
                    </div>
                    <div class="footer-col-4">
                        <a href="javascript:;" title="Payment methods">
                            <img src="/images/footer/payment.png" style="width: 100%;">
                        </a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom clearfix">
                <div class="width-960">
                    <div class="footer-col-1">
                        <div class="footer-link">
                            <a href="javascript:;">Q & A</a>
                            &nbsp;&nbsp;|&nbsp;&nbsp;
                            <a href="<?php echo Common::language_url("/staticpage/quality_assurance") ?>"><?php echo $language['layout']->lblQualityAssurance ?></a>
                            &nbsp;&nbsp;|&nbsp;&nbsp;
                            <a href="<?php echo Common::language_url("/staticpage/terms_n_conditions") ?>"><?php echo $language['layout']->lblTermsOfUse ?></a>
                            &nbsp;&nbsp;|&nbsp;&nbsp;
                            <a href="<?php echo Common::language_url("/staticpage/privacy_policy") ?>"><?php echo $language['layout']->lblPrivacyPolicy ?></a>
                            &nbsp;&nbsp;|&nbsp;&nbsp;
                            <a href="javascript:;"><?php echo $language['layout']->lblAboutUs ?></a>
                            &nbsp;&nbsp;|&nbsp;&nbsp;
                            <a href="<?php echo Common::language_url('/sitemap') ?>">Sitemap</a>
                        </div>
                        <div class="footer-info">
                            Bản quyền @ 2014 Sfriendly.com / Sfriendly.vn - Được bảo vệ<br>
                            Công ty TNHH Hoàng Quân - Trụ sở chính: 19/62 Trần Bình, Mai Dịch, Câu giấy Hà Nội<br>
                            Giấy phép đăng kí kinh doanh số 0106519613 do Sở kế hoạch và Đầu tư Thành phố Hà Nội cấp lần đầu ngày 24/04/2014
                        </div>
                    </div>
                    <div class="footer-col-2">
                        <!--<img src="/images/footer/registered.png" alt="Registered at Misnistry of Commerce and Industry" style="float: left;">-->
                        <div style="float:right;">
                            <div class="seperator"></div>
                            Sfriendly.com/Sfriendly.vn
                            <div class="seperator"></div>
                            <div>
                                <a href="javascript:;" title="Share Facebook" class="footer-social facebook"></a>
                                <a href="javascript:;" title="Share Twiter" class="footer-social twiter"></a>
                                <a href="javascript:;" title="Share Google Plus" class="footer-social google"></a>
                                <a href="javascript:;" title="Share Pinterest" class="footer-social pinterest"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--footer-->

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

        <!-- Đa ngôn ngữ -->
        <?php
        $jqueryValidateLanguagefileName = "/js/jquery-validate-vn.js";
        switch (User::getCurrentUser()->languageKey) {
            case 'VN-VI' :
                $jqueryValidateLanguagefileName = "/js/jquery-validate-vn.js";
                break;
            case 'EN-US' :
                $jqueryValidateLanguagefileName = "/js/jquery-validate-e.js";
                break;
        }
        ?>

        <script type='text/javascript' src="/js/jquery-validate-vn.js"></script>

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
        <!--Start of Zopim Live Chat Script-->
        <script type="text/javascript">
                    window.$user = <?php echo json_encode(User::getCurrentUserForJson()) ?>;

                    window.$zopim || (function (d, s) {
                        var z = $zopim = function (c) {
                            z._.push(c);
                        }, $ = z.s = d.createElement(s), e = d.getElementsByTagName(s)[0];
                        z.set = function (o) {
                            z.set._.push(o);
                        };
                        z._ = [];
                        z.set._ = [];
                        $.async = !0;
                        $.setAttribute('charset', 'utf-8');
                        $.src = '//v2.zopim.com/?2h1mxYTKoeMFbOGXiqEH5ioYtTa4t5MT';
                        z.t = +new Date;
                        $.type = 'text/javascript';
                        e.parentNode.insertBefore($, e);
                    })(document, 'script');

                    $zopim(function () {
                        if (!$user.is_authorized) {
                            return;
                        }
                        if ($user.fullname)
                            $zopim.livechat.setName($user.fullname);
                        if ($user.account)
                            $zopim.livechat.setEmail($user.account);
                        if ($user.languageKey === 'KO-KR')
                            zopim.livechat.setLanguage('ko');
                        if ($user.languageKey === 'EN-US')
                            zopim.livechat.setLanguage('en');
                        if ($user.languageKey === 'VN-VI')
                            zopim.livechat.setLanguage('vi');
                    });
        </script>
        <!--End of Zopim Live Chat Script-->
    </body>
</html>
