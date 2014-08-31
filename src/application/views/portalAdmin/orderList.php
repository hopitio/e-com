<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Giao dịch
        <small>Tìm kiếm Giao dịch</small>
    </h1>
</section>

<section class="content" ng-controller="PortalAdminOrderListController">
<div class="col-md-9">
    <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">
                    Tìm kiếm Giao dịch 
                </h3>
                <div class="box-tools text-right">
                    <div class="text-right">
                        <a href="javascript:void(0);" id="btn-apply" novalidate="novalidate" class="btn" ng-click="find()"><i class="fa fa-save"></i> Tìm kiếm</a>
                    </div>
                </div>
            </div>
            <div class="box-body ">
                <div class="alert alert-info alert-dismissable" ng-repeat="alert in alerts" ng-click="closeAlert($index)">
                    <i class="fa fa-info"></i>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <b>{{alert.msg}} !</b> 
                </div>
                <div class="input-group input-group-sm col-xs-12 lynx-admin-group">
                    <span class="input-group-addon" >Mã giao dịch</span>
                    <input type="text" class="form-control" ng-model="orderId"/>
                    <span class="input-group-addon" >Tài khoản (Email)</span>
                    <input type="text" class="form-control" ng-model="account"/>
                    <span class="input-group-addon">Ngày tạo</span>
                    <input type="text" class="form-control"  ng-model="createdDate"  data-inputmask="'alias': 'dd/mm/yyyy'"/>
                </div>
            </div>
            <div class="box-body ">
                <table id="user-datatable" class="table table-hover table-condensed">
                    <thead>
                        <tr>
                            <th>Mã order </th>
                            <th>Tài khoản</th>
                            <th>Ngày tạo</th>
                            <th>Ngày chuyển hàng</th>
                            <th>Ngày kết thúc</th>
                            <th>Ngày hủy</th>
                            <th></th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr ng-repeat="order in orders">
                            <th>{{order.id}}</th>
                            <th>{{order.t_user_account}}</th>
                            <th>{{order.created_date}}</th>
                            <th>{{order.shiped_date}}</th>
                            <th>{{order.completed_date}}</th>
                            <th>{{order.canceled_date}}</th>
                            <th><a href="{{order.detailUrl}}">Chi tiết</a> <br/> <a ng-click="getInvoicesAsync(order)" href="javascript:void(0)">Hóa đơn</a></th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
</div>

<div class="col-md-3">
    <div class="box box-danger col-md-6">
            <div class="box-header">
                <h3 class="box-title">
                    Hóa đơn liên quan
                </h3>
            </div>
            <div class="box-body ">
                <table id="invoice-datatable" class="table table-hover table-condensed">
                    <thead>
                        <tr>
                            <th>Mã order </th>
                            <th>Ngày tạo</th>
                            <th>Ngày thanh toán</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr ng-repeat="invoice in invoices">
                            <td><a href="{{invoice.detailUrl}}">{{invoice.id}}</a></td>
                            <td>{{invoice.created_date}} </td>
                            <td>{{invoice.paid_date}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
</div>
</section>


