<?php
defined('BASEPATH') or die('No direct script access allowed');
?>
<div id="home-ctrl" ng-controller="HomeCtrl">
    <div class="lynx_banner">
        <div class="lynx_slide">
        </div>
        <div class="lynx_suggest">
            <div class="lynx_suggetWarp lynx_staticWidth">
                <div class="lynx_suggestItem lynx_step1"></div>
                <div class="lynx_suggestItem lynx_step2"></div>
                <div class="lynx_suggestItem lynx_step3"></div>
            </div>
        </div>
    </div>
    <div class="lynx_hotProducts">
        <div class="lynx_hotSildeButton lynx_left">
        </div>
        <div class="lynx_hotItemsContainer">
            <div class="lynx_head">
                <strong>
                    <span ng-repeat="tab in hotItemTabs">
                        <ng ng-if="$index > 0">&nbsp;&nbsp;</ng>
                        <a href="javascript:;" ng-click="setHotTab($index)" ng-class="{
                                    active: isHotTabActive($index)
                                }">{{tab[0]}}</a>&nbsp;&nbsp;
                        <ng ng-if="$index < hotItemTabs.length - 1"><?php echo htmlentities('/') ?></ng>
                    </span>
                </strong>
            </div>
            <div class="lynx_listItem">
                <div class="lynx_item" 
                     ng-repeat="product in hotItemTabs[activeHotTab][2]"
                     ng-class="{lynx_hotFirst: !$index, lynx_hotLast: $index == hotItemTabs[activeHotTab][2].length - 1}">
                    <a href="{{product.url}}" title="{{product.name}}"><img src="{{product.thumbnail}}"></a>
                        <div class="lynx_detailContainer">
                            <div class="lynx_name"><a href="{{product.url}}" title="{{product.name}}">{{product.name}}</a></div>
                            <div class="lynx_price">{{product.priceString}}</div>
                            <div class="lynx_userName">{{product.seller_name}}</div>
                            <!--<div class="lynx_star"><img src="images/star.png" /></div>-->
                            <div class="lynx_view">12471</div>
                        </div>
                    
                </div>
            </div>
        </div>
        <div class="lynx_hotSildeButton lynx_right">
        </div>
    </div>
    <div class="lynx_listProducts">
        <div class="lynx_head">
            <span>SHOPPING MALL</span>
        </div>
        <div class="lynx_navigateLink">
            <a href="#">VIEW ALL >></a>
        </div>
        <div class="lynx_itemConatiner">
            <div class="lynx_item lynx_towCol">
                <a href="#"><img src="images/child-slide-item-demo.png"/></a>
            </div>
            <div class="lynx_item lynx_oneCol">
                <img src="#" />
                <div class="lynx_detailContainer">
                    <div class="lynx_name">Tên sản phẩm Tên sản phẩm</div>
                    <div class="lynx_price">$123,99</div>
                    <div class="lynx_userName">Lê Thanh An </div>
                    <div class="lynx_star"><img src="images/star.png" /></div>
                    <div class="lynx_view">12471</div>
                </div>
            </div>
            <div class="lynx_item lynx_oneCol">
                <img src="#" />
                <div class="lynx_detailContainer">
                    <div class="lynx_name">Tên sản phẩm Tên sản phẩm</div>
                    <div class="lynx_price">$123,99</div>
                    <div class="lynx_userName">Lê Thanh An </div>
                    <div class="lynx_star"><img src="images/star.png" /></div>
                    <div class="lynx_view">12471</div>
                </div>
            </div>
            <div class="lynx_item lynx_oneCol">
                <img src="#" />
                <div class="lynx_detailContainer">
                    <div class="lynx_name">Tên sản phẩm Tên sản phẩm</div>
                    <div class="lynx_price">$123,99</div>
                    <div class="lynx_userName">Lê Thanh An </div>
                    <div class="lynx_star"><img src="images/star.png" /></div>
                    <div class="lynx_view">12471</div>
                </div>
            </div>
            <div class="lynx_item lynx_oneCol">
                <img src="#" />
                <div class="lynx_detailContainer">
                    <div class="lynx_name">Tên sản phẩm Tên sản phẩm</div>
                    <div class="lynx_price">$123,99</div>
                    <div class="lynx_userName">Lê Thanh An </div>
                    <div class="lynx_star"><img src="images/star.png" /></div>
                    <div class="lynx_view">12471</div>
                </div>
            </div>
            <div class="lynx_item lynx_oneCol">
                <img src="#" />
                <div class="lynx_detailContainer">
                    <div class="lynx_name">Tên sản phẩm Tên sản phẩm</div>
                    <div class="lynx_price">$123,99</div>
                    <div class="lynx_userName">Lê Thanh An </div>
                    <div class="lynx_star"><img src="images/star.png" /></div>
                    <div class="lynx_view">12471</div>
                </div>
            </div>
            <div class="lynx_item lynx_oneCol">
                <img src="#" />
                <div class="lynx_detailContainer">
                    <div class="lynx_name">Tên sản phẩm Tên sản phẩm</div>
                    <div class="lynx_price">$123,99</div>
                    <div class="lynx_userName">Lê Thanh An </div>
                    <div class="lynx_star"><img src="images/star.png" /></div>
                    <div class="lynx_view">12471</div>
                </div>
            </div>
        </div>
    </div>
    <div class="lynx_slideGroup">
        <div class="lynx_item first-child"><a href="#"><img src="images/child-slide-item-demo.png" /></a></div>
        <div class="lynx_item"><a href="#"><img src="images/child-slide-item-demo.png" /></a></div>
        <div class="lynx_item last-child"><a href="#"><img src="images/child-slide-item-demo.png" /></a></div>
    </div>
    <div class="lynx_listProducts">
        <div class="lynx_head">
            <span>VIETNAM CULTURE</span>
        </div>
        <div class="lynx_navigateLink">
            <a href="#">VIEW ALL >></a>
        </div>
        <div class="lynx_itemConatiner">
            <div class="lynx_item lynx_oneCol">
                <img src="#" />
                <div class="lynx_detailContainer">
                    <div class="lynx_name">Tên sản phẩm Tên sản phẩm</div>
                    <div class="lynx_price">$123,99</div>
                    <div class="lynx_userName">Lê Thanh An </div>
                    <div class="lynx_star"><img src="images/star.png" /></div>
                    <div class="lynx_view">12471</div>
                </div>
            </div>
            <div class="lynx_item lynx_oneCol">
                <img src="#" />
                <div class="lynx_detailContainer">
                    <div class="lynx_name">Tên sản phẩm Tên sản phẩm</div>
                    <div class="lynx_price">$123,99</div>
                    <div class="lynx_userName">Lê Thanh An </div>
                    <div class="lynx_star"><img src="images/star.png" /></div>
                    <div class="lynx_view">12471</div>
                </div>
            </div>
            <div class="lynx_item lynx_oneCol">
                <img src="#" />
                <div class="lynx_detailContainer">
                    <div class="lynx_name">Tên sản phẩm Tên sản phẩm</div>
                    <div class="lynx_price">$123,99</div>
                    <div class="lynx_userName">Lê Thanh An </div>
                    <div class="lynx_star"><img src="images/star.png" /></div>
                    <div class="lynx_view">12471</div>
                </div>
            </div>
            <div class="lynx_item lynx_oneCol">
                <img src="#" />
                <div class="lynx_detailContainer">
                    <div class="lynx_name">Tên sản phẩm Tên sản phẩm</div>
                    <div class="lynx_price">$123,99</div>
                    <div class="lynx_userName">Lê Thanh An </div>
                    <div class="lynx_star"><img src="images/star.png" /></div>
                    <div class="lynx_view">12471</div>
                </div>
            </div>
            <div class="lynx_item lynx_oneCol">
                <img src="#" />
                <div class="lynx_detailContainer">
                    <div class="lynx_name">Tên sản phẩm Tên sản phẩm</div>
                    <div class="lynx_price">$123,99</div>
                    <div class="lynx_userName">Lê Thanh An </div>
                    <div class="lynx_star"><img src="images/star.png" /></div>
                    <div class="lynx_view">12471</div>
                </div>
            </div>
            <div class="lynx_item lynx_oneCol">
                <img src="#" />
                <div class="lynx_detailContainer">
                    <div class="lynx_name">Tên sản phẩm Tên sản phẩm</div>
                    <div class="lynx_price">$123,99</div>
                    <div class="lynx_userName">Lê Thanh An </div>
                    <div class="lynx_star"><img src="images/star.png" /></div>
                    <div class="lynx_view">12471</div>
                </div>
            </div>
        </div>
    </div>
    <div class="lynx_slideGroup">
        <div class="lynx_item first-child"><a href="#"><img src="images/child-slide-item-demo.png" /></a></div>
        <div class="lynx_item"><a href="#"><img src="images/child-slide-item-demo.png" /></a></div>
        <div class="lynx_item last-child"><a href="#"><img src="images/child-slide-item-demo.png" /></a></div>
    </div>
    <div class="lynx_footer">
        <div class="lynx_content">
            <div class="lynx_col1">
                <img class="lynx_logo" src="images/logo-footer.png"/>
                <span class="lynx_contact">
                    Sfriendly.com /  Sfriendly.vn <br/>
                    Phone: 098 999 999 <br/>
                    Email: sale@sf
                </span>
                <a href="#" class="lynx_share"><img src="images/share-face.png" /></a>
                <a href="#" class="lynx_share"><img src="images/share-tiwwer.png" /></a>
                <a href="#" class="lynx_share"><img src="images/share-google.png" /></a>
                <a href="#" class="lynx_share"><img src="images/share-plumber.png" /></a>
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
                <img src="images/Payment-follow.fw.png"/>
            </div>
        </div>
        <div class="lynx_copyright">
            <div class="lynx_copycontent">
                Copyright © 2014 Sfriendly.com. All rights Reserved
            </div>
        </div>
    </div>
    <div class="lynx_cart">
        <span>CART 0</span>
    </div>
</div><!--homeCtrl-->
<script>
    function scriptData() {
        this.hotItemTabs = [
            ['HOT', '<?php echo site_url('home/hot_service') ?>'],
            ['NEW', '<?php echo site_url('home/new_service') ?>'],
            ['SALE', '<?php echo site_url('home/sale_service') ?>']
        ];
    }
</script>
