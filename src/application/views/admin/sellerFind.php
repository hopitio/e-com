
<div class="lynx_dashboard lynx_staticWidth">
   <?php require_once APPPATH.'/views/admin/adminMenu.php';?>
   <div class="lynx_rightContent" ng-controller="SellerFindController">
        <h3>Tìm kiếm người bán</h3>
        <div class="lynx_pageContent">
            <div class="lynx_fromSearchSeller">
                <span>UserId</span> <input type="text" />
                <span>Tên người bán</span> <input type="text" />
            </div>
            <div class="gridStyle" ng-grid="gridOptions"></div>
        </div>
   </div>
   
</div>
