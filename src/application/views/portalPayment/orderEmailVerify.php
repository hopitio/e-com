<div  class="width-960 left">
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
        <li class="passed">
            <div class="process-text">
                <span class="number">2</span>
                <label>Thông tin giao hàng</label>
            </div>
            <div class="process-visual">
                <div class="process-line"></div>
                <div class="process-line-cart"></div>
            </div>
        </li>
        <li class="active">
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
    <div class="row-wrapper">
            <div class="cart-left col-xs-8">
                <fieldset class="lynx_orderInformation">
                    <div style="min-height: 200px;background-color: white;text-align: center; width:100%">
                        <legend style="text-align: left"><?php echo $language[$view->view]->lblEmail;?></legend>
                        <form id="frmsub" novalidate action="/portal/order_verifing/email_verify" class="col-md-12 form-horizontal text-center" method="post" ng-controller="PortalOrderEmailVerifyingController">
                            <?php 
                                if(isset($loginError)){
                                    echo "<div class='alert alert-danger alert-dismissable text-left' style='width: 100%'>
                                             Sai tên đăng nhập hoặc mật khẩu
                                          </div>";
                                }
                            ?>
                            <div class="form-group col-md-12" style="margin-top:30px">
                                
                                <label for="inputEmail3" class="col-sm-4 control-label text-left">Nhập vào địa chỉ E-mail: </label>
                                <div class="col-sm-8">
                                    <input id="mailInput" type="email" ng-model="email" name="email"  required="required"  aria-required="true" class="form-control" placeholder="email@mail.com " >
                                </div>
                                <label for="inputEmail3" class="col-sm-4 control-label "></label>
                                <div class="col-sm-8 text-left" style="line-height: 20px;">
                                    <input name="rbx-haveAccount" ng-model="isHave" value="NOTHAVE" class="" type="radio"/>&nbsp; Đặt hàng mà không cần đăng ký <br/>
                                    <input name="rbx-haveAccount" ng-model="isHave" value="HAVE" checked="checked"  class="" type="radio"/>&nbsp; Tôi đã có tài khoản tại Sfriendly.com  <br/>
                                </div>
                                
                                <label for="inputEmail3" class="col-sm-4 control-label "></label>
                                <div class="col-sm-8 text-left" ng-class="{'disabled':isHave != 'HAVE'}" style="line-height: 20px;">
                                    <input id="mailInput"  ng-model="password" ng-disabled="isHave != 'HAVE'" type="password" name="password"  required="required"  aria-required="true" class="form-control" >
                                </div>
                                
                                <label for="inputEmail3" class="col-sm-4 control-label "></label>
                                <div class="col-sm-8 text-right" style="line-height: 20px;">
                                    <a style="float: right;" href="/portal/account/lost_password">Quên mật khẩu</a>
                                </div>
                                
                                <label for="inputEmail3" class="col-sm-4 control-label "></label>
                                <div class="col-sm-8 text-left" style="line-height: 20px;">
                                    <div class="pull-left" style="margin-top:10px;">
                                        <a href="/cart/shipping" class="btn-cart-prev" style="width: 150px;margin-right:10px">
                                            <div class="pull-left"><i class="fa fa-caret-left"></i></div>Quay lại                    </a>
                                        <a href="javascript:;" ng-click="submitForm()" class="btn-cart-next" style="width: 150px;" data-type="submit">
                                            Tiếp tục<div class="pull-right"><i class="fa fa-caret-right"></i></div>
                                        </a>
                                    </div>
                                </div>
                                
                            </div>
                            <input name="orderId" value="<?php echo $order->id;?>" type="hidden"/>
                            <input name="invoiceId" value="<?php echo $order->invoice->id;?>" type="hidden"/>
                        </form>
                    </div>
                </fieldset>
            </div>
            <?php 
                $productPrices = 0;
                $taxPrices = 0;
                foreach ($order->invoice->products as $product)
                {
                    $productPrices += $product->product_price;
                    foreach ($product->taxs as $tax){
                        $taxPrices += $tax->sub_tax_value;
                    }
                }
            ?>
            <div class="cart-right col-xs-4">
                <div class="cart-summaries ">
                <div class="inner">
                    <h4 class="left"><?php echo $language[$view->view]->lblOrderSummaries;?></h4>
                    <div class="product-summaries-table"> 
                        <div class="border-dashed">
                            <div class="tdleft"><strong class="ng-binding"><?php echo $language[$view->view]->lblProducts;?> (<?php echo count($order->invoice->products);?>):</strong></div>
                            <div class="tdright"><strong class="ng-binding"><?php echo number_format(ceil($productPrices));?> đ</strong></div>
                        </div>
                        <div class="border-solid">
                            <?php 
                                $shippingPrices = 0;
                                foreach ($order->invoice->shippings as $shipping)
                                {
                                    $shippingPrices += $shipping->price;
                                }
                            ?>
                            <div class="tdleft"><strong><?php echo $language[$view->view]->lblOrderShipping;?></strong></div>
                            <div class="tdright"><strong><?php echo number_format($shippingPrices);?> đ</strong></div>
                        </div>
                        <div class="border-dashed">
                            <div class="tdleft"><strong><?php echo $language[$view->view]->lblOrderSubtotal;?></strong></div>
                            <div class="tdright"><strong><?php echo number_format(ceil($order->invoice->totalCost - $taxPrices));?> đ</strong></div>
                        </div>
                        <div class="border-dashed">
                            <div class="tdleft"><strong><?php echo $language[$view->view]->lblOrderTax;?></strong></div>
                            <div class="tdright"><strong><?php echo number_format(ceil($taxPrices));?> đ</strong></div>
                        </div>
                        <div class="total">
                            <div class="tdleft"><strong><?php echo $language[$view->view]->lblOrderTotal;?></strong></div>
                            <div class="tdright"><strong><?php echo number_format(ceil($order->invoice->totalCost));?> đ</strong></div>
                        </div>
                    </div>
                </div>
                <!-- <input type="submit" class="btn btn-lg btn-primary form-control" value="<?php //echo $language[$view->view]->btnNext;?>"> -->
                </div>
            </div>
    </div>


</div>









<script type="text/javascript">
    $("input[type=submit]").click(function(){
            var errors = $("#frmsub").validate().errorList;
            if(errors.length == 0){
                $("#frmsub").submit();
            }
        });
    function validateEmail(email) { 
        
        
    } 
</script>

