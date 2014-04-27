<div class="lynx_contentWarp lynx_staticWidth" ng-controller="ChangePasswordController">
        <?php require_once APPPATH.'views/portalaccount/leftMenuAccount.php';?>
        <div class="lynx_row-right">
            <div class="lynx_row-head">
                <span>Thay đổi mật khẩu</span>
            </div>
            <div class="lynx_row-content">
                <div class="lynx_row">
                    <span>Mật khẩu cũ : </span><input name="txtOldPass" type="password"/>
                </div>
                <div class="lynx_row">
                    <span>Mật khẩu mới : </span><input name="txtNewPass" type="password"/>
                </div>
                <div class="lynx_row">
                    <span>Mật khẩu confirm :</span><input name="txtConfrimNewPass" type="password"/>
                </div>
                <div class="lynx_row">
                    <button id="btnComfirm" class="lynx_button btn btn-primary" type="submit">Thay đổi mật khẩu</button>
                </div>
            </div>
        </div>
        
        <div class="lynx_row-right">
            <div class="lynx_row-head">
                <span>Thay đổi địa chỉ mail thông báo</span>
            </div>
            <div class="lynx_row-content">
                <div class="lynx_row">
                    <span>Mật khẩu cũ : </span><input name="txtNewMailAddress" type="password"/>
                </div>
                <div class="lynx_row">
                    <button id="btnComfirm" class="lynx_button btn btn-primary" type="submit">Thay đổi địa chỉ mail</button>
                </div>
            </div>
        </div>
        
        <div class="lynx_row-right">
            <div class="lynx_row-head">
                <span>10 Lần login gần nhất vào hệ thống</span>
            </div>
            <div class="lynx_row-content">

                <div class="lynx_row">
                    <button id="btnComfirm" class="lynx_button btn btn-primary" type="submit">Xem thông tin chi tiêt</button>
                </div>
            </div>
        </div>
</div> 