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
                       <li><a href="">Trang Điểm - Makeup</a></li>
                       <li><a href="">Kem lót - Makeup primer</a></li>
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
                                    <?php 
                                    $conn = Connection::connectDB();
                                    $query = $conn->query("select * from brands order by id desc");
                                    $brands = $query->fetchAll(PDO::FETCH_OBJ);
                                    ?>
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
                                <span>(<?php echo $totalSearch ?> Kết quả)</span>
                            </div>
                            <div class="card-list-item--content">
                                <div class="card-list-filter">
                                    <span>lọc theo</span>
                                    <div class="item-colection">
                                        Danh mục: Kem lót - Makeup primer
                                        <div class="del-item-colection">
                                            <i class="fa-solid fa-circle-xmark"></i>
                                        </div>
                                    </div>
                                    
                                </div>

                                <div class="card-list-filter">
                                    <span>Sắp xếp theo</span>
                                    <div class="filter-btn-group">
                                        <button onclick="location.href = 'index.php?controller=search&action=name&order=hot'" class="btn"> 
                                            <span>Nổi bật</span>
                                        </button>
                                        <button onclick="location.href = 'index.php?controller=search&action=name&order=hot'" class="btn"> 
                                            <span>Bán Chạy</span>
                                        </button> 
                                        <button onclick="location.href = 'index.php?controller=search&action=name&order=news'" class="btn"> 
                                            <span>Hàng mới</span>
                                        </button>
                                         <button onclick="location.href = 'index.php?controller=search&action=name&order=priceDesc'" class="btn"> 
                                            <span>Giá cao đến thấp</span>
                                        </button>
                                        <button onclick="location.href = 'index.php?controller=search&action=name&order=priceAsc'" class="btn"> 
                                            <span>Giá thấp đến cao</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-list-product">
                                <?php foreach($data as $rows): ?>
                                <div  class="card p5">
                                    <div class="card-top">
                                        <div class="discount-tag">
                                            <span><?php echo $rows->discount?>%</span>
                                        </div>
                                        <a href="index.php?controller=products&action=detail&id=<?php echo $rows->id ?>" class="thumbnail">
                                            <img src="./assets/upload/products/<?php echo $rows->photo ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="card-bottom">
                                        <div class="price-section">
                                            <div class="public-price"><?php echo number_format($rows->price - ($rows->price * $rows->discount)/100) ?>đ</div>
                                            <div class="origin-price"><?php echo number_format($rows->price) ?>đ</div>
                                        </div>
                                        <?php
                                            $conn = Connection::connectDB();
                                            $query = $conn->query("select * from brands where id = {$rows->brand_id}");
                                            $brands = $query->fetchAll(PDO::FETCH_OBJ);
                                        ?>
                                        <?php foreach($brands as $brand): ?>
                                        <div class="brand"><?php echo $brand->name  ?></div>
                                        <?php endforeach; ?>
                                        <div class="title"><a href="index.php?controller=products"><?php echo $rows->name ?></a></div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                                <!-- 2 -->
                            </div>
                            <ul class="pagination" style="padding:10px; width:100%;display:flex;justify-content:center;list-style:none;align-items:center">
                            <li style="margin-right: 30px;" class="page-itemn"><a href="#" onclick="history.go(-1)" style="text-decoration:none;font-size:16px" class="page-link"><i class="fa-solid fa-angles-left"></i></a></li>
                                <li style="margin-right: 10px;" class="page-itemn"><a href="#" style="text-decoration:none;font-size:16px" class="page-link">Trang</a></li>
                                <?php for($i= 1; $i <= $numberPage; $i++): ?>
                                    <li class="page-itemn"><a style="padding:4px 8px;display:block;border:1px solid #c8c8c8;text-decoration:none;font-size:16px" href="index.php?controller=search&action=name&key=a&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                <?php endfor; ?>
                            <li style="margin-left: 30px;" class="page-itemn"><a href="#" onclick="history.go(+1)" style="text-decoration:none;font-size:16px" class="page-link"><i class="fa-solid fa-angles-right"></i></a></li>
                            </ul>
                        </div>
                   </div>
               </div>
           </div> 
            
        </main>