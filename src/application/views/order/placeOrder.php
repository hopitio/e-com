<?php
defined('BASEPATH') or die('No direct script access allowed');

/* @var $cartContents CartDomain */
$user = User::getCurrentUser();
$user->fullname = $user->getFullname();
$json = array(
    'secretKey' => $user->secretKey,
    'orderkey'  => $orderEvidenceUID,
    'su'        => 'GIFT',
    'user'      => $user,
    'products'  => array(),
    'shipping'  => array(
        'shippingKey'         => $shippingMethod . '-' . 'projecte',
        'shippingDisplayName' => $shippingMethod,
        'shippingPrice'       => $shippingPrice
    ),
    'addresses' => $addresses
);

foreach ($cartContents as $cartInstance)
{
    $images = $cartInstance->getImages('thumbnail');
    $json_product = array(
        'id'          => $cartInstance->id,
        'name'        => $cartInstance->getName()->getTrueValue(),
        'image'       => base_url($images[0]->url),
        'shortDesc'   => $cartInstance->getDescription()->getTrueValue(),
        'price'       => $cartInstance->getPriceMoney(User::getCurrentUser()->getCurrency())->getAmount(),
        'quantity'    => $cartInstance->quantity,
        'totalPrice'  => $cartInstance->getPriceMoney(User::getCurrentUser()->getCurrency())->getAmount() * $cartInstance->quantity,
        'actualPrice' => $cartInstance->getPriceMoney(User::getCurrentUser()->getCurrency())->getAmount() * $cartInstance->quantity,
        'taxes'       => array(),
        'sellerName'  => $cartInstance->sellerName,
        'sid'         => $cartInstance->sid
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