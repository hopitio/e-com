<div class="contentWarp wStaticPx">
    <div class="leftContent box">
        <form action='#'>
            <h3> <?php echo $language[$view->view]->registeTitle;?></h3>
            <form method='post'>
                <div>email <input name='us' type='text' /></div>
                <div>password <input name='ps' type='password' /></div>
                <div>password <input name='ps' type='text' /></div>
            </form>
        </form>
    </div>
    <div class="rightContent box">
        <form method="post">
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
            
            <input name='postUrlCaller' type="hidden" value='<?php echo $postUrlCaller;?>'>
            <input name='postUrlTarget' type="hidden" value='<?php echo $postUrlTarget;?>'>
        </form>
    </div>
</div> 