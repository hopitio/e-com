<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html ng-app="lynx">
    <head>
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
        
        
        <script type='text/javascript' src="/js/jquery-1.11.0.min.js"></script>	
        <script type='text/javascript' src="/js/angular.min.js"></script>
        <script type='text/javascript' src="/js/angular-route.min.js"></script>
        <script type='text/javascript' src="/js/ui-bootstrap-tpls-0.10.0.min.js"></script>
        <script type='text/javascript' src="/bootstrap-3.1.1-dist/js/bootstrap.min.js"></script>
        <script type='text/javascript' src="/js/app.js"></script>
        <script type='text/javascript' src="/js/filters.js"></script>
        <script type='text/javascript' src="/js/directives.js"></script>

        <script src="/js/main.js"></script>
        <script src="/js/controller/PortalHeadController.js"></script>
        <script src="/js/services/PortalCommonServiceClient.js"></script>
        <?php
        //Thêm các js riêng biệt
        foreach ($view->javascript as $jsItem)
        {
            echo '<script src="'. $jsItem .'"></script>';
        }
        ?>
        
        <?php 
        //Thêm các css riêng biệt
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
    <div class="lynx_container">
        <div class="lynx_head" ng-controller="PortalHeadController">
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
            <div class="lynx_headMenu">
                <div class="lynx_menuWarp lynx_staticWidth">
                </div>
            </div>
        </div>
    <?php require_once APPPATH.'views/'.$view->view.'.php';?>
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
                            <span><?php echo $language['layout']->lblMakeMoneyWithUs;?></span>
                            <li> <?php echo $language['layout']->lblSell;?> </li>
                            <li> <?php echo $language['layout']->lblAdve;?> </li>
                        </ul>
                        <ul>
    	                    <span><?php echo $language['layout']->lblCustomerService;?></span>
    	                    <li> <?php echo $language['layout']->lblFAQs;?> </li>
    	                    <li> <?php echo $language['layout']->lblContact;?> </li>
    	                    <li> <?php echo $language['layout']->lblShippingvsReturn;?> </li>
    	                    <li> <?php echo $language['layout']->lblSafeShopping;?>  </li>
    	                    <li> <?php echo $language['layout']->lblGuaranteeSecureShopping;?>    </li>
                        </ul>
                    </div>
                    <div class="lynx_cell">
    	                <ul>
    	                    <span><?php echo $language['layout']->lblAboutSfriendly;?></span>
    	                    <li><?php echo $language['layout']->lblAbout;?></li>
    	                    <li><?php echo $language['layout']->lblJobs;?></li>
    	                    <li><?php echo $language['layout']->lblCustomerTestimonials;?></li>
    	                    <li><?php echo $language['layout']->lblAssociatesProgram;?></li>
    	                    <li><?php echo $language['layout']->lblGlossaryofTerms;?></li>
    	                    <li><?php echo $language['layout']->lblDailyShowDigest;?></li>
    	                </ul>
    	                <ul>
    	                    <span><?php echo $language['layout']->lblFeedback;?></span>
    	                    <li><?php echo $language['layout']->lblHowLikeOurWebsite;?></li>
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
    </body>
</html>