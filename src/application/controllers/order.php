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

    /** @var OrderModel */
    public $orderModel;

    function __construct()
    {
        parent::__construct();
        $this->load->model('modelEx/CartModel', 'cartModel');
        $this->load->model('modelEx/OrderModel', 'orderModel');
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

        $orderEvidenceUID = $this->orderModel->generateEvidence($address, $cartContents, $shippingMethod, $shippingPrice);

        $data = array(
            'cartContents' => $cartContents,
            'address' => $address,
            'shippingMethod' => $shippingMethod,
            'shippingPrice' => $shippingPrice,
            'orderEvidenceUID' => $orderEvidenceUID
        );

        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)->setData($data)->render('order/placeOrder');
    }

    function verifyOrderEvidence()
    {
        $orderEvidenceKey = isset($_GET['evidencekey']) ? $_GET['evidencekey'] : null;
        $checksum = isset($_GET['checksum']) ? $_GET['checksum'] : null;
        if (!$orderEvidenceKey || !$checksum)
        {
            throw new Lynx_RequestException('Bad request');
        }
        $isValid = $this->orderModel->verifyOrderEvidence($orderEvidenceKey, $checksum);
        echo json_encode($isValid);
    }

}

// class dumpOrder(){
//     public $secretKey,$orderKey,$su,$user,$products
// }
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */