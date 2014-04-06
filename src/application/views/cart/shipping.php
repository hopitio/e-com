<?php
defined('BASEPATH') or die('No direct script access allowed');
/* @var $shippingMethods ShippingMethodDomain */
?>
<form method="post" action="<?php echo site_url('cart/nextShippingStep') ?>">
    <fieldset>
        <legend>Shipping Method</legend>
        <div>
            <div>Name</div>
            <div>Transmit Time(after Payment is completed)</div>
            <div>Fee</div>
        </div>
        <?php foreach ($shippingMethods as $method): ?>
            <?php
            $checked = ($method === $shippingMethods[0]) ? 'checked' : null;
            ?>
            <div>
                <div>
                    <label>
                        <input type='radio' name='radkMethod' value='<?php echo $method->codename ?>' <?php echo $checked ?>>
                        <?php echo $method->codename ?>
                    </label>
                </div>
                <div>
                    <?php
                    if ($method->minBDay == 0 && $method->maxBDay == 0)
                    {
                        echo 'In 4 hours';
                    }
                    elseif ($method->minBDay == 0 && $method->maxBDay != 0)
                    {
                        echo 'Lesser than ' . $method->maxBDay . ' day(s)';
                    }
                    else
                    {
                        echo "{$method->minBDay}-{$method->maxBDay} bussiness days";
                    }
                    ?>
                </div>
            </div>
        <?php endforeach; ?>

    </fieldset>
    <fieldset>
        <legend>Required fields</legend>
        <div>
            <label>Fullname</label>
            <div>
                <input type="text" name="txtFullname">
            </div>
        </div>
        <div>
            <label>Phone number</label>
            <div>
                <input type="text" name="txtPhoneNo">
            </div>
        </div>
        <div>
            <label>Address</label>
            <input type="text" name="txtStreetAddress">
        </div>
        <div>
            <label>City/District</label>
            <input type="text" name="txtCityDistrict">
        </div>
        <div>
            <label>Province</label>
            <select name="selProvinceCity" id="selProvinceCity">
                <option></option>
                <?php echo ViewHelpers::getInstance()->options($provinces) ?>
            </select>
        </div>


    </fieldset>
    <fieldset>
        <legend>Optional</legend>
        <div>
            <label>Is this address also your billing address (the address that appears on your credit card or bank statement)?</label>

            <label><input type="radio" name="radIsBilling" value="1">Yes</label>
            <label><input type="radio" name="radIsBilling" value="-1">No It's not(Enter your Billing Address in next Step)</label>
            <label></label>
        </div>
        <div>
            <label>Is this a gift(free gift wrap)</label>
            <div>
                <label><input type='radio' name='radGift' value='1'>Yes, it is</label>
            </div>
            <div>
                <label><input type='radio' name='radGift' value='0' checked>No, it isn't</label>
            </div>
        </div>
    </fieldset>
    <div>
        <input type='button' value='Back to Cart' onclick='backToCart()'>
        <input type='submit' value='Nex step'>
    </div>
</form>

<script>
    var scriptData = {};
    scriptData.cartURL = '<?php echo site_url('cart/showCart') ?>';
</script>
<script>
    (function(window, scriptData, $, undefined) {
        window.backToCart = function() {
            window.location = scriptData.cartURL;
        };
    })(window, scriptData, $);
</script>

