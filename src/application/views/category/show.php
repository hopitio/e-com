<?php
/* @var $category CategoryDomain */
/* @var $top_categories CategoryDomain */
/* @var $sub_menu CategoryDomain */

function makeURL($categoryID, $changeParams = array())
{
    $url = '/category/show/' . $categoryID;
    $params = isset($_GET) && !empty($_GET) ? $_GET : array();
    foreach ($changeParams as $k => $v)
    {
        $params[$k] = $v;
    }

    foreach ($params as $k => $v)
    {
        $url .= (strpos($url, "?") !== false ? '&' : '?') . "$k=$v";
    }
    return $url;
}
?>
<div class="lynx_listContent lynx_staticWidth">
    <div style="overflow:hidden;">
        <div class="lynx_categoryList">
            <ul>
                <?php foreach ($top_categories as $top_cate): ?>
                    <?php $active = $top_level_active == $top_cate->id ? 'active' : '' ?>
                    <li class="<?php echo $active ?>">
                        <a href="<?php echo $top_cate->getURL() ?>" title="<?php echo $top_cate->name ?>"> <?php echo $top_cate->name ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div style="overflow:hidden;">
        <div class="lynx_siteMap">
            <ul>
                <?php $i = 0 ?>
                <?php foreach ($breadcrums as $label => $url): ?>
                    <li>
                        <a href="<?php echo $url ?>" title="<?php echo $label ?>">
                            <?php echo $label ?>
                        </a>
                        <?php echo $i++ < count($breadcrums) - 1 ? htmlentities(' >>') : '' ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div class="lynx_adve">
        <?php if (count($sub_menu)): ?>
            <div class="lynx_tabControl lynx_seamlessTab">
                <ul>
                    <?php $active = $sub_level_active == NULL ? 'lynx_tabActive' : '' ?>
                    <li class="<?php echo $active ?>"><a href="<?php echo "/category/show/$top_level_active" ?>" title="Tất cả">Tất cả</a></li>
                    <?php foreach ($sub_menu as $sub_cate): ?>
                        <?php $active = $sub_level_active == $sub_cate->id ? 'lynx_tabActive' : '' ?>
                        <li class="<?php echo $active ?>">
                            <a href="<?php echo $sub_cate->getURL() ?>" title="<?php echo $sub_cate->name ?>"><?php echo $sub_cate->name ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <?php if (!$sub_level_active): ?>
            <div class="lynx_adveContent"> 
                <div class="lynx_adveSlide">
                    <?php if ($category->dom_slide_image): ?>
                        <?php foreach ($category->dom_slide_image as $image): ?>
                            <a href="<?php echo $image->attributes()->href ?>" title="<?php echo $image->attributes()->title ?>">
                                <img src="<?php echo $image->attributes()->src ?>">
                            </a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <?php if ($category->dom_side_images): ?>
                    <?php foreach ($category->dom_side_images as $image): ?>
                        <div class="lynx_adveImage">
                            <a href="<?php echo $image->attributes()->href ?>" title="<?php echo $image->attributes()->title ?>">
                                <img src="<?php echo $image->attributes()->src ?>" >
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
    <!--
    <div class="lynx_listFilter">
        <span class="lynx_head">Lọc sản phẩm</span>
        <div class="lynx_filterContent">
            <ul class="lynx_filterChoiceRow">
                <li class="lynx_filterFieldName">Màu sắc</li>
                <li><img class="lynx_filterIcon" /> Vải </li>
                <li><img class="lynx_filterIcon" /> Sắt </li>
                <li><img class="lynx_filterIcon" /> Thép </li>
                <li><img class="lynx_filterIcon" /> Linh tinh </li>
                <li><img class="lynx_filterIcon" /> Linh tinh </li>
                <li><img class="lynx_filterIcon" /> Linh tinh </li>
                <li class="lynx_filterExtendButton"><a class="lynx_extendButton"></a></li>
            </ul>
            <ul class="lynx_filterSelectRow">
                <li class="lynx_filterFieldName">Chất liệu</li>
                <li><img class="lynx_filterIcon" /> Vải </li>
                <li><img class="lynx_filterIcon" /> Sắt </li>
                <li><img class="lynx_filterIcon" /> Thép </li>
                <li><img class="lynx_filterIcon" /> Linh tinh </li>
                <li><img class="lynx_filterIcon" /> Linh tinh </li>
                <li><img class="lynx_filterIcon" /> Linh tinh </li>
                <li class="lynx_filterExtendButton"><a class="lynx_extendButton"></a></li>
            </ul>
            <ul class="lynx_filterSelectRow">
                <li class="lynx_filterFieldName">Chất liệu</li>
                <li><img class="lynx_filterIcon" /> Vải </li>
                <li><img class="lynx_filterIcon" /> Sắt </li>
                <li><img class="lynx_filterIcon" /> Thép </li>
                <li><img class="lynx_filterIcon" /> Linh tinh </li>
                <li><img class="lynx_filterIcon" /> Linh tinh </li>
                <li><img class="lynx_filterIcon" /> Linh tinh </li>
                <li class="lynx_filterExtendButton"><a class="lynx_extendButton"></a></li>
            </ul>
        </div>
    </div>
    -->
    <div class="lynx_searchResult" ng-app="lynxApp" ng-controller="ListCtrl">
        <div style="overflow:hidden">
            <div class="lynx_sort">
                <ul>
                    <?php
                    $sorts = array(
                        array('lynx_sorterNew', 'new', $language[$view->view]->lblSortNew),
                        array('lynx_sorterSellOnline', 'bestseller', $language[$view->view]->lblSortBestbuy),
                        array('lynx_sorterPriceAsc', 'priceasc', $language[$view->view]->lblSortPriceDown),
                        array('lynx_sorterPriceDesc', 'pricedesc', $language[$view->view]->lblSortPriceUp),
                        array('lynx_sorterSaleAsc', 'sale', $language[$view->view]->lblSortSaleoff),
                        array('lynx_sorterHot', 'hot', $language[$view->view]->lblSortHot),
                        array('lynx_sorterMostLiked', 'like', $language[$view->view]->lblSortLike)
                    );
                    $sortBy = isset($_GET['sort']) ? $_GET['sort'] : 'new';
                    ?>

                    <?php foreach ($sorts as $sort): ?>
                        <?php $active = $sortBy == $sort[1] ? 'lynx_sortActive' : '' ?>
                        <li class="<?php echo $active ?>">
                            <a class="<?php echo $sort[0] ?>" title="<?php echo $sort[2] ?>" 
                               data-value="<?php echo $sort[1] ?>" href="<?php echo makeURL($category->id, array('sort' => $sort[1])) ?>">
                                   <?php echo $sort[2] ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div class="lynx_listItem" >
            <?php if ($category->dom_product_section_images): ?>
                <div class="lynx_item lynx_itemAdve" ng-show="page == 1"> 
                    <?php $image = $category->dom_product_section_images->img; ?>
                    <a href="<?php echo $image->attributes()->href ?>" title="<?php echo $image->attributes()->title ?>">
                        <img src="<?php echo $image->attributes()->src ?>">
                    </a>
                </div>
            <?php endif; ?>
            <div ng-if="getProductsRequest">
                <center>
                    <img src="/images/loading.gif"> <?php echo $language[$view->view]->lblLoading;?>
                </center>
            </div>
            <div class="lynx_item" ng-repeat="product in products" product="product"></div>
        </div>
        <div class="lynx_showMore" ng-click="nextPage()" ng-disabled="getProductsRequest" ng-show="showBtnNext">
            <?php echo $language[$view->view]->lblShowMore;?>
        </div>
    </div>
    <div class="lynx_adveGroup">
        <div class="lynx_adveItem "><a href="#"><img src="/images/child-slide-item-demo.png" /></a></div>
        <div class="lynx_adveItem"><a href="#"><img src="/images/child-slide-item-demo.png" /></a></div>
        <div class="lynx_adveItem "><a href="#"><img src="/images/child-slide-item-demo.png" /></a></div>
    </div>
</div>
<script>
    var scriptData = {
        productURL: '/category/productService/<?php echo $category->id ?>',
        hasSectionImage: <?php echo $category->dom_product_section_images && $category->dom_product_section_images->img ? 'true' : 'false' ?>,
        additionalParams: {
            sort: '<?php echo isset($_GET['sort']) ? $_GET['sort'] : 'new' ?>'
        }
    };

</script>