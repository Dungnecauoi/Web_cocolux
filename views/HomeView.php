<?php
    self::$fileLayout = "LayoutTrangChu.php";
?>
 <main>
            <div class="row">
                <div class="home-web-wrap">
                    <div class="home-web-content">
                        <div class="web-content-right">
                            <div class="baner-content-wrap">
                                <div class="banner-content-wrap-left">
                                <?php foreach($slider as $slider): ?>
                                   <a class="item-slider" style="height:350px" href="">
                                    <img src="./assets/upload/sliders/<?php echo $slider->photo ?>" alt="">
                                   </a>
                                   <?php endforeach; ?>
                                </div>
                                <div class="banner-content-wrap-right">
                                    <div class="slide-banner">
                                        <a href="">
                                            <img src="./assets/Fontend/assets/images/banner-web-398-x-172-1.png" alt="">
                                        </a>
                                        <a href="">
                                            <img src="./assets/Fontend/assets/images/banner-web-398-x-172-2.png" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    <!-- nav menu  -->
                    <div class="mobile-cate"></div>
                    <div class="category-mobie-nav">
                        <ul class="nav-item">
                            <li class="item-list">
                                <i class="fa-solid fa-bars"></i>
                                <span class="item-title">Danh mục</span>
                            </li>
                            <li>
                                <a href="">
                                    <img src="./assets/Fontend/assets/images/navmenu-trang-điểm-100x100.jpeg" alt="">
                                    <span>Trang điểm - makeup</span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="./assets/Fontend/assets/images/navmenu-son-môi-100x100.jpeg" alt="">
                                    <span>son môi - lips</span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="./assets/Fontend/assets/images/navmenu-chăm-sóc-da-100x100.jpeg" alt="">
                                    <span>Chăm sóc da - skincare</span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="./assets/Fontend/assets/images/navmenu-Chăm-sóc-cơ-thể-100x100.jpeg" alt="">
                                    <span>Chăm sóc cơ thể - Bodycare</span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="./assets/Fontend/assets/images/navmenu-chăm-sóc-tóc-100x100.jpeg" alt="">
                                    <span>Chăm sóc tóc - Haircare</span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="./assets/Fontend/assets/images/navmenu-dụng-cụ-100x100.jpeg" alt="">
                                    <span>Dụng cụ - Tools - Brushes</span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="./assets/Fontend/assets/images/navmenu-nuochoa-100x100.jpeg" alt="">
                                    <span>Nước hoa - Perfume</span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="./assets/Fontend/assets/images/navmenu-mp-highend-100x100.jpeg" alt="">
                                    <span>Mỹ phẩm High-End</span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="./assets/Fontend/assets/images/navmenu-sp-khác-100x100.jpeg" alt="">
                                    <span>Sản phẩm khác - Others</span>
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                    <!-- product  -->
                    
                    <!-- sản phẩm hot  -->
                    <div class="space-50"></div>
                    <div class="bg__white">
                        <div class="section">
                            <div class="section__header">
                                <h2 class="section-title">Sản phẩm hot</h2>
                                <a href="san-pham-hot" class="section-show-more">Xem tất cả</a>
                            </div>
                            <div class="section__body">
                                <?php foreach($hotProduct as $rows): ?>
                                <div class="card p5">
                                    <div class="card-top">
                                    <?php if($rows->discount > 0 ): ?>
                                        <div class="discount-tag">
                                            <span><?php echo $rows->discount ?>%</span>
                                        </div>
                                        <?php endif ?>
                                        <a href="san-pham/<?php echo Unicode::removeUnicode($rows->name) ?>/<?php echo $rows->id ?> " class="thumbnail">
                                            <img src="./assets/upload/products/<?php echo $rows->photo ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="card-bottom">
                                        <div class="price-section">
                                            <?php if($rows->discount > 0): ?>
                                            <div class="public-price"><?php echo number_format($rows->price - ($rows->price * $rows->discount)/100) ?> đ</div>
                                            <div class="origin-price"><?php echo number_format($rows->price)?>đ</div>
                                            <?php else: ?>
                                            <div class="public-price"><?php echo number_format($rows->price)?>đ</div>
                                            <?php endif; ?>
                                        </div>
                                        <?php
                                            $conn = Connection::connectDB();
                                            $query = $conn->query("select * from brands where id={$rows->brand_id}");
                                            $brands = $query->fetchAll(PDO::FETCH_OBJ);
                                        ?>
                                        <?php foreach($brands as $brand): ?>
                                        <p class="brand"><?php echo $brand->name  ?></p>
                                        <?php endforeach; ?>
                                        <h3 class="title"><?php echo $rows->name ?></h3>
                    
                                    </div>
                                </div> 
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <div class="space-50"></div>
                        <div class="bg__white">
                            <div class="section">
                                <div class="section__header">
                                    <h2 class="section-title color-black">Thương hiệu nổi bật</h2>
                                    <a href="" class="section-show-more">Xem tất cả</a>
                                </div>
                                <div class="css-brand-items">
                                <?php foreach($brandsHot as $rowsBrand): ?>
                                    <div class="brand-item">
                                        <a href="thuong-hieu/<?php echo Unicode::removeUnicode($rowsBrand->name) ?>/<?php echo $rowsBrand->id ?>">
                                            <img class="logo-brand" src="./assets/upload/brands/<?php echo $rowsBrand->photo  ?>" alt="">
                                            <h5 class="name-brand"><?php echo $rowsBrand->name ?></h5>
                                        </a>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                                </div>
                            </div>
            </div>
            <div class="row">
                            <div class="poster-shop">
                                <div href="" class="poster-items">
                                    <a href="">
                                        <img src="./assets/Fontend/assets/images/1641172208983-poster1-600x600.jpeg" alt="" class="poster-item-brand">
                                    </a>
                                <a href="">
                                    <img src="./assets/Fontend/assets/images/1641172220341-poster-nuoc-hoa-600x600.jpeg" alt="" class="poster-item-brand">

                                </a>  
                            </div>  
                        </div>
                        <!-- bg product-brand  -->
                        
                        <?php foreach($categories as $rows): ?>
                           
                       <div class="space-50"></div>
                        <div class="bg__white">
                            <div class="section">
                                <div class="section__header bg__gray">
                                    <h2 class="section-title title-header-makeup lg-2">
                                        <a href="" class="color-light"><?php echo $rows->name ?></a>
                                        <span></span>
                                    </h2>
                                    <ul class="nav-makeup">
                                        <li><a href="">Kem lót - Makeup primer</a></li>
                                        <li><a href="">Kem nền - BB - CC</a></li>
                                        <li><a href="">Phấn nước - Cushion</a></li>
                                        <li><a href="">Che khuyết điểm - Concealer</a></li>
                                    </ul>
                                    <a href="danh-muc/<?php echo Unicode::removeUnicode($rows->name) ?>/<?php echo $rows->id ?>" class="section-show-more">Xem thêm</a>
                                </div>
                                <div class="section-content">
                                    <a class="section-content-left">
                                        <img src="./assets/upload/categories/<?php echo $rows->photo_colum ?>" alt="">
                                    </a>
                                    <div class="section-content-right">
                                        <!-- 1 -->
                                        <?php
                                            $conn = Connection::connectDB();
                                            $queryProducts = $conn->query("select * from products where category_id in (select id from categories where id = $rows->id or parent_id = $rows->id)");
                                            $products = $queryProducts->fetchAll(PDO::FETCH_OBJ);
                                        ?>
                                        <?php foreach($products as $rowsProduct): ?>
                                        <div class="card p5">
                                            <div class="card-top">
                                                <div class="discount-tag">
                                                    <span> <?php if(isset($rowsProduct->discount) && $rowsProduct->discount > 0):?> <?php echo $rowsProduct->discount ?>% <?php endif; ?></span>
                                                </div>
                                                <a href="san-pham/<?php echo Unicode::removeUnicode($rows->name) ?>/<?php echo $rowsProduct->id ?> " class="thumbnail">
                                                    <img src="./assets/upload/products/<?php echo $rowsProduct->photo ?>" alt="">
                                                </a>
                                            </div>
                                            <div class="card-bottom">
                                                <div class="price-section">
                                                    <div class="public-price"><?php echo number_format($rowsProduct->price - ($rowsProduct->price * $rowsProduct->discount)/100) ?>đ</div>
                                                    <div class="origin-price"><?php echo number_format($rowsProduct->price) ?></div>
                                                </div>
                                                <p class="brand"><?php echo $rowsProduct->name ?></p>
                                                <h3 class="title"><?php echo $rowsProduct->description ?></h3>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                        <!-- 2 -->
                                         <!-- 10 -->
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <?php endforeach; ?>
                        <!-- phần 2 -->
                       
                            <div class="space-50"></div>
                            <div class="category-sub-baner">
                                <a href="" class="col-4">
                                    <img src="./assets/Fontend/assets/images/1642040388948-banner-cocolux-5.jpeg" alt="">
                                </a>
                                <a href="" class="col-4">
                                    <img src="./assets/Fontend/assets/images/1642040393768-banner-cocolux-6.jpeg" alt="">
                                </a>
                                <a href="" class="col-4">
                                    <img src="./assets/Fontend/assets/images/1642040399279-banner-cocolux-12.jpeg" alt="">
                                </a>
                            </div>
                         </div>
                        


                        <!-- new  -->
                        <div class="space-50"></div>
                        <div class="section">
                            <div class="section__header">
                                <h2 class="section-title">Tin Tức</h2>
                                <a href="tin-tuc" class="section-show-more">Xem tất cả</a>
                            </div>
                            <?php
                                $conn = Connection::connectDB();
                                $query = $conn->query("select * from news order by id desc limit 0,4");
                                $news = $query->fetchAll(PDO::FETCH_OBJ);
                            ?>
                                <div class="grid-row">
                                    <?php foreach($news as $new): ?>
                                    <a style="text-decoration: none;" href="tin-tuc/<?php echo Unicode::removeUnicode($new->title) ?>/<?php echo $new->id ?>" class="grid-item">
                                        <div class="main-item">
                                            <img src="./assets/upload/news/<?php echo $new->photo ?>" alt="">
                                        </div>
                                        <div class="sub-item-content">
                                            <span><?php echo $new->title ?></span>
                                        </div>
                                    </a>
                                    <?php endforeach; ?>
                                    
                                </div>
                        </div>
            </div>
        </main>