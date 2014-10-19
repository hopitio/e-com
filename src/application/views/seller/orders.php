
<div class="panel panel-default" id="panel-table" style="margin-bottom: 0;">
    <div class="panel-heading">
        <div class="btn-group">
            <button type="button" class="btn btn-default btn-sm" rel="tooltip" title="Tải lại">
                <i class="fa fa-refresh"></i>
            </button>
            <button type="button" class="btn btn-default btn-sm" rel="tooltip" title="Khôi phục bộ lọc mặc định">
                <i class="fa fa-times"></i>
            </button>
        </div>
    </div>
    <div class="panel-body">
        <table id="main-table" class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th width="10%">Mã đơn hàng</th>
                    <th width="10%">Trạng thái</th>
                    <th width="20%">Ngày tạo</th>
                    <th width="30%">Hóa đơn</th>
                    <th width="40%">Sản phẩm</th>
                </tr>
            </thead>
            <thead>
                <tr class="table-filter">
                    <th></th>
                    <th>
                        <select id="slc_status">
                            <option value="">ALL</option>
                            <option value="ORDER_PLACED">ORDER_PLACED</option>
                            <option value="SHIPPING">SHIPPING</option>
                            <option value="DELIVERED">DELIVERED</option>
                            <option value="ORDER_CANCELLED">ORDER_CANCELLED</option>
                            <option value="REJECTED">REJECTED</option>
                            <option value="FAIL_TO_DELIVER">FAIL_TO_DELIVER</option>
                        </select>
                     </th>
                     <th>
                        <input type="text" placeholder="Từ" id="txt_start">
                        <input type="text" placeholder="Đến" id="txt_end">
                     </th>
                     <th></th>
                     <th>
                        <input type="text" placeholder="Danh sách sản phẩm" id="txt_product_id">
                     </th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
<script type="text/javascript">
    String.format = function() {
        var s = arguments[0];
        for (var i = 0; i < arguments.length - 1; i++) {       
            var reg = new RegExp("\\{" + i + "\\}", "gm");             
            s = s.replace(reg, arguments[i + 1]);
        }
        return s;
    };
     var serller_order_config = <?php echo json_encode($config);?>;
     $(function(){
    	 var tableHeight = $(window).height() - $('#main-table tbody').offset().top - 115;
    	 var ajax = {
 	            url: serller_order_config.apiUrl,
 	            type:"POST",
 	            data: function(d) {
 	                d.started_at = $('#txt_start').val();
 	                d.ended_at = $('#txt_end').val();
 	                d.order_status = $('#slc_status').val();
 	                d.products_id = $('#txt_product_id').val();
 	            }
 	        };
    	 window.table = dataTableInit('#main-table', ajax, tableHeight, {
             "searching": false,
             "columnDefs": [
                            {"orderable": false, "targets": [0,1,2,3]},
                            {
                                "targets": [0],
                                "data": "id"
                            },
                            {
                                "targets": [1],
                                "data": "status"
                            },
                            {
                                "targets": [2],
                                "data": "information.created_date"
                            },
                            {
                                "targets": [3],
                                "data": "information.invoices",
                                render:function(data){
                                    var invoices = "";
                                    for(var i=0;i<data.length;i++){
                                         var item = data[i];
                                         var invoiceName = item.invoice_type == "input" ? "Hóa đơn đầu vào - {0}" : "Hóa đơn đầu ra - {0}";
                                         invoiceName = String.format(invoiceName,item.id);
                                         invoices += String.format("<a href='/seller/invoice/{0}'>{1},</a> ",item.id,invoiceName);
                                     }
                                    return invoices;
                                }
                            },
                            {
                                "targets": [4],
                                "data": "information.uniqueProducts",
                                render:function(data){
                                    var product = "";
                                    for(var i=0;i<data.length;i++){
                                        item = data[i];
                                        if(item.seller_id == serller_order_config.sellerId){
                                            product += String.format("<a href='/seller/product_details/{0}'>{1},</a> ",item.sub_id,item.name);
                                        }
                                    }
                                    return product;
                                }
                            }
                        ]
         }).on('dblclick', 'tr', function(e) {
             if (e.target.tagName === 'INPUT' || e.target.tagName === 'A')
             {
                 return;
             }
             window.location.href = $(this).data().url;
         });
	        
         });
         
</script>



