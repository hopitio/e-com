$(function() {
    if ($('#left').length) {
        $(window).resize(function() {
            $('#left').height($(window).height() - $('#left').offset().top);
        }).trigger('resize');
    }
});

function tooltip(container) {
    $(container).on('mouseover', '[rel=tooltip]', function() {
        if (!$(this).data().tooltip) {
            $(this).data().tooltip = true;
            $(this).tooltip({
                container: 'body',
                placement: 'bottom'
            }).tooltip('show');
        }
    });
}


$(function() {
    if (!$.fn.validate)
        return;

    $('.form-validate').each(function() {
        var $form = $(this);
        $form.data().validator = $form.validate();
    });
});

/* Paging */
$.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
{
    return {
        "iStart": oSettings._iDisplayStart,
        "iEnd": oSettings.fnDisplayEnd(),
        "iLength": oSettings._iDisplayLength,
        "iTotal": oSettings.fnRecordsTotal(),
        "iFilteredTotal": oSettings.fnRecordsDisplay(),
        "iPage": oSettings._iDisplayLength === -1 ?
                0 : Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
        "iTotalPages": oSettings._iDisplayLength === -1 ?
                0 : Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
    };
};
/* Bootstrap style pagination control */
$.extend($.fn.dataTableExt.oPagination, {
    "bootstrap": {
        "fnInit": function(oSettings, nPaging, fnDraw) {
            var oLang = oSettings.oLanguage.oPaginate;
            var fnClickHandler = function(e) {
                e.preventDefault();
                if (oSettings.oApi._fnPageChange(oSettings, e.data.action)) {
                    fnDraw(oSettings);
                }
            };

            $(nPaging).append(
                    '<ul class="pagination pagination-sm">' +
                    '<li class="fixed"><a href="#">Trang đầu</a></li>' +
                    '<li class="fixed fixed-before"><a href="#">Trang trước</a></li>' +
                    '<li class="fixed fixed-after"><a href="#">Trang sau</a></li>' +
                    '<li class="fixed"><a href="#">Trang cuối</a></li>' +
                    '</ul>'
                    );
            var els = $('a', nPaging);
            $(els[0]).bind('click.DT', {action: "first"}, fnClickHandler);
            $(els[1]).bind('click.DT', {action: "previous"}, fnClickHandler);
            $(els[2]).bind('click.DT', {action: "next"}, fnClickHandler);
            $(els[3]).bind('click.DT', {action: "last"}, fnClickHandler);
        },
        "fnUpdate": function(oSettings, fnDraw) {
            var iListLength = 5;
            var oPaging = oSettings.oInstance.fnPagingInfo();
            var an = oSettings.aanFeatures.p;
            var i, j, sClass, iStart, iEnd, iHalf = Math.floor(iListLength / 2);

            if (oPaging.iTotalPages < iListLength) {
                iStart = 1;
                iEnd = oPaging.iTotalPages;
            }
            else if (oPaging.iPage <= iHalf) {
                iStart = 1;
                iEnd = iListLength;
            } else if (oPaging.iPage >= (oPaging.iTotalPages - iHalf)) {
                iStart = oPaging.iTotalPages - iListLength + 1;
                iEnd = oPaging.iTotalPages;
            } else {
                iStart = oPaging.iPage - iHalf + 1;
                iEnd = iStart + iListLength - 1;
            }

            for (i = 0, iLen = an.length; i < iLen; i++) {
                // Remove the middle elements
                var $li = $('li', an[i]);
                $('li:not(.fixed)', an[i]).remove();

                // Add the new list items and their event handlers
                for (j = iStart; j <= iEnd; j++) {
                    sClass = (j == oPaging.iPage + 1) ? 'class="active"' : '';
                    $('<li ' + sClass + '><a href="#">' + j + '</a></li>')
                            .insertBefore($('li.fixed-after', an[i])[0])
                            .bind('click', function(e) {
                                e.preventDefault();
                                oSettings._iDisplayStart = (parseInt($('a', this).text(), 10) - 1) * oPaging.iLength;
                                fnDraw(oSettings);
                            });
                }

                // Add / remove disabled classes from the static elements
                if (oPaging.iPage === 0) {
                    $('li.fixed-before, li:first', an[i]).addClass('disabled');
                } else {
                    $('li.fixed-before, li:first', an[i]).removeClass('disabled');
                }

                if (oPaging.iPage === oPaging.iTotalPages - 1 || oPaging.iTotalPages === 0) {
                    $('li.fixed-after, li:last', an[i]).addClass('disabled');
                } else {
                    $('li.fixed-after, li:last', an[i]).removeClass('disabled');
                }
            }
        }
    }
});

function dataTableInit(elm, ajax, height, customOPT) {
    customOPT = customOPT || {};
    var opts = {
        "processing": true,
        "serverSide": true,
        "ajax": ajax,
        stateSave: true,
        "scrollY": height ? height + 'px' : '300px',
        pagingType: 'bootstrap',
        language: {
            "lengthMenu": "Hiển thị _MENU_ bản ghi mỗi trang",
            "zeroRecords": "Không tìm thấy bản ghi nào",
            "info": "Hiển thị trang _PAGE_ của _PAGES_",
            "infoEmpty": "Không có bản ghi nào",
            "infoFiltered": "(Lọc từ _MAX_ bản ghi)"
        },
        "createdRow": function(row, data, dataIndex) {
            for (var i in data) {
                $(row).data()[i] = data[i];
            }

            $(row).attr('data-toggle', 'context').attr('data-target', '#context-menu').on('contextmenu', function() {
                $('input[type=checkbox]', row).prop('checked', true).trigger('change');
            });

            $('input[type=checkbox]', row).change(function() {
                if ($(this).prop('checked'))
                    $(row).addClass('checked');
                else
                    $(row).removeClass('checked');
            });

            if (customOPT.createRow) {
                customOPT.createRow.apply(this, arguments);
            }
        }
    };
    if (customOPT) {
        for (var i in customOPT) {
            opts[i] = customOPT[i];
        }
    }

    var $dataTable;

    $dataTable = $(elm).on('init.dt', function() {
        var $table = $(this);
        var $footer = $('.panel-footer', $table.parents().parent().parent().parent());
        var $panel = $table.parents('.panel:first');

        if ($table.parent().parent().parent().parent().hasClass('panel-body') === false) {
            return;
        }
        $table.parent().parent().next('.dataTables_info').appendTo($footer);
        $table.parent().parent().next('.dataTables_paginate').appendTo($footer);

        $table.on('click', 'tr', function(e) {
            if (e.target.tagName === 'INPUT' || e.target.tagName === 'A')
            {
                return;
            }
            var $check = $('input[type=checkbox]:first', this);
            $check.prop('checked', !$check.prop('checked')).trigger('change');
        });

        $('.fa-refresh', $panel).parent().click(function() {
            $dataTable.ajax.reload();
        });

        $('.fa-times', $panel).parent().click(function() {
            $(elm).parents('form:first')[0].reset();
            $dataTable.ajax.reload();
        });

        $('.check-all', $panel).on('check', function() {
            var $i = $(this).find('i');
            $i.removeClass('fa-square-o').addClass('fa-check-square-o');
            $('table input[type=checkbox]', $panel).prop('checked', true).trigger('change');
        }).on('uncheck', function() {
            var $i = $(this).find('i');
            $i.removeClass('fa-check-square-o').addClass('fa-square-o');
            $('table input[type=checkbox]', $panel).prop('checked', false).trigger('change');
        }).click(function() {
            var $i = $(this).find('i');
            if ($i.hasClass('fa-check-square-o')) {
                $(this).trigger('uncheck');
            } else {
                $(this).trigger('check');
            }
        });

        $('.check-all-check', $panel).click(function() {
            $('.check-all', $panel).trigger('check');
        });

        $('.check-all-uncheck', $panel).click(function() {
            $('.check-all', $panel).trigger('uncheck');
        });

        $panel.on('contextmenu', function(e) {
            e.preventDefault();
        });

        if (customOPT.fnFooterCallback) {
            customOPT.fnFooterCallback.apply(this, arguments);
        }
    }).on('xhr.dt', function() {
        setTimeout(function() {
            $dataTable.columns.adjust();
        }, 100);
    }).DataTable(opts);
    return $dataTable;
}
