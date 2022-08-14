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
        
        <a type="button" href="index.php?controller=categories&action=create" class="btn btn-info">Thêm Danh Mục</a>
        
    </div>
    <div class="panel panel-default rounded ">
          <div class="panel-heading rounded-top  bg-primary">
                <h3 class="panel-title p-2 text-white m-0">Danh Mục Sản Phẩm</h3>
          </div>
          <div class="panel-body">
                <table class="table border table-hover">
                    <thead>
                        <tr>
                            <th>Tên Danh Mục</th>
                            <th style="padding-left:40px ;">Ảnh</th>
                            <th style="padding-left:40px ;">Ảnh ở cột sản phẩm</th>
                            <th style="width:150px ;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data as $rows): ?>
                        <tr>
                            <td class=""><?php echo $rows->name ?> <i class="fa-solid fa-circle-chevron-down ml-1"></i></td>
                            <td>
                                <?php if($rows->photo != "" && file_exists("../assets/upload/categories/$row->photo")):?>
                                    <img src="../assets/upload/categories/<?php echo $rows->photo ?>" alt="" style="width:100px;object-fit:cover;border-radius:0">
                                    <?php endif; ?>
                            </td>
                            <td>
                                <?php if($rows->photo_colum != "" && file_exists("../assets/upload/categories/$row->photo_colum")):?>
                                    <img src="../assets/upload/categories/<?php echo $rows->photo_colum ?>" alt="" style="width:100px;object-fit:cover;border-radius:0">
                                    <?php endif; ?>
                            </td>
                            <td>
                                <a href="index.php?controller=categories&action=update&id=<?php echo $rows->id ?>">Sửa</a>
                                <a style="margin-left:7px ;" href="index.php?controller=categories&action=delete&id=<?php echo $rows->id ?>" onclick="return window.confirm('Bạn có chắc chắn muốn xoá không')">Xoá</a>
                            </td>
                        </tr>
                        <?php
                            $conn = Connection::connectDB();
                            $querySub = $conn->query("select * from categories where parent_id={$rows->id} order by id desc");
                            $categoriesSub = $querySub->fetchAll(PDO::FETCH_OBJ);
                        ?>
                        <?php foreach($categoriesSub as $rowsSub): ?>
                        <tr>
                            <td style="padding-left:40px" ; ><i class="fa-solid fa-circle-chevron-right mr-1"></i><?php echo $rowsSub->name ?></td>
                            <td>
                                
                            </td>
                            <td></td>
                            <td>
                                <a href="index.php?controller=categories&action=update&id=<?php echo $rowsSub->id ?>">Sửa</a>
                                <a style="margin-left:7px ;" href="index.php?controller=categories&action=delete&id=<?php echo $rowsSub->id ?>" onclick="return window.confirm('Bạn có chắc chắn muốn xoá không')">Xoá</a>
                            </td>
                        </tr>
                                    <?php endforeach; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                
                <ul class="pagination">
            	<li class="page-itemn"><a href="#" class="page-link">Trang</a></li>
            	<?php for($i= 1; $i <= $numPage; $i++): ?>
            		<li class="page-itemn"><a style="padding:4px 8px;display:block;border:1px solid #c8c8c8" href="index.php?controller=categories&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            	<?php endfor; ?>
            </ul>
                
                
          </div>
    </div>
    
</body>
</html>