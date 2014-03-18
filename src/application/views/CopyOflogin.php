<div class="contentWarp wStaticPx">
    <div class="leftContent box">
        <form action='#'>
            <h3> <?php echo $language[$view->view]->registeTitle;?></h3>
            <h2 style="font-size: 20px;"> Tính năng đang trong quá trình phát triển ...</h2>
        </form>
    </div>
    <div class="rightContent box">
        <form action='<?php echo $postUrl;?>' method="post">
            <h3> <?php echo $language[$view->view]->loginTitle;?></h3>
            <?php if(isset($error)){
                echo '<h4> <i class="fa fa-comment"></i>'.$error.'</h4>';
            }?>
            <h2> <?php echo $language[$view->view]->lblUs;?></h2>
            <input name='txtUs' type="text">
            <h2> <?php echo $language[$view->view]->lblPs;?></h2>
            <input name='txtPw' type="password">
            <button title="Search" class="button"><span><span><?php echo $language[$view->view]->btnLogin;?></span></span></button>
            <a href="#"><?php echo $language[$view->view]->lblForgetPassword;?></a>
            <a href="#"><?php echo $language[$view->view]->lblCreateNewAccount;?></a>
            
            <a href="#"><img src="/images/Social_signin_facebook.png" /></a>
            <a href="#"><img src="/images/Social_signin_google.png" /></a>
        </form>
    </div>
</div> 