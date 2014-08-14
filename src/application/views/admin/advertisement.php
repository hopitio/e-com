<script>
    var scriptData = {};
    scriptData['banner'] = <?php echo json_encode($banner) ?>;
    //console.log(scriptData);
</script>
<section class="content-header">
    <h1>
        Quản lý banner
    </h1>
</section>
<!-- Main content -->
<section class="content">
    <div ng-controller="AdvertisementController" class="ng-scope">
        <div class="box" ng-repeat="banner_type in banner_types">
            <form action="<?php echo base_url('__admin/advertisement') ?>"
                  method="post" enctype="multipart/form-data">
                <div class="box-header" style="background-color: #e6e6e6">
                    <h3 class="box-title">{{banner_type.name}}</h3>
                </div>
                <div class="box-body">
                    <style>
                        td{vertical-align: top}
                    </style>
                    <table class="table">
                        <thead>
                        <th style="width: 10%">Banner #</th>
                        <th style="width: 30%">Ảnh</th>
                        <th style="width: 30%">Tiêu đề</th>
                        <th style="width: 30%">Đường dẫn</th>
                        </thead>
                        <tbody>
                            <tr ng-repeat="img in old_banner[banner_type.type]">
                                <td>#{{$index + 1}}<a href="javascript:;" ng-click="remove_old_banner(banner_type.type, $index)">[xóa]</a></td>
                                <td>
                                    <img style="width: 100%" ng-src="/{{img['src']}}">
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Tiêu đề"
                                           ng-model="img['title']">
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Đường dẫn"
                                           ng-model="img['href']">
                                </td>
                            </tr>
                            <tr ng-repeat="i in banner[banner_type.type]">
                                <td>
                                    <label for="{{banner_type.type}}_{{i}}">#{{$index + old_banner[banner_type.type].length + 1}}</label>
                                    <a href="javascript:;" ng-click="remove_banner(banner_type.type, i)">[xóa]</a>
                                </td>
                                <td>
                                    <input id="{{banner_type.type}}_{{i}}" type="file" name="{{banner_type.type}}[{{i}}]"
                                           class="form-control" placeholder="Chọn file">
                                </td>
                              <td>
                                    <input type="text" name="new_banner[{{banner_type.type}}][{{i}}][title]"
                                           class="form-control" placeholder="Tiêu đề">
                                </td>
                                <td>
                                    <input type="text" name="new_banner[{{banner_type.type}}][{{i}}][href]"
                                           class="form-control" placeholder="Đường dẫn">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="clear clear-fix clearfix"></div>
                <div class="box-footer">
                    <input type="hidden" class="col-xs-12" name="old_banner[{{banner_type.type}}]"
                           value="{{old_banner[banner_type.type]}}"/>
                    <button href="javascript" type="button"
                            ng-click="add_banner(banner_type.type)">Thêm banner</button>
                    <input type="submit" value="Lưu">
                </div>
            </form>
        </div>
    </div>
</section>