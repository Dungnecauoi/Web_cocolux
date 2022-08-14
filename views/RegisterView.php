<?php 
    self::$fileLayout = "LayoutTrangTrong.php";
?>
<div class="main-register js-main-login">
            <div class="register-content js-login-content">
                <div class="register-header">
                    <h3>Tạo tài khoản</h3>
                    <div class="close-register">
                        <i class="fa-solid fa-circle-xmark"></i>
                    </div>
                </div>
                <div class="register-center">
                    <form action="index.php?controller=account&action=registerPost" method="post">
                           
                        <div class="form-group">
                            <input type="text" placeholder="Họ và tên" name="name" required id="">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="email" name="email" required id="">
                        </div>
                        <div class="form-group">
                            <input type="number" placeholder="Số điện thoại" name="phone_number" required id="">
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="Mật Khẩu" name="password" required id="">
                        </div>
                        <div class="form-group">
                            <div class="gender">
                                <div class="gender-men">
                                    <input type="radio" placeholder="Mật Khẩu" value="Nam" class="gender" name="gender" id="">
                                    <span>Nam</span>
                                </div>
                               <div class="gender-women">
                                    <input type="radio" placeholder="Mật Khẩu" value="Nũ" class="gender" name="gender" id="">
                                    <span>Nữ</span>
                               </div>
                               <div class="gender-women">
                                    <input type="radio" checked placeholder="Mật Khẩu" value="all" class="gender" name="gender" id="">
                                    <span>Other</span>
                               </div>
                            </div>
                        </div>
                        <div class="form-group action-group">
                            <div class="recevie-sale-email">
                                 <input type="checkbox" name="" id="" class="remember-password">
                                 <span>Nhận thông tin khuyến mãi qua email </span>
                             </div>
                        </div>
                        <div class="condition-shop">
                            <p>Tôi đã đọc và đồng ý thực hiện mọi giao dịch mua bán theo điều kiện sử dụng và chính sách của COCOLUX</p>
                        </div>
                        <button type="submit" class="btn-register" >Đăng Ký</button>
                        <div class="text-group returnLogin">
                            Bạn đã có tài khoản? <a href="index.php?controller=account&action=login">Đăng Nhập</a>
                        </div>
                        <?php if(isset($_GET["notify"]) && $_GET["notify"] == "error"): ?>
                              <p class="notify-error" style="display: block;position:absolute;top:20px;left:50%;transform:translateX(-50%);padding:10px 20px;background-color: red;font-size:16px;color:white;margin:0 auto;border-radius:5px" > email này đã được đang ký rồi! </p>
                            <?php elseif(isset($_GET["notify"]) && $_GET["notify"] == "success"): ?>
                            <p style="color:red; font-weight: bold;">Đăng ký thành công, click vào đăng nhập để đăng nhập tài khoản</p>
                            <?php else: ?>
                            <?php echo $mes ?>
                            <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>