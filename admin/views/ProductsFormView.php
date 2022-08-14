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
    <form class="formCategories" action="<?php echo $action ?>" enctype="multipart/form-data" method="post">
    <div class="d-flex justify-content-between mt-2 mb-2" >
        <a class="btn btn-info" href="index.php?controller=products">Quay Lại</a> 
    </div>
    <div class="panel panel-default border rounded ">
          <div class="panel-heading rounded-top  bg-primary">
                <h3 class="panel-title p-2 text-white m-0"><span class="add">Thêm</span> <span class="update">Sửa</span>Sản Phẩm</h3>
          </div>
          <div class="panel-body">
                
                <div class="input-group m-2 d-flex align-items-center">
                    <div class="input-group-addon text-uppercase " style="width:15%;font-weight:600">Tên</div>
                    <input type="text" name="name" class="form-control mr-2" id="exampleInputAmount" value="<?php echo isset($record->name)?$record->name:''; ?>" placeholder="<?php $record->name?>">
                </div>
                <div class="input-group m-2 d-flex align-items-center">
                    <div class="input-group-addon text-uppercase " style="width:15%;font-weight:600">Giá</div>
                    <input type="number" name="price" class="form-control mr-2" id="exampleInputAmount" value="<?php echo isset($record->price)?$record->price:''; ?>" placeholder="<?php $record->price?>">
                </div>
                <div class="input-group m-2 d-flex align-items-center">
                    <div class="input-group-addon text-uppercase " style="width:15%;font-weight:600">Giảm giá</div>
                    <input type="number" name="discount" class="form-control mr-2" id="exampleInputAmount" value="<?php echo isset($record->discount)?$record->discount:''; ?>" placeholder="<?php $record->discount?>">
                </div>
                <div class="input-group m-2 d-flex align-items-center">
                    <div class="input-group-addon text-uppercase " style="width:15%;font-weight:600">Sản phẩm nổi bật</div>
                    <input type="checkbox" name="hot" style="transform:scale(1.5) ;" class=" mr-2" id="exampleInputAmount" <?php if(isset($record->hot) && $record->hot == 1):  ?> checked <?php endif; ?>>
                </div>
                <?php 
                    $conn = Connection::connectDB();
                    $query = $conn->query("select * from brands order by id desc");
                    $brands = $query->fetchAll(PDO::FETCH_OBJ);
                ?>
                
                <div class="input-group m-2 d-flex align-items-center">
                    <div class="input-group-addon text-uppercase " style="width:15%;font-weight:600">Thương Hiệu</div>
                    <select name="brand_id" id="">
                        <option value="0"></option>
                    <?php foreach($brands as $rows): ?>
                        <option <?php if(isset($record->brand_id) && $record->brand_id == $rows->id): ?> selected <?php endif; ?>  value="<?php echo $rows->id ?>"><?php echo $rows->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <?php 
                    $conn = Connection::connectDB();
                    $query = $conn->query("select * from categories where parent_id = 0 order by id desc");
                    $categories = $query->fetchAll(PDO::FETCH_OBJ);
                ?>
               
                <div class="input-group m-2 d-flex align-items-center">
                    <div class="input-group-addon text-uppercase " style="width:15%;font-weight:600">Danh Mục</div>
                    <select name="category_id" id="">
                        <option value="0"></option>
                    <?php foreach($categories as $rows): ?>
                        <option <?php if(isset($record->category_id) && $record->category_id == $rows->id): ?> selected <?php endif; ?>  value="<?php echo $rows->id ?>"><?php echo $rows->name ?></option>
                       
                            <?php 
                    $conn = Connection::connectDB();
                    $query = $conn->query("select * from categories where parent_id = $rows->id order by id desc");
                    $categoriesSub = $query->fetchAll(PDO::FETCH_OBJ);
                ?>
                        <?php foreach($categoriesSub as $rowsSub): ?>
                        <option style="" <?php if(isset($record->category_id) && $record->category_id == $rowsSub->id): ?> selected <?php endif; ?>  value="<?php echo $rowsSub->id ?>">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rowsSub->name ?></option>
                        <?php endforeach; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="input-group mt-3 mb-3 mr-2 ml-2 d-flex align-items-center">
                    <div class="input-group-addon text-uppercase " style="width:15%;font-weight:600">Nội Dung</div>
                    <textarea name="content" id="" cols="30" rows="10"><?php echo isset($record->content)? $record->content:'' ?></textarea>
                    <script>CKEDITOR.replace('content')</script>
                </div>
                <div class="input-group mt-3 mb-3 mr-2 ml-2 d-flex align-items-center">
                    <div class="input-group-addon text-uppercase " style="width:15%;font-weight:600">Mô tả ngắn</div>
                    <textarea name="description" id="" cols="30" rows="10"><?php echo isset($record->description)? $record->description:'' ?></textarea>
                    <script>CKEDITOR.replace('description')</script>
                </div>
                <div class="input-group m-2 d-flex align-items-center">
                    <div class="input-group-addon text-uppercase " style="width:15%;font-weight:600">Số Lượng Kho</div>
                    <input type="number" name="quantity" class="form-control mr-2" id="exampleInputAmount" value="<?php echo isset($record->quantity)?$record->quantity:''; ?>" placeholder="<?php $record->price?>">
                </div>
                <div class="input-group m-2 d-flex align-items-center">
                    <div class="input-group-addon text-uppercase " style="width:15%;font-weight:600">Ảnh</div>
                    <input type="file" name="photo" class="mr-2" id="exampleInputAmount" value="" placeholder="name">
                </div>
                <div class="input-group m-2 d-flex align-items-center">
                    <div class="input-group-addon text-uppercase " style="width:15%;font-weight:600">ảnh chi tiết</div>
                    <input type="file" name="photos[]" multiple="multiple" class="mr-2" id="exampleInputAmount" value="" placeholder="name">
                    <p>(Có thể chọn được nhiều ảnh)</p>
                </div>

                
                
                
          </div>
          
          <button type="submit" class="btn btn-info float-right m-2 js-btn-add">Thêm</button>
          <button type="submit" class="btn btn-info float-right m-2 js-btn-update">Sửa</button>
          
    </div>
    </form>
    <script>
        var add = document.querySelector(".add");
        var btnAdd = document.querySelector(".js-btn-add");
        var btnUpdate = document.querySelector(".js-btn-update");
        var update = document.querySelector(".update");
        console.log(update);
        var form = document.querySelector(".formCategories");
        var action = form.getAttribute("action");
        if(action === "index.php?controller=products&action=createPost")
        {
            add.style.display = "block";
            update.style.display = "none";
            btnAdd.style.display = "block";
            btnUpdate.style.display = "none";
        }
        else
        {
            
            btnAdd.style.display = "none";
            btnUpdate.style.display = "block";
            add.style.display = "none";
            update.style.display = "inline-block";
        }
    </script>
</body>
</html>