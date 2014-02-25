<?php

defined('DS') or die;
/* @var $this \cores_View */
$v_controller = $this->get_controller_url();
$v_update_group = $v_controller . 'dsp_single_group/';
$v_delete_group = $v_controller . 'delete_group/';
$data_table = new Data_Table();
$arr_json = array();

foreach ($arr_all_group as $arr_single_group)
{
    $group = new group_Domain();
    $group->import_array($arr_single_group);
    $arr_json[] = array(
        'type' => 'group',
        0 => $group->id,
        2 => $group->name,
        3 => $group->code_name,
        'status' => $group->status,
        'id' => $group->id
    );
}
echo $data_table->response($v_count_group, $arr_json);
