<?php
/* @var $categories CategoryDomain */
?>
<form method="get" class="form-horizontal" id="frm-main" novalidate autocomplete="off">
    <div class="panel panel-default" id="panel-table" style="margin-bottom: 0;">
        <div class="panel-heading">
            <div class="btn-group">
                <a href="javascript:;" class="btn btn-default btn-sm check-all" rel="tooltip" title="Chọn tất cả">
                    <i class="fa fa-square-o"></i>
                </a>
                <a href="javascript:;" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="javascript:;" class="check-all-check">Chọn tất cả</a></li>
                    <li><a href="javascript:;" class="check-all-uncheck">Bỏ chọn</a></li>
                </ul>
            </div>
            <div class="btn-divider"></div>
            <div class="btn-group">
                <button type="button" class="btn btn-default btn-sm" rel="tooltip" title="Tải lại">
                    <i class="fa fa-refresh"></i>
                </button>
                <button type="button" class="btn btn-default btn-sm" rel="tooltip" title="Khôi phục bộ lọc mặc định">
                    <i class="fa fa-times"></i>
                </button>
            </div>

            <div class="panel-actions">
                <a href="/seller/add_product" class="btn btn-default btn-sm" rel="tooltip">
                    <i class="fa fa-plus"></i> Thêm sản phẩm
                </a>
            </div>
        </div>
        <div class="panel-body">
            <input type="hidden" name="hdn_root_ou_id" id="hdn_root_ou_id" value="">
            <table id="main-table" class="table table-hover table-condensed">
                <thead>
                    <tr>
                        <th width="3%"><!--checkbox-->&nbsp;</th>
                        <th width="7%" >ID</th>
                        <th width="15%">Tên</th>
                        <th width="5%">Loại</th>
                        <th width="10%">Chuyên mục</th>
                        <th width="10%">SKU</th>
                        <th width="15%">Giá</th>
                        <th width="15%">Số lượng</th>
                        <th width="10%">Trạng thái</th>
                        <th width="5%">Xem</th>
                    </tr>
                </thead>
                <thead>
                    <tr class="table-filter">
                        <th></th>
                        <th><input type="text" id="txt_id"></th>
                        <th><input type="text" id="txt_name"></th>
                        <th><select id="sel_type"></select></th>
                        <th>
                            <select id="sel_category">
                                <option value="0">< Tất cả ></option>
                                <?php
                                $prevGroup = '';
                                foreach ($categories as $category)
                                {
                                    if ($category->getLevel() == 1)
                                    {
                                        continue;
                                    }
                                    if ($prevGroup != $category->parent_name)
                                    {
                                        echo $prevGroup == '' ? '' : '</optgroup>';
                                        echo "<optgroup label=\"{$category->parent_name}\">";
                                        $prevGroup = $category->parent_name;
                                    }
                                    echo "<option value=\"{$category->id}\">{$category->name}</option>";
                                }
                                ?>
                            </select>
                        </th>
                        <th><input type="text" id="sel_code"></th>
                        <th>
                <div class="row form-group">
                    <input type="text" placeholder="Từ" id="txt_price_from">
                    <input type="text" placeholder="Đến" id="txt_price_to">
                </div>
                </th>
                <th>
                <div class="row form-group">
                    <input type="text" placeholder="Từ" id="txt_qty_from">
                    <input type="text" placeholder="Đến" id="txt_qty_to">
                </div>
                </th>
                <th>
                    <select id="sel_status">
                        <option value="all">< Tất cả ></option>
                        <option value="1">Đang bán</option>
                        <option value="0">Không bán</option>
                        <option value="-1">Đã xóa</option>
                    </select>
                </th>
                <th></th>
                </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
        <div class="panel-footer"></div>
    </div><!--panel-->
    <div id="context-menu">
        <ul class="dropdown-menu" role="menu">
            <li><a tabindex="-1" href="#">Bắt đầu bán</a></li>
            <li><a tabindex="-1" href="#">Ngừng bán</a></li>
            <li><a tabindex="-1" href="#modal-delete" data-toggle="modal" id="btn-delete">Xóa</a></li>
        </ul>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    Bạn chắc chắn muốn xóa sản phẩm: <strong id="delete-products"></strong>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary">Đồng ý</button>
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Hủy bỏ</button>

                </div>
            </div>
        </div>
    </div>
</form>
<script>
    var scriptData = {
        service: '/seller/show_products_service',
        deleteService: '/seller/delete_product'
    };
</script>
<script>
    $(function() {
        tooltip($('#main-table').parents('.panel:first'));
    });
    $(function() {
        var tableHeight = $(window).height() - $('#main-table tbody').offset().top - 115;
        var ajax = {
            url: scriptData.service,
            data: function(d) {
                d.id = $('#txt_id').val();
                d.name = $('#txt_name').val();
                d.type = $('#sel_type').val();
                d.category = $('#sel_category').val();
                d.code = $('#txt_code').val();
                d.price_from = $('#txt_price_from').val();
                d.price_to = $('#txt_price_to').val();
                d.qty_from = $('#txt_qty_from').val();
                d.qty_to = $('#txt_qty_to').val();
                d.status = $('#sel_status').val();
            }
        };
        window.table = dataTableInit('#main-table', ajax, tableHeight, {
            "searching": false,
            "order": [1, 'desc'],
            "columnDefs": [
                {"orderable": false, "targets": [0, 9]},
                {
                    "targets": [0],
                    "data": null,
                    render: function(data) {
                        return '<input type="checkbox" class="chk" name="chk">';
                    }
                },
                {
                    "targets": [9],
                    "data": null,
                    render: function(data) {
                        return '<a href="' + data.url + '" target="_blank">Xem</a>'
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

        $('#frm-main').submit(function(e) {
            e.preventDefault();
            return false;
        });

        $('#btn-delete').click(function() {
            var names = '';
            $('.chk:checked').each(function() {
                names += (names ? ', ' : '') + $(this).parents('tr:first').data()[2];
            });
            $('#delete-products').html(names);
        });
    });
    $(function() {
        var timeout;
        $('#panel-table select').change(function() {
            reload();
        });
        $('#panel-table input[type=text]').keyup(function() {
            reload();
        });
        function reload() {
            if (timeout)
                clearTimeout(timeout);
            setTimeout(function() {
                window.table.ajax.reload();
            }, 500);
        }
    });
</script>