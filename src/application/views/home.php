<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=320; initial-scale=1; maximum-scale=1; minimum-scale=1 user-scalable=no" />
<title>Project E Mockup UI</title>
<script src="js/jquery-1.11.0.min.js"></script>
<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

 
<!-- perfect srollbar -->
<script src="js/perfect-scrollbar.with-mousewheel.min.js"></script>
<link href="style/perfect-scrollbar.min.css" rel="stylesheet" />

<!-- bxSlider-->
<script src="js/jquery.bxslider.js"></script>
<link href="style/jquery.bxslider.css" rel="stylesheet" />

<!-- Jquery UI -->
<script src="js/jquery-ui-1.10.4.custom/js/jquery-ui-1.10.4.custom.min.js"></script>
<link rel="stylesheet" type="text/css" href="js/jquery-ui-1.10.4.custom/css/ui-lightness/jquery-ui-1.10.4.custom.min.css" media="all">

<!-- Css -->
<link rel="stylesheet" type="text/css" href="style/main.css" media="all">
<link rel="stylesheet" type="text/css" href="style/homePage.css" media="all">

<!-- responsive design -->
<link rel="stylesheet" type="text/css" href="style/main-responsive.css" media="all">
<link rel="stylesheet" type="text/css" href="style/homePage-responsive.css" media="all">

<script>
var bxBannerslider;
$(document).ready(function(){

    bxBannerslider = $('.bxBannerslider').bxSlider({
        minSlides: 1,
        maxSlides: 1,
        moveSlides: 0,
        slideWidth: 0,
    });

    
    var currentHeadextend;
    $('.headerButtonList li').click(function(e){
        $('.headerButtonList li .accessPannel').hide('fast');
        $(this).find('.accessPannel').toggle('fast');
    });
    
    $(document).on('click','.form button',function(e){
        window.location.href="search.html";
    });
    
  });
$(window).resize(function(e){
    bxBannerslider.reloadSlider();
});



//suggest swicth;
var currentItem = null;
$(document).on('click','.step2',function(){
    stepSuggestClickFunction($('.step2'));
});
$(document).on('click','.step1',function(){
    stepSuggestClickFunction($('.step1'));
});
$(document).on('click','.step3',function(){
    stepSuggestClickFunction($('.step3'));
});

function stepSuggestClickFunction(item){
    var targetItemId = $(item).attr('id');
    if(targetItemId == $(currentItem).attr('id')){
        $('div[anchor='+$(currentItem).attr('id')+']').hide();//id;
        $('.banner').show();
        $(currentItem).find('.iconMapping').hide();
        currentItem = null;
    }else{
        //hide current slide;
         if(currentItem != null){
            $('div[anchor='+$(currentItem).attr('id')+']').hide();
            $(currentItem).find('.iconMapping').hide();
         }
        //show target item
        $('div[anchor='+targetItemId+']').show();
        $('.banner').hide();
        $(item).find('.iconMapping').show();
        currentItem = item;
    }
    changeBackgroudColor(currentItem);
}

function changeBackgroudColor(item){
    if(item == null) {return;}
    var color = '#CCC';
    var id = $(item).attr('id');
    var backgroundImage ='';
    switch(id){
    case 'step1':
        color = "#0060AF";
        backgroundImage= "bg1.gif";
        break;
    case 'step2':
        color = "#84BB39";
        backgroundImage= "bg2.gif";
        break;
    case 'step3':
        color = "#E15E34";
        backgroundImage= "bg3.gif";
        break;
    }
    $('.suggetConatinerDetails').css('background',color);
    $('.content .suggestContainer').css('background-image','url("images/'+backgroundImage+'")');
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
        <div class="header">
            <div class="container wStaticPx">
                <div class="logo"><img src="images/CGHUB_50x50_botCG_gloss.gif"/></div>
                <div class="menu" >
                    <div class="menuExt">
                        <div class="logo"><img src="images/CGHUB_50x50_botCG_gloss.gif"/></div>
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
            <div class="bannerContainer">
                <div class="banner">
                    <div class="bannerWarper">
                    <ul class="bxBannerslider">
                      <li>
                       <a href="#">
                           <div class="sliderItemContainer">
                               <div class="itemContent">
                                   <div class="leftContent">
                                       <img alt="" width="100%" src="images/Sp-1.png"/>
                                   </div>
                                    <div class="rightContent">
                                        <div class="rightContentTitle">Sản phẩm đang khuyến mại</div>
                                        <div class="rightContentDes">
                                            <span class="DesTitle">Sản phẩm khuyến mại</span>
                                            <span class="Des">Sản phẩm khuyến mại Sản phẩm khuyến mại Sản phẩm khuyến mại Sản phẩm khuyến mại Sản phẩm khuyến mại</span>
                                        </div>
                                   </div>
                               </div>
                           </div>
                        </a>
                      </li>
                      <li>
                      <a href="#">
                           <div class="sliderItemContainer">   
                               <div class="itemContent">
                                   <div class="leftContent">
                                       <img alt="" width="100%" src="images/Sp-1.png"/>
                                   </div>
                                    <div class="rightContent">
                                        <div class="rightContentTitle">Sản phẩm đang khuyến mại</div>
                                        <div class="rightContentDes">
                                            <span class="DesTitle">Sản phẩm khuyến mại</span>
                                            <span class="Des">Sản phẩm khuyến mại Sản phẩm khuyến mại Sản phẩm khuyến mại Sản phẩm khuyến mại Sản phẩm khuyến mại</span>
                                        </div>
                                   </div>
                               </div>
                           </div>
                      </a>
                      </li>
                    </ul>
                    </div>
                </div>
                
               <div class="suggetConatinerDetails" style="display:none;" anchor="step1">
                    <a href="#"><div class="col" ><img src="images/sl1.png"/></div></a>
                    <a href="#"><div class="col" ><img src="images/sl2.png"/></div></a>
                    <a href="#"><div class="col" ><img src="images/sl4.png"/></div></a>
                    <a href="#"><div class="col" ><img src="images/sl3.jpg"/></div></a>
                    <a href="#"><div class="col" ><img src="images/sl5.png"/></div></a>
                </div>
                
                <div class="suggetConatinerDetails" style="display:none;" anchor="step2">
                    <a href="#"><div class="col" ><img src="images/sl6.jpg"/></div></a>
                    <a href="#"><div class="col" ><img src="images/sl7.jpg"/></div></a>
                    <a href="#"><div class="col" ><img src="images/sl8.jpg"/></div></a>
                    <a href="#"><div class="col" ><img src="images/sl3.jpg"/></div></a>
                    <a href="#"><div class="col" ><img src="images/sl5.png"/></div></a>
                </div>
                
                <div class="suggetConatinerDetails" style="display:none;" anchor="step3">
                    <a href="#"><div class="col" ><img src="images/sl1.png"/></div></a>
                    <a href="#"><div class="col" ><img src="images/sl2.png"/></div></a>
                    <a href="#"><div class="col" ><img src="images/sl8.jpg"/></div></a>
                    <a href="#"><div class="col" ><img src="images/sl3.jpg"/></div></a>
                    <a href="#"><div class="col" ><img src="images/sl7.jpg"/></div></a>
                </div>
                
                <div class="suggestContainer">
                    <ul class="suggestWarp wStaticPx">
                        <li class="step1" id="step1"> <div class="iconMapping" style="display:none;"></div> <span>Chọn ngày lễ</span></li>
                        <li class="step2" id="step2"> <div class="iconMapping" style="display:none;"></div><span>Chọn đối tượng</span></li>
                        <li class="step3" id="step3"> <div class="iconMapping" style="display:none;"></div><span>Chọn Quà</span></li>
                    </ul>
                </div>
            </div>
            <div class="contentWarp wStaticPx">
                  <div class="leftContainer">
                    <div class="menu" >
                        <h3>Danh Mục</h3>
                        <ul class="cate">
                            <li><a href="#"><i class="fa  fa-chevron-circle-right"></i>ELECTRONICS</a></li>
                            <li><a href="#"><i class="fa  fa-chevron-circle-right"></i>Sports & Outdoors </a></li>
                            <li><a href="#"><i class="fa  fa-chevron-circle-right"></i>Apparel </a></li>
                            <li><a href="#"><i class="fa  fa-chevron-circle-right"></i>Books</a></li>
                            <li><a href="#"><i class="fa  fa-chevron-circle-right"></i>Movies & TV </a></li>
                            <li><a href="#"><i class="fa  fa-chevron-circle-right"></i>ELECTRONICS </a></li>
                            <li><a href="#"><i class="fa  fa-chevron-circle-right"></i>Sports & Outdoors </a></li>
                            <li><a href="#"><i class="fa  fa-chevron-circle-right"></i>Apparel</a></li>
                            <li><a href="#"><i class="fa  fa-chevron-circle-right"></i>Books </a></li>
                            <li><a href="#"><i class="fa  fa-chevron-circle-right"></i>Movies & TV </a></li>
                        </ul>
                     </div>
                     
                     <div class="menu" >
                        <h3>Danh Mục</h3>
                        <ul class="cate">
                            <li><a href="#"><i class="fa  fa-chevron-circle-right"></i>ELECTRONICS</a></li>
                            <li><a href="#"><i class="fa  fa-chevron-circle-right"></i>Sports & Outdoors </a></li>
                            <li><a href="#"><i class="fa  fa-chevron-circle-right"></i>Apparel </a></li>
                            <li><a href="#"><i class="fa  fa-chevron-circle-right"></i>Books</a></li>
                            <li><a href="#"><i class="fa  fa-chevron-circle-right"></i>Movies & TV </a></li>
                            <li><a href="#"><i class="fa  fa-chevron-circle-right"></i>ELECTRONICS </a></li>
                            <li><a href="#"><i class="fa  fa-chevron-circle-right"></i>Sports & Outdoors </a></li>
                            <li><a href="#"><i class="fa  fa-chevron-circle-right"></i>Apparel</a></li>
                            <li><a href="#"><i class="fa  fa-chevron-circle-right"></i>Books </a></li>
                            <li><a href="#"><i class="fa  fa-chevron-circle-right"></i>Movies & TV </a></li>
                        </ul>
                     </div>
                     
                     <div class="menu" >
                        <h3>Danh Mục</h3>
                        <ul class="cate">
                            <li><a href="#"><i class="fa  fa-chevron-circle-right"></i>ELECTRONICS</a></li>
                            <li><a href="#"><i class="fa  fa-chevron-circle-right"></i>Sports & Outdoors </a></li>
                            <li><a href="#"><i class="fa  fa-chevron-circle-right"></i>Apparel </a></li>
                            <li><a href="#"><i class="fa  fa-chevron-circle-right"></i>Books</a></li>
                            <li><a href="#"><i class="fa  fa-chevron-circle-right"></i>Movies & TV </a></li>
                            <li><a href="#"><i class="fa  fa-chevron-circle-right"></i>ELECTRONICS </a></li>
                            <li><a href="#"><i class="fa  fa-chevron-circle-right"></i>Sports & Outdoors </a></li>
                            <li><a href="#"><i class="fa  fa-chevron-circle-right"></i>Apparel</a></li>
                            <li><a href="#"><i class="fa  fa-chevron-circle-right"></i>Books </a></li>
                            <li><a href="#"><i class="fa  fa-chevron-circle-right"></i>Movies & TV </a></li>
                        </ul>
                     </div>
                  </div>
                     <div class="rowContent">
                        <div class="boxHeader boxNew">
                            <span>Sản phẩm mới</span>
                        </div>
                        <div class="container">
                        
                         <div class="productItem">
                            <img src="images/images4.jpg"/>
                            <div class="title">Sản phẩm demo </div>
                            <div class="des">&nbsp;&nbsp;&nbsp;&nbsp;Sản phẩm demo Sản phẩm demo Sản phẩm demo Sản phẩm demo Sản phẩm demo ...</div>
                            <div class="bottom">
                                <span>&nbsp;&nbsp;&nbsp;&nbsp;Gía :</span><span class="prices"> 300,000 VND</span>
                                <button class="button"><span><span>Thêm vào giỏ hàng</span></span> </button><button class="button buttonSilver"><span><span>Chi tiết</span></span> </button>
                            </div>
                         </div>
                         <div class="productItem">
                             <img src="images/images2.jpg"/>
                             <div class="title">Sản phẩm demo </div>
                             <div class="des">&nbsp;&nbsp;&nbsp;&nbsp;Sản phẩm demo Sản phẩm demo Sản phẩm demo Sản phẩm demo Sản phẩm demo ...</div>
                             <div class="bottom">
                                 <span>&nbsp;&nbsp;&nbsp;&nbsp;Gía :</span><span class="prices"> 300,000 VND</span>
                                 <button class="button"><span><span>Thêm vào giỏ hàng</span></span> </button><button class="button buttonSilver"><span><span>Chi tiết</span></span> </button>
                             </div>
                         </div>
                         <div class="productItem">
                             <img src="images/images2.jpg"/>
                             <div class="title">Sản phẩm demo </div>
                             <div class="des">&nbsp;&nbsp;&nbsp;&nbsp;Sản phẩm demo Sản phẩm demo Sản phẩm demo Sản phẩm demo Sản phẩm demo ...</div>
                             <div class="bottom">
                                 <span>&nbsp;&nbsp;&nbsp;&nbsp;Gía :</span><span class="prices"> 300,000 VND</span>
                                 <button class="button"><span><span>Thêm vào giỏ hàng</span></span> </button><button class="button buttonSilver"><span><span>Chi tiết</span></span> </button>
                             </div>
                         </div>

                        <div class="productItem">
                            <img src="images/images3.jpg"/>
                            <div class="title">Sản phẩm demo </div>
                            <div class="des">&nbsp;&nbsp;&nbsp;&nbsp;Sản phẩm demo Sản phẩm demo Sản phẩm demo Sản phẩm demo Sản phẩm demo ...</div>
                            <div class="bottom">
                                <span>&nbsp;&nbsp;&nbsp;&nbsp;Gía :</span><span class="prices"> 300,000 VND</span>
                                <button class="button"><span><span>Thêm vào giỏ hàng</span></span> </button><button class="button buttonSilver"><span><span>Chi tiết</span></span> </button>
                            </div>
                         </div>
                        <div class="productItem">
                             <img src="images/images2.jpg"/>
                             <div class="title">Sản phẩm demo </div>
                             <div class="des">&nbsp;&nbsp;&nbsp;&nbsp;Sản phẩm demo Sản phẩm demo Sản phẩm demo Sản phẩm demo Sản phẩm demo ...</div>
                             <div class="bottom">
                                 <span>&nbsp;&nbsp;&nbsp;&nbsp;Gía :</span><span class="prices"> 300,000 VND</span>
                                 <button class="button"><span><span>Thêm vào giỏ hàng</span></span> </button><button class="button buttonSilver"><span><span>Chi tiết</span></span> </button>
                             </div>
                         </div>
                        <div class="productItem">
                             <img src="images/images2.jpg"/>
                             <div class="title">Sản phẩm demo </div>
                             <div class="des">&nbsp;&nbsp;&nbsp;&nbsp;Sản phẩm demo Sản phẩm demo Sản phẩm demo Sản phẩm demo Sản phẩm demo ...</div>
                             <div class="bottom">
                                 <span>&nbsp;&nbsp;&nbsp;&nbsp;Gía :</span><span class="prices"> 300,000 VND</span>
                                 <button class="button"><span><span>Thêm vào giỏ hàng</span></span> </button><button class="button buttonSilver"><span><span>Chi tiết</span></span> </button>
                             </div>
                         </div>
  <!-- <div class="rowContentCol"> -->
                        <div class="productItem">
                            <img src="images/images.jpg"/>
                            <div class="title">Sản phẩm demo </div>
                            <div class="des">&nbsp;&nbsp;&nbsp;&nbsp;Sản phẩm demo Sản phẩm demo Sản phẩm demo Sản phẩm demo Sản phẩm demo ...</div>
                            <div class="bottom">
                                <span>&nbsp;&nbsp;&nbsp;&nbsp;Gía :</span><span class="prices"> 300,000 VND</span>
                                <button class="button"><span><span>Thêm vào giỏ hàng</span></span> </button><button class="button buttonSilver"><span><span>Chi tiết</span></span> </button>
                            </div>
                         </div>
                        <div class="productItem">
                             <img src="images/images4.jpg"/>
                             <div class="title">Sản phẩm demo </div>
                             <div class="des">&nbsp;&nbsp;&nbsp;&nbsp;Sản phẩm demo Sản phẩm demo Sản phẩm demo Sản phẩm demo Sản phẩm demo ...</div>
                             <div class="bottom">
                                 <span>&nbsp;&nbsp;&nbsp;&nbsp;Gía :</span><span class="prices"> 300,000 VND</span>
                                 <button class="button"><span><span>Thêm vào giỏ hàng</span></span> </button><button class="button buttonSilver"><span><span>Chi tiết</span></span> </button>
                             </div>
                         </div>
                        <div class="productItem">
                             <img src="images/images3.jpg"/>
                             <div class="title">Sản phẩm demo </div>
                             <div class="des">&nbsp;&nbsp;&nbsp;&nbsp;Sản phẩm demo Sản phẩm demo Sản phẩm demo Sản phẩm demo Sản phẩm demo ...</div>
                             <div class="bottom">
                                 <span>&nbsp;&nbsp;&nbsp;&nbsp;Gía :</span><span class="prices"> 300,000 VND</span>
                                 <button class="button"><span><span>Thêm vào giỏ hàng</span></span> </button><button class="button buttonSilver"><span><span>Chi tiết</span></span> </button>
                             </div>
                         </div>
                         </div>
                    </div>
                    
            </div>
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
                        <li><a href="#"><img  src="images/payment.png"/></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
</html>