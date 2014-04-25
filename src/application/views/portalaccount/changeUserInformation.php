<div class="lynx_contentWarp lynx_staticWidth">
        <?php require_once APPPATH.'views/portalaccount/leftMenuAccount.php';?>
        <div class="lynx_row-right">
            <form method="post" style="text-align: left;">
                <?php
                    if(isset($errormsg))
                    {
                        echo $errormsg;
                    } 
                ?>
                <div>
                 HỌ VÀ TÊN ĐỆM :  <input name="txtFristname" type="text" value="<?php echo $fristName;?>"/>
                </div>
                <div>
                 TÊN : <input name="txtLastName" type="text" value="<?php echo $lastName;?>"/>
                </div>
                <div>
                 DOB : <input name="txtDOB" type="text" value="<?php echo $dob;?>"/>
                </div>
                <div>
                 SEX : 
                    <select  name='sex' type="text"  >
                        <option value="M" <?php if($sex == 'M') echo 'selected';?>>MALE</option>
                        <option value="F" <?php if($sex == 'F') echo 'selected';?> >FAMALE</option>
                        <option value="O" <?php if($sex == 'O') echo 'selected';?> >OTHER</option>
                    </select> 
                </div>
                <div>
                    <button name="btnComfirm" value="" >Thay đổi thông tin</button>
                </div>
            </form>
        </div>
</div> 