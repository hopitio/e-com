<div class="lynx_contentWarp lynx_staticWidth" ng-controller="ChangePasswordController">
        <?php require_once APPPATH.'views/portalaccount/leftMenuAccount.php';?>
        <div class="lynx_row-right">
            <div class="lynx_row-head">
                <span>Thay đổi mật khẩu</span>
            </div>
            <div class="lynx_row-content">
                <div class="lynx_row">
                    <span> HỌ VÀ TÊN ĐỆM </span><input name="txtFristname" type="text" value="<?php echo $fristName;?>"/>
                </div>
                <div class="lynx_row">
                    <span>  TÊN : </span><input name="txtLastName" type="text" value="<?php echo $lastName;?>"/>
                </div>
                <div class="lynx_row">
                    <span> DOB : </span><input name="txtDOB" type="text" value="<?php echo $dob;?>"/>
                </div>
                <div class="lynx_row">
                    <span>SEX </span><select  name='sex' type="text"  >
                        <option value="M" <?php if($sex == 'M') echo 'selected';?>>MALE</option>
                        <option value="F" <?php if($sex == 'F') echo 'selected';?> >FAMALE</option>
                        <option value="O" <?php if($sex == 'O') echo 'selected';?> >OTHER</option>
                    </select> 
                </div>
                <div class="lynx_row">
                    <button id="btnComfirm" class="lynx_button btn btn-primary" type="submit">Thay đổi Thông tin cá nhân</button>
                </div>
            </div>
        </div>
        
        
        <div class="lynx_row-right">
            <div class="lynx_row-head">
                <span>Danh sách địa chỉ</span>
            </div>
            <div class="lynx_row-content">
                <div class="lynx_row">
                    <span> HỌ VÀ TÊN ĐỆM </span><input name="txtFristname" type="text" value="<?php echo $fristName;?>"/>
                </div>
                <div class="lynx_row">
                    <span>  TÊN : </span><input name="txtLastName" type="text" value="<?php echo $lastName;?>"/>
                </div>
                <div class="lynx_row">
                    <span> DOB : </span><input name="txtDOB" type="text" value="<?php echo $dob;?>"/>
                </div>
                <div class="lynx_row">
                    <span>SEX </span><select  name='sex' type="text"  >
                        <option value="M" <?php if($sex == 'M') echo 'selected';?>>MALE</option>
                        <option value="F" <?php if($sex == 'F') echo 'selected';?> >FAMALE</option>
                        <option value="O" <?php if($sex == 'O') echo 'selected';?> >OTHER</option>
                    </select> 
                </div>
                <div class="lynx_row">
                    <button id="btnComfirm" class="lynx_button btn btn-primary" type="submit">Thay đổi Thông tin cá nhân</button>
                </div>
            </div>
        </div>
</div> 