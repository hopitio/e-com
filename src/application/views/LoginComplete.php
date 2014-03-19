<div class="contentWarp wStaticPx" style="min-height:500px;">
    <script type="text/javascript">
        window.onload = function(){
            document.getElementById("submit").submit();
        };
    </script>
    <form id="submit" action="<?php echo $postUrl;?>" method="POST">
        <input name='data' type="text" value="<?php echo $dataJson;?>" style="display:none;"/>
        <input name='redirect' type="text" value="<?php echo $redirect;?>" style="display:none;"/>
    </form>
</div> 