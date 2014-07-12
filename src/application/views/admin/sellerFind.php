
<div class="col-md-7" >
    <div class="box">
    <form id="search_from" method="get">
        <div class="box-header">
            <h3 class="box-title">Tìm kiếm gian hàng</h3>
           <div class="box-tools text-right">
                <div class="text-right">
                    <a href="javascript:void(0);" id="btn-apply" novalidate="novalidate" class="btn" data-type="submit"><i class="fa fa-save"></i> Tìm kiếm</a>
                </div>
            </div>
        </div>
        <div class="box-body" >
            <div class="input-group col-xs-12">
                <span class="input-group-addon">Tên</span>
                <input type="text" name="seller_name" class="form-control" ng-model="sellerName"  placeholder="Tên gian hàng">
                <span class="input-group-addon"><span ng-show="!loadingSearchAccount">Tài khoản</span> <i ng-show="loadingSearchAccount" class="fa fa-exchange"></i></span>
                <input  type="text" typeahead="account as account.account for account in searchAccountAsyncCall($viewValue)" typeahead-loading="loadingSearchAccount" class="form-control" ng-model="selectedSearchAccount" placeholder="Tài khoản">
                <input type="hidden" value="{{selectedSearchAccount.id}}" name="user_id"/>
            </div>
        </div>
        <div class="box-body table-responsive no-padding" style="min-height:367px;" >
                <table class="table table-hover">
                 <tbody>
                    <tr>
                        <th>Logo </th>
                        <th>Tên gian hàng</th>
                        <th>Trạng thái / Email</th>
                        <th></th>
                    </tr>
                    <tr class="cursor-pointer" ng-repeat="seller in sellers">
                        <th><img width="40px" height="40px" ng-src="{{seller.name}}"/></th>
                        <th>
                            {{seller.name}}
                        </th>
                        <th>
                            <small ng-show="seller.status == 1" class="label label-success"><i class="fa fa-unlock"></i>  Đang hoạt động</small>
                            <small ng-show="seller.status == 0" class="label label-danger"><i class="fa fa-lock"></i>  Ngưng hoạt động</small>
                            {{seller.email}}
                            </th>
                        <th>
                            
                        </th>
                    </tr>
                </tbody>
                </table>
            </div>
        
        <div class="box-footer clearfix">
            <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="javascript:void(0)">«</a></li>
                <li><a href="#">1</a></li>
                <li><a href="javascript:void(0)">»</a></li>
            </ul>
        </div>
     </form>
    </div>
</div>



