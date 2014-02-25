<?php
defined('DS') or die;
/* @var $this \cores_View */
/* @var $root_ou \ou_Domain */
$v_controller = $this->get_controller_url();
$v_ajax_url = $v_controller . 'svc_all_ou_children';
?>
<!--jsTree-->
<link rel="stylesheet" href="<?php echo $this->get_theme_url() ?>js/jstree/themes/default/style.min.css" />
<script src="<?php echo $this->get_theme_url() ?>js/jstree/jstree.min.js"></script>
<script src="<?php echo $v_controller ?>assets/user_main.js"></script>
<div id="left">
    <p style="padding-left:23px;">
        <a href="javascript:;" class="btn btn-sm btn-default" onclick="actions.modal_ou(0);">
            <i class="fa fa-plus"></i> Thêm đơn vị
        </a>
    </p>
    <div id="tree" style="overflow: auto;">
        <ul>
            <li data-jstree='{"opened":true,"selected":true}' data-id="<?php echo $root_ou->id ?>">
                <?php echo $root_ou->name ?>
                <ul>
                    <?php $v_prev_depth = 0; ?>
                    <?php for ($i = 0; $i < count($arr_all_ou); $i++): ?>
                        <?php
                        $ou = new ou_Domain;
                        $next_ou = new ou_Domain;
                        $prev_ou = new ou_Domain;

                        $ou->import_array($arr_all_ou[$i]);
                        $next_ou->import_array(isset($arr_all_ou[$i + 1]) ? $arr_all_ou[$i + 1] : array());
                        $prev_ou->import_array(isset($arr_all_ou[$i - 1]) ? $arr_all_ou[$i - 1] : array());

                        $v_depth = substr_count($ou->internal_order, '/');
                        $v_next_depth = substr_count($next_ou->internal_order, '/');
                        $v_prev_depth = substr_count($prev_ou->internal_order, '/');
                        ?>
                        <?php if ($v_next_depth > $v_depth): ?>
                            <li data-id="<?php echo $ou->id ?>">
                                <?php echo $ou->name ?>
                                <ul>
                                <?php endif; ?>
                                <?php if ($v_next_depth <= $v_depth): ?>
                                    <li data-id="<?php echo $ou->id ?>"><?php echo $ou->name ?></li>
                                <?php endif; ?>
                                <?php if ($v_next_depth < $v_depth): ?>
                                </ul>
                            </li>
                        <?php endif; ?>
                    <?php endfor; ?>
                </ul>
            </li>
        </ul>
    </div>
</div>
<div style="margin-left: 200px;">
    <form method="post" class="form-horizontal form-validate" novalidate>
        <?php
        echo $this->hidden('hdn_goback', $v_controller);
        echo $this->hidden('hdn_update_group', $v_controller . 'dsp_single_group/');
        echo $this->hidden('hdn_update_ou', $v_controller . 'dsp_single_ou/');
        echo $this->hidden('hdn_delete', $v_controller . 'delete/');
        ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="btn-group">
                    <a href="javascript:;" class="btn btn-default btn-sm bs-tooltip check-all" title="Chọn tất cả">
                        <i></i>
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
                <div class="btn-group" id="btn-ou">
                    <button type="button" class="btn btn-default btn-sm bs-tooltip" title="Tải lại" onclick="window.oTable.fnReloadAjax();">
                        <i class="fa fa-refresh"></i>
                    </button>
                    <button type="button" class="btn btn-default btn-sm bs-tooltip" title="Sửa đơn vị" onclick="actions.modal_ou(window.ou_id);">
                        <i class="fa fa-edit"></i>
                    </button>
                    <button type="button" class="btn btn-default btn-sm bs-tooltip" title="Xóa đơn vị">
                        <i class="fa fa-trash-o"></i>
                    </button>
                    <button type="button" class="btn btn-default btn-sm bs-tooltip" title="Di chuyển lên">
                        <i class="fa fa-arrow-up"></i>
                    </button>
                    <button type="button" class="btn btn-default btn-sm bs-tooltip" title="Di chuyển xuống">
                        <i class="fa fa-arrow-down"></i>
                    </button>
                </div>

                <div class="panel-actions">
                    <a href="javascript:;" class="btn btn-default btn-sm" onclick="actions.modal_group(window.ou_id, 0);">
                        <i class="fa fa-group"></i> Thêm nhóm
                    </a>
                    <a href="javascript:;" class="btn btn-default btn-sm">
                        <i class="fa fa-plus"></i> Thêm NSD
                    </a>
                    <a href="javascript:;" class="btn btn-default btn-sm">
                        <i class="fa fa-trash-o"></i> Xóa
                    </a>
                </div>
            </div>
            <div class="panel-body">
                <?php echo $this->hidden('hdn_root_ou_id', $root_ou->id); ?>
                <table id="main-table" class="table table-hover table-condensed" data-ajax-src="<?php echo $v_ajax_url ?>">
                    <thead>
                        <tr>
                            <th width="5%"><!--checkbox-->&nbsp;</th>
                            <th width="5%"><!--icon-->&nbsp;</th>
                            <th width="20%" >Tên</th>
                            <th width="20%">Mã</th>
                            <th width="20%" class="center">Trạng thái</th>
                            <th width="30%">Hành động</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="panel-footer"></div>
        </div><!--panel-->
        <!-- Modal Group -->
        <div class="modal fade" id="modal-group" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Thêm nhóm</h4>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm" formaction="<?php echo $v_controller ?>update_group">Cập nhật</button>
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Hủy bỏ</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- Modal user -->
        <div class="modal fade" id="modal-user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Thêm nhóm</h4>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm" >Cập nhật</button>
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Hủy bỏ</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- Modal delete -->
        <div class="modal fade" id="modal-user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Yêu cầu xác nhận</h4>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm" >Cập nhật</button>
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Hủy bỏ</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- Modal ou -->
        <div class="modal fade" id="modal-ou" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">OU</h4>
                    </div>
                    <div class="modal-body"></div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm" formaction="<?php echo $v_controller ?>update_ou">Cập nhật</button>
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Hủy bỏ</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </form>
</div>




