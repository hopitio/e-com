$(function() {
    tooltip();
    check_all();
    $('.modal').on('shown.bs.modal', function() {
        $('.modal-backdrop').appendTo($(this).parents('form:first'));
    }).on('hide.bs.modal', function() {
        $('.modal-body', this).html('');
    });
    $('.form-validate').submit(function(e) {
        e.preventDefault();
        var $form_input = $("input,select,textarea", this)
                .not("[type=submit]")
                .not('[data-init-validate=1]')
                .attr('data-init-validate', 1);
        $form_input.jqBootstrapValidation();
        $(this).trigger('validate_submit');
        if ($("input,select,textarea", this).not("[type=submit]").jqBootstrapValidation("hasErrors") == false) {
            $(this).unbind('submit').submit();
        }
    });
});

function tooltip(container) {
    container = container || document;
    $('.bs-tooltip', container).each(function() {
        var $elm = $(this);
        var opt = {};
        opt.placement = $elm.attr('data-placement') || 'bottom';
        opt.container = $elm.attr('data-container') || 'body';
        $elm.tooltip(opt);
    });
}

function check_all(container) {
    container = container || document;
    $('.check-all', container).each(function() {
        var $elm = $(this);
        var $icon = $('i', $elm);
        var checked = $icon.hasClass('fa-check-square-o');
        var $parent = $elm.parents('table:first');

        if (!checked) {
            $icon.addClass('fa fa-square-o');
        }
        if ($parent.length === 0) {
            $parent = $elm.parents('.panel:first');
        }
        $elm.unbind('checked').unbind('unchecked').unbind('click');
        $elm.on('checked', function() {
            var $check = $('.check', $parent);
            $icon.removeClass('fa-square-o').addClass('fa-check-square-o');
            $check.prop('checked', true).trigger('change');
        });
        $elm.on('unchecked', function() {
            var $check = $('.check', $parent);
            $icon.removeClass('fa-check-square-o').addClass('fa-square-o');
            $check.prop('checked', false).trigger('change');
        });
        $elm.click(function() {
            checked = !$icon.hasClass('fa-check-square-o');
            var $check = $('.check', $parent);
            if (checked) {
                $elm.trigger('checked');
                $check.trigger('change');
            } else {
                $elm.trigger('unchecked');
                $check.trigger('change');
            }
        });
        $elm.parent().find('.check-all-check').click(function() {
            $elm.trigger('checked');
        });
        $elm.parent().find('.check-all-uncheck').click(function() {
            $elm.trigger('unchecked');
        });
    });
    $('.check', container).change(function() {
        if ($(this).prop('checked') === true)
            $(this).parents('tr:first').addClass('checked');
        else
            $(this).parents('tr:first').removeClass('checked');
    });
}

function get_data_table_opts(custom_opts) {
    var opts = {
        bSort: false,
        bServerSide: true,
        sScrollY: "300px",
        sPaginationType: "bootstrap",
        oLanguage: {
            sEmptyTable: "Không có dữ liệu hiển thị",
            sInfo: "Hiển thị _TOTAL_ bản ghi (_START_ đến _END_)",
            sInfoEmpty: "Không có bản ghi nào",
            sInfoFiltered: " - lọc từ _MAX_ bản ghi",
            sLoadingRecords: "Đang tải - vui lòng chờ...",
            sSearch: "Tìm kiếm:",
            sZeroRecords: "Không có bản ghi nào",
            sLengthMenu: "Hiển thị _MENU_ bản ghi"
        },
        fnRowCallback: function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
            var $row = $(nRow);
            if (typeof aData.id !== 'undefined') {
                $row.attr('data-id', aData.id);
            }
        },
        fnFooterCallback: function() {
            var $table = $(this);
            var $footer = $('.panel-footer', $table.parents().parent().parent().parent());
            if ($table.parent().parent().parent().parent().hasClass('panel-body') === false) {
                return;
            }
            $table.parent().parent().next('.dataTables_info').appendTo($footer);
            $table.parent().parent().next('.dataTables_paginate').appendTo($footer);
        },
        fnDrawCallback: function() {
            tooltip(this);
            check_all($(this).parents('.panel:first'));
            $('tbody', this).unbind('click').click(function(e) {
                if ($(e.target).prop('tagName') === 'button'
                        || $(e.target).prop('tagName') === 'input'
                        || $(e.target).prop('tagName') === 'A'
                        || $(e.target).prop('tagName') === 'I') {
                    var $tr = $(e.target).parents('tr:first');
                    $('.check', this).prop('checked', false).trigger('change');
                    $('.check', $tr).prop('checked', true).trigger('change');
                    return;
                }
                if ($(e.target).attr('type') === 'checkbox') {
                    return;
                }
                e.preventDefault();
                var $tr = $(e.target).parents('tr:first');
                var $tbody = $(e.target).parents('tbody:first');
                var $check = $('.check', $tr);
                $check.prop('checked', true).trigger('change');
            });
            $('tbody', this).dblclick(function(e) {
                if ($(e.target).attr('type') === 'checkbox') {
                    return;
                }
                e.preventDefault();
                var $tr = $(e.target).parents('tr:first');
                $('.check', this).prop('checked', false).trigger('change');
                $('.check', $tr).prop('checked', true).trigger('change');
                $tr.trigger('update');
            });
            if (typeof custom_opts.fnCustomCallback !== 'undefined') {
                $(this).on('fnCustomCallback', custom_opts.fnCustomCallback).trigger('fnCustomCallback');
            }
        }
    };
    for (var i in custom_opts) {
        opts[i] = custom_opts[i];
    }
    return opts;
}

function btn_update_onclick(elm) {
    var $tr = $(elm).parents('tr:first');
    $tr.trigger('update');
}


