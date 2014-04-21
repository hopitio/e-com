                <div class="row-fluid">
                                <div class="span4">
                                    <h4><i class="fa fa-cog"></i> Bảo mật </h4>
                                    <a href="/portal/change_password">Thay đổi mật khẩu </a><br>
                                    <a href="#">Thay đổi câu hỏi bí mật</a><br>
                                    <a href="#">Thay đổi mail thông báo</a><br/>
                                    <br/>
                                </div>
                                
                                <div class="span4">
                                    <h4><i class="fa fa-user"></i> Thông tin tài khoản</h4>
                                    <a href="/portal/change_user_information">Thay đổi thông tin cá nhân </a><br>
                                    <a href="#">Thêm địa chỉ giao hàng</a><br>
                                    <a href="#">Kiểm tra lược sử hoạt động</a><br/>
                                    <a href="#">Wishlist các subsystem</a><br>
                                    <a href="#">Pin sản phẩm</a><br>
                                    <br/>
                                </div>
                                
                                <div class="span4">
                                    <h4><i class="fa fa-user"></i> Thông tin giao dịch và mua hàng</h4>
                                        <a href="/portal/payment/history/all">Tất cả giao dịch</a><br>
                                        <a href="/portal/payment/history/<?php echo DatabaseFixedValue::ORDER_STATUS_VERIFYING?>">Giao dịch đang chờ xử lý</a><br>
                                        <a href="/portal/payment/history/<?php echo DatabaseFixedValue::ORDER_STATUS_DELIVERED?>">Đã hoàn thành</a><br>
                                        <a href="/portal/payment/history/<?php echo DatabaseFixedValue::ORDER_STATUS_ORDER_CANCELLED?>">Hủy bỏ</a><br>
                                        <a href="/portal/payment/history/<?php echo DatabaseFixedValue::ORDER_STATUS_ORDER_PLACED?>">Giao dịch chưa xử lý</a><br>
                                        <a href="/portal/payment/history/<?php echo DatabaseFixedValue::ORDER_STATUS_REJECTED?>">Giao dịch bị từ chối</a><br>
                                        <a href="/portal/payment/history/<?php echo DatabaseFixedValue::ORDER_STATUS_SHIPPING?>">Giao dịch đang chuyển hàng</a><br>
                                    <br/>
                                </div>
                </div>