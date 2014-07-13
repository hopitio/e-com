<div  class="col-md-5">
    <div class="box">
    <form method="post" id="frm-edit" enctype="multipart/form-data" >
        <input type="hidden" value="{{currentPage}}" name="current_page"/>
        <div class="box-header">
           <h3 class="box-title">Chi tiết gian hàng</h3>
           <div class="box-tools text-right">
                <div class="text-right">
                    <a  href="javascript:;" id="btn-apply" class="btn" data-type="submit" data-action="/__admin/seller/edit/{{selectedSeller.id}}?callback={{currentPage}}"><i class="fa fa-save"></i> Chỉnh sửa</a>
                    <a  href="javascript:;" id="btn-apply" class="btn" data-type="submit" data-action="/__admin/seller/add?callback={{currentPage}}"><i class="fa fa-plus-square"></i> Thêm mới</a>
                </div>
            </div>
        </div>
        <div class="box-body">
            <input type="hidden" value="{{currentPage}}" name="current_page"/>
            <div class="input-group col-xs-12 text-right">
                <div class="btn-group" data-toggle="btn-toggle">
                    <button ng-click="changeStatus(1)" type="button" ng-class="{'active':selectedSeller.status == 1}" class="btn btn-success btn-xs" data-toggle="on"><i class="fa fa-unlock"></i>  Đang hoạt động</button>
                    <button ng-click="changeStatus(0)" type="button" ng-class="{'active':selectedSeller.status == 0}" class="btn btn-danger btn-xs " data-toggle="off"><i class="fa fa-lock"></i>  Ngưng hoạt động</button>
                </div>
            </div>
            <br/>
            <div class="input-group col-xs-12">
                <span class="input-group-addon"><span ng-show="!loadingTypeheadAddAccount">@</span> <i ng-show="loadingTypeheadAddAccount" class="fa fa-exchange"></i></span>
                <input type="text" typeahead="account as account.account for account in searchAccountAsyncCall($viewValue)" typeahead-loading="loadingTypeheadAddAccount" class="form-control" ng-model="selectedTypeheadAddAccount" placeholder="Tài khoản" >
            </div>
            <input type="hidden" name="portal_account" value="{{jsonSelectedTypeheadAddAccount()}}" data-rule-required="true"/>
            <br/>
            <div class="input-group col-xs-12">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" name="name" class="form-control" ng-model="selectedSeller.name" placeholder="Tên gian gian hàng">
            </div>
            <br/>
            <div class="input-group col-xs-12">
                <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                <input type="text" name="phone" class="form-control" ng-model="selectedSeller.phoneno" placeholder="Số điện thoại">
            </div>
            <br/>
            <div class="input-group col-xs-12">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input type="text" name="email" class="form-control" ng-model="selectedSeller.email" placeholder="E-mail">
            </div>
            <br/>
            <div class="input-group col-xs-12">
                <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                <input type="text" name="website" class="form-control" ng-model="selectedSeller.website" placeholder="Website">
            </div>
            <br/>
            <div class="input-group col-xs-12">
                <label for="exampleInputFile">Logo</label>
                <input type="file" name="logo"  id="exampleInputFile" >
                <input type="hidden" name="logo_url" value="{{selectedSeller.logo}}"/>
            </div>
            <br/>
            <div class="form-group">
                <label>Cấp độ gian hàng</label>
                <select name="seller_lever" class="form-control">
                    <option value="GOOD" selected>Good</option>
                    <option value="GREAT">Great</option>
                    <option value="BEST">Best</option>
                </select>
            </div>
            
            
        </div>
        
    </div>

    </form>

    </div>
    
</div>





