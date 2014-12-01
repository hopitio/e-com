<?php
defined('BASEPATH') or die('no direct script');
?>

<div class="lynx_contentWarp lynx_staticWidth lynx_register_seller_form">
    <div class="lynx_leftContent lynx_box">
        <form id="resg" method="post" class="" action="">
            <h3> <?php echo $language[$view->view]->lblRegister ?></h3>
            <div class="row box">
                <ul>
                    <?php
                    foreach ($errors as $err)
                    {
                        echo '<li>' . $err . '</li>';
                    }
                    ?>
                </ul>
            </div>
            <input type="hidden" name="c" value="resg">
            <div class="lynx_row"> <span><?php echo $language[$view->view]->lblShopName ?>  </span> <input name="txt_shop_name" type="text" value="<?php echo $shopName ?>"> </div>
            <div class="lynx_row"> <span><?php echo $language[$view->view]->lblContactPerson ?>  </span> <input name="txt_contact_person" type="text" value="<?php echo $contactPerson ?>"> </div>
            <div class="lynx_row"> 
                <span><?php echo $language[$view->view]->lblEmail ?>  </span> <input name="txt_email" type="text" value="<?php echo $email ?>"> 
                <span><?php echo $language[$view->view]->lblPhone ?>  </span> <input name="txt_phone" type="text" value="<?php echo $phone ?>"> 
            </div>
            <div class="lynx_row"> <span><?php echo $language[$view->view]->lblAddress ?>  </span> <input name="txt_address" type="text" value="<?php echo $address ?>"> </div>
            <div class="lynx_row"> <span><?php echo $language[$view->view]->lblSlogan ?>  </span> <input name="txt_slogan" type="text" value="<?php echo $slogan ?>"> </div>
            <div class="lynx_row"> <span id="lbl-additional-info"><?php echo $language[$view->view]->lblAdditionalInfo ?>  </span> <textarea name="txt_additional_info" rows="2"><?php echo $additionalInfo ?></textarea> </div>
            <div class="lynx_row"><span></span><a href="/portal/page/policy">Chi tiết điều khoản sử dụng và điều lệ của website.</a> </div>
            <div class="lynx_row">
                <button id="submitResg" class="lynx_button btn btn-primary" type="submit" value="one" onclick="this.form.submit();">Tôi đã đồng ý với điều khoản sử dụng và tiếp tục đăng ký</button>
            </div>

        </form>
    </div>
    <div class="lynx_rightContent box">
        <form id="login" method="post" class="">
            <input type="hidden" name="c" value="login">
            <h3> Đăng nhập</h3>
            <h2> Tên Đăng nhập : </h2>
            <input name="txtUs" type="text">
            <h2> Mật khẩu :</h2>
            <input name="txtPw" type="password">
            <button id="submitLogin" class="lynx_button btn btn-primary" type="submit" value="one">Đăng nhập</button>
            <a href="/portal/account/lost_password" style="width: 100%;text-align: left;">Bạn không thể đăng nhập tài khoản </a>


            <a href="#" style="display:none"><img src="/images/Social_signin_google.png"></a>

            <input name="currentPage" type="hidden" value="http://localhost.com:8080/seller/product">
            <input name="endpoint" type="hidden" value="/__portal/login_callback">
            <input name="session" type="hidden" value="6253008d0192c420fc984c87e8fdbe5a">
            <input name="subSys" type="hidden" value="GIFT">
        </form>
    </div>
    <form id="facebooklogin" action="/portal/login/facebook" method="post" class="ng-pristine ng-valid">
        <input name="currentPage" type="hidden" value="http://localhost.com:8080/seller/product">
        <input name="endpoint" type="hidden" value="/__portal/login_callback">
        <input name="session" type="hidden" value="6253008d0192c420fc984c87e8fdbe5a">
        <input name="subSys" type="hidden" value="GIFT">
        <input name="postValue" type="hidden">
    </form>
</div>