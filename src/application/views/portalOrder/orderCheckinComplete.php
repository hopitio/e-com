<form action="/portal/order/submit" method="post">

<div>
    Đơn hàng của : <?php echo $user->firstname . ' ' . $user->lastname;?>
</div>
<div>
    Đơn hàng ngày đơn hàng : <?php echo date(DatabaseFixedValue::DEFAULT_FORMAT_DATE);?>
</div>
<div>
	Đơn vị tiền tệ : <select name="currency" method="post">
        <?php foreach (array_keys($currency) as $item){?>
            <option value="<?php echo $item;?>">
                <?php echo $currency[$item];?>
            </option>
        <?php }?>
    </select>
</div>
<table>
	<thead>
		<tr>
			<td>ID</td>
			<td>HỆ THỐNG</td>
			<td>NAME</td>
			<td>ẢNH</td>
			<td>MÔ TẢ</td>
			<td>SỐ LƯỢNG</td>
			<td>GIÁ</td>
			<td>GIÁ THỰC</td>
			<td>TỔNG GIÁ</td>
		</tr>
	</thead>
	<tbody>
        <?php
        $totalPriceAll = 0; 
        foreach ($order->products as $product){
            $totalPriceAll += $product->totalPrice;
        ?>
        <tr>
			<td><?php echo $product->id; ?></td>
			<td><?php echo $order->su; ?></td>
			<td><?php echo $product->name; ?></td>
			<td><img src="<?php echo $product->image; ?>" /></td>
			<td><?php echo $product->shortDesc; ?></td>
			<td><?php echo $product->quantity; ?></td>
			<td><?php echo $product->price; ?></td>
			<td><?php echo $product->actualPrice; ?></td>
			<td><?php echo $product->totalPrice; ?></td>
		</tr>
        <?php }?>
    </tbody>
	<tfoot>
		<tr>
			<td>Tổng giá</td>
			<td><?php echo $totalPriceAll;?></td>
		</tr>
	</tfoot>
</table>

<div>
    Shipping : <?php echo $order->shipping->shippingDisplayName; ?>      Giá :<?php  echo $order->shipping->shippingPrice; ?>
</div>

<table>
	payment
	<thead>
		<tr>
			<th></th>
			<th>Loại thanh toán</th>
			<th>Các tính phí</th>
			<th>Chi phí buộc phải chụi</th>
			<th>Chi phí hoàn thành</th>
		</tr>
	</thead>
	
        <?php
        foreach (array_keys($payment) as $paymentKey){
            $totalPrices = $totalPriceAll + $order->shipping->shippingPrice;
            $freeSynx = $payment[$paymentKey]['isPercent'] == '1' ?  ($payment[$paymentKey]['value'] * 100).'%' : $payment[$paymentKey]['value'].' ';
            $totalfree = $payment[$paymentKey]['isPercent'] == '1' ? ($payment[$paymentKey]['value'] * $totalPrices) : $payment[$paymentKey]['value'];
            $total = $totalPrices + $totalfree;
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
<input name="orderId" value="<?php echo $portalOrder['orderId'];?>" type="hidden"/>
<input name="invoiceId" value="<?php echo $portalOrder['invoiceId'];?>" type="hidden"/>
    <button>NEXT</button>
</form>

