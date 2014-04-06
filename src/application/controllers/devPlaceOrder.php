<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Mock data.
 * @author LE
 *
 */
class devPlaceOrder extends BaseController {
    protected $authorization_required = false;
    
    function showPage(){
        //MOCK
        
        $mockData = array(
            'secretKey' => '',
            'orderKey' => '',
            'su' => '',
            'user' => $this->obj_user,
            'callback' => '/callback',
            'products'=> array(
                array(
                    'id'=>'',
                    'name'=>'',
                    'image'=>'',
                    'sortDes' => '',
                    'price' => '',
                    'quantity' => '',
                    'totalPrices'=>'',
                    'actualPrice'=>''
                ),
                array(
                    'id'=>'',
                    'name'=>'',
                    'image'=>'',
                    'sortDes' => '',
                    'price' => '',
                    'quantity' => '',
                    'totalPrices'=>'',
                    'actualPrice'=>''
                )
            ),
            'shipping'=>array(
                'shippingKey' => '',
                'shippingDisplayName' => '',
                'shippingPrices'=> '',
            )
        );
        
        $data = array(
            'json' => json_encode($mockData)
        );
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)->setData($data)->render('order/placeOrder');
    }
}

// class dumpOrder(){
//     public $secretKey,$orderKey,$su,$user,$products
// }
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */