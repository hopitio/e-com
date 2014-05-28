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
    <li class="bc-label"><i class="fa fa-shopping-cart"></i> YOUR CART</li>
    <li><?php echo htmlentities('>>>') ?>&nbsp;<a href="javascript:;">PLACE ORDER</a></li>
    <li class="active"><?php echo htmlentities('>>>') ?>&nbsp;<a href="javascript:;">SHIPPING INFO</a></li>
    <li><?php echo htmlentities('>>>') ?>&nbsp;<a href="javascript:;">PAYMENT INFO</a></li>
</ul>
<h1></h1>
<div ng-app ng-controller="shippingCtrl" class="row-wrapper">
    <form method="post" class="form-horizontal cart-left" action="<?php echo base_url('order/placeOrder') ?>">
        <fieldset>
            <legend>Shipping Address</legend>
            <div style="width: 500px;">
                <div class="form-group">
                    <label for="txtFullname" class="col-sm-4 control-label">Fullname</label>
                    <div class="col-sm-8">
                        <input type="text" name="txtFullname" id="txtFullname" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtPhoneNo" class="col-sm-4 control-label">Phone number</label>
                    <div class="col-sm-8">
                        <input type="text" name="txtPhoneNo" id="txtPhoneNo" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtStreetAddr" class="col-sm-4 control-label">Address</label>
                    <div class="col-sm-8">
                        <input type="text" name="txtStreetAddr" id="txtStreetAddr" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtCityDistrict" class="col-sm-4 control-label">City/District</label>
                    <div class="col-sm-8">
                        <input type="text" name="txtCityDistrict" id="txtCityDistrict" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="selProvinceCity" class="col-sm-4 control-label">Province</label>
                    <div class="col-sm-8">
                        <select name="selProvinceCity" class="form-control" id="selProvinceCity" ng-model="province">
                            <?php echo ViewHelpers::getInstance()->options($provinces) ?>
                        </select>
                    </div>
                </div>
            </div><!--width-->
        </fieldset>
        <fieldset>
            <legend>Shipping Method</legend>
            <div style="width:500px">
                <div class="form-group">
                    <div class="col-sm-8 col-sm-offset-4">
                        <table style="width:100%">
                            <thead>
                                <tr>
                                    <th width="40%">Name</th>
                                    <th width="60%">Transmit Time</th>
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
            <legend>Gift Option</legend>
            <div style="width:500px;">
                <div class="form-group">
                    <label class="col-sm-4 control-label">Is this a gift<br>(free gift wrap)</label>
                    <div class="col-sm-8">
                        <div>
                            <label><input type='radio' name='radGift' value='1'>Yes, it is</label>
                        </div>
                        <div>
                            <label><input type='radio' name='radGift' value='0' checked>No, it isn't</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-8 col-sm-offset-4">
                        <input type='submit' class="btn btn-primary" value='Continue'>
                        <input type='button' class="btn" value='Back to Cart' onclick='backToCart()'>
                    </div>
                </div>
            </div><!--width-->
        </fieldset>
    </form>
    <div class="cart-right">
        <div class="cart-right-content">
            <h4 class="left">Cart summaries</h4>
            <div class="summary-row">
                <div class="row-left">Products (<?php echo count($cartContents) ?>):</div>
                <div class="row-right">
                    <?php
                    $currency = new Currency(User::getCurrentUser()->getCurrency());
                    $money = new Money($totalPrice, $currency);
                    echo $money;
                    ?>
                </div>
            </div>
            <div class="summary-row">
                <div class="row-left">Shipping:</div>
                <div class="row-right">{{fnMoneyToString(shippingPrice)}}</div>
            </div>
            <hr>
            <div class="summary-row">
                <div class="row-left">Subtotal:</div>
                <div class="row-right"><?php echo new Money($totalPrice, new Currency(User::getCurrentUser()->getCurrency())) ?></div>
            </div>
            <div class="summary-row">
                <div class="row-left">Taxes:</div>
                <div class="row-right"><?php echo new Money($totalTaxes, new Currency(User::getCurrentUser()->getCurrency())) ?></div>
            </div>
            <hr>
            <div class="summary-row total">
                <div class="row-left">Total:</div>
                <div class="row-right">{{fnMoneyToString(calTotal())}}</div>
            </div>
            <!--
            <div class="summary-row saving">
                <div class="row-left">You save:</div>
                <div class="row-right">$40.00</div>
            </div>
            -->
        </div>
        <input type="button" class="btn btn-lg btn-primary form-control" value="CONTINUE">
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

