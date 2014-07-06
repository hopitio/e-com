<?php
defined('BASEPATH') or die('No direct script access allowed');
/* @var $shippingMethods ShippingMethodDomain */
/* @var $cartContents CartDomain */
$totalPrice = 0;
$totalTaxes = 0;
foreach ($cartContents as $product)
{
    $totalPrice += $product->getPriceMoney(User::getCurrentUser()->getCurrency())->getAmount() * $product->quantity;
    $totalTaxes += $product->sum_taxes(User::getCurrentUser()->getCurrency()) * $product->quantity;
}
?>
<h1></h1>
<ul class="cart-breadcrums">
    <li class="bc-label"><i class="fa fa-shopping-cart"></i> <?php echo $language[$view->view]->lblYourcart; ?> </li>
    <li class="bc-label"><?php echo htmlentities('>>>') ?>&nbsp;<a href="javascript:;"><?php echo $language[$view->view]->lblPlaceOrder; ?></a></li>
    <li class="active"><?php echo htmlentities('>>>') ?>&nbsp;<a href="javascript:;"><?php echo $language[$view->view]->lblShippingInfor; ?></a></li>
    <li><?php echo htmlentities('>>>') ?>&nbsp;<a href="javascript:;"><?php echo $language[$view->view]->lblPaymentInfor; ?></a></li>
</ul>
<h1></h1>
<div ng-app ng-controller="shippingCtrl" class="row-wrapper">
    <form id="frmMain" method="post" class="form-horizontal cart-left" action="<?php echo base_url('order/placeOrder') ?>">
        <fieldset>
            <legend><?php echo $language[$view->view]->lblShippingAddress; ?></legend>
            <div style="width: 500px;">
                <div class="form-group">
                    <label for="txtFullname" class="col-sm-4 control-label"><span class="red">*</span> <?php echo $language[$view->view]->lblName; ?></label>
                    <div class="col-sm-8 controls">
                        <input type="text" name="txtFullname" id="txtFullname" class="form-control" data-rule-required="true">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtPhoneNo" class="col-sm-4 control-label"><span class="red">* </span><?php echo $language[$view->view]->lblPhone; ?></label>
                    <div class="col-sm-8 controls">
                        <input type="text" name="txtPhoneNo" id="txtPhoneNo" class="form-control" data-rule-required="true">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtStreetAddr" class="col-sm-4 control-label"><span class="red">* </span><?php echo $language[$view->view]->lblAddress; ?></label>
                    <div class="col-sm-8 controls">
                        <input type="text" name="txtStreetAddr" id="txtStreetAddr" class="form-control" data-rule-required="true">
                    </div>
                </div>
                <div class="form-group">
                    <label for="selProvinceCity" class="col-sm-4 control-label"><span class="red">* </span><?php echo $language[$view->view]->lblProvince; ?></label>
                    <div class="col-sm-8 controls">
                        <select name="selProvinceCity" class="form-control" id="selProvinceCity" ng-model="province" data-rule-required="true">
                            <?php echo ViewHelpers::getInstance()->options($provinces) ?>
                        </select>
                    </div>
                </div>
            </div><!--width-->
        </fieldset>
        <fieldset>
            <legend>
                <?php echo $language[$view->view]->lblShippingMethods; ?>
                <a href="javascript:;" ng-click="setViewMode('advance')" ng-if="getViewMode() === 'simple'"><?php echo $language[$view->view]->lblAdvanceMode; ?></a>
                <a href="javascript:;" ng-click="setViewMode('simple')" ng-if="getViewMode() === 'advance'"><?php echo $language[$view->view]->lblSimpleMode; ?></a>
            </legend>
            <div style="width:500px" ng-if="getViewMode() === 'simple'">
                <div class="form-group">
                    <div class="col-xs-8 col-xs-push-4">
                        <table>
                            <tbody>
                                <tr ng-repeat="method in simpleShipData" ng-click="setShipPrice(method.price)">
                                    <td width="50">
                                        <input type="radio" id="method_{{$index}}" name="radShippingMethod"
                                               value="{{method.code}}" ng-checked="$index == 0">
                                    </td>
                                    <td width="250"><label for="method_{{$index}}">{{method.label}}</label></td>
                                    <td width="100"><label for="method_{{$index}}" style="font-weight: normal;">{{method.desc}}</label></td>
                                    <td width="100"><label for="method_{{$index}}" style="font-weight: normal;">{{fnMoneyToString(method.price)}}</label></td>
                                </tr>
                            </tbody>
                        </table><!--simple-->
                    </div>
                </div>
            </div><!--width-->
            <table class="table-product" style="width:100%;" ng-if="getViewMode() === 'advance'">
                <thead>
                    <tr>
                        <th width="15%"></th>
                        <th width="30%"><?php echo $language[$view->view]->lblProduct ?></th>
                        <th width="20%" class="center"><?php echo $language[$view->view]->lblQuantity ?></th>
                        <th width="35%">
                            <?php echo $language[$view->view]->lblShippingMethods ?>
                        </th>
                    </tr>

                </thead>
                <tbody>
                    <tr ng-repeat="product in cartProducts">
                        <td class="center">
                            <a href="{{product.url}}" title="{{product.name}}"><img class="product-thumbnail" ng-src="{{product.thumbnail}}"></a>
                        </td>
                        <td>
                            <a class="product-name" href="{{product.url}}" title="{{product.name}}">{{product.name}}</a>
                        </td>
                        <td class="center">{{product.quantity}}</td>
                        <td class="right">
                            <select class="form-control" name="method[{{product.id}}]" ng-model="product.shippingMethodIndex" ng-change="advanceGetCaculaltedShippingPrice()">
                                <option ng-repeat="method in shippingMethods" value="{{$index}}">{{method.label}}</option>
                            </select>
                            <span class="help-block" >{{shippingMethods[product.shippingMethodIndex].description}}</span>
                        </td>
                    </tr>
                    <tr ng-if="shippingMethodPrices">
                        <td colspan="3" class="right"><?php echo $language[$view->view]->lblShipTotal; ?></td>
                        <td  class="right">
                            <div ng-repeat="(method, price) in shippingMethodPrices">
                                {{method}}: {{fnMoneyToString(price)}}
                            </div>
                            <hr>
                            = {{fnMoneyToString(shippingPrice)}}
                        </td>
                    </tr>
                </tbody>
            </table>
        </fieldset>
        <fieldset>
            <legend><?php echo $language[$view->view]->lblGift; ?></legend>
            <div style="width:500px;">
                <div class="form-group">
                    <label class="col-sm-4 control-label"><?php echo $language[$view->view]->lblGiftNoiceLine1; ?><br><?php echo $language[$view->view]->lblGiftNoice; ?></label>
                    <div class="col-sm-8 controls">
                        <div>
                            <label><input type='radio' name='radGift' value='1'><?php echo $language[$view->view]->lblIsGift; ?></label>
                        </div>
                        <div>
                            <label><input type='radio' name='radGift' value='0' checked><?php echo $language[$view->view]->lblIsNotGift; ?></label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-8 controls col-sm-offset-4">
                        <input type='submit' id="btn-continue" class="btn btn-primary" value='<?php echo $language[$view->view]->btnContinue; ?>'>
                        <input type='button' class="btn" value='<?php echo $language[$view->view]->btnBacktoCart; ?>' onclick='backToCart()'>
                    </div>
                </div>
            </div><!--width-->
        </fieldset>
    </form>
    <div class="cart-right">
        <div class="cart-right-content">
            <h4 class="left"><?php echo $language[$view->view]->lblCartsum; ?></h4>
            <div class="summary-row">
                <div class="row-left"><?php echo $language[$view->view]->lblProduct; ?> (<?php echo count($cartContents) ?>):</div>
                <div class="row-right">
                    <?php
                    $currency = new Currency(User::getCurrentUser()->getCurrency());
                    $money = new Money($totalPrice, $currency);
                    echo $money;
                    ?>
                </div>
            </div>
            <div class="summary-row">
                <div class="row-left"><?php echo $language[$view->view]->lblShipping; ?> :</div>
                <div class="row-right">{{fnMoneyToString(shippingPrice)}}</div>
            </div>
            <hr>
            <div class="summary-row">
                <div class="row-left"><?php echo $language[$view->view]->lblSubtotal; ?> : </div>
                <div class="row-right"><?php echo new Money($totalPrice, new Currency(User::getCurrentUser()->getCurrency())) ?></div>
            </div>
            <div class="summary-row">
                <div class="row-left"><?php echo $language[$view->view]->lblTax; ?> :</div>
                <div class="row-right"><?php echo new Money($totalTaxes, new Currency(User::getCurrentUser()->getCurrency())) ?></div>
            </div>
            <hr>
            <div class="summary-row total">
                <div class="row-left"><?php echo $language[$view->view]->lblTotal; ?> :</div>
                <div class="row-right">{{fnMoneyToString(calTotal())}}</div>
            </div>
            <!--
            <div class="summary-row saving">
                <div class="row-left">You save:</div>
                <div class="row-right">$40.00</div>
            </div>
            -->
        </div>
        <input id="btnSubCheckout" type="button" class="btn btn-lg btn-primary form-control" value="<?php echo $language[$view->view]->btnContinue; ?>" onclick="$('#btn-continue').click();">
    </div><!--cart-right-->
    <div class="clearfix"></div>
</div><!--angularjs-->

<script>
    var scriptData = {};
    scriptData.cartURL = '<?php echo base_url('cart/showCart') ?>';
    scriptData.simpleShipURL = '/cart/simpleShippingPriceService/';
    scriptData.cartServiceURL = '/cart/cartProductsService';
    scriptData.fnMoneyToString = <?php echo getJavascriptMoneyFunction(User::getCurrentUser()->getCurrency()) ?>;
    scriptData.priceNTax = <?php echo $totalPrice + $totalTaxes ?>;
    scriptData.shippingMethods = <?php echo json_encode($shippingMethods) ?>;
    scriptData.advanceCalculateShippingPriceService = '/cart/advanceShippingPriceService';
</script>
<script src="/js/controller/cartShippingCtrl.js"></script>

