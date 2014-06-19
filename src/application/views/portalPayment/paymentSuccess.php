<div class="lynx_paymentComplete lynx_staticWidth" ng-controller="PortalOrderComplete">
    <h3><?php echo $language[$view->view]->lblNotify;?></h3>
    <div class="lynx_orderInformation">
        <div class="lynx_orderInformationRow">
            <?php if(!$isError){?>
                <span style="text-align: center;width:100%">
                    <?php echo str_replace("{br}", "<br/>", $language[$view->view]->lblSucessMsg);?>
                </span>
            <?php }else {?>
                <span style="text-align: center;width:100%">
                    <?php echo $language[$view->view]->lblFaileMsg;?>
                </span>
            <?php }?>
        </div>
    </div>
</div>