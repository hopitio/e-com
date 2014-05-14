<div class="lynx_contentWarp lynx_staticWidth" ng-controller="PortalUserOrderHistoryController" >
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
                    <?php echo $language[$view->view]->lblTitleNotify; ?>
                </span>
            </div>
            <div class="lynx_row-content" >
                <?php echo $language[$view->view]->lblNotifyNoneInvoice; ?>
            </div>
        </div>

        <div class="lynx_row-right" ng-show="(order.invoices.length > 0)" ng-repeat="invoice in order.invoices">
            <div class="lynx_row-head">
                <span ng-show="invoice.invoice_type == 'input'" ng-click="backToList()">
                   <i class="glyphicon glyphicon-chevron-left" style="cursor: pointer;"></i>  
                   <i class="glyphicon glyphicon-chevron-left" style="cursor: pointer;"></i>  
                    <?php echo $language[$view->view]->lblInvoicePay; ?>
                </span>
                <span ng-show="invoice.invoice_type != 'input'" ng-click="backToList()">
                   <i class="glyphicon glyphicon-chevron-left" style="cursor: pointer;"></i>  
                   <i class="glyphicon glyphicon-chevron-left" style="cursor: pointer;"></i>  
                    <?php echo $language[$view->view]->lblInvoiceReturn; ?>
                </span>
            </div>
            <div class="lynx_row-content" >
                <div class="lynx_row lynx_InvoiceList" >
                    <div class="lynx_invoiceList_left">
                        <div class="lynx_row">
                            
                            <div class="lynx_row ">
                                <span class="lynx_inHightLine"><?php echo $language[$view->view]->lblInvoiceTotal; ?> </span>:&nbsp;<span class="hightLine">{{invoice.totalCost}}</span>
                            </div>
                            <div class="lynx_row ">
                                <span class="lynx_inHightLine"><?php echo $language[$view->view]->lblInvoiceId; ?> </span>:&nbsp;<span>{{invoice.id}}</span>
                            </div>
                            <div class="lynx_row">
                                <span class="lynx_inHightLine"><?php echo $language[$view->view]->lblCreatedDate; ?> </span>:&nbsp;{{invoice.created_date}}
                            </div>
                            <div class="lynx_row">
                                <span class="lynx_inHightLine"><?php echo $language[$view->view]->lblPaidDate; ?></span>:&nbsp;{{invoice.paid_date}}
                            </div>
                            <div class="lynx_row">
                                <span class="lynx_inHightLine"><?php echo $language[$view->view]->lblPaidType; ?></span>:&nbsp;{{invoice.payment_method}}
                            </div>
                        </div>
                    </div>
                    <div class="lynx_invoiceList_right">
                        <div class="lynx_InvoiceTable lynx_right">
                            <span class="lynx_colDes"><?php echo $language[$view->view]->lblDesTitle; ?></span>
                            <span class="lynx_colTax"><?php echo $language[$view->view]->lblTaxTitle; ?></span>
                            <span class="lynx_colPrice"><?php echo $language[$view->view]->lblPriceTitle; ?></span>
                        </div>
                        <div class="lynx_InvoiceTable lynx_right" ng-repeat="product in invoice.products">
                            <span class="lynx_colDes">
                                <div class="lynx_invoiceProduct">
                                    <div class="lynx_productImage"><img width="100px" height="100px" ng-src="{{product.sub_image}}"/></div>
                                    <div class="lynx_productDetail"><span><?php echo $language[$view->view]->lblNameProduct; ?> : </span> {{product.name}}</div>
                                    <div class="lynx_productDetail"><span><?php echo $language[$view->view]->lblQuanityProduct; ?> : </span> {{product.quantity}}</div>
                                    <div class="lynx_productDetail">{{product.short_description}}</div>
                                    
                                </div>
                                <div class="lynx_invoiceProduct lynx_incoiceProductButton" style="float:left; margin-top:10px">
                                     <span class="lynx_spanButton lynx_inHightLine"><i class="glyphicon glyphicon-list-alt" style="cursor: pointer;"></i>&nbsp;<?php echo $language[$view->view]->btnProductDetail; ?> </span>&nbsp;&nbsp;&nbsp;
                                     <span class="lynx_spanButton lynx_inHightLine"><i class="glyphicon glyphicon-pencil" style="cursor: pointer;"></i>&nbsp;<?php echo $language[$view->view]->btnProductWriteReview; ?> </span>
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
                                <div class="lynx_productDetail"><span class="lynx_lblFromtitle"><?php echo $language[$view->view]->lblShippingType; ?> : </span> {{shipping.shipping_type}} - {{shipping.display_name}}</div>
                                <div class="lynx_productDetail"><span class="lynx_lblFromtitle"><?php echo $language[$view->view]->lblPersonInCharge; ?> : </span> {{shipping.contact.full_name}}</div>
                                <div class="lynx_productDetail"><span class="lynx_lblFromtitle"><?php echo $language[$view->view]->lblPersonPhone; ?> : </span> {{shipping.contact.telephone}}</div>
                                <div class="lynx_productDetail"><span class="lynx_lblFromtitle"><?php echo $language[$view->view]->lblState; ?> : </span> {{shipping.contact.state_province}}</div>
                                <div class="lynx_productDetail"><span class="lynx_lblFromtitle"><?php echo $language[$view->view]->lblCity; ?> : </span> {{shipping.contact.city_district}}</div>
                                <div class="lynx_productDetail"><span class="lynx_lblFromtitle"><?php echo $language[$view->view]->lblDetail; ?> : </span> {{shipping.contact.street_address}}</div>
                                <div class="lynx_productDetail"><span class="lynx_lblFromtitle"><?php echo $language[$view->view]->lblStatus; ?> : </span> {{shipping.status}}</div>
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
                    <?php echo $language[$view->view]->lblTitleNotify; ?>
                </span>
            </div>
            <div class="lynx_row-content" >
                <?php echo $language[$view->view]->lblNotifyNoneOrder; ?>
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
                            <span class="lynx_inHightLine"><?php echo $language[$view->view]->lblOrderId; ?> : </span>{{order.id}}
                        </div>  
                        <div class="lynx_row">
                            <span class="lynx_inHightLine"><?php echo $language[$view->view]->lblOrderCreatedDate; ?> : </span>{{order.created_date}}
                        </div>
                        <div class="lynx_row ">
                           <span class="lynx_inHightLine"><?php echo $language[$view->view]->lblOrderTotalPrices; ?> : </span> <span class="hightLine">{{order.cost}}</span>
                        </div>
                        <div class="lynx_row ">
                           <span class="lynx_spanButton lynx_inHightLine" ng-click="showOrderDetail(order)" ><i class="glyphicon glyphicon glyphicon-list-alt" style="cursor: pointer;"></i> <?php echo $language[$view->view]->btnOrdeDetail; ?> </span>
                        </div>
                    </div>
                </div>
                <div class="lynx_invoiceList_right">
                    <div class="lynx_InvoiceTable lynx_right">
                        <span class="lynx_colDes"><?php echo $language[$view->view]->lblDesTitle; ?></span>
                        <span class="lynx_colTax"><?php echo $language[$view->view]->lblTaxTitle; ?></span>
                        <span class="lynx_colPrice"><?php echo $language[$view->view]->lblPriceTitle; ?></span>
                    </div>
                    <div class="lynx_InvoiceTable lynx_right" ng-repeat="product in order.uniqueProducts">
                        <span class="lynx_colDes lynx_right">
                            <div class="lynx_invoiceProduct">
                                <div class="lynx_productImage"><img width="100px" height="100px" ng-src="{{product.sub_image}}"/></div>
                                <div class="lynx_productDetail"><span><?php echo $language[$view->view]->lblNameProduct; ?> : </span> {{product.name}}</div>
                                <div class="lynx_productDetail"><span><?php echo $language[$view->view]->lblQuanityProduct; ?> : </span> {{product.quantity}}</div>
                                <div class="lynx_productDetail">{{product.short_description}}</div>
                            </div>
                            <div class="lynx_productDetail lynx_incoiceProductButton">
                                <span class="lynx_spanButton lynx_inHightLine"><i class="glyphicon glyphicon-list-alt" style="cursor: pointer;"></i>&nbsp;<?php echo $language[$view->view]->btnProductDetail; ?> </span>&nbsp;&nbsp;&nbsp;
                                <span class="lynx_spanButton lynx_inHightLine"><i class="glyphicon glyphicon-pencil" style="cursor: pointer;"></i>&nbsp;<?php echo $language[$view->view]->btnProductWriteReview; ?> </span>
                                </div>
                        </span>
                        <span class="lynx_colTax">{{product.totalTax}}</span>
                        <span class="lynx_colPrice">{{parseInt(product.total_price) + product.totalTax}}</span>
                    </div>
                </div>
            </div>
        </div>
</script>
        