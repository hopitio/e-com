<?php
defined('BASEPATH') or die('No direct script access allowed');

/* @var $cartContents CartDomain */
$user = User::getCurrentUser();
$json = array(
    'secretKey' => '',
    'orderkey' => '',
    'su' => 'projecte',
    'callback' => site_url('order/portalConfirmation'),
    'user' => $user,
    'products' => array(),
    'shipping' => array(
        'shippingKey' => $shippingMethod . '-' . 'projecte',
        'shippingDisplayName' => $shippingMethod,
        'shippingPrice' => $shippingPrice
    )
);

foreach ($cartContents as $cartInstance)
{
    $images = $cartInstance->getImages();
    $json['products'][] = array(
        'id' => $cartInstance->id,
        'name' => $cartInstance->getName()->getTrueValue(),
        'image' => site_url($images[0]->getTrueValue()),
        'shortDesc' => $cartInstance->getDescription()->getTrueValue(),
        'price' => $cartInstance->getPrice('USD')->getTrueValue(),
        'quantity' => $cartInstance->quantity,
        'totalPrice' => $cartInstance->getPrice('USD')->getTrueValue() * $cartInstance->quantity,
        'actualPrice' => $cartInstance->calculatePrice('USD') * $cartInstance->quantity
    );
}
?>
<div class="contentWarp wStaticPx" style="min-height:500px;">
    <script type="text/javascript">
        window.onload = function() {
            document.getElementById("submit").submit();
        };
    </script>
    <form id="submit" action="/portal/payment_choice" method="POST">
        <input name='order' type="hidden" value="<?php echo $json; ?>" style="display:none;"/>
    </form>
</div> 