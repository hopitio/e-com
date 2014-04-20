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
        $cartContents = CartMapper::make()
                ->autoloadAttributes()
                ->setLanguage(User::getCurrentUser()->languageKey)
                ->findAll();

        $shippingAddress                  = new stdClass();
        $shippingAddress->fullname        = isset($_POST['txtFullame']) ? $_POST['txtFullname'] : null;
        $shippingAddress->telephone       = isset($_POST['txtPhoneNo']) ? $_POST['txtPhoneNo'] : null;
        $shippingAddress->streetAddress   = isset($_POST['txtPhoneNo']) ? $_POST['txtPhoneNo'] : null;
        $shippingAddress->cityDistrict    = array(null, isset($_POST['txtPhoneNo']) ? $_POST['txtPhoneNo'] : null);
        $shippingAddress->stateProvince   = array(isset($_POST['selProvinceCity']) ? $_POST['selProvinceCity'] : null);
        $shippingAddress->stateProvince[] = LocationMapper::make()->filterCode($shippingAddress->stateProvince[0])->find()->name;
        $shippingMethod                   = isset($_POST['radShippingMethod']) ? $_POST['radShippingMethod'] : null;
        $shippingPrice                    = $this->cartModel->calculateShippingPrice($shippingMethod, $shippingAddress->stateProvince[0]);
        $orderEvidenceUID                 = $this->orderModel->generateEvidence($shippingAddress, $cartContents, $shippingMethod, $shippingPrice);

        $data = array(
            'cartContents'     => $cartContents,
            'addresses'        => array('shipping' => $shippingAddress),
            'shippingMethod'   => $shippingMethod,
            'shippingPrice'    => $shippingPrice,
            'orderEvidenceUID' => $orderEvidenceUID,
        );

        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)->setData($data)->render('order/placeOrder');
    }

    function verifyOrderEvidence()
    {
        $orderEvidenceKey = isset($_GET['evidencekey']) ? $_GET['evidencekey'] : null;
        $checksum         = isset($_GET['checksum']) ? $_GET['checksum'] : null;
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