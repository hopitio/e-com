<div  class="col-md-5">
    <div class="box">
    <form method="post" id="frm-edit" enctype="multipart/form-data" >
        <div class="box-header">
           <h3 class="box-title">Chi tiết gian hàng</h3>
           <div class="box-tools text-right">
                <div class="text-right">
                    <a href="javascript:;" id="btn-apply" class="btn" data-type="submit" data-action="/__admin/seller"><i class="fa fa-save"></i> Chỉnh sửa</a>
                    <a href="javascript:;" id="btn-apply" class="btn" data-type="submit" data-action="/__admin/seller"><i class="fa fa-plus-square"></i> Thêm mới</a>
                </div>
            </div>
        </div>
        <div class="box-body">
            <div class="input-group col-xs-12 text-right">
                <div class="btn-group" data-toggle="btn-toggle">
                    <button  type="button" class="btn btn-success btn-xs active" data-toggle="on"><i class="fa fa-unlock"></i>  Đang hoạt động</button>
                    <button type="button" class="btn btn-danger btn-xs " data-toggle="off"><i class="fa fa-lock"></i>  Ngưng hoạt động</button>
                </div>
            </div>
            <br/>
            <div class="input-group col-xs-12">
           
                <span class="input-group-addon"><span ng-show="!loadingSearchAccount">@</span> <i ng-show="loadingSearchAccount" class="fa fa-exchange"></i></span>
                <input type="text" name="user_id" typeahead="account as account.account for account in searchAccountAsyncCall($viewValue)" typeahead-loading="loadingSearchAccount" class="form-control" ng-model="selectedSearchAccount" placeholder="Tài khoản">
                
            </div>
            <br/>
            <div class="input-group col-xs-12">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" name="user_id" class="form-control" ng-model="userId" placeholder="Tên gian gian hàng">
            </div>
            <br/>
            
            <div class="input-group col-xs-12">
                <span class="input-group-addon"><i class="fa fa-code-fork"></i></span>
                <input type="text" name="user_id" class="form-control" ng-model="userId" placeholder="Danh mục">
            </div>
            <br/>
            <div class="input-group col-xs-12">
                <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                <input type="text" name="user_id" class="form-control" ng-model="userId" placeholder="Số điện thoại">
            </div>
            <br/>
            <div class="input-group col-xs-12">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input type="text" name="user_id" class="form-control" ng-model="userId" placeholder="E-mail">
            </div>
            <br/>
            <div class="input-group col-xs-12">
                <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                <input type="text" name="user_id" class="form-control" ng-model="userId" placeholder="Website">
            </div>
            <br/>
            <div class="input-group col-xs-12">
                <label for="exampleInputFile">Logo</label>
                <input type="file" id="exampleInputFile">
            </div>
            <br/>
            <div class="form-group">
                <label>Cấp độ gian hàng</label>
                <select class="form-control">
                    <option>option 1</option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                    <option>option 5</option>
                </select>
            </div>
            
            
        </div>
        
    </div>

    </form>

    </div>
    
</div>





