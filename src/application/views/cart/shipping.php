<?php
defined('BASEPATH') or die('No direct script access allowed');
/* @var $shippingMethods ShippingMethodDomain */
?>
<div ng-app="lynx" ng-controller="cartShippingCtrl" class="width-960 left">
    <form method="post" action="/order/placeOrder" id="frmMain" class="form-validate">
        <ul id="cart-process">
            <li class="passed">
                <div class="process-text">
                    <span class="number">1</span>
                    <label><?php echo $language[$view->view]->lblYourCart ?></label>
                </div>
                <div class="process-visual">
                    <div class="process-line"></div>
                    <div class="process-line-cart"></div>
                </div>
            </li>
            <li class="active">
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

        <div class="row">
            <div class="col-xs-8">
                <fieldset>
                    <legend><?php echo $language[$view->view]->lblEnterShippingAddress ?></legend>
                    <div class="row">
                        <div class="col-xs-8 col-xs-offset-2">
                            <div class="form-group">
                                <label class="col-xs-4 control-label" for="txtFullname"><span class="required">* </span><?php echo $language[$view->view]->lblFullname ?></label>
                                <div class="col-xs-8 control">
                                    <input type="text" name="txtFullname" id="txtFullname" class="form-control" data-rule-required="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-4 control-label" for="txtPhoneNo"><span class="required">* </span><?php echo $language[$view->view]->lblPhoneNo ?></label>
                                <div class="col-xs-8 control">
                                    <input type="text" name="txtPhoneNo" id="txtPhoneNo" class="form-control" data-rule-required="true">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="col-xs-4 control-label" for="selProvinceCity"><span class="required">* </span><?php echo $language[$view->view]->lblCityProvince ?></label>
                                <div class="col-xs-8 control">
                                    <select name="selProvinceCity" id="selProvinceCity" class="form-control" data-rule-required="true" ng-model="selectedProvince">
                                        <optgroup ng-repeat="region in regions" label="{{region[0]}}">
                                            <option ng-repeat="province in region[1]" value="{{province[0]}}">{{province[1]}}</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-4 control-label" for="txtStreetAddr"><span class="required">* </span><?php echo $language[$view->view]->lblAddress ?></label>
                                <div class="col-xs-8 control">
                                    <input type="text" name="txtStreetAddr" id="txtStreetAddr" class="form-control" data-rule-required="true" placeholder="<?php echo $language[$view->view]->addressPlaceHolder ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-4 control-label" for="txtLanguage"><?php echo $language[$view->view]->lblYourLanguage ?></label>
                                <div class="col-xs-8 control">
                                    <input type="text" name="txtLanguage" id="txtLanguage" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset id="field-shipping">
                    <legend><?php echo $language[$view->view]->lblShippingMethod ?></legend>
                    <div class="pull-right">
                        <a href="javascript:;" ng-if="mode == 'simple'" ng-click="setMode('advance')"><?php echo $language[$view->view]->lblAdvancedOptions ?></a>
                        <a href="javascript:;" ng-if="mode == 'advance'" ng-click="setMode('simple')"><?php echo $language[$view->view]->lblSimpleOptions ?></a>
                    </div>
                    <div class="row" ng-if="mode === 'simple'">
                        <ul class="col-xs-6">
                            <li class="color-{{$index + 1}}" ng-repeat="method in simpleData.methods">
                                <input 
                                    type="radio" name="radShippingMethod" id="rad_sp_method_{{$index}}" ng-model="simpleData.selected_index"
                                    value="{{method.code}}" ng-checked="method.code === simpleData.selected_index"
                                    >
                                <label for="rad_sp_method_{{$index}}">{{method.label}}:</label>
                                <div class="price">{{fnMoneyToString(method.price)}}</div>
                            </li>
                        </ul>
                        <div class="col-xs-6 ">
                            <div class="color-1" id="method-desc">
                                {{getMethodDesc(simpleData.selected_index)}}
                            </div>
                        </div>
                    </div>
                    <div ng-if="mode == 'advance'">
                        <table class="product-table">
                            <thead>
                                <tr>
                                    <th width="55%"><?php echo $language[$view->view]->lblProduct ?></th>
                                    <th width="5%"><?php echo $language[$view->view]->lblQty ?></th>
                                    <th width="35%"><?php echo $language[$view->view]->lblShipping ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="product in products">
                                    <td>
                                        <div class="p-img">
                                            <a href="{{product.url}}" title="{{product.name}}">
                                                <img ng-src="/thumbnail.php/{{product.thumbnail}}/w=200">
                                            </a>
                                        </div>
                                        <div class="p-info">
                                            <a class="p-name" href="{{product.url}}" title="{{product.name}}">
                                                {{product.name}}
                                            </a>
                                        </div>
                                    </td>
                                    <td>{{product.quantity}}</td>
                                    <td>
                                        <select name="method[{{product.id}}]" style="width: 100%;" ng-model="product.shipping" class="form-control" ng-change="loadAdvanceData()">
                                            <option
                                                ng-repeat="method in advanceData.methods" 
                                                value="{{$index}}" ng-if="selectedProvince == 101 || (selectedProvice != 101 && method.codename != 'premium')"
                                                >
                                                {{method.label}}
                                            </option>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="right" style="overflow:hidden;">
                            <div class="product-summaries-table" style="width: 400px;display:inline-block">
                                <div ng-repeat="row in advanceData.calculatedPrices" ng-class="{
                                            'border-dashed' : $index < advanceData.calculatedPrices.length - 1, 'border-solid': $index === advanceData.calculatedPrices.length - 1}">
                                    <div class="tdleft left"><strong>{{row.method}}:</strong></div>
                                    <div class="tdright"><strong>{{fnMoneyToString(row.price)}}</strong></div>
                                </div>
                                <div class="total">
                                    <div class="tdleft left"><strong><?php echo $language[$view->view]->lblShipping ?>:</strong></div>
                                    <div class="tdright"><strong>{{fnMoneyToString(getShipPrice())}}</strong></div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div><!--if-->
                </fieldset>
                <h4></h4>
                <div class="pull-right">
                    <a href="/cart/showCart" class="btn-cart-prev" style="width: 150px;">
                        <div class="pull-left"><i class="fa fa-caret-left"></i></div><?php echo $language[$view->view]->lblBack ?>
                    </a>
                    <a href="javascript:;" class="btn-cart-next" style="width: 150px;" data-type="submit">
                        <?php echo $language[$view->view]->lblNext ?><div class="pull-right"><i class="fa fa-caret-right"></i></div>
                    </a>
                </div>
                <div class="clearfix"></div>
                <h4></h4>
                &nbsp;
                <h4></h4>
                <div style="height: 25px;line-height: 25px;">
                    <i class="img-phone"></i>&nbsp;<?php echo $language[$view->view]->supportText ?>
                </div>
            </div>
            <div class="col-xs-4">
                <div class="cart-summaries">
                    <div class="inner">
                        <h4><?php echo $language[$view->view]->lblSummaries ?></h4>
                        <div class="product-summaries-table">
                            <div class="border-dashed">
                                <div class="tdleft"><strong ><?php echo $language[$view->view]->lblProduct ?> ({{countProducts}}):</strong></div>
                                <div class="tdright"><strong >{{fnMoneyToString(totalRawPrice)}}</strong></div>
                            </div>
                            <div class="border-solid">
                                <div class="tdleft"><strong><?php echo $language[$view->view]->lblShipping ?>:</strong></div>
                                <div class="tdright"><strong >{{fnMoneyToString(getShipPrice())}}</strong></div>
                            </div>
                            <div class="border-dashed">
                                <div class="tdleft"><strong ><?php echo $language[$view->view]->lblSubtotal ?>:</strong></div>
                                <div class="tdright"><strong >{{fnMoneyToString(totalRawPrice + getShipPrice())}}</strong></div>
                            </div>
                            <div class="border-dashed">
                                <div class="tdleft"><strong><?php echo $language[$view->view]->lblTaxes ?>:</strong></div>
                                <div class="tdright"><strong >{{fnMoneyToString(productTotalTaxes)}}</strong></div>
                            </div>
                            <div class="border-solid">
                                <div class="tdleft"><strong><?php echo $language[$view->view]->lblTransferFee ?>:</strong></div>
                                <div class="tdright"><strong >----?</strong></div>
                            </div>
                            <div class="total">
                                <div class="tdleft"><strong><?php echo $language[$view->view]->lblTotal ?>:</strong></div>
                                <div class="tdright"><strong>{{fnMoneyToString(totalRawPrice + productTotalTaxes)}}</strong></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <br>
                        <a class="btn-cart-next" href="javascript:;" style="display: block;" data-type="submit">
                            <?php echo $language[$view->view]->lblNext ?>
                            <div class="pull-right"><i class="fa fa-caret-right"></i></div>
                        </a>
                    </div><!--inner-->
                </div>
            </div>
        </div><!--row-->
    </form>
</div>
<?php
$regions = array(
    array((string) $language[$view->view]->northernVietnam, array()),
    array((string) $language[$view->view]->centreVietnam, array()),
    array((string) $language[$view->view]->southernVietnam, array())
);
foreach ($provinces as $k => $v)
{
    $regions[floor($k / 100) - 1][1][] = array($k, $v);
}
?>
<script>
            var script_data = {
            regions: <?php echo json_encode($regions) ?>,
                    shippingMethods: <?php echo json_encode($shippingMethods) ?>
            };
</script>