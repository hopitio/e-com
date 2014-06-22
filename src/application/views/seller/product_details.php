<?php
defined('BASEPATH') or die;

/* @var $product ProductFixedDomain */
$tabs = array('general' => 'Thông tin cơ bản');
if ($product->id)
{
    $tabs += array(
        'category'        => 'Chuyên mục',
        'price'           => 'Giá & Thuế',
        'return_warranty' => 'Điều khoản Trả hàng & Bảo hành',
        'meta'            => 'Thông tin tìm kiếm',
        'images'          => 'Ảnh'
    );
}
?>
<br>
<form method="post" id="frm-main" class="row form-horizontal" enctype="multipart/form-data">
    <input type="hidden" name="hdnProductID" value="<?php echo $product->id ?>">
    <input type="hidden" name="hdnCategory" value="<?php echo isset($_GET['category']) ? (int) $_GET['category'] : '' ?>">
    <input type="hidden" name="hdnLanguage" value="<?php echo $lang ?>">
    <input type="hidden" name="hdnTab" id="hdnTab" value="">
    <!-- Nav tabs -->
    <div class="col-lg-3">
        <?php
        $selectedLanguage = isset($_GET['language']) ? $_GET['language'] : '';
        $arr_language = array(
            'VN-VI' => 'Tiếng Việt',
            'EN-US' => 'English',
            'KO-KR' => 'Korean'
        );
        ?>
        <select style="width:100%" id="selLanguage">
            <?php foreach ($arr_language as $k => $v): ?>
                <?php $selected = $selectedLanguage == $k ? 'selected' : '' ?>
                <option value="<?php echo $k ?>" <?php echo $selected ?>><?php echo $v ?></option>
            <?php endforeach; ?>
        </select>
        <h4 class="left">
            Trạng thái:&nbsp;
            <?php
            switch ($product->status) {
                case -1:
                    echo '<span class="red">Đã xóa</span>';
                    break;
                case 0:
                    echo '<span class="grey">Không bán</span>';
                    break;
                case 1:
                    echo '<span class="green">Đang bán</span>';
                    break;
            }
            ?>
        </h4>
        <ul class="nav nav-tabs">
            <?php foreach ($tabs as $tab => $tabName): ?>
                <li><a href="#<?php echo "tab_$tab" ?>" data-toggle="tab"><?php echo $tabName ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <!-- Tab panes -->
    <div class="col-lg-9">
        <h1 id="community" class="page-header">
            <a href="/seller/show_products"><i class="fa fa-arrow-left"></i></a>
            <strong>
                <?php
                if (!$product->id)
                {
                    echo 'New Product';
                }
                else
                {
                    echo $product->getName();
                }
                ?>
            </strong>
            &nbsp;
            <div class="actions">
                <a href="javascript:;" id="btn-apply" class="btn" data-type="submit" data-action="/seller/update_product/apply"><i class="fa fa-save"></i> Ghi lại</a>
                <?php if ($product->id): ?>
                    <?php if ($product->status != 1): ?>
                        <a href="javascript:;" class="btn" data-type="submit" data-action="/seller/update_product/activate"><i class="fa fa-check"></i> Bắt đầu bán</a>
                    <?php endif; ?>
                    <?php if ($product->status == 1): ?>
                        <a href="javascript:;" class="btn" data-type="submit" data-action="/seller/update_product/deactivate"><i class="fa fa-check"></i> Ngừng bán</a>
                        <a href="/product/details/<?php echo $product->id ?>" class="btn" target="_blank"><i class="fa fa-eye"></i> Xem thử</a>
                    <?php endif; ?>
                    <a href="/seller/duplicate_product/<?php echo $product->id ?>" class="btn"><i class="fa fa-copy"></i> Sao chép</a>
                <?php endif; ?>
            </div>
        </h1>
        <div class="tab-content">
            <?php
            foreach (array_keys($tabs) as $tab)
            {
                echo "<div class=\"tab-pane\" id=\"tab_$tab\">";
                require __DIR__ . '/tabs/tab_' . $tab . '.php';
                echo "</div>";
            }
            ?>
        </div>
    </div>
</form>
<br>
<script>
    $(function() {
        var tab = window.location.hash.replace('#/', '') || 'tab_general';
        $('a[href="#' + tab + '"]', $('.nav-tabs:first')).tab('show');
        $('#hdnTab').val(tab || 'tab_general');
        $('a[data-toggle=tab]', $('.nav-tabs:first')).on('show.bs.tab', function() {
            $('#hdnTab').val($(this).attr('href').replace('#', ''));
        });
    });
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
    $(function() {
        $('#selLanguage').change(function() {
            var url = '/seller/product_details/<?php echo $product->id ?>?language=' + $(this).val() + window.location.hash;
            window.location.href = url;
        });

        function error_tab(tab) {
            var $tab = $(tab);
            var $a = $('.nav-tabs a[href="#' + $tab.attr('id') + '"]');
            if ($a.find('.error').length) {
                return;
            }
            $a.parent().addClass('error');
            $a.append('<span class="error" style="float:right"><i class="fa fa-warning"></i></span>');
        }

        $('#frm-main').validate({
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