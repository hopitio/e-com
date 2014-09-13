<?php
/* @var $product ProductFixedDomain */
/* @var $breadcrums array */
/* @var $ancestors array */
?>
<div ng-app="lynx" ng-controller="productDetailsCtrl">
    <div class="lynx-menu-lvl2-container width-960">
        <ul class="lynx-menu-lvl-2">
            <?php
            $class = User::getCurrentUser()->languageKey;
            ?>
            <li class='<?php echo $class ?>' id="menu-best">
                <a href='/category/show/<?php echo $ancestors[0] ?>'>
                    <span class="menu-icon"></span><span class="menu-name">Best</span>
                </a>
            </li>
            <?php foreach ($secondLvlCates as $secondLvlCate): ?>
                <?php
                $class = User::getCurrentUser()->languageKey;
                $class .= isset($ancestors[1]) && $ancestors[1] == $secondLvlCate->id ? ' active' : '';
                ?>
                <li id="menu-<?php echo $secondLvlCate->codename ?>" class="<?php echo $class ?>">
                    <a href="<?php echo $secondLvlCate->getURL() ?>"><span class="menu-icon"></span><span class="menu-name"><?php echo $secondLvlCate->name ?></span></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="width-960 left">
        <ul class="lynx-product-breadcrums">
            <?php foreach ($breadcrums as $name => $url): ?>
                <li>
                    <?php if ($url): ?>
                        <a href="<?php echo $url ?>" title="<?php echo $name ?>"><?php echo $name ?></a>&nbsp;>>&nbsp;
                    <?php else: ?>
                        <?php echo $name ?>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="width-960">
        <div class="detail-main">
            <div class="detail-images">
                <ul class="detail-main-left">
                    <?php $i = 0; ?>
                    <?php foreach ($product->getImages('baseImage') as $img): ?>
                        <?php
                        $class = $i++ == 0 ? 'zoomThumbActive' : '';
                        $smallImage = '/thumbnail.php/' . $img->url . '/w=70';
                        $mediumImage = $img->width > 560 ? '/thumbnail.php/' . $img->url . '/w=560' : $img->url;
                        $largeImage = $img->width > 1000 ? $img->url : '/thumbnail.php/' . $img->url . '/w=1000';
                        if (!isset($firstMediumImage))
                        {
                            $firstMediumImage = $mediumImage;
                        }
                        if (!isset($firstLargeImage))
                        {
                            $firstLargeImage = $largeImage;
                        }
                        $rel = json_encode(array(
                            'gallery'    => 'gal1',
                            'smallimage' => $mediumImage,
                            'largeimage' => $largeImage
                        ));
                        ?>
                        <li class="<?php echo $class ?>">
                            <a href="javascript:;" rel="{gallery: 'gal1', smallimage: '<?php echo $mediumImage ?>', 'largeimage': '<?php echo $largeImage ?>'}">
                                <img  src="<?php echo $smallImage ?>">
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <div class="detail-main-right">
                    <h4 class="product-name"><?php echo $product->getName() ?></h4>
                    <a href="<?php echo $firstLargeImage ?>" class="jqzoom" rel='gal1' title="Zoom">
                        <img src="<?php echo $firstMediumImage ?>" id="thumbViewing"  title="thumbnail" style="width:560px;">
                    </a>
                </div>
            </div>
            <div class='clearfix'>
                <br>
            </div>
            <ul class="detail-social">
                <li class="detail-social-cart">
                    <a href="javascript:;"><span class="icon"><?php echo $language[$view->view]->lblBoughtQty ?></span></a>
                </li>
                <li class="detail-social-rate">
                    <a href="javascript:;"><span class="icon"><?php echo $language[$view->view]->lblSatisfied ?></span></a>
                </li>
                <li class="detail-social-comment last">
                    <a href="javascript:;"><span class="icon"><?php echo $language[$view->view]->lblComment ?></span></a>
                </li>
            </ul>
            <br>
            <div class="lynx-tabs">
                <ul>
                    <li>
                        <a href="#tab-support"><?php echo $language[$view->view]->lblWarranty ?></a>
                    </li>
                    <li>
                        <a href="#tab-details"><?php echo $language[$view->view]->lblDetails ?></a>
                    </li>
                    <li class="active">
                        <a href="#tab-desc"><?php echo $language[$view->view]->lblDes ?></a>
                    </li>
                </ul>
                <div class="lynx-panes">
                    <div class="lynx-pane " id="tab-support">
                        support
                    </div>
                    <div class="lynx-pane" id="tab-details">
                        details
                    </div>
                    <div class="lynx-pane active" id="tab-desc">
                        <?php echo $product->getDescription() ?>
                    </div>
                </div>
            </div>
        </div><!--main-->
        <div class="detail-summaries">
            <form id="frmAddTo">
                <input type="hidden" name="hdn_product" value="<?php echo $product->id ?>">
                <div class="detail-seller-logo"><img src="<?php echo $product->seller_logo ?>"></div>
                <div class="detail-seller-name"><?php echo $product->seller_name ?></div>
                <div class="left">
                    <span class="detail-sale">10%</span>
                    <div class="detail-origin-price"><?php echo $product->getPriceOrigin(User::getCurrentUser()->getCurrency()) ?></div>
                    <div class="detail-price"><?php echo $product->getPriceMoney(User::getCurrentUser()->getCurrency()) ?></div>
                </div>
                <div class="clearfix"></div>
                <div class="detail-free-shipping free">
                    <label for="sel_qty"><?php echo $language[$view->view]->lblQuantity ?>:</label> <select name="sel_qty" id="sel_qty"><option>1</option></select>
                </div>
                <h4></h4>
                <input type="button" class="btn-add-to-cart" value="<?php echo $language[$view->view]->btnCart ?>" data-type="button" data-action="/cart/addToCart">
                <h4></h4>
                <input type="button" class="btn-add-to-favorite" value="<?php echo $language[$view->view]->btnFavorite ?>" data-type="button" data-action="/wishlist/addToWishlist">
                <h4 ></h4>
                <div class="detail-share"> 
                    <span><?php echo $language[$view->view]->lblShare ?>: </span>
                    <a href="javascript:;" class="share share-facebook"></a>
                    <a href="javascript:;" class="share share-twiter"></a>
                    <a href="javascript:;" class="share share-google"></a>
                    <a href="javascript:;" class="share share-email"></a>           
                </div>
                <h4 class="clearfix"></h4>
            </form>
        </div><!--detail-summaries-->
    </div>
    <div class="clearfix"></div>
    <div class="tab tab-blue text-left width-960">
        <div class="head">
            <ul>
                <li><?php echo $language[$view->view]->lblRelated ?></li>
                <li class="line"></li>
            </ul>
        </div>
        <div class="tab-content list-product width-960">
            <div id="carousel-hot-product" class="carousel slide carousel-mini-product"  data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-hot-product" data-slide-to="{{$index}}" ng-class="{
                                active: $index == activeSlide
                            }" ng-repeat="products in relatedProducts"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="item" ng-repeat="products in relatedProducts" ng-class="{
                                active: $index == activeSlide
                            }">
                        <div class="lynx-row width-960">
                            <div class="lynx-box lynx-box-small cursor-pointer" ng-repeat="product in products" ng-product-small="product" ></div>
                        </div>
                    </div>
                </div>
                <a class="left carousel-control cursor-pointer" href="#carousel-hot-product" data-slide="prev">
                    <span class="fa fa-angle-left fa-2x"></span>
                </a>
                <a class="right carousel-control cursor-pointer" href="#carousel-hot-product" data-slide="next">
                    <span class="fa fa-angle-right fa-2x"></span>
                </a>
            </div>
        </div>
        <div class="clearfix">
            <br>
        </div>
    </div>
</div><!--ng-ctrl-->
<script>
    var scriptData = {
        relatedProducts: <?php echo json_encode($relatedProducts) ?>
    };
</script>