<div class="lynx_contentWarp lynx_staticWidth" ng-controller="PortalUserInformationController">
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
                        <input data-provide="datepicker" data-date-format="mm/dd/yyyy" ng-model="warpDate"/>
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
                <span><?php echo $language[$view->view]->lblContactsTitle;?> <i ng-click="openModalContactDialog(undefined)" class="glyphicon glyphicon-plus-sign" style="cursor: pointer;"></i></span>
            </div>
            
            <div class="lynx_row-content" ng-show="onLoadUserContact">
                <div  ng-if="onLoadUserContact" class="center"><img src="/images/loading.gif" alt="Loading..." class="loading"></div>
            </div>
            
            <div class="lynx_row-content" ng-show="!onLoadUserContact">
                <div class="lynx_row lynx_rowGroup lynx_contactList" ng-repeat="contact in userContacts">
                    <span class="lynx_lblFromtitle"><?php echo $language[$view->view]->lblContactsFullname;?></span>
                    {{contact.full_name}}<br/>
                    <span class="lynx_lblFromtitle"><?php echo $language[$view->view]->lblContactsTelephone;?></span>
                    {{contact.telephone}}<br/>
                    <span class="lynx_lblFromtitle"><?php echo $language[$view->view]->lblContactsStateProvince;?></span>
                    {{contact.state_province}}<br/>
                    <span class="lynx_lblFromtitle"><?php echo $language[$view->view]->lblContactsAddress;?></span>
                    {{contact.street_address}}<br/>
                </div>
            </div>
            
    <script type="text/ng-template" id="ModalContactDialog.html" >
        <div class="modal-header">
            <h3 ng-show="contact.id != null "><?php echo $language[$view->view]->btnUpdateContact;?></h3>
            <h3 ng-show="contact.id == null "><?php echo $language[$view->view]->btnAddNewContact;?></h3>
        </div>
        <div class="modal-body">
             <div class="lynx_row-content" ng-show="onLoadContact">
                <div  ng-if="onLoadContact" class="center"><img src="/images/loading.gif" alt="Loading..." class="loading"></div>
            </div>
            
            <div class="lynx_row-content" ng-show="!onLoadContact">
                   <alert ng-show="updateContactError != undefined" type="danger" close="closeAlertSaveContact('error');" >{{updateContactError}}</alert>
                   <alert ng-show="updateContactSucess != undefined" type="success" close="closeAlertSaveContact('susscess');">{{updateContactSucess}}</alert>

                    <div class="lynx_row">
                        <span class="lynx_lblFromtitle"><?php echo $language[$view->view]->lblContactsFullname;?></span>
                        <input ng-model="contact.full_name"/>
                    </div>
                    <div class="lynx_row">
                        <span class="lynx_lblFromtitle"><?php echo $language[$view->view]->lblContactsTelephone;?></span>
                        <input ng-model="contact.telephone"/>
                    </div>
                    <div class="lynx_row">
                        <span class="lynx_lblFromtitle"><?php echo $language[$view->view]->lblContactsStateProvince;?></span>
                        <input ng-model="contact.state_province" style="width: 250px;"/>
                    </div>
                    <div class="lynx_row">
                        <span class="lynx_lblFromtitle"><?php echo $language[$view->view]->lblContactsCity;?></span>
                        <input ng-model="contact.city_district" style="width: 250px;"/>
                    </div>
                    <div class="lynx_row">
                        <span class="lynx_lblFromtitle"><?php echo $language[$view->view]->lblContactsAddress;?></span>
                        <textarea ng-model="contact.street_address" style="width: 100%;height: 100px;text-align: left;"/>
                    </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" ng-click="ok()">OK</button>
            <button class="btn btn-warning" ng-click="cancel()">Cancel</button>
        </div>
    </script>
        </div>
</div> 