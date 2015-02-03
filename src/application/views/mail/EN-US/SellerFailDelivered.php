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
    $lastInvoice = $order->invoice;
?>
<div style="background: white; margin-top: 11.25pt;">
    <p> Chào <?php echo $sellerName;?>,  </p>
    
    <p>Chúng tôi đã nhận được thông tin từ khách hàng đặt mua sản phẩm đang rao bán của bạn và đã giao hàng theo thông tin người mua cung cấp.</p>
    <p>Tuy nhiên, không có người nhận hàng cũng như không thể liên hệ được với người nhận hàng. </p>
    <?php echo $status->comment;?>
    <p>Chúng tôi sẽ nhanh chóng liên hệ với bạn khi có thông tin mới. Trân trọng cảm ơn! </p>

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
</div>