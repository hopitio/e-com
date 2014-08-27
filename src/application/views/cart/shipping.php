<?php
defined('BASEPATH') or die('No direct script access allowed');
/* @var $shippingMethods ShippingMethodDomain */
?>
<div ng-app="lynx" ng-controller="cartShippingCtrl" class="width-960 left">
    <ul id="cart-process">
        <li class="passed">
            <div class="process-text">
                <span class="number">1</span>
                <label>Giỏ hàng</label>
            </div>
            <div class="process-visual">
                <div class="process-line"></div>
                <div class="process-line-cart"></div>
            </div>
        </li>
        <li class="active">
            <div class="process-text">
                <span class="number">2</span>
                <label>Thông tin giao hàng</label>
            </div>
            <div class="process-visual">
                <div class="process-line"></div>
                <div class="process-line-cart"></div>
            </div>
        </li>
        <li class="">
            <div class="process-text">
                <span class="number">3</span>
                <label>Thông tin thanh toán</label>
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
                <legend>Nhập địa chỉ giao hàng</legend>
                <div class="row">
                    <div class="col-xs-8 col-xs-offset-2">
                        <div class="form-group">
                            <label class="col-xs-4 control-label" for="txt_name"><span class="required">* </span>Họ và tên</label>
                            <div class="col-xs-8 control">
                                <input type="text" name="txt_name" id="txt_name" class="form-control" data-rule-required="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label" for="txt_phone"><span class="required">* </span>Số điện thoại</label>
                            <div class="col-xs-8 control">
                                <input type="text" name="txt_phone" id="txt_phone" class="form-control" data-rule-required="true">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label class="col-xs-4 control-label" for="sel_province"><span class="required">* </span>Tỉnh/Thành phố</label>
                            <div class="col-xs-8 control">
                                <select name="sel_province" id="sel_province" class="form-control" data-rule-required="true" ng-model="selectedProvince">
                                    <option ng-repeat="(k, v) in provinces" value="{{k}}">{{v}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label" for="txt_address"><span class="required">* </span>Địa chỉ</label>
                            <div class="col-xs-8 control">
                                <input type="text" name="txt_address" id="txt_address" class="form-control" data-rule-required="true" placeholder="Số nhà, đường (tòa nhà), phường/xã">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label" for="txt_language">Ngôn ngữ của bạn là gì?</label>
                            <div class="col-xs-8 control">
                                <input type="text" name="txt_language" id="txt_language" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
            <fieldset id="field-shipping">
                <legend>Phương thức vận chuyển</legend>
                <div class="row" ng-if="mode === 'simple'">
                    <ul class="col-xs-6">
                        <li class="color-{{$index + 1}}" ng-repeat="method in simpleData.methods">
                            <input 
                                type="radio" name="rad_sp_method" id="rad_sp_method_{{$index}}" ng-model="simpleData.selected_index"
                                value="{{$index}}" ng-checked="$index === simpleData.selected_index"
                                >
                            <label for="rad_sp_method_{{$index}}">{{method.label}}:</label>
                            <div class="price">{{fnMoneyToString(method.price)}}</div>
                        </li>
                    </ul>
                    <div class="col-xs-6 ">
                        <div class="color-1" id="method-desc">
                            {{simpleData.methods[simpleData.selected_index].desc}}
                        </div>
                    </div>
                </div>
            </fieldset>
            <h4></h4>
            <div class="pull-right">
                <a href="/cart/showCart" class="btn-cart-prev" style="width: 150px;">
                    <div class="pull-left"><i class="fa fa-caret-left"></i></div>Trở về
                </a>
                <a href="javascript:;" class="btn-cart-next" style="width: 150px;">
                    Tiếp tục<div class="pull-right"><i class="fa fa-caret-right"></i></div>
                </a>
            </div>
            <div class="clearfix"></div>
            <h4></h4>
            &nbsp;
            <h4></h4>
            <div style="height: 25px;line-height: 25px;">
                <i class="img-phone"></i>&nbsp;Bạn cần hỗ trợ? Gọi Hotline <span class="phone-no">098.999.999</span> hoặc <span class="phone-no">043.999.999</span>
            </div>
        </div>
        <div class="col-xs-4">
            <div class="cart-summaries">
                <div class="inner">
                    <h4>Tóm tắt</h4>
                    <div class="product-summaries-table">
                        <div class="border-dashed">
                            <div class="tdleft"><strong >Sản phẩm ({{countProducts}}):</strong></div>
                            <div class="tdright"><strong >{{fnMoneyToString(totalRawPrice)}}</strong></div>
                        </div>
                        <div class="border-solid">
                            <div class="tdleft"><strong>Vận chuyển:</strong></div>
                            <div class="tdright"><strong >{{fnMoneyToString(getShipPrice())}}</strong></div>
                        </div>
                        <div class="border-dashed">
                            <div class="tdleft"><strong >Thành tiền:</strong></div>
                            <div class="tdright"><strong >{{fnMoneyToString(totalRawPrice + getShipPrice())}}</strong></div>
                        </div>
                        <div class="border-solid">
                            <div class="tdleft"><strong>Thuế:</strong></div>
                            <div class="tdright"><strong >{{fnMoneyToString(productTotalTaxes + getShipPrice() * 0.1)}}</strong></div>
                        </div>
                        <div class="total">
                            <div class="tdleft"><strong>TỔNG TIỀN:</strong></div>
                            <div class="tdright"><strong>{{fnMoneyToString(totalRawPrice + productTotalTaxes + getShipPrice() * 1.1)}}</strong></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <br>
                    <a class="btn-cart-next" href="/cart/shipping" style="display: block;">
                        Tiếp tục
                        <div class="pull-right"><i class="fa fa-caret-right"></i></div>
                    </a>
                </div><!--inner-->
            </div>
        </div>
    </div><!--row-->
</div>
<script>
    var script_data = {
        provinces: <?php echo json_encode($provinces) ?>
    };
</script>