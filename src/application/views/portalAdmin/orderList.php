<div class="lynx_portalAdminContainer lynx_staticWidth" ng-controller="PortalAdminOrderListController">
    <?php require_once APPPATH.'views/portalAdmin/menu.php'; ?>
    <div class="lynx_portalAdminContent">
        <div class="lynx_row">
            <alert ng-repeat="alert in alerts" type="alert.type" close="closeAlert($index)">{{alert.msg}}</alert>
        </div>
        <h4>TÌM KIẾM GIAO DỊCH</h4>
        <div class="lynx_row">
            <span class="lynx_fieldName" style="width:100px"> ID</span>
            <span class="lynx_fieldValue"><input type="text" ng-model="userId"/></span>
            <span class="lynx_fieldName" style="width:100px">Mã Hóa Đơn</span>
            <span class="lynx_fieldValue"><input type="text" ng-model="userId"/></span>
        </div>
        <div class="lynx_row">
            <span class="lynx_fieldName" style="width:100px">ACCOUNT</span>
            <span class="lynx_fieldValue"><input type="text" ng-model="account"/></span>
            <span class="lynx_fieldName" style="width:100px">NGÀY TẠO</span>
            <span class="lynx_fieldValue"><input type="text" ng-model="lastName"/></span>
        </div>

        <div class="lynx_row lynx_rowButton">
            <button id="btnComfirm" class="lynx_button btn btn-primary" type="submit" ng-click="find()">Tìm kiếm</button>
        </div>
        
        <div class="lynx_row">
            <div style="height:250px" class="gridStyle" ng-grid="gridOptions"></div>
        </div>
        
        <h4>Hóa đơn của order <a ng-show="selectdOrder[0].id != undefined" ng-href="/portal/__admin/order/{{selectdOrder[0].id}}/add_invoice" target="_blank"><i class="glyphicon glyphicon-plus-sign" style="cursor: pointer;"></i></a></h4>
        <div class="lynx_row">
            <div style="height:250px" class="gridStyle" ng-grid="gridInvoicesOptions"></div>
        </div>
        
    </div>
</div>
<script type="text/ng-template" id="actionCell.html" >
    <a href="{{row.getProperty('detailUrl')}}" target="_blank"><i title="Chi tiết đơn đặt hàng" class="glyphicon glyphicon-file" style="cursor: pointer;font-size:15px; margin:5px;"></i></a>
</script>

