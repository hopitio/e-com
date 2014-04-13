<?php
defined('BASEPATH') or die('no direct script access allowed');
?>

How would you like to contact us?
<form>
    <div>
        <h4>E-mail</h4>
        <input id="send-email" type="submit" value="Send us an e-mail" data-action="<?php echo site_url('/portal/help/contact_by_email') ?>">
    </div>
    <div>
        <h4>Chat</h4>
        <input type="button" value="Start chat" onclick="startChat();">
    </div>
</form>

<script>
    var scriptData = {};
    scriptData.chatURL = '<?php echo site_url('/portal/help/contact_by_chat') ?>';
</script>
<script>
    (function(window, $, scriptData) {
        window.startChat = function(){
            window.open(scriptData.chatURL, "", "width=400,height=400");
        };
    })(window, $, scriptData);
    
    (function(window, $, scriptData) {
        $('#send-email').click(function(e){
            e.preventDefault();
            var $this = $(this);
            var $form = $(this.form);
            $form.attr('action', $this.attr('data-action')).submit();
        });
    })(window, $, scriptData);
</script>

