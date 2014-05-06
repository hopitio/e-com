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

function productSlider(selector) {
    var $slider = $(selector);
    var currentPage = 0;
    var pages = [-15];

    //tinh toan trang
    var $wrapper = $('.lynx_slideItemsContainer', $slider);
    var $itemContainer = $('.lynx_listItem', $wrapper);
    var itemContainerWidth = 0;
    var startPosLeft = 15;
    $itemContainer.css('left', -pages[0]);
    var wrapperWidth = $wrapper.width();
    var $btnLeft = $('.lynx_left', $slider);
    var $btnRight = $('.lynx_right', $slider);

    var $items = $('.lynx_item', $itemContainer);
    $items.each(function() {
        var $this = $(this);
        var marginLeft = parseFloat($this.css('marginLeft').replace('px', ''));
        var marginRight = parseFloat($this.css('marginRight').replace('px', ''));
        itemContainerWidth += $this.outerWidth() + marginLeft + marginRight;
    });
    $itemContainer.width(itemContainerWidth);

    do {
        startPosLeft = Math.min(startPosLeft + wrapperWidth + pages[0], itemContainerWidth - wrapperWidth + pages[0]);
        if (startPosLeft > 0)
            pages.push(startPosLeft);
    } while (startPosLeft < itemContainerWidth - wrapperWidth + pages[0]);
    watchSlide();

    var timeoutSlide;
    function slidePage(direction) {
        if (timeoutSlide)
            clearTimeout(timeoutSlide);
        setTimeout(function() {
            if (direction > 0)
                currentPage = Math.min(pages.length - 1, currentPage + 1);
            else
                currentPage = Math.max(0, currentPage - 1);
            $itemContainer.animate({'left': -pages[currentPage]});
            watchSlide();
        }, 100);

    } //function

    $slider.data().init_slide = true;

    $btnLeft.unbind('click').click(function() {
        slidePage(-1);
    });
    $btnRight.unbind('click').click(function() {
        slidePage(+1);
    });

    function watchSlide() {
        $btnRight.show();
        if (pages.length > 1 && currentPage > 0)
            $btnLeft.show();
        else
            $btnLeft.hide();
        if (pages.length > 1 && currentPage < pages.length - 1)
            $btnRight.show();
        else
            $btnRight.hide();
    }

} //product slider





