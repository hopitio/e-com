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
Trân trọng cảm ơn!<br/>
<br/>
<br/>
Công ty TNHH Hoàng Quân<br/>
(Địa chỉ)………..<br/>
SDT: 090 770 4437/ 09xxxxxxxx<br/>
Website: www.sfriendly.vn<br/>
