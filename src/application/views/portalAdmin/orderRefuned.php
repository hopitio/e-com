<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Thiếp lập trả hàng
        <small></small>
    </h1>
</section>
<section class="content" ng-controller="PortalOrderRefunedController">
<form id="frm-refuned-data" method="post">
    <input type="hidden" name="data" value="{{getPostValues()}}"/>
</form>
<form name="refunedFrm" novalidate>
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
                <span style="font-weight: bold;">Tài khoản thực hiện giao dịch : </span> {{order.user.account}} <br/>
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
                <h3 class="box-title">
                    Lựa chọn sản phẩm 
                </h3>
            </div>
            <div class="box-body ">
                <table class="lynx_table">
                <thead>
                    <tr>
                        <th ></th>
                        <th >Ảnh</th>
                        <th width="500px">Mô tả</th>
                        <th >Giá</th>
                        <th width="50px">Số lượng</th>
                        <th width="50px">Thành tiền (vnd)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="product in products">
                      <td><input type="checkbox" ng-model="product.choiced" class="simple"/></td>
                      <td><img width="75px" height="75px" alt="" ng-src="{{prodcut.sub_image}}"/></td>
                      <td>  
                            <p><strong>Mã/Mã hệ thống : </strong>{{product.id}}/{{product.sub_id}}</p>
                            <p><strong>Mô tả : </strong>{{product.short_description}}</p>
                      </td>
                      <td><span>{{product.sell_price | number:0}}đ</span></td>
                      <td>
                         <select  ng-disabled="!product.choiced"  ng-model="product.refuned_quantity">
                            <option ng-repeat="item in product.refuned_quantity_allow" >{{item}}</option>
                         </select>
                      </td>
                      <td><input ng-disabled="!product.choiced" ng-model="product.refuned_price" type="number"></td>
                    </tr>
                </tbody>
                <tfoot></tfoot>
             </table>
            </div>
        </div>
        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">
                    Vận chuyển
                </h3>
            </div>
            <div class="box-body ">
                <table class="lynx_table">
                <thead>
                    <tr>
                        <th width="10px"></th>
                        <th width="100%">Địa chỉ</th>
                        <th width="50px">Giá</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="contact in contacts">
                        <td><input type="radio" name="rbContact" ng-click="setChoicedContact(contact)" ng-model="selectedContact.id" value="{{contact.id}}" class="simple"/></td>
                        <td>
                            <strong>Họ tên : </strong> {{contact.full_name}}<br/>
                            <strong>SĐT : </strong> {{contact.telephone}}<br/>
                            <strong>Cụ thể : </strong> {{contact.street_address}} , {{contact.state_province}}<br/>
                        </td>
                        <td><input ng-disabled="selectedContact.id != contact.id" type="number"  ng-model="contact.prices"/></td>
                    </tr>
                </tbody>
                <tfoot></tfoot>
             </table>
            </div>
        </div>
        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">
                    Phụ phí <i style="cursor: pointer;" ng-click="otherCostAdd()" class="glyphicon glyphicon-plus-sign"></i>
                </h3>
            </div>
            <div class="box-body ">
                <table class="lynx_table">
                <thead>
                    <tr>
                        <th width="100%">Mô tả</th>
                        <th width="50px">Giá (vnd)</th>
                        <th width="50px">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="cost in otherCosts">
                        <td><textarea style="width:100%" ng-model="cost.comment"></textarea></td>
                        <td><input id="const" type="number" ng-model="cost.prices"/></td>
                        <td><a href="javascript:void(0)" ng-click="removeOtherCost(cost)">Xóa</a></td>
                    </tr>
                </tbody>
                <tfoot></tfoot>
             </table>
            </div>
        </div>
        
        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">
                    Tổng hợp
                </h3>
            </div>
            <div class="box-body ">
                <p> <strong>Tổng giá trị hóa đơn : </strong></p>
                <p> <strong>Mô tả : </strong></p>
                <p><textarea style="width:100%" rows="" cols="" ng-model="invoiceComment"></textarea></br></p>
                <button class="btn btn-primary" ng-click="submitFrm()" ng-disabled="refunedFrm.$invalid">Hoàn tất >></button>
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
</form>
</section>
<script type="text/javascript">
    var order = <?php echo json_encode($order);?>;
</script>
<style type="text/css">
    input.ng-invalid.ng-dirty {
    background-color: #FA787E;
  }

    input.ng-valid.ng-dirty {
    background-color: #78FA89;
  }
</style>


