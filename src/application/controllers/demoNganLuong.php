<?
ob_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Demo payement</title>
</head>
<?php
//bạn thay đổi các thông tin sau // you must change these infomation
define('NGANLUONG_URL', 'https://www.nganluong.vn/checkout.php');
define('MERCHANT_ID', '24338');
define('MERCHANT_PASS', '12345612');
define('RECEIVER','hoannet@gmail.com');
require_once APPPATH . 'libraries/thirdParty/nganluong/nganluong.inc';

if (isset($_POST['submit'])) {
	// Lấy các tham số để chuyển sang Ngânlượng thanh toán:

 //$ten= $_POST["txt_test"];
    $receiver=RECEIVER;
	//Mã đơn hàng 
	$order_code=70;
	//Khai báo url trả về 
	
	$return_url="http://club50.vn/card/thanks/id/".$order_code;
	//Giá của cả giỏ hàng 
	$price =490000; 	
	//Thông tin giao dịch
	$transaction_info="Club-50SNA";
	$currency= "vnd";
	$quantity=10;
	$tax=11;
	$discount=12;
	$fee_cal=13;
	$fee_shipping=14;
	$order_description="mua thẻ Club 50 *|* DEMO Sản phẩm";
	$buyer_info="";
	$affiliate_code="";
    //Khai báo đối tượng của lớp NL_Checkout
	$nl= new NL_Checkout();
	$nl->nganluong_url = NGANLUONG_URL;
	$nl->merchant_site_code = MERCHANT_ID;
	$nl->secure_pass = MERCHANT_PASS;
	//Tạo link thanh toán đến nganluong.vn
	$url= $nl->buildCheckoutUrlExpand($return_url, $receiver, $transaction_info, $order_code, $price, $currency, $quantity, $tax, $discount , $fee_cal,    $fee_shipping, $order_description, $buyer_info , $affiliate_code);
	
	if ($order_code != "") {
		echo '<meta http-equiv="refresh" content="0;url='.$url.'">';
	}
	
}
?>
<script type="text/javascript">
function check(){
		var price = document.Test.txt_gia.value;
		
		if (price < 2000) {
		
		alert('Số tiền tối thiểu lớn hơn 2000 VNĐ');
		return false;
		}
		
	return true;	
}
</script>

<body>
<form name="Test"  method="post" action="" onsubmit="return check();">
<label><strong>Oder id:</strong></label>
<input  type="text" name="txt_madonhang" size="28" placeholder="oder id" />
<br />
<label><strong>Price:</strong></label>
<input name="txt_gia" type="text" size="28" placeholder="price" />
<br />
<input  type="submit" name="submit" value="Thanh toán">
</form>
</body>
</html>

