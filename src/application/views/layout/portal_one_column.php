<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=320; initial-scale=1; maximum-scale=1; minimum-scale=1 user-scalable=no" />
        <title><?php echo isset($language[$view->view]) ? $language[$view->view]->title: '';?></title>
        <script src="/js/jquery-1.11.0.min.js"></script>
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        
        <!-- perfect srollbar -->
        <script src="/js/perfect-scrollbar.with-mousewheel.min.js"></script>
        <link href="/style/perfect-scrollbar.min.css" rel="stylesheet" />
        
        <!-- bxSlider-->
        <script src="/js/jquery.bxslider.js"></script>
        <link href="/style/jquery.bxslider.css" rel="stylesheet" />
        
        <!-- Jquery UI -->
        <script src="/js/jquery-ui-1.10.4.custom/js/jquery-ui-1.10.4.custom.min.js"></script>
        <link rel="stylesheet" type="text/css" href="/js/jquery-ui-1.10.4.custom/css/ui-lightness/jquery-ui-1.10.4.custom.min.css" media="all">
        
        <!-- Css -->
        <link rel="stylesheet" type="text/css" href="/style/main.css" media="all">
        
        
        <script src="/js/main.js"></script>
        <?php
        //Thêm các js riêng biệt
        foreach ($view->javascript as $jsItem)
        {
            echo '<script src="'. $jsItem .'"></script>';
        }
        ?>
        
        <?php 
        //Thêm các js riêng biệt
            foreach ($view->css as $item)
            {
                echo '<link rel="stylesheet" type="text/css" href="'.$item.'" media="all">';
            }
        ?>
        <script type="text/javascript">
           function Config(){
               this.facebookApplicationKey  = '<?php echo get_instance()->config->item('facebook_app_id');?>';
           }
        </script>
    </head>
    <body>
        <div id="wrap">
         <div class="topbar">
            <div class="container wStaticPx">
                <ul class="headerButtonList">
                 <li class="myAcc">
                   <a href="#">My Account</a>
                   <ul class="accessPannel">
                    <li><a href="#">Đăng nhập</a></li>
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

        <div class="content">
            <?php require_once APPPATH.'views/'.$view->view.'.php';?>
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
                        <li><a href="#"><img src="images/payment.png"></a></li>
                    </ul>
                </div>
            </div>
        </div>
        
        </div>
    </body>
</html>