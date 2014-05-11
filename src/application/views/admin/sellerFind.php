
<div class="lynx_dashboard lynx_staticWidth">
   <?php require_once APPPATH.'/views/admin/adminMenu.php';?>
   <div class="lynx_rightContent" ng-controller="SellerFindController">
        <h3>Tìm kiếm người bán</h3>
        <div class="lynx_pageContent">
            <div class="lynx_fromSearchSeller">
                <span>UserId</span> <input type="text" ng-model="userId" />
                <span>Tên Gian hàng</span> <input type="text" ng-model="sellerName" />
                <input type="button" value="Tìm kiếm" ng-click="getPagedDataAsync(pagingOptions.pageSize,1)"/>
            </div>
            <div class="gridStyle" ng-grid="gridOptions"></div>
        </div>
   </div>
</div>
<script type="text/ng-template" id="cellIdTemplate.html" >
    <i ng-click="" title="Thông tin tài khoản người sử dụng" class="glyphicon glyphicon-user" style="cursor: pointer;font-size:15px; margin:5px;opacity: 0.25;"></i>
    <i ng-click="" title="Chỉnh sửa thông tin gian hàng" class="glyphicon glyphicon-cog" style="cursor: pointer;font-size15px; margin:5px;" ></i>
    <i ng-click="" title="Hủy quyền Đăng sản phẩm" class="glyphicon glyphicon-remove" style="cursor: pointer;font-size:15px; margin:5px;"></i>
    <i ng-click="" title="Phục hồi quyền đăng sản phẩm" class="glyphicon glyphicon-flash" style="cursor: pointer;font-size:15px; margin:5px;"></i>
</script>
<script type="text/ng-template" id="cellImageTemplate.html" >
    <img src='{{logo}}' style="min-width:20px;min-height:20px;margin:5px"/>
</script>



