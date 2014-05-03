/*
 *Thực hiện các action javascript Cơ bản để page hoạt động.
 * CREATE BY : ANLT 
 * CREATE DATE : 20140328
 */
Window.App;
Window.Config;
$(document).ready(function() {
    Window.App = new App();
    Window.Config = new Config();
});

function Context() {
}
function App() {
    $.ajaxSetup({cache: true});
    this.Context = new Context();
    $.getScript('//connect.facebook.net/en_UK/all.js', function() {
        //if(FB == 'undefined'){
        FB.init({
            appId: Window.Config.facebookApplicationKey,
            status: true,
            cookie: true,
            xfbml: true
        });
        //}
    });

}//app

/**
 * 
 * @param {type} title
 * @param {type} url
 * @param {type} customClass
 * @returns {showAjaxModal.callback}
 */
function showAjaxModal(title, url, customClass) {
    var $modal = $('#modal_general');
    var callback = {
        success: function(tobeCalled) {
            callback.onSuccess = tobeCalled;
            return callback;
        },
        error: function(tobeCalled) {
            callback.onError = tobeCalled;
            return callback;
        }
    };

    $('#modal_general').modal('show');
    $('.modal-title', $modal).html(title);
    $.ajax({
        url: url,
        success: function(resp) {
            $('.modal-body', $modal).html(resp);
            if (callback.onSuccess)
                callback.onSuccess();
        }, error: function() {
            if (callback.onError)
                callback.onError();
        }
    });

    return callback;
}

$(function() {
    //html5 form
    $('.submit', $('form')).click(function() {
        var $this = $(this);
        var $form = $(this.form);

        if ($this.attr('data-action'))
            $form.attr('action', $this.attr('data-action'));

        if ($this.attr('data-method'))
            $form.attr('method', $this.attr('data-method'));

        $form.submit();
    });

    $('#modal_general').on('show.bs.modal', function() {
        var $this = $(this);
        $this.attr('data-orgil-class', $this.attr('class')); //lưu lại class gốc
        $this.data().orgil_html = $('.modal-body', $this).html(); //lưu lại html gốc
    }).on('hide.bs.modal', function() {
        var $this = $(this);
        $('.modal-body', this).html($this.data().html()); //trả về html & class gốc
        $this.attr('class', $this.attr('data-orgil-class'));
    });
});





