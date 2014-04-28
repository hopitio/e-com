<div class="lynx_contentWarp lynx_staticWidth" ng-controller="UserOrderHistoryController">
        <?php require_once APPPATH.'views/portalaccount/leftMenuAccount.php';?>
        <div class="lynx_row-right" ng-repeat="order in orders">
            <div class="lynx_row-head">
                <span>Ngày {{order.created_date}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Giá : {{order.cost}}</span>
            </div>
            <div class="lynx_row-content" >
                <div class="lynx_row lynx_rowGroup lynx_InvoiceList" ng-repeat="invoice in order.invoices">
                    <div class="lynx_InvoiceTable">
                        <span class="lynx_colDes">MÔ TẢ</span>
                        <span class="lynx_colTax"></span>
                        <span class="lynx_colPrice">GIÁ</span>
                    </div>
                    <div class="lynx_InvoiceTable" ng-repeat="product in invoice.products">
                        <span class="lynx_colDes">{{product.name}} : {{product.short_description}}</span>
                        <span class="lynx_colTax">{{product.totalTax}}</span>
                        <span class="lynx_colPrice">{{parseInt(product.total_price) + product.totalTax}}</span>
                    </div>
                    
                    <div class="lynx_InvoiceTable" ng-repeat="otherCost in invoice.otherCosts">
                        <span class="lynx_colDes">{{otherCost.comment}}</span>
                        <span class="lynx_colTax"></span>
                        <span class="lynx_colPrice">{{otherCost.value}}</span>
                    </div>
                    
                    <div class="lynx_InvoiceTable" ng-repeat="shipping in invoice.shippings">
                        <span class="lynx_colDes">{{shipping.shipping_type}}:{{shipping.display_name}}</span>
                        <span class="lynx_colTax"></span>
                        <span class="lynx_colPrice">{{shipping.price}}</span>
                    </div>
                </div>
            </div>
        </div>
<script type="text/ng-template" id="rowtableTemplete.html" >
    
</script>
</div> 