<?php
  self::$fileLayout = "LayoutView.php";
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
        <a class="btn btn-info" href="index.php">Quay Lại</a>
        
        <a type="button" href="index.php?controller=news&action=create" class="btn btn-info">Thêm Tin Tức</a>
        
    </div>
    <div class="panel panel-default rounded ">
          <div class="panel-heading rounded-top  bg-primary">
                <h3 class="panel-title p-2 text-white m-0">Danh Sách Tin Tức</h3>
          </div>
          <div class="panel-body">
                <table class="table border table-hover">
                    <thead>
                        <tr>
                            <th style="width:100px">Ảnh</th>
                            <th>Tiêu Đề</th>
                            <th style="width:50px">Nổi Bật</th>
                            <th style="width:150px;text-align:center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data as $rows): ?>
                        <tr>
                            
                            <td>
                                <?php if($rows->photo != "" && file_exists("../assets/upload/news/$row->photo")):?>
                                    <img src="../assets/upload/news/<?php echo $rows->photo ?>" alt="" style="width:100px;object-fit:cover;border-radius:0">
                                    <?php endif; ?>
                            </td>
                            <td><?php echo $rows->title  ?></td>
                            <td style="text-align:center"  class=""><?php if(isset($rows->hot) && $rows->hot == 1): ?>
                              <i class="fa-solid fa-check"></i>
                              <?php endif; ?>
                            </td>
                            <td style="text-align:center">
                                <a href="index.php?controller=news&action=update&id=<?php echo $rows->id ?>">Sửa</a>
                                <a style="margin-left:7px ;" href="index.php?controller=news&action=delete&id=<?php echo $rows->id ?>" onclick="return window.confirm('Bạn có chắc chắn muốn xoá không')">Xoá</a>
                            </td>
                        </tr>

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