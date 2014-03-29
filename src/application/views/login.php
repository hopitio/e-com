<div class="contentWarp wStaticPx">
    <div class="leftContent box">
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
            <form method='post'>
                <input type="hidden" name='c' value='resg'/>
                <div class="row"> <span><?php echo $language[$view->view]->lblEmail;?> </span> <input name='username' type="text" /> </div>
                <div class="row"> <span><?php echo $language[$view->view]->lblPassword;?> </span> <input name='password' type="password" /> <span><?php echo $language[$view->view]->lblPasswordRetry;?> </span> <input name='passwordRetry' type="password" /> </div>
                <div class="row"> <span><?php echo $language[$view->view]->lblCreateFristName;?> </span> <input name='fristName' type="text" /> <span> <?php echo $language[$view->view]->lblCreateLastName;?> </span> <input name='lastName' type="text" /> </div>
                <div class="row"> 
                    <span><?php echo $language[$view->view]->lblSex;?> </span> 
                    <select  name='sex' type="text" >
                        <option value="M"><?php echo $language[$view->view]->lblSexM;?></option>
                        <option value="F"><?php echo $language[$view->view]->lblSexF;?></option>
                        <option value="O"><?php echo $language[$view->view]->lblSexO;?></option>
                    </select> 
                </div>
                <div class="row"> 
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
                <div class="row"><span><?php echo $language[$view->view]->lblanswer;?> </span> <input name='answer' type="text" /></div>
                <!--  <div class="row"> <span><?php //echo $language[$view->view]->lblDOB;?> </span>  <input name='dob' type="text"  data-role="date"/> </div> -->
                
                <div class="row"><span></span><a href="#"><?php echo $language[$view->view]->lblLinkPolice;?></a> </div>
                <div class="row">
                    <button title="Search" class="button"><span><span><?php echo $language[$view->view]->btnResg;?></span></span></button>
                </div>
            </form>
        </form>
    </div>
    <div class="rightContent box">
        <form id="login" method="post">
            <input type="hidden" name='c' value='login' />
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