<?php 
    $contactShipping = '';
    $contactPay = null;
    $shippingsPrice = 0;
    $shippingInfor = null;
    foreach ($order->invoice->shippings as $shipping){
        
        if($shipping->shipping_type == "SHIP"){
            $contactShipping = $shipping->contact;
            $shippingInfor = $shipping;
        }
        if($shipping->shipping_type == "PAY"){
            $contactPay = $shipping->contact;
        }
        $shippingsPrice += $shipping->price;
    }
    $contactPay = $contactPay != null ? $contactPay : $contactShipping;
    $paymentType = $order->invoice->payment_method == DatabaseFixedValue::PAYMENT_BY_CASH ? "Giao hàng thu tiền" : "Thanh toán chuyển khoản";
    if($order->invoice->payment_method == DatabaseFixedValue::PAYMENT_BY_NGANLUONG || 
       $order->invoice->payment_method == DatabaseFixedValue::PAYMENT_BY_ONEPAY || 
       $order->invoice->payment_method == DatabaseFixedValue::PAYMENT_BY_VISA){
        $paymentType = "Thanh toán điện tử";
    }
    
?>
<p style="padding:0px; margin:0px;" > Xin chào <?php echo $contactPay->full_name;?>,</p>
<p style="padding:0px; margin:0px;" >Bạn đã đặt hàng thành công! Đây là thông tin đơn hàng của bạn:</p>
<p style="padding:0px; margin:0px;" ><strong>Thông tin người mua: </strong></p>
<div style="padding-left: 30px;">
<p style="padding:0px; margin:0px;" >Họ và tên: <?php echo $contactPay->full_name;?></p>
<p style="padding:0px; margin:0px;" >Email: <?php echo isset($order->user->account) ? $order->user->account : "" ;?> </p>
<p style="padding:0px; margin:0px;" >Số điện thoại: <?php echo $contactPay->telephone;?></p>
</div>
<p style="padding:0px; margin:0px;" ><strong>Nội dung đơn hàng: </strong></p>
<p style="padding:0px; margin:0px;" >Mã đơn hàng: <?php echo "SFRIENDLY {$order->id}" ?><br/></p>
<br/>
<table style="border-collapse:collapse;border-color: #b6b9ba #b6b9ba; " border="1" cellspacing="0" cellpadding="0">
    <thead>
       <tr>
           <th valign="top" style="background: #215868;line-height: 30px;color: white; "><p style="padding:0px; margin:0px;" align="center">Sản phẩm/Dịch vụ</p></th>
           <th valign="top" style="background: #215868;line-height: 30px;color: white;"><p style="padding:0px; margin:0px;" align="center">Đơn giá</p></th>
           <th valign="top" style="background: #215868;line-height: 30px;color: white;"><p style="padding:0px; margin:0px;" align="center">Số lượng</p></th>
           <th valign="top" style="background: #215868;line-height: 30px;color: white;"><p style="padding:0px; margin:0px;" align="center">Thành tiền</p></th>
       </tr>
    </thead>
    <tbody>
        <!--  <tr>
            <td valign="top"><p style="padding:0px; margin:0px;" align="center">ABC</p></td>
            <td width="114" valign="top"><p style="padding:0px; margin:0px;" align="center">20.000 đ</p></td>
            <td width="102" valign="top"><p style="padding:0px; margin:0px;" align="center">2</p></td>
            <td width="151" valign="top"><p style="padding:0px; margin:0px;" align="right">40.000 đ</p></td>
        </tr >-->
        <?php 
        $productsPrice = 0;
        foreach ($order->invoice->products as $product){
        $productsPrice  += $product->product_price;
        $priceFormated = number_format($product->product_price);
        $sellPriceFormated = number_format($product->sell_price);
        $formatedDescript = strip_tags($product->short_description);
            echo "
            <tr>
                <td valign='top'><p style='padding:0px; margin:0px;' align='center'>{$product->name}</p></td>
                <td width='114' valign='top'><p style='padding:0px; margin:0px;' align='center'>{$sellPriceFormated} đ</p></td>
                <td width='102' valign='top'><p style='padding:0px; margin:0px;' align='center'>{$product->product_quantity}</p></td>
                <td width='151' valign='top'><p style='padding:0px; margin:0px;' align='right'>{$priceFormated} đ</p></td>
            </tr >";
        }
    ?>
     </tbody>
     <tfoot>
        <tr>
            <td width="223" rowspan="6" valign="top"></td>
            <td width="216" colspan="2" valign="top"><p style="padding:0px; margin:0px;" align="right"><strong>Tổng giá trị</strong></p></td>
            <td width="151" valign="top"><p style="padding:0px; margin:0px;" align="right"><strong><?php echo  number_format($productsPrice)?> đ</strong></p></td>
        </tr>
        <tr>
            <td width="216" colspan="2" valign="top"><p style="padding:0px; margin:0px;" align="right"><strong>Phí vận chuyển</strong></p></td>
            <td width="151" valign="top"><p style="padding:0px; margin:0px;" align="right"><strong><?php echo number_format($shippingsPrice);?> đ</strong></p></td>
        </tr>
        <tr>
            <td width="216" colspan="2" valign="top"><p style="padding:0px; margin:0px;" align="right"><strong>Thuế</strong></p></td>
            <td width="151" valign="top"><p style="padding:0px; margin:0px;" align="right"><strong>0 đ</strong></p></td>
        </tr>
        <tr>
            <td width="216" colspan="2" valign="top"><p style="padding:0px; margin:0px;" align="right"><strong>Ưu đãi</strong></p></td>
            <td width="151" valign="top"><p style="padding:0px; margin:0px;" align="right"><strong>-0 đ</strong></p></td>
        </tr>
        <tr>
            <td width="216" colspan="2" valign="top"><p style="padding:0px; margin:0px;" align="right"><strong>Tổng đơn hàng</strong></p></td>
            <td width="151" valign="top"><p style="padding:0px; margin:0px;" align="right"><strong><?php echo number_format($productsPrice + $shippingsPrice)?> đ</strong></p></td>
        </tr>
        </tfoot>
    
</table>
<br/>

<p style="padding:0px; margin:0px;" >Ngày đặt hàng: <?php echo DateTime::createFromFormat('Y-m-d H:i:s', $order->invoice->created_date)->format('d/m/Y');?></p>
<p style="padding:0px; margin:0px;" >Ngày dự kiến giao hàng:</p>
<p style="padding:0px; margin:0px;" >Địa chỉ nhận hàng: <?php echo "{$contactShipping->street_address},{$contactShipping->city_district},{$contactShipping->state_province}"?></p>
<p style="padding:0px; margin:0px;" >Hình thức thanh toán: <?php echo $paymentType; ?></p>
<p style="padding:0px; margin:0px;" >Chúng tôi sẽ đóng gói đơn hàng chuẩn bị cho việc vận chuyển. Thời hạn vận chuyển như sau: <?php echo $shippingInfor->display_name;?></p>
<p style="padding:0px; margin:0px;" >Trân trọng cảm ơn!</p>
     
<br/>
<br/>
Trân trọng cảm ơn!<br/>
<i>Sfriendly M.D</i><br/>
<hr/>
<i>Copyright © *Sfriendly Vietnam*, All rights reserved.</i><br/>
<br/>
Check our website:<br/>
<a href="www.sfriendly.com">www.sfriendly.com</a><br/>
<a href="www.sfriendly.com">www.sfriendly.vn</a><br/>
<br/>
F: facebook/sfriendlyvietnam<br/>
E: info@sfriendly.com<br/>
A: 19/62 Trần Bình, Mai Dịch, Cầu Giấy, Hn<br/>
<br/>
This email was sent from a notification-only address that cannot accept incoming email. Please do not reply to this message.
unsubscribe from this list  <br/>
<u>update subscription</u> &nbsp;&nbsp;&nbsp;&nbsp; <u>preferences</u> 
