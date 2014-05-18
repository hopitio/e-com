<?php
class mockNganLuongPayment extends BaseController{

    function mockPaymentNganLuong(){
        
        /*http://localhost.com/portal/__mock/ngan_luong_payment
         * ?merchant_site_code=33812
         * &return_url=http%3A%2F%2Flocalhost.com%2Fportal%2Forder%2Fnganluong_callback
         * &receiver=transaction%40sfriendly.com
         * &transaction_info=Giao+d%E1%BB%8Bch+t%E1%BA%A1i+SFRIENDLY.COM
         * &order_code=SFRIENDLY+184+-+184
         * &price=2000
         * &currency=vnd
         * &quantity=1
         * &tax=1
         * &discount=0
         * &fee_cal=2
         * &fee_shipping=1
         * &order_description=Pha+l%C3%AA+d%C3%A2u%281%29
         * &buyer_info=%2A%7C%2A%2A%7C%2A%C3%A1dasdasd%2A%7C%2A101%2Chanoi%2C+%2C%C3%A1dasdasd%2C+%C3%A1dasdasd
         * &affiliate_code=
         * &secure_code=7ed50c08ab5f8b841a2b33a64c8c08ce
        */
        //Đọc dữ liệu Request
        $getData = $this->getQueryStringParams();
        $return_url = $getData['return_url'];
        $receiver = $getData['receiver'];
        $transaction_info = $getData['transaction_info'];
        $order_code = $getData['order_code'];
        $price = $getData['price'];
        $quantity = $getData['quantity'];
        $tax = $getData['tax'];
        $discount = $getData['discount'];
        $fee_cal = $getData['fee_cal'];
        $fee_shipping = $getData['fee_shipping'];
        $buyer_info = $getData['buyer_info'];
        $affiliate_code = $getData['affiliate_code'];
        $secure_code = $getData['secure_code'];
        
        /*http://sfriendly.com/portal/order/nganluong_callback?
        *          transaction_info=Giao+d%E1%BB%8Bch+t%E1%BA%A1i+SFRIENDLY.COM
        *          &order_code=SFRIENDLY+186+-+186
        *          &price=2002
        *          &payment_id=9809287
        *          &payment_type=2
        *          &error_text=
        *          &secure_code=580458c31fec07c6b61d616e0b357d62
        *          &token_nl=9196813-d9159a30b93693fa20dee285e431c3b6
        */
        //Tạo đường dẫn trả về.
        $query = array(
            'transaction_info'=>$transaction_info,
            'order_code' => $order_code,
            'payment_id' => md5('LYNX_TEAM'),
            'price' => 2000,
            'payment_type' => 2,
            'error_text' => '',
            'secure_code' => '',
            'token_nl'=>'9196813-d9159a30b93693fa20dee285e431c3b6'
        );
        $nganLuongConfig = get_instance()->config->item('ngan_luong');
        $return_url =  $return_url."?order_code={$query['order_code']}&price={$query['price']}&transaction_info={$query['transaction_info']}&payment_id={$query['payment_id']}&payment_type={$query['payment_type']}&error_text={$query['error_text']}&secure_code={$query['secure_code']}&token_nl={$query['token_nl']}";
        redirect($return_url);
    }
    
}