<div class="width-960 left" style="margin-bottom: 30px" ng-controller="PortalOrderPaymentChoiceController">
    <ul id="cart-process">
        <li class="passed">
            <div class="process-text">
                <span class="number">1</span> <label>Giỏ hàng</label>
            </div>
            <div class="process-visual">
                <div class="process-line"></div>
                <div class="process-line-cart"></div>
            </div>
        </li>
        <li class="passed">
            <div class="process-text">
                <span class="number">2</span> <label>Thông tin giao hàng</label>
            </div>
            <div class="process-visual">
                <div class="process-line"></div>
                <div class="process-line-cart"></div>
            </div>
        </li>
        <li class="active">
            <div class="process-text">
                <span class="number">3</span> <label>Thông tin thanh
                    toán</label>
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
                <legend style="text-align: left;">Chọn thanh toán</legend>
                <div class="payment-methods">
                    <ul>
                        <li ng-click="paymentMethodChanged('NL')" ng-class="{active:paymentMethodCode == 'NL'}">Thanh toán theo Ví điện tử</li>
                        <li ng-click="paymentMethodChanged('CASH')" ng-class="{active:paymentMethodCode == 'CASH'}">Thanh toán bằng tiền mặt</li>
                        <li ng-click="paymentMethodChanged('VISA')" ng-class="{active:paymentMethodCode == 'VISA'}">Thanh toán bằng Visa/Master</li>
                        <li ng-click="paymentMethodChanged('ATM')" ng-class="{active:paymentMethodCode == 'ATM'}">Thanh toán bằng ATM</li>
                    </ul>
                </div>
                <div class="payment-box">
                    <strong ng-show="paymentMethodCode == 'NL'">Bạn sẽ
                        thanh toán bằng ví Ngân Lượng :</strong> <strong
                        ng-show="paymentMethodCode == 'CASH'">Bạn sẽ
                        thanh toán bằng tiền mặt khi nhận hàng tại nhà :</strong>
                    <strong ng-show="paymentMethodCode == 'VISA'">Bạn sẽ
                        thanh toán bằng thẻ visa/mastercard :</strong> <strong
                        ng-show="paymentMethodCode == 'ATM'">Bạn sẽ
                        thanh toán online bằng thẻ ATM/ Tài khoản ngân
                        hàng nội địa :</strong>
                    <p ng-show="paymentMethodCode == 'NL'"
                        style="margin: auto">
                        <br /> Lưu ý: <br /> 1. Vui lòng kiểm tra kỹ
                        thông tin đơn hàng bên tay phải về:<br /> - Phí
                        thực hiện đơn hàng<br /> - Phí giao hàng (nếu
                        có)<br /> 2. Bạn cần đăng ký tài khoản Ngân
                        Lượng<br /> <br />
                    </p>
                    <p ng-show="paymentMethodCode == 'CASH'"
                        style="margin: auto">
                        <br /> Lưu ý: Vui lòng kiểm tra kỹ thông tin đơn
                        hàng bên tay phải về:<br /> - Phí thực hiện đơn
                        hàng<br /> - Phí giao hàng (nếu có)<br /> <br />
                    </p>
                    <p ng-show="paymentMethodCode == 'VISA'"
                        style="margin: auto">
                        <br /> Lưu ý: <br /> 1. Vui lòng kiểm tra kỹ
                        thông tin đơn hàng bên tay phải về:<br /> - Phí
                        thực hiện đơn hàng<br /> - Phí giao hàng (nếu
                        có)<br /> 2. Chấp nhận tất cả thẻ do ngân hàng
                        trong nước và quốc tế phát hành<br /> <br />
                    </p>
                    <p ng-show="paymentMethodCode == 'ATM'"
                        style="margin: auto">
                        <br /> Lưu ý: <br /> 1. Vui lòng kiểm tra kỹ
                        thông tin đơn hàng bên tay phải về:<br /> - Phí
                        thực hiện đơn hàng<br /> - Phí giao hàng (nếu
                        có)<br /> 2. Bạn cần đăng ký Internet-Banking
                        hoặc dịch vụ thanh toán trực tuyến tại ngân hàng
                        thực hiện <br /> <br />

                    Ngân hàng thực hiện giao dịch : 
                    <br/>
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
                    
                    
                    
                    
                    <p style="font-size: 11px;color:#1F7992;margin:auto">
                        <br />Lưu ý: Hóa đơn cho các sản phẩm được bán bởi thương nhân thành viên sẽ được xuất trong 7 ngày kể từ ngày giao hàng thành công.<br />
                        <br />
                    </p>
                    
                    <div class="pull-right">
                        <a href="/cart/shipping" class="btn-cart-prev" style="width: 150px; margin-right:10px;">
                            <div class="pull-left"><i class="fa fa-caret-left"></i></div>
                            Quay lại
                        </a>
                        <a ng-click="submit()" href="javascript:;" class="btn-cart-next" style="width: 150px;" data-type="submit">
                                Đặt hàng <div class="pull-right"><i class="fa fa-caret-right"></i></div>
                        </a>
                    </div>
                    
                    <p>
                        <br />Bạn sẽ được thông báo về tình trạng đơn hàng qua email và tin nhắn.<br />
                    </p>
                </div>
            </fieldset>
            
            <div class="border-full-dashed">
               <strong><img alt="" src="/images/lock.fw.png"> Thông tin và tài khoản cá nhân sẽ được mã hóa để đảm bảo an toàn tuyệt đối</strong>
            </div>
            <h4></h4>
            <h4></h4>
            <div class="border-full-dashed">
               <strong><img alt="" src="/images/phone.fw.png"> 
                    Bạn cần hỗ trợ? Gọi Hotline <span
                    style="color: red;">098.999.999</span> hoặc <span
                    style="color: red;">043. 999.999</span>
               </strong>
            </div>
            <h4></h4>
            <h4></h4>
            <div class="product-list-count">
                You have <span class="number ng-binding">{{orderInformation.invoice.products.length}}</span> in your Cart<br />
            </div>
            <h4></h4>
            <h4></h4>
            <table class="product-table">
                <thead>
                    <tr>
                        <th width="50%">Sản phẩm</th>
                        <th width="20%">Đơn giá</th>
                        <th width="10%">SL</th>
                        <th width="20%">Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        ng-repeat="product in orderInformation.invoice.products">
                        <td>
                            <div class="p-img">
                                <a
                                    href="/product/details/{{product.sub_id}}"
                                    title="{{product.name}}">
                                    <img ng-src="{{product.sub_image}}">
                                </a>
                            </div>
                            <div class="p-info">
                                <a class="p-name"
                                    href="/product/details/{{product.sub_id}}"
                                    title="{{product.name}}">
                                    {{product.short_description}}
                                </a>
                            </div>
                        </td>
                        <td>
                            <strong>
                                {{product.sell_price | number}}đ<br>
                            </strong>
                        </td>
                        <td>
                            <strong>
                                {{product.product_quantity | number}}<br>
                            </strong>
                        </td>
                        <td>{{product.product_price | number}}đ</td>
                    </tr>
                </tbody>
            </table>
            
        </div>
        <?php 
            $productPrices = 0;
            $taxPrices = 0;
            foreach ($order->invoice->products as $product)
            {
                $productPrices += $product->product_price;
                foreach ($product->taxs as $tax){
                    $taxPrices += $tax->sub_tax_value;
                }
            }
        ?>
        <div class="cart-right col-xs-4">
            <div class="cart-summaries ">
                <div class="inner">
                    <h4 class="left"><?php echo $language[$view->view]->lblOrderSummaries;?></h4>
                    <div class="product-summaries-table"> 
                        <div class="border-dashed">
                            <div class="tdleft">
                                
                                <strong class="ng-binding"><?php echo $language[$view->view]->lblProducts;?> (<?php echo count($order->invoice->products);?>):</strong>
                            
                            </div>
                            <div class="tdright">
                                
                                <strong class="ng-binding"><?php echo number_format(ceil($productPrices));?> đ</strong>
                            
                            </div>
                        </div>
                        <div class="border-solid">
                            <?php 
                                $shippingPrices = 0;
                                foreach ($order->invoice->shippings as $shipping)
                                {
                                    $shippingPrices += $shipping->price;
                                }
                            ?>
                            <div class="tdleft">
                                
                                <strong><?php echo $language[$view->view]->lblOrderShipping;?></strong>
                            
                            </div>
                            <div class="tdright">
                                
                                <strong><?php echo number_format($shippingPrices);?> đ</strong>
                            
                            </div>
                        </div>
                        <div class="border-dashed">
                            <div class="tdleft">
                                
                                <strong><?php echo $language[$view->view]->lblOrderSubtotal;?></strong>
                            
                            </div>
                            <div class="tdright">
                                
                                <strong><?php echo number_format(ceil($order->invoice->totalCost - $taxPrices));?> đ</strong>
                            
                            </div>
                        </div>
                        <div class="border-dashed">
                            <div class="tdleft">
                                
                                <strong><?php echo $language[$view->view]->lblOrderTax;?></strong>
                            
                            </div>
                            <div class="tdright">
                                
                                <strong><?php echo number_format(ceil($taxPrices));?> đ</strong>
                            
                            </div>
                        </div>
                        <div class="total">
                            <div class="tdleft">
                                
                                <strong><?php echo $language[$view->view]->lblOrderTotal;?></strong>
                            
                            </div>
                            <div class="tdright">
                                
                                <strong><?php echo number_format(ceil($order->invoice->totalCost));?> đ</strong>
                            
                            </div>
                        </div>
                        <br />
                        <a ng-click="submit()" class="btn-cart-next" href="javascript:;" style="display: block;" data-type="submit">
                            Tiếp tục đặt hàng <div class="pull-right"><i class="fa fa-caret-right"></i></div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="shipping"
                ng-repeat="shipping in orderInformation.invoice.shippings">
                <h5 ng-show="shipping.shipping_type == 'SHIP'">Giao hàng đến</h5>
                <h5 ng-show="shipping.shipping_type != 'SHIP'">Thanh toán tại</h5>
                {{shipping.contact.full_name}}<br />
                {{shipping.contact.street_address}}<br />
                {{shipping.contact.state_province}}<br />
                Số điện thoại : {{shipping.contact.telephone}}<br />
                <br />
                <strong ng-show="orderInformation.invoice.shippings.length == 1">Dùng làm địa chỉ thanh toán</strong>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
     var orderInformation = <?php echo json_encode($order)?>;
</script>
