<?php
  self::$fileLayout = "LayoutView.php";
?>
<?php 
    $conn = Connection::connectDB();
    $query = $conn->query("select * from customers where id = (select customer_id from orders where id=$id limit 0,1)");
    $customer = $query->fetch(PDO::FETCH_OBJ);
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta title="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="d-flex justify-content-between mt-2 mb-2" >
        <a class="btn btn-info" href="#" onclick="history.go(-1)" >Quay Lại</a>
        
        <a type="button" href="index.php?controller=news&action=create" class="btn btn-info">Thêm Tin Tức</a>
        
    </div>
    <div class="panel panel-default rounded ">
          <div class="panel-heading rounded-top  bg-primary">
                <h3 class="panel-title p-2 text-white m-0">Thông tin đơn hàng</h3>
          </div>
          <div class="panel-body">
                <table class="table border table-hover ">
                    <tbody>
                        <tr>
                            <td style="width:15%">ID Khách hàng</td>
                            <td><?php echo $customer->id ?></td>
                        </tr>
                        <tr>
                            <td style="width:15%">Họ tên </td>
                            <td><?php echo $dataOrder->name ?></td>
                        </tr>
                        <tr>
                            <td style="width:15%">Email </td>
                            <td> <?php echo $customer->email ?></td>
                        </tr>
                        <tr>
                            <td style="width:15%">Địa chỉ </td>
                            <td><?php echo $dataOrder->address ?> </td>
                        </tr>
                        <tr>
                            <td style="width:15%">Số điện thoại </td>
                            <td> <?php echo $dataOrder->phone ?></td>
                        </tr>
                    </tbody>
                </table>
          </div>
    </div>

    <div class="panel panel-default rounded ">
          <div class="panel-heading rounded-top  bg-primary">
                <h3 class="panel-title p-2 text-white m-0">Danh Sách Sản phẩm đã mua</h3>
          </div>
          <div class="panel-body">
                <table class="table border table-hover">
                    <thead>
                        <tr>
                            <th style="width:100px">Ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th style="width:50px">Giá</th>
                            <th style="width:150px;text-align:center">Giảm giá</th>
                            <th>Giá đã giảm</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data as $rows): ?>
                            <?php $product = (new OrdersController())->modelGetProduct($rows->product_id); ?>
                        <tr>
                            
                            <td>
                                <?php if($product->photo != "" && file_exists("../assets/upload/products/$product->photo")):?>
                                    <img src="../assets/upload/products/<?php echo $product->photo ?>" alt="" style="width:100px;object-fit:cover;border-radius:0">
                                    <?php endif; ?>
                            </td>
                            <td><?php echo $product->name  ?></td>
                            <td style="text-align:center"  class="">
                            <?php echo number_format($product->price) ?>Đ
                            </td>
                            <td style="text-align:center"> <?php echo $product->discount ?>%</td>
                            <td><?php echo number_format($product->price - ($product->price * $product->discount)/100) ?>Đ</td>
                        </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
          </div>
    </div>
    
</body>
</html>