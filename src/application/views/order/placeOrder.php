<?php
defined('BASEPATH') or die('No direct script access allowed');

/* @var $cartContents CartDomain */
/* @var $shippingMethods ShippingMethodDomain */
$user = User::getCurrentUser();
$user->fullname = $user->getFullname();
$json = array(
    'secretKey' => $user->secretKey,
    'orderkey'  => md5(uniqid()),
    'su'        => 'GIFT',
    'user'      => $user,
    'products'  => array(),
    'shipping'  => array(),
    'addresses' => $addresses
);
foreach ($shippingMethods as $method)
{
    $json['shipping'][] = array(
        'shippingKey'         => $method->codename . '-' . 'projecte',
        'shippingDisplayName' => $method->label,
        'shippingPrice'       => $method->price
    );
}

foreach ($cartContents as $cartInstance)
{
    $images = $cartInstance->getImages('thumbnail');
    $json_product = array(
        'id'          => $cartInstance->id,
        'name'        => (string) $cartInstance->getName(),
        'image'       => base_url($images[0]->url),
        'shortDesc'   => (string) $cartInstance->getDescription(),
        'price'       => $cartInstance->getPriceMoney(User::getCurrentUser()->getCurrency())->getAmount(),
        'quantity'    => $cartInstance->quantity,
        'totalPrice'  => $cartInstance->getPriceMoney(User::getCurrentUser()->getCurrency())->getAmount() * $cartInstance->quantity,
        'actualPrice' => $cartInstance->getPriceMoney(User::getCurrentUser()->getCurrency())->getAmount() * $cartInstance->quantity,
        'taxes'       => array(),
        'sellerName'  => $cartInstance->sellerName,
        'sellerEmail' => $cartInstance->sellerEmail,
        'sid'         => $cartInstance->sid,
        'shipping'    => $cartInstance->shipping
    );
    foreach ($cartInstance->taxes() as $tax)
    {
        $json_product['taxes'][] = array(
            'name'     => $tax->name,
            'totalTax' => $json_product['actualPrice'] * $tax->costPercent + $tax->costFixed * $cartInstance->quantity
        );
    }
    $json['products'][] = $json_product;
}
$json = json_encode($json);
var_dump($json);die;
?>
<div class="contentWarp wStaticPx" style="min-height:500px;">
    <script type="text/javascript">
        window.onload = function() {
            document.getElementById("submit").submit();
        };
    </script>
    <form id="submit" action="<?php echo get_instance()->config->item('portal_payment_entry'); ?>" method="POST">
        <input name='order' type="text" value='<?php echo $json; ?>' style="display:none;"/>
    </form>
</div> 