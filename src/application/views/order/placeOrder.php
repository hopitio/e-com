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
        'shippingPrice'       => $method->price,
        'estimateDateMin'     => $method->get_estimate_min()->format('Y-m-d H:i'),
        'estimateDateMax'     => $method->get_estimate_max()->format('Y-m-d H:i')
    );
}

foreach ($cartContents as $cartInstance)
{
    $shortDesRemovedHtmlTags = strip_tags(html_entity_decode($cartInstance->getDescription(), ENT_COMPAT, 'UTF-8'));
    $shortDes = mb_strlen($shortDesRemovedHtmlTags, 'UTF-8') > 50 ? mb_substr($shortDesRemovedHtmlTags, 0, 50, 'UTF-8') . '...' : $shortDesRemovedHtmlTags;
    $images = $cartInstance->getImages('thumbnail');
    $json_product = array(
        'id'          => $cartInstance->id,
        'name'        => (string) $cartInstance->getName(),
        'vn_name'     => $cartInstance->vn_name,
        'image'       => '/thumbnail.php/' . $images[0]->url,
        'shortDesc'   => $shortDes,
        'price'       => $cartInstance->getPriceMoney("VND")->getAmount(),
        'quantity'    => $cartInstance->quantity,
        'totalPrice'  => $cartInstance->getPriceMoney("VND")->getAmount() * $cartInstance->quantity,
        'actualPrice' => $cartInstance->getPriceMoney("VND")->getAmount() * $cartInstance->quantity,
        'sellerName'  => $cartInstance->sellerName,
        'sellerEmail' => $cartInstance->sellerEmail,
        'sid'         => $cartInstance->sid,
        'sellerId'   => $cartInstance->sellerId,
        'shipping'    => $cartInstance->shipping,
        'url'         => 'http://www.' . $_SERVER['HTTP_HOST'] . $cartInstance->getUrl()
    );
    $json['products'][] = $json_product;
}

$json = base64_encode(json_encode($json));
?>
<div class="contentWarp wStaticPx" style="min-height: 500px;">
    <script type="text/javascript">
        window.onload = function () {
       document.getElementById("submit").submit();
        };
    </script>
    <form id="submit" action="<?php echo get_instance()->config->item('portal_payment_entry'); ?>"
          method="POST">
        <input type="hidden" name='order' type="text" value='<?php echo $json; ?>'/>
    </form>
</div>
