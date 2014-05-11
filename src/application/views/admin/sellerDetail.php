
<div class="lynx_dashboard lynx_staticWidth">
   <?php require_once APPPATH.'/views/admin/adminMenu.php';?>
   <div class="lynx_rightContent" ng-controller="SellerFindController">
        <h3>Chi tiết gian hàng</h3>
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




