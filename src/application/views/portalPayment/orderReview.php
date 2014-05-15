<form id="frmsub" action="/portal/order_place/submit_order_gateway" method="post">
<div class="lynx_paymentComplete lynx_staticWidth" ng-controller="PortalOrderComplete">
    <h3>Xác nhận đơn hàng</h3>
    <div class="lynx_orderInformation">
        <div class="lynx_orderInformationRow"><span class="lynx_fieldName">Mã đơn hàng  : </span><span class="lynx_fieldValue"><?php echo $order->id;?></span> <span class="lynx_fieldName">Mã hóa đơn  : </span><span class="lynx_fieldValue"><?php echo $order->invoice->id;?></span></div>
        <div class="lynx_orderInformationRow"><span class="lynx_fieldName">Ngày tạo  : </span><span class="lynx_fieldValue"><?php echo $order->created_date;?></span></div>
        
        <?php 
            foreach ($order->invoice->shippings as $shipping){
                $contact = $shipping->contact;
                if($shipping->shipping_type == 'SHIP' && $shipping->status == 'ACTIVE'){
                    ?>
                    <div class="lynx_orderInformationBlock">
                        <h4>Người Nhận</h4>
                        <div class="lynx_orderInformationRow"><span class="lynx_fieldName">Họ và tên  :</span><span class="lynx_fieldValue"><?php echo $contact->full_name;?></span></div>
                        <div class="lynx_orderInformationRow"><span class="lynx_fieldName">Số điện thoại  :</span><span class="lynx_fieldValue"><?php echo $contact->telephone;?></span></div>
                        <div class="lynx_orderInformationRow">
                            <span class="lynx_fieldName">Tỉnh/Thành phố  :</span><span class="lynx_fieldValue"><?php echo $contact->state_province;?></span>
                            <span class="lynx_fieldName">Quận huyện  :</span><span class="lynx_fieldValue"><?php echo $contact->city_district;?></span>
                        </div>
                        <div class="lynx_orderInformationRow">
                            <span class="lynx_fieldName">Cụ thể  :</span><span class="lynx_fieldValue"><?php echo $contact->street_address;?></span>
                        </div>
                    </div>
                    <?php
                    break;
                }
            }
        ?>
        <?php 
            foreach ($order->invoice->shippings as $shipping){
                $contact = $shipping->contact;
                if($shipping->shipping_type == 'PAY' && $shipping->status == 'ACTIVE'){
                    ?>
                    <div class="lynx_orderInformationBlock">
                        <h4>Người Thanh toán</h4>
                        <div class="lynx_orderInformationRow"><span class="lynx_fieldName">Họ và tên  :</span><span class="lynx_fieldValue"><?php echo $contact->full_name;?></span></div>
                        <div class="lynx_orderInformationRow"><span class="lynx_fieldName">Số điện thoại  :</span><span class="lynx_fieldValue"><?php echo $contact->telephone;?></span></div>
                        <div class="lynx_orderInformationRow">
                            <span class="lynx_fieldName">Tỉnh/Thành phố  :</span><span class="lynx_fieldValue"><?php echo $contact->state_province;?></span>
                            <span class="lynx_fieldName">Quận huyện  :</span><span class="lynx_fieldValue"><?php echo $contact->city_district;?></span>
                        </div>
                        <div class="lynx_orderInformationRow">
                            <span class="lynx_fieldName">Cụ thể  :</span><span class="lynx_fieldValue"><?php echo $contact->street_address;?></span>
                        </div>
                    </div>
                    <?php
                    break;
                }
            }
        ?>
        
        <div class="lynx_orderInformationBlock">
            <h4>Danh sách sản phẩm</h4>
            <div class="lynx_orderInformationRow">
                <table style="width:100%;border: solid 1px black;">
                	<thead>
                		<tr>
                		    <td style="width:20px">MÃ</td>
                		    <td style="width:110px">ẢNH</td>
                		    <td style="width:200px">NAME</td>
                			<td>MÔ TẢ</td>
                			<td style="width:20px">SỐ LƯỢNG</td>
                			<td style="width:20px">HỆ THỐNG</td>
                			<td style="width:100px">GIÁ (VND)</td>
                			<td style="width:100px">GIÁ THỰC (VND)</td>
                			<td style="width:100px">TỔNG GIÁ (VND)</td>
                		</tr>
                	</thead>
                	<tbody>
                        <?php
                        $totalPricesAll = 0;
                        foreach ($order->invoice->products as $product){
                            $allPrices = $product->total_price;
                            $totalTax = 0;
                            foreach ($product->taxs as $tax){
                                $totalTax += $tax->sub_tax_value;
                            }
                            $totalPricesAll += $allPrices + $totalTax;
                        ?>
                        <tr>
                            <td><?php echo $product->id; ?></td>
                            <td style="width:110px"><img width="100px" height="100px" src="<?php echo $product->sub_image; ?>" /></td>
                			<td><?php echo $product->name; ?></td>
                			<td>
                			     <?php echo $product->short_description; ?><br/>
                			     Bên bán : <?php echo $product->seller_name; ?>
                			</td>
                			<td><?php echo $product->quantity; ?></td>
                			<td><?php echo $order->sub_key; ?></td>
                			<td><?php echo number_format($product->price); ?></td>
                			<td><?php echo number_format($product->actual_price); ?></td>
                			<td>
                			     <?php echo number_format($product->total_price); ?>
                			     <?php 
                			        foreach ($product->taxs as $tax){
                                        echo '+'.number_format($tax->sub_tax_value)."({$tax->sub_tax_name})";
                                    }
                			     ?>
                			</td>
                		</tr>
                        <?php }?>
                    </tbody>
                	<tfoot>
                		<tr>
                			<td>Tổng giá</td>
                			<td></td>
                			<td></td>
                			<td></td>
                			<td></td>
                			<td></td>
                			<td></td>
                			<td></td>
                			<td><?php echo number_format($totalPricesAll);?>(VND)</td>
                		</tr>
                	</tfoot>
                </table>
            </div>
        </div>
        <div class="lynx_orderInformationBlock">
            <h4>Hình thức vận chuyển</h4>
            <div class="lynx_orderInformationRow">
                <table style="width:100%;border: solid 1px black;">
                	<thead>
                		<tr>
                		    <td style="width:20px">MÃ</td>
                		    <td >Dạng vận chuyển</td>
                		    <td >Hình thức vận chuyển</td>
                		    <td style="width:20px">Giá (VND)</td>
                		</tr>
                	</thead>
                	<tbody>
                	   <?php 
                	       $allShippingPrice = 0;
                	       foreach ($order->invoice->shippings as $shipping){
                            $allShippingPrice+=$shipping->price;
                	           ?>
                	            <td><?php echo $shipping->id;?></td>
                    		    <td ><?php echo $shipping->shipping_type;?></td>
                    		    <td ><?php echo $shipping->display_name;?></td>
                    		    <td><?php echo number_format($shipping->price);?></td>
                	           <?php
                	       }
                	       $totalPricesAll += $allShippingPrice;
                	   ?>
                            
                    </tbody>
                	<tfoot>
                		<tr>
                			<td>Tổng</td>
                		    <td></td>
                		    <td></td>
                		    <td><?php echo $allShippingPrice;?>(VND)</td>
                		</tr>
                	</tfoot>
                </table>
            </div>
        </div>
        <div class="lynx_orderInformationBlock">
            <h4>Chi phí khác </h4>
            <div class="lynx_orderInformationRow">
                <table style="width:100%;border: solid 1px black;">
                	<thead>
                		<tr>
                		    <td style="width:20px">MÃ</td>
                		    <td >Mô tả</td>
                		    <td style="width:20px">Giá (VND)</td>
                		</tr>
                	</thead>
                	<tbody>
                	   <?php 
                	       $allCostPrice = 0;
                	       foreach ($order->invoice->otherCosts as $cost){
                            $allCostPrice += $cost->value;
                	           ?>
                	           <tr>
                	            <td><?php echo $cost->id;?></td>
                    		    <td ><?php echo $cost->comment;?></td>
                    		    <td><?php echo number_format($cost->value);?></td>
                    		    </tr>
                	           <?php
                	       }
                	       $totalPricesAll += $allCostPrice;
                	   ?>
                            
                    </tbody>
                	<tfoot>
                		<tr>
                			<td>Tổng</td>
                		    <td></td>
                		    <td><?php echo number_format(ceil($allCostPrice));?>(VND)</td>
                		</tr>
                	</tfoot>
                </table>
            </div>
        </div>

         <div class="lynx_orderInformationBlock">
            <h4>Hóa đơn</h4>
            <div class="lynx_orderInformationRow">
             <span class="lynx_fieldName">Tổng giá trị đơn hàng  :</span><span class="lynx_fieldValue"><?php echo number_format(ceil($totalPricesAll));?>(VND)</span>
            </div>
        </div>
        
        <div class="lynx_orderInformationBlock">
            <div class="lynx_orderInformationRow lynx_buttonRow">
                    <button id="btnBack" class="btn btn-default btn-sm" type="button">Quay trở lại</button>
                    <button id="btnComfirm" class="lynx_button btn btn-primary" type="submit">THANH TOÁN ĐƠN HÀNG</button>
            </div>
        </div>
    </div>
</div>
<input name="orderId" value="<?php echo $order->id;?>" type="hidden"/>
<input name="invoiceId" value="<?php echo $order->invoice->id;?>" type="hidden"/>
<input name="paymentChoice" value="<?php echo $paymentChoice;?>" type="hidden"/>
</form>
<form id="frmBack" action="/portal/order_place/payment_choice" method="post">
    <input name="orderId" value="<?php echo $order->id;?>" type="hidden"/>
    <input name="invoiceId" value="<?php echo $order->invoice->id;?>" type="hidden"/>
</form>
<script type="text/javascript">
    $(document).ready(function(){
            $('#btnBack').click(function(){
                    $('#frmBack').submit();
                });
        });
</script>