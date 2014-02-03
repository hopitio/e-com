$(function() {
    var opts = get_data_table_opts({
        sAjaxSource: $('#main-table').attr('data-ajax-src'),
        bPaginate: false,
        aoColumns: [
            {"mData": null},
            {"mData": null},
            null,
            null,
            {"mData": null},
            {"mData": null}
        ],
        fnServerParams: function(aoData) {
            aoData.push({name: "ou_id", value: window.ou_id});
        },
        aoColumnDefs: [
            {"sClass": "center", "aTargets": [0, 1, 4]},
            {
                aTargets: [0],
                mRender: function(data, type, row) {
                    return '<input type="checkbox" name="check" class="check" value="' + row[0] + '"/>';
                }
            },
            {
                aTargets: [1],
                mRender: function(data, type, row) {
                    return (row.type === 'group' ? '<i class="fa fa-group"></i>' : '<i class="fa fa-user"></i>');
                }
            },
            {
                aTargets: [2, 3],
                mRender: function(data, type, row) {
                    return (row.type === 'group' ? '<strong>' + data + '</strong>' : data);
                }
            },
            {
                aTargets: [4],
                mRender: function(data, type, row) {
                    return (parseInt(row.status) === 1 ? '<i>Hoạt động</i>' : '<i>Không hoạt động</i>');
                }
            },
            {
                aTargets: [5],
                sClass: 'actions',
                mRender: function(data, type, row) {
                    var html = '<a href="javascript:;" class="btn btn-default btn-xs bs-tooltip" title="Sửa" onclick="btn_update_onclick(this);"><i class="fa fa-edit"></i></a>'
                            + '<a href="javascript:;" class="btn btn-default btn-xs bs-tooltip" title="Xóa"><i class="fa fa-trash-o"></i></a>'
                            + '<a href="javascript:;" class="btn btn-default btn-xs bs-tooltip" title="Di chuyển lên"><i class="fa fa-arrow-up"></i></a>'
                            + '<a href="javascript:;" class="btn btn-default btn-xs bs-tooltip" title="Di chuyển xuống"><i class="fa fa-arrow-down"></i></a>';
                    return html;
                }
            }
        ],
        fnCustomCallback: function() {
            $('tr', this).on('update', function() {
                actions.modal_group(window.ou_id, $(this).attr('data-id'));
            });
        }
    });
    window.oTable = $('#main-table').dataTable(opts);

    $('#tree').on('changed.jstree', function(e, data) {
        window.ou_id = $('#' + data.selected[0]).attr('data-id');
        window.oTable.fnReloadAjax();
        if (parseInt(window.ou_id) === 2)
            $('#btn-ou .btn:gt(0)').attr('disabled', 'disabled');
        else
            $('#btn-ou .btn:gt(0)').removeAttr('disabled', 'disabled');
    }).jstree({
        "core": {
            "multiple": false
        }
    });
    var urlParams;
    (window.onpopstate = function() {
        var match,
                pl = /\+/g, // Regex for replacing addition symbol with a space
                search = /([^&=]+)=?([^&]*)/g,
                decode = function(s) {
                    return decodeURIComponent(s.replace(pl, " "));
                },
                query = window.location.search.substring(1);

        urlParams = {};
        while (match = search.exec(query))
            urlParams[decode(match[1])] = decode(match[2]);
    })();
    console.log(urlParams);
    if (typeof urlParams['action'] !== 'undefined' && typeof actions[urlParams['action']] !== 'undefined') {
        actions[urlParams['action']]();
    }
});
var actions = {
    modal_group: function(ou_id, group_id) {
        ou_id = ou_id || window.ou_id;
        group_id = group_id || 0;
        var update_url = $('#hdn_update_group').val() + ou_id + '/' + group_id;
        $('#modal-group .modal-title').html(group_id ? 'Cập nhật nhóm' : 'Thêm mới nhóm');
        $('#modal-group').modal('show');
        $.ajax({
            cache: false,
            url: update_url,
            success: function(resp) {
                $('#modal-group .modal-body').html(resp);
            }
        });
    },
    modal_ou: function(ou_id) {
        ou_id = ou_id || 0;
        var url = $('#hdn_update_ou').val() + ou_id;
        $('#modal-ou .modal-title').html(ou_id ? 'Cập nhật đơn vị' : 'Thêm mới đơn vị');
        $('#modal-ou').modal('show');
        $.ajax({
            cache: false,
            url: url,
            success: function(resp) {
                $('#modal-ou .modal-body').html(resp);
            }
        });
    }

};
