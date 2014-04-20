<?php 

?>

<a href="<?php echo site_url('seller/add_product') ?>"><i class="fa fa-plus"></i> Add new product</a>
<a href="javascript:;"><i class="fa fa-trash-o"></i> Delete</a>
<table id="main-table">
    <thead>
        <tr>
            <th>
                <input type="checkbox" class="chk-all" data-container="main-table">
            </th>
            <th>ID</th>
            <th>Name</th>
            <th>SKU</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>

<script>
    var Config = function() {
        this.service = '<?php echo site_url('seller/show_products_service') ?>';
    };

    (function(window, $, config) {
        $('#main-table').dataTable({
            "bSort": false,
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": config.service,
            "aoColumnDefs": [
                {
                    "mRender": function(data, type, row) {
                        return ('<input type="checkbox" name="chk" class="chk" value="' + data + '">');
                    },
                    "aTargets": [0]
                },
                {
                    "mRender": function(data, type, row) {
                        return ('<a href="' + row['url'] + '">' + data + '</a>');
                    },
                    "aTargets": [1, 2, 3]
                }
            ]
        });
        
    })(window, $, new Config);
    

</script>

