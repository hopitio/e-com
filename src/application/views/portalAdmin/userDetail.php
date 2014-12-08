<section class="content-header" ng-controller="PortalUserController">
    <h1>
        Tài khoản
        <small>{{user.account}}</small>
    </h1>
</section>
<section class="content" ng-controller="PortalUserController">
<div class="left col-md-8">
    <div class="box ">
        <div class="box-header">
            <h3 class="box-title">
                Danh sách địa chỉ hiện có
            </h3>
        </div>
        <div class="box-body ">
            <table class="table table-hover table-condensed">
                <thead>
                    <tr>
                        <th>Họ tên đầy đủ</th>
                        <th>SĐT</th>
                        <th>Ngày tạo</th>
                        <th>Địa chỉ cụ thể</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="contact in contacts">
                        <td>{{contact.full_name}}</td>
                        <td>{{contact.telephone}}</td>
                        <td>{{contact.created_at}}</td>
                        <td>{{contact.street_address}} - {{contact.street_address}} - {{contact.state_province}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="box ">
        <div class="box-header">
            <h3 class="box-title">
                Thông tin 50 hoạt động gần nhất
            </h3>
        </div>
        <div class="box-body ">
            <table id="user-datatable" class="table table-hover table-condensed">
                <thead>
                    <tr>
                        <th>Action Date</th>
                        <th>IP</th>
                        <th>Action Name</th>
                        <th>User Agrent</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="history in histories">
                        <td>{{history.action_date}}</td>
                        <td>{{history.client_ip}}</td>
                        <td>{{history.action_name}}</td>
                        <td>{{history.user_agrent}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="right col-md-4">
    <div class="box box-danger">
        <div class="box-header">
            <h3 class="box-title">
                Thông tin tài khoản 
            </h3>
            <div class="box-tools text-right">
                <div class="text-right">
                    <a href="javascript:void(0);" ng-show="user.status == 1" ng-click="rejectLogin()" id="btn-apply" novalidate="novalidate" class="btn" ng-click="find()"><i class="fa fa-save"></i> Hủy quyền đăng nhập</a>
                    <a href="javascript:void(0);" ng-show="user.status != 1" ng-click="openLogin()" id="btn-apply" novalidate="novalidate" class="btn" ng-click="find()"><i class="fa fa-save"></i> Khôi phục quyền đăng nhập</a>
                </div>
            </div>
        </div>
        <div class="box-body ">
            <div class="alert alert-info alert-dismissable" ng-repeat="alert in alerts" ng-click="closeAlert($index)">
                <i class="fa fa-info"></i>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <b>{{alert.msg}} !</b> 
            </div>
             <p><b>ID :</b> {{user.id}}</p>
             <p><b>Email :</b> {{user.account}}</p>
             <p><b>Ngày tham gia  :</b> {{user.date_joined}}</p>
             <p><b>Họ và tên đệm : </b> {{user.full_name}}</p>
             <p><b>SĐT : </b> {{user.phone}}</p>
             <p><b>Ngày sinh : </b>{{user.DOB}}</p></span>
             <p><b>Mô tả lần thay đổi status cuối : </b>{{user.status_reason}}</p></span>
        </div>
    </div>
    
    <div class="box box-success">
        <div class="box-header">
            <h3 class="box-title">
                Thông tin cài đặt tài khoản
            </h3>
        </div>
        <div class="box-body ">
            <table id="user-datatable" class="table table-hover table-condensed">
                <thead>
                    <tr>
                        <th>KEY</th>
                        <th>VALUE</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="setting in settings">
                        <td>{{setting.setting_key}}</td>
                        <td>{{setting.value}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</section>

<script type="text/javascript">
     var user = <?php echo json_encode($cuser) ?>;
</script>

