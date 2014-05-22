<?php
defined('BASEPATH') or die;

/* @var $product ProductFixedDomain */
$tabs = array('general' => 'General');
if ($product->id)
{
    $tabs += array(
        'category' => 'Category',
        'price'    => 'Price & Taxes',
        'meta'     => 'Meta Infomation',
        'images'   => 'Images'
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
            'KR-KR' => 'Korean'
        );
        ?>
        <select style="width:100%" id="selLanguage">
            <?php foreach ($arr_language as $k => $v): ?>
                <?php $selected = $selectedLanguage == $k ? 'selected' : '' ?>
                <option value="<?php echo $k ?>" <?php echo $selected ?>><?php echo $v ?></option>
            <?php endforeach; ?>
        </select>
        <h4 class="left">
            Product Information
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
            <?php
            if (!$product->id)
            {
                echo 'New Product';
            }
            else
            {
                echo $product->getName()->getTrueValue();
            }
            ?>
            <div class="actions">
                <a href="/seller/show_products" class="btn"><i class="fa fa-arrow-left"></i> Back</a>
                <a href="javascript:;" class="btn" data-type="reset"><i class="fa fa-refresh"></i> Reset</a>
                <?php if ($product->id): ?>
                    <a href="/seller/duplicate_product/<?php echo $product->id ?>" class="btn"><i class="fa fa-copy"></i> Duplicate</a>
                <?php endif; ?>
                <a href="javascript:;" id="btn-apply" class="btn" data-type="submit" data-action="/seller/update_product/apply"><i class="fa fa-check"></i> Apply</a>
                <?php if ($product->id): ?>
                    <a href="javascript:;" class="btn" data-type="submit" data-action="/seller/update_product/save_n_quit"><i class="fa fa-save"></i> Save & Quit</a>
                    <a href="/product/details/<?php echo $product->id ?>" class="btn"><i class="fa fa-eye"></i> Preview</a>
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
    });

</script>