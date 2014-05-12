<div class="lynx_contentWarp lynx_staticWidth">
    <div class="lynx_lostPasswordContainer ">
        <h3>Khôi phục mật khẩu</h3>
        <div class="lynx_lostPasswordDescription">
            Các Bước thực hiện reset mật khẩu bao gôm :<br/>
             1. Bạn cần nhập địa chỉ mail của bạn. <br/>
             2. Bạn Kiểm tra mail và lấy thông tin mật khẩu của bạn.<br/>
             3. Đăng nhập với thông tin mật khẩu mới.<br/>
        </div>
        <form id='frmReset' action="/portal/account/lost_password" enctype="application/x-www-form-urlencoded" method="post">
            <br/>
            <span>Địa chỉ mail </span> : <input name="email" type="text"/> <br/>
            <input id="btnSubmit" type="button" value="Xác nhận" />
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