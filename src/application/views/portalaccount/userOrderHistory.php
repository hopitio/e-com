<div class="lynx_contentWarp lynx_staticWidth" ng-controller="PortalUserOrderHistoryController" >
        <?php require_once APPPATH.'views/portalaccount/leftMenuAccount.php';?>
        <div ng-include="template">
        </div>
<div id="comment-modal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title"><?php echo $language[$view->view]->lblTitleRootCause; ?></h4>
      </div>
      <div class="modal-body">
        <textarea rows="4" cols="50" ng-model="comment" type="text" style="width:100%;height:200px;padding:5px;"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" ng-click="cancelOrderPost()">OK</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
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
                                <span class="lynx_inHightLine"><?php echo $language[$view->view]->lblInvoiceTotal; ?> </span>:&nbsp;<span class="hightLine">{{invoice.totalCost | number}}đ</span>
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
                                     <a class="lynx_inHightLine" href="/product/details/{{product.sub_id}}"><i class="glyphicon glyphicon-list-alt" style="cursor: pointer;"></i>&nbsp;<?php echo $language[$view->view]->btnProductDetail; ?> </a>&nbsp;&nbsp;&nbsp;
                                </div>
                            </span>
                            <span class="lynx_colTax">{{product.totalTax | number }}</span>
                            <span class="lynx_colPrice">{{parseInt(product.product_price) + product.totalTax | number}} đ</span>
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
                                <div class="lynx_productDetail"><span class="lynx_lblFromtitle"><?php echo $language[$view->view]->lblCity; ?> : </span> {{shipping.contact.state_province}}</div>
                                <div class="lynx_productDetail"><span class="lynx_lblFromtitle"><?php echo $language[$view->view]->lblDetail; ?> : </span> {{shipping.contact.street_address}}</div>
                                <div class="lynx_productDetail"><span class="lynx_lblFromtitle"><?php echo $language[$view->view]->lblStatus; ?> : </span> {{shipping.status}}</div>
                            </span>
                            <span class="lynx_colTax"></span>
                            <span class="lynx_colPrice">{{shipping.price | number}}đ</span>
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
                <span ng-show="order.status == 'VERIFYING'" ng-click="cancelOrder(order)" class="lynx_spanButton" style="float:right"><i class=" glyphicon glyphicon-remove" style="cursor: pointer;"></i> <?php echo $language[$view->view]->btnOrderCanncel; ?></span>
                <span ng-show="order.status == 'VERIFYING'" ng-click="returnOrder(order)" class="lynx_spanButton" style="float:right"><i class=" glyphicon glyphicon-repeat" style="cursor: pointer;"></i> <?php echo $language[$view->view]->btnOrderPayment; ?></span>
                <span class="lynx_spanButton" ng-click="showOrderDetail(order)" style="float:right;border-bottom-left-radius: 5px;"><i class="glyphicon  glyphicon-list-alt" style="cursor: pointer;"></i> <?php echo $language[$view->view]->btnOrdeDetail; ?></span>
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
                           <span class="lynx_inHightLine"><?php echo $language[$view->view]->lblOrderTotalPrices; ?> : </span> <span class="hightLine">{{order.cost | number:0}} VND</span>
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
                                <a class="lynx_inHightLine" href="/product/details/{{product.sub_id}}"><i class="glyphicon glyphicon-list-alt" style="cursor: pointer;"></i>&nbsp;<?php echo $language[$view->view]->btnProductDetail; ?> </a>&nbsp;&nbsp;&nbsp;
                                </div>
                        </span>
                        <span class="lynx_colTax">{{product.totalTax | number:0}}đ</span>
                        <span class="lynx_colPrice">{{parseInt(product.product_price) + product.totalTax | number:0}}đ</span>
                    </div>
                </div>
            </div>
        </div>
</script>
<script type="text/ng-template" id="commentDialog.html">
        <div class="modal-header">
            <h3 class="modal-title"><?php echo $language[$view->view]->lblTitleRootCause; ?></h3>
        </div>
        <div class="modal-body">
            <textarea rows="4" cols="50" ng-model="dialog.comment" type="text" style="width:100%;height:200px"/>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" ng-click="ok()">OK</button>
            <button class="btn btn-warning" ng-click="cancel()">Cancel</button>
        </div>
</script>

        