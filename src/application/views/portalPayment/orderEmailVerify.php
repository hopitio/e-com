
<h1></h1>
<ul class="cart-breadcrums">
    <li class="bc-label"><i class="fa fa-shopping-cart"></i> <?php echo $language[$view->view]->paymentProcessCart;?></li>
    <li class="bc-label">&gt;&gt;&gt;&nbsp;<a href="javascript:;"><?php echo $language[$view->view]->paymentProcessPlaceOrder;?></a></li>
    <li class="bc-label">&gt;&gt;&gt;&nbsp;<a href="javascript:;"><?php echo $language[$view->view]->paymentProcessShipping;?></a></li>
    <li class="active">&gt;&gt;&gt;&nbsp;<a href="javascript:;"><?php echo $language[$view->view]->paymentProcessPaymentInfor;?></a></li>
    <li >&gt;&gt;&gt;&nbsp;<a href="javascript:;"><?php echo $language[$view->view]->paymentProcessPayment;?></a></li>
</ul>
<div class="row-wrapper left">
        <a class="cart-back" href="javascript:;" title="Go Back"><i class="fa fa-arrow-left"></i> <?php echo $language[$view->view]->lblGoBack;?></a>
</div>

<div class="row-wrapper">
        <div class="cart-left">
            <fieldset class="lynx_orderInformation">
                <div class="table-product" style="min-height: 200px;background-color: white;text-align: center;">
                    <legend style="text-align: left; padding:5px;"><?php echo $language[$view->view]->lblEmail;?></legend>
                    <form id="frmsub" novalidate action="/portal/order_verifing/email_verify" class="col-md-12 form-horizontal text-center" method="post">
                        <div class="form-group col-md-10" style="margin-top:30px">
                            <label for="inputEmail3" class="col-sm-3 control-label text-left">Email </label>
                            <div class="col-sm-9">
                                <input id="mailInput" type="email" name="email"  required="required"  aria-required="true" class="form-control" >
                            </div>
                            <label for="inputEmail3" class="col-sm-3 control-label text-left"></label>
                        </div>
                        <div class="form-group col-md-10" >
                            <label for="inputEmail3" class="col-sm-3 control-label text-left"></label>
                            <div class="col-sm-3">
                                <input type="submit" class="btn btn-lg btn-primary form-control" value="<?php echo $language[$view->view]->btnNext;?>">
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
        <div class="cart-right">
            <div class="cart-right-content">
                <h4 class="left"><?php echo $language[$view->view]->lblOrderSummaries;?></h4>
                <div class="summary-row">
                    <div class="row-left"><?php echo $language[$view->view]->lblOrderId;?></div>
                    <div class="row-right"><?php echo $order->id;?></div>
                </div>
                <div class="summary-row">
                    <div class="row-left"><?php echo $language[$view->view]->lblInvoiceId;?></div>
                    <div class="row-right"><?php echo $order->invoice->id;?></div>
                </div>
                <div class="summary-row">
                    <div class="row-left"><?php echo $language[$view->view]->lblCreateDate;?></div>
                    <div class="row-right"><?php echo $order->created_date;?></div>
                </div>
                <hr>
                <h4 class="left"><?php echo $language[$view->view]->lblOrderSummariesDetail;?></h4>
                <div class="summary-row">
                    
                    <div class="row-left"><?php echo $language[$view->view]->lblProducts;?> (<?php echo count($order->invoice->products);?>):</div>
                    <div class="row-right"><?php echo number_format(ceil($productPrices));?> đ</div>
                </div>
                <div class="summary-row">
                    <div class="row-left"><?php echo $language[$view->view]->lblOrderShipping;?> </div>
                    <?php 
                        $shippingPrices = 0;
                        foreach ($order->invoice->shippings as $shipping)
                        {
                            $shippingPrices += $shipping->price;
                        }
                    ?>
                    <div class="row-right"><?php echo number_format($shippingPrices);?> đ</div>
                </div>
                <hr>
                <div class="summary-row">
                    <div class="row-left"><?php echo $language[$view->view]->lblOrderSubtotal;?> </div>
                    <div class="row-right"><?php echo number_format(ceil($order->invoice->totalCost - $taxPrices));?> đ</div>
                </div>
                <div class="summary-row">
                    <div class="row-left"><?php echo $language[$view->view]->lblOrderTax;?></div>
                    <div class="row-right ng-binding"><?php echo number_format(ceil($taxPrices));?> đ</div>
                </div>
                
                <hr>
                <div class="summary-row total">
                    <div class="row-left"><?php echo $language[$view->view]->lblOrderTotal;?></div>
                    <div class="row-right ng-binding"><?php echo number_format(ceil($order->invoice->totalCost));?> đ</div>
                </div>
                
            </div>
            <input type="submit" class="btn btn-lg btn-primary form-control" value="<?php echo $language[$view->view]->btnNext;?>">
        </div>
    
    <div class="clearfix"></div>
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

