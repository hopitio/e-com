<div class="lynx_portalAdminContainer lynx_staticWidth" ng-controller="PortalAdminOrderController">
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
            <span class="lynx_fieldValue">Ngày tham gia : {{order.user.date_joined}}</span>
        </div>
        <div ng-show="order.user != null" class="lynx_row" >
            <span class="lynx_fieldValue">First name : {{order.user.firstname}}</span>
            <span class="lynx_fieldValue">Last name : {{order.user.lastname}}</span>
            <span class="lynx_fieldValue">Ngày sinh : {{order.user.DOB}}</span>
            <span class="lynx_fieldValue">Giới tính : {{order.user.sex}}</span>
        </div>
        <div ng-show="order.user != null" class="lynx_row" >
            <span class="lynx_fieldValue">Trạng thái : {{order.user.status}}</span>
            <span class="lynx_fieldValue">Ngày cập nhật trạng thái : {{order.user.status_date}}</span>
            <span class="lynx_fieldValue">Nguyên nhân : {{order.user.status_reason}}</span>
        </div>
        
        <h4>Thông tin thông tin Order</h4>
        <div class="lynx_row">
            <span class="lynx_fieldValue">ID : {{order.id}}</span>
        </div>
        <div class="lynx_row">
            <span class="lynx_fieldValue">Ngày Tạo : {{order.created_date}} <br/></span>
            <span class="lynx_fieldValue">Ngày hủy : {{order.canceled_date}} <br/></span>
            <span class="lynx_fieldValue">Ngày giao hàng: {{order.shiped_date}} <br/></span>
            <span class="lynx_fieldValue">Ngày Hoàn tất : {{order.completed_date}} <br/></span>
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
                    <tr ng-repeat="product in order.uniqueProducts">
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
        
        <h4>Danh sách hóa đơn</h4>
        <div class="lynx_row">
             <table class="lynx_table">
                <thead>
                    <tr>
                        <th style="width: 100px">Loại - Mã</th>
                        <th style="width: 150px">Ngày tạo</th>
                        <th>Comment</th>
                        <th style="width: 150px">Thanh toán</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="invoice in order.invoices">
                      <td><span>{{invoice.invoice_type}} - {{invoice.id}}</span></td>
                      <td><span>{{invoice.created_date}}</span></td>
                      <td><span>{{invoice.comment}}</span></td>
                      <td>
                        <span>Mã : {{invoice.payment_id}}<br/></span>
                        <span>Phương thức : {{invoice.payment_method}}<br/></span>
                        <span>Loại tiền : {{invoice.payment_currency}}<br/></span>
                      </td>
                    </tr>
                </tbody>
                <tfoot></tfoot>
             </table>
        </div>
        
        <h4>Lịch sử trạng thái</h4>
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


