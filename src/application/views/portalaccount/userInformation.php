<div class="lynx_contentWarp lynx_staticWidth" ng-controller="UserInformationController">
        <?php require_once APPPATH.'views/portalaccount/leftMenuAccount.php';?>
        <div class="lynx_row-right">
            <div class="lynx_row-head">
                <span><?php echo $language[$view->view]->lblInformationTitle;?></span>
            </div>
            
            <div class="lynx_row-content" ng-show="onLoadUserInformation">
                <div  ng-if="onLoadUserInformation" class="center"><img src="/images/loading.gif" alt="Loading..." class="loading"></div>
            </div>
            
            <div class="lynx_row-content" ng-show="!onLoadUserInformation">
                  <alert ng-show="userInformationError != undefined" type="danger" close="closeAlertUserinformation('error');" >{{userInformationError}}</alert>
                  <alert ng-show="userInformationSucess != undefined" type="success" close="closeAlertUserinformation('susscess');">{{userInformationSucess}}</alert>
                <div class="lynx_row">
                    <span class="lynx_lblFromtitle"> <?php echo $language[$view->view]->lblFristName;?> </span><input name="txtFristname" type="text" ng-model="userInformation.fristName"/>
                </div>
                <div class="lynx_row">
                    <span class="lynx_lblFromtitle"> <?php echo $language[$view->view]->lblLastName;?> </span><input name="txtLastName" type="text" ng-model="userInformation.lastName"/>
                </div>
                <div class="lynx_row">
                    <div class="lynx_lblFromtitle lynx_datePicketLbl"> <?php echo $language[$view->view]->lblDob;?> </div>
                    <div style="display:inline-block; ">
                      <div class="well well-sm" ng-model="warpDate">
                          <datepicker min="minDate" show-weeks="showWeeks"></datepicker>
                      </div>
                    </div>
                    <!-- <input name="txtDOB" type="text" ng-model="userInformation.dob"/> -->
                </div>
                <div class="lynx_row">
                    <span class="lynx_lblFromtitle"><?php echo $language[$view->view]->lblSex;?> </span><select ng-model="userInformation.sex" ng-options="sex.key as sex.display for sex in sexCollection"></select>
                </div>
                <div class="lynx_row">
                    <button id="btnComfirm" ng-click="updateInformation()" class="lynx_button btn btn-primary" type="submit"><?php echo $language[$view->view]->btnSaveInformation;?></button>
                </div>
            </div>
        </div>
        
        
        <div class="lynx_row-right">
            <div class="lynx_row-head">
                <span><?php echo $language[$view->view]->lblContactsTitle;?></span>
            </div>
            <div class="lynx_row-content">
               
            </div>
        </div>
</div> 