
<script type="text/javascript">
function submitFrom(){
    $("#search_from").submit();
}

</script>
<div class="lynx_giftAdminContent" ng-controller="SellerFindController">
    <h3>Tìm kiếm người bán</h3>
    <div class="lynx_pageContent">
        <div class="lynx_fromSearch">
            <form id="search_from" method="get">
                <span>Mã nhà quản trị</span> <input name="user_id" type="text" ng-model="userId" />
                <span>Tên Gian hàng</span> <input name="seller_name" type="text" ng-model="sellerName" />
                <input name="page_number" value="{{pagingOptions.currentPage}}" type="hidden"/>
                <input name="page_size" value="{{pagingOptions.pageSize}}" type="hidden"/>
                <input type="submit" value="Tìm kiếm" onclick="submitFrom()" />
            </form>
        </div>
        <div class="gridStyle" ng-grid="gridOptions"></div>
    </div>
</div>

<script type="text/ng-template" id="cellIdTemplate.html" >
    <i ng-click="" title="Thông tin tài khoản người sử dụng" class="glyphicon glyphicon-user" style="cursor: pointer;font-size:15px; margin:5px;opacity: 0.25;"></i>
    <i ng-click="" title="Chỉnh sửa thông tin gian hàng" class="glyphicon glyphicon-cog" style="cursor: pointer;font-size15px; margin:5px;" ></i>
    <i ng-click="" title="Hủy quyền Đăng sản phẩm" class="glyphicon glyphicon-remove" style="cursor: pointer;font-size:15px; margin:5px;"></i>
    <i ng-click="" title="Phục hồi quyền đăng sản phẩm" class="glyphicon glyphicon-flash" style="cursor: pointer;font-size:15px; margin:5px;"></i>
</script>
<script type="text/ng-template" id="cellImageTemplate.html" >
    <img src="{{row.getProperty('logo')}}" style="min-width:40px;min-height:40px;margin:5px"/>
</script>



