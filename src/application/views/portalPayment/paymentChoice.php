<form id="frmsub" action="/portal/order_place/review" method="post">
<div class="lynx_paymentComplete lynx_staticWidth" ng-controller="PortalOrderComplete">
    <h3>Chọn phương thức thanh toán</h3>
    <div class="lynx_orderInformation">
        <div class="lynx_orderInformationRow"><span class="lynx_fieldName">Mã đơn hàng  : </span><span class="lynx_fieldValue"><?php echo $order->id;?></span> <span class="lynx_fieldName">Mã hóa đơn  : </span><span class="lynx_fieldValue"><?php echo $order->invoice->id;?></span></div>
        <div class="lynx_orderInformationRow"><span class="lynx_fieldName">Ngày tạo  : </span><span class="lynx_fieldValue"><?php echo $order->created_date;?></span></div>
        <div class="lynx_orderInformationRow"><span class="lynx_fieldName">Tổng giá trị  : </span><span class="lynx_fieldValue"><?php echo $order->invoice->totalCost;?></span></div>
        <div class="lynx_orderInformationBlock">
            <h4>Hình thức thanh toán </h4>
            <div class="lynx_orderInformationRow">
                <table style="width:100%;">
                	<thead>
                		<tr>
                			<th></th>
                			<th>Loại thanh toán</th>
                			<th>Các tính phí</th>
                			<th>Chi phí buộc phải chụi (VND)</th>
                			<th>Chi phí hoàn thành (VND)</th>
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
                            <td><?php echo $totalfree; ?></td>
                            <td><?php echo $total; ?></td>
                        </tr>
                        <?php } ?>
                </table>
            </div>
        </div>
        <div class="lynx_orderInformationBlock">
            <div class="lynx_orderInformationRow lynx_buttonRow">
                    <button id="btnComfirm" class="btn btn-default btn-sm" type="submit">Quay trở lại Giỏ hàng</button>
                    <button id="btnComfirm" class="lynx_button btn btn-primary" type="submit">Tiếp theo</button>
            </div>
        </div>
    </div>
</div>
<input name="orderId" value="<?php echo $order->id;?>" type="hidden"/>
<input name="invoiceId" value="<?php echo $order->invoice->id;?>" type="hidden"/>
</form>