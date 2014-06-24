<?php
defined('BASEPATH') or die('no direct script access allowed');
?>
<div class="row-wrapper" ng-app ng-controller="SearchCtrl">
    <h3 class="left"><?php echo $language[$view->view]->lblResult;?></h3>
    <div class="left"><?php echo $language[$view->view]->lblResultCount;?></div>
    <div class="cart-left">
        <table class="table-product">
            <thead>
                <tr>
                    <th width="100">&nbsp;</th>
                    <th width="400"><?php echo $language[$view->view]->colProduct;?></th>
                    <th width="180" class="right"><?php echo $language[$view->view]->colPrices;?></th>
                    <th width="200" class="center"><?php echo $language[$view->view]->colAction;?></th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="product in products" ng-class-even="'even'" ng-class-odd="'odd'">
                    <td class="center">
                        <a href="{{product.url}}" title="product thumbnail">
                            <img class="product-thumbnail" src="/thumbnail.php/{{product.thumbnail}}/w=200" alt="product thumbnail">
                        </a>
                    </td>
                    <td>
                        <a href="{{product.url}}" class="product-name">{{product.name}}</a><br>
                        <span class="product-seller">{{product.sellerName}}</span><br>
                        <span class="green" ng-if="product.stock > 10">In stock</span>
                        <span class="red" ng-if="product.stock <= 10 && product.stock > 0">Just {{product.stock}} left</span>
                        <span class="red" ng-if="product.stock <= 0">Out of stock</span>
                    </td>
                    <td class="right">
                        <span class="product-price">{{product.price}}</span>
                    </td>
                    <td class="center">
                    </td>
                </tr>
                <tr ng-show="loading">
                    <td colspan="4" class="center">
                        <img src="/images/loading.gif">
                    </td>
                </tr>
            </tbody>
        </table>
        <ul class="pagination">
            <li>
                <a ng-class="{disabled: getCurrentPage() <= 1}" href="javascript:;" ng-click="setCurrentPage(1)"><?php echo htmlentities('<<') ?></a>
            </li>
            <li >
                <a ng-class="{disabled: getCurrentPage() <= 1}" href="javascript:;" ng-click="setCurrentPage(getCurrentPage() - 1)"><?php echo htmlentities('<') ?></a>
            </li>
            <li ng-repeat="page in page_nav" ng-class="{active: page == getCurrentPage()}">
                <a href="javascript:;" ng-click="setCurrentPage(page)" title="page {{page}}">{{page}}</a>
            </li>
            <li>
                <a ng-class="{disabled: getCurrentPage() > total_page - 1}" href="javascript:;" ng-click="setCurrentPage(getCurrentPage() + 1)"><?php echo htmlentities('>') ?></a>
            </li>
            <li>
                <a ng-class="{disabled: getCurrentPage() > total_page - 1}" href="javascript:;" ng-click="setCurrentPage(total_page)"><?php echo htmlentities('>>') ?></a>
            </li>
        </ul>
    </div><!--cartleft-->
</div><!--controller-->
<div class="clearfix"></div>
<br>
<script>
    var scriptData = {
        serviceURL: '/search/getProductService',
        keywords: '<?php echo $keywords ?>'
    };
</script>