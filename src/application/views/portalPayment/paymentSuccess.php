<div class="lynx_paymentComplete lynx_staticWidth" >
    <h3><?php echo $language[$view->view]->lblNotify;?></h3>
    <div class="lynx_orderInformation ">
        <div class="lynx_orderInformationRow">
            <?php if(!$isError){ va?>
                <span style="text-align: center;width:100%;display: inline-block;">
                    <?php echo str_replace("{checking_order_link}", $order_information_url, $language[$view->view]->lblSucessMsg);?>
                </span>
            <?php }else {?>
                <span style="text-align: center;width:100%;display: inline-block;">
                    <?php echo $language[$view->view]->lblFaileMsg;?>
                </span>
            <?php }?>
        </div>
        <form id="frm-back" action="/portal/order_place/payment_choice" method="post">
            <input type="hidden" name="orderId" value="<?php echo isset($orderId) ? $orderId : "";?>"/>
            <input type="hidden" name="invoiceId" value="<?php echo isset($invocieId) ? $invocieId : "";?>"/>
        </form>
    </div>
</div>

<script type="text/javascript">
    function submitBack(){
        $(document).ready(function(){$("#frm-back").submit();});
    }
    <?php echo isset($isBack) ? "submitBack()" : "";?>
</script>