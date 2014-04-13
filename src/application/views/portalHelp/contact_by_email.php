<?php

defined('BASEPATH') or die('no direct script access allowed');

?>
<form method="post" action="<?php echo site_url('portal/help/send_email') ?>">
    <div>
        <label>Describe your problem(s):</label>
        <div>
            <textarea name="additional_infomation"></textarea>
        </div>
    </div>
    <div>
        <input type="submit" value="Send E-mail">
        <a href="<?php echo site_url('portal/help/contact_us') ?>">Cancel</a>
    </div>
</form>
