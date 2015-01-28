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
    
    $sellerName = $order->invoice->products[0]->seller_name;
?>
<div style="background: white; margin-top: 11.25pt;">
    <p> Chào <?php echo $sellerName;?>,  </p>
    
    <p> Chúng tôi đã hoàn tất việc giao đơn hàng cho khách hàng</p>
    
    <p>
        <b>Nội dung đơn hàng:  </b><br/>
        Mã đơn hàng : <?php echo $order->id;?>
    </p>
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
            //log_message('error',json_encode($order->invoice->products));
            foreach ($order->invoice->products as $product){
                if(!$product->is_visiable){
                    continue;
                }
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
    
    <p><br/>Bạn sẽ nhận được tiền hàng trong vòng tối đa 10 ngày theo quy định của Sfriendly. Bạn có thể kiểm tra số dư tài khoản của mình tại đây: Balance</p>
    <p><br/>Trân trọng cảm ơn bạn đã chọn Sfriendly và hi vọng bạn hài lòng với sản phẩm, cũng như tiếp tục sử dụng dịch vụ của chúng tôi!</p>
        
    
    
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