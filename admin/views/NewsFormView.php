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
                <h3 class="panel-title p-2 text-white m-0"><span class="add">Thêm</span> <span class="update">Sửa</span>Tin Tức</h3>
          </div>
          <div class="panel-body">
                
                <div class="input-group m-2 d-flex align-items-center">
                    <div class="input-group-addon text-uppercase " style="width:15%;font-weight:600">Tiêu Đề</div>
                    <input type="text" name="title" class="form-control mr-2" id="exampleInputAmount" value="<?php echo isset($record->title)?$record->title:''; ?>" placeholder="<?php $record->name?>">
                </div>
         
                <div class="input-group m-2 d-flex align-items-center">
                    <div class="input-group-addon text-uppercase " style="width:15%;font-weight:600">Tin tức nổi bật</div>
                    <input type="checkbox" name="hot" style="transform:scale(1.5) ;" class=" mr-2" id="exampleInputAmount" <?php if(isset($record->hot) && $record->hot == 1):  ?> checked <?php endif; ?>>
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
                    <div class="input-group-addon text-uppercase " style="width:15%;font-weight:600">Ảnh</div>
                    <input type="file" name="photo" class="mr-2" id="exampleInputAmount" value="" placeholder="name">
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
        if(action === "index.php?controller=news&action=createPost")
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