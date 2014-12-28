<div class="width-960" style="display: inline-block;" >
    <div class="col-md-12">
        <h3 style="font-style: italic;">"Get deals on the US, buy it with the cheapest logistic free"</h3>
    </div>
    <div class="col-md-12" style="padding: 20px 0px 0px 0px;">
        <h4 style="text-align: left;">Top Seller Brand</h4>
        <a href="#">
            <img src="#" height="172px" width="100%" />
        </a>
    </div>
    <div class="col-md-12" style="padding: 20px 0px 0px 0px;">
        <h4 style="text-align: left;">Instruction here</h4>
        <a href="#">
            <img src="#" height="172px" width="100%" />
        </a>
    </div>
    <div class="col-md-12" style="padding: 20px 0px 0px 0px;">
        <h4 style="text-align: left;">Instruction here</h4>
        <a href="#">
            <img src="#" height="172px" width="100%" />
        </a>
    </div>
    <div class="col-md-12" style="padding: 20px 0px 0px 0px;">
        <h4 style="text-align: left;">Instruction here</h4>
        <a href="#">
            <img src="#" height="172px" width="100%" />
        </a>
    </div>
    <form id="frm-main" method="post" novalidate="novalidate">
    <div class="col-md-12" style="padding: 30px 0px 20px 0px;">
        <div class="col-md-8" style="padding: 0px;">
            <h4 style="text-align: left;">Other site ? <a href="#">Click here</a></h4>
            <div class="col-md-12 form-horizontal">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-6 control-label">Ready to get your product? Paste your link here:</label>
                    <div class="col-sm-4 text-left">
                      <input name="url" required="required" type="text" class="form-control" placeholder="Đường dẫn">
                    </div>
                    <div class="col-sm-2 ">
                      <input refer="main-btn" type="button" class="btn btn-primary" id="main-btn" value="Gửi">
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="padding-left:0px;">
                <div class="box" style="border-top:none;">
                    <div class="box-body" style="text-align: left;">
                        <a href="#" >Điều khoản</a> | 
                        <a href="#" >Điều khoản</a> |
                        <a href="#" >Điều khoản</a> |
                        <a href="#" >Điều khoản</a>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="col-md-4" style="padding: 0px;">
            <div class="box">
                <div class="box-header text-left" ><h4 style="text-align: left; padding:5px;">Thông tin liên lạc</h4></div>
                <div class="box-body">
                    <div class="form-group text-left">
                        <label for="inputEmail3" style="text-align: left; width:100%">Họ tên </label>
                        <input required="required" name="full-name" type="text" class="form-control" placeholder="Họ và tên">
                    </div>
                    <div class="form-group text-left">
                        <label for="inputEmail3" style="text-align: left; width:100%">Số điện thoại </label>
                        <input required="required" name="phone" type="text" class="form-control" placeholder="SĐT">
                    </div>
                    <div class="form-group text-left">
                        <label for="inputEmail3" style="text-align: left; width:100%">Email </label>
                        <input required="required" name="email" type="text" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group text-left" style="text-align: right;">
                        <button refer="main-btn" class="btn btn-primary">Gửi</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    
</div>
<script type="text/javascript">
$("[refer='main-btn']").click(function(){
	var frm = $("#frm-main").validate();
    if(frm.errorList.length == 0){
        $("#frm-main").submit();
    }
});
</script>

