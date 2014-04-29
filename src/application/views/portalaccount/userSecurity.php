<div class="lynx_contentWarp lynx_staticWidth" ng-controller="PortalUserSecurityAccountController">
        <?php require_once APPPATH.'views/portalaccount/leftMenuAccount.php';?>
        <div class="lynx_row-right">
            <div class="lynx_row-head">
                <span><?php echo $language[$view->view]->passwordTitle;?></span>
            </div>
            
            <div class="lynx_row-content" ng-show="onUpdatingPassword" class="preload" >
                <div  ng-if="onUpdatingPassword" class="center"><img src="/images/loading.gif" alt="Loading..." class="loading"></div>
            </div>
            
            <div class="lynx_row-content" ng-show="!onUpdatingPassword" class="preload" >
                <alert ng-show="errorMessage != undefined" type="danger" close="closeAlertPassword('error');" >{{errorMessage}}</alert>
                <alert ng-show="susscessMessage != undefined" type="success" close="closeAlertPassword('susscess');">{{susscessMessage}}</alert>
                
                <div class="lynx_row">
                    <span class="lynx_lblFromtitle"><?php echo $language[$view->view]->passwordOld;?></span><input name="txtOldPass"  ng-model="oldPass" type="password"/>
                </div>
                <div class="lynx_row">
                    <span class="lynx_lblFromtitle"><?php echo $language[$view->view]->passwordNew;?></span><input name="txtNewPass" ng-model="newPass" type="password"/>
                </div>
                <div class="lynx_row">
                    <span class="lynx_lblFromtitle"><?php echo $language[$view->view]->passwordRepeat;?></span><input name="txtConfrimNewPass" ng-model="newComfirmPass" type="password"/>
                </div>
                <div class="lynx_row">
                    <button id="btnComfirm" ng-click = "updatePassword()" class="lynx_button btn btn-primary" type="submit"><?php echo $language[$view->view]->btnSavePassword;?></button>
                </div>
            </div>
        </div>
        
        <div class="lynx_row-right">
            <div class="lynx_row-head">
                <span ><?php echo $language[$view->view]->emailTitle;?></span>
            </div>
            
            <div class="lynx_row-content" ng-show="onUpdatingEmail" class="preload" >
                <div  ng-if="onUpdatingEmail" class="center"><img src="/images/loading.gif" alt="Loading..." class="loading"></div>
            </div>
            
            <div class="lynx_row-content">
                <alert ng-show="alertEmailError != undefined" type="danger" close="closeAlertEmailNotify('error');" >{{alertEmailError}}</alert>
                <alert ng-show="alertEmailSusscess != undefined" type="success" close="closeAlertEmailNotify('susscess');">{{alertEmailSusscess}}</alert>
                
                <div class="lynx_row">
                    <span class="lynx_lblFromtitle"><?php echo $language[$view->view]->lblEmail;?></span><input name="txtNewMailAddress" ng-model="email" type="password"/>
                </div>
                <div class="lynx_row">
                    <button id="btnComfirm" ng-click="updateAlertEmail()" class="lynx_button btn btn-primary" type="submit"><?php echo $language[$view->view]->btnEmail;?></button>
                </div>
            </div>
        </div>
        
        <div class="lynx_row-right">
            <div class="lynx_row-head">
                <span><?php echo $language[$view->view]->loginHistoryTitle;?></span>
            </div>
            <div class="lynx_row-content" ng-show="onGetHistory" class="preload" >
                <div  ng-if="onGetHistory" class="center"><img src="/images/loading.gif" alt="Loading..." class="loading"></div>
            </div>
            <div class="lynx_row-content" ng-show="!onGetHistory">
                <div class="lynx_historyTable">
                    <span class="lynx_colIp"> <?php echo $language[$view->view]->historyIpColTitle;?> </span>
                    <span class="lynx_colTime"> <?php echo $language[$view->view]->historyTimeColTitle;?></span>
                    <span class="lynx_colSys"><?php echo $language[$view->view]->historySystemColTitle;?></span>
                    <span class="lynx_colUserAgrent"> <?php echo $language[$view->view]->historyUserAgrentColTitle;?> </span>
                </div>
                <div class="lynx_historyTable" ng-repeat="history in historys">
                    <span class="lynx_colIp">{{history.client_ip}}</span>
                    <span class="lynx_colTime">{{history.last_activity}}</span>
                    <span class="lynx_colSys">{{history.sub_system_name}}</span>
                    <span class="lynx_colUserAgrent">{{history.user_agrent}}</span>
                </div>
                
                
            </div>
        </div>
</div> 