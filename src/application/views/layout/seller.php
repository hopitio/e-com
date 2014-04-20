<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=320; initial-scale=1; maximum-scale=1; minimum-scale=1 user-scalable=no" />
        <title><?php echo $language[$view->view]->title; ?></title>
        <script src="/js/jquery-1.11.0.min.js"></script>
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

        <!-- JQUERY -->
        <script src="/js/jquery-1.11.0.min.js"></script>

        <!-- perfect srollbar -->
        <script src="/js/perfect-scrollbar.with-mousewheel.min.js"></script>
        <link href="/style/perfect-scrollbar.min.css" rel="stylesheet" />

        <!-- bxSlider-->
        <script src="/js/jquery.bxslider.js"></script>
        <link href="/style/jquery.bxslider.css" rel="stylesheet" />

        <!-- Jquery UI -->
        <script src="/js/jquery-ui-1.10.4.custom/js/jquery-ui-1.10.4.custom.min.js"></script>
        <link rel="stylesheet" type="text/css" href="/js/jquery-ui-1.10.4.custom/css/ui-lightness/jquery-ui-1.10.4.custom.min.css" media="all">
        <!--datatable-->
        <script src="/js/jquery.datatable/js/jquery.dataTables.min.js"></script>
        <script src="/js/jquery.datatable/js/dataTables.custom.js"></script>

        <!-- Css -->
        <link rel="stylesheet" type="text/css" href="/js/jquery.datatable/css/jquery.dataTables.css" media="all">
        <link rel="stylesheet" type="text/css" href="/style/main.css" media="all">

        <script type="text/javascript">
            function Config() {
                this.facebookApplicationKey = '<?php echo get_instance()->config->item('facebook_app_id'); ?>';
            }
        </script>
        <script src="/js/main.js"></script>
        <!-- Thêm các js riêng biệt -->
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
        <div id="wrap">
            <div class="topbar">
                <div class="container wStaticPx">
                    <ul class="headerButtonList">
                        <li class="myAcc">
                            <a href="#">My Account</a>
                            <ul class="accessPannel">
                                <?php
                                $user = User::getCurrentUser();
                                if ($user->is_authorized)
                                {
                                    echo '<li><a href="' . $user->getLogout() . '">Đăng Xuất</a></li>';
                                }
                                else
                                {
                                    echo '<li><a href="' . $user->getLoginAuthenUrl() . '">Đăng nhập</a></li>';
                                }
                                ?>
                                <li><a href="#">WishList</a></li>
                                <li><a href="#">Đăng sản phẩm</a></li>
                            </ul>
                        </li>
                        <li class="lang"><a href="#">EN</a>
                            <ul class="accessPannel">
                                <li><a href="#">EN</a></li>
                                <li><a href="#">VN</a></li>
                                <li><a href="#">KOR</a></li>
                            </ul>
                        </li>
                        <li class="money"><a href="#">Dollar</a>
                            <ul class="accessPannel">
                                <li><a href="#">EN</a></li>
                                <li><a href="#">VN</a></li>
                                <li><a href="#">KOR</a></li>
                            </ul>
                        </li>

                    </ul>
                    <div class="headerMobileView">
                        <div class="shortcutButton"><i class="fa fa-list"></i></div>
                        <div class="shortcutSearch"><i class="fa fa-search"></i></div>
                        <div class="shortcutCart"><i class="fa fa-shopping-cart"></i></div>
                    </div>
                </div>
            </div>
            <div class="header">
                <div class="container wStaticPx">
                    <div class="logo"><img src="/images/CGHUB_50x50_botCG_gloss.gif"/></div>
                    <div class="menu" >
                        <div class="menuExt">
                            <div class="logo"><img src="/images/CGHUB_50x50_botCG_gloss.gif"/></div>
                            <div class="extendIcon"><i class="fa fa-plus-square-o"></i> </div>
                        </div>
                        <ul class="cate">
                            <li>
                                <a href="category.html">ELECTRONICS</a>
                                <div class="containerSubMenu">
                                    <ul>
                                        <li class="menuCol">
                                            <span><a href="category.html">Điện Máy </a></span>
                                            <ul>
                                                <li><a href="category.html">Điện máy 1</a></li>
                                                <li><a href="category.html">Điện máy 2</a></li>
                                                <li><a href="category.html">Điện máy 3</a></li>
                                                <li><a href="category.html">Điện máy 4</a></li>
                                                <li><a href="category.html">Điện máy 4</a></li>
                                                <li><a href="category.html">Điện máy 4</a></li>
                                                <li><a href="category.html">Điện máy 4</a></li>
                                                <li><a href="category.html">Xem Thêm →</a></li>
                                            </ul>
                                        </li>
                                        <li class="menuCol">
                                            <span><a href="category.html">Điện Máy </a></span>
                                            <ul>
                                                <li><a href="category.html">Điện máy 1</a></li>
                                                <li><a href="category.html">Điện máy 2</a></li>
                                                <li><a href="category.html">Điện máy 3</a></li>
                                                <li><a href="category.html">Xem Thêm →</a></li>
                                            </ul>
                                        </li>
                                        <li class="menuCol">
                                            <span><a href="category.html">Điện Máy </a></span>
                                            <ul>
                                                <li><a href="category.html">Điện máy 1</a></li>
                                                <li><a href="category.html">Điện máy 2</a></li>
                                                <li><a href="category.html">Điện máy 3</a></li>
                                                <li><a href="category.html">Xem Thêm →</a></li>
                                            </ul>
                                        </li>
                                        <li class="menuCol">
                                            <span><a href="category.html">Điện Máy </a></span>
                                            <ul>
                                                <li><a href="category.html">Điện máy 1</a></li>
                                                <li><a href="category.html">Điện máy 2</a></li>
                                                <li><a href="category.html">Điện máy 3</a></li>
                                                <li><a href="category.html">Xem Thêm →</a></li>
                                            </ul>
                                        </li> 
                                        <li class="menuCol">
                                            <span><a href="category.html">Điện Máy </a></span>
                                            <ul>
                                                <li><a href="category.html">Điện máy 1</a></li>
                                                <li><a href="category.html">Điện máy 2</a></li>
                                                <li><a href="category.html">Điện máy 3</a></li>
                                                <li><a href="category.html">Xem Thêm →</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li><a href="category.html">Sports & Outdoors </a></li>
                            <li><a href="category.html">Apparel </a></li>
                            <li><a href="category.html">Books </a></li>
                            <li><a href="category.html">Movies & TV </a></li>
                            <li><a href="category.html">Movies & TV </a></li>   
                        </ul>
                    </div>

                    <div class="rightBlock">
                        <a href="#"><i class="fa fa-shopping-cart"></i> Giỏ hàng.</a>
                    </div>

                    <div class="centerBlock">
                        <div class="form">
                            <input type='text'/>
                            <button title="Search" class="button"><span><span><i class="fa fa-search"></i></span></span></button>
                        </div>
                    </div>


                </div>
            </div>

            <div class="content">
                <?php require_once APPPATH . 'views/' . $view->view . '.php'; ?>
            </div>

            <div class="foot">
                <div class="footWarp wStaticPx">
                    <div class="col">
                        <span class="title">Liên hệ</span>
                        <ul>
                            <li><a href="#">Link liên hệ 1</a></li>
                            <li><a href="#">Link liên hệ 1</a></li>
                            <li><a href="#">Link liên hệ 1</a></li>
                            <li><a href="#">Link liên hệ 1</a></li>
                            <li><a href="#">Link liên hệ 1</a></li>
                        </ul>
                    </div>
                    <div class="col">
                        <span class="title">Liên hệ</span>
                        <ul>
                            <li><a href="#">Link liên hệ 1</a></li>
                            <li><a href="#">Link liên hệ 1</a></li>
                            <li><a href="#">Link liên hệ 1</a></li>
                            <li><a href="#">Link liên hệ 1</a></li>
                            <li><a href="#">Link liên hệ 1</a></li>
                        </ul>
                    </div>
                    <div class="col">
                        <span class="title">Liên hệ</span>
                        <ul>
                            <li><a href="#">Link liên hệ 1</a></li>
                            <li><a href="#">Link liên hệ 1</a></li>
                            <li><a href="#">Link liên hệ 1</a></li>
                            <li><a href="#">Link liên hệ 1</a></li>
                            <li><a href="#">Link liên hệ 1</a></li>
                        </ul>
                    </div>
                    <div class="col pay">
                        <span class="title">Chấp nhận thanh toán</span>
                        <ul>
                            <li><a href="#"><img src="/images/payment.png"></a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <script>
            var bxBannerslider;
            $(document).ready(function() {

                bxBannerslider = $('.bxBannerslider').bxSlider({
                    minSlides: 1,
                    maxSlides: 1,
                    moveSlides: 0,
                    slideWidth: 0,
                });


                var currentHeadextend;
                $('.headerButtonList li').click(function(e) {
                    $('.headerButtonList li .accessPannel').hide('fast');
                    $(this).find('.accessPannel').toggle('fast');
                });

                $(document).on('click', '.form button', function(e) {
                    window.location.href = "search.html";
                });

            });
            $(window).resize(function(e) {
                bxBannerslider.reloadSlider();
            });



//suggest swicth;
            var currentItem = null;
            $(document).on('click', '.step2', function() {
                stepSuggestClickFunction($('.step2'));
            });
            $(document).on('click', '.step1', function() {
                stepSuggestClickFunction($('.step1'));
            });
            $(document).on('click', '.step3', function() {
                stepSuggestClickFunction($('.step3'));
            });

            function stepSuggestClickFunction(item) {
                var targetItemId = $(item).attr('id');
                if (targetItemId == $(currentItem).attr('id')) {
                    $('div[anchor=' + $(currentItem).attr('id') + ']').hide();//id;
                    $('.banner').show();
                    $(currentItem).find('.iconMapping').hide();
                    currentItem = null;
                } else {
                    //hide current slide;
                    if (currentItem != null) {
                        $('div[anchor=' + $(currentItem).attr('id') + ']').hide();
                        $(currentItem).find('.iconMapping').hide();
                    }
                    //show target item
                    $('div[anchor=' + targetItemId + ']').show();
                    $('.banner').hide();
                    $(item).find('.iconMapping').show();
                    currentItem = item;
                }
                changeBackgroudColor(currentItem);
            }

            function changeBackgroudColor(item) {
                if (item == null) {
                    return;
                }
                var color = '#CCC';
                var id = $(item).attr('id');
                var backgroundImage = '';
                switch (id) {
                    case 'step1':
                        color = "#0060AF";
                        backgroundImage = "bg1.gif";
                        break;
                    case 'step2':
                        color = "#84BB39";
                        backgroundImage = "bg2.gif";
                        break;
                    case 'step3':
                        color = "#E15E34";
                        backgroundImage = "bg3.gif";
                        break;
                }
                $('.suggetConatinerDetails').css('background', color);
                $('.content .suggestContainer').css('background-image', 'url("/images/' + backgroundImage + '")');
            }


        </script>
    </body>
</html>