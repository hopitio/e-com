<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Chi tiết giao dịch
        <small>Giao dịch</small>
    </h1>
</section>
<section class="content" ng-controller="PortalAdminOrderController">
    
    <div class="col-md-4">
        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">
                    Thông tin chung về giao dịch
                </h3>
            </div>
            <div class="box-body ">
                <span style="font-weight: bold;">Mã : </span> {{order.id}} <br/>
                <span style="font-weight: bold;">Trạng thái : {{order.status}} </span><br/>
                <span style="font-weight: bold;">Ngày tạo : </span> {{order.created_date}} <br/>
                <span style="font-weight: bold;">Ngày Giao hàng : </span> {{order.shiped_date}} <br/>
                <span style="font-weight: bold;">Ngày hoàn thành : </span> {{order.completed_date}} <br/>
                <span style="font-weight: bold;">Ngày kết thúc : </span> {{order.canceled_date}} <br/>
                <span style="font-weight: bold;">Tài khoản thực hiện giao dịch : </span> <a ng-href="/portal/__admin/user/{{order.fk_user}}">{{order.fk_user}}</a> <br/>
                <span style="font-weight: bold;">Tổng giá trị đơn hàng : </span> {{order.cost | number}} VND <br/>
                <a style="width: 100%;margin-top:20px" class="btn btn-primary" href="javascript:void(0)" ng-click="nextStatus()" ng-show="order.status == 'VERIFYING' && !onSubmit">Xác nhận đơn hàng (order place) </a>
                <a style="width: 100%;margin-top:20px" class="btn btn-primary" href="javascript:void(0)" ng-click="nextStatus()" ng-show="order.status == 'ORDER_PLACED' || order.status == 'FAIL_TO_DELIVER'  && !onSubmit">Đang vận chuyển (Shipping)</a>
                <a style="width: 100%;margin-top:20px" class="btn btn-primary" href="javascript:void(0)" ng-click="nextStatus()" ng-show="order.status == 'SHIPPING' && !onSubmit">Hoàn thành (Complete)</a>
                <a style="width: 100%;margin-top:20px" class="btn btn-primary" href="javascript:void(0)" ng-click="driectToRefuned()" ng-show="(order.status == 'SHIPPING' || order.status == 'VERIFYING' || order.status == 'DELIVERED') && !onSubmit">Trả hàng</a>
                <a style="width: 100%;margin-top:20px" class="btn btn-primary" href="javascript:void(0)" ng-click="failDeiveryStatus()" ng-show="(order.status == 'SHIPPING') && !onSubmit">Chuyển hàng thất bại</a>
                <a style="width: 100%;margin-top:20px" class="btn btn-primary" href="javascript:void(0)" ng-click="rejectStatus()" ng-show="order.status != 'DELIVERED' && order.status != 'REJECTED' && order.status != 'ORDER_CANCELLED' && !onSubmit">Hủy đơn hàng</a>
                <a style="width: 100%;margin-top:20px" class="btn btn-default btn-flat" href="javascript:void(0)" ng-show="onSubmit">Đang thực hiện giao dịch ...</a>
            </div>
        </div>
        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">
                    Lịch sử trạng thái 
                </h3>
            </div>
            <div class="box-body ">
                <table class="lynx_table">
                <thead>
                    <tr>
                        <th style="width: 200px">Ngày cập nhật</th>
                        <th style="width: 200px">Trạng thái</th>
                        <th >Ghi chú</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="history in orderHistories">
                      <td><span>{{history.updated_date}} <br/></span></td>
                      <td><span>{{history.status}} <br/></span></td>
                      <td><span>{{history.comment}} <br/></span></td>
                    </tr>
                </tbody>
                <tfoot></tfoot>
             </table>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Danh sách hóa đơn giao dịch <a href="/portal/__admin/order/{{order.id}}/add_invoice"><i class="fa fa-fw fa-plus-square"></i></a></h3>
            </div>
            <div class="box-body ">
                <table class="lynx_table table">
                    <thead>
                        <tr>
                            <th style="width: 100px">Loại - Mã</th>
                            <th style="width: 150px">Ngày tạo</th>
                            <th>Comment</th>
                            <th style="width: 200px">Thanh toán</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="invoice in order.invoices">
                          <td><span><a href="{{invoice.detail_url}}">{{invoice.invoice_type}} - {{invoice.id}}</a></span></td>
                          <td><span>{{invoice.created_date}}</span></td>
                          <td><span>{{invoice.comment}}</span></td>
                          <td>
                            <span>Mã : {{invoice.id}}<br/></span>
                            <span>Phương thức : {{invoice.payment_method}}<br/></span>
                            <span>Loại tiền : VND<br/></span>
                          </td>
                        </tr>
                    </tbody>
                    <tfoot></tfoot>
                 </table>
            </div>
        </div>
        
        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">
                    Danh sách sản phẩm giao dịch
                </h3>
            </div>
            <div class="box-body ">
                <table class="lynx_table">
                <thead>
                    <tr>
                        <th style="width: 75px">Mã</th>
                        <th style="width: 500px">Mô tả</th>
                        <th style="width: 200px">Giá / Thuế</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="product in order.uniqueProducts">
                      <td>{{product.id}}</td>
                      <td>
                        <div class="lynx_row lynx_productDes" >
                           <img style="float: left; margin:0px 10px 10px 0px" width="75px" height="" ng-src="{{product.sub_image}}"/>
                           <span class="lynx_productName">{{product.name}}</span><br/>
                           <span>{{product.short_description}}</span><br/>
                           <span>Số lượng : {{product.product_quantity}}</span><br/>
                           <span>Bên bán : {{product.seller_name}}</span><br/>
                        </div>
                      </td>
                      <td>
                        <span>Giá : {{product.product_price | number}} VND <br/></span>
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
        </div>
    </div>
    
    <div id="comment-dialog" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title">Nội dung chuyển trạng thái</h4>
          </div>
          <div class="modal-body">
                <textarea rows="4" cols="50" ng-model="comment" type="text" style="width:100%;height:200px"></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            <button type="button" class="btn btn-primary" ng-click="dialogCallback()">Cập nhập</button>
          </div>
        </div>
      </div>
    </div>
    
</section>



