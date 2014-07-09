<div  style="display: inline-block; width:1200px" ng-controller="SellerController">
<?php
include_once APPPATH.'views/admin/sellerFind.php';
include_once APPPATH.'views/admin/sellerDetail.php';
?>

<script type="text/javascript">

$(document).ready(function(){
    $(function() {
        $('[data-type=submit]').click(function() {
            var $this = $(this);
            var $form = $this.parents('form:first');
            if ($this.attr('data-action') != '') {
                $form.attr('action', $this.attr('data-action'));
            }
            $form.submit();
        });
        $('[data-type=reset]').click(function() {
            var $this = $(this);
            var $form = $this.parents('form:first');
            $form[0].reset();
        });
    });
    
    $('#frm-edit').validate({
        ignore: ".ignore",
        invalidHandler: function(event, validator) {
            var $ul = $('.nav-tabs');
            $ul.find('span.error').remove();
            $ul.find('li').removeClass('error');
            for (var i in validator.errorList) {
                var elem = validator.errorList[i].element;
                var $tab = $(elem).parents('.tab-pane:first');
                error_tab($tab);
            }
        }
    });
});

</script>
</div>