<?php ?>

<div class="table-actions">
    <a href="/seller/add_product"><i class="fa fa-plus"></i> Add new product</a>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <a href="javascript:;" data-toggle="modal" data-target="#modal-delete"><i class="fa fa-trash-o" ></i> Delete</a>
</div>
<form id="frm-main">
    <table id="main-table" class="display dataTable">
        <thead>
            <tr>
                <th width="10%" class="center"><input type="checkbox" class="chk-all" data-target=".chk" data-container="main-table"></th>
                <th width="10%">ID</th>
                <th width="40%">Name</th>
                <th width="15%">SKU|UPC</th>
                <th width="10%">Price</th>
                <th width="15%">Action</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
    <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    Bạn chắc chắn muốn xóa những đối tượng đã chọn?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" id="btn-delete">Đồng ý</button>
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Hủy bỏ</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Modal -->


<script>
    var scriptData = {
        service: '/seller/show_products_service',
        deleteService: '/seller/delete_product'
    };
</script>
<script>
    $(function() {
        $('#btn-delete').click(function() {
            $('#modal-delete').modal('hide');
            $.ajax({
                type: 'post',
                url: scriptData.deleteService,
                data: $('#frm-main').serialize(),
                success: function() {
                    window.dataTable.draw();
                }, error: function() {
                }
            });
        });
    });

    (function(window, $, config) {
        var opt = datatableOptions({
            "ajax": config.service,
            "scrollY": "400px",
            "aoColumnDefs": [
                {
                    "mRender": function(data, type, row) {
                        return ('<center><input type="checkbox" name="chk[]" class="chk" value="' + data + '"></center>');
                    },
                    "aTargets": [0]
                },
                {
                    "mRender": function(data, type, row) {
                        return ('<a href="' + row['url'] + '">' + data + '</a>');
                    },
                    "aTargets": [1, 2, 3]
                },
                {
                    "mRender": function(data, type, row) {
                        return '<a href="' + row.url + '"><i class="fa fa-edit"></i> Edit</a>';
                    },
                    "aTargets": [5]
                }
            ],
            aoColumns: [
                null,
                null,
                null,
                null,
                null,
                {"mData": null}
            ]
        });
        dataTable = $('#main-table').DataTable(opt);
    })(window, $, scriptData);


</script>

