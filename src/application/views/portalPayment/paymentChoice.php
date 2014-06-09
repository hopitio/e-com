<form id="frmsub" action="/portal/order_place/review" method="post">
<h1></h1>
<ul class="cart-breadcrums">
    <li class="bc-label"><i class="fa fa-shopping-cart"></i> YOUR CART</li>
    <li class="bc-label">&gt;&gt;&gt;&nbsp;<a href="javascript:;">PLACE ORDER</a></li>
    <li class="bc-label">&gt;&gt;&gt;&nbsp;<a href="javascript:;">SHIPPING INFO</a></li>
    <li class="active">&gt;&gt;&gt;&nbsp;<a href="javascript:;">PAYMENT INFO</a></li>
    <li >&gt;&gt;&gt;&nbsp;<a href="javascript:;">THANH TOÁN</a></li>
</ul>
<div class="row-wrapper left">
        <a class="cart-back" href="javascript:;" title="Go Back"><i class="fa fa-arrow-left"></i> Go Back</a>
</div>

<div class="row-wrapper">
        <div class="cart-left">
            <?php 
                foreach ($order->invoice->shippings as $shipping){
                    $contact = $shipping->contact;
                    if($shipping->status == 'ACTIVE'){
                        ?>
                         <fieldset class="lynx_orderInformation">
                            <?php if($shipping->shipping_type == 'SHIP'){?>
                                <legend style="text-align: left;">Địa chỉ người nhận</legend>
                                
                            <?php }else{ ?>
                                <legend style="text-align: left;">Địa chỉ thanh toán</legend>
                            <?php } ?>
                            <div class="lynx_orderInformationRow"><span class="lynx_fieldName">Họ và tên  :</span><span class="lynx_fieldValue"><?php echo $contact->full_name;?></span></div>
                            <div class="lynx_orderInformationRow"><span class="lynx_fieldName">Số điện thoại  :</span><span class="lynx_fieldValue"><?php echo $contact->telephone;?></span></div>
                            <div class="lynx_orderInformationRow">
                                <span class="lynx_fieldName">Địa chỉ  :</span>
                                <span class="lynx_fieldValue"><?php echo $contact->street_address;?>, <?php echo $contact->city_district;?>, <?php echo $contact->state_province;?></span>
                            </div>
                        </fieldset>
                        <br>
                        <?php
                        break;
                    }
                }
            ?>
        
        <fieldset class="lynx_orderInformation">
            <legend style="text-align: left;">Sản phẩm</legend>
            <table class="table-product">
                <thead>
                    <tr>
                        <th width="100">&nbsp;</th>
                        <th width="400">PRODUCT</th>
                        <th width="200" class="right">PRICE</th>
                        <th width="100" class="center">QTY</th>
                        <th width="200" class="center">SUBTOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach ($order->invoice->products as $product)
                        {
                   ?>
                    <tr ng-class-even="'even'" ng-class-odd="'odd'">
                        <td class="center">
                            <a href="" title="product thumbnail">
                                <img class="product-thumbnail" src="<?php echo $product->sub_image;?>" alt="product thumbnail">
                            </a>
                        </td>
                        <td>
                            <a href="{{product.url}}" class="product-name"><?php echo $product->name;?></a><br>
                            <span class="product-seller"><?php echo $product->short_description;?></span><br>
                            <span class="product-seller">seller : <?php echo $product->seller_name;?></span><br>
                        </td>
                        <td class="right">
                            <span class="product-price"><?php echo number_format($product->price);?> đ</span><br>
                        </td>
                        <td class="center">
                            <?php echo $product->quantity;?>
                        </td>
                        <td class="center">
                            <span class="product-price"><?php echo number_format($product->total_price);?> đ</span>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                    <?php 
                    $productPrices = 0;
                    $taxPrices = 0;
                    foreach ($order->invoice->products as $product)
                    {
                        $productPrices += $product->price;
                        foreach ($product->taxs as $tax){
                            $taxPrices += $tax->sub_tax_value;
                        }
                    }
                    
                    ?>
                    <tr>
                        <td colspan="5" class="right">
                            <span class="product-total-label">TOTAL:</span>
                            <span class="product-total-price"><?php echo number_format($productPrices);?>đ</span><br>
                        </td>
                    </tr>
                </tbody>
            </table>
        </fieldset>
        <br>
        <br>
        <fieldset class="lynx_orderInformation">
            <legend style="text-align: left;">Phương thức thanh toán</legend>
            <div class="lynx_orderInformationBlock">
                <div class="lynx_orderInformationRow">
                    <table style="width:100%;">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Loại thanh toán</th>
                                <th>Các tính phí</th>
                                <th>Chi phí (VND)</th>
                            </tr>
                        </thead>
                            <?php
                            foreach (array_keys($payment) as $paymentKey){
                                $totalPrices = $order->invoice->totalCost;;
                                $freeSynx = $payment[$paymentKey]['isPercent'] == '1' ?  ($payment[$paymentKey]['value'] * 100).'%' : $payment[$paymentKey]['value'].' ';
                                $totalfree = $payment[$paymentKey]['isPercent'] == '1' ? ($payment[$paymentKey]['value'] * $totalPrices) : $payment[$paymentKey]['value'];
                                $total = $order->invoice->totalCost + $totalfree;
                            ?>
                            <tr>
                                <td><input checked type="radio" name="paymentChoice" value="<?php echo $paymentKey;?>" /></td>
                                <td><?php echo $payment[$paymentKey]['displayName'];?></td>
                                <td><?php echo $freeSynx;?></td>
                                <td><?php echo number_format(ceil($totalfree)); ?></td>
                            </tr>
                            <?php } ?>
                    </table>
                </div>
            </div>
            <div class="lynx_orderInformationBlock">
                <div class="lynx_orderInformationRow lynx_buttonRow">
                    <button id="btnComfirm" class="lynx_button btn btn-primary" type="submit">Tiếp theo</button>
                    <button id="btnComfirm" class="btn btn-default btn-sm" type="submit">Quay trở lại Giỏ hàng</button>
                </div>
            </div>
        </div>
        </fieldset>

            
        </div><!--cart-left-->
        <div class="cart-right">
            <div class="cart-right-content">
                <h4 class="left">Order information summaries</h4>
                <div class="summary-row">
                    <div class="row-left">Order Id :</div>
                    <div class="row-right"><?php echo $order->id;?></div>
                </div>
                <div class="summary-row">
                    <div class="row-left">Invoice Id :</div>
                    <div class="row-right"><?php echo $order->invoice->id;?></div>
                </div>
                <div class="summary-row">
                    <div class="row-left">Created date :</div>
                    <div class="row-right"><?php echo $order->created_date;?></div>
                </div>
                <hr>
                <h4 class="left">Order summaries</h4>
                <div class="summary-row">
                    
                    <div class="row-left">Products (<?php echo count($order->invoice->products);?>):</div>
                    <div class="row-right"><?php echo number_format(ceil($productPrices));?> đ</div>
                </div>
                <div class="summary-row">
                    <div class="row-left">Shipping:</div>
                    <?php 
                        $shippingPrices = 0;
                        foreach ($order->invoice->shippings as $shipping)
                        {
                            $shippingPrices += $shipping->price;
                        }
                    ?>
                    <div class="row-right"><?php echo $shippingPrices;?> đ</div>
                </div>
                <hr>
                <div class="summary-row">
                    <div class="row-left">Subtotal:</div>
                    <div class="row-right"><?php echo number_format(ceil($order->invoice->totalCost - $taxPrices));?> đ</div>
                </div>
                <div class="summary-row">
                    <div class="row-left">Taxes:</div>
                    <div class="row-right ng-binding"><?php echo number_format(ceil($taxPrices));?> đ</div>
                </div>
                
                <hr>
                <div class="summary-row total">
                    <div class="row-left">Total:</div>
                    <div class="row-right ng-binding"><?php echo number_format(ceil($order->invoice->totalCost));?> đ</div>
                </div>
                
            </div>
            <input type="submit" class="btn btn-lg btn-primary form-control" value="TIẾP THEO">
        </div>
    
    <div class="clearfix"></div>
</div>
<br><br><br>
<input name="orderId" value="<?php echo $order->id;?>" type="hidden"/>
<input name="invoiceId" value="<?php echo $order->invoice->id;?>" type="hidden"/>
</form>
