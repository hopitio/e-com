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
        $shippingsPrice += $shipping->price;
    }
    $contactPay = $contactPay != null ? $contactPay : $contactShipping;
?>
Xin chào <?php echo $contactPay->full_name;?>!<br/>
<br/>
     Bạn đã đặt hàng thành công! Đây là thông tin đơn hàng của bạn: <br/>
<br/>
     Thông tin người mua: <br/>
    <div style="margin-left: 30px;">
         Họ và tên: <?php echo $contactPay->full_name;?><br/>
         Email: <?php echo $contactPay->email_contact;?><br/>
         Số điện thoại: <?php echo $contactPay->telephone;?><br/> 
         Nội dung đơn hàng: <br/>
         Mã đơn hàng: <?php echo "SFRIENDLY {$order->id}" ?><br/> 
    </div>
<br/>

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
        foreach ($order->invoice->products as $product){
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

<br/>
<div style="margin-left:30px;">
         Tổng giá trị đơn hàng: <?php echo  number_format($productsPrice)?> <br/>
         Phí vận chuyển: <?php echo number_format($shippingsPrice);?><br/>
         Thành tiền: <?php echo number_format($productsPrice + $shippingsPrice)?><br/>
         Ngày đặt hàng: <?php echo DateTime::createFromFormat('Y-m-d H:i:s', $order->invoice->created_date)->format('d/m/Y');?><br/>
         Ngày giao hàng: <br/>
         Địa chỉ nhận hàng: <?php echo "{$contactShipping->street_address},{$contactShipping->city_district},{$contactShipping->state_province}"?><br/>
         Tình trạng: <?php echo (!isset($order->invoice->paid_date) || $order->invoice->paid_date == null) ? "Chưa thanh toán" :  "Đã thanh toán"?> <br/>
</div>
<br/>
     Chúng tôi sẽ nhanh chóng liên hệ với bạn. Trân trọng cảm ơn! <br/>
     
     
<br/>
<br/>
Công ty TNHH Hoàng Quân<br/>
(Địa chỉ)………..<br/>
SDT: 090 770 4437/ 09xxxxxxxx<br/>
Website: www.sfriendly.vn<br/>
