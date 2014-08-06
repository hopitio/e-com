
<div class="lynx_paymentComplete lynx_staticWidth">
    
    <span style="font-size: 16px;color: red;display:<?php if($result){echo 'none';}?>;"><i class="glyphicon glyphicon-exclamation-sign"></i>Order Đã được xử lý xử lý hoặc đang thông tin order không đúng</span>
    
    <form id="frmsub" action="/portal/order_place/payment_choice" method="post" >
        <input name="orderId" value="<?php echo $orderId;?>" type="hidden"/>
        <input name="invoiceId" value="<?php echo $invoiceId;?>" type="hidden"/>
    </form>
</div>
<script type="text/javascript">
   $(document).ready(function(){
        <?php 
            if($result){echo "$('#frmsub').submit();";}
        ?>
       });
</script>