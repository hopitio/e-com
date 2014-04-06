<div class="contentWarp wStaticPx">
        
        <?php require_once APPPATH.'views/portalaccount/leftMenuAccount.php';?>
        
        <div class="row-right">
            <?php
                if(isset($errormsg)){
                    echo $errormsg;
                } 
            ?>
            <form method="post" style="text-align: left;">
                <div>
                 Mật khẩu cũ :  <input name="txtOldPass" type="password"/>
                </div>
                <div>
                 Mật khẩu mới : <input name="txtNewPass" type="password"/>
                </div>
                <div>
                 Mật khẩu confirm : <input name="txtConfrimNewPass" type="password"/>
                </div>
                <div>
                    <button name="btnComfirm" value="" >Thay đổi mật khẩu</button>
                </div>
            </form>
        </div>
</div> 