<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Tài khoản
        <small>Tìm kiếm tài khoản</small>
    </h1>
</section>

<section class="content" ng-controller="PortalUserListController">
    <div class="box box-danger col-md-6">
        <div class="box-header">
            <h3 class="box-title">
                Tìm kiếm user <a href="<?php echo site_url("portal/__admin/user/create"); ?>" title="Thêm mới tài khoản"><i class="fa fa-fw fa-plus-square"></i></a>
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
                <span class="input-group-addon" >Mã tài khoản</span>
                <input type="text" class="form-control" ng-model="userId"/>
                <span class="input-group-addon">Email</span>
                <input type="text" class="form-control" ng-model="account"/>
                <span class="input-group-addon" >Họ và tên</span>
                <input type="text" class="form-control" ng-model="full_name"/>
            </div>
        </div>
        <div class="box-body">
            <table id="user-datatable" class="table table-hover table-condensed">
                <thead>
                    <tr>
                        <th>Mã TK</th>
                        <th>Email</th>
                        <th>Họ và tên</th>
                        <th>Ngày sinh</th>
                        <th>Ngày tham gia</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
         
                <tfoot>
                    <tr>
                        <th>Mã TK</th>
                        <th>Email</th>
                        <th>Họ và tên</th>
                        <th>Ngày sinh</th>
                        <th>Ngày tham gia</th>
                        <th>Trạng thái</th>
                    </tr>
                </tfoot>
                
                <tbody>
                    <tr ng-repeat="user in users">
                        <td>{{user.id}}</td>
                        <td>{{user.account}}</td>
                        <td>{{user.full_name}}</td>
                        <td>{{user.DOB}}</td>
                        <td>{{user.date_joined}}</td>
                        <td>
                            <a href="{{user.detailUrl}}"><i title="Thông tin tài khoản người sử dụng" class="glyphicon glyphicon-user" style="cursor: pointer;font-size:15px; margin:5px;"></i></a>
                            <i ng-show="user.status == '1'" ng-click="rejectLoginStatus(user.id)" title="Hủy quyền đăng nhập" class="glyphicon glyphicon-remove" style="cursor: pointer;font-size:15px; margin:5px;"></i>
                            <i ng-show="user.status == '2'" ng-click="openLoginStatus(user.id)" title="Mở quyền đăng nhập" class="glyphicon glyphicon-flash" style="cursor: pointer;font-size:15px; margin:5px;"></i>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
    

