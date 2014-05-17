<div class="lynx_portalAdminContainer lynx_staticWidth" ng-controller="PortalUserController">
    <?php require_once APPPATH.'views/portalAdmin/menu.php'; ?>
    <div class="lynx_portalAdminContent">
        <h4>TÀI KHOẢN</h4>
        <div class="lynx_row">
            <span class="lynx_fieldName">ID : </span>
            <span class="lynx_fieldValue">{{user.id}}</span>
            <span class="lynx_fieldName">Email : </span>
            <span class="lynx_fieldValue">{{user.account}}</span>
            <span class="lynx_fieldName">Ngày tham gia  : </span>
            <span class="lynx_fieldValue">{{user.date_joined}}</span>
            <span class="lynx_fieldName">Platfrom  : </span>
            <span class="lynx_fieldValue">{{user.platform_key}}</span>
        </div>
        <div class="lynx_row">
            <span class="lynx_fieldName">Họ và tên đệm : </span>
            <span class="lynx_fieldValue">{{user.firstname}}</span>
            <span class="lynx_fieldName">Tên : </span>
            <span class="lynx_fieldValue">{{user.lastname}}</span>
            <span class="lynx_fieldName">Ngày sinh : </span>
            <span class="lynx_fieldValue">{{user.DOB}}</span>
        </div>
        <div class="lynx_row">
            <span class="lynx_fieldName">Trạng thái hiện tại : </span>
            <span class="lynx_fieldValue">{{user.status}}</span>
            <span class="lynx_fieldName">Ngày cập nhật :</span>
            <span class="lynx_fieldValue">{{user.status_date}}</span>
            <span class="lynx_fieldName">Nguyên nhận cập nhât:</span>
            <span class="lynx_fieldValue">{{user.status_reason}}</span>
        </div>
           
        <h4>Lịch sử</h4>
        <div class="lynx_row">
            <div style="height:250px" class="gridStyle" ng-grid="gridOptionsHistory"></div>
        </div>
        <h4>Địa chỉ</h4>
        <div class="lynx_row">
            <div style="height:250px" class="gridStyle" ng-grid="gridOptionsContact"></div>
        </div>
        <h4>Setting</h4>
        <div class="lynx_row">
            <div style="height:250px" class="gridStyle" ng-grid="gridOptionsSetting"></div>
        </div>
        <div class="lynx_row lynx_rowButton">
            <button id="btnComfirm" class="lynx_button btn btn-primary" type="submit" >Hủy quyền đăng nhập</button>
        </div>
    </div>
</div>
<script type="text/javascript">
     var user = <?php echo json_encode($cuser) ?>;
</script>

