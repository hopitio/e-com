<?php ?>
<section class="content-header">
    <h1>
        Tra cứu sản phẩm
    </h1>
</section>
<section class="content" ng-controller="productCtrl">
    <form class="box" id="search_form" >
        <div class="box-header">
            <h3 class="box-title">Tìm kiếm sản phẩm</h3>
            <div class="box-tools text-right">
                <div class="text-right">
                    <a href="javascript:void(0);" id="btn-apply" novalidate="novalidate" class="btn" data-type="submit"><i class="fa fa-search"></i> Tìm kiếm</a>
                </div>
            </div>
        </div>
        <div class="box-body" >
            <input id="page_size" type="hidden" value="{{pageSize}}" name="page_size"/>
            <input id="page_number" type="hidden" value="{{pageNumber}}" name="page_number"/>
            <div class="input-group input-group-sm col-xs-12">
                <span class="input-group-addon">ID</span>
                <input type="text" name="id" class="form-control" ng-model="search.ID">
                <span class="input-group-addon">Tên</span>
                <input type="text" name="name" class="form-control" ng-model="search.name">
                <span class="input-group-addon">Loại</span>
                <select name="type" class="form-control" ng-model="search.type">

                </select>
                <span class="input-group-addon">Chuyên mục</span>
                <select name="category" class="form-control" ng-model="search.category" ng-options="category.name group by category.parent_name  for category in categories">
                    <option></option>
                </select>
                <span class="input-group-addon">Mã</span>
                <input type="text" name="code" class="form-control" ng-model="search.code">
            </div>
            <div class="input-group input-group-sm col-xs-12">
                <span class="input-group-addon">Người bán</span>
                <select name="seller" class="form-control" ng-model="search.seller" ng-options="seller.name for seller in sellers"></select>
                <span class="input-group-addon">Giá</span>
                <input type="text" name="price_ge" class="form-control" ng-model="search.priceGE" placeholder="Từ">
                <span class="input-group-addon"></span>
                <input type="text" name="price_le" class="form-control" ng-model="search.priceLE" placeholder="Đến">
                <span class="input-group-addon">Số lượng</span>
                <input type="text" name="qty_ge" class="form-control" ng-model="search.qtyGE" placeholder="Từ">
                <span class="input-group-addon"></span>
                <input type="text" name="qty_le" class="form-control" ng-model="search.qtyLE" placeholder="Đến">
                <span class="input-group-addon">Trạng thái</span>
                <select name="status" class="form-control" ng-model="search.status">
                    <option ng-repeat="(k,v) in statuses" value="{{k}}">{{v}}</option>
                </select>
            </div>
        </div>
        <div class="box-body table-responsive no-padding" style="min-height: 300px;">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="3%"><input type="checkbox" ng-model="checkall"></th>
                        <th width="7%" >ID</th>
                        <th width="25%">Tên</th>
                        <th width="5%">Loại</th>
                        <th width="10%">Chuyên mục</th>
                        <th width="10%">SKU</th>
                        <th width="15%">Người bán</th>
                        <th width="10%">Giá</th>
                        <th width="5%">Số lượng</th>
                        <th width="5%">Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="product in products">
                        <td><input type="checkbox" name="chk" class="icheck" value="{{product.id}}"></td>
                        <td>{{product.id}}</td>
                        <td>{{product.name}}</td>
                        <td></td>
                        <td>{{product.category}}</td>
                        <td>{{product.code}}</td>
                        <td>{{product.seller_name}}</td>
                        <td>{{product.price}}</td>
                        <td>{{product.qty}}</td>
                        <td>{{product.status}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form><!--box-->
</section>
<script>
    var script_data = {
        categories: <?php echo json_encode($categories) ?>,
        sellers: <?php echo json_encode($sellers) ?>
    };
</script>
<script>
    function productCtrl($scope, $http, $timeout) {
        $scope.categories = script_data.categories;
        $scope.sellers = script_data.sellers;
        $scope.products = [];
        $scope.statuses = {'all': 'Tất cả', 'selling': 'Đang bán', 'not-selling': 'Không bán', 'deleted': 'Đã xóa'};
        $scope.search = {
            category: null,
            seller: null,
            status: 'all'
        };
        $http.get('/__admin/product/svc_all_products').success(function(resp) {
            $scope.products = resp.data;
            $timeout(function() {
                $('.icheck').iCheck({
                    checkboxClass: 'icheckbox_minimal',
                    radioClass: 'iradio_minimal'
                }).removeClass('icheck');
            });
        });
    }//ctrl
</script>