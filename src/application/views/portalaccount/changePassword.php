<div class="lynx_contentWarp lynx_staticWidth" ng-controller="ChangePasswordController">
        <?php require_once APPPATH.'views/portalaccount/leftMenuAccount.php';?>
        <div class="lynx_row-right">
            <?php
                if(isset($errormsg)){
                    echo '<input name="error" type="hidden" value="'.$errormsg.'"/>';
                } 
            ?>
            
            <alert ng-show="error != ''" type="danger" close="closeAlert($index)">{{error}}</alert>
            
            <form id="frmChangePassword" method="post" style="text-align: left;">
                <div>
                    <span>Mật khẩu cũ : </span><input name="txtOldPass" type="password"/>
                </div>
                <div>
                    <span>Mật khẩu mới : </span><input name="txtNewPass" type="password"/>
                </div>
                <div>
                    <span>Mật khẩu confirm :</span><input name="txtConfrimNewPass" type="password"/>
                </div>
                <div>
                    <button id="btnComfirm" class="lynx_button btn btn-primary" type="submit">Thay đổi mật khẩu</button>
                </div>
            </form>
        </div>
</div> 