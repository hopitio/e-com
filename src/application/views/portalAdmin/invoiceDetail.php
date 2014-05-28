<div class="lynx_portalAdminContainer lynx_staticWidth" ng-controller="PortalAdminInvoiceController">
    <?php require_once APPPATH.'views/portalAdmin/menu.php'; ?>
    <div class="lynx_portalAdminContent">
        <div class="lynx_row">
            <alert ng-repeat="alert in alerts" type="alert.type" close="closeAlert($index)">{{alert.msg}}</alert>
        </div>
        <h4 ng-show="order.user == null">Thông tin tài khoản - Khách vãng lai</h4>
        <div ng-show="order.user == null" class="lynx_row">
            N/A
        </div>
        
        <h4 ng-show="order.user != null">Thông tin tài khoản</h4>
        <div ng-show="order.user != null" class="lynx_row" >
            <span class="lynx_fieldValue">ID : {{order.user.id}}</span>
            <span class="lynx_fieldValue">Account : {{order.user.account}}</span>
            <span class="lynx_fieldValue">First name : {{order.user.frist_name}}</span>
            <span class="lynx_fieldValue">Last name : {{order.user.lastname}}</span>
            <span class="lynx_fieldValue">Ngày tham gia : {{invoice.date_joined}}</span>
        </div>
        
        <h4>Thông tin thông tin hóa đơn</h4>
        <div class="lynx_admin_robin" >
            <ul>
                <li><a href="{{invoice.order.detail_url}}">Chi tiết đơn hàng</a></li>
            </ul>
        </div>
        <div class="lynx_row">
            <span class="lynx_fieldValue">ID : {{invoice.id}}</span>
            <span class="lynx_fieldValue">Create by : {{invoice.created_user}}</span>
            <span class="lynx_fieldValue">Order : {{invoice.fk_order}}</span>
            <span class="lynx_fieldValue">Loại hóa đơn : {{invoice.invoice_type}}</span>
        </div>
        <div class="lynx_row">
            <span class="lynx_fieldValue">Ngày thanh toán : {{invoice.paid_date}}</span>
            <span class="lynx_fieldValue">Ngày hủy : {{invoice.cancelled_date}}</span>
            <span class="lynx_fieldValue">Ngày hủy (Admin) : {{invoice.rejected_date}}</span>
        </div>
        <div class="lynx_row">
            <span class="lynx_fieldValue">Mã thanh toán : {{invoice.payment_id}}</span>
            <span class="lynx_fieldValue">Phương thức thanh toán : {{invoice.payment_method}}</span>
            <span class="lynx_fieldValue">Loại tiền thanh toán : {{invoice.payment_currency}}</span>
        </div>
        <div class="lynx_row">
            <span class="lynx_fieldName">Comment</span>
            <span class="lynx_fieldValue">{{invoice.comment}}</span>
        </div>
        
        <h4>Thông tin sản phẩm</h4>
        <div class="lynx_row">
             <table class="lynx_table">
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
                           <img width="75px" height="" ng-src="{{product.sub_image}}"/>
                           <span class="lynx_productName">{{product.name}}</span><br/>
                           <span>{{product.short_description}}</span><br/>
                           <span>Số lượng : {{product.quantity}}</span><br/>
                           <span>Bên bán : {{product.seller_name}}</span><br/>
                        </div>
                      </td>
                      <td>
                        <span>Giá : {{product.total_price | number}} VND <br/></span>
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
        
        <h4>Thông tin vận chuyển</h4>
        <div class="lynx_row">
             <table class="lynx_table">
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
        
        <h4>Thông tin phụ phí</h4>
        <div class="lynx_row">
             <table class="lynx_table">
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
<script type="text/ng-template" id="productsDesTemplate.html" >
    <div class="lynx_row" >
	   <img width="50px" height="" src="{{product.sub_image}}"/>
    </div>
</script>


