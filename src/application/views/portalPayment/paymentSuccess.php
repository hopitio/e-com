<div class="lynx_paymentComplete lynx_staticWidth" ng-controller="PortalOrderComplete">
    <h3>Thông báo</h3>
    <div class="lynx_orderInformation">
        <div class="lynx_orderInformationRow">
            <?php if(!$isError){?>
                <span style="text-align: center;width:100%">
                    Bạn vừa thanh toán thành công vui lòng kiểm tra mail. <br/> 
                    Nhân viên bán hàng sẽ liên hệ sớm nhất với bạn.
                </span>
            <?php }else {?>
                <span style="text-align: center;width:100%">
                    Thanh toán thất bại, vui lòng kiểm tra lại thông tin.
                </span>
            <?php }?>
        </div>
    </div>
</div>