<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html ng-app="lynx">
    <head >
       <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title><?php echo isset($language[$view->view]) ? $language[$view->view]->title: '';?></title>
        <link rel="stylesheet" type="text/css" href="/bootstrap-3.1.1-dist/css/bootstrap.min.css" media="all">
        <link rel="stylesheet" type="text/css" href="/bootstrap-3.1.1-dist/css/bootstrap-theme.min.css" media="all">
        <link rel="stylesheet" type="text/css" href="/style/main.css" media="all">
        <link rel="stylesheet" type="text/css" href="/style/home.css" media="all">
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" media="all">
        
        <link rel="stylesheet" type="text/css" href="/style/main.css" media="all">

        
        <?php 
        //Thêm các js riêng biệt
            foreach ($view->css as $item)
            {
                echo '<link rel="stylesheet" type="text/css" href="'.$item.'" media="all">';
            }
        ?>

    </head>
    <body>
        <div class="lynx_container">
            <div class="lynx_head"  ng-controller="HeadCtrl" id="head-ctrl">
                <div class="lynx_headWarp lynx_staticWidth">
                    <div class="lynx_logo"></div>
                    <div class="lynx_headLeft">
                        <span class="lynx_sell"> <?php echo $language['layout']->lblHeadSell;?></span>
                        <span class="lynx_liveChat"> <?php echo $language['layout']->lblLiveChat;?></span>
                        <div class="lynx_language">
                            <span class="lynx_label"><?php echo $language['layout']->lblLanguage;?> : 
                                <select id="sel-language" ng-model="language" ng-change="changeLanguage(language)" ng-init="language='<?php echo User::getCurrentUser()->languageKey;?>'">
                                    <option value="EN-US"  >English</option>
                                    <option value="VN-VI"  >Tiếng Việt</option>
                                </select>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="lynx_headMenu" >
                    <div class="lynx_menuWarp lynx_staticWidth">
                        <div class="lynx_category dropdown dropdown-hover">
                            <span class="dropdown-toggle " ng-mouseover="loadCategories()"> 
                                <span>MENU<span class="caret"></span> </span> 
                            </span>
                            <ul class="dropdown-menu" class="preload">
                                <li ng-if="!categories.length" class="center">
                                    <img src="/images/loading.gif" alt="Loading..." class="loading">
                                </li>
                                <li ng-repeat="category in categories" class="left">
                                    <a href="{{category.url}}" title="{{category.name}}">{{category.name}}</a>
                                </li>
                            </ul>
                        </div>

                        <div class="lynx_searchForm">
                            <input type="text" />
                            <span class="lynx_search">SEARCH</span>
                        </div>
                        <div class="lynx_loginLabel dropdown dropdown-hover">
                            <?php
                            $user = User::getCurrentUser();
                            ?>
                            <?php if ($user->is_authorized): ?>
                                <span class="dropdown-toggle" ng-click="loadCategories()"> 
                                    <a href="javascript:;">Hello, <?php echo $user->lastname ?> your account<span class="caret"></span></a> 
                                </span>
                                <ul class="dropdown-menu left">
                                    <li>
                                        <a href="<?php echo site_url('portal/account/edit') ?>">Your Account</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('portal/order/show') ?>">Your Order</a>
                                    </li>
                                    <div class="divider"></div>
                                    <li>
                                        <a href="<?php echo site_url('wishlist/show') ?>">Your Wishlist</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('pin/show') ?>">Your Pinlist</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="<?php echo site_url('portal/signout') ?>">Not <?php echo $user->lastname ?>? Sign Out</a>
                                    </li>
                                </ul>
                            <?php else: ?>
                                <a href="<?php echo site_url('portal/login') ?>">Hello, Sign in your account</a>
                            <?php endif; ?>
                        </div>
                        <div class="lynx_miniCart dropdown dropdown-hover">
                            <span class="dropdown-toggle" id='cart-dropdown'>({{cart.length}} Item)<span class='caret'></span></span>
                            <ul class="dropdown-menu">
                                <li ng-if="!cart.length" style='line-height: 20px'>
                                    You haven't picked any Product.
                                </li>
                                <li class="left cart-menu" ng-repeat="product in cart">
                                    <a href="{{product.url}}">
                                        <img src="{{product.thumbnail}}" width="40" height="40">
                                        {{product.name}}<br>
                                        Quantity: {{product.quantity}}
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="<?php echo site_url('cart/show') ?>">View Cart ({{cart.length}} Items)</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="lynx_cart" id="lynx_cart">
                        <span>CART {{cart.length}}</span>
                    </div>
                </div><!--head ctrl-->
            </div>
            <div class="content">
                <?php require_once APPPATH . 'views/' . $view->view . '.php'; ?>
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
                                    <span>Make Money With Us</span>
                                    <li> Sell </li>
                                    <li> Advertise with us </li>
                                </ul>
                                <ul>
                                    <span>Customer Service</span>
                                    <li> FAQs </li>
                                    <li> Contact Info </li>
                                    <li> Shipping and Returns </li>
                                    <li> Safe Shopping  </li>
                                    <li> Guarantee  Secure Shopping    </li>
                                </ul>
                            </div>
                            <div class="lynx_cell">
                                <ul>
                                    <span>About Sfriendly</span>
                                    <li>About</li>
                                    <li>Jobs</li>
                                    <li>Customer Testimonials</li>
                                    <li>Associates Program</li>
                                    <li>Glossary of Terms</li>
                                    <li>Daily Shoe Digest</li>
                                </ul>
                                <ul>
                                    <span>Feedback</span>
                                    <li>How do you like our website?</li>
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
        <script type="text/javascript">
            function Config() {
                this.facebookApplicationKey = '<?php echo get_instance()->config->item('facebook_app_id'); ?>';
                this.categoryService = '<?php echo site_url('category/categories_service') ?>';
                this.cartService = '<?php echo site_url('cart/cartProductsService') ?>';
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

        <script src="/js/main.js"></script>
        <script src="/js/controller/HeadCtrl.js"></script>
        <script src="/js/services/CommonServiceClient.js"></script>
        <?php
        //Thêm các js riêng biệt
        foreach ($view->javascript as $jsItem)
        {
            echo '<script src="'. $jsItem .'"></script>';
        }
        ?>
    </body>
</html>