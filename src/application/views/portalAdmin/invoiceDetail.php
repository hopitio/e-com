<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Thông tin hóa đơn
        <small>Giao dịch</small>
    </h1>
</section>
<section class="content" ng-controller="PortalAdminInvoiceController">
<div id="alert-complete" class="alert alert-success alert-dismissable" display="none">
    <i class="fa fa-check"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <b>Thông báo!</b> Hoàn thành cập nhật
</div>
<div class="col-md-3">
    <div class="box box-danger">
        <div class="box-header">
            <h3 class="box-title">
                Thông tin hóa đơn 
            </h3>
        </div>
        <div class="box-body ">
            <span style="font-weight: bold;"> Mã hóa đơn : </span>{{invoice.id}}</br>
            <span style="font-weight: bold;"> Mã đơn hàng : </span>{{invoice.fk_order}}</br>
            <span style="font-weight: bold;"> Loại hóa đơn : </span>{{invoice.invoice_type}}</br>
            <span style="font-weight: bold;"> Ngày tạo : </span>{{invoice.created_date}}</br>
            <span style="font-weight: bold;"> Ngày thanh toán : </span>{{invoice.paid_date}} </br>
            <span style="font-weight: bold;"> Ngày hủy  : </span>{{invoice.cancelled_date}}</br>
            <span style="font-weight: bold;"> Ngày hủy (admin) : </span>{{invoice.rejected_date}}</br>
            <span style="font-weight: bold;"> Mã thanh toán : </span>{{invoice.payment_id}}</br>
            <span style="font-weight: bold;"> Tài khoản thực hiện giao dịch : </span>{{order.user.account}}</br>
            <span style="font-weight: bold;"> Ghi chú : </span>{{invoice.comment}}</br>
            <br/>
            <a class="btn btn-primary" style="width:100%" ng-click="openPaidedDateDialog()" href="javascript:void(0)"><i class="fa fa-fw fa-money"></i> Cập nhật ngày thanh toán</a>
            <br/><br/>
            <a class="btn btn-danger" style="width:100%" ng-click="destroyInvoice()" href="javascript:void(0)"><i class="fa fa-fw fa-edit"></i>Hủy hóa đơn</a>
        </div>
    </div>
    <div class="box box-danger">
        <div class="box-header">
            <h3 class="box-title">
                Thông tin phụ phí
            </h3>
        </div>
        <div class="box-body ">
            <table class="table table-hover table-condensed">
                <thead>
                    <tr>
                        <th>Mô tả</th>
                        <th style="width: 200px">Giá</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="otherCost in invoice.otherCosts">
                      <td>
                        <span>{{otherCost.comment}} <br/></span>
                      </td>
                      <td>
                        <span>Giá : {{otherCost.value | number}} VND <br/></span>
                      </td>
                    </tr>
                </tbody>
                <tfoot></tfoot>
             </table>
        </div>
    </div>
</div>
<div class="col-md-9">
    <div class="box box-danger">
        <div class="box-header">
            <h3 class="box-title">
                Thông tin vận chuyển
            </h3>
        </div>
        <div class="box-body ">
            <table class="table table-hover table-condensed">
                <thead>
                    <tr>
                        <th style="width: 150px">Trạng thái / hình thức</th>
                        <th>Mô tả</th>
                        <th style="width: 200px">Giá</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="shipping in invoice.shippings">
                      <td>
                        <span>Loại : {{shipping.shipping_type}} <br/></span>
                        <span>Trạng thái : {{shipping.status}} <br/></span>
                        <span>Hình thức : {{shipping.display_name}} <br/></span>
                      </td>
                      <td>
                        <span>Tên : {{shipping.contact.full_name}} <br/></span>
                        <span>SĐT : {{shipping.contact.telephone}} <br/></span>
                        <span>Địa chỉ : {{shipping.contact.state_province}} / {{shipping.contact.city_district}}  / {{shipping.contact.street_address}}<br/></span>
                        <span>Ngày tạo : {{shipping.created_date}} <br/></span>
                        <span>Ngày hoàn tất : {{shipping.ship_date}} <br/></span>
                      </td>
                      <td>
                        <span>Giá : {{shipping.price | number}} VND <br/></span>
                      </td>
                    </tr>
                </tbody>
                <tfoot></tfoot>
             </table>
        </div>
    </div>
    
    <div class="box box-danger">
        <div class="box-header">
            <h3 class="box-title">
                Thông tin sản phẩm
            </h3>
        </div>
        <div class="box-body ">
            <table class="table table-hover table-condensed">
                <thead>
                    <tr>
                        <th style="width: 75px">Mã</th>
                        <th style="width: 500px">Mô tả</th>
                        <th style="width: 200px">Giá / Thuế</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="product in invoice.products">
                      <td>{{product.id}}</td>
                      <td>
                        <div class="lynx_row lynx_productDes" >
                           <img style="margin: 0px 10px 10px 0px;float:left;" width="75px" height="" ng-src="{{product.sub_image}}"/>
                           <span class="lynx_productName">{{product.name}}</span><br/>
                           <span>{{product.short_description}}</span><br/>
                           <span>Số lượng : {{product.product_quantity}}</span><br/>
                           <span>Bên bán : {{product.seller_name}}</span><br/>
                        </div>
                      </td>
                      <td>
                        <span>Giá : {{product.product_price | number}} VND <br/></span>
                        <span ng-repeat="tax in product.taxs">
                            {{tax.sub_tax_name}} : {{tax.sub_tax_value | number}} VND
                            <br/>
                        </span>
                            
                      </td>
                    </tr>
                </tbody>
                <tfoot></tfoot>
             </table>
        </div>
    </div>
</div>
<!-- Modal paided date -->
<form id="frm-update-paided-date" method="post"> 
    <input id="paided-date" type="hidden" name="paided-date"/>
    <input id="invoice-payment-method" type="hidden" name="invoice-payment-method"/>
    <input id="invoice-payment-id" type="hidden" name="invoice-payment-id"/>
    <input id="callback" type="hidden" name="callback"/>
</form>

<!-- Modal paided date -->
<form id="frm-destroy-invoice" method="post"> 
    <input id="callback" type="hidden" name="callback"/>
</form>


<div id="paided-date-pop" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Nhập ngày thanh toán</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Nhập ngày thanh toán</label>
            <input ng-model="editPaidedDate" type="text" class="form-control" placeholder="ngày/tháng/năm" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask=""/>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Nhập phương thức thanh toán</label>
            <select ng-model="editPaymentMethod" class="form-control">
                <option value="PAYMENT_BY_NGANLUONG">Thanh toán qua ngân lượng</option>
                <option value="CASH" selected >Thanh toán bằng tiền mặt</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Nhập mã thanh toán </label>
            <input ng-model="editInvoicePaymentId" type="text" class="form-control" placeholder="Nhập mã thanh toán (nếu có)"/>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button ng-click="savePaidedDate()" type="button" class="btn btn-primary">Lưu thay đổi</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->





</section>


