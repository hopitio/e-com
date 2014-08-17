<?php
/* @var $secondLvlCates CategoryDomain */
?>
<div ng-controller="CategoryListCtrl">
    <div class="lynx-menu-lvl2-container width-960">
        <ul class="lynx-menu-lvl-2">
            <?php
            $class = User::getCurrentUser()->languageKey;
            $class .= isset($view->activeCates[1]) ? '' : ' active';
            ?>
            <li class='<?php echo $class ?>' id="menu-best">
                <a href='/category/show/<?php echo $view->activeCates[0] ?>'>
                    <span class="menu-icon"></span><span class="menu-name">Best</span>
                </a>
            </li>
            <?php foreach ($secondLvlCates as $secondLvlCate): ?>
                <?php
                $class = User::getCurrentUser()->languageKey;
                $class .= isset($view->activeCates[1]) && $view->activeCates[1] == $secondLvlCate->id ? ' active' : '';
                ?>
                <li id="menu-<?php echo $secondLvlCate->codename ?>" class="<?php echo $class ?>">
                    <a href="<?php echo $secondLvlCate->getURL() ?>"><span class="menu-icon"></span><span class="menu-name"><?php echo $secondLvlCate->name ?></span></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="lynx_searchResult width-960">
        <div style="overflow:hidden">
            <div class="lynx_sort pull-right">
                <ul>
                    <li ng-repeat="option in sortOptions" ng-class="{lynx_sortActive: hashParams.sort === option[1]}">
                        <a class="{{option[0]}}" title="{{option[2]}}" href="javascript:;" ng-click="sortBy(option[1])">
                            {{option[2]}}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="width-960" style="min-height: 355px;">
        <div ng-repeat="products in productRows" class="lynx-row width-960">
            <div class="lynx-box lynx-box-medium" ng-repeat="product in products" ng-product-medium="product"></div>
        </div>
    </div>
</div>
<?php
$sortOptions = array(
    array('lynx_sorterNew', 'new', (string) $language[$view->view]->lblSortNew),
    array('lynx_sorterSellOnline', 'bestseller', (string) $language[$view->view]->lblSortBestbuy),
    array('lynx_sorterPriceAsc', 'priceasc', (string) $language[$view->view]->lblSortPriceDown),
    array('lynx_sorterPriceDesc', 'pricedesc', (string) $language[$view->view]->lblSortPriceUp),
    array('lynx_sorterSaleAsc', 'sale', (string) $language[$view->view]->lblSortSaleoff),
    array('lynx_sorterHot', 'hot', (string) $language[$view->view]->lblSortHot),
    array('lynx_sorterMostLiked', 'like', (string) $language[$view->view]->lblSortLike)
        )
?>
<script>
    var scriptData = {
        categoryId: <?php echo (int) $thisCate->id ?>,
        sortOptions: <?php echo json_encode($sortOptions) ?>
    };
</script>