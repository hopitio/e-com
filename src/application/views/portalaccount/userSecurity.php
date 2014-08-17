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
                <span><?php echo $language[$view->view]->loginHistoryTitle;?></span>
            </div>
            <div class="lynx_row-content" ng-show="onGetHistory" class="preload" >
                <div  ng-if="onGetHistory" class="center"><img src="/images/loading.gif" alt="Loading..." class="loading"></div>
            </div>
            <div class="lynx_row-content" ng-show="!onGetHistory">
                <table class="table table-hover table-condensed">
                    <thead>
                        <tr>
                            <th><?php echo $language[$view->view]->historyTimeColTitle;?></th>
                            <th><?php echo $language[$view->view]->historyIpColTitle;?></th>
                            <th><?php echo $language[$view->view]->historySystemColTitle;?></th>
                            <th><?php echo $language[$view->view]->historyUserAgrentColTitle;?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="history in historys">
                            <td>{{history.last_activity}}</td>
                            <td>{{history.client_ip}}</td>
                            <td>{{history.sub_system_name}}</td>
                            <td>{{history.user_agrent}}</td>
                            
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
</div> 