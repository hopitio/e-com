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
            <div class="form-group">
                <label for="txt_shop_name"><?php echo $language[$view->view]->lblShopName ?>  </label> 
                <input name="txt_shop_name" id="txt_shop_name" type="text" value="<?php echo $shopName ?>" class="form-control"> 
            </div>
            <div class="form-group">
                <label for="txt_contact_person"><?php echo $language[$view->view]->lblContactPerson ?>  </lalel> 
                    <input name="txt_contact_person" id="txt_contact_person" type="text" value="<?php echo $contactPerson ?>" class="form-control"> 
                    </div>
                    <div class="row"> 
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="txt_email"><?php echo $language[$view->view]->lblEmail ?>  </label> 
                                <input name="txt_email" id="txt_email" type="text" value="<?php echo $email ?>" class="form-control"> 
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="txt_phone"><?php echo $language[$view->view]->lblPhone ?>  </label>
                                <input name="txt_phone" id="txt_phone" type="text" value="<?php echo $phone ?>" class="form-control"> 
                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="txt_address"><?php echo $language[$view->view]->lblAddress ?>  </label>
                        <input name="txt_address" id="txt_address" type="text" value="<?php echo $address ?>" class="form-control"> 
                    </div>
                    <div class="form-group">
                        <label for="txt_slogan"><?php echo $language[$view->view]->lblSlogan ?>  </label>
                        <input name="txt_slogan" type="text" value="<?php echo $slogan ?>" class="form-control" id="txt_slogan"> 
                    </div>
                    <div class="form-group">
                        <label id="lbl-additional-info" for="txt_additional_info"><?php echo $language[$view->view]->lblAdditionalInfo ?>  </label>
                        <textarea name="txt_additional_info" rows="2" id="txt_additional_info" class="form-control"><?php echo $additionalInfo ?></textarea> 
                    </div>
                    <div class="center"><a href="/portal/page/policy">Chi tiết điều khoản sử dụng và điều lệ của website.</a> </div>
                    <div class="center">
                        <button id="submitResg" class="lynx_button btn btn-primary" type="submit" value="one" onclick="this.form.submit();">Tôi đã đồng ý với điều khoản sử dụng và tiếp tục đăng ký</button>
                    </div>

                    </form>
            </div>
            <div class="lynx_rightContent lynx_box">
                <form id="login" method="post">
                    <input type="hidden" name='c' value='login' />
                    <h3> <?php echo $language[$view->view]->loginTitle; ?></h3>
                    <?php
                    if (isset($error))
                    {
                        echo '<h4> <i class="glyphicon glyphicon-exclamation-sign"></i>' . $error . '</h4>';
                    }
                    ?>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="question"><?php echo $language[$view->view]->lblUs; ?></label>
                            <input type="text" class="form-control" style="width:100%" name="txtUs">
                        </div>
                        <div class="form-group">
                            <label for="question"><?php echo $language[$view->view]->lblPs; ?></label>
                            <input type="password" class="form-control" style="width:100%" name="txtPw">
                        </div>
                        <div class="form-group">
                            <button id="submitLogin" class="lynx_button btn btn-primary pull-right" type="submit" value="one"><?php echo $language[$view->view]->btnLogin; ?></button>
                        </div>
                        <a href="/portal/account/lost_password" style="width: 100%;text-align: right;"><?php echo $language[$view->view]->lblForgetPassword; ?></a>
                        <a href="/portal/account/resend" style="width: 100%;text-align: right;"><?php echo $language[$view->view]->lblResend; ?></a>
                    </div>
                    <input name='currentPage' type="hidden" value='<?php echo $cp; ?>'>
                    <input name='endpoint' type="hidden" value='<?php echo $ep; ?>'>
                    <input name='session' type="hidden" value='<?php echo $se; ?>'>
                    <input name='subSys' type="hidden" value='<?php echo $su; ?>'>
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