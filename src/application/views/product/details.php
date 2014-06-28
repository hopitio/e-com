<?php
defined('BASEPATH') or die('no direct script access allowed');

/* @var $product ProductFixedDomain */
$images = array();
foreach ($product->getImages('baseImage') as $attr)
{
    $images[] = (string) $attr->url;
}
$facebookImages = $product->getImages('facebookImage');
?>
<script>
    $.browser = {};
</script>
<div id="product-details-ctrl" ng-controller="productDetailsCtrl">
    <div class="lynx_productHeadContainer lynx_staticWidth">
        <div class="lynx_productImageContainer lynx_productHead">
            <div class="lynx_productImageHead">
                <div class="lynx_star" ><img src="/images/star.png"></div>
                <div class="lynx_pin">
                    <span class="lynx_pin_number"> <c><?php echo $product->countPin ?></c> Pins</span>
                    <span class="lynx_pinIcon"><img src="/images/pin.png" > </span>
                </div>
                <div class="lynx_title" ><?php echo $product->getName() ?></div>
            </div>
            <div class="clearfix"></div>
            <div class="lynx_imageList">
                <?php $class = 'zoomThumbActive'; ?>
                <?php foreach ($images as $img): ?>
                    <a href="javascript:;" class="<?php echo $class ?>" 
                       rel="{gallery: 'gal1', smallimage: '/thumbnail.php/<?php echo $img ?>/w=480', largeimage: '<?php echo $img ?>'}">
                        <img  src="<?php echo '/thumbnail.php/' . $img . '/w=60' ?>">
                    </a>
                    <?php $class = null ?>
                <?php endforeach; ?>
            </div>
            <div class="lynx_image clearfix" style="position:relative;">
                <a href="<?php echo $images[0] ?>" class="jqzoom" rel='gal1' title="Zoom">
                    <img src="/thumbnail.php/<?php echo $images[0] ?>/w=480"  title="thumbnail" style="width:480px;">
                </a>
            </div>
        </div>
        <form class="lynx_productChoicePannel lynx_productHead" method="get" id="frm-main">
            <input type="hidden" name="hdn_product" id="hdn_product" value="<?php echo $product->id ?>">
            <div class="lynx_productName"> <?php echo $product->seller_name ?> </div>
            <div class="lynx_productPrice"> <?php echo $product->getFinalPriceMoney(User::getCurrentUser()->getCurrency()) ?> </div>
            <div class="lynx_productShipping" style="visibility: hidden;"> <?php echo $language[$view->view]->lblshpping; ?> </div>
    <!--        <div class="lynx_productChocie lynx_cbxChoie"> <select class="form-control"><option>White</option></select> </div>
            <div class="lynx_productChocie lynx_cbxChoie"> <select class="form-control"><option>White</option></select> </div>
            <div class="lynx_productChocie lynx_cbxChoie"> <select class="form-control"><option>White</option></select> </div>-->
            <div class="lynx_productQuantity">
                <span class="lynx_quantityLabel"><?php echo $language[$view->view]->lblQuantity; ?></span>
                <span class="lynx_productQuantityInput">
                    <select name="sel_qty" id="sel_qty"  class="lynx_productChocie lynx_cbxChoie">
                        <?php if ((string) $product->getQuantity()): ?>
                            <?php foreach (range(1, min(array(30, (string) $product->getQuantity()))) as $int): ?>
                                <option value="<?php echo $int ?>"><?php echo $int ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </span>
            </div>
            <div class="lynx_productButtonBuy"> 
                <!-- <input id = "buynow" type="button" name="buynow" value="BUY NOW" class="lynx_blueButton form-control submit" 
                       data-action="<?php //echo base_url('order/shipping')                                       ?>">
                -->
                <input id = "buynow" type="button" disabled name="buynow" value="<?php echo $language[$view->view]->btnBuyNow; ?>" class="lynx_blueButton form-control submit" ></input>
            </div>
            <div class="lynx_productButtonAddTo"> 
                <span class="lynx_actionTitle"><?php echo $language[$view->view]->lblAddTo; ?> : </span>
                <div class="row">
                    <div style="width:42%;float:left;margin-left: 15px;">
                        <?php $disabled = (string) $product->getQuantity() ? '' : 'disabled' ?>
                        <input type="button" name="addToCart" value="<?php echo $language[$view->view]->btnCart; ?>" class="lynx_blueButton form-control submit" 
                               data-action="<?php echo base_url('cart/addToCart') ?>" <?php echo $disabled ?>>
                    </div>
                    <div style="width:42%;float:left;margin-left:15px;">
                        <input type="button" name="addToWishlist" value="<?php echo $language[$view->view]->btnWishList; ?>" 
                               class="lynx_blueButton form-control submit" data-action="<?php echo base_url('wishlist/addToWishlist') ?>">
                    </div>
                </div>
            </div>
            <div class="lynx_productShare"> 
                <span class="lynx_share"> <?php echo $language[$view->view]->lblShare; ?> : </span>
                <span class="lynx_shareFace" ng-click="shareFacbook()">&nbsp;</span>
                <span class="lynx_shareTiwster">&nbsp;</span>
                <span class="lynx_sharePlumber">&nbsp;</span>
                <span class="lynx_shareMail">&nbsp;</span>
            </div>
        </form>
    </div>
    <div class="lynx_listProducts tab">
        <ul class="lynx_head">
            <li class="active"><a href="#tab-description"><?php echo $language[$view->view]->lblDes; ?></a></li>
            <li><a href="#tab-pro-details"><?php echo $language[$view->view]->lblOther; ?></a></li>
            <li><a href="#tab-return-warranty"><?php echo $language[$view->view]->lblWarranty; ?></a></li>
        </ul>
        <div id="tab-description" class="lynx_itemConatiner lynx_productDetailDescription">
            <?php echo $product->getDescription() ?>
        </div>
        <div id="tab-pro-details" class="lynx_itemConatiner lynx_productDetailDescription">
            <ul class="ul">
                <?php if (strval($product->getBrand())): ?>
                    <li><?php echo $language[$view->view]->lblBrand ?>: <?php echo $product->getBrand() ?></li>
                <?php endif; ?>
                <?php if (strval($product->getWeight()) && strval($product->getWeightUnit())): ?> 
                    <li><?php echo $product->getWeight() . ' ' . $product->getWeightUnit() ?></li>
                <?php endif; ?>
                <?php if (strval($product->getImportFrom())): ?>
                    <li><?php echo $language[$view->view]->lblImportFrom ?>: <?php echo $product->getImportFrom() ?></li>
                <?php endif; ?>
                <?php if (strval($product->getMadeIn())): ?>
                    <li><?php echo $language[$view->view]->lblMadeIn ?>: <?php echo $product->getMadeIn() ?></li>
                <?php endif; ?>    
            </ul>
        </div>
        <div id="tab-return-warranty" class="lynx_itemConatiner lynx_productDetailDescription">
            <?php
            if (strval($product->getReturnPolicy()))
            {
                echo str_replace('{0}', $product->getReturnPolicy(), $language[$view->view]->lblReturnPolicy);
            }
            else
            {
                echo $language[$view->view]->lblNoReturnPolicy;
            }
            echo '<br>';
            if (strval($product->getWarrantyPolicy()))
            {
                echo $language[$view->view]->lblWarrantyPolicy;
                if (strval($product->getWarrantyPolicy()) == 9999)
                {
                    echo $language[$view->view]->lblWarrantyLifeTime;
                }
                else
                {
                    echo str_replace('{0}', $product->getWarrantyPolicy(), $language[$view->view]->lblWarrantyValue);
                }
            }
            else
            {
                echo $language[$view->view]->lblNoWarrantyPolicy;
            }
            ?>
        </div>
    </div>

    <div class="lynx_hotProducts">
        <div class="lynx_hotSildeButton lynx_left">
        </div>
        <div class="lynx_hotSildeButton lynx_right">
        </div>
        <div class="lynx_slideItemsContainer">
            <div class="lynx_head" >
                <h3><?php echo $language[$view->view]->lblRelated; ?></h3>
            </div>
            <div class="lynx_listItem">
                <div class="lynx_item" ng-repeat="product in relatedProducts" product="product" 
                     ng-class="{
                                 lynx_slideFirst: !$index, lynx_slideLast: $index == relatedProducts.length - 1}"></div>
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
        relatedURL: '<?php echo base_url('product/related_products_service') ?>/',
        facebookImage: 'http://<?php echo $_SERVER['HTTP_HOST'] ?>/thumbnail.php/<?php echo trim($facebookImages[0]->url, '/') ?>/w=200'
    };
</script>
<?php if ($product->countPin == 0): ?>
    <script>$('#product-details-ctrl .lynx_pin .lynx_pin_number').hide();</script>
<?php endif; ?>
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
                $($this.attr('href')).show();
            });
            $('.lynx_head li.active', $container).find('a').trigger('click');
        });

    }
    initTab('.tab');
    $('.lynx_pinIcon').click(function() {
        $('#product-details-ctrl .lynx_pin .lynx_pin_number').show();
        var $countPinContainer = $('#product-details-ctrl .lynx_pin c');
        var count = parseInt($countPinContainer.html() || 0);
        $countPinContainer.html(count + 1);
        $(this).unbind('click');
        $.ajax({
            cache: false,
            url: '/pin/pinProduct/' + scriptData.productID
        });
    });
    $('.lynx_imageList a').click(function() {
        var $a = $(this);
        $a.parent().find('img').removeClass('lynx_selectedImage');
        $a.find('img').addClass('lynx_selectedImage');
    });
    $('.lynx_imageList a:eq(0)').click();
    $(function() {
        $('.jqzoom').jqzoom();
    });

</script>
