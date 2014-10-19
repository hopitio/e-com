
<style>
.page-header > small {
    color: #666;
    display: block;
    margin-top: 5px;
    font-size: 50%;
}
.container{
	text-align: center;    
}
.conatiner-invoice{
    border: solid 1px #dddddd;
    width: 720px;
	box-shadow: 0px 0px 5px rgba(0,0,0,0.5 );
	text-align: left;
	margin: 0px auto;
	float:none;
	
}
.conatiner-invoice .page-header{
	font-size: 22px;
	margin: 10px 0 20px 0;
} 
.p-img {
    width: 93px;
    height: 65px;
    float: left;
    overflow: hidden;
}
.p-img img {
    width: 100%;
    height: 100%;
    border: 1px solid #ccc;
}
.p-info {
    margin-left: 103px;
}
a.p-name {
    color: black;
    font-weight: bold;
}
</style>
<script type="text/javascript">
    var serller_invoice_config = <?php echo json_encode($config);?>;
</script>
<div class="col-md-12 conatiner-invoice" style="background-color: white;" ng-app="lynx" ng-controller="SellerInvoiceDetailController">
    
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
                <i class="fa fa-globe"></i> SFriendly.com 
                <small class="pull-right">Ngày: {{invoice.created_date}}</small>
            </h2>
        </div><!-- /.col -->
    </div>
    
    <div class="row">
        <div class="col-xs-4">
            Nhà cung cấp <br/>
            <b>Mã : {{config.sellerId}}</b> 
        </div>
        <div class="col-xs-4">
            Nguời mua : <br/>
            <b>{{shipping.contact.full_name}}</b><br/>
            {{shipping.contact.street_address}},{{shipping.contact.state_province}}<br/>
            Số điện thoại : {{shipping.contact.telephone}} <br/>
            Email : {{shipping.contact.email}}<br/>
        </div>
        <div class="col-xs-4">
            <b>Mã hóa đơn : #{{invoice.invoice_type}}-{{invoice.id}}</b>  <br/>
            <br/>
            <b>Mã đơn hàng :</b> #{{invoice.order.id}}<br/>
            <b>Ngày thanh toán : </b> {{invoice.paid_date.split(" ")[0]}}<br/>
            <b>Tài khoản : </b> {{invoice.order.fk_user}}
        </div>
    </div>
    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="width:5%">Mã</th>
                    <th style="width:70%">Tên / Mô tả</th>
                    <th style="width:10%">Số Lượng</th>
                    <th style="width:15%">Tổng tiền</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="product in invoice.products" ng-show="config.sellerId == product.seller_id">
                    <td>{{product.id}}</td>
                    <td>
                        <div class="p-img">
                            <a href="/product/details/{{product.sub_id}}"><img ng-src="{{product.sub_image}}" title="{{product.name}}" ></a>
                        </div>
                        <div class="p-info">
                            <a class="p-name" href="/product/details/26" title="Thịt thăn x">
                                {{product.name}}
                            </a>
                            <p>{{product.short_description}}</p>
                        </div>
                    </td>
                    <td>{{product.product_quantity | number}}</td>
                    <td>{{product.sell_price | number}}đ</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-xs-6">
            <p class="lead">Phương thức thanh toán:</p>
            <table class="table">
                <tbody>
                    <tr>
                        <th style="width:100%"> THANH TOÁN QUA NGÂN LƯỢNG</th>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-xs-6">
            <p class="lead">Thanh toán:</p>
            <table class="table">
                <tbody><tr>
                    <th style="width:50%">Tổng sản phẩn:</th>
                    <td>{{totalSellerProduct | number}}đ</td>
                </tr>
            </tbody></table>
        </div>
    </div>
    <div class="row">
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            Các thông tin về sản phẩm và thanh toán chỉ được hiển thị với các sản phẩm của bạn
        </p>
    </div>
</div>
