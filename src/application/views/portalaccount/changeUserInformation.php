<div class="contentWarp wStaticPx">
        <div class="row-fluid">
            <?php
            if(isset($errormsg)){
                echo $errormsg;
            } 
            ?>
                                <div class="span4">
                                    <h4><i class="fa fa-cog"></i> Bảo mật </h4>
                                    <a href="/portal/change_password">Thay đổi mật khẩu </a><br>
                                    <a href="#">Thay đổi câu hỏi bí mật</a><br>
                                    <a href="#">Thay đổi mail thông báo</a><br/>
                                    <br/>
                                </div>
                                
                                <div class="span4">
                                    <h4><i class="fa fa-user"></i> Thông tin tài khoản</h4>
                                    <a href="#">Thay đổi thông tin cá nhân </a><br>
                                    <a href="#">Thêm địa chỉ giao hàng</a><br>
                                    <a href="#">Kiểm tra lược sử hoạt động</a><br/>
                                    <a href="#">Wishlist các subsystem</a><br>
                                    <a href="#">Pin sản phẩm</a><br>
                                    <br/>
                                </div>
                                
                                <div class="span4">
                                    <h4><i class="fa fa-user"></i> Thông tin giao dịch và mua hàng</h4>
                                    <a href="#">Trạng thái các giao dịch</a><br>
                                    <a href="#">Lịch sử giao dịch</a><br>

                                    <br/>
                                </div>
        </div>
        <div class="row-right">
            <form method="post" style="text-align: left;">
                <div>
                 HỌ VÀ TÊN ĐỆM :  <input name="txtFristname" type="password"/>
                </div>
                <div>
                 TÊN : <input name="txtLastName" type="password"/>
                </div>
                <div>
                 DOB : <input name="txtConfrimNewPass" type="password"/>
                </div>
                <div>
                 SEX : <input name="txtConfrimNewPass" type="password"/>
                </div>
                <div>
                    <button name="btnComfirm" value="" >Thay đổi mật khẩu</button>
                </div>
            </form>
        </div>
</div> 