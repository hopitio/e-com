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
                ->setLanguage(User::getCurrentUser()->languageKey)
                ->autoloadTaxes()
                ->autoloadAttributes()
                ->findAll();
        $shippingAddress = new stdClass();
        $shippingAddress->fullname = $this->input->post('txtFullname');
        $shippingAddress->telephone = $this->input->post('txtPhoneNo');
        $shippingAddress->streetAddress = $this->input->post('txtStreetAddr');
        $shippingAddress->stateProvince = array($this->input->post('selProvinceCity'));
        $shippingAddress->stateProvince[] = LocationMapper::make()->filterCode($shippingAddress->stateProvince[0])->find()->name;
        $shippingAddress->language = $this->input->post('txtLanguage');

        $shippingMethods = ShippingMethodMapper::make()->setLanguage(User::getCurrentUser()->languageKey)->findAll();
        $shippingLocations = ShippingLocationMapper::make()->filterLocation(null, $shippingAddress->stateProvince[0])->findAll();
        $shippingMethodAll = $this->input->post('radShippingMethod');
        if (!$shippingMethodAll)
        {
            $productMethods = $this->input->post('method');
        }

        foreach ($cartContents as $product)
        {
            if ($shippingMethodAll)
            {
                foreach ($shippingMethods as $method)
                {
                    if ($method->codename == $shippingMethodAll)
                    {
                        break;
                    }
                }
            }
            else
            {
                $methodIndex = $productMethods[$product->id];
                $method = $shippingMethods[$methodIndex];
            }

            $productSumWeight = $product->getConvertedWeight() * $product->quantity;
            $method->sumWeight = isset($method->sumWeight) ? $method->sumWeight + $productSumWeight : $productSumWeight;
            $product->shipping = $method->codename;
        }
        foreach ($shippingMethods as $i => $method)
        {
            if (!isset($method->sumWeight))
            {
                unset($shippingMethods[$i]);
                unset($method);
                continue;
            }
            foreach ($shippingLocations as $location)
            {
                if ($location->fkShippingMethod != $method->id)
                {
                    continue;
                }
                $method->price = $this->cartModel->calculateShippingPrice($location, $method->sumWeight, new Currency(User::getCurrentUser()->getCurrency()));
            }
        }
        $data = array(
            'cartContents'    => $cartContents,
            'addresses'       => array('shipping' => $shippingAddress),
            'shippingMethods' => $shippingMethods
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