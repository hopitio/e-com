<?php
/* @var $secondLvlCates CategoryDomain */
/* @var $thisCate CategoryDomain */
/* @var $firstLvlCate CategoryDomain */
?>
<div ng-controller="CategoryListCtrl">
    <div class="lynx-menu-lvl2-container width-960">
        <ul class="lynx-menu-lvl-2">
            <?php
            $class = User::getCurrentUser()->languageKey;
            $class .= isset($view->activeCates[1]) ? '' : ' active';
            ?>
            <li class='<?php echo $class ?>' id="menu-best">
                <a href='<?php echo $firstLvlCate->getURL() ?>'>
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
            <div class="pull-left">
                <a href="javascript:;" class="btn_advance_filter" ng-click="toggleFilter()">
                    <?php echo $language[$view->view]->lblAvdvancedFilter ?>
                </a>
            </div>
            <div class="lynx_sort pull-right">
                <ul>
                    <li ng-repeat="option in sortOptions" ng-class="{
                                lynx_sortActive: hashParams.sort === option[1]
                            }">
                        <a class="{{option[0]}}" title="{{option[2]}}" href="javascript:;" ng-click="sortBy(option[1])">
                            {{option[2]}}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="width-960" ng-cloak ng-show="advancedFilter">
        <div class="lynx-box" id="box_advanced_filter">
            <div class="box_header"><?php echo $language[$view->view]->lblFilterHeader ?>:</div>
            <div class="box_content">
                <div class='row'>
                    <div class='col-xs-1'><?php echo $language[$view->view]->lblFilterPrice ?></div>
                    <div class='col-xs-11'>
                        <label for="txt_price_low"><?php echo $language[$view->view]->lblPriceLow ?> </label>
                        <div class='border-right div-inline'>
                            <input type='text'  id="txt_price_low" placeholder="<?php echo $language[$view->view]->lblCurrency ?>" 
                                   onkeypress="return isNumber(event)" ng-model="advancedParams.priceLow"/>
                        </div>
                        <label for="txt_price_high">&nbsp;&nbsp;<?php echo $language[$view->view]->lblPriceHigh ?> </label>
                        <div class='border-right div-inline'>
                            <input type='text'  id="txt_price_high" placeholder="<?php echo $language[$view->view]->lblCurrency ?>" 
                                   onkeypress="return isNumber(event)" ng-model="advancedParams.priceHigh"/>
                        </div>
                        &nbsp;&nbsp;
                        <input type="button" value="<?php echo $language[$view->view]->lblFilter ?>" ng-click="getProducts(true)"/>
                    </div>
                </div>
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
    //array('lynx_sorterSellOnline', 'bestseller', (string) $language[$view->view]->lblSortBestbuy),
    array('lynx_sorterPriceAsc', 'priceasc', (string) $language[$view->view]->lblSortPriceDown),
    array('lynx_sorterPriceDesc', 'pricedesc', (string) $language[$view->view]->lblSortPriceUp),
    array('lynx_sorterSaleAsc', 'sale', (string) $language[$view->view]->lblSortSaleoff),
        //array('lynx_sorterHot', 'hot', (string) $language[$view->view]->lblSortHot),
        //array('lynx_sorterMostLiked', 'like', (string) $language[$view->view]->lblSortLike)
        )
?>
<script>
    var scriptData = {
        categoryId: <?php echo (int) $thisCate->id ?>,
        sortOptions: <?php echo json_encode($sortOptions) ?>,
        isCategoryContainer: <?php echo $thisCate->isContainer ? 'true' : 'false' ?>
    };
</script>