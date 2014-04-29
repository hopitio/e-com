<div class="lynx_contentWarp lynx_staticWidth" ng-controller="UserOrderHistoryController" >
        <?php require_once APPPATH.'views/portalaccount/leftMenuAccount.php';?>
        <div ng-include="template">
        </div>
</div>

<script type="text/ng-template" id="ModalOrderDetail.html" >
        <div class="lynx_row-right" ng-show="!(order.invoices.length > 0)">
            <div class="lynx_row-head">
                <span ng-click="backToList()">
                    <i class="glyphicon glyphicon-chevron-left" style="cursor: pointer;"></i>  
                   <i class="glyphicon glyphicon-chevron-left" style="cursor: pointer;"></i>  
                    Thông báo
                </span>
            </div>
            <div class="lynx_row-content" >
                Không có thông tin invoice
            </div>
        </div>

        <div class="lynx_row-right" ng-show="(order.invoices.length > 0)" ng-repeat="invoice in order.invoices">
            <div class="lynx_row-head">
                <span ng-show="invoice.invoice_type == 'input'" ng-click="backToList()">
                   <i class="glyphicon glyphicon-chevron-left" style="cursor: pointer;"></i>  
                   <i class="glyphicon glyphicon-chevron-left" style="cursor: pointer;"></i>  
                    Hóa đơn thanh toán
                </span>
                <span ng-show="invoice.invoice_type != 'input'" ng-click="backToList()">
                   <i class="glyphicon glyphicon-chevron-left" style="cursor: pointer;"></i>  
                   <i class="glyphicon glyphicon-chevron-left" style="cursor: pointer;"></i>  
                    Hóa đơn trả hàng
                </span>
            </div>
            <div class="lynx_row-content" >
                <div class="lynx_row lynx_InvoiceList" >
                    <div class="lynx_invoiceList_left">
                        <div class="lynx_row">
                            
                            <div class="lynx_row ">
                                <span class="lynx_inHightLine">Tổng giá trị hóa đơn </span>:&nbsp;<span class="hightLine">{{invoice.totalCost}}</span>
                            </div>
                            <div class="lynx_row ">
                                <span class="lynx_inHightLine">Mã hóa đơn </span>:&nbsp;<span>{{invoice.id}}</span>
                            </div>
                            <div class="lynx_row">
                                <span class="lynx_inHightLine">Ngày tạo </span>:&nbsp;{{invoice.created_date}}
                            </div>
                            <div class="lynx_row">
                                <span class="lynx_inHightLine">Ngày thanh toán</span>:&nbsp;{{invoice.paid_date}}
                            </div>
                            <div class="lynx_row">
                                <span class="lynx_inHightLine">Phương thức thanh toán</span>:&nbsp;{{invoice.payment_method}}
                            </div>
                        </div>
                    </div>
                    <div class="lynx_invoiceList_right">
                        <div class="lynx_InvoiceTable lynx_right">
                            <span class="lynx_colDes">MÔ TẢ</span>
                            <span class="lynx_colTax">Thuế</span>
                            <span class="lynx_colPrice">GIÁ</span>
                        </div>
                        <div class="lynx_InvoiceTable lynx_right" ng-repeat="product in invoice.products">
                            <span class="lynx_colDes">
                                <div class="lynx_invoiceProduct">
                                    <div class="lynx_productImage"><img width="100px" height="100px" ng-src="{{product.sub_image}}"/></div>
                                    <div class="lynx_productDetail"><span>Name : </span> {{product.name}}</div>
                                    <div class="lynx_productDetail"><span>Quantity : </span> {{product.quantity}}</div>
                                    <div class="lynx_productDetail"><span>short_description : </span> {{product.short_description}}</div>
                                    <div class="lynx_productDetail">
                                            <i class="glyphicon glyphicon-list-alt" style="cursor: pointer;"></i>&nbsp;<span class="lynx_spanButton lynx_inHightLine">Chi tiết sản phẩm </span>&nbsp;&nbsp;&nbsp;
                                            <i class="glyphicon glyphicon-pencil" style="cursor: pointer;"></i>&nbsp;<span class="lynx_spanButton lynx_inHightLine">Viết bình luân về sản phẩm </span>
                                    </div>
                                </div>
                            </span>
                            <span class="lynx_colTax">{{product.totalTax}}</span>
                            <span class="lynx_colPrice">{{parseInt(product.total_price) + product.totalTax}}</span>
                        </div>
                        
                        <div class="lynx_InvoiceTable lynx_right" ng-repeat="otherCost in invoice.otherCosts">
                            <span class="lynx_colDes">{{otherCost.comment}}</span>
                            <span class="lynx_colTax"></span>
                            <span class="lynx_colPrice">{{otherCost.value}}</span>
                        </div>
                        
                        <div class="lynx_InvoiceTable lynx_right" ng-repeat="shipping in invoice.shippings" >
                            <span class="lynx_colDes">
                                <div class="lynx_productDetail"><span class="lynx_lblFromtitle">Loại ship : </span> {{shipping.shipping_type}}</div>
                                <div class="lynx_productDetail"><span class="lynx_lblFromtitle">Người nhận : </span> {{shipping.contact.full_name}}</div>
                                <div class="lynx_productDetail"><span class="lynx_lblFromtitle">SDT Người nhận : </span> {{shipping.contact.telephone}}</div>
                                <div class="lynx_productDetail"><span class="lynx_lblFromtitle">Quốc gia : </span> {{shipping.contact.state_province}}</div>
                                <div class="lynx_productDetail"><span class="lynx_lblFromtitle">Thành phố : </span> {{shipping.contact.city_district}}</div>
                                <div class="lynx_productDetail"><span class="lynx_lblFromtitle">Địa chỉ cụ thể : </span> {{shipping.contact.street_address}}</div>
                                <div class="lynx_productDetail"><span class="lynx_lblFromtitle">Status : </span> {{shipping.status}}</div>
                            </span>
                            <span class="lynx_colTax"></span>
                            <span class="lynx_colPrice">{{shipping.price}}</span>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
</script>
<script type="text/ng-template" id="ModalOrderList.html" >
        <div class="lynx_row-right" ng-show="!(orders.length > 0)">
            <div class="lynx_row-head">
                <span ng-click="backToList()">
                    <i class="glyphicon glyphicon-chevron-left" style="cursor: pointer;"></i>  
                   <i class="glyphicon glyphicon-chevron-left" style="cursor: pointer;"></i>  
                    Thông báo
                </span>
            </div>
            <div class="lynx_row-content" >
                Bạn chưa có order nào.
            </div>
        </div>

        <div class="lynx_row-right" ng-show="(orders.length > 0)" ng-repeat="order in orders">
            <div class="lynx_row-head">
            </div>
            <div class="lynx_row-content lynx_InvoiceList" >
                <div class="lynx_invoiceList_left">
                    <div class="lynx_row">
                        <div class="lynx_row">
                            <span class="lynx_inHightLine">{{preStatusOrder(order.status)}}</span>
                        </div>
                        <div class="lynx_row">
                            <span class="lynx_inHightLine">Order Number : </span>{{order.id}}
                        </div>  
                        <div class="lynx_row">
                            <span class="lynx_inHightLine">Created data : </span>{{order.created_date}}
                        </div>
                        <div class="lynx_row ">
                           <span class="lynx_inHightLine">Total : </span> <span class="hightLine">{{order.cost}}</span>
                        </div>
                        <div class="lynx_row ">
                           <span class="lynx_spanButton lynx_inHightLine" ng-click="showOrderDetail(order)" ><i class="glyphicon glyphicon glyphicon-list-alt" style="cursor: pointer;"></i>  Chi tiết order </span>
                        </div>
                    </div>
                </div>
                <div class="lynx_invoiceList_right">
                    <div class="lynx_InvoiceTable lynx_right">
                        <span class="lynx_colDes">MÔ TẢ</span>
                        <span class="lynx_colTax">Thuế</span>
                        <span class="lynx_colPrice">GIÁ</span>
                    </div>
                    <div class="lynx_InvoiceTable lynx_right" ng-repeat="product in order.uniqueProducts">
                        <span class="lynx_colDes lynx_right">
                            <div class="lynx_invoiceProduct">
                                <div class="lynx_productImage"><img width="100px" height="100px" ng-src="{{product.sub_image}}"/></div>
                                <div class="lynx_productDetail"><span>Name : </span> {{product.name}}</div>
                                <div class="lynx_productDetail"><span>Quantity : </span> {{product.quantity}}</div>
                                <div class="lynx_productDetail"><span>short_description : </span> {{product.short_description}}</div>
                                <div class="lynx_productDetail">
                                        <i class="glyphicon glyphicon-list-alt" style="cursor: pointer;"></i>&nbsp;<span class="lynx_spanButton lynx_inHightLine">Chi tiết sản phẩm </span>&nbsp;&nbsp;&nbsp;
                                        <i class="glyphicon glyphicon-pencil" style="cursor: pointer;"></i>&nbsp;<span class="lynx_spanButton lynx_inHightLine">Viết bình luân về sản phẩm </span>
                                </div>
                            </div>
                        </span>
                        <span class="lynx_colTax">{{product.totalTax}}</span>
                        <span class="lynx_colPrice">{{parseInt(product.total_price) + product.totalTax}}</span>
                    </div>
                </div>
            </div>
        </div>
</script>
        