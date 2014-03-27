<div class="contentWarp wStaticPx">
    <div class="leftContent box">
        <form id="resg" action='/portal/register' method="post">
            <h3> <?php echo $language[$view->view]->registeTitle;?></h3>
            <form method='post'>
                <div class="row"> <span><?php echo $language[$view->view]->lblEmail;?> </span> <input name='username' type="text" /> </div>
                <div class="row"> <span><?php echo $language[$view->view]->lblPassword;?> </span> <input name='password' type="password" /> </div>
                <div class="row"> <span><?php echo $language[$view->view]->lblPasswordRetry;?> </span> <input name='passwordRetry' type="password" /> </div>
                <div class="row"> <span><?php echo $language[$view->view]->lblCreateFristName;?> </span> <input name='fristName' type="text" /> <?php echo $language[$view->view]->lblCreateLastName;?> <input name='lastName' type="text" /> </div>
                <div class="row">  </div>
                <div class="row"> <span><?php echo $language[$view->view]->lblDOB;?> </span>  <input name='dob' type="text"  data-role="date"/> </div>
                <div class="row"> 
                    <span><?php echo $language[$view->view]->lblSex;?> </span> 
                    <select  name='sex' type="text" >
                        <option value="M"><?php echo $language[$view->view]->lblSexM;?></option>
                        <option value="F"><?php echo $language[$view->view]->lblSexF;?></option>
                        <option value="O"><?php echo $language[$view->view]->lblSexO;?></option>
                    </select> 
                </div>
                <div class="contract box" >
                    1. CHẤP NHẬN CÁC ĐIỀU KHOẢN 

Chào mừng quý khách đến với Yahoo. Yahoo Asia Pacific Pte. Ltd. (Giấy Đăng ký Công ty số 199700735D) (“chúng tôi” và "chúng ta", tùy theo từng trường hợp) cung cấp Dịch Vụ (như được định nghĩa dưới đây) cho quý khách, tùy thuộc vào các Điều Khoản Dịch Vụ sau đây ("ĐKDV"). ĐKDV này được áp dụng ngay cả khi quý khách không có tài khoản Yahoo và việc quý khách sử dụng dịch vụ Yahoo nghĩa là quý khách chấp nhận ĐKDV này. Tại từng thời điểm, chúng tôi có thể cập nhật ĐKDV theo quyết định của mình mà không cần thông báo cho quý khách, bao gồm cả bằng việc công bố các thay đổi trên hoặc thông qua Dịch Vụ, và quý khách đồng ý rằng việc quý khách tiếp tục sử dụng Dịch Vụ sau khi ĐKDV được cập nhật hoặc thay đổi cấu thành sự chấp nhận và đồng ý của quý khách đối với việc bị ràng buộc bởi ĐKDV đã được cập nhật hoặc sửa đổi. Quý khách chịu trách nhiệm đối với việc đảm bảo rằng quý khách hiểu đầy đủ phiên bản ĐKDV mới nhất vào mọi thời điểm, và quý khách có thể truy cập vào phiên bản hiện hành vào bất cứ thời điểm nào tại: https://info.yahoo.com/legal/vn/yahoo/utos/terms/. Ngoài ra, khi sử dụng các dịch vụ cụ thể thuộc sở hữu hoặc điều hành bởi Yahoo, quý khách và Yahoo tại từng thời điểm sẽ phải tuân theo các chỉ dẫn và quy định được đăng tải áp dụng cho các dịch vụ đó mà các chỉ dẫn hoặc quy định đó có thể được đăng tải theo từng thời điểm. Tất cả các chỉ dẫn hoặc quy định đó (bao gồm nhưng không giới hạn ở Chính Sách Quyền Riêng Tư và Chính Sách Quyền Sở Hữu Trí Tuệ của chúng tôi, mà chúng có thể được cập nhật theo từng thời điểm bằng cách đăng tải trên website này) và tại đây, chúng được kết hợp vào ĐKDV này bằng việc dẫn chiếu. Trong đa số các trường hợp, các chỉ dẫn và quy định là đặc thù cho các phần cụ thể của Dịch Vụ và sẽ giúp quý khách áp dụng ĐKDV cho phần cụ thể đó, nhưng trong trường hợp có sự không thống nhất giữa ĐKDV với bất cứ quy định hoặc chỉ dẫn nào, ĐKDV sẽ có hiệu lực áp dụng. Yahoo và/hoặc các công ty cổ phần, công ty mẹ, công ty con và các công ty liên quan của Yahoo cũng có thể cung cấp các dịch vụ khác mà chúng được điều chỉnh bởi các Điều Khoản Dịch Vụ khác, thì trong các trường hợp đó, ĐKDV này không được áp dụng cho các dịch vụ khác đó, nếu và trong phạm vi được loại trừ một cách rõ ràng bởi các Điều Khoản Dịch Vụ khác đó.
                </div>
                <div class="row">
                    <button title="Search" class="button"><span><span><?php echo $language[$view->view]->btnResg;?></span></span></button>
                </div>
            </form>
        </form>
    </div>
    <div class="rightContent box">
        <form id="login" method="post">
            <h3> <?php echo $language[$view->view]->loginTitle;?></h3>
            <?php if(isset($error)){
                echo '<h4> <i class="fa fa-comment"></i>'.$error.'</h4>';
            }?>
            <h2> <?php echo $language[$view->view]->lblUs;?></h2>
            <input name='txtUs' type="text">
            <h2> <?php echo $language[$view->view]->lblPs;?></h2>
            <input name='txtPw' type="password">
            <button title="Search" class="button"><span><span><?php echo $language[$view->view]->btnLogin;?></span></span></button>
            <a href="#"><?php echo $language[$view->view]->lblForgetPassword;?></a>
            <a href="#"><?php echo $language[$view->view]->lblCreateNewAccount;?></a>
            
            <a href="#"><img src="/images/Social_signin_facebook.png" /></a>
            <a href="#"><img src="/images/Social_signin_google.png" /></a>
            
            <input name='postUrlCaller' type="hidden" value='<?php echo $postUrlCaller;?>'>
            <input name='postUrlTarget' type="hidden" value='<?php echo $postUrlTarget;?>'>
        </form>
    </div>
</div> 