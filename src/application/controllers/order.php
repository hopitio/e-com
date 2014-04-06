<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Mock data.
 * @author LE
 *
 */
class order extends BaseController
{

    protected $authorization_required = false;

    /** @var CartModel */
    public $cartModel;

    /** @var OrderEvidenceModel */
    public $orderEvidenceModel;

    function __construct()
    {
        parent::__construct();
        $this->load->model('modelEx/CartModel', 'cartModel');
        $this->load->model('modelEx/OrderEvidenceModel', 'orderEvidenceModel');
    }

    function placeOrder()
    {
        $cartContents = CartMapper::make()->autoloadAttributes(true, User::getCurrentUser()->languageKey)->findAll();

        $address = new UserAddressDomain;
        $address->fullname = isset($_POST['txtFullame']) ? $_POST['txtFullname'] : null;
        $address->telephone = isset($_POST['txtPhoneNo']) ? $_POST['txtPhoneNo'] : null;
        $address->streetAddress = isset($_POST['txtPhoneNo']) ? $_POST['txtPhoneNo'] : null;
        $address->cityDistrict = isset($_POST['txtPhoneNo']) ? $_POST['txtPhoneNo'] : null;
        $address->fkStateProvince = isset($_POST['selProvinceCity']) ? $_POST['selProvinceCity'] : null;
        $shippingMethod = isset($_POST['radShippingMethod']) ? $_POST['radShippingMethod'] : null;
        $shippingPrice = $this->cartModel->calculateShippingPrice($shippingMethod, $address->fkStateProvince);

        $orderEvidenceID = $this->orderEvidenceModel->generateEvidence($address, $cartContents, $shippingMethod, $shippingPrice);

        $data = array(
            'cartContents' => $cartContents,
            'address' => $address,
            'shippingMethod' => $shippingMethod,
            'shippingPrice' => $shippingPrice
        );

        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)->setData($data)->render('order/placeOrder');
    }

    function showPage()
    {
        //MOCK

        $mockData = array(
            'secretKey' => '',
            'orderKey' => '',
            'su' => '',
            'user' => $this->obj_user,
            'callback' => '/callback',
            'products' => array(
                array(
                    'id' => '',
                    'name' => '',
                    'image' => '',
                    'sortDes' => '',
                    'price' => '',
                    'quantity' => '',
                    'totalPrices' => '',
                    'actualPrice' => ''
                ),
                array(
                    'id' => '',
                    'name' => '',
                    'image' => '',
                    'sortDes' => '',
                    'price' => '',
                    'quantity' => '',
                    'totalPrices' => '',
                    'actualPrice' => ''
                )
            ),
            'shipping' => array(
                'shippingKey' => '',
                'shippingDisplayName' => '',
                'shippingPrices' => '',
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