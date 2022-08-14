<?php 
    self::$fileLayout = "LayoutTrangTrong.php";
?>
<main>
           <div class="row">
               <div class="breadcumb-wrap">
                   <ol>
                       <li><a href="">
                        <i class="fa-solid fa-house-chimney"></i>   
                        Trang Chủ</a></li>
                       
                       <li><a href="">Giỏ hàng</a></li>
                   </ol>
               </div>
               
               <!-- cart  -->
               <div class="cart-wraper">
                   <div class="cart-title">
                       <?php 
                       $totalproduct = isset($_SESSION['cart']) ? count($_SESSION['cart']):0;
                       ?>
                       Giỏ hàng(<?php echo $totalproduct ?> sản phẩm)
                   </div>
                <form action="" method="">
                   <table class="cart-main">
                       <thead>
                           <tr>
                               <th>Sản phẩm</th>
                               <th>Giá sản phẩm</th>
                               <th>Số lượng</th>
                               <th>Thành tiền</th>
                               <th>Thao tác</th>
                           </tr>
                       </thead>
                       <tbody>
                           <?php  foreach($_SESSION['cart'] as $product): ?>
                            <?php if($_SESSION['cart'] == false): ?>
                           <tr>
                               <td colspan="5" align="center">Không có sản phẩm nào trong giỏ hàng</td>
                           </tr>
                           <?php else: ?>
                            <tr style="text-align: center;">
                                <!-- <td></td> -->
                                <td style="display:flex;flex-direction:row ;align-items:center"><img style="width:50px" src="assets/upload/products/<?php echo $product['photo'] ?>" alt=""><?php echo $product['name']; ?></td>
                                <td><?php echo number_format($product['price'] - ($product['price']*$product['discount'])/100) ?>Đ</td>
                                <td><input style="width: 40px;border: none;outline: none;" type="number" name="product_<?php echo $product['id']; ?>" min="1" max="<?php echo $quantity->quantity ?>" value="<?php echo $product["number"]; ?>" class="quantity ajax_quantity_cart"></td>
                                <td><?php echo number_format(($product['price'] - ($product['price']*$product['discount'])/100)*$product['number'] ) ?>Đ</td>
                                <td><a href="javascript:void(0)" type="button" onclick="deleteCart(<?php echo $product['id'] ?>)"><i style="font-size:20px; color:red;cursor:pointer" class="fa-solid fa-square-xmark"></i></a></td>
                            </tr>
                           <?php endif; ?>
                           <?php endforeach; ?>
                           <tr class="cart-bottom">
                                <td colspan="5">
                                    <img src="./assets/Fontend/assets/images/ic-transpoter (1).svg" alt="">
                                    <span>Miễn phí vận chuyển toàn quốc cho đơn hàng từ 3 sản phẩm ( 99k/SP)</span>
                                </td>
                           </tr>
                       </tbody>
                   </table>
                   <?php $totalCartProduct = isset($_SESSION['cart'])? count($_SESSION['cart']):0; ?>
                   <div class="action-cart">
                        <div class="cart-update">
                            <button type="submit">Cập nhật</button>
                            <button type="button" onclick="window.location.href='index.php?controller=cart&action=destroy'">xoá hết</button>
                        </div>
                        <div class="cart-pay">
                                <div class="total--cart-product">
                                    <span>Tổng tiền hàng (<?php echo $totalCartProduct ?> sản phẩm)</span>
                                    <span class="total-number"><?php echo number_format((new CartController)->cartTotal()); ?> Đ</span>
                                </div>
                                <div class="btn-cart-pay">
                                    <button type="button" onclick="window.location.href='<?php if($totalCartProduct > 0): ?>cartpay<?php else: ?>cart. <?php endif; ?>'" >Tiến Hành Đặt Hàng</button>
                                </div>
                        </div>
                    </div>
                    <?php if(isset($_GET["notify"]) && $_GET["notify"] == "success"): ?>
                              <p class="notify-order-success" style="display: block;position:absolute;top:50%;left:50%;transform:translateX(-50%);padding:10px 20px;background-color:cadetblue;font-size:16px;color:white;margin:0 auto;border-radius:5px" >Bạn đã đặt hàng thành công!</p>
                              <?php elseif (isset($_GET["notify"]) && $_GET["notify"] == "error-no-product"): ?>
                                <p class="notify-order-success" style="display: block;position:absolute;top:50%;left:50%;transform:translateX(-50%);padding:10px 20px;background-color:red;font-size:16px;color:white;margin:0 auto;border-radius:5px" >Giỏ hàng của bạn chưa có sản phẩm!!!</p>
                            <?php endif; ?>
                </form>
                </div>
            </div> 
            
</main>