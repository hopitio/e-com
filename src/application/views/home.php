<?php
defined('BASEPATH') or die('No direct script access allowed');
/* @var $materials \ListDomain */
?>
<div class="bannerContainer">
    <div class="banner">
        <div class="bannerWarper">
            <ul class="bxBannerslider">
                <li>
                    <a href="#">
                        <div class="sliderItemContainer">
                            <div class="itemContent">
                                <div class="leftContent">
                                    <img alt="" width="100%" src="/images/Sp-1.png"/>
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
                                    <img alt="" width="100%" src="/images/Sp-1.png"/>
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
        <a href="#"><div class="col" ><img src="/images/sl1.png"/></div></a>
        <a href="#"><div class="col" ><img src="/images/sl2.png"/></div></a>
        <a href="#"><div class="col" ><img src="/images/sl4.png"/></div></a>
        <a href="#"><div class="col" ><img src="/images/sl3.jpg"/></div></a>
        <a href="#"><div class="col" ><img src="/images/sl5.png"/></div></a>
    </div>

    <div class="suggetConatinerDetails" style="display:none;" anchor="step2">
        <a href="#"><div class="col" ><img src="/images/sl6.jpg"/></div></a>
        <a href="#"><div class="col" ><img src="/images/sl7.jpg"/></div></a>
        <a href="#"><div class="col" ><img src="/images/sl8.jpg"/></div></a>
        <a href="#"><div class="col" ><img src="/images/sl3.jpg"/></div></a>
        <a href="#"><div class="col" ><img src="/images/sl5.png"/></div></a>
    </div>

    <div class="suggetConatinerDetails" style="display:none;" anchor="step3">
        <a href="#"><div class="col" ><img src="/images/sl1.png"/></div></a>
        <a href="#"><div class="col" ><img src="/images/sl2.png"/></div></a>
        <a href="#"><div class="col" ><img src="/images/sl8.jpg"/></div></a>
        <a href="#"><div class="col" ><img src="/images/sl3.jpg"/></div></a>
        <a href="#"><div class="col" ><img src="/images/sl7.jpg"/></div></a>
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
            <h3>Nguyên liệu</h3>
            <ul class="cate">
                <?php foreach ($materials as $material): ?>
                    <li><a href="#"><i class="fa  fa-chevron-circle-right"></i><?php echo $material->name ?></a></li>
                <?php endforeach; ?>
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
                <img src="/images/images4.jpg"/>
                <div class="title">Sản phẩm demo </div>
                <div class="des">&nbsp;&nbsp;&nbsp;&nbsp;Sản phẩm demo Sản phẩm demo Sản phẩm demo Sản phẩm demo Sản phẩm demo ...</div>
                <div class="bottom">
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;Gía :</span><span class="prices"> 300,000 VND</span>
                    <button class="button"><span><span>Thêm vào giỏ hàng</span></span> </button><button class="button buttonSilver"><span><span>Chi tiết</span></span> </button>
                </div>
            </div>
            <div class="productItem">
                <img src="/images/images2.jpg"/>
                <div class="title">Sản phẩm demo </div>
                <div class="des">&nbsp;&nbsp;&nbsp;&nbsp;Sản phẩm demo Sản phẩm demo Sản phẩm demo Sản phẩm demo Sản phẩm demo ...</div>
                <div class="bottom">
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;Gía :</span><span class="prices"> 300,000 VND</span>
                    <button class="button"><span><span>Thêm vào giỏ hàng</span></span> </button><button class="button buttonSilver"><span><span>Chi tiết</span></span> </button>
                </div>
            </div>
            <div class="productItem">
                <img src="/images/images2.jpg"/>
                <div class="title">Sản phẩm demo </div>
                <div class="des">&nbsp;&nbsp;&nbsp;&nbsp;Sản phẩm demo Sản phẩm demo Sản phẩm demo Sản phẩm demo Sản phẩm demo ...</div>
                <div class="bottom">
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;Gía :</span><span class="prices"> 300,000 VND</span>
                    <button class="button"><span><span>Thêm vào giỏ hàng</span></span> </button><button class="button buttonSilver"><span><span>Chi tiết</span></span> </button>
                </div>
            </div>

            <div class="productItem">
                <img src="/images/images3.jpg"/>
                <div class="title">Sản phẩm demo </div>
                <div class="des">&nbsp;&nbsp;&nbsp;&nbsp;Sản phẩm demo Sản phẩm demo Sản phẩm demo Sản phẩm demo Sản phẩm demo ...</div>
                <div class="bottom">
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;Gía :</span><span class="prices"> 300,000 VND</span>
                    <button class="button"><span><span>Thêm vào giỏ hàng</span></span> </button><button class="button buttonSilver"><span><span>Chi tiết</span></span> </button>
                </div>
            </div>
            <div class="productItem">
                <img src="/images/images2.jpg"/>
                <div class="title">Sản phẩm demo </div>
                <div class="des">&nbsp;&nbsp;&nbsp;&nbsp;Sản phẩm demo Sản phẩm demo Sản phẩm demo Sản phẩm demo Sản phẩm demo ...</div>
                <div class="bottom">
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;Gía :</span><span class="prices"> 300,000 VND</span>
                    <button class="button"><span><span>Thêm vào giỏ hàng</span></span> </button><button class="button buttonSilver"><span><span>Chi tiết</span></span> </button>
                </div>
            </div>
            <div class="productItem">
                <img src="/images/images2.jpg"/>
                <div class="title">Sản phẩm demo </div>
                <div class="des">&nbsp;&nbsp;&nbsp;&nbsp;Sản phẩm demo Sản phẩm demo Sản phẩm demo Sản phẩm demo Sản phẩm demo ...</div>
                <div class="bottom">
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;Gía :</span><span class="prices"> 300,000 VND</span>
                    <button class="button"><span><span>Thêm vào giỏ hàng</span></span> </button><button class="button buttonSilver"><span><span>Chi tiết</span></span> </button>
                </div>
            </div>
            <!-- <div class="rowContentCol"> -->
            <div class="productItem">
                <img src="/images/images.jpg"/>
                <div class="title">Sản phẩm demo </div>
                <div class="des">&nbsp;&nbsp;&nbsp;&nbsp;Sản phẩm demo Sản phẩm demo Sản phẩm demo Sản phẩm demo Sản phẩm demo ...</div>
                <div class="bottom">
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;Gía :</span><span class="prices"> 300,000 VND</span>
                    <button class="button"><span><span>Thêm vào giỏ hàng</span></span> </button><button class="button buttonSilver"><span><span>Chi tiết</span></span> </button>
                </div>
            </div>
            <div class="productItem">
                <img src="/images/images4.jpg"/>
                <div class="title">Sản phẩm demo </div>
                <div class="des">&nbsp;&nbsp;&nbsp;&nbsp;Sản phẩm demo Sản phẩm demo Sản phẩm demo Sản phẩm demo Sản phẩm demo ...</div>
                <div class="bottom">
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;Gía :</span><span class="prices"> 300,000 VND</span>
                    <button class="button"><span><span>Thêm vào giỏ hàng</span></span> </button><button class="button buttonSilver"><span><span>Chi tiết</span></span> </button>
                </div>
            </div>
            <div class="productItem">
                <img src="/images/images3.jpg"/>
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