<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Khởi tạo đơn đặt hàng
        <small>Tạo đơn dặt hàng</small>
    </h1>
</section>

<section class="content" ng-controller="PortalUserListController">
    <div class="col-md-4">
        <div class="box box-danger">
            <div class="box-header">
                    <h3 class="box-title">
                        Thông tin về đơn đặt hàng
                    </h3>
                    <div class="box-tools text-right">
                        <div class="text-right"></div>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Subsys</label>
                        <select class="form-control" id="sub-system">
                            <option  value="gift">GIFT</option>
                            <option selected value="other">KHÁC</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ngày tạo</label>
                        <input class="form-control" type="text" id="txtCreatedDate" placeholder="Ngày tạo"/>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tài khoản tham gia giao dịch</label>
                        <input class="form-control" type="text" id="txtCreatedDate" placeholder="example@gmail.com"/>
                    </div>
                </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="box box-danger">
            <div class="box-header">
                    <h3 class="box-title">
                        Thông tin hóa đơn
                    </h3>
                    <div class="box-tools text-right">
                        <div class="text-right"></div>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Người khởi tạo</label>
                        <input class="form-control" disabled="disabled" type="text" id="txtCreatedUser" placeholder="example@gmail.com"/>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ghi chú</label>
                        <textarea class="form-control" id="comment" placeholder="example@gmail.com"></textarea>
                    </div>
                </div>
        </div>
    </div>
    <div class="col-md-12">
    </div>
     <div class="col-md-6">
        <div class="box box-danger">
            <div class="box-header">
                    <h3 class="box-title">
                        Thông tin Shipping
                        <br/>
                        <br/>
                        <a class="btn btn-default btn-sm"><i class="fa fa-plus-circle"></i></a>
                        <a class="btn btn-default btn-sm"><i class="fa fa-minus"></i></a>
                    </h3>
                    <div class="box-tools text-right">
                        <div class="text-right"></div>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row" style="border:dashed 1px #DDDDDD;margin:10px; padding:0px 10px">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên</label>
                            <input class="form-control" type="text" id="txtCreatedDate" placeholder=""/>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá</label>
                            <input class="form-control" type="text" id="txtCreatedDate" placeholder=""/>
                        </div>
                        <div class="form-group pull-right">
                            <a class="btn btn-default btn-sm"><i class="fa fa-check"></i></a>
                            <a class="btn btn-default btn-sm"><i class="fa fa-ban"></i></a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Địa chỉ chuyển hàng</label>
                        <select class="form-control" type="text" id="txtCreatedDate" placeholder="">
                            <option ></option>
                            <option ></option>
                        </select>
                        <p class="help-block"><input type="checkbox" value="" class="simple"/> Làm địa chỉ thanh toán</p>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Địa chỉ Thanh toán</label>
                        <select class="form-control" type="text" id="txtCreatedDate" placeholder="">
                            <option ></option>
                            <option ></option>
                        </select>
                    </div>
                </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="box box-danger">
            <div class="box-header">
                    <h3 class="box-title">
                        Thông tin thuế
                        <br/>
                        <br/>
                        <a class="btn btn-default btn-sm"><i class="fa fa-plus-circle"></i></a>
                        <a class="btn btn-default btn-sm"><i class="fa fa-minus"></i></a>
                    </h3>
                    <div class="box-tools text-right">
                        <div class="text-right"></div>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row" style="border:dashed 1px #DDDDDD;margin:0px 10px; padding:0px 10px">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên</label>
                            <input class="form-control" type="text" id="txtCreatedDate" placeholder=""/>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá</label>
                            <input class="form-control" type="text" id="txtCreatedDate" placeholder=""/>
                        </div>
                        <div class="form-group pull-right">
                            <a class="btn btn-default btn-sm"><i class="fa fa-check"></i></a>
                            <a class="btn btn-default btn-sm"><i class="fa fa-ban"></i></a>
                        </div>
                        
                    </div>
                    <table class="table table-hover table-condensed">
                        <thead>
                            <tr>
                                <th width="30%">Tên</th>
                                <th width="50%">Giá</th>
                            </tr>
                        </thead>
                    </table>
                </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="box box-danger">
            <div class="box-header">
                    <h3 class="box-title">
                        Thông tin phụ phí
                        <br/>
                        <br/>
                        <a class="btn btn-default btn-sm"><i class="fa fa-plus-circle"></i></a>
                        <a class="btn btn-default btn-sm"><i class="fa fa-minus"></i></a>
                    </h3>
                </div>
                <div class="box-body">
                    <div class="row" style="border:dashed 1px #DDDDDD;margin:0px 10px; padding:0px 10px">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá</label>
                            <input class="form-control" type="text" id="txtCreatedDate" placeholder=""/>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô tả</label>
                            <textarea class="form-control" id="txtCreatedDate" placeholder=""></textarea>
                        </div>
                        <div class="form-group pull-right">
                            <a class="btn btn-default btn-sm"><i class="fa fa-check"></i></a>
                            <a class="btn btn-default btn-sm"><i class="fa fa-ban"></i></a>
                        </div>
                        
                    </div>
                    <table class="table table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th width="30%">Giá</th>
                                    <th width="50%">Mô tả</th>
                                </tr>
                            </thead>
                    </table>
                </div>
        </div>
    </div>
   
    <div class="col-md-12">
        <div class="box box-danger">
            <div class="box-header">
                    <h3 class="box-title">
                        Thông tin về sản phẩm
                        <br/>
                        <br/>
                        <a class="btn btn-default btn-sm"><i class="fa fa-plus-circle"></i></a>
                        <a class="btn btn-default btn-sm"><i class="fa fa-minus"></i></a>
                    </h3>
                    <div class="box-tools text-right">
                        <div class="text-right"></div>
                    </div>
                </div>
                <div class="box-body" >
                    <div class="row" style="padding: 0px 10px;">
                        <div class="col-md-8">
                            <table class="table table-hover table-condensed">
                                <thead>
                                    <tr>
                                        <th width="30%">Tên / Ảnh đại diện</th>
                                        <th width="50%">Mô tả</th>
                                        <th colspan="20%">Giá bán</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-4" style="border:dashed 1px #DDDDDD">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Client ID</label>
                                <input class="form-control" type="text" id="txtCreatedDate" placeholder=""/>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên</label>
                                <input class="form-control" type="text" id="txtCreatedDate" placeholder=""/>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ảnh đại diện</label>
                                <input class="form-control" type="text" id="txtCreatedDate" placeholder=""/>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá bán</label>
                                <input class="form-control" type="text" id="txtCreatedDate" placeholder=""/>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá bán thực</label>
                                <input class="form-control" type="text" id="txtCreatedDate" placeholder=""/>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số lượng thực</label>
                                <input class="form-control" type="text" id="txtCreatedDate" placeholder=""/>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mô tả</label>
                                <textarea class="form-control" id="txtCreatedDate" placeholder=""></textarea>
                            </div>
                            <div class="form-group pull-right">
                                 <a class="btn btn-default btn-sm"><i class="fa fa-check"></i></a>
                                 <a class="btn btn-default btn-sm"><i class="fa fa-ban"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <div class="col-md-4 pull-right">
        <div class="box box-danger">
            <div class="box-body text-right">
                    <a class="btn btn-success btn-lg "><i class="fa fa-check"></i> Hoàn tất</a>
                    <a class="btn btn-warning btn-lg "><i class="fa fa-ban"></i> Hủy</a>
            </div>
        </div>
    </div>
    
    
</section>