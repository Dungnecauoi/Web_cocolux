<?php
  self::$fileLayout = "LayoutView.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="d-flex justify-content-between mt-2 mb-2" >
        <a class="btn btn-info" href="index.php">Quay Lại</a>
    </div>
    <div class="panel panel-default rounded ">
          <div class="panel-heading rounded-top  bg-primary">
                <h3 class="panel-title p-2 text-white m-0">Danh Mục Sản Phẩm</h3>
          </div>
          <div class="panel-body">
                <table class="table border table-hover text-center">
                    <thead>
                        <tr>
                            <th>Họ Và Tên</th>
                            <th ">Địa Chỉ</th>
                            <th ">Số Điện Thoại</th>
                            <th ">Ngày Mua</th>
                            <th ">Giá</th>
                            <th>Hình Thức Thanh Toán</th>
                            <th ">Trạng Thái</th>
                            <th style="width:150px ;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
						<?php foreach($data as $rows):  ?>
                       <tr>
						   <td><?php echo $rows->name ?></td>
						   <td><?php echo $rows->address ?></td>
						   <td><?php echo $rows->phone ?></td>
						   <td><?php echo $rows->date ?></td>
						   <td><?php echo $rows->price ?></td>
						   <td><?php if($rows->pay == "bank"): ?>
                            <span>Chuyển Khoản</span>
                            <?php elseif($rows->pay == "cod"): ?>
                                <span>thanh toán khi nhận hàng</span>
                                <?php endif; ?>
                            </td>
						   <td><?php if($rows->status == 0): ?> <span class="badge badge-danger">Chưa giao hàng </span> <?php else: ?> <span class="badge badge-success"> Đã giao hàng </span><?php endif; ?></td>
							<td>
								<?php if($rows->status == 0): ?>
									<a href="index.php?controller=orders&action=delivery&id=<?php echo $rows->id ?>" class="btn btn-sm btn-info">Giao hàng</a>
								<?php endif; ?>
								
								<a href="index.php?controller=orders&action=detail&id=<?php echo $rows->id ?>" class="btn btn-sm btn-success">Chi tiết</a>
								
							</td>
					   </tr>
					   <?php endforeach; ?>
                    </tbody>
                </table>
                
                <ul class="pagination">
            	<li class="page-itemn"><a href="#" class="page-link">Trang</a></li>
            	<?php for($i= 1; $i <= $numPage; $i++): ?>
            		<li class="page-itemn"><a style="padding:4px 8px;display:block;border:1px solid #c8c8c8" href="index.php?controller=orders&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            	<?php endfor; ?>
            </ul>
                
                
          </div>
    </div>
    
</body>
</html>