<?php
/* @var $product ProductFixedDomain */

//price
$txtPrice = new WrapDecorator('div', 'col-xs-8 row', new TextboxInput('txtPrice', 'pattr[price]', $product->getPriceMoney('VND')->getAmount()));
$txtPrice->get_a('TextboxInput')->setAttribute('data-rule-required', true)
        ->setAttribute('data-rule-number', true);
echo $txtPrice->decorate(new ControlGroupDecorator('Price:'));
?>

<div class="form-group" ng-app="lynx" ng-controller="taxCtrl" id="taxCtrl">
    <label class="col-sm-3 control-label">Taxes</label>
    <div class="col-sm-9">
        <div class="col-xs-8 row">
            <table class="table">
                <thead>
                    <tr>
                        <th width="10%">#</th>
                        <th width="20%">Thuế</th>
                        <th width="25%">Tính theo phần trăm</th>
                        <th width="25%">Tính theo số tiền</th>
                        <th width="20%">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="productTax in productTaxes">
                        <td>{{$index + 1}}</td>
                        <td>{{productTax.name}}</td>
                        <td>{{productTax.costPercent * 100}}%</td>
                        <td>{{productTax.costFixed}}</td>
                        <td>
                            <a href="javascript:;" ng-click="deleteTax(productTax.id)">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div style="text-align: right">
                <input type="button" class="btn input-sm" value="Thêm thuế" ng-click="addTax()">
                <select class="input-sm form-control input-size-medium" style="display: inline-block" ng-model="taxID">
                    <option></option>
                    <option ng-repeat="option in taxOptions" value="{{option.id}}" ng-if="!isTaxAdded(option.name)">{{option.name}}</option>
                </select>
            </div>
        </div>
    </div>
</div>

<script>
    var scriptData = {
        taxURL: '/seller/tax_product_service?productID=<?php echo $product->id ?>&language=<?php echo $lang ?>',
        taxOptions: <?php echo json_encode($taxeOptions) ?>,
        addTaxURL: '/seller/addTax',
        deleteTaxURL: '/seller/deleteTax',
        productID: <?php echo (int) $product->id ?>
    };
</script>
<script>
    $(function() {
        $('#txtPrice').keyup(function(evt) {
            var val = $(this).val();
            $(this).val(val.toString().replace(/,/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        }).keypress(function(evt) {
            var theEvent = evt || window.event;
            var key = theEvent.keyCode || theEvent.which;
            if ((key < 48 || key > 57) && !(key == 8 || key == 9 || key == 13 || key == 37 || key == 39)) {
                theEvent.returnValue = false;
                if (theEvent.preventDefault)
                    theEvent.preventDefault();
            }
        }).trigger('keyup');
    });
    (function(window, $, scriptData) {
        window.taxCtrl = function($scope, $http) {
            $scope.productTaxes = [];
            $scope.taxOptions = scriptData.taxOptions;
            $scope.taxID;

            $scope.isTaxAdded = function(taxName) {
                for (var i in $scope.productTaxes) {
                    var productTax = $scope.productTaxes[i];
                    if (productTax.name == taxName) {
                        return true;
                    }
                }
                return false;
            };


            function getTaxes(callback) {
                $http.get(scriptData.taxURL).success(function(data) {
                    $scope.productTaxes = data;
                    if (callback) {
                        callback();
                    }
                }).error(function() {
                    //todo
                });
            } //getTaxes
            getTaxes();

            $scope.addTax = function() {
                $.ajax({
                    type: 'post',
                    url: scriptData.addTaxURL,
                    data: {productID: scriptData.productID, taxID: $scope.taxID},
                    success: function() {
                        getTaxes(function() {
                            setTimeout(function() {
                                $scope.$apply();
                            });
                        });
                    },
                    error: function() {
                        //todo
                    }
                });
            };//addTax

            $scope.deleteTax = function(taxID) {
                $.ajax({
                    type: 'post',
                    url: scriptData.deleteTaxURL,
                    data: {taxID: taxID, productID: scriptData.productID},
                    success: function() {
                        getTaxes(function() {
                            setTimeout(function() {
                                $scope.$apply();
                            });
                        });
                    },
                    error: function() {
                        //todo
                    }
                });
            };
        };
    })(window, $, scriptData);
</script>