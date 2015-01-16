<?php 
    $contactShipping = '';
    $contactPay = null;
    $shippingsPrice = 0;
    foreach ($order->invoice->shippings as $shipping){
        if($shipping->shipping_type == "SHIP"){
            $contactShipping = $shipping->contact;
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
	Thông tin người mua: <br/>
	<div style="margin-left: 30px;">
		Họ và tên: <?php echo $contactPay->full_name;?><br/> 
		Email: <?php echo $contactPay->email_contact;?><br/>
		Số điện thoại: <?php echo $contactPay->telephone;?><br/> 
    </div>
	Nội dung đơn hàng:  <br/>
		<div style="margin-left: 30px;">Mã đơn hàng:<?php echo "{$order->id}"?><br/></div>

<table style="border-collapse: collapse; border-spacing: 0; display: table;">
    <thead>
      <tr>
        <th width="400px" style="text-align: left;">Sản phẩm</th>
        <th width="75px" style="text-align: left;">Số lượng</th>
        <th width="100px" style="text-align: left;">Tổng</th>
      </tr>
    </thead>
    <tbody>
    
    <?php 
        $productsPrice = 0;
        foreach ($order->invoice->products as $product)
        {
             if($product->seller_email != $target){
                continue;
             }
            $productsPrice  += $product->product_price;
            $priceFormated = number_format($product->product_price);
            $formatedDescript = strip_tags($product->short_description);
            echo "
            <tr>
                <td>
                    <img style='float: left; margin-right:10px' height='75px' width='75px' alt='' src='{$product->sub_image}'>
                    <p style='font-size:15px; font-weight:bold;margin:5px 0;'><a href='#' style='text-decoration: none;'>{$product->name}</a></p>
                    <p style='margin:5px 0;'>{$formatedDescript}</p>
                </td>
                <td style='padding: 5px; text-align:center;'>{$product->product_quantity}</td>
                <td style='padding: 5px;'>{$priceFormated}</td>
            </tr>";
        }
    ?>
    </tbody>
</table>
		
<div style="margin-left: 30px;">
         Tổng giá trị đơn hàng: <?php echo  number_format($productsPrice)?> <br/>
         Phí vận chuyển: <?php echo number_format($shippingsPrice);?><br/>
         Thành tiền: <?php echo number_format($productsPrice + $shippingsPrice)?><br/>
         Ngày đặt hàng: <?php echo DateTime::createFromFormat('Y-m-d H:i:s', $order->invoice->created_date)->format('d/m/Y');?><br/>
         Ngày giao hàng: <br/>
         Địa chỉ nhận hàng: <?php echo "{$contactShipping->street_address},{$contactShipping->city_district},{$contactShipping->state_province}"?><br/>
         Tình trạng: <?php echo (!isset($order->invoice->paid_date) || $order->invoice->paid_date == null) ? "Chưa thanh toán" :  "Đã thanh toán"?> <br/>
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

