<?php
/* @var $secondLvlCates CategoryDomain */

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
<div ng-controller="CategoryListCtrl">
    <div class="lynx-cate-lvl2-container width-960">
        <ul class="lynx-cate-lvl-2">
            <li class='<?php echo User::getCurrentUser()->languageKey ?>'>
                <a href='javascript:;'>
                    <span class="cate-icon"></span><span class="cate-name">All</span>
                </a>
            </li>
            <?php foreach ($secondLvlCates as $secondLvlCate): ?>
                <?php
                $class = User::getCurrentUser()->languageKey;
                $class .= isset($view->activeCates[1]) && $view->activeCates[1] == $secondLvlCate->id ? ' active' : '';
                ?>
                <li id="cate-<?php echo $secondLvlCate->codename ?>" class="<?php echo $class ?>">
                    <a href="<?php echo $secondLvlCate->getURL() ?>"><span class="cate-icon"></span><span class="cate-name"><?php echo $secondLvlCate->name ?></span></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="lynx_searchResult width-960">
        <div style="overflow:hidden">
            <div class="lynx_sort pull-right">
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
                               data-value="<?php echo $sort[1] ?>" href="<?php echo makeURL($thisCate->id, array('sort' => $sort[1])) ?>">
                                   <?php echo $sort[2] ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div ng-repeat="products in productRows" class="lynx-row width-960">
        <div class="lynx-box lynx-box-medium" ng-repeat="product in products" ng-product-medium="product"></div>
    </div>
    <ul class="lynx_product_pagnation width-960">
        <li ng-repeat="page in pageNavs" class="page_no" ng-class="{active: page === hashParams.p}">
            <a href="javascript:;" ng-click="changePage(page)">{{page}}</a> 
        </li>
    </ul>
</div>
<script>
    var scriptData = {
        categoryId: <?php echo (int) $thisCate->id ?>
    };
</script>