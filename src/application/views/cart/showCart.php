<?php ?>

<div class="width-960 left" ng-app="lynx" ng-controller="showCartCtrl">
    <ul id="cart-process">
        <li class="active">
            <div class="process-text">
                <span class="number">1</span>
                <label><?php echo $language[$view->view]->lblYourCart ?></label>
            </div>
            <div class="process-visual">
                <div class="process-line"></div>
                <div class="process-line-cart"></div>
            </div>
        </li>
        <li class="">
            <div class="process-text">
                <span class="number">2</span>
                <label><?php echo $language[$view->view]->lblShippingInfo ?></label>
            </div>
            <div class="process-visual">
                <div class="process-line"></div>
                <div class="process-line-cart"></div>
            </div>
        </li>
        <li class="">
            <div class="process-text">
                <span class="number">3</span>
                <label><?php echo $language[$view->view]->lblPaymentInfo ?></label>
            </div>
            <div class="process-visual">
                <div class="process-line"></div>
                <div class="process-line-cart"></div>
            </div>
        </li>
    </ul>

    <div class="product-list-count">
        <?php echo $language[$view->view]->lblProductCount ?>
    </div>
    <div class="seperator"></div>
    <div class="seperator"></div>
    <div class="row">
        <div class="col-xs-8">
            <table class="product-table" ng-cloak>
                <thead>
                    <tr>
                        <th width="50%"><?php echo $language[$view->view]->lblProduct ?></th>
                        <th width="20%"><?php echo $language[$view->view]->lblPrice ?></th>
                        <th width="10%"><?php echo $language[$view->view]->lblQty ?></th>
                        <th width="20%"><?php echo $language[$view->view]->lblSubtotal ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="product in products">
                        <td>
                            <div class="p-img">
                                <a href="{{product.url}}" title="{{product.name}}">
                                    <img ng-src="/thumbnail.php/{{product.thumbnail}}/w=100">
                                </a>
                            </div>
                            <div class="p-info">
                                <a class="p-name" href="{{product.url}}" title="{{product.name}}">{{product.name}}</a>
                                <div class="p-status">
                                    <span class="green" ng-if="product.stock > 1 && product.quantity <= product.stock"><?php echo $language[$view->view]->lblInStock ?></span>
                                    <span class="yellow" ng-if="product.stock == 1 && product.quantity <= product.stock"><?php echo $language[$view->view]->lblAlmostEmpty ?></span>
                                    <span class="red" ng-if="product.stock == 0 || product.quantity > product.stock">Hết hàng</span>
                                    &nbsp;|&nbsp;
                                    <a href="javascript:;" ng-click="removeProduct(product.id)"><?php echo $language[$view->view]->lblRemove ?></a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <strong>
                                {{fnMoneyToString(product.price)}}<br>
                                <small ng-if="product.salesPercent != '0'">{{fnMoneyToString(product.priceOrigin)}}</small>
                            </strong>
                            <br>
                            <span class="p-sale-percent" ng-if="product.sales"><?php echo $language[$view->view]->lblSales ?> {{product.sales}}%</span>
                        </td>
                        <td>
                            <select ng-model="product.quantity" ng-change="selQtyOnchange()">
                                <option ng-repeat="i in range(1, product.stock)" value="{{i}}" ng-selected="product.quantity == i">{{i}}</option>
                            </select>
                        </td>
                        <td><strong>{{fnMoneyToString(product.price * product.quantity)}}</strong></td>
                    </tr>
                </tbody>
            </table>
            <div class="pull-right" style="width: 300px;">
                <div class="product-summaries-table">
                    <div class="border-solid">
                        <div class="tdleft"><?php echo $language[$view->view]->lblProduct ?>:</div>
                        <div class="tdright">{{fnMoneyToString(getProductSubtotal())}}</div>
                    </div>
                    <div class="total">
                        <div class="tdleft"><strong><?php echo $language[$view->view]->lblTotal ?>:</strong></div>
                        <div class="tdright"><strong>{{fnMoneyToString(getTotal())}}</strong></div>
                    </div>
                </div>
                <div class="pull-right">
                    <a href="/cart/shipping" class="btn-cart-next"><?php echo $language[$view->view]->lblSubmit ?>&nbsp;&nbsp;&nbsp;<i class="fa fa-caret-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-xs-4">
            <div class="cart-summaries">
                <div class="inner">
                    <h4><?php echo $language[$view->view]->lblSummaries ?></h4>
                    <div class="product-summaries-table">
                        <div class="border-dashed">
                            <div class="tdleft"><strong><?php echo $language[$view->view]->lblProduct ?> ({{countProducts()}}):</strong></div>
                            <div class="tdright"><strong>{{fnMoneyToString(getProductSubtotal())}}</strong></div>
                        </div>
                        <div class="border-dashed">
                            <div class="tdleft"><strong><?php echo $language[$view->view]->lblShipping ?>:</strong></div>
                            <div class="tdright"><strong>----?</strong></div>
                        </div>
                        <div class="border-solid">
                            <div class="tdleft"><strong><?php echo $language[$view->view]->lblTransferFee ?>:</strong></div>
                            <div class="tdright"><strong>----?</strong></div>
                        </div>
                        <div class="total">
                            <div class="tdleft"><strong><?php echo $language[$view->view]->lblTotal ?>:</strong></div>
                            <div class="tdright"><strong>{{fnMoneyToString(getTotal())}}</strong></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <br>
                    <a class="btn-cart-next" href="/cart/shipping" style="display: block;">
                        <?php echo $language[$view->view]->lblSubmit ?>
                        <div class="pull-right"><i class="fa fa-caret-right"></i></div>
                    </a>
                </div><!--inner-->
            </div><!--summaries-->
        </div>
    </div>
    <div class="seperator"></div>
    <div class="seperator"></div>
</div><!--container-->