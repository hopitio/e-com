<div class="lynx_contentWarp lynx_staticWidth">
    <div class="lynx_leftContent lynx_box">
        <form id="resg" action="/portal/login" method="post">
            <h3> <?php echo $language[$view->view]->registeTitle;?><em><?php echo $language[$view->view]->lblRegsterGiude;?></em></h3>
                <?php
                    if(isset($errorRegister)){
                        echo "<div><ul>";
                        foreach ($errorRegister as $e){
                            echo '<li>'.$e.'</li>';
                        }
                        echo "</ul></div>";
                    } 
                ?>
                <input type="hidden" name='c' value='resg'/>
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo $language[$view->view]->lblEmail;?></label>
                        <input type="email" class="form-control" style="width:100%" name="username" placeholder="example@sfriendly.com">
                    </div>
                    <div class="row">
                        <div class="col-md-6 nopadding">
                            <div class="form-group">
                                <label for="password"><?php echo $language[$view->view]->lblPassword;?></label>
                                <input type="password" class="form-control" style="width:100%" name="password">
                            </div>
                        </div>
                        <div class="col-md-6 nopadding">
                            <div class="form-group">
                                <label for="passwordRetry"><?php echo $language[$view->view]->lblPasswordRetry;?></label>
                                <input type="password" class="form-control" style="width:100%" name="passwordRetry" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 nopadding">
                            <div class="form-group">
                                <label for="password"><?php echo $language[$view->view]->lblFullName;?></label>
                                <input type="text" class="form-control" style="width:100%" name="fullName">
                            </div>
                        </div>
                        <div class="col-md-6 nopadding">
                            <div class="form-group">
                                <label for="passwordRetry"><?php echo $language[$view->view]->lblPhone;?></label>
                                <input type="text" class="form-control" style="width:100%" name="phone" placeholder="<?php echo $language[$view->view]->lblPhoneGuide;?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 nopadding">
                            <div class="form-group">
                                <label for="password"><?php echo $language[$view->view]->lblDob;?></label>
                                <input data-provide="datepicker" data-date-format="dd/mm/yyyy" type="text" class="form-control datepicker" style="width:100%" name="dob">
                            </div>
                        </div>
                        <div class="col-md-6 nopadding">
                            <div class="form-group">
                                <label for="passwordRetry"><?php echo $language[$view->view]->lblGender;?></label>
                                <select class="form-control" style="width:100%"  name='sex' type="text" >
                                    <option value="M"><?php echo $language[$view->view]->lblSexM;?></option>
                                    <option value="F"><?php echo $language[$view->view]->lblSexF;?></option>
                                    <option value="O"><?php echo $language[$view->view]->lblSexO;?></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="question"><?php echo $language[$view->view]->lblQuestion;?></label>
                        <p class="help-block"><?php echo $language[$view->view]->lblQuestionGuide;?></p>
                        <select class="form-control" style="width:100%"   name='question'>
                            <option value="<?php echo DatabaseFixedValue::SECURITY_QUESTION_NO0_ID;?>"><?php echo $language[$view->view]->lblQ0;?></option>
                            <option value="<?php echo DatabaseFixedValue::SECURITY_QUESTION_NO1_ID;?>"><?php echo $language[$view->view]->lblQ1;?></option>
                            <option value="<?php echo DatabaseFixedValue::SECURITY_QUESTION_NO2_ID;?>"><?php echo $language[$view->view]->lblQ2;?></option>
                            <option value="<?php echo DatabaseFixedValue::SECURITY_QUESTION_NO3_ID;?>"><?php echo $language[$view->view]->lblQ3;?></option>
                            <option value="<?php echo DatabaseFixedValue::SECURITY_QUESTION_NO4_ID;?>"><?php echo $language[$view->view]->lblQ4;?></option>
                            <option value="<?php echo DatabaseFixedValue::SECURITY_QUESTION_NO5_ID;?>"><?php echo $language[$view->view]->lblQ5;?></option>
                        </select> 
                    </div>
                    <div class="form-group">
                        <label for="question"><?php echo $language[$view->view]->lblanswer;?></label>
                        <p class="help-block"><?php echo $language[$view->view]->lblAnswerGuide;?></p>
                        <input type="text" class="form-control" style="width:100%" name="answer">
                    </div>
                    <div class="col-md-12" style="text-align: left;padding:0px"><a href="/portal/page/policy"><?php echo $language[$view->view]->lblLinkPolice;?></a></div>
                    <div class="col-md-12" style="padding:0px">
                        <br/>
                        <button id="submitResg" class="form-group lynx_button btn btn-primary" type="submit" value="one"><?php echo $language[$view->view]->btnResg;?></button>
                        <br/>
                        <br/>
                    </div>
                </div>
        </form>
    </div>
    <div class="lynx_rightContent lynx_box">
        <form id="login" action="/portal/login" method="post">
            
            <input type="hidden" name='c' value='login' />
            <h3> <?php echo $language[$view->view]->loginTitle;?></h3>
            <?php if(isset($error)){
                echo '<h4> <i class="glyphicon glyphicon-exclamation-sign"></i>'.$error.'</h4>';
            }?>
            <div class="box-body">
                <div class="form-group">
                    <label for="question"><?php echo $language[$view->view]->lblUs;?></label>
                    <input type="text" class="form-control" style="width:100%" name="txtUs">
                </div>
                <div class="form-group">
                    <label for="question"><?php echo $language[$view->view]->lblPs;?></label>
                    <input type="password" class="form-control" style="width:100%" name="txtPw">
                </div>
                <div class="form-group">
                    <button id="submitLogin" class="lynx_button btn btn-primary pull-right" type="submit" value="one"><?php echo $language[$view->view]->btnLogin;?></button>
                </div>
                <a href="/portal/account/lost_password" style="width: 100%;text-align: right;"><?php echo $language[$view->view]->lblForgetPassword;?></a>
                <a href="/portal/account/resend" style="width: 100%;text-align: right;"><?php echo $language[$view->view]->lblResend;?></a>
            </div>
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
<script type="text/javascript">
    $(document).ready(function(){
	    $('.datepicker').datepicker();
    });
  
</script>