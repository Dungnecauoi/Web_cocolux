<?php 
    self::$fileLayout = "LayoutTrangTrong.php";
?>
<style>
    .thumbnail
    {
        width: 100px;
    }
    .card
    {
        display: flex;

    }
    .card-bottom
    {
        display: flex;
    }
    .left-title .quantity
    {
        margin-top: 10px;
    }
</style>
<main>
    <form action="index.php?controller=cart&action=checkout" method="post">
        <div class="cart--pay-wrapper">
            <div class="cart--pay-wrapper-left">
                <div class="cart--pay-header">
                    <span>Thông tin nhận hàng</span>
                </div>
                <div class="cart--pay-content">
                
                    <div class="form-group">
                            <label for="name">Họ Tên</label>
                            <input type="text" required name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label for="phone">Số Điện Thoại</label>
                            <input type="number" required name="phone" id="phone">
                        </div>
                        <div class="form-group">
                            <label for="address">Địa Chỉ</label>
                            <input type="text" required name="address" id="address">
                        </div>
                        <div class="form-group">
                            <label for="note">ghi chú</label>
                            <textarea name="note" id="note" cols="30" rows="10"></textarea>
                        </div>
                </div>
                <div class="cart--pay-select">
                    <input type="radio" name="pay" checked value="cod"> <span> toán khi nhận hàng (COD)</span><br>
                    <input type="radio" name="pay" value="bank"><span>Chuyển khoản:Tên tài khoản:ABC<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MB bank:1238484848</span> 
                </div>
            </div>
            <div class="cart--pay-wrapper-right">
                 <div class="cart--pay-header">
                    <span>Danh sách sản phẩm</span>
                </div>
                
                <?php foreach($_SESSION['cart'] as $products): ?>
                <div style="width:100%;height:120px;margin-bottom:10px" class="card pa-x-5">
                                    <div class="card-top">
                                        <div class="thumbnail">
                                            <a href="">
                                                <img src="assets/upload/products/<?php echo $products['photo'] ?>" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-bottom">
                                        <!-- <div class="brand">COCOLUX</div> -->
                                        <div class="left-title">
                                        <h3 class="title"><?php echo $products['name']; ?></h3>
                                        <h3 class="quantity">Số lượng:<?php echo $products['number']; ?></h3>
                                        </div>
                                        <div class="price-section">
                                            <div class="public-price">
                                                <?php echo number_format($products['price'])?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                <button class="btn-pay-cart" type="submit">Thanh Toán</button>
            </div>
        </div>
    </form>
</main>