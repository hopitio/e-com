<div class="width-960 left" style="margin-bottom: 30px" ng-controller="PortalOrderPaymentChoiceController">
    <ul id="cart-process">
        <li class="passed">
            <div class="process-text">
                <span class="number">1</span> <label><?php echo $language[$view->view]->lblprocessCart;?></label>
            </div>
            <div class="process-visual">
                <div class="process-line"></div>
                <div class="process-line-cart"></div>
            </div>
        </li>
        <li class="passed">
            <div class="process-text">
                <span class="number">2</span> <label><?php echo $language[$view->view]->lblprocessShipping;?></label>
            </div>
            <div class="process-visual">
                <div class="process-line"></div>
                <div class="process-line-cart"></div>
            </div>
        </li>
        <li class="active">
            <div class="process-text">
                <span class="number">3</span> <label><?php echo $language[$view->view]->lblprocessPayment;?></label>
            </div>
            <div class="process-visual">
                <div class="process-line"></div>
                <div class="process-line-cart"></div>
            </div>
        </li>
    </ul>
    <div class="row-wrapper">
        <form id="frm-submit" action="/portal/order_place/review" method="post">
            <input type="hidden" name="payment-method" value="{{paymentMethodCode}}" /> 
            <input type="hidden" name="bank-code" value="{{paymentBankcode}}" /> 
            <input type="hidden" name="order-id" value="{{orderInformation.id}}"/> 
            <input type="hidden" name="invoice-id" value="{{orderInformation.invoice.id}}" />
        </form>

        <div class="cart-left col-xs-8">
            <fieldset class="lynx_orderInformation">
                <legend style="text-align: left;"><?php echo $language[$view->view]->fieldsetTitle;?></legend>
                <div class="payment-methods">
                    <ul>
                        <li ng-click="paymentMethodChanged('VISA')" ng-class="{active:paymentMethodCode == 'VISA'}" ng-cloak><?php echo $language[$view->view]->paymentByVisa;?></li>
                        <li ng-click="paymentMethodChanged('CASH')" ng-class="{active:paymentMethodCode == 'CASH'}" ng-cloak><?php echo $language[$view->view]->paymentByCash;?></li>
                        <li ng-click="paymentMethodChanged('ATM')" ng-class="{active:paymentMethodCode == 'ATM'}" ng-cloak><?php echo $language[$view->view]->paymentByATM;?></li>
                        <li ng-click="paymentMethodChanged('NL')" ng-class="{active:paymentMethodCode == 'NL'}" ng-cloak><?php echo $language[$view->view]->paymentByNL;?></li>
                        <li ng-click="paymentMethodChanged('TRANSFER')" ng-class="{active:paymentMethodCode == 'TRANSFER'}" ng-cloak><?php echo $language[$view->view]->paymentByTRANSFER;?></li>
                    </ul>
                </div>
                <div class="payment-box">
                    <strong ng-show="paymentMethodCode == 'NL'" ng-cloak><?php echo $language[$view->view]->paymentNLNoteTitle;?></strong> 
                    <strong ng-show="paymentMethodCode == 'CASH'" ng-cloak><?php echo $language[$view->view]->paymentCashNoteTitle;?></strong>
                    <strong ng-show="paymentMethodCode == 'VISA'" ng-cloak><?php echo $language[$view->view]->paymentVisaNoteTitle;?></strong> 
                    <strong ng-show="paymentMethodCode == 'ATM'" ng-cloak><?php echo $language[$view->view]->paymentATMNoteTitle;?></strong>
                    <strong ng-show="paymentMethodCode == 'TRANSFER'" ng-cloak><?php echo $language[$view->view]->paymentTRANSFERNoteTitle;?></strong>
                    <p ng-show="paymentMethodCode == 'NL'" style="margin: auto" ng-cloak><?php echo $language[$view->view]->paymentNLNoteContent; ?></p>
                    <p ng-show="paymentMethodCode == 'CASH'" style="margin: auto" ng-cloak><?php echo $language[$view->view]->paymentCashNoteContent; ?></p>
                    <p ng-show="paymentMethodCode == 'VISA'" style="margin: auto"ng-cloak><?php echo $language[$view->view]->paymentVISANoteContent; ?></p>
                    <p ng-show="paymentMethodCode == 'TRANSFER'" style="margin: auto" ng-cloak><?php echo $language[$view->view]->paymentTRANSFERNoteContent; ?></p>
                    <p ng-show="paymentMethodCode == 'ATM'" style="margin: auto" ng-cloak><?php echo $language[$view->view]->paymentATMNoteContent; ?><br/>
					<ul ng-show="paymentMethodCode == 'ATM'" class="cardList clearfix">
                        <li class="bank-online-methods " ng-click="setSelectedBankCode($event)">
							<label for="bidv_ck_on">
								<i class="BIDV"
                                title="Ngân hàng Đầu tư &amp; Phát triển Việt Nam"></i>
								<input type="radio"  ng-model="paymentBankcode"  value="BIDV" name="bankcode">
							
						</label>
                        
                        </li>

						<li class="bank-online-methods active" ng-click="setSelectedBankCode($event)">
							<label for="vcb_ck_on">
								<i class="VCB" title="Ngân hàng TMCP Ngoại Thương Việt Nam"></i>
								<input type="radio"  ng-model="paymentBankcode" value="VCB" name="bankcode">
							
						</label>
                        
                        </li>

						<li class="bank-online-methods " ng-click="setSelectedBankCode($event)">
							<label for="vnbc_ck_on">
								<i class="DAB" title="Ngân hàng Đông Á"></i>
								<input type="radio"  ng-model="paymentBankcode" value="DAB" name="bankcode">
							
						</label>
                        
                        </li>

						<li class="bank-online-methods " ng-click="setSelectedBankCode($event)">
							<label for="tcb_ck_on">
								<i class="TCB" title="Ngân hàng Kỹ Thương"></i>
								<input type="radio"  ng-model="paymentBankcode" value="TCB" name="bankcode">
							
						</label>
                        
                        </li>

						<li class="bank-online-methods " ng-click="setSelectedBankCode($event)">
							<label for="sml_atm_mb_ck_on">
								<i class="MB" title="Ngân hàng Quân Đội"></i>
								<input type="radio"  ng-model="paymentBankcode" value="MB" name="bankcode">
							
						</label>
                        
                        </li>

						<li class="bank-online-methods " ng-click="setSelectedBankCode($event)">
							<label for="shb_ck_on">
								<i class="SHB" title="Ngân hàng Sài Gòn - Hà Nội"></i>
								<input type="radio"  ng-model="paymentBankcode" value="SHB" name="bankcode">
							
						</label>
                        
                        </li>

						<li class="bank-online-methods " ng-click="setSelectedBankCode($event)">
							<label for="sml_atm_vib_ck_on">
								<i class="VIB" title="Ngân hàng Quốc tế"></i>
								<input type="radio"  ng-model="paymentBankcode" value="VIB" name="bankcode">
							
						</label>
                        
                        </li>

						<li class="bank-online-methods " ng-click="setSelectedBankCode($event)">
							<label for="sml_atm_vtb_ck_on">
								<i class="ICB" title="Ngân hàng Công Thương Việt Nam"></i>
								<input type="radio"  ng-model="paymentBankcode" value="ICB" name="bankcode">
							
						</label>
                        
                        </li>

						<li class="bank-online-methods " ng-click="setSelectedBankCode($event)">
							<label for="sml_atm_exb_ck_on">
								<i class="EXB" title="Ngân hàng Xuất Nhập Khẩu"></i>
								<input type="radio"  ng-model="paymentBankcode" value="EXB" name="bankcode">
						</label>
                        
                        </li>

						<li class="bank-online-methods " ng-click="setSelectedBankCode($event)">
							<label for="sml_atm_acb_ck_on">
								<i class="ACB" title="Ngân hàng Á Châu"></i>
								<input type="radio"  ng-model="paymentBankcode" value="ACB" name="bankcode">
							
						</label>
                        
                        </li>

						<li class="bank-online-methods " ng-click="setSelectedBankCode($event)">
							<label for="sml_atm_hdb_ck_on">
								<i class="HDB" title="Ngân hàng Phát triển Nhà TPHCM"></i>
								<input type="radio"  ng-model="paymentBankcode" value="HDB" name="bankcode">
							
						</label>
                        
                        </li>

						<li class="bank-online-methods " ng-click="setSelectedBankCode($event)">
							<label for="sml_atm_msb_ck_on">
								<i class="MSB" title="Ngân hàng Hàng Hải"></i>
								<input type="radio"  ng-model="paymentBankcode" value="MSB" name="bankcode">
							
						</label>
                        
                        </li>

						<li class="bank-online-methods " ng-click="setSelectedBankCode($event)">
							<label for="sml_atm_nvb_ck_on">
								<i class="NVB" title="Ngân hàng Nam Việt"></i>
								<input type="radio"  ng-model="paymentBankcode" value="NVB" name="bankcode">
							
						</label>
                        
                        </li>

						<li class="bank-online-methods " ng-click="setSelectedBankCode($event)">
							<label for="sml_atm_vab_ck_on">
								<i class="VAB" title="Ngân hàng Việt Á"></i>
								<input type="radio"  ng-model="paymentBankcode" value="VAB" name="bankcode">
							
						</label>
                        
                        </li>

						<li class="bank-online-methods " ng-click="setSelectedBankCode($event)">
							<label for="sml_atm_vpb_ck_on">
								<i class="VPB" title="Ngân Hàng Việt Nam Thịnh Vượng"></i>
								<input type="radio"  ng-model="paymentBankcode" value="VPB" name="bankcode">
							
						</label>
                        
                        </li>

						<li class="bank-online-methods " ng-click="setSelectedBankCode($event)">
							<label for="sml_atm_scb_ck_on">
								<i class="SCB" title="Ngân hàng Sài Gòn Thương tín"></i>
								<input type="radio"  ng-model="paymentBankcode" value="SCB" name="bankcode">
							
						</label>
                        
                        </li>

						<li class="bank-online-methods " ng-click="setSelectedBankCode($event)">
							<label for="ojb_ck_on">
								<i class="OJB" title="Ngân hàng Đại Dương"></i>
								<input type="radio"  ng-model="paymentBankcode" value="OJB" name="bankcode">
							
						</label>
                        
                        </li>

						<li class="bank-online-methods " ng-click="setSelectedBankCode($event)">
							<label for="bnt_atm_pgb_ck_on">
								<i class="PGB" title="Ngân hàng Xăng dầu Petrolimex"></i>
								<input type="radio"  ng-model="paymentBankcode" value="PGB" name="bankcode">
							
						</label>
                        
                        </li>

						<li class="bank-online-methods " ng-click="setSelectedBankCode($event)">
							<label for="bnt_atm_gpb_ck_on">
								<i class="GPB" title="Ngân hàng TMCP Dầu khí Toàn Cầu"></i>
								<input type="radio"  ng-model="paymentBankcode" value="GPB" name="bankcode">
							
						</label>
                        
                        </li>

						<li class="bank-online-methods " ng-click="setSelectedBankCode($event)">
							<label for="bnt_atm_agb_ck_on">
								<i class="AGB"
                                title="Ngân hàng Nông nghiệp &amp; Phát triển nông thôn"></i>
								<input type="radio"  ng-model="paymentBankcode" value="AGB" name="bankcode">
							
						</label>
                        
                        </li>

						<li class="bank-online-methods " ng-click="setSelectedBankCode($event)">
							<label for="bnt_atm_sgb_ck_on">
								<i class="SGB" title="Ngân hàng Sài Gòn Công Thương"></i>
								<input type="radio"  ng-model="paymentBankcode" value="SGB" name="bankcode">
							
						</label>
                        
                        </li>

						<li class="bank-online-methods " ng-click="setSelectedBankCode($event)">
							<label for="bnt_atm_nab_ck_on">
								<i class="NAB" title="Ngân hàng Nam Á"></i>
								<input type="radio"  ng-model="paymentBankcode" value="NAB" name="bankcode">
							
						</label>
                        
                        </li>

						<li class="bank-online-methods " ng-click="setSelectedBankCode($event)">
							<label for="sml_atm_bab_ck_on">
								<i class="BAB" title="Ngân hàng Bắc Á"></i>
								<input type="radio"  ng-model="paymentBankcode" value="BAB" name="bankcode">
							
						</label>
                        
                        </li>
						
					</ul>
                         
                    </p>
                    
                    
                    
                    
                    <p style="font-size: 11px;color:#1F7992;margin:auto"><?php echo $language[$view->view]->paymentInoivceNote; ?></p>
                    
                    <div class="pull-right">
                        <a href="/cart/shipping" class="btn-cart-prev" style="width: 150px; margin-right:10px;">
                            <div class="pull-left"><i class="fa fa-caret-left"></i></div>
                            <?php echo $language[$view->view]->btnBack; ?>
                        </a>
                        <a ng-click="submit()" href="javascript:;" class="btn-cart-next" style="width: 150px;" data-type="submit">
                                <?php echo $language[$view->view]->btnNext; ?> 
                                <div class="pull-right"><i class="fa fa-caret-right"></i></div>
                        </a>
                    </div>
                    
                    <p style="float: left">
                        <br /><?php echo $language[$view->view]->paymentNoficationNote; ?> <br />
                    </p>
                </div>
            </fieldset>
            
            <div class="border-full-dashed">
               <strong><img alt="" src="/images/lock.fw.png"> <?php echo $language[$view->view]->paymentSecurity; ?></strong>
            </div>
            <div class="seperator"></div>
            <div class="seperator"></div>
            <div class="border-full-dashed">
               <strong><img alt="" src="/images/phone.fw.png"> 
                <?php echo $language[$view->view]->paymentSupport; ?>
               </strong>
            </div>
            <div class="seperator"></div>
            <div class="seperator"></div>
            <div class="product-list-count">
                <?php echo $language[$view->view]->paymentProductionCount; ?>
            </div>
            <div class="seperator"></div>
            <div class="seperator"></div>
            <table class="product-table">
                <thead>
                    <tr>
                        <th width="50%"><?php echo $language[$view->view]->colProduction; ?></th>
                        <th width="20%"><?php echo $language[$view->view]->colPrice; ?></th>
                        <th width="10%"><?php echo $language[$view->view]->colQuantity; ?></th>
                        <th width="20%"><?php echo $language[$view->view]->colTotal; ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="product in orderInformation.invoice.products" ng-cloak>
                        <td>
                            <div class="p-img" >
                                <a href="/product/details/{{product.sub_id}}" >
                                    <img ng-src="{{product.sub_image}}" title="{{product.name}}">
                                </a>
                            </div>
                            <div class="p-info">
                                <a class="p-name"
                                    href="/product/details/{{product.sub_id}}"
                                    title="{{product.name}}">
                                    {{product.name}}
                                </a>
                                <p>{{product.short_description}}</p>
                            </div>
                        </td>
                        <td>
                            <strong>
                                {{fnMoneyToString(product.sell_price)}}<br>
                            </strong>
                        </td>
                        <td>
                            <strong>
                                {{product.product_quantity | number}}<br>
                            </strong>
                        </td>
                        <td>{{fnMoneyToString(product.product_price)}}</td>
                    </tr>
                </tbody>
            </table>
            
        </div>
        
        <div class="cart-right col-xs-4">
            <div class="cart-summaries ">
                <div class="inner">
                    <h4 class="left"><?php echo $language[$view->view]->lblOrderSummaries;?></h4>
                    <div class="product-summaries-table"> 
                        <div class="border-dashed">
                            <div class="tdleft"><strong class="ng-binding"><?php echo $language[$view->view]->lblProducts;?> (<?php echo count($order->invoice->products);?>):</strong></div>
                            <div class="tdright"><strong class="ng-binding">{{fnMoneyToString(productPrices)}}</strong></div>
                        </div>
                        <div class="border-solid">
                            <div class="tdleft"><strong><?php echo $language[$view->view]->lblOrderShipping;?></strong></div>
                            <div class="tdright"><strong>{{fnMoneyToString(shippingPrices)}}</strong></div>
                        </div>
                        <div class="border-dashed">
                            <div class="tdleft"><strong><?php echo $language[$view->view]->lblOrderSubtotal;?></strong></div>
                            <div class="tdright"><strong>{{fnMoneyToString(orderInformation.invoice.totalCost - taxPrices)}}</strong></div>
                        </div>
                        <div class="total">
                            <div class="tdleft"><strong><?php echo $language[$view->view]->lblOrderTotal;?></strong></div>
                            <div class="tdright"><strong>{{fnMoneyToString(orderInformation.invoice.totalCost)}}</strong></div>
                            <div class="payment-choice-tooltip">
                                <div class="tooltip-head"><?php echo $language[$view->view]->lblToolTipTitle;?></div>
                                <div class="tooltip-content">
                                    <?php echo $language[$view->view]->lblToolTip;?>
                                </div>
                            </div>
                        </div>
                        <br />
                    </div>
                </div>
            </div>
            <div class="shipping" ng-repeat="shipping in orderInformation.invoice.shippings">
                <h5 ng-show="shipping.shipping_type == 'SHIP'"><?php echo $language[$view->view]->shippingTo;?></h5>
                <h5 ng-show="shipping.shipping_type != 'SHIP'"><?php echo $language[$view->view]->paidTo;?></h5>
                {{shipping.contact.full_name}}<br />
                {{shipping.contact.street_address}}<br />
                {{shipping.contact.state_province}}<br />
                <?php echo $language[$view->view]->lblPhone;?> {{shipping.contact.telephone}}<br />
                <br />
                <strong ng-show="orderInformation.invoice.shippings.length == 1"><?php echo $language[$view->view]->lblUsingForShipping;?></strong>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
     var orderInformation = <?php echo json_encode($order)?>;
     $(document).ready(function(){
    	 $(".total").on("mousemove",function(e){
    		 $(".total .payment-choice-tooltip").show();
    		 var x = e.clientX;
    		 var y = e.clientY;
    		 if($(".total .payment-choice-tooltip").width()+ e.clientX >= $(window).width()){
        		 x = x - $(".total .payment-choice-tooltip").width();
        	 }
 	   	    $(".total .payment-choice-tooltip").css("left",x + "px").css("top",e.clientY + "px");
 	      });
    	 $( window ).scroll(function() {
    		 $(".total .payment-choice-tooltip").hide();
   		});
    	 $(".total").on("mouseout",function(e){
    		 $(".total .payment-choice-tooltip").hide();
 	      });
 	});
     
</script>
