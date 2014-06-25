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
                    <label for="txtFullname" class="col-sm-4 control-label"><?php echo $language[$view->view]->lblName; ?></label>
                    <div class="col-sm-8">
                        <input type="text" name="txtFullname" id="txtFullname" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtPhoneNo" class="col-sm-4 control-label"><?php echo $language[$view->view]->lblPhone; ?></label>
                    <div class="col-sm-8">
                        <input type="text" name="txtPhoneNo" id="txtPhoneNo" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtStreetAddr" class="col-sm-4 control-label"><?php echo $language[$view->view]->lblAddress; ?></label>
                    <div class="col-sm-8">
                        <input type="text" name="txtStreetAddr" id="txtStreetAddr" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtCityDistrict" class="col-sm-4 control-label"><?php echo $language[$view->view]->lblCity; ?></label>
                    <div class="col-sm-8">
                        <input type="text" name="txtCityDistrict" id="txtCityDistrict" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="selProvinceCity" class="col-sm-4 control-label"><?php echo $language[$view->view]->lblProvince; ?></label>
                    <div class="col-sm-8">
                        <select name="selProvinceCity" class="form-control" id="selProvinceCity" ng-model="province">
                            <?php echo ViewHelpers::getInstance()->options($provinces) ?>
                        </select>
                    </div>
                </div>
            </div><!--width-->
        </fieldset>
        <fieldset>
            <legend><?php echo $language[$view->view]->lblShippingMethods; ?></legend>
            <div style="width:500px">
                <div class="form-group">
                    <div class="col-sm-8 col-sm-offset-4">
                        <table style="width:100%">
                            <thead>
                                <tr>
                                    <th width="40%"><?php echo $language[$view->view]->colName; ?></th>
                                    <th width="60%"><?php echo $language[$view->view]->colTime; ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($shippingMethods as $method): ?>
                                    <tr>
                                        <td>
                                            <label>
                                                <input type='radio' name='radShippingMethod' ng-model="shippingMethod"
                                                       value='<?php echo $method->codename ?>'>
                                                       <?php echo $method->codename ?>
                                            </label>
                                        </td>
                                        <td>
                                            <?php
                                            if ($method->minBDay == 0 && $method->maxBDay == 0)
                                            {
                                                echo 'In 4 hours';
                                            }
                                            elseif ($method->minBDay == 0 && $method->maxBDay != 0)
                                            {
                                                echo 'Lesser than ' . $method->maxBDay . ' day(s)';
                                            }
                                            else
                                            {
                                                echo "{$method->minBDay}-{$method->maxBDay} bussiness days";
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div><!--form group-->
            </div><!--width-->
        </fieldset>
        <fieldset>
            <legend><?php echo $language[$view->view]->lblGift; ?></legend>
            <div style="width:500px;">
                <div class="form-group">
                    <label class="col-sm-4 control-label"><?php echo $language[$view->view]->lblGiftNoiceLine1; ?><br><?php echo $language[$view->view]->lblGiftNoice; ?></label>
                    <div class="col-sm-8">
                        <div>
                            <label><input type='radio' name='radGift' value='1'><?php echo $language[$view->view]->lblIsGift; ?></label>
                        </div>
                        <div>
                            <label><input type='radio' name='radGift' value='0' checked><?php echo $language[$view->view]->lblIsNotGift; ?></label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-8 col-sm-offset-4">
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
        <input id="btnSubCheckout" type="button" class="btn btn-lg btn-primary form-control" value="<?php echo $language[$view->view]->btnContinue; ?>" onclick="$('btn-continue').click();">
    </div><!--cart-right-->
    <div class="clearfix"></div>
</div><!--angularjs-->

<script>
    var scriptData = {};
    scriptData.cartURL = '<?php echo base_url('cart/showCart') ?>';
    scriptData.priceURL = '<?php echo base_url('cart/shippingPriceService') ?>';
    scriptData.cartServiceURL = '/cart/cartProductsService';
    scriptData.fnMoneyToString = <?php echo getJavascriptMoneyFunction(User::getCurrentUser()->getCurrency()) ?>;
    scriptData.priceNTax = <?php echo $totalPrice + $totalTaxes ?>;
</script>
<script>

    $(document).ready(function(){
        $("#btnSubCheckout").click(function(){
            $("#frmMain").submit();
            });
        
        });
    (function(window, scriptData, $, undefined) {
        window.backToCart = function() {
            window.location = scriptData.cartURL;
        };

    })(window, scriptData, $);

    (function(window, scriptData, $, undefined) {
        window.shippingCtrl = function($scope, $http) {
            $scope.province;
            $scope.shippingMethod = 'standard';
            $scope.fnMoneyToString = scriptData.fnMoneyToString;
            $scope.shippingPrice = 0;
            $scope.orderSubtotal;

            $scope.$watch('province + shippingMethod', function() {
                if (!$scope.province || !$scope.shippingMethod) {
                    return;
                }
                var url = scriptData.priceURL + '?shipping=' + $scope.shippingMethod + '&location=' + $scope.province;
                $http.get(url, {cache: false}).success(function(price) {
                    $scope.shippingPrice = parseFloat(price);
                }).error(function() {
                    //TODO
                });
            });

            $scope.calTotal = function() {
                return scriptData.priceNTax + $scope.shippingPrice;
            };

            $scope.getOrderTotal = function() {
                return parseFloat($scope.orderSubtotal) + parseFloat($scope.shippingPrice);
            };

        };

    })(window, scriptData, $);
</script>

