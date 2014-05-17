<div class="lynx_portalAdminContainer lynx_staticWidth" ng-controller="PortalUserListController">
    <?php require_once APPPATH.'views/portalAdmin/menu.php'; ?>
    <div class="lynx_portalAdminContent">
        <h4>TÌM KIẾM TÀI KHOẢN</h4>
        <div class="lynx_row">
            <span class="lynx_fieldName">ID</span>
            <span class="lynx_fieldValue"><input type="text" ng-model="userId"/></span>
            <span class="lynx_fieldName">Email</span>
            <span class="lynx_fieldValue"><input type="text" ng-model="account"/></span>
            <span class="lynx_fieldName">Họ và tên đệm</span>
            <span class="lynx_fieldValue"><input type="text" ng-model="firstName"/></span>
            <span class="lynx_fieldName">Tên</span>
            <span class="lynx_fieldValue"><input type="text" ng-model="lastName"/></span>
             
        </div>
        <div class="lynx_row lynx_rowButton">
            <button id="btnComfirm" class="lynx_button btn btn-primary" type="submit" ng-click="find()">Tìm kiếm</button>
        </div>
        
        <div class="lynx_row">
            <div style="height:500px" class="gridStyle" ng-grid="gridOptions"></div>
        </div>
    </div>
</div>
<script type="text/ng-template" id="actionCell.html" >
    <i ng-click="" title="Thông tin tài khoản người sử dụng" class="glyphicon glyphicon-user" style="cursor: pointer;font-size:15px; margin:5px;opacity: 0.25;"></i>
    <i ng-click="" title="Hủy quyền Đăng sản phẩm" class="glyphicon glyphicon-remove" style="cursor: pointer;font-size:15px; margin:5px;"></i>
    <i ng-click="" title="Phục hồi quyền đăng sản phẩm" class="glyphicon glyphicon-flash" style="cursor: pointer;font-size:15px; margin:5px;"></i>
</script>

