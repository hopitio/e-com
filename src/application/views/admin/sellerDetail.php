<script>
function submitEditForm(){
    $('#frm-edit').submit();
}
</script>

<div class="lynx_giftAdminContent" style="float: right; width: 450px " >
    <form method="post" id="frm-edit" class="row form-horizontal" enctype="multipart/form-data">
    <h3>
        Chi tiết gian hàng
        <div class="actions">
            <a href="javascript:;" id="btn-apply" class="btn" data-type="submit"  ="/seller/update_product/apply"><i class="fa fa-save"></i> Ghi lại</a>
        </div>
    </h3>
    <div class="lynx_pageContent">
        
        <div class="form-group">
            <label class="control-label col-xs-2" for="txt_name"><span class="red">* </span>Account</label>
            <div class="controls col-xs-10">
                <input type="text" id="txt_name" class="form-control" data-rule-required="true">
            </div>
        </div>
        
        <div class="form-group">
            <label class="control-label col-xs-2" for="txt_name"><span class="red">* </span>Danh mục</label>
            <div class="controls col-xs-10">
                <input type="text" id="txt_name" class="form-control" data-rule-required="true">
            </div>
        </div>
        
        <div class="form-group">
            <label class="control-label col-xs-2" for="txt_name"><span class="red">* </span>Tên Gian hàng:<span class="help-block">Tối đa 250 kí tự.</span></label>
            <div class="controls col-xs-10">
                <input type="text" id="txt_name" class="form-control" data-rule-required="true">
            </div>
        </div>

        
        <div class="form-group">
            <label class="control-label col-xs-2" for="txt_name"><span class="red">* </span>SĐT</label>
            <div class="controls col-xs-5">
                <input type="text" id="txt_name" class="form-control" data-rule-required="true">
            </div>
        </div>
        
        <div class="form-group">
            <label class="control-label col-xs-2" for="txt_name"><span class="red">* </span>SĐT</label>
            <div class="controls col-xs-5">
                <input type="text" id="txt_name" class="form-control" data-rule-required="true">
            </div>
        </div>
        
        <div class="form-group">
            <label class="control-label col-xs-2" for="txt_name"><span class="red">* </span>E-Mail</label>
            <div class="controls col-xs-10">
                <input type="text" id="txt_name" class="form-control" data-rule-required="true">
            </div>
        </div>
        
        <?php 
            $file = new ControlGroupDecorator('Logo :', new FileInput('fileImage', 'fileImage', 'image/jpeg', true));
            $file->get_a('FileInput')->setAttribute('data-rule-required', true);
            echo $file;
        ?>

    </div>
    
    </form>
</div>





