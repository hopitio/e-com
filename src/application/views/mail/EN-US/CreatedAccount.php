<?php $key = SecurityManager::inital()->getEncrytion()->accountActiveEncrytion($user->id, $user->account, $user->date_joined);?>
Xin chào <?php echo $user->lastname;?>!<br/>
Chúc mừng bạn đã tạo tài khoản thành công tại Sfriendly.<br/>
Sau đây là thông tin về tài khoản của bạn:<br/>
Tài khoản đăng nhập: <?php echo $user->account;?><br/>
Tên hiển thị: <?php echo $user->lastname;?><br/>
Email: <?php echo $user->account;?><br/>
Vui lòng click vào : <a href="<?php echo Common::getCurrentHost()."/portal/active?k={$key}" ?>">Đây </a>để kích hoạt tài khoản.
<br/>
Bạn đã thể dùng tài khoản này để đăng nhập và sử dụng các dịch vụ của Sfriendly.<br/>
<br/>
<br/>
Trân trọng cảm ơn!<br/>
<i>Sfriendly M.D</i><br/>
<hr/>
<i>Copyright © *Sfriendly Vietnam*, All rights reserved.</i><br/>
<br/>
Check our website:<br/>
<a href="www.sfriendly.com">www.sfriendly.com</a><br/>
<a href="www.sfriendly.com">www.sfriendly.vn</a><br/>
<br/>
F: facebook/sfriendlyvietnam<br/>
E: info@sfriendly.com<br/>
A: 19/62 Trần Bình, Mai Dịch, Cầu Giấy, Hn<br/>
<br/>
This email was sent from a notification-only address that cannot accept incoming email. Please do not reply to this message.
unsubscribe from this list  <br/>
<u>update subscription</u> &nbsp;&nbsp;&nbsp;&nbsp; <u>preferences</u> 
