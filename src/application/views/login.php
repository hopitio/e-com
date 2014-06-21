
<div class="lynx_contentWarp lynx_staticWidth">
    <div class="lynx_leftContent lynx_box">
        <form id="resg" method="post">
            <h3> <?php echo $language[$view->view]->registeTitle;?></h3>
                <?php
                    if(isset($errorRegister)){
                        echo "<div class='row box'><ul>";
                        foreach ($errorRegister as $e){
                            echo '<li>'.$e.'</li>';
                        }
                        echo "</ul></div>";
                    } 
                ?>
                <input type="hidden" name='c' value='resg'/>
                <div class="lynx_row"> <span><?php echo $language[$view->view]->lblEmail;?> </span> <input name='username' type="text" /> </div>
                <div class="lynx_row"> <span><?php echo $language[$view->view]->lblPassword;?> </span> <input name='password' type="password" /> <span><?php echo $language[$view->view]->lblPasswordRetry;?> </span> <input name='passwordRetry' type="password" /> </div>
                <div class="lynx_row"> <span><?php echo $language[$view->view]->lblCreateFristName;?> </span> <input name='fristName' type="text" /> <span> <?php echo $language[$view->view]->lblCreateLastName;?> </span> <input name='lastName' type="text" /> </div>
                <div class="lynx_row"> 
                    <span><?php echo $language[$view->view]->lblSex;?> </span> 
                    <select  name='sex' type="text" >
                        <option value="M"><?php echo $language[$view->view]->lblSexM;?></option>
                        <option value="F"><?php echo $language[$view->view]->lblSexF;?></option>
                        <option value="O"><?php echo $language[$view->view]->lblSexO;?></option>
                    </select> 
                </div>
                <div class="lynx_row"> 
                    <span><?php echo $language[$view->view]->lblQuestion;?></span>
                    <select  name='question' type="text" >
                        <option value="<?php echo DatabaseFixedValue::SECURITY_QUESTION_NO0_ID;?>"><?php echo $language[$view->view]->lblQ0;?></option>
                        <option value="<?php echo DatabaseFixedValue::SECURITY_QUESTION_NO1_ID;?>"><?php echo $language[$view->view]->lblQ1;?></option>
                        <option value="<?php echo DatabaseFixedValue::SECURITY_QUESTION_NO2_ID;?>"><?php echo $language[$view->view]->lblQ2;?></option>
                        <option value="<?php echo DatabaseFixedValue::SECURITY_QUESTION_NO3_ID;?>"><?php echo $language[$view->view]->lblQ3;?></option>
                        <option value="<?php echo DatabaseFixedValue::SECURITY_QUESTION_NO4_ID;?>"><?php echo $language[$view->view]->lblQ4;?></option>
                        <option value="<?php echo DatabaseFixedValue::SECURITY_QUESTION_NO5_ID;?>"><?php echo $language[$view->view]->lblQ5;?></option>
                    </select> 
                 </div>
                <div class="lynx_row"><span><?php echo $language[$view->view]->lblanswer;?> </span> <input name='answer' type="text" /></div>
                <div class="lynx_row"><span></span><a href="/portal/policy"><?php echo $language[$view->view]->lblLinkPolice;?></a> </div>
                <div class="lynx_row">
                    <button id="submitResg" class="lynx_button btn btn-primary" type="submit" value="one"><?php echo $language[$view->view]->btnResg;?></button>
                </div>

        </form>
    </div>
    <div class="lynx_rightContent box">
        <form id="login" method="post">
            <input type="hidden" name='c' value='login' />
            <h3> <?php echo $language[$view->view]->loginTitle;?></h3>
            <?php if(isset($error)){
                echo '<h4> <i class="glyphicon glyphicon-exclamation-sign"></i>'.$error.'</h4>';
            }?>
            <h2> <?php echo $language[$view->view]->lblUs;?></h2>
            <input name='txtUs' type="text">
            <h2> <?php echo $language[$view->view]->lblPs;?></h2>
            <input name='txtPw' type="password">
            <button id="submitLogin" class="lynx_button btn btn-primary" type="submit" value="one"><?php echo $language[$view->view]->btnLogin;?></button>
            <a href="/portal/account/lost_password" style="width: 100%;text-align: left;"><?php echo $language[$view->view]->lblForgetPassword;?></a>
            
            <a href="javascript:void(0)" id="likfacebooklogin" link="<?php echo UrlManager::getInstanse()->getLoginFacebookUrl();?>"><img src="/images/Social_signin_facebook.png" /></a>
            <a href="#" style="display:none"><img src="/images/Social_signin_google.png" /></a>
            
            <input name='currentPage' type="hidden" value='<?php echo $cp;?>'>
            <input name='endpoint' type="hidden" value='<?php echo $ep;?>'>
            <input name='session' type="hidden" value='<?php echo $se;?>'>
            <input name='subSys' type="hidden" value='<?php echo $su;?>'>
        </form>
    </div>
    <form id='facebooklogin' action="/portal/login/facebook" method="post">
        <input name='currentPage' type="hidden" value='<?php echo $cp;?>'>
        <input name='endpoint' type="hidden" value='<?php echo $ep;?>'>
        <input name='session' type="hidden" value='<?php echo $se;?>'>
        <input name='subSys' type="hidden" value='<?php echo $su;?>'>
        <input name="postValue" type="hidden"/>
    </form>
</div> 