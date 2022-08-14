<?php 
    self::$fileLayout = "LayoutTrangTrong.php";
?>
<div class="main-login js-main-login">
            <div class="login-content js-login-content">
                <div class="login-header">
                    <h3>Đăng nhập</h3>
                    <div class="close-login">
                        <i class="fa-solid fa-circle-xmark"></i>
                    </div>
                </div>
                <div class="login-center">
                    <form action="index.php?controller=account&action=loginPost" method="POST" class="ajax-login">
                        <span class="notify" ></span>
                        <div class="form-group">
                            <input  type="text" placeholder="Email/Sđt" required name="user" id="input-login">
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="Mật Khẩu" required name="password" id="input-login">
                        </div>
                        <div class="form-group action-group">
                            <div class="checkbox-remember">
                                 <input type="checkbox" name="" id="" class="remember-password">
                                 <span>Nhớ mật khẩu</span>
                             </div>
                            <a href="">Quên mật khẩu</a>
                        </div>
                        <button type="submit" name="submit" class="btn-login" >Đăng Nhập</button>
                        <div class="text-group">
                            Bạn chưa có tài khoản? <a href="index.php?controller=account&action=register">Đăng ký</a>
                        </div>
                        <?php if(isset($_GET["notify"]) && $_GET["notify"] == "error" ||$_GET["notify"] == "error-password"): ?>
                              <p class="notify-error" style="display: block;position:absolute;top:20px;left:50%;transform:translateX(-50%);padding:10px 20px;background-color: red;font-size:16px;color:white;margin:0 auto;border-radius:5px" >Tài khoản hoặc mật khẩu không chính xác!</p>
                        <?php elseif(isset($_GET["notify"]) && $_GET["notify"] == "vet-email"): ?>
                            <p class="notify-error" style="display: block;position:absolute;top:20px;left:50%;transform:translateX(-50%);padding:10px 20px;background-color: #70B029;font-size:16px;color:white;margin:0 auto;border-radius:5px" >Vào mail để xác thực tài khoản!</p>
                            <?php elseif(isset($_GET["notify"]) && $_GET["notify"] == "error-token"): ?>
                            <p class="notify-error" style="display: block;position:absolute;top:20px;left:50%;transform:translateX(-50%);padding:10px 20px;background-color: red;font-size:16px;color:white;margin:0 auto;border-radius:5px" >Tài khoản của bạn chưa được xác thực!</p>
                            <?php elseif(isset($_GET["notify"]) && $_GET["notify"] == "success-email"): ?>
                            <p class="notify-error" style="display: block;position:absolute;top:20px;left:50%;transform:translateX(-50%);padding:10px 20px;background-color: #70B029;font-size:16px;color:white;margin:0 auto;border-radius:5px" >Xác thực tài khoản thành công!</p>
                            <?php elseif(isset($_GET["notify"]) && $_GET["notify"] == "error-email"): ?>
                            <p class="notify-error" style="display: block;position:absolute;top:20px;left:50%;transform:translateX(-50%);padding:10px 20px;background-color: red;font-size:16px;color:white;margin:0 auto;border-radius:5px" >Xác thực tài khoản thất bại!</p>
                            <?php elseif(isset($_GET["notify"]) && $_GET["notify"] == "dup-email"): ?>
                            <p class="notify-error" style="display: block;position:absolute;top:20px;left:50%;transform:translateX(-50%);padding:10px 20px;background-color: red;font-size:16px;color:white;margin:0 auto;border-radius:5px" >Tài khoản đã được xác thực!</p>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>