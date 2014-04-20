<?php
defined('BASEPATH') or die('No direct script access allowed');
/* @var $shippingMethods ShippingMethodDomain */
/* @var $cartContents CartDomain */
?>
<div ng-app ng-controller="shippingCtrl">
    <form method="post" action="<?php echo site_url('order/placeOrder') ?>">
        <fieldset>
            <legend>Shipping Address</legend>
            <div>
                <label>Fullname</label>
                <div>
                    <input type="text" name="txtFullname">
                </div>
            </div>
            <div>
                <label>Phone number</label>
                <div>
                    <input type="text" name="txtPhoneNo">
                </div>
            </div>
            <div>
                <label>Address</label>
                <input type="text" name="txtStreetAddress">
            </div>
            <div>
                <label>City/District</label>
                <input type="text" name="txtCityDistrict">
            </div>
            <div>
                <label>Province</label>
                <select name="selProvinceCity" id="selProvinceCity" ng-model="province">
                    <?php echo ViewHelpers::getInstance()->options($provinces) ?>
                </select>
            </div>


        </fieldset>
        <fieldset>
            <legend>Shipping Method</legend>
            <div>
                <div>Name</div>
                <div>Transmit Time(after Payment is completed)</div>
                <div>Price</div>
            </div>
            <?php foreach ($shippingMethods as $method): ?>
                <div>
                    <div>
                        <label>
                            <input type='radio' name='radShippingMethod' ng-model="shippingMethod"
                                   value='<?php echo $method->codename ?>'>
                                   <?php echo $method->codename ?>
                        </label>
                    </div>
                    <div>
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
                    </div>
                    <div>USD</div>
                </div>
            <?php endforeach; ?>

        </fieldset>
        <fieldset>
            <legend>Gif Option</legend>
            <div>
                <label>Is this a gift(free gift wrap)</label>
                <div>
                    <label><input type='radio' name='radGift' value='1'>Yes, it is</label>
                </div>
                <div>
                    <label><input type='radio' name='radGift' value='0' checked>No, it isn't</label>
                </div>
            </div>
        </fieldset>
        <div>
            <input type='button' value='Back to Cart' onclick='backToCart()'>
            <input type='submit' value='Continue'>
        </div>
        <div>
            <div>Your order<div><?php echo count($cartContents) ?></div></div>
            <?php $orderSubtotal = 0; ?>
            <?php foreach ($cartContents as $cartProductInstance): ?>
                <?php
                $price           = $cartProductInstance->calculatePrice('USD');
                $taxes           = $cartProductInstance->calculateTaxes('USD');
                $productSubtotal = ($price + $taxes) * $cartProductInstance->quantity;
                $orderSubtotal+=$productSubtotal;
                ?>
                <div>
                    <?php echo $cartProductInstance->getName()->getTrueValue() ?>
                </div>
                <div>
                    Qty: <?php echo $cartProductInstance->quantity ?>
                    Price: <?php echo $price ?>
                    Taxes: <?php echo $taxes ?>
                    <strong><?php echo $productSubtotal ?></strong>
                </div>
            <?php endforeach; ?>

        </div>
    </form>

    <div ng-init="orderSubtotal = <?php echo $orderSubtotal ?>">
        Order subtotal <?php echo $orderSubtotal ?>
        ${{orderSubtotal}}
        {{shippingMethod}} {{shippingPrice}}
    </div>
    <div>
        <strong>Order total: ${{getOrderTotal()}}</strong>
    </div>
</div><!--angularjs-->

<script>
    var scriptData = {};
    scriptData.cartURL = '<?php echo site_url('cart/showCart') ?>';
    scriptData.priceURL = '<?php echo site_url('cart/shippingPriceService') ?>';
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
            $scope.shippingPrice = 0;
            $scope.orderSubtotal;

            $scope.$watch('province + shippingMethod', function() {
                if (!$scope.province || !$scope.shippingMethod) {
                    return;
                }
                var url = scriptData.priceURL + '?shipping=' + $scope.shippingMethod + '&location=' + $scope.province;
                $http.get(url, {cache: false}).success(function(price) {
                    $scope.shippingPrice = price;
                }).error(function() {
                    //TODO
                });
            });

            $scope.getOrderTotal = function() {
                return parseFloat($scope.orderSubtotal) + parseFloat($scope.shippingPrice);
            };
        };

    })(window, scriptData, $);
</script>

