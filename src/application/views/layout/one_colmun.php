<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html ng-app="lynx">
    <head >
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content='width=960, initial-scale=1, maximum-scale=1,user-scalable=no' name='viewport'>

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
        <div class="head-tool-box text-center">
            <div class="conatiner width-960 text-right">
                <a href="#">Seller  Office</a>|
                <a href="#">Kiểm tra đơn hàng</a>|
                <a href="#">Đăng nhập</a>|
                <a href="#" class="last">Đăng ký</a>
            </div>
        </div>
        <div class="head-box width-960">
            <a class="logo" href="#"><img src="/images/Logo-head.fw.png"/></a>
            <div class="search-container">
                <div class="search text-left">
                    <input type="text" placeholder="Ex. Gift..."/>
                    <div class="search-btn cursor-pointer color-white">SEARCH</div>
                </div>
                <div class="tag text-left">
                    <a href="#">Sản phẩm mới</a>
                    <a href="#">Hàng việt nam</a>
                    <a href="#">Quà tặng </a>
                    <a href="#">Sản phẩm mới</a>
                </div>
            </div>
            <div class="user-pannel text-left">
                <img class="cursor-pointer" src="/images/Live-chat-icon.fw.png"/>
                <ul class="flag cursor-pointer">
                    <li class="us"></li>
                    <li class="kr"></li>
                    <li class="vn"></li>
                </ul>
                <div class="cart cursor-pointer">
                    <span class="cart-num text-center">0</span>
                </div>
            </div>
        </div>
        <div class="head-menu width-960 cursor-pointer">
            <ul>
                <li class="active"><span><img src="/images/mn-gia-dinh.fw.png" /> GIA ĐÌNH</span></li>
                <li>
                    
                    <div class="child text-left">
                        <ul>
                            <li>
                              <table>
                                <tr>
                                    <td><img height="32px" width="32px" src="/images/mn-bg-do-so-sinh.fw.png"/>
                                    <td class="lable"><span>Đồ sơ sinh</span></td>
                                </tr>
                               </table>
                            </li>
                            <li>
                                <table>
                                    <tr>
                                        <td><img height="32px" width="32px" src="/images/mn-bg-do-so-sinh.fw.png"/>
                                        <td class="lable"><span>Đồ sơ sinh</span></td>
                                    </tr>
                                </table>
                            </li>
                            <li>
                                <table>
                                    <tr>
                                        <td><img height="32px" width="32px" src="/images/mn-bg-do-so-sinh.fw.png"/>
                                        <td class="lable"><span>Đồ sơ sinh</span></td>
                                    </tr>
                                </table>
                            </li>
                            <li>
                                <table>
                                    <tr>
                                        <td><img height="32px" width="32px" src="/images/mn-bg-do-so-sinh.fw.png"/>
                                        <td class="lable"><span>Đồ sơ sinh</span></td>
                                    </tr>
                                </table>
                            </li>
                            
                        </ul>
                    </div>
                    <div class="menu-deco"></div>
                    <span><img src="/images/mn-me-vs-be.fw.png" /> MẸ VÀ BÉ</span>
                </li>
                <li><span><img src="/images/nm-thuc-pham.fw.png" /> THỰC PHẨM</span></li>
                <li><span><img src="/images/mn-qua-tang.fw.png" /> QUÀ TẶNG</span></li>
                <li ><span><img src="/images/mn-made-in-viet-name.fw.png" /> MADE IN VIET NAME</span></li>
                <li class="last"><span><img src="/images/mn-hot.fw.png" /> HOT</span></li>
            </ul>
        </div>
        <div class="banner-box width-960">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                </ol>
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="http://placehold.it/900x500/39CCCC/ffffff&amp;text=I+Love+Bootstrap" alt="First slide">
                        <div class="carousel-caption">
                            First Slide
                        </div>
                    </div>
                    <div class="item">
                        <img src="http://placehold.it/900x500/3c8dbc/ffffff&amp;text=I+Love+Bootstrap" alt="Second slide">
                        <div class="carousel-caption">
                            Second Slide
                        </div>
                    </div>
                    <div class="item">
                        <img src="http://placehold.it/900x500/f39c12/ffffff&amp;text=I+Love+Bootstrap" alt="Third slide">
                        <div class="carousel-caption">
                            Third Slide
                        </div>
                    </div>
                </div>
                <a class="left carousel-control cursor-pointer" href="#carousel-example-generic" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control cursor-pointer" href="#carousel-example-generic" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>
        <div class="tab tab-orange width-960 text-left">
            <div class="head have-line width-960">
                <ul>
                    <li>SẢN PHẨM BÁN CHẠY</li>
                </ul>
            </div>
            <div class="tab-content width-960">
                <div id="carousel-hot-product" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-hot-product" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-hot-product" data-slide-to="1" class=""></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="lynx-row width-960">
                                <div class="lynx-box lynx-box-small cursor-pointer">
                                    <a class="opacity" href="#"></a>
                                    <img src="/images/demo-product.fw.png"/>
                                    <div class="name">Lorem ipsum dolor 109090 </div>
                                    <div class="seller-name">Name Bank </div>
                                    <div class="dis-price">1.500.000 vnđ </div>
                                    <div class="price">1.000.000 vnd </div>
                                    <div class="like">(980)</div>
                                </div>
                                <div class="lynx-box lynx-box-small">
                                    <a class="opacity" href="#"></a>
                                    <img src="/images/demo-product.fw.png"/>
                                    <div class="name">Lorem ipsum dolor 109090 </div>
                                    <div class="seller-name">Name Bank </div>
                                    <div class="dis-price">1.500.000 vnđ </div>
                                    <div class="price">1.000.000 vnd </div>
                                    <div class="like">(980)</div>
                                </div>
                                <div class="lynx-box lynx-box-small">
                                    <a class="opacity" href="#"></a>
                                    <img src="/images/demo-product.fw.png"/>
                                    <div class="name">Lorem ipsum dolor 109090 </div>
                                    <div class="seller-name">Name Bank </div>
                                    <div class="dis-price">1.500.000 vnđ </div>
                                    <div class="price">1.000.000 vnd </div>
                                    <div class="like">(980)</div>
                                </div>
                                <div class="lynx-box lynx-box-small">
                                    <a class="opacity" href="#"></a>
                                    <img src="/images/demo-product.fw.png"/>
                                    <div class="name">Lorem ipsum dolor 109090 </div>
                                    <div class="seller-name">Name Bank </div>
                                    <div class="dis-price">1.500.000 vnđ </div>
                                    <div class="price">1.000.000 vnd </div>
                                    <div class="like">(980)</div>
                                </div>
                                <div class="lynx-box lynx-box-small">
                                    <a class="opacity" href="#"></a>
                                    <img src="/images/demo-product.fw.png"/>
                                    <div class="name">Lorem ipsum dolor 109090 </div>
                                    <div class="seller-name">Name Bank </div>
                                    <div class="dis-price">1.500.000 vnđ </div>
                                    <div class="price">1.000.000 vnd </div>
                                    <div class="like">(980)</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="item">
                            <div class="lynx-row width-960">
                                <div class="lynx-box lynx-box-small">
                                    
                                </div>
                                <div class="lynx-box lynx-box-small">
                                    
                                </div>
                                <div class="lynx-box lynx-box-small">
                                    
                                </div>
                                <div class="lynx-box lynx-box-small">
                                    
                                </div>
                                <div class="lynx-box lynx-box-small">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="left carousel-control cursor-pointer" href="#carousel-hot-product" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control cursor-pointer" href="#carousel-hot-product" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>
        </div>
        <div class="clear-fix"></div>
        <div class="lynx-box width-960 lynx-adv-box text-left lynx-adv-home cursor-pointer">
            <div class="head">
                <div class="title">SẢN PHẨM NỔI BẬT</div>
                <div class="choice">
                    <a href="#">Gia đình</a>
                    <a href="#">Mẹ và bé</a>
                    <a href="#">Thực phẩm</a>
                    <a href="#">Qùa tặng</a>
                    <a href="#">Made in Viet nam</a>
                </div>
            </div>
            
            <div class="lynx-row">
                <img class="adv-img-box" src="" />
                <img class="adv-img-box" src="" />
            </div>
            <div class="lynx-row">
                <div class="lynx-box lynx-box-large">
                    <a class="opacity" href="#"></a>
                    <img src="/images/demo-product.fw.png"/>
                    <div class="name">Lorem ipsum dolor 109090 </div>
                    <div class="seller-name">Name Bank </div>
                    <div class="dis-price">1.500.000 vnđ </div>
                    <div class="price">1.000.000 vnd </div>
                    <div class="like">(980)</div>
                </div>
                
                <div class="lynx-box lynx-box-large">
                    <a class="opacity" href="#"></a>
                    <img src="/images/demo-product.fw.png"/>
                    <div class="name">Lorem ipsum dolor 109090 </div>
                    <div class="seller-name">Name Bank </div>
                    <div class="dis-price">1.500.000 vnđ </div>
                    <div class="price">1.000.000 vnd </div>
                    <div class="like">(980)</div>
                </div>
                
                <div class="lynx-box lynx-box-large">
                    <a class="opacity" href="#"></a>
                    <img src="/images/demo-product.fw.png"/>
                    <div class="name">Lorem ipsum dolor 109090 </div>
                    <div class="seller-name">Name Bank </div>
                    <div class="dis-price">1.500.000 vnđ </div>
                    <div class="price">1.000.000 vnd </div>
                    <div class="like">(980)</div>
                </div>
            </div>
        </div>
        
        
        <div class="tab tab-blue width-960 text-left">
            <div class="head width-960">
                <ul>
                    <li>SẢN PHẨM MỚI</li>
                </ul>
            </div>
            <div class="tab-content list-product width-960">
                <div class="lynx-row width-960">
                    <div class="lynx-box lynx-box-medium">
                        <a class="opacity" href="#"></a>
                        <img src="/images/demo-product.fw.png"/>
                        <div class="name">Lorem ipsum dolor 109090 </div>
                        <div class="seller-name">Name Bank </div>
                        <div class="dis-price">1.500.000 vnđ </div>
                        <div class="price">1.000.000 vnd </div>
                        <div class="like">(980)</div>
                    </div>
                    <div class="lynx-box lynx-box-medium">
                        <a class="opacity" href="#"></a>
                        <img src="/images/demo-product.fw.png"/>
                        <div class="name">Lorem ipsum dolor 109090 </div>
                        <div class="seller-name">Name Bank </div>
                        <div class="dis-price">1.500.000 vnđ </div>
                        <div class="price">1.000.000 vnd </div>
                        <div class="like">(980)</div>
                    </div>
                    <div class="lynx-box lynx-box-medium">
                        <a class="opacity" href="#"></a>
                        <img src="/images/demo-product.fw.png"/>
                        <div class="name">Lorem ipsum dolor 109090 </div>
                        <div class="seller-name">Name Bank </div>
                        <div class="dis-price">1.500.000 vnđ </div>
                        <div class="price">1.000.000 vnd </div>
                        <div class="like">(980)</div>
                    </div>
                    <div class="lynx-box lynx-box-medium">
                        <a class="opacity" href="#"></a>
                        <img src="/images/demo-product.fw.png"/>
                        <div class="name">Lorem ipsum dolor 109090 </div>
                        <div class="seller-name">Name Bank </div>
                        <div class="dis-price">1.500.000 vnđ </div>
                        <div class="price">1.000.000 vnd </div>
                        <div class="like">(980)</div>
                    </div>
                </div>
                <div class="lynx-row width-960">
                    <div class="lynx-box lynx-box-medium">
                        <a class="opacity" href="#"></a>
                        <img src="/images/demo-product.fw.png"/>
                        <div class="name">Lorem ipsum dolor 109090 </div>
                        <div class="seller-name">Name Bank </div>
                        <div class="dis-price">1.500.000 vnđ </div>
                        <div class="price">1.000.000 vnd </div>
                        <div class="like">(980)</div>
                    </div>
                     <div class="lynx-box lynx-box-medium">
                        <a class="opacity" href="#"></a>
                        <img src="/images/demo-product.fw.png"/>
                        <div class="name">Lorem ipsum dolor 109090 </div>
                        <div class="seller-name">Name Bank </div>
                        <div class="dis-price">1.500.000 vnđ </div>
                        <div class="price">1.000.000 vnd </div>
                        <div class="like">(980)</div>
                    </div>
                     <div class="lynx-box lynx-box-medium">
                        <a class="opacity" href="#"></a>
                        <img src="/images/demo-product.fw.png"/>
                        <div class="name">Lorem ipsum dolor 109090 </div>
                        <div class="seller-name">Name Bank </div>
                        <div class="dis-price">1.500.000 vnđ </div>
                        <div class="price">1.000.000 vnd </div>
                        <div class="like">(980)</div>
                    </div>
                     <div class="lynx-box lynx-box-medium">
                        <a class="opacity" href="#"></a>
                        <img src="/images/demo-product.fw.png"/>
                        <div class="name">Lorem ipsum dolor 109090 </div>
                        <div class="seller-name">Name Bank </div>
                        <div class="dis-price">1.500.000 vnđ </div>
                        <div class="price">1.000.000 vnd </div>
                        <div class="like">(980)</div>
                    </div>
                    
                </div>
            </div>
            <div class="extend width-960 text-center">
                <div class="btn-extend"></div>
            </div>
        </div>
        <div class="lynx-adv width-960">
        
        </div>
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
            }
        </script>


        <script type='text/javascript' src="/js/angular.min.js"></script>
        <script type='text/javascript' src="/js/angular-route.min.js"></script>
        <script type='text/javascript' src="/js/ui-bootstrap-tpls-0.10.0.min.js"></script>
        <script type='text/javascript' src="/bootstrap-3.1.1-dist/js/bootstrap.min.js"></script>
        <script type='text/javascript' src="/js/ng-grid.min.js"></script>
        <script type='text/javascript' src="/js/main.js"></script>
        <script type='text/javascript' src="/js/app.js"></script>
        <script type='text/javascript' src="/js/filters.js"></script>
        <script type='text/javascript' src="/js/directives.js"></script>


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
