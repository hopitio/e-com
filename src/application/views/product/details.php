<?php
defined('BASEPATH') or die('no direct script access allowed');

/* @var $product ProductFixedDomain */
$images = array();
foreach ($product->getImages('baseImage') as $attr)
{
    $images[] = (string) $attr->url;
}
?>
<div id="product-details-ctrl" ng-controller="productDetailsCtrl">
    <div class="lynx_productHeadContainer lynx_staticWidth">
        <div class="lynx_productImageContainer lynx_productHead">
            <div class="lynx_productImageHead">
                <div class="lynx_star" ><img src="/images/star.png"></div>
                <div class="lynx_title" ><?php echo $product->getName() ?>  </div>
                <div class="lynx_pin" >
                    <?php if ($product->countPin): ?>
                        <span> <?php echo $product->countPin ?> PIN</span>
                    <?php endif; ?>
                    <span class="lynx_pinIcon"><img src="/images/pin.png" > </span>
                </div>
            </div>
            <div class="lynx_imageList">
                <img ng-repeat="imageURL in productImages" src="{{imageURL}}" alt="product thumbnail #{{$index}}" 
                     ng-class="{lynx_selectedImage: isImageSelected($index)}" ng-click="selectImage($index)">
            </div>
            <div class="lynx_image">
                <img src="{{productImages[selectedImage]}}"/>
            </div>
        </div>
        <form class="lynx_productChoicePannel lynx_productHead" method="post" id="frm-main">
            <input type="hidden" name="hdn_product" id="hdn_product" value="<?php echo $product->id ?>">
            <div class="lynx_productName"> <?php echo $product->getName()->getTrueValue() ?> </div>
            <div class="lynx_productPrice"> <?php echo $product->getPriceMoney(User::getCurrentUser()->getCurrency()) ?> </div>
            <div class="lynx_productShipping"> Ships Free ! </div>
    <!--        <div class="lynx_productChocie lynx_cbxChoie"> <select class="form-control"><option>White</option></select> </div>
            <div class="lynx_productChocie lynx_cbxChoie"> <select class="form-control"><option>White</option></select> </div>
            <div class="lynx_productChocie lynx_cbxChoie"> <select class="form-control"><option>White</option></select> </div>-->
            <div class="lynx_productQuantity">
                <span class="lynx_quantityLabel">Quantity</span>
                <span class="lynx_productQuantityInput">
                    <select name="sel_qty" id="sel_qty"  class="lynx_productChocie lynx_cbxChoie">
                        <?php foreach (range(1, 30) as $int): ?>
                            <option value="<?php echo $int ?>"><?php echo $int ?></option>
                        <?php endforeach; ?>
                    </select>
                </span>
            </div>
            <div class="lynx_productButtonBuy"> 
                <input type="button" name="buynow" value="BUY NOW" class="lynx_blueButton form-control submit" 
                       data-action="<?php echo base_url('order/shipping') ?>">
            </div>
            <div class="lynx_productButtonAddTo"> 
                <span class="lynx_actionTitle">Add to : </span>
                <div class="row">
                    <div style="width:42%;float:left;margin-left: 15px;">
                        <input type="button" name="addToCart" value="CART" class="lynx_blueButton form-control submit" 
                               data-action="<?php echo base_url('cart/addToCart') ?>">
                    </div>
                    <div style="width:42%;float:left;margin-left:15px;">
                        <input type="button" name="addToWishlist" value="WISHLIST" 
                               class="lynx_blueButton form-control submit" data-action="<?php echo base_url('wishlist/addToWishlist') ?>">
                    </div>
                </div>
            </div>
            <div class="lynx_productShare"> 
                <span class="lynx_share">Share: </span>
                <span class="lynx_shareFace" ng-click="shareFacbook()">&nbsp;</span>
                <span class="lynx_shareTiwster">&nbsp;</span>
                <span class="lynx_sharePlumber">&nbsp;</span>
                <span class="lynx_shareMail">&nbsp;</span>
            </div>
        </form>
    </div>
    <div class="lynx_listProducts tab">
        <ul class="lynx_head">
            <li class="active"><a href="#tab-description">DESCRIPTION</a></li>
            <li><a href="#tab-2">PRO DETAILS</a></li>
            <li><a href="#tab-3">WARRANTY & SUPPORT</a></li>
        </ul>
        <div id="tab-description" class="lynx_itemConatiner lynx_productDetailDescription">
            <?php echo $product->getDescription() ?>
        </div>
    </div>

    <div class="lynx_hotProducts">
        <div class="lynx_hotSildeButton lynx_left">
        </div>
        <div class="lynx_hotSildeButton lynx_right">
        </div>
        <div class="lynx_slideItemsContainer">
            <div class="lynx_head" >
                <h3>Related Products</h3>
            </div>
            <div class="lynx_listItem">
                <div class="lynx_item" ng-repeat="product in relatedProducts" product="product" 
                     ng-class="{lynx_slideFirst: !$index, lynx_slideLast: $index == relatedProducts.length - 1}"></div>
            </div>
        </div>
    </div>

    <div class="lynx_facebookReview">
        <div class="fb-comments" data-width="1200" data-href="<?php echo Common::curPageURL(); ?>" data-numposts="10" data-colorscheme="light">

        </div>
    </div>

</div><!--ng-controller -->
<script>
    var scriptData = {
        images: <?php echo json_encode($images) ?>,
        productID: <?php echo $product->id ?>,
        relatedURL: '<?php echo base_url('product/related_products_service') ?>/'
    };
</script>
<script>
    function initTab(selector) {
        
        $(selector).each(function() {
            var $container = $(this);
            $('.lynx_head a', $container).click(function(e) {
                e.preventDefault();
                var $this = $(this);
                $this.parent().parent().find('li.active').removeClass('active'); //ul > li
                $this.parent().addClass('active'); //li
                $('.lynx_itemConatiner', $container).hide();
                console.log($this.attr('href'));
                $($this.attr('href')).show();
            });
            $('.lynx_head li.active', $container).find('a').trigger('click');
        });

    }
    initTab('.tab');
</script>