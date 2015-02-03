<?php 
$user instanceof User;
?>
<div class="width-960" style="display: inline-block;" >
    <div class="col-md-4" style="padding-left: 0px">
        <div class="box">
            <div class="box-header ui-sortable-handle" style="cursor: move;">
            </div>
            <form action="" id="srch-from">
            <div class="box-body">
               <?php  if(isset($isExits) && !$isExits) { ?>
                    <div class="alert alert-danger alert-dismissable">
                        <i class="fa fa-ban"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <b>Thông báo!</b> Thông tin order không phù hợp
                    </div>
               <?php }?>
                <div class="form-group">
                    <label for="exampleInputEmail1" style="width:100%;text-align:left;">Địa chỉ mail</label>
                    <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" style="width:100%;text-align:left;">Đơn đặt hàng</label>
                    <input name="order" type="number" class="form-control" id="exampleInputEmail1" placeholder="Nhập đơn đặt hàng">
                </div>
                <div class="form-group" style="display: inline-block;width: 100%">
                    <input id="srch-btn" type="button" class="btn btn-primary pull-right" value="Tìm kiếm"/> 
                </div>
            </div>
            </form>
       </div>
    </div>
    <?php if(!empty($order)){ ?>
        <div class="col-md-8" style="padding-right: 0px">
            <div class="box">
                <div class="box-header ui-sortable-handle" style="cursor: move;">
                    <h4 class="box-title">Thông tin order</h4>
                </div>
                <div class="box-body" align="left">
                    <span style="font-weight: bold;">Mã : </span> <?php echo $order->id;?> <br/>
                    <span style="font-weight: bold;">Trạng thái : </span><small class="badge bg-green"><?php echo $order->status;?></small> <br/>
                    <span style="font-weight: bold;">Ngày tạo :</span> <?php echo $order->created_date;?> <br/>
                </div>
            </div>
            <?php  foreach ($order->invoices as $invoice){ 
                $shipping = null ;
                $pay = null;
                foreach ($invoice->shippings as $ship){
                    if($ship->shipping_type == 'SHIP'){
                        $shipping = $ship;
                    }else{
                        $pay = $ship;
                    }
                }
                    
                ?>
                <div class="box">
                    <div class="box-header ui-sortable-handle" style="cursor: move;">
                        <h4 class="box-title">Hóa đơn <?php echo $invoice->id;?></h4>
                    </div>
                    <div class="box-body" align="left">
                        <span style="font-weight: bold;">Loại hóa đơn : </span> <?php echo $invoice->invoice_type == 'input' ? "Xuất hàng" : "Nhập hàng"; ?> <br/>
                        <span style="font-weight: bold;">Ngày tạo : </span><?php echo $invoice->created_date;?> <br/>
                        <span style="font-weight: bold;">Ngày thanh toán : </span><?php echo $invoice->paid_date;?> <br/>
                        <div class="row">
                        
                            <div class="<?php echo empty($pay) ? "col-md-12" : "col-md-6" ;?>">
                                <h4>Vận chuyển</h4>
                                <span style="font-weight: bold;">Hình thức vận chuyển : </span> <?php echo $shipping->display_name;?><br/>
                                <b>Phí vận chuyển : </b> <?php echo Common::getLableCurrency($shipping->price,$user->getCurrency());?> <br/>
                                <b>Tên : </b> <?php echo $shipping->contact->full_name;?> <br/>
                                <b>SĐT : </b> <?php echo $shipping->contact->telephone;?> <br/>
                                <?php echo $shipping->contact->street_address; ?>, <?php echo $shipping->contact->city_district; ?>
                            </div>
                            <?php if(!empty($pay)){ ?>
                                <div class="col-md-6">
                                    <h4>Thanh toán</h4>
                                    <span style="font-weight: bold;">Hình thức vận chuyển : </span> <?php echo $pay->display_name;?><br/>
                                    <b>Phí vận chuyển : </b> <?php echo Common::getLableCurrency($pay->price,$user->getCurrency());?> <br/>
                                    <b>Tên : </b> <?php echo $pay->contact->full_name;?> <br/>
                                    <b>SĐT : </b> <?php echo $pay->contact->telephone;?> <br/>
                                    <?php echo $pay->contact->street_address; ?>, <?php echo $pay->contact->city_district; ?>
                                </div>
                            <?php }?>
                        </div>
                        <br/>
                        
                        <table>
                            <thead>
                                <tr>
                                    <th><h4><b>Sản phẩm</b></h4></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  foreach ($invoice->products as $product){ ?>
                                    
                                        <tr style="text-align: left;">
                                            <td><a href="<?php echo $product->product_url;?>"><img width="75px" src="<?php echo $product->sub_image?>" style="margin: 10px;"/></a></td>
                                            <td valign="top">
                                                <a href="<?php echo $product->product_url;?>">
                                                    <b style="color: blue"><?php echo $product->name;?></b>
                                                    <br/>
                                                    <b>Tổng giá : </b> <span><?php echo Common::getLableCurrency($product->product_price,$user->getCurrency());?></span> <b>Số lượng : </b> <span><?php echo number_format($product->product_quantity);?></span>
                                                    <br/>
                                                    <span><?php echo $product->short_description;?></span>
                                                </a>
                                            </td>
                                        </tr>
                                    
                                <?php }?>
                            </tbody>
                        </table>
                        <hr/>
                        <b>Ghi chú :</b>
                        <?php echo $invoice->comment;?>
                        <br/>
                        <?php foreach ($invoice->otherCosts as $cost){
                            if(empty($cost->value)){
                                continue;
                            }
                            ?>
                        <b><?php echo $cost->comment?> : </b> <?php echo Common::getLableCurrency($cost->value,$user->getCurrency());?> <br/>
                        <?php }?>
                        <b>Tổng giá trị hóa đơn : </b> <?php echo Common::getLableCurrency($invoice->totalCost,$user->getCurrency());?>
                    </div>
                </div>
            <?php }?>
            
        </div>
    <?php }?>
    
</div>
<script type="text/javascript">
$(document).ready(function(){
	$("#srch-btn").click(function(){
	   $("#srch-from").submit();
	});
});
</script>

