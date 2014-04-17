<div class="contentWarp wStaticPx" style="min-height:500px;">
    <script type="text/javascript">
        window.onload = function(){
            document.getElementById("submit").submit();
        };
    </script>
    
    <form id="submit" action="<?php echo $url; ?>" method="POST">
        <input name='user' type="text" value='<?php echo $dataJson;?>' style="display:none;"/>
        <input name='targetPage' type="text" value="<?php echo $redirect;?>" style="display:none;"/>
        <input name='secretKey' type="text" value="<?php echo $secretKey;?>" style="display:none;"/>
    </form>
</div> 