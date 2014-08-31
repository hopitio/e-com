<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Thông tin hóa đơn
        <small>Giao dịch</small>
    </h1>
</section>
<section class="content" ng-controller="PortalAdminInvoiceController">
<div class="col-md-3">
    <div class="box box-danger">
        <div class="box-header">
            <h3 class="box-title">
                Thông tin hóa đơn
            </h3>
        </div>
        <div class="box-body ">
            <span> Mã hóa đơn : </span>{{invoice.id}}</br>
            <span> Mã đơn hàng : </span>{{invoice.fk_order}}</br>
            <span> Loại hóa đơn : </span>{{invoice.invoice_type}}</br>
            <span> Ngày tạo : </span>{{invoice.created_date}}</br>
            <span> Ngày thanh toán : </span>{{invoice.paid_date}}</br>
            <span> Ngày hủy  : </span>{{invoice.cancelled_date}}</br>
            <span> Ngày hủy (admin) : </span>{{invoice.rejected_date}}</br>
            <span> Mã phương thức thanh toán : </span>{{invoice.payment_method}}</br>
            <span> Tài khoản thực hiện giao dịch : </span>{{order.user.account}}</br>
            <span> Ghi chú : </span>{{invoice.comment}}</br>
            <a class="btn btn-primary">Cập nhật ngày thanh toán</a>
            <a class="btn btn-primary">Hủy hóa đơn</a>
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
                        <th>Mô tả</th>
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
</section>


