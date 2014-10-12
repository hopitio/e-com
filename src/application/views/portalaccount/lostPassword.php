<div class="lynx_contentWarp lynx_staticWidth width-960">
    <div class="lynx_lostPasswordContainer ">
        <h3><?php echo $language[$view->view]->title;?></h3>
        <div class="lynx_lostPasswordDescription">
            <?php echo $language[$view->view]->lblStepDes;?> :<br/>
             1. <?php echo $language[$view->view]->lblStep1;?>. <br/>
             2. <?php echo $language[$view->view]->lblStep2;?>.<br/>
             3. <?php echo $language[$view->view]->lblStep3;?>.<br/>
        </div>
        <form id='frmReset' action="/portal/account/lost_password" enctype="application/x-www-form-urlencoded" method="post">
            <br/>
            <span><?php echo $language[$view->view]->lblMail;?> </span> : <input name="email" type="text"/> <br/>
            <input id="btnSubmit" type="button" value="<?php echo $language[$view->view]->btnMailler;?>" />
             <?php 
                if(isset($msg))
                {
                    echo $msg;
                }
                ?>
            <br/>
        </form>
    </div>
    <div class="lynx_policy">
        
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $('#btnSubmit').click(function(){
            $('#frmReset').submit();
        });
});
</script>