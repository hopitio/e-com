<?php ?>

<div class="table-actions">
    <a href="/seller/add_product"><i class="fa fa-plus"></i> Add new product</a>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <a href="javascript:;"><i class="fa fa-trash-o"></i> Delete</a>
</div>
<table id="main-table" class="display dataTable" >
    <thead>
        <tr>
            <th width="10%" class="center"><input type="checkbox" class="chk-all" data-target="chk" data-container="main-table"></th>
            <th width="10%">ID</th>
            <th width="40%">Name</th>
            <th width="15%">SKU</th>
            <th width="10%">Price</th>
            <th width="15%">Action</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>

<script>
    var Config = function() {
        this.service = '<?php echo base_url('seller/show_products_service') ?>';
    };

    (function(window, $, config) {
        var opt = datatableOptions({
            "sAjaxSource": config.service,
            "scrollY": "400px",
            "aoColumnDefs": [
                {
                    "mRender": function(data, type, row) {
                        return ('<center><input type="checkbox" name="chk" class="chk" value="' + data + '"></center>');
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
        $('#main-table').dataTable(opt);

    })(window, $, new Config);


</script>

