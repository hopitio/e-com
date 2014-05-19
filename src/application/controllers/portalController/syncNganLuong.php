<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');
class syncNganLuong extends BaseController
{
    protected $authorization_required = FALSE;
    function __construct(){
        parent::__construct();
        $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,strpos( $_SERVER["SERVER_PROTOCOL"],'/'))).'://';
        $ns = $protocol.$_SERVER['HTTP_HOST'].'/nganluong_server/sync';
        $this->nusoap_server = new soap_server(); // create soap server object
        $this->nusoap_server->configureWSDL("NGAN LUONG SYNC WEBSERVICE POWER BY LYNX TEAM ", $ns); // wsdl cinfiguration
        $this->nusoap_server->wsdl->schemaTargetNamespace = $ns; // server namespace
        $this->nusoap_server->register('UpdateOrder',array('transaction_info'=>'xsd:string','order_code'=>'xsd:string','payment_id'=>'xsd:int','payment_type'=>'xsd:int','secure_code'=>'xsd:string'),array('result'=>'xsd:int'),$ns);
        $this->nusoap_server->register('RefundOrder',array('transaction_info'=>'xsd:string','order_code'=>'xsd:string','payment_id'=>'xsd:int','refund_payment_id'=>'xsd:int','payment_type'=>'xsd:int','secure_code'=>'xsd:string'),array('result'=>'xsd:int'),$ns);
    }
    
    function index(){
        $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,strpos( $_SERVER["SERVER_PROTOCOL"],'/'))).'://';
        $ns = $protocol.$_SERVER['HTTP_HOST'].'/nganluong_server/sync';
        $HTTP_RAW_POST_DATA = (isset($HTTP_RAW_POST_DATA)) ? $HTTP_RAW_POST_DATA :'';
        $this->nusoap_server->service($HTTP_RAW_POST_DATA);
    }
    
    
    function UpdateOrder($transaction_info,$order_code,$payment_id,$payment_type,$secure_code)
    {
        global $secure_pass;
    
        // test lưu log kiểm tra  gọi cập nhật order:
        log_message('info', " Kết quả: ".$transaction_info." ".$order_code." ".$payment_id." ".$payment_type);
    
        // Kiểm tra chuỗi bảo mật
        $secure_code_new = md5($transaction_info.' '.$order_code.' '.$payment_id.' '.$payment_type.' '.$secure_pass);
        if($secure_code_new != $secure_code)
        {
            return -1; // Sai mã bảo mật
        }
        else // Thanh toán thành công
        {
            // Trường hợp là thanh toán tạm giữ. Hãy đưa thông báo thành công và cập nhật hóa đơn phù hợp
//             if($payment_type == 2)
//             {
//                 // Lập trình thông báo thành công và cập nhật hóa đơn
//             }
            // Trường hợp thanh toán ngay. Hãy đưa thông báo thành công và cập nhật hóa đơn phù hợp
//             elseif($payment_type == 1)
//             {
//                 // Lập trình thông báo thành công và cập nhật hóa đơn
//             }
            $nganLuongConfig = get_instance()->config->item('ngan_luong');
            $order_code = str_replace($nganLuongConfig['order_name'],'',$order_code);
            $order_code = str_replace(' ','',$order_code);
            list($orderId,$invoiceId) = explode('-',$order_code);
            $portalBizPayment = new PortalBizPayment();
            $portalBizPayment = new PortalBizPayment();
                $portalBizPayment->updateOrderToVerify(false, $orderId, $invoiceId);
                $portalBizPayment->updatePaymentMethod($invoiceId, $payment_id, DatabaseFixedValue::PAYMENT_BY_NGANLUONG);            
            return 1;
        }
    }
    
    function RefundOrder($transaction_info, $order_code, $payment_id, $refund_payment_id, $refund_amount, $refund_type, $refund_description, $secure_code)
    {
        $error = 'Chưa xác minh';
        $nganLuongConfig = get_instance()->config->item('ngan_luong');
        $md5 = $transaction_info." ".$order_code." ".$payment_id." ".$refund_payment_id." ".$refund_amount." ".$refund_type." ".$refund_description." ".PASSCODE;
        if (md5($md5) == strtolower($secure_code)) {
            $error = 'Thành công';
            $order_code = str_replace($nganLuongConfig['order_name'],'',$order_code);
            $order_code = str_replace(' ','',$order_code);
            list($orderId,$invoiceId) = explode('-',$order_code);
            $portalBizPayment = new PortalBizPayment();
            $portalBizPayment->updateOrderToReject(false, $orderId, $invoiceId);
            
        } else {
            $error = 'Tham số truyền bị thay đổi';
        }
        //log
        $params = array(
            'time'     => date('H:i(worry), d/m/Y', time()),
            'transaction_info'  => $transaction_info,
            'order_code'   => $order_code,
            'payment_id'   => $payment_id,
            'refund_payment_id'  => $refund_payment_id,
            'refund_amount'   => $refund_amount,
            'refund_type'   => $refund_type,
            'refund_description' => $refund_description,
            'secure_code'   => $secure_code,
            'error'     => $error
        );
        log_message('INFO',__FILE__.' '.__LINE__.' '.var_export($params,true));
        return array('error'=>$error);
    }
    

}