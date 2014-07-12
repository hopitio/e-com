
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Phần gian hàng
        <small>Quản lý gian hàng</small>
    </h1>

</section>

<!-- Main content -->
<section class="content">
    <div  ng-controller="SellerController">
        <?php
        include_once APPPATH.'views/admin/sellerFind.php';
        include_once APPPATH.'views/admin/sellerDetail.php';
        include_once APPPATH.'views/admin/sellerAudit.php';
        ?>
    </div>
</section><!-- /.content -->


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
                    }
                });
            });
        </script>

