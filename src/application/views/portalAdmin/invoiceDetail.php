<div class="lynx_portalAdminContainer lynx_staticWidth" ng-controller="PortalAdminInvoiceController">
    <?php require_once APPPATH.'views/portalAdmin/menu.php'; ?>
    <div class="lynx_portalAdminContent">
        <div class="lynx_row">
            <alert ng-repeat="alert in alerts" type="alert.type" close="closeAlert($index)">{{alert.msg}}</alert>
        </div>
        <h4>Thông tin tài khoản</h4>
        <div class="lynx_row">
             
        </div>
        
        <h4>Thông tin người thực hiện giao dịch</h4>
        <div class="lynx_row">
             
        </div>
        
        <h4>Thông tin thông tin hóa đơn</h4>
        <div class="lynx_row">
            <span class="lynx_fieldName">ID</span>
            <span class="lynx_fieldValue">{{invoice.id}}</span>
            <span class="lynx_fieldName">Create by</span>
            <span class="lynx_fieldValue">{{invoice.created_user}}</span>
            <span class="lynx_fieldName">Order</span>
            <span class="lynx_fieldValue">{{invoice.fk_order}}</span>
            <span class="lynx_fieldName">Order</span>
            <span class="lynx_fieldValue">{{invoice.invoice_type}}</span>
        </div>
        <div class="lynx_row">
            <span class="lynx_fieldName">Paid date</span>
            <span class="lynx_fieldValue">{{invoice.paid_date}}</span>
            <span class="lynx_fieldName">Cancelled date</span>
            <span class="lynx_fieldValue">{{invoice.cancelled_date}}</span>
            <span class="lynx_fieldName">Rejected date</span>
            <span class="lynx_fieldValue">{{invoice.rejected_date}}</span>
        </div>
        <div class="lynx_row">
            <span class="lynx_fieldName">Payment id</span>
            <span class="lynx_fieldValue">{{invoice.payment_id}}</span>
            <span class="lynx_fieldName">Cancelled date</span>
            <span class="lynx_fieldValue">{{invoice.payment_method}}</span>
            <span class="lynx_fieldName">Rejected date</span>
            <span class="lynx_fieldValue">{{invoice.payment_currency}}</span>
        </div>
        <div class="lynx_row">
            <span class="lynx_fieldName">Comment</span>
            <span class="lynx_fieldValue">{{invoice.comment}}</span>
        </div>
        
        <h4>Thông tin sản phẩm</h4>
        <div class="lynx_row">
             <div style="height:300px" class="gridStyle" ng-grid="gridProductsOptions"></div>
        </div>
        
        <h4>Thông tin vận chuyển</h4>
        <div class="lynx_row">
             <div style="height:150px" class="gridStyle" ng-grid="gridShippingsOptions"></div>
        </div>
        <h5>Thông tin địa chỉ</h5>
        <div class="lynx_row">
            <span class="lynx_fieldName">Ngày tạo</span>
            <span class="lynx_fieldValue">{{selectedContact.date_created}}</span>
        </div>
        <div class="lynx_row">
            <span class="lynx_fieldName">Tên đầy đủ</span>
            <span class="lynx_fieldValue">{{selectedContact.full_name}}</span>
            <span class="lynx_fieldName">SĐT</span>
            <span class="lynx_fieldValue">{{selectedContact.telephone}}</span>
        </div>
        <div class="lynx_row">
            <span class="lynx_fieldValue">Địa chỉ ( state province / city district / street address):</span>
            <span class="lynx_fieldValue">{{selectedContact.state_province}} / {{selectedContact.city_district}} / {{selectedContact.street_address}}</span>

        </div>
        
        <h4>Thông tin thuế</h4>
        <div class="lynx_row">
             
        </div>
        
        <h4>Thông tin phụ phí</h4>
        <div class="lynx_row">
             <div style="height:150px" class="gridStyle" ng-grid="gridOtherCostOptions"></div>
        </div>
        
    </div>
</div>


