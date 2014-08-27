<?php
defined('BASEPATH') or die('No direct script access allowed');
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
                                <select name="sel_province" id="sel_province" class="form-control" data-rule-required="true">

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label" for="txt_address"><span class="required">* </span>Địa chỉ</label>
                            <div class="col-xs-8 control">
                                <input type="text" name="txt_address" id="txt_address" class="form-control" data-rule-required="true" placeholder="Số nhà, đường (tòa nhà), phường/xã">
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
            <fieldset id="field-shipping">
                <legend>Phương thức vận chuyển</legend>
                <div class="row">
                    <ul class="col-xs-6">
                        <li class="color-1">
                            <input type="radio" value=""><label>Gói tiết kiệm (3-5 ngày):</label>
                            <div class="price">10,000đ</div>
                        </li>
                        <li class="color-2">
                            <input type="radio" value=""><label>Gói tiết kiệm (3-5 ngày):</label>
                            <div class="price">10,000đ</div>
                        </li>
                        <li class="color-3">
                            <input type="radio" value=""><label>Gói tiết kiệm (3-5 ngày):</label>
                            <div class="price">10,000đ</div>
                        </li>
                    </ul>
                    <div class="col-xs-6 ">
                        <div class="color-1" id="method-desc">
                            sadsd
                        </div>
                    </div>
                </div>
            </fieldset>
            <h4></h4>
            <div class="pull-right">
                <a href="javascript:;" class="btn-cart-next" style="width: 150px;">
                    Tiếp tục<div class="pull-right"><i class="fa fa-caret-right"></i></div>
                </a>
            </div>
        </div>
        <div class="col-xs-4">

        </div>
    </div><!--row-->
</div>

