<div  class="width-960 left" ng-controller="PortalOrderEmailVerifyingController">
    <ul id="cart-process">
        <li class="passed">
            <div class="process-text">
                <span class="number">1</span> <label><?php echo $language[$view->view]->lblprocessCart;?></label>
            </div>
            <div class="process-visual">
                <div class="process-line"></div>
                <div class="process-line-cart"></div>
            </div>
        </li>
        <li class="passed">
            <div class="process-text">
                <span class="number">2</span> <label><?php echo $language[$view->view]->lblprocessShipping;?></label>
            </div>
            <div class="process-visual">
                <div class="process-line"></div>
                <div class="process-line-cart"></div>
            </div>
        </li>
        <li class="active">
            <div class="process-text">
                <span class="number">3</span> <label><?php echo $language[$view->view]->lblprocessPayment;?></label>
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
                        <form id="frmsub" novalidate action="/portal/order_verifing/email_verify" class="col-md-12 form-horizontal text-center" method="post" >
                            <?php 
                                if(isset($loginError)){
                                    echo "<div class='alert alert-danger alert-dismissable text-left' style='width: 100%'>
                                             {$language[$view->view]->loginWrongMsg}
                                          </div>";
                                }
                            ?>
                            <div class="form-group col-md-12" style="margin-top:30px">
                                
                                <label for="inputEmail3" class="col-sm-4 control-label text-left"><?php echo $language[$view->view]->txtEmailInput;?></label>
                                <div class="col-sm-8">
                                    <input id="mailInput" type="email" ng-model="email" name="email"  required aria-required="true" class="form-control" placeholder="email@mail.com " >
                                </div>
                                <label for="inputEmail3 text-left" class="col-sm-4 control-label "></label>
                                <div class="col-sm-8 text-left" style="line-height: 20px;">
                                    <input id="rbx-haveAccount-haveNot" name="rbx-haveAccount" ng-model="isHave" value="NOTHAVE" class="" type="radio"/>&nbsp; <?php echo $language[$view->view]->orderWithoutAccount;?> <br/>
                                    <input id="rbx-haveAccount" name="rbx-haveAccount" ng-model="isHave" value="HAVE" checked="checked"  class="" type="radio"/>&nbsp;<?php echo $language[$view->view]->orderWithAccount;?> <br/>
                                </div>
                                
                                <label for="inputEmail3" class="col-sm-4 control-label "></label>
                                <div class="col-sm-8 text-left" ng-class="{'disabled':isHave != 'HAVE'}" style="line-height: 20px;">
                                    <input id="pasInput"  ng-model="password" ng-disabled="isHave != 'HAVE'" type="password" name="password"  required aria-required="true" class="form-control" >
                                </div>
                                
                                <label for="inputEmail3" class="col-sm-4 control-label "></label>
                                <div class="col-sm-8 text-right" style="line-height: 20px;">
                                    <a style="float: right;" href="/portal/account/lost_password"><?php echo $language[$view->view]->lostPassword;?></a>
                                </div>
                                
                                <label for="inputEmail3" class="col-sm-4 control-label "></label>
                                <div class="col-sm-8 text-left" style="line-height: 20px;">
                                    <div class="pull-left" style="margin-top:10px;">
                                        <a href="/cart/shipping" class="btn-cart-prev" style="width: 150px;margin-right:10px">
                                            <div class="pull-left"><i class="fa fa-caret-left"></i></div><?php echo $language[$view->view]->lblGoBack?></a>
                                        <a href="javascript:;" ng-click="submitForm()" class="btn-cart-next" style="width: 150px;" data-type="submit">
                                            <?php echo $language[$view->view]->btnNext?><div class="pull-right"><i class="fa fa-caret-right"></i></div>
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
            <div class="cart-right col-xs-4">
                <div class="cart-summaries ">
                    <div class="inner">
                        <h4 class="left"><?php echo $language[$view->view]->lblOrderSummaries;?></h4>
                        <div class="product-summaries-table"> 
                            <div class="border-dashed">
                                <div class="tdleft"><strong class="ng-binding"><?php echo $language[$view->view]->lblProducts;?> (<?php echo count($order->invoice->products);?>):</strong></div>
                                <div class="tdright"><strong class="ng-binding">{{fnMoneyToString(productPrices)}}</strong></div>
                            </div>
                            <div class="border-solid">
                                <div class="tdleft"><strong><?php echo $language[$view->view]->lblOrderShipping;?></strong></div>
                                <div class="tdright"><strong>{{fnMoneyToString(shippingPrices)}}</strong></div>
                            </div>
                            <div class="border-dashed">
                                <div class="tdleft"><strong><?php echo $language[$view->view]->lblOrderSubtotal;?></strong></div>
                                <div class="tdright"><strong>{{fnMoneyToString(orderInformation.invoice.totalCost - taxPrices)}}</strong></div>
                            </div>
                            <div class="border-dashed">
                                <div class="tdleft"><strong><?php echo $language[$view->view]->lblOrderTax;?></strong></div>
                                <div class="tdright"><strong>{{fnMoneyToString(taxPrices)}}</strong></div>
                            </div>
                            <div class="total">
                                <div class="tdleft"><strong><?php echo $language[$view->view]->lblOrderTotal;?></strong></div>
                                <div class="tdright"><strong>{{fnMoneyToString(orderInformation.invoice.totalCost)}}</strong></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shipping" ng-repeat="shipping in orderInformation.invoice.shippings">
                    <h5 ng-show="shipping.shipping_type == 'SHIP'"><?php echo $language[$view->view]->shippingTo;?></h5>
                    <h5 ng-show="shipping.shipping_type != 'SHIP'"><?php echo $language[$view->view]->paidTo;?></h5>
                    {{shipping.contact.full_name}}<br />
                    {{shipping.contact.street_address}}<br />
                    {{shipping.contact.state_province}}<br />
                    <?php echo $language[$view->view]->lblPhone;?> {{shipping.contact.telephone}}<br />
                    <br />
                    <strong ng-show="orderInformation.invoice.shippings.length == 1"><?php echo $language[$view->view]->lblUsingForShipping;?></strong>
                </div>
            </div>
    </div>
</div>

<script type="text/javascript">
     var orderInformation = <?php echo json_encode($order)?>;
</script>

