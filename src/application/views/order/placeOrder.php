<div class="contentWarp wStaticPx" style="min-height:500px;">
    <script type="text/javascript">
        window.onload = function(){
            document.getElementById("submit").submit();
        };
    </script>
    <form id="submit" action="/portal/payment_choice" method="POST">
        <input name='order' type="hidden" value="<?php echo $json;?>" style="display:none;"/>
    </form>
</div> 