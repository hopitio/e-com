<?php
defined('BASEPATH') or die;
?>
<style>
    .status{display: none;}
</style>
<a href='javascript:;' onclick='window.close();'>x</a>
<div class='status' id="status-ready">
    <form method='post' action='<?php echo base_url('portal/help/start_chat') ?>'>
        <input type='hidden' name='token' id='token'>
        <div>
            <label>What is your problem(s)</label>
            <div>
                <textarea name='additional-information'></textarea>
            </div>
        </div>
        <div>
            <input type='submit' value='Start chat'>
            <input type='button' value='Cancel' onclick='window.close();'>
        </div>
    </form>
</div>
<div class='status' id="status-unavailable">
    We cant talk to you at the moment, please try again later or use another method!
</div>
<div class='status' id="status-error">
    Oops, Something's gone wrong, please try again later or use another method!
</div>
<script>
    var scriptData = {};
    scriptData.getSupportURL = '<?php echo get_instance()->config->item('getSupportURL') ?>';
</script>
<script>
    (function(window, $, scriptData) {
        $.ajax({
            cache: false,
            url: scriptData.getSupportURL,
            crossDomain: true,
            jsonpCallback: 'callback',
            dataType: 'jsonp',
            success: function(token) {
                if (token == -1) {
                    $('#status-unavailable').show();
                } else {
                    $('#status-ready').show();
                    $('#token').val(token);
                }
            }, error: function() {
                $('#status-error').show();
            }
        });

    })(window, $, scriptData);

</script>