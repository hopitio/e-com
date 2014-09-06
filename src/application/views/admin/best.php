<script>
    var scriptData = {};
    //scriptData['product'] = <?php //echo json_encode($product)        ?>;
    scriptData = <?php echo json_encode($script_data) ?>;
    console.log(scriptData);
</script>
<section class="content-header">
    <h1>
        <?php echo $title ?>
    </h1>
</section>
<style>
    td{vertical-align: top}
</style>
<!-- Main content -->
<section class="content">
    <div ng-controller="BestController" class="ng-scope">
        <div class="box" ng-repeat="product_type in product_types">
            <form action="<?php echo base_url('__admin/best') ?>"
                  method="post" enctype="multipart/form-data">
                <div class="box-header" style="background-color: #e6e6e6">
                    <h3 class="box-title">{{product_type.name}}</h3>
                </div>
                <div class="box-body">
                    <table class="table">
                        <thead>
                        <th style="width: 20%">Sản phẩm #</th>
                        <th style="width: 80%">ID</th>
                        </thead>
                        <tbody>
                            <tr ng-repeat="p in product[product_type.id] track by $index">
                                <td>#{{$index + 1}}<a href="javascript:;" ng-click="remove_product(product_type.id, $index)">[xóa]</a></td>
                                <td>
                                    <input ng-model="product[product_type.id][$index]" required="true" type="text"/>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="clear clear-fix clearfix"></div>
                <div class="box-footer">
                    <input type="hidden" name="product[{{product_type.id}}]" value="{{product[product_type.id]}}">
                    <button href="javascript" type="button"
                            ng-click="add_product(product_type.id)">Thêm sản phẩm</button>
                    <input type="submit" value="Lưu">
                </div>
            </form>
        </div>
    </div>
</section>