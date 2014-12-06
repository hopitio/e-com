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
    }
    $contactPay = $contactPay != null ? $contactPay : $contactShipping;
    
    $sellerName = '';
    foreach ($order->invoice->products as $product)
    {
        if($product->seller_email == $target){
            $sellerName = $product->seller_name;
        }
    }
?>

Xin chào <?php echo $sellerName;?>! <br/>
Chúc mừng bạn! Sản phẩm bạn đăng tại Sfriendly đã được bán và thanh toán xong. Sau đây là thông tin chi tiết về giao dịch: <br/>
<br/>
	<b>Thông tin người mua:</b> <br/>
	<div style="margin-left: 30px;">
		Họ và tên: <?php echo $contactPay->full_name;?><br/> 
		Email: <?php echo $contactPay->email_contact;?><br/>
		Số điện thoại: <?php echo $contactPay->telephone;?><br/> 
    </div>
    <br/>
	<b>Nội dung đơn hàng:</b>  <br/>
		<div style="margin-left: 30px;">Mã đơn hàng:<?php echo "SFRIENDLY {$order->id}"?><br/></div>

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
    </tfoot>
    
</table>
		
<div>
        <br/>
         Ngày đặt hàng: <?php echo DateTime::createFromFormat('Y-m-d H:i:s', $order->invoice->created_date)->format('d/m/Y');?><br/>
         Ngày giao hàng:<?php echo DateTime::createFromFormat('Y-m-d H:i:s',  $shippingInfor->estimated_min)->format('d/m/Y'); ?> <br/>
         Địa chỉ nhận hàng: <?php echo "{$contactShipping->street_address},{$contactShipping->city_district},{$contactShipping->state_province}"?><br/>
         Tình trạng: <?php echo (!isset($order->invoice->paid_date) || $order->invoice->paid_date == null) ? "Chưa thanh toán" :  "Đã thanh toán"?> <br/>
</div>
<div>
    <br/>
    Hãy đóng gói và nhanh chóng chuyển hàng cho Sfriendly để chúng tôi tiến hành vận chuyển cho khách hàng của bạn. Bạn sẽ nhận được tiền trong vòng tối đa 10 ngày kể từ ngày bạn chuyển hàng cho Sfriendly. <br/>
    <br/>
    Chú ý: Thời hạn vận chuyển của đơn hàng là 1-2 ngày, hãy chuyển cho Sfriendly sớm nhất để chúng tôi phục vụ khách hàng của bạn tốt nhất.<br/>
</div>
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

