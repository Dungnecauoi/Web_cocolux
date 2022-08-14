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
                       <li><a href="">Danh Mục</a></li>
                       <li><a href=""><?php echo $categoryBig->name ?></a></li>
                       <!-- <li><a href="">Kem lót - Makeup primer</a></li> -->
                   </ol>
               </div>
               <div class="web-search-wrap">
                   <div class="web-search-wrap-left">
                       <div class="web-filter-wrapper">
                            <div class="web-filter-toggel">
                                <i class="fa-solid fa-filter"></i>
                                <span>bộ lọc tìm kiếm</span>
                            </div>
                            <div class="web-filter-list-item">
                                <div class="filter-list-item-group">
                                    <div class="list-item-title">
                                        Danh mục
                                    </div>
                               
                                    <ul class="filter-item">
                                    <?php foreach($categories as $rows): ?>
                                        <li><a href="index.php?controller=products&action=category&id=<?php echo $rows->id ?>"><?php echo $rows->name ?></a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                                <!-- 2 -->
                                <div class="filter-list-item-group">
                                    <div class="list-item-title">
                                        THương hiệu
                                    </div>
                                    <ul class="filter-item">
                                        <?php foreach($brands as $brand): ?>
                                        <li><a href="index.php?controller=products&action=category&id=<?php echo $brand->id ?>"><?php echo $brand->name ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <!-- 3 -->
                                <div class="filter-list-item-group">
                                    <div class="list-item-title">
                                        xuất xứ
                                    </div>
                                    <ul class="filter-item">
                                        <li><a href="">Cộng Hoà Sec</a></li>
                                        <li><a href="">Pháp</a></li>
                                        <li><a href="">Đài Loan</a></li>
                                        <li><a href="">Cộng hoà Blarus</a></li>
                                        <li><a href="">Thái Lan</a></li>
                                        <li><a href="">Đan Mạch </a></li>
                                        <li><a href="">Thuỵ Sỹ</a></li>
                                        <li><a href="">Ba Lan</a></li>
                                        <li><a href="">Khác</a></li>
                                    </ul>
                                </div>
                            </div>
                       </div>
                   </div>
                   <div class="web-search-wrap-right">
                        <div class="card-list-item">
                            <div class="card-list-item--header">
                                Kết quả tìm kiếm
                                <span>(<?php echo $total ?> Kết quả)</span>
                            </div>
                            <div class="card-list-item--content">
                                <?php if(isset($categoryBig->name)): ?>
                                <div class="card-list-filter">
                                    <span>lọc theo</span>
                                    <div class="item-colection">
                                        Danh mục: <?php echo $categoryBig->name ?>
                                        <div class="del-item-colection">
                                            <i class="fa-solid fa-circle-xmark"></i>
                                        </div>
                                    </div>
                                </div>
                                <?php else: ?>
                                <?php endif; ?>
                                <div class="card-list-filter">
                                    <span>Sắp xếp theo</span>
                                    <div class="filter-btn-group">
                                        <button onclick="location.href = 'index.php?controller=products&action=category&id=<?php echo $category_id; ?>&order=hot'" class="btn"> 
                                            <span>Nổi bật</span>
                                        </button>
                                        <button onclick="location.href = 'index.php?controller=products&action=category&id=<?php echo $category_id; ?>&order=hot'" class="btn"> 
                                            <span>Bán Chạy</span>
                                        </button> 
                                        <button onclick="location.href = 'index.php?controller=products&action=category&id=<?php echo $category_id; ?>&order=news'" class="btn"> 
                                            <span>Hàng mới</span>
                                        </button>
                                         <button onclick="location.href = 'index.php?controller=products&action=category&id=<?php echo $category_id; ?>&order=priceDesc'" class="btn"> 
                                            <span>Giá cao đến thấp</span>
                                        </button>
                                        <button onclick="location.href = 'index.php?controller=products&action=category&id=<?php echo $category_id; ?>&order=priceAsc'" class="btn"> 
                                            <span>Giá thấp đến cao</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-list-product">
                                <?php foreach($data as $rows): ?>
                                <div  class="card p5">
                                    <div class="card-top">
                                        <?php if($rows->discount > 0): ?>
                                        <div class="discount-tag">
                                            <span><?php echo $rows->discount?>%</span>
                                        </div>
                                        <?php endif; ?>
                                        <a href="index.php?controller=products&action=detail&id=<?php echo $rows->id ?>" class="thumbnail">
                                            <img src="./assets/upload/products/<?php echo $rows->photo ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="card-bottom">
                                        <?php if($rows->discount > 0): ?>
                                        <div class="price-section">
                                            <div class="public-price"><?php echo number_format($rows->price - ($rows->price * $rows->discount)/100) ?>đ</div>
                                            <div class="origin-price"><?php echo number_format($rows->price) ?>đ</div>
                                        </div>
                                        <?php else: ?>
                                        <div class="price-section">
                                            <div class="public-price"><?php echo number_format($rows->price) ?>đ</div>
                                        </div>
                                        <?php endif; ?>
                                        <?php
                                            $conn = Connection::connectDB();
                                            $query = $conn->query("select * from brands where id = {$rows->brand_id}");
                                            $brands = $query->fetchAll(PDO::FETCH_OBJ);
                                        ?>
                                        <?php foreach($brands as $brand): ?>
                                        <div class="brand"><?php echo $brand->name  ?></div>
                                        <?php endforeach; ?>
                                        <div class="title"><a href="index.php?controller=products&action=detail&id=<?php echo $rows->id ?>"><?php echo $rows->name ?></a></div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                                <!-- 2 -->
                            </div>
                        </div>
                   </div>
               </div>
           </div> 
            
        </main>