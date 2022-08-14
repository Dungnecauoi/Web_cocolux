<?php 
    self::$fileLayout = "LayoutTrangTrong.php";
?>
<?php
    function modelGetStar($product_id,$star)
    {
        $conn = Connection::connectDB();
        $queryStar = $conn->query("select id from rating where product_id=$product_id and star=$star");
        return $queryStar->rowCount();
    }
?>
<main>
           <div class="row">
               <div class="breadcumb-wrap">
                   <ol>
                       <li><a href="">
                        <i class="fa-solid fa-house-chimney"></i>   
                        Trang Chủ</a></li>
                       <li><a href="">Danh Mục</a></li>
                       <li><a href="">Trang Điểm - Makeup</a></li>
                       <li><a href="">Kem lót - Makeup primer</a></li>
                       <li><a href="">Kem Lót SilkyGirl Instant Pore Fix Primer 01 Natural</a></li>
                   </ol>
               </div>
               
               <!-- singger product  -->
               
               <div class="product-singer">
                    <div class="product-singer-left">
                        <div style="max-height: 460px;overflow:hidden" class="tab-product-info">
                            <div class="tab-product-info-left">
                                <div class="product-images-group">
                                    <div style="overflow:auto;max-height: 460px" class="product-images">
                                    <?php foreach($dataAlbumPhoto as $rows): ?>
                                    <a style="overflow: unset;" href="">
                                        <img src="assets/upload/products/<?php echo $rows->photo ?>" alt="">
                                    </a>
                                    <?php endforeach; ?>
                                    </div>
                                    <div class="zoom-image">
                                        <img src="./assets/upload/products/<?php echo $record->photo ?>" alt="">
                                    </div>
                                </div>
                                <div class="list-button-group">
                                    <div class="button-item">
                                        <a href="">
                                          <i class="fa-solid fa-share"></i>
                                        </a>
                                    </div>
                                    <div class="button-item">
                                        <a href="">
                                            <i class="fa-solid fa-heart"></i>
                                            <span>Thêm vào yêu thích</span>
                                        </a>
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="tab-product-info-right">
                                <?php
                                    $conn = Connection::connectDB();
                                    $queryBrand = $conn->query("select * from brands where id={$record->brand_id}");
                                    $brands = $queryBrand->fetchAll(PDO::FETCH_OBJ);
                                ?>
                                <?php foreach($brands as $brand):?>
                                <div class="product-brand"><?php echo $brand->name ?></div>
                                <?php endforeach; ?>
                                <div class="product-name">
                                    <h1><?php echo $record->name ?></h1>
                                </div>
                                <div class="product-sub-info">
                                    <div class="product-sub-info--item">
                                        <div class="quicklink">0 đánh giá</div>
                                    </div>
                                    <div class="product-sub-info--item">
                                        <div class="quicklink">0 hỏi đáp</div>
                                    </div>
                                    <div class="product-sub-info--item">
                                        <div class="quicklink">Mã sản phẩm: 123456</div>
                                    </div>
                                </div>
                                <?php if($record->discount > 0): ?>
                                <p class="product-price"><?php echo number_format($record->price - ($record->price * $record->discount)/100) ?> đ
                                    <span>(Đã bao gồm VAT)</span>
                                </p>
                                <div class="product-discount">
                                    <span>Giá hãng:</span>
                                    <span><?php echo number_format($record->price) ?>đ</span>
                                    <span>- Tiết kiệm được <?php echo number_format(($record->price * $record->discount)/100) ?> Đ</span>
                                    <span>(<?php echo $record->discount ?>%)</span>
                                </div>
                                <?php else: ?>
                                    <p class="product-price"><?php echo number_format($record->price) ?> đ
                                     <span>(Đã bao gồm VAT)</span>
                                     </p>
                                <?php endif; ?>
                                <div class="product-type">
                                    <a href="">
                                        <img src="../assets/images/1634263956154-kem-lot-silkygirl-instant-pore-fix-primer-01-natural-300x300.jpeg" alt="">
                                    </a>
                                </div>
                                <?php if($record->quantity >= 1): ?>
                                <form action="" method="post">
                                <div class="product-quantity">
                                    <span>Số lượng :</span>
                                    <input type="number" name="product_<?php echo $product['id']; ?>"  value="1" min="1" max="<?php echo $record->quantity  ?>">
                                </div>
                                </form>
                                <?php else: ?>
                                    <div class="product-quantity">
                                        <span style="color:red;font-size:1.6rem">Hết Hàng</span>
                                    </div>
                                <?php endif; ?>
                                <?php if(isset($_GET["notify"]) && $_GET["notify"] == "error-quantity"): ?>
                                <p class="notify-order-success" style="display: block;position:absolute;top:50%;left:50%;transform:translateX(-50%);padding:10px 20px;background-color:cadetblue;font-size:16px;color:white;margin:0 auto;border-radius:5px" >Số lượng của bạn đặt đã tối đa!</p>
                                <?php endif; ?>
                                <?php if($record->quantity <= 0): ?>
                                <div class="product-button-group">
                                    <button  disabled style="opacity: 0.5;"  onclick="window.location.href='index.php?controller=cart&action=create&id=<?php echo $record->id ?>'" class="btn-item btn-black">
                                        <!-- <img src="./assets/Fontend/assets/images/cart-singer.svg" alt=""> -->
                                        <span>Tạm hết hàng</span>
                                    </button>
                                    <button class="btn-item btn-red" <?php if($record->quantity <= 0): ?> disabled style="opacity: 0.1;" <?php endif; ?> onclick="window.location.href='index.php?controller=cart&action=createNow&id=<?php echo $record->id ?>'">
                                        <img src="../assets/images/ic-white-cart.svg" alt="">
                                        <span>Mua ngay</span>
                                    </button>
                                </div>
                                <?php else: ?>
                                    <div class="product-button-group">
                                    <button  onclick="window.location.href='index.php?controller=cart&action=create&id=<?php echo $record->id ?>'" class="btn-item btn-black">
                                        <img src="./assets/Fontend/assets/images/cart-singer.svg" alt="">
                                        <span>Giỏ hàng</span>
                                    </button>
                                    <button class="btn-item btn-red" onclick="window.location.href='index.php?controller=cart&action=createNow&id=<?php echo $record->id ?>'">
                                        <img src="../assets/images/ic-white-cart.svg" alt="">
                                        <span>Mua ngay</span>
                                    </button>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="tab-info-content">
                            <div class="tab-info-content-nav">
                                <ul>
                                    <li><a href="#info">Thông tin sản phẩm</a></li>
                                    <li><a href="#user-manual">Hướng dẫn sử dụng</a></li>
                                    <li><a href="">Đánh giá</a></li>
                                    <li><a href="">Hỏi đáp</a></li>
                                </ul>
                            </div>
                            <div class="tab-info-content-product">
                                <div class="title-content"></div>
                                    <div id="info" class="content-description">
                                       <?php echo $record->content ?>
                                    </div>

                            </div>
                        </div>
                        <div id="user-manual" class="user-manual">
                            <div class="title-content">Hướng dẫn sử dụng</div>
                            <div class="user-manual-content">
                                <p>Lấy lượng vừa đủ sản phẩm khoảng 1-2 hạt đậu.</p>
                                <p>Nhẹ nhàng apply lên các khu vực có nhiều khuyết điểm.</p>
                                <p>Dùng tay sạch nhẹ nhàng tán đều sản phẩm.</p>
                                <p>Tiếp tục bước trang điểm nền hằng ngày.</p>
                            </div>
                        </div>
                        <div class="tab-product-feedback">
                            <div class="rating--box">
                                <div class="rating--box_point">
                                    <span>Đánh giá trung bình</span>
                                    <span class="raing-total-point">0</span>
                                </div>
                                <div class="rating--box_process">
                                    <div class="process-line">
                                        <span>5 sao</span>
                                        <div class="countbar">
                                            <span style="width:<?php  echo modelGetStar($record->id,5) ?>% ;" class="count-value"></span>
                                        </div>
                                        <div class="point">
                                            <span><?php echo modelGetStar($record->id,5) ?></span>
                                            <span>Rất hài lòng</span>
                                        </div>
                                    </div>
                                    <div class="process-line">
                                        <span>4 sao</span>
                                        <div class="countbar">
                                            <span style="width:<?php  echo modelGetStar($record->id,4) ?>% ;" class="count-value"></span>
                                        </div>
                                        <div class="point">
                                            <span><?php echo modelGetStar($record->id,4) ?></span>
                                            <span>hài lòng</span>
                                        </div>
                                    </div>
                                    <div class="process-line">
                                        <span>3 sao</span>
                                        <div class="countbar">
                                            <span style="width:<?php  echo modelGetStar($record->id,3) ?>% ;" class="count-value"></span>
                                        </div>
                                        <div class="point">
                                            <span><?php echo modelGetStar($record->id,3) ?></span>
                                            <span>Bình thường</span>
                                        </div>
                                    </div>
                                    <div class="process-line">
                                        <span>2 sao</span>
                                        <div class="countbar">
                                            <span style="width:<?php  echo modelGetStar($record->id,2) ?>% ;" class="count-value"></span>
                                        </div>
                                        <div class="point">
                                            <span><?php echo modelGetStar($record->id,2) ?></span>
                                            <span>Không hài lòng</span>
                                        </div>
                                    </div>
                                    <div class="process-line">
                                        <span>1 sao</span>
                                        <div class="countbar">
                                            <span style="width:<?php  echo modelGetStar($record->id,1) ?>% ;" class="count-value"></span>
                                        </div>
                                        <div class="point">
                                            <span><?php echo modelGetStar($record->id,1) ?></span>
                                            <span>Rất tệ</span>
                                        </div>
                                    </div>
                                </div>
                                
                                    <form style="display:flex;flex-direction:column" class="share-comment" action="index.php?controller=products&action=comment&id=<?php echo $record->id ?>" method="post">
                                        <p>chia sẻ cảm nghĩ của bạn về sản phẩm</p>
                                        <textarea   <?php if(isset($_SESSION['customer_name']) == false): ?> style="color:black;text-align:center;padding:20px 10px"<?php endif; ?>  class="comment"  <?php if(isset($_SESSION['customer_name']) == false): ?>disabled placeholder="Đăng nhập để bình luận" <?php endif; ?> id=""  cols="30" rows="10" name="comment"></textarea>
                                        <button type="submit" <?php if(isset($_SESSION['customer_name']) == false): ?>disabled  <?php endif; ?> class="btn-comment">Viết bình luận</button>
                                        </form>
                            </div>
                            <div class="tab-content--attribute">
                                <span>Đánh giá sản phẩm</span>
                                <div class="rating">
                                    <div class="star">
                                        <a href="index.php?controller=products&action=rating&id=<?php echo $record->id ?>&star=1"><i class="fa-solid fa-star"></i></a>
                                        <a href="index.php?controller=products&action=rating&id=<?php echo $record->id ?>&star=2"><i class="fa-solid fa-star"></i></a>
                                        <a href="index.php?controller=products&action=rating&id=<?php echo $record->id ?>&star=3"><i class="fa-solid fa-star"></i></a>
                                        <a href="index.php?controller=products&action=rating&id=<?php echo $record->id ?>&star=4"><i class="fa-solid fa-star"></i></a>
                                        <a href="index.php?controller=products&action=rating&id=<?php echo $record->id ?>&star=5"><i class="fa-solid fa-star"></i></a>
                                    </div>
                                </div>
                            </div>
                                <div class="box-show-comment" style="background-color:#F7F7F7;border-radius:5px;box-shadow:0 0 5px 0 rgba(0,0,0,20%);padding:10px 20px" >
                                        <div class="box-show-comment-header" style="border-bottom:1px solid red;font-size:2rem;padding:10px 20px">
                                            Đánh giá của khách hàng
                                        </div>
                                            <ul>
                                                <?php foreach($dataComment as $rows): ?>
                                                <?php 
                                                    $conn = Connection::connectDB();
                                                    $query = $conn->query("select * from customers where id = {$rows->customers_id}");
                                                    $nameUser = $query->fetchAll(PDO::FETCH_OBJ);
                                                    ?>
                                                <div class="item-comment">
                                                    <?php foreach($nameUser as $row): ?>
                                                    <li class="user-comment"><i class="fa-solid fa-location-arrow"></i><?php echo $row->name ?></li>
                                                    <?php endforeach ?>
                                                    <li class="content-comment"><?php echo $rows->comment_content  ?></li>
                                                </div>
                                                <?php endforeach; ?>
                                            </ul>
                                                <style>
                                                    .user-comment i
                                                    {
                                                        transform: rotate(45deg);
                                                        margin-right: 5px;
                                                    }
                                                    .user-comment
                                                    {
                                                        color: #a21414;
                                                        font-weight: 500;
                                                    }
                                                    .item-comment{
                                                        border-bottom: 2px solid #fff;
                                                        padding: 10px;
                                                    }
                                                    .item-comment li 
                                                    {
                                                        font-size: 1.6rem;
                                                    }
                                                    .box-show-comment ul 
                                                    {
                                                        list-style: none;
                                                    }
                                                    .content-comment
                                                    {
                                                        padding:0 50px;
                                                        background-color: #F7F7F7;
                                        
                                                    }
                                                    .comment
                                                    {
                                                        padding: 10px 20px;
                                                    }
                                                </style>
                                </div>
                    </div>
                                
                 </div>
                 <div class="product-singer-right">
                        <div class="tab-delivery">
                            <div class="tab-delivery-item">
                                <div class="tab-delivery-item-title">
                                    <h4>Sản phẩm cùng thương hiệu</h4>
                                </div>
                                <div style="width:100%;" class="card pa-x-5">
                                    <div class="card-top">
                                        <div class="discount-tag">
                                            <span>-9%</span>
                                        </div>
                                        <div class="thumbnail">
                                            <a href="">
                                                <img src="../assets/images/1633747047371-kem-lot-silkygirl-instant-pore-fix-primer-01-natural-200x200.jpeg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-bottom">
                                        <div class="price-section">
                                            <div class="public-price">
                                                151.060 đ
                                            </div>
                                            <div class="origin-price">
                                                166.000 đ
                                            </div>
                                        </div>
                                        <div class="brand">COCOLUX</div>
                                        <h3 class="title">Kem Lót SilkyGirl Instant Pore Fix Primer 01 Natural</h3>
                                    </div>
                                </div>
                                <div class="more">
                                    <a href="">Xem thêm</a>
                                </div>
                            </div>  
                        </div>
                        <!-- sp cùng loại  -->
                        <div class="tab-delivery">
                            <div class="tab-delivery-item">
                                <div class="tab-delivery-item-title">
                                    <h4>Sản phẩm cùng loại</h4>
                                </div>
                                <div style="width:100%" class="card pa-y-5 pa-x-5">
                                    <div class="card-top">
                                        <div class="discount-tag">
                                            <span>-9%</span>
                                        </div>
                                        <div class="thumbnail">
                                            <a href="">
                                                <img src="../assets/images/1651220716360-kem-lot-dau-mac-prep-300x300.jpeg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-bottom">
                                        <div class="price-section">
                                            <div class="public-price">
                                                1.000.000 đ
                                            </div>
                                        </div>
                                        <div class="brand">COCOLUX</div>
                                        <h3 class="title">Kem Lót Dạng Dầu M.A.C Prep+Prime Essential Oils Hules Essentielles (14ml)</h3>
                                    </div>
                                </div>
                                <!-- 2 -->
                                
                                <div class="more">
                                    <a href="">Xem thêm</a>
                                </div>
                            </div>
                            
                            
                        </div>
                 </div>
               </div>

               
           </div> 
            
        </main>
