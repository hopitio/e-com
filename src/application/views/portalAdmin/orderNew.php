<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Khởi tạo đơn đặt hàng
        <small>Tạo đơn dặt hàng</small>
    </h1>
</section>

<section class="content" ng-controller="PortalAdminOrderNewController">
    <div class="row" style="margin-left:15px;margin-bottom: 20px">
        <ul class="list-inline">
            <li ><a href="#" ng-click="changeStep(ORDER_INFORMATION)" class="badge" ng-class="{'bg-green': viewTemplate == ORDER_INFORMATION }">1. Thông tin chung order</a> <i class="fa fa-arrow-circle-o-right"></i></li>
            <li ><a href="#" ng-click="changeStep(INVOICE_INFORMATION)" class="badge" ng-class="{'bg-green': viewTemplate == INVOICE_INFORMATION }">2. Thông tin hóa đơn</a> <i class="fa fa-arrow-circle-o-right"></i></li>
            <li ><a href="#" ng-click="changeStep(PRODUCTS_INFORMATION)" class="badge" ng-class="{'bg-green': viewTemplate == PRODUCTS_INFORMATION }">3. Thông tin sản phẩm</a> <i class="fa fa-arrow-circle-o-right"></i></li>
            <li ><a href="#" ng-click="changeStep(OTHERCOST_INFORMATION)" class="badge" ng-class="{'bg-green': viewTemplate == OTHERCOST_INFORMATION }">4. Thông tin phụ phí</a> <i class="fa fa-arrow-circle-o-right"></i></li>
            <li ><a href="#" ng-click="changeStep(OVERVIEW_INFORMATION)" class="badge" ng-class="{'bg-green': viewTemplate == OVERVIEW_INFORMATION }">5. Tổng kết và xác nhận.</a></li>
        </ul>
    </div>
    <div class="col-md-12" ng-show="errors.length > 0">
        <div class="alert alert-danger alert-dismissable" ng-repeat="error in errors">
            <i class="fa fa-ban"></i>
            <b>Cảnh báo ! {{error}}</b>  
        </div>
    </div>
    <form id="sub-form" action="/portal/__admin/order/create" method="post">
        <input type="hidden" id="post-data" name="post-data"/>
    </form>
    
    <div ng-include="viewTemplate"></div>

<script type="text/ng-template" id="ORDER_INFORMATION.html">
    <div class="col-md-12">
        <div class="box box-danger">
            <div class="box-header">
                    <h3 class="box-title">
                        Thông tin về đơn đặt hàng
                    </h3>
                    <div class="box-tools text-right">
                        <div class="text-right"></div>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Subsys</label>
                        <select class="form-control" id="sub-system" ng-model="orderInformation.subSys">
                            <option  value="GIFT">GIFT</option>
                            <option selected value="OTHER">KHÁC</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" >Ngày tạo</label>
                        <input class="form-control" ng-model="orderInformation.createdDate" type="text"  placeholder="Ngày tạo"/>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" ng-model="orderInformation.user">Tài khoản tham gia giao dịch</label>
                        <input ng-model="orderInformation.user" class="form-control" type="text"  placeholder="example@gmail.com"/>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" ng-click="changeStep(INVOICE_INFORMATION)">Tiếp tục</button>
                    </div>
                </div>
        </div>
    </div>
</script>
<script type="text/ng-template" id="INVOICE_INFORMATION.html">
    <div class="col-md-12">
        <div class="box box-danger">
            <div class="box-header">
                    <h3 class="box-title">
                        Thông tin hóa đơn
                    </h3>
                    <div class="box-tools text-right">
                        <div class="text-right"></div>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Người khởi tạo</label>
                        <input class="form-control" disabled="disabled" type="text" id="txtCreatedUser" placeholder="{{me.account}}"/>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ghi chú</label>
                        <textarea class="form-control" ng-model="invoiceInformation.comment" id="comment" placeholder="example@gmail.com"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Hình thức vận chuyển</label>
                        <input class="form-control" type="text" ng-model="invoiceInformation.shippingMethodName" id="txtCreatedUser"/>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Chi phí vận chuyển</label>
                        <input class="form-control" ng-model="invoiceInformation.shippingPrice" type="number" id="txtCreatedUser"/>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Hàng sẽ được giao từ ngày</label>
                        <input class="form-control" type="text" ng-model="invoiceInformation.estimateMin" id="txtCreatedUser"/>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Hàng sẽ được giao đến ngày</label>
                        <input class="form-control" type="text" ng-model="invoiceInformation.estimateMax" id="txtCreatedUser"/>
                    </div>
                    <div class="form-group">
                        <input ng-model="invoiceInformation.shippingAddressOnly" ng-checked="invoiceInformation.shippingAddressOnly"  value="shippingAddressOnly" type="checkbox" id="chkShippingAddressOnly" class="simple" />
                        <label for="chkShippingAddressOnly">Địa chỉ nhận hàng là địa chỉ nhận hóa đơn</label>
                    </div>
                    <div class="row" style="margin:0px 20px;">
                      <div class="form-group col-md-6" >
                        <label style="width:100%">Địa chỉ giao hàng </label>
                        <div class="col-md-12"> 
                          <strong>Họ tên : </strong> <input type="text" class="form-control" ng-model="invoiceInformation.shipping.fullName"/><br/>
                          <strong>Số điện thoại : </strong> <input type="text" class="form-control" ng-model="invoiceInformation.shipping.telephone"/><br/>
                          <input type="text" class="col-md-4 form-control" ng-model="invoiceInformation.shipping.stateProvince" placeholder="Tỉnh thành"/> <br/><br/>
                          <input type="text" class="col-md-4 form-control" ng-model="invoiceInformation.shipping.city" placeholder="Thành phố"/> <br/><br/>
                          <input type="text" class="col-md-4 form-control" ng-model="invoiceInformation.shipping.streetAddress" placeholder="Địa chỉ cụ thể"/> <br/><br/>
                          <br/>
                        </div>
                      </div>
                      <div class="form-group  col-md-6" ng-show="!invoiceInformation.shippingAddressOnly">
                        <label style="width:100%">Địa chỉ nhận hóa đơn </label>
                        <div class="col-md-12"> 
                           <strong>Họ tên : </strong> <input type="text" class="form-control" ng-model="invoiceInformation.payAddress.fullName"/> <br/>
                           <strong>Số điện thoại</strong> <input type="text" class="form-control" ng-model="invoiceInformation.payAddress.telephone"/><br/>
                          <input type="text" class="col-md-4 form-control" ng-model="invoiceInformation.payAddress.stateProvince" placeholder="Tỉnh thành"/> <br/><br/>
                          <input type="text" class="col-md-4 form-control" ng-model="invoiceInformation.payAddress.city" placeholder="Thành phố"/> <br/><br/>
                          <input type="text" class="col-md-4 form-control" ng-model="invoiceInformation.payAddress.streetAddress" placeholder="Địa chỉ cụ thể"/> <br/><br/>
                        </div> 
                      </div>
                   </div>
                    <div class="form-group">
                        <button class="btn btn-primary" ng-click="changeStep(PRODUCTS_INFORMATION)">Tiếp tục</button>
                    </div>
                </div>
        </div>
    </div>
    
</script>
<script type="text/ng-template" id="PRODUCTS_INFORMATION.html">
    <div class="col-md-8">
        <div class="box box-danger">
            <div class="box-header">
                    <h3 class="box-title">
                        Thông tin về sản phẩm
                        <br/>
                        <br/>
                        <a class="btn btn-default btn-sm" ng-click="addNewProduct()"><i class="fa fa-plus-circle"></i></a>
                        <a class="btn btn-default btn-sm" ng-click="removeNewProduct()"><i class="fa fa-minus"></i></a>
                    </h3>
                    <div class="box-tools text-right">
                        <div class="text-right"></div>
                    </div>
                </div>
                <div class="box-body" >
                    <div class="row" style="padding: 0px 10px;">
                        <div class="col-md-12">
                            <table class="table table-hover table-condensed">
                                <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-click="setSelectedProduct(product)" style="cursor:pointer" ng-repeat="product in products" style="cusor:pointer" ng-click="setSelectedProduct(product)" ng-class="{'row-height-line':product == selectedProduct}">
                                        <td>
                                            <img width="75px" height="75px" ng-src="{{product.subImage}}" style="float:left;margin:10px;"/>
                                            <a href="{{product.productUrl}}"> {{product.name}}</a> <br/>
                                            {{product.shortDescription}}<br/>
                                            <lable> Số lượng : {{product.productQuantity | number}} | Giá bán : {{product.productPrices |number}} VND</lable>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:20px">
                        <input ng-click="changeStep(OTHERCOST_INFORMATION)" type="button" class="btn btn-primary" value="Tiếp tục" />
                    </div>
                </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="box box-danger">
            <div class="box-header">
                    <h3 class="box-title">
                        Thông tin Sản phẩm
                    </h3>
                    <div class="box-tools text-right">
                        <div class="text-right"></div>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Client ID</label>
                        <input class="form-control" type="text" ng-model="selectedProduct.subId" placeholder=""/>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Đường dẫn sản phẩm</label>
                        <input class="form-control" type="text" ng-model="selectedProduct.productUrl" placeholder=""/>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên</label>
                        <input class="form-control" type="text" ng-model="selectedProduct.name" placeholder=""/>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ảnh đại diện</label>
                        <input class="form-control" type="text" ng-model="selectedProduct.subImage"  placeholder=""/>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Bên bán</label>
                        <input class="form-control" type="text" ng-model="selectedProduct.sellerName" placeholder=""/>
                    </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Email bên bán</label>
                        <input class="form-control" type="text" ng-model="selectedProduct.sellerEmail" placeholder=""/>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Giá bán</label>
                        <input class="form-control" type="text" ng-model="selectedProduct.sellPrice"  placeholder=""/>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Giá bán thực</label>
                        <input class="form-control" type="text" ng-model="selectedProduct.productPrices"  placeholder=""/>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Số lượng thực</label>
                        <input class="form-control" type="text" ng-model="selectedProduct.productQuantity"  placeholder=""/>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mô tả</label>
                        <textarea class="form-control" ng-model="selectedProduct.shortDescription"  placeholder=""></textarea>
                    </div>
                </div>
            </div>
    </div>
</script>
<script type="text/ng-template" id="OTHERCOST_INFORMATION.html">
    <div class="col-md-8">
        <div class="box box-danger">
            <div class="box-header">
                    <h3 class="box-title">
                        Thông tin phụ phí
                        <br/>
                        <br/>
                        <a class="btn btn-default btn-sm" ng-click="addNewOtherCost()"><i class="fa fa-plus-circle"></i></a>
                        <a class="btn btn-default btn-sm" ng-click="removeNewOtherCost()"><i class="fa fa-minus"></i></a>
                    </h3>
                </div>
                <div class="box-body">
                    <table class="table table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th width="30%">Giá</th>
                                    <th width="50%">Mô tả</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-click="setSelectedOtherCost(cost)" ng-repeat="cost in otherCosts" ng-class="{'row-height-line':cost == selectedOtherCosts}">
                                    <td>{{cost.prices | number}} VND</td>
                                    <td>{{cost.description}}</td>
                                </tr>
                            </tbody>
                    </table>
                    <div class="form-group">
                        <br/>
                        <input ng-click="changeStep(OVERVIEW_INFORMATION)" type="button" class="btn btn-primary" value="Tiếp tục" />
                    </div>
                </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="box box-danger">
            <div class="box-header">
                    <h3 class="box-title">
                        Phụ phí
                    </h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label>Giá</label>
                        <input class="form-control" type="number" ng-model="selectedOtherCosts.prices" placeholder=""/>
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control" type="text" ng-model="selectedOtherCosts.description" placeholder=""></textarea>
                    </div>
                </div>
        </div>
    </div>
</script>
<script type="text/ng-template" id="OVERVIEW_INFORMATION.html">
<div class="col-md-12">
    <div class="box box-danger">
        <div class="box-header">
            <h3 class="box-title">
                Hóa đơn
            </h3>
        </div>
        <div class="box-body">
            <b>Đặt hàng Trên hệ thống : </b><code>{{orderInformation.subSys}}</code><br/>
            <b>Ngày đặt hàng :  </b>{{orderInformation.createdDate}}<br/>
            <b>Tài khoản đặt hàng :  </b>{{orderInformation.user}}
            <b>Hình thức vận chuyển : </b>{{invoiceInformation.shippingMethodName}}<br/>
            <b>Giá vận chuyển : </b>{{invoiceInformation.shippingPrice | number}} vnd<br/>
            <b>Giao hàng từ ngày : </b>{{invoiceInformation.estimateMin}} <b>Đến ngày :</b> {{invoiceInformation.estimateMax}}<br/>
            <b>Địa chỉ nhận hàng  :</b> <br/>
            {{invoiceInformation.shipping.fullName}} <br/>
            {{invoiceInformation.shipping.telephone}} <br/>
            {{invoiceInformation.shipping.streetAddress}}, {{invoiceInformation.shipping.city}} , {{invoiceInformation.shipping.stateProvince}} <br/>
            <div ng-show="!invoiceInformation.shippingAddressOnly">
            <b>Địa chỉ nhận hóa đơn  :</b> <br/>
            {{invoiceInformation.shipping.fullName}} <br/>
            {{invoiceInformation.shipping.telephone}} <br/>
            {{invoiceInformation.shipping.streetAddress}}, {{invoiceInformation.shipping.city}} , {{invoiceInformation.shipping.stateProvince}} <br/>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="box box-danger">
        <div class="box-header">
            <h3 class="box-title">
                Sản phẩm
            </h3>
        </div>
        <div class="box-body">
            <table class="table table-hover table-condensed">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="cursor:pointer" ng-repeat="product in products" style="cusor:pointer" >
                        <td>
                            <img width="75px" height="75px" ng-src="{{product.subImage}}" style="float:left;margin:10px;"/>
                            <a href="{{product.productUrl}}"> {{product.name}}</a> <br/>
                            {{product.shortDescription}}<br/>
                            <lable> Số lượng : {{product.productQuantity | number}} | Giá bán : {{product.productPrices |number}} VND</lable>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="box box-danger">
        <div class="box-header">
            <h3 class="box-title">
                Phụ phí 
            </h3>
        </div>
        <div class="box-body">
            <table class="table table-hover table-condensed">
                <thead>
                    <tr>
                        <th width="30%">Giá</th>
                        <th width="50%">Mô tả</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="cost in otherCosts" >
                        <td>{{cost.prices | number}} VND</td>
                        <td>{{cost.description}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
    <div class="col-md-3 pull-right">
        <div class="box box-danger">
            <div class="box-body text-right">
                    <a class="btn btn-success btn-lg" ng-click="submit()"><i class="fa fa-check"></i> Hoàn tất</a>
            </div>
        </div>
    </div>
</script>



</section>